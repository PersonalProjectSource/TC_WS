-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2015 at 05:26 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tennis_challenge_ws`
--

--
-- Truncate table before insert `Adresse`
--

TRUNCATE TABLE `Adresse`;
--
-- Dumping data for table `Adresse`
--

INSERT INTO `Adresse` (`id`, `numero`, `voie`, `codePostal`, `ville`, `pays`, `visible`) VALUES
(1, 3, 'place de la croix blanchee', 93120, 'La Courneuve', 'France', 1);

--
-- Truncate table before insert `CarousselImage`
--

TRUNCATE TABLE `CarousselImage`;
--
-- Truncate table before insert `CarousselPage`
--

TRUNCATE TABLE `CarousselPage`;
--
-- Truncate table before insert `Classement`
--

TRUNCATE TABLE `Classement`;
--
-- Truncate table before insert `Defi`
--

TRUNCATE TABLE `Defi`;
--
-- Truncate table before insert `Freespace`
--

TRUNCATE TABLE `Freespace`;
--
-- Truncate table before insert `FriendList`
--

TRUNCATE TABLE `FriendList`;
--
-- Truncate table before insert `Jugement`
--

TRUNCATE TABLE `Jugement`;
--
-- Dumping data for table `Jugement`
--

INSERT INTO `Jugement` (`id`, `date`, `fairplay`, `technique`, `ambiance`, `general`, `nombre_vote`, `user_id`) VALUES
(1, '2015-01-07 00:00:00', 45, 78, 65, 80, 1, 1);

--
-- Truncate table before insert `Message`
--

TRUNCATE TABLE `Message`;
--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `user_id`, `object`, `content`, `detail`, `visible`) VALUES
(1, 1, 'Defi', 'je te defi petit', 'je te defi en detail', 1);

--
-- Truncate table before insert `NewsStream`
--

TRUNCATE TABLE `NewsStream`;
--
-- Truncate table before insert `Statistique`
--

TRUNCATE TABLE `Statistique`;
--
-- Truncate table before insert `User`
--

TRUNCATE TABLE `User`;
--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `nom`, `prenom`, `role`, `statistique_id`, `FriendList_id`, `adresse_id`) VALUES
(1, 'optimus', 'prime', 'user', NULL, NULL, 1);

--
-- Truncate table before insert `WelcomeCarousel`
--

TRUNCATE TABLE `WelcomeCarousel`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
