-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2016 at 10:52 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buntingmovies`
--
CREATE DATABASE `buntingmovies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `buntingmovies`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `actors_ID` int(11) NOT NULL AUTO_INCREMENT,
  `actors_name` varchar(100) NOT NULL,
  `actors_age` int(11) NOT NULL,
  `number_movies` int(11) NOT NULL,
  `moviestitles_ID` int(11) NOT NULL,
  `actor_gender` tinyint(1) NOT NULL,
  PRIMARY KEY (`actors_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_verificationCode` int(11) NOT NULL,
  `admin_phonenumber` int(11) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categries_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cat_descriptions` text NOT NULL,
  `cat_types` varchar(100) NOT NULL,
  PRIMARY KEY (`categries_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cust_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(100) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_username` varchar(100) NOT NULL,
  PRIMARY KEY (`cust_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `emp_username` varchar(100) NOT NULL,
  `emp_phoneNumber` int(11) NOT NULL,
  `emp_password` varchar(100) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  PRIMARY KEY (`emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movies_ID` int(11) NOT NULL AUTO_INCREMENT,
  `movies_titles` varchar(100) NOT NULL,
  `mobies_number` int(11) NOT NULL,
  `movies_prices` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  PRIMARY KEY (`movies_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `movies_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `requiere_date` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_ID` int(11) NOT NULL AUTO_INCREMENT,
  `movies_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uniprice` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`order_detail_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`actors_ID`) REFERENCES `movies` (`movies_ID`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`categries_ID`) REFERENCES `movies` (`movies_ID`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`cust_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`movies_ID`) REFERENCES `order_detail` (`order_detail_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order_detail` (`order_detail_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
