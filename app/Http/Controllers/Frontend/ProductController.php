<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['category','brand','reviews.user'])
            ->findOrFail($id);

        return view('frontend.shop.show', compact('product'));
    }
}