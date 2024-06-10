<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminPermission
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            // If the user is authenticated and has role = 1 (admin), allow them to proceed
            return $next($request);
        }

        // If the user is not an admin or not authenticated, you may handle this case as needed.
        // For example, you could redirect them to the home page or an unauthorized page.
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
}
