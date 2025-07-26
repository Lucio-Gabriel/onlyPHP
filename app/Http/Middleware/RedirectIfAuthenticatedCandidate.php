<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedCandidate
{
    /**
     * Redireciona o candidato logado para a dashboard
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (! empty($user?->isCandidate())) {
                return redirect()->route('index');
            }
        }

        return $next($request);
    }
}
