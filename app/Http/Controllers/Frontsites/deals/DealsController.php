<?php

namespace App\Http\Controllers\Frontsites\Deals;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\DealPhoto;
use Illuminate\Http\Request;

class DealsController extends Controller
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
    public function show($id)
    {
        $otherDeals = Deal::with('Photos')->where('id', '!=', $id)->get(); // Untuk "Other Team Members"
        $deal = Deal::with('branch')->findOrFail($id); // Pastikan ada relasi dengan 'branch'
        return view('pages.frontsites.home._deal-detail', compact('deal', 'otherDeals'));
    }

    public function akad()
    {
        // Ambil data deals dengan pagination
        $deals = Deal::with('branch')->paginate(8); // 8 item per halaman
        return view('pages.frontsites.home._deal-akad', compact('deals'));
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
