<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required|string|max:255',
            'discount'    => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        Coupon::create([
            'code'        => $request->code,
            'discount'    => $request->discount,
            'expiry_date' => $request->expiry_date,
        ]);

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon created successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
            'code'        => 'required|string|max:255',
            'discount'    => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $coupon->update([
            'code'        => $request->code,
            'discount'    => $request->discount,
            'expiry_date' => $request->expiry_date,
        ]);

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon updated successfully');
    }

    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon deleted successfully');
    }
}