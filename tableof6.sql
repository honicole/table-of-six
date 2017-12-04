-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 03:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tableof6`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventreg`
--

CREATE TABLE `eventreg` (
  `ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Location` int(11) DEFAULT NULL,
  `user1` varchar(30) NOT NULL,
  `user2` varchar(30) DEFAULT NULL,
  `user3` varchar(30) DEFAULT NULL,
  `user4` varchar(30) DEFAULT NULL,
  `user5` varchar(30) DEFAULT NULL,
  `user6` varchar(30) DEFAULT NULL,
  `NumRegistered` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventreg`
--

INSERT INTO `eventreg` (`ID`, `Date`, `Location`, `user1`, `user2`, `user3`, `user4`, `user5`, `user6`, `NumRegistered`) VALUES
(1, '2017-12-05 12:00:00', 1, '1', '2', '3', '17', NULL, NULL, 3),
(2, '2017-11-30 15:00:00', 4, '1', '2', '3', NULL, NULL, NULL, 3),
(3, '2017-12-04 17:30:00', 2, '2', '3', NULL, NULL, NULL, NULL, 2),
(4, '2017-12-03 21:00:00', 5, '3', '5', '8', '12', '2', '1', 6),
(5, '2017-12-02 15:00:00', 5, '6', '', '', '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `ID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `number` varchar(10) DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`ID`, `name`, `address`, `number`, `price`, `phone`, `website`) VALUES
(1, 'O.Noir', '124 Rue Prince Arthur East, Montreal, QC', '2147483647', '$$', '5140000000', 'http://www.onoir.com/'),
(2, 'Lola Rosa Parc', '4581 Park Ave, Montreal, QC H2V 4E4', '0', '$', '5141111111', 'http://lolarosa.ca/'),
(3, 'Restaurant Europea', '1227 Mountain St, Montreal, QC H3G 1Z2', '4388620283', '$$$$', '514-222-2222', 'http://www.europea.ca/'),
(4, 'Restaurant Bonaparte', '447 St Francois Xavier St, Montreal, QC', '4387210283', '$$$', '514-333-3333', 'http://www.restaurantbonaparte.com/'),
(5, 'Restaurant', '1982 rue sth', '4389608492', '$$', '123', 'google.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'joyce', 'joyce@123.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e'),
(2, 'judith', 'judith@123.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e'),
(3, 'nicole', 'nicole@123.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventreg`
--
ALTER TABLE `eventreg`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventreg`
--
ALTER TABLE `eventreg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
