-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 12:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rafaelhidalgodatabase`
--

-- --------------------------------------------------------

-- create user to query product database --
GRANT SELECT, INSERT, DELETE, UPDATE
ON rafaelhidalgodatabase.*
TO rafaelhidalgo@localhost
IDENTIFIED BY ' rafaelhidalgopass';


--
-- Table structure for table `admin_email`
--

CREATE TABLE `admin_email` (
  `admin_user_id_fk` int(20) UNSIGNED NOT NULL,
  `admin_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_email`
--

INSERT INTO `admin_email` (`admin_user_id_fk`, `admin_email`) VALUES
(1, 'johndoe@example.com'),
(2, 'jdsmith@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_phone_number`
--

CREATE TABLE `admin_phone_number` (
  `admin_user_id_fk` int(20) UNSIGNED NOT NULL,
  `admin_phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_phone_number`
--

INSERT INTO `admin_phone_number` (`admin_user_id_fk`, `admin_phone_number`) VALUES
(1, '555-555-5555'),
(2, '555-555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` char(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `apt_number` int(20) UNSIGNED NOT NULL,
  `street_number` int(20) UNSIGNED NOT NULL,
  `street_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `first_name`, `middle_name`, `last_name`, `password`, `username`, `apt_number`, `street_number`, `street_name`) VALUES
(1, 'John', 'A', 'Doe', '$2y$10$7SUuky6JV/ql/kZFyiG5je6MyubVU/ErRNqvh8L1tI0Pnpda3eAWS', 'johndoe', 123, 456, 'Some street'),
(2, 'John', 'David', 'Smith', '$2y$10$7SUuky6JV/ql/kZFyiG5je6MyubVU/ErRNqvh8L1tI0Pnpda3eAWS', 'jdsmith', 1234, 5678, 'Main St');

-- --------------------------------------------------------

--
-- Table structure for table `guest_email`
--

CREATE TABLE `guest_email` (
  `guest_user_id_fk` int(20) UNSIGNED NOT NULL,
  `guest_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_email`
--

INSERT INTO `guest_email` (`guest_user_id_fk`, `guest_email`) VALUES
(1, 'johndoe@email.com'),
(2, 'guest2@example.com'),
(3, 'guest3@example.com'),
(4, 'guest4@example.com'),
(6, 'omnidox05@gmail.com'),
(17, 'hidalgor2@montclair.edu');

-- --------------------------------------------------------

--
-- Table structure for table `guest_phone_number`
--

CREATE TABLE `guest_phone_number` (
  `guest_user_id_fk` int(20) UNSIGNED NOT NULL,
  `guest_phone_number` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_phone_number`
--

INSERT INTO `guest_phone_number` (`guest_user_id_fk`, `guest_phone_number`) VALUES
(1, 1234567890),
(2, 1234567891),
(3, 1234567892),
(4, 1234567893),
(6, 4294967295),
(17, 4294967295);

-- --------------------------------------------------------

--
-- Table structure for table `guest_user`
--

CREATE TABLE `guest_user` (
  `guest_user_id` int(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` char(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `apt_number` int(20) UNSIGNED NOT NULL,
  `street_number` int(20) UNSIGNED NOT NULL,
  `street_name` varchar(20) NOT NULL,
  `user_picture` varchar(255) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `zip_code` int(5) UNSIGNED ZEROFILL NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_user`
--

INSERT INTO `guest_user` (`guest_user_id`, `first_name`, `middle_name`, `last_name`, `password`, `username`, `apt_number`, `street_number`, `street_name`, `user_picture`, `city`, `zip_code`, `state`, `country`) VALUES
(1, 'John', 'A', 'Doe', '$2y$10$3Nl5b5e33N1f4x3M8hHjFObL0pGvAdS9OyBJc2ms.sbzyd0NNRRx6', 'johndoe', 101, 10, 'Madison Ave', NULL, 'east orange', 07017, 'NJ', 'USA'),
(2, 'Jane', 'B', 'Doe', '$2y$10$e5f5l5e33N1f4x3M8hHjFObL0pGvAdS9OyBJc2ms.sbzyd0NNRRx6', 'janedoe', 102, 11, 'Madison Ave', NULL, 'east orange', 07017, 'NJ', 'USA'),
(3, 'Jim', 'C', 'Smith', '$2y$10$0z5b5e33N1f4x3M8hHjFObL0pGvAdS9OyBJc2ms.sbzyd0NNRRx6', 'jimsmith', 103, 12, 'Madison Ave', NULL, 'east orange', 07017, 'NJ', 'USA'),
(4, 'Joe', 'D', 'Johnson', '$2y$10$w0z5b5e33N1f4x3M8hHjFObL0pGvAdS9OyBJc2ms.sbzyd0NNRRx6', 'joejohnson', 104, 13, 'Madison Ave', NULL, 'east orange', 07017, 'NJ', 'USA'),
(6, 'Rafael', 'O', 'Hidalgo', '$2y$10$GBFqXtqUzYA47gxdyGf0je/4Yk5Soxp/vNY8.y5wsNPlbgGBfiRSy', 'user1', 2, 317, 'Madison Ave', 'uploads/63fc16d3c0a7a7.71573000.jpg', 'east orange', 07017, 'NJ', 'USA'),
(17, 'Rafael', 'Omar', 'Hidalgo', '$2y$10$Oamskg2BI0fMAH7X/yRJIOUoO3fcAwgG2vP/r3971tEJSVz7ft8j6', 'Rafaelhidalgo', 1, 191, 'Glenwood Avenue', 'uploads/64024bad87a7e0.03160510.jpg', 'East Orange', 07017, 'NJ', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `conf_number` int(20) UNSIGNED NOT NULL,
  `number_child` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `number_adult` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `ck_in_date` date NOT NULL,
  `ck_out_date` date NOT NULL,
  `total_cost` decimal(20,2) UNSIGNED NOT NULL,
  `guest_user_id_fk` int(20) UNSIGNED NOT NULL,
  `reservation_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`conf_number`, `number_child`, `number_adult`, `ck_in_date`, `ck_out_date`, `total_cost`, `guest_user_id_fk`, `reservation_timestamp`) VALUES
(13, 3, 2, '2023-03-03', '2023-03-06', '180.00', 17, '2023-03-03 20:22:16'),
(14, 0, 1, '2023-03-13', '2023-03-25', '720.00', 17, '2023-03-03 20:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_room`
--

CREATE TABLE `reserve_room` (
  `conf_number_fk` int(20) UNSIGNED NOT NULL,
  `room_number_fk` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve_room`
--

INSERT INTO `reserve_room` (`conf_number_fk`, `room_number_fk`) VALUES
(13, 101),
(14, 101);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_number` int(20) UNSIGNED NOT NULL,
  `price_per_night` decimal(20,2) NOT NULL,
  `availability` varchar(20) NOT NULL DEFAULT 'vacant',
  `room_type` varchar(20) NOT NULL,
  `max_occupancy` int(20) UNSIGNED NOT NULL,
  `room_description` text NOT NULL DEFAULT 'description here.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `price_per_night`, `availability`, `room_type`, `max_occupancy`, `room_description`) VALUES
(101, '60.00', 'vacant', 'Blue Room', 5, 'A Cool Blue Room!');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `room_number_fk` int(20) UNSIGNED NOT NULL,
  `room_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`room_number_fk`, `room_image`) VALUES
(101, '64017e1b9f3671.03492823.jpg'),
(101, '64017e1ba0af67.18195614.jpg'),
(101, '64017e1ba250d5.87398008.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_email`
--
ALTER TABLE `admin_email`
  ADD PRIMARY KEY (`admin_user_id_fk`,`admin_email`);

--
-- Indexes for table `admin_phone_number`
--
ALTER TABLE `admin_phone_number`
  ADD PRIMARY KEY (`admin_user_id_fk`,`admin_phone_number`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `guest_email`
--
ALTER TABLE `guest_email`
  ADD PRIMARY KEY (`guest_user_id_fk`,`guest_email`);

--
-- Indexes for table `guest_phone_number`
--
ALTER TABLE `guest_phone_number`
  ADD PRIMARY KEY (`guest_user_id_fk`,`guest_phone_number`);

--
-- Indexes for table `guest_user`
--
ALTER TABLE `guest_user`
  ADD PRIMARY KEY (`guest_user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`conf_number`),
  ADD KEY `reservation_ibfk_1` (`guest_user_id_fk`);

--
-- Indexes for table `reserve_room`
--
ALTER TABLE `reserve_room`
  ADD PRIMARY KEY (`conf_number_fk`,`room_number_fk`),
  ADD KEY `reserve_room_ibfk_2` (`room_number_fk`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`room_number_fk`,`room_image`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guest_user`
--
ALTER TABLE `guest_user`
  MODIFY `guest_user_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `conf_number` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_email`
--
ALTER TABLE `admin_email`
  ADD CONSTRAINT `admin_email_ibfk_1` FOREIGN KEY (`admin_user_id_fk`) REFERENCES `admin_user` (`admin_user_id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_phone_number`
--
ALTER TABLE `admin_phone_number`
  ADD CONSTRAINT `admin_phone_number_ibfk_1` FOREIGN KEY (`admin_user_id_fk`) REFERENCES `admin_user` (`admin_user_id`) ON DELETE CASCADE;

--
-- Constraints for table `guest_email`
--
ALTER TABLE `guest_email`
  ADD CONSTRAINT `guest_email_ibfk_1` FOREIGN KEY (`guest_user_id_fk`) REFERENCES `guest_user` (`guest_user_id`) ON DELETE CASCADE;

--
-- Constraints for table `guest_phone_number`
--
ALTER TABLE `guest_phone_number`
  ADD CONSTRAINT `guest_phone_number_ibfk_1` FOREIGN KEY (`guest_user_id_fk`) REFERENCES `guest_user` (`guest_user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`guest_user_id_fk`) REFERENCES `guest_user` (`guest_user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reserve_room`
--
ALTER TABLE `reserve_room`
  ADD CONSTRAINT `reserve_room_ibfk_1` FOREIGN KEY (`conf_number_fk`) REFERENCES `reservation` (`conf_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_room_ibfk_2` FOREIGN KEY (`room_number_fk`) REFERENCES `room` (`room_number`) ON DELETE CASCADE;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_number_fk`) REFERENCES `room` (`room_number`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
