<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trajet;
use App\Models\Message;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $trajetsCount = Trajet::count();
        $reservationsCount = Reservation::count();
        $recentTrajets = Trajet::orderBy('created_at', 'desc')->take(5)->get();
        $recentMessages = Message::orderBy('created_at', 'desc')->take(5)->get();
        $recentReservations = Reservation::orderBy('created_at', 'desc')->take(5)->get();
        $acceptedReservationsCount = Reservation::where('status', Reservation::STATUS_ACCEPTED)->count();
        $rejectedReservationsCount = Reservation::where('status', Reservation::STATUS_REJECTED)->count();
        $users = User::all();
        // Calculate the total price of all accepted trips
        $totalAcceptedTripsPrice = Reservation::where('status', Reservation::STATUS_ACCEPTED)->sum('montant_total');

        return view('dashboard', compact('users', 'trajetsCount', 'usersCount', 'reservationsCount', 'acceptedReservationsCount', 'rejectedReservationsCount', 'totalAcceptedTripsPrice', 'recentTrajets', 'recentMessages', 'recentReservations'));
    }


    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire $request->validate([...]);

        User::create($request->all());

        return redirect('/dashboard/users')->with('success', 'Utilisateur ajouté avec succès.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire $request->validate([...]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect('/dashboard/users')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard/users')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
