<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainBerandaController extends Controller
{
    function MainberandaTampil()
    {
        $produk = Produk::inRandomOrder()->take(6)->get();
        $dokter = Dokter::inRandomOrder()->take(6)->get();
        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');
        return view('beranda.mainBeranda', [
            'produk' => $produk,
            'dokter' => $dokter,
            'jumlahProdukKeranjang' => $jumlahProdukKeranjang
        ]);
    }
}
