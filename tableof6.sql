-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2017 at 11:19 PM
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
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  `user3` int(11) DEFAULT NULL,
  `user4` int(11) DEFAULT NULL,
  `user5` int(11) DEFAULT NULL,
  `user6` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventreg`
--

INSERT INTO `eventreg` (`ID`, `Date`, `Location`, `user1`, `user2`, `user3`, `user4`, `user5`, `user6`) VALUES
(1, '2017-12-15 12:00:00', 1, 3, NULL, 5, 17, NULL, NULL),
(2, '2017-12-12 05:00:00', 4, 1, 2, 14, 8, 7, 4),
(4, '2017-12-17 21:00:00', 2, 9, NULL, 8, 12, 1, 3),
(5, '2017-12-10 15:00:00', 5, 6, 5, 1, 2, NULL, NULL),
(7, '2017-12-13 03:00:00', 3, 2, NULL, 5, NULL, NULL, NULL),
(8, '2017-12-14 11:00:00', 8, 4, NULL, 8, 12, NULL, NULL),
(18, '2017-12-16 17:45:00', 8, 3, 5, NULL, NULL, NULL, NULL),
(37, '2017-12-14 15:00:00', 7, 1, 2, 4, NULL, NULL, NULL),
(41, '2017-12-15 21:00:00', 4, 3, 2, NULL, NULL, NULL, NULL),
(42, '2017-12-07 15:00:00', 9, 6, 5, 1, 2, NULL, NULL),
(43, '2017-12-10 15:00:00', 7, 3, 1, 2, 4, 5, NULL),
(44, '2017-12-16 05:00:00', 8, 1, 2, 14, 8, 7, 4),
(45, '2017-12-19 12:00:00', 9, 3, NULL, 5, 17, NULL, NULL),
(46, '2017-12-14 15:00:00', 5, 6, 5, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `ID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `number` varchar(10) DEFAULT NULL,
  `website` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`ID`, `name`, `address`, `number`, `website`) VALUES
(1, 'Bouillon Bilk', '447 St Francois Xavier St, Montreal, QC', '2147483647', ''),
(2, 'Ristorante Beatrice', '1227 Mountain St, Montreal, QC H3G 1Z2', '5144928573', ''),
(3, 'Kazu', '4581 Park Ave, Montreal, QC H2V 4E4', '4388620283', ''),
(4, 'ONoir', '1234 rue Saint Catherine', '4387210283', ''),
(5, 'Delta Hotel', '350 rue Maisonneuve Ouest', '4389608492', ''),
(6, 'Lola Rosa Parc', '4581 Park Ave, Montreal, QC H2V 4E4', '5141111111', 'http://lolarosa.ca/'),
(7, 'Restaurant Europea', '1227 Mountain St, Montreal, QC H3G 1Z2', '514-222-22', 'http://www.europea.ca/'),
(8, 'Restaurant Bonaparte', '447 St Francois Xavier St, Montreal, QC', '514-333-33', 'http://www.restaurantbonaparte'),
(9, 'Jardin Nelson', '407, Place Jacques-Cartier', '5148615731', 'http://jardinnelson.com/en/');

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
(3, 'nicole', 'nicole@123.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e'),
(4, 'Bob', 'bob@hello.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e'),
(5, 'peter', 'peter@123.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
