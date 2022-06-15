<!DOCTYPE html>
<html lang="en">
<?php include('layout/header.php') ?>
<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "select max(kd_buku) as kodeTerbesar from buku");
$data = mysqli_fetch_array($query);
$kodeBuku = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBuku, 3, 3);

$urutan++;
$huruf = "BK";
$kodeBuku = $huruf . sprintf("%03s", $urutan);
?>


<div class="col-10">
    <h1>Tambah Buku</h1>
    <div class="card container col-10 mt-5 ">
        <form method="post" action="insert_buku.php">
            <label class="form-group">Kode Buku</label><br />
            <input class="form-control" type="text" name="kd_buku" required="required" value="<?php echo $kodeBuku ?>" readonly>

            <br>

            <label class="form-group">Judul Buku</label><br />
            <input class="form-control" type="text" name="judul_buku" required="required">

            <br>

            <label class="form-group">Pengarang</label><br />
            <input class="form-control" type="text" name="pengarang" required="required">

            <br>

            <label class="form-group">Jenis Buku</label><br />
            <input class="form-control" type="text" name="jenis_buku" required="required">

            <br>

            <label class="form-group">Penerbit</label><br />
            <input class="form-control" type="text" name="penerbit" required="required">

            <br>

            <input class="btn btn-success my-3" type="submit" value="Simpan">
            <a href="rak_buku.php" class="btn btn-outline-danger">Batal</a>
        </form>
    </div>
    <?php include('layout/footer.php') ?>