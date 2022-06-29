<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/global_style.css">
   <title>Halaman Anggota</title>
</head>
<?php include("layout/header.php") ?>
<div class="col-10">
   <h1>Daftar Anggota</h1>

   <table border="2" class="table">
      <div class="row">
         <div class="col-5">
            <a id="tombolUbah" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Anggota</a>
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-alarm-fill"></i>Tambah Data Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <?php
                        include 'koneksi.php';
                        $query = mysqli_query($koneksi, "select max(id_anggota) as kodeTerbesar from anggota");
                        $data = mysqli_fetch_array($query);
                        $kodeAnggota = $data['kodeTerbesar'];
                        $urutan = (int) substr($kodeAnggota, 3, 3);
                        $urutan++;
                        $huruf = "AG";
                        $kodeAnggota = $huruf . sprintf("%03s", $urutan);
                        ?>
                        <form method="post" action="insert_anggota.php" autocomplete="off">
                           <label class="form-group">Id Anggota</label><br />
                           <input class="form-control" type="text" name="id_anggota" required="required" value="<?php echo $kodeAnggota ?>" readonly>

                           <br>

                           <label class="form-group">Nama Anggota</label><br />
                           <input class="form-control" type="text" name="nm_anggota" required="required">

                           <br>

                           <label class="form-group">Alamat</label><br />
                           <input class="form-control" type="text" name="alamat" required="required">

                           <br>

                           <label class="form-group">Tanggal Lahir</label><br />
                           <input class="form-control" type="date" name="tgl_lahir" required="required">

                           <br>

                           <label class="form-group">Tanggal Daftar</label><br />
                           <input class="form-control" type="date" name="tgl_daftar" required="required">

                           <br>

                           <label class="form-group">Status Anggota</label><br />
                           <input class="form-control" type="text" name="sts_anggota" required="required" value="aktif" readonly>
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
         <div class="col-5">
            <form action="anggota.php" method="get">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="cari"><i class="bi bi-search"></i></span>
                  <input type="text" class="form-control" placeholder="cari nama anggota" name="cari">
                  <button class="btn btn-primary" type="submit" value="cari">Cari</button>
               </div>
            </form>
         </div>
      </div>
      <tr class="text-center">
         <th>No.</th>
         <th>ID Anggota</th>
         <th>Nama Anggota</th>
         <th>Alamat</th>
         <th>Tanggal Lahir Anggota</th>
         <th>Tanggal Daftar Anggota</th>
         <th>Status Anggota</th>
         <th>Aksi</th>
      </tr>
      <?php
      include 'koneksi.php';
      if (isset($_GET['cari'])) {
         $cari = $_GET['cari'];
         $data = mysqli_query($koneksi, "select * from anggota where nm_anggota like '%" . $cari . "%'");
      } else {
         $data = mysqli_query($koneksi, "select * from anggota");
      }
      $no = 1;
      while ($d = mysqli_fetch_array($data)) {
      ?>
         <tr class="text-center">
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_anggota']; ?></td>
            <td><?php echo $d['nm_anggota']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['tgl_lahir']; ?></td>
            <td><?php echo $d['tgl_daftar']; ?></td>
            <td><?php echo $d['sts_anggota']; ?></td>
            <td>
               <a id="tombolUbah" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $d['id_anggota'] ?>">Ubah</a>
               |
               <a id="tombolhapus" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $d['id_anggota'] ?>">Hapus</a>

               <div class="modal fade" id="ubahModal<?php echo $d['id_anggota'] ?>" tabindex="-1">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Form Ubah Data Anggota</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="update_anggota.php">
                              <label class="form-group">Id Anggota</label><br />
                              <input class="form-control" readonly name="id_anggota" value="<?php echo $d['id_anggota']; ?>">

                              <br>

                              <label class="form-group">Nama Anggota</label><br />
                              <input class="form-control" type="text" name="nm_anggota" value="<?php echo $d['nm_anggota']; ?>">

                              <br>

                              <label class="form-group">Alamat</label><br />
                              <input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>">

                              <br>

                              <label class="form-group">Tanggal Lahir</label><br />
                              <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>">

                              <br>

                              <label class="form-group">Tanggal Daftar</label><br />
                              <input class="form-control" type="date" name="tgl_daftar" value="<?php echo $d['tgl_daftar']; ?>">

                              <br>

                              <label class="form-group">Status Anggota</label><br />
                              <input class="form-control" type="text" name="sts_anggota" value="<?php echo $d['sts_anggota']; ?>">
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                 <button type="submit" class="btn btn-primary">Ubah</button>
                              </div>
                           </form>

                        </div>

                     </div>
                  </div>
               </div>
               <div class="modal fade" id="hapusModal<?php echo $d['id_anggota'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           Apakah anda yakin ingin menghapus <?php echo $d['nm_anggota'] ?> ?
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                           <a href="delete_anggota.php?id=<?php echo $d['id_anggota']; ?>" class="btn btn-outline-danger">Hapus</a>
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