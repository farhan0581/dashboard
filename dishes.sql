-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2015 at 06:42 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(80) NOT NULL,
  `resturant` varchar(80) NOT NULL,
  `dimage` varchar(80) NOT NULL,
  `uploaded` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=312 ;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`did`, `dname`, `resturant`, `dimage`, `uploaded`) VALUES
(279, 'Chef''s Special Pizza', 'Amour - The Patio Restaurant CafŽ & Bar', '40068_1417', 2),
(280, 'Grilled Chicken Breast', 'Bootlegger', '40068_141791869189386_3453041_n.jpg,20140914_010101.jpg', 2),
(281, 'The Great Tiramisu', 'Bulldogs', 'i.png,Image0191.jpg,Image3685.jpg,Image3687.jpg,Image3695.jpg', 5),
(282, 'Sunday Brunch', 'Coast CafŽ', 'i.png,Image3872.jpg', 2),
(283, 'Popeye''s Pizza', 'Crave Busters', '', 0),
(284, 'Carbonara Pasta', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(285, 'Chimichuri Grilled Chicken Breast', 'Bootlegger', '', 0),
(286, 'Smoked Salmon Pizza', 'Bulldogs', '', 0),
(287, 'Crispy Chilli Chicken', 'Coast CafŽ', '', 0),
(288, 'Chicken Lasagna', 'Crave Busters', '', 0),
(289, 'Paneer Tikka Pizza', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(290, 'Chicken Tikka Pizza', 'Bootlegger', '', 0),
(291, 'Malabar Parantha', 'Bulldogs', '', 0),
(292, 'Kerala Grilled Chicken', 'Coast CafŽ', '', 0),
(293, 'Appam', 'Crave Busters', '', 0),
(294, 'Coast CafŽ Prawn Moilee', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(295, 'Rainy Day Stew with Grilled Chicken', 'Bootlegger', '', 0),
(296, 'Masala Fish Curry', 'Bulldogs', '', 0),
(297, 'Sukha Mutton Fry', 'Coast CafŽ', '', 0),
(298, 'Spiced Up Chicken Burger', 'Crave Busters', '', 0),
(299, 'Malabari Kokum Fish Curry', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(300, 'Chocolate Hazelnut Pie', 'Bootlegger', '', 0),
(301, 'Butter Chicken', 'Bulldogs', '', 0),
(302, 'Chilli Garlic Chicken', 'Coast CafŽ', '', 0),
(303, 'Dal Makhani', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(304, 'Chicken Dum Biryani', 'Bootlegger', '', 0),
(305, 'Peri Peri Chicken Burger', 'Bulldogs', '', 0),
(306, 'Blueberry Cheesecake', 'Coast CafŽ', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
