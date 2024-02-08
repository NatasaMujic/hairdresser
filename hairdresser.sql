-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2024 at 08:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairdresser`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Natasa', 'Mujic', 'mujicnatasa99@gmail.com', '$2y$10$mzqg3vrtD2KzSWbQ3LYPp.1/50reRXR2p9DL9jfLHnOW4eEmccJgq');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_appointment`
--

DROP TABLE IF EXISTS `cancel_appointment`;
CREATE TABLE IF NOT EXISTS `cancel_appointment` (
  `id_cancel` int NOT NULL AUTO_INCREMENT,
  `id_reservation` int NOT NULL,
  `id_user` int NOT NULL,
  `id_treatment` int NOT NULL,
  `email` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `cancel_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cancel`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `cancel_appointment`
--

INSERT INTO `cancel_appointment` (`id_cancel`, `id_reservation`, `id_user`, `id_treatment`, `email`, `date`, `time`, `cancel_date`) VALUES
(1, 3, 20, 19, 'mujicnatasa99@gmail.com', '2024-02-28', '03:20:00', '2024-02-07 22:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `intake_forms`
--

DROP TABLE IF EXISTS `intake_forms`;
CREATE TABLE IF NOT EXISTS `intake_forms` (
  `id_form` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `user_fname` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `user_lname` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `user_email` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `stylist_email` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `message` varchar(240) COLLATE utf8mb3_bin NOT NULL,
  `fill_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_form`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `intake_forms`
--

INSERT INTO `intake_forms` (`id_form`, `id_user`, `user_fname`, `user_lname`, `user_email`, `stylist_email`, `message`, `fill_date`) VALUES
(1, 20, 'Natasa', 'Mujic', 'mujicnatasa99@gmail.com', 'mujicnatasa99@gmail.com', 'I have a weak hair!', '2024-02-07 23:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `new_treatment`
--

DROP TABLE IF EXISTS `new_treatment`;
CREATE TABLE IF NOT EXISTS `new_treatment` (
  `id_treatment` int NOT NULL AUTO_INCREMENT,
  `id_stylist` int NOT NULL,
  `id_service` int NOT NULL,
  `treatment_name` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `description` varchar(120) COLLATE utf8mb3_bin NOT NULL,
  `treatment_duration` varchar(16) COLLATE utf8mb3_bin NOT NULL,
  `price` smallint NOT NULL,
  `discount` smallint NOT NULL,
  `date_of_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `term_date` date NOT NULL,
  `term_time` time NOT NULL,
  `blocked` tinyint NOT NULL,
  PRIMARY KEY (`id_treatment`),
  KEY `id_stylist` (`id_stylist`),
  KEY `id_service` (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `new_treatment`
--

INSERT INTO `new_treatment` (`id_treatment`, `id_stylist`, `id_service`, `treatment_name`, `description`, `treatment_duration`, `price`, `discount`, `date_of_publication`, `availability`, `image`, `term_date`, `term_time`, `blocked`) VALUES
(31, 4, 2, 'Short Hair', 'Welcome to our short hair treatment', '55min', 56, 13, '2024-02-07 17:19:33', '2024-02-18 00:00:00', 'shorthair.jpg', '2024-02-27', '18:40:00', 0),
(30, 4, 2, 'Coloful Hair', 'weqweqweq', '56min', 16, 0, '2024-02-07 17:16:36', '2024-02-18 00:00:00', 'blue-hair.jpg', '2024-02-21', '19:19:00', 0),
(32, 4, 2, 'Short Hair', 'Welcome to our short hair treatment', '55min', 56, 13, '2024-02-07 17:19:33', '2024-02-18 00:00:00', 'shorthair.jpg', '2024-02-21', '22:24:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_stylist`
--

DROP TABLE IF EXISTS `registered_stylist`;
CREATE TABLE IF NOT EXISTS `registered_stylist` (
  `id_stylist` int NOT NULL AUTO_INCREMENT,
  `stylist_fname` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `stylist_lname` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `email` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `password` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `salon_name` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `business_name` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `phone_number` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `state` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `city` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `website` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `service_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `block_user` tinyint NOT NULL,
  `activation_code` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_stylist`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `registered_stylist`
--

INSERT INTO `registered_stylist` (`id_stylist`, `stylist_fname`, `stylist_lname`, `email`, `password`, `salon_name`, `business_name`, `phone_number`, `state`, `city`, `website`, `service_type`, `registration_date`, `block_user`, `activation_code`) VALUES
(4, 'Natalija', 'Mujic', 'mujicnatasa99@gmail.com', '$2y$10$mCCJ0SO0K9FQz15DZGYKYeY7jIiG8fcAQHx18T37j6TAlBNoBCPum', '', '', '0616644258', '', '', '', 'locks', '2024-02-02 18:17:38', 0, 'cc0741d56e3d43898f031688a729d613'),
(5, 'Neda', 'Mandic', 'contact@natasamujic.com', '$2y$10$i3HEpgXG82bkoTatNovaNe/eXy9p8Oojdr1B0Tenurso.tzJg/lB6', 'NedaFashion', 'Neda DOO', '0616644258', 'Serbia', 'Subotica', 'www.fashion.com', 'haircut', '2024-02-06 13:57:08', 0, '88d6c64f17df4182be12204c8231bb36'),
(6, 'Milica', 'Poljakovic', 'hello@healthbeautynatasa.com', '$2y$10$ZqthlAVIQOQeKJu44gStpeilkUUArnzhGT36wv1No2dnwpjNPhZam', 'Milica Fashion', 'Milica DOO', '0616644258', 'Serbia', 'Subotica', 'www.milicafashion.com', 'locks', '2024-02-08 17:45:09', 0, '995a9d07866ce2b8c9bc004abe527477');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

DROP TABLE IF EXISTS `registered_user`;
CREATE TABLE IF NOT EXISTS `registered_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(30) COLLATE utf8mb3_bin NOT NULL,
  `user_lname` varchar(30) COLLATE utf8mb3_bin NOT NULL,
  `age` int NOT NULL,
  `user_email` varchar(30) COLLATE utf8mb3_bin NOT NULL,
  `user_password` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `is_active` tinyint NOT NULL,
  `activation_code` varchar(120) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id_user`, `user_fname`, `user_lname`, `age`, `user_email`, `user_password`, `is_active`, `activation_code`) VALUES
(20, 'Nata', 'Mujic', 20, 'mujicnatasa99@gmail.com', '$2y$10$YPJU342e5IgDTMdYTkzciOv3SJpn1bxlJh5Wh2RbWD0uo7Lvilo5q', 0, '911d10857f73ecc500833ef840ccce8b'),
(18, 'Anastazija', 'Adamovic', 76, 'adamovicanastazija0@gmail.com', '$2y$10$xY9/QS18tWFmMqb.SOFOLutyq8ehV8BVKY8UDkKt9.ebJ8VgwYm5a', 0, 'd9d3fc990bb7d209a606121428d6b835');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(16) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_service`, `service_name`) VALUES
(1, 'hair color'),
(2, 'shape & style'),
(3, 'treatments'),
(4, 'products');

-- --------------------------------------------------------

--
-- Table structure for table `user_reservations`
--

DROP TABLE IF EXISTS `user_reservations`;
CREATE TABLE IF NOT EXISTS `user_reservations` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_treatment` int NOT NULL,
  `email` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reservation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reservation`),
  KEY `id_user` (`id_user`),
  KEY `id_treatment` (`id_treatment`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `user_reservations`
--

INSERT INTO `user_reservations` (`id_reservation`, `id_user`, `id_treatment`, `email`, `date`, `time`, `reservation_date`) VALUES
(9, 20, 30, 'mujicnatasa99@gmail.com', '2024-02-21', '19:19:00', '2024-02-07 18:55:23'),
(10, 20, 31, 'mujicnatasa99@gmail.com', '2024-02-27', '18:40:00', '2024-02-07 18:55:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
