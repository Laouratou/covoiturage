<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'receiver_id', 'latest_message_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function unreadMessages()
    {
        return $this->messages()->where('read', false);
    }

    public function isRead()
    {
        return $this->messages()->where('receiver_id', Auth::id())->where('read', false)->count() === 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function getUnreadMessagesCountAttribute()
    {
        return $this->messages()->where('read', false)->count();
    }
}
