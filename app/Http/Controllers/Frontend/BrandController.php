<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        $products = $brand->products()->latest()->get();

        return view('frontend.brand.show', compact('brand', 'products'));
    }
}