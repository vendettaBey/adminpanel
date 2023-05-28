<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PanelController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/password', [ProfileController::class, 'password'])->name('profile.password');
});

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/kategoriEkle', [PanelController::class, 'kategoriEkle'])->name('kategoriEkle');
    Route::any('/kategoriKaydet', [PanelController::class, 'kategoriKaydet'])->name('kategoriKaydet');


    Route::get('/kategoriDuzenle/{categoryId}', [PanelController::class, 'kategoriDuzenle'])->name('kategoriDuzenle');
    Route::post('/kategoriUpdate', [PanelController::class, 'kategoriUpdate'])->name('kategoriUpdate');
    Route::any('/kategoriSil', [PanelController::class, 'kategoriSil'])->name('kategoriSil');


    //! Ürünler

    Route::get('/urunEkle', [PanelController::class, 'urunEkle'])->name('urunEkle');
    Route::post('/urunKaydet', [PanelController::class, 'urunKaydet'])->name('urunKaydet');

    Route::get('/urunler', [PanelController::class, 'urunler'])->name('urunler');

    Route::get('/urunDuzenle/{urunId}', [PanelController::class, 'urunDuzenle'])->name('urunDuzenle');
    Route::get('/urunSil/{urunId}', [PanelController::class, 'urunSil'])->name('urunSil');
    Route::post('/blogDuzenleKaydet', [PanelController::class, 'blogDuzenleKaydet'])->name('blogDuzenleKaydet');


});
require __DIR__ . '/auth.php';