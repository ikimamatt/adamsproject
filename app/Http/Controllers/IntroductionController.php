<?php

namespace App\Http\Controllers;

use App\Models\Introduction;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    public function index()
    {
        $introduction = Introduction::first(); // Ambil data pertama
        return view('admin.introduction', compact('introduction')); // Menampilkan view admin.introduction
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'image|nullable',
        ]);

        $introduction = new Introduction;
        $introduction->title = $request->title;
        $introduction->subtitle = $request->subtitle;

        if ($request->hasFile('image')) {
            $introduction->image = $request->file('image')->store('introduction_images', 'public');
        }

        $introduction->save();

        return redirect()->route('introduction.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'image|nullable',
        ]);

        $introduction = Introduction::findOrFail($id);
        $introduction->title = $request->title;
        $introduction->subtitle = $request->subtitle;

        if ($request->hasFile('image')) {
            $introduction->image = $request->file('image')->store('introduction_images', 'public');
        }

        $introduction->save();

        return redirect()->route('introduction');
    }
}
