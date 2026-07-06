<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // =====================
        // BASIC COUNTS
        // =====================
        $products = Product::count();
        $orders   = Order::count();
        $users    = User::count();

        // =====================
        // ORDER STATUS
        // =====================
        $pendingOrders = Order::where('status', 'pending')->count();

        $processingOrders = Order::where('status', 'processing')->count();

        $completedOrders = Order::where('status', 'delivered')->count();

        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // =====================
        // REVENUE (ONLY DELIVERED ORDERS)
        // =====================
        $revenue = Order::where('status', 'delivered')
            ->sum('total_price');

        // =====================
        // TOP PRODUCTS (FIXED MYSQL STRICT MODE)
        // =====================
        $topProducts = Product::select(
                'products.id',
                'products.name',
                DB::raw('SUM(order_items.quantity) as total_sold')
            )
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->take(4)
            ->get();

        // =====================
        // RETURN VIEW
        // =====================
        return view('admin.dashboard', compact(
            'products',
            'orders',
            'users',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'cancelledOrders',
            'revenue',
            'topProducts'
        ));
    }
}