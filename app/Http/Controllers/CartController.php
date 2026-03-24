<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function index() {
         $cartItems =  CartItem::where('user_id', Auth::id())
         ->with('product')
         ->get();
         return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request) 
{   
    
    $cartItem = CartItem::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)
        ->first();

    if ($cartItem) {
        // kalau sudah ada, tambahkan quantity
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
        // kalau belum ada, buat baru
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang');
}
    public function destroy($id) {

    $cartItem = CartItem::where('id', $id)
    ->where('user_id', Auth::id())
    ->first();

    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang');
    }
        return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan');
    }
    public function create() {
    $products = Product::all();
    return view('cart.create', compact('products'));
}


}
