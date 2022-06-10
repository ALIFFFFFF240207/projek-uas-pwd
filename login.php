<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <title>Halaman Login</title>
</head>
<body>
    <!-- cek pesan notifikasi -->
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'gagal'){
            echo "Login gagal! username dan password salah!";
        }else if($_GET['pesan'] == "logout"){
            echo "Anda telah berhasil logout";
        }else if($_GET['pesan'] == "belum_login"){
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>

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
                            <label for="username">username</label>
                            <input type="text" 
                            class="form-control form-control-sm" 
                            name="username" placeholder="masukkan username"/>
                        </div>
                        <div class="form-group my-3">
                            <label for="password">password</label>
                            <input type="password" class="form-control form-control-sm"
                            name="password" placeholder="masukkan password"/>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>