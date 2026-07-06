<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Review;
use App\Models\OrderItem;
use App\Models\Wishlist;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean'
    ];

    // CATEGORY
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // BRAND (IMPORTANT FIX)
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // CARTS
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // REVIEWS
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // ORDER ITEMS
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // WISHLISTS
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}