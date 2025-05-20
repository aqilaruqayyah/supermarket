<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PembelianController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pembelian', function () {
    $pembelis = \App\Models\Pembeli::all();
    $produks = \App\Models\Produk::all();
    $penjuals = \App\Models\Penjual::all();
    return view('pembelian', compact('pembelis', 'produks', 'penjuals'));
});

Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');

Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);
Route::resource('penjual', PenjualController::class);
Route::resource('pembeli', PembeliController::class);
Route::resource('pembelian', PembelianController::class);





 
