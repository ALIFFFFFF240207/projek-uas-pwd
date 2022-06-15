<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php') ?>
<div class="col-10">
    <h1>Edit Buku</h1>
    <div class="card container col-10 mt-5 ">
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "select * from buku where kd_buku='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <form method="post" action="update_buku.php">
                <label class="form-group">Kode Buku</label><br />
                <input class="form-control" readonly name="kd_buku" value="<?php echo $d['kd_buku'] ?>">

                <br>

                <label class="form-group">Judul Buku</label><br />
                <input class="form-control" type="text" name="judul_buku" value="<?php echo $d['judul_buku'] ?>">

                <br>

                <label class="form-group">Pengarang</label><br />
                <input class="form-control" type="text" name="pengarang" value="<?php echo $d['pengarang'] ?>">

                <br>

                <label class="form-group">Jenis Buku</label><br />
                <input class="form-control" type="text" name="jenis_buku" value="<?php echo $d['jenis_buku'] ?>">

                <br>

                <label class="form-group">Penerbit</label><br />
                <input class="form-control" type="text" name="penerbit" value="<?php echo $d['penerbit'] ?>">

                <br>

                <input class="btn btn-success my-3" type="submit" value="Ubah">
                <a href="rak_buku.php" class="btn btn-outline-danger">Batal</a>
            </form>

        <?php

        }
        ?>
    </div>
    <?php include('layout/footer.php') ?>