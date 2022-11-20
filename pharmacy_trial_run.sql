-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 10:09 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_trial_run`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `id` int(11) NOT NULL,
  `access_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `access_level`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Pharmacist'),
(4, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` tinyint(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(5, 'Sam', 'Osoro', 'Pharmacy/C', '76 nairobi', '09865468', 'samwel@pharmacy.com', 'sam', '1234', '2013-11-25 20:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Tablet'),
(2, 'Capsule'),
(3, 'Syrup');

-- --------------------------------------------------------

--
-- Table structure for table `expiry`
--

CREATE TABLE `expiry` (
  `id` tinyint(5) NOT NULL,
  `expiry` date NOT NULL,
  `date_supplied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expiry`
--

INSERT INTO `expiry` (`id`, `expiry`, `date_supplied`) VALUES
(1, '0000-00-00', '0000-00-00'),
(2, '2022-10-01', '0000-00-00'),
(3, '2021-10-01', '2018-08-30'),
(4, '2021-10-01', '2018-08-30'),
(5, '2021-10-01', '2018-08-30'),
(6, '2021-10-01', '2018-08-30'),
(7, '2021-10-01', '2018-08-30'),
(8, '2022-10-01', '2018-08-30'),
(9, '2022-10-01', '2018-08-30'),
(10, '2022-10-01', '2018-08-30'),
(11, '2022-10-01', '2018-08-30'),
(12, '2022-10-01', '2018-08-30'),
(13, '2022-10-01', '2018-08-30'),
(14, '2022-10-01', '2018-08-30'),
(15, '2022-10-01', '2018-08-30'),
(16, '2021-10-01', '2018-08-30'),
(17, '2022-10-01', '2018-08-30'),
(18, '2022-10-01', '2018-08-30'),
(19, '2022-10-01', '2018-08-30'),
(20, '2022-10-01', '2018-08-30'),
(21, '2022-10-01', '2018-08-30'),
(22, '2022-10-01', '2018-08-30'),
(23, '2022-10-01', '2018-08-30'),
(24, '2022-10-01', '2018-08-30'),
(25, '2022-10-01', '2018-08-30'),
(26, '2022-10-01', '2018-08-30'),
(27, '0000-00-00', '2018-09-01'),
(28, '0000-00-00', '2018-09-01'),
(29, '0000-00-00', '2018-09-01'),
(30, '0000-00-00', '2018-09-01'),
(31, '0000-00-00', '2018-09-01'),
(32, '0000-00-00', '2018-09-01'),
(33, '0000-00-00', '2018-09-01'),
(34, '0000-00-00', '2018-09-01'),
(35, '0000-00-00', '2018-09-01'),
(36, '0000-00-00', '2018-09-01'),
(37, '0000-00-00', '2018-09-01'),
(38, '0000-00-00', '2018-09-01'),
(39, '0000-00-00', '2018-09-01'),
(40, '0000-00-00', '2018-09-01'),
(41, '0000-00-00', '2018-09-01'),
(42, '0000-00-00', '2018-09-01'),
(43, '0000-00-00', '2018-09-01'),
(44, '0000-00-00', '2018-09-01'),
(45, '0000-00-00', '2018-09-01'),
(46, '0000-00-00', '2018-09-01'),
(47, '0000-00-00', '2018-09-01'),
(48, '0000-00-00', '2018-09-01'),
(49, '0000-00-00', '2018-09-01'),
(50, '0000-00-00', '2018-09-01'),
(51, '0000-00-00', '2018-09-01'),
(52, '0000-00-00', '2018-09-01'),
(53, '0000-00-00', '2018-09-01'),
(54, '0000-00-00', '2018-09-01'),
(55, '0000-00-00', '2018-09-01'),
(56, '0000-00-00', '2018-09-01'),
(57, '0000-00-00', '2018-09-01'),
(58, '0000-00-00', '2018-09-01'),
(59, '0000-00-00', '2018-09-01'),
(60, '0000-00-00', '2018-09-01'),
(61, '0000-00-00', '2018-09-01'),
(62, '0000-00-00', '2018-09-01'),
(63, '0000-00-00', '2018-09-01'),
(64, '0000-00-00', '2018-09-01'),
(65, '0000-00-00', '2018-09-01'),
(66, '0000-00-00', '2018-09-01'),
(67, '0000-00-00', '2018-09-01'),
(68, '0000-00-00', '2018-09-01'),
(69, '0000-00-00', '2018-09-01'),
(70, '0000-00-00', '2018-09-01'),
(71, '0000-00-00', '2018-09-01'),
(72, '0000-00-00', '2018-09-01'),
(73, '0000-00-00', '2018-09-01'),
(74, '0000-00-00', '2018-09-01'),
(75, '0000-00-00', '2018-09-01'),
(76, '0000-00-00', '2018-09-01'),
(77, '0000-00-00', '2018-09-01'),
(78, '0000-00-00', '2018-09-01'),
(79, '0000-00-00', '2018-09-01'),
(80, '0000-00-00', '2018-09-01'),
(81, '0000-00-00', '2018-09-01'),
(82, '0000-00-00', '2018-09-01'),
(83, '0000-00-00', '2018-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(5) NOT NULL,
  `patient` int(11) NOT NULL,
  `served_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `patient`, `served_by`, `status`, `date`, `payment_type`) VALUES
