<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifySessionIntegrity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (session()->has('user_agent') && session('user_agent') !== $request->userAgent()) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();
                abort(401, 'Session integrity check failed');
            }

            if (!session()->has('user_agent')) {
                session(['user_agent' => $request->userAgent()]);
            }
        }

        return $next($request);
    }
}
