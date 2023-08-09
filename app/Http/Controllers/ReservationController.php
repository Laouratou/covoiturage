<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Trajet;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationNotification;

class ReservationController extends Controller
{
    public function create(Trajet $trajet){
        return view('reservations.create',compact('trajet'));
    }


    public function index()
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté
        $reservations = $user->trajets()->with('reservations')->get()->pluck('reservations')->flatten();
        $trajets = $user->trajets; // Récupérer les trajets de l'utilisateur connecté

        return view('reservations.index', compact('reservations', 'trajets','user'));
    }


    public function cancelReservation($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Vérifier si l'heure de départ est au moins 2 heures après l'heure actuelle
        $now = Carbon::now();
        $departureTime = Carbon::parse($reservation->trajet->heure_depart);
        $diffInHours = $now->diffInHours($departureTime, false);

        if ($diffInHours >= 2) {
            // Annuler la réservation
            $reservation->status = 'annulé';
            $reservation->save();

            // Ajoutez ici le code pour informer l'utilisateur que sa réservation a été annulée
            // par exemple, en envoyant un email ou une notification

            return redirect()->back()->with('success', 'La réservation a été annulée avec succès.');
        } else {
            // Rediriger avec un message d'erreur si l'annulation n'est pas possible
            return redirect()->back()->with('error', 'Vous ne pouvez annuler la réservation qu\'au moins 2 heures avant le départ.');
        }
    }

    public function reserve(Request $request, Trajet $trajet)
    {
        // Check if the $trajet instance is null (not found)
        if (!$trajet) {
            return redirect()->back()->with('error', 'Trajet introuvable');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'nbre_places' => 'required|integer',
        ]);

        // Calculate the total amount based on the number of seats and price per seat
        $prixParPlace = $trajet->prix_par_place;
        $montantTotal = $validatedData['nbre_places'] * $prixParPlace;

        // Create a new reservation
        $reservation = new Reservation();
        $reservation->user_id = $request->user()->id; // or any other way to get the user ID
        $reservation->trajet_id = $trajet->id;
        $reservation->nbre_places = $validatedData['nbre_places'];
        $reservation->montant_total = $montantTotal;
        $reservation->status = 'en attente'; // or any other initial status

        $reservation->save();
        $user = new User();
        $user["email"]=$request->user()->email;
        // Envoyer la notification à l'utilisateur associé à la réservation
        $user->notify(new ReservationNotification($reservation));

        return view('auth.session', compact('trajet'));
    }


public function handleResponse(Request $request, Reservation $reservation)
{
    $status = $request->input('status');

    if ($status === 'accepter') {
        // Vérifier si des places sont disponibles pour le trajet
        if ($reservation->trajet->place_disponibles > 0) {
            // Décrémenter le nombre de places disponibles
            $reservation->trajet->decrement('place_disponibles');

            // Mettre à jour le statut de la réservation
            $reservation->status = 'acceptée';

            // Sauvegarder les modifications du trajet
            $reservation->trajet->save();
        } else {
            // Gérer le cas où il n'y a plus de places disponibles
            return redirect()->route('confirmation.reservation')->with('error', 'Le trajet est complet, la réservation ne peut pas être acceptée.');
        }
    } elseif ($status === 'refuser') {
        // Mettre à jour le statut de la réservation
        $reservation->status = 'refusée';
    }

    $reservation->save();

    return redirect()->route('confirmation.reservation')->with('success', 'Statut de la réservation mis à jour avec succès.');
}


   public function update(Request $request, Reservation $reservation)
{
    $status = $request->input('status');

    if ($status === 'acceptée') {
        // Vérifier si des places sont disponibles pour le trajet
        if ($reservation->trajet->place_disponibles > 0) {
            // Décrémenter le nombre de places disponibles
            $reservation->trajet->decrement('place_disponibles');
        } else {
            // Gérer le cas où il n'y a plus de places disponibles
            return redirect()->route('reservations.index')->with('error', 'Le trajet est complet, la réservation ne peut pas être acceptée.');
        }
    }

    $reservation->status = $status;
    $reservation->save();

    return redirect()->route('reservations.index')->with('success', 'Statut de la réservation mis à jour avec succès.');
}

public function myReservations()
{
    $user = Auth::user();
    $reservations = Reservation::where('user_id', $user->id)->get();

    return view('reservations.my_reservations', compact('reservations'));
}


public function delete(Reservation $reservation)
{
    // Vérifier si l'utilisateur est autorisé à supprimer la réservation
    if ($reservation->user_id !== auth()->user()->id) {
        return back()->with('success', 'La réservation a été annulée avec succès.');
    }

    // Supprimer la réservation
    $reservation->delete();

    return back()->with('success', 'La réservation a été annulée avec succès.');
}

public function cancel(Reservation $reservation)
{
    // Perform cancellation logic
    $reservation->status = 'annulee';
    $reservation->save();

    return back()->with('success', 'La réservation a été annulée avec succès.');
}
public function showPassView()
{
    $user = auth()->user();
    $reservationCount = Reservation::where('user_id', $user->id)->count();

    return view('auth.pass', compact('reservationCount'));
}


}
