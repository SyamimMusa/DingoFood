-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 07:49 PM
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
(1, 'Chocolate Indulgence', 9.5, 'Cake', 'sedapppp!!!', 'Available', 'food2.jpg', 10),
(2, 'Pavlova Mix Berries', 10, 'Cake', 'shoooo shedap', 'Available', 'food3.jpg', 10.5),
(4, 'Pandan Gula Melaka', 8.5, 'Cake', 'sho shedaprr', 'Available', 'food4.jpg', 9),
(5, 'Cookies Oreo Cheesecake', 9.5, 'Cake', 'Cookies Oreo Cheesecake', 'Available', 'food5.jpg', 10),
(6, 'Iced Salted Caramel Mocha', 9.5, 'Beverage', 'Iced Salted Caramel Mocha', 'Available', 'drink1.PNG', 10),
(7, 'Double Chocolaty Chip Frappuccino', 10.5, 'Beverage', 'Double Chocolaty Chip Frappuccino', 'Available', 'drink2.png', 11),
(8, 'Matcha Crème Frappuccino', 10.5, 'Beverage', 'Matcha Crème Frappuccino', 'Available', 'drink3.PNG', 11),
(9, 'Iced Caffè Americano', 8, 'Beverage', 'Iced Caffè Americano', 'Available', 'drink4.PNG', 8.5),
(10, 'Mini Bites Fruitty Tart', 3.5, 'Mini Bites', 'Mini Bites Fruitty Tart', 'Available', 'food6.jpg', 4),
(11, 'Mini Bites Berries Pavlova', 5.5, 'Mini Bites', 'Mini Bites Berries Pavlova', 'Not available', 'food7.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
