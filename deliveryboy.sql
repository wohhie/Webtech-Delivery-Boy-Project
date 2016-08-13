-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 06:56 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deliveryboy`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image_path` varchar(255) NOT NULL,
  `p_image` blob NOT NULL,
  `p_desc` text NOT NULL,
  `p_brand` int(11) NOT NULL,
  `p_tag` int(11) NOT NULL,
  `p_category` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_image_path`, `p_image`, `p_desc`, `p_brand`, `p_tag`, `p_category`, `created`) VALUES
(14, 'Orio', 57, 'upload/', 0x34623135393035616235626537376336373537336631613862346330393935322e6a7067, 'Seamlessly enhance long-term high-impact infrastructures through enterprise-wide interfaces. Synergistically seize.', 0, 1, 2, '2016-05-01 00:00:00'),
(15, 'Orac Vanila', 74, 'upload/', 0x6d646d6b73642e6a7067, 'high-impact infrastructures through enterprise-wide interfaces. Synergistically seize. Seamlessly enhance long-term ', 0, 1, 2, '2016-05-01 06:08:28'),
(16, 'Blue Moon', 14, 'upload/', 0x50696e6b4772617065667275697446726f7a656e596f5f46756c6c5f5745425f5f39343936355f5f30363139315f5f35363632322e313339373638303830302e3235302e3235302e6a7067, 'Energistically re-engineer fully researched niche markets rather than alternative web.', 50, 1, 2, '2016-05-01 06:56:23'),
(17, 'Brown bread ice cream', 12, 'upload/', 0x6c656d6f6e626c7565335f5f37343630345f5f38383232355f5f37313238382e313339373638303630342e3630302e3630302e6a7067, 'Enthusiastically procrastinate quality intellectual capital vis-a-vis efficient leadership skills. Collaboratively.', 50, 1, 2, '2016-05-01 06:56:58'),
(19, 'Krushers', 45, 'upload/', 0x4b727573686572735f537061726b6c65732e706e67, 'Monotonectally negotiate fully researched potentialities after technically sound value. Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', 55, 1, 2, '2016-05-04 23:42:10'),
(20, 'Burger', 74, 'upload/', 0x736d6f6b65686f7573652d6275726765722e6a7067, 'Monotonectally negotiate fully researched potentialities after technically sound value. Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', 55, 1, 2, '2016-05-04 23:46:17'),
(21, 'FFC Special Burger', 10, 'upload/', 0x6f726967696e616c2d6372697370792d6275726765722e706e67, 'Synergistically scale dynamic meta-services and holistic leadership skills. Quickly iterate.', 54, 3, 5, '2016-05-04 23:59:04'),
(22, 'FFC Special Burger', 10, 'upload/', 0x6f726967696e616c2d6372697370792d6275726765722e706e67, 'Synergistically scale dynamic meta-services and holistic leadership skills. Quickly iterate.', 54, 3, 5, '2016-05-04 23:59:32'),
(23, 'krusher', 100, 'upload/', 0x4b727573686572735f537061726b6c65732e706e67, 'fgwrjgowjgo', 56, 1, 2, '2016-05-05 03:13:47'),
(24, 'Mogari', 0, 'upload/', 0x436f6c65736c61772d436f726e2e6a7067, 'Synergistically reinvent interoperable collaboration and idea-sharing via value-added architectures. Dynamically.', 59, 3, 5, '2016-05-05 09:56:04'),
(25, 'Mogari', 0, 'upload/', 0x436f6c65736c61772d436f726e2e6a7067, 'Synergistically reinvent interoperable collaboration and idea-sharing via value-added architectures. Dynamically.', 59, 3, 5, '2016-05-05 09:56:55'),
(26, 'chiken fry', 100, 'upload/', 0x536e61636b2d436f6d626f2d3138302e6a7067, 'pgiwegpiehgijwe[ogpirehg', 55, 3, 2, '2016-05-05 11:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `p_cart`
--

CREATE TABLE IF NOT EXISTS `p_cart` (
`cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `cart_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_cart`
--

