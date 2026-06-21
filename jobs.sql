-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 10:04 AM
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
-- Database: `healthdepartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `reports_to` varchar(100) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_requirements` text DEFAULT NULL,
  `preferable_requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `reference_no`, `salary`, `reports_to`, `short_description`, `responsibilities`, `essential_requirements`, `preferable_requirements`) VALUES
(1, 'Forensic Research Officer', 'FR701', 'AUD 78,000 - 92,000 per year', 'Senior Forensic Program Manager', 'This role supports forensic analysis projects, case-related research, and the preparation of clear scientific reports for internal teams.', 'Assist in forensic data collection and laboratory documentation.|Prepare evidence-based reports for supervisors and partner teams.|Maintain accurate records and follow health and safety procedures.', 'Degree in forensic science, biomedical science, or related field|Strong written communication and attention to detail|Ability to work with confidential information', 'Experience with laboratory information systems|Knowledge of health department procedures'),
(2, 'Public Health Research Analyst', 'PR824', 'AUD 82,000 - 96,000 per year', 'Research and Policy Lead', 'This role supports public health studies by analysing research data, preparing summaries, and helping teams turn findings into useful recommendations.', 'Review health datasets and prepare research summaries.|Support project planning, reporting, and evidence review.|Work with internal teams to improve service outcomes.', 'Degree in public health, research, statistics, or related field|Good analytical thinking and report writing skills|Ability to organise information clearly and accurately', 'Experience in health research projects|Familiarity with spreadsheet or statistical tools');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
