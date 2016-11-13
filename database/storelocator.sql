-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 02:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storelocator`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `item_id`) VALUES
(1, 'dell', 1),
(2, 'xiaomi', 2),
(3, 'msi', 1),
(4, 'hp', 1),
(5, 'toshiba', 1),
(6, 'lava', 2),
(7, 'colors', 2),
(8, 'oppo', 2),
(9, 'obi', 2),
(10, 'gionee', 2),
(11, 'lenovo', 2),
(12, 'lg', 2),
(13, 'cg', 2),
(14, 'panasonic', 2),
(15, 'huawei', 2),
(16, 'intex', 2),
(17, 'zte', 2),
(18, 'acer', 1),
(19, 'mac', 1),
(20, 'level51', 1),
(21, 'asus', 1),
(22, 'lenovo', 1),
(23, 'infocus', 2),
(24, 'karbonn', 2),
(25, 'micromax', 2),
(26, 'sony', 2),
(27, 'samsung', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `landline` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `landline`, `mobile`, `address`, `district`, `brand_id`) VALUES
(1, 'Sathi Enterprises	', '023-545903	', '9807921202', '', 'Birtamode	', 2),
(2, 'A 2 Z Mobile Care	', '021-530522	', '98027-26026', '', 'Biratnagar	', 2),
(3, 'New Pandey Business Centre	', '025-586898	', '98421-77958', '', 'Itahari', 2),
(4, 'Jamtech Electronics	', '025-520880	', '9808486417', '', 'Dharan	', 2),
(5, 'Kasyap Mobile	', '035-421354	', '9852830642', '', 'Gaighat	', 2),
(6, 'New Raju Enterprises	', '033-540180	', '9801500750', '', 'Golbazar	', 2),
(7, 'S&S Engineering	', '', '9817000582', '', 'Damak	', 2),
(8, 'Niyukti Enterprises	', '', '9852840666', '', 'Okhaldhunga', 2),
(9, 'Anukriti Business House	', '01-4245283 / 4263303	', '9801034793', 'NewRoad', 'Kathmandu', 2),
(10, 'Ocean Computer Pvt. Ltd. ', '4266795 ', '977-01-4254444', '1st Floor, JDA Office Complex, No.:206 Baghdurbar, In Front of China Town Shopping Mall', 'Kathmandu', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
