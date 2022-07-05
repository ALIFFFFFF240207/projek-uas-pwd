<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/global_style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Halaman Login</title>
</head>

<body>
    <!-- cek pesan notifikasi -->
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'gagal') {

    ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        title: 'Login Gagal !',
                        text: "Nomor Induk Atau Password Anda Salah",
                        icon: 'error',
                        confirmButtonColor: '#0275d8'
                    })
                });
            </script>
        <?php } else if ($_GET['pesan'] == 'berhasil') { ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        title: 'Pendaftaran Berhasil!',
                        text: "Silahkan Masukkan Nomor Induk dan Password",
                        icon: 'success',
                        confirmButtonColor: '#0275d8'
                    })
                });
            </script>
        <?php } else if ($_GET['pesan'] == 'logout') { ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        title: 'Berhasil Logout',
                        text: "Anda Berhasil Keluar Dari Aplikasi",
                        icon: 'success',
                        confirmButtonColor: '#0275d8'
                    })
                });
            </script>
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
                                    <input type="text" class="form-control form-control-sm" name="nomor_induk" placeholder="masukkan nomer induk" />
                                </div>
                                <div class="form-group my-3">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control form-control-sm" name="password" placeholder="masukkan password" />
                                </div>
                                <!-- Button trigger modal -->
                                <a href="" data-bs-toggle="modal" data-bs-target="#formDaftar">Belum punya akun?</a>

                                <!-- Modal -->

                                <div class="form-group d-grid my-3">
                                    <button class="btn btn-primary" type="submit">masuk</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="formDaftar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Pendaftaran Anggota Perpustakaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                include 'koneksi.php';
                                $query = mysqli_query($koneksi, "select max(id_user) as kodeTerbesar from user");
                                $data = mysqli_fetch_array($query);
                                $kdUser = $data['kodeTerbesar'];
                                $urutan = (int) substr($kdUser, 3, 3);
                                $urutan++;
                                $huruf = "US";
                                $kdUser = $huruf . sprintf("%03s", $urutan);
                                ?>
                                <form method="post" action="daftar_akun.php">
                                    <label class="form-group">ID User</label><br />
                                    <input class="form-control" type="text" name="id_user" required="required" value="<?php echo $kdUser ?>" readonly>

                                    <br>

                                    <label class="form-group">Nomor Induk</label><br />
                                    <input class="form-control" type="text" name="nomor_induk" required="required">

                                    <br>

                                    <label class="form-group">Nama Lengkap</label><br />
                                    <input class="form-control" type="text" name="nama_lengkap" required="required">

                                    <br>

                                    <label class="form-group">Alamat</label><br />
                                    <input class="form-control" type="text" name="alamat" required="required">

                                    <br>

                                    <label class="form-group">Password</label><br />
                                    <input class="form-control" type="password" name="password" required="required">

                                    <br>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <img src="assets/login.svg" alt="" class="gambar-login">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>