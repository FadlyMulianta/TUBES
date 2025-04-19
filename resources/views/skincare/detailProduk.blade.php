<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skincare Store</title>
    <!-- <link rel="stylesheet" href="detailproduk.css" /> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            /* Create three equal columns */
            gap: 20px;
            /* Space between columns */
            padding: 0 100px;
        }

        .left-column,
        .right-column,
        .order-section {
            flex: 1;
            /* Allow columns to take equal space */
            min-height: 200px;
            /* Set a minimum height for fixed size */
            padding: 10px;
            margin: 30px;
        }

        .right-column,
        .order-section {
            max-width: 300px;
            /* Set maximum width */
            flex-shrink: 0;
            /* Prevent columns from shrinking */
        }

        .product-image {
            width: 348px;
            height: 348px;
        }

        .thumbnail-images {
            display: flex;
            margin-top: 10px;
        }

        .thumbnail-images img {
            width: 60px;
            height: 60px;
            margin-right: 10px;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .thumbnail-images img.active {
            border: 2px solid #4CAF50;
        }

        .product-details {

            width: 100%;
            margin-top: 20px;
        }

        .product-title {
            margin-top: 25px;
            font-size: 16px;
            font-weight: reguler;
            color: #1C3F60;
        }

        .product-rating {
            font-size: 12px;
            display: flex;
            align-items: center;
            margin-top: 0px;
        }

        .product-rating i {
            color: #FFD700;
        }

        .product-price {
            font-size: 20px;
            color: #000;
            margin-top: 6px;
        }

        .product-info {
            margin-top: 20px;
        }

        .product-info p {
            margin: 5px 0;
            margin-bottom: 20px;
        }

        .product-info .highlight {
            color: #4CAF50;
            font-weight: bold;
        }

        .order-section {
            border: 1px solid #ddd;
            border-radius: 16px;
            padding: 20px;
            margin-top: 20px;
        }

        .order-section h3 {
            margin: 0 0 10px 0;
        }

        .order-section .quantity {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .order-section .quantity input {
            width: 40px;
            text-align: center;
            margin: 0 10px;
        }

        .order-section .stock {
            color: #FF0000;
            margin-top: 10px;
        }

        .order-section .subtotal {
            font-size: 20px;
            margin-top: 10px;
            font-weight: bold;
        }

        .order-section .buttons {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .order-section .buttons button {
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            cursor: pointer;
        }

        .order-section .buttons .add-to-cart {
            background-color: #1C3F60;
            color: #DBE2EF;
            width: 100%;
            /* Make the button take up the full width of the parent container */
            padding: 12px;
            /* Adjust the padding for better height */
            font-size: 12px;
            /* Optional: Adjust font size */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Optional: Add border radius */
            cursor: pointer;
            /* Change cursor to pointer */
            box-sizing: border-box;
            /* Include padding and border in element's total width and height */
        }

        .order-section .buttons .buy-now {
            background-color: #DBE2EF;
            color: #1C3F60;
            width: 100%;
            /* Make the button take up the full width of the parent container */
            padding: 12px;
            /* Adjust the padding for better height */
            font-size: 12px;
            /* Optional: Adjust font size */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Optional: Add border radius */
            cursor: pointer;
            /* Change cursor to pointer */
            box-sizing: border-box;
            /* Include padding and border in element's total width and height */
        }

        .order-section .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .order-section .actions i {
            cursor: pointer;
        }

        .seller-info {
            display: flex;
            align-items: center;
            margin-top: 25px;
        }

        .seller-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            margin-left: 50px;
        }

        .seller-info .seller-details {
            display: flex;
            flex-direction: column;
        }

        .seller-details {
            margin-right: 15px;
        }

        .seller-info .seller-details .rating {
            display: flex;
            align-items: center;
        }

        .seller-info .seller-details .rating i {
            color: #FFD700;
        }

        .seller-info .seller-details .completion {
            color: #4CAF50;
        }

        .advertisement {
            margin-top: 20px;
        }

        .advertisement img {
            width: 100%;
        }

        @media (max-width: 768px) {

            .left-column,
            .right-column {
                max-width: 100%;
            }
        }

        .produk {
            margin-left: 2;
            margin-top: 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            gap: 1.5rem;
            padding: 0 100px;
            margin-bottom: 30px;
        }

        .produk-grid {
            /* margin-top: 5rem; */
            /* padding: 1rem; */
            background-color: var(--back-color);
            display: grid;
            grid-template-rows: 1fr 1fr;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .produk-grid:hover {
            transform: translateY(-20px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);

        }

        .produk-gambar {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .produk-gambar img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .produk-detail {

            background-color: var(--back-color);
            /* padding-top: 3rem; */
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            /* margin-left: 3.1rem;
      margin-right: 3.1rem; */
            /* padding-bottom: rem; */
            /* text-align: center; */
        }

        .produk-detail-container {
            margin-left: 10px;
            margin-top: 10px;


        }

        .produk-nama-container {
            margin-bottom: 5px;
        }

        .produk-nama {
            text-transform: uppercase;
            color: var(--primary-color);
            font-size: 15px;
            font-weight: 600;
        }

        .toko {
            gap: 5px;
            display: flex;
            margin-top: 5px;
            /* margin-bottom: 3rem; */
        }

        .toko :where(img) {
            width: 10%;
        }

        .like {
            margin-left: 3px;
            width: 8%;
        }

        .lokasi {
            width: 10%;
        }

        .toko p {

            font-weight: 400;
            font-size: 14px;
        }

        .tombol-beli {
            margin-top: 15px;
            /* margin-left: 5rem;
            margin-right: 5rem; */
            border-radius: 5px;
            font-size: 1rem;
            /* margin-top: 2rem; */
            text-align: center;
        }

        .tombol-keranjang {
            border-radius: 5px;
            background-color: var(--primary-color);
            color: white;

            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-right: 2.6rem;
            padding-left: 2.6rem;
            font-weight: 500;
            font-size: 1rem;

        }

        button {
            border: none;
            cursor: pointer;
            background: none;
        }

        .btn-follow {
            background-color: #1C3F60;
            color: #DBE2EF;
            /* Green background */
            border: none;
            /* Remove default border */
            /* White text */
            padding: 6px 16px;
            /* Padding inside the button */
            text-align: center;
            /* Center text */
            text-decoration: none;
            /* Remove underline */
            display: inline-block;
            /* Display inline */
            font-size: 16px;
            /* Text size */
            margin: 10px 2px;
            /* Margin around the button */
            cursor: pointer;
            /* Pointer cursor on hover */
            border-radius: 50px;
            /* Rounded border */
            transition: background-color 0.3s ease;
            /* Smooth transition for hover effect */
        }

        .btn-follow:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }

        .stok-total {
            margin-left: 10px;
        }

        .produk-detail-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
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
                    <img alt="Seller profile picture" src="../gambar/Desain tanpa judul.png" />
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
                        <form method="POST" action="../keranjang/autentikasi_keranjang.php">
                            <input type="hidden" name="id_produk" value="{{ $produk['id'] }}">
                            <button class="add-to-cart" type="submit" name="submit-keranjang">Tambahkan
                                Keranjang</button>
                        </form>
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
                            <form method="POST" action=".">
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $item->id }}">
                                <button class="tombol-keranjang" type="submit" name="submit-keranjang">
                                    <p>+ Keranjang</p>
                                </button>
                            </form>
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

</html>
