<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('upload/sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagePath,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'status' => 1,
        ]);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider created successfully');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'title',
            'subtitle',
            'button_text',
            'button_link',
            'status'
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($slider->image && file_exists(storage_path('app/public/' . $slider->image))) {
                unlink(storage_path('app/public/' . $slider->image));
            }

            $data['image'] = $request->file('image')
                ->store('upload/sliders', 'public');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully');
    }

    public function destroy(Slider $slider)
    {
        // delete image
        if ($slider->image && file_exists(storage_path('app/public/' . $slider->image))) {
            unlink(storage_path('app/public/' . $slider->image));
        }

        $slider->delete();

        return back()->with('success', 'Slider deleted successfully');
    }
}