
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/keranjang.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Keranjang</title>
    <style>
        

    </style>
</head>

<body>
@include('header.mainHeader')


<main>
    <section>
        <div class="keranjang">
            <div class="keranjang-harga">
                <div class="border">
                    <div class="total">
                        <div class="rincian">
                            <h3>Ringkasan Belanja Anda</h3>
                        </div>
                    </div>
                    <div class="grid-total-harga-semua">
                        <div class="total-produk-semua">
                            <h3 style="margin-top: 10px;">Total :</h3>
                        </div>
                        <div class="total-harga-semua">
                            {{-- <h2><span id="subtotal">{{ number_format($total_harga, 2, ',', '.') }}</span></h2> --}}
                        </div>
                    </div>
                    <div class="voucher">
                        <div>
                            <input class="voucher-input" type="text" placeholder="Masukkan Kode Voucher">
                        </div>
                        <div class="total-harga-semua">
                            <button class="terapkan">Terapkan</button>
                        </div>
                    </div>
                    <div class="bayar">
                        <form method="" action="{{ route('pembayaran.index') }}">
                            @csrf
                            <button class="btn-bayar">Lanjutkan Ke Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="keranjang-produk">
                <div class="pilih-container">
                    <div style="display: flex; padding: 1rem;">
                        <input id="pilihSemuaCheckbox" type="checkbox" style="margin-right: 10px; margin-left: 1rem;">
                        {{-- <p style="font-weight: 600; margin-right: 29.5rem;">Pilih Semua ({{ $jumlah_produk }})</p> --}}
                    </div>
                    <div id="aksiContainer" style="display: none; padding: 1rem;">
                        <form method="POST" action="{{ route('keranjang.clear') }}">
                            @csrf
                            <button type="submit" style="margin-right: 10px; color: red; font-weight: 600;" class="btn-link">Hapus</button>
                        </form>
                        <a id="favorit" style="color: rgb(255, 0, 144); font-weight: 600;">Favorit</a>
                    </div>
                </div>

                <div>
                    @forelse ($keranjang as $nama_toko => $produk_list)
                        <tr>
                            <td colspan="3" class="nama-toko">
                                <a href="#" style="display: flex; color:inherit; text-decoration: none;">
                                    <img src="{{ asset('asset/ikon/store.png') }}" alt="" style="width: 1.8rem;">
                                    <h3>{{ $nama_toko }}</h3>
                                </a>
                            </td>
                        </tr>

                        @foreach ($produk_list as $item)
                            <tr>
                                <td>
                                    <div class="keranjang-produk-detail">
                                        <div class="checkbox-container">
                                            <input type="checkbox" class="product-checkbox" value="{{ $item->id }}">
                                            <img class="keranjang-produk-gambar" src="{{ asset('storage/' . $item->produk->gambar_produk) }}" alt="{{ $item->produk->nama_produk }}">
                                            <div class="judul-container">
                                                <div class="judul-produk">
                                                    <h3>{{ $item->produk->nama_produk }}</h3>
                                                </div>
                                                <p>Stok: {{ $item->produk->stok }}</p>
                                            </div>
                                        </div>
                                        <div class="harga-produk">
                                            <p>Rp {{ number_format($item->produk->harga, 2, ',', '.') }}</p>
                                            <div class="harga-produk-container">
                                                <form method="POST" action="{{ route('keranjang.update', $item->id) }}" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="action" value="decrease">
                                                    <button type="submit" class="quantity-btn-decrease">-</button>
                                                </form>
                                                <input type="text" class="quantity" value="{{ $item->jumlah }}" readonly data-stok="{{ $item->produk->stok }}">
                                                <form method="POST" action="{{ route('keranjang.update', $item->id) }}" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="action" value="increase">
                                                    <button type="submit" class="quantity-btn-increase">+</button>
                                                </form>

                                                <form method="POST" action="{{ route('keranjang.hapus', $item->id) }}">
                                                    @csrf   
                                                    @method('DELETE')
                                                    <button type="submit" class="tombol-hapus">
                                                        <img src="{{ asset('asset/ikon/delete.png') }}" alt="" style="width: 1.5rem;">
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>   
                            </tr>
                        @endforeach
                    @empty  
                        <tr>
                            <td colspan="3">Keranjang Anda kosong.</td>
                        </tr>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</main>

{{-- JavaScript langsung di dalam Blade --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const checkboxes = document.querySelectorAll(".product-checkbox");
        const subtotalElement = document.getElementById("subtotal");

        document.getElementById('pilihSemuaCheckbox').addEventListener('change', function () {
            const aksiContainer = document.getElementById('aksiContainer');
            const checked = this.checked;
            checkboxes.forEach(cb => cb.checked = checked);
            aksiContainer.style.display = checked ? 'block' : 'none';
            updateSubtotal();
        });

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", updateSubtotal);
        });

        function updateSubtotal() {
            let subtotal = 0;
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    const row = checkbox.closest("tr");
                    const priceElement = row.querySelector(".harga-produk p");
                    const quantityInput = row.querySelector(".quantity");

                    const price = parseFloat(priceElement.textContent.replace("Rp", "").replace(/\./g, "").replace(",", "."));
                    const quantity = parseInt(quantityInput.value, 10);

                    subtotal += price * quantity;
                }
            });

            subtotalElement.textContent = subtotal.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
        }

        // Scroll sticky logic (optional)
        window.addEventListener('scroll', function () {
            const keranjang = document.querySelector('.keranjang-harga');
            const footer = document.querySelector('footer');
            if (!keranjang || !footer) return;

            const footerRect = footer.getBoundingClientRect();
            const keranjangHeight = keranjang.offsetHeight;

            if (footerRect.top < window.innerHeight) {
                keranjang.style.position = 'absolute';
                keranjang.style.top = `${window.scrollY + footerRect.top - keranjangHeight - 313}px`;
            } else {
                keranjang.style.position = 'fixed';
                keranjang.style.top = '6.3rem';
            }
        });
    });
</script>
        

</body>