-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 12:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truesql`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_purchased` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Your Name` int(255) NOT NULL,
  `Your Email` int(30) NOT NULL,
  `Subject` int(255) NOT NULL,
  `Message` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_register`
--

CREATE TABLE `customer_register` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_register`
--

INSERT INTO `customer_register` (`id`, `name`, `phone`, `email`, `password`, `city`, `address`) VALUES
(1, 'leela', '32658989', 'a@a.com', '123', 'vadodara', '55 South First Lane'),
(2, 'Emily Wynn', '78987897', 'g@g.com', '123', 'Et iste sed do volup', '845 West Cowley Drive'),
(3, 'Piper Lynch', 'Brenden Ra', 'b@b.com', '1', 'Voluptas aspernatur ', '15 North Second Court'),
(4, 'rathva leela', '1234569856', 'l@l.com', '123', 'vadodara', 'manjalpur vadodara'),
(5, '', '', '', '', '', ''),
(6, 'Rathva Raju', '7567670307', 'rathvaleela4@gmail.com', '123', 'Vadodara', '20,vijay raj nagar new sama ,vadodara.'),
(7, 'Rathva Raju', '7889654521', 'rajurathva1924@gmail.com', '123', 'Vadodara', '20,vijay raj nagar new sama ,vadodara.'),
(8, 'rathva geeta', '7845125896', 'rathvageeta1@gmail.com', '123', 'vadodara', '23 East Clarendon Extension');

-- --------------------------------------------------------

--
-- Table structure for table `final_order`
--

CREATE TABLE `final_order` (
  `order_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `p_image` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_type` varchar(50) NOT NULL DEFAULT 'COD',
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_order`
--

