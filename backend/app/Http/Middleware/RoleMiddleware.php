<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $checkRole = in_array($request->user()->role->name, $roles);

        if (!$checkRole) {

            return $request->expectsJson() ? response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'You don\'t have the right role',
            ], 403) : abort(403, 'You don\'t have the right role');
        }

        return $next($request);
    }
}
