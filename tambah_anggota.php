<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <title>Tambah Data Anggota</title>
</head>
<?php include('layout/header.php') ?>
<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "select max(id_anggota) as kodeTerbesar from anggota");
$data = mysqli_fetch_array($query);
$kodeAnggota = $data['kodeTerbesar'];
$urutan = (int) substr($kodeAnggota, 3, 3);
$urutan++;
$huruf = "AG";
$kodeAnggota = $huruf . sprintf("%03s", $urutan);
?>
<div class="col-10">

    <h1>Tambah Anggota</h1>
    <div class="card container col-10 mt-5 ">
        <form method="post" action="insert_anggota.php">
            <label class="form-group">Id Anggota</label><br />
            <input class="form-control" type="text" name="id_anggota" required="required" value="<?php echo $kodeAnggota ?>" readonly>

            <br>

            <label class="form-group">Nama Anggota</label><br />
            <input class="form-control" type="text" name="nm_anggota" required="required">

            <br>

            <label class="form-group">Alamat</label><br />
            <input class="form-control" type="text" name="alamat" required="required">

            <br>

            <label class="form-group">Tanggal Lahir</label><br />
            <input class="form-control" type="date" name="tgl_lahir" required="required">

            <br>

            <label class="form-group">Tanggal Daftar</label><br />
            <input class="form-control" type="date" name="tgl_daftar" required="required">

            <br>

            <label class="form-group">Status Anggota</label><br />
            <input class="form-control" type="text" name="sts_anggota" required="required" value="aktif" readonly>

            <br>

            <input class="btn btn-success my-3" type="submit" value="Simpan">
            <a href="anggota.php" class="btn btn-outline-danger">Batal</a>
        </form>
    </div>
    <?php include('layout/footer.php') ?>