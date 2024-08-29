<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiCsrfMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('api/*')) {
            // Bypass CSRF for API routes
            return $next($request);
        }

        // Apply CSRF protection
        return $next($request);
    }
}
