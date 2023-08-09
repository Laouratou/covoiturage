<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\NewMessageEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewMessageNotification;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $conversations = Conversation::where(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->orWhere('receiver_id', $user->id);
        })
            ->with(['messages' => function ($query) {
                $query->latest()->take(1);
            }, 'user' => function ($query) {
                $query->select('id', 'name', 'photo');
            }, 'receiver' => function ($query) {
                $query->select('id', 'name', 'photo');
            }])
            ->orderByDesc('updated_at')
            ->get();

        $conversations->transform(function ($conversation) use ($user) {
            if ($conversation->user_id == $user->id) {
                $conversation->user->name = 'Moi';
            }
            return $conversation;
        });

        $unreadCount = $conversations->sum(function ($conversation) {
            return $conversation->unreadMessages->count();
        });

        return view('messages.index', compact('conversations', 'user', 'unreadCount'));
    }

    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('messages.create', compact('users'));
    }

    public function create1()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('message-admin', compact('users'));
    }

    public function store(Request $request)
{
    $user = auth()->user();
    $receiver = User::findOrFail($request->receiver_id);

    $request->validate([
        'content' => 'required',
    ]);

    $conversation = Conversation::firstOrCreate([
        'user_id' => $user->id,
        'receiver_id' => $receiver->id,
    ]);

    $message = new Message();
    $message->conversation_id = $conversation->id;
    $message->sender_id = $user->id;
    $message->receiver_id = $receiver->id;
    $message->content = $request->content;
    $message->save();

    // Déclencher l'événement NewMessageEvent
    event(new NewMessageEvent($message, $conversation));

    // Envoyer la notification au receveur du message
    Notification::send($receiver, new NewMessageNotification($message));

    return redirect()->route('messages.index')->with('success', 'Votre message a bien été envoyé !');
}

public function show(Conversation $conversation)
{
    // Marquer les messages non lus de la conversation comme lus
    $conversation->unreadMessages()->update(['read' => true]);

    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Calculer le nombre de messages non lus
    $unreadCount = $user->conversations->sum(function ($conv) {
        return $conv->unreadMessages->count();
    });

    $messages = $conversation->messages()->with('sender')->get();
    return view('messages.show', compact('conversation', 'messages', 'unreadCount'));
}

    public function reply(Request $request, Conversation $conversation)
    {
        $user = auth()->user();

        $message = new Message();
        $message->conversation_id = $conversation->id;
        $message->sender_id = $user->id;
        $message->receiver_id = $conversation->receiver_id;
        $message->content = $request->content;
        $message->save();

        // Déclencher l'événement NewMessageEvent
        event(new NewMessageEvent($message, $conversation));

        $conversation->receiver->notify(new NewMessageNotification($message));

        return redirect()->route('messages.show', $conversation)->with('success', 'Réponse envoyée avec succès !');
    }
}
