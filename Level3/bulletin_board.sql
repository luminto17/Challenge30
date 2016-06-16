-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 07:35 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulletin_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board`
--

CREATE TABLE `bulletin_board` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_alive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulletin_board`
--

INSERT INTO `bulletin_board` (`id`, `title`, `body`, `created_at`, `updated_at`, `is_alive`) VALUES
(1, '14 Juni 2016', 'Makin banyak pinalti. da kyk ronaldo', '2016-06-14 03:21:06', '0000-00-00 00:00:00', 0),
(2, 'PT Timedoor Indonesia', '<script>alert("HALO!")</script>', '2016-06-14 02:46:29', '2016-06-14 05:41:03', 1),
(3, 'Hari Pertama Puasa', 'Makan di Jaya', '2016-06-14 03:20:54', '0000-00-00 00:00:00', 0),
(4, 'Hari Ketiga Puasa', 'Makan di Waroeng Kampoeng', '2016-06-14 02:36:30', '2016-06-14 05:47:48', 1),
(5, 'Hari Ketuju Puasa', 'Makan di Tukad Citarum', '2016-06-14 02:36:47', '0000-00-00 00:00:00', 1),
(6, 'Hari Kelima Puasa', 'Kangen Chinese Food tapi mahal', '2016-06-14 02:36:59', '0000-00-00 00:00:00', 1),
(7, '13 Juni 2016', 'Kemarin nonton Now You See Me 2', '2016-06-14 02:37:18', '0000-00-00 00:00:00', 1),
(8, '13 Juni 2016', 'Main basket ma pengen main danz base', '2016-06-14 02:37:32', '0000-00-00 00:00:00', 1),
(9, '12 Juni 2016', 'Ke Dreamland dan hampir ditelan ombak :(', '2016-06-14 02:38:08', '0000-00-00 00:00:00', 1),
(10, '12 Juni 2016', 'Hari sabtu yang melelahkan~', '2016-06-14 02:38:18', '2016-06-15 03:57:33', 1),
(11, '11 Juni 2016', 'Hari Jumat yang menyenangkan hahah', '2016-06-14 02:38:29', '2016-06-15 01:34:19', 1),
(12, 'The Conjuring 2', 'Pengen nonton tapi gk rame jadi ga berani', '2016-06-14 05:08:02', '2016-06-15 01:30:20', 1),
(13, 'Cewe Cantik IF', 'Catherine Pricilla Sugandha', '2016-06-14 03:56:33', '2016-06-14 09:15:59', 1),
(17, 'Hari Selasa', 'GGWP gue merasa ganteng YAY ;)', '2016-06-14 06:18:00', '2016-06-14 06:18:58', 1),
(19, 'Hari Selasa', 'GGWP gue merasa ganteng YAY ;) HOHO', '2016-06-14 07:45:09', '2016-06-14 07:53:09', 1),
(20, 'abcdefghij', 'klmnopqrstuvwxyz', '2016-06-14 08:32:35', '2016-06-15 05:11:17', 1),
(21, 'Rabu, 15 Juni 2016', 'Isi T-cash biar bisa bukber~', '2016-06-15 05:12:10', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
