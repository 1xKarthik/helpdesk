-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2013 at 06:45 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `pid`, `uid`, `time`, `content`) VALUES
(1, 50, 1, '2013-10-24 08:19:10', '<h1><span style="color: #993366;">aedj,hblauwdb;uh</span></h1><p>ougd;wohi owijefwjei ;ljajseijf</p><p>aweidjiwjeliwjer</p><p>w;eijr;wijre;ijer</p><p>w;elij</p><p>w;erj</p><p>werj;wjer;owjke;roj;<img src="vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-yell.gif" alt="" /></p>'),
(2, 50, 1, '2013-10-24 08:19:10', '<h1><span style="color: #993366;">aedj,hblauwdb;uh</span></h1><p>ougd;wohi owijefwjei ;ljajseijf</p><p>aweidjiwjeliwjer</p><p>w;eijr;wijre;ijer</p><p>w;elij</p><p>w;erj</p><p>werj;wjer;owjke;roj;<img src="vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-yell.gif" alt="" /></p>'),
(3, 50, 1, '2013-10-27 03:08:01', '<h2><span style="color: #00ff00;">zsergdzaefgeafawdfawd</span></h2>\r\n<p>awedaqwedaweawe</p>\r\n<p>aweaweaweawe</p>'),
(4, 55, 3, '2013-10-27 03:08:01', 'Test Comment by User'),
(5, 55, 1, '2013-10-27 03:08:01', 'Test Comment by Auth'),
(6, 50, 2, '2013-10-27 03:59:09', '<h1><span style="color: #ffff00;">Test Comment by minion</span></h1>'),
(7, 55, 1, '2013-10-28 10:25:31', '<h2><span style="color: #00ff00;">Test comment by Harsha</span></h2>'),
(8, 55, 1, '2013-10-28 10:30:12', '<p>Another Test Comment</p>'),
(11, 55, 1, '2013-10-28 10:39:19', '<h2>iuwhefluwehfloijlajidsasd</h2>'),
(12, 69, 1, '2013-10-29 12:09:22', '<h2><span style="color: #339966;">Test Comment by Harsha</span></h2>'),
(13, 70, 1, '2013-10-30 08:37:11', '<h2><span style="color: #ff6600;">Comment By Harsha</span></h2>'),
(14, 73, 1, '2013-11-09 12:13:49', '<p>The vents are at the bottom, so buy some of the rubber pods to maintain a distance. I copied files for around 8 hours straight, it seems surprisingly OK to touch. The power consumption might be low or it is at a lower RPM (both good for the life span of a HD)</p>'),
(16, 73, 1, '2013-11-09 12:34:38', '<p>The product description was wrong, it was not a mac compatible hard drive. It said clearly on the product page that it was. Overall the service from flipkart is lousy at best, my job it seems has become only to give them feedback after feedback for all the messups they do. I wont go again detailing the case with this hard drive, but before they delete this reviewThe product description was wrong, it was not a mac compatible hard drive. It said clearly on the product page that it was. Overall the service from flipkart is lousy at best, my job it seems has become only to give them feedback after feedback for all the messups they do. I wont go again detailing the case with this hard drive, but before they delete this review</p>'),
(18, 73, 1, '2013-11-09 12:39:50', '<p>The product description was wrong, it was not a mac compatible hard drive. It said clearly on the product page that it was. Overall the service from flipkart is lousy at best, my job it seems has become only to give them feedback after feedback for all the messups they do. I wont go again detailing the case with this hard drive, but before they delete this review, just like previous one time, coz they only like good reviews rather have some people know here, before I share on Twitter, FB and Youtube.. thanks for nothing</p>');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `dname` varchar(15) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`did`, `uid`, `dname`) VALUES
(1, 5, 'hostel'),
(2, 1, 'hostel');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `privacy` varchar(10) NOT NULL,
  `content` varchar(1500) NOT NULL,
  `spam` tinyint(1) NOT NULL DEFAULT '0',
  `comments` int(20) NOT NULL DEFAULT '0',
  `ratings` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `time`, `subject`, `dept`, `privacy`, `content`, `spam`, `comments`, `ratings`) VALUES
