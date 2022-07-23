-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 03:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `strt_brgy` varchar(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `biirthdate` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `passw`, `fname`, `lname`, `mname`, `strt_brgy`, `city_municipality`, `province`, `biirthdate`, `account_type`) VALUES
(1, 'r.christianlawrence13@gmail.com', 'admin', 'Christian Lawrence', 'Rosales', 'Perino', 'Purok Sambag', 'Bogo', 'Cebu', '2001-03-29', 'Seller'),
(2, 'buyer@gmail.com', 'buyer', 'Kyle', 'Rosales', 'Perino', 'Siocon', 'Bogo', 'Cebu', '2022-05-01', 'Buyer'),
(3, 'bosskoki@gmail.com', 'koki', 'Boss', 'Koki', 'Kiko', 'Siocon', 'Bogo', 'Cebu', '2022-05-01', 'Seller'),
(4, 'r.claresse@yahoo.com', 'nawng', 'Juliana Mae', 'Rosales', 'Perino', 'Siocon', 'Bogo', 'Cebu', '2003-07-05', 'Buyer'),
(5, 'linda@gmail.com', 'linda', 'Rosalinda', 'Rosales', 'Perino', 'Siocon', 'Bogo', 'Cebu', '2000-11-08', 'Buyer');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `img_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`img_id`, `prod_id`, `image_name`) VALUES
(16, 2, '01lacoste.png'),
(17, 2, '11SS22_CURRY_CurryFlow9_ForTheW_Site_2_1.png'),
(18, 2, '21under.png'),
(19, 1, '0room.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_history_table`
--

CREATE TABLE `order_history_table` (
  `order_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `buyer_location` varchar(255) NOT NULL,
  `price_per_unit` int(11) NOT NULL,
  `total_per_unit` int(255) NOT NULL,
  `seller_name` int(255) NOT NULL,
  `date_checkout` varchar(255) NOT NULL,
  `time_checkout` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history_table`
--

INSERT INTO `order_history_table` (`order_id`, `prod_name`, `qty`, `buyer_name`, `buyer_location`, `price_per_unit`, `total_per_unit`, `seller_name`, `date_checkout`, `time_checkout`) VALUES
(1, 'Low Cut Shoes', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 4224, 1, '  06/17/2022', '15:39:52'),
(2, 'Air Max Nikes', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 9000, 1, '  06/17/2022', '15:42:04'),
(3, 'Low Cut Shoes', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 4224, 1, '  06/17/2022', '15:42:24'),
(4, 'Low Cut Shoes', 3, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 12672, 1, '  06/17/2022', '15:44:49'),
(5, 'Low Cut Shoes', 1, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4224, 4224, 1, '  06/17/2022', '15:46:45'),
(6, 'Air Max Nikes', 4, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4500, 0, 0, '  06/17/2022', '15:52:39'),
(7, 'Low Cut Shoes', 3, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4224, 0, 0, '  06/17/2022', '15:52:39'),
(8, 'Air Max Nikes', 2, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4500, 9000, 1, '  06/17/2022', '15:54:33'),
(9, 'Low Cut Shoes', 3, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4224, 12672, 1, '  06/17/2022', '15:54:33'),
(10, 'Low Cut Shoes', 23, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 97152, 1, '  06/17/2022', '19:56:44'),
(11, 'Air Max Nikes', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 4500, 1, '  06/17/2022', '20:02:06'),
(12, 'Air Max Nikes', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 4500, 1, '  06/17/2022', '20:02:49'),
(13, 'Low Cut Shoes', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 4224, 1, '  06/17/2022', '20:03:15'),
(14, 'Air Max Nikes', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 4500, 1, '  06/17/2022', '21:55:09'),
(15, 'Low Cut Shoes', 4, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 16896, 1, '  06/17/2022', '21:55:09'),
(16, 'Air Max Nikes', 3, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 13500, 1, '  06/17/2022', '00:34:24'),
(17, 'Low Cut Shoes', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 8448, 1, '  06/17/2022', '00:34:24'),
(18, 'Low Cut Shoes', 3, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 12672, 1, '  06/17/2022', '00:35:23'),
(19, 'Air Max Nikes', 4, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 18000, 1, '  06/17/2022', '00:35:42'),
(20, 'Air Max Nikes', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 9000, 1, '  06/17/2022', '00:35:57'),
(21, 'Air Max Nikes', 3, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4500, 13500, 1, '  06/19/2022', '14:43:48'),
(22, 'Low Cut Shoes ', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4224, 8448, 1, '  06/19/2022', '16:06:14'),
(23, 'Air Max Nikes', 2, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4500, 9000, 1, '  06/19/2022', '16:17:21'),
(24, 'Low Cut Shoes ', 2, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 4224, 8448, 1, '  06/19/2022', '17:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `sub_category` text NOT NULL,
  `size` varchar(55) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `product_name`, `category`, `sub_category`, `size`, `price`, `quantity`, `seller_id`) VALUES
(1, 'Low Cut Shoes ', 'Women', 'Sneakers', '452', 4224, 353, 1),
(2, 'Air Max Nikes', 'Men', 'Basketball Shoes', '4522', 4500, 319, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rated_product_table`
--

CREATE TABLE `rated_product_table` (
  `rate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rated_points` varchar(255) NOT NULL DEFAULT '0',
  `rate_status` varchar(10) NOT NULL DEFAULT 'NOT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rated_product_table`
--

INSERT INTO `rated_product_table` (`rate_id`, `product_id`, `userid`, `rated_points`, `rate_status`) VALUES
(6, 2, 2, '3.5', 'RATED'),
(7, 1, 2, '2', 'RATED'),
(8, 2, 5, '4.5', 'RATED'),
(9, 1, 5, '5', 'RATED');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `image_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`rid`, `pid`, `buyer_name`, `comment`, `image_video`) VALUES
(10, 2, 'buyer@gmail.com', 'Niceee', '0air-max-genome_50.png'),
(11, 2, 'buyer@gmail.com', 'Niceee', '1air-presto-shoes_50.png'),
(12, 2, 'buyer@gmail.com', 'Niceee', '2wew.mp4'),
(13, 1, 'buyer@gmail.com', 'Ganahan ko as all black', '0room.jpg'),
(14, 1, 'buyer@gmail.com', 'Ganahan ko as all black', '1wew.mp4'),
(15, 2, 'linda@gmail.com', 'Thanks Seller', '0air-presto-shoes_50.png'),
(16, 2, 'linda@gmail.com', 'Thanks Seller', '1E-LEARNING FIRST FEATURE.mp4'),
(17, 2, 'linda@gmail.com', 'Thanks Seller', '2room.jpg'),
(18, 1, 'linda@gmail.com', 'Luh kanindot', '0air-presto-shoes_50.png'),
(19, 1, 'linda@gmail.com', 'Luh kanindot', '1E-LEARNING FIRST FEATURE.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `order_history_table`
--
ALTER TABLE `order_history_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rated_product_table`
--
ALTER TABLE `rated_product_table`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_history_table`
--
ALTER TABLE `order_history_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rated_product_table`
--
ALTER TABLE `rated_product_table`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
