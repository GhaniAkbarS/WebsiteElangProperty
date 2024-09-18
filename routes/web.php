<?php

use App\Http\Controllers\Frontsites\home\HomeController;
use App\Http\Controllers\Backsites\Output\Dashboard\DashboardController;
use App\Http\Controllers\Backsites\Master\Category\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route dibawah memanggil controler home yang berisi, alamat halaman utama, pada pages frontsite
// dalamnya ada folder home, dengan isi masing masing section
Route::get('/', HomeController::class)->name('home');

// slash atau garis miring itu adalah jika, setelah link nya itu, uri url namanya
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// route untuk bagian kategori pada backsites
// Route::prefix('category')->group(function () {
//     Route::get('/', [CategoryController::class, 'index'])->name('category.index');
//     Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
// });


// Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
// Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::prefix('backsites')->group(function(){
    Route::resource('category',CategoryController::class)->names('category');
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

