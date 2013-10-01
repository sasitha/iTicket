-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2013 at 09:47 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `n_ic`, `email`) VALUES
(1, '880854v', 'jaye1944@gmail.com'),
(2, '234758bb', 'ja44@gmail.com'),
(3, '88956', 'jaye1944@gmail.com'),
(4, '880854', 'ja@com'),
(5, 'jaye1944@gm', '888'),
(6, '888', 'eeweewe'),
(7, '3456', 'adsr');

-- --------------------------------------------------------

--
-- Table structure for table `f_h_arrangement`
--

CREATE TABLE IF NOT EXISTS `f_h_arrangement` (
  `arr_id` int(3) NOT NULL AUTO_INCREMENT,
  `f_h_id` int(5) NOT NULL,
  `rows` int(5) NOT NULL,
  `coloms` int(5) NOT NULL,
  `no_seats` int(5) NOT NULL,
  PRIMARY KEY (`arr_id`),
  KEY `f_h_id` (`f_h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `f_h_arrangement`
--

INSERT INTO `f_h_arrangement` (`arr_id`, `f_h_id`, `rows`, `coloms`, `no_seats`) VALUES
(1, 1, 4, 11, 38);

-- --------------------------------------------------------

--
-- Table structure for table `film_hall`
--

CREATE TABLE IF NOT EXISTS `film_hall` (
  `f_hall_id` int(5) NOT NULL AUTO_INCREMENT,
  `manager_id` int(5) NOT NULL,
  `hall_name` varchar(25) NOT NULL,
  `location` varchar(100) NOT NULL,
  `film_id` int(10) NOT NULL,
  PRIMARY KEY (`f_hall_id`),
  KEY `manager_id` (`manager_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `film_hall`
--

INSERT INTO `film_hall` (`f_hall_id`, `manager_id`, `hall_name`, `location`, `film_id`) VALUES
(1, 1, 'Sky cinama', 'No 11,\r\nPeradeniya road,\r\nKandy.', 1),
(2, 1, 'city cinema', 'No 45, main street, Kandy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(10) NOT NULL AUTO_INCREMENT,
  `film_name` varchar(25) NOT NULL,
  `description` varchar(300) NOT NULL,
  `trailer_link` varchar(200) NOT NULL,
  `showing_date` date NOT NULL,
  `thumb_link` varchar(200) NOT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `film_name`, `description`, `trailer_link`, `showing_date`, `thumb_link`) VALUES
(1, 'Skay fall', 'Nice film', 'Www.youtube.com/skyfall', '2013-09-03', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`l_id`, `f_h_id`, `s_id`, `location`) VALUES
(1, 1, 1, 'r1c1'),
(2, 1, 1, 'r1c2'),
(3, 1, 1, 'r1c3'),
(4, 1, 1, 'r1c4'),
(5, 1, 1, 'r1c5'),
(6, 1, 1, 'r1c6'),
(7, 1, 1, 'r1c7'),
(8, 1, 1, 'r1c8'),
(9, 1, 1, 'r1c9'),
(10, 1, 1, 'r1c10'),
(11, 1, 1, 'r1c11'),
(12, 1, 1, 'r2c1'),
(13, 1, 1, 'r2c2'),
(14, 1, 1, 'r2c3'),
(15, 1, 1, 'r2c4'),
(16, 1, 1, 'r2c5'),
(17, 1, 1, 'r2c6'),
(18, 1, 1, 'r2c7'),
(19, 1, 1, 'r2c8'),
(20, 1, 1, 'r2c9'),
(21, 1, 1, 'r2c10'),
(22, 1, 2, 'r3c1'),
(23, 1, 2, 'r3c2'),
(24, 1, 2, 'r3c3'),
(25, 1, 2, 'r3c4'),
(26, 1, 2, 'r3c5'),
(27, 1, 2, 'r3c6'),
(28, 1, 2, 'r3c7'),
(29, 1, 2, 'r2c8'),
(30, 1, 2, 'r3c9'),
(31, 1, 2, 'r3c10'),
(32, 1, 3, 'r4c1'),
(33, 1, 3, 'r4c2'),
(34, 1, 3, 'r4c3'),
(35, 1, 3, 'r4c4'),
(36, 1, 3, 'r4c5'),
(37, 1, 3, 'r4c6'),
(38, 1, 3, 'r4c7');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`m_id`, `f_name`, `l_name`, `email`, `nic`) VALUES
(1, 'Nimal', 'Silva', 'Nsilva@gmail.com', '470845123v');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(3, 'amal@ghl.com'),
(2, 'ja44@gmail.com'),
(1, 'wmcj76@gmail.com');

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
-- Table structure for table `seat_prices`
--

CREATE TABLE IF NOT EXISTS `seat_prices` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `f_h_id` int(5) NOT NULL,
  `s_id` int(2) NOT NULL,
  `cost` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `f_h_id` (`f_h_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `seat_prices`
--

INSERT INTO `seat_prices` (`id`, `f_h_id`, `s_id`, `cost`) VALUES
(1, 1, 1, '250'),
(2, 1, 2, '500'),
(3, 1, 3, '800'),
(4, 2, 1, '350');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `se_id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`se_id`, `type`) VALUES
(1, 'ODC'),
(2, 'BALCONY'),
(3, 'BOX');

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

CREATE TABLE IF NOT EXISTS `show_times` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `f_h_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `f_h_id` (`f_h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `show_times`
--

INSERT INTO `show_times` (`id`, `time`, `f_h_id`) VALUES
(1, '10:30:00', 1),
(2, '13:30:00', 1),
(3, '18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`data`) VALUES
('128');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `t_id` int(20) NOT NULL AUTO_INCREMENT,
  `cl_id` int(10) NOT NULL,
  `lo_id` int(6) NOT NULL,
  `fil_id` int(10) NOT NULL,
  `s_date` date NOT NULL,
  `show_time_id` int(5) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `cl_id` (`cl_id`,`lo_id`),
  KEY `fil_id` (`fil_id`),
  KEY `lo_id` (`lo_id`),
  KEY `show_time_id` (`show_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_id`, `cl_id`, `lo_id`, `fil_id`, `s_date`, `show_time_id`) VALUES
(1, 1, 1, 1, '2013-10-01', 1),
(2, 1, 2, 1, '2013-10-01', 1),
(3, 1, 3, 1, '2013-10-01', 1),
(4, 1, 4, 1, '2013-10-01', 1),
(5, 2, 36, 1, '2013-10-01', 1),
(6, 2, 17, 1, '2013-10-01', 1),
(7, 3, 7, 1, '2013-10-03', 1),
(8, 4, 19, 1, '2013-10-15', 1),
(9, 5, 28, 1, '2013-10-20', 1),
(10, 6, 7, 1, '2013-10-04', 1),
(11, 6, 17, 1, '2013-10-04', 1),
(12, 6, 18, 1, '2013-10-04', 1),
(13, 7, 28, 1, '2013-10-04', 1),
(14, 7, 35, 1, '2013-10-04', 1),
(15, 7, 34, 1, '2013-10-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_data`
--

CREATE TABLE IF NOT EXISTS `ticket_data` (
  `client_id` int(5) DEFAULT NULL,
  `key_val` varchar(129) NOT NULL,
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_data`
--

INSERT INTO `ticket_data` (`client_id`, `key_val`) VALUES
(4, 'CORbH+5qSTgTZByV8U49EgHZ7Cad8vwU/Fk0uDmkhXeK/AaliO1rfO2G/2F2KbtTWGyIFAM8VZPbw9PEbB5BBQ=='),
(5, 'k37eWlz2EEckpOg3ZwLOCZvCADIbz1XzHumRKr6ppT4+rrIogbQQW99SB4+fwAbesAqPA0lFvHksIFBBYSComlk8VQXN/xmONWyhtyMo0+8Zs3z1CqYJZ+3d+pjo8NJy'),
(6, 'm9Za6sl1Pfmv4r3lRBbDCoZEDl1K2POgShG3Mh4GzPfzQq3wcVNjlcFKo8RKutcArdDVPd/SGirqPOkdicz+G25I2qlHOZowbtPb5PGsDIW48t1CxP7WTlrKR4Ww2B6+'),
(7, 'wfoZ0RLOgfTcLkW0FhdObby5XhOkgsdriK7P0QBX6CpaA6+HWngvzFT3Qkp+68NUUff2YWEOVwrTI9fZrMaywEznQtnj39U9keUeu/pzLILcm51nLoqCURkOeqzaozPH');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `f_h_arrangement`
--
ALTER TABLE `f_h_arrangement`
  ADD CONSTRAINT `f_h_arrangement_ibfk_1` FOREIGN KEY (`f_h_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film_hall`
--
ALTER TABLE `film_hall`
  ADD CONSTRAINT `film_hall_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`m_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `film_hall_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`f_h_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `seats` (`se_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_ibfk_1` FOREIGN KEY (`f_hall_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `seat_prices`
--
ALTER TABLE `seat_prices`
  ADD CONSTRAINT `seat_prices_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seats` (`se_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_prices_ibfk_2` FOREIGN KEY (`f_h_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_times`
--
ALTER TABLE `show_times`
  ADD CONSTRAINT `show_times_ibfk_1` FOREIGN KEY (`f_h_id`) REFERENCES `film_hall` (`f_hall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`lo_id`) REFERENCES `location` (`l_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`fil_id`) REFERENCES `films` (`film_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`show_time_id`) REFERENCES `show_times` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`cl_id`) REFERENCES `client` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
