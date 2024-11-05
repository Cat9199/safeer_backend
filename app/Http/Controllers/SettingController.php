<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Settings::firstOrCreate([], [
            'domain' => 'http://localhost:8000',
            'email' => 'test@gmail.com',
            'phone' => '1234567890',
            'address' => 'Dhaka, Bangladesh',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'whatsapp' => 'https://www.whatsapp.com/',
            'about_us' => 'About us',
            'terms_and_conditions' => 'Terms and conditions',
            'privacy_policy' => 'Privacy policy'
        ]);

        return view('backend.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validate the request fields
        $request->validate([
            'domain' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'about_us' => 'nullable|string',
            'terms_and_conditions' => 'nullable|string',
            'privacy_policy' => 'nullable|string',
        ]);

        // Update settings
        $settings = Settings::first();
        $settings->update($request->all());

        return redirect()->route('admin.settings.index')->with('success', __('Settings updated successfully.'));
    }
}