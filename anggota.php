<!DOCTYPE html>
<html lang="en">
<?php include("layout/header.php") ?>
<div class="col-10 container">
   <h1>Daftar Anggota</h1>
   <a class="btn btn-success p-2 m-2" href="tambah_anggota.php">Tambah Anggota</a>
   <table border="2" class="table">
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

      $no = 1;
      $data = mysqli_query($koneksi, "select * from anggota");
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
               <a class="btn btn-primary" href="edit_anggota.php?id=<?php echo $d['id_anggota']; ?>">Ubah</a>
               |
               <!-- Button trigger modal -->
               <a class="btn btn-outline-danger" href="delete_anggota.php?id=<?php echo $d['id_anggota']; ?>">Hapus</a>


            </td>
         </tr>

      <?php
      }
      ?>
   </table>
</div>
<?php include('layout/footer.php') ?>