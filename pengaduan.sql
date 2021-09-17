-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 06:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buatproses` (IN `tgl_pengaduans` DATE, IN `niks` VARCHAR(16), IN `subjects` VARCHAR(40), IN `isi_laporans` TEXT, IN `fotos` VARCHAR(255), IN `statuss` ENUM('0','proses','selesai'))  NO SQL
INSERT INTO pengaduan(tgl_pengaduan, nik, subject, isi_laporan, foto, status) VALUES (tgl_pengaduans, niks, subjects, isi_laporans, fotos, statuss)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cekregistermas` (IN `niks` VARCHAR(30), IN `usernames` VARCHAR(30))  NO SQL
SELECT * FROM masyarakat WHERE nik=niks OR username=usernames$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cekregistermasnonik` (IN `usernames` VARCHAR(30))  NO SQL
SELECT * FROM masyarakat WHERE username=usernames$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cekregisterpet` (IN `usernames` VARCHAR(30))  NO SQL
SELECT * FROM petugas WHERE username=usernames$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `detailpengaduan` (IN `id` INT(11))  NO SQL
SELECT * FROM pengaduan WHERE id_pengaduan = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPengaduan` ()  NO SQL
SELECT * FROM pengaduan$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `historySearch` (IN `niks` VARCHAR(16), IN `keyword` VARCHAR(255))  NO SQL
SELECT * FROM pengaduan WHERE nik = niks AND subject LIKE keyword$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `historyuser` (IN `niks` VARCHAR(16))  NO SQL
SELECT * FROM pengaduan WHERE nik = niks$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inputpetugas` (IN `nama_petugass` VARCHAR(35), IN `usernames` VARCHAR(25), IN `passwords` VARCHAR(32), IN `telps` VARCHAR(13), IN `levels` ENUM('admin','petugas'))  NO SQL
INSERT INTO petugas(nama_petugas, username, password, telp, level) VALUES (nama_petugass, usernames, passwords, telps, levels)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `usernames` VARCHAR(25), IN `passwords` VARCHAR(40))  NO SQL
SELECT * FROM masyarakat WHERE username=usernames && password=passwords$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginadmin` (IN `usernames` VARCHAR(25), IN `passwords` VARCHAR(40))  NO SQL
SELECT * FROM petugas WHERE username=usernames && password=passwords$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `masyarakatAll` ()  SELECT * FROM masyarakat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanDay` (IN `niks` VARCHAR(16))  NO SQL
SELECT * FROM pengaduan WHERE tgl_pengaduan = CURDATE() AND nik=niks$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanDaypet` ()  NO SQL
SELECT * FROM pengaduan WHERE tgl_pengaduan = CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanMonth` (IN `niks` VARCHAR(16))  NO SQL
SELECT * FROM pengaduan WHERE tgl_pengaduan BETWEEN DATE_SUB(CURDATE() , INTERVAL 1 MONTH) AND CURDATE() AND nik=niks$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanMonthpet` ()  NO SQL
SELECT * FROM pengaduan WHERE tgl_pengaduan BETWEEN DATE_SUB(CURDATE() , INTERVAL 1 MONTH) AND CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanSearch` (IN `keyword` VARCHAR(255))  NO SQL
SELECT * FROM pengaduan WHERE subject LIKE keyword$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanStatus` (IN `id` INT(11))  NO SQL
UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanYear` (IN `niks` VARCHAR(16))  NO SQL
SELECT * FROM pengaduan WHERE tgl_pengaduan BETWEEN DATE_SUB(CURDATE() , INTERVAL 1 YEAR) AND CURDATE() AND nik=niks$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduanYearpet` ()  NO SQL
SELECT * FROM pengaduan WHERE tgl_pengaduan BETWEEN DATE_SUB(CURDATE() , INTERVAL 1 YEAR) AND CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `petugasAll` (IN `levels` ENUM('admin','petugas'))  NO SQL
SELECT * FROM petugas WHERE level=levels$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `petugasdetail` (IN `id` INT)  NO SQL
SELECT * FROM petugas WHERE id_petugas=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `register` (IN `nik` VARCHAR(16), IN `nama` VARCHAR(35), IN `username` VARCHAR(25), IN `password` VARCHAR(255), IN `telp` VARCHAR(13))  NO SQL
INSERT INTO masyarakat VALUES (nik, nama, username, password, telp)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `submitTanggapan` (IN `id_pengaduans` INT(11), IN `tgl_tanggapans` DATE, IN `tanggapans` TEXT, IN `id_petugass` INT(11), IN `nama_petugass` VARCHAR(35))  NO SQL
INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas, nama_petugas) VALUES (id_pengaduans, tgl_tanggapans, tanggapans, id_petugass, nama_petugass)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tanggapanData` (IN `id` INT(11))  NO SQL
SELECT * FROM tanggapan WHERE id_pengaduan = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepetugas` (IN `nama_petugass` VARCHAR(35), IN `usernames` VARCHAR(25), IN `passwords` VARCHAR(32), IN `telps` VARCHAR(13), IN `id` INT)  NO SQL
UPDATE petugas SET nama_petugas=nama_petugass, username=usernames, password=passwords, telp=telps WHERE id_petugas=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userData` (IN `niks` VARCHAR(16))  NO SQL
SELECT * FROM masyarakat WHERE nik = niks$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('1', 'Masyarakat 1', 'user1', '202cb962ac59075b964b07152d234b70', '089'),
('2', 'Masyarakat 2', 'user2', '202cb962ac59075b964b07152d234b70', '777'),
('3', 'Masyarakat 3', 'user3', '202cb962ac59075b964b07152d234b70', '888'),
('4', 'Masyarakat 4', 'user4', '202cb962ac59075b964b07152d234b70', '678'),
('5', 'Masyarakat 5', 'user5', '202cb962ac59075b964b07152d234b70', '675'),
('6', 'Masyarakat 6', 'user6', '202cb962ac59075b964b07152d234b70', '678');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `subject`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2021-03-06', '1', 'Pengaduan Pertama BANJIR', 'dbanjir ajhsdjahsjkdhakljsdsdasdw', '604343d9326c8.jpg', 'selesai'),
(2, '2021-03-06', '1', 'Pengaduan Kedua masih BANJIR', 'banjir bos ashgduhagsjhdgajhsdasdwdas', '60434482efcab.jpg', 'proses'),
(3, '2021-03-06', '2', 'Pengaduan Pertama user2 BANJIR', 'banjir inia snbdajhgsdhjagsdhagshjdgasd', '60434fe3d26c8.jpg', 'selesai'),
(4, '2021-03-08', '4', 'Pengaduan user4 pertama BANJIR', 'banjiransdkjahsjdhakhsdjkhasjdkjaskjdhasd', '6045b842a89be.jpg', '0'),
(5, '2021-03-15', '1', 'Tanah Longsor', 'tanah longsor - keluhan', '604f49a0c7627.jpg', '0'),
(6, '2021-03-16', '6', 'User6 pengaduan Tanah Longsor', 'tanhaasdasdasdasdasdasdasd', '6050385b7181f.jpg', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'andi', 'petugas1', '202cb962ac59075b964b07152d234b70', '999', 'petugas'),
(2, 'ADMIN', 'admin', '202cb962ac59075b964b07152d234b70', '666', 'admin'),
(3, 'Moki', 'petugas2', '202cb962ac59075b964b07152d234b70', '546', 'petugas'),
(4, 'Dedi', 'petugas4', '202cb962ac59075b964b07152d234b70', '678', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `nama_petugas`) VALUES
(3, 1, '2021-03-09', 'tanggapan pertama petugas1', 1, 'andi'),
(4, 1, '2021-03-09', 'tanggapan kedua petugas2', 1, 'andi'),
(8, 2, '2021-03-15', 'percobaan 1', 3, 'Moki'),
(9, 2, '2021-03-15', 'percobaan 2', 3, 'Moki'),
(10, 6, '2021-03-16', 'tanggapan ke user 6 dari petugas 1', 1, 'andi');

--
-- Triggers `tanggapan`
--
DELIMITER $$
CREATE TRIGGER `proses` AFTER INSERT ON `tanggapan` FOR EACH ROW UPDATE pengaduan SET status = 'proses' WHERE pengaduan.id_pengaduan=NEW.id_pengaduan
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `tanggapan_ibfk_3` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
