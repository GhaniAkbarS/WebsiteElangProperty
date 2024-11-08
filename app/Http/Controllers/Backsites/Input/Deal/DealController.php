<?php

namespace App\Http\Controllers\Backsites\Input\Deal;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealRequest;
use App\Services\DealService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Deal;
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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $deals = Deal::with('branch')->select('id', 'title', 'deal_type', 'branch_id');

            return DataTables::of($deals)
                ->addIndexColumn()
                ->addColumn('branch', function($row) {
                    return $row->branch ? $row->branch->title : 'Cabang Tidak Ditemukan';
                })
                ->addColumn('action', function($row) {
                    $editUrl = route('deal.edit', $row->id);
                    $deleteForm = '<form action="' . route('deal.destroy', $row->id) . '" method="POST" style="display:inline;">
                                    ' . csrf_field() . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</button>
                                </form>';
                    return '<a href="' . $editUrl . '" class="btn btn-warning btn-sm">Edit</a> ' . $deleteForm;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.backsites.input.Deal.index');
    }

    // public function getDealsData()
    // {
    //     // Memanggil method dari service
    //     return $this->dealService->getDealsDataTables();
    // }

    public function create(): View
    {
        $branches = $this->dealService->getBranches();
        $carBrands = $this->dealService->getCarBrands();
        $dealTypes = $this->dealTypes;

        return view('pages.backsites.input.Deal._deal', compact('branches', 'carBrands', 'dealTypes'));
    }

    public function store(DealRequest $request): RedirectResponse
    {
        // Ini akan menampilkan semua data yang dikirim dari form
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

    private function generateTitle($request)
    {
        if (in_array($request->deal_type, ['Mobil_Baru', 'Mobil_Bekas'])) {
            return "Akad {$request->deal_type} - {$request->car_brand} {$request->car_type} - Cabang {$request->branch_id}";
        } elseif ($request->deal_type == 'Tanah') {
            return "Akad {$request->deal_type} - Sebidang - Cabang {$request->branch_id}";
        } else {
            return "Akad {$request->deal_type} - Unit - Cabang {$request->branch_id}";
        }
    }
}
