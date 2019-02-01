-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 07:28 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_kontak` varchar(30) NOT NULL,
  `perusahaan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `waktu_kerja` varchar(255) NOT NULL,
  `bidang_pekerjaan` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL,
  `pendidikan` text NOT NULL,
  `bidang_pendidikan` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `pengalaman` varchar(255) NOT NULL,
  `keahlian` text NOT NULL,
  `deskripsi` text NOT NULL,
  `kata_kunci` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `email`, `password`, `nama_kontak`, `perusahaan`, `alamat`, `gambar`, `posisi`, `waktu_kerja`, `bidang_pekerjaan`, `gaji`, `pendidikan`, `bidang_pendidikan`, `usia`, `pengalaman`, `keahlian`, `deskripsi`, `kata_kunci`) VALUES
(5, 'ajis@gmail.com', '12345', 'ajis', 'Ajis Club', 'Cimohong', 'nougat.jpg', 'karyawan', '08:00 - 17:00', 'Koki', 'Rp. 500.000', 'SMP, SMA, D3, D4/S1', 'Tataboga', '17 tahun - 35 tahun', '1 tahun', 'Harus pandai memasak, Jujur, Disiplin dan tepat waktu', 'Ajis Club adalah sebuah rumah makan kecil', 'Ajis Club\r\nCimohong\r\nkaryawan\r\n08:00 - 17:00\r\nKoki\r\nRp. 500.000\r\nSMP, SMA, D3, D4/S1\r\nTataboga\r\n17 tahun - 35 tahun\r\n1 tahun\r\nHarus pandai memasak, Jujur, Disiplin dan tepat waktu\r\nAjis Club adalah sebuah rumah makan kecil\r\nMembutuhkan tenaga\r\nPersyaratan\r\nPendidikan\r\nJurusan\r\nUsia\r\nPengalaman kerja\r\nPunya keahlian'),
(6, 'kopi@gmail.com', '12345', 'Anto', 'Kapal Api', 'Cimohong', 'marshmallow.jpg', 'Karyawan', '08:00 - 16:00', 'Produksi', '5000000', 'SMK', 'Otomotif, Informatika', '20 th - 30 th', '1 tahun', 'Disiplin', 'Harus patuh', 'Kapal Api\r\nCimohong\r\nKaryawan\r\n08:00 - 16:00\r\nProduksi\r\n5000000\r\nSMK\r\nOtomotif, Informatika\r\n20 th - 30 th\r\n1 tahun\r\nDisiplin\r\nHarus patuh\r\nMembutuhkan tenaga\r\nPersyaratan\r\nPendidikan\r\nJurusan\r\nUsia\r\nPengalaman kerja\r\nPunya keahlian');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` text NOT NULL,
  `pengalaman` text NOT NULL,
  `kemampuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `nama`, `email`, `password`, `tgl_lhr`, `gambar`, `no_telp`, `alamat`, `pendidikan`, `pengalaman`, `kemampuan`) VALUES
(8, 'Bagus', 'bagus@gmail.com', '12345', '1997-08-24', 'honeycomb.jpg', '083113530795', 'Jl. H. Utsman No.06 RT 04 / RW 04 Cimohong, Bulakamba Brebes', 'D4', 'Pernah bekerja di rumah makan padang ', 'Memasak, Mencuci, Menyapu'),
(10, 'Gyzzan', 'gyzzan@gmail.com', '12345', '1997-08-24', 'marshmallow.jpg', '083113530795', 'Cimohong', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
