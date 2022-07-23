-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 11:07 PM
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
(5, 1, '0loginblackshoe.png'),
(6, 1, '1under.png');

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
  `date_checkout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history_table`
--

INSERT INTO `order_history_table` (`order_id`, `prod_name`, `qty`, `buyer_name`, `buyer_location`, `price_per_unit`, `total_per_unit`, `seller_name`, `date_checkout`) VALUES
(5, 'Nike Air Max Genome asdfasdfasd', 1, 'Kyle Rosales Perino ', 'Siocon, Bogo, Cebu', 4350, 4350, 1, '  06/03/2022'),
(6, 'Nike Air Max 90 SE', 1, 'Kyle Rosales Perino ', 'Siocon, Bogo, Cebu', 3000, 3000, 3, '  06/03/2022'),
(7, 'Adidas Solecourt', 1, 'Juliana Mae Rosales Perino ', 'Siocon, Bogo, Cebu', 7600, 7600, 1, '  06/01/2022'),
(8, 'Korean Shoes', 2, 'Juliana Mae Rosales Perino ', 'Siocon, Bogo, Cebu', 2000, 4000, 1, '  06/03/2022'),
(9, 'Nike Air Max 90 SE', 2, 'Juliana Mae Rosales Perino ', 'Siocon, Bogo, Cebu', 3000, 6000, 3, '  06/03/2022'),
(10, 'Nike Air Max Genome asdfasdfasd', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4350, 4350, 1, '  06/03/2022'),
(11, 'Adidas Solecourt', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 7600, 7600, 1, '  06/03/2022'),
(12, 'Nike Air Max 90 SE', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 3000, 6000, 3, '  06/03/2022'),
(13, 'Nike Air Max Genome asdfasdfasd', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4350, 8700, 1, '  06/03/2022'),
(14, 'Nike Air Max Genome asdfasdfasd', 2, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 4350, 8700, 1, '  06/04/2022'),
(15, 'Adidas Solecourt', 2, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 7600, 15200, 1, '  06/04/2022'),
(16, 'Korean Shoes', 2, 'Rosales, Rosalinda Perino', 'Siocon, Bogo, Cebu', 2000, 4000, 1, '  06/04/2022'),
(17, 'Adidas Solecourt', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 7600, 7600, 1, '  06/06/2022'),
(18, 'Nike Air Presto', 1, 'Rosales, Kyle Perino', 'Siocon, Bogo, Cebu', 1200, 1200, 1, '  06/06/2022');

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
(1, 'Low Cut Shoes', 'Women', 'Sneakers', '45', 4224, 57, 1);

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
(1, 4, 2, '0', 'NOT'),
(4, 1, 2, '2', 'RATED');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_history_table`
--
ALTER TABLE `order_history_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rated_product_table`
--
ALTER TABLE `rated_product_table`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
