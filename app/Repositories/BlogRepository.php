<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Category; // Tambahkan ini untuk mengimport model Category

class BlogRepository
{
    public function getAll()
    {
        return Blog::all();
    }

    public function findById($id)
    {
        return Blog::findOrFail($id);
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function delete(Blog $blog)
    {
        return $blog->delete();
    }

    // Mengambil semua kategori dari database
    public function getAllCategories()
    {
        return Category::all(); // Mengambil semua kategori dari model Category
    }

    // Mengupdate data blog berdasarkan ID
    public function update($id, array $data)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }
}
