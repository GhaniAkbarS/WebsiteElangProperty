<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryRepository
{
    // Ambil semua kategori
    public function getAllCategories()
    {
        return Category::all();
    }

    // Simpan kategori baru
    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    // Cari kategori berdasarkan ID
    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    // Update kategori
    public function updateCategory(Category $category, array $data)
    {
        return $category->update($data);
    }

    // Hapus kategori
    public function deleteCategory(Category $category)
    {
        if ($category->image) {
            Storage::delete($category->image);
        }
        return $category->delete();
    }
}
