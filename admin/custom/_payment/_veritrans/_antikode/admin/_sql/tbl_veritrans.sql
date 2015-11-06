-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2015 at 06:47 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anti_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_veritrans`
--

CREATE TABLE IF NOT EXISTS `tbl_veritrans` (
`id` int(11) NOT NULL,
  `live_code` text NOT NULL,
  `sandbox_code` text NOT NULL,
  `environment` int(11) NOT NULL,
  `_3dsecure` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_veritrans`
--

INSERT INTO `tbl_veritrans` (`id`, `live_code`, `sandbox_code`, `environment`, `_3dsecure`, `status`) VALUES
(1, '88dd5ab2-218e-4b2f-8f0d-09e2e5275068', '2d7b85ab-f67a-43fd-9a85-95ffc9ef7f22', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_veritrans`
--
ALTER TABLE `tbl_veritrans`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_veritrans`
--
ALTER TABLE `tbl_veritrans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
