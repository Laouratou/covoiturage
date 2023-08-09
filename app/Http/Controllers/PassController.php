<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trajet;

class PassController extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Compter le nombre de trajets de l'utilisateur connecté
        $nombreTrajetsPublies = $user->trajets()->count();

        // Récupérer tous les trajets de l'utilisateur connecté
        $trajets = $user->trajets;

        // Passer le nombre de trajets publiés et les trajets à la vue
        return view('auth.pass', compact('nombreTrajetsPublies', 'trajets'));
    }
}
