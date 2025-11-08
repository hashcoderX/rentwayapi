<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        $response = $next($request);
        if (method_exists($response, 'header')) {
            $response->header('Content-Type', 'application/json');
        }
        return $response;
    }
}
