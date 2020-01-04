-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2019 at 02:41 PM
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
-- Database: `pcu`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

DROP TABLE IF EXISTS `checkup`;
CREATE TABLE IF NOT EXISTS `checkup` (
  `p_aadhar` varchar(255) NOT NULL,
  `p_landmark` varchar(255) NOT NULL,
  `p_disease` varchar(255) NOT NULL,
  `p_curr_stat` varchar(255) NOT NULL,
  `p_curr_check_stat` varchar(255) NOT NULL,
  `p_curr_hlth_cond` varchar(255) NOT NULL,
  `checkup_date` varchar(255) DEFAULT NULL,
  `checked` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `c_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_aadhar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`p_aadhar`, `p_landmark`, `p_disease`, `p_curr_stat`, `p_curr_check_stat`, `p_curr_hlth_cond`, `checkup_date`, `checked`, `status`, `c_date`) VALUES
('111111111111', 'qdwqdwq', 'dqwdqwdqwd', '', 'qwdqwdwqdqw', 'wqdqwdqwdqwd', '2019-04-22', '1', 'please change date', '2019-04-22'),
('590919191900', 'ewfqwefewfwefwef', 'efwefwefwf', '', 'efewfwessfewfwef', 'wefewfewfefew', '2019-04-16', '1', 'change date', '2019-04-04'),
('191911111999', 'ewvwevwevcsd', 'sffsdfwewefwe', 'efswefewfwef', 'sfefewfwefwefwef', 'ewfwefefwefwefe', NULL, '0', NULL, NULL),
('944444444444', 'rfeefrer', 'rfrfrfer', 'fefewfwe', 'efweefwe', 'wefewfewfwe', NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `d_id` int(255) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `d_mob` varchar(255) NOT NULL,
  `d_qualification` varchar(255) NOT NULL,
  `d_specialization` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `d_name`, `address`, `d_mob`, `d_qualification`, `d_specialization`) VALUES
(1, 'hari', 'kkkkkkkkkkk', '1111111111', 'wwwwwwwwwwwwwww', 'ssssssssssss'),
(4, 'ram', 'pppppppp', '0000000000', 'qqqqqqqqqqqqq', 'aaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `m_id` int(255) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) NOT NULL,
  `m_cmpy` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `dr_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `m_name`, `m_cmpy`, `dosage`, `quantity`, `dr_name`, `description`) VALUES
(9, 'Paracip', 'cola', '100', 54, '1', ''),
(2, 'paracetamol', 'para', '500mg', 235, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

DROP TABLE IF EXISTS `medicine_stock`;
CREATE TABLE IF NOT EXISTS `medicine_stock` (
  `s_id` int(255) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `m_date` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`s_id`, `m_name`, `p_name`, `p_id`, `quantity`, `m_date`) VALUES
(224, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-22'),
(223, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-22'),
(222, 'Paracip', 'Ramesh', '111111111111', '', '2019-04-22'),
(221, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-22'),
(220, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-22'),
(219, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-04'),
(218, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-04'),
(217, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-04'),
(216, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-04'),
(215, 'paracetamol', 'Ramesh', '111111111111', '50', '2019-04-04'),
(214, 'paracetamol', 'Ramesh', '111111111111', '', '2019-04-04'),
(213, 'paracetamol', 'Ramesh', '111111111111', '50', '2019-04-04'),
(212, 'paracetamol', 'Ramesh', '111111111111', '1', '2019-04-04'),
(211, 'paracetamol', 'Ramesh', '111111111111', '3', '2019-04-04'),
(210, 'paracetamol', 'Ramesh', '111111111111', '5', '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `newcheckup`
--

DROP TABLE IF EXISTS `newcheckup`;
CREATE TABLE IF NOT EXISTS `newcheckup` (
  `check_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_aadhar` varchar(255) NOT NULL,
  `curr_hlth_cond` varchar(255) NOT NULL,
  `curr_check_details` varchar(255) NOT NULL,
  `checked_date` date DEFAULT NULL,
  `dr_name` varchar(255) NOT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newcheckup`
--

INSERT INTO `newcheckup` (`check_id`, `p_aadhar`, `curr_hlth_cond`, `curr_check_details`, `checked_date`, `dr_name`) VALUES
(26, '111111111111', 'wsqws', 'wswsw', '2019-03-29', 'hari'),
(28, '111111111111', 'fweffewf', 'gpppf', '2019-03-30', 'hari'),
(30, '111111111111', 'good', 'coca cola co...', '2019-03-30', 'hari'),
(31, '590919191900', 'good', 'good', '2019-03-30', 'hari');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `p_name` varchar(255) NOT NULL,
  `p_age` varchar(100) NOT NULL,
  `p_dob` varchar(255) NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_mob` varchar(255) NOT NULL,
  `p_aadhar` varchar(255) NOT NULL,
  `p_verify` varchar(255) NOT NULL,
  `a_aadhar` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `p_date` date DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `rej_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_aadhar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`p_name`, `p_age`, `p_dob`, `p_gender`, `p_address`, `p_mob`, `p_aadhar`, `p_verify`, `a_aadhar`, `a_name`, `p_date`, `comment`, `rej_date`) VALUES
('Ramesh', '99', '08-05-1900', 'male', 'palakkad', '1591951999', '111111111111', '1', '123456789122', 'abdul', '2019-03-20', 'Nothing', NULL),
('gewgwe', '98', '10-03-1982', 'male', 'palakkad', '1111111111', '590919191900', '1', '123456789122', 'abdul', '2019-03-30', 'Nothing', NULL),
('vdwvew', '116', '11-03-1903', 'male', 'ewvwew', '5195499919', '191911111999', 'n', '123456789122', 'abdul', '2019-03-30', 'therhegefwefwe', '2019-03-30'),
('erfsfsdfdf', '65', '02-03-1954', 'male', 'FFWEF', '4994949499', '944444444444', '0', '123456789122', 'abdul', '2019-03-30', 'Nothing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `a_name` varchar(200) NOT NULL,
  `a_address` varchar(200) NOT NULL,
  `a_wardno` varchar(200) NOT NULL,
  `a_mob` varchar(255) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_aadhar` varchar(200) NOT NULL,
  `a_verify` varchar(200) NOT NULL,
  `a_date` date DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rej_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`a_aadhar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`a_name`, `a_address`, `a_wardno`, `a_mob`, `a_email`, `a_aadhar`, `a_verify`, `a_date`, `password`, `comment`, `rej_date`) VALUES
('rahman', 'palakkad\r\n', '123', '9842492899', 'aaad@gmail.com', '584294289492', 'n', '2019-03-30', '123456', 'incomplete', ''),
('abdul', 'Palakkad', '984', '2999519191', 'abd@gamil.com', '123456789122', '1', '2019-03-20', '123456', 'nothing', ''),
('fwefwefwef', 'efwqrthtfsvewdfs', '594', '8998199191', 'asw@qwdqwd.com', '448991919195', 'n', '2019-03-30', '123456', '50910951951', '2019-03-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
