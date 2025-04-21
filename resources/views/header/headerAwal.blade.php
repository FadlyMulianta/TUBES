<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            overscroll-behavior: none;
            font-family: "Poppins", serif;
            padding: 0;
            margin: 0;
        }




        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }

        /* ==================================================== */
        /* heade */
        header {
            padding: 0 100px;
            z-index: 99999;
            background-color: white
        }

        header {
            position: sticky;
            top: 0;
        }

        nav {
            padding-top: 1rem;
            padding-bottom: 0.5rem;
            /* padding-left: 5rem;
    padding-right: 4rem;      */
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .popup {
            display: none;
            position: fixed;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            border-radius: 15px;
            z-index: 100000;
            top: 50px;
            right: 0;
        }

        .popup ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .popup ul li {
            padding: 10px 20px;
        }

        .popup ul li a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .popup ul li a:hover {
            background-color: #f0f0f0;
        }


        .logo {

            /* background-color: yellowgreen; */
            display: flex;

        }

        .img {
            width: 6%;

        }

        .logo-text {
            font-weight: bolder;
            display: flex;
            margin-top: 0.4rem;
            /* align-items: center; */
            font-size: 20px;
            text-decoration: none;
            color: black;
        }

        .logo-text a {
            text-decoration: none;
            color: black;
        }

        .logo-text-flex {
            display: flex;
            margin-left: 2rem;
        }

        .logo-text-link {
            margin-left: 2rem;
            display: flex;
            margin-top: 0.6rem;
            /* align-items: center; */
            font-size: 16px;
        }

        .logo-text-link a:hover {
            color: var(--primary-color);
            font-weight: bold;
            /* text-decoration: underline; */
        }

        .logo-text-link a {
            text-decoration: none;
            color: black;
            transition: color 0.3s, text-decoration 0.3s;
            /* Smooth effect */
        }

        .logo-text-link a.active {
            font-weight: bold;
            /* text-decoration: underline; */
            color: var(--primary-color);
        }


        .ikon-post {
            margin-right: 1rem;
        }


        .ikon {

            /* margin-top: 0.5rem; */
            display: flex;
            justify-content: flex-end;
            align-items: center;
            /* background-color: aqua; */

        }

        .tombol-login {
            padding-right: 1rem;
            padding-left: 1rem;
            padding-top: 0.4rem;
            padding-bottom: 0.4rem;
            border: 1px solid var(--primary-color);
            margin-left: 1rem;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: var(--primary-color);
        }

        .tombol-login:hover {
            color: var(--primary-color);
            background-color: white;
        }

        .tombol-login h4 {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div>
                <section>
                    <div class="logo">
                        <img class="img" src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" alt="">
                        <div class="logo-text">
                            <a href="../beranda/beranda_awal.php"> SKINEXPERT </a>
                        </div>
                        <div class="logo-text-flex">
                            <div class="logo-text-link"><a href="{{ route('beranda') }}" id="beranda">Beranda</a></div>
                            <div class="logo-text-link"><a href="{{ route('artikel.index') }}" id="scan">Artikel</a></div>
                            <div class="logo-text-link"><a href="{{ route('login') }}" id="konsultasi">Konsultasi</a></div>
                            <div class="logo-text-link"><a href="{{ route('login') }}" id="skincare">SkinCare</a></div>
                        </div>
                        <script>
                            const currentUrl = window.location.pathname;

        // Cek URL untuk menambahkan class "active" pada menu yang sesuai
                            if (currentUrl.includes(@json(url('/beranda'))) || currentUrl.includes(@json('beranda'))) {
                                document.getElementById("beranda").classList.add("active");
                            } else if (currentUrl.includes("scan.php")) {
                                document.getElementById("scan").classList.add("active");
                            } else if (currentUrl.includes("pilihdokter.php")) {
                                document.getElementById("konsultasi").classList.add("active");
                            } else if (currentUrl.includes("produk.php")) {
                                document.getElementById("skincare").classList.add("active");
                            } else if (currentUrl.includes("keranjang.php") || currentUrl.includes("bayar_produk.php")) {
                                document.getElementById("keranjang-link").classList.add("active");
                            } else if (currentUrl.includes("chat.php")) {
                                document.getElementById("chat-link").classList.add("active");
                            } else if (currentUrl.includes("setting.php")) {
                                document.getElementById("user-icon").classList.add("active");
                            }


                        </script>



                    </div>

                </section>

            </div>

            <div>
                <section>
                    <div class=" ikon-post">
                        <div class="ikon">

                            <a class="tombol-login" href="{{ route('login') }}">

                                <h4>Masuk</h4>

                            </a>
                            <a class="tombol-login" href="{{ route('registrasi') }}">

                                <h4>Daftar</h4>


                            </a>

                        </div>

                    </div>

                </section>
            </div>



        </nav>

    </header>


    <div class="popup" id="userPopup">
        <ul>
            <li><a href="login.php">Sign Up/Sign In</a></li>
            <li><a href="#">Detail Pesanan</a></li>
            <li><a href="hasilAi.html">Hasil Scan AI</a></li>
            <li><a href="../Setting/index.html">Settings</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>

    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userIcon = document.querySelector('a[href=""] > img[src="./ikon/user.png"]');
            const popup = document.getElementById("userPopup");

            userIcon.parentElement.addEventListener("click", function(event) {
                event.preventDefault();
                event.stopPropagation();
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
                event.stopPropagation();
            });
        });
    </script>

</body>

</html>
