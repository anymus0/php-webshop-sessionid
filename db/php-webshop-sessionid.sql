-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2022 at 02:29 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-webshop-sessionid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

DROP TABLE IF EXISTS `cartitems`;
CREATE TABLE IF NOT EXISTS `cartitems` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `sessionId` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productId` (`productId`),
  KEY `sessionId` (`sessionId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`id`, `productId`, `quantity`, `sessionId`) VALUES
(1, 8, 11, 'i92s5eivpcj6rlo0hbkssuphld'),
(2, 1, 22, 'i92s5eivpcj6rlo0hbkssuphld');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Laptop'),
(2, 'PC'),
(3, 'Mouse'),
(4, 'Keyboard');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ProductId` int NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ProductId` (`ProductId`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `ProductId`, `userId`) VALUES
(1, 1, 2),
(2, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `price` int NOT NULL,
  `categoryId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `categoryId`) VALUES
(1, 'Apple MacBook Air', 'M1 Chip, 8GB RAM, 256GB SSD', 500000, 1),
(2, 'ASUS X409FA-BV643', 'Intel Core i3, 8GB RAM, 256GB SSD', 200000, 1),
(3, 'ASUS ROG Strix G15DH-HU005T', 'AMD Picasso, 8GB RAM, 512GB SSD', 350000, 2),
(4, 'Cooler Master MasterMouse MM531', 'Optikai, USB', 32000, 3),
(5, 'Logitech G305', 'Optikai, USB', 40000, 3),
(6, 'Cooler Master CK350 ', 'Outemu kapcsolók, LED: RGB', 42000, 4),
(7, 'White Shark GK-2022', '50 millió garantált leütés, Mechanikus', 29000, 4),
(8, 'Apple Magic Mouse', 'Wireless', 30000, 3),
(9, 'HP HyperX Alloy Core', 'RGB, US layout', 9999, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subCategoryId` int DEFAULT NULL,
  `ProductId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subCategoryId` (`subCategoryId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `subCategoryId`, `ProductId`) VALUES
(1, 1, 1),
(2, 1, 8),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 9),
(9, 3, 2),
(10, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Gamer'),
(3, 'Budget');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `passwordHash` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `sessionId` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`),
  KEY `sessionId` (`sessionId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `passwordHash`, `sessionId`) VALUES
(1, 'user', '7815696ecbf1c96e6894b779456d330e', '0'),
(2, 'user2', '7815696ecbf1c96e6894b779456d330e', 'i92s5eivpcj6rlo0hbkssuphld');

-- --------------------------------------------------------

--
-- Table structure for table `usersessions`
--

DROP TABLE IF EXISTS `usersessions`;
CREATE TABLE IF NOT EXISTS `usersessions` (
  `id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `usersessions`
--

INSERT INTO `usersessions` (`id`) VALUES
('i92s5eivpcj6rlo0hbkssuphld');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
