<?php

namespace App\Http\Controllers\Backsites\Master\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();  // Mengambil semua data kategori
        return view('pages.backsites.master.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Category::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Mencari kategori berdasarkan ID
        return view('pages.backsites.master.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public  function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Mencari data kategori berdasarkan ID dan memperbarui
        $category = Category::findOrFail($id);
        $category->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Mencari kategori berdasarkan ID
        $category->delete(); // Menghapus data

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
