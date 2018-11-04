-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 08:45 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `house_id` int(5) NOT NULL,
  `total_price` int(11) NOT NULL,
  `movein` date DEFAULT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `user_id`, `house_id`, `total_price`, `movein`, `checkin`, `checkout`) VALUES
(29, 19, 9, 5000, NULL, '2018-10-27', '2018-11-30'),
(30, 17, 16, 9000, NULL, '2018-11-01', '2018-11-30'),
(33, 17, 23, 1000, NULL, '2018-11-08', '2018-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `feedbackid` int(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `inquiry` varchar(300) NOT NULL,
  `response` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`feedbackid`, `fname`, `lname`, `email`, `county`, `inquiry`, `response`) VALUES
(1, 'Miriam', 'Mmboga', 'mmboga@gmail.com', 'Busia', 'Are site visits allowed?', ''),
(8, 'Miriam', 'Mmboga', 'mmboga@gmail.com', 'Kajiado', 'Can i visit the hostel before moving in?', ''),
(9, 'Miriam', 'Mmboga', 'mmboga@gmail.com', 'Kericho', 'Is this hostel worth investing in?', ''),
(10, 'Miriam', 'Mmboga', 'mmbogamiriam2@gmail.com', 'Kericho', 'Hello', ''),
(11, 'Miriam', 'Mmboga', 'mmbogamiriam2@gmail.com', 'Nairobi', 'Can i check out more than 2 accommodations?', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `house_name` varchar(500) NOT NULL,
  `house_price` int(5) NOT NULL,
  `numberofrooms` int(5) NOT NULL,
  `occupied` int(11) NOT NULL,
  `vacant` int(11) NOT NULL,
  `image` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `house_description` varchar(1000) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `house_name`, `house_price`, `numberofrooms`, `occupied`, `vacant`, `image`, `category`, `house_description`, `location`) VALUES
