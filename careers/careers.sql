-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 12:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `careers`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `joblisting` int(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `post` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `employeer`
--

CREATE TABLE IF NOT EXISTS `employeer` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `employeer`
--

INSERT INTO `employeer` (`id`, `username`, `password`, `company`, `email`, `status`, `created_at`) VALUES
(11, 'jingping1998', 'jingping01', 'JP Company', 'jingpingng@ymail.com', 1, '2019-07-21 15:50:45'),
(12, 'jingping123', '123123', 'jingping123', 'jingpingng@something.com', 1, '2019-07-21 17:39:18'),
(13, 'boss123', '123123', 'Big Boss', 'boss123@boss.boss', 1, '2019-07-21 17:46:33'),
(14, 'testing123', '123123', 'testing', 'testing123@testing.testing', 1, '2019-07-21 18:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `joblisting`
--

CREATE TABLE IF NOT EXISTS `joblisting` (
`joblisting` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `jobname` varchar(100) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `experience` int(100) NOT NULL,
  `salarystart` int(100) NOT NULL,
  `salaryend` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `deadline` datetime NOT NULL,
  `description` longtext NOT NULL,
  `responsibilities1` longtext NOT NULL,
  `responsibilities2` longtext NOT NULL,
  `responsibilities3` longtext NOT NULL,
  `responsibilities4` longtext NOT NULL,
  `responsibilities5` longtext NOT NULL,
  `education1` longtext NOT NULL,
  `education2` longtext NOT NULL,
  `education3` longtext NOT NULL,
  `education4` longtext NOT NULL,
  `education5` longtext NOT NULL,
  `other1` longtext NOT NULL,
  `other2` longtext NOT NULL,
  `other3` longtext NOT NULL,
  `other4` longtext NOT NULL,
  `other5` longtext NOT NULL,
  `published` datetime DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `joblisting`
--

INSERT INTO `joblisting` (`joblisting`, `location`, `jobname`, `vacancy`, `status`, `experience`, `salarystart`, `salaryend`, `gender`, `deadline`, `description`, `responsibilities1`, `responsibilities2`, `responsibilities3`, `responsibilities4`, `responsibilities5`, `education1`, `education2`, `education3`, `education4`, `education5`, `other1`, `other2`, `other3`, `other4`, `other5`, `published`, `id`, `image`, `company`) VALUES
(24, 'Penang', 'Outdoor Service Technician(CCTV)', 1, 'Full-Time', 1, 2200, 3000, 'Any', '2019-08-21 00:00:00', '5 Working Days (Monday - Friday), 8.30 - 5.30\r\nBasic Up RM1700 + Transport Allowance\r\nIslandwide(HQ@Kaki Bukit)\r\nEngineering Service Provider', 'Perform CCTV installation and service on site', 'Test, troubleshoot and repair CCTV', '', '', '', 'Min. GCE O Level or equivalent', 'No experience required, training will be provided', 'Must possess own motorbike transport', 'Bilingual in Mandarin & English to liaise with Mandarin speaking customers', '', '', '', '', '', '', '2019-07-21 16:01:40', 11, 'post/cctv-company.jpg', 'JP Company'),
(45, 'Kedah', 'Boss', 213, 'Full-Time', 10, 23, 34, 'Any', '2332-12-31 00:00:00', 'wqe', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-07-21 17:49:47', 13, 'post/BeSpunAlloy15-Debbie-9696.jpg', 'Big Boss'),
(46, 'Negeri Sembilan', 'Testing', 10, 'Full-Time', 5, 3000, 4000, 'Male', '2019-07-23 00:00:00', 'Testing123', 'TEsting', '', '', '', '', 'Testing', '', '', '', '', '', '', '', '', '', '2019-07-21 18:13:04', 14, 'post/fb266160e11bf0bb16f8a458b7356c21.jpeg', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(17, 'jingping1998', 'jingping01', '2019-07-21 15:45:31'),
(18, 'jingping01', 'jingping02', '2019-07-21 16:34:14'),
(19, 'random123', 'random123', '2019-07-21 17:45:35'),
(20, 'random321', 'random321', '2019-07-21 18:08:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeer`
--
ALTER TABLE `employeer`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id2` (`id`), ADD FULLTEXT KEY `username` (`username`);

--
-- Indexes for table `joblisting`
--
ALTER TABLE `joblisting`
 ADD PRIMARY KEY (`joblisting`), ADD UNIQUE KEY `joblisting` (`joblisting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employeer`
--
ALTER TABLE `employeer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `joblisting`
--
ALTER TABLE `joblisting`
MODIFY `joblisting` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
