<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    public function create()
    {
        return view('auth.alerte');
    }

    public function store(Request $request)
    {
        $request->validate([
            'newsletter' => '|boolean',
            'declare_covoiturages' => '|boolean',
        ]);

        // Si les données du formulaire sont valides, nous enregistrons l'alerte dans la base de données
        Alerte::create([
            'newsletter' => $request->input('newsletter'),
            'declare_covoiturages' => $request->input('declare_covoiturages'),
        ]);

        // Autres actions à effectuer après l'enregistrement...

        return redirect()->back()->with('success', 'Les éléments ont été enregistrés avec succès.');
    }
}
