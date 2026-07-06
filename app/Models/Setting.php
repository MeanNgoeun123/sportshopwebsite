<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'email',
        'phone',
        'currency',
        'logo',
        'address',
    ];

    // Default values if empty
    public static function getSettings()
    {
        return self::first() ?? new self([
            'site_name' => 'SportShop',
            'currency' => 'USD',
        ]);
    }
}