(1, 0, 0, 0, '2018-09-01 19:02:58', 0),
(10, 0, 0, 0, '2013-12-10 11:19:42', 0),
(11, 0, 0, 0, '2013-12-10 11:28:59', 0),
(12, 0, 0, 0, '2013-12-10 12:19:02', 0),
(13, 0, 0, 0, '2013-12-10 12:25:19', 0),
(14, 0, 0, 0, '2013-12-10 12:29:38', 0),
(15, 0, 0, 0, '2013-12-10 12:39:51', 0),
(16, 0, 0, 0, '2013-12-10 12:49:45', 0),
(17, 0, 0, 0, '2013-12-10 12:51:48', 0),
(18, 0, 0, 0, '2013-12-12 19:20:44', 0),
(19, 0, 0, 0, '2013-12-12 20:34:51', 0),
(20, 0, 0, 0, '2018-08-25 17:34:11', 0),
(21, 0, 0, 0, '2018-09-01 18:43:08', 0),
(22, 0, 0, 0, '2018-09-01 18:55:51', 0),
(23, 0, 0, 0, '2018-09-01 18:57:08', 0),
(24, 0, 0, 0, '2018-10-07 14:30:37', 0),
(25, 1, 1, 1, '2022-11-20 05:21:38', 1),
(26, 1, 1, 1, '2022-11-20 05:23:01', 1),
(27, 1, 1, 1, '2022-11-20 05:24:54', 1),
(28, 1, 1, 1, '2022-11-20 05:25:28', 1);

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `tarehe` AFTER INSERT ON `invoice` FOR EACH ROW BEGIN
     SET @date=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` tinyint(5) NOT NULL,
  `invoice` int(5) NOT NULL,
  `drug` tinyint(5) NOT NULL,
  `cost` int(5) DEFAULT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice`, `drug`, `cost`, `quantity`) VALUES
