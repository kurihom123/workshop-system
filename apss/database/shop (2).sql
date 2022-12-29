-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 07:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_t`
--

CREATE TABLE `activity_t` (
  `ActivityID` int(11) NOT NULL,
  `ActivityCode` varchar(30) DEFAULT NULL,
  `ActivityName` varchar(30) DEFAULT NULL,
  `ActivityExplanation` longtext DEFAULT NULL,
  `Project_ProjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendancereport_t`
--

CREATE TABLE `attendancereport_t` (
  `AttendanceReportID` int(11) NOT NULL,
  `FirstName` varchar(23) DEFAULT NULL,
  `SecondName` varchar(30) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(25) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Project_ProjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages_t`
--

CREATE TABLE `messages_t` (
  `MessageID` int(11) NOT NULL,
  `SenderNmae` varchar(34) DEFAULT NULL,
  `ReceiverName` varchar(200) DEFAULT NULL,
  `UserPosition` varchar(44) DEFAULT NULL,
  `MessageText` longtext DEFAULT NULL,
  `TimeSent` varchar(50) DEFAULT NULL,
  `User_UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_t`
--

CREATE TABLE `project_t` (
  `ProjectID` int(11) NOT NULL,
  `ProjectCode` varchar(50) DEFAULT NULL,
  `ProjectName` varchar(50) DEFAULT NULL,
  `User_UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userprojectcode_t`
--

CREATE TABLE `userprojectcode_t` (
  `UserProjectCodeID` int(11) NOT NULL,
  `UserProjectCodeName` varchar(50) DEFAULT NULL,
  `User_UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `id` int(11) NOT NULL,
  `name` enum('coordinator','leader','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'coordinator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `name`) VALUES
(1, 'coordinator'),
(2, 'leader'),
(3, 'member'),
(4, 'coordinator'),
(5, 'coordinator'),
(6, 'coordinator'),
(7, 'coordinator'),
(8, 'coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `user_t`
--

CREATE TABLE `user_t` (
  `firstName` varchar(45) NOT NULL,
  `secondName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `UserID` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `UserDOB` date DEFAULT NULL,
  `UserPassword` varchar(200) DEFAULT NULL,
  `UserEmail` varchar(45) DEFAULT NULL,
  `UserGender` varchar(49) DEFAULT NULL,
  `UserMobileNo` varchar(25) DEFAULT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_t`
--

INSERT INTO `user_t` (`firstName`, `secondName`, `lastName`, `UserID`, `role_id`, `UserName`, `UserDOB`, `UserPassword`, `UserEmail`, `UserGender`, `UserMobileNo`, `photo`) VALUES
('EMANUEL', 'KABAPA', 'JOS', 21, 4, 'kabapa070', '2022-09-21', '202cb962ac59075b964b07152d234b70', 'luggiestar@gmail.com', 'Male', '0711772070', '1493-Capture.PNG'),
('agape', 'KABAPA', 'JOS', 22, 5, 'kabapa070', '2022-09-21', 'd41d8cd98f00b204e9800998ecf8427e', 'luggiestar@gmail.com', 'Female', '0711772070', '2994-'),
('agape', 'justa', 'yasinta', 23, 6, 'kabapa070', '2022-09-21', 'd41d8cd98f00b204e9800998ecf8427e', 'luggiestar@gmail.com', 'Female', '0711772070', '9732-'),
('agape', 'KABAPA', 'Jjj', 24, 7, 'kabapa070', '2022-09-21', 'd41d8cd98f00b204e9800998ecf8427e', 'luggiestar@gmail.com', 'Male', '0711772070', '6185-'),
('matiko', 'KABAPA', 'JOS', 25, 8, 'kabapa070', '2022-09-30', 'd41d8cd98f00b204e9800998ecf8427e', 'luggiestar@gmail.com', 'Female', '0711772075', '9324-');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_t`
--

CREATE TABLE `workshop_t` (
  `WorkshopID` int(11) NOT NULL,
  `WorkshopCode` varchar(50) DEFAULT NULL,
  `WorkshopName` longtext DEFAULT NULL,
  `WorkshopTheme` longtext DEFAULT NULL,
  `WorkshopStartTime` date DEFAULT NULL,
  `WorkshopEndTime` date DEFAULT NULL,
  `WorkshopFacilitator` varchar(50) DEFAULT NULL,
  `WorkshopParticipants` varchar(50) DEFAULT NULL,
  `WorkshopCost` varchar(50) DEFAULT NULL,
  `WorkshopCategory` varchar(50) DEFAULT NULL,
  `WorkshopStoreDocument` varchar(20) DEFAULT NULL,
  `WorkshopLocation` varchar(50) DEFAULT NULL,
  `Activity_ActivityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_t`
--
ALTER TABLE `activity_t`
  ADD PRIMARY KEY (`ActivityID`),
  ADD KEY ` project activity` (`Project_ProjectID`);

--
-- Indexes for table `attendancereport_t`
--
ALTER TABLE `attendancereport_t`
  ADD PRIMARY KEY (`AttendanceReportID`),
  ADD KEY `attendence project` (`Project_ProjectID`);

--
-- Indexes for table `messages_t`
--
ALTER TABLE `messages_t`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `user message` (`User_UserID`);

--
-- Indexes for table `project_t`
--
ALTER TABLE `project_t`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `user project` (`User_UserID`);

--
-- Indexes for table `userprojectcode_t`
--
ALTER TABLE `userprojectcode_t`
  ADD PRIMARY KEY (`UserProjectCodeID`),
  ADD KEY `user projectcode` (`User_UserID`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_t`
--
ALTER TABLE `user_t`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `workshop_t`
--
ALTER TABLE `workshop_t`
  ADD PRIMARY KEY (`WorkshopID`),
  ADD KEY `workshop activity` (`Activity_ActivityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_t`
--
ALTER TABLE `activity_t`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendancereport_t`
--
ALTER TABLE `attendancereport_t`
  MODIFY `AttendanceReportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages_t`
--
ALTER TABLE `messages_t`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_t`
--
ALTER TABLE `project_t`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprojectcode_t`
--
ALTER TABLE `userprojectcode_t`
  MODIFY `UserProjectCodeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_t`
--
ALTER TABLE `user_t`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `workshop_t`
--
ALTER TABLE `workshop_t`
  MODIFY `WorkshopID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_t`
--
ALTER TABLE `activity_t`
  ADD CONSTRAINT ` project activity` FOREIGN KEY (`Project_ProjectID`) REFERENCES `project_t` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendancereport_t`
--
ALTER TABLE `attendancereport_t`
  ADD CONSTRAINT `attendence project` FOREIGN KEY (`Project_ProjectID`) REFERENCES `project_t` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages_t`
--
ALTER TABLE `messages_t`
  ADD CONSTRAINT `user message` FOREIGN KEY (`User_UserID`) REFERENCES `user_t` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_t`
--
ALTER TABLE `project_t`
  ADD CONSTRAINT `user project` FOREIGN KEY (`User_UserID`) REFERENCES `user_t` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userprojectcode_t`
--
ALTER TABLE `userprojectcode_t`
  ADD CONSTRAINT `user projectcode` FOREIGN KEY (`User_UserID`) REFERENCES `user_t` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_t`
--
ALTER TABLE `user_t`
  ADD CONSTRAINT `user_t_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `userroles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshop_t`
--
ALTER TABLE `workshop_t`
  ADD CONSTRAINT `workshop activity` FOREIGN KEY (`Activity_ActivityID`) REFERENCES `activity_t` (`ActivityID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
