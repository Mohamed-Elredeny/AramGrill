-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 09:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aramgrill`
--

-- --------------------------------------------------------

--
-- Table structure for table `allorders`
--

CREATE TABLE `allorders` (
  `id` int(11) NOT NULL,
  `products` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `totalPrice` float NOT NULL,
  `amounts` text NOT NULL,
  `sizes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allorders`
--

INSERT INTO `allorders` (`id`, `products`, `created_at`, `totalPrice`, `amounts`, `sizes`) VALUES
(3, 'm&s&r', '2021-01-07 06:40:08', 20, '1&2&3', 's&s&s'),
(4, 'm&s&r', '2021-01-07 06:41:51', 20, '1&2&3', 's&s&s'),
(5, 'm&s&r', '2021-01-07 06:43:47', 20, '1&2&3', 's&s&s'),
(6, 'm&s&r', '2021-01-07 06:44:04', 20, '1&2&3', 's&s&s'),
(7, '17&18&19&20&21&22', '2021-01-07 06:49:57', 20, '5&2&5&8&5&2', 's&s&s');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'الفئة الاولي'),
(2, 'الفئة الثانية'),
(3, 'الفئة الثالثة'),
(5, 'الفئة الرابعة');

-- --------------------------------------------------------

--
-- Table structure for table `currentorder`
--

CREATE TABLE `currentorder` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentorder`
--

INSERT INTO `currentorder` (`id`, `product_id`, `quantity`) VALUES
(17, 2, 5),
(18, 3, 2),
(19, 1, 5),
(20, 4, 8),
(21, 5, 5),
(22, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `size` text NOT NULL,
  `sizeCost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `size`, `sizeCost`) VALUES
(1, 'p1', 20, 1, 'صغير&كبير&وسط', '20&30&40'),
(2, 'p2', 20, 1, 'وسط', ''),
(3, 'p3', 30, 2, 'وسط', ''),
(4, 'p4', 30, 2, 'وسط', ''),
(5, 'p5', 30, 2, 'وسط', ''),
(7, 'moka', 20, 3, 'صغير&كبير&وسط', '20&30&40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'moka', 'moka@yahoo.com', '123', 1),
(2, 'moka', 'moka@yahoo.com', '123', 1),
(3, 'moka', 'moka@yahoo.com', '123', 1),
(6, 'moka', 'moka@yahoo.com', '123', 1),
(8, 'محمد', 'mohamedelerdeny1@gmail.com', '123123', 0),
(9, 'قسم جديد', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allorders`
--
ALTER TABLE `allorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentorder`
--
ALTER TABLE `currentorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currentorder_ibfk_1` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allorders`
--
ALTER TABLE `allorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `currentorder`
--
ALTER TABLE `currentorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `currentorder`
--
ALTER TABLE `currentorder`
  ADD CONSTRAINT `currentorder_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
