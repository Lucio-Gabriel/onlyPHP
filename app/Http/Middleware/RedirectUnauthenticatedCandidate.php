<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectUnauthenticatedCandidate
{
    /**
     * Redireciona para login se o candidato não estiver autenticado.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('login.candidate');
        }

        return $next($request);
    }
}
