<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display cart items
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('frontend.cart.index', compact('cartItems'));
    }

    /**
     * Add product to cart
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }

        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity'   => ['required', 'integer', 'min:1']
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity
            ]);
        }

        return redirect()->back()
            ->with('success', 'Product added to cart successfully.');
    }

    /**
     * Update cart quantity
     */
    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => ['required', 'integer', 'min:1']
        ]);

        $cart->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()
            ->with('success', 'Cart updated successfully.');
    }

    /**
     * Remove item from cart
     */
    public function destroy(Cart $cart)
    {
        if ($cart->user_id != Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->back()
            ->with('success', 'Item removed from cart.');
    }

    /**
     * Clear all cart items
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->back()
            ->with('success', 'Cart cleared successfully.');
    }
}