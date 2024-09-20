<?php

namespace App\Http\Controllers\Frontsites\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide; // Tambahkan model Slide untuk mengambil data dari tabel ep_slide

class HomeController extends Controller
{
    public function __invoke()
    {
        // Mengambil data slide dari database, misalnya 3 slider terbaru
        $slides = Slide::latest()->take(3)->get();

        // Kirim data slides ke view
        return view('pages.frontsites.home.index', compact('slides'));
    }
}
