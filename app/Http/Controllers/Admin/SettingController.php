<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $settings = [
            'shop_name' => Setting::get('shop_name', 'Brew Haven'),
            'shop_email' => Setting::get('shop_email', ''),
            'shop_phone' => Setting::get('shop_phone', ''),
            'shop_address' => Setting::get('shop_address', ''),
            'about_us' => Setting::get('about_us', ''),
            'facebook' => Setting::get('facebook', ''),
            'twitter' => Setting::get('twitter', ''),
            'instagram' => Setting::get('instagram', ''),
        ];

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_email' => 'required|email',
            'shop_phone' => 'required|string|max:20',
            'shop_address' => 'required|string',
            'about_us' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully');
    }
}
