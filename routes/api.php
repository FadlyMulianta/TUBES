<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembayaranController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Auth (Login & Registrasi)
Route::post('/login', [AuthController::class, 'apiLogin']);
Route::post('/register', [AuthController::class, 'apiRegister']);
Route::post('/logout', [AuthController::class, 'apiLogout'])->middleware('auth:sanctum');

// Produk
Route::get('/produk', [ProdukController::class, 'apiIndex']); // semua produk
Route::get('/produk/{slug}', [ProdukController::class, 'apiDetail']); // detail produk

// Dokter
Route::get('/dokter', [DokterController::class, 'apiIndex']);
Route::get('/dokter/{id}', [DokterController::class, 'apiDetail']);

// Artikel
Route::get('/artikel', [ArtikelController::class, 'apiIndex']);
Route::get('/artikel/{id}', [ArtikelController::class, 'apiShow']);

// Keranjang (Butuh Auth)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'apiIndex']);
    Route::post('/keranjang', [KeranjangController::class, 'apiTambah']);
    Route::put('/keranjang/{id}', [KeranjangController::class, 'apiUpdate']);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'apiHapus']);
    Route::post('/keranjang/clear', [KeranjangController::class, 'apiClear']);

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'apiIndex']);
});
