-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 11:41 PM
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
(6, 3, 'books/chart.pdf', 'Test Book', 1, 'Test AUthor', 'test book descriptions.', 'images/bookImages/rick_kelly.jpg', 1, '2018-02-22 15:01:27', '0000-00-00 00:00:00'),
(7, 4, 'books/applicationformpostgraduateyc.pdf', 'Application book', 1, 'Mr. Author', 'Application book Application book Application book description', '', 1, '2018-02-23 14:58:40', '0000-00-00 00:00:00');

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
(22, 3, 3, 'hello comemts', '2018-02-23 16:12:46', '0000-00-00 00:00:00'),
(23, 3, 3, 'hello', '2018-02-23 16:23:12', '0000-00-00 00:00:00'),
(25, 3, 7, 'hello', '2018-02-23 16:33:06', '0000-00-00 00:00:00');

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
(1, 'Geergitee', 'Jahan', 'test@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, 'Demo', 'demo', 'demo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(3, 'Jobayer', 'Mojumder', 'jobayer.pro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'Iffat ', 'Jahan', 'pithia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(5, 'Nustar', 'Jahan', 'nusrat@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1);

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
(1, 1, 'images/userImages/download (1).jpg'),
(3, 4, 'images/userImages/hqdefault.jpg'),
(7, 3, 'images/userImages/e1483988518866.jpg');

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
(20, 1, 'student', 'Favourite Books', 'Favourite Writers', 'Interests', 'Address', '2018-02-23 15:36:30', '0000-00-00 00:00:00'),
(21, 3, 'software engineer', 'Feluda', 'scb', 'crime,drama', 'No. 36, (Ground Floor), Persiaran Sultan Ibrahim, Off Lintang Batu 3,41300 Klang Selangor', '2018-02-23 17:10:08', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user_image`
--
ALTER TABLE `tbl_user_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
