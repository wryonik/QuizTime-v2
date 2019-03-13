-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2019 at 12:05 PM
-- Server version: 5.7.25-0ubuntu0.18.10.2
-- PHP Version: 7.2.15-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(1) NOT NULL DEFAULT '0',
  `options` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL,
  `points` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `user` varchar(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(11) NOT NULL,
  `pass` varchar(11) NOT NULL,
  `score` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD UNIQUE KEY `user_question` (`user`,`question_number`),
  ADD KEY `question_number` (`question_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`question_number`) REFERENCES `questions` (`question_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
