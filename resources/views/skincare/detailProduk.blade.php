<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skincare Store</title>
    <!-- <link rel="stylesheet" href="detailproduk.css" /> -->
    <link rel="stylesheet" href="{{ asset('css/detailproduk.css') }}" />
</head>

<body>

    @include('header.mainHeader')

    <main>
        <div class="container">
            <div class="left-column">
                <img src="{{ asset('storage/' . $produk['gambar_produk']) }}"
                    alt="{{ asset('storage/' . $produk['gambar_produk']) }}" class="product-image">
            </div>
            <div class="rigth-column">
                <div class="product-details">
                    <div class="product-title">
                        <h1>{{ $produk['nama_produk'] }}</h1>
                    </div>
                    <div class="product-rating">
                        <span>Stok: {{ $produk['stok'] }}</span>
                        {{-- <span>⭐{{ $produk['rating']; }}</span> --}}

                    </div>
                    <div class="product-price">
                        <h2>Rp {{ number_format($produk['harga'], 2, ',', '.') }}</h2>
                    </div>
                    <div class="product-info">
                        <h3>Detail</h3>
                        <p>{{ $produk['deskripsi_produk'] }}</p>
                    </div>
                </div>
                <hr>
                <div class="seller-info">
                    <img alt="Seller profile picture" src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" />
                    <div class="seller-details">
                        <span style="font-weight: bold;">{{ $produk['nama_toko'] }}</span>
                        <span>Online 6 jam lalu</span>
                        <div class="rating">
                            <span>⭐5.0 (15)</span>
                        </div>
                        <span class="completion">87% pesanan selesai</span>
                    </div>
                    <button class="btn-follow">Follow</button>
                </div>
            </div>



            <div class="order-section">
                <h3>Atur jumlah</h3>
                <div class="quantity">
                    <button onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value="1" readonly />
                    <button onclick="increaseQuantity()">+</button>
                    <span class="stok-total">Stok Total: <span id="stock">Sisa {{ $produk['stok'] }}</span></span>
                </div>
                <div class="subtotal">
                    Subtotal Rp<span id="subtotal">{{ number_format($produk['harga'], 2, ',', '.') }}</span>
                </div>
                <div class="buttons">
                    <div>
                        <div class="tombol-beli">
                            <button class="tombol-keranjang" type="button" data-id="{{ $produk['id'] }}">
                                <p>+ Keranjang</p>
                            </button>
                        </div>
                        <button class="buy-now">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>




        <hr>
        <div class="product-title" style="margin-left: 6rem;">

            <h1>Produk Terkait</h1>
        </div>
        <div class="produk" style="margin-bottom: 4rem;">
            @foreach ($produkTerkait as $item)
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
                        <div class="tombol-beli">
                            <button class="tombol-keranjang" type="button" data-id="{{ $item->id }}">
                                <p>+ Keranjang</p>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </main>

    {{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const userIcon = document.querySelector('a[href="#user"] > img[src$="user.png"]');
        const popup = document.getElementById("userPopup");

        if (userIcon) {
            userIcon.parentElement.addEventListener("click", function(event) {
                event.preventDefault();
                event.stopPropagation();

                const rect = userIcon.getBoundingClientRect();
                let topPosition = rect.bottom;
                let leftPosition = rect.left + (rect.width / 2) - (popup.offsetWidth / 2);

                // Viewport adjustment
                if (leftPosition < 0) {
                    leftPosition = 10;
                }
                if (leftPosition + popup.offsetWidth > window.innerWidth) {
                    leftPosition = window.innerWidth - popup.offsetWidth - 10;
                }

                popup.style.top = topPosition + "px";
                popup.style.left = leftPosition + "px";
                popup.style.display = popup.style.display === "block" ? "none" : "block";
            });

            document.addEventListener("click", function(event) {
                if (!userIcon.contains(event.target) && !popup.contains(event.target)) {
                    popup.style.display = "none";
                }
            });

            popup.addEventListener("click", function(event) {
                event.stopPropagation();
            });
        }

        // Bagian kuantitas & stok
        const price = @json($harga);
        const initialStock = @json($stok);
        const idProduk = @json($produk->id);

        let stock = initialStock;
        let quantity = 1;

        document.getElementById('quantity').value = quantity;

        function updateSubtotal() {
            const subtotal = price * quantity;
            document.getElementById('subtotal').innerText = subtotal.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        function updateStock() {
            document.getElementById('stock').innerText = `Sisa ${stock}`;
        }

        function updateDatabase() {
            fetch("{{ route('updateQuantity') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id_produk: idProduk,
                    quantity: quantity
                })
            }).then(response => {
                if (response.ok) {
                    console.log("Database updated");
                }
            });
        }

        window.increaseQuantity = function() {
            if (stock > 0) {
                quantity++;
                stock--;
                document.getElementById('quantity').value = quantity;
                updateSubtotal();
                updateStock();
                updateDatabase();
            }
        };

        window.decreaseQuantity = function() {
            if (quantity > 1) {
                quantity--;
                stock++;
                document.getElementById('quantity').value = quantity;
                updateSubtotal();
                updateStock();
                updateDatabase();
            }
        };

        updateSubtotal();
        updateStock();
    });
</script> --}}


</body>
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

</html>
