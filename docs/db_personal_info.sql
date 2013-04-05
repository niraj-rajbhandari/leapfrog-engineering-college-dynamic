-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2013 at 09:27 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_personal_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE IF NOT EXISTS `tbl_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `album_name`, `created_date`, `updated_date`) VALUES
(3, 'naresh maharaja', '2013-03-20 05:09:58', NULL),
(5, 'niraj', '2013-03-28 10:10:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_caption` varchar(255) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `thumb_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_gallery` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `image_caption`, `album_id`, `created_date`, `updated_date`, `thumb_name`) VALUES
(14, 'Desert.jpg', 'Desert', 3, '2013-03-24 04:40:24', '0000-00-00 00:00:00', 'Desert_thumb.jpg'),
(15, 'Jellyfish.jpg', 'jelly Fish', 3, '2013-03-24 04:40:36', '0000-00-00 00:00:00', 'Jellyfish_thumb.jpg'),
(16, 'Penguins.jpg', 'Penguins', 3, '2013-03-24 04:40:44', '0000-00-00 00:00:00', 'Penguins_thumb.jpg'),
(17, 'Tulips.jpg', 'tulips', 3, '2013-03-24 04:40:56', '0000-00-00 00:00:00', 'Tulips_thumb.jpg'),
(25, 'school_bus.jpeg', 'School Bus', 5, '2013-03-28 11:47:11', '0000-00-00 00:00:00', 'school_bus_thumb.jpeg'),
(26, 'school_bus1.jpeg', 'school bus 1', 5, '2013-03-28 11:47:23', '0000-00-00 00:00:00', 'school_bus1_thumb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_posts` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `post_title`, `post_type`, `post_image`, `post_body`, `user_id`, `active`) VALUES
(3, 'asdhkgaskdfgjaskgdfkjasbd,kfaskjdfbhjkasgfdhkjfasdf', 'facilities', 'IMG_1174.JPG', '<p>villain ko kabja ma</p>\r\n', 9, 0),
(5, 'asdfasdfasdf', 'facilites', 'IMG_1177.JPG', '<p>asdfasfsafd</p>\r\n', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `phone`, `user_name`, `password`, `email`, `image_name`) VALUES
(7, 'Sudip', 'J', 'Puda', 'Putalisadak', '4785563', 'sudip_ji', '58680ffb9b073cde5a6d1e57f4dfa9c8', 'sudip_ji@gmail.com', NULL),
(9, 'Hari', 'Bahadur', 'Gyawali', 'Jhapa', '4785563', 'hari_bahadur', '9d898bf27fe0fe9b364d7ff9e2c84eb8', 'hari_bahadur@gmail.com', 'user_mgmt.jpeg'),
(10, 'Naresh', 'Maharaja', 'Dhiraaz', 'Balaju', '4785563', 'naresh_maharaja', '68423007518bc515bde7107e7dba10b5', 'naresh_maharaja@gmail.com', NULL),
(13, 'ojash', '', 'dahal', 'dhapasi', '4785563', 'ojash_dahal', 'a5b4c15152e100c43c6dfd97bb45dd3f', 'ojashdahal@lftechnology.com', 'profilepic.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `fk_tbl_gallery` FOREIGN KEY (`album_id`) REFERENCES `tbl_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD CONSTRAINT `fk_tbl_posts` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
