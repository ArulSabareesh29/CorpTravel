-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 12:27 PM
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
-- Table structure for table `corp_hotels`
--

CREATE TABLE `corp_hotels` (
  `hotel_id` int(50) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_type` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `single_room` varchar(10) NOT NULL,
  `double_room` varchar(10) NOT NULL,
  `deluxe_room` varchar(10) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_hotels`
--

INSERT INTO `corp_hotels` (`hotel_id`, `hotel_name`, `hotel_type`, `rating`, `location`, `single_room`, `double_room`, `deluxe_room`, `image_path`, `description`) VALUES
(101, 'Citrus', 'Hotel', '3*', 'https://goo.gl/maps/R84ZYvhfo8A2', '10000', '15000', '40000', 'img\\citrus.jpg', 'Citrus Leisure PLC is a public quoted company which entered the leisure industry with a commitment to build and manage a chain of distinctive hotels and resorts that are benchmarked against the most coveted in the world. Citrus intends to provide the most exceptional and memorable hospitality in Sri Lanka by exceeding guest expectations and by creating a travel experience like no other.'),
(102, 'The Kingsbury', 'Hotel', '5*', 'https://goo.gl/maps/PSUZ5pKrVdF2', '18000', '20000', '40000', 'img\\kingsbury.jpg', 'The Kingsbury is the crown jewel of the Leisure and Aviation sector of Sri Lanka’s leading conglomerate, Hayley’s PLC and was the first hotel to be reinstated as a five-star hotel in Colombo in 2017. Since its launch in 2012, it has grown from strength to strength gaining international acclaim including Regional Winner Luxury Business Hotel in South West Asia (2016) and Winner- Best Luxury Business Hotel in Sri Lanka (2017) at The World Luxury Hotel Awards.'),
(103, 'Galadari', 'hotel', '5*', 'https://goo.gl/maps/Cbeowv6xGM42', '18000', '20000', '50000', 'img/galadari.jpg', 'Having embraced over 3 decades of expertise in hospitality our vision and beliefs are firmly grounded in extending a true personalized service to all our guests, laced with an unforgettable luxury hotel experience.'),
(200, 'Nuwara eliya', 'Bungalow', '3*', 'https://goo.gl/maps/JHwf9k7iDiJ2', '5000', '10000', '15000', 'img/nuwara.jpg', 'Company Owned bungalow which could be used for various purposes for employees'),
(201, 'Bentota', 'Bungalow', '3*', 'https://goo.gl/maps/UhRaHxY8zq72', '5000', '10000', '15000', 'img/bentota.jpg', 'Company Owned bungalow which could be used for various purposes for employees'),
(202, 'Colombo', 'Bungalow', '3*', 'https://goo.gl/maps/pgubqJuRQoP2', '5000', '10000', '15000', 'img/bunglow.jpg', 'Company Owned bungalow which could be used for various purposes for employees');

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
-- Table structure for table `trans_hotel`
--

CREATE TABLE `trans_hotel` (
  `id` int(25) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `line_mgr` varchar(50) NOT NULL,
  `alt_line_mgr` varchar(50) NOT NULL,
  `req_first_name` varchar(50) NOT NULL,
  `req_last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `req_contact_no` int(25) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `cost_center` int(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `no_people` int(50) NOT NULL,
  `no_rooms` int(50) NOT NULL,
  `room_type` int(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_hotel`
--

INSERT INTO `trans_hotel` (`id`, `employee_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `req_first_name`, `req_last_name`, `email`, `req_contact_no`, `dept_name`, `cost_center`, `check_in`, `check_out`, `no_people`, `no_rooms`, `room_type`, `description`) VALUES
(1, 'John', 774584812, 'Michael Marsh', 'Michael Marsh', 'Hello', 'Doe', 'arul_96@outlook.com', 77452121, 'Michael Marsh', 269, '2019-03-09', '2019-03-14', 0, 0, 0, 'Food Non Veg'),
(2, 'Arul', 774584812, 'Michael Marsh', 'Rick Grimes', 'John', 'Doe', 'arul@example.com', 774584812, 'Supply Chain', 269, '2019-03-14', '2019-03-16', 0, 0, 0, 'Non Veg'),
(6, 'Vivek', 772015212, 'Michael Marsh', 'Michael Marsh', 'dfg', 'dfg', 'arul_96@outlook.com', 54564, 'Human Resources', 269, '2019-03-23', '2019-03-30', 6, 6, 0, 'dfgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `trans_transport`
--

CREATE TABLE `trans_transport` (
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
-- Dumping data for table `trans_transport`
--

INSERT INTO `trans_transport` (`id`, `passenger_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `req_first_name`, `req_last_name`, `email`, `req_contact_no`, `dept_name`, `cost_center`, `journey_start`, `journey_end`, `journey_start_time`, `journey_end_time`, `description`, `timestamp`) VALUES
(1, 'Arul', 774584812, '1', '2', 'John', 'Doe', 'test@test.com', 77458, '2', 2, 'Feb 05, 2019', 'Feb 21, 2019', '07:24:00', '07:24:00', 'Test', '2019-02-24 01:54:13'),
(2, 'Chris', 774584812, '1', '2', 'Hello', 'Doe', 'arul@example.com', 774584812, '1', 1, 'Mar 12, 2019', 'Mar 27, 2019', '05:47:00', '05:47:00', 'Hello', '2019-03-07 12:17:57'),
(3, 'John', 0, '1', '1', 'sads', 'sad', 'arul_96@outlook.com', 54564654, 'John Doe', 2, 'Mar 26, 2019', 'Mar 27, 2019', '08:11:00', '06:11:00', 'Test', '2019-03-07 12:41:35'),
(4, 'asf', 0, '2', '1', 'asf', 'asf', 'asf@asd.com', 45, 'John Doe', 2, 'Mar 25, 2019', 'Mar 26, 2019', '06:53:00', '04:53:00', 'asd', '2019-03-10 14:23:56'),
(5, 'Chris', 774584812, 'Michael Marsh', '2', 'Hello', 'Doe', 'arul_96@outlook.com', 64543454, 'John Doe', 2, 'Mar 20, 2019', 'Mar 29, 2019', '01:37:00', '06:37:00', '5\r\n5hjgjhg', '2019-03-14 08:07:36');

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
(1, 'Nisal', 'Nisal@nisal.com', '1996-12-12', '12345', '12345', 'admin'),
(2, 'Arul', 'arul@gmail.com', '1222-12-12', '1234', '1234', 'user'),
(3, 'Christy', 'christy@gmail.com', '1996-12-12', '1234', '1234', 'vendor'),
(4, 'Vivek', 'vivek01@gmail.com', '1996-03-01', '1234567', '1234567', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `corp_hotels`
--
ALTER TABLE `corp_hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `trans_hotel`
--
ALTER TABLE `trans_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_transport`
--
ALTER TABLE `trans_transport`
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
-- AUTO_INCREMENT for table `corp_hotels`
--
ALTER TABLE `corp_hotels`
  MODIFY `hotel_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `trans_hotel`
--
ALTER TABLE `trans_hotel`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trans_transport`
--
ALTER TABLE `trans_transport`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