(2, 10, 5, 5, 12),
(3, 11, 5, 5, 12),
(5, 11, 6, 120, 12),
(6, 12, 5, 5, 15),
(7, 12, 6, 120, 17),
(9, 12, 7, 250, 15),
(10, 12, 8, 15, 15),
(11, 12, 9, 1, 20),
(13, 13, 5, 5, 5),
(14, 13, 6, 120, 10),
(15, 13, 7, 250, 20),
(16, 13, 8, 15, 16),
(17, 13, 9, 1, 10),
(19, 14, 5, 5, 5),
(20, 15, 5, 5, 12),
(21, 16, 5, 5, 30),
(22, 16, 6, 120, 10),
(23, 17, 5, 5, 10),
(24, 17, 8, 15, 60),
(25, 18, 5, 5, 12),
(26, 18, 6, 120, 15),
(27, 19, 5, 5, 12),
(28, 19, 6, 120, 15),
(29, 19, 8, 15, 20),
(30, 19, 9, 1, 20),
(32, 27, 10, 1, 9),
(33, 27, 7, 10, 7),
(34, 28, 10, 1, 9),
(35, 28, 7, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(1, 'Samwel', 'Osoro', 'sam/pharm', '456 Kabu', '0789653417', 'samoso@pharmacy.com', 'samoso', '12345', '2013-12-10 14:09:03'),
(2, 'omega', 'usayi', '2', 'zengeza', '77777', 'omegausayi@gmail.com', 'omega', 'omega123', '2018-09-09 13:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` tinyint(4) NOT NULL,
  `id2` tinyint(4) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` varchar(10) NOT NULL,
  `user2` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_received` date NOT NULL,
  `user1_read` varchar(20) NOT NULL,
  `user2_read` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `status`) VALUES
(1, 'trial', 'surname', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `id` tinyint(5) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenttypes`
--

INSERT INTO `paymenttypes` (`id`, `Name`) VALUES
(1, 'Cash'),
(2, 'Credit card'),
(3, 'Mobile Money'),
(4, 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(5, 'Sam', 'Osoro', 'Pharmacy/1', '56 Kabu', '0789653412', 'sam@pharmacysys.com', 'osoro', '1234', '2013-11-24 17:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` tinyint(5) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `postal_address`, `phone`, `date`, `status`, `used`) VALUES
(4, 1, '45 eldy', '0987643524', '2013-12-10 12:25:19', 1, 0),
(9, 1, '664466447744 Njy', '887998', '2013-12-12 19:20:44', 1, 0),
(10, 1, '123 Brooklyn', '088721313', '2013-12-12 20:34:50', 1, 0),
(11, 1, 'manyame', '0776', '2018-09-09 20:32:49', 1, 0),
(12, 1, 'manyame', '0776', '2018-09-09 20:38:39', 1, 0),
(13, 1, 'manyame', '0776', '2018-09-09 20:42:04', 1, 0),
(14, 1, 'manyame', '0776', '2018-09-09 21:04:43', 1, 0),
(15, 1, '', '', '2018-09-09 21:09:21', 1, 0),
(16, 1, 'manyame', '0776', '2018-09-09 21:23:58', 1, 0),
(17, 1, 'manyame', '0776', '2018-09-16 13:20:42', 1, 0),
(18, 1, 'manyame', '0776', '2018-10-07 14:30:37', 1, 0),
(19, 1, 'bfwow', '+26377620755', '2022-11-19 13:42:44', 1, 0);

--
-- Triggers `prescription`
--
DELIMITER $$
CREATE TRIGGER `taree` AFTER INSERT ON `prescription` FOR EACH ROW BEGIN
SET@date=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_details`
--

CREATE TABLE `prescription_details` (
  `id` tinyint(5) NOT NULL,
  `pres_id` int(5) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `strength` varchar(15) NOT NULL,
  `dose` varchar(15) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_details`
--

INSERT INTO `prescription_details` (`id`, `pres_id`, `drug_id`, `strength`, `dose`, `quantity`) VALUES
(2, 999, 5, '10 gms', '1x2', 12),
(3, 1000, 5, '10 gms', '1x2', 12),
(5, 1000, 6, '150 gms', '1x4', 12),
(6, 1001, 5, '20 gms', '2x3', 15),
(7, 1001, 6, '30 gms', '2x4', 17),
(9, 1001, 7, '50 gms', '1x3', 15),
(10, 1001, 8, '40 gms', '1x3', 15),
(11, 1001, 9, '15 gms', '2x3', 20),
(13, 1002, 5, '50 gms', '2X3', 5),
(14, 1002, 6, '150 gms', '2X3', 10),
(15, 1002, 7, '20 gms', '2X3', 20),
(16, 1002, 8, '15 gms', '2X3', 16),
(17, 1002, 9, '10 gms', '2X3', 10),
(19, 1003, 5, '50 gms', '1x2', 5),
(20, 1004, 5, '12', '1x2', 12),
(21, 1005, 5, '20 gms', '2x3', 30),
(22, 1005, 6, '40 gms', '1x3', 10),
(23, 1006, 5, '12 gms', '1x3', 10),
(24, 1006, 8, '15 gms', '1x3', 60),
(25, 1003, 5, '20 gms', '1x3', 12),
(26, 1003, 6, '30 gms', '1x2', 15),
(27, 1004, 5, '20 gms', '1x3', 12),
(28, 1004, 6, '150 gms', '1x4', 15),
(29, 1004, 8, '120 gms', '1x3', 20),
(30, 1004, 9, '10 gms', '2x3', 20),
(31, 19, 5, '12', '23', 2),
(32, 19, 5, '12', '12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `reciptNo` int(10) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `total` int(10) NOT NULL,
  `payType` varchar(10) NOT NULL,
  `serialno` varchar(10) DEFAULT NULL,
  `served_by` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`reciptNo`, `customer_id`, `total`, `payType`, `serialno`, `served_by`, `date`) VALUES
(0, '', 1500, '', '', 'sam', '0000-00-00 00:00:00'),
(999, '', 1350, '', '', 'sam', '0000-00-00 00:00:00');

--
-- Triggers `receipts`
--
DELIMITER $$
CREATE TRIGGER `siku` AFTER INSERT ON `receipts` FOR EACH ROW BEGIN
     SET @date=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` tinyint(5) NOT NULL,
  `drug_name` varchar(20) NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `supplier` int(11) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `total` int(11) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `controlled` int(11) NOT NULL,
  `Blocked` int(11) NOT NULL,
  `date_supplied` date NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `drug_name`, `category`, `description`, `supplier`, `quantity`, `total`, `cost`, `price`, `status`, `controlled`, `Blocked`, `date_supplied`, `expiry`) VALUES
(5, 'Piriton', 1, 'Painkiller', 0, '100', 0, '10', '10.00', 1, 0, 0, '2013-11-30', '0000-00-00'),
(6, 'Dual Cotexin', 1, 'Malaria', 0, '150', 0, '120', '100.00', 1, 1, 0, '2013-11-30', '0000-00-00'),
(7, 'Naproxen', 2, 'Reproductive', 0, '250', 0, '250', '10.00', 1, 0, 0, '2013-11-30', '0000-00-00'),
(8, 'Flagi', 3, 'Digestive', 0, '657', 0, '15', '1.00', 1, 0, 0, '2013-11-30', '0000-00-00'),
(9, 'Actal', 2, 'Stomach Reliev', 0, '1000', 0, '1', '1.00', 1, 1, 0, '2013-12-06', '0000-00-00'),
(10, 'Paracetamol', 1, 'Painkiller', 0, '1000', 0, '1', '1.00', 1, 0, 0, '2018-08-28', '0000-00-00'),
(12, 'a', 2, 'a', 0, '111', 0, '1', '1.00', 1, 1, 0, '2018-08-28', '0000-00-00'),
(13, 'king', 3, 'Painkiller', 0, '1000', 0, '2', '1.00', 1, 1, 0, '2018-09-01', '2018-10-01'),
(14, 'ibuprofen', 1, 'Painkiller', 0, '100', 0, '2', '1.00', 1, 0, 0, '2018-09-09', '2020-01-11'),
(15, 'Paracet', 1, 'description', 1, '10', 0, '20', '12.00', 1, 1, 0, '2022-11-01', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`) VALUES
(1, 'CAPS'),
(2, 'NATPHARM');

