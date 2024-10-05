<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use App\Repositories\CategoryRepository; // Tambahkan ini

class BlogService
{
    protected $blogRepository;
    protected $categoryRepository; // Pastikan property ini ada

    // Tambahkan dependency CategoryRepository di constructor
    public function __construct(BlogRepository $blogRepository, CategoryRepository $categoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository; // Inisialisasi categoryRepository
    }

    public function storeBlog($data)
    {
        return $this->blogRepository->create($data);
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
        return $this->blogRepository->delete($blog);
    }

    public function updateBlog($id, $data)
    {
        return $this->blogRepository->update($id, $data);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getAllCategories(); // Memanggil method dari CategoryRepository
    }
}
