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
        return view('dokter.bayar_dokter',compact('dokter', 'jumlahProdukKeranjang'));

    }

    public function apiIndex(Request $request)
    {
        $selectedNama = $request->get('nama_dokter');

        $dokters = Dokter::when($selectedNama, function ($query, $selectedNama) {
            return $query->where('nama_dokter', 'like', '%' . $selectedNama . '%');
        })->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $dokters
        ]);
    }
    
    

    



   
}
