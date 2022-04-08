-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 01:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php1702`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Free Shirt '),
(2, 'Bag'),
(3, 'Shoe'),
(4, 'Fancy Jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `voucherid` varchar(20) NOT NULL,
  `orderdate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_name`, `phone`, `email`, `address`, `voucherid`, `orderdate`, `deliverydate`, `status`) VALUES
(3, 'Admin', '10324', 'aasd@gmail.com', ';sadl;as', '20170809000001', '2017-08-09', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `voucherid` varchar(20) NOT NULL,
  `itemid` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `voucherid`, `itemid`, `qty`) VALUES
(1, '2147483647', 5, 1),
(2, '20170809000001', 4, 1),
(3, '20170809000001', 5, 1),
(4, '20170809000001', 3, 1),
(5, '20170809000001', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `categoryid` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `photo`, `description`, `categoryid`, `date`) VALUES
(3, 'Colorfulbag', 15000, 'image/img7.jpg', 'Best Choice', 2, '2017-07-20'),
(4, 'Couple', 1200, 'image/4.jpg', '', 1, '2017-07-20'),
(5, 'Style Shoe', 15000, 'image/img6.jpg', '', 3, '2017-07-24'),
(6, 'Necknace', 20000, 'image/img3.jpg', '', 4, '2017-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone`, `photo`, `lastmodified`) VALUES
(1, 'Mg Mg', 'mgmg@gmail.com', '09972566456', 'image/1.jpg', '2017-07-13 12:20:54'),
(2, 'Ma Ma', 'mama@gmail.com', '0979755665', 'image/Koala.jpg', '2017-07-20 11:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'roota', '0940268'),
(3, 'root', '09402689005');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
