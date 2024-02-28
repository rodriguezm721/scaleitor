<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Verifica si el usuario tiene al menos uno de los roles proporcionados
        if (Auth::check() && Auth::user()->hasAnyRole($roles)) {
            return $next($request);
        }
        Auth::logout();
        // Si no tiene el rol, redirige al login con un mensaje de error
        return redirect()->route('auth.signin')->withErrors(['error' => 'No tienes permisos para acceder a esta página.']);
    }

    
}
