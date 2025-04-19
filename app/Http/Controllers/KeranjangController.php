<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('produk')
            ->where('user_id', Auth::id())
            ->get()
            ->groupBy(function ($item) {
            return $item->produk->nama_toko ?? 'Toko Default';
             });
        $jumlahProdukKeranjang = Keranjang::where('user_id', Auth::id())->sum('jumlah');    
        return view('keranjang.keranjang', ['keranjang' => $keranjang, 'jumlahProdukKeranjang' => $jumlahProdukKeranjang]);
    }

    public function tambah(Request $request)
    {
        $produkId = $request->produk_id;
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Anda harus login terlebih dahulu.'], 401);
        }

        $item = Keranjang::where('user_id', $userId)
            ->where('produk_id', $produkId)
            ->first();

        if ($item) {
            $item->jumlah += 1;
            $item->save();
        } else {
            Keranjang::create([
                'user_id' => $userId,
                'produk_id' => $produkId,
                'jumlah' => 1
            ]);
        }

        return response()->json(['success' => true]);
    }



    public function hapus($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        if ($keranjang->user_id == Auth::id()) {
            $keranjang->delete();
        }
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $action = $request->input('action');

        if ($action === 'increase') {
            // pastikan tidak melebihi stok produk
            if ($keranjang->jumlah < $keranjang->produk->stok) {
                $keranjang->jumlah += 1;
                $keranjang->save();
            } else {
                return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
            }
        } elseif ($action === 'decrease') {
            if ($keranjang->jumlah > 1) {
                $keranjang->jumlah -= 1;
                $keranjang->save();
            } else {
                // jika jumlah 1 dan dikurangi lagi, hapus item dari keranjang
                $keranjang->delete();
            }
        }

        return back()->with('success', 'Keranjang berhasil diperbarui.');
    }

    public function bulkAction(Request $request)
    {
        $ids = $request->input('produk_id', []);
        $action = $request->input('action');

        if ($action === 'hapus') {
            Keranjang::whereIn('id', $ids)->where('user_id', Auth::id())->delete();
            return back()->with('success', 'Produk berhasil dihapus.');
        }


        return back()->with('error', 'Tidak ada aksi dipilih.');
    }
}
