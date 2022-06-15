<!DOCTYPE html>
<HTML>
<?php include('layout/header.php') ?>
<div class="col-10 container">
    <h1>Daftar Peminjaman Buku</h1>
    <a class="btn btn-success p-2 m-2" href="pinjam.php">Pinjam Buku</a>
    <table border="2" class="table">
        <tr class="text-center">
            <th>No.</th>
            <th>Id Pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, "select meminjam.id_pinjam,meminjam.tgl_pinjam,meminjam.tgl_kembali,anggota.nm_anggota,buku.judul_buku
         from meminjam
        inner join anggota on meminjam.id_anggota = anggota.id_anggota
        inner join buku on meminjam.kd_buku = buku.kd_buku");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_pinjam']; ?></td>
                <td><?php echo $d['tgl_pinjam']; ?></td>
                <td><?php echo $d['tgl_kembali']; ?></td>
                <td><?php echo $d['nm_anggota']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td>
                    <a class="btn btn-primary" href="edit_anggota.php?id=<?php echo $d['id_pinjam']; ?>">Ubah</a>
                    |
                    <a class="btn btn-outline-success" href="kembali.php?id=<?php echo $d['id_pinjam']; ?>">Kembalikan</a>

                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>

<?php include('layout/footer.php') ?>

</HTML>