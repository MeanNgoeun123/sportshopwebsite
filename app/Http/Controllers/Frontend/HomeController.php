<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        // Latest Products
        $products = Product::latest()->take(8)->get();

        // Categories
        $categories = Category::latest()->get();

        // Sliders
        $sliders = Slider::latest()->get();

        // Brands
        $brands = Brand::latest()->get();

        return view('frontend.home', [
            'products'   => $products,
            'categories' => $categories,
            'sliders'    => $sliders,
            'brands'     => $brands,
        ]);
    }
}

