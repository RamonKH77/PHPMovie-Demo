-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 01:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dillbillmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movieinfo`
--

CREATE TABLE `movieinfo` (
  `id` int(11) NOT NULL,
  `MovieName` varchar(50) NOT NULL,
  `MovieYear` int(4) NOT NULL,
  `MovieImage` varchar(150) NOT NULL,
  `MovieDescription` text DEFAULT NULL,
  `ImdbPoint` float DEFAULT NULL,
  `MovieLanguage` varchar(10) NOT NULL,
  `MovieLevel` varchar(2) NOT NULL,
  `MovieAccent` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movieinfo`
--

INSERT INTO `movieinfo` (`id`, `MovieName`, `MovieYear`, `MovieImage`, `MovieDescription`, `ImdbPoint`, `MovieLanguage`, `MovieLevel`, `MovieAccent`) VALUES
(1, 'The Devil All the Time', 2004, 'MovieImages/Heat.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6.3, 'English', 'B1', 'British'),
(2, 'Joker', 2019, 'MovieImages/joker.jpg', 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.', 8.5, 'English', 'C2', 'American'),
(3, 'Gladiator', 2000, 'MovieImages/Gladiator.jpg', 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.', 8.5, 'English', 'B2', 'Mixed'),
(34, 'Fight Club', 1999, 'MovieImages/FightClub.jpg', 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.', 8.8, 'English', 'C1', 'American'),
(35, 'Fast & Furious 7', 2015, 'MovieImages/Fast&Furious7.jpg', 'Deckard Shaw seeks revenge against Dominic Toretto and his family for his comatose brother.', 7.1, 'English', 'C2', 'American');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movieinfo`
--
ALTER TABLE `movieinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movieinfo`
--
ALTER TABLE `movieinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
