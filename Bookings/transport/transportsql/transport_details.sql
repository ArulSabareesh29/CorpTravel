-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 07:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans_data`
--

CREATE TABLE `trans_data` (
  `id` int(25) NOT NULL,
  `passenger_name` varchar(50) NOT NULL,
  `contact_no` int(25) NOT NULL,
  `line_mgr` varchar(25) NOT NULL,
  `alt_line_mgr` varchar(25) NOT NULL,
  `req_first_name` varchar(50) NOT NULL,
  `req_last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `req_contact_no` int(25) NOT NULL,
  `dept_name` varchar(25) NOT NULL,
  `cost_center` int(25) NOT NULL,
  `journey_start` varchar(25) NOT NULL,
  `journey_end` varchar(25) NOT NULL,
  `journey_start_time` time NOT NULL,
  `journey_end_time` time NOT NULL,
  `description` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_data`
--
ALTER TABLE `trans_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_data`
--
ALTER TABLE `trans_data`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
