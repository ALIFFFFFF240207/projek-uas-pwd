<!DOCTYPE html>
<HTML>
<?php include('layout/header.php') ?>
<div class="col-10 container">
    <h1>Daftar Buku Yang Sudah Dikembalikan</h1>
    <a class="btn btn-success p-2 m-2" href="tambah_anggota.php">Kembalikan Buku</a>
    <table border="2" class="table">
        <tr class="text-center">
            <th>No.</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, "select * from meminjam,buku,anggota where meminjam.id_anggota = anggota.id_anggota and meminjam.kd_buku = buku.kd_buku and meminjam.kembali = 1 order by id_pinjam");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tgl_pinjam']; ?></td>
                <td><?php echo $d['tgl_kembali']; ?></td>
                <td><?php echo $d['nm_anggota']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td>
                    <a class="btn btn-primary" href="edit_anggota.php?id=<?php echo $d['id_anggota']; ?>">Ubah</a>
                    |
                    <a class="btn btn-outline-danger" href="delete_anggota.php?id=<?php echo $d['id_anggota']; ?>">Hapus</a>

                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>
<?php include('layout/footer.php') ?>

</HTML>