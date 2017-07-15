-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 10:17 AM
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
(87, 1, 1, 3),
(88, 1, 2, 45),
(89, 1, 3, 5),
(90, 1, 4, 6),
(91, 1, 6, 296),
(92, 1, 18, 2),
(93, 1, 19, 360),
(111, 4, 1, 2),
(112, 4, 2, 57),
(113, 4, 3, 1),
(114, 4, 4, 7),
(115, 4, 6, 497),
(116, 4, 18, 1),
(117, 4, 19, 360),
(123, 5, 1, 2),
(124, 5, 2, 36),
(125, 5, 3, 2),
(126, 5, 4, 2),
(127, 5, 6, 345),
(128, 5, 18, 1),
(129, 5, 19, 360);

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
(4, 'Kalipancur', 'Jl. Abdulrahman Saleh Kav. 783'),
(5, 'Kedungmundu', 'Jl. Kedungmundu Raya, Ruko Grahawahid No. 7');

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
(10, 'Wahyu Putri', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 1, 'c'),
(11, 'Tiffany Marcelina', 'tiffany', '210dc1fd8cb4e4e43cb4961b28fac275', 4, 'c'),
(21, 'Anjar Giri Prayoo', 'manajer_banyumanik', '94b9bbcc75670d00c69cb6304acda8bd', 1, 'm'),
(22, 'Nadhira Luthfi Al Haddad', 'manajer_kalipancur', '993d81c33f4441beadb655551e0bc442', 4, 'm'),
(23, 'dr. Maulana', 'manajer_pusat', '42836637e4afa63e6ba120974d7671dc', 0, 'p'),
(24, 'tanjung', 'tanjung', 'af4f12414b33733d816eb34afecf0db3', 5, 'c'),
(25, 'Ananda Beniva', 'manajer_kedungmundu', '3f0bea4f56d4db15cdeb9cd0f04cbdeb', 5, 'm');

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
(942, 1, 1, 0.85227272727273, 2, 3),
(943, 1, 3, 0.85227272727273, 1, 5),
(944, 1, 4, 0.85227272727273, 6, 6),
(945, 1, 18, 0.85227272727273, 1, 2),
(946, 1, 19, 0.85227272727273, 284, 360),
(947, 4, 1, 1, 2, 2),
(948, 4, 3, 1, 1, 1),
(949, 4, 4, 1, 7, 7),
(950, 4, 18, 1, 1, 1),
(951, 4, 19, 1, 360, 360),
(952, 5, 1, 1, 2, 2),
(953, 5, 3, 1, 2, 2),
(954, 5, 4, 1, 2, 2),
(955, 5, 18, 1, 1, 1),
(956, 5, 19, 1, 360, 360);

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
  MODIFY `id_detail_dmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `tb_klinik`
--
ALTER TABLE `tb_klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_perhitungan_efisiensi`
--
ALTER TABLE `tb_perhitungan_efisiensi`
  MODIFY `id_perhitungan_efisiensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;
--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
