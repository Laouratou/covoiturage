<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationNotification extends Notification
{
    use Queueable;

    protected $reservation;

    /**
     * Crée une nouvelle instance de notification.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation=$reservation;
    }

    /**
     * Obtient les canaux d'envoi de la notification.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail']; // Utilisez le canal "mail" pour l'envoi de la notification
    }

    /**
     * Renvoie le message de notification par courrier électronique.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('reservation.response', $this->reservation->id);

        return (new MailMessage)
            ->line('Vous avez reçu une demande de réservation.')
            ->action('Répondre à la réservation', $url)
            ->line('Merci de votre attention !');
    }
}
