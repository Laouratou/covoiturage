<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PreferenceController extends Controller
{
    public function create()
    {
        return view('preference');
    }

    public function edit()
    {
        $user = Auth::user();
        $preference = $user->preference;

        return view('preference.edit', compact('preference'));
    }

    public function index()
    {
        $user = Auth::user();
        $preference = $user->preference;

        // Vérification si le conducteur a des préférences enregistrées
        if (!$preference) {
            return redirect()->route('preferences.create')->with('message', 'Vous devez remplir vos préférences avant de continuer.');
        }

        return view('preference.index', compact('preference'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'espace_bagage' => 'required',
            'nmbre_passager' => 'required',
            // Ajoutez ici la validation pour les autres champs de formulaire
        ]);

        $user = Auth::user();
        $preference = $user->preference;

        // Vérifiez si le conducteur a des préférences enregistrées
        if (!$preference) {
            return redirect()->route('preferences.create')->with('message', 'Vous devez remplir vos préférences avant de continuer.');
        }

        // Mettez à jour les préférences existantes avec les données validées
        $preference->update($validatedData);

        return redirect()->route('preferences.index')->with('success', 'Vos préférences ont été mises à jour avec succès.');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'espace_bagage' => 'required',
        'nmbre_passager' => 'required',
        'preferencesup' => 'array',
        'preferencesup.*' => 'nullable',
        'comment' => 'nullable',
        'num_paiement' => ['required', 'regex:/^\+226[0-9]{8}$/'],
        'compte_mobile' => 'required',
    ]);

    $user = Auth::user();

    // Vérifier si le conducteur a déjà des préférences enregistrées
    if ($user->preference) {
        throw ValidationException::withMessages([
            'preference' => 'Vous avez déjà enregistré vos préférences.',
        ]);
    }

    // Convertir les cases cochées en une chaîne séparée par des virgules
    $preferencesup = isset($validatedData['preferencesup']) ? implode(',', $validatedData['preferencesup']) : '';

    // Créer une nouvelle instance de modèle Preference
    $preference = new Preference([
        'espace_bagage' => $validatedData['espace_bagage'],
        'nmbre_passager' => $validatedData['nmbre_passager'],
        'preferencesup' => $preferencesup,
        'comment' => $validatedData['comment'],
        'num_paiement' => $validatedData['num_paiement'],
        'compte_mobile' => $validatedData['compte_mobile'],
    ]);

    // Enregistrer le modèle Preference dans la base de données
    $user->preference()->save($preference);

    // Autres opérations ou redirection après l'enregistrement
    return redirect()->route('preferences.index')->with('success', 'Vos préférences ont été enregistre avec succes.');
}

public function destroy()
{
    $user = Auth::user();
    $preference = $user->preference;

    // Vérifier si le conducteur a des préférences enregistrées
    if ($preference) {
        $preference->delete();
        return redirect()->route('preferences.create')->with('message', 'Votre préférence a été supprimée. Vous pouvez maintenant créer une nouvelle préférence.');
    }

    return redirect()->route('preferences.create')->with('message', 'Vous n\'avez aucune préférence existante.');
}


}
