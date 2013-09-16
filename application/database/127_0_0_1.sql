-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2013 at 03:32 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mticket`
--
CREATE DATABASE IF NOT EXISTS `mticket` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mticket`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `n_ic` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `film_hall`
--

CREATE TABLE IF NOT EXISTS `film_hall` (
  `f_hall_id` int(5) NOT NULL AUTO_INCREMENT,
  `manager_id` int(5) NOT NULL,
  `hall_name` varchar(25) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`f_hall_id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(10) NOT NULL,
  `film_name` varchar(25) NOT NULL,
  `description` varchar(300) NOT NULL,
  `trailer_link` varchar(200) NOT NULL,
  `showing_date` date NOT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `l_id` int(6) NOT NULL AUTO_INCREMENT,
  `f_h_id` int(5) NOT NULL,
  `s_id` int(2) NOT NULL,
  `location` varchar(10) NOT NULL,
  PRIMARY KEY (`l_id`),
  KEY `f_h_id` (`f_h_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `m_id` int(5) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic` varchar(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `email` varchar(50) NOT NULL,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE IF NOT EXISTS `operators` (
  `o_id` int(5) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `f_hall_id` int(5) NOT NULL,
  PRIMARY KEY (`o_id`),
  KEY `f_hall_id` (`f_hall_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `se_id` int(2) NOT NULL AUTO_INCREMENT,
  `cost` int(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `t_id` int(20) NOT NULL,
  `cl_id` int(10) NOT NULL,
  `lo_id` int(6) NOT NULL,
  `fil_id` int(10) NOT NULL,
  `s_date` date NOT NULL,
  `show_time` time NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `cl_id` (`cl_id`,`lo_id`),
  KEY `fil_id` (`fil_id`),
  KEY `lo_id` (`lo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_hall`
--
ALTER TABLE `film_hall`
  ADD CONSTRAINT `film_hall_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`m_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `seats` (`se_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`f_h_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_ibfk_1` FOREIGN KEY (`f_hall_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`lo_id`) REFERENCES `location` (`l_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`fil_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`cl_id`) REFERENCES `client` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
