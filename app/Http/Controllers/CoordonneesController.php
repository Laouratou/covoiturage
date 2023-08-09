<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CoordonneesController extends Controller
{
    
    public function afficherCoordonnees()
    {
        $users = Auth::user();
        $coordonnees = [
            'email' => $users->email,
            'telephone' => $users->telephone,
        ];

        return view('auth.cooordonnees', compact('coordonnees','users'));
    }
}
