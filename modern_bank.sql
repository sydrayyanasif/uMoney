-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 10:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modern_bank`
--
CREATE DATABASE IF NOT EXISTS `modern_bank`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `User_Name` char(30) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `Mobile_Number` bigint(20) DEFAULT NULL,
  `Gmail_Id` char(30) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Image_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `User_Name`, `Name`, `Mobile_Number`, `Gmail_Id`, `Password`, `Image_Name`) VALUES
(4, 'ateeq', 'Syed Rayyan Ali', 1234567890, 'modernbank@gmail.com', '4de53ff826398b4d75bdd4051d3e2905', '52981695245439ateeq.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(11) NOT NULL,
  `Account_Number` bigint(20) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `Father_Name` char(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Mobile_Number` bigint(20) DEFAULT NULL,
  `Gmail_Id` char(30) DEFAULT NULL,
  `Account_Opening_Date` date DEFAULT NULL,
  `Address` char(50) DEFAULT NULL,
  `Opening_Amount` int(11) DEFAULT NULL,
  `Image_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `Account_Number`, `Name`, `Father_Name`, `DOB`, `Mobile_Number`, `Gmail_Id`, `Account_Opening_Date`, `Address`, `Opening_Amount`, `Image_Name`) VALUES
(260145, 891786199511275, 'Rahul', 'Raj', '2002-06-05', 1234567890, 'rahul@gmail.com', '2023-10-15', 'Lucknow', 17500, '66741697358620rahul.jpg'),
(869894, 891786524100795, 'Shiva', 'Shankar', '2003-06-06', 123456789, 'shiva@gmail.com', '2023-10-15', 'Lucknow', 17500, '36391697358703shiva.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Id` int(11) NOT NULL,
  `Name` char(50) NOT NULL,
  `Gmail_Id` char(50) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Id`, `Name`, `Gmail_Id`, `Subject`, `Message`) VALUES
(3, 'Rahul', 'rahul@gmail.com', 'Account Open', 'I want to be customer of your bank.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Transaction_Amount` int(11) DEFAULT NULL,
  `Transaction` char(30) DEFAULT NULL,
  `Transaction_Date_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Id`, `Customer_Id`, `Amount`, `Transaction_Amount`, `Transaction`, `Transaction_Date_Time`) VALUES
(54, 260145, 20000, 20000, 'Deposit', '2023-10-15 02:00:20'),
(55, 869894, 20000, 20000, 'Deposit', '2023-10-15 02:01:43'),
(56, 260145, 15000, 5000, 'Withdraw', '2023-10-15 02:02:41'),
(57, 869894, 15000, 5000, 'Withdraw', '2023-10-15 02:03:03'),
(58, 869894, 20000, 5000, 'Deposit', '2023-10-15 02:03:34'),
(59, 869894, 17500, 2500, 'Transfer to 891786199511275', '2023-10-15 02:04:10'),
(60, 260145, 17500, 2500, 'Deposit from 891786524100795', '2023-10-15 02:04:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`,`Mobile_Number`,`Gmail_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`),
  ADD UNIQUE KEY `Customer_Id` (`Customer_Id`,`Account_Number`,`Mobile_Number`,`Gmail_Id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
