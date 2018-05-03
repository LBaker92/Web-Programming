-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 11:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

CREATE TABLE `chatrooms` (
  `Title` varchar(255) NOT NULL,
  `Text` text NOT NULL,
  `UsersInRoom` int(10) UNSIGNED DEFAULT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatrooms`
--

INSERT INTO `chatrooms` (`Title`, `Text`, `UsersInRoom`, `Link`) VALUES
('Test', 'Test.txt', 0, 'index.php?chatroom=Test');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Chatroom` varchar(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Message` text,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`Chatroom`, `User`, `Message`, `Time`) VALUES
('Test', 'Zenrion@gmail.com', 'This is a test', '2018-05-02 20:00:20'),
('Test', 'Zenrion@gmail.com', 'SECOND TEST', '2018-05-02 20:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `Password`, `Name`) VALUES
('lol@lol.com', 'lol', 'lol'),
('zenrion@gmail.com', 'TdgTestlhc123.', 'Logan Baker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD PRIMARY KEY (`Title`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
