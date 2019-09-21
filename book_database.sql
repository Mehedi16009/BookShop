-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 06:53 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(6, 'admin', 'admin@gmail.com', '$2y$10$l9hekPb/uXufdd0ps06yfulI/584Buhn0M9LSHfkpJ0DvOCXtchC.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `book_isbn` int(11) NOT NULL,
  `book_cat_id` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `book_price` float NOT NULL,
  `description` text NOT NULL,
  `book_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_name`, `book_isbn`, `book_cat_id`, `book_quantity`, `book_price`, `description`, `book_image`) VALUES
(1, 'JavaScrpit', 'Mahmudul Hassan', 1144527577, 3, 12, 250, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'upload/dd1342f1dc.jpg'),
(2, 'FirstBook', 'Akhi', 1144527577, 4, 12, 260, 'You can make use of Stripe Elements, our pre-built UI components, to create a payment form that securely collects your customerâ€™s card information without you needing to handle sensitive card data.', 'upload/51de6f99a9.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Novel'),
(4, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `book_id`, `user_id`, `quantity`, `phone`, `status`) VALUES
(5, 1, 1, 2, '01630811324', 'completed'),
(6, 2, 1, 1, '01630811324', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `customer_id`, `total_quantity`, `currency`, `user_id`, `total_amount`, `phone`, `status`, `created_at`) VALUES
('ch_1CDG04GvGYvNHZklmPwXCbG3', 'cus_CcV03tqYvW6dYQ', 2, 'usd', 1, 510, '01630811324', 'succeeded', '2018-04-05 00:06:25'),
('ch_1CDG1PGvGYvNHZklOELN77SW', 'cus_CcV1HywGlAPaFY', 1, 'usd', 1, 250, '01630811324', 'succeeded', '2018-04-05 00:07:48'),
('ch_1CDG4IGvGYvNHZklDhvYjNwY', 'cus_CcV4o0QmPNULRR', 1, 'usd', 1, 250, '123456789', 'succeeded', '2018-04-05 00:10:46'),
('ch_1CDG5yGvGYvNHZklqlrj5ghX', 'cus_CcV6jY81MEvgne', 1, 'usd', 1, 250, '01630811324', 'succeeded', '2018-04-05 00:12:31'),
('ch_1CDH3MGvGYvNHZkl6Tl2tLb1', 'cus_CcW57ePPOwQkng', 9, 'usd', 1, 2280, '01630811324', 'succeeded', '2018-04-05 01:13:53'),
('ch_1CF6KLGvGYvNHZklGkBa5pe8', 'cus_CeP84zAYmk4LEs', 3, 'usd', 1, 760, '01630811324', 'succeeded', '2018-04-10 02:10:58'),
('ch_1CF6LdGvGYvNHZklk0x2EEO6', 'cus_CeP9GzUa8KAJ50', 3, 'usd', 1, 760, '01630811324', 'succeeded', '2018-04-10 02:12:18'),
('ch_1CF6MOGvGYvNHZklBToG8xYz', 'cus_CePAQ9OlgcYfKw', 3, 'usd', 1, 760, '01630811324', 'succeeded', '2018-04-10 02:13:05'),
('ch_1CF6T2GvGYvNHZklnn1hGeCn', 'cus_CePHf2ixJcxxbA', 3, 'usd', 1, 760, '01630811324', 'succeeded', '2018-04-10 02:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_cat_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `validation_code` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `user_cat_id`, `password`, `validation_code`, `active`) VALUES
(1, 'Farzana', 'Akhi', 'Akhi', 'akhi@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', '0', 1),
(2, 'Mahmudul', 'Hassan', 'Mahmudul', 'mahmudul@gmail.com', 1, '31f7a943a769bfbd60a443e5fb606292', '0', 1),
(3, 'Reshmi', 'Rima', 'Reshmi', 'rima@gmail.com', 1, '25d55ad283aa400af464c76d713c07ad', '0', 1),
(4, 'Mehedi', 'Hassan', 'mehedi', 'mehedi@gmail.com', 1, 'c344168326d9b11d5a8926f55aec151f', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`cat_id`, `cat_title`) VALUES
(1, 'student'),
(2, 'job holder'),
(4, 'HouseWife');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
