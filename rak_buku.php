<!DOCTYPE html>
<html lang="en">
<?php include("layout/header.php") ?>
<div class="col-10 container">
    <h1>Daftar Koleksi Buku</h1>
    <a class="btn btn-success p-2 m-2" href="tambah_buku.php">Tambah Buku</a>
    <table border="2" class="table">
        <tr class="text-center">
            <th>No.</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Jenis Buku</th>
            <th>Penerbit</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from buku");
        while ($d = mysqli_fetch_array($data)) {

        ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['kd_buku']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td><?php echo $d['pengarang']; ?></td>
                <td><?php echo $d['jenis_buku']; ?></td>
                <td><?php echo $d['penerbit']; ?></td>
                <td>
                    <a class="btn btn-primary" href="edit_buku.php?id=<?php echo $d['kd_buku']; ?>">Ubah</a>
                    |
                    <a href="delete_buku.php?id=<?php echo $d['kd_buku']; ?>" class="btn btn-outline-danger">Hapus</a>

                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>

<?php include('layout/footer.php') ?>