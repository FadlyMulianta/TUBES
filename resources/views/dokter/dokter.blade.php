<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Konsultasi</title>
    <!-- <link rel="stylesheet" href="./asset/dokter.css"> -->
    <link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
</head>

<body>
    @include('header.mainHeader')

    <div class="container">

        <div class="content">
             <div class="filter">
                
                <h3>FILTER</h3>
                <!-- <label>Ulasan Dokter:</label> -->
                <input type="text" placeholder="Masukkan Nama Dokter " class="input-filter">
                <!-- <label>Biaya Konsultasi:</label> 
                 div
                 -->
                <div class="price-range" style="margin-bottom: 10px;">
                    <p><b>Jenis Kelamin :</b></p>
                    <form style="display: flex;">
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;" checked>
                            <p>semua</p>
                        </label>
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;">
                            <p>Laki - Laki</p>
                        </label>
                        <label style="display: flex;">
                            <input type="radio" name="price_range" value="100000+" style="margin-right: 5px;">
                            <p>Perempuan</p>
                        </label>
                    </form>

                </div>
                <div class="price-range" style="margin-bottom: 10px;">
                    <p><b>Harga :</b></p>
                    <form style="display: flex;">
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;" checked>
                            <p>semua</p>
                        </label>
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;">
                            <p>Rp0 - Rp100.000</p>
                        </label>
                        <label style="display: flex;">
                            <input type="radio" name="price_range" value="100000+" style="margin-right: 5px;">
                            <p>Rp100.000+</p>
                        </label>
                    </form>

                </div>
                <div class="price-range">
                    <p><b>Pengalaman :</b></p>
                    <form style="display: flex;">
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;" checked>
                            <p>semua</p>
                        </label>
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;">
                            <p>1 - 5 Tahun</p>
                        </label>
                        <label style="display: flex;">
                            <input type="radio" name="price_range" value="100000+" style="margin-right: 5px;">
                            <p>5 Tahun+</p>
                        </label>
                    </form>

                </div>


                <button>Cari</button>
            </div>
             <div class="doctor-list">
                <div class="doctor-card">
                    @foreach ($dokter as $dokter )
                        
                    
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('storage/'.$dokter->foto) }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr. {{ $dokter->nama_dokter }}</h1>
                                <h1>Rp {{ number_format($dokter->harga_konsultasi, 2, ',', '.') }}</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> {{ $dokter->tahun_pengalaman }} Tahun</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>{{ $dokter->kota }}</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>{{ $dokter->rating }} % | 1rb+ Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>
           
           
        </div>
    </div>
    
    
    <script>
        window.addEventListener('scroll', function() {
            const keranjang = document.querySelector('.filter');
            const footer = document.querySelector('#footer');

            const footerRect = footer.getBoundingClientRect();
            const keranjangHeight = keranjang.offsetHeight;

            // Jika elemen footer terlihat, posisikan keranjang di atas footer
            if (footerRect.top < window.innerHeight) {
                keranjang.style.position = 'absolute';
                keranjang.style.top = `${window.scrollY + footerRect.top - keranjangHeight - 313}px`;
            } else {
                keranjang.style.position = 'fixed';
                keranjang.style.top = '6.3rem';
            }
        });
    </script>
    
    
</>

</html>