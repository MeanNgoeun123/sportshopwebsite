<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
<<<<<<< HEAD
    public function index(Request $request)
    {
        
        $query = Order::with('user');

        // 🔍 Search (order ID or user name)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // 📌 Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 📅 Date filter
        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('created_at', [
                $request->from . ' 00:00:00',
                $request->to . ' 23:59:59'
            ]);
        }

        // ❗ IMPORTANT FIX: paginate (NOT get)
        $orders = $query->latest()->paginate(10);
=======
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

        return view('admin.orders.index', compact('orders'));
    }

<<<<<<< HEAD
=======
    /**
     * Display the specified order.
     */
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
    public function show(Order $order)
    {
        $order->load('user');

        return view('admin.orders.show', compact('order'));
    }

<<<<<<< HEAD
    public function update(Request $request, Order $order)
    {
        
=======
    /**
     * Update the order status.
     */
    public function update(Request $request, Order $order)
    {
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

<<<<<<< HEAD
        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }

=======
        $order->status = $request->status;
        $order->save();

        return redirect()
            ->route('admin.orders.show', $order->id)
            ->with('success', 'Order status updated successfully.');
    }

    /**
     * Remove the specified order.
     */
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
<<<<<<< HEAD
    public function updateStatus(Request $request, Order $order)
{
    $order->update([
        'status' => $request->status
    ]);

    return response()->json([
        'success' => true,
        'status' => $order->status
    ]);
}
=======
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
}