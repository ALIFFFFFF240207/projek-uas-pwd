<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Halaman Utama</title>
</head>
<?php include('layout/header.php') ?>


<div class="col-10">
    <?php

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'berhasil') {

    ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        title: 'Login Berhasil!',
                        html: 'Selamat Datang <b><?php echo $_SESSION['nama_lengkap']; ?></b>',
                        icon: 'success',
                        confirmButtonColor: '#0275d8'
                    })
                });
            </script>
        <?php } ?>
    <?php } ?>
    <div class="row mt-5 ms-4 text-white">
        <div class="col-3 bg-danger rounded p-4">
            <?php
            include('koneksi.php');
            $result = mysqli_query($koneksi, "select count(*) as total_buku from buku");
            $data_buku = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <h2>Jumlah Koleksi Buku</h2>
                <div class="col-5">
                    <a class="text text-white" href="rak_buku.php">lihat detail <i class="bi bi-arrow-right-circle-fill"></i></a>
                </div>
                <div class="col-7 text-end">
                    <h1><b><?php echo $data_buku['total_buku'] ?></b></h1>
                </div>
            </div>
        </div>
        <div class="col-3 bg-primary rounded p-4 mx-3">
            <?php
            include('koneksi.php');
            $result = mysqli_query($koneksi, "select count(*) as total_anggota from user where level='user'");
            $data_anggota = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <h2>Jumlah Anggota Perpustakaan</h2>
                <div class="col-5">
                    <a class="text text-white" href="anggota.php">lihat detail <i class="bi bi-arrow-right-circle-fill"></i></a>

                </div>
                <div class="col-7 text-end">
                    <h1><b><?php echo $data_anggota['total_anggota'] ?></b></h1>
                </div>
            </div>
        </div>
        <div class="col-3 bg-success rounded p-4">
            <?php
            include('koneksi.php');
            $result = mysqli_query($koneksi, "select count(*) as total_pinjam from meminjam where kembali='1'");
            $data_pinjam = mysqli_fetch_assoc($result);
            ?>
            <h2>Jumlah Buku Yang Dipinjam</h2>
            <div class="row">

                <div class="col-5">
                    <a class="text text-white" href="pinjam_buku.php">lihat detail <i class="bi bi-arrow-right-circle-fill"></i></a>

                </div>
                <div class="col-7 text-end">
                    <h1><b><?php echo $data_pinjam['total_pinjam'] ?></b></h1>
                </div>
            </div>
        </div>
    </div>


</div>
<?php include('layout/footer.php') ?>

</html>