<?php

namespace App\Http\Controllers\Backsites\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __invoke()
    {
        return view('pages.backsites.master.category.index');
    }
}
