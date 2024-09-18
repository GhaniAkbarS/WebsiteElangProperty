<?php

namespace App\Http\Controllers\Backsites\Master\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Tampilkan form input dan tabel kategori
    public function index()
    {
        $categories = Categories::all();  // Mengambil semua data kategori
        return view('pages.backsites.master.category.index', compact('categories'));
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Simpan data ke database
        Categories::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    // Tambahkan metode untuk edit, update, dan destroy jika diperlukan
}
