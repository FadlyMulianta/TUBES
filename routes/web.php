<?php

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BerandaController;

use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\MainBerandaController;

use App\Http\Controllers\ChatController;



Route::middleware('auth')->group(function () {
    Route::get('/mainBeranda', [MainBerandaController::class, 'MainberandaTampil'])->name('mainBeranda');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/produk', [ProdukController::class, 'produkTampil'])->name('produk');
    Route::get('/produk/{slug}', [ProdukController::class, 'produkDetail'])->name('produkDetail');

    Route::get('/dokter', [DokterController::class, 'dokterTampil'])->name('dokter');
    Route::get('/dokter/bayardokter', [DokterController::class, 'bayardokterTampil'])->name('dokter.bayar'); 
    Route::get('/bayar-dokter/{id}', [DokterController::class, 'bayardokterTampil'])->name('bayar.dokter');

    Route::get('/chat', [ChatController::class, 'chatTampil'])->name('chat');


    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    Route::put('/keranjang/{id}/update', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::post('/keranjang/clear', [KeranjangController::class, 'bulkAction'])->name('keranjang.clear');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
});

Route::middleware('guest')->group(function () {
    
    Route::get('/login', [AuthController::class, 'loginTampil'])->name('login');
    Route::post('/login/kirim', [AuthController::class, 'loginKirim'])->name('kirim.login');
    Route::get('/', [BerandaController::class, 'berandaTampil'])->name('beranda');
    // Route::get('/', [BerandaController::class, 'berandaTampil'])->name('beranda');
    Route::get('/registrasi', [AuthController::class, 'registrasiTampil'])->name('registrasi');
    Route::post('/registrasi/kirim', [AuthController::class, 'registrasiKirim'])->name('kirim.registrasi');
});



