<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Display the logo management page
     */
    public function index()
    {
        $logo = Logo::first();
        return view('admin.logo', compact('logo'));
    }

    /**
     * Update the logo
     */
    public function update(Request $request)
    {
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logo = Logo::first();

        if (!$logo) {
            $logo = new Logo();
        }

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($logo->profile_image && Storage::exists('public/' . $logo->profile_image)) {
                Storage::delete('public/' . $logo->profile_image);
            }

            // Store the new image
            $imagePath = $request->file('profile_image')->store('logos', 'public');
            $logo->profile_image = $imagePath;
        }

        $logo->save();

        return redirect()->route('logo.index')->with('success', 'Logo has been updated successfully');
    }
}
