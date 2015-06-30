-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 07:41 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `i-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `log_type` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `df` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `log_type`, `status`, `df`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `distic` varchar(60) NOT NULL,
  `village` varchar(60) NOT NULL,
  `product_type` varchar(60) NOT NULL,
  `remarks` varchar(70) NOT NULL,
  `approval_status` tinyint(4) NOT NULL DEFAULT '0',
  `lead_status` tinyint(4) NOT NULL,
  `agent_id` tinyint(4) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `df` int(1) NOT NULL DEFAULT '0',
  `update_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enquiry`
--


-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE IF NOT EXISTS `lead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` tinyint(4) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `days` varchar(20) NOT NULL,
  `dealer` varchar(10) NOT NULL,
  `delr_id` varchar(60) NOT NULL,
  `lead_status` tinyint(4) NOT NULL DEFAULT '0',
  `buy_status` tinyint(4) NOT NULL,
  `buyer_id` varchar(29) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `df` int(1) NOT NULL DEFAULT '0',
  `expiry_date` date NOT NULL,
  `update_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lead`
--


-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `online_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone_no` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `log_type` varchar(30) NOT NULL,
  `del_point` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `update_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

