-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 08:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshoppin`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`) VALUES
(1, '31072024160754.jpg', '2024-07-31 13:58:56'),
(2, '31072024162805.jpg', '2024-07-31 14:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'cart',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `status`, `created_at`) VALUES
(16, 24, 22, 1, 'confirmed', '2024-08-01 17:10:10'),
(17, 24, 18, 1, 'waiting', '2024-08-01 17:10:11'),
(18, 24, 21, 1, 'waiting', '2024-08-01 17:10:11'),
(19, 24, 24, 1, 'waiting', '2024-08-01 17:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `short_description`, `description`, `created_at`) VALUES
(17, 'Bolen', '01082024085900.jpg', 30000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-07-30 09:32:56'),
(18, 'Donat Coklat', '01082024085942.jpg', 30000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 06:59:42'),
(19, 'Mpek mpek', '01082024090013.jpg', 30000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:00:13'),
(20, 'Cheese Roll', '01082024090556.jpg', 25000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:05:56'),
(21, 'Sus fla susu', '01082024090626.jpg', 30000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:06:26'),
(22, 'Risoles', '01082024090653.jpg', 25000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:06:53'),
(23, 'Strudle', '01082024090714.jpg', 50000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:07:14'),
(24, 'Soup Zuppa Cream', '01082024090818.jpg', 8000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:08:18'),
(25, 'Sosis Solo', '01082024090839.jpg', 4000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quam fugiat veritatis quibusdam similique alias, asperiores quisquam ullam officia ipsa deleniti vitae corrupti assumenda voluptatibus optio facilis, nostrum delectus quia.', '2024-08-01 07:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(2555) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','','') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(23, 'admin', '123123', 'admin@admin.com', '$2y$12$wMDLvj8ZIbAgQJC3PX4MOODM1uUMUo0KHdtgfGFKD2Cr.dVl/W6Vy', 'admin', '2024-08-01 17:08:55'),
(24, 'Irfandy Aziz', '123123', 'irfandyzize@gmail.com', '$2y$12$oJoT/Ptf6fkTmS3ecd6P9e9xAxoj2IEE.N5YusHZlKmexFFQP0upK', 'user', '2024-08-01 17:09:07'),
(25, 'user', '123123', 'user@user.com', '$2y$12$Q0KcWvekgj/AzlTQF4fRAenfAXWv2XJHX9gYT3UAHFv86DhuLuzkq', 'user', '2024-08-01 17:11:15'),
(26, 'user2', '123123', 'user2@email.com', '$2y$12$w3dhGPJ0Rfr4DNL1WgOhneJ8v.4gE1jlbtUrkP6X06hXKIOO0D/Ha', 'user', '2024-08-01 17:13:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
