-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 06:21 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(2, 1, 'books/FERRISS_Timothy_-_The_4-Hour_Workweek.pdf', 'Test', 1, 'Demo', 'userIduserId userIduserIduserIduserId', 'images/bookImages/download (1).jpg', 1, '2018-02-18 15:19:48', '0000-00-00 00:00:00'),
(3, 2, 'books/U1L9-Journal of Civil Engineering and Architecture - Issue 2 2013 - Interactive Teaching in In', 'demo', 1, 'Demos', 'userIduserIduserIduserIduserIduserIduserId', 'images/bookImages/images.jpg', 1, '2018-02-18 15:22:57', '0000-00-00 00:00:00'),
(4, 2, 'books/45_Big-Data.pdf', 'Big data', 1, 'Batman', 'Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man Iron man  ', 'images/bookImages/images (1).jpg', 1, '2018-02-18 17:27:24', '0000-00-00 00:00:00');

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
(1, 'test', 'test', 'test@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, 'Demo', 'demo', 'demo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0);

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD CONSTRAINT `tbl_book_ibfk_1` FOREIGN KEY (`bookCategoryId`) REFERENCES `tbl_book_category` (`id`),
  ADD CONSTRAINT `tbl_book_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
