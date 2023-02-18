-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 07:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productdescripton` varchar(255) NOT NULL,
  `productshortdescription` varchar(255) NOT NULL,
  `productcategory` varchar(255) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `Inventory` text NOT NULL,
  `saleprice` varchar(255) NOT NULL,
  `discountedprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `productname`, `productdescripton`, `productshortdescription`, `productcategory`, `productimage`, `Inventory`, `saleprice`, `discountedprice`) VALUES
(229, 'Bat style Black Fluffy Cardigan', 'Brand: Brooklyn Industries\r\nCondition: thrifted (10/10)\r\nMeasurements: Free Size\r\nShoulder: Raglan\r\nChest: NA front open\r\nLength:27”\r\n', '', 'Gaints jacket', '../../images/10 (1).jpg', '0', '1909Rs', '1897'),
(230, 'Pale Blue Sweater', 'Brand: Hollister\r\nCondition: thrifted (10/10)\r\nMeasurements:\r\nShoulder: 18”\r\nChest: 19”\r\nLength: 21”\r\n', '', 'Gaints jacket', '../../images/20 (1).jpg', '3', '1736Rs', '1562.4'),
(231, 'Pink two tone sweater', 'Brand: George\r\nCondition: thrifted (10/10)\r\nMeasurements:\r\nShoulder: 28”\r\nChest: 24.5”\r\nLength: 27”\r\n', '', 'uper wear', '../../images/23 (1).jpg', '7', '1736Rs', '1562.4'),
(232, ' Light Brown Turtleneck', 'Brand: XIm Fa Wear\r\nCondition: thrifted (10/10)\r\nMeasurements:\r\nShoulder: 17”\r\nChest: 17”\r\nLength: 24.5” \r\n', '', 'children clothes', '../../images/22 (6).jpg', '8', '1924Rs', '1731');

-- --------------------------------------------------------

--
-- Table structure for table `biller_info`
--

CREATE TABLE `biller_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` tinyint(15) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biller_info`
--

INSERT INTO `biller_info` (`id`, `firstname`, `lastname`, `country`, `address`, `city`, `postcode`, `phone`, `email`, `date`, `status`) VALUES
(33, 'Bilal', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1675517452', 'processing'),
(34, 'Bilal', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1675852343', 'processing'),
(35, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1675929925', 'processing'),
(36, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1676036026', 'complete'),
(37, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1676528623', 'processing'),
(38, 'bilu', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'bilal.ahmed1717@gmail.com', '1676528795', 'processing'),
(39, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1676617022', 'processing'),
(40, 'bilu', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'bilal.ahmed1717@gmail.com', '1676618464', 'processing'),
(41, 'bilu', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'bilal.ahmed1717@gmail.com', '1676619125', 'complete'),
(42, 'bilu', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'bilal.ahmed1717@gmail.com', '1676619424', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `currency_tab`
--

CREATE TABLE `currency_tab` (
  `currency_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency_tab`
--

INSERT INTO `currency_tab` (`currency_id`, `country`, `currency`) VALUES
(5, 'usa', ' £');

-- --------------------------------------------------------

--
-- Table structure for table `customers_order`
--

CREATE TABLE `customers_order` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productqty` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `cost` text NOT NULL,
  `subtotal` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paymentmethod` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_order`
--

