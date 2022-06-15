<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php') ?>
<div class="col-10">
    <h1>Edit Anggota</h1>
    <div class="rounded container col-10 mt-5 ">
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "select * from anggota where id_anggota='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <form method="post" action="update_anggota.php">
                <label class="form-group">Id Anggota</label><br />
                <input class="form-control" readonly name="id_anggota" value="<?php echo $d['id_anggota'] ?>">

                <br>

                <label class="form-group">Nama Anggota</label><br />
                <input class="form-control" type="text" name="nm_anggota" value="<?php echo $d['nm_anggota'] ?>">

                <br>

                <label class="form-group">Alamat</label><br />
                <input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat'] ?>">

                <br>

                <label class="form-group">Tanggal Lahir</label><br />
                <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $d['tgl_lahir'] ?>">

                <br>

                <label class="form-group">Tanggal Daftar</label><br />
                <input class="form-control" type="date" name="tgl_daftar" value="<?php echo $d['tgl_daftar'] ?>">

                <br>

                <label class="form-group">Status Anggota</label><br />
                <input class="form-control" type="text" name="sts_anggota" value="<?php echo $d['sts_anggota'] ?>">

                <br>

                <input class="btn btn-success my-3" type="submit" value="Ubah">
                <a href="anggota.php" class="btn btn-outline-danger">Batal</a>
            </form>

        <?php

        }
        ?>
    </div>
    <?php include('layout/footer.php') ?>