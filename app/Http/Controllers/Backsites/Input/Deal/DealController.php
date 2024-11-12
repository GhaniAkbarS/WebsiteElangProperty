<?php

namespace App\Http\Controllers\Backsites\Input\Deal;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealRequest;
use App\Services\DealService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Deal;
use App\Models\Branch;
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
        // Cek apakah ini adalah permintaan AJAX untuk DataTables
        if ($request->ajax()) {
            $deals = Deal::with('branch')->select(['id', 'title', 'branch_id', 'deal_type', 'updated_at']);

            return DataTables::of($deals)
                ->addIndexColumn()
                ->addColumn('branch.title', function ($deal) {
                    return $deal->branch ? $deal->branch->title : 'Cabang Tidak Ditemukan';
                })
                ->addColumn('action', function($deal){
                    return '<div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item btn-edit" href="javascript:void(0);" data-url="'. route('deal.edit', $deal->id) .'">Edit</a></li>
                                    <li><a class="dropdown-item text-danger btn-delete" href="javascript:void(0);" data-url="'. route('deal.destroy', $deal->id) .'">Hapus</a></li>
                                </ul>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Jika bukan permintaan AJAX, kembalikan ke tampilan dengan data yang diperlukan
        $branches = Branch::all(); // Asumsikan Anda memerlukan daftar cabang untuk modal edit
        return view('pages.backsites.input.Deal.index', compact('branches'));
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

    public function edit($id)
    {
        $deal = Deal::with('branch')->findOrFail($id);

        return response()->json($deal); // Mengembalikan data deal sebagai JSON
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deal_type' => 'required|string',
            'branch_id' => 'required|exists:branches,id', // Pastikan branch_id ada di tabel branches
        ]);

        $deal = Deal::find($id);

        if ($deal) {
            $deal->title = $request->input('title');
            $deal->deal_type = $request->input('deal_type');
            $deal->branch_id = $request->input('branch_id');
            $deal->save();

            return response()->json(['message' => 'Data berhasil diperbarui']);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
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
