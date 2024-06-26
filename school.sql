-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2024 at 09:25 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stdCode` int NOT NULL COMMENT 'کد هنرجو',
  `stdName` varchar(30) COLLATE utf16_persian_ci NOT NULL COMMENT 'نام هنرجو',
  `stdFamily` varchar(60) COLLATE utf16_persian_ci NOT NULL COMMENT 'نام خانوادگی هنرجو',
  `stdCity` varchar(20) COLLATE utf16_persian_ci NOT NULL COMMENT 'محل تولد',
  `password` varchar(30) COLLATE utf16_persian_ci NOT NULL COMMENT 'کلمه عبور',
  `stdImage` varchar(50) COLLATE utf16_persian_ci NOT NULL COMMENT 'عکس هنرجو',
  PRIMARY KEY (`stdCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_persian_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdCode`, `stdName`, `stdFamily`, `stdCity`, `password`, `stdImage`) VALUES
(500, 'jhgfds', 'k', 'tehran', '123', ''),
(1234, 'MAEDEH', 'B', 'mashhad', '123', 'Screenshot (4).png'),
(2580, 'MAEDEH', 'B', 'mashhad', '2580', 'Screenshot (5).png'),
(456, 'MAEDEH', 'B', 'mashhad', '456', 'Screenshot (3).png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
