<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $produkTerpilih = json_decode($request->input('produk_terpilih'), true);

        if (!$produkTerpilih || !is_array($produkTerpilih)) {
            return redirect()->back()->with('error', 'Pilih minimal satu produk untuk melanjutkan pembayaran.');
        }

        $keranjang = Keranjang::with('produk')
            ->where('user_id', $user->id)
            ->whereIn('id', $produkTerpilih)
            ->get();

        $totalHarga = 0;
        foreach ($keranjang as $item) {
            if ($item->produk) {
                $totalHarga += $item->produk->harga * $item->jumlah;
            }
        }

        $jumlahProdukKeranjang = $keranjang->sum('jumlah');

        return view('skincare.pembayaran', [
            'keranjang' => $keranjang,
            'totalHarga' => $totalHarga,
            'jumlahProdukKeranjang' => $jumlahProdukKeranjang
        ]);
    }
}