INSERT INTO `p_cart` (`cart_id`, `p_id`, `ip_address`, `p_quantity`, `cart_created`) VALUES
(189, 24, '::1', 1, '2016-05-05 00:00:00'),
(190, 23, '::1', 1, '2016-05-05 00:00:00'),
(191, 17, '::1', 1, '2016-05-05 00:00:00'),
(192, 20, '::1', 1, '2016-05-05 00:00:00'),
(193, 21, '::1', 1, '2016-05-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE IF NOT EXISTS `p_category` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`cat_id`, `cat_name`, `cat_desc`, `created`) VALUES
(1, 'document', 'Dramatically expedite cross functional e-tailers with B2B leadership. Holisticly matrix.', '0000-00-00 00:00:00'),
(2, 'food', 'Dramatically expedite cross functional e-tailers with B2B leadership. Holisticly matrix.', '0000-00-00 00:00:00'),
(5, 'First Food', 'Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', '0000-00-00 00:00:00'),
(6, 'Dinner', 'Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', '0000-00-00 00:00:00'),
(7, 'Lunch', 'Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', '0000-00-00 00:00:00'),
(8, 'Breakfast', 'Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_tag`
--

CREATE TABLE IF NOT EXISTS `p_tag` (
`tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_desc` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_tag`
--

INSERT INTO `p_tag` (`tag_id`, `tag_name`, `tag_desc`, `created`) VALUES
(1, 'ice cream', 'Monotonectally aggregate virtual content whereas focused models. Globally enhance cutting-edge.', '2016-05-19 00:00:00'),
(2, 'vegetable', 'Monotonectally aggregate virtual content whereas focused models. Globally enhance cutting-edge.', '0000-00-00 00:00:00'),
(3, 'burger', 'Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', '0000-00-00 00:00:00'),
(4, 'Drinks', 'Globally utilize real-time technology vis-a-vis 2.0 innovation. Holisticly formulate optimal process improvements.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_location` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `str_owner_email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `store_image_path` text NOT NULL,
  `image` blob NOT NULL,
  `str_password` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `store_name`, `store_location`, `owner_name`, `str_owner_email`, `phone`, `store_image_path`, `image`, `str_password`, `created`) VALUES
(54, 'FFC', 'Uttra,Dhaka - 1101', 'samia', 'ffc@mail.com', '178747847', 'upload/', 0x6c6f676f2e706e67, 'abc1234', '2016-05-04 22:36:48'),
(55, 'KFC', 'Banani, 13', 'rakib', 'kfc@mail.com', '', 'upload/', 0x313533352e6a7067, 'abc1234', '2016-05-04 23:28:29'),
(56, 'jom', 'Banani, Bazar, Dhaka', 'jm', 'jm@mail.com', '1682077869', 'upload/', 0x6c6f676f2e706e67, 'abc1234', '2016-05-05 03:12:32'),
(57, 'Kashtamu', 'Mogbazar', 'wohhie', 'wohhie@mail.com', '123456788', 'upload/', 0x66756c6c312e6a7067, 'abc1234', '2016-05-05 09:41:36'),
(58, 'Kashtamu', 'Mogbazar', 'wohhie', 'wohhie@mail.com', '123456788', 'upload/', 0x66756c6c312e6a7067, 'abc1234', '2016-05-05 09:43:09'),
(59, 'mogads', 'tangalil', 'moga', 'moga@mail.com', '1682077869', 'upload/', 0x7468756d62312e6a7067, 'abc1234', '2016-05-05 09:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `store_info`
--

CREATE TABLE IF NOT EXISTS `store_info` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_info`
--

INSERT INTO `store_info` (`id`, `firstname`, `lastname`, `userid`) VALUES
(2, '', '', 54),
(3, '', '', 55),
(4, '', '', 56),
(5, '', '', 57),
(6, '', '', 57),
(7, '', '', 59);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`) VALUES
(16, 'sakina', 'sakina@mail.com', 'abc1234', 'male'),
(17, 'wohhie', 'wohhie@mail.com', 'abc1234', 'male'),
(19, 'saleh', 'saleh@mail.com', 'abc1234', 'male'),
(26, 'morgan', 'morgan@mail.com', '12345', 'male'),
(27, 'samia', 'samia@mail.com', 'abc1234', 'male'),
(28, 'maria', 'maria@mail.com', 'abc1234', 'male'),
(29, 'wohhi', 'eqet@mail.com', '12345', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` blob NOT NULL,
  `user_image_path` varchar(255) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `firstname`, `lastname`, `address`, `phone`, `photo`, `user_image_path`, `userid`) VALUES
(1, '', '', '', 0, '', '', 15),
(2, 'Sahina', 'Rupoboti', '54/D North Kafrul, Dhaka - 1206', 168077869, 0x313433305f3839393736343030333437313038325f313932313431333037323937323235393132355f6e2e6a7067, 'upload/profile/', 16),
(3, 'Wohhie', 'Khan Khan', '54/D north Kafrul, DHaka', 1682077869, 0x70726f66696c652e706e67, 'upload/profile/', 17),
(4, '', '', '', 0, '', '', 18),
(5, '', '', '', 0, '', '', 19),
(6, '', '', '', 0, '', '', 20),
(7, '', '', '', 0, '', '', 20),
(8, '', '', '', 0, '', '', 22),
(9, '', '', '', 0, '', '', 22),
(10, '', '', '', 0, '', '', 24),
(11, '', '', '', 0, '', '', 26),
(12, '', '', '', 0, '', '', 27),
(13, '', '', '', 0, '', '', 28),
(14, '', '', '', 0, '', '', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_cart`
--
ALTER TABLE `p_cart`
 ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `p_tag`
--
ALTER TABLE `p_tag`
 ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_info`
--
ALTER TABLE `store_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `p_cart`
--
ALTER TABLE `p_cart`
MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `p_tag`
--
ALTER TABLE `p_tag`
MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `store_info`
--
ALTER TABLE `store_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
