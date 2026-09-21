<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class videosController extends Controller
{
    // Method untuk menampilkan halaman edit video
    public function edit($id)
    {
        // Mencari video berdasarkan ID yang diberikan
        $videoLink = Video::findOrFail($id);

        // Mengembalikan view dan mengirim data video ke view
        return view('admin.video', compact('videoLink'));
    }

    // Method untuk mengupdate video link (ini yang menangani PUT request)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'link' => 'required|url',
        ]);

        // Mencari video berdasarkan ID
        $videoLink = Video::findOrFail($id);

        // Mengupdate data video link
        $videoLink->update([
            'link' => $request->input('link'),
        ]);

        // Redirect ke halaman edit dengan pesan sukses
        return redirect()->route('video.edit', $videoLink->id)->with('success', 'Video link updated successfully!');
    }
}
