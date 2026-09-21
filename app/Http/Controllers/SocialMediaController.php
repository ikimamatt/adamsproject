<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    public function index()
    {
    $socialMedia = SocialMedia::first() ?? new SocialMedia();
    return view('admin.socialmedia', compact('socialMedia'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'instagram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $socialMedia = SocialMedia::first() ?? new SocialMedia();
        $socialMedia->fill($request->only(['instagram', 'facebook', 'tiktok', 'twitter']));
        $socialMedia->save();

        return redirect()->route('social-media.index')->with('success', 'Social media links updated successfully.');
    }

    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        return redirect()->route('social-media.index')->with('success', 'Social media links deleted successfully.');
    }
}
