-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 10:06 PM
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
CREATE DATABASE IF NOT EXISTS `id3203367_s8ftracker_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id3203367_s8ftracker_db`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ammount` double NOT NULL,
  `owner_id` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `account_desc` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IBAN:',
  `last_access` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `ammount`, `owner_id`, `currency`, `account_desc`, `last_access`) VALUES
(1, 'cash', 0, 1, '$', 'IBAN:', '2017-10-28 00:42:44'),
(11, 'cash', 96, 26, '$', 'ca$h', '2017-10-28 00:42:44'),
(13, 'Balbunk', 204.36, 26, '$', 'IBAN: 111 thfhfhfgh', '2017-10-28 00:42:44'),
(18, 'Goliamata', 3150, 26, '$', 'big desc', '2017-10-28 00:42:44'),
(26, 'cash', 100, 27, '$', 'IBAN:', '2017-10-28 00:42:44'),
(27, 'cash', 0, 28, '$', 'IBAN:', '2017-10-28 00:42:44'),
(28, 'cash', 0, 29, '$', 'IBAN:', '2017-10-28 00:42:44'),
(35, 'Salary', 900.2, 26, '$', 'Recurent salary', '2017-10-28 00:42:44'),
(36, 'cash', 150, 30, '', 'IBAN:', '2017-10-28 09:23:46'),
(37, 'bank my', 1001, 30, '', 'salary', '2017-10-28 13:40:26'),
(38, 'cash', 50, 31, '', 'IBAN:', '2017-10-29 15:59:11'),
(39, 'Salary', 0, 31, '', 'Monthly Salary', '2017-10-29 17:39:07'),
(40, 'new5acc', 301, 26, '', 'new5acc', '2017-11-01 00:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL,
  `bud_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
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
  `category_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `icon_url` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(11) COLLATE utf8_unicode_ci DEFAULT '#ffffff',
  `category_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `in_out` varchar(3) COLLATE utf8_unicode_ci DEFAULT 'out'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `icon_url`, `color`, `category_desc`, `user_id`, `in_out`) VALUES
(1, 'Family', 'family.png', 'green', 'family members', 0, 'out'),
(2, 'Food and Drinks', 'food.png', 'red', 'food, drinks', 0, 'out'),
(3, 'Travel', 'travel.png', 'orange', 'Hollidays, trave', 0, 'out'),
(4, 'Entertainment', 'entert.png', 'red', 'cinema, concert, opera', 0, 'out'),
(5, 'Healt', 'healt.png', 'blue', 'doctors, dentist', 0, 'out'),
(6, 'Kid', 'kid.png', 'blue', 'kids pocket money', 0, 'out'),
(7, 'House', 'house.png', 'blue', 'upkeep etc', 0, 'out'),
(8, 'Sport', 'sport.png', 'green', 'fitness, aerobics', 0, 'out'),
(9, 'Rent', 'house.png', 'aaaa00', 'apartemnt, car', 0, 'out'),
(11, 'Other', 'default.png', 'dddddd', 'not specified', 0, 'out'),
(12, 'Salary', 'wallet.png', 'green', 'salary', 0, 'in'),
(13, 'Deal', 'wallet.png', 'green', 'deal', 0, 'in'),
(14, 'Task', 'wallet.png', 'aaffaa', 'task', 0, 'in'),
(15, 'Freelance', 'wallet.png', '10ff10', 'freelance', 0, 'in'),
(16, 'Other Job', 'money.png', 'aaffbb', 'other', 0, 'in'),
(17, 'custom3', 'food.png', 'CCA633', 'custom3', 26, 'out'),
(18, 'custom4', 'money.png', 'D71B9B', 'custom4', 26, 'out');

-- --------------------------------------------------------

--
-- Stand-in structure for view `categoriesunion`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `categoriesunion`;
CREATE TABLE `categoriesunion` (
`category_id` int(11)
,`category_name` varchar(16)
,`icon_url` varchar(45)
,`catgory_color` varchar(11)
,`category_desc` varchar(45)
,`user_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE `months` (
  `idm` int(11) NOT NULL,
  `monthn` int(11) DEFAULT NULL,
  `m_date` date DEFAULT NULL,
  `m_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`idm`, `monthn`, `m_date`, `m_year`) VALUES
