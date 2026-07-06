<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Show all coupons
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store coupon
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount' => 'required|numeric|min:1|max:100',
            'type' => 'required|in:percent,fixed',
            'expires_at' => 'nullable|date',
        ]);

        Coupon::create([
            'code' => strtoupper($request->code),
            'discount' => $request->discount,
            'type' => $request->type,
            'expires_at' => $request->expires_at,
            'status' => 'active',
        ]);

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon created successfully');
    }

    /**
     * Show single coupon (optional)
     */
    public function show(string $id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupons.show', compact('coupon'));
    }

    /**
     * Edit coupon
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update coupon
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:coupons,code,' . $id,
            'discount' => 'required|numeric|min:1|max:100',
            'type' => 'required|in:percent,fixed',
            'expires_at' => 'nullable|date',
        ]);

        $coupon->update([
            'code' => strtoupper($request->code),
            'discount' => $request->discount,
            'type' => $request->type,
            'expires_at' => $request->expires_at,
        ]);

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon updated successfully');
    }

    /**
     * Delete coupon
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return back()->with('success', 'Coupon deleted successfully');
    }
}