<?php

namespace App\Http\Controllers\Backsites\Input\Slide;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
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
         // Debugging
         Log::info($request->all()); // Log semua input dari form

         // Validasi data
         $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
         ]);

         // Proses penyimpanan gambar
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imagePath = $image->store('slides', 'public'); // Simpan gambar
             Log::info('Image stored at: ' . $imagePath); // Debugging
         } else {
             $imagePath = null;
         }

         // Simpan data ke database
         Slide::create([
             'title' => $request->title,
             'content' => $request->content,
             'image' => $imagePath,
             'link' => $request->link
         ]);

         return redirect()->back()->with('success', 'Slide berhasil disimpan.');
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
    public function update(Request $request, Slide $slide)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 'nullable' untuk gambar opsional
            'link' => 'nullable|url' // Validasi opsional untuk link
        ]);

        // Proses penyimpanan gambar jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($slide->image) {
                Storage::delete('public/' . $slide->image); // Menghapus file dari storage
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $imagePath = $image->store('slides', 'public'); // Menyimpan gambar baru di 'storage/app/public/slides'
        } else {
            $imagePath = $slide->image; // Gunakan gambar lama jika tidak ada gambar baru
        }

        // Update data slide ke database
        $slide->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, // Path gambar baru atau gambar lama
            'link' => $request->link, // Link opsional
        ]);

        return redirect()->back()->with('success', 'Slide berhasil diperbarui.');
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
