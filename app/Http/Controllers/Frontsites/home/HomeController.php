<?php

namespace App\Http\Controllers\Frontsites\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// class ini yang ada pada route web.php yang berisi index di home frontsites pages
class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.frontsites.home.index');
    }
}
