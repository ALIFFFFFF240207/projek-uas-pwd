<!DOCTYPE html>
<html lang="en">
<?php include("layout/header.php") ?>
<div class="col-10 container">
    <h1>Daftar Koleksi Buku</h1>
    <a class="btn btn-success p-2 m-2" href="tambah_buku.php">Tambah Buku</a>
    <table border="2" class="table">
        <tr class="text-center">
            <th>No.</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Jenis Buku</th>
            <th>Penerbit</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from buku");
        while ($d = mysqli_fetch_array($data)) {

        ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['kd_buku']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td><?php echo $d['pengarang']; ?></td>
                <td><?php echo $d['jenis_buku']; ?></td>
                <td><?php echo $d['penerbit']; ?></td>
                <td>
                    <a class="btn btn-primary" href="edit_buku.php?id=<?php echo $d['kd_buku']; ?>">Ubah</a>
                    |
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaldelete">
                        Hapus
                    </button>

                    <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="modaldelete" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modaldelete">Hapus Data Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin akan menghapus "<?php echo $d['judul_buku']; ?>" ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a href="delete_buku.php?id=<?php echo $d['kd_buku']; ?>" class="btn btn-danger">Hapus</a>
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
</div>
</div>


</html>