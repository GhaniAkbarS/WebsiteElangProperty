<?php

namespace App\Http\Controllers\Frontsites\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Blog; // Tambahkan model Slide untuk mengambil data dari tabel ep_slide

class HomeController extends Controller
{
    public function __invoke()
    {
        // Mengambil data slide dari database, misalnya 3 slider terbaru
        $slides = Slide::latest()->take(3)->get();

        // Kirim data slides ke view
        return view('pages.frontsites.home.index', compact('slides'));

        // Mengambil data blog yang berstatus publish, misalnya 6 blog terbaru
        $blogs = Blog::with('category') // Mengambil kategori terkait
        ->where('status', 'publish') // Hanya blog yang berstatus publish
        ->latest() // Mengurutkan dari yang terbaru
        ->take(6) // Ambil 6 blog terbaru
        ->get();

        // Kirim data blogs ke view
        return view('pages.frontsites.home.index', compact('blogs'));
    }
}
