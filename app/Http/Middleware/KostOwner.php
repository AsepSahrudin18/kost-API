<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if ($request->user() && $request->user()->role_id === 2) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
