-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2015 at 01:40 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `christchurch_homestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
`id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `education_provider` varchar(255) NOT NULL,
  `date_from` bigint(20) DEFAULT NULL,
  `date_to` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  `testimonial` text,
  `last_updated` bigint(20) NOT NULL,
  `date_created` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `first_name`, `last_name`, `nationality`, `gender`, `age`, `education_provider`, `date_from`, `date_to`, `status`, `archive`, `testimonial`, `last_updated`, `date_created`) VALUES
(13, 15, 'Emmett', 'Diddle', 'Christian', 'female', 15, 'Moobix', 1299625883, 1426720283, 'indefinate', 0, NULL, 1426720283, 1426720283),
(14, 9, 'Clemintine', 'Ashrak', 'Lebonese', 'male', 54, 'St Martins', 1376518329, 1431468729, 'Pending', 0, NULL, 1426720329, 1426720329),
(15, 17, 'Henry', 'Biscuit', 'Australian', 'female', 63, 'Simpleton', 1331161200, 1342562400, 'Confirmed', 0, NULL, 1426725321, 1426720391),
(16, 16, 'afasdgs', 'asdgasd', 'asdgb', 'female', 12, 'asdgsdh', 1331593200, 1353538800, 'Confirmed', 0, NULL, 1426723559, 1426723559),
(17, 9, '', '', '', '0', 0, '', 1344381037, 1426723837, 'Confirmed', 0, NULL, 1426723837, 1426723701);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date_created` bigint(20) NOT NULL,
  `last_modified` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `date_created`, `last_modified`) VALUES
(9, 1, 1426719780, 1426719780),
(15, 2, 1426720187, 1426720187),
(16, 3, 1426720195, 1426720195),
(17, 4, 1426720201, 1426720201);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
