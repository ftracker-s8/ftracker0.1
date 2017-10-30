-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 09:14 AM
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

-- --------------------------------------------------------

--
-- Stand-in structure for view `categoriesunion`
-- (See below for the actual view)
--
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
-- Structure for view `categoriesunion`
--
DROP TABLE IF EXISTS `categoriesunion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categoriesunion`  AS  select `ca`.`category_id` AS `category_id`,`ca`.`category_name` AS `category_name`,`ca`.`icon_url` AS `icon_url`,`ca`.`color` AS `catgory_color`,`ca`.`category_desc` AS `category_desc`,`ca`.`user_id` AS `user_id` from `categories` `ca` union select `cu`.`uc_id` AS `category_id`,`cu`.`user_cat_name` AS `category_name`,`cu`.`user_cat_icon` AS `icon_url`,`cu`.`user_cat_color` AS `catgory_color`,`cu`.`user_cat_desc` AS `category_desc`,`cu`.`user_id` AS `user_id` from `user_categories` `cu` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
