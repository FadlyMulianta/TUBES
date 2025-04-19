<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class AuthController extends Controller
{
    function registrasiTampil(){
        return view('auth.registrasi');
    }
    function registrasiKirim(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->namabelakang = $request->namabelakang;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nohp = $request->nohp;
        $user->save();
        
        return redirect()->route('login');

    }

    function loginTampil(){
        return view('auth.login');
    }

    function loginKirim(Request $request){
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('mainBeranda');
        }
        else{
            return redirect()->back()->with('error', 'email atau password salah');
        }
    }
    function logout(){
        Auth::logout();
        return redirect()->route('beranda');
    }
    
}
