-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2021 at 02:41 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalberita`
--

-- --------------------------------------------------------

--
-- Table structure for table `ta_berita`
--

CREATE TABLE IF NOT EXISTS `ta_berita` (
  `id` int(5) NOT NULL,
  `tipe_berita` int(1) NOT NULL,
  `ringkasan_berita` text NOT NULL,
  `id_user` int(1) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ta_berita`
--

INSERT INTO `ta_berita` (`id`, `tipe_berita`, `ringkasan_berita`, `id_user`, `foto`, `tgl_input`) VALUES
(1, 2, 'ringkasan testing', 2, '-', '2021-06-21 17:57:27'),
(4, 2, 'ringkasaaaaa', 2, '89a8801f20a37a9a21c5548996bdfd54.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ta_cakupan_media`
--

CREATE TABLE IF NOT EXISTS `ta_cakupan_media` (
  `id` int(1) NOT NULL,
  `cakupan_media` varchar(20) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_cakupan_media`
--

INSERT INTO `ta_cakupan_media` (`id`, `cakupan_media`, `poin`) VALUES
(1, 'Nasional/Regional', 2),
(2, 'Provinsi', 1),
(3, 'Kabupaten', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `ta_expired_web`
--

CREATE TABLE IF NOT EXISTS `ta_expired_web` (
  `id` int(1) NOT NULL,
  `expired` varchar(10) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_expired_web`
--

INSERT INTO `ta_expired_web` (`id`, `expired`, `poin`) VALUES
(1, '2021', 0),
(2, '>2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_halaman_khusus`
--

CREATE TABLE IF NOT EXISTS `ta_halaman_khusus` (
  `id` int(1) NOT NULL,
  `halaman` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_halaman_khusus`
--

INSERT INTO `ta_halaman_khusus` (`id`, `halaman`) VALUES
(1, '1 Halaman'),
(2, '½ Halaman'),
(3, '¼ Halaman'),
(4, 'Tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `ta_jenis_media`
--

CREATE TABLE IF NOT EXISTS `ta_jenis_media` (
  `id` int(1) NOT NULL,
  `nama_jenis_media` varchar(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_jenis_media`
--

INSERT INTO `ta_jenis_media` (`id`, `nama_jenis_media`) VALUES
(1, 'Media Cetak Harian'),
(2, 'Media Cetak Mingguan'),
(3, 'Media Siber');

-- --------------------------------------------------------

--
-- Table structure for table `ta_jenis_user`
--

CREATE TABLE IF NOT EXISTS `ta_jenis_user` (
  `id` int(1) NOT NULL,
  `jenis_user` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ta_jenis_user`
--

INSERT INTO `ta_jenis_user` (`id`, `jenis_user`) VALUES
(1, 'Admin'),
(2, 'Wartawan'),
(4, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `ta_jumlah_oplah`
--

CREATE TABLE IF NOT EXISTS `ta_jumlah_oplah` (
  `id` int(1) NOT NULL,
  `status` varchar(17) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_jumlah_oplah`
--

INSERT INTO `ta_jumlah_oplah` (`id`, `status`) VALUES
(1, '500 – 1000 ex'),
(2, '1001 – 2000 ex'),
(3, '2001 – 3000 ex'),
(4, '3001 – 4000 ex'),
(5, '5001 – 6000 ex'),
(6, '>6000 ex');

-- --------------------------------------------------------

--
-- Table structure for table `ta_kompetensi_wartawan`
--

CREATE TABLE IF NOT EXISTS `ta_kompetensi_wartawan` (
  `id` int(1) NOT NULL,
  `kompetensi_ukw` varchar(17) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_kompetensi_wartawan`
--

INSERT INTO `ta_kompetensi_wartawan` (`id`, `kompetensi_ukw`, `poin`) VALUES
(1, 'Sudah', 2),
(2, 'Belum', 0.5),
(3, 'Tidak Terdaftar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ta_mesin_cetak`
--

CREATE TABLE IF NOT EXISTS `ta_mesin_cetak` (
  `id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_mesin_cetak`
--

INSERT INTO `ta_mesin_cetak` (`id`, `status`) VALUES
(1, 'Ada'),
(2, 'Tidak Ada');

-- --------------------------------------------------------

--
-- Table structure for table `ta_oplah_kabupaten`
--

CREATE TABLE IF NOT EXISTS `ta_oplah_kabupaten` (
  `id` int(1) NOT NULL,
  `sebaran_oplah` varchar(20) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_oplah_kabupaten`
--

INSERT INTO `ta_oplah_kabupaten` (`id`, `sebaran_oplah`, `poin`) VALUES
(1, '4-5 Kecamatanaa', 2),
(2, '2-3 Kecamatan', 1),
(3, 's/d 1 Kecamatan', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `ta_rangking_global`
--

CREATE TABLE IF NOT EXISTS `ta_rangking_global` (
  `id` int(1) NOT NULL,
  `rangking_global` varchar(22) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_rangking_global`
--

INSERT INTO `ta_rangking_global` (`id`, `rangking_global`, `poin`) VALUES
(1, '1.500 – 1.000.000', 3),
(2, '1.000.001 – 2.000.001', 2),
(3, '>2.000.0001 ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_rangking_indonesia`
--

CREATE TABLE IF NOT EXISTS `ta_rangking_indonesia` (
  `id` int(1) NOT NULL,
  `rangking` varchar(17) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_rangking_indonesia`
--

INSERT INTO `ta_rangking_indonesia` (`id`, `rangking`, `poin`) VALUES
(1, '1 - 30.000', 3),
(2, '30.001 - 50.000', 2),
(3, '>50.0001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_sebaran_oplah`
--

CREATE TABLE IF NOT EXISTS `ta_sebaran_oplah` (
  `id` int(1) NOT NULL,
  `sebaran_oplah` varchar(20) NOT NULL,
  `id_jenis_media` int(11) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_sebaran_oplah`
--

INSERT INTO `ta_sebaran_oplah` (`id`, `sebaran_oplah`, `id_jenis_media`, `poin`) VALUES
(1, 'Nasional/Regional', 1, 3),
(2, 'Provinsi', 1, 2),
(3, 'Kabupaten', 1, 1),
(4, 'Provinsi', 2, 2),
(5, 'Kabupaten', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_st_kantor`
--

CREATE TABLE IF NOT EXISTS `ta_st_kantor` (
  `id` int(1) NOT NULL,
  `status_kantor` varchar(10) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_st_kantor`
--

INSERT INTO `ta_st_kantor` (`id`, `status_kantor`, `poin`) VALUES
(1, 'Ada', 1),
(2, 'Tidak Ada', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `ta_terdaftar_sps`
--

CREATE TABLE IF NOT EXISTS `ta_terdaftar_sps` (
  `id` int(1) NOT NULL,
  `status` varchar(17) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_terdaftar_sps`
--

INSERT INTO `ta_terdaftar_sps` (`id`, `status`, `poin`) VALUES
(1, 'Terdaftar', 1),
(2, 'Tidak Terdaftar', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `ta_tipe_berita`
--

CREATE TABLE IF NOT EXISTS `ta_tipe_berita` (
  `id` int(1) NOT NULL,
  `tipe_berita` varchar(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ta_tipe_berita`
--

INSERT INTO `ta_tipe_berita` (`id`, `tipe_berita`) VALUES
(1, 'Cetak'),
(3, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `ta_update_berita`
--

CREATE TABLE IF NOT EXISTS `ta_update_berita` (
  `id` int(1) NOT NULL,
  `update` varchar(10) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_update_berita`
--

INSERT INTO `ta_update_berita` (`id`, `update`, `poin`) VALUES
(1, 'Ada ', 1),
(2, 'Tidak Ada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ta_update_berita_6`
--

CREATE TABLE IF NOT EXISTS `ta_update_berita_6` (
  `id` int(1) NOT NULL,
  `update_berita` varchar(10) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_update_berita_6`
--

INSERT INTO `ta_update_berita_6` (`id`, `update_berita`, `poin`) VALUES
(1, 'Ada', 1),
(2, 'Tidak Ada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ta_user`
--

CREATE TABLE IF NOT EXISTS `ta_user` (
  `id` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `media` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_user` int(1) NOT NULL,
  `last_askes` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ta_user`
--

INSERT INTO `ta_user` (`id`, `nama`, `telephone`, `alamat`, `media`, `foto`, `username`, `password`, `jenis_user`, `last_askes`) VALUES
(1, 'Admin', 'lobu', 'lobu', 'a', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-06-21 09:44:38'),
(2, 'Wartawan ', 'Kalapane', 'Kalapane', 'Aquanews', '', 'wartawan', '803dc9909c4f057d1b8c88482ec800b5', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ta_usia_web`
--

CREATE TABLE IF NOT EXISTS `ta_usia_web` (
  `id` int(1) NOT NULL,
  `usiaweb` varchar(15) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_usia_web`
--

INSERT INTO `ta_usia_web` (`id`, `usiaweb`, `poin`) VALUES
(1, '1 – 3 Tahun', 1),
(2, '3,1 – 7 Tahun', 2),
(3, '>7 Tahun', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ta_wartawan_liputan`
--

CREATE TABLE IF NOT EXISTS `ta_wartawan_liputan` (
  `id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_wartawan_liputan`
--

INSERT INTO `ta_wartawan_liputan` (`id`, `status`, `poin`) VALUES
(1, 'Ada', 1),
(2, 'Tidak Ada', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ta_berita`
--
ALTER TABLE `ta_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_cakupan_media`
--
ALTER TABLE `ta_cakupan_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_expired_web`
--
ALTER TABLE `ta_expired_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_halaman_khusus`
--
ALTER TABLE `ta_halaman_khusus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_jenis_media`
--
ALTER TABLE `ta_jenis_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_jenis_user`
--
ALTER TABLE `ta_jenis_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_jumlah_oplah`
--
ALTER TABLE `ta_jumlah_oplah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_kompetensi_wartawan`
--
ALTER TABLE `ta_kompetensi_wartawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_mesin_cetak`
--
ALTER TABLE `ta_mesin_cetak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_oplah_kabupaten`
--
ALTER TABLE `ta_oplah_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_rangking_global`
--
ALTER TABLE `ta_rangking_global`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_rangking_indonesia`
--
ALTER TABLE `ta_rangking_indonesia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_sebaran_oplah`
--
ALTER TABLE `ta_sebaran_oplah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_st_kantor`
--
ALTER TABLE `ta_st_kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_terdaftar_sps`
--
ALTER TABLE `ta_terdaftar_sps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_tipe_berita`
--
ALTER TABLE `ta_tipe_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_update_berita`
--
ALTER TABLE `ta_update_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_update_berita_6`
--
ALTER TABLE `ta_update_berita_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_user`
--
ALTER TABLE `ta_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_usia_web`
--
ALTER TABLE `ta_usia_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_wartawan_liputan`
--
ALTER TABLE `ta_wartawan_liputan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ta_berita`
--
ALTER TABLE `ta_berita`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ta_cakupan_media`
--
ALTER TABLE `ta_cakupan_media`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_expired_web`
--
ALTER TABLE `ta_expired_web`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_halaman_khusus`
--
ALTER TABLE `ta_halaman_khusus`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ta_jenis_media`
--
ALTER TABLE `ta_jenis_media`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_jenis_user`
--
ALTER TABLE `ta_jenis_user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ta_jumlah_oplah`
--
ALTER TABLE `ta_jumlah_oplah`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ta_kompetensi_wartawan`
--
ALTER TABLE `ta_kompetensi_wartawan`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_mesin_cetak`
--
ALTER TABLE `ta_mesin_cetak`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_oplah_kabupaten`
--
ALTER TABLE `ta_oplah_kabupaten`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_rangking_global`
--
ALTER TABLE `ta_rangking_global`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_rangking_indonesia`
--
ALTER TABLE `ta_rangking_indonesia`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_sebaran_oplah`
--
ALTER TABLE `ta_sebaran_oplah`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ta_st_kantor`
--
ALTER TABLE `ta_st_kantor`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_terdaftar_sps`
--
ALTER TABLE `ta_terdaftar_sps`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_tipe_berita`
--
ALTER TABLE `ta_tipe_berita`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_update_berita`
--
ALTER TABLE `ta_update_berita`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_update_berita_6`
--
ALTER TABLE `ta_update_berita_6`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_user`
--
ALTER TABLE `ta_user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ta_usia_web`
--
ALTER TABLE `ta_usia_web`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ta_wartawan_liputan`
--
ALTER TABLE `ta_wartawan_liputan`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
