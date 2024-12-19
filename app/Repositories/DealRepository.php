<?php

namespace App\Repositories;

use App\Models\Deal;
use Illuminate\Support\Facades\Log;
use App\Models\CarBrand;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;

class DealRepository
{

    public function create(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $data['image']->store('images/deal', 'public');
        }
        return Deal::create($data);
    }

    // Menyimpan data akad ke tabel ep_deal
    public function storeDeal($data)
    {
        try {
            // Ambil data yang diperlukan untuk disimpan di tabel ep_deal
            $dealData = $data->only(['branch_id', 'car_brand', 'car_type', 'title', 'slug', 'deal_date', 'image','deal_type', 'keyword', 'content']);

            // Simpan gambar utama jika ada
            if ($data->hasFile('image')) {
                $dealData['image'] = $data->file('image')->store('images/deal', 'public'); // Pastikan disk 'public' sudah dikonfigurasi
            }

            // Simpan data ke tabel ep_deal
            return Deal::create($dealData);

        } catch (\Exception $e) {
            // Log error untuk debugging jika terjadi kesalahan
            Log::error('Error menyimpan data deal: ' . $e->getMessage());
            throw $e;
        }
    }

    // // Memperbarui data deal
    public function updateDeal($id, $data)
    {
        $deal = Deal::findOrFail($id);

        // Jika ada gambar baru, hapus gambar lama
        if (isset($data['image'])) {
            if ($deal->image && Storage::disk('public')->exists($deal->image)) {
                Storage::disk('public')->delete($deal->image); // Hapus file lama
            }
            $deal->image = $data['image'];
        }

        $deal->update($data);
        return $deal; // Cek apakah update berhasil (true/false)
    }

    public function update($id, array $data)
    {
        $deal = Deal::findOrFail($id);

        // Update data deal sesuai dengan data yang dikirim
        $deal->update($data);

        return $deal;
    }

    // Mendapatkan semua deals
    public function getAllDeals()
    {
        return Deal::with('branch')->get(); // Memuat relasi dengan cabang jika diperlukan
    }

    //get deal dngen branches
    public function getDealsWithBranch()
    {
        return Deal::with('branch');
    }

    // Mendapatkan data cabang (ep_branch)
    public function getBranches()
    {
        return Branch::all(['id', 'title']);
    }

    // Mendapatkan data merek mobil (ep_car_brand)
    public function getCarBrands()
    {
        return CarBrand::all(['id', 'title']);
    }

    // Mendapatkan detail deal berdasarkan ID
    public function findById($id)
    {
        return Deal::findOrFail($id);
    }

    // Menghapus deal berdasarkan ID
    public function deleteDeal($id)
    {
        $deal = Deal::findOrFail($id);
        $deal->delete(); // Menghapus deal
    }
}
