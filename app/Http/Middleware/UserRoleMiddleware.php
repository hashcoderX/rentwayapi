<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Usage: ->middleware('userrole:admin|manager')
     */
    public function handle(Request $request, Closure $next, string $roles = ''): Response
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        if ($roles === '') {
            return $next($request);
        }

        $allowed = collect(explode('|', $roles))->map(fn($r) => trim(strtolower($r)))->filter();
        $userType = strtolower((string)($user->usertype ?? ''));

        if ($allowed->isEmpty() || $allowed->contains($userType)) {
            return $next($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Forbidden',
        ], 403);
    }
}
