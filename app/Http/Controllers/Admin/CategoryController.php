<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
=======
use Illuminate\Support\Str;
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
<<<<<<< HEAD
            'name'  => 'required|string|max:255',
=======
            'name' => 'required|string|max:255',
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
<<<<<<< HEAD
            $imagePath = $request->file('image')
                ->store('upload/categories', 'public');
        }

        Category::create([
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.categories.index')
=======
            $imagePath = $request->file('image')->store('upload/categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
            ->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
<<<<<<< HEAD

=======
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
<<<<<<< HEAD
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('image')) {

            // Delete old image
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // Upload new image
            $data['image'] = $request->file('image')
                ->store('upload/categories', 'public');
        }

        $category->update($data);

        return redirect()
            ->route('admin.categories.index')
=======
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // optional: delete old image
            if ($category->image && file_exists(storage_path('app/public/' . $category->image))) {
                unlink(storage_path('app/public/' . $category->image));
            }

            $category->image = $request->file('image')
                ->store('upload/categories', 'public');
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.categories.index')
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
            ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

<<<<<<< HEAD
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
=======
        // delete image
        if ($category->image && file_exists(storage_path('app/public/' . $category->image))) {
            unlink(storage_path('app/public/' . $category->image));
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
        }

        $category->delete();

<<<<<<< HEAD
        return redirect()
            ->route('admin.categories.index')
=======
        return redirect()->route('admin.categories.index')
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
            ->with('success', 'Category deleted successfully');
    }
}