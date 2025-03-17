-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 06:36 AM
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
-- Database: `apna_design`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `activity_title` text DEFAULT NULL,
  `org_name` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `res_id`, `activity_title`, `org_name`, `title`, `date`, `description`) VALUES
(21, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(22, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(23, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(24, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(25, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(26, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(27, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(28, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(29, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),('),
(30, '10', '5', 'ACTIVITIES', '),(', '),(', '),(', '),(');

-- --------------------------------------------------------

--
-- Table structure for table `apna_user`
--

CREATE TABLE `apna_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_provider_id` varchar(255) DEFAULT NULL,
  `auth_provider_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apna_user`
--

INSERT INTO `apna_user` (`id`, `name`, `email`, `mobile`, `password`, `auth_provider_id`, `auth_provider_name`, `logo`, `linkedin`, `github`, `website`, `address`, `created_at`) VALUES
(10, 'Iqbal Shah', 'iqbalshah9368@gmail.com', '6398595433', '$2y$10$iYKeRSPfw8QhSzrlDGVx3Obmre8eBQupZrCvcvp/HiYrnlkHWCg/i', NULL, 'email', NULL, NULL, NULL, NULL, NULL, '2025-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `award_title` text DEFAULT NULL,
  `award_name` text DEFAULT NULL,
  `date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `user_id`, `res_id`, `award_title`, `award_name`, `date`) VALUES
(21, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(22, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(23, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(24, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(25, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(26, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(27, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(28, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(29, '10', '5', 'ACHIEVEMENTS', '),(', '),('),
(30, '10', '5', 'ACHIEVEMENTS', '),(', '),(');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `certificate_title` text DEFAULT NULL,
  `cert_name` text DEFAULT NULL,
  `date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `res_id`, `certificate_title`, `cert_name`, `date`) VALUES
(30, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(31, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(32, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(33, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(34, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(35, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(36, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(37, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(38, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),('),
(39, '10', '5', 'TRANINGS AND CERTIFICATES', '),(', '),(');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `education_title` text DEFAULT NULL,
  `course_name` text DEFAULT NULL,
  `college_name` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `res_id`, `education_title`, `course_name`, `college_name`, `date`, `address`, `description`) VALUES
(43, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(44, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(45, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(46, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(47, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(48, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(49, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(50, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(51, '10', '5', 'Education', 'BCA),(', 'RBS),(', '),(', '),(', '),('),
(52, '10', '5', 'EDUCATION', '),(', '),(', '),(', '),(', '),(');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `interest_title` text DEFAULT NULL,
  `interest` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `user_id`, `res_id`, `interest_title`, `interest`) VALUES
(30, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(31, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(32, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(33, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(34, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(35, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(36, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(37, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(38, '10', '5', 'INTEREST', 'HTML),(JS),(CSS),('),
(39, '10', '5', 'INTEREST', '),(');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `language_title` text DEFAULT NULL,
  `language` text DEFAULT NULL,
  `progress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `user_id`, `res_id`, `language_title`, `language`, `progress`) VALUES
(30, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(31, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(32, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(33, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(34, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(35, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(36, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(37, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(38, '10', '5', 'LANGUAGE', 'HINDI),(', ''),
(39, '10', '5', 'LANGUAGE', '),(', '');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `res_name` varchar(255) DEFAULT NULL,
  `res_img` varchar(255) DEFAULT NULL,
  `res_layout` varchar(255) DEFAULT NULL,
  `def_block_positions` varchar(255) DEFAULT NULL,
  `def_hide_block_positions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `res_name`, `res_img`, `res_layout`, `def_block_positions`, `def_hide_block_positions`) VALUES
(4, 'resume1.php', 'resume1.jpeg', 'resume1-layout.php', '1,2,3,4,5,6,7,8,9', NULL),
(5, 'resume2.php', 'resume2.jpeg', 'resume2-layout.php', '1,2,3,4,5,6,7,8,9', NULL),
(6, 'resume3.php', 'resume3.jpeg', 'resume3-layout.php', '1,2,3,4,5,6,7,8,9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `skill_title` text DEFAULT NULL,
  `skill` text DEFAULT NULL,
  `progress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `res_id`, `skill_title`, `skill`, `progress`) VALUES
(30, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(31, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(32, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(33, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(34, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(35, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(36, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(37, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(38, '10', '5', 'SKILLS AND COMPETENCIES', 'HTML),(', ''),
(39, '10', '5', 'SKILLS AND COMPETENCIES', '),(', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_references`
--

CREATE TABLE `user_references` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `reference_title` text DEFAULT NULL,
  `reference` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_references`
--

INSERT INTO `user_references` (`id`, `user_id`, `res_id`, `reference_title`, `reference`) VALUES
(21, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(22, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(23, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(24, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(25, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(26, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(27, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(28, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(29, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),('),
(30, '10', '5', 'REFERENCE', '500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.),(');

-- --------------------------------------------------------

--
-- Table structure for table `user_resumes`
--

CREATE TABLE `user_resumes` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `resume_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `curr_position` text DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `work_exp` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `award` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `block_positions` varchar(255) DEFAULT NULL,
  `hide_block_positions` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'person.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_resumes`
--

INSERT INTO `user_resumes` (`id`, `user_id`, `resume_id`, `name`, `curr_position`, `objective`, `gender`, `website`, `email`, `mobile`, `address`, `linkedin`, `github`, `skill`, `work_exp`, `education`, `activity`, `certificate`, `award`, `interest`, `language`, `reference`, `block_positions`, `hide_block_positions`, `created_at`, `image`) VALUES
(40, '10', '5', 'Iqbal SHah', '', '', '', '', 'iqbalshah9368@gmail.com', '6398595433', 'Agra', '', '', '30', '43', '43', '21', '30', '21', '30', '30', '21', '1,2,3,4,5,6,7,8,9', '', '2025-03-17', 'person.png');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `res_id` varchar(255) DEFAULT NULL,
  `work_exp_title` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `company` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `user_id`, `res_id`, `work_exp_title`, `position`, `company`, `date`, `address`, `description`) VALUES
(43, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(44, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(45, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(46, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(47, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(48, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(49, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(50, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(51, '10', '5', 'WORK EXPERIENCE', 'Software Engineer),(', '),(', '),(', '),(', '),('),
(52, '10', '5', 'WORK EXPERIENCE', '),(', '),(', '),(', '),(', '),(');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apna_user`
--
ALTER TABLE `apna_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_references`
--
ALTER TABLE `user_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_resumes`
--
ALTER TABLE `user_resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `apna_user`
--
ALTER TABLE `apna_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_references`
--
ALTER TABLE `user_references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_resumes`
--
ALTER TABLE `user_resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
