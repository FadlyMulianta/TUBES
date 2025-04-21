<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\CategoryArticle;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryArticle::all();
        $selectedCategory = $request->get('category');

        $articles = ArticleNews::when($selectedCategory, function ($query, $selectedCategory) {
            return $query->where('category_id', $selectedCategory);
        })->with('category')->latest()->get();

        $isAuthenticated = Auth::check();
        $jumlahProdukKeranjang = $isAuthenticated ? Keranjang::where('user_id', Auth::id())->count() : 0;

        return view('artikel.index', compact('articles', 'categories', 'selectedCategory', 'isAuthenticated', 'jumlahProdukKeranjang'));
    }

    public function create()
    {
        $categories = CategoryArticle::all();

        return Auth::check()
            ? view('artikel.create', compact('categories'))
            : redirect()->route('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:category_articles,id',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'is_featured' => 'nullable|in:featured,not_featured',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        // Set default is_featured to 'featured' if not provided
        $isFeatured = $request->has('is_featured') ? $request->is_featured : 'featured';

        ArticleNews::create([
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_featured' => $isFeatured, // Set value from request or default
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function show($id)
    {
        // Menampilkan artikel berdasarkan ID
        $article = ArticleNews::with('category')->findOrFail($id);

        // Mengecek apakah pengguna terautentikasi
        $isAuthenticated = Auth::check();
        $jumlahProdukKeranjang = $isAuthenticated ? Keranjang::where('user_id', Auth::id())->count() : 0;

        return view('artikel.show', compact('article', 'isAuthenticated', 'jumlahProdukKeranjang'));
    }
}
