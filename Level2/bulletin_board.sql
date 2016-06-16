-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 05:36 AM
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
  `title` varchar(32) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_alive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulletin_board`
--

INSERT INTO `bulletin_board` (`id`, `title`, `body`, `created_at`, `is_alive`) VALUES
(1, 'Ramadhan Tiba', 'aduh aku uda ga sabar nih yay', '2016-06-09 03:36:31', 1),
(3, 'khalil taik', 'kerjanya tinder mulu', '2016-06-09 02:56:09', 1),
(4, 'mifthah mantap', 'timedorordweo we', '2016-06-09 01:52:04', 0),
(5, 'ifoierfeoqfqfqwq', 'iergoieogrgsgr', '2016-06-09 01:52:08', 0),
(6, 'qdqwdqhvrjv', 'ewufweifewfewfv', '2016-06-09 01:52:10', 0),
(7, 'dqwfrrwtrtrw', 'dqwdqgwdqwqwggbtrh', '2016-06-07 07:34:23', 1),
(8, 'Hari Pertama Puasa', 'Selamat menunaikan ibadah puasa bagi yang menjalankannya', '2016-06-07 07:34:23', 1),
(9, 'ndqowdiqwdjoi', 'oijoiojwofooefe', '2016-06-07 07:34:23', 1),
(10, 'qwiqwoidqwdoqwdoiqw', 'wiojfieowjfowefwf', '2016-06-07 07:34:23', 1),
(11, 'hbewshabhjfajfawfawfiowjf', 'nwefnwefiwwefwefwefwefew', '2016-06-08 05:48:38', 0),
(12, 'kjewfknkafkafa', 'jewnfkafkanefak', '2016-06-07 07:34:23', 1),
(13, 'ewiewijoqmdoqk', 'owefijewofwefowe', '2016-06-07 07:34:23', 1),
(14, 'abceioqo2wo', 'ieoqdiwqoq', '2016-06-07 07:34:23', 1),
(15, 'Hari Kedua Puasa', 'Selamat berpuasa bagi yang menjalankannya!', '2016-06-07 07:34:23', 1),
(16, 'Last Try on Challenge 1', 'Wish me luck with this challenge. Hopefully I will pass.', '2016-06-07 07:34:23', 1),
(17, 'awqkdqwdwq', 'aWDADWQDQW', '2016-06-07 07:34:23', 1),
(18, 'ksamdkadmlasd', 'skllodwewmm', '2016-06-07 07:34:23', 1),
(19, 'ijfoewifjwoejfwiejojf', 'OJOIWJEOJWOEFWEFWE', '2016-06-07 07:34:23', 1),
(20, 'ojewoijodqwdq', 'dqwdwiqdwiqdjwqiodqojo', '2016-06-07 07:34:23', 1),
(21, 'kdmqwdqoij', 'ojwefoewfewf', '2016-06-07 07:34:23', 1),
(22, 'dwqkdpoqwkdpqwdkqp', 'pkpowepfwfwe', '2016-06-07 07:34:23', 1),
(23, 'ejiowjfiojofojo', 'jooojoqjfoqofqwfwq', '2016-06-07 07:34:23', 1),
(24, 'wqndoqjdqdjqodoqdoqo', 'iejwifweofweiwejfwefe', '2016-06-07 07:34:23', 1),
(25, 'ioqwjidwqejqowejo', 'jwqojoqwjeoqwjoieq', '2016-06-07 07:34:23', 1),
(26, 'dqjwoidqjo', 'ijqodqoidjqo', '2016-06-09 01:19:18', 0),
(27, 'iqwjoidqowjdoqwjfjqoj', 'ojofjofewofoewfo', '2016-06-07 07:34:23', 1),
(28, 'ejiofjfoiewjfwofwoifjoi', 'jojofjoewjofwoiefo', '2016-06-07 07:34:23', 1),
(29, 'ewifjoewifoiewjofiwei', 'jfeoqwifoiefoiewofjo', '2016-06-07 07:34:23', 1),
(30, 'efiewjofwejofwjfoiewj', 'wejoifweofoiewfewjfo', '2016-06-07 07:34:23', 1),
(31, 'qjfofjoqjofqofoqfo', 'fjoewiofjowifiwjefwejf', '2016-06-08 02:59:50', 0),
(32, 'ejofwijfoiewjfoweofewof', 'wefioewjfoiweofjweiofeowif', '2016-06-07 07:34:23', 1),
(33, 'foiwejfioewijfweofjweojf', 'eoifjioefjewoifwjfowejfowe', '2016-06-07 07:34:23', 1),
(34, 'jwifqofoqnfqnfon', 'oieoioifeofoqjefo', '2016-06-07 07:34:23', 1),
(35, 'fjwoiefjoiqeafioeqjfoq', 'jfqofqoifqoifqoaf', '2016-06-07 07:34:23', 1),
(36, 'owioiewfoiewfoewjf', 'oqifoiwqfoqfoqowoq', '2016-06-07 07:40:10', 0),
(37, 'foiejfoefqoiwfjoiqwjf', 'fqifjqowfoiqfjqwof', '2016-06-07 07:34:23', 1),
(38, 'qefnoqjfqjfpqjeifiqe', 'fqjofjqoijfqwjfwqjpf', '2016-06-07 07:34:23', 1),
(39, 'doiewfoiqjifjqwfjqjfq', 'ofqejofjqoiwfjiqwjfoqjoqw', '2016-06-07 07:34:23', 1),
(40, 'oijewoijfoiqejfoqwjofqovn', 'fqoifjoiqawncocnoaono', '2016-06-07 07:34:23', 1),
(41, 'fjqeiofjqoeicnnaocnoao', 'qoifqiocoanckqnocq', '2016-06-07 07:34:23', 1),
(42, 'iqojfioacn aqocnfoqancfo', 'fnqonofncanco', '2016-06-07 07:34:23', 1),
(43, 'qwoafcnonanfcoqnaofnqoano', 'nonfofnwjnoqwcnc', '2016-06-07 07:34:23', 1),
(44, 'ncfoqwncosnconco', 'nfcoaqncocncoc oqw', '2016-06-07 07:42:31', 0),
(45, 'oqwkopdkqdqwkdp', 'opkpewofkwpefpewkpf', '2016-06-07 07:34:23', 1),
(46, 'efowpekfpowekfpwefkp', 'kkwekpewkfpkewfkewfewf', '2016-06-07 07:36:18', 0),
(47, 'fweifoweifioaejfoao', 'joijowejfoewjojweofj', '2016-06-07 07:34:23', 1),
(48, 'ojfweijfowejfoiewjofjo', 'ojowejofwefjweofjo', '2016-06-07 07:34:23', 1),
(49, 'weiojveiowjvowejoeoifcow', 'weoijfoewijfoewfoewjfo', '2016-06-07 07:34:23', 1),
(50, 'dqwoijdoiqwjdoqwiodjqwodj', 'jfwejfewjfowefewofj', '2016-06-08 03:09:58', 0),
(51, 'ofwiejfoewfoewjofwjeofweo', 'oijfewoijfoewjfoewjfoew', '2016-06-08 02:37:57', 0),
(52, 'oiqwjdioqoidqiowjdo', 'ojeowiejofweofjweoif', '2016-06-07 07:50:38', 0),
(53, 'oifwejfoiewjofwjeofjo', 'oijojfoewjofjweofew', '2016-06-07 07:34:23', 1),
(54, 'iodqwjdqwodqjdowqjdo', 'oijoijoijfoewjowojowejfowejfoewjojweocwoefewewjfojewofeojfqojfoqjoovnsjrn onoenvoecjeowcoecoenao dqdq dqidjoqwdoqnoiqnawonoq aeovqec oqwbonqo ol olqcoqncq oqudoq wodo qwqd ', '2016-06-07 07:47:00', 0),
(55, 'iqwoaodjqjdoqjwodjqwjdoqwij', 'ojoewoiefjoweifewfewfwf', '2016-06-08 09:32:48', 0),
(56, 'qwndqwmdwqidqodqdqwd', 'oiioijojnjnnonnonononnj', '2016-06-07 09:03:39', 0),
(57, 'dqwjidjqwdiwqjdoiqwjdjqodjoqjdo', 'jioewjofejoifoqfjoqef', '2016-06-08 03:29:41', 0),
(58, 'dqwjidjqwdiwqjdoiqwjdjqodjoqjdo', 'jioewjofejoifoqfjoqef', '2016-06-08 03:29:53', 0),
(59, 'koicjfiowejfioewjoifjewojfow', 'jojoiewjiogvjowjfewgw', '2016-06-08 03:30:08', 0),
(60, 'qowdkqodqpwkpdoqwkdpqwkp', 'kpockwfpkfpwekopfwefew', '2016-06-08 03:31:58', 1),
(61, 'widjqidiqwjdpqwpidwqidpj', 'iefjpiqefjpqijfpqjfqefqe', '2016-06-08 03:44:52', 1),
(62, 'iwqdjiqwdiqwjpdqwjp', 'jpiqdwjpdqjpjqpdpoqwkdwqd', '2016-06-08 03:44:59', 1),
(63, 'dqjwipdqpdqpwodopwqk', 'podqpkpqowkdpqwdwqdqw', '2016-06-08 03:45:10', 1),
(64, 'qwdjpwqdjpwqpodwqkdkqp', 'opqopkpqdopkpdqwdwqdq', '2016-06-08 03:45:18', 1),
(65, 'diqwdqodkqp', 'kwqdmkqwqkdmlq', '2016-06-08 05:16:07', 1),
(66, 'qkwpoqokpqwkdpqw', 'kewpkfopewkpfwefew', '2016-06-08 06:51:53', 1),
(67, 'kmfqwmdewodmo', 'oikfopwepfewfewf', '2016-06-08 06:52:08', 1),
(68, 'qwkdqwdwqkldqwl', 'klcmewlmlfewfewfwfw', '2016-06-08 07:30:19', 1),
(69, 'Akhirnya Lulus', 'Hari ini hari Kamis 9 Juni barusan lulus level 1 nih. YAY!', '2016-06-09 01:44:37', 1),
(70, 'Hari Keempat Puasa', 'Khalil da 2 hari ga sahur. Nice!', '2016-06-09 01:50:22', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
