<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('category','brand')
            ->latest()
            ->paginate(12);

        return view('frontend.shop.index', compact('products'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);

        $products = Product::where('category_id', $id)
            ->latest()
            ->paginate(12);

        return view('frontend.shop.category', compact('category','products'));
    }
}