<head>
    <link rel="stylesheet" href="../assets/global_style.css">
</head>

<body>

    <?php session_start(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-primary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"> Sistem Informasi Perpustakaan</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="peminjaman.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-book"></i> <span class="ms-1 d-none d-sm-inline">Peminjaman Buku</span> </a>
                        </li>
                        <li>
                            <a href="about.php" class="nav-link px-0 align-middle text-white">
                                <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-1 d-none d-sm-inline">About</span> </a>
                        </li>
                        <li>
                            <a href="../login.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi bi-door-open"></i> <span class="ms-1 d-none d-sm-inline">Sign-out</span> </a>
                        </li>
                    </ul>
                </div>
            </div>