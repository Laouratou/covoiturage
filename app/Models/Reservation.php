<?php
namespace App\Models;

use App\Models\User;
use App\Models\Trajet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notifiable;


class Reservation extends Model
{
    use Notifiable;
    protected $fillable = [
        'user_id',
        'trajet_id',
        'status',
        'nbre_places'
    ];
    public function motifAnnulation()
    {
        return $this->belongsTo(MotifAnnulation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const STATUS_ACCEPTED = 'acceptée';
    const STATUS_PENDING = 'en attente';
    const STATUS_REJECTED = 'refusée';

    public function trajet()
    {
        return $this->belongsTo(Trajet::class, 'trajet_id');
    }
}
