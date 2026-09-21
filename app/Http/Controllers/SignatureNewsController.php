<?php
// app/Http/Controllers/SignatureNewsController.php

namespace App\Http\Controllers;

use App\Models\SignatureNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SignatureNewsController extends Controller
{
    public function index()
    {
        $news = SignatureNews::latest('created_at')->orderBy('id', 'desc')->get();
        return view('admin.signaturenews', compact('news'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'link' => 'required|url',  // Validasi link
            'image' => 'required|image',
            'category' => 'required|string|max:255',  // Menambahkan validasi kategori
        ]);

        $imagePath = $request->file('image')->store('news', 'public');

        SignatureNews::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
            'image' => $imagePath,
            'category' => $request->category,  // Menyimpan kategori
            'is_featured' => false,  // Default to not featured
        ]);

        return redirect()->route('signaturenews.index')->with('success', 'News created successfully.');
    }

    public function update(Request $request, SignatureNews $news)
    {
        // Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'link' => 'nullable|url',  // Validate the link if provided
            'image' => 'nullable|image',  // Image is optional for updates
            'category' => 'required|string|max:255',  // Validasi kategori
        ]);

        // Check if an image is uploaded, and if so, store it
        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded
            if ($news->image) {
                // Delete the old image from storage
                Storage::delete('public/' . $news->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('news', 'public');
            $news->image = $imagePath;
        }

        // Update the fields
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->link = $request->link;
        $news->category = $request->category;  // Update category

        // Save the updated news record
        $news->save();

        // Redirect back with success message
        return redirect()->route('signaturenews.index')->with('success', 'News updated successfully.');
    }




public function destroy($id)
{
    // Find the record by ID
    $news = SignatureNews::find($id);

    if ($news) {
        // If the record exists, delete it
        $news->delete();

        // Redirect back with success message
        return redirect()->route('signaturenews.index')->with('success', 'News deleted successfully.');
    } else {
        // If the record is not found, return an error message
        return redirect()->route('signaturenews.index')->with('error', 'News not found.');
    }
}





    // app/Http/Controllers/SignatureNewsController.php

public function featureNews(Request $request)
{
    $selectedNewsIds = $request->input('news_ids', []);

    // Clear previous featured news
    SignatureNews::where('is_featured', true)->update(['is_featured' => false]);

    // Update selected news to be featured
    SignatureNews::whereIn('id', $selectedNewsIds)->update(['is_featured' => true]);

    return redirect()->route('signaturenews.index')->with('success', 'Featured news updated.');
}



public function showFeaturedNews()
    {
        // Ambil data dengan is_featured = 1
        $featuredNews = SignatureNews::where('is_featured', 1)->get();

        // Kirim data ke view
        return view('home', compact('featuredNews'));
    }



}
