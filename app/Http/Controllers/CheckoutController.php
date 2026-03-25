<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
    $cartItems = CartItem::where('user_id', Auth::id())
    ->with('product')
    ->get();
    return view('cart.checkout', compact('cartItems'));
}

public function process(Request $request) {
        $request->validate([
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Simpan order ke database (buat model Order)
        // Kosongkan cart user setelah checkout

        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
        $total = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);
         $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => $total,
        ]);
         foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }
        CartItem::where('user_id', Auth::id())->delete();
        return redirect()->route('home')->with('success', 'Pesanan berhasil diproses!');
    }
}
