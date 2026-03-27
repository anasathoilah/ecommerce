<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

// Card
Route::middleware('auth')->group(function () {
    Route::resource('cart', CartController::class);
});

// Tambah Card
Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');

Route::get('/cart/{product}', [CartController::class, 'store'])->name('cart.store');


// Products
Route::resource('products', ProductController::class);


// Order (lihat riwayat pesanan) 
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/orders/admin', [OrderController::class, 'adminIndex'])->name('orders.adminIndex');
     Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
}) ;


// Admin (update status pesanan)
// Route::middleware(['auth','isCustomer'])->group(function () {
//     Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
//     Route::get('/orders/admin', [OrderController::class, 'adminIndex'])->name('orders.adminIndex');
// });
Route::middleware(['auth','isAdmin'])->get('/admin/test', function () {
    return "Halo Admin!";
});


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

// Checkout
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

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
