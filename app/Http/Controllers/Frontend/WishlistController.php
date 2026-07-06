<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('frontend.wishlist.index', compact('wishlists'));
    }

    // ✅ ADD TO WISHLIST (SAFE VERSION)
    public function add($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first');
        }

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()
                ->with('error', 'Product not found');
        }

        $exists = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->with('error', 'Already in wishlist');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
        ]);

        return redirect()->back()
            ->with('success', 'Added to wishlist');
    }

    // ✅ REMOVE FROM WISHLIST
    public function remove($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->delete();

        return redirect()->back()
            ->with('success', 'Removed from wishlist');
    }
}