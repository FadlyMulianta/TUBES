<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Dokter</title>
    <style>
        /* Gaya umum */
        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .profil {
            margin: 10px;
            width: 20%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-height: 400px;
        }

        .profil-dokter {
            text-align: center;
            margin-bottom: 20px;
        }

        .profil-dokter a {
            text-decoration: none;
            color: rgb(142, 154, 165);
        }

        .profil img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .waktu {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: rgb(151, 194, 220);
            margin-bottom: 20px;
        }

        .metode-pembayaran {
            margin: 10px;
            width: 40%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            min-height: 400px;
        }

        .total-pembayaran {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            margin: 10px;
            min-height: 200px;
        }

        .metode {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .nota {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .nota a {
            font-size: 16px;
        }

        .total-pembayaran a {
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-top: 10px;
            text-align: right;
            font-family: 'Courier New', Courier, monospace;
        }

        .Mbanking a, .E-Wallet a {
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            border: 2px solid #007BFF;
            border-radius: 5px;
            color: #007BFF;
            font-size: 16px;
            margin: 10px 0;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .Mbanking a:hover, .E-Wallet a:hover {
            background-color: #f1f1f1;
        }

        .Mbanking a img, .E-Wallet a img {
            width: 25px;
            height: 25px;
            margin-right: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-content h4 {
            margin-bottom: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        .choices {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f1f1f1;
        }

        .choices ul {
            list-style-type: none;
            padding: 0;
        }

        .choices ul li {
            margin-bottom: 5px;
        }

        .choices ul li input {
            margin-right: 5px;
        }

        .choices ul li a {
            text-decoration: none;
            color: #007BFF;
        }

        .choices ul li a:hover {
            text-decoration: underline;
        }

        /* Tombol Bayar dan Batal */
        .payment-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            padding: 20px;
            gap: 10px;
        }

        .payment-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .payment-buttons button a {
            text-decoration: none;
            color: white;
        }

        .bayar {
            background-color: #28a745;
            color: white;
        }

        .batal {
            background-color: #dc3545;
            color: white;
        }

        .payment-buttons button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .payment-buttons .bayar:hover {
            background-color: #218838; 
        }

        .payment-buttons .batal:hover {
            background-color: #c82333; 
        }

        .profil-dokter a:hover {
            text-decoration: none;
            color: #0056b3;
        }

    </style>
</head>
<body>
    @include('header.mainHeader')
    <div class="container">
        <div class="profil">
            <h4>Profil Dokter</h4>
            <div class="profil-dokter">
                <img src="{{ asset('storage/'.$dokter->foto) }}" alt="Foto Profil Dokter">
                <h5>Dr. {{ $dokter->nama_dokter }}</h5>
                <p>Spesialisasi: {{ $dokter->spesialisasi }}</p>
                <h5>Ulasan:</h5>
                <p>{{ $dokter->rating }}⭐</p>
                <a href="javascript:void(0);" onclick="openModal()">Detail</a>
            </div>
        </div>
        <div class="metode-pembayaran">
                <div class="waktu">
                    <h4>Pilih Waktu</h4>
                    <label for="tanggal-waktu">Pilih Tanggal:</label>
                    <input type="date" id="tanggal-waktu" min="{{ date('Y-m-d') }}" required>
                    <br>
                    <label for="jam">Pilih Jam:</label>
                    <input type="time" id="jam">
                </div>

            <div class="metode">
                <h4>Metode Pembayaran</h4>
                <p>Metode pembayaran yang tersedia:</p>
                <br>
                <hr>
                <div class="Mbanking">
                    <a href="javascript:void(0);" onclick="toggleChoices('mbankingChoices')">
                        <img src="../gambar/Logo BCA_biru.png" alt="BCA">Mbanking
                    </a>
                    <div id="mbankingChoices" class="choices">
                        <ul>
                            <li><input type="checkbox" id="bca"><label for="bca">Bank BCA</label></li>
                            <li><input type="checkbox" id="mandiri"><label for="mandiri">Bank Mandiri</label></li>
                            <li><input type="checkbox" id="bni"><label for="bni">Bank BNI</label></li>
                            <li><input type="checkbox" id="bri"><label for="bri">Bank BRI</label></li>
                        </ul>
                    </div>
                </div>
                <div class="E-Wallet">
                    <a href="javascript:void(0);" onclick="toggleChoices('ewalletChoices')">
                        <img src="../gambar/logo dana.png" alt="GoPay">E-Wallet
                    </a>
                    <div id="ewalletChoices" class="choices">
                        <ul>
                            <li><input type="checkbox" id="gopay"><label for="gopay">GoPay</label></li>
                            <li><input type="checkbox" id="ovo"><label for="ovo">OVO</label></li>
                            <li><input type="checkbox" id="dana"><label for="dana">DANA</label></li>
                            <li><input type="checkbox" id="linkaja"><label for="linkaja">LinkAja</label></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tombol Bayar dan Batal -->
            <div class="payment-buttons">
                <button class="batal" onclick="batal()"><a href="{{ route('dokter') }}">Batal</a></button>
                <button class="bayar" onclick="bayar()"><a href="{{ route('chat') }}">Bayar</a></button>
            </div>
        </div>
        <div class="total-pembayaran">
            <div class="nota">
                <a>Konsultasi:</a>
                <a>Rp. {{ $dokter->harga_konsultasi }}</a>
            </div>
            <hr>
            <a>Total: Rp. {{ $dokter->harga_konsultasi }}</a>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalDetail" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h4>Detail Deskripsi Dokter</h4>
            <p><strong>Nama:</strong> Dr. {{ $dokter->nama_dokter }}</p>
            <p><strong>Rating:</strong> {{ $dokter->rating }} ⭐</p>
            <p><strong>Spesialisasi:</strong> {{ $dokter->spesialisasi }}</p>
            <p><strong>Pengalaman Kerja:</strong> {{ $dokter->tahun_pengalaman }}</p>
            <p><strong>Alamat:</strong> {{ $dokter->kota }}</p>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan modal
        function openModal() {
            document.getElementById("modalDetail").style.display = "block";
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("modalDetail").style.display = "none";
        }

        // Menutup modal jika user mengklik di luar modal
        window.onclick = function(event) {
            var modal = document.getElementById("modalDetail");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }

        function toggleChoices(id) {
            const element = document.getElementById(id);
            if (element.style.display === 'block') {
                element.style.display = 'none';
            } else {
                element.style.display = 'block';
            }
        }

        // Fungsi untuk tombol Bayar
        function bayar() {
            alert("Pembayaran berhasil!");
        }

        // Fungsi untuk tombol Batal
        function batal() {
            alert("Pembayaran dibatalkan!");
        }
    </script>

</body>
</html>
