<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();

        return response()->json([
            'status' => true,
            'message' => 'List produk berhasil diambil',
            'data' => $produk,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'slug' => 'required|unique:produk,slug',
            'deskripsi_produk' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'nama_toko' => 'required',
            'kategori' => 'required',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload gambar ke storage/app/asset/gambar
        if ($request->hasFile('gambar_produk')) {
            $filename = $request->file('gambar_produk')->hashName();
            $request->file('gambar_produk')->storeAs('asset/gambar', $filename);
            $validated['gambar_produk'] = 'asset/gambar/' . $filename;
        }

        $produk = Produk::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil dibuat',
            'data' => $produk
        ], 201);
    }


    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'sometimes|required',
            'slug' => 'sometimes|required|unique:produk,slug,' . $id,
            'deskripsi_produk' => 'nullable',
            'harga' => 'sometimes|required|numeric',
            'stok' => 'sometimes|required|integer',
            'nama_toko' => 'sometimes|required',
            'kategori' => 'sometimes|required',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar_produk')) {
            // Hapus file lama jika ada
            $oldFilePath = storage_path('app/' . $produk->gambar_produk);
            if ($produk->gambar_produk && file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Simpan file baru ke folder asset/gambar
            $filename = $request->file('gambar_produk')->hashName();
            $request->file('gambar_produk')->storeAs('asset/gambar', $filename);
            $validated['gambar_produk'] = 'asset/gambar/' . $filename;
        }

        $produk->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil diperbarui',
            'data' => $produk
        ]);
    }


    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}
