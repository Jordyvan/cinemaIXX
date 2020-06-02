-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 11:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `seat` varchar(2) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `film_id`, `seat_id`, `seat`, `updated_at`, `created_at`) VALUES
(1, 1, 3, 99, 'C3', '2020-05-31', '2020-05-18'),
(4, 1, 1, 13, 'B5', '2020-05-31', '2020-05-31'),
(6, 6, 1, 36, 'E4', '2020-06-01', '2020-06-01'),
(8, 6, 1, 19, 'C3', '2020-06-01', '2020-06-01'),
(9, 6, 1, 3, 'A3', '2020-06-01', '2020-06-01'),
(10, 6, 2, 76, 'E4', '2020-06-01', '2020-06-01'),
(11, 6, 3, 116, 'E4', '2020-06-01', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `film_title` varchar(100) NOT NULL,
  `film_description` varchar(255) NOT NULL,
  `film_age` int(2) NOT NULL,
  `film_duration_minute` int(3) NOT NULL,
  `id_image` varchar(255) NOT NULL,
  `trailer_link` varchar(255) NOT NULL,
  `Room_number` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `film_price` int(10) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `film_title`, `film_description`, `film_age`, `film_duration_minute`, `id_image`, `trailer_link`, `Room_number`, `ruangan_id`, `film_price`, `created_at`, `updated_at`) VALUES
