<?php

namespace App\Http\Controllers\Backsites\Input\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\BlogService;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    // Method untuk menampilkan halaman semua blog di backsites
    public function index()
    {
        $blogs = $this->blogService->getAllBlogs(); // Mendapatkan semua blog
        return view('pages.backsites.input.Blog.index', compact('blogs')); // Mengirim data ke view
    }

    // Method untuk menampilkan form tambah blog di backsites
    public function create()
    {
        $categories = $this->blogService->getCategories(); // Mengambil data kategori
        return view('pages.backsites.input.Blog._form', compact('categories')); // Mengirim data kategori ke view
    }

    // Method untuk menyimpan blog baru
    public function store(BlogRequest $request)
    {
        $this->blogService->storeBlog($request->validated()); // Kirim data yang sudah divalidasi
        return redirect()->route('blog.index')->with('success', 'Blog berhasil disimpan.');
    }

    // Method untuk menampilkan detail blog di backsites
    public function show($id)
    {
        $blog = $this->blogService->findById($id); // Mencari blog berdasarkan ID
        return view('pages.backsites.input.Blog.show', compact('blog')); // Mengirim data blog ke view
    }

    // Method untuk menampilkan form edit blog di backsites
    public function edit($id)
    {
        $blog = $this->blogService->findById($id); // Mencari blog yang akan di-edit berdasarkan ID
        $categories = $this->blogService->getCategories(); // Mengambil data kategori
        return view('pages.backsites.input.Blog.edit', compact('blog', 'categories')); // Mengirim data blog dan kategori ke view edit
    }

    // Method untuk mengupdate blog yang sudah ada
    public function update(BlogRequest $request, $id)
    {
        $this->blogService->updateBlog($id, $request->validated()); // Kirim data yang sudah divalidasi
        return redirect()->route('blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    // Method untuk menghapus blog
    public function destroy($id)
    {
        $blog = $this->blogService->findById($id); // Mencari blog berdasarkan ID
        $this->blogService->deleteBlog($blog); // Menghapus blog
        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus.');
    }

    // Method untuk menampilkan semua blog di frontsites
    public function frontIndex()
    {
        $blogs = $this->blogService->getAllBlogs(); // Mendapatkan semua blog
        return view('pages.frontsites.home.index', compact('blogs')); // Mengirimkan $blogs ke view
    }

    // Method untuk menampilkan detail blog tertentu di frontsites
    public function frontShow($id)
    {
        $blog = $this->blogService->findById($id); // Mencari blog berdasarkan ID
        return view('pages.frontsites.blog.show', compact('blog')); // Mengirim data blog ke view detail
    }
}
