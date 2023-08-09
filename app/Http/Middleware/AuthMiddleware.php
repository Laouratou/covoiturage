<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié
        return redirect()->route('login');
    }
}
