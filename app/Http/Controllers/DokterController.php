<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Keranjang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function dokterTampil()
    {   
        $dokter = Dokter::all();
        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');
        return view('dokter.dokter', ['dokter' => $dokter, 'jumlahProdukKeranjang' => $jumlahProdukKeranjang]);
    }
    public function bayardokterTampil($id)
    {   
        $dokter = Dokter::findOrFail($id);
        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');
        return view('dokter.bayar_dokter',compact('dokter'));

    }
    

    



   
}
