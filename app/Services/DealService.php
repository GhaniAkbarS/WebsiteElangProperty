<?php

namespace App\Services;

use App\Repositories\DealRepository;
use Illuminate\Support\Str; // Untuk helper manipulasi string
use App\Models\Deal; // Untuk mengakses model Deal

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
        dd($request->all()); // Memeriksa data yang diterima oleh DealService

        $title = $this->generateTitle($request);
        $slug = Str::slug($title, '-'); // Membuat slug berdasarkan title

        // Simpan data dengan title dan slug yang telah di-generate
        return Deal::create([
            'branch_id' => $request->branch_id,
            'car_brand' => $request->car_brand,
            'car_type' => $request->car_type,
            'title' => $title,
            'slug' => $slug,
            'deal_date' => $request->deal_date,
            'deal_type' => $request->deal_type,
            'image' => $request->image,
            'keyword' => $request->keyword,
            'content' => $request->content,
            // Kolom lainnya...
        ]);
    }

    private function generateTitle($request)
    {
        if (in_array($request->deal_type, ['Mobil_Baru', 'Mobil_Bekas'])) {
            return "Akad {$request->deal_type} - {$request->car_brand} {$request->car_type} - Cabang {$request->branch_id}";
        } else {
            $unitType = ($request->deal_type == 'Tanah') ? 'Sebidang' : 'Unit';
            return "Akad {$request->deal_type} - {$unitType} - Cabang {$request->branch_id}";
        }
    }

    public function getAllDeals()
    {
        return $this->dealRepository->getAllDeals();
    }

    public function findDealById($id)
    {
        return $this->dealRepository->findDealById($id);
    }

    public function updateDeal($request, $id, $title)
    {
        // Perbarui deal menggunakan repository
        return $this->dealRepository->update($id, array_merge($request->validated(), ['title' => $title]));
    }

    public function deleteDeal($id)
    {
        return $this->dealRepository->deleteDeal($id);
    }
}
