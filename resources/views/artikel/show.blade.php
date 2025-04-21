<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .article-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .thumbnail {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .create-btn,
        .login-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .create-btn {
            background-color: #007bff;
            color: white;
        }

        .create-btn:hover {
            background-color: #0056b3;
        }

        .login-btn {
            background-color: #f0ad4e;
            color: white;
        }

        .login-btn:hover {
            background-color: #ec971f;
        }

        .content {
            margin-top: 20px;
            line-height: 1.6;
        }

        .category {
            margin-top: 10px;
            font-style: italic;
        }

        .back-link {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    @if($isAuthenticated)
        @include('header.mainHeader', ['jumlahProdukKeranjang' => $jumlahProdukKeranjang]) {{-- Header untuk pengguna yang sudah login --}}
    @else
        @include('header.headerAwal')  {{-- Header untuk pengguna yang belum login --}}
    @endif
    <div class="container">

        <div class="article-card">
            <h1>{{ $article->name }}</h1>

            <!-- Menampilkan gambar thumbnail artikel -->
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" class="thumbnail">

            <!-- Menampilkan kategori artikel -->
            <p class="category">Kategori: {{ $article->category->name }}</p>

            <!-- Menampilkan konten lengkap artikel -->
            <div class="content">
                {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Kembali ke halaman daftar artikel -->
            <a href="{{ route('artikel.index') }}" class="back-link">← Kembali ke Daftar Artikel</a>
        </div>
    </div>
</body>
</html>
