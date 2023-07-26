-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 02:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiva`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_jewellery_category`
--

CREATE TABLE `add_jewellery_category` (
  `jewellery_category_id` int(11) NOT NULL,
  `jewellery_category_name` varchar(255) NOT NULL,
  `jewellery_added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_jewellery_category`
--

INSERT INTO `add_jewellery_category` (`jewellery_category_id`, `jewellery_category_name`, `jewellery_added_date`) VALUES
(1, 'Mans Jewellery', '2023-06-14'),
(2, 'Women Jewellery', '2023-06-14'),
(3, 'Kids Jewellery', '2023-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `add_jewellery_product`
--

CREATE TABLE `add_jewellery_product` (
  `product_id` int(11) NOT NULL,
  `jewellery_category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `oldprice` int(11) NOT NULL,
  `offerprice` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pdescriptions` text NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_subcategory`
--

CREATE TABLE `add_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `sub_categoryname` varchar(255) NOT NULL,
  `subcategory_added_date` varchar(255) NOT NULL,
  `jewellery_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_subcategory`
--

INSERT INTO `add_subcategory` (`subcategory_id`, `sub_categoryname`, `subcategory_added_date`, `jewellery_category_id`) VALUES
(1, 'Dimond Ring', '2023-06-14', 1),
(2, 'Bracelet', '2023-06-14', 2),
(3, 'Gold Penda', '2023-06-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin_shiva`
--

CREATE TABLE `admin_shiva` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_shiva`
--

INSERT INTO `admin_shiva` (`admin_id`, `email`, `password`) VALUES
(1, 'navdeep@gmail.com', '852963');

-- --------------------------------------------------------

--
-- Table structure for table `shiva_cart`
--

CREATE TABLE `shiva_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `added_date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shiva_cart`
--

INSERT INTO `shiva_cart` (`cart_id`, `customer_id`, `product_id`, `qty`, `subtotal`, `added_date_time`, `status`) VALUES
(1, 3, 1, 1, 2500, '14/06/2023 17:08:50 pm', 'pending'),
(2, 3, 0, 1, 2500, '15/06/2023 08:56:13 am', 'pending'),
(3, 3, 0, 1, 1299, '15/06/2023 08:58:43 am', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `shiva_customer`
--

CREATE TABLE `shiva_customer` (
  `customer_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `added_date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shiva_customer`
--

INSERT INTO `shiva_customer` (`customer_id`, `photo`, `email`, `name`, `password`, `mobile`, `address`, `state_id`, `added_date_time`) VALUES
(3, 'uploads/customers/', 'voranavdeep999@gmail.com', 'Navdeep Vora', '852963', 6352348197, 'Rajkot\r\n', 1, '07/06/2023 11:05:10 am');

-- --------------------------------------------------------

--
-- Table structure for table `shiva_state`
--

CREATE TABLE `shiva_state` (
  `state_id` int(11) NOT NULL,
  `statename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shiva_state`
--

INSERT INTO `shiva_state` (`state_id`, `statename`) VALUES
(1, 'Gujarat\r\n'),
(2, 'Tamil Nadu'),
(3, 'Karnataka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_jewellery_category`
--
ALTER TABLE `add_jewellery_category`
  ADD PRIMARY KEY (`jewellery_category_id`);

--
-- Indexes for table `add_jewellery_product`
--
ALTER TABLE `add_jewellery_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `jewellery_category_id` (`jewellery_category_id`),
  ADD KEY `jewelley_subcategory_id` (`subcategory_id`);

--
-- Indexes for table `add_subcategory`
--
ALTER TABLE `add_subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `jewellery_category_id` (`jewellery_category_id`),
  ADD KEY `jewellery_category_id_2` (`jewellery_category_id`);

--
-- Indexes for table `admin_shiva`
--
ALTER TABLE `admin_shiva`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `shiva_cart`
--
ALTER TABLE `shiva_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id.` (`customer_id`);

--
-- Indexes for table `shiva_customer`
--
ALTER TABLE `shiva_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `shiva_state`
--
ALTER TABLE `shiva_state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_jewellery_category`
--
ALTER TABLE `add_jewellery_category`
  MODIFY `jewellery_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `add_jewellery_product`
--
ALTER TABLE `add_jewellery_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_subcategory`
--
ALTER TABLE `add_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_shiva`
--
ALTER TABLE `admin_shiva`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shiva_cart`
--
ALTER TABLE `shiva_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shiva_customer`
--
ALTER TABLE `shiva_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shiva_state`
--
ALTER TABLE `shiva_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
