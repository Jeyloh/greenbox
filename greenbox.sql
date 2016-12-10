-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09. Des, 2016 16:44 p.m.
-- Server-versjon: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenbox`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `subscription`
--

CREATE TABLE `subscription` (
  `subscriptionId` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `vegetablePackageId` int(11) NOT NULL,
  `subscriptionInMonths` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `subscription`
--

INSERT INTO `subscription` (`subscriptionId`, `userId`, `vegetablePackageId`, `subscriptionInMonths`) VALUES
(7, 'dsa', 6, 3),
(12, 'jorgenlybeck', 1, 4);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user`
--

CREATE TABLE `user` (
  `userId` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `adminStatus` tinyint(1) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `user`
--

INSERT INTO `user` (`userId`, `password`, `adminStatus`, `firstName`, `lastName`, `phone`, `email`, `address`, `country`, `zip`) VALUES
('dsa', 'pw123', 1, 'hhallo', 'namv', 1231, 'im@bed.com', 'gateway', 'AX', 131),
('heyy', 'Password', 0, 'name', 'las', 231521431, 'im@bar.com', 'myaddress', 'AX', 3132),
('jorgenlybeck', 'Password123', 1, 'jorgen', 'hansen', 320491212, 'mail@address.com', 'streets', '', 3113),
('myuser', 'mypw', 0, 'abc', 'dfg', 12345, 'hey@app.com', 'noaddress', 'AX', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `vegetablepackage`
--

CREATE TABLE `vegetablepackage` (
  `vegetablePackageId` int(11) NOT NULL,
  `packageSalesName` varchar(255) DEFAULT NULL,
  `description` blob,
  `imageLink` varchar(255) DEFAULT NULL,
  `price` int(12) DEFAULT NULL,
  `vegetable1` varchar(255) DEFAULT NULL,
  `vegetable2` varchar(255) DEFAULT NULL,
  `vegetable3` varchar(255) DEFAULT NULL,
  `vegetable4` varchar(255) DEFAULT NULL,
  `vegetable5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `vegetablepackage`
--

INSERT INTO `vegetablepackage` (`vegetablePackageId`, `packageSalesName`, `description`, `imageLink`, `price`, `vegetable1`, `vegetable2`, `vegetable3`, `vegetable4`, `vegetable5`) VALUES
(1, 'Forest Green', 0x4120206e61747572616c20677265656e207061636b61676520776865726520796f752063616e2065787065637420746f2066696e6420616c6c20796f7572206e61747572616c206d696e6572616c7320616e6420766974616d696e732e2049747320676f6f6420666f7220796f752121, 'resources/art.jpg', 19, 'Water', 'Rock', 'Nuts', 'Berries', ''),
(2, 'BBQ Steak', 0x576520646f6e74207265636f6d6d656e642074686973207061636b61676520617320697420676f657320616761696e737420616c6c207765207374616e6420666f72203a2d28, 'resources/art.jpg', 39, 'BBQ Marinated Chicken', 'Sirloin Steak', 'Sweet Potatoes', 'Coke', 'Rum ;)'),
(6, 'BBQ Package', 0x477265617420666f72207468652073756d6d6572, 'resources/serverimage/front-page-2.jpg', 39, 'dsadas', 'dsdsa', 'dsadsa', 'dsadsa', 'dsadsa'),
(7, 'New Box', 0x546865206465736372697074696f6e, 'resources/serverimage/Black_Mage_Shibuya.png', 39, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriptionId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `vegetablepackage`
--
ALTER TABLE `vegetablepackage`
  ADD PRIMARY KEY (`vegetablePackageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vegetablepackage`
--
ALTER TABLE `vegetablepackage`
  MODIFY `vegetablePackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
