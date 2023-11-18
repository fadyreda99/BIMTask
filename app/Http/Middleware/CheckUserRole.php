<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->user()->hasRole($role)) {
            // abort(403, 'Unauthorized action.'); // You can customize the response as needed
            return response()->json(['error' => 'not authorized for you'], 403);
        }

        return $next($request);
    }
}
