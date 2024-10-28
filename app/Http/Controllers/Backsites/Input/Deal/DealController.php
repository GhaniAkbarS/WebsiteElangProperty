<?php

namespace App\Http\Controllers\Backsites\Input\Deal;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealRequest;
use App\Services\DealService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class DealController extends Controller
{
    protected $dealService;
    protected $dealTypes = ['Mobil Bekas', 'Mobil Baru', 'Rumah', 'Tanah', 'Ruko'];

    public function __construct(DealService $dealService)
    {
        $this->dealService = $dealService;
    }

    public function index(): View
    {
        $deals = $this->dealService->getAllDeals();
        return view('pages.backsites.input.Deal.index', compact('deals'));
    }

    public function create(): View
    {
        $branches = $this->dealService->getBranches();
        $carBrands = $this->dealService->getCarBrands();
        $dealTypes = $this->dealTypes;

        return view('pages.backsites.input.Deal._deal', compact('branches', 'carBrands', 'dealTypes'));
    }

    public function store(DealRequest $request): RedirectResponse
    {
        dd($request->all());  // Ini akan menampilkan semua data yang dikirim dari form
        try {
            // Menghasilkan judul berdasarkan kondisi
            $title = $this->generateTitle($request);

            // Simpan deal dengan judul yang dihasilkan
            $this->dealService->storeDeal($request, $title);

            return redirect()->route('deal.index')->with('success', 'Akad berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan akad: ' . $e->getMessage());
        }
    }

    public function edit($id): View
    {
        $deal = $this->dealService->findDealById($id);
        $branches = $this->dealService->getBranches();
        $carBrands = $this->dealService->getCarBrands();
        $dealTypes = $this->dealTypes;

        return view('pages.backsites.input.Deal._deal', compact('deal', 'branches', 'carBrands', 'dealTypes'));
    }

    public function update(DealRequest $request, $id): RedirectResponse
    {
        try {
            $title = $this->generateTitle($request);

            // Update deal dengan judul yang dihasilkan
            $this->dealService->updateDeal($request, $id, $title);

            return redirect()->route('deal.index')->with('success', 'Akad berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui akad: ' . $e->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $this->dealService->deleteDeal($id);
            return redirect()->route('deal.index')->with('success', 'Akad berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus akad: ' . $e->getMessage());
        }
    }

    protected function generateTitle(Request $request): string
    {
        // Mengambil tipe deal dari request
        $dealType = $request->input('deal_type'); // Misalnya, 'Mobil Bekas', 'Rumah', dll.
        $akad = $request->input('deal_type'); // Misalnya, Akad yang dipilih
        $brand = $request->input('car_brand'); // Merek mobil
        $jenisMobil = $request->input('car_type'); // Jenis mobil
        $cabang = $request->input('branch_id'); // Cabang jika ada

        // Menghasilkan title berdasarkan tipe deal
        if (in_array($dealType, ['Mobil Bekas', 'Mobil Baru'])) {
            return "$akad + $brand + $jenisMobil + $cabang";
        } elseif (in_array($dealType, ['Rumah', 'Tanah', 'Ruko'])) {
            $unitType = $dealType === 'Rumah' || $dealType === 'Ruko' ? 'unit' : 'sebidang';
            return "$dealType ($unitType) + $akad + 1 + Tipe Akad";
        }

        return 'Judul Tidak Diketahui'; // Default jika tidak ada yang cocok
    }
}
