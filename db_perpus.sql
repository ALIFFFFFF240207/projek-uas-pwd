-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 12:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(32) NOT NULL,
  `pengarang` varchar(20) NOT NULL,
  `kategori` int(2) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `rak` int(2) NOT NULL,
  `status_buku` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `pengarang`, `kategori`, `penerbit`, `rak`, `status_buku`) VALUES
('BK001', 'asdas', 'asdas', 2, 'asdsad', 7, 1),
('BK002', 'asda', 'csasd', 3, 'asdsasd', 9, 2),
('BK003', 'jasjdj', 'asdnasdk', 5, 'a,sdkasnd', 6, 2),
('BK004', 'oqweiowjdaksl', 'aksndalsdjio', 6, 'alsmdnakn', 8, 1),
('BK005', 'aajdsansdkl', 'aksndadowje', 7, 'asndkasndk', 8, 2),
('BK006', 'aksndasnd', 'asndkasnda', 2, 'asndkandiaksnd', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(10) NOT NULL,
  `nominal_denda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Buku Ajar'),
(2, 'Kamus'),
(3, 'novel'),
(4, 'komik'),
(5, 'Ensiklopedia'),
(6, 'karya ilmiah\r\n'),
(7, 'atlas\r\n'),
(8, 'majalah');

-- --------------------------------------------------------

--
-- Table structure for table `meminjam`
--

CREATE TABLE `meminjam` (
  `id_pinjam` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `kd_buku` varchar(10) NOT NULL,
  `kembali` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `id_user`, `kd_buku`, `kembali`) VALUES
('PJ001', '2022-07-05', '2022-07-06', 'US001', 'BK001', 2),
('PJ002', '2022-07-05', '0000-00-00', 'US004', 'BK001', 1),
('PJ003', '2022-07-07', '0000-00-00', 'US002', 'BK004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(10) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`) VALUES
(1, '1A'),
(2, '1B'),
(3, '1C'),
(4, '1D'),
(5, '1E'),
(6, '2A'),
(7, '2B'),
(8, '2C'),
(9, '2D'),
(10, '2E'),
(11, '3A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `nomor_induk` bigint(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nomor_induk`, `nama_lengkap`, `alamat`, `password`, `level`, `status`, `tgl_daftar`) VALUES
('US001', 20410100062, 'alif firdiansyah', 'sidoarjp', '57a94a33a416aec22c82a356127ab3a8', 'user', 'aktif', '2022-07-04'),
('US002', 20410100063, 'Yessica Tamara', 'surabaya', '57a94a33a416aec22c82a356127ab3a8', 'user', 'aktif', '2022-07-04'),
('US003', 406511, 'Reza Habibie', 'Sidoarjo', '0192023a7bbd73250516f069df18b500', 'admin', 'aktif', '2022-07-05'),
('US004', 20410100064, 'Adzana Shaliha', 'Purbalingga', 'f72ab7ec1016941d7cc813b52b64cf57', 'user', 'aktif', '2022-07-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nomor_induk` (`nomor_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
