<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/pembayaranproduk.css') }}">
    <title>Metode Pembayaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        
    </style>
</head>

<body>
    @include('header.mainHeader')
    <div class="container">
        <!-- Address Section -->
        <div class="summary">
            <div class="payment-method">
                <div class="method" onclick="selectMethod(this, false)">
                    <img src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" alt="BCA">
                    <p>Saldo SkinExpert</p>
                </div>

                <div class="method" onclick="selectMethod(this, false)">
                    <img src="{{ asset('asset/gambar/Logo BCA_Biru.png') }}" alt="GoPay">
                    <p>BCA Virtual Account</p>
                </div>

                <div class="method" onclick="selectMethod(this, false)">
                    <img src="{{ asset('asset/gambar/logo dana.png') }}" alt="GoPay">
                    <p>Dana</p>
                </div>
                <script>
                    function selectMethod(selected, isWrong) {
                        // Remove "selected" and "wrong" classes from all methods
                        document.querySelectorAll('.method').forEach((method) => {
                            method.classList.remove('selected', 'wrong');
                        });

                        if (isWrong) {
                            // Add "wrong" class to the clicked method
                            selected.classList.add('wrong');
                        } else {
                            // Add "selected" class to the clicked method
                            selected.classList.add('selected');
                        }
                    }
                </script>
                <button class="alamat-lain">Pilih Metode Pembayaran Lainnya</button>
            </div>
            <h3>Ringkasan Pembayaran</h3>
            <div class="details">
                <div class="harga">
                    <p>Total Harga ({{ $keranjang->sum('jumlah') }} Barang): </p>
                    <p>Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
                </div>
                <div class="harga">
                    <p>Ongkos Kiriman: </p>
                    <p>Rp {{ number_format(15000, 0, ',', '.') }}</p> {{-- Contoh flat rate --}}
                </div>
                <div class="harga">
                    <p>Asuransi Pengiriman: </p>
                    <p>Rp {{ number_format(9900, 0, ',', '.') }}</p> {{-- Contoh asuransi --}}
                </div>

                <hr>
                <div class="harga">
                    <p class="total">Total tagihan: </p>
                    <p class="harga-kanan">
                        Rp {{ number_format($totalHarga + 15000 + 9900, 0, ',', '.') }}
                    </p>
                </div>
            </div>

            <a href="#" class="btn">Bayar Sekarang</a>
            <p class="note">Dengan melanjutkan pembayaran, kamu menyetujui S&K yang berlaku.</p>
        </div>
        <div class="address">
            <div class="alamat">
                <h3>Alamat Pengiriman</h3>
                <p><strong>Fadly Agus Mulianta</strong></p>
                <p>Jl. Sukabirus Gg. Akil 2, Citeureup, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
                <p>6289518857296</p>
                <button class="alamat-lain">Pilih Alamat Lain</button>
            </div>
            <div class="barang">
                <div class="checkout-container">
                    <h3 style="margin-bottom: 2rem">Detail Barang</h3>
                    @foreach($keranjang as $item)
                    <div class="item-container">
                        <div class="item-image">
                            <img src="{{ asset('storage/' . $item->produk->gambar_produk) }}" alt="{{ $item->produk->nama }}">
                        </div>
                        <div class="item-details">
                            <p class="item-title">{{ $item->produk->nama_produk }}</p>
                            <p>{{ $item->produk->nama_toko ?? 'Nama Toko' }}</p>
                            <p><input type="checkbox"> Ganti rugi jika rusak/kecurian (Rp30.000)</p>
                        </div>
                        <div class="item-actions">
                            <p>{{ $item->jumlah }} x Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="regular-section">
                        <p><strong>Reguler</strong></p>
                        <div class="dropdown">
                            <select id="shipping-options" onchange="updateDeliveryInfo()">
                                <option value="jnt">J&T (Rp140.000) - Estimasi tiba 8 - 9 Jan</option>
                                <option value="jne">JNE (Rp150.000) - Estimasi tiba 7 - 8 Jan</option>
                                <option value="sicepat">SiCepat (Rp130.000) - Estimasi tiba 9 - 10 Jan</option>
                                <option value="anteraja">Anteraja (Rp145.000) - Estimasi tiba 8 - 9 Jan</option>
                            </select>
                        </div>
                        <div id="delivery-info" class="delivery-info">
                            <p>J&T (Rp140.000)</p>
                            <p>Estimasi tiba 8 - 9 Jan</p>
                            <p>Dilindungi <a href="#">Asuransi Pengiriman</a> (Rp18.900)</p>
                        </div>
                    </div>
                </div>
            </div>


                <script>
                    function updateDeliveryInfo() {
                        const select = document.getElementById("shipping-options");
                        const info = document.getElementById("delivery-info");

                        const options = {
                            jnt: {
                                cost: "Rp140.000",
                                estimate: "8 - 9 Jan",
                            },
                            jne: {
                                cost: "Rp150.000",
                                estimate: "7 - 8 Jan",
                            },
                            sicepat: {
                                cost: "Rp130.000",
                                estimate: "9 - 10 Jan",
                            },
                            anteraja: {
                                cost: "Rp145.000",
                                estimate: "8 - 9 Jan",
                            },
                        };

                        const selectedOption = options[select.value];

                        info.innerHTML = `
                <p>${select.options[select.selectedIndex].text.split(" - ")[0]}</p>
                <p>Estimasi tiba ${selectedOption.estimate}</p>
                <p>Dilindungi <a href="#">Asuransi Pengiriman</a> (Rp18.900)</p>
            `;
                    }
                </script>
            </div>


        </div>
    </div>

    <!-- Payment Summary Section -->

    </div>


</body>

</html>