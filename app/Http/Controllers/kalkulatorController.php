<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class kalkulatorController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('beranda.kalkulator',['users' => $users]);
    }

    public function hitung(Request $request)
    {
        $data = $request->all();
        $angka1 = $data['angka1'];
        $angka2 = $data['angka2'];
        $operasi = $data['operasi'];

        switch ($operasi) {
            case 'tambah':
                $hasil = $angka1 + $angka2;
                break;
            case 'kurang':
                $hasil = $angka1 - $angka2;
                break;
            case 'kali':
                $hasil = $angka1 * $angka2;
                break;
            case 'bagi':
                $hasil = $angka2 != 0 ? $angka1 / $angka2 : 'Kesalahan: Pembagian dengan nol';
                break;
            default:
                $hasil = 'Operasi tidak valid';
                break;
        }

        return view('beranda.kalkulator', ['hasil' => $hasil]);
    }

}
