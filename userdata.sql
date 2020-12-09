-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 06:33 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `password`, `gender`, `age`, `email`, `level`, `score`, `time`) VALUES
(1, 'Rose Ho Ah Suan', '1111', 'Male', 77, 'NA', 'Easy', 1000, 1.2),
(2, 'Rose Ho Ah Suan', '1111', 'Male', 77, 'NA', 'Normal', 1000, 2.2),
(3, 'Rose Ho Ah Suan', '1111', 'Male', 77, 'NA', 'Hard', 900, 2.55),
(4, 'Hoh Nyat Wah', '1111', 'Male', 73, 'NA', 'Easy', 900, 1.24),
(5, 'Hoh Nyat Wah', '1111', 'Male', 73, 'NA', 'Normal', 600, 2.11),
(6, 'Hoh Nyat Wah', '1111', 'Male', 73, 'NA', 'Hard', 600, 3),
(7, 'Ho Moo Yen', '1111', 'Female', 83, 'NA', 'Easy', 1000, 1.2),
(8, 'Ho Moo Yen', '1111', 'Female', 83, 'NA', 'Normal', 1000, 2.8),
(9, 'Ho Moo Yen', '1111', 'Female', 83, 'NA', 'Hard', 800, 2.57),
(10, 'Lim Poh Yoke', '1111', 'Female', 79, 'NA', 'Easy', 800, 1.4),
(11, 'Lim Poh Yoke', '1111', 'Female', 79, 'NA', 'Normal', 800, 2.38),
(12, 'Lim Poh Yoke', '1111', 'Female', 79, 'NA', 'Hard', 500, 3.22),
(13, 'Patmalosamy', '1111', 'Female', 58, 'NA', 'Easy', 1000, 1.57),
(14, 'Patmalosamy', '1111', 'Female', 58, 'NA', 'Normal', 900, 3.01),
(15, 'Patmalosamy', '1111', 'Female', 58, 'NA', 'Hard', 600, 3.58),
(16, 'Chai Mok Lan', '1111', 'Male', 66, 'NA', 'Easy', 300, 2.3),
(17, 'Chai Ah Tan', '1111', 'Female', 60, 'NA', 'Easy', 1000, 1.11),
(18, 'Chai Ah Tan', '1111', 'Female', 60, 'NA', 'Normal', 1000, 1.58),
(19, 'Chai Ah Tan', '1111', 'Female', 60, 'NA', 'Hard', 900, 2.45),
(20, 'Han Siew Joon', '1111', 'Female', 88, 'NA', 'Easy', 300, 1.4),
(21, 'Lam Yoke Lin', '1111', 'Male', 56, 'NA', 'Easy', 1000, 1.38),
(22, 'Lam Yoke Lin', '1111', 'Male', 56, 'NA', 'Normal', 1000, 2),
(23, 'Lam Yoke Lin', '1111', 'Male', 56, 'NA', 'Hard', 1000, 3.02),
(24, 'Ngan Su Yong', '1111', 'Female', 73, 'NA', 'Easy', 1000, 1.59),
(25, 'Ngan Su Yong', '1111', 'Female', 73, 'NA', 'Normal', 500, 2.44),
(26, 'Ngan Su Yong', '1111', 'Female', 73, 'NA', 'Hard', 200, 3.55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
