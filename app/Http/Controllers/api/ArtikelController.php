<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArticleNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    // GET: /api/artikel
    public function index(Request $request)
    {
        $selectedCategory = $request->get('category');

        $articles = ArticleNews::when($selectedCategory, function ($query, $selectedCategory) {
            return $query->where('category_id', $selectedCategory);
        })->with('category')->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $articles
        ]);
    }

    // GET: /api/artikel/{id}
    public function show($id)
    {
        $article = ArticleNews::with('category')->find($id);

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $article
        ]);
    }

    // POST: /api/artikel
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:category_articles,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_featured' => 'nullable|in:featured,not_featured',
        ]);

        $thumbnailPath = $request->hasFile('thumbnail')
            ? $request->file('thumbnail')->store('thumbnails', 'public')
            : 'thumbnails/gambar-0-alodokter.jpg';

        $validated['thumbnail'] = $thumbnailPath;
        $validated['is_featured'] = $request->get('is_featured', 'featured');

        $article = ArticleNews::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil dibuat',
            'data' => $article
        ], 201);
    }

    // PUT: /api/artikel/{id}
    public function update(Request $request, $id)
    {
        $article = ArticleNews::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'category_id' => 'sometimes|required|exists:category_articles,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_featured' => 'nullable|in:featured,not_featured',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil diperbarui',
            'data' => $article
        ]);
    }

    public function destroy($id)
    {
        $article = ArticleNews::find($id);

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil dihapus'
        ]);
    }
}
