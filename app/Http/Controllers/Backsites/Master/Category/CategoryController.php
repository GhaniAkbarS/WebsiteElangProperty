<?php

namespace App\Http\Controllers\Backsites\Master\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Backsites\Master\Category\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();  // Mengambil semua data kategori
        return view('pages.backsites.master.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backsites.master.category.create'); // Pastikan ada view untuk create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // Simpan data ke database
        $validatedData = $request->validated();
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('categories') : null;

        $data = [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $imagePath,
        ];

        $this->categoryService->createCategory($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('pages.backsites.master.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('categories') : null;

        $data = [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $imagePath ?? null,
        ];

        $this->categoryService->updateCategory($id, $data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
