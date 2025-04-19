<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <title>Contoh Footer</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>

<section>
    <!-- Konten utama halaman -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h2>Tentang Kami</h2>
                <div>

                    <img src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" alt="" width="100">
                </div>
                <p>
                    Website ini adalah jasa yang menyediakan <br> layanan konsultasi terbaik untuk Anda.
                </p>
            </div>
            <div class="footer-section links">
                <h2>Tautan Cepat</h2>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Konsultasi</a></li>
                    <li><a href="#">Skin Care</a></li>
                    <li><a href="#">Tentang</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h2>Kontak</h2>
                <p>Email: SkinExpert@gmail.com</p>
                <p>Telepon: +62 812 3456 7890</p><br>
                <h2>Ikuti Kami</h2>
                <div class="social">
                    <a href="#"><img src="{{ asset('asset/ikon/icons8-facebook-64.png') }}" alt="" width="30"></a>
                    <a href="#"><img src="{{ asset('asset/ikon/icons8-instagram-logo-64.pn') }}g" alt="" width="30"></a>
                    <a href="#"><img src="{{ asset('asset/ikon/icons8-twitter-64.png') }}" alt="" width="30"></a>
                    <a href="#"><img src="{{asset('asset/ikon/icons8-whatsapp-64 (1).png')}}" alt="" width="30"></a>

                </div>

            </div>
        </div>
        <div id="footer" class="footer-bottom">
            &copy; 2024 | Dibuat oleh Tim SkinExpert
        </div>
    </footer>
</section>

</html>