<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCustomerUuid
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->route('uuid');
        
        if ($request->user() && $request->user()->uuid !== $uuid) {
            abort(403, 'Unauthorized access to this dashboard.');
        }

        return $next($request);
    }
}
