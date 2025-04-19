<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    function berandaTampil(){
        $produk = Produk::inRandomOrder()->take(6)->get();
        return view('beranda.beranda', ['produk' => $produk]);
    }
}
