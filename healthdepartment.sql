-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 12:47 PM
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
-- Table structure for table `about_members`
--

CREATE TABLE `about_members` (
  `member_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `favourite_language` varchar(50) DEFAULT NULL,
  `project1_contribution` text DEFAULT NULL,
  `project2_contribution` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_members`
--

INSERT INTO `about_members` (`member_id`, `student_name`, `student_number`, `favourite_language`, `project1_contribution`, `project2_contribution`) VALUES
(1, 'Arkar Min', '106399241', 'Chinese', 'Created about page structure and part of CSS.', 'Created about table, updated about.php, and added manage page related tables and files.'),
(2, 'Dylan Yang Cheng Jun', '106417716', 'English', 'Prepared job descriptions and part of Jira management.', 'Created job table and job.php page.'),
(3, 'Chan Myae Oo', '106399209', 'Japanese', 'Designed application page, part of Jira management, and final review.', 'Created the EOI table and implemented record validation.'),
(4, 'Min Myat Thura', '106399267', 'Burmese (Myanmar)', 'Designed home page, accessibility checks, and part of CSS.', 'Converted HTML pages to PHP, modified css and implemented header/footer includes, setting.php.');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_reference` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` varchar(10) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `skills` text DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_reference`, `first_name`, `last_name`, `dob`, `gender`, `street`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `other_skills`, `status`, `position`) VALUES
(3, 'FR701', 'Chan', 'Myae', '2006-11-12', 'male', 'Jalan SS15/8 , My Place Apartment, Suban', 'Subang Jaya', 'VIC', '4750', 'alvingrammix7@gmail.com', '01139465715', 'research', 'gay', 'New', 'forensic_analyst'),
(4, 'FR701', 'ARKAR', 'MIN', '2005-05-03', 'male', '43/8, Thiri Mingalar Street,', 'Taunggyi', 'NSW', '0610', 'arkar073105min@gmail.com', '01140658064', 'laboratory', 'jj', 'New', 'forensic_analyst'),
(5, 'PH824', 'ARKAR', 'MIN', '2005-05-03', 'male', '43/8, Thiri Mingalar Street,', 'Taunggyi', 'NSW', '0610', 'arkar073105min@gmail.com', '01140658064', 'data', 'T', 'New', 'lab_technician');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_members`
--
ALTER TABLE `about_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_members`
--
ALTER TABLE `about_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
