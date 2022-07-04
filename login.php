<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <title>Halaman Login</title>
</head>

<body>
    <!-- cek pesan notifikasi -->
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'gagal') {

    ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Gagal!</strong> Username atau Password anda salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <?php } ?>
    <br>
    <br>
    <div class="global-container">
        <div class="card login-form">
            <div class="row">
                <div class="col-6">
                    <div class="card-body">
                        <h2 class="text-center">Selamat Datang!</h2>
                        <p class="text-center">Sistem Informasi Perpustakaan</p>
                        <div class="card-text">
                            <form action="cek_login.php" method="post">
                                <div class="form-group my-3">
                                    <label for="username">nomer induk</label>
                                    <input type="text" class="form-control form-control-sm" name="nomer_induk" placeholder="masukkan nomer induk" />
                                </div>
                                <div class="form-group my-3">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control form-control-sm" name="password" placeholder="masukkan password" />
                                </div>
                                <div class="form-group d-grid my-5">
                                    <button class="btn btn-primary" type="submit">masuk</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <img src="assets/login.svg" alt="" class="gambar-login">
                </div>
            </div>
        </div>
    </div>
    </div>
    <p class="text-center p-5">made with 💙</p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>