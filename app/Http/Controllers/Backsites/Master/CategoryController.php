<?php

namespace App\Http\Controllers\Backsites\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EpCategory; // Import model EpCategory

class CategoryController extends Controller
{
    // Method to show the form and the list of categories
    public function index()
    {
        $categories = EpCategory::all(); // Fetch all categories
        return view('pages.backsites.master.category.index', compact('categories'));
    }

    // Method to handle the form submission and store data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        EpCategory::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Data has been added successfully.');
    }
}
