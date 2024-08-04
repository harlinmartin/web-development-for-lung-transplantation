-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 07:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `email`, `password`, `name`) VALUES
(1, 'alan@gmail.com', 'f344470e0aa8cb2776683025106b06c6', 'newuser');

-- --------------------------------------------------------

--
-- Table structure for table `donorprofile`
--

CREATE TABLE `donorprofile` (
  `donor_id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `cause_of_death` varchar(20) NOT NULL,
  `chest_xray` varchar(20) NOT NULL,
  `tomography_scan` varchar(20) NOT NULL,
  `bronchoscopy` varchar(20) NOT NULL,
  `sputum_culture` varchar(20) NOT NULL,
  `blood_test` varchar(20) NOT NULL,
  `pf_ratio` int(10) NOT NULL,
  `cigarette_history` varchar(5) NOT NULL,
  `chest_trauma` varchar(10) NOT NULL,
  `hospital` varchar(30) NOT NULL,
  `travel_duration` varchar(11) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorprofile`
--

INSERT INTO `donorprofile` (`donor_id`, `name`, `date_of_birth`, `cause_of_death`, `chest_xray`, `tomography_scan`, `bronchoscopy`, `sputum_culture`, `blood_test`, `pf_ratio`, `cigarette_history`, `chest_trauma`, `hospital`, `travel_duration`, `image`) VALUES
(1, 'donor1', '1974-08-02', 'Heart Attack', 'output1.png', 'output2.png', 'ONAM.jpg', 'Negative', 'os1.png', 78, 'No', 'No', 'MediCare', '9 hrs', '2022-09-16.png');

-- --------------------------------------------------------

--
-- Table structure for table `patientprofile`
--

CREATE TABLE `patientprofile` (
  `patient_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `disease` varchar(30) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `lung_size` int(8) NOT NULL,
  `chest_xray` varchar(20) NOT NULL,
  `transplant_type` varchar(20) NOT NULL,
  `hospital` varchar(30) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientprofile`
--

INSERT INTO `patientprofile` (`patient_id`, `name`, `date_of_birth`, `disease`, `blood_type`, `lung_size`, `chest_xray`, `transplant_type`, `hospital`, `image`) VALUES
(1, 'patient1', '1994-11-24', 'heart disease', 'A+', 34, '2022-12-11 (5).png', 'any', 'MediCare', '2022-12-11 (5).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `donorprofile`
--
ALTER TABLE `donorprofile`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `patientprofile`
--
ALTER TABLE `patientprofile`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donorprofile`
--
ALTER TABLE `donorprofile`
  MODIFY `donor_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patientprofile`
--
ALTER TABLE `patientprofile`
  MODIFY `patient_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
