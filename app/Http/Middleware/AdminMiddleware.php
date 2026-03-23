<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // cek apakah role user adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home');
        }     

        return $next($request);
    }
}