(1, 1, '2013-09-29', 'Room Cleaning', 'hostel', '0', 'Room Maintenance <br>', 0, 0, 4),
(2, 1, '2013-09-30', 'Hostel Rooms', 'hostel', '0', 'ergmklem<br><h1><span class="wysiwyg-color-red">egrergergerg</span></h1><i>ergergerg<br></i><h1><i>ergergergergeg</i></h1><br>', 0, 0, -1),
(3, 1, '2013-09-30', 'uilb;ub', 'hostel', '1', 'awrg<br>aerg<br><h2>aergaergarg</h2><h1><span class="wysiwyg-color-red">aergaerg</span></h1>', 0, 0, 0),
(4, 1, '2013-09-30', 'Hostel Rooms', 'hostel', '1', '<h1>aerfaerf</h1><h3><span class="wysiwyg-color-gray">werfwerferf</span></h3>werfwerf<br>', 0, 0, 0),
(5, 1, '2013-09-30', 'Food', 'canteen', '0', 'sfsfe<br><h1><span class="wysiwyg-color-red">wefwefwefwef<u>ewfwf<b>wefwef</b></u></span></h1><span><b></b>wefwef<b>wefwefwef</b><br></span>', 0, 0, 0),
(6, 1, '2013-09-30', 'Food', 'hostel', '0', '<h1>srfse<span class="wysiwyg-color-red">wefwefwef</span></h1><b>wefwefwef</b>wefwefwef<i>wefwefwef<u></u></i><br><br><br>', 0, 0, 0),
(7, 1, '2013-09-30', 'Hostel Rooms', 'hostel', '0', 'ersergsergserg<br><h1>sergsergserg</h1>', 0, 0, 0),
(8, 1, '2013-09-30', 'Hostel Rooms', 'hostel', '0', '<h1>sreghst<span class="wysiwyg-color-maroon">fwefwsef</span></h1>ergergreggr<b>ergergerg<br><i>ergergergerg</i><br></b>', 0, 0, 0),
(9, 1, '2013-09-30', 'Hostel Rooms', 'hostel', '1', 'awfaw<br><h1>aefaefawf<br></h1>', 0, 0, 0),
(10, 1, '2013-09-30', 'werfwef', 'hostel', '1', 'wwefwefwefw<br>wfewe', 0, 0, 0),
(11, 1, '2013-09-30', '', '', '', '', 0, 0, 0),
(12, 1, '2013-09-30', 'Room', 'hostel', '1', '<h1>aefafeaef</h1>aefaefaefaef<br>', 0, 0, 0),
(13, 1, '2013-09-30', 'Room', 'hostel', '1', 'ADAASDASDAASD', 0, 0, 0),
(14, 1, '2013-10-12', 'rfgrg', 'hostel', '1', 'afeEFEF<br>', 0, 0, 0),
(15, 1, '2013-10-18', 'Food', 'hostel', '0', 'Dinner', 0, 0, 0),
(16, 1, '2013-10-18', 'awefaef', 'hostel', '1', 'awefwef', 0, 0, 0),
(17, 1, '2013-10-18', 'liublib', 'hostel', '1', 'liukluhbvouaerfkub', 0, 0, 0),
(18, 1, '2013-10-18', 'liublib', 'hostel', '1', 'aefawefadf', 0, 0, 0),
(19, 1, '2013-10-18', 'liublib', 'hostel', '1', 'sergsergserg', 0, 0, 0),
(20, 1, '2013-10-18', 'liublib', 'hostel', '1', 'sergsergserg', 0, 0, 0),
(21, 1, '2013-10-17', 'AWEFAA', 'hostel', '1', 'DFGRTHRTG', 0, 0, 0),
(22, 1, '2013-10-17', 'AWEFAAqweqwe', 'hostel', '1', 'DFGRTHRTG', 0, 0, 0),
(23, 1, '2013-10-17', 'AWEFAAqweqwewefrw', 'hostel', '1', 'DFGRTHRTGwerwerwersresregeg', 0, 0, 0),
(24, 1, '2013-10-17', 'AWEFAAqweqwewefrwqweq', 'hostel', '1', 'DFGRTHRTGwerwerwersresregegasda', 0, 0, 0),
(25, 1, '2013-10-17', 'AWEFAAqweqwewefrwqweqqweqw', 'hostel', '1', 'DFGRTHRTGwerwerwersresregegassdfsdfsefdsfeAEDAAEda', 0, 0, 0),
(26, 1, '2013-10-17', 'AWEFAAqweqwewefrwqweqqweqwqweqwe', 'hostel', '1', 'DFGRTHRTGwerwerwersresregegassdfsdfsefdsfeAEDAAEdaqweqwe', 0, 0, 0),
(27, 1, '2013-10-17', 'AWEFAAqweqwewefrwqweqqweqwqweqweaergawrgargsdfsg', 'hostel', '1', 'DFGRTHRTGwerwerwersresregegassdfsdfsefdsfeAEDAAawefawefEdaqweqwe', 0, 0, 0),
(28, 1, '2013-10-17', 'SRGSRdrgrgsr', 'hostel', '1', 'sergsdgffdgsdfg', 0, 0, 0),
(29, 1, '2013-10-17', 'SRGSRdrgrgsr', 'hostel', '1', 'sergsdgffdgsdfgsrgsrgsdsdgfgdfg', 0, 0, 0),
(30, 1, '2013-10-17', 'SRGSRdrgrgsr', 'hostel', '1', 'sergsdgffdgsdfgsrgsrgsdsdgfgdfgwewefd', 0, 0, 0),
(44, 1, '2013-10-17', '345SFRGSRG', 'hostel', '1', 'SERGSERG', 0, 0, 0),
(45, 1, '2013-10-17', 'awerfawfreaewfra', 'hostel', '0', 'awefawefdfbggserg', 0, 0, 0),
(46, 1, '2013-10-21', 'SRGSRdrgrgsr', 'hostel', '1', '<p>qqqqqqqqqqq</p>', 0, 0, 0),
(47, 1, '2013-10-21', 'SRGSRdrgrgsr', 'hostel', '1', '<p>qqqqqqqqqqq</p>', 0, 0, 0),
(48, 1, '2013-10-21', 'Food', 'hostel', '1', '<p>Hello World</p>', 0, 0, 0),
(50, 2, '2013-10-21', 'Hello World', 'hostel', '0', '<h1><span style="color: #993366;">aedj,hblauwdb;uh</span></h1>\r\n<p>ougd;wohi owijefwjei ;ljajseijf</p>\r\n<p>aweidjiwjeliwjer</p>\r\n<p>w;eijr;wijre;ijer</p>\r\n<p>w;elij</p>\r\n<p>w;erj</p>\r\n<p>werj;wjer;owjke;roj;<img src="vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-yell.gif" alt="" /></p>', 0, 4, 0),
(51, 1, '2013-10-22 15:56:26', 'arefergargaergaerg', 'hostel', '1', '<p>werfwerwerwer</p>', 0, 0, 0),
(52, 1, '2013-10-22 04:14:15', 'srgsertgserghsthdth', 'hostel', '1', '<p>srgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdth</p>', 0, 0, 0),
(53, 1, '2013-10-22 04:19:10', 'srgsertgserghsthdth', 'hostel', '1', '<p>srgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdth</p>', 0, 0, 0),
(54, 1, '2013-10-22 04:19:10', 'Electricity', 'hostel', '0', '<p>srgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdth</p>', 0, 0, 0),
(55, 3, '2013-10-27 03:08:01', 'Check Posts', 'hostel', '0', '<p>srgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdthsrgsertgserghsthdth</p>', 0, 5, 1),
(58, 2, '2013-10-27 04:16:29', 'Test from GUI', 'hostel', '0', '<h1>Test Report</h1>', 0, 0, 1),
(59, 2, '2013-10-27 04:17:25', 'Test from GUI', 'hostel', '0', '<h1>awdfaWDAWDAWDAWDAWD</h1>', 0, 0, 0),
(60, 1, '2013-10-27 04:24:31', 'AWEFAAqweqwewefrw', 'hostel', '0', '<h1>Test Mail wamp</h1>', 0, 0, 0),
(61, 3, '2013-10-28 03:08:01', 'Test Post', 'hostel', '0', 'description of test post', 0, 0, 0),
(62, 3, '2013-10-28 04:08:01', 'Another test Subject', 'hostel', '0', 'Content of another test subject', 0, 0, 0),
(63, 3, '2013-10-28 07:08:01', 'Accomodation', 'hostel', '0', 'Content of problem', 0, 0, 1),
(69, 3, '2013-10-29 12:02:58', 'Hello World', 'hostel', '0', '<h2><span style="color: #ff9900;">Test Post by User</span></h2>', 0, 1, 0),
(70, 3, '2013-10-30 08:35:49', 'Problem Report by User', 'hostel', '0', '<h2><span style="color: #ff9900;">Problem Description by User</span></h2>', 0, 1, 3),
(71, 1, '2013-11-01 08:49:26', 'Hostel Rooms', 'hostel', '0', '<h1 style="text-align: center;"><span style="color: #ffff00;">Hello World&nbsp;</span></h1>', 0, 0, 1),
(73, 1, '2013-11-09 12:09:47', 'CUSTOMERS WHO VIEWED THIS MOBILE ALSO VIEWED', 'hostel', '0', '<p>An 8 megapixel camera on the Nexus 4 captures the world around you in 360 degree panorama with the Photo Sphere app that is nothing like anything you have seen before. Take pictures in every possible direction and watch them come together into one single amazing photo that translates real life into the virtual frame as perfectly as possible. Sharing them for the world to see is also made easy.</p>\r\n<p>&nbsp;</p>', 0, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `givenby` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `vote` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `givenby`, `pid`, `vote`) VALUES
(4, 1, 71, -1),
(5, 1, 70, 1),
(6, 1, 58, 1),
(7, 1, 1, -1),
(8, 2, 71, 1),
(9, 2, 70, 1),
(10, 3, 70, 1),
(11, 2, 69, -1),
(12, 2, 63, 1),
(13, 1, 73, 1),
(14, 1, 69, 1),
(15, 3, 73, 1),
(16, 3, 55, 1),
(17, 3, 71, 1),
(18, 5, 73, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spamreports`
--

CREATE TABLE IF NOT EXISTS `spamreports` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `postid` int(15) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `suggestion` varchar(500) NOT NULL,
  `rating` int(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`sid`, `uid`, `suggestion`, `rating`, `time`) VALUES
(3, 1, '<h1>erfserfserf8e464te8rt65</h1>', 8, '2013-10-27 11:11:34'),
(4, 1, '<h1>aergaer684684ert</h1>', 8, '2013-10-27 11:12:09'),
(5, 1, '<h1>aerfae65464342sdfgsdfg</h1>', 2, '2013-10-27 11:13:18 '),
(6, 2, '<h2><span style="color: #ff9900;">Test Sugggestion from GUI</span></h2>', 6, '2013-10-28 09:27:05'),
(7, 2, '<h2><span style="color: #ff9900;">Test Suggestion from GUI</span></h2>', 2, '2013-10-28 09:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `privilege` varchar(10) NOT NULL,
  `pic` varchar(50) NOT NULL DEFAULT 'pics/default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `name`, `gender`, `uname`, `pass`, `email`, `privilege`, `pic`) VALUES
(1, 'Harsha Reddy', 'male', 'harsha', '12345', 'harshareddy@live.com', 'auth', 'pics/1.gif'),
(2, 'Minion', 'male', 'minion', '12345', 'harsha1094@yahoo.com', 'user', 'pics/2.jpg'),
(3, 'User', 'male', 'user', '12345', 'unknown@gmail.com', 'user', 'pics/3.jpg'),
(5, 'Veda Vyas', 'male', 'vedavyas', '12345', 'vedavyasreddy@live.in', 'auth', 'pics/male.jpg'),
(6, 'Female Account', 'female', 'female', '12345', 'something@gmail.com', 'user', 'pics/female.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
