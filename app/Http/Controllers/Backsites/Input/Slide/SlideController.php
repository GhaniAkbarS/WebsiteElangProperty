<?php

namespace App\Http\Controllers\Backsites\Input\Slide;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Repositories\SlideRepository;

class SlideController extends Controller
{
    protected $slideRepository;

    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function index()
    {
        $slides = $this->slideRepository->getAllSlides();
        return view('pages.backsites.input.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('pages.backsites.input.slide.create');
    }

    public function store(SlideRequest $request)
    {
        $this->slideRepository->storeSlide($request->validated());
        return redirect()->route('slide.index')->with('success', 'Slide created successfully');
    }

    public function show(string $id)
    {
        $slide = $this->slideRepository->findSlideById($id);
        return view('pages.backsites.input.slide.show', compact('slide'));
    }

    public function edit(string $id)
    {
        $slide = $this->slideRepository->findSlideById($id);
        return view('pages.backsites.input.slide.edit', compact('slide'));
    }

    public function update(SlideRequest $request, string $id)
    {
        $slide = $this->slideRepository->findSlideById($id);
        $this->slideRepository->updateSlide($slide, $request->validated());

        return redirect()->route('slide.index')->with('success', 'Slide updated successfully');
    }

    public function destroy(string $id)
    {
        $slide = $this->slideRepository->findSlideById($id);
        $this->slideRepository->deleteSlide($slide);

        return redirect()->route('slide.index')->with('success', 'Slide deleted successfully');
    }
}
