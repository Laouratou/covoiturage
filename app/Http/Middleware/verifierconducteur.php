<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifierConducteur
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et qu'il est conducteur
        if (auth()->check() && auth()->user()->estConducteur()) {
            // Vérifier si l'utilisateur est également un administrateur
            if (auth()->user()->estAdmin()) {
                // Autoriser l'accès pour l'administrateur
                return $next($request);
            }

            // Si l'utilisateur est un conducteur mais pas un administrateur, renvoyer une réponse 403
            abort(403, "Accès refusé. Vous devez être un passager pour accéder à cette ressource.");
        }

        // Si l'utilisateur n'est pas un conducteur, laissez-le passer vers la route demandée
        return $next($request);
    }
}
