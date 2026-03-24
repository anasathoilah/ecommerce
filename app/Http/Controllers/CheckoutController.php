<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
    $cartItems = CartItem::where('user_id', Auth::id())
    ->with('product')
    ->get();
    return view('checkout', compact('cartItems'));
}

public function process(Request $request) {
        $request->validate([
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Simpan order ke database (buat model Order)
        // Kosongkan cart user setelah checkout

        return redirect()->route('home')->with('success', 'Pesanan berhasil diproses!');
    }
}
