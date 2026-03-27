<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $ordersCount = Order::count();
        $productsCount = Product::count();
        $usersCount = User::count();
        return view('admin.dashboard'); // buat file resources/views/admin/dashboard.blade.php
    }
    
}
