<?php

namespace App\Http\Controllers\Frontsites\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($category, $slug)
    {
        $bloges = Blog::with('category')->where('slug', $slug)->firstOrFail();
        $blogs = Blog::with('category')->latest()->take(5)->get();
        return view('pages.frontsites.home._blog-detail', compact('bloges', 'blogs'));
    }

    public function artikel() {
        $blogs = Blog::with('category')->paginate(6);
        return view('pages.frontsites.home._blog-artikel', compact('blogs'));
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
