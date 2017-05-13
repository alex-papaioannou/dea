-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 12:54 PM
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
  `id_detail` int(3) NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `id_variabel` int(3) NOT NULL,
  `nilai_variabel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_detail_dmu`
--

INSERT INTO `tb_detail_dmu` (`id_detail`, `id_klinik`, `id_variabel`, `nilai_variabel`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 20),
(3, 1, 3, 1),
(4, 1, 4, 3),
(5, 1, 5, 2),
(6, 1, 6, 150),
(7, 2, 1, 3),
(8, 2, 2, 23),
(9, 2, 3, 2),
(10, 2, 4, 2),
(11, 2, 5, 0),
(12, 2, 6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dmu`
--

CREATE TABLE `tb_dmu` (
  `id_dmu` int(3) NOT NULL,
  `id_klinik` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_dmu`
--

INSERT INTO `tb_dmu` (`id_dmu`, `id_klinik`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_klinik`
--

CREATE TABLE `tb_klinik` (
  `id_klinik` int(3) NOT NULL,
  `cabang_klinik` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_klinik`
--

INSERT INTO `tb_klinik` (`id_klinik`, `cabang_klinik`) VALUES
(1, 'Banyumanik'),
(2, 'Tembalang'),
(3, 'Setiabudi'),
(4, 'Kedungmundu'),
(5, 'Manyaran'),
(6, 'Tlogosari'),
(7, 'Kalipancur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(3) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `level` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `id_klinik`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'a'),
(2, 'eno', 'eno', 'a825104f1c9120942a7f5d01bb91d3e1', 1, 'p'),
(3, 'tjg', 'tjg', 'de8f4e334f52f8947eb1aeb87f47fb3e', 4, 'p'),
(5, 'eki', 'eki', 'daed6ec547a88a5780ace966202b206e', 3, 'p'),
(6, 'dody', 'dody', '6613c97ad4ade214711f08961d33373e', 2, 'p'),
(7, 'nanda', 'nanda', '859a37720c27b9f70e11b79bab9318fe', 5, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perhitungan_efisiensi`
--

CREATE TABLE `tb_perhitungan_efisiensi` (
  `id_perhitungan_efisiensi` int(5) NOT NULL,
  `id_dmu` int(3) NOT NULL,
  `nilai_efisiensi` double NOT NULL,
  `rekomendasi` text COLLATE utf8_bin NOT NULL,
  `hasil_efisiensi` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_variabel`
--

CREATE TABLE `tb_variabel` (
  `id_variabel` int(3) NOT NULL,
  `nama_variabel` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis_variabel` char(1) COLLATE utf8_bin NOT NULL,
  `satuan` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_variabel`
--

INSERT INTO `tb_variabel` (`id_variabel`, `nama_variabel`, `jenis_variabel`, `satuan`) VALUES
(1, 'Dokter Umum', 'i', 'Orang'),
(2, 'Laba', 'o', 'Juta Rupiah'),
(3, 'Dokter Gigi', 'i', 'Orang'),
(4, 'Perawat / Petugas Front Office', 'i', 'Orang'),
(5, 'Staff Non Medis', 'i', 'Orang'),
(6, 'Pasien', 'o', 'Orang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_dmu`
--
ALTER TABLE `tb_detail_dmu`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_dmu`
--
ALTER TABLE `tb_dmu`
  ADD PRIMARY KEY (`id_dmu`);

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
  MODIFY `id_detail` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_dmu`
--
ALTER TABLE `tb_dmu`
  MODIFY `id_dmu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_klinik`
--
ALTER TABLE `tb_klinik`
  MODIFY `id_klinik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_perhitungan_efisiensi`
--
ALTER TABLE `tb_perhitungan_efisiensi`
  MODIFY `id_perhitungan_efisiensi` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `id_variabel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
