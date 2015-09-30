-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 08:32 PM
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
  `dimage` varchar(10) NOT NULL,
  `uploaded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`did`, `dname`, `resturant`, `dimage`, `uploaded`) VALUES
(82, 'Grilled Chicken Breast', 'Bootlegger', '82.jpg', 1),
(83, 'The Great Tiramisu', 'Bulldogs', '83.jpg', 1),
(84, 'Sunday Brunch', 'Coast CafŽ', '84.jpg', 1),
(85, 'Carbonara Pasta', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(86, 'Chimichuri Grilled Chicken Breast', 'Bootlegger', '', 0),
(87, 'Smoked Salmon Pizza', 'Bulldogs', '', 0),
(88, 'Crispy Chilli Chicken', 'Coast CafŽ', '', 0),
(89, 'Chicken Lasagna', 'Crave Busters', '', 0),
(90, 'Paneer Tikka Pizza', 'Amour - The Patio Restaurant CafŽ & Bar', '90.jpg', 1),
(91, 'Chicken Tikka Pizza', 'Bootlegger', '', 0),
(92, 'Malabar Parantha', 'Bulldogs', '', 0),
(93, 'Kerala Grilled Chicken', 'Coast CafŽ', '', 0),
(94, 'Appam', 'Crave Busters', '', 0),
(95, 'Coast CafŽ Prawn Moilee', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(96, 'Rainy Day Stew with Grilled Chicken', 'Bootlegger', '', 0),
(97, 'Masala Fish Curry', 'Bulldogs', '', 0),
(98, 'Sukha Mutton Fry', 'Coast CafŽ', '', 0),
(99, 'Spiced Up Chicken Burger', 'Crave Busters', '', 0),
(100, 'Malabari Kokum Fish Curry', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(101, 'Chocolate Hazelnut Pie', 'Bootlegger', '', 0),
(102, 'Butter Chicken', 'Bulldogs', '', 0),
(103, 'Chilli Garlic Chicken', 'Coast CafŽ', '', 0),
(104, 'Dal Makhani', 'Amour - The Patio Restaurant CafŽ & Bar', '', 0),
(105, 'Chicken Dum Biryani', 'Bootlegger', '', 0),
(106, 'Peri Peri Chicken Burger', 'Bulldogs', '', 0),
(107, 'Blueberry Cheesecake', 'Coast CafŽ', '', 0),
(108, '', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
