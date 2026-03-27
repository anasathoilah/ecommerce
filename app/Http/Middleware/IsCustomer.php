<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCustomer
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user login dan role = customer
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request);
        }

        abort(403, 'Unauthorized - hanya customer yang boleh');
    }
}
