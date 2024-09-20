<?php

namespace App\Http\Controllers\Backsites\Input\Slide;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data slide
        $slides = Slide::all();
        return view('pages.backsites.input.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form pembuatan slide baru
        return view('pages.backsites.input.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|file',
            'link' => 'nullable|string|max:255',
        ]);

        // Upload gambar jika ada
        $imagePath = $request->file('image') ? $request->file('image')->store('slides') : null;

        // Simpan data ke database
        Slide::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, // Menyimpan path gambar
            'link' => $request->link,
        ]);

        return redirect()->route('slide.index')->with('success', 'Slide created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slide = Slide::findOrFail($id);
        return view('pages.backsites.input.slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data slide untuk di-edit
        $slide = Slide::findOrFail($id);
        return view('pages.backsites.input.slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|file',
            'link' => 'nullable|string|max:255',
        ]);

        // Temukan slide berdasarkan ID
        $slide = Slide::findOrFail($id);

        // Update gambar jika ada yang diupload baru
        $imagePath = $request->file('image') ? $request->file('image')->store('slides') : $slide->image;

        // Update data slide
        $slide->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('slide.index')->with('success', 'Slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan slide berdasarkan ID dan hapus
        $slide = Slide::findOrFail($id);

        // Hapus gambar jika diperlukan
        if ($slide->image) {
            Storage::delete($slide->image);
        }

        $slide->delete();

        return redirect()->route('slide.index')->with('success', 'Slide deleted successfully');
    }
}
