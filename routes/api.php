<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\DokterController;
use App\Http\Controllers\api\ArtikelController;
use App\Http\Controllers\api\KeranjangController;
use App\Http\Controllers\Api\ConsultationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/produk', [ProdukController::class, 'index']);         
Route::get('/produk/{id}', [ProdukController::class, 'show']);     
Route::post('/produk', [ProdukController::class, 'store']);        
Route::put('/produk/{id}', [ProdukController::class, 'update']);  
Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

Route::get('/dokter', [DokterController::class, 'index']);         
Route::get('/dokter/{id}', [DokterController::class, 'show']);     
Route::post('/dokter', [DokterController::class, 'store']);        
Route::put('/dokter/{id}', [DokterController::class, 'update']);   
Route::delete('/dokter/{id}', [DokterController::class, 'destroy']);


Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show']);
Route::post('/artikel', [ArtikelController::class, 'store']);
Route::put('/artikel/{id}', [ArtikelController::class, 'update']);
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy']);


Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::post('/keranjang', [KeranjangController::class, 'store']);
Route::put('/eranjang/{id}', [KeranjangController::class, 'update']);
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);
Route::post('/keranjang/bulk-action', [KeranjangController::class, 'bulkAction']);

Route::get('/konsultasi', [ConsultationController::class, 'index']);
Route::get('/konsultasi/{id}', [ConsultationController::class, 'show']);
Route::post('/konsultasi', [ConsultationController::class, 'store']);
Route::put('/konsultasi/{id}', [ConsultationController::class, 'update']);
Route::delete('konsultasi/{id}', [ConsultationController::class, 'destroy']);








// Dokter
// Route::get('/dokter', [DokterController::class, 'apiIndex']);
// Route::get('/dokter/{id}', [DokterController::class, 'apiDetail']);

// // Artikel
// Route::get('/artikel', [ArtikelController::class, 'apiIndex']);
// Route::get('/artikel/{id}', [ArtikelController::class, 'apiShow']);

// // Keranjang (Butuh Auth)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/keranjang', [KeranjangController::class, 'apiIndex']);
//     Route::post('/keranjang', [KeranjangController::class, 'apiTambah']);
//     Route::put('/keranjang/{id}', [KeranjangController::class, 'apiUpdate']);
//     Route::delete('/keranjang/{id}', [KeranjangController::class, 'apiHapus']);
//     Route::post('/keranjang/clear', [KeranjangController::class, 'apiClear']);

//     // Pembayaran
//     Route::get('/pembayaran', [PembayaranController::class, 'apiIndex']);
// });
