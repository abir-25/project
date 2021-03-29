-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2017 at 06:35 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 0, 'Colorful Style Sheets'),
(2, 1, 1, 'Cascading Style Sheets'),
(3, 1, 0, 'Creative Style Sheets'),
(4, 1, 0, 'Computer Style Sheets'),
(5, 2, 0, 'font'),
(6, 2, 0, 'class'),
(7, 2, 0, 'styles'),
(8, 2, 1, 'style'),
(9, 3, 0, '{body;color:black;}'),
(10, 3, 1, 'body {color: black;}'),
(11, 3, 0, '{body:color=black;}'),
(12, 3, 0, 'body:color=black;'),
(13, 4, 0, '// this is a comment'),
(14, 4, 0, ''' this is a comment'),
(15, 4, 1, '/* this is a comment */'),
(16, 4, 0, '// this is a comment //'),
(17, 5, 0, 'fgcolor'),
(18, 5, 1, 'color'),
(19, 5, 0, 'text-color'),
(20, 5, 0, 'font-color'),
(21, 6, 0, 'font-style'),
(22, 6, 1, 'font-size'),
(23, 6, 0, 'text-size'),
(24, 6, 0, 'text-style');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'What does CSS stand for?'),
(2, 2, 'Which HTML attribute is used to define inline styles?'),
(3, 3, 'Which is the correct CSS syntax?'),
(4, 4, 'How do you insert a comment in a CSS file?'),
(5, 5, 'Which CSS property is used to change the text color of an element?'),
(6, 6, 'Which CSS property controls the text size?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Abir Mahmud', 'abir', '202cb962ac59075b964b07152d234b70', 'abir1321025@gmail.com', 0),
(2, 'Shahid Sarwar Shojib', 'maari', '202cb962ac59075b964b07152d234b70', 'shojib@gmail.com', 0),
(4, 'Sujit barua', 'sujit', '202cb962ac59075b964b07152d234b70', 'sujit@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
