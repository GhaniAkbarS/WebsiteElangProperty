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
        return Slide::latest()->take(3)->get(); // Mengambil 3 slide terbaru tanpa relasi
    }


    public function getByLimit($limit)
    {
        return Slide::latest()->take($limit)->get();
    }

    /**
     * Menyimpan data slide baru.
     *
     * @param array $data
     * @return Slide
     */
    public function createSlide(array $data)
    {
        // Simpan gambar jika ada
        if (isset($data['image'])) {
            // Validasi dan simpan gambar ke storage
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
    public function updateSlide(Slide $slide, array $data)
    {
        // Jika ada gambar baru yang diupload
        if (isset($data['image'])) {
            // Hapus gambar lama jika ada
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }

            // Simpan gambar baru
            $data['image'] = $data['image']->store('slides', 'public');
        }

        // Lakukan update pada slide
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
        // Hapus gambar jika ada
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }

        // Hapus slide dari database
        return $slide->delete();
    }
}
