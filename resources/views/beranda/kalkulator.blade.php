<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>
    <h1>selamat datang {{ Auth::user()->name }}</h1><br>
    <form method="POST" action="{{ route('hitung') }}">
        @csrf
        <input type="number" name="angka1" placeholder="Angka pertama" required><br><br>
        <input type="number" name="angka2" placeholder="Angka kedua" required><br><br>
        <select name="operasi"><br><br>
            <option value="tambah">Tambah</option>
            <option value="kurang">Kurang</option>
            <option value="kali">Kali</option>
            <option value="bagi">Bagi</option>
        </select><br><br>
        <button type="submit">Hitung</button>
    </form>

    <h2>Hasil: {{ $hasil ?? '' }}</h2>
    <a href="{{ route('logout') }}">logout</a>
</body>
</html>