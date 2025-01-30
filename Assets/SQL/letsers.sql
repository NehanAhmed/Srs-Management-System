-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 12:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpri`
--

CREATE TABLE `cpri` (
  `CPRI_SubmissionID` int(11) NOT NULL,
  `SubmissionDate` date NOT NULL,
  `ApprovalStatus` enum('Pending','Approved','Rejected') NOT NULL,
  `Remarks` text DEFAULT NULL,
  `ProductID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cpri`
--

INSERT INTO `cpri` (`CPRI_SubmissionID`, `SubmissionDate`, `ApprovalStatus`, `Remarks`, `ProductID`) VALUES
(3, '2025-01-26', 'Approved', 'obgufwuiefg', '4751343044'),
(4, '2025-01-27', 'Pending', 'Good', '3582939483'),
(5, '2025-01-27', 'Pending', 'Good', '7020876114'),
(6, '2025-01-27', 'Approved', 'Good', '6110633644');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` char(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductType` varchar(50) NOT NULL,
  `ManufacturingDate` date NOT NULL,
  `RevisionNumber` int(11) DEFAULT 0,
  `Status` enum('Pass','Fail') NOT NULL,
  `TestingType` int(100) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductType`, `ManufacturingDate`, `RevisionNumber`, `Status`, `TestingType`, `DepartmentID`) VALUES
