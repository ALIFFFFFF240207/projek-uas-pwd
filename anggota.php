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
      <div class="row justify-content-end">
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
         <th>Id Anggota</th>
         <th>Nomor Induk</th>
         <th>Nama Anggota</th>
         <th>Alamat</th>
         <th>Tanggal Daftar Anggota</th>
         <th>Status Anggota</th>
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

         $data = mysqli_query($koneksi, "select * from user where level = 'user'");
         $jumlah_data = mysqli_num_rows($data);
         $total_halaman = ceil($jumlah_data / $batas);
         if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $data_rak = mysqli_query($koneksi, "select * from user where nama_lengkap  like '%" . $cari . "%' && level = 'user'");
         } else {
            $data_rak = mysqli_query($koneksi, "select * from user where level='user'");
         }
         $nomor = $halaman_awal + 1;
         while ($d = mysqli_fetch_array($data_rak)) {
         ?>
            <tr class="text-center">
               <td><?php echo $nomor++; ?></td>
               <td><?php echo $d['id_user']; ?></td>
               <td><?php echo $d['nomor_induk']; ?></td>
               <td><?php echo $d['nama_lengkap']; ?></td>
               <td><?php echo $d['alamat']; ?></td>
               <td><?php echo $d['tgl_daftar']; ?></td>
               <td><?php echo $d['status']; ?></td>
               <td>
                  <a id="tombolUbah" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $d['id_user'] ?>">Ubah</a>
                  |
                  <a id="tombolhapus" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $d['id_user'] ?>">Hapus</a>

                  <div class="modal fade" id="ubahModal<?php echo $d['id_user'] ?>" tabindex="-1">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title">Form Ubah Data Anggota</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <form method="post" action="update_anggota.php">
                                 <label class="form-group">Id Anggota</label><br />
                                 <input class="form-control" readonly name="id_user" value="<?php echo $d['id_user']; ?>">

                                 <br>

                                 <label class="form-group">Nama Anggota</label><br />
                                 <input class="form-control" type="text" name="nama_lengkap" value="<?php echo $d['nama_lengkap']; ?>">

                                 <br>

                                 <label class="form-group">Alamat</label><br />
                                 <input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>">

                                 <br>

                                 <label class="form-group">Tanggal Daftar</label><br />
                                 <input class="form-control" type="date" name="tgl_daftar" value="<?php echo $d['tgl_daftar']; ?>" readonly>

                                 <br>

                                 <label class="form-group">Status Anggota</label><br />
                                 <input class="form-control" type="text" name="status" value="<?php echo $d['status']; ?>" readonly>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                 </div>
                              </form>

                           </div>

                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="hapusModal<?php echo $d['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              Apakah anda yakin ingin menghapus <?php echo $d['nama_lengkap'] ?> ?
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <a href="delete_anggota.php?id=<?php echo $d['id_user']; ?>" class="btn btn-outline-danger">Hapus</a>
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