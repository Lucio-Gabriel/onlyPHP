<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedCandidate
{
    /**
     * Redireciona o candidato logado para a dashboard de candidato
     * ao tentar acessar login ou register
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (! empty($user->is_candidate)) {
                return redirect()->route('index');
            }
        }

        return $next($request);
    }
}
