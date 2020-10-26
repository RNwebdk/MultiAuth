<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Admin role = 1
        if (Auth::user()->role == 1) {
            return redirect()->route('admin');
        }

        // Manager role = 2
        if (Auth::user()->role == 2) {
            return redirect()->route('manager');
        }

        // User role = 3
        if (Auth::user()->role == 3) {
            return $next($request);
        }
    }
}
