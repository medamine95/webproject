-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 11:58 PM
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
-- Database: `registartion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login`, `pwd`) VALUES
('admin', 'bb0f7e021d52a4e31613d463fc0525d8');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(5) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(300) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `prix` int(8) NOT NULL DEFAULT '0',
  `qte` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `nom`, `description`, `categorie`, `prix`, `qte`) VALUES
(4, 'Pc Case', 'Pc Case', 'Pc Case', 30, 30),
(5, 'Pc Case3', 'Pc Case3', 'Pc Case3', 30, 30),
(6, 'Keyboard', 'Lorem psum', 'Keyboard', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_article` int(11) NOT NULL,
  `id_commercant` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `login`, `pwd`, `state`) VALUES
(1, 'Ben Belgacem', 'Mohamed', 'benbelgacem.mohamed@', 'medamine95', 'c2c8d5e47a3528dc0636', 'aprooved'),
(2, 'Ben Belgacem', 'Mohamed', 'FGFG@hotmail.com', 'mop', '202cb962ac59075b964b', 'Pending'),
(3, 'Marwen', 'Himdi', 'benbelgacem.mohamed@', 'mkbhd', '202cb962ac59075b964b', 'Pending'),
(4, 'Mnathem', '.txt', 'benbelgacem.mohamed@', 'op', '202cb962ac59075b964b', 'pending'),
(5, 'deglai', 'oh yeah', 'benbelgacem.mohamed@', 'tr', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'pending'),
(6, 'deglai', 'fgdg', 'benbelgacem.mohamed@', 'MarwenHmidi', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'pending'),
(7, 'gh', 'fhfg', 'benbelgacem.mohamed@', 'opm', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'pending'),
(8, 'Ben Belgacem', 'Mohamed', 'benbelgacem.mohamed@', 'karfa', '202cb962ac59075b964b07152d234b70', 'pending');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtest3`
-- (See below for the actual view)
--
CREATE TABLE `vtest3` (
`id_article` int(5)
,`id_comm` int(11)
,`prix` int(8)
,`qte` int(8)
,`nomcomerc` varchar(20)
,`logincom` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `vtest3`
--
DROP TABLE IF EXISTS `vtest3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtest3`  AS  select `article`.`id` AS `id_article`,`users`.`id` AS `id_comm`,`article`.`prix` AS `prix`,`article`.`qte` AS `qte`,`users`.`nom` AS `nomcomerc`,`users`.`login` AS `logincom` from (`article` join `users`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
