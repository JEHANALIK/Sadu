-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 02:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sadu`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `kashtaDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kashta-booking`
--

CREATE TABLE `kashta-booking` (
  `bookId` int(11) NOT NULL,
  `kashtaDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kashtadetails`
--

CREATE TABLE `kashtadetails` (
  `kashtaDetailsId` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `price` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kashtadetails`
--

INSERT INTO `kashtadetails` (`kashtaDetailsId`, `details`, `name`, `pic`, `price`) VALUES
(2, 'it suits 10- 12 people, it has many things such as small table with flowers for celebrating, a projector, a speaker with microphone, night lights, game box, some snacks and bottles of water.', 'Ghaim Kashta', 'img2.jpg', '40.000'),
(3, 'a nice kashta that suits 4 to 6 people, has different things same as speaker, games and table. ', 'Couples Kashta', 'img3.jpg', '20.000'),
(4, 'seating arrangement for 12 people with carpet, mood lighting . BBQ grilled, coal and generator', 'kastalux', 'img4.jpg', '60.000'),
(5, 'seating arragement for 12 person includes carpet, mood lighting, BBQ grilled generator, speaker, games, blanket and kettle.', 'kastanyola.bah', 'img5.jpg', '60.000'),
(6, 'seating arrangement for 9 to 12 people, timing for 6 hours includes mood light, projector, speaker , games, BBQ grilled and generator.', 'modern kashta', 'img6.jpg', '60.000'),
(7, 'seating arrangement for 2 person for 4 hours includes mood lighting , speaker, games and BBQ Grilled and we can decorate for any celebration.', 'bohemy kashta', 'img7.jpg', '25.000'),
(8, 'seating arrangement for five people for 6 hours that includes mood light, high quality projector, speaker, games, BBQ grilled and generator.', 'Star Kashta', 'img8.jpg', '40.000'),
(9, 'arrangement seating for 11 people for 4 hours includes mood lightning, BBQ grilled, games, speaker and blanket.', 'The Ancher - package one', 'img9.jpg', '35.000'),
(10, 'seating arrangement for 2 to 6 people for 4 hours that includes BBQ grilled, mood light, speaker and gaming box.', 'The Ancher - package two', 'img10.jpg', '16.000'),
(11, 'seating arrangement 4 to 8 people for 6 hours that includes BBQ grilled, mood light, speaker, gaming box and some snacks.', '24kashta.bh', 'img11.jpg', '35.000'),
(12, 'seating arrangement for 10 people for 5 hours that includes BBQ grilled, mood light, speaker and gaming box.', 'The Ancher - package three', 'img13.jpg', '40.000'),
(13, 'seating arrangement for 10 people for 4 hours that includes BBQ grilled, mood light, speaker and gaming box, skettle and garbage.', 'Kashta27', 'img12.jpg', '45.000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `kashtaDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `phone`, `email`, `user_type`) VALUES
(8, 'admin', '$2y$10$ZrO7Tt/HhS0rGO6c8Jz9rOINPrUuAxwV3O5fmBiGZL/0C0EWfrzKi', '32121111', 'admin@admin.com', 'admin'),
(9, 'user', '$2y$10$c6Ti/0LV.tsClC.KvExpueT1/WsAClBXRfvQJgx.BnbJ/Xx3p2ij2', '38888866', 'user@user.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kashta-booking`
--
ALTER TABLE `kashta-booking`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `kashtaDetailsId` (`kashtaDetailsId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `kashtadetails`
--
ALTER TABLE `kashtadetails`
  ADD PRIMARY KEY (`kashtaDetailsId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `payment_userId_FK` (`userId`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kashta-booking`
--
ALTER TABLE `kashta-booking`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kashtadetails`
--
ALTER TABLE `kashtadetails`
  MODIFY `kashtaDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kashta-booking`
--
ALTER TABLE `kashta-booking`
  ADD CONSTRAINT `kashta-booking_ibfk_1` FOREIGN KEY (`kashtaDetailsId`) REFERENCES `kashtadetails` (`kashtaDetailsId`),
  ADD CONSTRAINT `kashta-booking_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
