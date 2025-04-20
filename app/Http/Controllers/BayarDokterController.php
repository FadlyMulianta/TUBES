<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BayarDokterController extends Controller
{
    public function balikDokter(){
        return view('dokter.dokter');
    }
}
