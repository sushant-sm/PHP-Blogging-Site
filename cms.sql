-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 11:10 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_author` varchar(50) NOT NULL,
  `comment_email` varchar(50) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(20) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(4, 'sadf', 'none@gmail.com', 'abcd\r\n', 'Approved', '2020-01-11'),
(5, 'me', 'sf@sadf.v', 'hello', 'Approved', '2020-01-11'),
(8, 'sushant', 'sushant@gmail.com', 'this is comment\r\n', 'Approved', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'Edited', 'dfghf', '2019-12-30', 'img3.jpg', 'dfgsdfg        ', 'sdrg', 0, 'active'),
(10, 3, '2nd ', 'ssm', '2020-01-02', 'img1.jpg', 'asdf', 'java,python,orjhbhu', 4, 'active'),
(11, 1, 'Trial', 'annabell', '2020-01-07', 'ml.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum itaque consequuntur\r\nad minus distinctio, nostrum dolore nesciunt nulla maxime repudiandae in velit! Quo modi\r\niusto error, expedita necessitatibus explicabo mollitia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum itaque consequuntur\r\nad minus distinctio, nostrum dolore nesciunt nulla maxime repudiandae in velit! Quo modi\r\niusto error, expedita necessitatibus explicabo mollitia?', 'java,python,or', 4, 'active\r\n'),
(13, 1, 'Fourth Post', 'sushant', '2020-02-19', 'img1.jpg', 'heloooo this is fourth post !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!\r\nanather post !!!!!!!!!', 'java,python,or', 4, 'active'),
(14, 0, 'demo cat', 'demo', '2020-02-19', 'img.png', 'asdf', 'asdfasdf', 4, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'sushant', '123', 'sushant', 'm', 'abc@gmail.com', '', 'admin', ''),
(4, 'jesse_BB', 'aaa', 'jesse', 'pinkman', 'jesse@pink.com', '', 'Admin', ''),
(8, 'jack', '123', 'jack', 'ryan', 'jack@gmail.com', '', 'subscriber', ''),
(9, 'user', '123', 'user', 'lastuser', 'owner@gmail.com', '', 'subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
