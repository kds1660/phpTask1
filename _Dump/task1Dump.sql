-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2017 at 10:59 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id_actor` int(7) NOT NULL,
  `first_name` varchar(31) NOT NULL,
  `last_name` varchar(31) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id_actor`, `first_name`, `last_name`, `dob`) VALUES
(1, 'Al', 'Pacino', '1940-04-25'),
(2, 'Shia', 'LaBeouf', '1986-06-11'),
(3, 'Hugh', 'Jackman', '1968-10-12'),
(4, 'Patrick', 'Steward', '1940-07-13'),
(5, 'James', 'Steward', '1908-05-20'),
(6, 'Max', 'Paine', '1972-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id_fee` int(7) NOT NULL,
  `id_film` int(11) DEFAULT NULL,
  `id_actor` int(11) DEFAULT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id_fee`, `id_film`, `id_actor`, `fee`) VALUES
(1, 1, 1, 150000),
(2, 2, 2, 500000),
(3, 3, 3, 175000),
(4, 3, 4, 200000),
(5, 4, 3, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id_film` int(7) NOT NULL,
  `name` varchar(63) NOT NULL,
  `director` varchar(31) NOT NULL,
  `year` year(4) NOT NULL,
  `budget` int(11) NOT NULL,
  `box_office` int(11) NOT NULL,
  `duration` smallint(6) NOT NULL,
  `genre` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id_film`, `name`, `director`, `year`, `budget`, `box_office`, `duration`, `genre`) VALUES
(1, 'The Godfather', 'Francis Ford Coppola', 2011, 7000000, 245100000, 10620, 'Crime'),
(2, 'Transformers', 'Michael Bay', 2009, 150000000, 709700000, 8580, 'action'),
(3, 'X-Men', 'Bryan Singer', 2011, 75000000, 296300000, 7200, 'action'),
(4, 'Logan', 'James Mangold', 2017, 97000000, 611500000, 8220, 'action');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id_studio` int(7) NOT NULL,
  `name` varchar(63) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id_studio`, `name`, `year`) VALUES
(2, '20th Century Fox', 1935),
(3, 'lenfilm', 1941),
(1, 'Paramount Pictures', 1912);

-- --------------------------------------------------------

--
-- Table structure for table `studio_films`
--

CREATE TABLE `studio_films` (
  `id_film` int(7) NOT NULL,
  `id_studio` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studio_films`
--

INSERT INTO `studio_films` (`id_film`, `id_studio`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id_actor`),
  ADD KEY `id_actor` (`id_actor`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id_fee`),
  ADD UNIQUE KEY `id_film_actor` (`id_film`,`id_actor`),
  ADD KEY `actor_key` (`id_actor`),
  ADD KEY `film_key` (`id_film`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`),
  ADD UNIQUE KEY `name` (`name`,`director`,`year`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id_studio`),
  ADD UNIQUE KEY `name` (`name`,`year`);

--
-- Indexes for table `studio_films`
--
ALTER TABLE `studio_films`
  ADD PRIMARY KEY (`id_film`,`id_studio`),
  ADD KEY `IDX_30592A9C964A220` (`id_film`),
  ADD KEY `IDX_30592A9C6C1CB25B` (`id_studio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id_actor` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id_fee` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id_studio` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `FK_A093C16C964A220` FOREIGN KEY (`id_film`) REFERENCES `films` (`id_film`),
  ADD CONSTRAINT `FK_A093C16CAAF017C9` FOREIGN KEY (`id_actor`) REFERENCES `actors` (`id_actor`);

--
-- Constraints for table `studio_films`
--
ALTER TABLE `studio_films`
  ADD CONSTRAINT `FK_30592A9C6C1CB25B` FOREIGN KEY (`id_studio`) REFERENCES `studios` (`id_studio`),
  ADD CONSTRAINT `FK_30592A9C964A220` FOREIGN KEY (`id_film`) REFERENCES `films` (`id_film`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
