-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2024 at 11:51 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clg_career`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_connect_mentor`
--

CREATE TABLE IF NOT EXISTS `tbl_connect_mentor` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_connect_mentor`
--

INSERT INTO `tbl_connect_mentor` (`cm_id`, `uid`, `mid`) VALUES
(1, 1, 3),
(2, 1, 5),
(3, 3, 4),
(4, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mentor`
--

CREATE TABLE IF NOT EXISTS `tbl_mentor` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `rdate` varchar(12) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `mclass` varchar(30) NOT NULL,
  `minfo` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_mentor`
--

INSERT INTO `tbl_mentor` (`mid`, `rdate`, `photo`, `mname`, `mclass`, `minfo`, `email`, `gender`, `contact`, `password`) VALUES
(3, '2024-04-20', '', 'Maheshwari Shende', '12', 'Accounting, media marketing, political education', 'mahesh@gmail.com', 'Female', '121212', 'm123'),
(4, '2024-04-20', '', 'Ruhi Sheikh', '12', 'Customer relationship, personality development', 'ruhi@gmail.com', 'Female', '101010', 'r123'),
(5, '2024-04-20', '', 'Prashant Kumar', '10', 'iot, customer service, personal development', 'prashant@gmail.com', 'Male', '123123', 'p123'),
(6, '2024-04-20', '', 'Anup Jha', '10', 'new things, IIT, Accounting', 'anup@g.com', 'Male', '9579047478', 'a123'),
(7, '2024-04-21', 'ePenguins.jpg', 'Rahul', '10', 'h h j hh jhj hj ', 'rahul@gmail.com', 'Male', '7777', 'rr11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mdate` varchar(12) NOT NULL,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`msg_id`, `mdate`, `uid`, `mid`, `message`) VALUES
(1, '2024-04-20', 1, 3, 'Hello bnb vbh f kf f fkfj  jf ke j'),
(2, '2024-04-20', 1, 3, 'sane  omn nl kkl lkkja kke  rklle k k kkr'),
(6, '2024-04-20', 1, 3, 'new jobs new things'),
(7, '2024-04-20', 1, 5, 'Hello'),
(8, '2024-04-20', 1, 5, 'Hi sir'),
(9, '2024-04-21', 3, 4, 'bb g  h bh bh bh bhb h bh i bb b bh bhb hbhv'),
(10, '2024-04-21', 3, 4, 'ha tum ye karowo katuib  hb b '),
(11, '2024-04-21', 3, 4, 'h jh h jhj y uhj  68 j j'),
(12, '2024-04-21', 3, 4, 'kal class nahi rahegi'),
(13, '2024-04-21', 3, 4, 'achha kal nahi aan ahai'),
(14, '2024-04-21', 3, 4, 'sunday is holiday'),
(15, '2024-04-21', 3, 4, 'kal nahi aa raha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume`
--

CREATE TABLE IF NOT EXISTS `tbl_resume` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rdate` varchar(12) NOT NULL,
  `uid` int(10) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ssc` varchar(40) NOT NULL,
  `hssc` varchar(40) NOT NULL,
  `ug` varchar(40) NOT NULL,
  `pg` varchar(40) NOT NULL,
  `extra_curr` varchar(200) NOT NULL,
  `key_skills` varchar(200) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `flag` int(2) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_resume`
--

INSERT INTO `tbl_resume` (`rid`, `rdate`, `uid`, `photo`, `uname`, `cname`, `contact`, `email`, `address`, `ssc`, `hssc`, `ug`, `pg`, `extra_curr`, `key_skills`, `work_exp`, `flag`) VALUES
(1, '2024-04-21', 3, 'eLighthouse.jpg', 'abhijeet verma', 'ANup K', '56434567', 'abhijeetsingh7467@gmail.com', 'HH  J KJB KBK 66', 'state - 79', 'state - 69', '- - -', '- - -', 'yes   j jhj hj h h h', 'yws ig yg g gghghgh', 'yes  gg  ghgh7  h vh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `rdate` varchar(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lastcp` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `rdate`, `fname`, `lastcp`, `email`, `gender`, `contact`, `password`) VALUES
(1, '2024-04-20', 'Anup Kumar', '10th-70%', 'anup777ask@gmail.com', 'Male', '9579047478', 'a123'),
(2, '2024-04-20', 'Pankaj Kumar', '10th-75%', 'pankaj@gmail.com', 'Male', '676767', 'p123'),
(3, '2024-04-21', 'abhijeet verma', '10th-70%', 'abhijeetsingh7467@gmail.com', 'Male', '56434567', 'abhi123');
