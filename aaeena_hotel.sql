-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2019 at 04:16 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aaeena_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_item`
--

CREATE TABLE IF NOT EXISTS `add_item` (
  `id` int(11) NOT NULL,
  `Item_Name` varchar(255) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_item`
--

INSERT INTO `add_item` (`id`, `Item_Name`, `Rate`) VALUES
(1, 'Matan Biryani', 65),
(2, 'Matan Masala', 70),
(3, 'Matan Chap', 70),
(4, 'Matan Kheema', 70),
(5, 'Matan Aachar', 70),
(6, 'Matan Tari', 65),
(7, 'Anda Kari', 70),
(8, 'Dal Frai', 50),
(9, 'Matan Angara', 120),
(10, 'Chickan Angara', 130),
(11, 'Matan Sheek', 25),
(12, 'Matan Handi', 120),
(13, 'Chickan Handi', 130),
(14, 'Matan Jaipuri', 120),
(15, 'Chicken Jaipuri', 130),
(16, 'Matan Kofta', 70),
(17, 'Matan Harata', 120),
(18, 'Chicken Harata', 130),
(19, 'Chicken Biryani', 75),
(20, 'Chicken Masala', 70),
(21, 'Chicken 65 (100gm)', 40),
(22, 'Chicken Tanduri', 75),
(23, 'Paya', 70),
(24, 'Chapati', 7),
(25, 'Tanduri Roti', 8),
(26, 'Batar Roti', 12),
(27, 'Dal Tadka', 65),
(28, 'Chicken Tikka ', 130),
(29, 'Matan Tickka', 120),
(30, 'Chicken Dabba', 130),
(31, 'Matan Dabba', 120),
(32, 'Chicken Garlik', 130),
(33, 'Matan Garlik', 120),
(34, 'Chicken Fraidrize', 80),
(35, 'Matan Fraidraize', 80),
(36, 'Chicken Afgani', 130),
(37, 'Matan Afgani', 120),
(38, 'Chicken Moglai', 130),
(39, 'Motan Moglai', 120),
(40, 'Chicken Tadka', 130),
(41, 'Matan Tadka', 120),
(42, 'Chicken Rosted', 130),
(43, 'Matan Rosted', 120),
(44, 'Chicken Lolipop', 105),
(45, 'Anda Biryani', 70),
(46, 'Meti Kheema', 70),
(47, 'Tamduri Murgi', 350),
(48, 'Chicken Zira', 130),
(49, 'Matan Zira', 120),
(50, 'Zira Raice', 60),
(51, 'Raice', 50),
(52, 'Chicken Chilli', 130),
(53, 'Matan Chilli', 120),
(54, 'Dalcha Khana', 60),
(55, 'Khichda', 60),
(56, 'Kaddu Kheer', 30),
(57, 'Brade Halwa', 30),
(58, 'Kaju Kheer', 30),
(59, 'Pani Botel', 20),
(60, 'Thumps UP', 20),
(61, '7 UP', 20),
(62, 'Hacker', 50);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `Billno` int(11) NOT NULL,
  `Date` date NOT NULL,
  `p_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`Billno`, `Date`, `p_id`, `item`, `qty`, `rate`) VALUES
(1, '2019-12-06', 3, 'Matan Chap', 2, '70'),
(2, '2019-12-07', 20, 'Chicken Masala', 2, '70'),
(2, '2019-12-07', 4, 'Matan Kheema', 5, '70');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE IF NOT EXISTS `bill_details` (
  `Billno1` int(11) NOT NULL,
  `Date1` date NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`Billno1`, `Date1`, `total`) VALUES
(1, '2019-12-06', '140'),
(2, '2019-12-07', '490');

-- --------------------------------------------------------

--
-- Table structure for table `employee_billing`
--

CREATE TABLE IF NOT EXISTS `employee_billing` (
  `Employee_Id` int(11) NOT NULL,
  `Employee_Name` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Salary` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_billing`
--

INSERT INTO `employee_billing` (`Employee_Id`, `Employee_Name`, `Contact_No`, `Age`, `Gender`, `Address`, `Salary`) VALUES
(1, 'Shaikh Moiz', '8484865950', 18, 'Male', 'Solapur', '400000'),
(2, 'Shaikh Mazen', '9158437897', 16, 'Male', 'Solapur', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `employee_manager`
--

CREATE TABLE IF NOT EXISTS `employee_manager` (
  `Employee_Id` int(11) NOT NULL,
  `Employee_Name` varchar(255) NOT NULL,
  `Contact_No` varchar(11) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Salary` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_manager`
--

INSERT INTO `employee_manager` (`Employee_Id`, `Employee_Name`, `Contact_No`, `Age`, `Gender`, `Address`, `Salary`) VALUES
(1, 'Moiz Shaikh', '8484865950', '18', 'Male', 'Solapur', '400000'),
(2, 'Shaikh Mazen', '9158437897', '16', 'Male', 'Solapur', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `employee_parsal`
--

CREATE TABLE IF NOT EXISTS `employee_parsal` (
  `Employee_Id` int(11) NOT NULL,
  `Employee_Name` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Salary` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_parsal`
--

INSERT INTO `employee_parsal` (`Employee_Id`, `Employee_Name`, `Contact_No`, `Age`, `Gender`, `Address`, `Salary`) VALUES
(1, 'Shaikh Moiz', '8484865950', 18, 'Male', 'Solapur', '400000'),
(2, 'Shaikh Mazen', '9158437897', 16, 'Male', 'Solapur', '5000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
