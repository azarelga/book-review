<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
        if (Auth::user()->role === $role) {
            return $next($request);
        }

        // If user doesn't have the required role, return a 403 Forbidden response or redirect
        abort(403, 'Unauthorized');
    }
}
