<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payment_method',
        'shipping_id'
    ];

    protected $casts = [
        'total_price' => 'decimal:2'
    ];

    // ✅ USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ ORDER ITEMS (FIXED NAME)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    // ✅ PAYMENT
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // ✅ SHIPPING
    public function shipping()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_id');
    }
}