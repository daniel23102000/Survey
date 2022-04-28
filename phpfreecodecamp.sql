-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 10:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpfreecodecamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'daniel', '123'),
(2, 'wawan', '$2y$10$l4UD6EUEaDApRyfpzd8SIuY2e2BimrUa3XlxcUPfCsr94gHlB6KZm');

-- --------------------------------------------------------

--
-- Table structure for table `surveyform`
--

CREATE TABLE `surveyform` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `yourcurrentrole` varchar(100) NOT NULL,
  `recommendfreecodecamp` varchar(100) NOT NULL,
  `yourfavoritefeatureoffreecodecamp` varchar(100) NOT NULL,
  `improved` varchar(100) NOT NULL,
  `commentsorsuggestions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nrp` char(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usia` char(100) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `keluhan` varchar(1000) NOT NULL,
  `rekomendasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nama`, `nrp`, `email`, `usia`, `profesi`, `keluhan`, `rekomendasi`) VALUES
(1, 'Daniel Rurubua', '3216212310000009', 'danielraul4625@gmail.com', '21', 'pelajar-atau-mahasiswa', 'disini terjadi masalah pendidikan di kecamatan ini, mohon bantuannya!!!!', 'puas'),
(5, 'Ucu', '1273885950', 'yusuftallulembang@gmail.com', '51', 'pekerja', 'kurang duit', 'puas'),
(7, 'Lukman Mansur', '000000000', 'lukman@gmail.com', '61', 'lainnya', 'disini rakyat sengsara, Pak. mohon keadilannya, Pak', 'tidak puas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveyform`
--
ALTER TABLE `surveyform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surveyform`
--
ALTER TABLE `surveyform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
