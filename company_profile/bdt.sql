-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdt`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteProduct` (IN `produk` INT)   BEGIN
    DELETE FROM produk WHERE id = produk;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `Hitung` () RETURNS INT(11)  BEGIN
    DECLARE produkHit INT;
    SELECT COUNT(*) INTO produkHit FROM produk;
    RETURN produkHit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(36) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `keterangan`, `nama`, `timestamp`) VALUES
(5, 'Data dengan ID 10 ditambahkan', '', '2024-01-03 07:25:50'),
(6, 'Data dengan ID 11 ditambahkan', '', '2024-01-03 07:35:39'),
(7, 'Data dengan ID 11 diubah', '', '2024-01-03 07:35:58'),
(8, 'Data dengan ID 11 dihapus', '', '2024-01-03 07:36:08'),
(9, 'Data dengan ID 12 ditambahkan', '', '2024-01-03 07:48:04'),
(10, 'Data dengan ID 13 ditambahkan', '', '2024-01-03 07:48:20'),
(11, 'Data dengan ID 13 diubah', '', '2024-01-03 08:02:03'),
(12, 'Data dengan ID 14 ditambahkan', '', '2024-01-04 04:07:02'),
(13, 'Data dengan ID 15 ditambahkan', '', '2024-01-06 09:30:47'),
(14, 'Data dengan ID 12 dihapus', '', '2024-01-06 09:30:51'),
(15, 'Data dengan ID 15 dihapus', '', '2024-01-07 12:32:51'),
(16, 'Data dengan ID 16 ditambahkan', '', '2024-01-07 12:33:09'),
(17, 'Data dengan ID 16 diubah', '', '2024-01-08 07:30:55'),
(18, 'Data dengan ID 16 dihapus', '', '2024-01-08 07:31:25'),
(19, 'Data dengan ID 14 diubah', '', '2024-01-08 07:51:38'),
(20, 'Data dengan ID 17 ditambahkan', '', '2024-01-08 07:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(26) NOT NULL,
  `stok` int(4) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `stok`, `timestamp`) VALUES
(13, 'sks', 60, '2024-01-03 07:48:20'),
(14, 'M416', 800, '2024-01-04 04:07:02'),
(17, 'UMP', 120, '2024-01-08 07:55:16');

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `after_produk_delete` AFTER DELETE ON `produk` FOR EACH ROW BEGIN
    INSERT INTO laporan (keterangan) VALUES (CONCAT('Data dengan ID ', OLD.id, ' dihapus'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_produk_insert` AFTER INSERT ON `produk` FOR EACH ROW BEGIN
    INSERT INTO laporan (keterangan) VALUES (CONCAT('Data dengan ID ', NEW.id, ' ditambahkan'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_produk_update` AFTER UPDATE ON `produk` FOR EACH ROW BEGIN
    INSERT INTO laporan (keterangan) VALUES (CONCAT('Data dengan ID ', NEW.id, ' diubah'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
