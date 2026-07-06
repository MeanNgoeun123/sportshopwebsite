<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_price,
            'payment_method' => $request->payment_method,
            'payment_status' => 'paid',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Payment submitted successfully.');
    }
}