<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class BlogService
{
    protected $blogRepository;
    protected $categoryRepository;

    public function __construct(BlogRepository $blogRepository, CategoryRepository $categoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function storeBlog(array $data) // Ubah argumen menjadi array
    {
        // Simpan gambar jika ada
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $data['image']->store('images/blogs', 'public');
        }

        // Hapus tag HTML dari konten
        $data['content'] = strip_tags($data['content']);

        return $this->blogRepository->create($data); // Kirim data yang sudah divalidasi
    }

    public function getAllBlogs()
    {
        return $this->blogRepository->getAll();
    }

    public function findById($id)
    {
        return $this->blogRepository->findById($id);
    }

    public function deleteBlog($blog)
    {
        if ($blog->image) Storage::disk('public')->delete($blog->image);
        return $this->blogRepository->delete($blog);
    }

    public function updateBlog($id, array $data) // Ubah argumen menjadi array
    {
        $blog = $this->blogRepository->findById($id);

        // Simpan gambar baru jika ada
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            if ($blog->image) Storage::disk('public')->delete($blog->image);
            $data['image'] = $data['image']->store('images/blogs', 'public');
        }

        $data['content'] = strip_tags($data['content']);

        return $this->blogRepository->update($id, $data);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }
}
