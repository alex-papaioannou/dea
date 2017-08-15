-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 02:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinikita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_dmu`
--

CREATE TABLE `tb_detail_dmu` (
  `id_detail_dmu` int(11) NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `nilai_variabel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_detail_dmu`
--

INSERT INTO `tb_detail_dmu` (`id_detail_dmu`, `id_klinik`, `id_variabel`, `nilai_variabel`) VALUES
(146, 3, 1, 2),
(147, 3, 2, 36),
(148, 3, 3, 2),
(149, 3, 4, 2),
(150, 3, 6, 345),
(151, 3, 18, 1),
(152, 3, 19, 360),
(153, 1, 1, 3),
(154, 1, 2, 45),
(155, 1, 3, 5),
(156, 1, 4, 6),
(157, 1, 6, 296),
(158, 1, 18, 2),
(159, 1, 19, 360),
(160, 2, 1, 2),
(161, 2, 2, 57),
(162, 2, 3, 1),
(163, 2, 4, 7),
(164, 2, 6, 497),
(165, 2, 18, 1),
(166, 2, 19, 360);

-- --------------------------------------------------------

--
-- Table structure for table `tb_klinik`
--

CREATE TABLE `tb_klinik` (
  `id_klinik` int(11) NOT NULL,
  `cabang_klinik` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_klinik`
--

INSERT INTO `tb_klinik` (`id_klinik`, `cabang_klinik`, `alamat`) VALUES
(1, 'Banyumanik', 'Jl. Setiabudi No. 55'),
(2, 'Kalipancur', 'Jl. Abdulrahman Saleh Kav. 783'),
(3, 'Kedungmundu', 'Jl. Kedungmundu Raya, Ruko Grahawahid No. 7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_manajer_pusat`
--

CREATE TABLE `tb_manajer_pusat` (
  `id_manajer_pusat` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `level` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_manajer_pusat`
--

INSERT INTO `tb_manajer_pusat` (`id_manajer_pusat`, `nama`, `username`, `password`, `level`) VALUES
(1, 'dr. Maulana', 'manajer_pusat', '42836637e4afa63e6ba120974d7671dc', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `level` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `id_klinik`, `level`) VALUES
(11, 'Tiffany', 'tiffany', '210dc1fd8cb4e4e43cb4961b28fac275', 2, 'c'),
(22, 'Nadhira Luthfi Al Haddad', 'manajer_kalipancur', '993d81c33f4441beadb655551e0bc442', 2, 'm'),
(24, 'Wahyu', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 3, 'c'),
(25, 'Ananda Beniva Ellian', 'manajer_kedungmundu', '3f0bea4f56d4db15cdeb9cd0f04cbdeb', 3, 'm'),
(26, 'Murtiono', 'murtiono', '0c3028571f74c195c5098baa2ae8a972', 1, 'c'),
(27, 'Diana Lavinia', 'manajer_banyumanik', '94b9bbcc75670d00c69cb6304acda8bd', 1, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perhitungan_efisiensi`
--

CREATE TABLE `tb_perhitungan_efisiensi` (
  `id_perhitungan_efisiensi` int(11) NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `nilai_efisiensi` double NOT NULL,
  `rekomendasi` int(11) NOT NULL,
  `nilai_awal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_perhitungan_efisiensi`
--

INSERT INTO `tb_perhitungan_efisiensi` (`id_perhitungan_efisiensi`, `id_klinik`, `id_variabel`, `nilai_efisiensi`, `rekomendasi`, `nilai_awal`) VALUES
(1, 1, 1, 0.85227272727273, 2, 3),
(2, 1, 3, 0.85227272727273, 1, 5),
(3, 1, 4, 0.85227272727273, 6, 6),
(4, 1, 18, 0.85227272727273, 1, 2),
(5, 1, 19, 0.85227272727273, 284, 360),
(6, 2, 1, 1, 2, 2),
(7, 2, 3, 1, 1, 1),
(8, 2, 4, 1, 7, 7),
(9, 2, 18, 1, 1, 1),
(10, 2, 19, 1, 360, 360),
(11, 3, 1, 1, 2, 2),
(12, 3, 3, 1, 2, 2),
(13, 3, 4, 1, 2, 2),
(14, 3, 18, 1, 1, 1),
(15, 3, 19, 1, 360, 360);

-- --------------------------------------------------------

--
-- Table structure for table `tb_superadmin`
--

CREATE TABLE `tb_superadmin` (
  `id_superadmin` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `level` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_superadmin`
--

INSERT INTO `tb_superadmin` (`id_superadmin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_variabel`
--

CREATE TABLE `tb_variabel` (
  `id_variabel` int(11) NOT NULL,
  `nama_variabel` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis_variabel` char(1) COLLATE utf8_bin NOT NULL,
  `satuan` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_variabel`
--

INSERT INTO `tb_variabel` (`id_variabel`, `nama_variabel`, `jenis_variabel`, `satuan`) VALUES
(1, 'Dokter Umum', 'i', 'Orang'),
(2, 'Omset', 'o', 'Juta Rupiah'),
(3, 'Dokter Gigi', 'i', 'Orang'),
(4, 'Perawat', 'i', 'Orang'),
(6, 'Pasien', 'o', 'Orang'),
(18, 'Staff Non Medis', 'i', 'Orang'),
(19, 'Jam Kerja', 'i', 'Jam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_dmu`
--
ALTER TABLE `tb_detail_dmu`
  ADD PRIMARY KEY (`id_detail_dmu`);

--
-- Indexes for table `tb_klinik`
--
ALTER TABLE `tb_klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `tb_manajer_pusat`
--
ALTER TABLE `tb_manajer_pusat`
  ADD PRIMARY KEY (`id_manajer_pusat`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_perhitungan_efisiensi`
--
ALTER TABLE `tb_perhitungan_efisiensi`
  ADD PRIMARY KEY (`id_perhitungan_efisiensi`);

--
-- Indexes for table `tb_superadmin`
--
ALTER TABLE `tb_superadmin`
  ADD PRIMARY KEY (`id_superadmin`);

--
-- Indexes for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_dmu`
--
ALTER TABLE `tb_detail_dmu`
  MODIFY `id_detail_dmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `tb_klinik`
--
ALTER TABLE `tb_klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_manajer_pusat`
--
ALTER TABLE `tb_manajer_pusat`
  MODIFY `id_manajer_pusat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_perhitungan_efisiensi`
--
ALTER TABLE `tb_perhitungan_efisiensi`
  MODIFY `id_perhitungan_efisiensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_superadmin`
--
ALTER TABLE `tb_superadmin`
  MODIFY `id_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
