<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['conversation_id', 'sender_id', 'receiver_id', 'content','read'];


    public function sender()
{
    return $this->belongsTo(User::class, 'sender_id');
}

public function receiver()
{
    return $this->belongsTo(User::class, 'receiver_id');
}

public function getLastMessage()
{
    $lastMessage = Message::latest('created_at')->first();

    return $lastMessage;
}

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
