-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2025 at 11:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `enrolled_date` date DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `student_id`, `course_code`, `enrolled_date`, `grade`) VALUES
(1, 'S001', 'CS101', '2022-08-10', 'A'),
(2, 'S001', 'MATH201', '2022-08-10', 'B+'),
(3, 'S002', 'CS101', '2021-09-20', 'B'),
(4, 'S003', 'ENG102', '2023-01-15', 'A-'),
(5, 'S004', 'CS101', '2020-08-05', 'C+'),
(6, 'S005', 'MATH201', '2022-08-12', 'B'),
(7, 'S006', 'CS101', '2021-09-22', 'B+'),
(8, 'S003', 'MATH201', '2023-01-15', 'A'),
(9, 'S002', 'ENG102', '2021-09-20', 'B-'),
(10, 'S004', 'MATH201', '2020-08-05', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `join_date`) VALUES
('S001', 'Aurora Elvianne', '081234567890', '2022-08-01'),
('S002', 'Caelum Novar', '082345678901', '2021-09-15'),
('S003', 'Selene Marigold', '083456789012', '2023-01-10'),
('S004', 'Evander Thorne', '084567890123', '2020-07-20'),
('S005', 'Liora Serein', '085678901234', '2022-08-01'),
('S006', 'Orion Lysandre', '086789012345', '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_payment`
--

CREATE TABLE `tuition_payment` (
  `payment_id` int NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` enum('PAID','PENDING','FAILED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tuition_payment`
--

INSERT INTO `tuition_payment` (`payment_id`, `student_id`, `payment_date`, `amount`, `payment_method`, `status`) VALUES
(1, 'S001', '2022-08-01', '3500000.00', 'Transfer', 'PAID'),
(2, 'S002', '2021-09-10', '3500000.00', 'Cash', 'PAID'),
(3, 'S003', '2023-01-05', '3500000.00', 'E-Wallet', 'PAID'),
(4, 'S004', '2020-07-25', '3500000.00', 'Transfer', 'PAID'),
(5, 'S005', '2022-08-01', '2000000.00', 'Transfer', 'PENDING'),
(6, 'S006', '2021-09-15', '3500000.00', 'Cash', 'PAID'),
(7, 'S001', '2023-01-05', '3500000.00', 'Transfer', 'PAID'),
(8, 'S002', '2022-01-10', '3500000.00', 'Transfer', 'PAID'),
(9, 'S003', '2023-07-01', '3500000.00', 'Transfer', 'PAID'),
(10, 'S005', '2023-08-01', '1500000.00', 'Cash', 'FAILED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition_payment`
--
ALTER TABLE `tuition_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tuition_payment`
--
ALTER TABLE `tuition_payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `tuition_payment`
--
ALTER TABLE `tuition_payment`
  ADD CONSTRAINT `tuition_payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
