<?php

namespace App\Services;

use App\Repositories\DealRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Untuk helper manipulasi string
use App\Models\Deal; // Untuk mengakses model Deal
use App\Models\Branch; // Tambahkan ini
use Yajra\DataTables\DataTables;
use App\Models\CarBrand;
use Illuminate\Http\UploadedFile;

class DealService
{
    protected $dealRepository;

    public function __construct(DealRepository $dealRepository)
    {
        $this->dealRepository = $dealRepository;
    }

    public function getBranches()
    {
        return $this->dealRepository->getBranches();
    }

    public function getCarBrands()
    {
        return $this->dealRepository->getCarBrands();
    }

    public function storeDeal($request)
    {
        // Ambil data yang telah divalidasi
        $validatedData = $request->validated();

        // Menghasilkan title secara otomatis berdasarkan data request
        $validatedData['title'] = $this->generateTitle($validatedData);

        // Membuat slug dari title yang telah dihasilkan
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $validatedData['image'] =$request->file('image')->store('images/deal', 'public');
        }
        // Menyimpan data ke dalam tabel `ep_deal`
        return $this->dealRepository->create($validatedData);
    }

    // Method untuk menggenerate title secara otomatis
    private function generateTitle($data)
    {
        // Mengambil data dari request
        $dealType = $data['deal_type'] ?? null;
        $akad = "Akad";
        $brand = $data['car_brand'] ?? '';  // Gunakan jika tersedia
        $jenisMobil = $data['car_type'] ?? '';  // Gunakan jika tersedia

        // Dapatkan nama cabang menggunakan relasi
        $branch = Branch::find($data['branch_id']);
        $branchName = $branch ? $branch->title : 'Cabang Tidak Ditemukan';

        // Kondisi untuk Mobil Bekas atau Baru
        if ($dealType === 'Mobil Baru' || $dealType === 'Mobil Bekas') {
            return "{$akad} {$brand} {$jenisMobil} Cabang {$branchName}";
        }

        // Kondisi untuk Rumah atau Ruko
        if ($dealType === 'Rumah' || $dealType === 'Ruko') {
            return "{$akad} 1 Unit {$dealType} Cabang {$branchName}";
        }

        // Kondisi untuk Tanah
        if ($dealType === 'Tanah') {
            return "{$akad} 1 Bidang {$dealType} Cabang {$branchName}";
        }

        return 'Judul Tidak Diketahui'; // Jika tidak ada yang cocok
    }

    public function getAllDeals()
    {
        return $this->dealRepository->getAllDeals();
    }

    public function findDealById($id)
    {
        return $this->dealRepository->findById($id);
    }

    // Mengambil semua data cabang
    public function getAllBranches()
    {
        return Branch::all();
    }

    // Mengambil semua brand mobil
    public function getAllCarBrands()
    {
        return CarBrand::all();
    }

    public function updateDeal($request, $id)
    {
        //validasi input
        $validated = $request->validate([
            'branch_id' => '|exists:ep_branch,id',
            'car_brand' => 'required_if:deal_type,Mobil_Baru,Mobil_Bekas|string|max:255|nullable', // Wajib jika jenis akad mobil
            'car_type' => 'required_if:deal_type,Mobil_Baru,Mobil_Bekas|string|max:255|nullable', // Wajib jika jenis akad mobil
            'title' => '|string|max:255',
            'deal_date' => '|date',
            'deal_type' => '|string', // Validasi sederhana untuk tipe akad
            'image' => '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'keyword' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images/deal', 'public'); // Simpan gambar ke disk 'public'
            $validated['image'] = $path;
        }

        // Perbarui deal menggunakan repository
        return $this->dealRepository->updateDeal($id, $validated);
    }

    public function deleteDeal($id)
    {
        return $this->dealRepository->deleteDeal($id);
    }

    public function uploadDealPhoto($deal, $photo)
    {
        // Validasi (opsional, jika validasi dilakukan di luar service, abaikan langkah ini)
        if (!$photo->isValid() || !in_array($photo->extension(), ['jpeg', 'jpg', 'png', 'gif'])) {
            throw new \Exception('File tidak valid atau format tidak didukung');
        }

        // Simpan foto ke storage
        $photoPath = $photo->store('deal_photo', 'public'); // Simpan di folder `public/storage/deal_photo`

        // Simpan referensi ke database
        $deal->photos()->create([
            'image' => $photoPath,
        ]);

        return $photoPath; // Return path jika diperlukan
    }
}
