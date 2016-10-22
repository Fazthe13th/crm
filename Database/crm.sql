-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql106.byethost7.com
-- Generation Time: Oct 22, 2016 at 02:23 AM
-- Server version: 5.6.31-77.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b7_18787294_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mail`
--

CREATE TABLE IF NOT EXISTS `admin_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `head` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `maildate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin_mail`
--

INSERT INTO `admin_mail` (`id`, `user_id`, `head`, `body`, `maildate`) VALUES
(1, 4, 'Welcome to our shop', 'This is our shop where you will finds all the things you like', '2016-09-15 02:09:19'),
(4, 2, 'Admin mail', 'Admin mail message', '2016-09-14 11:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateofcart` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `dateofcart`) VALUES
(9, 4, 4, 2, '2016-10-14 08:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer_mail`
--

CREATE TABLE IF NOT EXISTS `customer_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `head` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `maildate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_mail`
--

INSERT INTO `customer_mail` (`id`, `user_id`, `head`, `body`, `maildate`) VALUES
(2, 4, 'Hello There', 'How is it going admin. I would like to order some product which is not in your inventory', '2016-09-17 04:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `daily_profit`
--

CREATE TABLE IF NOT EXISTS `daily_profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profit` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `daily_profit`
--

INSERT INTO `daily_profit` (`id`, `profit`, `day`, `month`, `year`) VALUES
(5, 110, 31, 'August', 2016),
(6, 206, 1, 'September', 2016),
(7, 90, 2, 'September', 2016),
(8, 300, 3, 'September', 2016),
(9, 424, 4, 'September', 2016),
(10, 215, 5, 'September', 2016),
(11, 365, 6, 'September', 2016),
(12, 659, 7, 'September', 2016),
(13, 487, 8, 'September', 2016),
(14, 574, 9, 'September', 2016),
(15, 126, 10, 'September', 2016),
(16, 90, 11, 'September', 2016),
(17, 60, 12, 'September', 2016),
(18, 156, 13, 'September', 2016),
(19, 213, 14, 'September', 2016),
(20, 146, 15, 'September', 2016),
(21, 172, 16, 'September', 2016),
(22, 193, 17, 'September', 2016),
(23, 460, 18, 'September', 2016),
(24, 354, 19, 'September', 2016),
(25, 210, 20, 'September', 2016),
(26, 450, 21, 'September', 2016),
(27, 227, 1, 'October', 2016),
(28, 368, 2, 'October', 2016),
(29, 126, 3, 'October', 2016),
(30, 90, 4, 'October', 2016),
(31, 100, 5, 'October', 2016),
(32, 90, 6, 'October', 2016),
(33, 156, 7, 'October', 2016),
(34, 215, 8, 'October', 2016),
(35, 200, 9, 'October', 2016),
(36, 189, 10, 'October', 2016),
(37, 190, 11, 'October', 2016),
(38, 234, 12, 'October', 2016),
(39, 190, 13, 'October', 2016),
(40, 289, 14, 'October', 2016),
(41, 222, 15, 'October', 2016),
(42, 245, 16, 'October', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `init_date` datetime NOT NULL,
  `untill` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `userid`, `discount`, `init_date`, `untill`) VALUES
(1, 2, 3, '2016-10-14 09:32:35', 5),
(2, 3, 8, '2016-09-15 09:30:07', 10),
(3, 4, 4, '2016-09-18 04:44:42', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fb_feed`
--

CREATE TABLE IF NOT EXISTS `fb_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fb_feed`
--

INSERT INTO `fb_feed` (`id`, `page_name`) VALUES
(1, 'breedapps');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `distributor` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `weight` decimal(11,1) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_name`, `product_type`, `distributor`, `price`, `sale_price`, `weight`, `quantity`) VALUES
(1, 'Cabbage', 'Food Products', 'Jamuna Group', 450, 650, '1.0', 12),
(2, 'Chinese mallow', 'Food Products', 'Meghna Group', 900, 1000, '2.0', 22),
(3, 'Teer Soyabean Oil', 'Food Products', 'Navana Group', 300, 350, '5.0', 30),
(4, 'Colorful key ring', 'Stationery', 'Canteen Stores Department', 20, 35, '0.2', 12),
(6, 'Belt', 'Coatings', 'Partex Group', 0, 0, '0.5', 13),
(7, 'programmable power supply', 'Home Accessory', 'Meghna Group of Industries', 0, 0, '0.7', 15),
(8, 'Coat', 'Coatings', 'Jamuna Group', 0, 0, '1.0', 25),
(10, 'Kitkat', 'Food Products', 'Habib Group', 0, 0, '0.2', 50),
(11, 'Abacavir Sulfate', 'Pharmaceutical Products', 'Nasir Group', 0, 0, '0.1', 23),
(12, 'Gloves', 'Coatings', 'Partex Group', 0, 0, '0.2', 14),
(14, 'Potato', 'Stationery', 'Habib Group', 56, 68, '87.0', 6),
(15, 'Sugar', 'Food Products', 'Shyampur Sugar Mills', 200, 250, '0.0', 30);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_profit`
--

CREATE TABLE IF NOT EXISTS `monthly_profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profit` int(11) NOT NULL,
  `month` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `monthly_profit`
--

INSERT INTO `monthly_profit` (`id`, `profit`, `month`, `year`) VALUES
(13, 5987, 'September', 2015),
(5, 7553, 'January', 2015),
(6, 5634, 'February', 2015),
(7, 6987, 'March', 2015),
(8, 4697, 'April', 2015),
(9, 8796, 'May', 2015),
(10, 3549, 'June', 2015),
(11, 2569, 'July', 2015),
(12, 4387, 'August', 2015),
(14, 9687, 'October', 2015),
(15, 6248, 'November', 2015),
(16, 10248, 'December', 2015),
(17, 6598, 'January', 2016),
(18, 8796, 'February', 2016),
(19, 5987, 'March', 2016),
(20, 7896, 'April', 2016),
(21, 9687, 'May', 2016),
(22, 1123, 'June', 2016),
(23, 7548, 'July', 2016),
(24, 8967, 'August', 2016),
(25, 4028, 'September', 2016),
(26, 5424, 'October', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `oppertunity`
--

CREATE TABLE IF NOT EXISTS `oppertunity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opp_text` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `oppertunity`
--

INSERT INTO `oppertunity` (`id`, `user_id`, `username`, `opp_text`, `createdate`) VALUES
(2, 2, 'Faz', 'Need a ACI soyabean oil. 5 litter.', '2016-09-15 02:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE IF NOT EXISTS `orderlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateoforder` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `product_id`, `user_id`, `quantity`, `dateoforder`) VALUES
(1, 2, 4, 25, '2016-09-14 00:00:00'),
(2, 1, 4, 15, '2016-09-14 00:00:00'),
(3, 3, 2, 2, '2016-10-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `per_user_profit`
--

CREATE TABLE IF NOT EXISTS `per_user_profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_profit` int(11) NOT NULL,
  `profitdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `per_user_profit`
--

INSERT INTO `per_user_profit` (`id`, `user_id`, `total_profit`, `profitdate`) VALUES
(3, 2, 189, '2016-09-12 12:42:05'),
(4, 3, 230, '2016-09-15 03:17:20'),
(5, 4, 884, '2016-10-14 03:50:18'),
(6, 5, 969, '2016-09-07 02:17:13'),
(7, 7, 569, '2016-10-14 00:00:00'),
(8, 8, 325, '2016-09-20 03:22:17'),
(9, 9, 458, '2016-10-14 06:11:17'),
(10, 10, 156, '2016-09-16 07:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `sell_summary`
--

CREATE TABLE IF NOT EXISTS `sell_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `dateoft` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sell_summary`
--

INSERT INTO `sell_summary` (`id`, `product_id`, `user_id`, `product_name`, `quantity`, `price`, `sale_price`, `profit`, `dateoft`) VALUES
(1, 1, 2, 'Tir Soiabean Oil', 0, 450, 650, 103, '2016-09-11 11:29:37'),
(2, 3, 2, 'Katla Fish', 0, 300, 350, -3, '2016-09-11 11:29:37'),
(3, 1, 2, 'Tir Soiabean Oil', 54, 450, 650, 5535, '2016-09-11 11:34:41'),
(4, 3, 2, 'Katla Fish', 10, 300, 350, -25, '2016-09-11 11:34:41'),
(5, 1, 2, 'Tir Soiabean Oil', 2, 450, 650, 205, '2016-09-12 12:43:14'),
(6, 2, 2, 'Hilsha Fish', 3, 900, 1000, -150, '2016-09-12 12:43:14'),
(7, 2, 4, 'Hilsha Fish', 2, 900, 1000, 200, '2016-09-17 03:50:18'),
(8, 1, 4, 'Tir Soiabean Oil', 1, 450, 650, 200, '2016-09-17 03:50:18'),
(9, 14, 4, 'Potato', 2, 56, 68, 24, '2016-09-17 09:23:06'),
(10, 1, 4, 'Cabbage', 1, 450, 650, 200, '2016-09-18 01:11:34'),
(11, 2, 4, 'Chinese mallow', 2, 900, 1000, 200, '2016-09-18 01:11:34'),
(12, 2, 4, 'Chinese mallow', 1, 900, 1000, 60, '2016-09-18 04:48:38'),
(13, 3, 2, 'Teer Soyabean Oil', 2, 300, 350, 79, '2016-10-14 09:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `task_dec` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `importance` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `taskdate` datetime NOT NULL,
  `tasktime` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_dec`, `importance`, `taskdate`, `tasktime`) VALUES
(1, 'task name', 'description', 'Very Important', '2016-09-08 11:55:00', '00:00:00'),
(2, 'Second task', 'second description', 'Not Important', '2016-09-20 23:55:00', '00:00:00'),
(3, 'Task name tast', 'description test', 'Very Important', '2016-09-14 08:30:00', '00:00:00'),
(8, 'Update name', 'Descriprtion', 'Not Important', '2016-09-14 00:00:00', '23:50:00'),
(11, 'test task', 'description', 'Very Important', '2016-09-15 00:00:00', '09:50:00'),
(24, 'Have meeting', 'Alice wanted to meet with me to talk about a important matter', 'Important', '2016-09-20 00:00:00', '11:55:00'),
(13, 'Testing ', 'tasking if date works', 'Very Important', '2016-09-16 00:00:00', '21:50:00'),
(14, 'Meet with tista mam', 'talk to tista mam to about the final project', 'Very Important', '2016-09-17 00:00:00', '10:00:00'),
(18, 'Works', 'Task manager is fixed', 'Very Important', '2016-09-17 00:00:00', '12:55:00'),
(19, 'dgd', 'dgd', 'Important', '2016-09-17 00:00:00', '12:50:00'),
(21, 'hyuer', 'erterw', 'Very Important', '2016-08-18 00:00:00', '02:50:00'),
(25, 'Dinner Party', 'Rahim asked to have dinner at his place', 'Not Important', '2016-09-20 00:00:00', '21:45:00'),
(26, 'Business Meeting', 'Jhon and watson wanted to have a meeting', 'Important', '2016-09-21 00:00:00', '10:45:00'),
(28, 'Business Meeting', 'Jhon and watson wanted to have a meeting', 'Very Important', '2016-10-14 00:00:00', '07:40:00'),
(30, 'Have a meeting', 'Alice have invited me to a lunch party', 'Very Important', '2016-10-16 00:00:00', '08:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE IF NOT EXISTS `tbl_sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`) VALUES
(1, 'Faz', '13'),
(2, 'Evan', 'Imran');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `netprofit` float NOT NULL,
  `month` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`test_id`),
  UNIQUE KEY `test_id` (`test_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `year`, `netprofit`, `month`) VALUES
(1, '2013', 2000, 'March'),
(2, '2015', 548487, 'June'),
(3, '2011', 255, 'January'),
(4, '2011', 878, 'January'),
(5, '2016', 4758, 'January'),
(6, '2016', 5897, 'February'),
(7, '2016', 7000, 'March'),
(8, '2016', 6000, 'April'),
(17, '2016', 5698, 'May'),
(18, '2016', 9874, 'June'),
(19, '2016', 12000, 'July'),
(20, '2016', 13000, 'August'),
(21, '2016', 14000, 'September'),
(22, '2016', 7000, 'October');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `type`, `firstname`, `lastname`, `email`, `address`, `country`, `phone`, `date`) VALUES
(2, 'Faz', 'faz13', 'customer', 'Fazlul', 'Haque', 'www.faz13@gmail.com', 'Rode# 6, Sector# 4,Uttara, Dhaka ', 'Bangladesh', '0183654789', '2016-09-14 04:18:24'),
(3, 'Eman', '123456', 'customer', 'Emanul', 'Haque', 'www.faz13@gmail.com', 'sector 3, Uttara, Dhaka', 'Bangladesh', '01839111179', '2016-09-05 00:00:00'),
(4, 'Imran', '147258', 'customer', 'Imran', 'Islam', 'imran@gmail.com', 'Sectore 11, Dhanmobdi, Dhaka', 'India', '01364578', '2016-09-05 00:00:00'),
(6, 'Ayaana', 'ayaana12345', 'admin', 'Ayaana', 'Reza', 'diba@gmail.com', '', 'USA', '', '2016-09-14 00:00:00'),
(7, 'Trisa', '123456', 'customer', 'Trisha', 'Rahaman', 'trisa@yahoo.com', 'Sector #4, rRoad #7, Uttara, Dhaka', 'India', '036789648', '2016-09-13 04:12:13'),
(8, 'Dipa', '123456', 'customer', 'Dipa', 'Nita Moni', 'moni@gmail.com', 'Sector #5, rRoad #7, Dhanmondi, Dhaka', 'Bangladesh', '547836987', '2016-09-11 02:21:09'),
(9, 'Monir', '123456', 'customer', 'Monir', 'Hasan', 'hasan@gmail.com', 'Sector #5, rRoad #7, Argu, Malaysia', 'Malaysia', '365497526', '2016-09-13 04:21:11'),
(10, 'Mehedi', '123456', 'customer', 'Mehedi', 'Hasan', 'mehedi@gmail.com', 'melaron, CA, USA', 'United State', '563 369874', '2016-09-12 04:17:20'),
(13, 'Hasan', '12345678', 'customer', 'Hasan', 'Mahmud', 'hasan@gmail.com', 'Ajampur,Uttara', 'Iran', '018974613', '2016-10-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE IF NOT EXISTS `user_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lat` decimal(11,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `city` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `lat`, `lng`, `city`) VALUES
(1, 2, '23.86603430', '90.40697360', 'Dhaka Division'),
(2, 3, '36.25512300', '-115.23834850', 'Las Vegas'),
(3, 4, '23.86389850', '90.39839210', 'Dhaka Division'),
(4, 5, '40.71435280', '-74.00597310', 'New York'),
(5, 7, '3.51986300', '101.53811600', 'Selangor'),
(6, 8, '28.71836930', '77.25802680', 'Delhi'),
(7, 9, '33.73804500', '73.08448800', 'Islamabad'),
(8, 10, '33.58988600', '-7.60386900', 'Casablanca');

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE IF NOT EXISTS `user_test` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_test`
--

INSERT INTO `user_test` (`userid`, `username`, `password`) VALUES
(1, 'diba', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `inactive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userid`, `product_id`, `date`, `inactive`) VALUES
(26, 4, 3, '2016-10-14 00:00:00', 0),
(15, 4, 5, '2016-09-14 00:00:00', 1),
(27, 2, 2, '2016-10-14 00:00:00', 0),
(25, 4, 3, '2016-10-14 00:00:00', 0),
(28, 2, 2, '2016-10-14 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
