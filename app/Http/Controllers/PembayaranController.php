<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil isi keranjang berdasarkan user yang login, beserta relasi produk
        $keranjang = Keranjang::with('produk')
            ->where('user_id', $user->id)
            ->get();

        // Hitung total harga dari semua produk yang valid di keranjang
        $totalHarga = 0;
        foreach ($keranjang as $item) {
            if ($item->produk) { // Cek jika relasi produk tidak null
                $totalHarga += $item->produk->harga * $item->jumlah;
            }
        }

        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');
        return view('skincare.pembayaran', [
            'keranjang' => $keranjang,
            'totalHarga' => $totalHarga,
            'jumlahProdukKeranjang' => $jumlahProdukKeranjang
        ]);
    }
}
