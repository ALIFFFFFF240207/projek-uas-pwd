<!DOCTYPE html>
<HTML>
<?php include('layout/header.php') ?>
<div class="col-10 container">
    <h1>Daftar Riwayat Peminjaman Buku</h1>
    <table border="2" class="table">
        <tr class="text-center">
            <th>No.</th>
            <th>Id Pinjam</th>
            <th>Tanggal Peminjam</th>
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
       inner join buku on meminjam.kd_buku = buku.kd_buku
       where kembali = '2'");
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
                    <a href="delete_riwayat.php?id=<?php echo $d['id_pinjam']; ?>" class="btn btn-outline-danger">Hapus</a>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>

<?php include('layout/footer.php') ?>