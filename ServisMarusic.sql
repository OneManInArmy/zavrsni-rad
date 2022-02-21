-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2022 at 06:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ServisMarusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ID` int(11) NOT NULL,
  `Ime` text CHARACTER SET ucs2 COLLATE ucs2_croatian_ci DEFAULT NULL,
  `Cijena` double DEFAULT NULL,
  `Proizvodac` text CHARACTER SET ucs2 COLLATE ucs2_croatian_ci DEFAULT NULL,
  `Slika` text CHARACTER SET ucs2 COLLATE ucs2_croatian_ci DEFAULT NULL,
  `Opis` text CHARACTER SET ucs2 COLLATE ucs2_croatian_ci DEFAULT NULL,
  `DatumDodano` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ID`, `Ime`, `Cijena`, `Proizvodac`, `Slika`, `Opis`, `DatumDodano`) VALUES
(1, 'QuietComfort® 2 Acoustic Noise Cancelling® headphones', 1500, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(2, 'DJM-S7', 1400, 'Pioneer', 'slike/pioneerlogo.png', 'Scratch-style 2-channel performance DJ mixer', '2022-01-28 13:41:28'),
(3, 'Z3', 1200, 'Clarion', 'slike/clarionlogo.png', 'Full Digital Sound Processor (Sound Processor/Tweeter /Commander)', '2022-01-28 13:41:28'),
(4, 'SoundTouch 30 I II', 2000, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(5, 'DJM-V10-LF', 4500, 'Pioneer', 'slike/pioneerlogo.png', 'Creative style 6-channel professional DJ mixer with long fader', '2022-01-28 13:41:28'),
(6, 'SoundTouch 120 System', 3000, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(7, 'N-Wave 360', 3600, 'Numark', 'slike/numarklogo.png', 'Powered Desktop DJ Monitors ', '2022-01-28 13:41:28'),
(8, 'SoundTouch® 10 wireless speaker', 1000, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(9, 'DJM-750MK2', 3500, 'Pioneer', 'slike/pioneerlogo.png', '4-channel performance DJ mixer', '2022-01-28 13:41:28'),
(10, 'Z25W', 850, 'Clarion', 'slike/clarionlogo.png', 'FULL DIGITAL SUBWOOFER', '2022-01-28 13:41:28'),
(11, 'SoundTouch 520 System', 2500, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(12, 'Bose Soundbar 700', 1750, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(13, 'CDJ-3000', 4600, 'Pioneer', 'slike/pioneerlogo.png', 'Professional DJ multi player', '2022-01-28 13:41:28'),
(14, 'Party Mix II', 4900, 'Numark', 'slike/numarklogo.png', 'DJ Controller with Built-In Light Show', '2022-01-28 13:41:28'),
(15, 'Bose Home Speaker 450', 1850, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(16, 'Z7', 600, 'Clarion', 'slike/clarionlogo.png', 'FULL DIGITAL SPEAKER', '2022-01-28 13:41:28'),
(17, 'Lifestyle® 135 home entertainment system', 2250, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(18, 'SoundLink Mobile Speaker II', 1500, 'Bose', 'slike/boselogo.png', '', '2022-01-28 13:41:28'),
(19, 'CDJ-2000NXS2', 4200, 'Pioneer', 'slike/pioneerlogo.png', 'Professional DJ multi player with disc drive', '2022-01-28 13:41:28'),
(20, 'CX-A5200', 7500, 'Yamaha', 'slike/yamahalogo.png', '11.2 ch AVENTAGE pre-amplifier featuring CINEMA DSP HD3 with Dolby Atmos® and DTS:X®.', '2022-01-28 13:41:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
