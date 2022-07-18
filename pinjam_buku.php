<!DOCTYPE html>
<HTML>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <title>Pinjam Buku</title>
</head>
<?php include('layout/header.php') ?>
<div class="col-10 container">
    <h1>Daftar Peminjaman Buku</h1>
    <table border="2" class="table">
        <div class="row">
            <div class="col-5 mb-3">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">Peminjaman Buku</a>
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                include 'koneksi.php';
                                $query = mysqli_query($koneksi, "select max(id_pinjam) as kodeTerbesar from meminjam");
                                $data = mysqli_fetch_array($query);
                                $kdPinjam = $data['kodeTerbesar'];
                                $urutan = (int) substr($kdPinjam, 3, 3);
                                $urutan++;
                                $huruf = "PJ";
                                $kdPinjam = $huruf . sprintf("%03s", $urutan);
                                ?>
                                <form method="post" action="proses_pinjam.php">
                                    <label class="form-group">ID Pinjam</label><br />
                                    <input class="form-control" type="text" name="id_pinjam" required="required" value="<?php echo $kdPinjam ?>" readonly>

                                    <br>

                                    <label class="form-group">Tanggal Pinjam</label><br />
                                    <input class="form-control" type="date" name="tgl_pinjam" required="required" id="datePicker" value="">

                                    <br>

                                    <label class="form-group">Nama Peminjam</label>
                                    <select class="form-control" name="anggota" id="anggota">
                                        <option value="">---Pilih Nama Anggota---</option>
                                        <?php
                                        include('koneksi.php');
                                        $anggota = mysqli_query($koneksi, "select * from user where level='user' && status='aktif'");
                                        while ($a = mysqli_fetch_array($anggota)) {
                                            echo "<option value='" . $a['id_user'] . "'>" . $a['nama_lengkap'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <br>

                                    <label class="form-group">Judul Buku</label><br />
                                    <select class="form-control" name="buku" id="buku">
                                        <option value="">---Pilih Judul Buku---</option>
                                        <?php
                                        include('koneksi.php');
                                        $buku = mysqli_query($koneksi, "select * from buku where status_buku='2'");
                                        while ($b = mysqli_fetch_array($buku)) {
                                            echo "<option value='" . $b['kd_buku'] . "'>" . $b['judul_buku'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
        <tr class="text-center">
            <th>No.</th>
            <th>Id Pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Aksi</th>
        </tr>

        <tbody style="text-align: center;">
            <?php
            include 'koneksi.php';
            $batas = 5;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;
            $data = mysqli_query($koneksi, "select * from meminjam where kembali=1");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);
            $data_rak = mysqli_query($koneksi, "select meminjam.id_pinjam,meminjam.tgl_pinjam,meminjam.tgl_kembali,user.nama_lengkap,meminjam.kd_buku,buku.judul_buku
            from meminjam
           inner join user on meminjam.id_user = user.id_user
           inner join buku on meminjam.kd_buku = buku.kd_buku
           where kembali = '1' limit $halaman_awal, $batas");
            $nomor = $halaman_awal + 1;
            while ($d = mysqli_fetch_array($data_rak)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['id_pinjam']; ?></td>
                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td><?php echo $d['nama_lengkap']; ?></td>
                    <td><?php echo $d['judul_buku']; ?></td>
                    <td>
                        <a id="tombolKembali" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#kembaliModal<?php echo $d['id_pinjam'] ?>">Kembalikan</a>
                        <div class="modal fade" id="kembaliModal<?php echo $d['id_pinjam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Pengembalian Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="kembali.php">
                                            <label class="form-group">ID Pinjam</label><br />
                                            <input class="form-control" type="text" name="id_pinjam" value="<?php echo $d['id_pinjam'] ?>" readonly>

                                            <br>

                                            <label class="form-group">Tanggal Pinjam</label><br />
                                            <input class="form-control" type="date" name="tgl_pinjam" id="datePicker" value="<?php echo $d['tgl_pinjam'] ?>">

                                            <br>

                                            <label class="form-group">Tanggal Pinjam</label><br />
                                            <input class="form-control" type="date" name="tgl_kembali" id="datePicker" value="">

                                            <br>

                                            <label class="form-group">Nama Peminjam</label>
                                            <input class="form-control" type="text" name="nama_peminjam" value="<?php echo $d['nama_lengkap'] ?>">


                                            <br>

                                            <label class="form-group">Judul Buku</label>
                                            <input class="form-control" type="hidden" name="kd_buku" value="<?php echo $d['kd_buku'] ?>">
                                            <input class="form-control" type="text" name="judul_buku" value="<?php echo $d['judul_buku'] ?>">


                                            <br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Kembalikan</button>
                                            </div>
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

</HTML>