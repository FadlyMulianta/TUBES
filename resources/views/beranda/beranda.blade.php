<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Beranda</title>
</head>

<body>

    @include('header.headerAwal')

    <div class="iklan-video">
        <video autoplay muted loop class="video">
            <source src="{{ asset('asset/video/welcomeee.mp4') }}" type="">
        </video>

    </div>

    <main>
        <section class="iklan">
            <div class="dokter-judul">
                <h2 class="judul-awal">SELAMAT DATANG DI SKINEXPERT</h2>
                <h6>~ Website Konsultasi Terbaik Dan Produk Skincare Terlengkap ~</h6>
                <!-- <a href="">Cek Selengkapnya</a> -->
                <div class="kebawah">

                    <img src="{{ asset('asset/ikon/triple-down-chevron.png') }}" alt="">
                </div>
            </div>
        </section>

        <section class="dokter">
            <div class="dokter-judul">
                <h1 class="dokter-judul-1">Daftar Dokter Konsultasi</h1>
                <p>~ Temukan Dokter Favorite Anda ~</p>
            </div>
            <div>
            </div>
            <div class="dokter-gambar">
                <div class="gambar-grid-2">
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('asset/gambar/dokter1.jpg') }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr.John Doe</h1>
                                <h1>Rp 150.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> 4 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>Bandung</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>95% | 1rb+ Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('asset/gambar/dokter3.jpg') }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Jane Smith</h1>
                                <h1>Rp 50.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> 1 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>Medan</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>85% | 2rb+ Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>



                </div>

                <div class="gambar-grid-2">
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('asset/gambar/dokter2.jpg') }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Michael John</h1>
                                <h1>Rp 70.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> 2 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>Madiun</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>92% | 950 Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('asset/gambar/dokter6.jpg') }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Vincent</h1>
                                <h1>Rp 200.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> 6 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>Jakarta</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>98% | 1rb+ Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>



                </div>
                <div class="gambar-grid-2">
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('asset/gambar/dokter4.jpg') }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Ah Long</h1>
                                <h1>Rp 500.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> 10 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>Papua</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>91% | 5rb+ Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="{{ asset('asset/gambar/dokter5.jpg') }}" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Lalisa Ja</h1>
                                <h1>Rp 125.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/work.png') }}" alt="">
                                    <p> 3 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" alt="">
                                    <p>Lampung</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" alt="">
                                    <p>89% | 1rb+ Pasien</p>
                                </div>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                </div>
            </div>
            <div class="lihat-semua-top">
                <a class="lihat-semua" href="../pilih-dokter/pilihdokter.php">
                    <div>
                        <h4>Semua Dokter</h4>
                    </div>
                    <img src="../ikon/next.png" alt="">
                </a>
            </div>

        </section>

        <section class="dokter">


            <div id="customCarousel" class="carousel">
                <div class="carousel-indicators">
                    <button data-slide="0" class="active" aria-label="Slide 1"></button>
                    <button data-slide="1" aria-label="Slide 2"></button>
                    <button data-slide="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/gambar/banner1 prooo.jpg') }}" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/gambar/baneer pro 2.jpg') }}" alt="Slide 2">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/gambar/banner1 prooo.jpg') }}" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/gambar/baneer pro 2.jpg') }}" alt="Slide 2">
                    </div>

                </div>
                <div>
                    <button class="carousel-control-prev" aria-label="Previous Slide">
                        <div>
                            <img class="" src="{{ asset('asset/ikon/chevron kiri.png') }}" alt="" style="width: 70%; ">
                        </div>
                    </button>
                    <button class=" carousel-control-next" aria-label="Next Slide">
                        <div>
                            <img src="{{ asset('asset/ikon/chevron kanan.png') }}" alt="" style="width: 70%;">
                        </div>
                    </button>
                </div>
            </div>
            <br><br>
            <div class="dokter-judul">
                <h1>Rekomendasi SkinCare</h1>
                <p>~ Skincare Terbaik Untuk Anda ~</p>

            </div>

           <div class="produk">
                @foreach ($produk as $item )
                    
                
                <div class="produk-grid">
                    <div class="produk-gambar">
                        
                        <img src="{{ asset('storage/' . $item->gambar_produk) }}" alt="gambar produk">
                        
                    </div>
                    <div class="produk-detail">
                        <div class="produk-detail-container">
                            <div class="produk-nama-container">
                                <p class="produk-nama">{{ $item->nama_produk }}</p>
                                <h3>Rp {{ number_format($item->harga, 2, ',', '.') }}</h3>
                            </div>
                            <div class="toko">
                                <img src="{{ asset('asset/ikon/store.png') }}" alt="">
                                <p> {{ $item->nama_toko }} </p>
                                <!-- <p> ★ 4,5/5 (130)</p> -->
                            </div>
                            <div class="toko">
                                <img class="lokasi" src="{{ asset('asset/ikon/location.png') }} " width="8%" alt="">
                                <p>stok :{{ $item->stok }}</p>
                            </div>
                            <div class="toko">
                                <img class="like" src="{{ asset('asset/ikon/like.png') }} " width="8%" alt="">
                                <p>87% | 67rb+ Beli </p>
                            </div>
                        </div>
                        
                        <div class="tombol-beli">
                            <form method="POST" action="../keranjang/autentikasi_keranjang.php">
                                <input type="hidden" name="id_produk" value="{{ $item->id }}">
                                <button class="tombol-keranjang" type="submit" name="submit-keranjang">
                                    <p>+ Keranjang</p>
                                </button>
                            </form>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>



            <div class="lihat-semua-top">
                <a class="lihat-semua" href="../produk/produk.php">
                    <div>
                        <h4>Semua Produk</h4>
                    </div>
                    <img src="../ikon/next.png" alt="">
                </a>
            </div>
        </section>

        <script>
            const carousel = document.querySelector('#customCarousel');
            const slides = carousel.querySelectorAll('.carousel-item');
            const indicators = carousel.querySelectorAll('.carousel-indicators button');
            const prevButton = carousel.querySelector('.carousel-control-prev');
            const nextButton = carousel.querySelector('.carousel-control-next');

            let currentSlide = 0;
            let autoScrollInterval = 5000; // Waktu bergulir otomatis (5 detik)

            function updateCarousel(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                indicators.forEach((indicator, i) => {
                    indicator.classList.toggle('active', i === index);
                });
                carousel.querySelector('.carousel-inner').style.transform = `translateX(-${index * 100}%)`;
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                updateCarousel(currentSlide);
            }

            // Tambahkan navigasi manual
            prevButton.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                updateCarousel(currentSlide);
            });

            nextButton.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                updateCarousel(currentSlide);
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    updateCarousel(currentSlide);
                });
            });

            // Aktifkan scroll otomatis
            setInterval(nextSlide, autoScrollInterval);
        </script>

    </main>

    {{-- <?php include "../footer.php" ?> --}}

</body>

</html>