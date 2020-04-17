-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2018 at 10:29 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `culconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `calebite`
--

CREATE TABLE `calebite` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(11) NOT NULL,
  `college` text,
  `department` text,
  `course` text,
  `level` text,
  `privilages` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `state` enum('online','offline') NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calebite`
--

INSERT INTO `calebite` (`memberID`, `firstname`, `lastname`, `username`, `password`, `email`, `gender`, `college`, `department`, `course`, `level`, `privilages`, `status`, `state`, `date`) VALUES
(1, 'Elijah', 'Okokon', 'okoelijah', '$2y$10$krS4gUlWGDrS4FoTL40Q5OSyneqK7SKk3iwh3R4ZnVZuAWJZzc1mK', 'okoelijah@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Chemistry and Biochemistry', 'Chemistry', '200', 1, 'active', 'offline', '2018-07-04 04:33:25'),
(40, 'test', 'test', 'test', '$2y$10$.tAEITQGBzTLeSKGG0v0fuPABQNPMFUuFSOnriro9bGlr718BbBmu', 'test@test.com', 'Male', 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Architecture', 'Architecture', '200', 0, 'active', 'online', '2018-07-04 04:33:25'),
(42, 'Culconnect', 'Service', 'Culconnect', '$2y$10$bNVcubrRHE9zV7cAJzsu9.2Far/YnXlgyTCrBYMv732iDMVzIbxvC', 'admin@culconnect.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'offline', '2018-07-04 11:26:34'),
(43, 'Adenroye', 'Olanrewaju', 'Mr.waju', '$2y$10$EP/41aQ.dansjU4MlBKdA.Xo4fHAdT1gpcS.We919Z/ZThEgqYWj.', 'oadenroye98@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Mathematics', '200', NULL, 'active', 'online', '2018-07-04 17:03:12'),
(44, 'precious', 'james', 'pj', '$2y$10$Wzd8ht8qL8atJVAu53Bjqu9AxiwMw8Z4K99BA7ZKWMXby1HzZVWEO', 'precioustayo2@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '200', NULL, 'active', 'online', '2018-07-04 17:08:44'),
(45, 'gomes', 'bosun', 'gomes02bass', '$2y$10$jkL.0HjmASoWlFo0t0ii7..B1SshnSxOQ3utcrRnLyG8EyTh40ry.', 'gomes02bass1@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '100', NULL, 'active', 'online', '2018-07-04 17:09:59'),
(46, 'Famata', 'Shaw ', 'Mekki', '$2y$10$DgOuiipQSBjcI1iE1y9AU.Ra8h9bXjN0ipTbpcAvs9jDQU.S5hFb2', 'famatashaw@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biotechnology', '100', NULL, 'active', 'online', '2018-07-04 17:14:29'),
(47, 'Oluwanifesimi', 'Adeyinka ', 'Adenim ', '$2y$10$Ta9FA8ZCnMj10hvaaqYojeFwxTERHl3zVMcy.dtdN.FE.a.F.iLn.', 'oluwanifesimiadeyinka@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '200', NULL, 'active', 'online', '2018-07-04 17:25:27'),
(48, 'Balogun', 'Gbolahan', 'Ballz', '$2y$10$WgyeoCjteL28QrhVuVWIuOw8nK2qUZW9MSZNe5w54gR44pbfJwIUi', 'Gbolahanbalogun4@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '100', NULL, 'active', 'online', '2018-07-04 17:30:18'),
(49, 'Oluwapelumi', 'Oluwaseyi', 'Eniayomi', '$2y$10$djs58rkHwEg.tqF68X69NeKNlV90MZ8vYA4AE3lRsxFSIk2QJN9NO', 'nathanoluwaseyi@gmail.com', 'Male', NULL, NULL, NULL, NULL, NULL, 'active', 'online', '2018-07-04 17:30:39'),
(50, 'Blessing', 'Enyetam', 'Blessingita', '$2y$10$pmB9nOtJNrf2HErXddVjSulITTld7mLoPTPjGAlUkqw4YL8fJvq96', 'blessingenyetam27@gmail.con', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Chemistry and Biochemistry', 'Chemistry', '100', NULL, 'active', 'online', '2018-07-04 17:42:24'),
(51, 'Onabamiro', 'Ifeoluwa', 'Ifeoluwa1111', '$2y$10$YZRNTaes6jp/rFvU2ToBgeN2c4dE4iSy9Uj5uNypWlnD93Yw0owh6', 'davoostilo@yahoo.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '400', NULL, 'active', 'online', '2018-07-04 17:44:44'),
(52, 'test', 'test', 'testn', '$2y$10$X/B4EkL0hicLSVcvUHgkLuLuf2Rgx7Bv4elw0Qm2fu2dlLZXOr5J2', 'test@gmail.com', 'Male', 'College of Social and Management Science (COSOMAS)', 'Department of Anthropology and Sociology', 'Anthropology', '500', NULL, 'active', 'online', '2018-07-04 17:51:06'),
(53, 'Olatunji ', 'David', 'Ninodavid ', '$2y$10$H./pCSvf.Xgo77GZMkTFLuR9nqQeBekW8v5OHHFE2HrqiYmFknGVK', 'olatunjidavid44@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '200', NULL, 'active', 'online', '2018-07-04 17:53:28'),
(54, 'Eniola ', 'Olowoyo', 'eniolaolowoyo', '$2y$10$fxUwh86Tf6mFaEJMkkvFz.Jbv/fiHXYwVxBrXHT0fnBSl5El3vBuG', 'olowoyoeniola@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '300', NULL, 'active', 'online', '2018-07-04 18:02:42'),
(55, 'Susan', 'John Kitoko', '_Susan', '$2y$10$Xlu.UFJ4I3XTq6CpPby6Ce1ar7zrVmQLBz1VCkT507qo1dIko3IHG', 'kitokocesana@yahoo.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '100', NULL, 'active', 'online', '2018-07-04 18:28:42'),
(56, 'Akabogu ', 'Nmesoma ', 'Oliviaan', '$2y$10$Y.rPJI5Q1TdNW46urYzl..dMYSMJ1srsxBWIlln/Ar9w8L2SZClwm', 'oliviaomaakabogu@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Chemistry and Biochemistry', 'Biochemistry', '300', NULL, 'active', 'online', '2018-07-04 18:31:13'),
(57, 'Eloka', 'Ifezue', 'Humphrey', '$2y$10$dwrEkzOh99e/Rh6W.zoM7us7saXknOqvGfLXRoBBjNKQ62/eodj5i', 'Kevinkline02@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'online', '2018-07-04 19:36:26'),
(58, 'test3', 'test', 'test3', '$2y$10$IGnOq/GOqujVxHDtkesY5uYmsoyh9K7lhc0xh2GfFtrYDh6fNi4se', 'okoelijah@gmail.com', 'Male', 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Architecture', 'Architecture', '300', NULL, 'active', 'online', '2018-07-04 21:55:12'),
(59, 'Olamide', 'Alayande', 'olamide', '$2y$10$cQoRsgiIVQrpzA2.38uJfOPYjSOsw5PVA.aP7Vyc7NtsUwNQ9cX9y', 'alayandeolamide@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Chemistry and Biochemistry', 'Biochemistry', '100', NULL, 'active', 'online', '2018-07-04 21:58:52'),
(60, 'Oluwatimilehin', 'Ajayi', 'Timiajayi', '$2y$10$IwuDZC10rXOT.99hTdjWv.O3xF/fd66/ZZLwKqHBdlShsYIcaaTyO', 'timiajayi2001@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'online', '2018-07-04 22:13:50'),
(61, 'Bryan', 'Ekeh', 'go', '$2y$10$YYS42fUoBw3EyD74Bz51HebGMTzxDmwHXygAUuqdiFLvfx6Gx2lP.', 't@t.com', 'Male', 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Physical Planning and Habitat Development', 'Physical Planning', '200', NULL, 'active', 'online', '2018-07-04 22:28:45'),
(62, 'est', 'tst', 'web', '$2y$10$DTC4zivAxKRVIhuCWmE5Ke..WPDrn0yPLEIjlrn7gDnv8OGVHfU4m', 'web@ber.db', 'Female', 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Estate Management', 'Estate Management', '300', NULL, 'active', 'online', '2018-07-04 22:35:49'),
(63, 'Victor ', 'Olajitan', 'Vice', '$2y$10$LxFpiMiTTKzAHkqPXr9nL.perZzW1QGry1GsLqZtFSBQ5tubuWhtC', 'olajitanvictorayomide@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '100', NULL, 'active', 'online', '2018-07-04 22:53:06'),
(64, 'Wunmi', 'Odukoya', 'Wunmi', '$2y$10$EefxFz7WIG7KX9GtmqBE6un/XNfJgG1dUCx5ltwPFIA6gXH1K6qX2', 'mizmeme2012@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'offline', '2018-07-04 23:32:13'),
(65, 'Timothy', 'Muller', 'Muller', '$2y$10$MduwXN/n7syEweJUZgaMNO/Vjk324N8JZpFCy7djQP3mTxj1QvoH6', 'timothymuller04@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Chemistry and Biochemistry', 'Chemistry', '200', NULL, 'active', 'online', '2018-07-05 00:08:30'),
(66, 'Anjorin', 'Olorunfemi', 'Fhemyjad', '$2y$10$tvieZ0HoKa3Qnh7ZIe7R0.rL4HKE7eCChs2XPWvj5LSRitczG2Xce', 'fhemyjad@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'online', '2018-07-05 07:36:02'),
(67, 'john', 'doe', 'anonymous', '$2y$10$RKuGfuUWUgNTrb/Fnzd8lOfNmbU3VBDGufpzR8RXRrt8QeCXo/QSm', 'jdanonymous@gmail.com', 'Female', 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Architecture', 'Architecture', '600', NULL, 'active', 'online', '2018-07-05 10:23:17'),
(68, 'Samuel', 'Blessing', 'Blessing', '$2y$10$H0hOFS0EJyQ5IGi9JhxeLuG5RCz.YuN6QBwS3MOpsoIWxHaysgzAK', 'samuelblessing425@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '100', NULL, 'active', 'online', '2018-07-05 15:42:57'),
(69, 'Aderonke ', 'Olukotun ', 'Ade', '$2y$10$ITCLd3Diy39NR.JQYPoCMevY9Ci1el9akD7c4HdkUq9kGihySBIj2', 'aderonkeolukotun@gmail.com', 'Female', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '400', NULL, 'active', 'online', '2018-07-05 21:49:39'),
(70, 'Elijah', 'Okokon', 'DMatrix', '$2y$10$tXabjfQic6Qx5jfYRs27/O1wlEjoSxe8DsuuuFuj5BKVI9XRUBCRe', 'okoelijah@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'offline', '2018-07-06 15:47:40'),
(71, 'Elijah', 'Okokon', 'james2', '$2y$10$/3YxTCU4UaSq6IAqE3iPv.nL5tgNFB7oc/ZLtPIiPBq/0LQ21e8QK', 'okoelijah@gmail.com', 'Male', 'College of Social and Management Science (COSOMAS)', 'Department of Business Administration', 'Business Administration', '200', NULL, 'active', 'offline', '2018-07-06 16:27:24'),
(72, 'Elijah', 'Okokon', 'john', '$2y$10$nfv2mDNZ0fLzg7MR658UaemDh8rmi4JuvdMswqNaIV2j7v4J/DEOi', 'okoelijah@gmail.com', 'Male', 'College of Social and Management Science (COSOMAS)', 'Department of Business Administration', 'Business Administration', '200', NULL, 'active', 'offline', '2018-07-06 16:54:25'),
(73, 'Ore', 'Odutoye ', 'Ore Inferno', '$2y$10$rA8vlqurqOzUyYS1fJzcFO0.4WOda21XgT.GyG/aCXiIJlKrNBgVG', 'oreodutoye@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology', 'Biological Sciences', '100', NULL, 'active', 'online', '2018-07-06 23:09:15'),
(74, 'ayorinde', 'ayodeji', 'deelino', '$2y$10$aMC2bLiDfYvLllrktE9yIuCZ9a0N4clR9whTcmyXJTyikXnkl/zeS', 'ayodeji780@gmail.com', 'Male', NULL, NULL, NULL, NULL, NULL, 'active', 'offline', '2018-07-07 00:51:44'),
(75, 'test', 'tsest', 'rer', '$2y$10$IW.3S8v2KdOzc4XKrUG6Gu9pyiUt66371Mwzr4q78KAMbWKg9EuLO', 'okoelijah@gmail.com', 'Male', 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Physical Planning and Habitat Development', 'Physical Planning', '200', NULL, 'active', 'offline', '2018-07-07 23:05:12'),
(76, 'Chigozie ', 'Nsofor ', 'Kenzybaby ', '$2y$10$KaNNmw2JcKzlB2d4tej9M.pk6f09aB9AMYb1JEE/foWl2AdjJ2sR.', 'itskenzy21@gmail.com', 'Male', NULL, NULL, NULL, NULL, NULL, 'active', 'online', '2018-07-10 23:15:16'),
(77, 'Chigozie ', 'Nsofor ', 'itskenzybaby ', '$2y$10$H8PIMizi3N1s3ZOQtb35Oe4rD6eeSSSw9LYzzLFN7CxkRIj/V1w4S', 'itskemzy21@gmail.com', 'Male', NULL, NULL, NULL, NULL, NULL, 'active', 'online', '2018-07-10 23:26:00'),
(78, 'Chigozie ', 'Nsofor', 'chigozie ', '$2y$10$puWxYGRYhF2.iApdD03KkuXuSEGkUhei.7KshEU9YI40dobyoLd8C', 'itskenzy21@gmail.com', 'Male', 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science', 'Computer Science', '100', NULL, 'active', 'online', '2018-07-10 23:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL,
  `stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_ID`, `comment_text`, `comment_status`, `stamp`) VALUES
(1, 0, 'hellor', 1, '0000-00-00'),
(2, 0, 'aweaf', 1, '0000-00-00'),
(11, 0, 'hellor', 1, '0000-00-00'),
(12, 0, 'aweaf', 1, '0000-00-00'),
(20, 1, 'test new\r\n', 1, '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `user_ID` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `follow_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`user_ID`, `follower_id`, `follow_status`) VALUES
(40, 1, 0),
(45, 42, 0),
(1, 40, 1),
(46, 42, 0),
(47, 42, 0),
(50, 42, 0),
(53, 42, 0),
(57, 66, 0),
(51, 66, 0),
(42, 67, 1),
(67, 42, 0),
(60, 42, 1),
(69, 42, 0),
(68, 42, 0),
(66, 42, 0),
(65, 42, 0),
(64, 42, 0),
(63, 42, 0),
(61, 42, 0),
(59, 42, 0),
(57, 42, 0),
(42, 60, 1),
(73, 72, 0),
(42, 70, 1),
(73, 70, 0),
(50, 70, 0),
(60, 70, 1),
(1, 70, 1),
(70, 1, 1),
(70, 60, 1),
(1, 60, 0),
(46, 60, 0),
(50, 60, 0),
(73, 60, 0),
(69, 60, 0),
(43, 60, 0),
(44, 60, 0),
(45, 60, 0),
(47, 60, 0),
(48, 60, 0),
(51, 60, 0),
(53, 60, 0),
(54, 60, 0),
(55, 60, 0),
(56, 60, 0),
(57, 60, 0),
(59, 60, 0),
(61, 60, 0),
(63, 60, 0),
(64, 60, 0),
(66, 60, 0),
(67, 60, 0),
(68, 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `image_id` int(255) NOT NULL,
  `path` varchar(50) NOT NULL,
  `imagename` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`image_id`, `path`, `imagename`, `user_id`) VALUES
(1, 'https://culconnect.com/images/', 'noavatar92.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `status_id`, `value`, `user_id`, `status`) VALUES
(29, 197, 1, 6, 0),
(31, 197, 1, 1, 0),
(32, 625, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace`
--

CREATE TABLE `marketplace` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `productSlug` varchar(255) NOT NULL,
  `product_pic` blob NOT NULL,
  `ads_url` varchar(255) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_full` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `User_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `user_fullname` varchar(40) NOT NULL,
  `message_body` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_fullname` varchar(40) NOT NULL,
  `message_status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_ID`, `user_fullname`, `message_body`, `sender_id`, `sender_fullname`, `message_status`, `date`) VALUES
(1, 40, 'test', 'hi dear\r\n', 1, 'okoelijah', 0, '2018-07-04 02:34:33'),
(2, 60, 'Timiajayi', 'sup', 42, 'Culconnect', 0, '2018-07-05 20:26:58'),
(3, 60, 'Timiajayi', 'this is elijah', 42, 'Culconnect', 0, '2018-07-05 20:27:05'),
(4, 60, 'Timiajayi', 'sup', 70, 'DMatrix', 0, '2018-07-10 22:30:59'),
(5, 42, 'culconnect', 'Hello', 60, 'Timiajayi', 0, '2018-07-10 23:06:57'),
(6, 60, 'Timiajayi', 'how ur life', 42, 'Culconnect', 0, '2018-07-10 23:07:32'),
(7, 60, 'Timiajayi', 'big head', 42, 'Culconnect', 0, '2018-07-10 23:57:29'),
(8, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:45'),
(9, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:46'),
(10, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:47'),
(11, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:48'),
(12, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:49'),
(13, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:49'),
(14, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:50'),
(15, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:50'),
(16, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:51'),
(17, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:51'),
(18, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:51'),
(19, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:51'),
(20, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:52'),
(21, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:52'),
(22, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:52'),
(23, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:53'),
(24, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:53'),
(25, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:53'),
(26, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:53'),
(27, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:54'),
(28, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:54'),
(29, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:54'),
(30, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:54'),
(31, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:55'),
(32, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:55'),
(33, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:55'),
(34, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:56'),
(35, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:56'),
(36, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:56'),
(37, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:56'),
(38, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:56'),
(39, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:56'),
(40, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:57'),
(41, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:57'),
(42, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:57'),
(43, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:57'),
(44, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:58'),
(45, 42, 'culconnect', 'Have you linked it? ', 60, 'Timiajayi', 0, '2018-07-10 23:57:58'),
(46, 42, 'culconnect', '', 60, 'Timiajayi', 0, '2018-07-10 23:57:58'),
(47, 42, 'culconnect', '', 60, 'Timiajayi', 0, '2018-07-10 23:57:58'),
(48, 42, 'culconnect', '', 60, 'Timiajayi', 0, '2018-07-10 23:57:58'),
(49, 60, 'Timiajayi', 'u try \r\n', 42, 'Culconnect', 0, '2018-07-10 23:58:22'),
(50, 42, 'culconnect', 'Link it noww', 60, 'Timiajayi', 0, '2018-07-10 23:58:33'),
(51, 42, 'culconnect', 'I want to send pictures ', 60, 'Timiajayi', 0, '2018-07-11 00:04:30'),
(52, 60, 'Timiajayi', 'will it send', 42, 'Culconnect', 0, '2018-07-11 22:31:48'),
(53, 60, 'Timiajayi', 'sup', 42, 'Culconnect', 0, '2018-07-11 22:59:15'),
(54, 60, 'Timiajayi', 'sup', 42, 'Culconnect', 0, '2018-07-11 23:05:21'),
(55, 60, 'Timiajayi', 'hey\r\n', 42, 'Culconnect', 0, '2018-07-11 23:09:29'),
(56, 60, 'Timiajayi', 'sup\r\n', 42, 'Culconnect', 0, '2018-07-11 23:09:48'),
(57, 60, 'Timiajayi', 'hw u do', 42, 'Culconnect', 0, '2018-07-11 23:10:07'),
(58, 42, 'Culconnect', 'So you have linked it now? ', 60, 'Timiajayi', 0, '2018-07-12 18:57:12'),
(59, 42, 'Culconnect', 'Guy! ', 60, 'Timiajayi', 0, '2018-07-12 18:57:32'),
(60, 70, 'DMatrix', 'Elijah how you', 60, 'Timiajayi', 0, '2018-07-12 18:58:05'),
(61, 60, 'Timiajayi', 'i dey', 70, 'DMatrix', 0, '2018-07-12 19:01:06'),
(62, 60, 'Timiajayi', '', 70, 'DMatrix', 0, '2018-07-12 19:01:58'),
(63, 42, 'Culconnect', 'Jamb', 60, 'Timiajayi', 0, '2018-09-22 14:01:03'),
(64, 42, 'Culconnect', '', 60, 'Timiajayi', 0, '2018-09-26 18:34:02'),
(65, 42, 'Culconnect', '', 60, 'Timiajayi', 0, '2018-09-26 18:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `college` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(255) NOT NULL,
  `level` smallint(11) NOT NULL,
  `public` varchar(11) NOT NULL,
  `view` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT '0',
  `comment_sender_name` varchar(222) DEFAULT NULL,
  `comment` text,
  `sender_id` int(11) NOT NULL,
  `status_user_id` int(11) NOT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT '0',
  `action` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `status_id`, `parent_comment_id`, `comment_sender_name`, `comment`, `sender_id`, `status_user_id`, `comment_status`, `action`, `type`, `date`) VALUES
(3, 626, 0, NULL, NULL, 1, 1, 0, 'Shared', 'Photo', '2018-07-03 23:22:28'),
(4, 626, 0, 'okoelijah', '  NICE one', 1, 1, 0, 'comment', 'Photo', '2018-07-03 23:23:13'),
(5, 626, 0, 'okoelijah', '  this again', 1, 1, 0, 'comment', 'Photo', '2018-07-04 00:57:10'),
(6, 626, 4, 'okoelijah', 'what did she say\r\n  ', 1, 1, 0, 'comment', 'Photo', '2018-07-04 01:20:16'),
(7, 657, 0, NULL, NULL, 1, 1, 0, 'like', 'Photo', '2018-07-04 01:36:14'),
(8, 665, 0, NULL, NULL, 42, 47, 0, 'like', 'Post', '2018-07-05 00:54:26'),
(9, 667, 0, 'Culconnect', 'am seeing ur post nw  ', 42, 60, 1, 'comment', 'Post', '2018-09-22 12:54:23'),
(10, 667, 0, NULL, NULL, 42, 60, 1, 'like', 'Post', '2018-09-22 12:54:23'),
(11, 667, 0, NULL, NULL, 60, 60, 1, 'like', 'Post', '2018-09-22 12:54:23'),
(12, 667, 0, NULL, NULL, 70, 60, 1, 'like', 'Post', '2018-09-22 12:54:23'),
(13, 662, 0, NULL, NULL, 1, 1, 0, 'like', 'Photo', '2018-07-08 23:05:22'),
(14, 657, 0, 'okoelijah', '  Nice', 1, 1, 0, 'comment', 'Photo', '2018-07-08 23:06:01'),
(15, 663, 0, NULL, NULL, 60, 1, 0, 'like', 'Post', '2018-09-22 13:55:18'),
(16, 673, 0, NULL, NULL, 60, 42, 0, 'like', 'Photo', '2018-09-22 13:55:19'),
(17, 665, 0, NULL, NULL, 60, 47, 0, 'like', 'Post', '2018-09-22 13:55:25'),
(18, 674, 0, NULL, NULL, 60, 42, 0, 'like', 'Photo', '2018-09-22 13:55:28'),
(19, 667, 9, 'Timiajayi', 'Really   ', 60, 60, 0, 'comment', 'Post', '2018-09-26 18:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `online_user`
--

CREATE TABLE `online_user` (
  `session` char(100) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_user`
--

INSERT INTO `online_user` (`session`, `time`) VALUES
('40', 1538024904);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `aboutme` text,
  `position` varchar(200) DEFAULT NULL,
  `activity` varchar(200) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `profilepic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `username`, `aboutme`, `position`, `activity`, `contact`, `profilepic`) VALUES
(4, 1, 'okoelijah', '', 'Student', '', '08015487562', 'uploads/profile/100/m/IMG-20180217-WA0005.jpg'),
(13, 40, 'test', '', 'Executive', 'ok', '02585222222', 'uploads/profile/200/m/test.cul5b37eb1de37e72.14852736.jpg'),
(15, 41, 'james', '', 'Executive', '', '08150685555', 'uploads/profile/100/m/james.cul5b3c500c81ca58.82286659.jpg'),
(16, 42, 'Culconnect', '', 'Student', 'Admin', '08150685555', 'uploads/profile/100/f/culconnect.cul5b3cf58b3b5211.37279705.jpg'),
(17, 45, 'gomes02bass', '', 'Student', '', '08025864521', 'uploads/profile/100/m/gomes02bass.cul5b3cffd3d61c95.32990026.jpg'),
(18, 46, 'Mekki', '', 'Student', '', '09085431640', 'uploads/profile/100/f/mekki.cul5b3d01100cd8c2.23026534.jpg'),
(19, 47, 'Adenim ', '', 'Student', '', '09068885752', 'uploads/profile/200/m/adenim .cul5b3d03d1587359.04297980.jpg'),
(20, 47, 'Adenim ', '', 'Student', '', '09068885752', 'uploads/profile/200/m/adenim .cul5b3d03d6e5a2b2.94012764.jpg'),
(21, 50, 'Blessingita', '', 'Student', '', '08109242411', 'uploads/profile/100/f/blessingita.cul5b3d077cc29a58.52033033.jpg'),
(22, 53, 'Ninodavid ', '', 'Student', '', '09023751388', 'uploads/profile/200/m/ninodavid .cul5b3d0ac07ec7d2.05571328.jpeg'),
(23, 62, 'web', '', 'Student', '', '08085847545', 'uploads/profile/300/f/web.cul5b3d4f1303cc93.50554812.jpg'),
(24, 66, 'Fhemyjad', 'Easy going fella', 'Student', 'Reading', '08029152468', 'uploads/profile/100/m/fhemyjad.cul5b3dcbdb610789.66785036.jpg'),
(25, 67, 'anonymous', 'Hackivist', 'Student', 'Hacker Group', '08000000000', 'uploads/profile/600/f/anonymous.cul5b3df253802ef3.81603835.jpeg'),
(26, 70, 'DMatrix', '', '', '', '08150685555', 'uploads/profile/100/m/dmatrix.cul5b41566a0abd24.21999159.jpg'),
(27, 71, 'james2', '', '', '', '08150685555', 'uploads/profile/200/m/james2.cul5b412b99e3c5e4.11434010.jpg'),
(28, 72, 'john', '', 'Executive', 'singer', '08150685555', 'uploads/profile/200/m/john.cul5b3fac6f1acf11.37485706.jpg'),
(29, 75, 'rer', '', 'Student', 'Singing ', '08021544554', ''),
(30, 60, 'Timiajayi', '', 'Student', '', '08176860893', 'uploads/profile/100/m/timiajayi.cul5b4793c43f1d05.25498878.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resize_images`
--

CREATE TABLE `resize_images` (
  `image_id` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `out_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `option_id` bigint(20) NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'sitename', 'Culconnect'),
(2, 'sitedescription', 'school, website, student'),
(3, 'siteurl', 'https://culconnect.com/'),
(4, 'home', 'culconnect.com'),
(5, 'admin_email', 'okoelijah@gmail.com'),
(6, 'schoolname', 'Caleb University'),
(7, 'universitydesc', 'Student Pride'),
(8, 'universityurl', 'http://www.calebuniversity.edu.ng/'),
(9, 'colleges', 'College of Environmental Sciences and Management (COLENSMA)'),
(13, 'colleges', 'College of Pure and Applied Sciences (COPAS)'),
(14, 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Architecture'),
(15, 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Physical Planning and Habitat Development'),
(16, 'College of Pure and Applied Sciences (COPAS)', 'Department of Biological Sciences and Biotechnology'),
(17, 'colleges', 'College of Social and Management Science (COSOMAS)'),
(18, 'colleges', 'College of Postgraduate Studies (COPOS)'),
(19, 'College of Pure and Applied Sciences (COPAS)', 'Department of Chemistry and Biochemistry'),
(20, 'College of Pure and Applied Sciences (COPAS)', 'Department of Mathematics, Statistics and Computer Science'),
(21, 'College of Pure and Applied Sciences (COPAS)', 'Department of Pure and Applied Physics'),
(22, 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Estate Management'),
(32, 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Environmental Protection and Management'),
(33, 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Surveying and Geoinfomatics'),
(34, 'College of Environmental Sciences and Management (COLENSMA)', 'Department of Building and Quantity Surveying'),
(35, 'College of Social and Management Science (COSOMAS)', 'Department of Economics'),
(36, 'College of Social and Management Science (COSOMAS)', 'Department of Business Administration'),
(37, 'College of Social and Management Science (COSOMAS)', 'Department of Accounting and Finance'),
(38, 'College of Social and Management Science (COSOMAS)', 'Department of Political Science, Philosophy & International Relations'),
(39, 'College of Social and Management Science (COSOMAS)', 'Department of Anthropology and Sociology'),
(40, 'College of Social and Management Science (COSOMAS)', 'Department of General Studies and Entrepreneurship Skill Development'),
(42, 'Department of Architecture', 'Architecture'),
(43, 'Department of Physical Planning and Habitat Development', 'Physical Planning'),
(44, 'Department of Physical Planning and Habitat Development', 'Habitat Development'),
(45, 'Department of Estate Management', 'Estate Management'),
(46, 'Department of Environmental Protection and Management', 'Environmental Protection'),
(47, 'Department of Environmental Protection and Management', 'Management'),
(48, 'Department of Surveying and Geoinfomatics', 'Surveying'),
(49, 'Department of Surveying and Geoinfomatics', 'Geoinfomatics'),
(50, 'Department of Building and Quantity Surveying', 'Building'),
(51, 'Department of Building and Quantity Surveying', 'Quantity Surveying'),
(52, 'Department of Biological Sciences and Biotechnology', 'Biological Sciences'),
(53, 'Department of Biological Sciences and Biotechnology', 'Biotechnology'),
(54, 'Department of Chemistry and Biochemistry', 'Chemistry'),
(55, 'Department of Chemistry and Biochemistry', 'Biochemistry'),
(56, 'Department of Mathematics, Statistics and Computer Science', 'Mathematics'),
(57, 'Department of Mathematics, Statistics and Computer Science', 'Statistics'),
(58, 'Department of Mathematics, Statistics and Computer Science', 'Computer Science'),
(59, 'Department of Pure and Applied Physics', 'Pure and Applied Physics'),
(60, 'Department of Economics', 'Economics'),
(61, 'Department of Business Administration', 'Business Administration'),
(62, 'Department of Accounting and Finance', 'Accounting'),
(63, 'Department of Accounting and Finance', 'Finance'),
(64, 'Department of Political Science, Philosophy & International Relations', 'Political Science'),
(65, 'Department of Political Science, Philosophy & International Relations', 'Philosophy'),
(66, 'Department of Political Science, Philosophy & International Relations', 'International Relations'),
(67, 'Department of Anthropology and Sociology', 'Anthropology'),
(68, 'Department of Anthropology and Sociology', 'Sociology'),
(69, 'Department of General Studies and Entrepreneurship Skill Development', 'General Studies'),
(70, 'Department of General Studies and Entrepreneurship Skill Development', 'Entrepreneurship Skill Development');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `postSlug` varchar(255) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `action` varchar(40) NOT NULL,
  `type` varchar(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `body` text,
  `picPath` varchar(255) DEFAULT NULL,
  `stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `postSlug`, `user_ID`, `action`, `type`, `status_id`, `body`, `picPath`, `stamp`) VALUES
(626, 'heloo-this-is-my-pic', 1, 'Posted', 'Photo', 0, 'heloo this is my pic', 'https://culconnect.com/uploads/status/200/m/okoelijah.cul5b30af09764838.87409665.jpg', '2018-06-25 09:59:53'),
(196, 'this-is-my-wall', 1, 'Posted', '', 0, 'this is my wall', '', '2018-05-31 21:09:28'),
(194, 'okoelijah-afternext-sample-1-jpg', 1, 'Edited', '', 0, '', 'https://culconnect.com/uploads/status/200/m/okoelijah.cul5b30cd47c8e0c9.07351167.jpg', '2018-06-25 12:08:55'),
(198, 'okoelijah-img-20180217-wa0004-jpg', 1, 'Posted', '', 0, '', '', '2018-06-13 19:20:12'),
(594, 'admin-img-20180217-wa0003-jpg-6', 1, 'Shared', '', 197, '', '', '2018-06-15 01:44:54'),
(589, 'hello-this-is-what-a', 1, 'Posted', '', 0, 'HELLO THIS IS WHAT AM TAKING ABOUT', '', '2018-06-14 13:22:55'),
(595, 'hello-this-is-what-a-1', 1, 'Shared', '', 589, 'HELLO THIS IS WHAT AM TAKING ABOUT', '', '2018-06-15 02:27:54'),
(657, 'heloo-this-is-my-pic-1', 1, 'Shared', 'Photo', 626, 'heloo this is my pic', 'https://culconnect.com/uploads/status/200/m/okoelijah.cul5b30af09764838.87409665.jpg', '2018-07-03 22:22:28'),
(603, 'whats-up-people', 1, 'Edited', '', 0, 'whats up people yea whats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats whats up people yea whats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats whats up people yea whats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats whats up people yea whats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats up people yeawhats ', '', '2018-06-25 11:43:13'),
(658, 'test-again', 1, 'Posted', 'Post', NULL, 'test again', NULL, '2018-07-04 01:44:43'),
(663, 'this-is-both', 1, 'Posted', 'Post', NULL, 'this is both', 'https://culconnect.com/uploads/status/200/m/okoelijah.cul5b3c1d95505946.99247029.jpg', '2018-07-04 02:06:29'),
(664, 'ok-ooh-happy-friends', 40, 'Posted', 'Post', NULL, 'ok ooh happy friendship', NULL, '2018-07-04 02:46:34'),
(665, 'its-that-time-of-the', 47, 'Posted', 'Post', NULL, 'Its that time of the semester\r\nEXAMS!!!', NULL, '2018-07-04 18:30:25'),
(666, 'web-dearest-one-20180621-204259-jpg', 62, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/300/f/web.cul5b3d4ff4377a88.58660592.jpg', '2018-07-04 23:53:40'),
(662, 'okoelijah-2-jpg', 1, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/200/m/okoelijah.cul5b3c1ce0049840.51953789.jpg', '2018-07-04 02:03:28'),
(667, 'hi-i-m-timi', 60, 'Posted', 'Post', NULL, 'Hi I\'m timi', NULL, '2018-07-05 20:35:05'),
(668, 'https-www-deegeek', 74, 'Posted', 'Post', NULL, 'https://www.deegeek.com.ng/2018/07/how-to-make-money-from-konga-affiliate.html', NULL, '2018-07-07 01:52:39'),
(669, 'james2-img-20180217-wa0006-jpg', 71, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/200/m/james2.cul5b4128e238f1e0.10544467.jpg', '2018-07-07 21:56:02'),
(670, 'test-img-20180609-wa0004-jpg', 40, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/200/m/test.cul5b4297ba9d92d6.88956450.jpg', '2018-07-09 00:01:14'),
(671, 'test-img-20171214-095509-628-jpg', 40, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/200/m/test.cul5b4297f0c71107.98854890.jpg', '2018-07-09 00:02:08'),
(672, 'test-biebele-20180525-232514-jpg', 40, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/200/m/test.cul5b4298250aea52.96444851.jpg', '2018-07-09 00:03:01'),
(673, 'culconnect-img-20180703-wa0183-jpg', 42, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/100/f/culconnect.cul5b42a57ee3b557.76460550.jpg', '2018-07-09 00:59:58'),
(674, 'culconnect-img-20180703-wa0183-jpg', 42, 'Posted', 'Photo', NULL, NULL, 'https://culconnect.com/uploads/status/100/f/culconnect.cul5b42a5e30ce4e5.04819870.jpg', '2018-07-09 01:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `action` varchar(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `count`, `action`, `status_id`) VALUES
(1, 9854, 'sitetraffic', 0),
(2, 33, 'post', 197),
(3, 6, 'post', 195),
(4, 185, 'post', 194),
(5, 4, 'post', 196),
(6, 33, 'post', 594),
(7, 2, 'post', 595),
(8, 1, 'post', 198),
(9, 9, 'post', 606),
(10, 2, 'post', 604),
(11, 20, 'post', 602),
(12, 4, 'post', 609),
(13, 4, 'post', 603),
(14, 4, 'post', 618),
(15, 8, 'post', 625),
(16, 68, 'post', 626),
(17, 5, 'post', 634),
(18, 1, 'post', 635),
(19, 62, 'post', 638),
(20, 49, 'post', 640),
(21, 8, 'post', 649),
(22, 5, 'post', 653),
(23, 10, 'post', 655),
(24, 27, 'post', 663),
(25, 51, 'post', 657),
(26, 18, 'post', 665),
(27, 22, 'post', 667),
(28, 15, 'post', 662),
(29, 2, 'post', 670);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calebite`
--
ALTER TABLE `calebite`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`user_ID`,`follower_id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `marketplace`
--
ALTER TABLE `marketplace`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resize_images`
--
ALTER TABLE `resize_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calebite`
--
ALTER TABLE `calebite`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `image_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `resize_images`
--
ALTER TABLE `resize_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
