-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2017 at 08:57 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3203367_s8ftracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ft_accounts`
--

CREATE TABLE `ft_accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(45) NOT NULL,
  `ammount` double NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ft_budget`
--

CREATE TABLE `ft_budget` (
  `budget_id` int(11) NOT NULL,
  `bud_name` varchar(45) DEFAULT NULL,
  `bud_category` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ft_categories`
--

CREATE TABLE `ft_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `icon_url` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ft_transactions`
--

CREATE TABLE `ft_transactions` (
  `transaction_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ft_users`
--

CREATE TABLE `ft_users` (
  `users_id` int(11) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ft_accounts`
--
ALTER TABLE `ft_accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_name_UNIQUE` (`account_name`),
  ADD KEY `fk_owner_id_idx` (`owner_id`);

--
-- Indexes for table `ft_budget`
--
ALTER TABLE `ft_budget`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `fk_bud_user_idx` (`owner_id`),
  ADD KEY `fk_bud_cat_idx` (`bud_category`);

--
-- Indexes for table `ft_categories`
--
ALTER TABLE `ft_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ft_transactions`
--
ALTER TABLE `ft_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `date_time_UNIQUE` (`date_time`),
  ADD KEY `fk_trans_type_idx` (`type`),
  ADD KEY `fk_account_idx` (`account_id`),
  ADD KEY `fk_category_idx` (`category`);

--
-- Indexes for table `ft_users`
--
ALTER TABLE `ft_users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ft_accounts`
--
ALTER TABLE `ft_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ft_budget`
--
ALTER TABLE `ft_budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ft_categories`
--
ALTER TABLE `ft_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ft_transactions`
--
ALTER TABLE `ft_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ft_users`
--
ALTER TABLE `ft_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ft_accounts`
--
ALTER TABLE `ft_accounts`
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `ft_users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ft_budget`
--
ALTER TABLE `ft_budget`
  ADD CONSTRAINT `fk_bud_cat` FOREIGN KEY (`bud_category`) REFERENCES `ft_categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bud_user` FOREIGN KEY (`owner_id`) REFERENCES `ft_users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ft_transactions`
--
ALTER TABLE `ft_transactions`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`account_id`) REFERENCES `ft_accounts` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `ft_categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trans_type` FOREIGN KEY (`type`) REFERENCES `ft_transaction_type` (`transaction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
