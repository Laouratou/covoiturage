<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'photo',
            'cnib',
            'telephone',
            'annee_experience',
            'photo_immatriculation',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public function estPassager()
        {
            return $this->est_passager;
        }
        public function estConducteur()
        {
            return $this->role === 'conducteur';
        }
    protected $nullable = [
        'photo',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function estAdmin()
    {
        return $this->role === 'admin';
    }

public function reviews()
{
    return $this->hasMany(Review::class, 'driver_id'); // Assurez-vous d'ajuster le nom de la clé étrangère si nécessaire
}

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }


    public function voitures()
{
    return $this->hasMany(Voiture::class);
}




    public function preference()
    {
        return $this->hasOne(Preference::class);
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function routeNotificationForMail($notification)
    {
        // Renvoyer l'adresse e-mail à laquelle vous souhaitez envoyer les notifications
        return $this->email;
    }

    }


