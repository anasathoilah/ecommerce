<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
     public function index()
    {   
        $products = Product::all(); // ambil semua produk
        return view('home', compact('products'));
        return view('home'); // buat file resources/views/home.blade.php
    }
}
