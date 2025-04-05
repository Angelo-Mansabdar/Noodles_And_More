<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has the 'admin' role
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirect to login page if not authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Adjust the route name if needed
        }

        // Redirect to home page if the user doesn't have an admin role
        return redirect('/');
    }
}
