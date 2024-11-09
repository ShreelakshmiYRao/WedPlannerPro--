
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 03:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `psw`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catering`
--

INSERT INTO catering (cid, name, price, descr) VALUES
(1, 'RNM Catering', '4000', 'Best Quality Food'),
(2, 'Trupti Catering', '2000', 'Best Choice'),
(3, 'Culinary Affairs', '2500', 'Indian, Italian cuisine'),
(4, 'Sodexo', '1500', 'Quality and Innovation');

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `did` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decoration`
--

INSERT INTO decoration (did, name, price, descr) VALUES
(1, 'Celestial Celebration', '45000', 'Exchanging vows under starry sky'),
(2, 'Romantic Reflection', '35000', 'Reflects unique love story'),
(3, 'Fairy Tale', '45000', 'Straight out from storybook');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `mid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO music (mid, name, price, descr) VALUES
(1, 'Piano and String Quartets', '20000', 'melody'),
(2, 'Bollywood', '15000', 'bollywood songs'),
(3, 'Cocktail Music', '30000', 'warm up the dance floor'),
(4, 'Traditional Music', '25000', 'Indian Traditional Music');

-- --------------------------------------------------------

--
-- Table structure for table `photoshop`
--

CREATE TABLE `photoshop` (
  `pid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photoshop`
--

INSERT INTO photoshop (pid, name, price, descr) VALUES
(1, 'Luxe Wedding Photoshop', '60000', 'Best Choice'),
(2, 'Suburbia Wedding Photoshop', '5500', 'Adds natural Tones'),
(3, 'Caramel Wedding Photoshop', '5500', 'Best for outdoors');

-- --------------------------------------------------------

--
-- Table structure for table `registration`


CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `dlname` varchar(30) NOT NULL,
  `wdate` varchar(30) NOT NULL,
  `pno` varchar(20) NOT NULL,
  `vid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `name`, `dname`, `dlname`, `wdate`, `pno`, `vid`, `mid`, `cid`, `did`, `tid`, `pid`) VALUES
(10, 'Rajesh', 'Rajesh', 'Rama', '2023-03-07', '1500', 1, 0, 0, 0, 0, 0),
(11, 'Rajesh', 'Xy', 'VC', '2023-01-28', '100', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `tid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO theme (tid, name, price, descr) VALUES
(1, 'Vintage Wedding', '85000', 'focuses on the year 1920-1960'),
(2, 'Beach Wedding', '90000', 'seashell,tropical flowers'),
(3, 'Classical Wedding', '70000', 'formal wedding with clean line'),
(4, 'Eco-Chic Wedding', '75000', 'environmetal friendly');

-- --------------------------------------------------------

--
-- Table structure for table `u_info`
--
CREATE TABLE `u_info` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pno` varchar(30) NOT NULL,
  `adds` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Dumping data for table `u_info`
--

INSERT INTO `u_info` (`uid`, `name`, `uname`, `email`, `pno`, `adds`, `psw`) VALUES
(10, 'rajesh', 'rajesh', 'rajesh@gmail.com', '9148002717', 'dbit', 'rajesh');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `vid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO venue (vid, name, price, descr) VALUES
(1, 'Nirbana Palace', '200000', 'A heritage hotel'),
(2, 'Blue Bay', '150000', 'Beach resort'),
(3, 'Umaid Palace', '250000', ' An organic Resort'),
(4, 'Royal Orchid', '150000', 'Beach resort and spa'),
(5, 'Rajhans Greens', '100000', 'Banquet hall'),
(6, 'The Pergola', '110000', 'Farm house'),
(7, 'Regenta', '350000', 'Banquet hall');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `photoshop`
--
ALTER TABLE `photoshop`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `u_info`
--
ALTER TABLE `u_info`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `decoration`
--
ALTER TABLE `decoration`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photoshop`
--
ALTER TABLE `photoshop`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `u_info`
--
ALTER TABLE `u_info`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- Add user_id column to registration table

ALTER TABLE `registration`
ADD COLUMN `uid` int(11) NOT NULL;

-- Add foreign key constraint
ALTER TABLE `registration`
ADD CONSTRAINT `fk_uid`
FOREIGN KEY (`uid`)
REFERENCES `u_info` (`uid`);





