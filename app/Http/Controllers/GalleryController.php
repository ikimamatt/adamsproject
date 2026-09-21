<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('gallery_images', 'public');

        Gallery::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery successfully added.');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete('public/' . $gallery->image);

            // Upload the new image
            $imagePath = $request->file('image')->store('gallery_images', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery successfully updated.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete the image from storage
        Storage::delete('public/' . $gallery->image);

        // Delete the gallery record
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery successfully deleted.');
    }
}
