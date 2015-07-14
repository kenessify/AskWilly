-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2015 at 03:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `askwilly`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `ID` int(7) NOT NULL,
  `AnsDetails` longtext NOT NULL,
  `QuestionID` int(7) NOT NULL,
  `UserID` int(7) NOT NULL,
  `Date` date NOT NULL,
  `Accept` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE IF NOT EXISTS `qa` (
  `Questions` mediumtext NOT NULL,
  `Answers` longtext NOT NULL,
  `QAID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(7) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`QAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`Questions`, `Answers`, `QAID`, `UserID`, `Category`, `Date`) VALUES
('How to start a php script?', 'This is how you start and close a php script\r\n\r\n"<?php\r\n?>"\r\n\r\nHope that was helpful.', 1, 0, 'Programming', '0000-00-00'),
('How to start a php function?', 'This is how you start a php function:\r\nfuncion yourFunctionName()\r\n{\r\n    //Your function here;\r\n}', 2, 0, 'Programming', '0000-00-00'),
('Is it better to use PHP, compared to Javascript.', 'It depends on what you wanna do with it.', 3, 0, 'Programming', '0000-00-00'),
('php', 'php', 4, 0, 'Programming', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `qDetails` longtext NOT NULL,
  `UserID` int(7) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `EducLevel` varchar(15) NOT NULL,
  `ProfilePhoto` varchar(30) NOT NULL,
  `QuestionAskedPnt` int(5) NOT NULL,
  `QuestionAnsweredPnt` int(5) NOT NULL,
  `Reputation` int(5) NOT NULL,
  `Badge` varchar(10) NOT NULL DEFAULT 'Newbie',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `First_Name`, `Surname`, `Email`, `Password`, `EducLevel`, `ProfilePhoto`, `QuestionAskedPnt`, `QuestionAnsweredPnt`, `Reputation`, `Badge`) VALUES
(2, 'AskWilly', 'McWilliam', 'Williams', 'mcwilliamshots@gmail.com', '123456', 'University', '', 0, 0, 0, 'Newbie'),
(3, 'AskWill', 'McWilliam', 'Williams', 'mcwilliamwilliams@ymail.com', 'yellow', 'Others', '', 0, 0, 0, 'Newbie'),
(4, 'AskW', 'McWilliam', 'sdgg', 'mcwilliamwilliams@hotmail.com', 'yellow', 'Others', '', 0, 0, 0, 'Newbie'),
(5, 'Askk', 'sdgsd', 'Williams', 'mcwilliamwilliams@hotmail.co', 'yyyy', 'High School', '', 0, 0, 0, 'Newbie'),
(6, 'AskWi', 'McWilliam', 'Williams', 'mcwilliamwilliams@ymail.c', 'ttt', 'High School', '', 0, 0, 0, 'Newbie'),
(7, 'Askd', 'sdgsd', 'sdgg', 'mcwilliamshots@gmail.co', 'rere', 'High School', '', 0, 0, 0, 'Newbie'),
(8, 'pdfjgo', 'klsdjf', 'odfopghdjk', 'sdgsdgdsgsd@fd.nm', 'pokpoe[', 'High School', '', 0, 0, 0, 'Newbie');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
