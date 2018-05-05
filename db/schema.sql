-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2018 at 06:17 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loket`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `Event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `Location_location_id` int(11) NOT NULL,
  `Type_type_id` int(11) NOT NULL,
  `event_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `event_note` text COLLATE utf8_unicode_ci NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_pre_order_start` datetime DEFAULT NULL,
  `event_pre_order_end` datetime DEFAULT NULL,
  `event_ticket_box_start` datetime DEFAULT NULL,
  `event_image` text COLLATE utf8_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `createby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `Location` (`Location_location_id`),
  KEY `Type` (`Type_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_has_ticket`
--

CREATE TABLE IF NOT EXISTS `Event_has_ticket` (
  `event_has_ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `Event_event_id` int(11) NOT NULL,
  `Ticket_ticket_id` int(11) NOT NULL,
  `event_has_ticket_qty` int(11) NOT NULL,
  `event_has_ticket_price` int(11) NOT NULL,
  `event_has_ticket_po_price` int(11) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL,
  `createby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`event_has_ticket_id`),
  KEY `Event` (`Event_event_id`),
  KEY `Ticket` (`Ticket_ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `Location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `location_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location_image` text COLLATE utf8_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `createby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `reference_code`
--

CREATE TABLE IF NOT EXISTS `Reference_code` (
  `reference_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_code_code_status` tinyint(1) NOT NULL,
  `reference_code_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reference_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `Ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_type_id` int(11) NOT NULL,
  `ticket_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` int(11) NOT NULL,
  `createby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `Type_id` (`Type_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `Type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL COMMENT '1 untuk aktif, 0 tidak aktif',
  `createby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `Event`
  ADD CONSTRAINT `Event_Location` FOREIGN KEY (`Location_location_id`) REFERENCES `Location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Event_LocationEvent_Type` FOREIGN KEY (`Type_type_id`) REFERENCES `Type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_has_ticket`
--
ALTER TABLE `Event_has_ticket`
  ADD CONSTRAINT `Event_Event_has_ticket` FOREIGN KEY (`Event_event_id`) REFERENCES `Event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Ticket_Event_has_ticket` FOREIGN KEY (`Ticket_ticket_id`) REFERENCES `Ticket` (`ticket_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `Ticket_type` FOREIGN KEY (`Type_type_id`) REFERENCES `Type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
