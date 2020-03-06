-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2018 at 06:18 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `Registration_no` varchar(30) NOT NULL,
  `Route_no` int(11) NOT NULL,
  `Owner_ID` varchar(20) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Latitude` varchar(30) NOT NULL,
  `Longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`Registration_no`, `Route_no`, `Owner_ID`, `Company_ID`, `Latitude`, `Longitude`) VALUES
('0ABC', 1, 'Ow1', 1, '23.744693', '90.372314'),
('1BCD ', 1, 'Ow2 ', 2, '23.742572', '90.373816'),
('3CNF ', 1, 'Ow3', 3, '23.739034', '90.387398'),
('4MLF', 1, 'Ow4', 4, '23.739152', '90.381079'),
('5DPK ', 2, 'Ow5', 5, '23.761953', '90.371927'),
('6TNM  ', 2, 'Ow6', 6, '23.774346', '90.36613');

-- --------------------------------------------------------

--
-- Table structure for table `buspass`
--

CREATE TABLE `buspass` (
  `BusPass_ID` varchar(30) NOT NULL,
  `Route_no` int(11) DEFAULT NULL,
  `Holder` varchar(20) DEFAULT NULL,
  `Balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_company`
--

CREATE TABLE `bus_company` (
  `Company_ID` int(11) NOT NULL,
  `Company_name` varchar(30) DEFAULT NULL,
  `Fare` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_company`
--

INSERT INTO `bus_company` (`Company_ID`, `Company_name`, `Fare`) VALUES
(1, 'FTCL', '0,5,5,5,5,5,5,5'),
(2, 'RAJA CITY', '0,5,5,5,5,5,5,5'),
(3, 'MOITRI', '0,5,5,5,5,5,5,5'),
(4, 'MIDWAY', '0,5,5,5,5,5,5,5'),
(5, 'PROJAPOTI', '0,5,5,5,5,5'),
(6, 'PORISTHAN', '0,5,5,5,5,5');

-- --------------------------------------------------------

--
-- Table structure for table `bus_staff`
--

CREATE TABLE `bus_staff` (
  `DATE` date NOT NULL,
  `Bus_Reg` varchar(30) NOT NULL,
  `DRIVER_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain_box`
--

CREATE TABLE `complain_box` (
  `Complain_ID` int(11) NOT NULL,
  `Bus_regNo` varchar(30) DEFAULT NULL,
  `Complain_Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_box`
--

INSERT INTO `complain_box` (`Complain_ID`, `Bus_regNo`, `Complain_Description`) VALUES
(1, '0ABC', 'Takes passenger without proper bus stoppage'),
(2, '1BCD ', 'Behave rudely towards passenger'),
(3, '5DPK ', 'Overspeed, races with other bus, waits for too long in a bus stop'),
(6, '6TNM', 'fbdhbfdhbfvvbhkjdhv'),
(7, '3CNF', 'bcfdhfbgdhfbdkf');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_ID` varchar(20) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Contact_no` varchar(15) DEFAULT NULL,
  `Employee_Count` int(11) DEFAULT NULL,
  `Route_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_ID`, `Name`, `Contact_no`, `Employee_Count`, `Route_no`) VALUES
('Ow1', 'ABC', NULL, 50, 1),
('Ow2', 'DEF', NULL, 35, 1),
('Ow3', 'GHI', NULL, 48, 1),
('Ow4', 'JKL', NULL, 47, 1),
('Ow5', 'PQR', NULL, 45, 2),
('Ow6', 'UIO', NULL, 47, 2);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Route_No` int(11) NOT NULL,
  `Bus_Count` int(11) DEFAULT NULL,
  `Bus_Names` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Route_No`, `Bus_Count`, `Bus_Names`) VALUES
(1, 4, 'FTCL,RAJA CITY,MOITRI,MIDWAY'),
(2, 2, 'PROJAPOTI,PORISTHAN');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(20) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Job_type` varchar(20) DEFAULT NULL,
  `National_ID` varchar(20) DEFAULT NULL,
  `Contact_no` varchar(15) DEFAULT NULL,
  `Started_Working` date DEFAULT NULL,
  `Previous_Job` varchar(30) DEFAULT NULL,
  `Company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Name`, `Job_type`, `National_ID`, `Contact_no`, `Started_Working`, `Previous_Job`, `Company_ID`) VALUES
('1', 'Rashed', 'Driver', '789456123', NULL, '2017-06-01', NULL, 1),
('2', 'Afridi', 'Driver', '456798123', NULL, '2017-04-21', NULL, 2),
('3', 'Kanon', 'Driver', '258963147', NULL, '2015-10-14', NULL, 3),
('4', 'Foysal', 'Driver', '145632789', NULL, '2016-02-26', NULL, 4),
('5', 'Rasel', 'Driver', '146528793', NULL, '2018-08-31', NULL, 5),
('6', 'Kakashi Hatake', 'Driver', '9871454632', NULL, '1990-06-11', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `Stop_ID` int(11) NOT NULL,
  `Stop_name` varchar(30) DEFAULT NULL,
  `Latitude` varchar(30) NOT NULL,
  `Longitude` varchar(30) NOT NULL,
  `Route_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`Stop_ID`, `Stop_name`, `Latitude`, `Longitude`, `Route_no`) VALUES
(1, 'Mohammadpur', '23.757204', '90.361744', 1),
(2, 'Shankar', '23.750663', '90.368149', 1),
(3, 'Jhigatola', '23.739081', '90.375490', 1),
(4, 'Science Lab', '23.738903', '90.383915', 1),
(5, 'Shahbag', '23.739179', '90.395862', 1),
(6, 'Paltan', '23.729984', '90.410088', 1),
(7, 'Gulisthan', '23.724980', '90.411835', 1),
(8, 'Motijheel', '23.735396', '90.416730', 1),
(9, 'Asad Gate', '23.760186', '90.372668', 2),
(10, 'Shishu Mela', '23.773095', '90.367367', 2),
(11, 'Shyamoli', '23.774914', '90.365370', 2),
(12, 'Technical', '90.365370', '90.351917', 2),
(13, 'Mirpur1', '23.798784', '90.353494', 2),
(14, 'Mirpur10', '23.807068', '90.368201', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` varchar(20) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `User_type` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  `Birthdate` date NOT NULL,
  `National_ID` varchar(20) DEFAULT NULL,
  `Student_ID` varchar(20) DEFAULT NULL,
  `BusPass_ID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Password`, `User_type`, `Name`, `email`, `Contact_No`, `Birthdate`, `National_ID`, `Student_ID`, `BusPass_ID`) VALUES
('nibir100', 'pass', 'company_representative', 'nibir', 'nibir@gmail.com', '652', '0000-00-00', '', '', ''),
('rafi100', 'rafipass', 'passenger', 'Rafiul islam', 'rafi@gmail.com', '0152145132', '1994-10-04', '427537272572', '5357337353', NULL),
('tonmoy', 'root', 'admin', 'Nilambar Halder', 'tonmoyhalder50@gmail.com', '01521331008', '1997-05-27', '654654654651', '011163031', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Registration_no`),
  ADD KEY `Route_no` (`Route_no`),
  ADD KEY `Owner_ID` (`Owner_ID`),
  ADD KEY `Company_ID` (`Company_ID`);

--
-- Indexes for table `buspass`
--
ALTER TABLE `buspass`
  ADD PRIMARY KEY (`BusPass_ID`),
  ADD KEY `Route_no` (`Route_no`),
  ADD KEY `Holder` (`Holder`);

--
-- Indexes for table `bus_company`
--
ALTER TABLE `bus_company`
  ADD PRIMARY KEY (`Company_ID`);

--
-- Indexes for table `bus_staff`
--
ALTER TABLE `bus_staff`
  ADD PRIMARY KEY (`DATE`,`Bus_Reg`,`DRIVER_ID`),
  ADD KEY `Bus_Reg` (`Bus_Reg`);

--
-- Indexes for table `complain_box`
--
ALTER TABLE `complain_box`
  ADD PRIMARY KEY (`Complain_ID`),
  ADD KEY `Bus_regNo` (`Bus_regNo`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_ID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Route_No`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `Company_ID` (`Company_ID`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`Stop_ID`),
  ADD KEY `fk_route` (`Route_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_box`
--
ALTER TABLE `complain_box`
  MODIFY `Complain_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`Route_no`) REFERENCES `route` (`Route_No`),
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`Owner_ID`) REFERENCES `owner` (`Owner_ID`),
  ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`Company_ID`) REFERENCES `bus_company` (`Company_ID`);

--
-- Constraints for table `buspass`
--
ALTER TABLE `buspass`
  ADD CONSTRAINT `buspass_ibfk_1` FOREIGN KEY (`Route_no`) REFERENCES `route` (`Route_No`),
  ADD CONSTRAINT `buspass_ibfk_2` FOREIGN KEY (`Holder`) REFERENCES `user` (`ID`);

--
-- Constraints for table `bus_staff`
--
ALTER TABLE `bus_staff`
  ADD CONSTRAINT `bus_staff_ibfk_1` FOREIGN KEY (`Bus_Reg`) REFERENCES `bus` (`Registration_no`);

--
-- Constraints for table `complain_box`
--
ALTER TABLE `complain_box`
  ADD CONSTRAINT `complain_box_ibfk_1` FOREIGN KEY (`Bus_regNo`) REFERENCES `bus` (`Registration_no`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Company_ID`) REFERENCES `bus_company` (`Company_ID`);

--
-- Constraints for table `stops`
--
ALTER TABLE `stops`
  ADD CONSTRAINT `fk_route` FOREIGN KEY (`Route_no`) REFERENCES `route` (`Route_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
