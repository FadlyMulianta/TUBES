<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->get('user_id'); // Ambil user_id dari request

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'user_id dibutuhkan.'], 400);
        }

        $keranjang = Keranjang::with('produk')
            ->where('user_id', $userId)
            ->get()
            ->groupBy(fn($item) => $item->produk->nama_toko ?? 'Toko Default');

        $jumlahProdukKeranjang = Keranjang::where('user_id', $userId)->sum('jumlah');

        return response()->json([
            'success' => true,
            'data' => $keranjang,
            'jumlah' => $jumlahProdukKeranjang,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'produk_id' => 'required|integer|exists:produk,id',
        ]);

        $item = Keranjang::where('user_id', $request->user_id)
            ->where('produk_id', $request->produk_id)
            ->first();

        if ($item) {
            $item->jumlah += 1;
            $item->save();
        } else {
            Keranjang::create([
                'user_id' => $request->user_id,
                'produk_id' => $request->produk_id,
                'jumlah' => 1,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Produk ditambahkan ke keranjang.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'action' => 'required|in:increase,decrease',
        ]);

        $keranjang = Keranjang::where('id', $id)
            ->where('user_id', $request->user_id)
            ->with('produk')
            ->firstOrFail();

        if ($request->action === 'increase') {
            if ($keranjang->jumlah < $keranjang->produk->stok) {
                $keranjang->jumlah += 1;
                $keranjang->save();
            } else {
                return response()->json(['success' => false, 'message' => 'Jumlah melebihi stok.']);
            }
        } elseif ($request->action === 'decrease') {
            if ($keranjang->jumlah > 1) {
                $keranjang->jumlah -= 1;
                $keranjang->save();
            } else {
                $keranjang->delete();
            }
        }

        return response()->json(['success' => true, 'message' => 'Keranjang diperbarui.']);
    }

    public function destroy(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
        ]);

        $keranjang = Keranjang::where('id', $id)
            ->where('user_id', $request->user_id)
            ->first();

        if (!$keranjang) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan.'], 404);
        }

        $keranjang->delete();

        return response()->json(['success' => true, 'message' => 'Item dihapus dari keranjang.']);
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'produk_id' => 'required|array',
            'action' => 'required|in:hapus',
        ]);

        if ($request->action === 'hapus') {
            Keranjang::whereIn('id', $request->produk_id)
                ->where('user_id', $request->user_id)
                ->delete();

            return response()->json(['success' => true, 'message' => 'Produk berhasil dihapus.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada aksi dipilih.']);
    }
}
