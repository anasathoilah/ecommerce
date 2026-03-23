<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pemilik keranjang (relasi ke tabel users)
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // produk yang dimasukkan ke keranjang (relasi ke tabel products)
            $table->integer('quantity')->default(1); // jumlah produk
            $table->timestamps(); // kapan barang dimasukkan 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
