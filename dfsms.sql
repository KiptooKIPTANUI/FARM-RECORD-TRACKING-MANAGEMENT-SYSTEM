-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 09:20 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UpdationDate`) VALUES
(1, 'Admin', 'admin', 1234567899, 'admin@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-12-22 15:30:00', '2019-12-25 11:56:18'),
(2, 'Admin1', 'admin1', 78767877, 'edu@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'edwin', 'edwin', 790909090, 'dwin@gmail.com', '81dc9bdb52d04dc20036dbd831ed055', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Edwin Kipkemoi', 'edwin', 795593274, 'kemb@gmail.com', '8e6e509fba12de7be9ff1cb5333a69d2', '2021-08-18 06:39:05', NULL),
(6, 'felix', 'admin', 795593274, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-08-18 06:49:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryCode` varchar(50) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `CategoryCode`, `PostingDate`) VALUES
(1, 'Milk', 'MK01', '2019-12-24 13:27:43'),
(2, 'Butter', 'BT01', '2019-12-24 13:27:59'),
(3, 'Bread', 'BD01', '2019-12-24 13:28:12'),
(4, 'Paneer', 'PN01', '2019-12-24 13:29:18'),
(5, 'Soya', 'SY01', '2019-12-24 13:29:58'),
(7, 'Ghee', 'GH01', '2019-12-25 11:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `CompanyName`, `PostingDate`) VALUES
(1, 'Amul', '2019-12-25 00:30:51'),
(2, 'Mother Diary', '2019-12-25 00:30:59'),
(3, 'Patanjali', '2019-12-25 00:31:09'),
(4, 'Namaste India', '2019-12-25 00:31:21'),
(10, 'Paras', '2019-12-25 11:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(1, 4, 2, 753947547, 'Anuj', 9354778033, 'cash', '2019-12-25 05:32:47'),
(2, 1, 1, 753947547, 'Anuj', 9354778033, 'cash', '2019-12-25 05:32:47'),
(3, 1, 1, 979148350, 'Sanjeen', 1234567890, 'card', '2019-12-25 08:38:08'),
(4, 4, 1, 979148350, 'Sanjeen', 1234567890, 'card', '2019-12-25 08:38:08'),
(5, 1, 1, 861354457, 'Rahul', 9876543210, 'cash', '2019-12-24 08:43:48'),
(6, 5, 1, 861354457, 'Rahul', 9876543210, 'cash', '2019-12-24 08:43:48'),
(7, 5, 1, 276794782, 'Sarita', 1122334455, 'cash', '2019-12-25 08:48:06'),
(8, 6, 1, 276794782, 'Sarita', 1122334455, 'cash', '2019-12-25 08:48:06'),
(9, 6, 2, 744608164, 'Babu Pandey', 123458962, 'card', '2019-12-25 09:07:50'),
(10, 2, 2, 744608164, 'Babu Pandey', 123458962, 'card', '2019-12-25 09:07:50'),
(11, 7, 1, 139640585, 'John', 45632147892, 'cash', '2019-12-25 11:54:24'),
(12, 5, 1, 139640585, 'John', 45632147892, 'cash', '2019-12-25 11:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT current_timestamp(),
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `CategoryName`, `CompanyName`, `ProductName`, `ProductPrice`, `PostingDate`, `UpdationDate`) VALUES
(1, 'Milk', 'Amul', 'Toned milk 500ml', '22', '2019-12-25 02:22:37', '2019-12-25 02:22:37'),
(2, 'Milk', 'Amul', 'Toned milk 1ltr', '42', '2019-12-25 01:25:20', NULL),
(3, 'Milk', 'Mother Diary', 'Full Cream Milk 500ml', '26', '2019-12-25 03:42:24', '2019-12-25 03:42:24'),
(4, 'Milk', 'Mother Diary', 'Full Cream Milk 1ltr', '50', '2019-12-25 03:42:39', '2019-12-25 03:42:39'),
(5, 'Butter', 'Amul', 'Butter 100mg', '46', '2019-12-25 08:42:56', '2019-12-25 08:42:56'),
(6, 'Bread', 'Patanjali', 'Sandwich Bread', '30', '2019-12-25 08:40:10', NULL),
(7, 'Ghee', 'Paras', 'Ghee 500mg', '350', '2019-12-25 11:53:33', '2019-12-25 11:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
