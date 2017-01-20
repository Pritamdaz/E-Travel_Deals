-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2016 at 12:39 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etravel`
--
CREATE DATABASE IF NOT EXISTS `etravel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `etravel`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `nopeople` int(11) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `totalcost` varchar(255) NOT NULL,
  `bookdate` varchar(255) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `pid`, `nopeople`, `pname`, `totalcost`, `bookdate`) VALUES
(1, 'xyz@abc.com', 1, 1, 'Aw', '108000', '2016-01-15 16:11:29'),
(2, 'xyz@abc.com', 1, 5, 'New York', '50000', '25-9-1994'),
(3, 'gt@gt.gt', 1, 20, 'Aw', '2160000', '2016-01-15 16:22:58'),
(4, 'xyz@abc.com', 2, 5, 'Himachal Tour', '60000', '2016-01-15 17:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(40) DEFAULT NULL,
  `pcost` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `startbook` date NOT NULL,
  `closebook` date NOT NULL,
  `ptype` varchar(50) DEFAULT NULL,
  `pcat` varchar(50) DEFAULT NULL,
  `pdetails` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pid`, `pname`, `pcost`, `startdate`, `enddate`, `startbook`, `closebook`, `ptype`, `pcat`, `pdetails`) VALUES
(2, 'Himachal Tour', '12000', '2016-01-15', '2016-02-04', '2016-01-05', '2016-01-15', 'Exclusive', 'Elite', 'Explore the wonders of the Himachal'),
(3, 'Andaman Tour', '50000', '2016-01-14', '2016-01-21', '2016-01-01', '2016-01-08', 'Budget', 'Premium', 'Explore Andaman'),
(11, 'Antarctica', '26000', '2018-02-20', '2028-02-20', '2018-01-20', '2002-02-20', 'Inclusive', 'Premium', '');

-- --------------------------------------------------------

--
-- Table structure for table `useracc`
--

CREATE TABLE IF NOT EXISTS `useracc` (
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `atype` varchar(10) NOT NULL,
  `secques` varchar(80) DEFAULT NULL,
  `secans` varchar(100) DEFAULT NULL,
  `phone` bigint(50) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useracc`
--

INSERT INTO `useracc` (`uname`, `pwd`, `atype`, `secques`, `secans`, `phone`, `email`, `address`) VALUES
('Arpan Das', 'asd', 't2', 'i1', 'asd', 9211, 'asd@gmail.zzz', 'qwerty'),
('as', 'qwe', 't1', 'i2', 'zor', 429211, 'er@er.com', 'hello update change'),
('Amit Saha', 'qqq', 't2', 'i1', '', 919674266, 'friend1097@gmail.com', '85/2, Muchi Para Rd'),
('Sergei', 'aaa', 't2', 'i2', 'srk', 24102410, 'gt@gt.gt', '1223,main road, bombay-96'),
('Arpan Das', 'r', 't1', 'Where were you born?', 'mars', 2147483647, 'xyz@abc.com', 'middle of');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
