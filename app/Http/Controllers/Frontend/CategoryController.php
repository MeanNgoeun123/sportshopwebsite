<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);

        $products = $category->products()->latest()->get();

        return view('frontend.category.show', compact('category', 'products'));
    }
}