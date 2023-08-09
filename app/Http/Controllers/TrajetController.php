<?php

namespace App\Http\Controllers;

use id;
use Carbon\Carbon;
use App\Models\User;

use App\Models\Trajet;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\MotifAnnulation;
use Illuminate\Support\Facades\Auth;

class TrajetController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function index()
        {
            // Vérifier si l'utilisateur est connecté
            if (!Auth::check()) {
                return redirect()->route('login');
            }

            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Vérifier le rôle de l'utilisateur
            if ($user->role === 'conducteur') {
                // Utilisateur avec le rôle 'conducteur', récupérer tous les trajets de l'utilisateur connecté
                $trajets = $user->trajets()->orderBy('date_depart', 'desc')->get();
            } else {
                // Utilisateur avec le rôle 'passager', ne pas récupérer de trajets (tableau vide)
                $trajets = collect();
            }

            return view('trajets.index', compact('trajets'));
        }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $trajets = Trajet::all(); // Remplacez `Trajet` par le nom réel de votre modèle ou de votre requête pour récupérer les données `$trajets`

        // Vérifier si l'utilisateur a une voiture enregistrée
        if (!$user->voitures()->exists()) {
            return redirect()->route('voitures.create')->with('message', 'Vous devez créer une voiture avant de pouvoir créer un trajet.');
        }


        return view('trajets.create', compact('trajets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'place_disponibles' => 'required|numeric|max:8',
            'ville_d_arrivee' => 'required',
            'ville_de_depart' => 'required',
            'date_depart' => ['required', 'date_format:Y-m-d'],
            'heure_depart' => ['required', 'date_format:H:i'],
            'heure_d_arrivee' => ['required', 'date_format:H:i'],
            'prix_par_place' => 'required|numeric|min:0',
        ]);

        // Vérifier si la date de départ est égale à la date actuelle
        $dateDepart = Carbon::parse($validatedData['date_depart'])->format('Y-m-d');
        $dateActuelle = Carbon::now()->format('Y-m-d');

        // Vérifier si la date de départ est la même que la date actuelle
        if ($dateDepart === $dateActuelle) {
            // Si la date de départ est égale à la date actuelle, vérifier l'heure de départ
            $heureDepart = Carbon::parse($validatedData['heure_depart'])->format('H:i:s');
            $heureActuelle = Carbon::now()->format('H:i:s');

            // Comparer l'heure de départ avec l'heure actuelle
            if ($heureDepart <= $heureActuelle) {
                return redirect()->back()->withInput()->with('error', 'L\'heure de départ doit être postérieure à l\'heure actuelle.');
            }
        }

        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $trajet = new Trajet();
        $trajet->user_id = Auth::id(); // Associer l'ID de l'utilisateur connecté
        $trajet->ville_de_depart = $validatedData['ville_de_depart'];
        $trajet->ville_d_arrivee = $validatedData['ville_d_arrivee'];
        $trajet->place_disponibles = $validatedData['place_disponibles'];
        $trajet->date_depart = $validatedData['date_depart'];
        $trajet->heure_depart = $validatedData['heure_depart'];
        $trajet->heure_d_arrivee = $validatedData['heure_d_arrivee'];
        $trajet->prix_par_place = $validatedData['prix_par_place'];
        $trajet->save();

        return redirect()->route('trajets.index')->with('success', 'Le trajet a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Recherche du trajet par son ID
        $trajet = Trajet::find($id);

        // Vérification si le trajet existe
        if (!$trajet) {
            return redirect()->route('trajets.index')->with('error', 'Trajet introuvable');
        }

        // Vérifier si l'utilisateur connecté est le conducteur du trajet
        if ($trajet->user_id !== Auth::id()) {
            return redirect()->route('trajets.index')->with('error', 'Vous n\'êtes pas autorisé à voir ce trajet');
        }

        return view('trajets.show', ['trajet' => $trajet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recherche du trajet par son ID
        $trajet = Trajet::find($id);

        // Vérification si le trajet existe
        if (!$trajet) {
            return redirect()->route('trajets.index')->with('error', 'Trajet introuvable');
        }

        return view('trajets.edit', ['trajet' => $trajet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'place_disponibles' => 'required|integer',
            'ville_d_arrivee' => 'required',
            'ville_de_depart' => 'required',
            'date_depart' => 'required|date',
            'heure_depart' => 'required',
            'heure_d_arrivee' => 'required',
            'prix_par_place' => 'required|numeric|min:0',
        ]);

        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer le trajet spécifié appartenant à l'utilisateur connecté
        $trajet = $user->trajets()->findOrFail($id);

        $trajet->fill($validatedData);
        $trajet->save();

        return redirect()->route('trajets.index')->with('success', 'Le trajet a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recherche du trajet par son ID
        $trajet = Trajet::find($id);

        // Vérification si le trajet existe
        if (!$trajet) {
            return redirect()->route('trajets.index')->with('error', 'Trajet introuvable');
        }

        // Supprimez le trajet et ses réservations associées seront également supprimées en cascade
        $trajet->delete();

        return redirect()->route('trajets.index')->with('success', 'Trajet supprimé avec succès');
    }



    /**
     * Show the search form.
     */
    public function searchForm()
    {
        return view('auth.rechercher');
    }

    /**
     * Search for trajets based on the given criteria.
     */


    public function afficherTrajets()
    {
        // Récupérer tous les trajets disponibles avec les informations des conducteurs
        $trajets = Trajet::with('conducteur')->get();
        $trajets = Trajet::paginate(4);
        // Passer les données à la vue
        return view('auth.trajets_dispo', compact('trajets'));
    }

    public function detailsTrajets($id)
    {
        $trajet = Trajet::with('user')->find($id);
        $user = $trajet->user;
        $preferences = $user->preference;
        $voitures = $user->voitures; // Utilisation du pluriel "voitures" pour la relation

        // Ajouter la récupération des réservations associées au trajet
        $reservations = $trajet->reservations;

        return view('auth.details_trajets', compact('trajet', 'user', 'preferences', 'voitures', 'reservations'));
    }


public function trajets($id){
    $trajet = Trajet::with('user')->find($id);
    $user = $trajet->user;
return view('reservations.create',compact('user','trsjet'));
}


public function filtrer(Request $request)
{
    $query = Trajet::where('role', 'conducteur');

    // Filtrer par date
    if ($request->has('date')) {
        try {
            $date = Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
            $query->whereDate('date_depart', $date);
        } catch (\Exception $e) {
            // Gérer l'erreur de format de date ici si nécessaire
        }
    }

    // Filtrer par confort (prix par place inférieur ou égal à 700)
    if ($request->has('confort')) {
        try {
            $query->where('prix_par_place', '<=', 700);
        } catch (\Exception $e) {
            // Gérer l'erreur éventuelle liée au filtre de confort ici
        }
    }

    // Filtrer par heure
    if ($request->has('heure')) {
        try {
            $heure = $request->heure;
            $heureFormatted = Carbon::createFromFormat('H:i', $heure)->format('H:i:s');
            $query->whereTime('heure_depart', '>=', $heureFormatted);
        } catch (\Exception $e) {
            // Gérer l'erreur de format d'heure ici si nécessaire
        }
    }

    $trajets = $query->paginate(10); // 10 est le nombre d'éléments à afficher par page

    return view('auth.trajets_dispo', compact('trajets'));
}


public function search(Request $request)
{
    // Get the form input values
    $villeDeDepart = $request->input('ville_de_depart');
    $villeDArrivee = $request->input('ville_d_arrivee');
    $heureDepart = $request->input('heure_depart');
    $dateDepart = $request->input('date_depart');

    // Query the database to search for trajets based on the input values
    $trajets = Trajet::query()
        ->when($villeDeDepart, function ($query, $villeDeDepart) {
            return $query->where('ville_de_depart', 'like', "%$villeDeDepart%");
        })
        ->when($villeDArrivee, function ($query, $villeDArrivee) {
            return $query->where('ville_d_arrivee', 'like', "%$villeDArrivee%");
        })
        ->when($heureDepart, function ($query, $heureDepart) {
            return $query->where('heure_depart', '=', $heureDepart);
        })
        ->when($dateDepart, function ($query, $dateDepart) {
            return $query->where('date_depart', '=', $dateDepart);
        })
        ->paginate(10); // Adjust the pagination limit as needed

    // Pass the search results to the view
    return view('auth.trajets_dispo', compact('trajets'));
}
public function manage()
{
    $trajets = Trajet::with('user')->get();
    return view('gestion', compact('trajets'));
}


public function annuler($id)
{
    // Recherche du trajet par son ID
    $trajet = Trajet::find($id);

    // Vérification si le trajet existe
    if (!$trajet) {
        return redirect()->route('trajets.index')->with('error', 'Trajet introuvable');
    }

    // Vérifier si l'utilisateur connecté est le conducteur du trajet
    if ($trajet->user_id !== Auth::id()) {
        return redirect()->route('trajets.index')->with('error', 'Vous n\'êtes pas autorisé à annuler ce trajet');
    }

    // Ajouter ici votre logique pour gérer l'annulation du trajet
    // Par exemple, mettre à jour l'état du trajet, enregistrer le motif d'annulation, etc.

    // Une fois l'annulation effectuée, vous pouvez rediriger l'utilisateur vers la page appropriée avec un message de succès
    return redirect()->route('trajets.index')->with('success', 'Le trajet a été annulé avec succès.');
}


}
