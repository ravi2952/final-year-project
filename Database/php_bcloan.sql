-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2024 at 01:23 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_bcloan`
--
CREATE DATABASE IF NOT EXISTS `php_bcloan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_bcloan`;

-- --------------------------------------------------------

--
-- Table structure for table `acknowledgement`
--

CREATE TABLE IF NOT EXISTS `acknowledgement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `dt` date NOT NULL,
  `ack` varchar(200) NOT NULL,
  PRIMARY KEY (`lid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `acknowledgement`
--

INSERT INTO `acknowledgement` (`id`, `lid`, `dt`, `ack`) VALUES
(1, 2, '2024-02-21', 'Received Loan...!');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `aname` varchar(200) NOT NULL,
  PRIMARY KEY (`cname`,`aname`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `cname`, `aname`) VALUES
(1, 'Madurai', 'KK Nagar'),
(2, 'Madurai', 'Anna Nagar'),
(3, 'Madurai', 'Simmakkal'),
(4, 'Madurai', 'Tiruparankundram'),
(5, 'Chennai', 'Adayar'),
(6, 'Chennai', 'Nungampakkam');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(200) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `aname` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `accept` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`bname`,`cname`,`aname`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bname`, `addr`, `cname`, `aname`, `mobile`, `userid`, `pwd`, `accept`) VALUES
(2, 'Canara Bank', '5,GT Road,', 'Madurai', 'Anna Nagar', '8091929329', 'cb_an@gmail.com', 'b', 'accept'),
(1, 'State Bank of India', '80-Feet Road,', 'Madurai', 'Anna Nagar', '8899023043', 'sbi_an@gmail.com', 'b', 'accept'),
(3, 'State Bank of India', 'Main Road,\r\nNear Sree Krishna,', 'Madurai', 'KK Nagar', '9844011190', 'sbi_kk@gmail.com', 'b', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cname`) VALUES
('Chennai'),
('Dindigul'),
('Madurai'),
('Trichy'),
('Tuticorin');

-- --------------------------------------------------------

--
-- Table structure for table `loanapply`
--

CREATE TABLE IF NOT EXISTS `loanapply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(200) NOT NULL,
  `loanamt` varchar(20) NOT NULL,
  `proof` varchar(500) NOT NULL,
  `bankid` varchar(20) NOT NULL,
  `lstatus` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loanapply`
--

INSERT INTO `loanapply` (`id`, `userid`, `loanamt`, `proof`, `bankid`, `lstatus`) VALUES
(1, 'ram@gmail.com', '200000', 'uploads/17073914343.jpg', '', 'pending'),
(2, 'sam@gmail.com', '450000', 'uploads/1708432704i4.jpg', 'sbi_an@gmail.com', 'accept'),
(3, 'vimal@gmail.com', '210000', 'uploads/1708514700i5.jpg', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE IF NOT EXISTS `newuser` (
  `uname` varchar(50) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `aname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `college` varchar(200) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `aadhar` varchar(500) NOT NULL,
  `cproof` varchar(500) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`uname`, `addr`, `cname`, `aname`, `gender`, `dob`, `mobile`, `degree`, `college`, `userid`, `pwd`, `photo`, `aadhar`, `cproof`) VALUES
('Ram Kumar', '343,North Car Street,', 'Madurai', 'KK Nagar', 'Male', '2002-05-02', '9855255458', 'B.E.CS', 'Velammal College of Engineering', 'ram@gmail.com', 'r', 'uploads/1707382294person_1.jpg', 'uploads/170738229410.jpg', 'uploads/170738229415.jpg'),
('Samuel', '343,Church Road', 'Madurai', 'Anna Nagar', 'Male', '2005-02-15', '9850122225', 'B.Tech IT', 'Kalasalingam University', 'sam@gmail.com', 's', 'uploads/170738585511.jpg', 'uploads/17073858554.jpg', 'uploads/170738585514.jpg'),
('Vimal', '343,South Car Street,', 'Madurai', 'Anna Nagar', 'Male', '2003-04-01', '9875454056', 'B.E.CS', 'Velammal College of Engineering', 'vimal@gmail.com', 'v', 'uploads/1708514663170739509215.jpg', 'uploads/1708514663i1.jpg', 'uploads/1708514663i2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reqtobank`
--

CREATE TABLE IF NOT EXISTS `reqtobank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `lid` int(11) NOT NULL,
  `bankid` varchar(200) NOT NULL,
  `astatus` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reqtobank`
--

INSERT INTO `reqtobank` (`id`, `dt`, `lid`, `bankid`, `astatus`) VALUES
(1, '2024-02-20', 2, 'sbi_an@gmail.com', 'accept'),
(2, '2024-02-21', 3, 'sbi_an@gmail.com', 'reject');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
