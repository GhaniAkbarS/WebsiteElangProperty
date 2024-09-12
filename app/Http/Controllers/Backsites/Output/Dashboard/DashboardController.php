<?php

namespace App\Http\Controllers\Backsites\Output\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// class ini yang ada pada route web.php yang berisi index di home frontsites pages
class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('pages.backsites.output.dashboard.index');
    }
}
