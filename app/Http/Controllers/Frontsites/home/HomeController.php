<?php

namespace App\Http\Controllers\Frontsites\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Blog; // Tambahkan model Slide untuk mengambil data dari tabel ep_slide
use App\Services\FrontSites\HomeService;

class HomeController extends Controller
{
    protected $homeservice;

    public function __construct(HomeService $homeService)
    {
        $this->homeservice = $homeService;
    }
    public function __invoke()
    {
        // Mengambil data slide dari database, misalnya 3 slider terbaru
        // $slides = Slide::latest()->take(3)->get();

        $data=[
            "slides" => $this->homeservice->handleHomeSlide(3),
            "blogs"=>$this->homeservice->handleHomeBlog(6,['status'=>'publish']),
            //'status' itu karena blog ada status nya publish apa engga
        ];
        

        // Kirim data blogs ke view
        return view('pages.frontsites.home.index')->with($data);
    }
}
