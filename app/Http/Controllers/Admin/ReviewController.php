<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Show all reviews
     */
    public function index()
    {
        $reviews = Review::with(['product', 'user'])->latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show single review
     */
    public function show(string $id)
    {
        $review = Review::with(['product', 'user'])->findOrFail($id);

        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Delete review
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review deleted successfully');
    }

    /**
     * OPTIONAL: approve review system
     */
    public function approve(string $id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'approved';
        $review->save();

        return back()->with('success', 'Review approved');
    }
}