('3582939483', 'Cable Trays', 'Circuit', '2025-01-27', 1, '', 1, 1),
('4751343044', 'Electric Switch', 'Switch', '2025-01-26', 1, 'Pass', 1, 1),
('6110633644', 'Board', 'Board', '2025-01-27', 1, '', 1, 1),
('7020876114', 'Cable Trays', 'Circuit', '2025-01-27', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `remanufacturing`
--

CREATE TABLE `remanufacturing` (
  `RemanufacturingID` int(11) NOT NULL,
  `ProductID` char(10) NOT NULL,
  `RemanufacturingDate` date NOT NULL,
  `RevisionNumber` int(11) DEFAULT NULL,
  `Remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testdepartments`
--

CREATE TABLE `testdepartments` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) NOT NULL,
  `DepartmentLocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testdepartments`
--

INSERT INTO `testdepartments` (`DepartmentID`, `DepartmentName`, `DepartmentLocation`) VALUES
(1, 'Functional Department', 'Karachi'),
(2, 'Stress Testing', 'Lahore'),
(3, 'Safety Testing', 'Punjab'),
(4, 'Performance Testing', 'Kpk'),
(5, 'Durability Testing', 'Sindh'),
(6, 'Environmental Testing', 'DHA'),
(7, 'Compliance Testing', 'Chaman');

-- --------------------------------------------------------

--
-- Table structure for table `testers`
--

CREATE TABLE `testers` (
  `tester_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tester_name` varchar(200) NOT NULL,
  `tester_email` varchar(200) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testers`
--

INSERT INTO `testers` (`tester_id`, `product_id`, `tester_name`, `tester_email`, `start_date`) VALUES
(16, 2147483647, 'Basit', 'basit@gmail.com', '2025-01-26 17:53:35'),
(17, 2147483647, 'Basit', 'basit@gmail.com', '2025-01-27 10:50:54'),
(18, 2147483647, 'Basit', 'basit@gmail.com', '2025-01-27 10:51:20'),
(19, 2147483647, 'Basit', 'basit@gmail.com', '2025-01-27 11:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `TestingID` char(12) NOT NULL,
  `ProductID` char(10) NOT NULL,
  `TestingType` varchar(50) NOT NULL,
  `TestingDate` date NOT NULL,
  `TesterID` int(11) NOT NULL,
  `TestingStatus` enum('Pass','Fail') NOT NULL,
  `Remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`TestingID`, `ProductID`, `TestingType`, `TestingDate`, `TesterID`, `TestingStatus`, `Remarks`) VALUES
('637214230067', '4751343044', 'Functional Testing', '2025-01-26', 16, 'Pass', 'obgufwuiefg'),
('705279727517', '3582939483', 'Functional Testing', '2025-01-27', 17, 'Pass', 'Good'),
('912644448771', '6110633644', 'Functional Testing', '2025-01-27', 19, 'Pass', 'Good'),
('933932336934', '7020876114', 'Functional Testing', '2025-01-27', 18, 'Pass', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `testingtype`
--

CREATE TABLE `testingtype` (
  `id` int(11) NOT NULL,
  `TestingType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testingtype`
--

INSERT INTO `testingtype` (`id`, `TestingType`) VALUES
(1, 'Functional Testing'),
(2, 'Stress Testing'),
(3, 'Safety Testing'),
(4, 'Performance Testing'),
(5, 'Durability Testing'),
(6, 'Environmental Testing'),
(7, 'Compliance Testing'),
(8, 'abc '),
(9, 'abc ');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Tester'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `profileImg` varchar(1000) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `PasswordHash`, `RoleID`, `profileImg`, `dep_id`) VALUES
(8, 'Admin', 'admin@gmail.com', '$2y$10$Oo9kPyvNuDZndcGkvTlAz.o62PDuq9ICkj0DhEhJhJCQEN2HkNQIm', 1, 'otnAey.png', 0),
(9, 'Tester', 'tester@gmail.com', '$2y$10$J7pe.TZ.vdJzr/zvZOI94.veT7.hD85kAgqF6j7YxP6niU3NW7uta', 2, 'otnAey.png', 1),
(10, 'Basit', 'basit@gmail.com', '$2y$10$hOhoFnmTR.Jz2nVwTDb1OuZ2Kr37jl49Av7MQ6AYZ74JPdeFymgiq', 2, 'otnAey.png', 1),
(11, 'Manager', 'manager@gmail.com', '$2y$10$vTN6jWfN6PqpYmP.IZOePuDn7pKX0xmPcREAhw2clVgAq1g2cRgUe', 3, 'ss.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `WorkflowID` int(11) NOT NULL,
  `ProductID` char(10) NOT NULL,
  `CurrentStage` enum('Testing','Re-manufacturing','CPRI') NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `Status` enum('In Progress','Completed','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`WorkflowID`, `ProductID`, `CurrentStage`, `StartDate`, `EndDate`, `Status`) VALUES
(1, '7020876114', '', '2025-01-27', '2025-01-27', 'In Progress'),
(2, '6110633644', 'CPRI', '2025-01-27', '2025-01-27', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpri`
--
ALTER TABLE `cpri`
  ADD PRIMARY KEY (`CPRI_SubmissionID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_t_type` (`DepartmentID`),
  ADD KEY `FK_testing_type` (`TestingType`);

--
-- Indexes for table `remanufacturing`
--
ALTER TABLE `remanufacturing`
  ADD PRIMARY KEY (`RemanufacturingID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `testdepartments`
--
ALTER TABLE `testdepartments`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `testers`
--
ALTER TABLE `testers`
  ADD PRIMARY KEY (`tester_id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`TestingID`),
  ADD KEY `testing_ibfk_1` (`ProductID`),
  ADD KEY `testing_ibfk_2` (`TesterID`);

--
-- Indexes for table `testingtype`
--
ALTER TABLE `testingtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`WorkflowID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpri`
--
ALTER TABLE `cpri`
  MODIFY `CPRI_SubmissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `remanufacturing`
--
ALTER TABLE `remanufacturing`
  MODIFY `RemanufacturingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testdepartments`
--
ALTER TABLE `testdepartments`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testers`
--
ALTER TABLE `testers`
  MODIFY `tester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testingtype`
--
ALTER TABLE `testingtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `WorkflowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpri`
--
ALTER TABLE `cpri`
  ADD CONSTRAINT `cpri_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_t_type` FOREIGN KEY (`DepartmentID`) REFERENCES `testingtype` (`id`),
  ADD CONSTRAINT `FK_testing_type` FOREIGN KEY (`TestingType`) REFERENCES `testingtype` (`id`);

--
-- Constraints for table `remanufacturing`
--
ALTER TABLE `remanufacturing`
  ADD CONSTRAINT `remanufacturing_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `testing`
--
ALTER TABLE `testing`
  ADD CONSTRAINT `testing_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testing_ibfk_2` FOREIGN KEY (`TesterID`) REFERENCES `testers` (`tester_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`RoleID`);

--
-- Constraints for table `workflow`
--
ALTER TABLE `workflow`
  ADD CONSTRAINT `workflow_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
