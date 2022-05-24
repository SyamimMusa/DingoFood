-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 05:01 PM
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
-- Database: `dingofood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_phoneNo` varchar(20) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phoneNo`, `admin_username`, `admin_password`) VALUES
(1, 'NABILAH AYUNI BINTI MOHD NASIR', 'nabilahnasir98@gmail.com', '013-9343242', 'Nabilah', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_phoneNo` varchar(20) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phoneNo`, `customer_address`, `username`, `password`) VALUES
(1, 'Nabilah Ayuni Binti Mohd Nasir', 'nabilahnasir98@gmail.com', '01393432422', 'PT 328, Kampung Cherang Jalan JPJ 15200, Kota Bharu, Kelantan', 'Nabilah', '123456'),
(2, 'ct', 'ct@gmail.com', '0199705572', 'pt 28, pasirputeh Kelantan', 'ct', '1234'),
(3, 'Nureen Nasuha Mohd Rosli', 'nureennasuha@gmail.com', '011-1195532', 'No 16, Jalan KS 1/3 Kotasas 25200, Kuantan,Pahang', 'nureen', 'yin123'),
(4, 'Siti Nurasma&#39; Hashim', 'nurasmaq98@gmail.com', '012-3456789', 'Lorong Firdaus, Pasir Puteh, Kelantan', 'asmaq98', '123456'),
(5, 'Siti Nurasma\'', 'nurasmaq98@gmail.com', '012-3456789', 'Lorong Firdaus, Pasir Puteh, Kelantan', 'Asmaq98', '123456'),
(6, 'Bella Nasir', 'bella@gmail.com', '019-9705572', 'Kota Bharu, Kelantan', 'Biey', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(10) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` float NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `menu_description` varchar(255) NOT NULL,
  `menu_status` varchar(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_price`, `menu_category`, `menu_description`, `menu_status`, `menu_image`, `cost`) VALUES
(1, 'Chocolate Indulgence', 9.5, 'Mini Bites', 'sedapppp!!!', 'Available', 'food2.jpg', 10),
(2, 'Pavlova Mix Berries', 10, 'Cake', 'shoooo shedap', 'Available', 'food3.jpg', 10.5),
(4, 'Pandan Gula Melaka', 8.5, 'Cake', 'sho shedaprr', 'Available', 'food4.jpg', 9),
(5, 'Cookies Oreo Cheesecake', 9.5, 'Cake', 'Cookies Oreo Cheesecake', 'Available', 'food5.jpg', 10),
(6, 'Iced Salted Caramel Mocha', 9.5, 'Beverage', 'Iced Salted Caramel Mocha', 'Available', 'drink1.PNG', 10),
(7, 'Double Chocolaty Chip Frappuccino', 10.5, 'Beverage', 'Double Chocolaty Chip Frappuccino', 'Available', 'drink2.png', 11),
(8, 'Matcha Crème Frappuccino', 10.5, 'Beverage', 'Matcha Crème Frappuccino', 'Available', 'drink3.PNG', 11),
(9, 'Iced Caffè Americano', 8, 'Beverage', 'Iced Caffè Americano', 'Available', 'drink4.PNG', 8.5),
(10, 'Mini Bites Fruitty Tart', 3.5, 'Mini Bites', 'Mini Bites Fruitty Tart', 'Available', 'food6.jpg', 4),
(11, 'Mini Bites Berries Pavlova', 5.5, 'Mini Bites', 'Mini Bites Berries Pavlova', 'Not available', 'food7.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_detail` varchar(255) NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_price` float NOT NULL,
  `order_image` varchar(50) NOT NULL,
  `order_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_detail`, `order_quantity`, `order_price`, `order_image`, `order_time`) VALUES
(18, 3, 'Double Chocolaty Chip Frappuccino', 1, 10.5, 'drink2.png', '09:02:20pm'),
(20, 3, 'Iced Caffè Americano', 2, 8, 'drink4.PNG', '09:39:54pm'),
(21, 1, 'Chocolate Indulgence', 2, 9.5, 'food2.jpg', '10:30:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `item` text NOT NULL,
  `price` float NOT NULL,
  `refund_status` text NOT NULL,
  `refund_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `customer_id`, `order_id`, `item`, `price`, `refund_status`, `refund_time`) VALUES
(1, 2, 22, 'Chocolate Indulgence', 9.5, 'Pending....', '02:28:00'),
(2, 1, 111, 'Double Chocolaty Chip Frappuccino', 10.5, '', '01:23:00'),
(3, 1, 24, 'Pandan Gula Melaka', 8.5, '', '01:23:00'),
(111, 1, 22, 'Pavlova Mix Berries', 10, '', '12:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `menu_price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_amount` float NOT NULL,
  `total_revenue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `menu_id`, `menu_price`, `quantity`, `total_amount`, `total_revenue`) VALUES
(1, 1, 13.2, 1, 13.2, 120.1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`),
  ADD KEY `refundCustomer` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