(1, 1, '0000-00-00', NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(4, 4, NULL, NULL),
(5, 5, NULL, NULL),
(6, 6, NULL, NULL),
(7, 7, NULL, NULL),
(8, 8, NULL, NULL),
(9, 9, NULL, NULL),
(10, 10, NULL, NULL),
(11, 11, NULL, NULL),
(12, 12, NULL, NULL);

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
  `exp_inc` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'exp',
  `category_id` int(11) DEFAULT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `recurent_bill` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `date_time`, `account_id`, `amount`, `exp_inc`, `category_id`, `description`, `recurent_bill`, `user_id`) VALUES
(3, '2016-01-25 21:46:15', 13, 121, 'inc', 14, 'luposti', 0, 26),
(4, '2017-02-25 21:46:18', 13, 1202, 'exp', 3, 'luposti', 0, 26),
(5, '2017-03-25 21:46:20', 13, 123, 'exp', 3, 'luposti', 0, 26),
(6, '2017-04-25 20:46:46', 18, 320, 'exp', 2, 'gluposti', 0, 26),
(7, '2017-10-27 20:47:41', 1, 1020, 'exp', 2, 'gluposti', 0, 1),
(8, '2017-10-25 20:48:18', 1, 2020, 'inc', 2, 'drugi gluposti', 0, 1),
(12, '2017-05-25 21:13:27', 11, 120, 'exp', 3, 'drugi2 gluposti', 0, 26),
(13, '2017-06-25 21:13:29', 11, 12, 'exp', 3, 'drugi2 gluposti', 0, 26),
(14, '2017-07-25 21:13:29', 11, 35, 'exp', 3, 'drugi2 gluposti', 0, 26),
(15, '2017-08-25 21:13:30', 11, 274, 'inc', 12, 'drugi2 pari', 0, 26),
(16, '2017-09-25 21:20:44', 11, 129, 'inc', 12, ' gluposti', 0, 26),
(17, '2017-10-25 21:21:43', 11, 1210, 'inc', 14, 'pari', 0, 26),
(19, '2017-10-28 00:38:58', 13, 50, 'exp', 4, 'macki', 0, 26),
(20, '2017-10-29 01:44:30', 11, 24.22, 'exp', 3, 'Montly bus card', 0, 26),
(21, '2017-10-29 10:22:01', 18, 41, 'exp', 5, 'proba', 0, 26),
(23, '2017-10-29 19:05:50', 37, 100, 'inc', 2, 'dsafdsfsd', 0, 30),
(24, '2017-10-28 23:48:39', 35, 100, 'exp', 4, 'asddda', 0, 26),
(25, '2017-10-29 11:11:10', 18, 150, 'exp', 6, '1111', 0, 26),
(26, '2017-10-29 11:11:37', 11, 111, 'exp', 5, '32132132', 0, 26),
(28, '2017-10-29 12:14:46', 35, 133.01, 'inc', 15, 'asaaaaa', 1, 26),
(29, '2017-10-29 20:47:22', 38, 100, 'exp', 1, '1st entry', 0, 31),
(30, '2017-10-29 23:31:25', 39, 121.15, 'inc', 12, 'tada', 0, 31),
(31, '2017-10-29 23:32:52', 39, 1.25, 'exp', 8, '1111', 0, 31),
(32, '2017-10-29 23:33:31', 38, 200, 'inc', 13, 'dada', 0, 31),
(33, '2017-10-29 23:49:56', 39, 119.9, 'exp', 1, 'no description', 0, 31),
(34, '2017-10-29 23:50:12', 38, 200, 'exp', 2, 'no description', 0, 31),
(35, '2017-10-29 23:53:06', 38, 50, 'inc', 14, 'no description', 0, 31),
(36, '2017-08-01 07:00:00', 11, 22, 'exp', 9, 'ski', 0, 26),
(37, '2017-03-30 00:01:03', 11, 51, 'inc', 13, 'no description', 0, 26),
(39, '2017-04-25 18:46:46', 13, 77, 'inc', 16, 'nonono', 0, 26),
(40, '2017-02-11 14:34:27', 13, 46.22, 'inc', 13, 'aaaa', 0, 26),
(43, '2017-11-01 01:31:01', 40, 199, 'exp', 18, 'new custom cats', 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

DROP TABLE IF EXISTS `user_categories`;
CREATE TABLE `user_categories` (
  `uc_id` int(11) NOT NULL,
  `user_cat_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `user_cat_icon` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'wallet.png',
  `user_cat_color` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#ffffff',
  `user_cat_desc` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no desc',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`uc_id`, `user_cat_name`, `user_cat_icon`, `user_cat_color`, `user_cat_desc`, `user_id`) VALUES
(21, 'test1', 'default.png', 'ff00aa', 'desc1', 26),
(22, 'test2', 'default.png', 'red', 'desc2', 26),
(23, 'custom1', 'phone.png', 'CC0300', 'proba', 27),
(24, 'custom1', 'money.png', '91AD4E', 'stroitelni mats', 26),
(25, 'Custom 2', 'food.png', 'A62E63', 'asdasdasd', 30),
(28, 'Cat2', 'kid.png', '#2F10CC', 'Cat2Cat2Cat2Cat2', 31),
(34, 'bbbbb', 'food.png', '#1616CC', 'sdfsdfdsfsdf', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
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
(22, 'test43@test.com', '2eee3e280033103efd95a2bd1bcf150acb0c62e0', 'test43', 'test43', '../uploads/placeholder.jpg', 1, '2017-10-19 08:20:55', 0),
(25, 'test22@test.com', '8e59a08ba401da8aedd958b3a65c2d8e70dc8da2', 'test22', 'test22', '../uploads/placeholder.jpg', 1, '2017-10-19 08:38:15', 0),
(26, 'test30@test.com', 'f6ebefa3fcf47cdc0eb801265d1d2dabcfc4fff6', 'AsN-u26', 'Asenoff', '../uploads/26-profile.jpeg', 1, '2017-10-19 13:19:18', 0),
(27, 'proba1@test.com', '4c018b114cbd5875ad38658cd425c8758a42c7ff', 'proba1', '1proba', '../uploads/27-profile.jpeg', 1, '2017-10-25 17:56:13', 0),
(28, 'pesho', 'e8cacc7ab55c3d2b268ed334d03fbb6734c21b51', 'pesho', 'pesho', '../uploads/placeholder.jpg', 1, '2017-10-26 09:04:32', 0),
(29, 'pesho@test.com', '88ac22d45b08079504d58d97867af5430afee469', 'pesho', 'pesho', '../uploads/placeholder.jpg', 1, '2017-10-26 09:08:16', 0),
(30, 'test1@test.com', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'User1', 'Test1', '../uploads/placeholder.jpg', 1, '2017-10-28 09:23:46', 0),
(31, 'ivan@ivanov.com', 'a15f8b81a160b4eebe5c84e9e3b65c87b9b2f18e', 'ivan', 'ivanov', '../uploads/placeholder.jpg', 1, '2017-10-29 15:59:11', 0);

-- --------------------------------------------------------

--
-- Structure for view `categoriesunion`
--
DROP TABLE IF EXISTS `categoriesunion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categoriesunion`  AS  select `ca`.`category_id` AS `category_id`,`ca`.`category_name` AS `category_name`,`ca`.`icon_url` AS `icon_url`,`ca`.`color` AS `catgory_color`,`ca`.`category_desc` AS `category_desc`,`ca`.`user_id` AS `user_id` from `categories` `ca` union select `cu`.`uc_id` AS `category_id`,`cu`.`user_cat_name` AS `category_name`,`cu`.`user_cat_icon` AS `icon_url`,`cu`.`user_cat_color` AS `catgory_color`,`cu`.`user_cat_desc` AS `category_desc`,`cu`.`user_id` AS `user_id` from `user_categories` `cu` ;

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
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_uid_userid_idx` (`user_id`),
  ADD KEY `fk_uii_idx` (`user_id`),
  ADD KEY `fk_accounts_idx` (`account_id`),
  ADD KEY `fk_cus_idx` (`category_id`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`uc_id`),
  ADD KEY `fk_usrcat_userid_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `uc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
  ADD CONSTRAINT `fk_accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `fk_usrcat_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
