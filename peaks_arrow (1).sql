-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 03:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peaks&arrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `additem`
--

CREATE TABLE `additem` (
  `item_id` int(11) NOT NULL,
  `dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additem`
--

INSERT INTO `additem` (`item_id`, `dates`, `category_id`, `item_name`, `quantity`, `unit_id`, `vendor`, `rate`) VALUES
(1, '2020-02-08 10:15:06', '', '', '', 0, '', ''),
(2, '2020-02-08 10:21:52', '', '', '', 0, '', ''),
(3, '2020-02-08 13:10:59', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `s1` int(50) NOT NULL,
  `s2` int(50) NOT NULL,
  `s3` int(50) NOT NULL,
  `s4` int(50) NOT NULL,
  `s5` int(50) NOT NULL,
  `s6` int(50) NOT NULL,
  `s7` int(50) NOT NULL,
  `s8` int(50) NOT NULL,
  `s9` int(50) NOT NULL,
  `s10` int(50) NOT NULL,
  `s11` int(50) NOT NULL,
  `s12` int(50) NOT NULL,
  `s13` int(50) NOT NULL,
  `s14` int(50) NOT NULL,
  `s15` int(50) NOT NULL,
  `p1` int(50) NOT NULL,
  `p2` int(50) NOT NULL,
  `p3` int(50) NOT NULL,
  `p4` int(50) NOT NULL,
  `p5` int(50) NOT NULL,
  `p6` int(50) NOT NULL,
  `p7` int(50) NOT NULL,
  `p8` int(50) NOT NULL,
  `p9` int(50) NOT NULL,
  `p10` int(50) NOT NULL,
  `p11` int(50) NOT NULL,
  `p12` int(50) NOT NULL,
  `p13` int(50) NOT NULL,
  `p14` int(50) NOT NULL,
  `p15` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `project_id`, `item_name`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `s11`, `s12`, `s13`, `s14`, `s15`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`) VALUES
(1, 1, 'shirt', 28, 30, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 50, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'pant', 28, 30, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 50, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 'tie', 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 50, 99, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 'belt', 7, 8, 9, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 65, 52, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `pnumber` char(10) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `house` enum('r','g','b','y') NOT NULL,
  `size` char(10) NOT NULL,
  `qty` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `deadline` varchar(50) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `school_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `deadline`, `info`, `school_id`, `school_password`) VALUES
(1, 'test school 1', '2020-02-07', 'test school 1 description', '24750', '59794'),
(2, 'test school 2', '2020-02-15', 'Testing school in description', '12085', '15959');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saleschart`
--

CREATE TABLE `saleschart` (
  `items` text NOT NULL,
  `units` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleschart`
--

INSERT INTO `saleschart` (`items`, `units`) VALUES
('shirt', 0),
('pant', 0),
('belt', 0),
('tie', 0),
('socks', 0),
('skirt', 500),
('blazer', 265);

-- --------------------------------------------------------

--
-- Table structure for table `showtimeline`
--

CREATE TABLE `showtimeline` (
  `id` int(11) NOT NULL,
  `timeline_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `dates` varchar(50) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `selectstandard` varchar(255) NOT NULL,
  `selecthouse` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `firstname`, `lastname`, `gender`, `selectstandard`, `selecthouse`, `phonenumber`) VALUES
(1, 'sagar ', 'chavan', '0', '2', '4', 2545215),
(2, 'sagar fem', 'chavan', '0', '2', '4', 2545215),
(3, 'sagar fem', 'chavan', 'Female', '2', '4', 2545215),
(4, 'sagar s', 'chavan', 'Male', '2', '4', 2545215),
(5, 'sagar s', 'chavan', 'Male', '2', '4', 2545215),
(6, 'resr', 'chasa', 'Male', '5', '4', 542332),
(7, 'gdfgd', 'ddgfg', 'Female', '5', '1', 45),
(8, 'gdfgd', 'ddgfg', 'Female', '5', '1', 45);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'warmachineera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additem`
--
ALTER TABLE `additem`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_project_id` (`project_id`);

--
-- Indexes for table `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `school_id` (`school_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `showtimeline`
--
ALTER TABLE `showtimeline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_timeline_id` (`timeline_id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additem`
--
ALTER TABLE `additem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showtimeline`
--
ALTER TABLE `showtimeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `showtimeline`
--
ALTER TABLE `showtimeline`
  ADD CONSTRAINT `FK_timeline_id` FOREIGN KEY (`timeline_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
