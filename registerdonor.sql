-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2020 at 05:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registerdonor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`ID`, `username`, `password`, `Date`) VALUES
(1, 'admin', 'admin', '2020-02-22 08:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `bbregister`
--

DROP TABLE IF EXISTS `bbregister`;
CREATE TABLE IF NOT EXISTS `bbregister` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Hname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cpname` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `faxno` varchar(15) NOT NULL,
  `license` varchar(255) NOT NULL,
  `fromd` date NOT NULL,
  `todate` date NOT NULL,
  `component` varchar(255) NOT NULL,
  `apheresis` varchar(255) NOT NULL,
  `helpline` varchar(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bbregister`
--

INSERT INTO `bbregister` (`ID`, `name`, `password`, `email`, `Hname`, `category`, `cpname`, `contact`, `faxno`, `license`, `fromd`, `todate`, `component`, `apheresis`, `helpline`, `website`, `certificate`, `state`, `city`, `address`, `pincode`, `date`, `user`, `status`) VALUES
(3, 'Lion club blood bank', 'yogesh123', 'yogdg@gmail.com', '', 'Govt.', 'dsfsf', '1234567890', '', 'fhfh6564', '2019-01-17', '2031-03-17', '', '', '', '', '2.jpg', 'Goa', 'Aguada Fort', 'dgdgfgd', 1223456, '2020-02-18 18:37:22', 'bloodbank', 1),
(4, 'cross blood bank', 'cross123', 'abhishek@gmail.com', 'city hospital', 'Govt.', 'abhishek Bacchan', '4585745125', '', 'FMA123212', '2019-01-17', '2023-01-17', '', '', '', 'http://www.crossbloodbank.co.in', '8046-about.png', 'Haryana', 'Ajrawar', 'fhfhfhgfh fh fh fh', 123456, '2020-02-18 18:37:22', 'bloodbank', 1),
(5, 'red blood bank', '123789', 'red@gmail.com', 'city hospital', 'Charitable', 'rajesh shinde', '4587125698', '', 'REW1234', '2019-01-18', '2022-01-18', 'Yes', 'Yes', '', '', '5379-tybca old result 2019.pdf', 'Assam', 'Agamani', '12/F City Hospital, M.G. Road, Agamani-123456', 123987, '2020-02-19 08:46:30', 'bloodbank', 1),
(8, 'christ blood bank', '123741', 'christ@gmail.com', 'city hospital', 'Govt.', 'mahesh chavan', '9865741252', '', 'RED123456', '2019-01-22', '2022-01-22', 'Yes', '', '1234567890', '', '1794-banner1.jpg', 'Karnataka', 'Aigale', 'sdgdgd, fsjfk d dldkdg ldk', 963258, '2020-02-23 13:49:27', 'bloodbank', 1),
(9, 'aasha blood bank', '123852', 'aasha@gmail.com', 'city hospital', 'Red Cross', 'Shweta pawar', '6585471236', '1234567890', 'FRE34553', '2019-02-07', '2024-02-07', '', '', '1234567890', 'http://www.aashabloodbank.co.in', '1744-dc6.jpg', 'Maharashtra', 'Mumbai', '20, City hospital, E N Barucha Marg, Opposite Grant Road Opst Office, Grant Road', 400007, '2020-03-08 12:28:45', 'bloodbank', 1),
(10, 'healthy Blood Bank', '14789', 'healthybb@gmail.com', 'city hospital', 'Private', 'Kavita Shetty', '9892235904', '1234567890', 'DE323434', '2019-02-07', '2027-04-09', '', '', '1234567890', '', '7968-dc5.jpg', 'Goa', 'Ajgaon', 'fjh jdgjh jfgh dj gh djdhgdugh djghdjk d', 123456, '2020-03-08 14:17:15', 'bloodbank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp`
--

DROP TABLE IF EXISTS `bloodcamp`;
CREATE TABLE IF NOT EXISTS `bloodcamp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `organised` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `campdate` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodcamp`
--

INSERT INTO `bloodcamp` (`ID`, `title`, `organised`, `state`, `city`, `mobile`, `address`, `campdate`, `details`, `date`, `status`) VALUES
(8, 'blood donation 2', 'lion club mumbai', 'Maharashtra', 'Mumbai', '9875421587', 'tugh ghtu hguth hguhg huthb', '2020-04-22', 'sdfsfs ghgf hvf', '2020-02-18 18:37:56', 1),
(7, 'life source blood donation', 'life source', 'Assam', 'Abhayapuri', '8569874235', 'dgdgggdgs sffdfdg d gdg dg', '2020-03-14', 'sdfsfs', '2020-02-18 18:37:56', 1),
(9, 'blood donation camp 2', 'rotaory club', 'Karnataka', 'Aichanahalli', '6585124574', 'fdlkjg gkgh djkfgh kjgfdg dg', '2020-03-28', '', '2020-02-18 18:37:56', 1),
(10, 'blue bird blood donation camp', 'blue bird', 'Andhra Pradesh', 'Anowa', '4587125487', 'sdfsfsf sfsf', '2020-03-13', '', '2020-02-18 18:37:56', 1),
(11, 'ganesh blood camp', 'ganesh trust', 'Delhi', 'Delhi', '4577854125', 'vd dg gdg vd d d dgf', '2020-04-30', 'dggdfgd', '2020-03-02 18:38:11', 1),
(12, 'Women day blood donation', 'city hospital', 'Madhya Pradesh', 'Abhapuri', '1455878512', 'dhf jhg djgd hgd dhgd dkgd hdgdk', '2020-03-08', 'DO COME...', '2020-03-08 12:35:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

DROP TABLE IF EXISTS `blood_stock`;
CREATE TABLE IF NOT EXISTS `blood_stock` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BB_ID` int(11) NOT NULL,
  `info1` varchar(255) NOT NULL,
  `info2` varchar(255) NOT NULL,
  `info3` varchar(255) NOT NULL,
  `Aptve` int(11) NOT NULL,
  `Bptve` int(11) NOT NULL,
  `Optve` int(11) NOT NULL,
  `Antve` int(11) NOT NULL,
  `Bntve` int(11) NOT NULL,
  `Ontve` int(11) NOT NULL,
  `ABptve` int(11) NOT NULL,
  `ABntve` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`ID`, `BB_ID`, `info1`, `info2`, `info3`, `Aptve`, `Bptve`, `Optve`, `Antve`, `Bntve`, `Ontve`, `ABptve`, `ABntve`, `status`) VALUES
(3, 5, 'Name:Â red blood bank\r\n\r\nAddress:Â 12/F City Hospital, M.G. Road, Agamani-123456\r\n\r\nState:Â AssamÂ Â City:Â Agamani', 'ContactÂ No.:Â 4587125698\r\nEmailÂ ID:Â red@gmail.com', 'Charitable', 10, 24, 21, 12, 6, 14, 15, 18, 1),
(4, 3, 'Name:Â Lion club blood bank\r\nAddress:Â dgdgfgd\r\nState:Â GoaÂ Â City:Â Aguada Fort', 'ContactÂ No.:Â 1234567890\r\nEmailÂ ID:Â yogdg@gmail.com', 'Govt.', 11, 14, 22, 32, 4, 15, 14, 6, 1),
(5, 8, 'Name:Â christ blood bank\r\nAddress:Â sdgdgd, fsjfk d dldkdg ldk\r\nState:Â KarnatakaÂ Â City:Â Aigale', 'ContactÂ No.:Â 9865741252\r\nEmailÂ ID:Â christ@gmail.com', 'Govt.', 15, 4, 12, 3, 25, 15, 22, 16, 1),
(6, 4, 'Name:Â cross blood bank\r\nAddress:Â fhfhfhgfh fh fh fh\r\nState:Â HaryanaÂ Â City:Â Ajrawar', 'ContactÂ No.:Â 4585745125\r\nEmailÂ ID:Â abhishek@gmail.com', 'Govt.', 20, 25, 18, 15, 29, 16, 30, 19, 1),
(7, 9, 'Name:Â aasha blood bank\r\nAddress:Â 20, City hospital, E N Barucha Marg, Opposite Grant Road Opst Office, Grant Road\r\nState:Â MaharashtraÂ Â City:Â Mumbai', 'ContactÂ No.:Â 6585471236\r\nEmailÂ ID:Â aasha@gmail.com', 'Red Cross', 14, 19, 22, 11, 31, 20, 34, 26, 1),
(8, 10, 'Name:Â healthy Blood Bank\r\nAddress:Â fjh jdgjh jfgh dj gh djdhgdugh djghdjk d\r\nState:Â GoaÂ Â City:Â Ajgaon', 'ContactÂ No.:Â 9892235904\r\nEmailÂ ID:Â healthybb@gmail.com', 'Private', 15, 41, 33, 25, 28, 14, 21, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

DROP TABLE IF EXISTS `contactinfo`;
CREATE TABLE IF NOT EXISTS `contactinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`ID`, `mobile`, `email`) VALUES
(1, '1234567890', 'lifesourcebb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ID`, `name`, `email`, `mobile`, `message`, `postingdate`, `status`) VALUES
(2, 'akshay sharma', 'akshay.sharma@gmail.com', '7458621454', 'jgdfhjhvcibcb dhgdj dgdjg dng dhgdghksd', '2020-02-14 15:30:23', '1'),
(3, 'pinky sharma', 'pinky.sharma@gmail.com', '5698741256', 'dslf;fslkf slfk fkls  klsf lkfdfksjfs s sf', '2020-02-14 15:30:23', '1'),
(4, 'rani mheta', 'rani.mheta@gmail.com', '5696341256', 'dslf;fslkf slfk fkls  klsf lkfdfksjfs s sf', '2020-02-14 15:31:31', '1'),
(5, 'ritesh jadhav', 'ritesh.jadhav@gmail.com', '6985471235', 'dslf;fslkf slfk fkls  klsf lkfdfksjfs s sf gdg ddg gdfkj', '2020-02-14 15:47:19', '1'),
(6, 'sanjay deshukh', 'sanjay.deshmukh@gmail.com', '6585741245', 'djfd kljdgdg  kdjlg dfgjk', '2020-02-19 10:21:32', '0'),
(8, 'meena sharma', 'meena.sharma@gmail.com', '4587412525', 'hello.. How r u?', '2020-03-08 15:36:29', '0'),
(9, 'gdgjdjkq', 'sgdgdkl@gmail.com', '9892235904', 'sdsdffs sfdgd  fgdgd dfdg v', '2020-05-12 15:00:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `last_donated`
--

DROP TABLE IF EXISTS `last_donated`;
CREATE TABLE IF NOT EXISTS `last_donated` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `camp_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `donated_date` date NOT NULL,
  `units` int(11) NOT NULL,
  `certificate` varchar(1000) NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_donated`
--

INSERT INTO `last_donated` (`ID`, `donor_id`, `donor_name`, `camp_name`, `address`, `donated_date`, `units`, `certificate`, `details`) VALUES
(6, 2, 'rohan pawar', 'Red blood bank', 'Old 175 New 475, Avenue Road, Avenue Road', '2019-02-06', 2, '6224-blog3.jpg', ''),
(7, 1, 'rani chavan', 'red cross blood bank', 'gjg dkgj df jkd gkjgd g', '2020-04-26', 2, '8605-dc1.jpg', 'ddgj dkjg ddf'),
(5, 1, 'rani chavan', 'aasha blood bank', '351 , Poonam Plaza, rd Floor D S Lane, Chickpet', '2019-02-06', 2, '8756-1 (2).jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bgroup` varchar(3) NOT NULL,
  `weight` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `donated_date` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `name`, `password`, `email`, `birth`, `age`, `gender`, `bgroup`, `weight`, `phone`, `mobile`, `address`, `State`, `city`, `donated_date`, `date`, `user`, `status`) VALUES
(1, 'rani chavan', '1234567', 'yogdg@gmail.com', '01/06/1998', '22', 'Female', 'A+', 51, '', '9892235904', 'jhjgj', 'Arunachal Pradesh', 'Cararpar', '2020-04-26', '2020-02-18 18:38:35', 'Donor', 1),
(2, 'rohan pawar', '123456', 'rohan.pawar@gmail.com', '02/14/1992', '28', 'Male', 'A+', 66, '', '7977394596', '14  Nd Flr, Zaitun Apt, Station Road, Near Nalanda Shopping Cen, Goregaon (w)', 'Arunachal Pradesh', 'Asonli', '2019-02-06', '2020-02-18 18:38:35', 'Donor', 1),
(3, 'ramesh jain', '123456', 'ramesh.kumar@gmail.com', '06/15/1988', '31', 'Male', 'A+', 69, '', '7451236987', 'dgdgfgd', 'Haryana', 'Aharwan', '', '2020-02-18 18:38:35', 'Donor', 0),
(4, 'ganesh more', '147852', 'ganesh.more@gmail.com', '11/15/1984', '35', 'Male', 'B-', 69, '', '9856751452', 'dfdsfs', 'Daman and Diu', 'Ghaniwar', '', '2020-02-18 18:38:35', 'Donor', 1),
(5, 'sneha patil', '258963', 'sneha.patil@gmail.com', '08/16/1989', '30', 'Female', 'O-', 56, '', '7454128956', 'gdg', 'Arunachal Pradesh', 'Bengala', '', '2020-02-18 18:38:35', 'Donor', 1),
(57, 'rohan jadhav', '123963', 'rohan.jadhav@gmail.com', '08/14/1970', '49', 'Male', 'AB-', 70, '', '4125879654', 'hfhfhhfh', 'Bihar', 'Abhayapuri', '', '2020-02-18 18:38:35', 'Donor', 1),
(58, 'hemant chavan', '789654', 'hemant.chavan@gmail.com', '09/22/1993', '26', 'Male', 'O+', 68, '', '9865741252', 'gdgdgjks', 'Goa', 'Ambarim', '', '2020-02-18 18:38:35', 'Donor', 1),
(59, 'rushi pawar', '789123', 'rushi.pawar@gmail.com', '07/19/1985', '34', 'Male', 'O+', 66, '', '5687452156', 'xvxvx', 'Bihar', 'Chanumia', '', '2020-02-18 18:38:35', 'Donor', 1),
(60, 'pooja shinde', '14789', 'pooja.desai@gmail.com', '09/23/1999', '20', 'Male', 'B-', 55, '', '8654951266', 'vxvvjkxj', 'Karnataka', 'Agni', '', '2020-02-19 08:43:30', 'Donor', 0),
(66, 'Rakesh Sharma', '123456', 'rakesh.sharma@gmail.com', '06/14/1995', '24', 'Male', 'O+', 67, '', '4585124252', 'dfhd jhf hfd jhf dj dfjfd', 'Gujarat', 'Adhoi', NULL, '2020-03-11 16:20:42', 'Donor', 1),
(67, 'Prakash mheta', '147852', 'prakash.mheta@gmail.com', '01/13/1977', '43', 'Male', 'B-', 75, '', '5864120302', '355 -a, Doshi Chambers, Nandalal Jani Road, Dana Bunder, Chinch Bunder', 'Maharashtra', 'Mumbai', NULL, '2020-03-11 17:51:14', 'Donor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestblood`
--

DROP TABLE IF EXISTS `requestblood`;
CREATE TABLE IF NOT EXISTS `requestblood` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pname` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `bgroup` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Dname` varchar(255) NOT NULL,
  `Cname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestblood`
--

INSERT INTO `requestblood` (`ID`, `Pname`, `gender`, `bgroup`, `age`, `state`, `city`, `address`, `Dname`, `Cname`, `email`, `mobile`, `message`, `date`, `status`) VALUES
(6, 'yash desai', 'Male', 'A+', 35, 'Arunachal Pradesh', 'Amatulla', 'dfd df d ddg  dgdg dg d dgdgdfg dgd dg j', 'dr thomas', 'sanjay', 'sanjay@gmail.com', '9892235904', 'vvvdf fg dgg dgd dgd', '2020-03-04 15:40:55', 1),
(2, 'Pramod desai', 'Male', 'B-', 45, 'Madhya Pradesh', 'Agar', 'cbbbdfdgd', 'Dr desai', 'suhas', 'suhas@gmail.com', '7977394596', 'dgfgdg', '2020-02-18 18:39:18', 1),
(3, 'ramesh rathod', 'Male', 'B+', 24, 'Andhra Pradesh', 'Arong', 'dsfklgsgksg', 'dr thomas', 'dinesh', 'dinesh.rathod@gmail.com', '6585412565', 'vvcxvvcb', '2020-02-18 18:39:18', 1),
(4, 'neha shinde', 'Female', 'A-', 19, 'Assam', 'Abomgaon', 'gdgfg', 'dr kartik', 'jhon', 'jhon@gmail.com', '4587523654', 'dvvxcv', '2020-02-18 18:39:18', 1),
(7, 'suhas hodge', 'Male', 'A-', 30, 'Maharashtra', 'Adegaon', '79 ab, Govt. Ind Est, Charkop Naka, Opp. Ganesh Hotel Lane', 'Dr prashant', 'Omkar', 'omkar@gmail.com', '8545742152', 'helllo', '2020-03-08 11:32:37', 1),
(8, 'Maya mishra', 'Female', 'O-', 31, 'Rajasthan', 'Alkodiya', 'City Hospital Alkodiya', 'Dr Pooja', 'Ritesh', 'ritesh@gmail.com', '4578142365', 'hello', '2020-03-08 11:42:28', 1),
(9, 'Rinku Rathod', 'Female', 'A-', 25, 'Chandigarh', 'Bahlana', 'City Hospital Bahlana Chandigarh', 'Dr Pratik', 'Guru Rathod', 'guru.rathod@gmail.com', '1452124785', '', '2020-03-08 11:46:13', 1),
(10, 'rani jadhav', 'Female', 'O+', 34, 'Bihar', 'Aberdeen', 'City hospital Bihar', 'Dr Mahesh', 'aditya jadhav', 'aditya.jadhav@gmail.com', '1452578545', '', '2020-03-08 12:02:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserve_blood`
--

DROP TABLE IF EXISTS `reserve_blood`;
CREATE TABLE IF NOT EXISTS `reserve_blood` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BB_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bgroup` varchar(11) NOT NULL,
  `units` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `status2` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_blood`
--

INSERT INTO `reserve_blood` (`ID`, `BB_ID`, `name`, `contact`, `email`, `bgroup`, `units`, `date`, `status`, `status2`) VALUES
(1, 5, 'yogesh karande', '9892235904', 'yogeshkarande640@gmail.com', 'B+', 2, '2020-02-27 18:52:01', 2, '0'),
(2, 5, 'rajesh mheta', '7458452125', 'rajesh.mheta@gmail.com', 'A-', 3, '2020-02-27 19:02:15', 1, 'CLAIM'),
(23, 5, 'fdgdjk', '9892235904', 'yogdg@gmail.com', 'A+', 1, '2020-03-08 15:16:49', 0, '0'),
(4, 5, 'rohit pawar', '4582175454', 'rohit.pawar@gmail.com', 'B-', 2, '2020-02-27 19:06:22', 0, '0'),
(8, 3, 'pooja karande', '4512366872', 'pooja@gmail.com', 'O-', 2, '2020-02-29 14:36:33', 1, 'CLAIM'),
(9, 8, 'atul patil', '4587125244', 'atul.patil@gmail.com', 'B+', 3, '2020-02-29 14:43:07', 0, '0'),
(10, 3, 'vinita sharma', '4587136965', 'vinita.sharma@gmail.com', 'A+', 1, '2020-02-29 14:46:01', 2, '0'),
(11, 3, 'sfdgj', '1234567890', 'sneha.patil@gmail.com', 'A+', 1, '2020-02-29 14:54:28', 0, '0'),
(12, 3, 'fgdg', '7454215475', 'sneha.patil@gmail.com', 'A+', 1, '2020-02-29 15:00:24', 1, '0'),
(13, 5, 'ddsgdsg', '1234567890', 'tejal.sharma@gmail.com', 'A+', 1, '2020-02-29 15:01:31', 0, '0'),
(14, 8, 'bharat jadhav', '7412545696', 'bharat.jadhav@gmail.com', 'AB+', 2, '2020-03-01 18:59:34', 0, '0'),
(20, 3, 'yogesh karande', '9892235904', 'yogeshpkarande@gmail.com', 'O+', 1, '2020-03-02 18:14:38', 1, 'NOT CLAIM'),
(21, 3, 'dfhfdhd', '9892235904', 'yoffsgdfg@gmail.com', 'B+', 1, '2020-03-02 08:31:42', 1, '0'),
(22, 3, 'raju shetty', '9892235904', 'raju.shetty@gmail.com', 'B-', 1, '2020-03-02 14:58:10', 2, '0'),
(24, 5, 'akshay mheta', '9892235904', 'akshay.mheta@gmail.com', 'B+', 2, '2020-04-04 14:05:13', 0, '0'),
(25, 5, 'gdkgq', '9892235904', 'fsgjkg@gmail.com', 'B+', 2, '2020-05-12 14:52:28', 0, '0'),
(26, 5, 'hfdfgg', '9892235904', 'gfdkj@gmail.com', 'A-', 1, '2020-05-12 14:54:11', 0, '0'),
(27, 3, 'gdffg', '9892235904', 'dgfddrt@gmail.com', 'B+', 2, '2020-05-12 14:55:47', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

DROP TABLE IF EXISTS `tblpages`;
CREATE TABLE IF NOT EXISTS `tblpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PageName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'About Us', 'aboutus', '																																																																																																														<div style=\"text-align: center;\"><font size=\"3\">										The facility of the online Blood Bank Management System (BBMS) has been designed to store, process, retrieve and analyse information concerned within a blood bank. All the information pertaining to blood donors, different blood groups available in each blood bank and help them manage in a better way would be available here. The aim of the BBMS is to provide transparency in this field, make the process of obtaining blood from a blood bank hassle-free and corruption free and make the system of blood bank management effective. Information about the blood donation camps and camps organiser management, donor management, including donor registration, managing donor database record would also be available.\r\n										</font></div>\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `updatebb_request`
--

DROP TABLE IF EXISTS `updatebb_request`;
CREATE TABLE IF NOT EXISTS `updatebb_request` (
  `BID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `bbname` varchar(255) NOT NULL,
  `input_name` varchar(255) NOT NULL,
  `fromd` varchar(255) NOT NULL,
  `todate` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updatebb_request`
--

INSERT INTO `updatebb_request` (`BID`, `ID`, `bbname`, `input_name`, `fromd`, `todate`, `details`, `proof`, `date`, `status`) VALUES
(11, 4, 'cross blood bank', 'Category', '', '', 'Govt.', '2458-blood-donor.jpg', '2020-02-23 13:47:36', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
