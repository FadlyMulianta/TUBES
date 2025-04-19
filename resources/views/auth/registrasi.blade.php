<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Daftar</title>
</head>

<body>
    <main>
        <section>
            <div class="regis">
                <div class="gambar">
                    <div class="img">
                        <img src="{{ asset('asset/gambar/Desain tanpa judul.png') }}" alt="">
                    </div>
                    <div class="a-login">
                        <h2>Welcome to <br>SKIN EXPERT </h2>
                    </div>
                </div>


                <div class="form">
                    <div class="form-judul">

                        <div class="a-regis">
                            <h1> Daftar Akun Kamu Disini</h1>
                        </div>
                        <!-- Tampilkan notifikasi -->

                    </div>

                    <form action="{{ route('kirim.registrasi') }}" method="post">
                        @csrf
                        <div class="form-grid">
                            <div class="form-input">
                                <div>
                                    <!-- <label for="username">Nama Depan</label> -->
                                    <input type="text" name="name" placeholder="Nama" required><br><br>
                                    <!-- <label for="username">Nomor Hp</label> -->
                                    <input type="email" name="email" placeholder="email" required><br><br>
                                    <!-- <label for="username">Kata Sandi</label> -->
                                    <input type="password" name="password" placeholder="Kata Sandi" required><br><br>
                                </div>
                            </div>
                            <div class="form-input">
                                <div>
                                    <!-- <label for="username">Nama Belakang</label> -->
                                    <input type="text" name="namabelakang" placeholder="Nama Belakang"><br><br>
                                    <!-- <label for="username">Email</label><br> -->
                                    <input type="number" name="nohp" placeholder="Nomor Hp" required><br><br>

                                    <!-- <label for="username">Ulangi Kata Sandi </label> -->
                                    <input type="password" name="ulangipassword" placeholder="Kata Sandi"
                                        required><br><br>
                                </div><br>

                            </div>

                        </div>
                        <input class="button" type="submit" name="submit" value="Daftar">
                    </form>
                    <div class="login">
                        <h4>anda sudah punya akun?</h4>
                        <a class="linklogin" href="{{ route('login') }}">
                            <h6>LOGIN SEKARANG</h6>
                        </a>
                    </div>

                </div>



            </div>

        </section>

    </main>
</body>

</html>
