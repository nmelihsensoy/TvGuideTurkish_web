-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 19, 2022 at 12:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_url` varchar(225) NOT NULL,
  `site_tema` varchar(225) NOT NULL,
  `site_baslik` varchar(225) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyw` text NOT NULL,
  `admin_kadi` varchar(225) NOT NULL,
  `admin_sifre` varchar(225) NOT NULL,
  `site_durum` int NOT NULL,
  `site_footer` varchar(225) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`site_url`, `site_tema`, `site_baslik`, `site_desc`, `site_keyw`, `admin_kadi`, `admin_sifre`, `site_durum`, `site_footer`, `id`) VALUES
('http://localhost:8001', 'default', 'Tv Yayın Rehberi', 'Televizyonların günlük yayın akış bilgilerini ve şuanda ne olduğunu öğrenebileceğiniz tv yayın rehberi, tv rehberi, tvde ne var', 'yayın akışları, tv yayın akışı, tv ne izlesem, tv şuan, tv şimdi, tv bugün, tv rehberi, televizyon, diziler, programlar, KANAL D, STAR TV, SHOW TV, ATV, TRT1, CNN TÜRK, NTV, CNBC-E, FOX TV, TV8, E2, TV2, KANALTÜRK, SAMANYOLU TV, NATIONAL GEOGRAPHIC, DISCOVERY CHANNEL, NTV SPOR, KANAL 7', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Copyright © 2014- Tv Yayın Rehberi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bot`
--

CREATE TABLE `bot` (
  `bot_id` int NOT NULL,
  `bot_tarih` varchar(225) NOT NULL,
  `bot_tarih_iki` varchar(225) NOT NULL,
  `bot_tarih_uc` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bot`
--

INSERT INTO `bot` (`bot_id`, `bot_tarih`, `bot_tarih_iki`, `bot_tarih_uc`) VALUES
(1, '19.03.2016', '20.03.2016', '21.03.2016');

-- --------------------------------------------------------

--
-- Table structure for table `kanallar`
--

CREATE TABLE `kanallar` (
  `kanal_id` int NOT NULL,
  `kanal_bot_id` int NOT NULL,
  `kanal_kisa_baslik` varchar(225) NOT NULL,
  `kanal_baslik` varchar(225) NOT NULL,
  `kanal_logo` varchar(225) NOT NULL,
  `kanal_link` varchar(225) NOT NULL,
  `kanal_hit` int NOT NULL,
  `kanal_bot_link` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kanallar`
--

INSERT INTO `kanallar` (`kanal_id`, `kanal_bot_id`, `kanal_kisa_baslik`, `kanal_baslik`, `kanal_logo`, `kanal_link`, `kanal_hit`, `kanal_bot_link`) VALUES
(1, 0, '', 'Kanal D', 'kanal-d.jpg', 'kanal-d', 5000, '94/0/KANAL-D'),
(2, 1, '', 'Star Tv', 'star-tv.jpg', 'star-tv', 5241, '90/2/STAR-TV'),
(3, 2, '', 'Show Tv', 'show-tv.jpg', 'show-tv', 5443, '92/3/SHOW-TV'),
(4, 3, '', 'Atv', 'atv.jpg', 'atv', 5756, '83/4/ATV'),
(5, 4, '', 'Trt 1', 'trt1.jpg', 'trt-1', 4882, '15/5/TRT-1'),
(6, 5, '', 'Cnn Türk', 'cnn-turk.jpg', 'cnn-turk', 4182, '20/1/CNN-TÜRK'),
(7, 6, '', 'Ntv', 'ntv.jpg', 'ntv', 3989, '21/6/NTV'),
(8, 8, '', 'Fox Tv', 'fox.jpg', 'fox-tv', 4915, '87/8/FOX'),
(9, 9, '', 'Tv8', 'tv8.jpg', 'tv8', 5960, '24/9/TV8'),
(10, 11, '', 'Tv2', 'tv2.jpg', 'tv2', 5373, '132/16/TV2'),
(12, 14, 'Nat Geo', 'National Geographic', 'national-geographic.jpg', 'national-geographic', 5288, '126/35/NATIONAL-GEOGRAPHIC-CHANNEL'),
(13, 15, '', 'Ntv Spor', 'ntv-spor.jpg', 'ntv-spor', 4588, '127/33/NTV-SPOR'),
(14, 16, 'Discovery', 'Discovery Channel', 'discovery-channel.jpg', 'discovery-channel', 5349, '98/24/DISCOVERY-CHANNEL'),
(15, 17, '', 'Kanal 7', 'kanal7.jpg', 'kanal-7', 4855, '95/14/KANAL-7'),
(16, 7, '', 'Cnbc-E', 'cnbc-e.jpg', 'cnbc-e', 200, '85/8/CNBC-e'),
(17, 10, '', 'E2', 'e2.jpg', 'e2', 201, '99/0/e2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`bot_id`);

--
-- Indexes for table `kanallar`
--
ALTER TABLE `kanallar`
  ADD PRIMARY KEY (`kanal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanallar`
--
ALTER TABLE `kanallar`
  MODIFY `kanal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
