<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traje extends Model
{
    protected $fillable = ['ville_depart', 'prix', 'mode_paiement', 'numero_mobile_money'];
}
