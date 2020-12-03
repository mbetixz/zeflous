-- Wap PhpMyAdmin 211
-- http://master-land.net/phpmyadmin 
-- Generation Time: 2020-12-03 21:04
-- MySQL Server Version: 5.5.5-10.5.8-MariaDB
-- PHP Version: 7.4.12

-- Database: `localhost2020`


-- --------------------------------------------------------
-- 
-- Table structure for table `users`
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(18) unsigned NOT NULL,
  `keyname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rights` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `verify` varchar(300) NOT NULL DEFAULT '{"status":0,"code":""}',
  `joindate` int(11) unsigned NOT NULL,
  `lastvisit` int(11) unsigned NOT NULL,
  `contact` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keyname` (`keyname`),
  UNIQUE KEY `email` (`email`),
  KEY `name` (`name`),
  KEY `fullname` (`fullname`),
  KEY `password` (`password`),
  KEY `rights` (`rights`),
  KEY `verify` (`verify`),
  KEY `joindate` (`joindate`),
  KEY `lastvisit` (`lastvisit`),
  FULLTEXT KEY `contact` (`contact`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES ('123456789123456789','mbetixz','Mbetixz','Muhammad Aris Ariyanto','mbetixz93@gmail.com','1915712f9c79da9dacbaeec2fcd5708a','9','{"status":0,"code":""}','1078827282','1078827282','','');

-- --------------------------------------------------------
-- 
-- Table structure for table `users_settings`
-- 

DROP TABLE IF EXISTS `users_settings`;
CREATE TABLE `users_settings` (
  `id` bigint(18) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- 
-- Dumping data for table `users_settings`
-- 

INSERT INTO `users_settings` VALUES ('123456789123456789','{"timeshift":0,"page":10}');
