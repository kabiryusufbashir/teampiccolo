-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2018 at 02:33 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `election_candidate`
--

CREATE TABLE IF NOT EXISTS `election_candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `other_name` text NOT NULL,
  `full_name` text NOT NULL,
  `dob` text NOT NULL,
  `position` text NOT NULL,
  `candidate_photo` text NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `election_candidate`
--

INSERT INTO `election_candidate` (`candidate_id`, `first_name`, `last_name`, `other_name`, `full_name`, `dob`, `position`, `candidate_photo`) VALUES
(3, 'Gen', 'Muhammad', 'Buhari', 'Gen Muhammad Buhari', '1990-01-30', '8', '../images/media/candidate/2018129921.jpg'),
(4, 'Dr', 'Umar', 'Ganduje', 'Dr Umar Ganduje', '2018-11-26', '8', '../images/media/candidate/20181211229.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `election_login_details`
--

CREATE TABLE IF NOT EXISTS `election_login_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `category` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `election_login_details`
--

INSERT INTO `election_login_details` (`id`, `user_id`, `password`, `category`) VALUES
(2, 'piccolo', 'daa9a24b0be45168c220f2910483c152', 1),
(4, 'jime', '9889059af147e219b702dd5df05e9bc2', 2),
(5, 'umar ', '9889059af147e219b702dd5df05e9bc2', 2),
(6, 'yusuf', '9889059af147e219b702dd5df05e9bc2', 2),
(7, 'peter', '9889059af147e219b702dd5df05e9bc2', 2),
(8, 'goma', '9889059af147e219b702dd5df05e9bc2', 2),
(9, 'baba', '9889059af147e219b702dd5df05e9bc2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `election_name`
--

CREATE TABLE IF NOT EXISTS `election_name` (
  `election_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`election_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `election_name`
--

INSERT INTO `election_name` (`election_id`, `name`, `status`) VALUES
(8, 'Presidential', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election_users`
--

CREATE TABLE IF NOT EXISTS `election_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `other_name` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `user_id` text NOT NULL,
  `user_photo` text NOT NULL,
  `confirmation_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `election_users`
--

INSERT INTO `election_users` (`id`, `first_name`, `last_name`, `other_name`, `dob`, `gender`, `user_id`, `user_photo`, `confirmation_code`) VALUES
(1, 'Abba', 'Jime', 'Mustapha', '2018-10-10', 'male', 'jime', '', '2353'),
(2, 'Umar', 'Grema', 'Muhammed', '2018-10-09', 'male', 'umar ', '', '5369'),
(3, 'Yusuf', 'Kabir', 'Bashir', '2018-12-10', 'male', 'yusuf', '', '9197'),
(4, 'Peter', 'Iliya', 'Musa', '2018-12-07', 'male', 'peter', '', '7679'),
(5, 'Goma', 'Alfred', '', '2012-02-08', 'Male', 'goma', '', '8131'),
(6, 'Babagana', 'Ali', '', '2018-12-04', 'Male', 'baba', '', '5348');

-- --------------------------------------------------------

--
-- Table structure for table `election_vote`
--

CREATE TABLE IF NOT EXISTS `election_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` text NOT NULL,
  `candidate_id` text NOT NULL,
  `user_id` text NOT NULL,
  `time_vote` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `election_vote`
--

INSERT INTO `election_vote` (`id`, `election_id`, `candidate_id`, `user_id`, `time_vote`) VALUES
(6, '8', '3', '3', '2018-12-10 17:20:23');
