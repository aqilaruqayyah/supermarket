<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\KategoriController;
use App\Http\Controllers\web\ProdukController;
use App\Http\Controllers\web\PenjualController;
use App\Http\Controllers\web\PembeliController;
use App\Http\Controllers\web\PembelianController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);
Route::resource('penjual', PenjualController::class);
Route::resource('pembeli', PembeliController::class);
Route::resource('pembelian', PembelianController::class);
