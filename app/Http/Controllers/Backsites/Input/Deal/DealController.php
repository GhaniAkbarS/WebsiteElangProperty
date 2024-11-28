<?php

namespace App\Http\Controllers\Backsites\Input\Deal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DealRequest;
use App\Services\DealService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Deal;
use App\Models\Branch;
use App\Models\CarBrand;
use App\Models\DealPhoto;
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
            $deals = Deal::with('branch')->select(['id', 'title', 'branch_id', 'deal_type', 'updated_at']);

            return DataTables::of($deals)
                ->addIndexColumn()
                ->addColumn('branch', function ($deal) {
                    return $deal->branch ? $deal->branch->title : 'Cabang Tidak Ditemukan';
                })
                ->addColumn('action', function ($deal) {
                    return '<div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item btn-edit" href="javascript:void(0);" data-url="' . route('deal.edit', $deal->id) . '">Edit</a></li>
                                    <li><a class="dropdown-item text-danger btn-delete" href="javascript:void(0);" data-url="' . route('deal.destroy', $deal->id) . '">Hapus</a></li>
                                </ul>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Kembalikan daftar cabang untuk tampilan
        $branches = Branch::all();
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
        try {
            // Simpan data utama deal
            $deal = Deal::create([
                'title' => $request->input('title'),
                'deal_type' => $request->input('deal_type'),
                'branch_id' => $request->input('branch_id'),
                'image' => $request->hasFile('image')
                    ? $request->file('image')->store('deals', 'public')
                    : null, // Simpan thumbnail jika ada
            ]);

            // Simpan foto akad jika ada
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath = $photo->store('deal_photo', 'public');
                    $deal->photos()->create(['file' => $photoPath]);
                }
            }

            return redirect()->route('deal.index')->with('success', 'Akad berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan akad: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $deal = $this->dealService->findDealById($id); // atau Deal::find($id) jika Anda ingin menangani error manual
        return view('pages.backsites.input.deal.show', compact('deal'));
    }

    public function edit($id)
    {
        $deal = Deal::with('photos')->findOrFail($id);
        $branches = Branch::all();
        $dealTypes = $this->dealTypes;
        $carBrands = CarBrand::all();

        return view('pages.backsites.input.deal.edit', compact('deal', 'branches', 'dealTypes', 'carBrands'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $deal = Deal::findOrFail($id);

            $request->validate([
                'title' => 'nullable|string|max:255',
                'deal_type' => 'nullable|string',
                'branch_id' => 'nullable|exists:branches,id',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Update data deal
            $deal->update($request->only('title', 'deal_type', 'branch_id'));

            // Menyimpan foto ke storage
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('photos', 'public');
                $deal->photo = $path;
                $deal->save();
            }

            return redirect()->back()->with('success', 'Foto berhasil diunggah.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data deal: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Cari data foto berdasarkan ID
            $photo = DealPhoto::findOrFail($id);

            // Hapus file dari storage
            if (file_exists(storage_path('app/public/deal_photos/' . $photo->file))) {
                unlink(storage_path('app/public/deal_photos/' . $photo->file));
            }

            // Hapus data dari database
            $photo->delete();

            // Jika permintaan berasal dari AJAX
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Foto akad berhasil dihapus']);
            }

            // Jika permintaan bukan dari AJAX
            return redirect()->back()->with('success', 'Foto akad berhasil dihapus');
        } catch (Exception $e) {
            // Jika terjadi kesalahan
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Gagal menghapus foto akad: ' . $e->getMessage()], 500);
            }

            return redirect()->back()->with('error', 'Gagal menghapus foto akad: ' . $e->getMessage());
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

    // Method untuk upload foto akad
    public function storePhoto(Request $request, Deal $deal)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file ke storage
        $path = $request->file('photo')->store('photos', 'public');

        // Simpan informasi ke database
        $deal->photos()->create(['file' => $path]);

        return redirect()->back()->with('success', 'Foto berhasil diunggah.');
    }

    public function destroyPhoto(DealPhoto $photo)
    {
        // Hapus file dari storage
        Storage::disk('public')->delete($photo->file);

        // Hapus dari database
        $photo->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }

}