INSERT INTO `customers_order` (`id`, `productname`, `productqty`, `email`, `productimage`, `cost`, `subtotal`, `shipping`, `total`, `paymentmethod`, `date`) VALUES
(467, 'Bat style Black Fluffy Cardigan', '2', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1550Rs', 3100, 150, 3250, 'Cash on delivery', '1675517452'),
(468, 'Bat style Black Fluffy Cardigan', '1', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 5021, 250, 5271, 'Cash on delivery', '1675852343'),
(469, 'Pale Blue Sweater', '2', 'fasst.sallar@gmail.com', '../images/20 (1).jpg', '1562', 5021, 250, 5271, 'Cash on delivery', '1675852343'),
(470, 'Bat style Black Fluffy Cardigan', '3', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 5691, 250, 5941, 'Cash on delivery', '1675929925'),
(471, 'Pale Blue Sweater', '1', 'fasst.sallar@gmail.com', '../images/20 (1).jpg', '1562', 1562, 200, 1762, 'Cash on delivery', '1676036026'),
(472, 'Bat style Black Fluffy Cardigan', '1', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 1897, 250, 2147, 'Cash on delivery', '1676528623'),
(474, 'Bat style Black Fluffy Cardigan', '1', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 1897, 250, 2147, 'Cash on delivery', '1676617022');

-- --------------------------------------------------------

--
-- Table structure for table `customer_billinfo`
--

CREATE TABLE `customer_billinfo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` tinyint(15) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_billinfo`
--

INSERT INTO `customer_billinfo` (`id`, `firstname`, `lastname`, `country`, `address`, `city`, `postcode`, `phone`, `email`, `date`, `status`) VALUES
(33, 'Bilal', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1675517452', 'processing'),
(34, 'Bilal', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1675852343', 'processing'),
(35, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1675929925', 'processing'),
(36, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1676036026', 'processing'),
(37, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1676528623', 'processing'),
(39, 'Bilal-', 'Ahmed', 'Pakistan', 'House 379 street 18 sector 2 AECHS, Rawalpindi', 'Rawalpindi', 127, '+923315195278', 'fasst.sallar@gmail.com', '1676617022', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `free_shipping`
--

CREATE TABLE `free_shipping` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `free_shipping`
--

INSERT INTO `free_shipping` (`id`, `amount`) VALUES
(139, '40rs');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productqty` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `cost` text NOT NULL,
  `subtotal` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paymentmethod` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `productname`, `productqty`, `email`, `productimage`, `cost`, `subtotal`, `shipping`, `total`, `paymentmethod`, `date`) VALUES
(467, 'Bat style Black Fluffy Cardigan', '2', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1550Rs', 3100, 150, 3250, 'Cash on delivery', '1675517452'),
(468, 'Bat style Black Fluffy Cardigan', '1', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 5021, 250, 5271, 'Cash on delivery', '1675852343'),
(469, 'Pale Blue Sweater', '2', 'fasst.sallar@gmail.com', '../images/20 (1).jpg', '1562', 5021, 250, 5271, 'Cash on delivery', '1675852343'),
(470, 'Bat style Black Fluffy Cardigan', '3', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 5691, 250, 5941, 'Cash on delivery', '1675929925'),
(471, 'Pale Blue Sweater', '1', 'fasst.sallar@gmail.com', '../images/20 (1).jpg', '1562', 1562, 200, 1762, 'Cash on delivery', '1676036026'),
(472, 'Bat style Black Fluffy Cardigan', '1', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 1897, 250, 2147, 'Cash on delivery', '1676528623'),
(473, 'Pale Blue Sweater', '1', 'bilal.ahmed1717@gmail.com', '../images/20 (1).jpg', '1562', 1562, 200, 1762, 'Cash on delivery', '1676528795'),
(474, 'Bat style Black Fluffy Cardigan', '1', 'fasst.sallar@gmail.com', '../images/10 (1).jpg', '1897', 1897, 250, 2147, 'Cash on delivery', '1676617022'),
(475, 'Pale Blue Sweater', '1', 'bilal.ahmed1717@gmail.com', '../images/20 (1).jpg', '1562', 1562, 250, 1812, 'Cash on delivery', '1676618464'),
(476, 'Pale Blue Sweater', '1', 'bilal.ahmed1717@gmail.com', '../images/20 (1).jpg', '1562', 1562, 200, 1762, 'Cash on delivery', '1676619125'),
(478, 'Pink two tone sweater', '1', 'bilal.ahmed1717@gmail.com', '../images/23 (1).jpg', '1562', 3124, 250, 3374, 'Cash on delivery', '1676619424');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`id`, `category`) VALUES
(111, 'uper wear'),
(112, 'children clothes'),
(113, 'Gaints jacket');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productgallery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `productname`, `productgallery`) VALUES
(156, 'Bat style Black Fluffy Cardigan', '../../images/7 (3).jpg'),
(157, 'Bat style Black Fluffy Cardigan', '../../images/7 (4).jpg'),
(158, 'Bat style Black Fluffy Cardigan', '../../images/7 (5).jpg'),
(159, 'Pale Blue Sweater', '../../images/20 (2).jpg'),
(160, 'Pale Blue Sweater', '../../images/20 (3).jpg'),
(161, 'Pink two tone sweater', '../../images/23 (2).jpg'),
(162, 'Pink two tone sweater', '../../images/23 (3).jpg'),
(163, ' Light Brown Turtleneck', '../../images/23 (1).jpg'),
(164, ' Light Brown Turtleneck', '../../images/23 (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regional_shipping`
--

CREATE TABLE `regional_shipping` (
  `id` int(11) NOT NULL,
  `cityname` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regional_shipping`
--

INSERT INTO `regional_shipping` (`id`, `cityname`, `amount`) VALUES
(21, 'Islamabad', 200),
(22, 'faislabad', 250),
(24, 'Rawalpindi', 150),
(25, 'karachi', 300);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `product_id`, `product_name`, `user_review`, `datetime`, `status`) VALUES
(117, 'Bilal', 3, 230, 'Pale Blue Sweater', 'ce', 1675531454, 'approved'),
(118, 'Bilal', 3, 230, 'Pale Blue Sweater', 'ce', 1675531640, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `sitelogo` varchar(255) NOT NULL DEFAULT 'sitelogo.png',
  `tagline` varchar(255) NOT NULL DEFAULT 'saifi logos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `sitelogo`, `tagline`) VALUES
(1, 'PicsArt_07-01-01.47.28.png', 'thrifter items on affordable prices');

-- --------------------------------------------------------

--
-- Table structure for table `submitform`
--

CREATE TABLE `submitform` (
  `id` int(6) UNSIGNED NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` int(50) DEFAULT NULL,
  `faddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitform`
--

INSERT INTO `submitform` (`id`, `fname`, `email`, `phoneno`, `faddress`) VALUES
(1, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, 'House 379 street 18 sector 2 AECHS, Rawalpindi'),
(2, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, ''),
(3, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, ''),
(4, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, ''),
(5, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, 'House 379 street 18 sector 2 AECHS, Rawalpindi'),
(6, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, 'House 379 street 18 sector 2 AECHS, Rawalpindi'),
(7, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, 'House 379 street 18 sector 2 AECHS, Rawalpindi'),
(8, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, 'House 379 street 18 sector 2 AECHS, Rawalpindi'),
(9, 'Bilal Ahmed', 'fasst.sallar@gmail.com', 2147483647, 'House 379 street 18 sector 2 AECHS, Rawalpindi');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `retypepass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `name`, `email`, `password`, `retypepass`, `role`) VALUES
(88, 'Bilal butt', 'fasst.sallar@gmail.com', '1d86647ab0e38d91e1b16a2ccffd1b42', '33b2e097e6c912898e6283d9a3a3b8c4', 'admin'),
(89, 'Bilal ', 'bilal.ahmed1717@gmail.com', '1d86647ab0e38d91e1b16a2ccffd1b42', '33b2e097e6c912898e6283d9a3a3b8c4', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biller_info`
--
ALTER TABLE `biller_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_tab`
--
ALTER TABLE `currency_tab`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customers_order`
--
ALTER TABLE `customers_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_billinfo`
--
ALTER TABLE `customer_billinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_shipping`
--
ALTER TABLE `free_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regional_shipping`
--
ALTER TABLE `regional_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitform`
--
ALTER TABLE `submitform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `biller_info`
--
ALTER TABLE `biller_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `currency_tab`
--
ALTER TABLE `currency_tab`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers_order`
--
ALTER TABLE `customers_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `customer_billinfo`
--
ALTER TABLE `customer_billinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `free_shipping`
--
ALTER TABLE `free_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `regional_shipping`
--
ALTER TABLE `regional_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submitform`
--
ALTER TABLE `submitform`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
