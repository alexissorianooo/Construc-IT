-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 02:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `files_db`
--

CREATE TABLE `files_db` (
  `files_project_id` int(11) NOT NULL,
  `files_id` int(11) NOT NULL,
  `files_activity` varchar(255) NOT NULL COMMENT 'INDICATOR FOR WHAT ACTIVITY ',
  `files_name` varchar(255) NOT NULL,
  `files_size` int(11) NOT NULL,
  `files_downloads` int(11) NOT NULL,
  `files_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files_db`
--

INSERT INTO `files_db` (`files_project_id`, `files_id`, `files_activity`, `files_name`, `files_size`, `files_downloads`, `files_path`) VALUES
(4, 29, 'FILE1', 'PLAN-1.pdf', 340782, 0, ''),
(43, 30, 'FILE1', 'PLAN-1.pdf', 340782, 3, ''),
(43, 31, 'FILE2', '2-Storey-with-Roof-Deck-Pampanga-2021-OPTIONAL.pdf', 845886, 2, ''),
(45, 58, 'FILE_PM_4', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 59, 'FILE_PM_5', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 60, 'FILE_PM_6', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 61, 'FILE_PM_7', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 64, 'FILE_PM_9', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 65, 'FILE_PM_10', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 66, 'FILE_PM_8', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 67, 'FILE_PM_11', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 68, 'FILE_PM_12', 'ICTURE.jpg', 33957, 1, '../uploads/ICTURE.jpg'),
(45, 69, 'FILE_PM_13', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 70, 'FILE_PM_14', 'ICTURE.jpg', 33957, 1, '../uploads/ICTURE.jpg'),
(45, 71, 'FILE_PM_15', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 72, 'FILE_PM_16', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 73, 'FILE_PM_17', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 75, 'FILE_PM_19', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 76, 'FILE_PM_20', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 82, 'FILE_PM_3', 'pic.jpg', 42339, 2, '../uploads/pic.jpg'),
(45, 84, 'FILE_PM_2', 'pic.jpg', 42339, 4, '../uploads/pic.jpg'),
(45, 86, 'FILE_PM_1', 'ICTURE.jpg', 33957, 2, '../uploads/ICTURE.jpg'),
(45, 92, 'FILE_PM_21', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 93, 'FILE_PM_18', 'pic.jpg', 42339, 1, '../uploads/pic.jpg'),
(45, 94, 'FILE_PM_22', 'ICTURE.jpg', 33957, 1, '../uploads/ICTURE.jpg'),
(45, 95, 'FILE_PM_23', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 96, 'FILE_PM_24', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg'),
(45, 97, 'FILE_PM_25', 'ICTURE.jpg', 33957, 0, '../uploads/ICTURE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notes_db`
--

CREATE TABLE `notes_db` (
  `notes_id` int(255) NOT NULL,
  `notes_project_id` int(255) NOT NULL,
  `notes_content1` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content2` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content3` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content4` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content5` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content6` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content7` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content8` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content9` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content10` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content11` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content12` varchar(255) NOT NULL DEFAULT 'Enter notes here..',
  `notes_content13` varchar(255) NOT NULL DEFAULT 'Enter notes here..'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes_db`
--

INSERT INTO `notes_db` (`notes_id`, `notes_project_id`, `notes_content1`, `notes_content2`, `notes_content3`, `notes_content4`, `notes_content5`, `notes_content6`, `notes_content7`, `notes_content8`, `notes_content9`, `notes_content10`, `notes_content11`, `notes_content12`, `notes_content13`) VALUES
(2, 53, 'hllo test note', 'hii', 'noting something', '', '', '', '', '', '', '', '', '', ''),
(3, 45, 'specific for you', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', '', '', '', ''),
(4, 44, 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..'),
(5, 43, 'Enter notes here..', 'Enter notes here..', 'Delayed because of you', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', '', '', '', '', ''),
(6, 54, 'hello', 'pending', 'sample', 'awit pre', 'barangay permit', 'zoning permit lodi m,edyo mahirap', 'sd', 'awit yung staff pre, masungit', 'sample 1 for sample 1', 'sample 2 dito lodi', 'sre..', 'sdre..', 'sample note for sample 5'),
(7, 55, 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', '', '', '', '', ''),
(8, 56, 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', 'Enter notes here..', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_db`
--

CREATE TABLE `project_db` (
  `project_id` int(11) NOT NULL,
  `project_status_fk` varchar(128) NOT NULL DEFAULT 'Not Complete' COMMENT 'complete or not',
  `project_status_fk_PM` varchar(128) NOT NULL DEFAULT 'Not Complete' COMMENT 'FOR PM REFERENCE',
  `project_name` varchar(128) NOT NULL,
  `project_progress_architect` int(11) NOT NULL DEFAULT 0 COMMENT 'progress bar',
  `project_progress_PM` int(11) NOT NULL,
  `project_startdate` varchar(128) NOT NULL,
  `project_deadline` varchar(128) NOT NULL COMMENT 'date',
  `project_completed` varchar(128) NOT NULL COMMENT 'THIS IS FOR ARCHITECT',
  `project_completed_PM` varchar(128) NOT NULL COMMENT 'THIS IS FOR PM',
  `project_image` varchar(128) NOT NULL,
  `project_architect` varchar(128) NOT NULL,
  `project_pm` varchar(128) NOT NULL,
  `project_pm_id` int(11) NOT NULL,
  `project_client` varchar(128) NOT NULL,
  `project_client_id` int(11) NOT NULL,
  `project_activity_Architect_1` varchar(128) NOT NULL,
  `project_status_Architect_1` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_2` varchar(128) NOT NULL,
  `project_status_Architect_2` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_3` varchar(128) NOT NULL,
  `project_status_Architect_3` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_4` varchar(128) NOT NULL,
  `project_status_Architect_4` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_5` varchar(128) NOT NULL,
  `project_status_Architect_5` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_6` varchar(128) NOT NULL,
  `project_status_Architect_6` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_7` varchar(128) NOT NULL,
  `project_status_Architect_7` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_Architect_8` varchar(128) NOT NULL,
  `project_status_Architect_8` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_additional_Architect_1` varchar(128) NOT NULL,
  `project_status_additional_Architect_1` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_additional_Architect_2` varchar(128) NOT NULL,
  `project_status_additional_Architect_2` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_additional_Architect_3` varchar(128) NOT NULL,
  `project_status_additional_Architect_3` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_additional_Architect_4` varchar(128) NOT NULL,
  `project_status_additional_Architect_4` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_additional_Architect_5` varchar(128) NOT NULL,
  `project_status_additional_Architect_5` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_1` varchar(128) NOT NULL,
  `project_status_PM_1` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_2` varchar(128) NOT NULL,
  `project_status_PM_2` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_3` varchar(128) NOT NULL,
  `project_status_PM_3` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_4` varchar(128) NOT NULL,
  `project_status_PM_4` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_5` varchar(128) NOT NULL,
  `project_status_PM_5` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_6` varchar(128) NOT NULL,
  `project_status_PM_6` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_7` varchar(128) NOT NULL,
  `project_status_PM_7` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_8` varchar(128) NOT NULL,
  `project_status_PM_8` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_9` varchar(128) NOT NULL,
  `project_status_PM_9` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_10` varchar(128) NOT NULL,
  `project_status_PM_10` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_11` varchar(128) NOT NULL,
  `project_status_PM_11` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_12` varchar(128) NOT NULL,
  `project_status_PM_12` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_13` varchar(128) NOT NULL,
  `project_status_PM_13` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_14` varchar(128) NOT NULL,
  `project_status_PM_14` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_15` varchar(128) NOT NULL,
  `project_status_PM_15` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_16` varchar(128) NOT NULL,
  `project_status_PM_16` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_17` varchar(128) NOT NULL,
  `project_status_PM_17` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_18` varchar(128) NOT NULL,
  `project_status_PM_18` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_19` varchar(128) NOT NULL,
  `project_status_PM_19` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_20` varchar(128) NOT NULL,
  `project_status_PM_20` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_21` varchar(128) NOT NULL,
  `project_status_PM_21` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_22` varchar(128) NOT NULL,
  `project_status_PM_22` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_23` varchar(128) NOT NULL,
  `project_status_PM_23` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_24` varchar(128) NOT NULL,
  `project_status_PM_24` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_25` varchar(128) NOT NULL,
  `project_status_PM_25` varchar(128) NOT NULL DEFAULT 'Pending',
  `project_activity_PM_26` varchar(128) NOT NULL,
  `project_status_PM_26` varchar(128) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_db`
--

INSERT INTO `project_db` (`project_id`, `project_status_fk`, `project_status_fk_PM`, `project_name`, `project_progress_architect`, `project_progress_PM`, `project_startdate`, `project_deadline`, `project_completed`, `project_completed_PM`, `project_image`, `project_architect`, `project_pm`, `project_pm_id`, `project_client`, `project_client_id`, `project_activity_Architect_1`, `project_status_Architect_1`, `project_activity_Architect_2`, `project_status_Architect_2`, `project_activity_Architect_3`, `project_status_Architect_3`, `project_activity_Architect_4`, `project_status_Architect_4`, `project_activity_Architect_5`, `project_status_Architect_5`, `project_activity_Architect_6`, `project_status_Architect_6`, `project_activity_Architect_7`, `project_status_Architect_7`, `project_activity_Architect_8`, `project_status_Architect_8`, `project_activity_additional_Architect_1`, `project_status_additional_Architect_1`, `project_activity_additional_Architect_2`, `project_status_additional_Architect_2`, `project_activity_additional_Architect_3`, `project_status_additional_Architect_3`, `project_activity_additional_Architect_4`, `project_status_additional_Architect_4`, `project_activity_additional_Architect_5`, `project_status_additional_Architect_5`, `project_activity_PM_1`, `project_status_PM_1`, `project_activity_PM_2`, `project_status_PM_2`, `project_activity_PM_3`, `project_status_PM_3`, `project_activity_PM_4`, `project_status_PM_4`, `project_activity_PM_5`, `project_status_PM_5`, `project_activity_PM_6`, `project_status_PM_6`, `project_activity_PM_7`, `project_status_PM_7`, `project_activity_PM_8`, `project_status_PM_8`, `project_activity_PM_9`, `project_status_PM_9`, `project_activity_PM_10`, `project_status_PM_10`, `project_activity_PM_11`, `project_status_PM_11`, `project_activity_PM_12`, `project_status_PM_12`, `project_activity_PM_13`, `project_status_PM_13`, `project_activity_PM_14`, `project_status_PM_14`, `project_activity_PM_15`, `project_status_PM_15`, `project_activity_PM_16`, `project_status_PM_16`, `project_activity_PM_17`, `project_status_PM_17`, `project_activity_PM_18`, `project_status_PM_18`, `project_activity_PM_19`, `project_status_PM_19`, `project_activity_PM_20`, `project_status_PM_20`, `project_activity_PM_21`, `project_status_PM_21`, `project_activity_PM_22`, `project_status_PM_22`, `project_activity_PM_23`, `project_status_PM_23`, `project_activity_PM_24`, `project_status_PM_24`, `project_activity_PM_25`, `project_status_PM_25`, `project_activity_PM_26`, `project_status_PM_26`) VALUES
(3, 'Not Complete', 'Complete', 'Bain Multi-Purpose Building', 0, 100, '2021-10-30', '2021-11-04', '', '2021-11-29', '', 'Henral Asymov', 'Aria Steve Averill', 48, 'Paden Emerald Bain', 4, 'Design', 'Delayed', 'Architectural Plans', 'Delayed', 'Structural Plans', 'Delayed', 'Mechanical, Electrical, Plumbing, and Fire', 'Delayed', 'Barangay Permit', 'Delayed', 'Zoning Permit', 'Delayed', 'Bureau of Fire Protection Permit', 'Delayed', 'Local Government Permit', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'Defining the points of the site', 'Completed', 'Setting up signages and borders for safety', 'Completed', 'Setting up of temporary electrical, plumbing services', 'Completed', 'Excavation', 'Completed', 'Footing and Column works', 'Completed', 'Rebars', 'Completed', 'Frameworks', 'Completed', 'Concrete pouring', 'Completed', 'Concrete curing', 'Completed', 'Backfill', 'Completed', 'Columns on floors above ground', 'Completed', 'Beams', 'Completed', 'Slabs (Flooring)', 'Completed', 'Concrete Hollow Blocks Walls', 'Completed', 'Doors and Windows', 'Completed', 'MEPF Roughing ins', 'Completed', 'Waterproofing', 'Completed', 'Roofing Works', 'Completed', 'Tiles', 'Completed', 'Painting Works', 'Completed', 'Fixtures', 'Completed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed'),
(4, 'Not Complete', 'Not Complete', 'Pasig Kabuhayan Homes', 25, 0, '2021-10-30', '2021-11-03', '', '', '', 'Christen Tricia Johnson', 'Denton Esther Miles', 49, 'Paden Emerald Bain', 4, 'Design', 'Completed', 'Architectural Plans', 'Completed', 'Structural Plans', 'Pending', 'Mechanical, Electrical, Plumbing, and Fire', 'Pending', 'Barangay Permit', 'Pending', 'Zoning Permit', 'Pending', 'Bureau of Fire Protection Permit', 'Pending', 'Local Government Permit', 'Pending', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'Defining the points of the site', 'Pending', 'Setting up signages and borders for safety', 'Pending', 'Setting up of temporary electrical, plumbing services', 'Pending', 'Excavation', 'Pending', 'Footing and Column works', 'Pending', 'Rebars', 'Pending', 'Frameworks', 'Pending', 'Concrete pouring', 'Pending', 'Concrete curing', 'Pending', 'Backfill', 'Pending', 'Columns on floors above ground', 'Pending', 'Beams', 'Pending', 'Slabs (Flooring)', 'Pending', 'Concrete Hollow Blocks Walls', 'Pending', 'Doors and Windows', 'Pending', 'MEPF Roughing ins', 'Pending', 'Waterproofing', 'Pending', 'Roofing Works', 'Pending', 'Tiles', 'Pending', 'Painting Works', 'Pending', 'Fixtures', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending'),
(20, 'Not Complete', 'Not Complete', 'Bain Multi-Purpose Building', 0, 0, '2021-11-04', '2021-11-20', '', '', '', 'Christen Tricia Johnson', 'Robert Nigel Bourne', 6, 'Paden Emerald Bain', 4, 'Design', 'Pending', 'Architectural Plans', 'Pending', 'Structural Plans', 'Pending', 'Mechanical, Electrical, Plumbing, and Fire', 'Pending', 'Barangay Permit', 'Pending', 'Zoning Permit', 'Pending', 'Bureau of Fire Protection Permit', 'Pending', 'Local Government Permit', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'Defining the points of the site', 'Pending', 'Setting up signages and borders for safety', 'Pending', 'Setting up of temporary electrical, plumbing services', 'Pending', 'Excavation', 'Pending', 'Footing and Column works', 'Pending', 'Rebars', 'Pending', 'Frameworks', 'Pending', 'Concrete pouring', 'Pending', 'Concrete curing', 'Pending', 'Backfill', 'Pending', 'Columns on floors above ground', 'Pending', 'Beams', 'Pending', 'Slabs (Flooring)', 'Pending', 'Concrete Hollow Blocks Walls', 'Pending', 'Doors and Windows', 'Pending', 'MEPF Roughing ins', 'Pending', 'Waterproofing', 'Pending', 'Roofing Works', 'Pending', 'Tiles', 'Pending', 'Painting Works', 'Pending', 'Fixtures', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending'),
(43, 'Complete', 'Complete', 'Paden Residence', 100, 100, '2021-11-04', '2021-12-03', '2021-12-15', '2021-11-04', '', 'Philomena Meadows', 'Elly Dwain Kirk', 2, 'Paden Emerald Bain', 4, 'Design', 'Completed', 'Architectural Plans', 'Completed', 'Structural Plans', 'Completed', 'Mechanical, Electrical, Plumbing, and Fire', 'Completed', 'Barangay Permit', 'Completed', 'Zoning Permit', 'Completed', 'Bureau of Fire Protection Permit', 'Completed', 'Local Government Permit', 'Completed', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'Defining the points of the site', 'Completed', 'Setting up signages and borders for safety', 'Completed', 'Setting up of temporary electrical, plumbing services', 'Completed', 'Excavation', 'Completed', 'Footing and Column works', 'Completed', 'Rebars', 'Completed', 'Frameworks', 'Completed', 'Concrete pouring', 'Completed', 'Concrete curing', 'Completed', 'Backfill', 'Completed', 'Columns on floors above ground', 'Completed', 'Beams', 'Completed', 'Slabs (Flooring)', 'Completed', 'Concrete Hollow Blocks Walls', 'Completed', 'Doors and Windows', 'Completed', 'MEPF Roughing ins', 'Completed', 'Waterproofing', 'Completed', 'Roofing Works', 'Completed', 'Tiles', 'Completed', 'Painting Works', 'Completed', 'Fixtures', 'Completed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed', 'empty', 'Delayed'),
(44, 'Not Complete', 'Not Complete', 'Paden Mansion', 0, 0, '2021-12-03', '2022-02-15', '', '', '', 'Philomena Meadows', 'Eline Chioma Lagunov', 60, 'Paden Emerald Bain', 4, 'Design', 'Pending', 'Architectural Plans', 'Pending', 'Structural Plans', 'Pending', 'Mechanical, Electrical, Plumbing, and Fire', 'Pending', 'Barangay Permit', 'Pending', 'Zoning Permit', 'Pending', 'Bureau of Fire Protection Permit', 'Pending', 'Local Government Permit', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'empty', 'Pending', 'Defining the points of the site', 'Pending', 'Setting up signages and borders for safety', 'Pending', 'Setting up of temporary electrical, plumbing services', 'Pending', 'Excavation', 'Pending', 'Footing and Column works', 'Pending', 'Rebars', 'Pending', 'Frameworks', 'Pending', 'Concrete pouring', 'Pending', 'Concrete curing', 'Pending', 'Backfill', 'Pending', 'Columns on floors above ground', 'Pending', 'Beams', 'Pending', 'Slabs (Flooring)', 'Pending', 'Concrete Hollow Blocks Walls', 'Pending', 'Doors and Windows', 'Pending', 'MEPF Roughing ins', 'Pending', 'Waterproofing', 'Pending', 'Roofing Works', 'Pending', 'Tiles', 'Pending', 'Painting Works', 'Pending', 'Fixtures', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending', '', 'Pending'),
(45, 'Not Complete', 'Not Complete', 'Cavite', 22, 96, '2022-02-15', '2022-03-11', '', '', '', 'Philomena Meadows', 'Elly Dwain Kirk', 2, 'Paden Emerald Bain', 4, 'Design', 'Pending', 'Architectural Plans', 'Completed', 'Structural Plans', 'Completed', 'Mechanical, Electrical, Plumbing, and Fire', 'Pending', 'Barangay Permit', 'Pending', 'Zoning Permit', 'Pending', 'Bureau of Fire Protection Permit', 'Pending', 'Local Government Permit', 'Pending', 'Sample acitivity', 'Pending', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'Defining the points of the site', 'Completed', 'Setting up signages and borders for safety', 'Completed', 'Setting up of temporary electrical, plumbing services', 'Completed', 'Excavation', 'Completed', 'Footing and Column works', 'Completed', 'Rebars', 'Completed', 'Frameworks', 'Completed', 'Concrete pouring', 'Completed', 'Concrete curing', 'Completed', 'Backfill', 'Completed', 'Columns on floors above ground', 'Completed', 'Beams', 'Completed', 'Slabs (Flooring)', 'Completed', 'Concrete Hollow Blocks Walls', 'Completed', 'Doors and Windows', 'Completed', 'MEPF Roughing ins', 'Completed', 'Waterproofing', 'Completed', 'Roofing Works', 'Completed', 'Tiles', 'Completed', 'Painting Works', 'Completed', 'Fixtures', 'Completed', 'empty1', 'Completed', 'empty2', 'Completed', 'empty3', 'Completed', 'empty4', 'Completed', 'empty5', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `trail_db`
--

CREATE TABLE `trail_db` (
  `trail_id` int(11) NOT NULL,
  `trail_user` varchar(128) NOT NULL,
  `trail_user_type` varchar(128) NOT NULL,
  `trail_path` varchar(128) NOT NULL,
  `trail_action` varchar(128) NOT NULL,
  `trail_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trail_db`
--

INSERT INTO `trail_db` (`trail_id`, `trail_user`, `trail_user_type`, `trail_path`, `trail_action`, `trail_date`) VALUES
(1, 'Philomena Meadows', 'architect', 'Project View', 'view project 45: Cavite', '2021-12-18 17:28:54'),
(2, 'Philomena Meadows', 'architect', 'Project View', 'view project 45: Cavite', '2021-12-18 17:47:53'),
(3, 'Philomena Meadows', 'architect', 'Project View', 'view project 43: Paden Residence', '2021-12-18 17:48:02'),
(4, 'Philomena Meadows', 'architect', 'Logout', 'Logged Out', '2021-12-18 10:48:16'),
(5, 'Elly Dwain Kirk', 'projectmanager', 'Logout', 'Logged Out', '2021-12-18 10:56:17'),
(6, 'Essence Hammet Ellery', 'client', 'Project Code', 'Entering project code.', '2021-12-18 10:56:23'),
(7, 'Essence Hammet Ellery', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:56:26'),
(8, 'Essence Hammet Ellery', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:56:26'),
(9, 'Essence Hammet Ellery', 'client', 'Project Code', 'Entering project code.', '2021-12-18 10:56:26'),
(10, 'Essence Hammet Ellery', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:56:34'),
(11, 'Essence Hammet Ellery', 'client', 'Project Code', 'Entering project code.', '2021-12-18 10:56:34'),
(12, 'Essence Hammet Ellery', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:56:49'),
(13, 'Essence Hammet Ellery', 'client', 'Project Code', 'Entering project code.', '2021-12-18 10:56:49'),
(14, 'Essence Hammet Ellery', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:56:53'),
(15, 'Essence Hammet Ellery', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:56:53'),
(16, 'Essence Hammet Ellery', 'client', 'Project Code', 'Entering project code.', '2021-12-18 10:56:53'),
(17, 'Essence Hammet Ellery', 'client', 'Logout', 'Logged Out', '2021-12-18 10:57:29'),
(18, 'Paden Emerald Bain', 'client', 'Project Code', 'Entering project code.', '2021-12-18 10:57:40'),
(19, 'Paden Emerald Bain', 'client', 'Project View', 'Viewing progress of the project', '2021-12-18 10:57:48'),
(20, 'Philomena Meadows', 'architect', 'Project View', 'view project 44: Paden Mansion', '2022-01-05 17:23:05'),
(21, 'Philomena Meadows', 'architect', 'Project View', 'view project 45: Cavite', '2022-01-05 17:23:08'),
(22, 'Philomena Meadows', 'architect', 'Logout', 'Logged Out', '2022-01-05 10:43:10'),
(23, 'Paden Emerald Bain', 'client', 'Project Code', 'Entering project code.', '2022-01-05 10:43:25'),
(24, 'Paden Emerald Bain', 'client', 'Project View', 'Viewing progress of the project', '2022-01-05 10:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `userid` int(11) NOT NULL,
  `usertype_fk` varchar(128) NOT NULL,
  `user_status` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_fullname` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `architect_assigned` varchar(128) NOT NULL,
  `project_counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`userid`, `usertype_fk`, `user_status`, `user_email`, `user_fullname`, `user_password`, `architect_assigned`, `project_counter`) VALUES
(2, 'projectmanager', 'Busy', 'EllyDwain@gmail.com', 'Elly Dwain Kirk', '$2y$10$6t7ZPqqpkMZpwT9hQLsMh.W6uC0w9a0rYjBKif78A/3A7nvpes8Bq', '', 0),
(3, 'admin', '', 'alexis.soriano27@gmail.com', 'Alexis Justin Soriano', '$2y$10$GQJs7k5NQ0PFvIECA1JM0ORK1IRfXdf6r8pMG7QExtZtmWtuU2XMO', '', 0),
(4, 'client', 'Vacant', 'PadenBain@gmail.com', 'Paden Emerald Bain', '$2y$10$2z1fAjUC9edaevNsZfBls.CRYFevsPOEZmPjbVxvllDbKqb9GYOLm', '', 5),
(5, 'client', 'Vacant', 'client2@gmail.com', 'Essence Hammet Ellery', '$2y$10$cJgHf0iOUk2W8aHssYlH8.JGRbprauudQGwOs/pCdklb7aJQ8wVC.', '', 0),
(6, 'projectmanager', 'Busy', 'projectmanager2@gmail.com', 'Robert Nigel Bourne', '$2y$10$NGYQ../UepydTH2fj39/te3DGi8McKJVfQ8ijmFmmXq8mlnBPBzLu', '', 0),
(7, 'architect', '', 'architect2@gmail.com', 'Christen Tricia Johnson', '$2y$10$WvH/hYn0NnH9bY.AGe4j4.KVoHVfLwe6A0IROhGoFFHEziA2hq8Ey', '', 0),
(43, 'architect', '', 't.bronola1427@gmail.com', 'Thomas Bronola', '$2y$10$qo4g7Om7YyHa1io1zMsHQeTvNzTRQeFWYS4Lb3nX5TKWBZDrL6mMS', '', 0),
(47, 'architect', '', 'heneral.loons01@gmail.com', 'Henral Asymov', '$2y$10$xPl3vd90q7G8hBLPDosQ.eAMV7N76h5pOSUzWyFsvmjt1JT7XjM3.', '', 0),
(48, 'projectmanager', 'Busy', 'projectmanager3@gmail.com', 'Aria Steve Averill', '$2y$10$Dqw/3K9SjhyzeYTYn5bgseYB6s1ieLvTefbygFp5RVp/Pav0PlfOm', '', 0),
(49, 'projectmanager', 'Busy', 'projectmanager4@gmail.com', 'Denton Esther Miles', '$2y$10$iQofKA5KU8YFAMud3lB8p..payU0QF2n4p1GjlGwf/hVLZ1CLHgB6', '', 0),
(51, 'client', 'Occupied', 'client3@gmail.com', 'Tate Triston Scrivens', '$2y$10$4PubQlokDUcpjjnqKWJA0.i/.q7CV/QIk9vOKffp1S86XZt3kShdq', '', 0),
(52, 'client', 'Occupied', 'client4@gmail.com', 'Dreda Skyla Eldridge', '$2y$10$OtIAyUh8vpoBNmXG4I51/eU.n5aa6t0nfLMidbveLT80h3PcVzv1C', '', 0),
(55, 'architect', '', 'architect1@gmail.com', 'Daria Edythe Parish', '$2y$10$hpN7idsT9KJaoiXzuc5jweroFuq/iz9mkFxeVc9WEqXKxJdnweqOW', '', 0),
(60, 'projectmanager', 'Busy', 'projectmanager5@gmail.com', 'Eline Chioma Lagunov', '$2y$10$yLtk5wVYdidyQIe110RMB.vFsi9Wwly5/IJR8iQpVa/WyE04VGcoa', '', 0),
(61, 'projectmanager', 'Vacant', 'projectmanager6@gmail.com', 'Engelbert Raylene Van Apeldoorn', '$2y$10$J6E1VSrj0TFNxfmJl5QgVu4j2cQjehzBrQS/hGHpfIqA2Fnm0Gu12', '', 0),
(91, 'architect', '', 'Philomena@gmail.com', 'Philomena Meadows', '$2y$10$rgW0iC6lFhf.DTpPHImeyOJM2Yk9KvQMaoqyfbajXQ6jKaH/4CBKG', '', 0),
(92, 'client', '', 'DonaCarver@gmail.com', 'Dona Carver', '$2y$10$wv9sUD8.Dyth0GJkHuVwaeJSMNEYuq82y6RU6jnbrpv1ms2uGAoQe', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files_db`
--
ALTER TABLE `files_db`
  ADD PRIMARY KEY (`files_id`);

--
-- Indexes for table `notes_db`
--
ALTER TABLE `notes_db`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `project_db`
--
ALTER TABLE `project_db`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `project_status` (`project_status_fk`);

--
-- Indexes for table `trail_db`
--
ALTER TABLE `trail_db`
  ADD PRIMARY KEY (`trail_id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files_db`
--
ALTER TABLE `files_db`
  MODIFY `files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `notes_db`
--
ALTER TABLE `notes_db`
  MODIFY `notes_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_db`
--
ALTER TABLE `project_db`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `trail_db`
--
ALTER TABLE `trail_db`
  MODIFY `trail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