(3, 'Central Court', 6700, 2, 1, 0, './house_images/411c07f3af1c9648f8fccb7ded43ac8bmeme.jpg', 'Bedsitter', 'One bedroom house within a friendly neighbourhood. Social amenities are available.', 'Langata'),
(7, 'Gamal Hostel', 4000, 10, 0, 0, './house_images/675ca2f4b5c89dc3c982911a952f6f58hostel.jpg', 'Shared Room', 'Suitable hostel for students who love shared spaces.', 'West Madaraka'),
(8, 'Silicon Valley', 6000, 1, 0, 0, './house_images/9f84dcd413f5a22a1db0ff97ef77a229lounge.jpeg', 'Servant Quarter', 'Serene environment for study without disturbance.', 'Ngong'),
(9, 'Kilimani Heights', 5000, 6, 0, 0, './house_images/a06dd636bf383cfa79efceab898e64b3pic12.jpg', 'Shared Room', 'An ample space to accommodate a maximum of 8 people.It is fitted with a standby generator to avoid issues of blackouts.', 'Kahawa West'),
(10, 'Kafoca Estate', 13000, 6, 0, 0, './house_images/27aff5c93dbd2fa526fd44742061afd3pic2.jpg', 'Bedsitter', 'Memorable environment', 'Langata'),
(11, 'Kilimani Heights', 4000, 4, 0, 0, './house_images/1f0be07757b912cc8c04cc89b80aabe4home1.jpg', 'Shared Room', 'Ample reading space and environment.', 'West Madaraka'),
(12, 'Mbagathi Hostel', 13000, 1, 0, 0, './house_images/d2b5b999ac37ba85691b8b8c8779a053Students-lounge.jpeg', 'One Bedroom', 'Great area', 'Ngong'),
(13, 'Adabu Suites', 6000, 1, 0, 0, './house_images/5470344262261458e4b7d7b91a9ee0eehostel.jpg', 'Servant Quarter', 'Beach view terrace', 'Kahawa West'),
(14, 'Block Heights', 1900, 2, 0, 0, './house_images/23a692417d6e568c78aef4ed85b7ed00nai.jpg', 'One Bedroom', 'Best area', 'Kasarani'),
(16, 'Tulia Houses', 9000, 70, 0, 70, './house_images/026e4ea49b35ac1860762fddfe2939f7pic6.jpg', 'Servant Quarter', 'Good tenants.', 'Langata'),
(17, 'Kasuku Hostel', 8000, 10, 0, 0, './house_images/2b579f030ccf7a198e7bab5aecf652ceadd1.jpg', 'Shared Room', 'Wifi connection\r\nSecure neighbourhood\r\nClose to the Superhighway, a police station and a Roysambu market place\r\nHouse students from: KCA University, USIU, Kenyatta University', 'Zimmerman'),
(18, 'Sana Men Hostel', 9000, 5, 0, 0, './house_images/b5eee448aa43a430d5b5531810666642add2.jpg', 'Shared Room', 'Men Hostel \r\nGood and secure neighbourhood\r\nFew metres from The Hub Karen, a police station, a hospital and a church.\r\nHouse students from Cooperative University, CUEA and JKUAT Karen', 'Karen Low'),
(19, 'Heri Apartments', 15000, 10, 0, 0, './house_images/01649eb9e722255fe3cf6dda34261968add3.jpg', 'Bedsitter', 'Great compact house for individuals who love personal space.\r\nRunning water, electricity and Wi-Fi connection.\r\nDesignated cooking area.\r\nHouses students from Strathmore, Daystar Valley Road and Riara University.', 'Nairobi West'),
(20, 'Square Houses ', 10000, 8, 0, 0, './house_images/8dae1122d3a1ec30e918622fc1edd3c1add4.jpg', 'Bedsitter', 'Composed environment.\r\n10 mins walk to the CBD.\r\nClose to a police station, a church, a hospital and entertainment joints.\r\nHouses students from UON and MKU town campus.', 'Ngara'),
(21, 'Skyline Ladies Hostel', 10000, 7, 0, 0, './house_images/b8b1e7feef9e862df08d1f3fdf7e4a67add5.jpg', 'Bedsitter', 'Luxury bedsitter with a bed 5 by 6.\r\nRunning water, electricity and Wi-Fi connection.\r\nSecure location.\r\nHouses students from Kenyatta University, JKUAT Juja and Zetech University', 'Ruiru'),
(22, 'Darlington Houses ', 15000, 3, 0, 0, './house_images/c6191d7d3ab78b0313576f7cbfa0877cadd6.jpg', 'One Bedroom', 'Great space to learn on self-living.\r\nRunning water, electricity and Wi-Fi connection.\r\nFamily estate that is well maintained.\r\nClose to a hospital and police station.\r\nHouses students from USIU, Utalii College and Mahanaim College.', 'Muthaiga View'),
(23, 'Sautan Accommodations', 1000, 3, 0, 0, './house_images/888c9ecf3b875dc54aa73dac881c572badd7.jpg', 'Servant Quarter', 'Great area neighbourhood.\r\nClose to a church, a hospital and a market place.\r\n5 min walk to Galleria Mall.\r\nHouses students from Strathmore University, CUEA, JKUAT Karen and Cooperative University.', 'Langata'),
(24, 'Kamanda Heights', 9000, 4, 0, 0, './house_images/50c9a0535ca486620a5516c4250baee4add8.jpg', 'Servant Quarter', 'Spacious SQ in the leafy suburbs of Runda.\r\nNice owners looking to rent it out to a student who enjoys serene environments.\r\nUnlimited Wi-Fi, water and electricity.\r\nMinimal restrictions by the owner.\r\nHouses students from USIU, KCA and Mahanaim College.', 'Runda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `uni` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fullname`, `gender`, `uni`, `phone`, `username`, `email`, `password`, `type`) VALUES
(17, 'Njoroge Snr.', 'male', 'University of Nairobi', '0721345678', 'Njoroge', 'njoro@gmail.com', '$2y$10$VZG71sb8OqjbmCPdbG3cgO7OS9sp5w8RKJzKf2P0e8FRLzrInNAgW', 'other'),
(18, 'Miriam Mmboga', 'female', 'USIU', '0705793148', 'miriam', 'mmbogamiriam2@gmail.com', '$2y$10$ZrGzHf9mEMhvHRBBfOXhKuNmjKbQByutGL3Nf/IJH3CTRAVD8.6r.', 'student'),
(19, 'Joan Warukira', 'female', 'Strathmore University', '0712746036', 'jwarukira', 'joanwarukira@gmail.com', '$2y$10$/f.J22vmGazVQIrHJdCQa.7qJSrEFMBxziB7CeI6S2q.VGsL4n6wG', 'student'),
(20, 'Lynette nkirote', 'female', 'University of Nairobi', '0703870403', 'shee', 'shee@gmail.com', '$2y$10$06B7g4K1Ia5d5CoMfYRWY.VaWwXWCuYyOnIq26kL8fZ77muNBwhM2', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `feedbackid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
