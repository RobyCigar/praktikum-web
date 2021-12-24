-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2008 at 08:42 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dreamhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchNo` char(6) collate latin1_general_ci NOT NULL,
  `street` varchar(20) collate latin1_general_ci NOT NULL,
  `city` varchar(20) collate latin1_general_ci NOT NULL,
  `postCode` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`branchNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='menyimpan data kantor cabang';

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchNo`, `street`, `city`, `postCode`) VALUES
('B005', '22 Deer Rd', 'London', 'SW1 4EH'),
('B007', '16 Argyll St', 'Aberdeen', 'AB2 3SU'),
('B003', '163 Main St', 'Glasgow', 'G11 9QX'),
('B004', '32 Manse Rd', 'Bristol', 'BS99 1NZ'),
('B002', '56 Clover Dr', 'London', 'NW10 6EU');
