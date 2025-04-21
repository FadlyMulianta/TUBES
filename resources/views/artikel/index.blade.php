<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikel</title>
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
            padding: 15px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .thumbnail {
            width: 100%;
            max-height: 250px;
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

        .category-select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .article-content {
            height: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .read-more {
            color: #007bff;
            cursor: pointer;
        }

        .read-more:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <!-- Di dalam artikel.index.blade.php -->
    @if($isAuthenticated)
        @include('header.mainHeader', ['jumlahProdukKeranjang' => $jumlahProdukKeranjang]) {{-- Header untuk pengguna yang sudah login --}}
    @else
        @include('header.headerAwal')  {{-- Header untuk pengguna yang belum login --}}
    @endif
    <div class="container">

        <h1>Daftar Artikel</h1>

        @auth
            <!-- Tombol untuk membuat artikel jika pengguna sudah login -->
            <a href="{{ route('artikel.create') }}" class="create-btn">
                <i class="fas fa-plus"></i> Buat Artikel
            </a>
        @endauth

        @guest
            <!-- Tombol login jika pengguna belum login -->
            <a href="{{ route('login') }}" class="login-btn">
                <i class="fas fa-sign-in-alt"></i> Login untuk membuat artikel
            </a>
        @endguest

        <form method="GET" action="{{ route('artikel.index') }}">
            <label for="category">Filter berdasarkan kategori:</label>
            <select name="category" id="category" class="category-select" onchange="this.form.submit()">
                <option value="">-- Semua Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <div>
            @forelse ($articles as $article)
                <div class="article-card">
                    <h2>{{ $article->name }}</h2>
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" class="thumbnail">
                    <p class="article-content">{{ Str::limit($article->content, 150) }}</p>
                    @if(strlen($article->content) > 150)
                        <a href="{{ route('artikel.show', $article->id) }}" class="read-more">Read More</a>
                    @endif
                    <small>Kategori: {{ $article->category->name }}</small>
                </div>
            @empty
                <p>Tidak ada artikel dalam kategori ini.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
