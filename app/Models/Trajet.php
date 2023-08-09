<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'ville_depart',
        'ville_arrivee',
        'date_depart',
        'heure_depart',
        'heure_arrivee',
        'places_disponibles',
        'prix_par_place',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function conducteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function driverRatings()
    {
        return $this->hasMany(DriverRating::class, 'user_id');
    }
    public function voiture()
{
    return $this->belongsTo(Voiture::class);
}
public function reservations()
{
    return $this->hasMany(Reservation::class);
}

}


