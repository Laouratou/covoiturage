<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;
    protected $fillable = [
        'espace_bagage',
        'nmbre_passager',
        'preferencesup',
        'comment',
        'num_paiement',
        'compte_mobile',
    ];

    protected $casts = [
        'preferencesup' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

}