-- --------------------------------------------------------

--
-- Table structure for table `tempprescri`
--

CREATE TABLE `tempprescri` (
  `id` tinyint(5) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `customer_name` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `postal_address` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `drug_name` varchar(30) NOT NULL,
  `strength` varchar(30) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `dob`, `status`, `access_level`) VALUES
(1, 'admin', '$2y$10$jroz.EJ4S1jibepty9zOL.pO4U08ImUJY8zm2/49lU9UdzYhH1YL2', 'admin', 'admin', '2022-11-19', 1, 1),
(2, 'admin_omega', '$2y$10$NpI7Iz0260SOso.z0nRjv.HVHuJe9yn.xRvmMb7LU/UQr4Vpsoe8u', 'admin', 'admin', '2022-11-19', 1, 1),
(3, 'admin_nyasha', '$2y$10$gS4iJa7lgEZ55Vyn45MrZexR/BVKZo3wAZPuhWLe53aiQTt.6R4tu', 'admin', 'admin', '2022-11-19', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `expiry`
--
ALTER TABLE `expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`reciptNo`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tempprescri`
--
ALTER TABLE `tempprescri`
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
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expiry`
--
ALTER TABLE `expiry`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prescription_details`
--
ALTER TABLE `prescription_details`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tempprescri`
--
ALTER TABLE `tempprescri`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