(1, 'Stand by me Doraemon\'s', 'What will happen to Nobita\'s life after Doraemon leaves?', 0, 95, '1591028309_DORAEMON.jpg', 'https://www.youtube.com/embed/dnRAVwBBRRA', 1, 1, 50000, '0000-00-00', '2020-06-01'),
(2, '1917', 'April 6th, 1917. As a regiment assembles to wage war deep in enemy territory, two soldiers are assigned to race against time and deliver a message that will stop 1,600 men from walking straight into a deadly trap.', 21, 119, '1917.jpg', 'https://www.youtube.com/embed/YqNYrYUiMfg', 2, 2, 50000, '0000-00-00', '0000-00-00'),
(3, 'Venom', 'A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth. But the being takes a liking to Earth and decides to protect it.', 13, 112, 'VENOM.jpg', 'https://www.youtube.com/embed/u9Mv98Gr5pY', 3, 3, 50000, '0000-00-00', '0000-00-00'),
(4, 'Black Panther', 'T\'Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country\'s past.', 0, 134, 'BLACKPANTHER.jpg', 'https://www.youtube.com/embed/xjDjIWPwcPU', 4, 4, 50000, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `ruangan_id` int(11) NOT NULL,
  `ruangan_capacity` int(3) NOT NULL,
  `Film_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`ruangan_id`, `ruangan_capacity`, `Film_id`, `updated_at`, `created_at`) VALUES
(1, 40, 1, '0000-00-00', '0000-00-00'),
(2, 40, 2, '0000-00-00', '0000-00-00'),
(3, 40, 3, '0000-00-00', '0000-00-00'),
(4, 40, 4, '0000-00-00', '0000-00-00'),
(10, 40, 0, '2020-06-01', '2020-06-01'),
(15, 40, 0, '2020-06-01', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `seat_avaibility` char(1) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `seat_number` int(2) DEFAULT NULL,
  `seat_rows` varchar(2) DEFAULT NULL,
  `seat_columns` int(3) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `seat_avaibility`, `ruangan_id`, `seat_number`, `seat_rows`, `seat_columns`, `created_at`, `updated_at`) VALUES
(1, 'N', 1, 1, 'A', 1, '0000-00-00', '0000-00-00'),
(2, 'Y', 1, 2, 'A', 2, '0000-00-00', '0000-00-00'),
(3, 'N', 1, 3, 'A', 3, '0000-00-00', '0000-00-00'),
(4, 'Y', 1, 4, 'A', 4, '0000-00-00', '0000-00-00'),
(5, 'Y', 1, 5, 'A', 5, '0000-00-00', '0000-00-00'),
(6, 'Y', 1, 6, 'A', 6, '0000-00-00', '0000-00-00'),
(7, 'Y', 1, 7, 'A', 7, '0000-00-00', '0000-00-00'),
(8, 'Y', 1, 8, 'A', 8, '0000-00-00', '0000-00-00'),
(9, 'Y', 1, 9, 'B', 1, '0000-00-00', '0000-00-00'),
(10, 'Y', 1, 10, 'B', 2, '0000-00-00', '0000-00-00'),
(11, 'Y', 1, 11, 'B', 3, '0000-00-00', '0000-00-00'),
(12, 'Y', 1, 12, 'B', 4, '0000-00-00', '0000-00-00'),
(13, 'N', 1, 13, 'B', 5, '0000-00-00', '2020-06-01'),
(14, 'Y', 1, 14, 'B', 6, '0000-00-00', '0000-00-00'),
(15, 'Y', 1, 15, 'B', 7, '0000-00-00', '0000-00-00'),
(16, 'Y', 1, 16, 'B', 8, '0000-00-00', '0000-00-00'),
(17, 'Y', 1, 17, 'C', 1, '0000-00-00', '0000-00-00'),
(18, 'Y', 1, 18, 'C', 2, '0000-00-00', '2020-06-01'),
(19, 'N', 1, 19, 'C', 3, '0000-00-00', '0000-00-00'),
(20, 'Y', 1, 20, 'C', 4, '0000-00-00', '0000-00-00'),
(21, 'Y', 1, 21, 'C', 5, '0000-00-00', '0000-00-00'),
(22, 'Y', 1, 22, 'C', 6, '0000-00-00', '0000-00-00'),
(23, 'Y', 1, 23, 'C', 7, '0000-00-00', '0000-00-00'),
(24, 'Y', 1, 24, 'C', 8, '0000-00-00', '0000-00-00'),
(25, 'Y', 1, 25, 'D', 1, '0000-00-00', '0000-00-00'),
(26, 'Y', 1, 26, 'D', 2, '0000-00-00', '0000-00-00'),
(27, 'Y', 1, 27, 'D', 3, '0000-00-00', '0000-00-00'),
(28, 'Y', 1, 28, 'D', 4, '0000-00-00', '0000-00-00'),
(29, 'Y', 1, 29, 'D', 5, '0000-00-00', '0000-00-00'),
(30, 'Y', 1, 30, 'D', 6, '0000-00-00', '0000-00-00'),
(31, 'Y', 1, 31, 'D', 7, '0000-00-00', '0000-00-00'),
(32, 'Y', 1, 32, 'D', 8, '0000-00-00', '0000-00-00'),
(33, 'Y', 1, 33, 'E', 1, '0000-00-00', '0000-00-00'),
(34, 'Y', 1, 34, 'E', 2, '0000-00-00', '0000-00-00'),
(35, 'Y', 1, 35, 'E', 3, '0000-00-00', '0000-00-00'),
(36, 'Y', 1, 36, 'E', 4, '0000-00-00', '2020-06-01'),
(37, 'Y', 1, 37, 'E', 5, '0000-00-00', '0000-00-00'),
(38, 'Y', 1, 38, 'E', 6, '0000-00-00', '0000-00-00'),
(39, 'Y', 1, 39, 'E', 7, '0000-00-00', '0000-00-00'),
(40, 'Y', 1, 40, 'E', 8, '0000-00-00', '0000-00-00'),
(41, 'Y', 2, 1, 'A', 1, '0000-00-00', '0000-00-00'),
(42, 'Y', 2, 2, 'A', 2, '0000-00-00', '0000-00-00'),
(43, 'Y', 2, 3, 'A', 3, '0000-00-00', '0000-00-00'),
(44, 'Y', 2, 4, 'A', 4, '0000-00-00', '0000-00-00'),
(45, 'Y', 2, 5, 'A', 5, '0000-00-00', '0000-00-00'),
(46, 'Y', 2, 6, 'A', 6, '0000-00-00', '0000-00-00'),
(47, 'Y', 2, 7, 'A', 7, '0000-00-00', '0000-00-00'),
(48, 'Y', 2, 8, 'A', 8, '0000-00-00', '0000-00-00'),
(49, 'Y', 2, 9, 'B', 1, '0000-00-00', '0000-00-00'),
(50, 'Y', 2, 10, 'B', 2, '0000-00-00', '0000-00-00'),
(51, 'Y', 2, 11, 'B', 3, '0000-00-00', '0000-00-00'),
(52, 'Y', 2, 12, 'B', 4, '0000-00-00', '0000-00-00'),
(53, 'Y', 2, 13, 'B', 5, '0000-00-00', '0000-00-00'),
(54, 'Y', 2, 14, 'B', 6, '0000-00-00', '0000-00-00'),
(55, 'Y', 2, 15, 'B', 7, '0000-00-00', '0000-00-00'),
(56, 'Y', 2, 16, 'B', 8, '0000-00-00', '0000-00-00'),
(57, 'Y', 2, 17, 'C', 1, '0000-00-00', '0000-00-00'),
(58, 'Y', 2, 18, 'C', 2, '0000-00-00', '0000-00-00'),
(59, 'Y', 2, 19, 'C', 3, '0000-00-00', '0000-00-00'),
(60, 'Y', 2, 20, 'C', 4, '0000-00-00', '0000-00-00'),
(61, 'Y', 2, 21, 'C', 5, '0000-00-00', '0000-00-00'),
(62, 'Y', 2, 22, 'C', 6, '0000-00-00', '0000-00-00'),
(63, 'Y', 2, 23, 'C', 7, '0000-00-00', '0000-00-00'),
(64, 'Y', 2, 24, 'C', 8, '0000-00-00', '0000-00-00'),
(65, 'Y', 2, 25, 'D', 1, '0000-00-00', '0000-00-00'),
(66, 'Y', 2, 26, 'D', 2, '0000-00-00', '0000-00-00'),
(67, 'Y', 2, 27, 'D', 3, '0000-00-00', '0000-00-00'),
(68, 'Y', 2, 28, 'D', 4, '0000-00-00', '0000-00-00'),
(69, 'Y', 2, 29, 'D', 5, '0000-00-00', '0000-00-00'),
(70, 'Y', 2, 30, 'D', 6, '0000-00-00', '0000-00-00'),
(71, 'Y', 2, 31, 'D', 7, '0000-00-00', '0000-00-00'),
(72, 'Y', 2, 32, 'D', 8, '0000-00-00', '0000-00-00'),
(73, 'Y', 2, 33, 'E', 1, '0000-00-00', '0000-00-00'),
(74, 'Y', 2, 34, 'E', 2, '0000-00-00', '0000-00-00'),
(75, 'Y', 2, 35, 'E', 3, '0000-00-00', '0000-00-00'),
(76, 'N', 2, 36, 'E', 4, '0000-00-00', '0000-00-00'),
(77, 'Y', 2, 37, 'E', 5, '0000-00-00', '0000-00-00'),
(78, 'Y', 2, 38, 'E', 6, '0000-00-00', '0000-00-00'),
(79, 'Y', 2, 39, 'E', 7, '0000-00-00', '0000-00-00'),
(80, 'Y', 2, 40, 'E', 8, '0000-00-00', '0000-00-00'),
(81, 'N', 3, 1, 'A', 1, '0000-00-00', '0000-00-00'),
(82, 'Y', 3, 2, 'A', 2, '0000-00-00', '0000-00-00'),
(83, 'N', 3, 3, 'A', 3, '0000-00-00', '0000-00-00'),
(84, 'Y', 3, 4, 'A', 4, '0000-00-00', '0000-00-00'),
(85, 'Y', 3, 5, 'A', 5, '0000-00-00', '0000-00-00'),
(86, 'Y', 3, 6, 'A', 6, '0000-00-00', '0000-00-00'),
(87, 'Y', 3, 7, 'A', 7, '0000-00-00', '0000-00-00'),
(88, 'Y', 3, 8, 'A', 8, '0000-00-00', '0000-00-00'),
(89, 'Y', 3, 9, 'B', 1, '0000-00-00', '0000-00-00'),
(90, 'Y', 3, 10, 'B', 2, '0000-00-00', '0000-00-00'),
(91, 'Y', 3, 11, 'B', 3, '0000-00-00', '0000-00-00'),
(92, 'Y', 3, 12, 'B', 4, '0000-00-00', '0000-00-00'),
(93, 'Y', 3, 13, 'B', 5, '0000-00-00', '0000-00-00'),
(94, 'Y', 3, 14, 'B', 6, '0000-00-00', '0000-00-00'),
(95, 'Y', 3, 15, 'B', 7, '0000-00-00', '0000-00-00'),
(96, 'Y', 3, 16, 'B', 8, '0000-00-00', '0000-00-00'),
(97, 'Y', 3, 17, 'C', 1, '0000-00-00', '0000-00-00'),
(98, 'Y', 3, 18, 'C', 2, '0000-00-00', '0000-00-00'),
(99, 'N', 3, 19, 'C', 3, '0000-00-00', '0000-00-00'),
(100, 'Y', 3, 20, 'C', 4, '0000-00-00', '0000-00-00'),
(101, 'Y', 3, 21, 'C', 5, '0000-00-00', '0000-00-00'),
(102, 'Y', 3, 22, 'C', 6, '0000-00-00', '0000-00-00'),
(103, 'Y', 3, 23, 'C', 7, '0000-00-00', '0000-00-00'),
(104, 'Y', 3, 24, 'C', 8, '0000-00-00', '0000-00-00'),
(105, 'Y', 3, 25, 'D', 1, '0000-00-00', '0000-00-00'),
(106, 'Y', 3, 26, 'D', 2, '0000-00-00', '0000-00-00'),
(107, 'Y', 3, 27, 'D', 3, '0000-00-00', '0000-00-00'),
(108, 'Y', 3, 28, 'D', 4, '0000-00-00', '0000-00-00'),
(109, 'Y', 3, 29, 'D', 5, '0000-00-00', '0000-00-00'),
(110, 'Y', 3, 30, 'D', 6, '0000-00-00', '0000-00-00'),
(111, 'Y', 3, 31, 'D', 7, '0000-00-00', '0000-00-00'),
(112, 'Y', 3, 32, 'D', 8, '0000-00-00', '0000-00-00'),
(113, 'Y', 3, 33, 'E', 1, '0000-00-00', '0000-00-00'),
(114, 'Y', 3, 34, 'E', 2, '0000-00-00', '0000-00-00'),
(115, 'Y', 3, 35, 'E', 3, '0000-00-00', '0000-00-00'),
(116, 'N', 3, 36, 'E', 4, '0000-00-00', '0000-00-00'),
(117, 'Y', 3, 37, 'E', 5, '0000-00-00', '0000-00-00'),
(118, 'Y', 3, 38, 'E', 6, '0000-00-00', '0000-00-00'),
(119, 'Y', 3, 39, 'E', 7, '0000-00-00', '0000-00-00'),
(120, 'Y', 3, 40, 'E', 8, '0000-00-00', '0000-00-00'),
(121, 'Y', 4, 1, 'A', 1, '0000-00-00', '0000-00-00'),
(122, 'Y', 4, 2, 'A', 2, '0000-00-00', '0000-00-00'),
(123, 'Y', 4, 3, 'A', 3, '0000-00-00', '0000-00-00'),
(124, 'Y', 4, 4, 'A', 4, '0000-00-00', '0000-00-00'),
(125, 'Y', 4, 5, 'A', 5, '0000-00-00', '0000-00-00'),
(126, 'Y', 4, 6, 'A', 6, '0000-00-00', '0000-00-00'),
(127, 'Y', 4, 7, 'A', 7, '0000-00-00', '0000-00-00'),
(128, 'Y', 4, 8, 'A', 8, '0000-00-00', '0000-00-00'),
(129, 'Y', 4, 9, 'B', 1, '0000-00-00', '0000-00-00'),
(130, 'Y', 4, 10, 'B', 2, '0000-00-00', '0000-00-00'),
(131, 'Y', 4, 11, 'B', 3, '0000-00-00', '0000-00-00'),
(132, 'Y', 4, 12, 'B', 4, '0000-00-00', '0000-00-00'),
(133, 'Y', 4, 13, 'B', 5, '0000-00-00', '0000-00-00'),
(134, 'Y', 4, 14, 'B', 6, '0000-00-00', '0000-00-00'),
(135, 'Y', 4, 15, 'B', 7, '0000-00-00', '0000-00-00'),
(136, 'Y', 4, 16, 'B', 8, '0000-00-00', '0000-00-00'),
(137, 'Y', 4, 17, 'C', 1, '0000-00-00', '0000-00-00'),
(138, 'Y', 4, 18, 'C', 2, '0000-00-00', '0000-00-00'),
(139, 'Y', 4, 19, 'C', 3, '0000-00-00', '0000-00-00'),
(140, 'Y', 4, 20, 'C', 4, '0000-00-00', '0000-00-00'),
(141, 'Y', 4, 21, 'C', 5, '0000-00-00', '0000-00-00'),
(142, 'Y', 4, 22, 'C', 6, '0000-00-00', '0000-00-00'),
(143, 'Y', 4, 23, 'C', 7, '0000-00-00', '0000-00-00'),
(144, 'Y', 4, 24, 'C', 8, '0000-00-00', '0000-00-00'),
(145, 'Y', 4, 25, 'D', 1, '0000-00-00', '0000-00-00'),
(146, 'Y', 4, 26, 'D', 2, '0000-00-00', '0000-00-00'),
(147, 'Y', 4, 27, 'D', 3, '0000-00-00', '0000-00-00'),
(148, 'Y', 4, 28, 'D', 4, '0000-00-00', '0000-00-00'),
(149, 'Y', 4, 29, 'D', 5, '0000-00-00', '0000-00-00'),
(150, 'Y', 4, 30, 'D', 6, '0000-00-00', '0000-00-00'),
(151, 'Y', 4, 31, 'D', 7, '0000-00-00', '0000-00-00'),
(152, 'Y', 4, 32, 'D', 8, '0000-00-00', '0000-00-00'),
(153, 'Y', 4, 33, 'E', 1, '0000-00-00', '0000-00-00'),
(154, 'Y', 4, 34, 'E', 2, '0000-00-00', '0000-00-00'),
(155, 'Y', 4, 35, 'E', 3, '0000-00-00', '0000-00-00'),
(156, 'Y', 4, 36, 'E', 4, '0000-00-00', '0000-00-00'),
(157, 'Y', 4, 37, 'E', 5, '0000-00-00', '0000-00-00'),
(158, 'Y', 4, 38, 'E', 6, '0000-00-00', '0000-00-00'),
(159, 'Y', 4, 39, 'E', 7, '0000-00-00', '0000-00-00'),
(160, 'Y', 4, 40, 'E', 8, '0000-00-00', '0000-00-00'),
(161, 'Y', 5, 1, 'A', 1, '0000-00-00', '0000-00-00'),
(162, 'Y', 5, 2, 'A', 2, '0000-00-00', '0000-00-00'),
(163, 'Y', 5, 3, 'A', 3, '0000-00-00', '0000-00-00'),
(164, 'Y', 5, 4, 'A', 4, '0000-00-00', '0000-00-00'),
(165, 'Y', 5, 5, 'A', 5, '0000-00-00', '0000-00-00'),
(166, 'Y', 5, 6, 'A', 6, '0000-00-00', '0000-00-00'),
(167, 'Y', 5, 7, 'A', 7, '0000-00-00', '0000-00-00'),
(168, 'Y', 5, 8, 'A', 8, '0000-00-00', '0000-00-00'),
(169, 'Y', 5, 9, 'B', 1, '0000-00-00', '0000-00-00'),
(170, 'Y', 5, 10, 'B', 2, '0000-00-00', '0000-00-00'),
(171, 'Y', 5, 11, 'B', 3, '0000-00-00', '0000-00-00'),
(172, 'Y', 5, 12, 'B', 4, '0000-00-00', '0000-00-00'),
(173, 'Y', 5, 13, 'B', 5, '0000-00-00', '0000-00-00'),
(174, 'Y', 5, 14, 'B', 6, '0000-00-00', '0000-00-00'),
(175, 'Y', 5, 15, 'B', 7, '0000-00-00', '0000-00-00'),
(176, 'Y', 5, 16, 'B', 8, '0000-00-00', '0000-00-00'),
(177, 'Y', 5, 17, 'C', 1, '0000-00-00', '0000-00-00'),
(178, 'Y', 5, 18, 'C', 2, '0000-00-00', '0000-00-00'),
(179, 'Y', 5, 19, 'C', 3, '0000-00-00', '0000-00-00'),
(180, 'Y', 5, 20, 'C', 4, '0000-00-00', '0000-00-00'),
(181, 'Y', 5, 21, 'C', 5, '0000-00-00', '0000-00-00'),
(182, 'Y', 5, 22, 'C', 6, '0000-00-00', '0000-00-00'),
(183, 'Y', 5, 23, 'C', 7, '0000-00-00', '0000-00-00'),
(184, 'Y', 5, 24, 'C', 8, '0000-00-00', '0000-00-00'),
(185, 'Y', 5, 25, 'D', 1, '0000-00-00', '0000-00-00'),
(186, 'Y', 5, 26, 'D', 2, '0000-00-00', '0000-00-00'),
(187, 'Y', 5, 27, 'D', 3, '0000-00-00', '0000-00-00'),
(188, 'Y', 5, 28, 'D', 4, '0000-00-00', '0000-00-00'),
(189, 'Y', 5, 29, 'D', 5, '0000-00-00', '0000-00-00'),
(190, 'Y', 5, 30, 'D', 6, '0000-00-00', '0000-00-00'),
(191, 'Y', 5, 31, 'D', 7, '0000-00-00', '0000-00-00'),
(192, 'Y', 5, 32, 'D', 8, '0000-00-00', '0000-00-00'),
(193, 'Y', 5, 33, 'E', 1, '0000-00-00', '0000-00-00'),
(194, 'Y', 5, 34, 'E', 2, '0000-00-00', '0000-00-00'),
(195, 'Y', 5, 35, 'E', 3, '0000-00-00', '0000-00-00'),
(196, 'Y', 5, 36, 'E', 4, '0000-00-00', '0000-00-00'),
(197, 'Y', 5, 37, 'E', 5, '0000-00-00', '0000-00-00'),
(198, 'Y', 5, 38, 'E', 6, '0000-00-00', '0000-00-00'),
(199, 'Y', 5, 39, 'E', 7, '0000-00-00', '0000-00-00'),
(200, 'Y', 5, 40, 'E', 8, '0000-00-00', '0000-00-00'),
(283, 'Y', 15, 1, 'A', 1, '2020-06-01', '2020-06-01'),
(284, 'Y', 15, 1, 'A', 2, '2020-06-01', '2020-06-01'),
(285, 'Y', 15, 1, 'A', 3, '2020-06-01', '2020-06-01'),
(286, 'Y', 15, 1, 'A', 4, '2020-06-01', '2020-06-01'),
(287, 'Y', 15, 1, 'A', 5, '2020-06-01', '2020-06-01'),
(288, 'Y', 15, 1, 'A', 6, '2020-06-01', '2020-06-01'),
(289, 'Y', 15, 1, 'A', 7, '2020-06-01', '2020-06-01'),
(290, 'Y', 15, 1, 'A', 8, '2020-06-01', '2020-06-01'),
(291, 'Y', 15, 1, 'B', 1, '2020-06-01', '2020-06-01'),
(292, 'Y', 15, 1, 'B', 2, '2020-06-01', '2020-06-01'),
(293, 'Y', 15, 1, 'B', 3, '2020-06-01', '2020-06-01'),
(294, 'Y', 15, 1, 'B', 4, '2020-06-01', '2020-06-01'),
(295, 'Y', 15, 1, 'B', 5, '2020-06-01', '2020-06-01'),
(296, 'Y', 15, 1, 'B', 6, '2020-06-01', '2020-06-01'),
(297, 'Y', 15, 1, 'B', 7, '2020-06-01', '2020-06-01'),
(298, 'Y', 15, 1, 'B', 8, '2020-06-01', '2020-06-01'),
(299, 'Y', 15, 1, 'C', 1, '2020-06-01', '2020-06-01'),
(300, 'Y', 15, 1, 'C', 2, '2020-06-01', '2020-06-01'),
(301, 'Y', 15, 1, 'C', 3, '2020-06-01', '2020-06-01'),
(302, 'Y', 15, 1, 'C', 4, '2020-06-01', '2020-06-01'),
(303, 'Y', 15, 1, 'C', 5, '2020-06-01', '2020-06-01'),
(304, 'Y', 15, 1, 'C', 6, '2020-06-01', '2020-06-01'),
(305, 'Y', 15, 1, 'C', 7, '2020-06-01', '2020-06-01'),
(306, 'Y', 15, 1, 'C', 8, '2020-06-01', '2020-06-01'),
(307, 'Y', 15, 1, 'D', 1, '2020-06-01', '2020-06-01'),
(308, 'Y', 15, 1, 'D', 2, '2020-06-01', '2020-06-01'),
(309, 'Y', 15, 1, 'D', 3, '2020-06-01', '2020-06-01'),
(310, 'Y', 15, 1, 'D', 4, '2020-06-01', '2020-06-01'),
(311, 'Y', 15, 1, 'D', 5, '2020-06-01', '2020-06-01'),
(312, 'Y', 15, 1, 'D', 6, '2020-06-01', '2020-06-01'),
(313, 'Y', 15, 1, 'D', 7, '2020-06-01', '2020-06-01'),
(314, 'Y', 15, 1, 'D', 8, '2020-06-01', '2020-06-01'),
(315, 'Y', 15, 1, 'E', 1, '2020-06-01', '2020-06-01'),
(316, 'Y', 15, 1, 'E', 2, '2020-06-01', '2020-06-01'),
(317, 'Y', 15, 1, 'E', 3, '2020-06-01', '2020-06-01'),
(318, 'Y', 15, 1, 'E', 4, '2020-06-01', '2020-06-01'),
(319, 'Y', 15, 1, 'E', 5, '2020-06-01', '2020-06-01'),
(320, 'Y', 15, 1, 'E', 6, '2020-06-01', '2020-06-01'),
(321, 'Y', 15, 1, 'E', 7, '2020-06-01', '2020-06-01'),
(322, 'Y', 15, 1, 'E', 8, '2020-06-01', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `image_user` varchar(255) COLLATE utf8mb4_unicode_ci NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `birth_date`, `image_user`) VALUES
(1, 'Jordy Van Bastian', '1', 'admin@gmail.com', NULL, '$2y$10$EVBWw7.OrZADaMTXjGHdyOvbmxC/6oyKoSKU65W/7lOgHbUnUZsEy', 'AHx4Y5QhrOriQmdvxIsAu93UKk2lVaZLF7PeUrqxuW3wNwxJPhJoa3sjYvM8', '2020-05-11 02:06:26', '2020-05-11 02:06:26', '1997-06-11', ''),
(2, 'Yuan nalaprana', '1', 'yuan@gmail.com', NULL, '$2y$10$qjf5TvUyzEyH8Pt5.7X4/.PZbqt6KmC99gSXaEbSMmh88kUgooDba', NULL, '2020-05-11 18:32:19', '2020-05-11 18:32:19', '2011-06-11', ''),
(3, 'Samuel putra', '2', 'samuel@gmail.com', NULL, '$2y$10$zBE6EJL9H0b0XDrH5BJYSebdsMoujydcBtOze5mwiv84D6AYpEX1q', 'Py0AUdsXZt5V7MIJQsSZSqk1Nbh5zD0EYOzYryyhS0EWzIc1H4vY0SnjUdLs', '2020-05-11 18:43:05', '2020-05-11 18:43:05', '2003-06-11', ''),
(6, 'user', '2', 'user@gmail.com', NULL, '$2y$10$WwpHAokMmW45jEA7p9wpz.Mprs8.V6D.biTL340b4s1nAfNVRvXnu', 'BxiEg7MHXUtav8WGPxT4vdy7Hvp1CIN2BuXHsRyd8r1uFuGa6zxrYIl8HQrg', '2020-05-31 09:58:11', '2020-06-01 13:37:06', '1997-01-14', '1591043826_Avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
