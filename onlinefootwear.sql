-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 15, 2020 at 07:27 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefootwear`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `aboutus_text` varchar(2000) NOT NULL,
  `aboutus_img1` varchar(100) NOT NULL,
  `aboutus_img2` varchar(100) NOT NULL,
  `aboutus_img3` varchar(100) NOT NULL,
  `aboutus_img4` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `opening_time` varchar(150) NOT NULL,
  `closing_time` varchar(150) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `aboutus_text`, `aboutus_img1`, `aboutus_img2`, `aboutus_img3`, `aboutus_img4`, `address`, `opening_time`, `closing_time`, `phone_number`) VALUES
(1, 'Famous Footwear is your place for athletic and casual shoes for the whole family from hundreds of name brands. You\'ll find styles for women, men and kids from brands like Nike, Converse, Vans, Sperry, Madden Girl, Skechers, ASICS and more! With stores in the U.S. and Canada and even more selection online at Famous.com and FamousFootwear.ca, Famous Footwear is a leading family footwear destination for the famous brands you know and love.\r\n\r\nFamous Footwear is part of Caleres Inc., a diverse portfolio of global footwear brands. Combined, these brands help make Caleres a company with both a legacy and a mission. Caleres\' legacy includes more than 130-years of craftsmanship, a passion for fit and a business savvy, with a mission to continue to inspire people to feel good…feet first.', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'img4.jpg', '41 , sahyog society , near adajan , surat-395009', '09:00', '10:00', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

DROP TABLE IF EXISTS `add_to_cart`;
CREATE TABLE IF NOT EXISTS `add_to_cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `umobile_no` varchar(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`cart_id`, `umobile_no`, `pro_name`, `pro_img`, `pro_price`, `qty`, `total_price`, `pro_id`) VALUES
(108, '8238835155', 'men formal', '49.png', 999, 1, 999, 13),
(106, '9574787211', 'men formal', '49.png', 999, 1, 999, 13),
(107, '8238835155', 'formal shoes', '69.png', 899, 1, 899, 14),
(105, '9574787211', 'formal shoes', '69.png', 899, 1, 899, 14);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `status`) VALUES
(20, 'Men', 0),
(22, 'Children', 0),
(21, 'Women', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `chk_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `zipp_code` int(10) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `umobile_no` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_price` int(50) NOT NULL,
  `grand_total` int(50) NOT NULL,
  `payment` varchar(255) NOT NULL,
  PRIMARY KEY (`chk_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`chk_id`, `country`, `fname`, `lname`, `address1`, `address2`, `state`, `town`, `zipp_code`, `email_id`, `umobile_no`, `qty`, `pro_name`, `pro_price`, `grand_total`, `payment`) VALUES
(40, '4', 'dhrumi', 'lakdawala', 'melbourn', 'mel', '5', '4', 452145, 'dhrumi@gmail.com', '9574787211', 2, 'formal shoes', 899, 1798, 'cash'),
(37, '2', 'samir', 'randeriya', 'adajana', 'adajan', '2', '3', 394475, 'dhrumi@gmail.com', '9574787211', 1, 'men formal', 999, 999, 'cash'),
(38, '2', 'samir', 'randeriya', 'adajana', 'adajan', '2', '3', 394475, 'dhrumi@gmail.com', '9574787211', 2, 'formal shoes', 899, 1798, 'cash'),
(39, '4', 'dhrumi', 'lakdawala', 'melbourn', 'mel', '5', '4', 452145, 'dhrumi@gmail.com', '9574787211', 1, 'men formal', 999, 999, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `state_id`, `city_name`, `status`) VALUES
(4, 4, 5, 'mel', 0),
(2, 2, 2, 'Surat', 0),
(3, 2, 2, 'Ahemdabad', 0),
(5, 4, 6, 'syd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `first_name`, `last_name`, `email`, `subject`, `message`) VALUES
(1, 'jemina', 'asmani', 'asmanijemina@gmail.com', 'website flow', 'is working perfectly..');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `status`) VALUES
(2, 'India', 0),
(4, 'Australia ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

DROP TABLE IF EXISTS `home_slider`;
CREATE TABLE IF NOT EXISTS `home_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_img` varchar(100) DEFAULT NULL,
  `slider_head` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`slider_id`, `slider_img`, `slider_head`) VALUES
(13, 'home_slider_1.jpg', 'Men'),
(14, 'home_slider_2.jpg', 'Men'),
(15, 'home_slider_3.jpg', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `new_arrival`
--

DROP TABLE IF EXISTS `new_arrival`;
CREATE TABLE IF NOT EXISTS `new_arrival` (
  `arr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `arr_img` varchar(100) DEFAULT NULL,
  `arr_name` varchar(30) DEFAULT NULL,
  `arr_price` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`arr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('sam@gmail.com', '8cdd21051a8dd11a0e3dc8300f36d31dfd2f4bd339', '2020-08-14 08:09:44'),
('sam@gmail.com', '8cdd21051a8dd11a0e3dc8300f36d31d64795d95f3', '2020-08-14 08:41:45'),
('sam.randeriya1212@gmail.com', 'bbb3948bbceeaee04df778a0c1aeb75eec4a9e2cb9', '2020-08-14 13:19:30'),
('sam.randeriya1212@gmail.com', 'bbb3948bbceeaee04df778a0c1aeb75e6689193041', '2020-08-14 13:23:58'),
('sam.randeriya1212@gmail.com', 'bbb3948bbceeaee04df778a0c1aeb75edf8a453f15', '2020-08-14 13:29:10'),
('sam.randeriya1212@gmail.com', 'bbb3948bbceeaee04df778a0c1aeb75e699e808acd', '2020-08-15 03:56:45'),
('sam.randeriya1212@gmail.com', 'bbb3948bbceeaee04df778a0c1aeb75e1b6b50ce5f', '2020-08-15 04:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `status` tinyint(10) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `cat_id`, `subcat_id`, `pro_name`, `pro_img`, `description`, `price`, `qty`, `status`) VALUES
(32, 20, 37, 'MEN FORMAL', '63.png', 'MEN FORMAL 63', 999, 10, 0),
(33, 20, 37, 'MEN FORMAL', '68.png', 'MEN FORMAL 68', 999, 7, 0),
(39, 20, 40, 'MEN CASUAL ', 'n24.png', 'MEN CASUAL N24', 299, 5, 0),
(40, 20, 42, 'MEN SPORTS', 'c11.png', 'MEN SPORTS C11', 499, 5, 0),
(30, 22, 43, 'CHILDREN SPORTS', 'c74.png', 'CHILDREN SPORTS C74', 249, 5, 0),
(29, 21, 38, 'WOMEN FORMAL', '2.png', 'WOMEN FORMAL 2', 499, 5, 0),
(28, 20, 42, 'MEN SPORTS', 'n2.png', 'MEN SPORTS N2', 599, 5, 0),
(27, 22, 39, 'CHILDREN SLIPER', 'c54.png', 'CHILDREN SLIPER C54', 599, 5, 0),
(26, 21, 41, 'WOMEN CASUAL', 'l34.png', 'women casual 134', 699, 5, 0),
(25, 20, 37, 'MEN FORMAL ', '42.png', 'men formal 42', 999, 5, 0),
(34, 20, 37, 'MEN FORMAL', '78.png', 'MEN FORMAL 78', 1249, 5, 0),
(35, 20, 40, 'MEN CASUAL ', '60.png', 'MEN CASUAL 60', 499, 10, 0),
(36, 20, 40, 'MEN CASUAL ', '74.png', 'MEN CASUAL 74', 999, 5, 0),
(37, 20, 40, 'MEN CASUAL ', 'c2.png', 'MEN CASUAL C2', 249, 5, 0),
(38, 20, 37, 'MEN FORMAL', '89.png', 'MEN FORMAL 89', 1499, 5, 0),
(41, 20, 42, 'MEN SPORTS', 'c13.png', 'MEN SPORTS C13', 499, 5, 0),
(42, 20, 42, 'MEN SPORTS', 'c14.png', 'MEN SPORTS C14', 249, 5, 0),
(43, 21, 38, 'WOMEN FORMAL', '6.png', 'WOMEN FORMAL 6', 499, 5, 0),
(44, 21, 38, 'WOMEN FORMAL', '10.png', 'WOMEN FORMAL 10', 799, 5, 0),
(45, 21, 38, 'WOMEN FORMAL', '15.png', 'WOMEN FORMAL 15', 1499, 5, 0),
(46, 21, 41, 'WOMEN CASUAL', '30.png', 'WOMEN CASUAL 30', 499, 5, 0),
(47, 21, 41, 'WOMEN CASUAL', '34.png', 'WOMEN CASUAL 34', 999, 5, 0),
(48, 21, 41, 'WOMEN CASUAL', '37.png', 'WOMEN CASUAL 37', 1499, 5, 0),
(49, 21, 41, 'WOMEN CASUAL ', 'p41.png', 'WOMEN CASUAL P41', 799, 5, 0),
(50, 22, 39, 'CHILDREN SLIPER', 'c42.png', 'CHILDREN SLIPER C24', 499, 5, 0),
(51, 22, 39, 'CHILDREN SLIPER', 'c30.png', 'CHILDREN SLIPER C30', 499, 5, 0),
(52, 22, 39, 'CHILDREN SLIPER', 'c37.png', 'CHILDREN SLIPER C37', 999, 5, 0),
(53, 22, 39, 'CHILDREN SLIPER', 'c38.png', 'CHILDREN SLIPER C38', 999, 10, 0),
(54, 22, 43, 'CHILDREN SPORTS', 'c70.png', 'CHILDREN SPORTS C70', 499, 10, 0),
(55, 22, 43, 'CHILDREN SPORTS', 'c78.png', 'CHILDREN SPORTS C78', 999, 5, 0),
(56, 22, 43, 'CHILDREN SPORTS', 'n7.png', 'CHILDREN SPORTS N7', 999, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_all`
--

DROP TABLE IF EXISTS `product_all`;
CREATE TABLE IF NOT EXISTS `product_all` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_img` varchar(100) DEFAULT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `product_price` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_all`
--

INSERT INTO `product_all` (`product_id`, `product_img`, `product_name`, `product_price`, `status`) VALUES
(1, 'images/item-9.jpg', 'product1', 100, 'available'),
(2, 'images/item-10.jpg', 'product2', 200, 'available'),
(3, 'images/item-11.jpg', 'product3', 300, 'available'),
(4, 'images/item-12.jpg', 'product4', 400, 'unavailable'),
(5, 'images/item-13.jpg', 'product5', 500, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `product_display`
--

DROP TABLE IF EXISTS `product_display`;
CREATE TABLE IF NOT EXISTS `product_display` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_img` varchar(100) DEFAULT NULL,
  `product_category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_display`
--

INSERT INTO `product_display` (`id`, `product_img`, `product_category`) VALUES
(1, 'images/item-1.jpg', 'Men'),
(2, 'images/item-2.jpg', 'Women'),
(3, 'images/item-4.jpg', 'Children');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `trn_date` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `username`, `mobile_no`, `email_id`, `password`, `status`, `trn_date`) VALUES
(21, 'Samir ', '9099400550', 'sam.randeriya1212@gmail.com', 'bc5db696ec578aec4e327d8df9a24910', 1, '2020-08-13 07:44:42'),
(25, 'Dhrumi ', '9574787211', 'dhrumi@gmail.com', 'bc5db696ec578aec4e327d8df9a24910', 0, '2020-09-07 04:22:49'),
(26, 'jemina', '8238835155', 'asmanijemina@gmail.com', 'a6e369dcc61b03f8d57360b83895a2b1', 0, '2020-09-12 14:54:01'),
(27, 'tejas', '9558888197', 'tejasbhavsar@gmail.com', '65ac0f50ab8881923bd1706b4ca76e78', 0, '2020-09-12 15:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_img` varchar(255) DEFAULT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `staff_designation` varchar(30) DEFAULT NULL,
  `staff_insta` varchar(30) DEFAULT NULL,
  `staff_twitter` varchar(30) DEFAULT NULL,
  `staff_facebook` varchar(30) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_img`, `staff_name`, `staff_designation`, `staff_insta`, `staff_twitter`, `staff_facebook`, `status`) VALUES
(4, 'person1.jpg', 'Shubhechha Dalal', 'designer,coder', '', '', '', 0),
(5, 'samir.png', 'Samir Randeriya', 'designer,coder', '', '', '', 0),
(6, 'person3.jpg', 'Jemina Asmani', 'designer,coder', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `status`) VALUES
(2, 2, 'Gujarat', 0),
(3, 2, 'Maharastra', 0),
(5, 4, 'Melbourne', 0),
(6, 4, 'Sydney', 0),
(1, 2, 'Select State/Province', 0),
(4, 4, 'Select State/Province', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(50) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcat_id`, `cat_id`, `subcat_name`, `status`) VALUES
(43, 22, 'Sports', 0),
(42, 20, 'Sports', 0),
(41, 21, 'Casual', 0),
(40, 20, 'Casual', 0),
(39, 22, 'Sliper', 0),
(38, 21, 'Formal', 0),
(37, 20, 'Formal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `umobile_no` varchar(15) NOT NULL,
  `pro_name` varchar(150) NOT NULL,
  `pro_img` varchar(250) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`wish_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `umobile_no`, `pro_name`, `pro_img`, `pro_price`, `qty`, `total_price`, `pro_id`) VALUES
(7, '8888888888', 'formal shoes', '69.png', 899, 1, 899, 14),
(8, '8888888888', 'black formal', '4.png', 999, 1, 999, 17),
(9, '9558888197', 'formal shoes', '69.png', 899, 1, 899, 14);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
