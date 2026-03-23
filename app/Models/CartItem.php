<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
