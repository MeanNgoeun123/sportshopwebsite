<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show contact page
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save to database or send email here

        return redirect()
            ->back()
            ->with('success', 'Message sent successfully!');
    }
}