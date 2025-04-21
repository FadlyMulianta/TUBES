<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="header.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/mainHeader.css') }}">

<body>
    <header>
        <nav>
            <div>
                <section>
                    <div class="logo">
                        <img class="img" src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" alt="">
                        <div class="logo-text">
                            <a href="{{ route('mainBeranda') }} "> SKINEXPERT </a>
                        </div>
                        <div class="logo-text-flex">
                            <div class="logo-text-link"><a href="{{ route('mainBeranda') }}" id="beranda">Beranda</a></div>
                            <div class="logo-text-link"><a href="{{ route('artikel.index') }}" id="scan">Artikel</a></div>
                            <div class="logo-text-link"><a href="{{ route('dokter') }}" id="konsultasi">Konsultasi</a></div>
                            <div class="logo-text-link"><a href="{{ route('produk') }}" id="skincare">SkinCare</a></div>
                        </div>

                    </div>
                </section>
            </div>

            <div>
                <section>
                    <div class=" ikon-post">
                        <div class="ikon">
                            <div class="search-container">
                                <input type="text" placeholder="Cari skincare atau dokter...">
                                <img src="{{ asset('asset/ikon/search.png') }}" alt="Search Icon">
                            </div>
                            <a href="">
                                <img src="{{ asset('asset/ikon/icons8-menu-64.png') }}" alt="" class="menu">
                            </a>
                            <a href="" class="notification-container">
                                <img src="{{ asset('asset/ikon/icons8-notification-64.png') }}" alt="Notifikasi" class="menu">
                                {{-- <span class="notification-count">20</span>      --}}
                            </a>

                            <a href="../chat/chat.php" id="chat-link" class="notification-container">
                                <img src="{{ asset('asset/ikon/chattt.png') }}" alt="" class="menu">
                                {{-- <span class="notification-count">2</span> --}}
                            </a>
                            <a href="{{ route('keranjang.index') }}" id="keranjang-link" class="notification-container">
                                <img id="keranjang" src="{{ asset('asset/ikon/shopping-cart (1).png') }}" alt="" class="menu">

                                @if($jumlahProdukKeranjang > 0)
                                    <span class="notification-count">{{ $jumlahProdukKeranjang }}</span>
                                @endif
                            </a>


                            <a href="" id="user-icon">
                                <img src="{{ asset('storage/'.Auth::user()->foto) }}"
                                    alt="Foto Profil"
                                    class="menu"
                                    style="width: 30px; aspect-ratio: 1/1; object-fit: cover; border-radius: 50%; border: 1px solid var(--primary-color); display: block; overflow: hidden;">
                            </a>
                        </div>

                    </div>

                </section>
            </div>



        </nav>

    </header>
    <div class="cart-container">

        <div class="popup-cart" id="cartPopup">
            <ul>
                <li>
                    <div class="cart-item">
                        <img src="../gambar/produk1.jpg" alt="Produk 1" class="cart-item-img">
                        <div>
                            <p>serum x wardahh</p>
                            <p>Rp 50.000,00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="cart-item">
                        <img src="../gambar/1736264010_d0f1986f-d4a3-4efc-96af-b7babbfb5613.jpg" alt="Produk 2" class="cart-item-img">
                        <div>
                            <p>Sunscreen SPF</p>
                            <p>Rp 49.000,00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="cart-item">
                        <img src="../gambar/produk4.jpg" alt="Produk 2" class="cart-item-img">
                        <div>
                            <p>serum ipsum</p>
                            <p>Rp 600.000,00</p>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="../keranjang/keranjang.php">Lihat Semua Produk</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Pop-up Modal -->
    <div class="popup" id="userPopup">
        <ul>
            <li><a href="../profil/profil.php">Profil Saya</a></li>
            <li><a href="../Detail Pesanan/status_pesanan.php">Detail Pesanan</a></li>
            <li><a href="hasilAi.html">Hasil Scan AI</a></li>
            <li><a href="../Setting/setting.php">Settings</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>

    </div>

    <!-- Overlay -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userIcon = document.querySelector('a[href=""] > img[src="{{ asset('storage/'.Auth::user()->foto) }}" ]');
            const popup = document.getElementById("userPopup");

            userIcon.parentElement.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default anchor click behavior
                event.stopPropagation(); // Stop click event from propagating to document
                const rect = userIcon.getBoundingClientRect();
                popup.style.top = rect.bottom + "px";
                popup.style.left = rect.left + "px";
                popup.style.display = popup.style.display === "block" ? "none" : "block";
            });

            document.addEventListener("click", function(event) {
                if (!userIcon.contains(event.target) && !popup.contains(event.target)) {
                    popup.style.display = "none";
                }
            });

            popup.addEventListener("click", function(event) {
                event.stopPropagation(); // Prevent click event from closing the popup
            });
        });
    </script>
    <script>
        // Ambil URL halaman saat ini
        const currentUrl = window.location.pathname;

        // Cek URL untuk menambahkan class "active" pada menu yang sesuai
        if (currentUrl.includes(@json(url('/mainBeranda'))) || currentUrl.includes(@json('mainBeranda'))) {
            document.getElementById("beranda").classList.add("active");
        } else if (currentUrl.includes("scan.php")) {
            document.getElementById("scan").classList.add("active");
        } else if (currentUrl.includes(@json(url('/dokter'))) || currentUrl.includes(@json('dokter'))) {
            document.getElementById("konsultasi").classList.add("active");
        } else if (currentUrl.includes(@json(url('/produk'))) || currentUrl.includes(@json('produk'))) {
            document.getElementById("skincare").classList.add("active");
        } else if (currentUrl.includes(@json(url('/keranjang'))) || currentUrl.includes(@json('keranjang'))) {
            document.getElementById("keranjang-link").classList.add("active");
        } else if (currentUrl.includes("chat.php")) {
            document.getElementById("chat-link").classList.add("active");
        } else if (currentUrl.includes("setting.php")) {
            document.getElementById("user-icon").classList.add("active");
        }

        document.addEventListener("DOMContentLoaded", function() {
            const cartIcon = document.getElementById("keranjang-link");
            const cartPopup = document.getElementById("cartPopup");

            // Menampilkan popup saat hover pada ikon keranjang
            cartIcon.addEventListener("mouseenter", function() {
                cartPopup.style.display = "block";
            });

            // Menyembunyikan popup saat mouse keluar dari ikon keranjang
            cartIcon.addEventListener("mouseleave", function(event) {
                // Periksa apakah mouse menuju ke popup, jika tidak, sembunyikan
                if (!cartPopup.contains(event.relatedTarget)) {
                    cartPopup.style.display = "none";
                }
            });

            // Menjaga popup tetap terlihat saat mouse berada di atasnya
            cartPopup.addEventListener("mouseenter", function() {
                cartPopup.style.display = "block";
            });

            // Menyembunyikan popup saat mouse keluar dari popup
            cartPopup.addEventListener("mouseleave", function(event) {
                // Periksa apakah mouse menuju ke ikon keranjang, jika tidak, sembunyikan
                if (!cartIcon.contains(event.relatedTarget)) {
                    cartPopup.style.display = "none";
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cartIcon = document.getElementById("keranjang-link");
            const cartPopup = document.getElementById("cartPopup");
            let isHoveringCart = false; // Flag untuk melacak hover

            // Fungsi untuk menampilkan popup
            function showPopup() {
                cartPopup.style.display = "block";
            }

            // Fungsi untuk menyembunyikan popup
            function hidePopup() {
                if (!isHoveringCart) {
                    cartPopup.style.display = "none";
                }
            }

            // Hover pada ikon keranjang
            cartIcon.addEventListener("mouseenter", function() {
                isHoveringCart = true;
                showPopup();
            });

            cartIcon.addEventListener("mouseleave", function() {
                isHoveringCart = false;
                setTimeout(hidePopup, 200); // Sedikit delay untuk memastikan hover popup
            });

            // Hover pada popup
            cartPopup.addEventListener("mouseenter", function() {
                isHoveringCart = true;
            });

            cartPopup.addEventListener("mouseleave", function() {
                isHoveringCart = false;
                setTimeout(hidePopup, 200); // Sama seperti di atas
            });
        });
    </script>



</body>

</html>
