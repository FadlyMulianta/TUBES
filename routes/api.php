<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import semua controller yang dibutuhkan
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\RegisterApiController; // Pastikan controller ini ada
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\DokterController;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\KeranjangController;
use App\Http\Controllers\Api\ConsultationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// == ROUTE PUBLIK (Tidak Perlu Login/Token) ==
// =========================================================================

// Otentikasi
Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [RegisterApiController::class, 'register']); // Menambahkan route registrasi

// Produk (Hanya melihat daftar dan detail)
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

// Dokter (Hanya melihat daftar dan detail)
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/{id}', [DokterController::class, 'show']);

// Artikel (Hanya melihat daftar dan detail)
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show']);

// =========================================================================
// == ROUTE TERPROTEKSI (Wajib Mengirim Token Auth) ==
// =========================================================================



Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::post('/keranjang', [KeranjangController::class, 'store']);
Route::put('/keranjang/{id}', [KeranjangController::class, 'update']); // <-- Typo '/eranjang' sudah diperbaiki
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);
Route::post('/keranjang/bulk-action', [KeranjangController::class, 'bulkAction']);


Route::middleware('auth:sanctum')->group(function () {
    // Info User & Logout
    Route::get('/user', [AuthApiController::class, 'user']);
    Route::post('/logout', [AuthApiController::class, 'logout']);

    // Keranjang (Semua aksi keranjang butuh login)


    // Konsultasi (Semua aksi konsultasi butuh login)
    Route::get('/konsultasi', [ConsultationController::class, 'index']);
    Route::get('/konsultasi/{id}', [ConsultationController::class, 'show']);
    Route::post('/konsultasi', [ConsultationController::class, 'store']);
    Route::put('/konsultasi/{id}', [ConsultationController::class, 'update']);
    Route::delete('/konsultasi/{id}', [ConsultationController::class, 'destroy']);

    // Admin/CRUD Actions (Asumsi: membuat/mengubah/menghapus butuh login)
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

    Route::post('/dokter', [DokterController::class, 'store']);
    Route::put('/dokter/{id}', [DokterController::class, 'update']);
    Route::delete('/dokter/{id}', [DokterController::class, 'destroy']);

    Route::post('/artikel', [ArtikelController::class, 'store']);
    Route::put('/artikel/{id}', [ArtikelController::class, 'update']);
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy']);
});
