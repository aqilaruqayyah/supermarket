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

Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);
Route::resource('penjual', PenjualController::class);
Route::resource('pembeli', PembeliController::class);
Route::resource('pembelian', PembelianController::class);





 