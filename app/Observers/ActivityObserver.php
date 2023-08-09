<?php
namespace App\Observers;

use App\Models\Trajet;
use App\Models\Message;
use App\Models\Reservation;

class ActivityObserver
{
    public function createdTrajet(Trajet $trajet)
    {
        // Enregistrer une activité pour la création d'un nouveau trajet
        // Vous pouvez enregistrer les détails de l'activité dans la table "trajet" ou toute autre table que vous utilisez pour les activités liées aux trajets.
    }

    public function createdMessage(Message $message)
    {
        // Enregistrer une activité pour la création d'un nouveau message
        // Vous pouvez enregistrer les détails de l'activité dans la table "message" ou toute autre table que vous utilisez pour les activités liées aux messages.
    }

    public function createdReservation(Reservation $reservation)
    {
        // Enregistrer une activité pour la création d'une nouvelle réservation
        // Vous pouvez enregistrer les détails de l'activité dans la table "reservation" ou toute autre table que vous utilisez pour les activités liées aux réservations.
    }
}
