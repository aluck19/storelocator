-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 05:58 PM
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
  `name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `datetime`) VALUES
(1, 'laptop', '0000-00-00 00:00:00'),
(2, 'smartphone', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_hits`
--

CREATE TABLE IF NOT EXISTS `post_hits` (
`id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `total_hits` bigint(20) NOT NULL,
  `last_hit_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_hits`
--

INSERT INTO `post_hits` (`id`, `item_name`, `brand_name`, `district_name`, `url`, `total_hits`, `last_hit_date`) VALUES
(12, 'Smartphone', 'Xiaomi', 'Jhapa', 'http://localhost/storelocator/index.php?itemName=Smartphone&amp;brandName=Xiaomi&amp;district=Jhapa', 24, '2017-02-12 17:47:43'),
(13, 'Smartphone', 'Xiaomi', 'Kathmandu', 'http://localhost/storelocator/index.php?itemName=Smartphone&amp;brandName=Xiaomi&amp;district=Kathmandu', 7, '2017-01-27 16:55:30'),
(14, 'Smartphone', 'Xiaomi', 'Okhaldhunga', 'http://localhost/storelocator/index.php?itemName=Smartphone&amp;brandName=Xiaomi&amp;district=Okhaldhunga', 11, '2017-01-21 21:01:45'),
(15, 'Laptop', 'Msi', 'Kathmandu', 'http://localhost/storelocator/index.php?itemName=Laptop&amp;brandName=Msi&amp;district=Kathmandu', 1, '2017-02-12 17:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `store_id`, `topic`, `r_name`, `email`, `message`, `datetime`) VALUES
(1, 13, 'Phone number incorrect', 'Test', 'Test@gmail.com', 'test', '2017-01-25 14:37:08'),
(2, 7, 'a', 'Abhishek Gupta', 'abhishek_luck19@hotmail.com', 'aa', '2017-01-27 20:51:29'),
(3, 10, 'a', 'Abhishek Gupta', 'abhishek_luck19@hotmail.com', 'aaaa', '2017-02-12 17:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lon` varchar(20) DEFAULT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `type`, `landline`, `mobile`, `address`, `website`, `district`, `lat`, `lon`, `brand_id`) VALUES
(1, 'Sathi Enterprises	', '', '023-545903	', '9807921202', 'Birtamode', '', 'Jhapa', '0', '0', 2),
(2, 'A 2 Z Mobile Care	', '', '021-530522	', '98027-26026', 'Biratnagar', '', 'Morang', '0', '0', 2),
(3, 'New Pandey Business Centre	', '', '025-586898	', '98421-77958', 'Ithari', '', 'Sunsari', '0', '0', 2),
(4, 'Jamtech Electronics	', '', '025-520880	', '9808486417', 'Dharan', '', 'Sunsari', '0', '0', 2),
(5, 'Kasyap Mobile	', '', '035-421354	', '9852830642', 'Gaighat', '', 'Udayapur', '0', '0', 2),
(6, 'New Raju Enterprises	', '', '033-540180	', '9801500750', 'Golbazar', '', 'Siraha', '0', '0', 2),
(7, 'S&S Engineering	', '', '', '9817000582', 'Damak', '', 'Jhapa', '0', '0', 2),
(8, 'Niyukti Enterprises	', '', '', '9852840666', '', '', 'Okhaldhunga', '0', '0', 2),
(10, 'Ocean Computer Pvt. Ltd. ', '', '01-4266795, 01-4254444 ', '', '1st Floor, JDA Office Complex, No.:206 Baghdurbar, In Front of China Town Shopping Mall', 'http://www.oceanktm.com/', 'Kathmandu', '27.6980851', '85.3066674', 3),
(11, 'Samsung Mobile Plaza (IMS)', '', '01-4428378, 01-4441571', '', 'Hotel Royal Singi Arcade, Kamaladi', 'http://www.ims-np.com/', 'Kathmandu', '27.7100844', '85.2491817', 27),
(13, 'Vatsal Impex Pvt. Ltd.', 'distributor', '01-4101530', '', 'Panchayan Marg,\r\nThapathali', 'http://xiaominepal.com.np/', 'Kathmandu', '27.6887654', '85.2518063', 2);

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
-- Indexes for table `post_hits`
--
ALTER TABLE `post_hits`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
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
-- AUTO_INCREMENT for table `post_hits`
--
ALTER TABLE `post_hits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
