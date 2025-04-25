<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skincare Store</title>
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}" />
</head>

<body>
    @include('header.mainHeader')


    <main>
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
                        <img class="" src="{{ asset('asset/ikon/chevron kiri.png') }}" alt=""
                            style="width: 70%; margin-left: 25%; ">
                    </div>
                </button>
                <button class=" carousel-control-next" aria-label="Next Slide">
                    <div>
                        <img src="{{ asset('asset/ikon/chevron kanan.png') }}" alt="" style="width: 70%;">
                    </div>
                </button>
            </div>
        </div>

        <div class="produk" style="margin-bottom: 4rem;">
            @foreach ($produk as $item)
                <div class="produk-grid">
                    <div class="produk-gambar">
                        <img src="{{ asset('storage/' . $item->gambar_produk) }}" alt="gambar produk">
                    </div>
                    <div class="produk-detail">
                        <a href="{{ route('produkDetail', ['slug' => $item->slug]) }}" class="produk-detail-link">
                            <div class="produk-detail-container">
                                <div class="produk-nama-container">
                                    <p class="produk-nama">{{ $item->nama_produk }}</p>
                                    <h3>Rp {{ number_format($item->harga, 2, ',', '.') }}</h3>
                                </div>
                                <div class="toko">
                                    <img src="{{ asset('asset/ikon/store.png') }}" alt="">
                                    <p>{{ $item->nama_toko }}</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="{{ asset('asset/ikon/location.png') }}" width="8%"
                                        alt="">
                                    <p>stok :{{ $item->stok }}</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="{{ asset('asset/ikon/like.png') }}" width="8%"
                                        alt="">
                                    <p>87% | 67rb+ Beli</p>
                                </div>
                            </div>
                        </a>
                        @if ($item->stok > 0)
                            <div class="tombol-beli">
                                <button class="tombol-keranjang" type="button" data-id="{{ $item->id }}">
                                    <p>+ Keranjang</p>
                                </button>
                            </div>
                        @else
                            <div class="tombol-beli">
                                <p class="stok-habis" style="color: red; font-weight: bold;">Stok Habis</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const buttons = document.querySelectorAll('.tombol-keranjang');

                buttons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        const idProduk = this.getAttribute('data-id');

                        fetch("{{ route('keranjang.tambah') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    produk_id: idProduk
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert("Produk berhasil dimasukkan ke keranjang!");
                                } else {
                                    alert(data.message || "Gagal menambahkan produk.");
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert("Terjadi kesalahan.");
                            });
                    });
                });
            });
        </script>

        <script>
            //   
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






</body>

</html>
