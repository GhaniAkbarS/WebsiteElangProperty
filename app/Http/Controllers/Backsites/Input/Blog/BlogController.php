<?php

namespace App\Http\Controllers\Backsites\Input\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Menampilkan form untuk input data blog
    public function create()
    {
        // Mengambil semua data kategori dari tabel ep_category
        $categories = Category::all();

        // Mengirim data kategori ke view 'create'
        return view('pages.backsites.blog.create', compact('categories'));
    }



    // Menampilkan tabel data blog yang telah diinput
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.backsites.input.blog.index', compact('blogs'));
    }

    // Menyimpan data blog ke dalam database

    public function store(Request $request)
    {
        // Validasi dan logika penyimpanan data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'keyword' => 'nullable|string',
            'category_id' => 'required|exists:ep_category,id',
            'status' => 'required|in:publish,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika ada file yang diupload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $data['image'] = $imagePath;
        }

        // Menyimpan data blog ke database
        Blog::create($data);

        // Redirect ke halaman yang diinginkan setelah menyimpan
        return redirect()->route('blog.index')->with('success', 'Blog berhasil disimpan.');
    }



    // Menampilkan data blog berdasarkan ID (untuk halaman edit)
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.backsites.input.blog.edit', compact('blog'));
    }

    // Update data blog berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug,' . $id,
            'image' => ' required|string',
            'excerpt' => ' required|string',
            'content' => 'required|string',
            'status' => 'required|in:publish,draft',
            'pageview' => ' required|integer',
            'keyword' => ' required|string',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($request->all());

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diperbarui');
    }

    // Menghapus data blog berdasarkan ID
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus');
    }
}
