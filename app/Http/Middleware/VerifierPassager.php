<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifierPassager
{


    public function handle(Request $request, Closure $next)
        {
            // Check if the user is authenticated and is a conductor
            if (auth()->check() && auth()->user()->role === 'conducteur') {
                // If the user is a conductor, allow access to the URL
                return $next($request);
            }

            // If the user is not authenticated or is not a conductor, deny access with a 403 response
            abort(403, "Accès refusé. Vous devez être un conducteur pour accéder à cette ressource.");
        }
    }


