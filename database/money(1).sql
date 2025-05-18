-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2025 at 10:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id_about` tinyint NOT NULL,
  `tentang_kami` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id_about`, `tentang_kami`) VALUES
(1, 'PT Valutamas Jaya Mandiri didirikan pada tahun 2005 sebagai solusi terpercaya dalam layanan penukaran valuta asing. Berawal dari sebuah kantor kecil di pusat kota, kami berkembang menjadi salah satu perusahaan money changer terkemuka dengan jaringan luas dan layanan profesional.\n\nSejak awal, kami berpegang teguh pada prinsip kejujuran, transparansi, dan kepuasan pelanggan. Dengan dukungan tim berpengalaman dan teknologi terkini, kami terus berinovasi untuk memberikan kurs terbaik serta memastikan transaksi yang aman dan cepat.\n\nKami percaya bahwa kemudahan dalam menukar valuta asing adalah kunci kelancaran bisnis dan perjalanan Anda. Oleh karena itu, PT Valutamas Jaya Mandiri siap menjadi mitra keuangan terpercaya untuk memenuhi kebutuhan valuta asing Anda dengan pelayanan terbaik. ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jumbotron`
--

CREATE TABLE `tb_jumbotron` (
  `id_jumbotron` tinyint NOT NULL,
  `judul_1` text NOT NULL,
  `judul_2` text NOT NULL,
  `paragraft_1` text NOT NULL,
  `paragraft_2` text NOT NULL,
  `gambar_1` text NOT NULL,
  `gambar_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jumbotron`
--

INSERT INTO `tb_jumbotron` (`id_jumbotron`, `judul_1`, `judul_2`, `paragraft_1`, `paragraft_2`, `gambar_1`, `gambar_2`) VALUES
(1, 'Valuta Asing? Kami Ahlinya!', 'Apa manfaat utama menggunakan jasa PT Valutamas Jaya Mandiri?', 'PT Valutamas Jaya Mandiri menawarkan layanan money exchange terbaik dengan keamanan terjamin dan harga kompetitif.', 'Dapatkan kurs terbaik, proses cepat, dan layanan profesional hanya di PT Valutamas Jaya Mandiri. Solusi terpercaya untuk kebutuhan valuta asing Anda!', '1743758351_logo_67efa40fd5040.jpg', '1743758351_izin_67efa40fde14b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurs`
--

CREATE TABLE `tb_kurs` (
  `valas` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `pecahan` varchar(255) NOT NULL,
  `fisik` text NOT NULL,
  `id_kurs` tinyint NOT NULL,
  `th` varchar(255) NOT NULL,
  `beli` text NOT NULL,
  `jual` text NOT NULL,
  `tanggal` date NOT NULL,
  `beli_m` text NOT NULL,
  `jual_m` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kurs`
--

INSERT INTO `tb_kurs` (`valas`, `flag`, `pecahan`, `fisik`, `id_kurs`, `th`, `beli`, `jual`, `tanggal`, `beli_m`, `jual_m`) VALUES
('USD', '1744452483_67fa3b83e0b69.png', '500', 'kertas', 1, '>2010', '10000', '12000', '2025-04-12', '10500', '11500'),
('IND', '1744452528_67fa3bb0b0cf0.png', 'kertas', 'kertas', 4, '2010', '10000', '12000', '2025-04-12', '11000', '11500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_media`
--

CREATE TABLE `tb_media` (
  `id_media` tinyint NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `tiktok` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_media`
--

INSERT INTO `tb_media` (`id_media`, `instagram`, `tiktok`, `gmail`) VALUES
(1, 'arysmasugiarto_', 'arysmasugiarto_', 'arismana147@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` tinyint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `nama`, `foto`) VALUES
(1, 'Arysma Sugiarto Wibowoo', '1743758286_67efa3ce46c4f.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` tinyint NOT NULL,
  `lokasi_toko` text NOT NULL,
  `lokasi_maps` text NOT NULL,
  `nama_toko` text NOT NULL,
  `logo_toko` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `izin_toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `lokasi_toko`, `lokasi_maps`, `nama_toko`, `logo_toko`, `izin_toko`) VALUES
(1, 'Padang', 'https://maps.app.goo.gl/xeFvB5Z7v7xq8xfB7', 'VJM Money Changer', '1743758389_logo_67efa43547097.jpg', '1743758389_izin_67efa4354a9f0.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(23, 'admin', 'admin', '$2y$10$PJfHo3/QbuqVYrFjtKdUouHwXLaf4xTCmhEUrEyO/Ujb8Bllh/ope', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wa`
--

CREATE TABLE `tb_wa` (
  `id_wa` tinyint NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `nomor_wa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_wa`
--

INSERT INTO `tb_wa` (`id_wa`, `nama_admin`, `nomor_wa`) VALUES
(1, 'arysma', '08213333333'),
(2, 'jamal', '083234354');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tb_jumbotron`
--
ALTER TABLE `tb_jumbotron`
  ADD PRIMARY KEY (`id_jumbotron`);

--
-- Indexes for table `tb_kurs`
--
ALTER TABLE `tb_kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Indexes for table `tb_media`
--
ALTER TABLE `tb_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wa`
--
ALTER TABLE `tb_wa`
  ADD PRIMARY KEY (`id_wa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id_about` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jumbotron`
--
ALTER TABLE `tb_jumbotron`
  MODIFY `id_jumbotron` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kurs`
--
ALTER TABLE `tb_kurs`
  MODIFY `id_kurs` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_media`
--
ALTER TABLE `tb_media`
  MODIFY `id_media` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_wa`
--
ALTER TABLE `tb_wa`
  MODIFY `id_wa` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
