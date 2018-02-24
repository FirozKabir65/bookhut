-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2018 at 04:55 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(3, 2, 'books/U1L9-Journal of Civil Engineering and Architecture - Issue 2 2013 - Interactive Teaching in In', 'demo', 1, 'Demos', 'userIduserIduserIduserIduserIduserIduserId', 'images/bookImages/images.jpg', 1, '2018-02-18 15:22:57', '0000-00-00 00:00:00'),
(4, 2, 'books/45_Big-Data.pdf', 'Big data', 1, 'Batman', 'Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man  ', 'images/bookImages/images (1).jpg', 1, '2018-02-18 17:27:24', '0000-00-00 00:00:00'),
(5, 1, 'books/Google DevFestâ€™17 Bangla invitation letter .pdf', 'DEv fest', 1, 'Dev Fest', 'Dev Fest ', 'images/bookImages/1.jpg', 1, '2018-02-23 21:23:52', '0000-00-00 00:00:00'),
(6, 3, 'books/chart.pdf', 'Test Book', 1, 'Test AUthor', 'test book descriptions.', 'images/bookImages/rick_kelly.jpg', 1, '2018-02-22 15:01:27', '0000-00-00 00:00:00'),
(7, 4, 'books/Internship Offer Letter for CSE Intern.pdf', 'Application book', 1, 'Mr. DEmo', 'Application book Description\r\n', 'images/bookImages/post1.jpg', 1, '2018-02-23 22:18:24', '0000-00-00 00:00:00'),
(8, 6, 'books/Amar_Ache_Jol_By_Humayun_Ahmed.pdf', 'Amar Ache Jol', 1, 'Humayun Ahmed', 'A teenager girl falls in love with a man who is a servant of her father. While they go to a family vacation, she knows that her elder sister also loved this guy very much, even her sister tried to flee with him before her marriage. Now her sister is an widow with a child. After knowing this story about her sister she notices that her sister still loves this man, so does he.', 'images/bookImages/amar_ache_jol.jpg', 1, '2018-02-24 14:31:41', '0000-00-00 00:00:00');

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
(25, 3, 7, 'hello', '2018-02-23 16:33:06', '0000-00-00 00:00:00'),
(26, 1, 7, 'Hello comment', '2018-02-23 18:10:52', '0000-00-00 00:00:00'),
(27, 1, 5, 'hello', '2018-02-23 18:37:58', '0000-00-00 00:00:00'),
(30, 6, 7, 'This is a good book.', '2018-02-24 15:12:34', '0000-00-00 00:00:00');

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
(5, 'Nustar', 'Jahan', 'nusrat@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(6, 'Ahmed', 'Rimon', 'a.rimon@gmail.com', 'e120ea280aa50693d5568d0071456460', 0);

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
(7, 3, 'images/userImages/e1483988518866.jpg'),
(8, 6, 'images/userImages/mamu.jpg');

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
(20, 1, 'student', 'Favourite Books', 'Favourite Writers', 'Cricket', 'Address', '2018-02-23 18:13:19', '0000-00-00 00:00:00'),
(21, 3, 'software engineer', 'Feluda', 'scb', 'crime,drama', 'No. 36, (Ground Floor), Persiaran Sultan Ibrahim, Off Lintang Batu 3,41300 Klang Selangor', '2018-02-23 17:10:08', '0000-00-00 00:00:00'),
(22, 6, 'Student', 'Ma, Jochna o Jananir Golpo', 'Zahir Rayhan, Humayun Ahmed', 'Travelling, Eating', 'Dhanmondi-32, Dhaka, Bangladesh', '2018-02-24 14:37:49', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user_image`
--
ALTER TABLE `tbl_user_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
