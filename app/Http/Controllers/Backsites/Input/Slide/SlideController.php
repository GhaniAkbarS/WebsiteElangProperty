<?php

namespace App\Http\Controllers\Backsites\Input\Slide;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Services\SlideService; // Menggunakan SlideService

class SlideController extends Controller
{
    protected $slideService;

    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }

    // Menampilkan semua slide
    public function index()
    {
        $slides = $this->slideService->getAllSlides();
        return view('pages.backsites.input.slide.index', compact('slides'));
    }

    // Menampilkan form untuk membuat slide baru
    public function create()
    {
        return view('pages.backsites.input.slide.create');
    }

    // Menyimpan slide baru
    public function store(SlideRequest $request)
    {
        $this->slideService->createSlide($request->validated());
        return redirect()->route('slide.index')->with('success', 'Slide created successfully');
    }

    // Menampilkan detail slide berdasarkan ID
    public function show(string $id)
    {
        $slide = $this->slideService->findSlideById($id);
        return view('pages.backsites.input.slide.show', compact('slide'));
    }

    // Menampilkan form untuk mengedit slide berdasarkan ID
    public function edit(string $id)
    {
        $slide = $this->slideService->findSlideById($id);
        return view('pages.backsites.input.slide.edit', compact('slide'));
    }

    // Memperbarui slide berdasarkan ID
    public function update(SlideRequest $request, string $id)
    {
        $this->slideService->updateSlide($id, $request->validated());
        return redirect()->route('slide.index')->with('success', 'Slide updated successfully');
    }

    // Menghapus slide berdasarkan ID
    public function destroy(string $id)
    {
        $this->slideService->deleteSlide($id);
        return redirect()->route('slide.index')->with('success', 'Slide deleted successfully');
    }
}
