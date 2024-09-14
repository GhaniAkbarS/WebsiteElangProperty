<?php

namespace App\Http\Controllers\Backsites\Master;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Tampilkan form input dan tabel kategori
    public function index()
    {
        $category = Category::all();
        return view('pages.backsites.master.category.index', compact('category'));
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
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('pages.backsites.master.category.index', compact('category', 'categories'));
    }

    // Update kategori yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update data kategori
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    // Hapus kategori dari database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
