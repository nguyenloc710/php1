-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 01:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`catId`, `catName`) VALUES
(2, 'best'),
(3, 'long anh'),
(5, 'long'),
(6, 'long'),
(11, 'asd1235'),
(13, 'nguyễn hưu lộc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `address` tinytext COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8mb4_bin NOT NULL,
  `product_desc` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`productId`, `productName`, `product_desc`, `price`, `image`, `catId`) VALUES
(9, 'asd', '124', 1232, '2021-02-27 (1).png', 0),
(10, 'asd', '124', 1232, '2021-02-27 (1).png', 0),
(13, 'long', 'qsdf', 123, '2021-02-27 (1).png', 0),
(14, 'long', 'qsdf', 123, '2021-02-27 (1).png', 0),
(17, 'qwdq', '123', 213, '2021-02-27 (2).png', 0),
(18, 'qwdq', '123', 213, '2021-02-27 (2).png', 0),
(22, 'asd', '234', 234, '2021-02-27 (2).png', 0),
(23, 'asd', '234', 234, '2021-02-27 (2).png', 0),
(30, 'best', '123', 124, '2020-11-14 (1).png', 0),
(34, 'best', '1234', 20000, 'loc2.jpg', 0),
(48, 'best', '124', 2134, '2021-02-27 (2).png', 0),
(50, 'long', '213', 2134, '2021-05-13 (2).png', 0),
(54, 'hoanthanh123', 'best hight', 1243, '2021-02-27 (2).png', 0),
(55, 'ok day', 'ok luon', 2134, '2021-03-25 (1).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `adminPass` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`adminId`, `adminName`, `adminEmail`, `adminPass`) VALUES
(6, 'longanh', 'anhlong@gmail.com', '2525'),
(7, 'admin', 'phuong@gmail.com', 'phuong123'),
(9, 'admin', 'admin@gmail.com', '252513'),
(10, 'ad123', 'ad@gmail.com', '2525'),
(11, 'loc', 'loc@gmail.com', '2525');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
