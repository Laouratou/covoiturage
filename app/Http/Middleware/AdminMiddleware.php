<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        }

        // Vérifier si l'utilisateur est un administrateur (vous devez adapter cette condition selon votre implémentation de rôles)
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès interdit'); // Retourner une réponse 403 (Accès interdit) si l'utilisateur n'est pas un administrateur
        }

        return $next($request);
    }
}
