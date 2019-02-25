-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 03:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corptravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `booking_type` varchar(50) NOT NULL,
  `booking_code` int(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_type`, `booking_code`, `status`, `date_time`, `timestamp`) VALUES
(1, 'Transport', 100, 'Available', '0000-00-00 00:00:00', '2019-02-19 14:42:36'),
(2, 'Car', 100, 'Booked', '0000-00-00 00:00:00', '2019-02-19 14:42:36'),
(45, '45', 45, '45', '0000-00-00 00:00:00', '2019-02-19 14:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Copies` int(3) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(4) NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `Borrowed Date` date NOT NULL,
  `Returned Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `Copies`, `description`, `price`, `imagePath`, `Borrowed Date`, `Returned Date`) VALUES
('1', 'Batman vs Superman Ultimate Edition', 5, 'Fearing the actions of a god-like Super Hero left unchecked, Gotham City\'s own formidable, forceful vigilante takes on Metropolis\'s most revered, modern-day savior, while the world wrestles with what sort of hero it really needs. And with Batman and Superman at war with one another, a new threat quickly arises, putting mankind in greater danger than it\'s ever known before.', 499, 'images/batman-vs-superman-poster-alfred.jpg', '2019-01-01', '2019-01-13'),
('2', 'Sarkar', 4, 'Sarkar is a 2018 Indian Tamil-language action drama film written and directed by AR Murugadoss, and produced by Kalanithi Maran under the banner Sun Pictures.', 499, 'images/inception.jpg', '2019-01-08', '2019-01-10'),
('3', 'Ratchasan', 4, 'A rookie cop attempts to track down a serial killer who is murdering young school girls.', 499, 'images/TheDarkKnightRises_TeaserPoster.jpg', '2019-01-03', '2019-01-15'),
('4', 'Dark Knight', 2, 'With the help of allies Lt. Jim Gordon (Gary Oldman) and DA Harvey Dent (Aaron Eckhart), Batman (Christian Bale) has been able to keep a tight lid on crime in Gotham City. ', 499, 'images/drive-movie-poster.jpeg', '2019-01-04', '2019-01-10'),
('5', 'Dark Knight Rises', 4, 't has been eight years since Batman (Christian Bale), in collusion with Commissioner Gordon (Gary Oldman), vanished into the night. Assuming responsibility for the death of Harvey Dent, Batman sacrificed everything for what he and Gordon hoped would be the greater good.', 499, 'images/enemy%2001.jpg', '2019-01-01', '2019-01-10'),
('6', 'Maya', 5, 'Maya is a 2016 Sri Lankan Sinhala 3D action horror film directed by Donald Jayantha and co-produced by Raja Sadesh Kumar and Srimathi Sadesh Kumar.', 488, 'images/inglorious.jpg', '2019-01-01', '2019-01-14');

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
-- Dumping data for table `trans_data`
--

INSERT INTO `trans_data` (`id`, `passenger_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `req_first_name`, `req_last_name`, `email`, `req_contact_no`, `dept_name`, `cost_center`, `journey_start`, `journey_end`, `journey_start_time`, `journey_end_time`, `description`, `timestamp`) VALUES
(1, 'Arul', 774584812, '1', '2', 'John', 'Doe', 'test@test.com', 77458, '2', 2, 'Feb 05, 2019', 'Feb 21, 2019', '07:24:00', '07:24:00', 'Test', '2019-02-24 01:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `pw_reset` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `dob`, `password`, `pw_reset`, `user_type`) VALUES
(11, 'Nisal', 'Nisal@nisal.com', '1996-12-12', '12345', '12345', 'admin'),
(12, 'Arul', 'arul@gmail.com', '1222-12-12', '1234', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `trans_data`
--
ALTER TABLE `trans_data`
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
-- AUTO_INCREMENT for table `trans_data`
--
ALTER TABLE `trans_data`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
