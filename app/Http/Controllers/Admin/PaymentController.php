<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show all payments
     */
    public function index()
    {
        $payments = Payment::with('order')->latest()->get();

        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show single payment
     */
    public function show(string $id)
    {
        $payment = Payment::with('order')->findOrFail($id);

        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Update payment status (paid / pending / failed)
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,paid,failed'
        ]);

        $payment->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Payment status updated');
    }

    /**
     * Delete payment record
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return back()->with('success', 'Payment deleted');
    }
}