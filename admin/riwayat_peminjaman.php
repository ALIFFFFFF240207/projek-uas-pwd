<!DOCTYPE html>
<HTML>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/global_style.css">
    <title>Riwayat Peminjaman Buku</title>
</head>
<?php include('layout/header.php') ?>
<div class="col-10 container">
    <h1>Daftar Riwayat Peminjaman Buku</h1>
    <script>
        $(document).ready(function() {

            // From datepicker
            $("#from_date").datepicker({
                dateFormat: 'mm/dd/yyyy',
                changeYear: true,
                onSelect: function(selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#to_date").datepicker("option", "minDate", dt);
                }
            });

            // To datepicker
            $("#to_date").datepicker({
                dateFormat: 'mm/dd/yyyy',
                changeYear: true,
                onSelect: function(selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#from_date").datepicker("option", "maxDate", dt);
                }
            });
        });
    </script>


    <table border="2" class="table">
        <div class="row">
            <div class="col-5 mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalExport">
                    Export Ke CSV
                </button>
            </div>
            <div class="col-2">

            </div>

        </div>
        <tr class="text-center">
            <th>No.</th>
            <th>Id Pinjam</th>
            <th>Tanggal Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Status</th>
        </tr>
        <tbody style="text-align: center;">
            <?php

            $batas = 5;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;
            $data = mysqli_query($koneksi, "select * from meminjam where kembali=2");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_rak = mysqli_query($koneksi, "select meminjam.id_pinjam,meminjam.tgl_pinjam,meminjam.tgl_kembali,user.nama_lengkap,meminjam.kd_buku,buku.judul_buku,meminjam.kembali
            from meminjam
           inner join user on meminjam.id_user = user.id_user
           inner join buku on meminjam.kd_buku = buku.kd_buku
           where kembali = '2' limit $halaman_awal, $batas");
            $nomor = $halaman_awal + 1;
            while ($d = mysqli_fetch_array($data_rak)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['id_pinjam']; ?></td>
                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td><?php echo $d['tgl_kembali']; ?></td>
                    <td><?php echo $d['nama_lengkap']; ?></td>
                    <td><?php echo $d['judul_buku']; ?></td>
                    <td class="">Sudah dikembalikan</td>
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
    <div class="modal fade" id="modalExport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Data Ke CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="export.php">
                        <!-- DatePicker -->
                        <div class="input-group my-4">
                            <label for="dari" class="input-group"> Dari Tanggal </label>
                            <input type="date" class="datepicker form-control mb-3" placeholder="Dari Tanggal" name="from_date" id='from_date'>
                            <label for="dari" class="input-group"> Sampai Tanggal </label>
                            <input type="date" class="datepicker form-control " placeholder="Sampai Tanggal" name="to_date" id='to_date'>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" name="export" type="submit"><i class="bi bi-file-earmark-spreadsheet-fill"> Export </i></button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php') ?>