<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Card
Route::resource('cart', [HomeController::class, 'index'])->middleware('auth');


// Products
Route::resource('products', ProductController::class);

// Dengan Route resource otomatis akan menambahkan route ini :
// /products → index (daftar produk)
// /products/{id} → show (detail produk)
// /products/create → create (form tambah produk)
// /products (POST) → store (simpan produk baru)
// /products/{id}/edit → edit (form edit produk)
// /products/{id} (PUT/PATCH) → update (update produk)
// /products/{id} (DELETE) → destroy (hapus produk)

// GET /products	products.index
// GET /products/create	products.create
// POST /products	products.store
// GET /products/{id}	products.show
// GET /products/{id}/edit	products.edit
// PUT/PATCH /products/{id}	products.update
// DELETE /products/{id}	products.destroy

// Login 
Route::get('/login' , [AuthController::class, 'showLogin'])->name('login');
Route::post('/login' , [AuthController::class, 'login']);

// Register (add account)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/', function () {
    return view('welcome');
});
