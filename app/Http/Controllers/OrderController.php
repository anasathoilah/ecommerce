<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.product')->get();
        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success','Status pesanan diperbarui');
    }
    public function adminIndex()
{
    // Ambil semua pesanan untuk admin
    $orders = Order::with('items.product', 'user')->latest()->get();

    // Buat view khusus admin
    return view('orders.adminIndex', compact('orders'));
}

public function destroy(Order $order)
{
    $order->delete();
    return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus');


}


}

