<!DOCTYPE html>
<html lang="en">
<?php include('layout/header.php') ?>
<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "select max(id_pinjam) as kodeTerbesar from meminjam");
$data = mysqli_fetch_array($query);
$KdPinjam = $data['kodeTerbesar'];
$urutan = (int) substr($KdPinjam, 3, 3);

$urutan++;
$huruf = "PJ";
$KdPinjam = $huruf . sprintf("%03s", $urutan);
$tgl_pinjam = date('mm/dd/yyyy');

?>
<div class="col-10">
    <div class="card container col-10 mt-5 ">
        <h1>Form Pinjam Buku</h1>
        <form method="post" action="proses_pinjam.php">
            <label class="form-group">ID Pinjam</label><br />
            <input class="form-control" type="text" name="id_pinjam" required="required" value="<?php echo $KdPinjam ?>" readonly>

            <br>

            <label class="form-group">Tanggal Pinjam</label><br />
            <input class="form-control" type="date" name="tgl_pinjam" required="required" id="datePicker" value="">

            <br>

            <label class="form-group">Nama Peminjam</label>
            <select class="form-control" name="anggota" id="anggota">
                <option value="">---Pilih Nama Anggota---</option>
                <?php
                include('koneksi.php');
                $data = mysqli_query($koneksi, "select * from anggota order by id_anggota");
                while ($d = mysqli_fetch_array($data)) {
                    echo "<option value='" . $d['id_anggota'] . "'>" . $d['nm_anggota'] . "</option>";
                }
                ?>
            </select>

            <br>

            <label class="form-group">Judul Buku</label><br />
            <select class="form-control" name="buku" id="buku">
                <option value="">---Pilih Judul Buku---</option>
                <?php
                include('koneksi.php');
                $data = mysqli_query($koneksi, "select * from buku order by kd_buku");
                while ($d = mysqli_fetch_array($data)) {
                    echo "<option value='" . $d['kd_buku'] . "'>" . $d['judul_buku'] . "</option>";
                }
                ?>
            </select>
            <br>

            <input class="btn btn-success my-3" type="submit" value="Simpan">
            <a href="pinjam_buku.php" class="btn btn-outline-danger">Batal</a>
        </form>
    </div>
    <?php include('layout/footer.php') ?>