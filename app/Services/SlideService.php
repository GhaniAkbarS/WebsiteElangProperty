<?php

namespace App\Services;

use App\Repositories\SlideRepository;

class SlideService {
    protected $slideRepository;

    public function __construct(SlideRepository $slideRepository) {
        $this->slideRepository = $slideRepository;
    }

    public function getAllSlides() {
        return $this->slideRepository->getAllSlides();
    }

    public function createSlide(array $data) {
        return $this->slideRepository->createSlide($data);
    }

    public function updateSlide(string $id, array $data) {
        $slide = $this->slideRepository->findSlideById($id);

        if (!$slide) {
            throw new \Exception('Slide not found');
        }

        return $this->slideRepository->updateSlide($slide, $data);
    }

    public function deleteSlide(string $id) {
        $slide = $this->slideRepository->findSlideById($id);

        if (!$slide) {
            throw new \Exception('Slide not found');
        }

        return $this->slideRepository->deleteSlide($slide);
    }

    // Menambahkan method findSlideById
    public function findSlideById(string $id) {
        return $this->slideRepository->findSlideById($id);
    }
}
