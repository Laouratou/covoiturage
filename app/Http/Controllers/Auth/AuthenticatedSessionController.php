<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    // Ajoutez votre logique de redirection en fonction du rôle de l'utilisateur
    if (Auth::user()->role === 'conducteur') {
        return redirect('/pass'); // Redirige les conducteurs vers /pass
    } elseif (Auth::user()->role === 'passager') {
        return redirect('/conducteurs'); // Redirige les passagers vers /conducteurs
    } elseif (Auth::user()->role === 'admin') {
        return redirect('dashboard'); // Redirige les admins vers le tableau de bord
    } else {
        return redirect(RouteServiceProvider::HOME);
    }
}



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
