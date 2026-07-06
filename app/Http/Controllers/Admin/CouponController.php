<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', compact('coupons'));
    }

=======
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
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
    public function create()
    {
        return view('admin.coupons.create');
    }

<<<<<<< HEAD
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
=======
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
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
<<<<<<< HEAD
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
=======
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
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
    }
}