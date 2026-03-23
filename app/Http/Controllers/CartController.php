<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
         $cartItems =  CartItem::where('user_id', auth()->id())
         ->with('product')
         ->get();
         return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request) 
{
    $cartItem = CartItem::where('user_id', auth()->id())
        ->where('product_id', $request->product_id)
        ->first();

    if ($cartItem) {
        // kalau sudah ada, tambahkan quantity
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
        // kalau belum ada, buat baru
        CartItem::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang');
}

    // public function store(Request $request) 
    // {
    //     CartItem::updateOrCreate(
    //         ['user_id' => auth()->id(), 'product_id' => $request->product_id],
    //         ['quantity' => DB::raw('quantity + ' . $request->quantity)]
    //         );
    //         return redirect()->route('cart.index')->with('succes', ' Produk ditambahkan ke keranjang');
    // }
    public function destroy($id) {
        CartItem::where('id', $id)->where('user_id', auth()->id())->delete();
        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang');
    }
}
