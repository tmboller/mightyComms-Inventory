-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2019 at 12:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(13, 'Mustek', 2, ''),
(14, 'Hillstone Networks', 1, ''),
(15, 'Huawei', 1, ''),
(16, 'Alcatel Lucent Enterprise', 1, ''),
(17, 'iCrypto', 1, ''),
(18, 'Mustek', 1, '1'),
(19, 'Hillstone Networks', 1, '1'),
(20, 'Huawei', 1, '1'),
(21, 'Alcatel Lucent Enterprise', 1, '1'),
(22, 'iCrypto', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Sports ', 1, 2),
(2, 'Casual', 1, 2),
(3, 'Casual', 1, 2),
(4, 'Sport', 1, 2),
(5, 'Casual', 1, 2),
(6, 'Sport wear', 1, 2),
(7, 'Router', 2, 1),
(8, 'Fibre', 1, 1),
(9, 'Cables', 1, 1),
(10, 'Firewalls', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` double NOT NULL,
  `vat` double NOT NULL,
  `total_amount` double NOT NULL,
  `discount` double NOT NULL,
  `grand_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(1, '2016-07-15', 'John Doe', '9807867564', 2700, 351, 3051, 1000, 2051, 1000, 1051, 2, 2, 2),
(2, '2016-07-15', 'John Doe', '9808746573', 3400, 442, 3842, 500, 3342, 3342, 0, 2, 1, 2),
(3, '2016-07-16', 'John Doe', '9809876758', 3600, 468, 4068, 568, 3500, 3500, 0, 2, 1, 2),
(4, '2016-08-01', 'Indra', '19208130', 1200, 156, 1356, 1000, 356, 356, 0, 2, 1, 2),
(5, '2016-07-16', 'John Doe', '9808767689', 3600, 468, 4068, 500, 3568, 3500, 68, 3, 1, 1),
(6, '2019-11-25', 'swrf', 'rg', 130, 16.9, 146.9, 0, 146.9, 11.3, 135.6, 2, 1, 1),
(7, '2019-11-25', 'egr', 'er', 10, 1.3, 11.3, 11, 0.3, 0.3, 0, 2, 1, 1),
(8, '2019-11-25', 'dfffffffffffffff', '00000', 1000, 130, 1130, 0, 1130, 1130, 0, 2, 1, 1),
(9, '2019-11-25', 'wer', '0689653214', 34900, 4537, 39437, 0, 39437, 39437, 0, 2, 1, 1),
(10, '2019-11-25', 'werw', '4444444444', 16650, 2164.5, 18814.5, 0, 18814.5, 18814.5, 0, 2, 1, 1),
(11, '2019-11-25', 'wtgrfc ', '22222222', 25000, 3250, 28250, 15000, 13250, 13250, 0, 2, 1, 1),
(12, '2019-11-25', 'rt', '44444444', 10000, 1300, 11300, 0, 11300, 11300, 0, 2, 1, 1),
(13, '2019-11-25', 'eeeeeeeeee', '0333333', 30000, 3900, 33900, 0, 33900, 33900, 0, 2, 1, 1),
(14, '2019-11-25', 'Mitrokit', '0123698547', 50000, 6500, 56500, 0, 56500, 56500, 0, 2, 1, 1),
(15, '2019-11-27', 'Oracle', '0112156369', 500, 65, 565, 0, 565, 565, 0, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '1', '1500', '1500.00', 2),
(2, 1, 2, '1', '1200', '1200.00', 2),
(3, 2, 3, '2', '1200', '2400.00', 2),
(4, 2, 4, '1', '1000', '1000.00', 2),
(5, 3, 5, '2', '1200', '2400.00', 2),
(6, 3, 6, '1', '1200', '1200.00', 2),
(7, 4, 5, '1', '1200', '1200.00', 2),
(17, 5, 7, '2', '1200', '1200.00', 1),
(18, 5, 8, '3', '1200', '1200.00', 1),
(19, 5, 8, '1', '1200', '1200.00', 1),
(20, 6, 19, '13', '10', '130.00', 1),
(21, 7, 19, '1', '10', '10.00', 1),
(22, 8, 19, '100', '10', '1000.00', 1),
(23, 9, 22, '698', '50', '34900.00', 1),
(24, 10, 22, '333', '50', '16650.00', 1),
(25, 11, 22, '500', '50', '25000.00', 1),
(26, 12, 22, '200', '50', '10000.00', 1),
(27, 13, 22, '600', '50', '30000.00', 1),
(28, 14, 23, '1000', '50', '50000.00', 1),
(29, 15, 38, '10', '50', '500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(38, 'Conduit', '../assests/images/stock/4919319795ddcfef3bb35c.jpg', 20, 9, '2670', '50', 1, 1),
(39, 'Router', '../assests/images/stock/8752093175ddcff2862977.jpg', 19, 7, '2000', '40', 1, 1),
(40, 'Firewalls', '../assests/images/stock/18773241695ddd0103d2c95.png', 19, 10, '99', '40', 2, 1),
(41, 'Scanner', '../assests/images/stock/3443835915ddd017eebbed.jpg', 20, 9, '360', '36', 1, 1),
(42, 'Pigtails', '../assests/images/stock/9996226045ddd05c4d7ede.png', 22, 9, '2980', '50', 1, 1),
(43, 'Conduits', '../assests/images/stock/2713120075dde5d977cd3c.jpg', 20, 8, '87', '60', 2, 1),
(44, 'Dual Port Kit', '../assests/images/stock/5624313625dde6078d3f69.jpg', 19, 7, '93', '50', 2, 1),
(45, 'jjjjjj', '../assests/images/stock/18352680335ddfc0a98a4a5.png', 18, 9, '682', '50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `stockOut` varchar(255) NOT NULL,
  `collectedby` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `stockOut`, `collectedby`, `date`) VALUES
(1, 'Router', '12', 'Zi', '2019-11-19 10:37:03'),
(2, 'fIBRE', '8', 'wENZILE', '2019-11-19 11:23:20'),
(8, 'revvv', '10', 'iisac', '2019-11-19 12:08:31'),
(9, 'router', '2', 'ttt', '2019-11-19 12:07:45'),
(10, 'yyyyyyyyyyyyyyyy', '55555', 'dd', '2019-11-27 22:00:00'),
(11, 'kkkkkkkkkk', '50', 'kkkkkkkkk', '2019-11-28 22:00:00'),
(12, 'kkkkkkkkkkkkkkkkkkkkk', '55', 'kkkkkkkkkkkkkkkkkk', '2019-11-27 22:00:00'),
(13, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '22', 'Wenzile', '2019-11-26 22:00:00'),
(14, 'yyyyyyyyy', 'yyyyyyyyyyy', 'yyyyyyyyyyyy', '2019-11-27 22:00:00'),
(15, 'yyyyyyyyy', 'yyyyyyyyyyy', 'yyyyyyyyyyyy', '2019-11-27 22:00:00'),
(16, 'uuuuuuu', 'uuuuuuu', 'uuuuuuuuu', '2019-11-27 22:00:00'),
(17, 'eeeeeeeeeeeeee', 'eeeeeeeeeee', 'eeeeeeeeeeee', '2019-11-27 22:00:00'),
(18, 'Router', '50', 'Sboniso', '2019-11-27 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

DROP TABLE IF EXISTS `user2`;
CREATE TABLE IF NOT EXISTS `user2` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'admin', 'admin'),
(3, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(2, 'wenzi', '12312312', 'zizi@gmail.com'),
(3, 'Tina', '12312312', 'tina@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
