<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Category; // Tambahkan ini untuk mengimport model Category
use Illuminate\Support\Facades\Storage;

class BlogRepository
{
    public function getAll()
    {
        return Blog::with("category")->latest()->get();
    }

    public function getByLimitByWhere($limit,$where) {

        return Blog::with("category")
        ->where($where)
        ->take($limit)->latest()->get();
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

        /**
     * Menyimpan blog baru.
     *
     * @param array $data
     * @return Blog
     */
    public function createBlog(array $data)
    {
        // Simpan gambar jika ada
        if (isset($data['image'])) {
            // Simpan gambar ke folder 'blog' di public storage
            $data['image'] = $data['image']->store('blog', 'public');
        }

        // Simpan data blog ke database
        return Blog::create($data);
    }

    /**
     * Memperbarui blog yang sudah ada.
     *
     * @param Blog $blog
     * @param array $data
     * @return bool
     */
    public function updateBlog(Blog $blog, array $data)
    {
        // Jika ada gambar baru yang diupload
        if (isset($data['image'])) {
            // Hapus gambar lama jika ada
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            // Simpan gambar baru
            $data['image'] = $data['image']->store('blog', 'public');
        }

        // Lakukan update pada blog
        return $blog->update($data);
    }

    /**
     * Menghapus blog beserta gambar jika ada.
     *
     * @param Blog $blog
     * @return bool|null
     */
    public function deleteBlog(Blog $blog)
    {
        // Hapus gambar jika ada
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        // Hapus blog dari database
        return $blog->delete();
    }
}
