<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Voiture extends Model
{
    protected $fillable = [
        'marque',
        'modele',
        'couleur',
        'type',
        'nombre_places',
        'climatisee',
        'photo', // Remplacez 'default.jpg' par le nom de fichier par défaut souhaité
        'assuree',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
