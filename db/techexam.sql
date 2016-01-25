-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2016 at 07:46 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `new_image_name` varchar(60) NOT NULL,
  `property_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `type`, `extension`, `new_image_name`, `property_name`) VALUES
(6, 'anami1', 'image/jpeg', 'jpg', 'anami1-1452580890.jpg', 'Anami Homes'),
(7, 'anami5', 'image/jpeg', 'jpg', 'anami5-1452580890.jpg', 'Anami Homes'),
(8, 'anami423', 'image/jpeg', 'jpg', 'anami423-1452580890.jpg', 'Anami Homes'),
(9, 'anamo2-actual_model_web', 'image/jpeg', 'jpg', 'anamo2-actual_model_web-1452580890.jpg', 'Anami Homes'),
(10, 'camella1', 'image/jpeg', 'jpg', 'camella1-1452580921.jpg', 'Camella Homes'),
(11, 'camella2', 'image/jpeg', 'jpg', 'camella2-1452580921.jpg', 'Camella Homes'),
(12, 'camella76564', 'image/jpeg', 'jpg', 'camella76564-1452580921.jpg', 'Camella Homes'),
(13, 'deca_homes_bancal', 'image/jpeg', 'jpg', 'deca_homes_bancal-1452580946.jpg', 'Deca Homes'),
(14, 'deca-homes-tigatto-1', 'image/jpeg', 'jpg', 'deca-homes-tigatto-1-1452580947.jpg', 'Deca Homes'),
(15, 'download', 'image/jpeg', 'jpg', 'download-1452580947.jpg', 'Deca Homes'),
(16, 'la-cumbre-22', 'image/jpeg', 'jpg', 'la-cumbre-22-1452580971.jpg', 'La Cumbre'),
(17, 'la-cumbre-subd', 'image/jpeg', 'jpg', 'la-cumbre-subd-1452580971.jpg', 'La Cumbre'),
(18, 'eastland', 'image/jpeg', 'jpg', 'eastland-1452581001.jpg', 'Eastland Subdivision'),
(19, 'eastland54', 'image/gif', 'gif', 'eastland54-1452581001.gif', 'Eastland Subdivision');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `name`, `address`) VALUES
(5, 'Anami Homes', 'Tayud Consolacion, Cebu'),
(6, 'Camella Homes', 'Pit-os, Talamban Cebu'),
(7, 'Deca Homes', 'Lapu-Lapu City Cebu'),
(8, 'La Cumbre', 'East Binabag Tayud Consolacion Cebu'),
(9, 'Eastland Subdivision', 'Lilo-an Cebu ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created`) VALUES
(1, 'Richtermark Baay', 'tm.richtermarkbaay@gmail.com', 'tmerks', '2016-01-11 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
