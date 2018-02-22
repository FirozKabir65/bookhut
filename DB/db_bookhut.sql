-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 04:14 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookhut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookPath` varchar(100) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `bookCategoryId` int(2) NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `bookDescription` text NOT NULL,
  `bookImage` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `userId`, `bookPath`, `bookName`, `bookCategoryId`, `bookAuthor`, `bookDescription`, `bookImage`, `status`, `created_at`, `modified_at`) VALUES
(2, 1, 'books/FERRISS_Timothy_-_The_4-Hour_Workweek.pdf', 'Test', 1, 'Demo', 'userIduserId userIduserIduserIduserId', 'images/bookImages/download (1).jpg', 1, '2018-02-18 15:19:48', '0000-00-00 00:00:00'),
(3, 2, 'books/U1L9-Journal of Civil Engineering and Architecture - Issue 2 2013 - Interactive Teaching in In', 'demo', 1, 'Demos', 'userIduserIduserIduserIduserIduserIduserId', 'images/bookImages/images.jpg', 1, '2018-02-18 15:22:57', '0000-00-00 00:00:00'),
(4, 2, 'books/45_Big-Data.pdf', 'Big data', 1, 'Batman', 'Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man  ', 'images/bookImages/images (1).jpg', 1, '2018-02-18 17:27:24', '0000-00-00 00:00:00'),
(5, 1, 'books/Google DevFestâ€™17 Bangla invitation letter .pdf', 'DEv fest', 1, 'Dev Fest', 'Dev Fest Dev Fest Dev Fest Dev Fest Dev Fest Dev Fest Dev Fest ', 'images/bookImages/background1.jpg', 1, '2018-02-21 18:06:51', '0000-00-00 00:00:00'),
(6, 3, 'books/chart.pdf', 'Test Book', 1, 'Test AUthor', 'test book descriptions.', 'images/bookImages/rick_kelly.jpg', 1, '2018-02-22 15:01:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_category`
--

CREATE TABLE `tbl_book_category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_category`
--

INSERT INTO `tbl_book_category` (`id`, `categoryName`) VALUES
(1, 'Novel'),
(2, 'Bed time Story');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `userId`, `bookId`, `comment`, `created_at`, `modified_at`) VALUES
(1, 1, 2, 'dfghj,.', '2018-02-21 19:13:39', '0000-00-00 00:00:00'),
(2, 1, 2, 'Test test', '2018-02-21 19:37:49', '0000-00-00 00:00:00'),
(3, 1, 2, 'demo dmeo', '2018-02-21 19:37:55', '0000-00-00 00:00:00'),
(4, 1, 2, 'testing comment', '2018-02-22 04:41:10', '0000-00-00 00:00:00'),
(5, 2, 2, 'hello from demo', '2018-02-22 05:19:51', '0000-00-00 00:00:00'),
(6, 2, 2, 'demo dmeo demo ', '2018-02-22 05:20:13', '0000-00-00 00:00:00'),
(7, 2, 2, 'demo dmeo demo ', '2018-02-22 05:20:13', '0000-00-00 00:00:00'),
(8, 2, 3, 'demo demo', '2018-02-22 05:21:32', '0000-00-00 00:00:00'),
(9, 1, 2, 'demo demo', '2018-02-22 05:23:36', '0000-00-00 00:00:00'),
(10, 1, 3, 'demo', '2018-02-22 05:23:56', '0000-00-00 00:00:00'),
(11, 1, 2, 'helo', '2018-02-22 05:24:09', '0000-00-00 00:00:00'),
(12, 2, 3, 'demo', '2018-02-22 05:25:54', '0000-00-00 00:00:00'),
(13, 2, 2, 'helo helo', '2018-02-22 05:30:05', '0000-00-00 00:00:00'),
(14, 3, 6, 'first comment for book information', '2018-02-22 15:03:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstName`, `lastName`, `email`, `password`, `gender`) VALUES
(1, 'Iffta', 'Geergitee', 'test@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, 'Demo', 'demo', 'demo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(3, 'JObayer', 'Mojumder', 'jobayer.pro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_image`
--

CREATE TABLE `tbl_user_image` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profileImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_image`
--

INSERT INTO `tbl_user_image` (`id`, `userId`, `profileImage`) VALUES
(1, 1, 'images/userImages/download (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `favouriteBooks` text NOT NULL,
  `favouriteWriters` text NOT NULL,
  `interests` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`id`, `userId`, `profession`, `favouriteBooks`, `favouriteWriters`, `interests`, `address`, `created_at`, `modified_at`) VALUES
(1, 1, 'Student', 'demos', 'demos', 'zxdcfvgbh', 'zxcvbnm', '2018-02-21 16:23:57', '0000-00-00 00:00:00'),
(3, 1, '', 'demos', 'demos', 'demos', 'zxcvbnm', '2018-02-21 14:32:11', '0000-00-00 00:00:00'),
(4, 1, '', 'TinTin', 'TinTin', 'TinTin', 'TinTin', '2018-02-21 14:47:40', '0000-00-00 00:00:00'),
(5, 1, '', 'MInMIN', 'MInMIN', 'MInMIN', 'MInMIN', '2018-02-21 14:50:30', '0000-00-00 00:00:00'),
(6, 1, '', 'MInMIN', 'TinTin', 'MInMIN', 'TinTin', '2018-02-21 14:52:54', '0000-00-00 00:00:00'),
(7, 1, '', 'Hello', 'Hello', 'Hello', 'Hello', '2018-02-21 14:56:02', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookCategoryId` (`bookCategoryId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_image`
--
ALTER TABLE `tbl_user_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_image`
--
ALTER TABLE `tbl_user_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD CONSTRAINT `tbl_book_ibfk_1` FOREIGN KEY (`bookCategoryId`) REFERENCES `tbl_book_category` (`id`),
  ADD CONSTRAINT `tbl_book_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `tbl_book` (`id`);

--
-- Constraints for table `tbl_user_image`
--
ALTER TABLE `tbl_user_image`
  ADD CONSTRAINT `tbl_user_image_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD CONSTRAINT `tbl_user_profile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
