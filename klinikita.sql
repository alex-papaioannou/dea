-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 08:12 PM
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
(7, 1, 1, 2),
(8, 1, 2, 57),
(9, 1, 3, 1),
(10, 1, 4, 7),
(11, 1, 6, 497),
(12, 1, 18, 1),
(30, 1, 20, 360),
(32, 4, 1, 2),
(33, 4, 2, 36),
(34, 4, 3, 2),
(35, 4, 4, 2),
(36, 4, 6, 345),
(37, 4, 18, 1),
(38, 4, 20, 360),
(54, 3, 1, 3),
(55, 3, 2, 45),
(56, 3, 3, 5),
(57, 3, 4, 6),
(58, 3, 6, 296),
(59, 3, 18, 2),
(60, 3, 20, 360),
(72, 6, 1, 2),
(73, 6, 2, 18),
(74, 6, 3, 1),
(75, 6, 4, 3),
(76, 6, 6, 200),
(77, 6, 18, 1),
(78, 6, 20, 200);

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
(1, 'Kalipancur', 'Jl. Abdulrahman Saleh'),
(3, 'Banyumanik', 'Jl. Setiabudi No. 55'),
(4, 'Kedungmundu', 'Jl. Kedungmundu Raya, Ruko Grahawahid No. 7'),
(6, 'Ngaliyan', 'Jl. Permata Puri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `level` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `id_klinik`, `level`) VALUES
(1, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 0, 'a'),
(9, 'Murtiono Saputra', 'murtiono', '0c3028571f74c195c5098baa2ae8a972', 3, 'c'),
(10, 'Wahyu Putri', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 1, 'c'),
(11, 'Tiffany Marcelina', 'tiffany', '210dc1fd8cb4e4e43cb4961b28fac275', 4, 'c'),
(20, 'Firhan Balweel', 'manajer_b', '94b9bbcc75670d00c69cb6304acda8bd', 3, 'm'),
(21, 'Anjar Giri Prayoo', 'manajer_kl', '993d81c33f4441beadb655551e0bc442', 1, 'm'),
(22, 'Nadhira Luthfi Al Haddad', 'manajer_kd', '3f0bea4f56d4db15cdeb9cd0f04cbdeb', 4, 'm'),
(23, 'dr. Maulana', 'manajer_pusat', '42836637e4afa63e6ba120974d7671dc', 0, 'p'),
(26, 'Jamal Radifan', 'jamal', '74f56399c89f4bd03ff5e85b6bf4e85f', 6, 'c'),
(27, 'Natashya Marcelina', 'natashya', '3a2535eff3f7c9079683eb00aada51b5', 6, 'm');

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
(306, 1, 1, 1, 2, 2),
(307, 1, 3, 1, 1, 1),
(308, 1, 4, 1, 7, 7),
(309, 1, 18, 1, 1, 1),
(310, 1, 20, 1, 360, 360),
(311, 3, 1, 0.85227272727273, 1, 3),
(312, 3, 3, 0.85227272727273, 1, 5),
(313, 3, 4, 0.85227272727273, 5, 6),
(314, 3, 18, 0.85227272727273, 1, 2),
(315, 3, 20, 0.85227272727273, 250, 360),
(316, 4, 1, 1, 2, 2),
(317, 4, 3, 1, 2, 2),
(318, 4, 4, 1, 2, 2),
(319, 4, 18, 1, 1, 1),
(320, 4, 20, 1, 360, 360),
(321, 6, 1, 0.80292622000178, 1, 2),
(322, 6, 3, 0.80292622000178, 0, 1),
(323, 6, 4, 0.80292622000178, 3, 3),
(324, 6, 18, 0.80292622000178, 0, 1),
(325, 6, 20, 0.80292622000178, 145, 200);

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
(20, 'Jam Kerja', 'i', 'Jam');

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
  MODIFY `id_detail_dmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tb_klinik`
--
ALTER TABLE `tb_klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_perhitungan_efisiensi`
--
ALTER TABLE `tb_perhitungan_efisiensi`
  MODIFY `id_perhitungan_efisiensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;
--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
