-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 01:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3203367_s8ftracker_db`
--
CREATE DATABASE IF NOT EXISTS `id3203367_s8ftracker_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `id3203367_s8ftracker_db`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `ammount` double NOT NULL,
  `owner_id` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `account_desc` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IBAN:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `ammount`, `owner_id`, `currency`, `account_desc`) VALUES
(1, 'cash', 0, 1, '&eu', 'IBAN:'),
(2, 'cash', 0, 14, '&eu', 'IBAN:'),
(11, 'cash', 201, 26, '&eu', 'IBAN: 333'),
(12, 'RBBank', 203.5, 26, '&eu', 'IBAN: 222'),
(13, 'Balbunk', 72.43, 26, '&eu', 'IBAN: 111'),
(18, 'Goliamata', 3441, 26, '&eu', 'big desc');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL,
  `bud_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `bud_category` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `bud_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `icon_url` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `category_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `icon_url`, `color`, `category_desc`) VALUES
(1, 'Family', 'family.png', 'green', 'safds'),
(2, 'Food & Drinks', 'food.png', 'red', 'kkkkkk'),
(3, 'Travel', 'travel.png', 'yellow', 'dddd'),
(4, 'Entertainment', 'entert.png', 'red', 'cccc'),
(5, 'Healt', 'healt.png', 'blue', 'vvvv'),
(6, 'Kid', 'kid.png', 'blue', 'gggg'),
(7, 'House', 'house.png', 'blue', 'qqqqqqq'),
(8, 'Sport', 'sport.png', 'green', 'hhhhh'),
(9, 'Rent', 'house.png', '#ffff00', 'aaaaa'),
(11, 'default', 'default.png', '#dddddd', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `recurent_bill` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `date_time`, `account_id`, `amount`, `type`, `category_id`, `description`, `recurent_bill`, `user_id`) VALUES
(1, '2017-10-20 20:09:35', 11, 50, 'buy', 1, 'pantofi', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `user_pic` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '../uploads/placeholder.jpg',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password`, `first_name`, `last_name`, `user_pic`, `activated`, `last_login`, `deleted`) VALUES
(1, 'admin@admin.dev', 'a66df261120b6c2311c6ef0b1bab4e583afcbcc0', 'admin', 'admin', '../uploads/placeholder.jpg', 1, '2017-10-16 20:41:41', 0),
(9, 'test5@test5.dev', '911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23', 'Nametest5', 'Familytest5', '../uploads/placeholder.jpg', 1, '2017-10-17 21:41:43', 0),
(10, 'userone@test.dev', '52281b81fb6a6037c9e0b42369f062236bd93e86', 'userOne', 'familyOne', '../uploads/placeholder.jpg', 1, '2017-10-17 21:57:49', 0),
(14, 'test31@test.com', '5293da0e0a7bfc32bf8bf6ba98b4d4dac0bc6c10', 'test31', '', '../uploads/placeholder.jpg', 1, '2017-10-18 22:29:40', 0),
(22, 'test43@test.com', '2eee3e280033103efd95a2bd1bcf150acb0c62e0', 'test43', 'test43', '../uploads/placeholder.jpg', 1, '2017-10-19 08:20:55', 0),
(24, 'test20@test.com', '57e5a4df68387d1d97210cf40c41104ce9256cf6', 'test20', '20test', '../uploads/placeholder.jpg', 1, '2017-10-19 08:32:43', 0),
(25, 'test22@test.com', '8e59a08ba401da8aedd958b3a65c2d8e70dc8da2', 'test22', 'test22', '../uploads/placeholder.jpg', 1, '2017-10-19 08:38:15', 0),
(26, 'test30@test.com', 'f6ebefa3fcf47cdc0eb801265d1d2dabcfc4fff6', 'test30', '30test30', '../uploads/26-profile.jpg', 1, '2017-10-19 13:19:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

DROP TABLE IF EXISTS `user_categories`;
CREATE TABLE `user_categories` (
  `uc_id` int(11) NOT NULL,
  `user_cat_name` varchar(24) NOT NULL,
  `user_cat_icon` varchar(45) NOT NULL DEFAULT 'placeholder.png',
  `user_cat_color` varchar(11) NOT NULL,
  `user_cat_desc` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `fk_owner_id_idx` (`owner_id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `fk_bud_user_idx` (`owner_id`),
  ADD KEY `fk_bud_cat_idx` (`bud_category`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_trans_accounts_idx` (`account_id`),
  ADD KEY `fk_trans_categories_idx` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`uc_id`),
  ADD KEY `fk_usrcat_userid_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `uc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `fk_bud_cat` FOREIGN KEY (`bud_category`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bud_user` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_trans_accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trans_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `fk_usrcat_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
