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
            <th>Id Pinjam</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <tbody>
            <?php
            include 'koneksi.php';
            $id_user = $_SESSION['id_user'];
            $batas = 5;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($koneksi, "select * from meminjam where id_user='$id_user' ");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);
            $data = mysqli_query($koneksi, "select meminjam.id_pinjam, meminjam.kd_buku, buku.judul_buku , meminjam.tgl_pinjam, meminjam.tgl_kembali, meminjam.kembali from meminjam
            inner join buku on meminjam.kd_buku = buku.kd_buku where id_user='$id_user' limit $halaman_awal, $batas ");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr class="text-center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_pinjam']; ?></td>
                    <td><?php echo $d['kd_buku']; ?></td>
                    <td><?php echo $d['judul_buku']; ?></td>
                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td><?php echo $d['tgl_kembali']; ?></td>
                    <?php $status = $d['kembali'] ?>
                    <?php
                    if ($status == '1') {
                        $status = 'belum dikembalikan';
                    } else if ($status == '2') {
                        $status = 'sudah dikembalikan';
                    } ?>
                    <td><?php echo $status ?></td>

                    <td>
                        <a id="tombolDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatDetail<?php echo $d['id_pinjam'] ?>">Lihat Detail</a>

                        <div class="modal fade" id="lihatDetail<?php echo $d['id_pinjam'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Peminjaman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="update_buku.php">
                                            <label class="form-group">Id Peminjaman</label><br />
                                            <input class="form-control" readonly name="kd_buku" value="<?php echo $d['id_pinjam']; ?>">

                                            <br>
                                            <label class="form-group">Kode Buku</label><br />
                                            <input class="form-control" readonly name="kd_buku" value="<?php echo $d['kd_buku']; ?>">

                                            <br>

                                            <label class="form-group">Judul Buku</label><br />
                                            <input class="form-control" type="text" name="judul_buku" value="<?php echo $d['judul_buku']; ?>" readonly>

                                            <br>

                                            <label class="form-group">Tanggal Pinjam</label><br />
                                            <input class="form-control" type="date" name="judul_buku" value="<?php echo $d['tgl_pinjam']; ?>" readonly>

                                            <br>

                                            <label class="form-group">Tanggal Kembali</label><br />
                                            <input class="form-control" type="date" name="judul_buku" value="<?php echo $d['tgl_kembali']; ?>" readonly>

                                            <br>

                                            <label class="form-group">Status Peminjaman</label><br />
                                            <input class="form-control" type="text" name="judul_buku" value="<?php echo $status ?>" readonly>

                                            <br>

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
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($halaman > 1) {
                                            echo "href='?halaman=$previous'";
                                        } ?>>Previous
                </a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                            echo "href='?halaman=$next'";
                                        } ?>>Next
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php include('layout/footer.php') ?>