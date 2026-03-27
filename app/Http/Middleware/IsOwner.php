<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsOwner
{
    public function handle(Request $request, Closure $next)
    {
        $order = $request->route('orders'); 
        // Pastikan route binding sudah pakai model Order

        if ($order && Auth::check() && $order->user_id !== 'customer') {
            return $next($request);
        }

        abort(403, 'Unauthorized - hanya pemilik order yang boleh');
    }
}
