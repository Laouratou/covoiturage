<?php

namespace App\Listeners;

use App\Events\NewMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateConversationListener
{
    /**
     * Handle the event.
     *
     * @param  NewMessageEvent  $event
     * @return void
     */
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
