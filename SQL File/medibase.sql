-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 02:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medibase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `adminusernm` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `memberinfo`
--

CREATE TABLE `memberinfo` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ;

--
-- Dumping data for table `memberinfo`
--

INSERT INTO `memberinfo` (`firstname`, `lastname`, `user`, `email`, `phone`, `password`) VALUES
('Jay', 'Rathod', 'cse21062000', 'cse21062000@gmail.com', '9512710401', '00026012'),
('Prakruti', 'Rathod ', 'prakruti27052005', 'prakruti27052005@gmail.com', '8758598727', '746589@Jay'),
('Pranami', 'Rajput', 'pranami', '28dcs096@charusat.edu.in', '8160042463', '8160042463'),
('Darshan ', 'Raval', 'w3ddrr', '18dcs099@charusat.edu.in', '8898814643', '00026012');

-- --------------------------------------------------------

--
-- Table structure for table `ngoinfo`
--

CREATE TABLE `ngoinfo` (
  `ngoid` varchar(50) NOT NULL,
  `ngoname` varchar(255) NOT NULL,
  `ngoemail` varchar(255) NOT NULL,
  `ngophone` varchar(11) NOT NULL,
  `ngopassword` varchar(255) NOT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`adminusernm`);

--
-- Indexes for table `memberinfo`
--
ALTER TABLE `memberinfo`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `ngoinfo`
--
ALTER TABLE `ngoinfo`
  ADD PRIMARY KEY (`ngoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
