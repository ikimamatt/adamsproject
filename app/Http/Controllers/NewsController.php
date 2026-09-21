<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url', // Menambahkan validasi untuk link (opsional)
        ]);

        // Menyimpan gambar
        $imagePath = $request->file('image')->store('news_images', 'public');

        // Menyimpan data berita
        News::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,
            'image' => $imagePath, // Menyimpan path gambar
            'link' => $request->link, // Menyimpan link jika ada
        ]);

        return redirect()->back()->with('success', 'News created successfully.');
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url', // Menambahkan validasi untuk link (opsional)
        ]);

        $data = $request->only(['title', 'subtitle', 'category', 'link']); // Menambahkan link ke dalam data yang akan diupdate

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($news->image) {
                Storage::delete('public/' . $news->image);
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('image')->store('news_images', 'public');
            $data['image'] = $imagePath; // Menyimpan path gambar baru
        }

        // Memperbarui data berita
        $news->update($data);

        return redirect()->back()->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        // Menghapus gambar
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }

        // Menghapus berita
        $news->delete();

        return redirect()->back()->with('success', 'News deleted successfully.');
    }
}
