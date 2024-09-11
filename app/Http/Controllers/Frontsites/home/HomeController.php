<?php

namespace App\Http\Controllers\Frontsites\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.frontsites.home.index');
    }
}
