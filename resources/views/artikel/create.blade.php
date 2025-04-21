<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buat Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form {
            max-width: 600px;
            margin: auto;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>

    <a href="{{ route('artikel.index') }}" class="back-link">← Kembali ke Daftar Artikel</a>

    <h2>Buat Artikel Baru</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Judul Artikel</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <label for="thumbnail">Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required>

        <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label for="content">Konten</label>
        <textarea name="content" id="content" rows="6" required>{{ old('content') }}</textarea>

        <label for="is_featured">Tampilkan di Beranda</label>
        <select name="is_featured" id="is_featured">
            <option value="featured" {{ old('is_featured') == 'featured' ? 'selected' : '' }}>Tampilkan</option>
            <option value="not_featured" {{ old('is_featured') == 'not_featured' ? 'selected' : '' }}>Tidak Tampilkan</option>
        </select>

        <button type="submit">Simpan Artikel</button>
    </form>

</body>
</html>
