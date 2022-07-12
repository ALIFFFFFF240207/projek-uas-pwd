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
            <div class="col-5">

            </div>
            <div class="col-2">

            </div>
            <div class="col-5">
                <form action="rak_buku.php" method="get">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="cari"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="cari judul buku" name="cari">
                        <button class="btn btn-primary" type="submit" value="cari">Cari</button>
                    </div>
                </form>
            </div>
        </div>
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
        $data = mysqli_query($koneksi, "select meminjam.id_pinjam,meminjam.tgl_pinjam,meminjam.tgl_kembali,user.nama_lengkap,buku.judul_buku
        from meminjam
       inner join user on meminjam.id_user = user.id_user
       inner join buku on meminjam.kd_buku = buku.kd_buku
       where kembali = '2'");
        while ($d = mysqli_fetch_array($data)) {

        ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_pinjam']; ?></td>
                <td><?php echo $d['tgl_pinjam']; ?></td>
                <td><?php echo $d['tgl_kembali']; ?></td>
                <td><?php echo $d['nama_lengkap']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td>
                    <a href="delete_riwayat.php?id=<?php echo $d['id_pinjam']; ?>" class="btn btn-outline-danger">Hapus</a>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
    <div class="row justify-content-start">
        <div class="col-8">
            <form method="post" action="print.php">
                <br>
                <h2>Cetak Riwayat Peminjaman Buku</h2>
                <br>
                <!-- DatePicker -->
                <div class="input-group">
                    <div class="col-4 ">
                        <input type="date" class="datepicker form-control" placeholder="Dari Tanggal" name="from_date" id='from_date'>
                    </div>
                    <div class="col-4 mx-3">
                        <input type="date" class="datepicker form-control" placeholder="Sampai Tanggal" name="to_date" id='to_date'>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" name="export" type="submit"><i class="bi bi-file-earmark-spreadsheet-fill"> Export </i></button>
                    </div>
                </div>



            </form>
        </div>
    </div>
</div>

<?php include('layout/footer.php') ?>