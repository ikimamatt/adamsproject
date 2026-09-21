<?php

namespace App\Http\Controllers;

use App\Models\Jumbotron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JumbotronController extends Controller
{
    // Menampilkan daftar jumbotron
    public function index()
    {
        $jumbotron = Jumbotron::findOrFail(1);

    // Kembalikan tampilan untuk mengedit jumbotron
    return view('admin.jumbotron', compact('jumbotron'));
    }

    // Menampilkan form untuk menambah jumbotron
    public function create()
    {
        return view('admin.jumbotron.create');
    }

    // Menyimpan jumbotron baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text_left' => 'required|string|max:255',
            'text_right' => 'required|string|max:255',
            'background_image' => 'required|image',
            'profile_image' => 'required|image',
        ]);

        // Menyimpan gambar latar belakang dan gambar profil
        $backgroundImagePath = $request->file('background_image')->store('jumbotron_images', 'public');
        $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');

        // Menyimpan data jumbotron
        Jumbotron::create([
            'text_left' => $validated['text_left'],
            'text_right' => $validated['text_right'],
            'background_image' => $backgroundImagePath,
            'profile_image' => $profileImagePath,
        ]);

        return redirect()->route('jumbotron.index');
    }

    // Menampilkan form untuk edit jumbotron
    public function edit($id)
    {
        $jumbotron = Jumbotron::findOrFail($id);
        return view('admin.jumbotron.edit', compact('jumbotron'));
    }

    // Memperbarui jumbotron
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'text_left' => 'required|string|max:255',
            'text_right' => 'required|string|max:255',
            'background_image' => 'nullable|image',
            'profile_image' => 'nullable|image',
        ]);

        $jumbotron = Jumbotron::findOrFail($id);

        if ($request->hasFile('background_image')) {
            $backgroundImagePath = $request->file('background_image')->store('jumbotron_images', 'public');
            $jumbotron->background_image = $backgroundImagePath;
        }

        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            $jumbotron->profile_image = $profileImagePath;
        }

        $jumbotron->text_left = $validated['text_left'];
        $jumbotron->text_right = $validated['text_right'];
        $jumbotron->save();

        return redirect()->route('jumbotron.index');
    }

    // Menghapus jumbotron
    public function destroy($id)
    {
        $jumbotron = Jumbotron::findOrFail($id);
        $jumbotron->delete();
        return redirect()->route('admin.jumbotron.index');
    }
}
