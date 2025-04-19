<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Login Page</title>
</head>

<body>
    <main>
        <section>
            <div class="login">
                <div class="form">
                    <div class="form-judul">
                        <h2>Haii, Senang Bisa Bertemu Kembali</h2>
                    </div>
                    @if (session('error'))
                        <p class="error" style="color: red">{{ session('error') }}</p>
                    @endif

                    <div class="form-input">
                        <form method="post" action="{{ route('kirim.login') }}">
                            @csrf
                            <input name="email" type="email" placeholder="Email" required><br>
                            <input name="password" type="password" placeholder="Kata Sandi" required>
                            <div class="lupa">
                                <a href="#"><i>Lupa Kata Sandi?</i></a>
                            </div>
                            <div class="btn-ikon">
                                <button type="submit" name="button">Masuk</button>
                                <div class="ikon">
                                    <img src="{{ asset('asset/ikon/icons8-facebook-64.png') }}" alt="Facebook Icon">
                                    <img src="{{ asset('asset/ikon/icons8-google-64.png') }}" alt="Google Icon">
                                    <img src="{{ asset('asset/ikon/icons8-twitter-64.png') }}" alt="Twitter Icon">
                                    <img src="{{ asset('asset/ikon/icons8-whatsapp-64 (1).png') }}" alt="WhatsApp Icon">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="regis">
                        <h4>anda belum punya akun?</h4>
                        <a href="{{ route('registrasi') }}" class="linkregis">
                            <h6> DAFTAR SEKARANG</h6>
                        </a>
                    </div>
                </div>

                <div class="gambar">
                    <img src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" alt="SkinExpert Logo">
                    <div class="a-regis">
                        <h2>SKINEXPERT</h2>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
