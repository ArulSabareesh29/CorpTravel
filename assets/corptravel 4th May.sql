-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 06:11 PM
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
-- Table structure for table `airport_transport`
--

CREATE TABLE `airport_transport` (
  `id` int(50) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `contact_no` int(25) NOT NULL,
  `line_mgr` varchar(50) NOT NULL,
  `alt_line_mgr` varchar(50) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `pickup_location` varchar(250) NOT NULL,
  `drop_location` varchar(250) NOT NULL,
  `flight_number` varchar(25) NOT NULL,
  `luggage_number` int(10) NOT NULL,
  `flight_date` varchar(250) NOT NULL,
  `journey_start_time` time NOT NULL,
  `journey_end_time` time NOT NULL,
  `description` varchar(250) NOT NULL,
  `approval_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport_transport`
--

INSERT INTO `airport_transport` (`id`, `passenger_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `dept_name`, `pickup_location`, `drop_location`, `flight_number`, `luggage_number`, `flight_date`, `journey_start_time`, `journey_end_time`, `description`, `approval_status`) VALUES
(22, 'Arul', 774584812, 'John Doe', 'Ponting', 'Marketing', 'BIA', 'Ragama', '756', 2, 'May 20, 2019', '04:37:00', '06:37:00', 'Please be on time', ''),
(25, 'Vivek', 774584812, 'John Doe', 'Ponting', 'Marketing', 'BIA', 'Ragama', '756', 2, 'May 20, 2019', '04:37:00', '06:37:00', 'Please be on time', '');

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
(1, 'Transport', 100, 'Available', '2019-01-24 00:00:00', '2019-04-30 08:54:02'),
(2, 'Car', 100, 'Booked', '0000-00-00 00:00:00', '2019-02-19 14:42:36'),
(45, 'Van', 245, 'Booked', '0000-00-00 00:00:00', '2019-04-01 21:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `corp_feedback`
--

CREATE TABLE `corp_feedback` (
  `feedback_id` int(50) NOT NULL,
  `feedback_name` varchar(50) NOT NULL,
  `feedback_email` varchar(50) NOT NULL,
  `feedback_phone` int(20) NOT NULL,
  `feedback_message` varchar(250) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corp_feedback`
--

INSERT INTO `corp_feedback` (`feedback_id`, `feedback_name`, `feedback_email`, `feedback_phone`, `feedback_message`, `DateTime`) VALUES
(1, 'sad', 'sad@sd.com', 456456, 'tydfgdf', '0000-00-00 00:00:00'),
(5, 'Saba', 'sad@sd.com', 0, 'drfgsrdfg', '0000-00-00 00:00:00'),
(16, 'Sabareesh', 'Sabareesh@gmail.com', 774584812, 'Great Website', '0000-00-00 00:00:00'),
(17, 'Arul', 'arul@gmail.com', 774584812, 'Hello World', '0000-00-00 00:00:00'),
(18, 'Arul', 'arul@gmail.com', 774584812, 'Hello World', '0000-00-00 00:00:00'),
(19, 'Rajah', 'Rajah@gmail.com', 774584812, 'World Hello', '0000-00-00 00:00:00');

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
-- Table structure for table `flight_booking`
--

CREATE TABLE `flight_booking` (
  `booking_id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `from_airport` varchar(50) NOT NULL,
  `to_Airport` varchar(50) NOT NULL,
  `arrivalDate` varchar(50) NOT NULL,
  `departureDate` varchar(50) NOT NULL,
  `flight_Class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_data1`
--

CREATE TABLE `flight_data1` (
  `Code` varchar(3) DEFAULT NULL,
  `Airport` varchar(35) DEFAULT NULL,
  `Countries` varchar(3) DEFAULT NULL,
  `Cities` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_data1`
--

INSERT INTO `flight_data1` (`Code`, `Airport`, `Countries`, `Cities`) VALUES
('LVI', 'Southwest Georgia Regional Airport', 'USA', 'New York'),
('ABI', 'Atlantic City International Airport', 'UK', 'London'),
('BIA', 'Bandaranayaka International Airport', 'LK', 'Colombo'),
('KA', 'Kodiak Airport', 'IND', 'India'),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flight_data2`
--

CREATE TABLE `flight_data2` (
  `Airlines Name` varchar(15) DEFAULT NULL,
  `Plane ID` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_data2`
--

INSERT INTO `flight_data2` (`Airlines Name`, `Plane ID`) VALUES
('Emirates', 'EM1'),
('Etihad', 'ET1'),
('Ryanair', 'RY1'),
('Emirates', 'EM2'),
('Etihad', 'E2'),
('Ryanair', 'RY2'),
('Qatar', 'QA1'),
('Air Canada', 'AC1'),
('British Airways', 'BA1'),
('Air Canada', 'AC2'),
('British Airways', 'BA2');

-- --------------------------------------------------------

--
-- Table structure for table `flight_data3`
--

CREATE TABLE `flight_data3` (
  `Plane ID` varchar(3) DEFAULT NULL,
  `Date` varchar(10) DEFAULT NULL,
  `Departure Country` varchar(3) DEFAULT NULL,
  `Arrival Country` varchar(3) DEFAULT NULL,
  `Departure Time` int(3) DEFAULT NULL,
  `Arrival Time` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_data3`
--

INSERT INTO `flight_data3` (`Plane ID`, `Date`, `Departure Country`, `Arrival Country`, `Departure Time`, `Arrival Time`) VALUES
('EM1', '24/04/2019', 'LVI', 'BIA', 140, 400),
('EM2', '25/04/2019', 'LVI', 'ABI', 159, 402),
('RY1', '26/04/2019', 'LVI', 'KA', 160, 404),
('RY2', '27/04/2019', 'ABI', 'LVI', 161, 406),
('BA1', '28/04/2019', 'ABI', 'BIA', 162, 408),
('BA2', '29/04/2019', 'ABI', 'KA', 163, 410),
('QA1', '30/04/2019', 'KA', 'BIA', 164, 412),
('AC2', '01/05/2019', 'KA', 'ABI', 165, 414),
('AC1', '02/05/2019', 'KA', 'LVI', 166, 416);

-- --------------------------------------------------------

--
-- Table structure for table `night_taxi`
--

CREATE TABLE `night_taxi` (
  `id` int(50) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `contact_no` int(25) NOT NULL,
  `line_mgr` varchar(50) NOT NULL,
  `alt_line_mgr` varchar(50) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `pickup_location` varchar(250) NOT NULL,
  `drop_location` varchar(250) NOT NULL,
  `taxi_date` varchar(25) NOT NULL,
  `journey_start_time` time NOT NULL,
  `journey_end_time` time NOT NULL,
  `description` varchar(250) NOT NULL,
  `approval_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `night_taxi`
--

INSERT INTO `night_taxi` (`id`, `passenger_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `dept_name`, `pickup_location`, `drop_location`, `taxi_date`, `journey_start_time`, `journey_end_time`, `description`, `approval_status`) VALUES
(25, 'Arul', 777880812, 'John Doe', 'Ruwan', 'Marketing', 'Colombo', 'Ragama', '0000-00-00', '01:07:00', '05:07:00', 'Come on time', ''),
(26, 'Arul', 777880812, 'John Doe', 'Ruwan', 'Marketing', 'Colombo', 'Ragama', '0000-00-00', '01:07:00', '05:07:00', 'Come on time', ''),
(27, 'Arul', 777880812, 'John Doe', 'Ruwan', 'Marketing', 'Colombo', 'Ragama', '0000-00-00', '01:07:00', '05:07:00', 'Come on time', '');

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
  `dept_name` varchar(50) NOT NULL,
  `check_in` varchar(25) NOT NULL,
  `check_out` varchar(25) NOT NULL,
  `no_people` int(50) NOT NULL,
  `no_rooms` int(50) NOT NULL,
  `room_type` int(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_hotel`
--

INSERT INTO `trans_hotel` (`id`, `employee_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `dept_name`, `check_in`, `check_out`, `no_people`, `no_rooms`, `room_type`, `description`) VALUES
(6, 'Vivek', 772015212, 'Michael Marsh', 'Michael Marsh', 'Human Resources', '2019-03-23', '2019-03-30', 6, 6, 0, 'dfgdfg'),
(9, 'Arul', 777880812, 'John Doe', 'Ponting', 'Marketing', 'May 20, 2019', 'May 29, 2019', 6, 6, 0, 'Test');

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
  `dept_name` varchar(25) NOT NULL,
  `pickup_location` varchar(250) NOT NULL,
  `drop_location` varchar(250) NOT NULL,
  `journey_start` varchar(25) NOT NULL,
  `journey_end` varchar(25) NOT NULL,
  `journey_start_time` time NOT NULL,
  `journey_end_time` time NOT NULL,
  `description` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approval_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_transport`
--

INSERT INTO `trans_transport` (`id`, `passenger_name`, `contact_no`, `line_mgr`, `alt_line_mgr`, `dept_name`, `pickup_location`, `drop_location`, `journey_start`, `journey_end`, `journey_start_time`, `journey_end_time`, `description`, `timestamp`, `approval_status`) VALUES
(1, 'Arul', 774584812, 'John Doe', 'Michael Marsh', 'Marketing', 'Colombo', 'Hatton', 'Feb 05, 2019', 'Feb 21, 2019', '07:24:00', '07:24:00', 'Test', '2019-05-04 05:54:04', 'Approved'),
(15, 'vivek', 777880812, 'John Doe', 'Michael Marsh', 'HR', 'Hatton', 'Horana', 'Apr 22, 2019', 'Apr 25, 2019', '06:27:00', '05:27:00', 'Travel', '2019-05-04 05:54:13', 'Approved'),
(16, 'Arul', 777880812, 'John Doe', 'Ponting', 'Finance', 'Ragama', 'Colombo', 'May 07, 2019', 'May 08, 2019', '11:12:00', '03:13:00', 'Please be on Time', '2019-05-04 05:54:22', ''),
(18, 'Arul', 774584812, 'John Doe', 'Ponting', 'Finance', 'Colombo', 'Ragama', 'May 06, 2019', 'May 07, 2019', '11:22:00', '05:22:00', 'Please be on time', '2019-05-04 14:14:01', 'Decline');

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
-- Indexes for table `airport_transport`
--
ALTER TABLE `airport_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `corp_feedback`
--
ALTER TABLE `corp_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `corp_hotels`
--
ALTER TABLE `corp_hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `night_taxi`
--
ALTER TABLE `night_taxi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `airport_transport`
--
ALTER TABLE `airport_transport`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `corp_feedback`
--
ALTER TABLE `corp_feedback`
  MODIFY `feedback_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `corp_hotels`
--
ALTER TABLE `corp_hotels`
  MODIFY `hotel_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `night_taxi`
--
ALTER TABLE `night_taxi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `trans_hotel`
--
ALTER TABLE `trans_hotel`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trans_transport`
--
ALTER TABLE `trans_transport`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
