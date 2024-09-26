<?php

namespace App\Repositories;

use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class SlideRepository
{
    /**
     * Mengambil semua data slide.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllSlides()
    {
        return Slide::all();
    }

    /**
     * Menyimpan data slide baru.
     *
     * @param array $data
     * @return Slide
     */
    public function storeSlide($data)
    {
        // Simpan gambar jika ada
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('slides', 'public');
        }

        return Slide::create($data);
    }

    /**
     * Mengambil slide berdasarkan ID.
     *
     * @param int $id
     * @return Slide
     */
    public function findSlideById($id)
    {
        return Slide::findOrFail($id);
    }

    /**
     * Memperbarui data slide.
     *
     * @param Slide $slide
     * @param array $data
     * @return bool
     */
    public function updateSlide(Slide $slide, $data)
    {
        // Jika ada gambar baru yang diupload
        if (isset($data['image'])) {
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
            $data['image'] = $data['image']->store('slides', 'public');
        } else {
            $data['image'] = $slide->image;
        }

        return $slide->update($data);
    }

    /**
     * Menghapus slide beserta gambar jika ada.
     *
     * @param Slide $slide
     * @return bool|null
     */
    public function deleteSlide(Slide $slide)
    {
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }

        return $slide->delete();
    }
}
