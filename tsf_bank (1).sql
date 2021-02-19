-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 03:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsf bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `C_ID` varchar(5) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`C_ID`, `Name`, `Email`, `Balance`) VALUES
('C001', 'Minal Patel', 'minal.p@gmail.com', 25000),
('C002', 'Raj Rathod', 'r.raj@gmail.com', 30000),
('C003', 'Akshay Solanki', 'asolanki@gmail.com', 10000),
('C005', 'Payal Raval', 'payal54@gmail.com', 30000),
('C006', 'Nandini Sharma', 'sharmanandini@gmail.com', 25000),
('C007', 'Rahul Mehta', 'rahul.m06@gmail.com', 15000),
('C009', 'Ayushi Pandya', 'ayushi.pandya14@gmail.com', 20000),
('C010', 'Pratham Gandhi', 'pratham03g@gmail.com', 20000),
('C012', 'Neeraj Shah', 'neerajshah@gmail.com', 20000),
('C016', 'Soham Karia', 'ksoham21@gmail.com', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `Sr. No` int(11) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Receiver` varchar(50) NOT NULL,
  `Amount` bigint(20) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`Sr. No`, `Sender`, `Receiver`, `Amount`, `Timestamp`) VALUES
(1, 'Minal Patel', 'Raj Rathod', 1000, '2021-02-18 08:42:10'),
(2, 'Pratham Gandhi', 'Rahul Mehta', 5000, '2021-02-18 08:56:29'),
(3, 'Nandini Sharma', 'Neeraj Shah', 5000, '2021-02-18 09:07:57'),
(4, 'Ayushi Pandya', 'Soham Karia', 1000, '2021-02-18 09:17:42'),
(5, 'Payal Raval', 'Soham Karia', 5000, '2021-02-18 09:18:15'),
(6, 'Akshay Solanki', 'Pratham Gandhi', 5000, '2021-02-18 09:25:43'),
(7, 'Soham Karia', 'Rahul Mehta', 2000, '2021-02-18 12:16:02'),
(8, 'Pratham Gandhi', 'Raj Rathod', 10000, '2021-02-18 12:17:46'),
(9, 'Raj Rathod', 'Minal Patel', 5000, '2021-02-18 12:27:15'),
(10, 'Payal Raval', 'Neeraj Shah', 5000, '2021-02-18 12:40:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `C_ID` (`C_ID`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`Sr. No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `Sr. No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
