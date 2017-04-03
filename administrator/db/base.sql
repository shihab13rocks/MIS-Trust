-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2013 at 05:36 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `undp_hrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `metakey` text,
  `metadesc` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `organization_type_id` int(11) unsigned NOT NULL,
  `organization_group_id` int(11) unsigned NOT NULL,
  `address` text NOT NULL,
  `address_optional` text,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bsti_license_no` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `title`, `organization_type_id`, `organization_group_id`, `address`, `address_optional`, `contact_person`, `phone`, `mobile`, `email`, `bsti_license_no`, `logo`, `remarks`, `status`, `created`, `modified`) VALUES
(1, 'UNDP', 1, 1, 'dhaka', 'dhaka', 'Mr. S. Alam', '02-7711885', '01711511111', 'mr.x@s.alam.com', '', '1_logo.png', '', 1, '0000-00-00 00:00:00', '2013-11-18 05:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `organization_groups`
--

DROP TABLE IF EXISTS `organization_groups`;
CREATE TABLE IF NOT EXISTS `organization_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_groups`
--

INSERT INTO `organization_groups` (`id`, `name`, `remarks`, `status`) VALUES
(1, 'UNDP', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization_types`
--

DROP TABLE IF EXISTS `organization_types`;
CREATE TABLE IF NOT EXISTS `organization_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_types`
--

INSERT INTO `organization_types` (`id`, `title`, `remarks`, `status`) VALUES
(1, 'UNDP', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hints` text,
  `default` text,
  `value` text,
  `group` varchar(150) NOT NULL,
  `input_type` varchar(50) NOT NULL DEFAULT 'text' COMMENT 'text,checkbox,radio,textarea,password,color,date,datetime,datetime-local,email,month,number,range,search,tel,time,url,week',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `hints`, `default`, `value`, `group`, `input_type`, `sort_order`, `status`) VALUES
(3, 'siteName', NULL, 'Edible Oil', 'UNDP', 'general', 'text', 0, 1),
(4, 'copyrightText', NULL, '2013 &copy; Edible Oil Admin', '2013 &copy; UNDP. All Rights Reserved', 'general', 'text', 1, 1),
(5, 'siteLogo', NULL, 'logo.png', 'logo.png', 'general', 'file', 1, 1),
(6, 'adminEmail', NULL, 'zahidul.islam.052006@gmail.com', 'zahidul.islam.052006@gmail.com', 'Email', 'text', 0, 1),
(7, 'contactAddress', NULL, '', '<strong>Project Director</strong>,<br />\r\nMinistry of Industry<br />', 'contact', 'textarea', 1, 1),
(8, 'contactEmail', NULL, '', 'zahidul.islam.052006@gmail.com', 'contact', 'text', 2, 1),
(9, 'contactPhone', NULL, '', '0177115', 'contact', 'text', 3, 1),
(10, 'contactMobile', NULL, '', '01777-000111', 'contact', 'text', 4, 1),
(11, 'validImageExtension', 'Extension will be seperted by comma. ex. gif,jpg,png', '', 'gif,jpg', 'image', 'text', 0, 1),
(12, 'validImageSize', '(in pixel) Width x Height ', '', '600x420', 'image', 'text', 1, 1),
(13, 'validThumbnailSize', '(in pixel) Width x Height', '', '50x50', 'image', 'text', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_role_id` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `last_visit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `organization_id`, `user_role_id`, `username`, `email`, `password`, `last_name`, `first_name`, `middle_name`, `designation`, `phone`, `mobile`, `remarks`, `status`, `last_visit`, `created`, `modified`) VALUES
(1, 1, 1, 'admin', 'admin@cms.com', '2052b7e85eed14e03389db21a1f4d79822fb9224', 'z', 'i', 'm', 'eng', '1234567890', '121212', '121212', 1, '2013-11-18 05:28:48', '2013-09-25 00:00:00', '2013-11-18 05:28:48'),
(2, 1, 2, 'undpadmin', 'admin@undp.com', '2052b7e85eed14e03389db21a1f4d79822fb9224', 'P', 'U', 'ND', 'admin', '0177777', '01711000000', '', 1, '2013-11-18 04:53:07', '2013-11-18 04:50:44', '2013-11-18 04:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `organization_type_id` int(11) unsigned NOT NULL,
  `user_type_id` int(11) unsigned NOT NULL,
  `rights` text NOT NULL,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `organization_type_id`, `user_type_id`, `rights`, `status`) VALUES
(1, 'Super Admin', 1, 1, 'a:20:{s:8:"Contacts";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:10:"Dashboards";a:1:{i:0;s:5:"index";}s:21:"InspectionTestMethods";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:28:"InspectionTestStandardLimits";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:15:"InspectionTests";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:11:"Inspections";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:18:"OrganizationGroups";a:5:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";}s:17:"OrganizationTypes";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:13:"Organizations";a:5:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";}s:14:"PremixRequests";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:20:"PremixStandardLimits";a:5:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";}s:8:"Premixes";a:5:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";}s:13:"ProductBrands";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:19:"ProductionForecasts";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:11:"Productions";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:8:"Products";a:5:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";}s:7:"Reports";a:8:{i:0;s:18:"organizationReport";i:1;s:10:"userReport";i:2;s:19:"premixRequestReport";i:3;s:23:"monthlyProductionReport";i:4;s:22:"yearlyProductionReport";i:5;s:24:"productionForecastReport";i:6;s:11:"premixStore";i:7;s:16:"inspectionReport";}s:8:"Settings";a:3:{i:0;s:4:"edit";i:1;s:4:"view";i:2;s:5:"index";}s:9:"UserRoles";a:4:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:4:"view";i:3;s:5:"index";}s:5:"Users";a:6:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";i:5;s:7:"profile";}}', 1),
(2, 'UNDP Admin', 1, 2, 'a:6:{s:8:"Contacts";a:3:{i:0;s:6:"delete";i:1;s:4:"view";i:2;s:5:"index";}s:10:"Dashboards";a:1:{i:0;s:5:"index";}s:13:"Organizations";a:3:{i:0;s:4:"view";i:1;s:5:"index";i:2;s:7:"profile";}s:9:"UserRoles";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:9:"UserTypes";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:5:"Users";a:6:{i:0;s:3:"add";i:1;s:4:"edit";i:2;s:6:"delete";i:3;s:4:"view";i:4;s:5:"index";i:5;s:7:"profile";}}', 1),
(3, 'UNDP User', 1, 3, 'a:4:{s:8:"Contacts";a:2:{i:0;s:4:"view";i:1;s:5:"index";}s:10:"Dashboards";a:1:{i:0;s:5:"index";}s:17:"OrganizationTypes";a:1:{i:0;s:5:"index";}s:5:"Users";a:3:{i:0;s:4:"view";i:1;s:5:"index";i:2;s:7:"profile";}}', 1),
(4, 'UNDP Guest', 1, 4, 'a:2:{s:10:"Dashboards";a:1:{i:0;s:5:"index";}s:5:"Users";a:3:{i:0;s:4:"view";i:1;s:5:"index";i:2;s:7:"profile";}}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `title`, `status`, `created`, `updated`) VALUES
(1, 'Super Admin', 1, '2013-09-23 12:32:01', '0000-00-00 00:00:00'),
(2, 'Organization Admin', 1, '2013-09-23 12:32:01', '0000-00-00 00:00:00'),
(3, 'User', 1, '2013-09-23 12:33:01', '0000-00-00 00:00:00'),
(4, 'Viewer', 1, '2013-09-23 12:33:01', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
