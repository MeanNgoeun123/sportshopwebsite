<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ShippingAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('frontend.checkout.index', compact('cartItems'));
    }

    public function shipping()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('shop')
                ->with('error', 'Your cart is empty.');
        }

        return view('frontend.checkout.shipping', compact('cartItems'));
    }

    public function storeShipping(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string',
            'city'     => 'required|string|max:100',
            'province' => 'required|string|max:100',
        ]);

        $shipping = ShippingAddress::create([
            'user_id'  => auth()->id(),
            'fullname' => $request->fullname,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'city'     => $request->city,
            'province' => $request->province,
        ]);

        session(['shipping_id' => $shipping->id]);

        return redirect()->route('checkout.payment');
    }

    public function payment()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('checkout.shipping')
                ->with('error', 'Cart is empty.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = 5;
        $total_price = $subtotal + $shipping;

        return view('frontend.checkout.payment', compact(
            'cartItems',
            'subtotal',
            'shipping',
            'total_price'
        ));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string'
        ]);

        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('checkout.shipping')
                ->with('error', 'Cart is empty.');
        }

        if (!session()->has('shipping_id')) {
            return redirect()
                ->route('checkout.shipping')
                ->with('error', 'Shipping information missing.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = 5;
        $total_price = $subtotal + $shipping;

        // ✅ Create Order
        $order = Order::create([
            'user_id'        => auth()->id(),
            'total_price'    => $total_price,
            'payment_method' => $request->payment_method,
            'shipping_id'    => session('shipping_id'),
            'status'         => 'pending',
        ]);

        // ✅ Create Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // ✅ Create Payment
        Payment::create([
            'order_id'       => $order->id,
            'amount'         => $total_price,
            'payment_method' => $request->payment_method,
            'payment_status' => 'paid',
        ]);

        // ✅ Clear cart
        Cart::where('user_id', auth()->id())->delete();

        // ✅ Clear session
        session()->forget('shipping_id');

        return redirect()
            ->route('checkout.success')
            ->with('success', 'Order placed successfully.');
    }

    public function success()
    {
        return view('frontend.checkout.success');
    }
}