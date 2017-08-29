-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 03:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `capacity`, `room_id`) VALUES
(3, 'VII A', 36, 1),
(4, 'VII B', 36, 12),
(5, 'VII C', 36, 3),
(9, 'IX B', 36, 15),
(10, 'IX F', 36, 2),
(14, 'VII D', 36, 5),
(15, 'IX A', 36, 14),
(16, 'IX C', 36, 8),
(18, 'VIII D', 36, 17),
(19, 'VII E', 36, 11),
(20, 'IX D', 36, 9),
(21, 'VII F', 36, 10),
(22, 'IX E', 36, 7),
(26, 'IX G', 36, 22),
(27, 'VII H', 36, 21),
(31, 'IA', 45, 16);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `lesson_id`, `class_id`, `year_id`, `grade`, `status`, `created_at`, `updated_at`) VALUES
(31, 11, 46, 4, 1, 90, 0, '2016-11-09 08:02:38', '2016-11-09 08:02:38'),
(32, 55, 44, 31, 1, 80, 0, '2016-11-13 07:46:52', '2016-11-13 07:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(39, 'Chemistry', '2016-11-06 20:33:47', '2016-11-10 20:09:05'),
(40, 'Bahasa Indonesia', '2016-11-06 20:33:53', '2016-11-06 20:33:53'),
(41, 'Mandarin', '2016-11-06 20:33:57', '2016-11-08 20:10:48'),
(42, 'English', '2016-11-06 20:34:05', '2016-11-06 20:34:05'),
(43, 'Physics', '2016-11-06 20:34:17', '2016-11-06 20:34:17'),
(44, 'Mathematic', '2016-11-06 20:34:20', '2016-11-13 07:41:14'),
(46, 'Algorithm', '2016-11-06 20:34:48', '2016-11-06 20:34:48'),
(47, 'Geography', '2016-11-06 21:56:35', '2016-11-06 21:56:35'),
(48, 'Computer Network', '2016-11-06 21:56:52', '2016-11-06 21:56:52'),
(49, 'Software Engineering', '2016-11-06 21:57:37', '2016-11-06 21:57:37'),
(51, 'Sport', '2016-11-06 21:58:20', '2016-11-06 21:58:20'),
(52, 'Electronic', '2016-11-06 21:58:31', '2016-11-06 21:58:31'),
(53, 'Bahasa Melayu', '2016-11-09 06:26:12', '2016-11-09 06:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_10_25_070209_create_lessons_table', 1),
('2016_10_25_075958_create_lessons2_table', 2),
('2016_10_25_085016_create_teachers_table', 3),
('2014_10_12_000000_create_users_table', 4),
('2014_10_12_100000_create_password_resets_table', 4),
('2016_10_27_063538_create_student_model', 5),
('2016_10_28_034425_makeClassmodel', 6),
('2016_10_28_083423_create_rooms_table', 7),
('2016_10_31_082739_create_years_table', 8),
('2016_11_01_084626_create_table_schedule', 9),
('2016_11_02_022534_insert_activeColumn_to_year', 10),
('2016_11_02_094508_create_table_grades', 11),
('2016_11_02_095120_add_column_classId_to_grade', 12),
('2016_11_03_040940_drop_column_class_from_grade', 13),
('2016_11_03_045111_add_column_class_again_to_grade', 14),
('2016_11_07_093345_create_table_teacher_presence', 15),
('2016_11_08_031216_create_table_student_presece', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(5, 'A4'),
(7, 'B2'),
(8, 'B4'),
(9, 'D4'),
(10, 'D3'),
(11, 'D9'),
(12, 'C4'),
(13, 'C2'),
(14, 'D10'),
(15, 'F1'),
(16, 'F2'),
(17, 'F3'),
(20, 'B1'),
(21, 'D1'),
(22, 'F4'),
(23, 'F5'),
(24, 'B6'),
(26, 'A5');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `lesson_id`, `class_id`, `teacher_id`, `year_id`, `day`, `start`, `finish`) VALUES
(44, 16, 24, 2, 1, 'wednesday', '02:01:00', '14:00:00'),
(45, 16, 23, 25, 1, 'monday', '01:01:00', '01:01:00'),
(46, 46, 28, 25, 1, 'tuesday', '15:00:00', '14:00:00'),
(47, 40, 28, 29, 1, 'tuesday', '02:00:00', '02:00:00'),
(49, 43, 28, 18, 1, 'wednesday', '03:00:00', '13:00:00'),
(51, 39, 28, 18, 1, 'tuesday', '13:00:00', '01:00:00'),
(52, 44, 28, 25, 1, 'thursday', '02:01:00', '02:00:00'),
(53, 47, 28, 30, 1, 'friday', '13:01:00', '01:02:00'),
(54, 52, 28, 16, 1, 'wednesday', '14:01:00', '13:00:00'),
(55, 49, 28, 3, 1, 'friday', '14:00:00', '01:01:00'),
(56, 48, 28, 23, 1, 'friday', '14:00:00', '02:00:00'),
(57, 40, 28, 24, 1, 'wednesday', '05:00:00', '01:00:00'),
(58, 42, 28, 15, 1, 'wednesday', '01:01:00', '13:00:00'),
(59, 51, 28, 19, 1, 'wednesday', '14:00:00', '01:00:00'),
(60, 42, 28, 25, 1, 'thursday', '14:00:00', '02:00:00'),
(61, 46, 21, 25, 1, 'monday', '13:01:00', '02:00:00'),
(62, 46, 31, 25, 1, 'monday', '00:12:00', '23:21:00'),
(64, 48, 31, 25, 1, 'tuesday', '01:00:00', '01:01:00'),
(65, 39, 31, 23, 1, 'tuesday', '02:00:00', '13:00:00'),
(66, 43, 31, 25, 1, 'monday', '13:00:00', '13:00:00'),
(67, 51, 31, 27, 1, 'wednesday', '03:01:00', '01:01:00'),
(68, 52, 31, 1, 1, 'wednesday', '02:00:00', '01:00:00'),
(69, 47, 31, 25, 1, 'wednesday', '14:00:00', '07:00:00'),
(70, 43, 31, 10, 1, 'thursday', '12:00:00', '14:00:00'),
(71, 46, 31, 25, 1, 'thursday', '01:00:00', '01:00:00'),
(72, 41, 31, 25, 1, 'friday', '01:00:00', '01:00:00'),
(73, 46, 31, 25, 1, 'friday', '21:00:00', '08:00:00'),
(74, 44, 31, 15, 1, 'monday', '20:00:00', '02:00:00'),
(75, 46, 31, 25, 1, 'tuesday', '14:01:00', '01:00:00'),
(76, 48, 31, 29, 1, 'saturday', '01:00:00', '13:00:00'),
(78, 40, 31, 24, 1, 'monday', '01:00:00', '02:00:00'),
(79, 49, 31, 25, 1, 'saturday', '01:00:00', '01:01:00'),
(80, 40, 21, 9, 1, 'monday', '01:00:00', '01:01:00'),
(81, 39, 31, 25, 1, 'tuesday', '13:00:00', '01:00:00'),
(82, 46, 21, 25, 1, 'wednesday', '01:00:00', '02:00:00'),
(83, 42, 21, 20, 1, 'tuesday', '02:00:00', '01:01:00'),
(84, 53, 15, 16, 1, 'tuesday', '02:01:00', '13:00:00'),
(85, 47, 15, 20, 1, 'monday', '06:00:00', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `register_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `account_number`, `address`, `birth_date`, `birth_place`, `register_date`, `gender`, `school_origin`, `status`, `mothers_name`, `fathers_name`, `photo`, `class_id`, `description`, `created_at`, `updated_at`) VALUES
(11, 'Hendra Supanji', '1800928  ', 'jalan tb simatupang no 17 kabupaten kiod', '0000-00-00', '', '0000-00-00', 'Male', '', '0', '', '', 'supanji.jpg', 4, '', '2016-10-27 18:20:05', '2016-11-02 20:52:12'),
(12, 'Via Andinata', '991023890 ', 'jjaladnanan', '0000-00-00', '', '0000-00-00', 'Male', '', '0', '', '', 'ad', 5, '', '2016-10-27 18:25:46', '2016-10-27 21:26:24'),
(14, 'Max Verstappen', '8901238108 ', 'Jalan kebangsaan timur medan merdeka selatan jakarta utara', '1997-06-15', 'Amsterdam', '0000-00-00', 'Male', 'SMK Tunas bangsa Amsterdam', '1', 'Via Verstappern', 'Josh verstappen', 'verstapper.jpg', 3, 'Moved from  Formula 3 Europa', '2016-10-27 18:41:28', '2016-10-27 21:26:41'),
(15, 'Kevin Magnussen', '28912378 ', 'St petersburg 19 , philadelpia', '1989-08-09', 'Copenhagen', '0000-00-00', 'Male', 'SMK 2 Denmark', '1', 'Via Magnussen', 'Josh Magnussen', 'magnussen.jpg', 3, 'Moved from Mclaren in 2013', '2016-10-27 18:44:33', '2016-10-27 21:26:50'),
(16, 'Louis Hamilton', '789101278   ', 'Jalan belakang olo no 2 london utara', '1985-08-11', 'Silverstone', '0000-00-00', 'Male', 'SMK 1 London', '1', 'Ana Wellington', 'Michael Endersson', 'hamilton.jpg', 3, 'Moved from GP2 2007', '2016-10-27 18:47:26', '2016-11-02 20:41:07'),
(17, 'Pascal Wehrlein', '78129323190 ', 'Jalan simatupang no. 22 kecamatan nagoya, Batam', '1994-10-11', 'Brussels', '0000-00-00', 'Male', 'STM 1 Jerman', '1', 'Carl Veronica', 'Michael Wehrlein', 'pascal.jpg', 5, 'Moved from Deutch Touring Master', '2016-10-27 19:48:06', '2016-10-27 21:27:39'),
(18, 'Daron Champlin', '3218397', '', '0000-00-00', '', '0000-00-00', 'Male', '', '0', '', '', '', 4, '', NULL, '2016-11-04 02:21:34'),
(19, 'Edison Kunde IV', '313453646', '', '0000-00-00', '', '0000-00-00', 'Male', '', '0', '', '', '', 5, '', NULL, '2016-11-13 19:06:32'),
(22, 'Prof. Jerel Schaefer DDS', '9130191313873', '', '0000-00-00', '', '0000-00-00', 'Male', '', '0', '', '', '', 5, '', NULL, '2016-11-13 19:41:47'),
(23, 'Berta Terry', '091283871', '', '0000-00-00', '', '0000-00-00', 'Male', '', '0', '', '', '', 4, '', NULL, '2016-11-04 02:21:48'),
(30, 'Marina Coastarina', '90129387', 'Jalan medan merdeka timur jakarta barat', '1997-12-12', 'Tanjung Balai Karimun', '0000-00-00', 'Female', 'SMPN 5 KUBUNG', '1', 'Hublot', 'Khairul Anwar', 'iioae.jpg', 5, 'Moved from  Formula 3 Singapore', '2016-10-30 20:21:29', '2016-10-30 20:21:29'),
(33, 'Nico Hulkenberg', '7781937868132', 'ndmaskdnakdnasjdn', '1987-08-17', 'Munich', '0000-00-00', 'Male', 'SMK 5 SOlok', '0', 'akdj', 'akdk', 'mkda.jpg', 14, 'kndawdnjd', '2016-10-31 03:04:36', '2016-10-31 03:04:36'),
(34, 'Jenson Button', '7710297', 'St. Petersburg', '1981-10-11', 'London', '0000-00-00', 'Male', 'SMK 5 Southamton', '1', 'Json', 'Xml', 'rss.jpg ', 14, 'take my body oh yeah', '2016-10-31 18:40:44', '2016-10-31 18:40:44'),
(36, 'Gunama Putra', '11085', 'djavhwabdak', '1992-05-12', 'Padang', '2016-11-03', 'Male', 'UPI "YPTK" Padang', '1', 'Y', 'A', 'C:\\xampp\\tmp\\php9E81.tmp', 15, 'I can handle it', '2016-11-02 20:05:13', '2016-11-02 20:05:13'),
(41, 'Charles Lerclec', '179213877', 'jalan monaco manurun mananjak ', '1997-03-05', ';Monaco', '2016-11-01', 'Male', 'SMK2 Monaco', '1', 'Charles', 'Charlie', 'C:\\xampp\\tmp\\php62EC.tmp', 3, 'Moved from GP3', '2016-11-04 01:40:12', '2016-11-04 01:40:12'),
(45, 'Hendri supanji', '89312632', 'Jalan mkamskld', '2016-11-01', 'Palembang', '2016-11-04', 'Male', 'SMA 2 Don bosco', '1', 'Vindra', 'Vindri', 'C:\\xampp\\tmp\\php7E92.tmp', 4, 'maldmkas', '2016-11-07 00:53:02', '2016-11-07 00:53:02'),
(46, 'Rio Haryanto', '91232817', 'makldnajdnasj', '2016-03-02', 'Solo', '2016-11-03', 'Male', 'dklaj', '1', 'akjjs', 'kja', 'C:\\xampp\\tmp\\phpAB8C.tmp', 4, 'kada', '2016-11-07 00:54:19', '2016-11-07 00:54:19'),
(47, 'Jolyon Palmera', '301293', 'jakdjasldj', '2016-11-02', 'ck,smd', '2016-11-02', 'Male', 'eqemal', '1', 'aija', 'dakld', 'C:\\xampp\\tmp\\php69CD.tmp', 4, 'msklmsa', '2016-11-07 00:55:08', '2016-11-07 00:55:08'),
(48, 'Alexander Albon', '001398132', 'lkmalds', '2016-11-02', 'Bangkok', '2016-11-02', 'Male', 'amdaslkmd', '1', 'lakmd', 'mkdas', 'C:\\xampp\\tmp\\php43E7.tmp', 4, 'maklsd', '2016-11-07 00:56:03', '2016-11-07 00:56:03'),
(49, 'Pierre Gasly', '209381237', 'daklm', '2016-11-01', 'Jakarta', '2016-11-01', 'Male', 'SMTml a', '1', 'awkl', 'kmwa', 'C:\\xampp\\tmp\\phpE92B.tmp', 4, 'lkfdsj', '2016-11-07 00:56:46', '2016-11-07 00:56:46'),
(50, 'Fernando Alonso', '13013187', 'dmakdj', '2016-11-08', 'mANdamkl', '2016-11-02', 'Male', 'daskdjan', '1', 'anjkdn', 'akj', 'C:\\xampp\\tmp\\php9D6D.tmp', 4, 'adka', '2016-11-07 00:57:32', '2016-11-07 00:57:32'),
(51, 'Giovinazzi', '0138917', 'daskl', '2016-11-03', 'Malays', '2016-11-03', 'Male', 'mdija', '1', 'jand', 'njnnn', 'C:\\xampp\\tmp\\php6DA8.tmp', 4, 'jasd', '2016-11-07 00:58:25', '2016-11-07 00:58:25'),
(52, 'Artem Markelov', '0391284212', 'mdkasm', '2016-11-07', 'akdlakm', '2016-11-16', 'Male', 'Skmlad', '1', 'laskdm', 'kmdka', 'C:\\xampp\\tmp\\php21BB.tmp', 4, 'akdn', '2016-11-07 00:59:11', '2016-11-07 00:59:11'),
(53, 'Sergey Sirotkin', '948237', 'askmd', '2016-11-22', 'Olympiakos', '2016-12-12', 'Male', 'akdjasd', '1', 'amdklma', 'kmdkams', 'C:\\xampp\\tmp\\phpCB53.tmp', 4, 'askdja', '2016-11-07 00:59:55', '2016-11-07 00:59:55'),
(54, 'Januar', '8831293', 'K', '2016-11-08', 'Padang', '2016-11-09', 'Male', 'SMP 5 Jambi', '1', 'J', 'L', '8831293_phpB8E2.jpg', 31, 'If', '2016-11-09 18:31:11', '2016-11-09 18:31:11'),
(55, 'Riyad Mahrez', '1028321   ', 'Jalan lorem ipsum dolor sit amet', '2016-11-02', 'Kyrgistan', '2016-11-02', 'Male', 'Singapore Vocational High School', '1', 'F', 'G', '1028321_team7.jpg', 31, 'New Student in 2016', '2016-11-11 00:42:01', '2016-11-13 07:30:22'),
(56, 'Hendra Setiawan', '99213921783', 'Jalan kebangsaan timur', '2016-11-10', 'Jakarta', '2016-11-01', 'Male', 'SDN 5 ', '1', 'Fella', 'Charlie', '99213921783_team2.jpg', 31, 'Lorem ipsum dolor sit amet ', '2016-11-13 20:34:04', '2016-11-13 20:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_presences`
--

CREATE TABLE `student_presences` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('alpha','sick','permit') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_presences`
--

INSERT INTO `student_presences` (`id`, `student_id`, `year_id`, `class_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(8, 48, 1, 4, '2016-11-01', 'sick', '2016-11-07 23:46:54', '2016-11-07 23:46:54'),
(9, 52, 1, 4, '2016-11-02', 'sick', '2016-11-07 23:47:10', '2016-11-07 23:47:10'),
(10, 51, 1, 4, '2016-11-09', 'alpha', '2016-11-07 23:47:27', '2016-11-07 23:47:27'),
(11, 46, 1, 4, '2016-12-06', 'sick', '2016-11-07 23:47:57', '2016-11-07 23:47:57'),
(15, 49, 1, 4, '2016-11-23', 'alpha', '2016-11-08 00:31:39', '2016-11-08 00:31:39'),
(17, 36, 1, 15, '2016-11-24', 'sick', '2016-11-08 02:14:09', '2016-11-08 02:14:09'),
(18, 36, 1, 15, '2016-11-01', 'alpha', '2016-11-08 02:23:08', '2016-11-08 02:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `account_number`, `gender`, `date_of_birth`, `address`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Sapriadi', '091821302137', 'Male', '2016-10-04', '                         Lorep ipsum dolor  sit amet\r\n                    \r\n                    ', NULL, '2016-11-01 18:57:19', 'jkaid.jpg'),
(3, 'Farid Ali', '8891023137', 'Male', '2016-10-04', 'Tiban riau bertuah 2, blok g 26', NULL, NULL, 'hudali'),
(9, 'Hendra Supanji', '1209319', 'Male', '0000-00-00', 'TIban riau bertuah blok G 26 , patam lestari, no. 18', '2016-10-27 01:01:29', '2016-10-27 01:01:29', 'jasdkas.jpg'),
(10, 'Jony iskandar', '1921038', 'Male', '2009-12-05', 'kaldma', '2016-10-27 01:15:28', '2016-10-27 01:15:28', 'kdlasd.jpg'),
(14, 'Via Andinata', '82891230', 'Female', '1984-12-09', 'Jalan tiban riau bertuah blok G 26, patam lestari', '2016-10-30 20:03:11', '2016-10-30 20:03:11', 'kda.jpg'),
(15, 'Kunto Aji', '83912037', 'Male', '1970-12-10', 'mvrjewij', '2016-10-30 20:19:20', '2016-10-30 20:19:20', 'jieres.jpg'),
(16, 'Felippe Massa', '903218y9', 'Male', '1982-10-12', 'Jalan ronaldo no 10, kabupaten amazaon, brazilia', '2016-10-31 20:40:21', '2016-10-31 20:40:21', 'google_drive_ERD2.png'),
(18, 'Marcus Ericsson', '290123989', 'Male', '1990-01-01', 'Jalan kopenhaden', '2016-10-31 20:56:57', '2016-10-31 20:56:57', '2901239892.jpg'),
(19, 'Felippe Nasr', '13129123', 'Male', '0000-00-00', 'adkjnadab', '2016-10-31 20:58:14', '2016-10-31 20:58:14', '13129123_Desert.jpg'),
(20, 'Fernando Alonso', '773821938', 'Male', '1997-10-18', 'Jalan medan merdeka timur madrid\r\n                    ', '2016-10-31 21:00:43', '2016-11-01 23:08:19', '773821938_Jellyfish.jpg'),
(23, 'Sergio Perez', '1312897', 'Male', '0000-00-00', 'Jalan kuntpo aji', '2016-11-01 01:02:51', '2016-11-01 01:02:51', '1312897_Chrysanthemum.jpg'),
(24, 'Esteban Gutierezz', '89109238', 'Male', '1991-10-10', 'Jalan sukajadi julai', '2016-11-01 01:42:11', '2016-11-01 01:42:11', '89109238_Penguins.jpg'),
(25, 'Alfonso Cellis', '7698174', 'Male', '2016-12-12', '    Jaalan tb simatupang', '2016-11-01 18:54:48', '2016-11-06 01:08:40', '7698174_Koala.jpg'),
(27, 'Yuli zualsai', '012938613', 'Female', '2016-11-14', ' kdfjasda,m', '2016-11-03 00:19:46', '2016-11-07 00:49:14', '012938613_Chrysanthemum.jpg'),
(29, 'New test', '12309173', 'Male', '2016-11-03', 'sndskaj', '2016-11-04 01:03:26', '2016-11-04 01:03:26', '12309173_Tulips.jpg'),
(30, 'Everythimgqnk', '12039129', 'Male', '2016-11-07', 'knadnakjddnj', '2016-11-04 01:08:17', '2016-11-04 01:08:17', '12039129_Lighthouse.jpg'),
(31, 'Amirul', '91917286', 'Male', '1979-01-30', ' Jalan jalan jalan', '2016-11-06 00:59:58', '2016-11-07 00:50:01', '91917286_minimarket.png'),
(32, 'Udin Fantacista', '999231897', 'Male', '2016-11-01', 'Jalan lintas sumatra no 19 kec. kubung, kab solok sumatra barat', '2016-11-09 08:09:51', '2016-11-09 08:09:51', '999231897_2.jpg'),
(33, 'Avatar', '5674', 'Male', '2016-11-02', 'jjbjhjh', '2016-11-09 08:18:43', '2016-11-09 08:18:43', '5674_team10.jpg'),
(34, 'Alvin Harris', '23456789', 'Female', '2016-11-02', ' jghghf', '2016-11-09 08:19:34', '2016-11-09 08:19:34', '23456789_team15.jpg'),
(35, 'Esteban Ocon', '19271948241', 'Male', '1997-03-06', 'jalan kepanjeng , batu aji 2, RT 2 RW 1 , Blok K no. 30, kecamatan batu aji, kelurahan tanjung uncang, kota batam , kepulauan RIau', '2016-11-10 19:46:34', '2016-11-10 19:46:34', '19271948241_team1.jpg'),
(36, 'Pastor Maldonado', '993242786', 'Male', '1985-11-14', 'lorem ipsum dolor sit atmet daskldj klsj aknasjnd naskd snakn ', '2016-11-10 19:58:53', '2016-11-10 19:58:53', '993242786_team13.jpg'),
(37, 'Karel Abraham', '138120947161', 'Male', '1991-01-30', 'Lorem dolor ipsum sit atmet jajaj aioj alk ghk jkad akjd ajbkanda dakj ', '2016-11-10 20:19:43', '2016-11-10 20:19:43', '138120947161_team3.jpg'),
(38, 'Ander Hererra', '88921738', 'Male', '2016-11-24', 'Lorem ipsum dolor sit amet tada tadakdal iod apsd kdasod k as sna', '2016-11-10 20:38:56', '2016-11-10 20:38:56', '88921738_team12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_presences`
--

CREATE TABLE `teacher_presences` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('alpha','sick','permit') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_presences`
--

INSERT INTO `teacher_presences` (`id`, `teacher_id`, `year_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(2, 25, 1, '2016-11-07', 'sick', '2016-11-07 19:53:21', '2016-11-07 19:53:21'),
(4, 16, 1, '2016-11-08', 'permit', '2016-11-07 20:00:26', '2016-11-07 20:00:26'),
(5, 19, 1, '2016-11-08', 'permit', '2016-11-07 20:52:44', '2016-11-07 20:52:44'),
(6, 14, 1, '2016-11-07', 'sick', '2016-11-08 00:45:19', '2016-11-08 00:45:19'),
(7, 10, 1, '2016-11-06', 'sick', '2016-11-08 00:45:51', '2016-11-08 00:45:51'),
(8, 30, 1, '2016-11-07', 'alpha', '2016-11-08 00:47:29', '2016-11-08 00:47:29'),
(9, 25, 1, '2016-11-02', 'alpha', '2016-11-08 02:54:29', '2016-11-08 02:54:29'),
(10, 31, 1, '2016-11-02', 'alpha', '2016-11-08 18:35:04', '2016-11-08 18:35:04'),
(11, 1, 1, '2016-11-29', 'alpha', '2016-11-08 23:16:46', '2016-11-08 23:16:46'),
(12, 10, 1, '2016-11-09', 'sick', '2016-11-13 21:56:19', '2016-11-13 21:56:19'),
(13, 19, 1, '2016-11-02', 'permit', '2016-11-13 21:57:14', '2016-11-13 21:57:14'),
(14, 25, 1, '2016-11-01', 'alpha', '2016-11-13 21:57:37', '2016-11-13 21:57:37'),
(15, 25, 1, '2016-11-16', 'alpha', '2016-11-14 02:14:08', '2016-11-14 02:14:08'),
(16, 25, 1, '2016-10-17', 'permit', '2016-11-14 18:32:39', '2016-11-14 18:32:39'),
(17, 25, 1, '2016-12-01', 'alpha', '2016-11-14 18:33:59', '2016-11-14 18:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gunama Putra', 'gunama12@gmail.com', '$2y$10$zSZ9Wk/fHBj2Lwm.rMIGHO/w88DjYhQoNoc4lJUIiJsYrW0felS9C', '89ubV2k1LNX2kKAr1JYAL8kDsekPeGhYcdmKVDOUnMybyVtoJQmOytJRNb6g', '2016-10-25 21:23:22', '2016-11-11 04:47:01'),
(2, 'Hendra Supanji', 'hendra12@gmail.com', '$2y$10$r8fFE9xcYvCMBJ1zjYRKFeiBC86PhXy1sSpxL7LuZO6WdCtaZO32m', 'MKtXDGmUFW2ZIscyh5iQH2HyQ7e5QVNfuVUMtZIwL2zozJR0LZktdelnk0Hg', '2016-10-30 18:17:58', '2016-10-30 18:19:05'),
(3, 'David Huang', 'david.chandra@gmail.com', '$2y$10$ZWkU.ZCNMNKUFb1BwNYE1OnBVGbyWvGgG9f/OlMGHcclSCpPvfC/K', 'ApA0l7cVv9cpQ6Zydimc6OCcqye6tVt2iQcjDVe7YQWDXITPYlqPAxz26yqN', '2016-11-01 00:03:02', '2016-11-01 00:13:01'),
(4, 'tes', 'tes@gmail.com', '$2y$10$yelaP1WJ1tGwS/.ArLpJxedSj1vmuiuAcdkXamldI155u5xqXAsKG', 'KrIrzwMsSVmZQiHzEqeJrQq3CSibZ3OnyxxYzimeemKUyyT40FJ4s19K2sED', '2016-11-03 00:02:24', '2016-11-03 00:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `semester`, `active`) VALUES
(1, '2016/2017', 1, 1),
(6, '2016/2017', 2, 0),
(7, '2017/2018', 1, 0),
(8, '2017/2018', 2, 0),
(9, '2018/2019', 1, 0),
(11, '2018/2019', 2, 0),
(14, '2015/2016', 1, 0),
(15, '2015/2016', 2, 0),
(16, '2016/2019', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_presences`
--
ALTER TABLE `student_presences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_presences`
--
ALTER TABLE `teacher_presences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `student_presences`
--
ALTER TABLE `student_presences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `teacher_presences`
--
ALTER TABLE `teacher_presences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
