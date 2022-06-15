<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>
    <?php session_start(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-primary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Sistem Informasi Perpustakaan</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="pinjam_buku.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-book"></i> <span class="ms-1 d-none d-sm-inline">Peminjaman Buku</span> </a>
                        </li>
                        <li>
                            <a href="rak_buku.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-bookshelf"></i> <span class="ms-1 d-none d-sm-inline">Rak Buku</span></a>
                        </li>
                        <li>
                            <a href="anggota.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Anggota</span></a>
                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Laporan</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

                            <li><a class="dropdown-item" href="login.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>