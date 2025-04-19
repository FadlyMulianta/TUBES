<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
class ProdukController extends Controller
{
    function produkTampil(Request $request){
        $produk = Produk::all();
        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');
        return view('skincare.produk', ['produk' => $produk, 'jumlahProdukKeranjang' => $jumlahProdukKeranjang]);
    }
    public function produkDetail($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        $produkTerkait = Produk::where('kategori', $produk->kategori)
            ->where('id', '!=', $produk->id)
            ->limit(6)
            ->get();
        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');
        return view('skincare.detailProduk', compact('produk', 'produkTerkait', 'jumlahProdukKeranjang'));
    }
}
