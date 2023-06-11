-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 08:55 AM
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
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `imagedata`
--

CREATE TABLE `imagedata` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imagedata`
--

INSERT INTO `imagedata` (`id`, `image`) VALUES
(1, '63066169_1674894173.jpeg'),
(2, '1978568932_1674894217.jpg'),
(3, '334535708_1674895068.jpeg'),
(4, '614652459_1674895101.jpeg'),
(5, '637589965_1674895155.jpeg'),
(6, '1305998049_1674895156.jpeg'),
(7, '/1940067172_1674895246.jpeg'),
(8, '67500250_1674895282.jpeg'),
(9, '991177474_1674897759.JPEG'),
(10, '1632488308_1674897797.JPEG'),
(11, '580989320_1674897831.JPEG'),
(12, '528413503_1674899038.JPG'),
(13, '480278545_1674899093.JPG'),
(14, '913441690_1674899131jpeg'),
(15, '1793483565_1674918364.jpeg'),
(16, '257609538_1674918365.jpeg'),
(17, '808470473_1674918895.jpeg'),
(18, '216716566_1674918954.jpeg'),
(19, '632089737_1674918972.jpeg'),
(20, '28338981_1674918984.jpeg'),
(21, '62008596_1674921595.jpeg'),
(22, '1420729506_1674921713.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `lto_account`
--

CREATE TABLE `lto_account` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Usertype` varchar(255) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lto_account`
--

INSERT INTO `lto_account` (`Id`, `Name`, `Password`, `Usertype`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `lto_report`
--

CREATE TABLE `lto_report` (
  `ID` int(11) NOT NULL,
  `Report_ID` int(30) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Vehicle_Violation` varchar(255) NOT NULL,
  `Vehicle_Plate_No` varchar(255) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `Vehicle_Color` varchar(255) NOT NULL,
  `Report_Image` varchar(255) NOT NULL,
  `Report_Video` text NOT NULL,
  `Remark` text NOT NULL,
  `Date_Report` datetime DEFAULT current_timestamp(),
  `Status` varchar(50) DEFAULT 'PENDING',
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lto_report`
--

INSERT INTO `lto_report` (`ID`, `Report_ID`, `Fullname`, `Vehicle_Violation`, `Vehicle_Plate_No`, `Vehicle_Type`, `Vehicle_Color`, `Report_Image`, `Report_Video`, `Remark`, `Date_Report`, `Status`, `Active`) VALUES
(1, 0, '', 'Driving Without A  License', 'EE11', 'Micro', 'Green', '1310361181_1683461723.jpeg', 'video_6457965bc8f63.mp4', 'Testing', '2023-05-07 20:15:23', 'PENDING', 0),
(2, 0, '', 'Vehicle Registration Violations', 'RR11', 'Sedan', 'Orange', '65779780_1683461778.jpeg', 'video_645796924dac8.mp4', 'Testing', '2023-05-07 20:16:18', 'PENDING', 0),
(3, 0, '', 'Driving With Illegal, Damaged or Substandard Parts And Accessories', 'QWE1', 'Scooter', 'Gold', '814483354_1683461860.jpeg', 'video_645796e477bd6.mp4', 'Testing', '2023-05-07 20:17:40', 'PENDING', 0),
(4, 0, '', 'Beating The Red Light', 'FGH123', 'Motorcycle', 'Purple', '1807828381_1683465232.jpeg', 'video_6457a410daa48.mp4', 'Testing', '2023-05-07 21:13:52', 'PENDING', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lto_userlist`
--

CREATE TABLE `lto_userlist` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Confirm_Password` varchar(255) NOT NULL,
  `ApiKey` text NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lto_userlist`
--

INSERT INTO `lto_userlist` (`ID`, `Fullname`, `Email`, `Username`, `Password`, `Confirm_Password`, `ApiKey`, `Active`) VALUES
(1, 'Rovic Villanueva', 'rovicvillanueva15@gmail.com', 'Final', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '', 0),
(2, 'a', 'a@gmail.com', 'a', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(3, 'Jayvee Chavez', 'jayvee@gmail.com', 'Mabangis', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '', 0),
(4, 'i', 'I', 'I', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(5, 'o', 'o', 'o', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(6, 'y', 'y', 'y', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(7, 'Lenard Vico', 'lenard@gmail.com', 'lenard', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(9, 'Francis', 'francis@gmail.com', 'francis', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(10, 'Rom Dayto', 'romdayto@gmail.com', 'Roman27', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '6aabfe456f596f3f439de6364e45ce7864c9023d7a99c2', 0),
(11, 'jed brian', 'jed@gmail.com', 'jed', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(12, 'mm', ' mm@gmail.com', 'mm ', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(14, 's', ' s', 's ', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(15, 'qw', ' qw', 'qw ', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 0),
(16, 'Testing', ' test@gmail.com', 'Testing', '11', '11', '', 0),
(17, 'Eden Noreen', ' eden@ggmail.com', 'Eden', '698d51a19d8a121ce581499d7b701668', '698d51a19d8a121ce581499d7b701668', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `UserID` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Middlename` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` text NOT NULL,
  `Contact` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `UserType` varchar(45) NOT NULL DEFAULT 'User',
  `vercode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`UserID`, `Firstname`, `Middlename`, `Lastname`, `Birthdate`, `Address`, `Contact`, `Email`, `Password`, `UserType`, `vercode`) VALUES
(27, 'Admin', 'Admin', 'Admin', '1997-01-10', 'Philippines', '09132165123', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `UserID` int(11) NOT NULL,
  `DriverName` varchar(255) NOT NULL,
  `IncidentLocation` varchar(255) NOT NULL,
  `VehicleTypeID` varchar(255) NOT NULL,
  `PlateNo` varchar(255) NOT NULL,
  `ViolationID` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `ReportImage` varchar(255) NOT NULL,
  `DateReported` datetime NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'SOLVED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagedata`
--
ALTER TABLE `imagedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lto_account`
--
ALTER TABLE `lto_account`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lto_report`
--
ALTER TABLE `lto_report`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lto_userlist`
--
ALTER TABLE `lto_userlist`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imagedata`
--
ALTER TABLE `imagedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lto_account`
--
ALTER TABLE `lto_account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lto_report`
--
ALTER TABLE `lto_report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lto_userlist`
--
ALTER TABLE `lto_userlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_report`
--
ALTER TABLE `user_report`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
