<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'status' => 'nullable|boolean',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('upload/brands', 'public');
        }

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ?? 1,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand created successfully');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'status' => 'nullable|boolean',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {

            if ($brand->logo && file_exists(storage_path('app/public/' . $brand->logo))) {
                unlink(storage_path('app/public/' . $brand->logo));
            }

            $brand->logo = $request->file('logo')
                ->store('upload/brands', 'public');
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status ?? 1;

        $brand->save();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->logo && file_exists(storage_path('app/public/' . $brand->logo))) {
            unlink(storage_path('app/public/' . $brand->logo));
        }

        $brand->delete();

        return back()->with('success', 'Brand deleted successfully');
    }
}