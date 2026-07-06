<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'address',
        'city',
        'province',
        'postal_code'
    ];

    protected $casts = [ 
        'user_id' => 'integer', 
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}