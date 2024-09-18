<?php

namespace App\Http\Controllers\Backsites\Master\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}