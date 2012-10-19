-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2012 at 09:34 AM
-- Server version: 5.0.92
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `kAsset` int(5) NOT NULL auto_increment,
  `kDeveloper` int(5) NOT NULL,
  `product` varchar(75) NOT NULL,
  `name` varchar(255) default NULL,
  `version` varchar(15) default NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(50) default 'Active',
  `source` varchar(255) default NULL,
  `year_acquired` int(4) default NULL,
  `year_removed` int(4) default NULL,
  PRIMARY KEY  (`kAsset`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=311 ;

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `kCode` int(4) NOT NULL auto_increment,
  `type` varchar(30) NOT NULL,
  `value` varchar(60) NOT NULL,
  `kAsset` int(5) NOT NULL,
  PRIMARY KEY  (`kCode`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1401 ;

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE IF NOT EXISTS `developer` (
  `kDeveloper` int(3) NOT NULL auto_increment,
  `developer` varchar(65) NOT NULL,
  `url` varchar(60) NOT NULL,
  PRIMARY KEY  (`kDeveloper`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `kFile` int(11) NOT NULL auto_increment,
  `kAsset` int(11) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `fileDescription` varchar(255) NOT NULL,
  PRIMARY KEY  (`kFile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `kMenu` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY  (`kMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `kItem` int(11) NOT NULL auto_increment,
  `kMenu` int(11) NOT NULL COMMENT 'fk-menu.kMenu',
  `label` varchar(255) NOT NULL,
  `type` varchar(60) NOT NULL,
  `href` varchar(90) default NULL,
  `class` varchar(255) default NULL,
  `id` varchar(255) default NULL,
  `enclosure` varchar(255) default NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY  (`kItem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` varchar(40) collate utf8_unicode_ci NOT NULL default '0',
  `ip_address` varchar(16) collate utf8_unicode_ci NOT NULL default '0',
  `user_agent` varchar(120) collate utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
