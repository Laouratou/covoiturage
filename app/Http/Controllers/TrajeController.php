<?php
namespace App\Http\Controllers;

use App\Models\Traje;
use Illuminate\Http\Request;

class TrajeController extends Controller
{
    public function create()
    {
        return view('trajets.finalisation');
    }
    /**
     * Traiter la finalisation du trajet.
     */
    public function store(Request $request)
    {
        // Récupérer les données du formulaire
        $villeDepart = $request->input('villeDepart');
        $prix = $request->input('prix');
        $modePaiement = $request->input('modePaiement');
        $numeroMobileMoney = $request->input('numeroMobileMoney');

        // Valider les données
        $validatedData = $request->validate([
            'villeDepart' => 'required',
            'prix' => 'required|numeric|min:500',
            'modePaiement' => 'required',
            'numeroMobileMoney' => 'nullable|numeric',
        ]);

        // Créer une nouvelle instance du trajet
        $trajet = new Traje();
        $trajet->ville_depart = $validatedData['villeDepart'];
        $trajet->prix = $validatedData['prix'];
        $trajet->mode_paiement = $validatedData['modePaiement'];
        $trajet->numero_mobile_money = $validatedData['numeroMobileMoney'];

        // Enregistrer le trajet dans la base de données
        $trajet->save();

        // Passer la variable $trajet à la vue
        return view('trajets.finalisation')->with('trajet', $trajet)->with('success', 'Trajet finalisé avec succès.');
    }
}
