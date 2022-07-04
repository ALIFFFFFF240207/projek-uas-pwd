<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <title>Rak Buku</title>
</head>
<?php include("../user/layout/header.php") ?>
<div class="col-10 container">
    <h1 class="mb-5">Daftar Riwayat Peminjaman Buku</h1>
    <table border="2" class="table">
        <tr class="text-center">
            <th>No.</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $data = mysqli_query($koneksi, "select * from meminjam where judul_buku like '%" . $cari . "%'");
        } else {
            $data = mysqli_query($koneksi, "select meminjam.kd_buku, buku.judul_buku , meminjam.tgl_pinjam, meminjam.tgl_kembali from meminjam
            inner join buku on meminjam.kd_buku = buku.kd_buku");
        }
        $no = 1;
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['kd_buku']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td><?php echo $d['tgl_pinjam']; ?></td>
                <td><?php echo $d['tgl_kembali']; ?></td>
                <td>
                    <a id="tombolDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $d['kd_buku'] ?>">Lihat Detail</a>

                    <div class="modal fade" id="ubahModal<?php echo $d['kd_buku'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="update_buku.php">
                                        <label class="form-group">Kode Buku</label><br />
                                        <input class="form-control" readonly name="kd_buku" value="<?php echo $d['kd_buku']; ?>">

                                        <br>

                                        <label class="form-group">Judul Buku</label><br />
                                        <input class="form-control" type="text" name="judul_buku" value="<?php echo $d['judul_buku']; ?>" readonly>

                                        <br>

                                        <label class="form-group">Pengarang</label><br />
                                        <input class="form-control" type="text" name="pengarang" value="<?php echo $d['pengarang']; ?>" readonly>

                                        <br>

                                        <label class="form-group">Kategori Buku</label><br />
                                        <input class="form-control" type="text" name="pengarang" value="<?php echo $d['nama_kategori']; ?>" readonly>

                                        <br>

                                        <label class="form-group">penerbit</label><br />
                                        <input class="form-control" type="text" name="penerbit" value="<?php echo $d['penerbit']; ?>" readonly>

                                        <br>

                                        <label class="form-group">Rak</label><br />
                                        <input class="form-control" type="text" name="pengarang" value="<?php echo $d['nama_rak']; ?>" readonly>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>

<?php include('layout/footer.php') ?>