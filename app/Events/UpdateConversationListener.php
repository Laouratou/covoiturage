<?php

namespace App\Events;

use Illuminate\Support\Facades\DB;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateConversationListener
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }


    public function handle(NewMessageEvent $event)
    {
        $message = $event->message;
        $conversation = $event->conversation;

        // Mettre à jour la discussion de la personne qui a envoyé le nouveau message
        DB::table('conversations')
            ->where('id', $conversation->id)
            ->update([
                'latest_message_id' => $message->id,
                'updated_at' => now(),
            ]);
    }
}
