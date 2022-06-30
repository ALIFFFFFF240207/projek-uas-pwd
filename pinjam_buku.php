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
            <div class="col-5">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
            <div class="col-5">
                <form action="anggota.php" method="get">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="cari"><i class="bi bi-search"></i></span>
                        <input type="date" class="form-control" name="cari">
                        <button class="btn btn-primary" type="submit" value="cari">Cari</button>
                    </div>
                </form>
            </div>
        </div>
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
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $data = mysqli_query($koneksi, "select * from meminjam where tgl_pinjam like '%" . $cari . "%'");
        } else {
            $data = mysqli_query($koneksi, "select meminjam.id_pinjam,meminjam.tgl_pinjam,meminjam.tgl_kembali,anggota.nm_anggota,buku.judul_buku
            from meminjam
           inner join anggota on meminjam.id_anggota = anggota.id_anggota
           inner join buku on meminjam.kd_buku = buku.kd_buku
           where kembali = '1'");
        }
        $no = 1;
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