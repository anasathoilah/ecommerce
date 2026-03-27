<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  const STATUS_PENDING = 'pending';
  const STATUS_PAID = 'paid';
  const STATUS_SHIPPED = 'shipped';
  const STATUS_COMPLETED = 'completed';


   protected $fillable = [
        'user_id',
        'address',
        'payment_method',
        'total_price',
        'status',
    ];
    // Relasi ke user (pemilik order)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi ke item pesanan
  public function items() {
    return $this->hasMany(OrderItem::class);
}

}
