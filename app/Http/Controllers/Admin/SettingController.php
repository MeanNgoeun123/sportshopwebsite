<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'email' => 'nullable|email',
        ]);

        $settings = Setting::first();

        if (!$settings) {
            $settings = new Setting();
        }

        $settings->site_name = $request->site_name;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->currency = $request->currency;
        $settings->address = $request->address;

        $settings->save();

        return back()->with('success', 'Settings updated successfully');
    }
}