INSERT INTO `final_order` (`order_id`, `qty`, `product_price`, `p_image`, `user_id`, `order_type`, `user_name`, `user_email`, `user_mobile`, `user_address`, `date`, `time`) VALUES
(1, 2, 4000, 'upload/f8.jpg', 8, 'COD', 'rathva geeta', 'rathvageeta1@gmail.com', '7845125896', '23 East Clarendon Extension', '2022-02-24', '11:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `open`
--

CREATE TABLE `open` (
  `Id` int(6) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner_login`
--

CREATE TABLE `owner_login` (
  `username_or_email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner_register`
--

CREATE TABLE `owner_register` (
  `id` int(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_register`
--

INSERT INTO `owner_register` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'Rathva Leela', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `P_name` varchar(50) NOT NULL,
  `P_price` int(5) NOT NULL,
  `P_image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `P_name`, `P_price`, `P_image`) VALUES
(1, 'Product1 ', 350, 'upload/f9.jpg'),
(2, 'product2', 2000, 'upload/f8.jpg'),
(3, 'McKenzie Shaw', 77, 'upload/f6.jpg'),
(4, 'Adrian Burris', 641, 'upload/f7.jpg'),
(5, 'Riley Compton', 211, 'upload/f4.jpg'),
(6, 'Naomi Kerr', 615, 'upload/f10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quotaton_details_table`
--

CREATE TABLE `quotaton_details_table` (
  `qd_id` int(10) NOT NULL,
  `qut_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotaton_details_table`
--

INSERT INTO `quotaton_details_table` (`qd_id`, `qut_id`, `p_id`, `p_name`, `p_price`) VALUES
(1, 1, 2, 'product2', 2000),
(2, 1, 5, 'Riley Compton', 211),
(3, 1, 5, 'Riley Compton', 211),
(4, 2, 2, 'product2', 2000),
(5, 2, 5, 'Riley Compton', 211),
(6, 2, 5, 'Riley Compton', 211),
(10, 4, 2, 'product2', 2000),
(11, 4, 1, 'Product1 ', 350),
(13, 5, 3, 'McKenzie Shaw', 77),
(14, 6, 2, 'product2', 2000),
(15, 6, 2, 'product2', 2000),
(16, 6, 4, 'Adrian Burris', 641),
(17, 7, 3, 'McKenzie Shaw', 77),
(18, 7, 5, 'Riley Compton', 211),
(19, 9, 6, 'Naomi Kerr', 615),
(20, 9, 1, 'Product1 ', 350),
(21, 10, 4, 'Adrian Burris', 641),
(22, 10, 1, 'Product1 ', 350),
(23, 11, 1, 'Product1 ', 350),
(24, 11, 2, 'product2', 2000),
(25, 12, 2, 'product2', 2000),
(26, 12, 1, 'Product1 ', 350),
(27, 14, 1, 'Product1 ', 350),
(28, 15, 3, 'McKenzie Shaw', 77),
(29, 15, 4, 'Adrian Burris', 641),
(30, 16, 4, 'Adrian Burris', 641),
(31, 16, 2, 'product2', 2000),
(32, 17, 1, 'Product1 ', 350),
(33, 17, 5, 'Riley Compton', 211),
(34, 17, 2, 'product2', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `quotaton_table`
--

CREATE TABLE `quotaton_table` (
  `qut_id` int(10) NOT NULL,
  `persion_name` varchar(20) NOT NULL,
  `persion_email` varchar(30) DEFAULT NULL,
  `persion_mobile` varchar(30) NOT NULL,
  `q_date` date NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotaton_table`
--

INSERT INTO `quotaton_table` (`qut_id`, `persion_name`, `persion_email`, `persion_mobile`, `q_date`, `total_amount`) VALUES
(1, 'JIGAR', NULL, '879879987987', '2022-02-18', 2422),
(2, 'JIGAR', NULL, '879879987987', '2022-02-18', 2422),
(4, 'Rathva Leela', NULL, '7894561236', '2022-02-26', 2350),
(5, 'Rathva Leela', 'rathvaleela4@gmail.com', '1235648788', '2022-02-25', 77),
(6, 'xzz', 'rathvaleela4@gmail.com', 'ghjgj', '2022-02-26', 4641),
(7, 'Rathva Leela', 'rathvaleela4@gmail.com', '7894561236', '2022-02-26', 288),
(8, 'Rathva Leela', 'rathvaleela4@gmail.com', '7894561236', '2022-02-26', 288),
(9, 'new', 'new@gmail.com', '123456789', '2022-02-24', 965),
(10, 'Armand Schroeder', 'qemosefyp@mailinator.com', '13-Nov-2019', '2015-01-19', 991),
(11, 'Teegan Warner', 'bocyhymih@mailinator.com', '07-Jul-2003', '2006-02-05', 2350),
(12, 'Kenneth Figueroa', 'cudynen@mailinator.com', '321365464', '2004-05-05', 2350),
(13, 'Kenneth Figueroa', 'cudynen@mailinator.com', '321365464', '2004-05-05', 2350),
(14, 'Rathva Leela new', 'rathvaleela4@gmail.com', '8745896545', '2022-01-22', 350),
(15, 'Gabriel Fitzpatrick', 'sewuzomyry@mailinator.com', '24-May-2002', '2008-07-27', 718),
(16, 'rathva', 'rathvageeta1@gmail.com', '8754986521', '2014-04-27', 2641),
(17, 'Forrest Pruitt', 'rajurathva1924@gmail.com', '7898568754', '1979-05-23', 2561);

-- --------------------------------------------------------

--
-- Table structure for table `q_persion`
--

CREATE TABLE `q_persion` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register2`
--

CREATE TABLE `register2` (
  `Name` int(11) NOT NULL,
  `Email` int(11) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register2`
--

INSERT INTO `register2` (`Name`, `Email`, `Age`) VALUES
(0, 0, 123),
(0, 0, 445);

-- --------------------------------------------------------

--
-- Table structure for table `reparing_product`
--

CREATE TABLE `reparing_product` (
  `id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image` mediumtext NOT NULL,
  `reparing_date` date NOT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `address` varchar(60) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT '0' COMMENT 'pending=0,approved=1,confirm=2,reject=3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reparing_product`
--

INSERT INTO `reparing_product` (`id`, `c_id`, `name`, `description`, `image`, `reparing_date`, `price`, `address`, `Status`) VALUES
(1, 1, 'Cullen Pace', 'Amet incidunt temp', 'reparing_image/f1.jpg', '2022-02-12', 200, 'Et id fugit quos s', '2'),
(2, 1, 'Nolan Noel', 'Sed rem dolores amet', 'reparing_image/f2.jpg', '2022-02-12', 500, 'Vitae ea tempora dol', '3'),
(3, 2, 'Kadeem Sargent', 'Omnis omnis repudian', 'reparing_image/f10.jpg', '2022-02-12', 500, 'Quis cupiditate ut i', '3'),
(4, 1, 'Jayme Larson', 'Nulla exercitation e', 'reparing_image/f1.jpg', '2022-02-14', 0, 'Maiores ut tempore ', '0'),
(7, 1, 'Veda Wheeler', 'Voluptatum at error ', 'reparing_image/favicon.ico', '2022-02-17', 0, 'Aut veritatis quo in', '0'),
(8, 8, 'product12', 'hfv jhfghjfg fg', 'reparing_image/f10.jpg', '2022-02-26', 5000, 'Tenetur officiis omn', '2');

-- --------------------------------------------------------

--
-- Table structure for table `temp_product`
--

CREATE TABLE `temp_product` (
  `temp_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `foreignekey` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer_register`
--
ALTER TABLE `customer_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_order`
--
ALTER TABLE `final_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `owner_register`
--
ALTER TABLE `owner_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotaton_details_table`
--
ALTER TABLE `quotaton_details_table`
  ADD PRIMARY KEY (`qd_id`),
  ADD KEY `qut_id` (`qut_id`);

--
-- Indexes for table `quotaton_table`
--
ALTER TABLE `quotaton_table`
  ADD PRIMARY KEY (`qut_id`);

--
-- Indexes for table `q_persion`
--
ALTER TABLE `q_persion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reparing_product`
--
ALTER TABLE `reparing_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_product`
--
ALTER TABLE `temp_product`
  ADD PRIMARY KEY (`temp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `customer_register`
--
ALTER TABLE `customer_register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `final_order`
--
ALTER TABLE `final_order`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner_register`
--
ALTER TABLE `owner_register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotaton_details_table`
--
ALTER TABLE `quotaton_details_table`
  MODIFY `qd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `quotaton_table`
--
ALTER TABLE `quotaton_table`
  MODIFY `qut_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `q_persion`
--
ALTER TABLE `q_persion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reparing_product`
--
ALTER TABLE `reparing_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_product`
--
ALTER TABLE `temp_product`
  MODIFY `temp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer_register` (`id`),
  ADD CONSTRAINT `foreignekey` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `quotaton_details_table`
--
ALTER TABLE `quotaton_details_table`
  ADD CONSTRAINT `quotaton_details_table_ibfk_1` FOREIGN KEY (`qut_id`) REFERENCES `quotaton_table` (`qut_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
