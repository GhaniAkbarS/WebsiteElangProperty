<?php

namespace App\Services\Backsites\Master\Category;

use App\Repositories\Backsites\Master\Category\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    // Ambil semua kategori
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    // Simpan kategori baru
    public function createCategory(array $data)
    {
        return $this->categoryRepository->createCategory($data);
    }

    // Ambil kategori berdasarkan ID
    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    // Update kategori
    public function updateCategory($id, array $data)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        return $this->categoryRepository->updateCategory($category, $data);
    }

    // Hapus kategori
    public function deleteCategory($id)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        return $this->categoryRepository->deleteCategory($category);
    }
}
