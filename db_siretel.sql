-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 11:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siretel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administrator`
--

CREATE TABLE `tbl_administrator` (
  `id` int(6) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `no_kamar` char(8) NOT NULL,
  `jenis_kamar` varchar(100) NOT NULL,
  `Ketersediaan` varchar(100) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga_kamar` int(12) NOT NULL,
  `kd_kategori` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`no_kamar`, `jenis_kamar`, `Ketersediaan`, `fasilitas`, `harga_kamar`, `kd_kategori`) VALUES
('Room-007', 'Deluxe', 'Reserved', '<p>2 Single Bed,Free Breakfast &amp; Lunch,Free Welcome Drink,Tv</p>', 175000, 'KTG002'),
('Room-006', 'Deluxe', 'Reserved', '<p>2 Single Bed,Free Breakfast &amp; Lunch,Free Welcome Drink,Tv</p>', 175000, 'KTG002'),
('Room-005', 'Standard', 'Reserved', '<p>1 Single Bed,Free Breakfast (1x),Welcome Drink,Tv</p>', 150000, 'KTG001'),
('Room-004', 'Standard', 'Available', '<p>1 Single Bed,Free Breakfast (1x),Welcome Drink,Tv</p>', 150000, 'KTG001'),
('Room-002', 'Standard', 'Available', '<p>1 Single Bed,Free Breakfast (1x),Welcome Drink,Tv</p>', 150000, 'KTG001'),
('Room-003', 'Standard', 'Available', '<p>1 Single Bed,Free Breakfast (1x),Welcome Drink,Tv</p>', 150000, 'KTG001'),
('Room-001', 'Standard', 'Reserved', '<p>1 Single Bed,Free Breakfast (1x),Welcome Drink,Tv</p>', 150000, 'KTG001'),
('Room-008', 'Deluxe', 'Available', '<p>2 Single Bed,Free Breakfast &amp; Lunch,Free Welcome Drink,Tv</p>', 175000, 'KTG002'),
('Room-009', 'Deluxe', 'Available', '<p>2 Single Bed,Free Breakfast &amp; Lunch,Free Welcome Drink,Tv</p>', 175000, 'KTG002'),
('Room-010', 'Deluxe', 'Available', '<p>2 Single Bed,Free Breakfast &amp; Lunch,Free Welcome Drink,Tv</p>', 175000, 'KTG002'),
('Room-011', 'Luxury', 'Reserved', '<p>1 Large Bed,Free Breakfast Lunch and Dinner(1x),Free Welcome Drink,Tv,Wi-Fi</p>', 200000, 'KTG003'),
('Room-012', 'Luxury', 'Available', '<p>1 Large Bed,Free Breakfast Lunch and Dinner(1x),Free Welcome Drink,Tv,Wi-Fi</p>', 200000, 'KTG003'),
('Room-013', 'Luxury', 'Available', '<p>1 Large Bed,Free Breakfast Lunch and Dinner(1x),Free Welcome Drink,Tv,Wi-Fi</p>', 200000, 'KTG003'),
('Room-014', 'Luxury', 'Available', '<p>1 Large Bed,Free Breakfast Lunch and Dinner(1x),Free Welcome Drink,Tv,Wi-Fi</p>', 200000, 'KTG003'),
('Room-015', 'Luxury', 'Available', '<p>1 Large Bed,Free Breakfast Lunch and Dinner(1x),Free Welcome Drink,Tv,Wi-Fi</p>', 200000, 'KTG003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_kamar`
--

CREATE TABLE `tbl_kategori_kamar` (
  `kd_kategori` char(6) NOT NULL,
  `jenis_kamar` varchar(150) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `harga_kamar` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_kamar`
--

INSERT INTO `tbl_kategori_kamar` (`kd_kategori`, `jenis_kamar`, `fasilitas_kamar`, `harga_kamar`) VALUES
('KTG001', 'Standard', '<p>1 Single Bed,Free Breakfast (1x),Welcome Drink,Tv</p>', 150000),
('KTG002', 'Deluxe', '<p>2 Single Bed,Free Breakfast &amp; Lunch,Free Welcome Drink,Tv</p>', 175000),
('KTG003', 'Luxury', '<p>1 Large Bed,Free Breakfast Lunch and Dinner(1x),Free Welcome Drink,Tv,Wi-Fi</p>', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_stok`
--

CREATE TABLE `tbl_kategori_stok` (
  `kd_stok` char(6) NOT NULL,
  `nama_stok` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_stok`
--

INSERT INTO `tbl_kategori_stok` (`kd_stok`, `nama_stok`) VALUES
('STK001', 'Available'),
('STK002', ' Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservasi_kamar`
--

CREATE TABLE `tbl_reservasi_kamar` (
  `no_reservasi` char(8) NOT NULL,
  `no_kamar` char(8) NOT NULL,
  `jenis_kamar` varchar(150) NOT NULL,
  `ketersediaan` varchar(100) NOT NULL,
  `harga_kamar` int(12) NOT NULL,
  `nama_reservasi` varchar(150) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `tgl_cek_in` date NOT NULL,
  `tgl_cek_out` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservasi_kamar`
--

INSERT INTO `tbl_reservasi_kamar` (`no_reservasi`, `no_kamar`, `jenis_kamar`, `ketersediaan`, `harga_kamar`, `nama_reservasi`, `no_identitas`, `alamat`, `no_telepon`, `tgl_cek_in`, `tgl_cek_out`) VALUES
('Rsvd-001', 'Room-007', 'Deluxe', 'Reserved', 175000, 'Eri Pratama', '6472040905900001', 'Samarinda Kalimantan Timur', '085250046667', '2018-08-15', '2018-08-22'),
('Rsvd-002', 'Room-005', 'Standard', 'Reserved', 150000, 'Nurul Arifin', '321087650004', 'Aceh Langsa', '085743210996', '2018-08-15', '2018-08-19'),
('Rsvd-003', 'Room-011', 'Luxury', 'Reserved', 200000, 'Fanessa Ayu', '6329098700003', 'Malang Jawa Timur', '085612345678', '2018-08-15', '2018-08-18'),
('Rsvd-004', 'Room-001', 'Standard', 'Reserved', 150000, 'Dewi Supriyo', '3248765900001', 'Cimahi Bogor', '08114567956', '2018-08-15', '2018-08-21'),
('Rsvd-005', 'Room-006', 'Deluxe', 'Reserved', 175000, 'Dini anggarista Mustika', '102987650002', 'Ubud Bali', '087512340988', '2018-08-16', '2018-08-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_administrator`
--
ALTER TABLE `tbl_administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `tbl_kategori_kamar`
--
ALTER TABLE `tbl_kategori_kamar`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `tbl_kategori_stok`
--
ALTER TABLE `tbl_kategori_stok`
  ADD PRIMARY KEY (`kd_stok`);

--
-- Indexes for table `tbl_reservasi_kamar`
--
ALTER TABLE `tbl_reservasi_kamar`
  ADD PRIMARY KEY (`no_reservasi`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_administrator`
--
ALTER TABLE `tbl_administrator`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
