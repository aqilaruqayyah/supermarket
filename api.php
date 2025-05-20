<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\KategoriController;
use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\PenjualController;
use App\Http\Controllers\api\PembeliController;
use App\Http\Controllers\api\PembelianController;

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('produk', ProdukController::class);
Route::apiResource('penjual', PenjualController::class);
Route::apiResource('pembeli', PembeliController::class);
Route::apiResource('pembelian', PembelianController::class);
