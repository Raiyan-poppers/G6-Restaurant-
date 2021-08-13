-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 09:24 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `raiyan`
--

CREATE TABLE `raiyan` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dateofbirth` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raiyan`
--

INSERT INTO `raiyan` (`username`, `name`, `email`, `password`, `address`, `phone`, `gender`, `dateofbirth`) VALUES
('Raiyan', ' Mohammed Bhuiya ', 'raiyan.aiub@gmail.com', 'asdasd', '20 Clent Road  Apt 2R', '6315307222', 'Male', '2020-11-18'),
('gridou', ' Mohammed Bhuiya ', 'raiyan.aiub@gmail.com', 'akualbakul', '20 Clent Road  Apt 2R', '6315307222', 'Male', '2020-11-26'),
('mou', ' asdasdasad ', 'asd', 'asdas', 'asd', '4546', 'Female', '2020-11-25'),
('sabina', ' sabina ', 'raiyan.aiub@gmail.com', 'akulabaku0', '20 Clent Road  Apt 2R', '63153072221', 'Female', '2020-11-21'),
('sad', ' saad ', 'saad@gmail.com', 'asd22222', 'asdasd', '515151515', 'Male', '2020-10-15'),
('mim', ' mim ', 'mimaaa', 'asqqwe1', 'asdasd', '124587', 'Female', '2020-11-18'),
('hadi', 'hadi', 'hadi@gmail.com', 'akulabakul', 'uttara', '01682707262', 'Male', '2020-12-22'),
('rai21', ' rai ', 'rai@gmail.com', '123123', 'asdasdas', '12312312', 'Female', '2020-12-01'),
('fahad1', 'fahad', 'fahad@gmail.com', '@Kulabakul00', 'uttara', '1750072629', 'Male', '2021-01-28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
