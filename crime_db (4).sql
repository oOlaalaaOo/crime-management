-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2018 at 02:48 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(10) UNSIGNED NOT NULL,
  `case_unique_no` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_detail_id` int(10) UNSIGNED NOT NULL,
  `case_blotter_id` int(10) UNSIGNED NOT NULL,
  `case_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `case_unique_no`, `case_detail_id`, `case_blotter_id`, `case_status`, `created_at`, `updated_at`) VALUES
(6, '5a2eb6ef61966', 8, 8, 'ongoing', '2017-12-11 16:48:47', '2017-12-11 16:48:47'),
(7, '5a384d3eddebd', 9, 9, 'closed', '2017-12-18 23:20:30', '2018-01-16 15:24:28'),
(8, '5a5b7f47cca0c', 10, 10, 'ongoing', '2018-01-14 16:03:19', '2018-01-14 16:03:19'),
(9, '5a5b7f899fd3b', 11, 11, 'ongoing', '2018-01-14 16:04:25', '2018-01-14 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `case_blotters`
--

CREATE TABLE `case_blotters` (
  `case_blotter_id` int(10) UNSIGNED NOT NULL,
  `entry_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reported_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_blotters`
--

INSERT INTO `case_blotters` (`case_blotter_id`, `entry_no`, `reported_at`, `created_at`, `updated_at`) VALUES
(8, '0001-0012', '2017-01-01', '2017-12-11 16:48:47', '2017-12-11 16:48:47'),
(9, '0001-001', '1992-03-03', '2017-12-18 23:20:30', '2017-12-18 23:20:30'),
(10, '0001-001', '2017-01-01', '2018-01-14 16:03:19', '2018-01-14 16:03:19'),
(11, '0001-0012', '2017-01-01', '2018-01-14 16:04:25', '2018-01-14 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `case_detail_id` int(10) UNSIGNED NOT NULL,
  `offense_id` int(10) UNSIGNED NOT NULL,
  `crime_location_id` int(10) UNSIGNED NOT NULL,
  `crime_classification_id` int(10) UNSIGNED NOT NULL,
  `incident_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_details`
--

INSERT INTO `case_details` (`case_detail_id`, `offense_id`, `crime_location_id`, `crime_classification_id`, `incident_at`, `created_at`, `updated_at`) VALUES
(8, 10, 11, 3, '2017-01-01', '2017-12-11 16:48:47', '2017-12-11 16:48:47'),
(9, 11, 12, 1, '1992-01-01', '2017-12-18 23:20:30', '2017-12-18 23:20:30'),
(10, 12, 13, 7, '2017-01-01', '2018-01-14 16:03:19', '2018-01-14 16:03:19'),
(11, 13, 14, 5, '2017-01-01', '2018-01-14 16:04:25', '2018-01-14 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `case_folders`
--

CREATE TABLE `case_folders` (
  `case_folder_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `case_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_folders`
--

INSERT INTO `case_folders` (`case_folder_id`, `case_id`, `case_image`, `created_at`, `updated_at`) VALUES
(2, 6, '1513011071.png', '2017-12-11 16:51:12', '2017-12-11 16:51:12'),
(3, 7, '1515947421.png', '2018-01-14 16:30:21', '2018-01-14 16:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `case_suspects`
--

CREATE TABLE `case_suspects` (
  `case_suspect_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(11) NOT NULL,
  `suspect_id` int(10) UNSIGNED NOT NULL,
  `suspect_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_suspects`
--

INSERT INTO `case_suspects` (`case_suspect_id`, `case_id`, `suspect_id`, `suspect_status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Alive', '2017-12-18 23:05:15', '2017-12-18 23:05:15'),
(2, 8, 1, 'Something..', '2018-01-16 16:17:18', '2018-01-16 16:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `case_victims`
--

CREATE TABLE `case_victims` (
  `case_victim_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(11) NOT NULL,
  `victim_id` int(11) NOT NULL,
  `victim_status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_victims`
--

INSERT INTO `case_victims` (`case_victim_id`, `case_id`, `victim_id`, `victim_status`, `created_at`, `updated_at`) VALUES
(18, 6, 23, 'Alive', '2017-12-11 16:49:38', '2017-12-11 16:49:38'),
(19, 8, 23, 'Alive', '2018-01-16 16:05:25', '2018-01-16 16:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `crime_categories`
--

CREATE TABLE `crime_categories` (
  `crime_category_id` int(10) UNSIGNED NOT NULL,
  `crime_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crime_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crime_categories`
--

INSERT INTO `crime_categories` (`crime_category_id`, `crime_category_name`, `crime_type_id`, `created_at`, `updated_at`) VALUES
(1, 'CRIME AGAINST PERSON', 1, '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(2, 'CRIME AGAINST PROPERTY', 1, '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(3, 'tests', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crime_classifications`
--

CREATE TABLE `crime_classifications` (
  `crime_classification_id` int(10) UNSIGNED NOT NULL,
  `crime_classification_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crime_classifications`
--

INSERT INTO `crime_classifications` (`crime_classification_id`, `crime_classification_name`, `created_at`, `updated_at`) VALUES
(1, 'Panicide', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(2, 'Infanticide', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(3, 'Murder Case', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(4, 'Serious Physical Injuries', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(5, 'Less Serious Physical Injuries', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(6, 'Attempted Murder', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(7, 'Frustrated Murder', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(8, 'Test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crime_coordinates`
--

CREATE TABLE `crime_coordinates` (
  `crime_coordinate_id` int(11) NOT NULL,
  `crime_coordinate_lat` float NOT NULL,
  `crime_coordinate_long` float NOT NULL,
  `case_detail_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crime_coordinates`
--

INSERT INTO `crime_coordinates` (`crime_coordinate_id`, `crime_coordinate_lat`, `crime_coordinate_long`, `case_detail_id`, `created_at`, `updated_at`) VALUES
(1, 8.47609, 124.634, 11, '2018-01-15 00:04:25', '2018-01-15 00:04:25'),
(2, 8.47609, 124.634, 8, '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(3, 8.47609, 124.634, 9, '2018-01-15 00:00:00', '2018-01-15 00:00:00'),
(4, 8.47609, 124.634, 10, '2018-01-15 00:00:00', '2018-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `crime_locations`
--

CREATE TABLE `crime_locations` (
  `crime_location_id` int(10) UNSIGNED NOT NULL,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crime_locations`
--

INSERT INTO `crime_locations` (`crime_location_id`, `region_id`, `city_id`, `province_id`, `home_address`, `created_at`, `updated_at`) VALUES
(6, '11', '012903', '0129', 'Crime Address1', '2017-11-18 16:56:59', '2017-12-09 08:50:09'),
(7, '15', '153819', '1538', 'Crime Address', '2017-11-18 16:58:58', '2017-11-18 16:58:58'),
(8, '10', '104305', '1043', 'Carmen, Cagayan de Oro City', '2017-12-09 02:50:49', '2017-12-09 02:50:49'),
(9, '10', '104305', '1043', 'Carmen, Cagayan de Oro City', '2017-12-09 02:54:01', '2017-12-09 02:54:01'),
(10, '11', '112504', '1125', 'Carmen, Cagayan de Oro City', '2017-12-10 02:11:02', '2017-12-10 02:11:02'),
(11, '10', '104305', '1043', 'Carmen, Cagayan de Oro City', '2017-12-11 16:48:46', '2017-12-11 16:48:46'),
(12, '10', '104305', '1043', 'Carmen', '2017-12-18 23:20:30', '2018-01-14 14:50:29'),
(13, '10', '104305', '1043', 'Mabuhay Extension, Carmen', '2018-01-14 16:03:19', '2018-01-14 16:03:19'),
(14, '10', '104305', '1043', 'Mabuhay Extension, Carmen', '2018-01-14 16:04:24', '2018-01-14 16:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `crime_types`
--

CREATE TABLE `crime_types` (
  `crime_type_id` int(10) UNSIGNED NOT NULL,
  `crime_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crime_types`
--

INSERT INTO `crime_types` (`crime_type_id`, `crime_type_name`, `created_at`, `updated_at`) VALUES
(1, 'OTHER NONINDEX', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(2, 'INDEX CRIME', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(3, 'SPECIAL LAWS', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(4, 'Tests', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_18_005729_create_police_stations_table', 1),
(4, '2017_11_18_005756_create_user_types_table', 1),
(5, '2017_11_18_005812_create_user_logs_table', 1),
(6, '2017_11_18_010146_create_cases_table', 1),
(7, '2017_11_18_010201_create_case_folders_table', 1),
(8, '2017_11_18_080842_create_case_suspects_table', 1),
(9, '2017_11_18_080857_create_case_victims_table', 1),
(10, '2017_11_18_080925_create_crime_types_table', 1),
(11, '2017_11_18_080933_create_crime_categories_table', 1),
(12, '2017_11_18_080950_create_crime_classifications_table', 1),
(13, '2017_11_18_081001_create_offenses_table', 1),
(14, '2017_11_18_081015_create_case_details_table', 1),
(15, '2017_11_18_081027_create_crime_locations_table', 1),
(16, '2017_11_18_081041_create_case_blotters_table', 1),
(17, '2017_11_18_081055_create_victims_table', 1),
(18, '2017_11_18_081103_create_suspects_table', 1),
(19, '2017_11_18_081126_create_user_assignments_table', 1),
(20, '2017_11_18_081141_create_user_ranks_table', 1),
(21, '2017_11_18_081150_create_ranks_table', 1),
(22, '2017_11_18_082052_create_user_cases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE `offenses` (
  `offense_id` int(10) UNSIGNED NOT NULL,
  `crime_category_id` int(10) UNSIGNED NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offenses`
--

INSERT INTO `offenses` (`offense_id`, `crime_category_id`, `detail`, `created_at`, `updated_at`) VALUES
(10, 2, 'Something happen so badly', '2017-12-11 16:48:47', '2017-12-11 16:48:47'),
(11, 1, 'Something happen so badly', '2017-12-18 23:20:30', '2017-12-18 23:20:30'),
(12, 2, 'Something happen so badly', '2018-01-14 16:03:19', '2018-01-14 16:03:19'),
(13, 2, 'Something happen so badly', '2018-01-14 16:04:25', '2018-01-14 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police_stations`
--

CREATE TABLE `police_stations` (
  `police_station_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Police Officer II', 'Anything..', '2018-01-14 17:20:47', '2018-01-14 17:28:36'),
(2, 'Police Officer II', 'Anything..', '2018-01-14 17:29:32', '2018-01-16 14:59:15'),
(3, 'Police Officer III', NULL, '2018-01-14 17:29:40', '2018-01-14 17:29:40'),
(4, 'Senio Polic Officer I', NULL, '2018-01-14 17:30:06', '2018-01-14 17:30:06'),
(5, 'Senio Polic Officer II', NULL, '2018-01-14 17:30:12', '2018-01-14 17:30:12'),
(6, 'Senio Polic Officer III', NULL, '2018-01-14 17:30:19', '2018-01-14 17:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `refcitymun`
--

CREATE TABLE `refcitymun` (
  `citymun_id` int(255) NOT NULL,
  `psgcCode` varchar(255) DEFAULT NULL,
  `citymunDesc` text,
  `provCode` varchar(255) DEFAULT NULL,
  `citymunCode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refcitymun`
--

INSERT INTO `refcitymun` (`citymun_id`, `psgcCode`, `citymunDesc`, `provCode`, `citymunCode`) VALUES
(1, '012801000', 'ADAMS', '0128', '012801'),
(2, '012802000', 'BACARRA', '0128', '012802'),
(3, '012803000', 'BADOC', '0128', '012803'),
(4, '012804000', 'BANGUI', '0128', '012804'),
(5, '012805000', 'CITY OF BATAC', '0128', '012805'),
(6, '012806000', 'BURGOS', '0128', '012806'),
(7, '012807000', 'CARASI', '0128', '012807'),
(8, '012808000', 'CURRIMAO', '0128', '012808'),
(9, '012809000', 'DINGRAS', '0128', '012809'),
(10, '012810000', 'DUMALNEG', '0128', '012810'),
(11, '012811000', 'BANNA (ESPIRITU)', '0128', '012811'),
(12, '012812000', 'LAOAG CITY (Capital)', '0128', '012812'),
(13, '012813000', 'MARCOS', '0128', '012813'),
(14, '012814000', 'NUEVA ERA', '0128', '012814'),
(15, '012815000', 'PAGUDPUD', '0128', '012815'),
(16, '012816000', 'PAOAY', '0128', '012816'),
(17, '012817000', 'PASUQUIN', '0128', '012817'),
(18, '012818000', 'PIDDIG', '0128', '012818'),
(19, '012819000', 'PINILI', '0128', '012819'),
(20, '012820000', 'SAN NICOLAS', '0128', '012820'),
(21, '012821000', 'SARRAT', '0128', '012821'),
(22, '012822000', 'SOLSONA', '0128', '012822'),
(23, '012823000', 'VINTAR', '0128', '012823'),
(24, '012901000', 'ALILEM', '0129', '012901'),
(25, '012902000', 'BANAYOYO', '0129', '012902'),
(26, '012903000', 'BANTAY', '0129', '012903'),
(27, '012904000', 'BURGOS', '0129', '012904'),
(28, '012905000', 'CABUGAO', '0129', '012905'),
(29, '012906000', 'CITY OF CANDON', '0129', '012906'),
(30, '012907000', 'CAOAYAN', '0129', '012907'),
(31, '012908000', 'CERVANTES', '0129', '012908'),
(32, '012909000', 'GALIMUYOD', '0129', '012909'),
(33, '012910000', 'GREGORIO DEL PILAR (CONCEPCION)', '0129', '012910'),
(34, '012911000', 'LIDLIDDA', '0129', '012911'),
(35, '012912000', 'MAGSINGAL', '0129', '012912'),
(36, '012913000', 'NAGBUKEL', '0129', '012913'),
(37, '012914000', 'NARVACAN', '0129', '012914'),
(38, '012915000', 'QUIRINO (ANGKAKI)', '0129', '012915'),
(39, '012916000', 'SALCEDO (BAUGEN)', '0129', '012916'),
(40, '012917000', 'SAN EMILIO', '0129', '012917'),
(41, '012918000', 'SAN ESTEBAN', '0129', '012918'),
(42, '012919000', 'SAN ILDEFONSO', '0129', '012919'),
(43, '012920000', 'SAN JUAN (LAPOG)', '0129', '012920'),
(44, '012921000', 'SAN VICENTE', '0129', '012921'),
(45, '012922000', 'SANTA', '0129', '012922'),
(46, '012923000', 'SANTA CATALINA', '0129', '012923'),
(47, '012924000', 'SANTA CRUZ', '0129', '012924'),
(48, '012925000', 'SANTA LUCIA', '0129', '012925'),
(49, '012926000', 'SANTA MARIA', '0129', '012926'),
(50, '012927000', 'SANTIAGO', '0129', '012927'),
(51, '012928000', 'SANTO DOMINGO', '0129', '012928'),
(52, '012929000', 'SIGAY', '0129', '012929'),
(53, '012930000', 'SINAIT', '0129', '012930'),
(54, '012931000', 'SUGPON', '0129', '012931'),
(55, '012932000', 'SUYO', '0129', '012932'),
(56, '012933000', 'TAGUDIN', '0129', '012933'),
(57, '012934000', 'CITY OF VIGAN (Capital)', '0129', '012934'),
(58, '013301000', 'AGOO', '0133', '013301'),
(59, '013302000', 'ARINGAY', '0133', '013302'),
(60, '013303000', 'BACNOTAN', '0133', '013303'),
(61, '013304000', 'BAGULIN', '0133', '013304'),
(62, '013305000', 'BALAOAN', '0133', '013305'),
(63, '013306000', 'BANGAR', '0133', '013306'),
(64, '013307000', 'BAUANG', '0133', '013307'),
(65, '013308000', 'BURGOS', '0133', '013308'),
(66, '013309000', 'CABA', '0133', '013309'),
(67, '013310000', 'LUNA', '0133', '013310'),
(68, '013311000', 'NAGUILIAN', '0133', '013311'),
(69, '013312000', 'PUGO', '0133', '013312'),
(70, '013313000', 'ROSARIO', '0133', '013313'),
(71, '013314000', 'CITY OF SAN FERNANDO (Capital)', '0133', '013314'),
(72, '013315000', 'SAN GABRIEL', '0133', '013315'),
(73, '013316000', 'SAN JUAN', '0133', '013316'),
(74, '013317000', 'SANTO TOMAS', '0133', '013317'),
(75, '013318000', 'SANTOL', '0133', '013318'),
(76, '013319000', 'SUDIPEN', '0133', '013319'),
(77, '013320000', 'TUBAO', '0133', '013320'),
(78, '015501000', 'AGNO', '0155', '015501'),
(79, '015502000', 'AGUILAR', '0155', '015502'),
(80, '015503000', 'CITY OF ALAMINOS', '0155', '015503'),
(81, '015504000', 'ALCALA', '0155', '015504'),
(82, '015505000', 'ANDA', '0155', '015505'),
(83, '015506000', 'ASINGAN', '0155', '015506'),
(84, '015507000', 'BALUNGAO', '0155', '015507'),
(85, '015508000', 'BANI', '0155', '015508'),
(86, '015509000', 'BASISTA', '0155', '015509'),
(87, '015510000', 'BAUTISTA', '0155', '015510'),
(88, '015511000', 'BAYAMBANG', '0155', '015511'),
(89, '015512000', 'BINALONAN', '0155', '015512'),
(90, '015513000', 'BINMALEY', '0155', '015513'),
(91, '015514000', 'BOLINAO', '0155', '015514'),
(92, '015515000', 'BUGALLON', '0155', '015515'),
(93, '015516000', 'BURGOS', '0155', '015516'),
(94, '015517000', 'CALASIAO', '0155', '015517'),
(95, '015518000', 'DAGUPAN CITY', '0155', '015518'),
(96, '015519000', 'DASOL', '0155', '015519'),
(97, '015520000', 'INFANTA', '0155', '015520'),
(98, '015521000', 'LABRADOR', '0155', '015521'),
(99, '015522000', 'LINGAYEN (Capital)', '0155', '015522'),
(100, '015523000', 'MABINI', '0155', '015523'),
(101, '015524000', 'MALASIQUI', '0155', '015524'),
(102, '015525000', 'MANAOAG', '0155', '015525'),
(103, '015526000', 'MANGALDAN', '0155', '015526'),
(104, '015527000', 'MANGATAREM', '0155', '015527'),
(105, '015528000', 'MAPANDAN', '0155', '015528'),
(106, '015529000', 'NATIVIDAD', '0155', '015529'),
(107, '015530000', 'POZORRUBIO', '0155', '015530'),
(108, '015531000', 'ROSALES', '0155', '015531'),
(109, '015532000', 'SAN CARLOS CITY', '0155', '015532'),
(110, '015533000', 'SAN FABIAN', '0155', '015533'),
(111, '015534000', 'SAN JACINTO', '0155', '015534'),
(112, '015535000', 'SAN MANUEL', '0155', '015535'),
(113, '015536000', 'SAN NICOLAS', '0155', '015536'),
(114, '015537000', 'SAN QUINTIN', '0155', '015537'),
(115, '015538000', 'SANTA BARBARA', '0155', '015538'),
(116, '015539000', 'SANTA MARIA', '0155', '015539'),
(117, '015540000', 'SANTO TOMAS', '0155', '015540'),
(118, '015541000', 'SISON', '0155', '015541'),
(119, '015542000', 'SUAL', '0155', '015542'),
(120, '015543000', 'TAYUG', '0155', '015543'),
(121, '015544000', 'UMINGAN', '0155', '015544'),
(122, '015545000', 'URBIZTONDO', '0155', '015545'),
(123, '015546000', 'CITY OF URDANETA', '0155', '015546'),
(124, '015547000', 'VILLASIS', '0155', '015547'),
(125, '015548000', 'LAOAC', '0155', '015548'),
(126, '020901000', 'BASCO (Capital)', '0209', '020901'),
(127, '020902000', 'ITBAYAT', '0209', '020902'),
(128, '020903000', 'IVANA', '0209', '020903'),
(129, '020904000', 'MAHATAO', '0209', '020904'),
(130, '020905000', 'SABTANG', '0209', '020905'),
(131, '020906000', 'UYUGAN', '0209', '020906'),
(132, '021501000', 'ABULUG', '0215', '021501'),
(133, '021502000', 'ALCALA', '0215', '021502'),
(134, '021503000', 'ALLACAPAN', '0215', '021503'),
(135, '021504000', 'AMULUNG', '0215', '021504'),
(136, '021505000', 'APARRI', '0215', '021505'),
(137, '021506000', 'BAGGAO', '0215', '021506'),
(138, '021507000', 'BALLESTEROS', '0215', '021507'),
(139, '021508000', 'BUGUEY', '0215', '021508'),
(140, '021509000', 'CALAYAN', '0215', '021509'),
(141, '021510000', 'CAMALANIUGAN', '0215', '021510'),
(142, '021511000', 'CLAVERIA', '0215', '021511'),
(143, '021512000', 'ENRILE', '0215', '021512'),
(144, '021513000', 'GATTARAN', '0215', '021513'),
(145, '021514000', 'GONZAGA', '0215', '021514'),
(146, '021515000', 'IGUIG', '0215', '021515'),
(147, '021516000', 'LAL-LO', '0215', '021516'),
(148, '021517000', 'LASAM', '0215', '021517'),
(149, '021518000', 'PAMPLONA', '0215', '021518'),
(150, '021519000', 'PEÑABLANCA', '0215', '021519'),
(151, '021520000', 'PIAT', '0215', '021520'),
(152, '021521000', 'RIZAL', '0215', '021521'),
(153, '021522000', 'SANCHEZ-MIRA', '0215', '021522'),
(154, '021523000', 'SANTA ANA', '0215', '021523'),
(155, '021524000', 'SANTA PRAXEDES', '0215', '021524'),
(156, '021525000', 'SANTA TERESITA', '0215', '021525'),
(157, '021526000', 'SANTO NIÑO (FAIRE)', '0215', '021526'),
(158, '021527000', 'SOLANA', '0215', '021527'),
(159, '021528000', 'TUAO', '0215', '021528'),
(160, '021529000', 'TUGUEGARAO CITY (Capital)', '0215', '021529'),
(161, '023101000', 'ALICIA', '0231', '023101'),
(162, '023102000', 'ANGADANAN', '0231', '023102'),
(163, '023103000', 'AURORA', '0231', '023103'),
(164, '023104000', 'BENITO SOLIVEN', '0231', '023104'),
(165, '023105000', 'BURGOS', '0231', '023105'),
(166, '023106000', 'CABAGAN', '0231', '023106'),
(167, '023107000', 'CABATUAN', '0231', '023107'),
(168, '023108000', 'CITY OF CAUAYAN', '0231', '023108'),
(169, '023109000', 'CORDON', '0231', '023109'),
(170, '023110000', 'DINAPIGUE', '0231', '023110'),
(171, '023111000', 'DIVILACAN', '0231', '023111'),
(172, '023112000', 'ECHAGUE', '0231', '023112'),
(173, '023113000', 'GAMU', '0231', '023113'),
(174, '023114000', 'ILAGAN CITY (Capital)', '0231', '023114'),
(175, '023115000', 'JONES', '0231', '023115'),
(176, '023116000', 'LUNA', '0231', '023116'),
(177, '023117000', 'MACONACON', '0231', '023117'),
(178, '023118000', 'DELFIN ALBANO (MAGSAYSAY)', '0231', '023118'),
(179, '023119000', 'MALLIG', '0231', '023119'),
(180, '023120000', 'NAGUILIAN', '0231', '023120'),
(181, '023121000', 'PALANAN', '0231', '023121'),
(182, '023122000', 'QUEZON', '0231', '023122'),
(183, '023123000', 'QUIRINO', '0231', '023123'),
(184, '023124000', 'RAMON', '0231', '023124'),
(185, '023125000', 'REINA MERCEDES', '0231', '023125'),
(186, '023126000', 'ROXAS', '0231', '023126'),
(187, '023127000', 'SAN AGUSTIN', '0231', '023127'),
(188, '023128000', 'SAN GUILLERMO', '0231', '023128'),
(189, '023129000', 'SAN ISIDRO', '0231', '023129'),
(190, '023130000', 'SAN MANUEL', '0231', '023130'),
(191, '023131000', 'SAN MARIANO', '0231', '023131'),
(192, '023132000', 'SAN MATEO', '0231', '023132'),
(193, '023133000', 'SAN PABLO', '0231', '023133'),
(194, '023134000', 'SANTA MARIA', '0231', '023134'),
(195, '023135000', 'CITY OF SANTIAGO', '0231', '023135'),
(196, '023136000', 'SANTO TOMAS', '0231', '023136'),
(197, '023137000', 'TUMAUINI', '0231', '023137'),
(198, '025001000', 'AMBAGUIO', '0250', '025001'),
(199, '025002000', 'ARITAO', '0250', '025002'),
(200, '025003000', 'BAGABAG', '0250', '025003'),
(201, '025004000', 'BAMBANG', '0250', '025004'),
(202, '025005000', 'BAYOMBONG (Capital)', '0250', '025005'),
(203, '025006000', 'DIADI', '0250', '025006'),
(204, '025007000', 'DUPAX DEL NORTE', '0250', '025007'),
(205, '025008000', 'DUPAX DEL SUR', '0250', '025008'),
(206, '025009000', 'KASIBU', '0250', '025009'),
(207, '025010000', 'KAYAPA', '0250', '025010'),
(208, '025011000', 'QUEZON', '0250', '025011'),
(209, '025012000', 'SANTA FE', '0250', '025012'),
(210, '025013000', 'SOLANO', '0250', '025013'),
(211, '025014000', 'VILLAVERDE', '0250', '025014'),
(212, '025015000', 'ALFONSO CASTANEDA', '0250', '025015'),
(213, '025701000', 'AGLIPAY', '0257', '025701'),
(214, '025702000', 'CABARROGUIS (Capital)', '0257', '025702'),
(215, '025703000', 'DIFFUN', '0257', '025703'),
(216, '025704000', 'MADDELA', '0257', '025704'),
(217, '025705000', 'SAGUDAY', '0257', '025705'),
(218, '025706000', 'NAGTIPUNAN', '0257', '025706'),
(219, '030801000', 'ABUCAY', '0308', '030801'),
(220, '030802000', 'BAGAC', '0308', '030802'),
(221, '030803000', 'CITY OF BALANGA (Capital)', '0308', '030803'),
(222, '030804000', 'DINALUPIHAN', '0308', '030804'),
(223, '030805000', 'HERMOSA', '0308', '030805'),
(224, '030806000', 'LIMAY', '0308', '030806'),
(225, '030807000', 'MARIVELES', '0308', '030807'),
(226, '030808000', 'MORONG', '0308', '030808'),
(227, '030809000', 'ORANI', '0308', '030809'),
(228, '030810000', 'ORION', '0308', '030810'),
(229, '030811000', 'PILAR', '0308', '030811'),
(230, '030812000', 'SAMAL', '0308', '030812'),
(231, '031401000', 'ANGAT', '0314', '031401'),
(232, '031402000', 'BALAGTAS (BIGAA)', '0314', '031402'),
(233, '031403000', 'BALIUAG', '0314', '031403'),
(234, '031404000', 'BOCAUE', '0314', '031404'),
(235, '031405000', 'BULACAN', '0314', '031405'),
(236, '031406000', 'BUSTOS', '0314', '031406'),
(237, '031407000', 'CALUMPIT', '0314', '031407'),
(238, '031408000', 'GUIGUINTO', '0314', '031408'),
(239, '031409000', 'HAGONOY', '0314', '031409'),
(240, '031410000', 'CITY OF MALOLOS (Capital)', '0314', '031410'),
(241, '031411000', 'MARILAO', '0314', '031411'),
(242, '031412000', 'CITY OF MEYCAUAYAN', '0314', '031412'),
(243, '031413000', 'NORZAGARAY', '0314', '031413'),
(244, '031414000', 'OBANDO', '0314', '031414'),
(245, '031415000', 'PANDI', '0314', '031415'),
(246, '031416000', 'PAOMBONG', '0314', '031416'),
(247, '031417000', 'PLARIDEL', '0314', '031417'),
(248, '031418000', 'PULILAN', '0314', '031418'),
(249, '031419000', 'SAN ILDEFONSO', '0314', '031419'),
(250, '031420000', 'CITY OF SAN JOSE DEL MONTE', '0314', '031420'),
(251, '031421000', 'SAN MIGUEL', '0314', '031421'),
(252, '031422000', 'SAN RAFAEL', '0314', '031422'),
(253, '031423000', 'SANTA MARIA', '0314', '031423'),
(254, '031424000', 'DOÑA REMEDIOS TRINIDAD', '0314', '031424'),
(255, '034901000', 'ALIAGA', '0349', '034901'),
(256, '034902000', 'BONGABON', '0349', '034902'),
(257, '034903000', 'CABANATUAN CITY', '0349', '034903'),
(258, '034904000', 'CABIAO', '0349', '034904'),
(259, '034905000', 'CARRANGLAN', '0349', '034905'),
(260, '034906000', 'CUYAPO', '0349', '034906'),
(261, '034907000', 'GABALDON (BITULOK & SABANI)', '0349', '034907'),
(262, '034908000', 'CITY OF GAPAN', '0349', '034908'),
(263, '034909000', 'GENERAL MAMERTO NATIVIDAD', '0349', '034909'),
(264, '034910000', 'GENERAL TINIO (PAPAYA)', '0349', '034910'),
(265, '034911000', 'GUIMBA', '0349', '034911'),
(266, '034912000', 'JAEN', '0349', '034912'),
(267, '034913000', 'LAUR', '0349', '034913'),
(268, '034914000', 'LICAB', '0349', '034914'),
(269, '034915000', 'LLANERA', '0349', '034915'),
(270, '034916000', 'LUPAO', '0349', '034916'),
(271, '034917000', 'SCIENCE CITY OF MUÑOZ', '0349', '034917'),
(272, '034918000', 'NAMPICUAN', '0349', '034918'),
(273, '034919000', 'PALAYAN CITY (Capital)', '0349', '034919'),
(274, '034920000', 'PANTABANGAN', '0349', '034920'),
(275, '034921000', 'PEÑARANDA', '0349', '034921'),
(276, '034922000', 'QUEZON', '0349', '034922'),
(277, '034923000', 'RIZAL', '0349', '034923'),
(278, '034924000', 'SAN ANTONIO', '0349', '034924'),
(279, '034925000', 'SAN ISIDRO', '0349', '034925'),
(280, '034926000', 'SAN JOSE CITY', '0349', '034926'),
(281, '034927000', 'SAN LEONARDO', '0349', '034927'),
(282, '034928000', 'SANTA ROSA', '0349', '034928'),
(283, '034929000', 'SANTO DOMINGO', '0349', '034929'),
(284, '034930000', 'TALAVERA', '0349', '034930'),
(285, '034931000', 'TALUGTUG', '0349', '034931'),
(286, '034932000', 'ZARAGOZA', '0349', '034932'),
(287, '035401000', 'ANGELES CITY', '0354', '035401'),
(288, '035402000', 'APALIT', '0354', '035402'),
(289, '035403000', 'ARAYAT', '0354', '035403'),
(290, '035404000', 'BACOLOR', '0354', '035404'),
(291, '035405000', 'CANDABA', '0354', '035405'),
(292, '035406000', 'FLORIDABLANCA', '0354', '035406'),
(293, '035407000', 'GUAGUA', '0354', '035407'),
(294, '035408000', 'LUBAO', '0354', '035408'),
(295, '035409000', 'MABALACAT CITY', '0354', '035409'),
(296, '035410000', 'MACABEBE', '0354', '035410'),
(297, '035411000', 'MAGALANG', '0354', '035411'),
(298, '035412000', 'MASANTOL', '0354', '035412'),
(299, '035413000', 'MEXICO', '0354', '035413'),
(300, '035414000', 'MINALIN', '0354', '035414'),
(301, '035415000', 'PORAC', '0354', '035415'),
(302, '035416000', 'CITY OF SAN FERNANDO (Capital)', '0354', '035416'),
(303, '035417000', 'SAN LUIS', '0354', '035417'),
(304, '035418000', 'SAN SIMON', '0354', '035418'),
(305, '035419000', 'SANTA ANA', '0354', '035419'),
(306, '035420000', 'SANTA RITA', '0354', '035420'),
(307, '035421000', 'SANTO TOMAS', '0354', '035421'),
(308, '035422000', 'SASMUAN (Sexmoan)', '0354', '035422'),
(309, '036901000', 'ANAO', '0369', '036901'),
(310, '036902000', 'BAMBAN', '0369', '036902'),
(311, '036903000', 'CAMILING', '0369', '036903'),
(312, '036904000', 'CAPAS', '0369', '036904'),
(313, '036905000', 'CONCEPCION', '0369', '036905'),
(314, '036906000', 'GERONA', '0369', '036906'),
(315, '036907000', 'LA PAZ', '0369', '036907'),
(316, '036908000', 'MAYANTOC', '0369', '036908'),
(317, '036909000', 'MONCADA', '0369', '036909'),
(318, '036910000', 'PANIQUI', '0369', '036910'),
(319, '036911000', 'PURA', '0369', '036911'),
(320, '036912000', 'RAMOS', '0369', '036912'),
(321, '036913000', 'SAN CLEMENTE', '0369', '036913'),
(322, '036914000', 'SAN MANUEL', '0369', '036914'),
(323, '036915000', 'SANTA IGNACIA', '0369', '036915'),
(324, '036916000', 'CITY OF TARLAC (Capital)', '0369', '036916'),
(325, '036917000', 'VICTORIA', '0369', '036917'),
(326, '036918000', 'SAN JOSE', '0369', '036918'),
(327, '037101000', 'BOTOLAN', '0371', '037101'),
(328, '037102000', 'CABANGAN', '0371', '037102'),
(329, '037103000', 'CANDELARIA', '0371', '037103'),
(330, '037104000', 'CASTILLEJOS', '0371', '037104'),
(331, '037105000', 'IBA (Capital)', '0371', '037105'),
(332, '037106000', 'MASINLOC', '0371', '037106'),
(333, '037107000', 'OLONGAPO CITY', '0371', '037107'),
(334, '037108000', 'PALAUIG', '0371', '037108'),
(335, '037109000', 'SAN ANTONIO', '0371', '037109'),
(336, '037110000', 'SAN FELIPE', '0371', '037110'),
(337, '037111000', 'SAN MARCELINO', '0371', '037111'),
(338, '037112000', 'SAN NARCISO', '0371', '037112'),
(339, '037113000', 'SANTA CRUZ', '0371', '037113'),
(340, '037114000', 'SUBIC', '0371', '037114'),
(341, '037701000', 'BALER (Capital)', '0377', '037701'),
(342, '037702000', 'CASIGURAN', '0377', '037702'),
(343, '037703000', 'DILASAG', '0377', '037703'),
(344, '037704000', 'DINALUNGAN', '0377', '037704'),
(345, '037705000', 'DINGALAN', '0377', '037705'),
(346, '037706000', 'DIPACULAO', '0377', '037706'),
(347, '037707000', 'MARIA AURORA', '0377', '037707'),
(348, '037708000', 'SAN LUIS', '0377', '037708'),
(349, '041001000', 'AGONCILLO', '0410', '041001'),
(350, '041002000', 'ALITAGTAG', '0410', '041002'),
(351, '041003000', 'BALAYAN', '0410', '041003'),
(352, '041004000', 'BALETE', '0410', '041004'),
(353, '041005000', 'BATANGAS CITY (Capital)', '0410', '041005'),
(354, '041006000', 'BAUAN', '0410', '041006'),
(355, '041007000', 'CALACA', '0410', '041007'),
(356, '041008000', 'CALATAGAN', '0410', '041008'),
(357, '041009000', 'CUENCA', '0410', '041009'),
(358, '041010000', 'IBAAN', '0410', '041010'),
(359, '041011000', 'LAUREL', '0410', '041011'),
(360, '041012000', 'LEMERY', '0410', '041012'),
(361, '041013000', 'LIAN', '0410', '041013'),
(362, '041014000', 'LIPA CITY', '0410', '041014'),
(363, '041015000', 'LOBO', '0410', '041015'),
(364, '041016000', 'MABINI', '0410', '041016'),
(365, '041017000', 'MALVAR', '0410', '041017'),
(366, '041018000', 'MATAASNAKAHOY', '0410', '041018'),
(367, '041019000', 'NASUGBU', '0410', '041019'),
(368, '041020000', 'PADRE GARCIA', '0410', '041020'),
(369, '041021000', 'ROSARIO', '0410', '041021'),
(370, '041022000', 'SAN JOSE', '0410', '041022'),
(371, '041023000', 'SAN JUAN', '0410', '041023'),
(372, '041024000', 'SAN LUIS', '0410', '041024'),
(373, '041025000', 'SAN NICOLAS', '0410', '041025'),
(374, '041026000', 'SAN PASCUAL', '0410', '041026'),
(375, '041027000', 'SANTA TERESITA', '0410', '041027'),
(376, '041028000', 'SANTO TOMAS', '0410', '041028'),
(377, '041029000', 'TAAL', '0410', '041029'),
(378, '041030000', 'TALISAY', '0410', '041030'),
(379, '041031000', 'CITY OF TANAUAN', '0410', '041031'),
(380, '041032000', 'TAYSAN', '0410', '041032'),
(381, '041033000', 'TINGLOY', '0410', '041033'),
(382, '041034000', 'TUY', '0410', '041034'),
(383, '042101000', 'ALFONSO', '0421', '042101'),
(384, '042102000', 'AMADEO', '0421', '042102'),
(385, '042103000', 'BACOOR CITY', '0421', '042103'),
(386, '042104000', 'CARMONA', '0421', '042104'),
(387, '042105000', 'CAVITE CITY', '0421', '042105'),
(388, '042106000', 'CITY OF DASMARIÑAS', '0421', '042106'),
(389, '042107000', 'GENERAL EMILIO AGUINALDO', '0421', '042107'),
(390, '042108000', 'GENERAL TRIAS', '0421', '042108'),
(391, '042109000', 'IMUS CITY', '0421', '042109'),
(392, '042110000', 'INDANG', '0421', '042110'),
(393, '042111000', 'KAWIT', '0421', '042111'),
(394, '042112000', 'MAGALLANES', '0421', '042112'),
(395, '042113000', 'MARAGONDON', '0421', '042113'),
(396, '042114000', 'MENDEZ (MENDEZ-NUÑEZ)', '0421', '042114'),
(397, '042115000', 'NAIC', '0421', '042115'),
(398, '042116000', 'NOVELETA', '0421', '042116'),
(399, '042117000', 'ROSARIO', '0421', '042117'),
(400, '042118000', 'SILANG', '0421', '042118'),
(401, '042119000', 'TAGAYTAY CITY', '0421', '042119'),
(402, '042120000', 'TANZA', '0421', '042120'),
(403, '042121000', 'TERNATE', '0421', '042121'),
(404, '042122000', 'TRECE MARTIRES CITY (Capital)', '0421', '042122'),
(405, '042123000', 'GEN. MARIANO ALVAREZ', '0421', '042123'),
(406, '043401000', 'ALAMINOS', '0434', '043401'),
(407, '043402000', 'BAY', '0434', '043402'),
(408, '043403000', 'CITY OF BIÑAN', '0434', '043403'),
(409, '043404000', 'CABUYAO CITY', '0434', '043404'),
(410, '043405000', 'CITY OF CALAMBA', '0434', '043405'),
(411, '043406000', 'CALAUAN', '0434', '043406'),
(412, '043407000', 'CAVINTI', '0434', '043407'),
(413, '043408000', 'FAMY', '0434', '043408'),
(414, '043409000', 'KALAYAAN', '0434', '043409'),
(415, '043410000', 'LILIW', '0434', '043410'),
(416, '043411000', 'LOS BAÑOS', '0434', '043411'),
(417, '043412000', 'LUISIANA', '0434', '043412'),
(418, '043413000', 'LUMBAN', '0434', '043413'),
(419, '043414000', 'MABITAC', '0434', '043414'),
(420, '043415000', 'MAGDALENA', '0434', '043415'),
(421, '043416000', 'MAJAYJAY', '0434', '043416'),
(422, '043417000', 'NAGCARLAN', '0434', '043417'),
(423, '043418000', 'PAETE', '0434', '043418'),
(424, '043419000', 'PAGSANJAN', '0434', '043419'),
(425, '043420000', 'PAKIL', '0434', '043420'),
(426, '043421000', 'PANGIL', '0434', '043421'),
(427, '043422000', 'PILA', '0434', '043422'),
(428, '043423000', 'RIZAL', '0434', '043423'),
(429, '043424000', 'SAN PABLO CITY', '0434', '043424'),
(430, '043425000', 'CITY OF SAN PEDRO', '0434', '043425'),
(431, '043426000', 'SANTA CRUZ (Capital)', '0434', '043426'),
(432, '043427000', 'SANTA MARIA', '0434', '043427'),
(433, '043428000', 'CITY OF SANTA ROSA', '0434', '043428'),
(434, '043429000', 'SINILOAN', '0434', '043429'),
(435, '043430000', 'VICTORIA', '0434', '043430'),
(436, '045601000', 'AGDANGAN', '0456', '045601'),
(437, '045602000', 'ALABAT', '0456', '045602'),
(438, '045603000', 'ATIMONAN', '0456', '045603'),
(439, '045605000', 'BUENAVISTA', '0456', '045605'),
(440, '045606000', 'BURDEOS', '0456', '045606'),
(441, '045607000', 'CALAUAG', '0456', '045607'),
(442, '045608000', 'CANDELARIA', '0456', '045608'),
(443, '045610000', 'CATANAUAN', '0456', '045610'),
(444, '045615000', 'DOLORES', '0456', '045615'),
(445, '045616000', 'GENERAL LUNA', '0456', '045616'),
(446, '045617000', 'GENERAL NAKAR', '0456', '045617'),
(447, '045618000', 'GUINAYANGAN', '0456', '045618'),
(448, '045619000', 'GUMACA', '0456', '045619'),
(449, '045620000', 'INFANTA', '0456', '045620'),
(450, '045621000', 'JOMALIG', '0456', '045621'),
(451, '045622000', 'LOPEZ', '0456', '045622'),
(452, '045623000', 'LUCBAN', '0456', '045623'),
(453, '045624000', 'LUCENA CITY (Capital)', '0456', '045624'),
(454, '045625000', 'MACALELON', '0456', '045625'),
(455, '045627000', 'MAUBAN', '0456', '045627'),
(456, '045628000', 'MULANAY', '0456', '045628'),
(457, '045629000', 'PADRE BURGOS', '0456', '045629'),
(458, '045630000', 'PAGBILAO', '0456', '045630'),
(459, '045631000', 'PANUKULAN', '0456', '045631'),
(460, '045632000', 'PATNANUNGAN', '0456', '045632'),
(461, '045633000', 'PEREZ', '0456', '045633'),
(462, '045634000', 'PITOGO', '0456', '045634'),
(463, '045635000', 'PLARIDEL', '0456', '045635'),
(464, '045636000', 'POLILLO', '0456', '045636'),
(465, '045637000', 'QUEZON', '0456', '045637'),
(466, '045638000', 'REAL', '0456', '045638'),
(467, '045639000', 'SAMPALOC', '0456', '045639'),
(468, '045640000', 'SAN ANDRES', '0456', '045640'),
(469, '045641000', 'SAN ANTONIO', '0456', '045641'),
(470, '045642000', 'SAN FRANCISCO (AURORA)', '0456', '045642'),
(471, '045644000', 'SAN NARCISO', '0456', '045644'),
(472, '045645000', 'SARIAYA', '0456', '045645'),
(473, '045646000', 'TAGKAWAYAN', '0456', '045646'),
(474, '045647000', 'CITY OF TAYABAS', '0456', '045647'),
(475, '045648000', 'TIAONG', '0456', '045648'),
(476, '045649000', 'UNISAN', '0456', '045649'),
(477, '045801000', 'ANGONO', '0458', '045801'),
(478, '045802000', 'CITY OF ANTIPOLO', '0458', '045802'),
(479, '045803000', 'BARAS', '0458', '045803'),
(480, '045804000', 'BINANGONAN', '0458', '045804'),
(481, '045805000', 'CAINTA', '0458', '045805'),
(482, '045806000', 'CARDONA', '0458', '045806'),
(483, '045807000', 'JALA-JALA', '0458', '045807'),
(484, '045808000', 'RODRIGUEZ (MONTALBAN)', '0458', '045808'),
(485, '045809000', 'MORONG', '0458', '045809'),
(486, '045810000', 'PILILLA', '0458', '045810'),
(487, '045811000', 'SAN MATEO', '0458', '045811'),
(488, '045812000', 'TANAY', '0458', '045812'),
(489, '045813000', 'TAYTAY', '0458', '045813'),
(490, '045814000', 'TERESA', '0458', '045814'),
(491, '174001000', 'BOAC (Capital)', '1740', '174001'),
(492, '174002000', 'BUENAVISTA', '1740', '174002'),
(493, '174003000', 'GASAN', '1740', '174003'),
(494, '174004000', 'MOGPOG', '1740', '174004'),
(495, '174005000', 'SANTA CRUZ', '1740', '174005'),
(496, '174006000', 'TORRIJOS', '1740', '174006'),
(497, '175101000', 'ABRA DE ILOG', '1751', '175101'),
(498, '175102000', 'CALINTAAN', '1751', '175102'),
(499, '175103000', 'LOOC', '1751', '175103'),
(500, '175104000', 'LUBANG', '1751', '175104'),
(501, '175105000', 'MAGSAYSAY', '1751', '175105'),
(502, '175106000', 'MAMBURAO (Capital)', '1751', '175106'),
(503, '175107000', 'PALUAN', '1751', '175107'),
(504, '175108000', 'RIZAL', '1751', '175108'),
(505, '175109000', 'SABLAYAN', '1751', '175109'),
(506, '175110000', 'SAN JOSE', '1751', '175110'),
(507, '175111000', 'SANTA CRUZ', '1751', '175111'),
(508, '175201000', 'BACO', '1752', '175201'),
(509, '175202000', 'BANSUD', '1752', '175202'),
(510, '175203000', 'BONGABONG', '1752', '175203'),
(511, '175204000', 'BULALACAO (SAN PEDRO)', '1752', '175204'),
(512, '175205000', 'CITY OF CALAPAN (Capital)', '1752', '175205'),
(513, '175206000', 'GLORIA', '1752', '175206'),
(514, '175207000', 'MANSALAY', '1752', '175207'),
(515, '175208000', 'NAUJAN', '1752', '175208'),
(516, '175209000', 'PINAMALAYAN', '1752', '175209'),
(517, '175210000', 'POLA', '1752', '175210'),
(518, '175211000', 'PUERTO GALERA', '1752', '175211'),
(519, '175212000', 'ROXAS', '1752', '175212'),
(520, '175213000', 'SAN TEODORO', '1752', '175213'),
(521, '175214000', 'SOCORRO', '1752', '175214'),
(522, '175215000', 'VICTORIA', '1752', '175215'),
(523, '175301000', 'ABORLAN', '1753', '175301'),
(524, '175302000', 'AGUTAYA', '1753', '175302'),
(525, '175303000', 'ARACELI', '1753', '175303'),
(526, '175304000', 'BALABAC', '1753', '175304'),
(527, '175305000', 'BATARAZA', '1753', '175305'),
(528, '175306000', 'BROOKE\'S POINT', '1753', '175306'),
(529, '175307000', 'BUSUANGA', '1753', '175307'),
(530, '175308000', 'CAGAYANCILLO', '1753', '175308'),
(531, '175309000', 'CORON', '1753', '175309'),
(532, '175310000', 'CUYO', '1753', '175310'),
(533, '175311000', 'DUMARAN', '1753', '175311'),
(534, '175312000', 'EL NIDO (BACUIT)', '1753', '175312'),
(535, '175313000', 'LINAPACAN', '1753', '175313'),
(536, '175314000', 'MAGSAYSAY', '1753', '175314'),
(537, '175315000', 'NARRA', '1753', '175315'),
(538, '175316000', 'PUERTO PRINCESA CITY (Capital)', '1753', '175316'),
(539, '175317000', 'QUEZON', '1753', '175317'),
(540, '175318000', 'ROXAS', '1753', '175318'),
(541, '175319000', 'SAN VICENTE', '1753', '175319'),
(542, '175320000', 'TAYTAY', '1753', '175320'),
(543, '175321000', 'KALAYAAN', '1753', '175321'),
(544, '175322000', 'CULION', '1753', '175322'),
(545, '175323000', 'RIZAL (MARCOS)', '1753', '175323'),
(546, '175324000', 'SOFRONIO ESPAÑOLA', '1753', '175324'),
(547, '175901000', 'ALCANTARA', '1759', '175901'),
(548, '175902000', 'BANTON', '1759', '175902'),
(549, '175903000', 'CAJIDIOCAN', '1759', '175903'),
(550, '175904000', 'CALATRAVA', '1759', '175904'),
(551, '175905000', 'CONCEPCION', '1759', '175905'),
(552, '175906000', 'CORCUERA', '1759', '175906'),
(553, '175907000', 'LOOC', '1759', '175907'),
(554, '175908000', 'MAGDIWANG', '1759', '175908'),
(555, '175909000', 'ODIONGAN', '1759', '175909'),
(556, '175910000', 'ROMBLON (Capital)', '1759', '175910'),
(557, '175911000', 'SAN AGUSTIN', '1759', '175911'),
(558, '175912000', 'SAN ANDRES', '1759', '175912'),
(559, '175913000', 'SAN FERNANDO', '1759', '175913'),
(560, '175914000', 'SAN JOSE', '1759', '175914'),
(561, '175915000', 'SANTA FE', '1759', '175915'),
(562, '175916000', 'FERROL', '1759', '175916'),
(563, '175917000', 'SANTA MARIA (IMELDA)', '1759', '175917'),
(564, '050501000', 'BACACAY', '0505', '050501'),
(565, '050502000', 'CAMALIG', '0505', '050502'),
(566, '050503000', 'DARAGA (LOCSIN)', '0505', '050503'),
(567, '050504000', 'GUINOBATAN', '0505', '050504'),
(568, '050505000', 'JOVELLAR', '0505', '050505'),
(569, '050506000', 'LEGAZPI CITY (Capital)', '0505', '050506'),
(570, '050507000', 'LIBON', '0505', '050507'),
(571, '050508000', 'CITY OF LIGAO', '0505', '050508'),
(572, '050509000', 'MALILIPOT', '0505', '050509'),
(573, '050510000', 'MALINAO', '0505', '050510'),
(574, '050511000', 'MANITO', '0505', '050511'),
(575, '050512000', 'OAS', '0505', '050512'),
(576, '050513000', 'PIO DURAN', '0505', '050513'),
(577, '050514000', 'POLANGUI', '0505', '050514'),
(578, '050515000', 'RAPU-RAPU', '0505', '050515'),
(579, '050516000', 'SANTO DOMINGO (LIBOG)', '0505', '050516'),
(580, '050517000', 'CITY OF TABACO', '0505', '050517'),
(581, '050518000', 'TIWI', '0505', '050518'),
(582, '051601000', 'BASUD', '0516', '051601'),
(583, '051602000', 'CAPALONGA', '0516', '051602'),
(584, '051603000', 'DAET (Capital)', '0516', '051603'),
(585, '051604000', 'SAN LORENZO RUIZ (IMELDA)', '0516', '051604'),
(586, '051605000', 'JOSE PANGANIBAN', '0516', '051605'),
(587, '051606000', 'LABO', '0516', '051606'),
(588, '051607000', 'MERCEDES', '0516', '051607'),
(589, '051608000', 'PARACALE', '0516', '051608'),
(590, '051609000', 'SAN VICENTE', '0516', '051609'),
(591, '051610000', 'SANTA ELENA', '0516', '051610'),
(592, '051611000', 'TALISAY', '0516', '051611'),
(593, '051612000', 'VINZONS', '0516', '051612'),
(594, '051701000', 'BAAO', '0517', '051701'),
(595, '051702000', 'BALATAN', '0517', '051702'),
(596, '051703000', 'BATO', '0517', '051703'),
(597, '051704000', 'BOMBON', '0517', '051704'),
(598, '051705000', 'BUHI', '0517', '051705'),
(599, '051706000', 'BULA', '0517', '051706'),
(600, '051707000', 'CABUSAO', '0517', '051707'),
(601, '051708000', 'CALABANGA', '0517', '051708'),
(602, '051709000', 'CAMALIGAN', '0517', '051709'),
(603, '051710000', 'CANAMAN', '0517', '051710'),
(604, '051711000', 'CARAMOAN', '0517', '051711'),
(605, '051712000', 'DEL GALLEGO', '0517', '051712'),
(606, '051713000', 'GAINZA', '0517', '051713'),
(607, '051714000', 'GARCHITORENA', '0517', '051714'),
(608, '051715000', 'GOA', '0517', '051715'),
(609, '051716000', 'IRIGA CITY', '0517', '051716'),
(610, '051717000', 'LAGONOY', '0517', '051717'),
(611, '051718000', 'LIBMANAN', '0517', '051718'),
(612, '051719000', 'LUPI', '0517', '051719'),
(613, '051720000', 'MAGARAO', '0517', '051720'),
(614, '051721000', 'MILAOR', '0517', '051721'),
(615, '051722000', 'MINALABAC', '0517', '051722'),
(616, '051723000', 'NABUA', '0517', '051723'),
(617, '051724000', 'NAGA CITY', '0517', '051724'),
(618, '051725000', 'OCAMPO', '0517', '051725'),
(619, '051726000', 'PAMPLONA', '0517', '051726'),
(620, '051727000', 'PASACAO', '0517', '051727'),
(621, '051728000', 'PILI (Capital)', '0517', '051728'),
(622, '051729000', 'PRESENTACION (PARUBCAN)', '0517', '051729'),
(623, '051730000', 'RAGAY', '0517', '051730'),
(624, '051731000', 'SAGÑAY', '0517', '051731'),
(625, '051732000', 'SAN FERNANDO', '0517', '051732'),
(626, '051733000', 'SAN JOSE', '0517', '051733'),
(627, '051734000', 'SIPOCOT', '0517', '051734'),
(628, '051735000', 'SIRUMA', '0517', '051735'),
(629, '051736000', 'TIGAON', '0517', '051736'),
(630, '051737000', 'TINAMBAC', '0517', '051737'),
(631, '052001000', 'BAGAMANOC', '0520', '052001'),
(632, '052002000', 'BARAS', '0520', '052002'),
(633, '052003000', 'BATO', '0520', '052003'),
(634, '052004000', 'CARAMORAN', '0520', '052004'),
(635, '052005000', 'GIGMOTO', '0520', '052005'),
(636, '052006000', 'PANDAN', '0520', '052006'),
(637, '052007000', 'PANGANIBAN (PAYO)', '0520', '052007'),
(638, '052008000', 'SAN ANDRES (CALOLBON)', '0520', '052008'),
(639, '052009000', 'SAN MIGUEL', '0520', '052009'),
(640, '052010000', 'VIGA', '0520', '052010'),
(641, '052011000', 'VIRAC (Capital)', '0520', '052011'),
(642, '054101000', 'AROROY', '0541', '054101'),
(643, '054102000', 'BALENO', '0541', '054102'),
(644, '054103000', 'BALUD', '0541', '054103'),
(645, '054104000', 'BATUAN', '0541', '054104'),
(646, '054105000', 'CATAINGAN', '0541', '054105'),
(647, '054106000', 'CAWAYAN', '0541', '054106'),
(648, '054107000', 'CLAVERIA', '0541', '054107'),
(649, '054108000', 'DIMASALANG', '0541', '054108'),
(650, '054109000', 'ESPERANZA', '0541', '054109'),
(651, '054110000', 'MANDAON', '0541', '054110'),
(652, '054111000', 'CITY OF MASBATE (Capital)', '0541', '054111'),
(653, '054112000', 'MILAGROS', '0541', '054112'),
(654, '054113000', 'MOBO', '0541', '054113'),
(655, '054114000', 'MONREAL', '0541', '054114'),
(656, '054115000', 'PALANAS', '0541', '054115'),
(657, '054116000', 'PIO V. CORPUZ (LIMBUHAN)', '0541', '054116'),
(658, '054117000', 'PLACER', '0541', '054117'),
(659, '054118000', 'SAN FERNANDO', '0541', '054118'),
(660, '054119000', 'SAN JACINTO', '0541', '054119'),
(661, '054120000', 'SAN PASCUAL', '0541', '054120'),
(662, '054121000', 'USON', '0541', '054121'),
(663, '056202000', 'BARCELONA', '0562', '056202'),
(664, '056203000', 'BULAN', '0562', '056203'),
(665, '056204000', 'BULUSAN', '0562', '056204'),
(666, '056205000', 'CASIGURAN', '0562', '056205'),
(667, '056206000', 'CASTILLA', '0562', '056206'),
(668, '056207000', 'DONSOL', '0562', '056207'),
(669, '056208000', 'GUBAT', '0562', '056208'),
(670, '056209000', 'IROSIN', '0562', '056209'),
(671, '056210000', 'JUBAN', '0562', '056210'),
(672, '056211000', 'MAGALLANES', '0562', '056211'),
(673, '056212000', 'MATNOG', '0562', '056212'),
(674, '056213000', 'PILAR', '0562', '056213'),
(675, '056214000', 'PRIETO DIAZ', '0562', '056214'),
(676, '056215000', 'SANTA MAGDALENA', '0562', '056215'),
(677, '056216000', 'CITY OF SORSOGON (Capital)', '0562', '056216'),
(678, '060401000', 'ALTAVAS', '0604', '060401'),
(679, '060402000', 'BALETE', '0604', '060402'),
(680, '060403000', 'BANGA', '0604', '060403'),
(681, '060404000', 'BATAN', '0604', '060404'),
(682, '060405000', 'BURUANGA', '0604', '060405'),
(683, '060406000', 'IBAJAY', '0604', '060406'),
(684, '060407000', 'KALIBO (Capital)', '0604', '060407'),
(685, '060408000', 'LEZO', '0604', '060408'),
(686, '060409000', 'LIBACAO', '0604', '060409'),
(687, '060410000', 'MADALAG', '0604', '060410'),
(688, '060411000', 'MAKATO', '0604', '060411'),
(689, '060412000', 'MALAY', '0604', '060412'),
(690, '060413000', 'MALINAO', '0604', '060413'),
(691, '060414000', 'NABAS', '0604', '060414'),
(692, '060415000', 'NEW WASHINGTON', '0604', '060415'),
(693, '060416000', 'NUMANCIA', '0604', '060416'),
(694, '060417000', 'TANGALAN', '0604', '060417'),
(695, '060601000', 'ANINI-Y', '0606', '060601'),
(696, '060602000', 'BARBAZA', '0606', '060602'),
(697, '060603000', 'BELISON', '0606', '060603'),
(698, '060604000', 'BUGASONG', '0606', '060604'),
(699, '060605000', 'CALUYA', '0606', '060605'),
(700, '060606000', 'CULASI', '0606', '060606'),
(701, '060607000', 'TOBIAS FORNIER (DAO)', '0606', '060607'),
(702, '060608000', 'HAMTIC', '0606', '060608'),
(703, '060609000', 'LAUA-AN', '0606', '060609'),
(704, '060610000', 'LIBERTAD', '0606', '060610'),
(705, '060611000', 'PANDAN', '0606', '060611'),
(706, '060612000', 'PATNONGON', '0606', '060612'),
(707, '060613000', 'SAN JOSE (Capital)', '0606', '060613'),
(708, '060614000', 'SAN REMIGIO', '0606', '060614'),
(709, '060615000', 'SEBASTE', '0606', '060615'),
(710, '060616000', 'SIBALOM', '0606', '060616'),
(711, '060617000', 'TIBIAO', '0606', '060617'),
(712, '060618000', 'VALDERRAMA', '0606', '060618'),
(713, '061901000', 'CUARTERO', '0619', '061901'),
(714, '061902000', 'DAO', '0619', '061902'),
(715, '061903000', 'DUMALAG', '0619', '061903'),
(716, '061904000', 'DUMARAO', '0619', '061904'),
(717, '061905000', 'IVISAN', '0619', '061905'),
(718, '061906000', 'JAMINDAN', '0619', '061906'),
(719, '061907000', 'MA-AYON', '0619', '061907'),
(720, '061908000', 'MAMBUSAO', '0619', '061908'),
(721, '061909000', 'PANAY', '0619', '061909'),
(722, '061910000', 'PANITAN', '0619', '061910'),
(723, '061911000', 'PILAR', '0619', '061911'),
(724, '061912000', 'PONTEVEDRA', '0619', '061912'),
(725, '061913000', 'PRESIDENT ROXAS', '0619', '061913'),
(726, '061914000', 'ROXAS CITY (Capital)', '0619', '061914'),
(727, '061915000', 'SAPI-AN', '0619', '061915'),
(728, '061916000', 'SIGMA', '0619', '061916'),
(729, '061917000', 'TAPAZ', '0619', '061917'),
(730, '063001000', 'AJUY', '0630', '063001'),
(731, '063002000', 'ALIMODIAN', '0630', '063002'),
(732, '063003000', 'ANILAO', '0630', '063003'),
(733, '063004000', 'BADIANGAN', '0630', '063004'),
(734, '063005000', 'BALASAN', '0630', '063005'),
(735, '063006000', 'BANATE', '0630', '063006'),
(736, '063007000', 'BAROTAC NUEVO', '0630', '063007'),
(737, '063008000', 'BAROTAC VIEJO', '0630', '063008'),
(738, '063009000', 'BATAD', '0630', '063009'),
(739, '063010000', 'BINGAWAN', '0630', '063010'),
(740, '063012000', 'CABATUAN', '0630', '063012'),
(741, '063013000', 'CALINOG', '0630', '063013'),
(742, '063014000', 'CARLES', '0630', '063014'),
(743, '063015000', 'CONCEPCION', '0630', '063015'),
(744, '063016000', 'DINGLE', '0630', '063016'),
(745, '063017000', 'DUEÑAS', '0630', '063017'),
(746, '063018000', 'DUMANGAS', '0630', '063018'),
(747, '063019000', 'ESTANCIA', '0630', '063019'),
(748, '063020000', 'GUIMBAL', '0630', '063020'),
(749, '063021000', 'IGBARAS', '0630', '063021'),
(750, '063022000', 'ILOILO CITY (Capital)', '0630', '063022'),
(751, '063023000', 'JANIUAY', '0630', '063023'),
(752, '063025000', 'LAMBUNAO', '0630', '063025'),
(753, '063026000', 'LEGANES', '0630', '063026'),
(754, '063027000', 'LEMERY', '0630', '063027'),
(755, '063028000', 'LEON', '0630', '063028'),
(756, '063029000', 'MAASIN', '0630', '063029'),
(757, '063030000', 'MIAGAO', '0630', '063030'),
(758, '063031000', 'MINA', '0630', '063031'),
(759, '063032000', 'NEW LUCENA', '0630', '063032'),
(760, '063034000', 'OTON', '0630', '063034'),
(761, '063035000', 'CITY OF PASSI', '0630', '063035'),
(762, '063036000', 'PAVIA', '0630', '063036'),
(763, '063037000', 'POTOTAN', '0630', '063037'),
(764, '063038000', 'SAN DIONISIO', '0630', '063038'),
(765, '063039000', 'SAN ENRIQUE', '0630', '063039'),
(766, '063040000', 'SAN JOAQUIN', '0630', '063040'),
(767, '063041000', 'SAN MIGUEL', '0630', '063041'),
(768, '063042000', 'SAN RAFAEL', '0630', '063042'),
(769, '063043000', 'SANTA BARBARA', '0630', '063043'),
(770, '063044000', 'SARA', '0630', '063044'),
(771, '063045000', 'TIGBAUAN', '0630', '063045'),
(772, '063046000', 'TUBUNGAN', '0630', '063046'),
(773, '063047000', 'ZARRAGA', '0630', '063047'),
(774, '064501000', 'BACOLOD CITY (Capital)', '0645', '064501'),
(775, '064502000', 'BAGO CITY', '0645', '064502'),
(776, '064503000', 'BINALBAGAN', '0645', '064503'),
(777, '064504000', 'CADIZ CITY', '0645', '064504'),
(778, '064505000', 'CALATRAVA', '0645', '064505'),
(779, '064506000', 'CANDONI', '0645', '064506'),
(780, '064507000', 'CAUAYAN', '0645', '064507'),
(781, '064508000', 'ENRIQUE B. MAGALONA (SARAVIA)', '0645', '064508'),
(782, '064509000', 'CITY OF ESCALANTE', '0645', '064509'),
(783, '064510000', 'CITY OF HIMAMAYLAN', '0645', '064510'),
(784, '064511000', 'HINIGARAN', '0645', '064511'),
(785, '064512000', 'HINOBA-AN (ASIA)', '0645', '064512'),
(786, '064513000', 'ILOG', '0645', '064513'),
(787, '064514000', 'ISABELA', '0645', '064514'),
(788, '064515000', 'CITY OF KABANKALAN', '0645', '064515'),
(789, '064516000', 'LA CARLOTA CITY', '0645', '064516'),
(790, '064517000', 'LA CASTELLANA', '0645', '064517'),
(791, '064518000', 'MANAPLA', '0645', '064518'),
(792, '064519000', 'MOISES PADILLA (MAGALLON)', '0645', '064519'),
(793, '064520000', 'MURCIA', '0645', '064520'),
(794, '064521000', 'PONTEVEDRA', '0645', '064521'),
(795, '064522000', 'PULUPANDAN', '0645', '064522'),
(796, '064523000', 'SAGAY CITY', '0645', '064523'),
(797, '064524000', 'SAN CARLOS CITY', '0645', '064524'),
(798, '064525000', 'SAN ENRIQUE', '0645', '064525'),
(799, '064526000', 'SILAY CITY', '0645', '064526'),
(800, '064527000', 'CITY OF SIPALAY', '0645', '064527'),
(801, '064528000', 'CITY OF TALISAY', '0645', '064528'),
(802, '064529000', 'TOBOSO', '0645', '064529'),
(803, '064530000', 'VALLADOLID', '0645', '064530'),
(804, '064531000', 'CITY OF VICTORIAS', '0645', '064531'),
(805, '064532000', 'SALVADOR BENEDICTO', '0645', '064532'),
(806, '067901000', 'BUENAVISTA', '0679', '067901'),
(807, '067902000', 'JORDAN (Capital)', '0679', '067902'),
(808, '067903000', 'NUEVA VALENCIA', '0679', '067903'),
(809, '067904000', 'SAN LORENZO', '0679', '067904'),
(810, '067905000', 'SIBUNAG', '0679', '067905'),
(811, '071201000', 'ALBURQUERQUE', '0712', '071201'),
(812, '071202000', 'ALICIA', '0712', '071202'),
(813, '071203000', 'ANDA', '0712', '071203'),
(814, '071204000', 'ANTEQUERA', '0712', '071204'),
(815, '071205000', 'BACLAYON', '0712', '071205'),
(816, '071206000', 'BALILIHAN', '0712', '071206'),
(817, '071207000', 'BATUAN', '0712', '071207'),
(818, '071208000', 'BILAR', '0712', '071208'),
(819, '071209000', 'BUENAVISTA', '0712', '071209'),
(820, '071210000', 'CALAPE', '0712', '071210'),
(821, '071211000', 'CANDIJAY', '0712', '071211'),
(822, '071212000', 'CARMEN', '0712', '071212'),
(823, '071213000', 'CATIGBIAN', '0712', '071213'),
(824, '071214000', 'CLARIN', '0712', '071214'),
(825, '071215000', 'CORELLA', '0712', '071215'),
(826, '071216000', 'CORTES', '0712', '071216'),
(827, '071217000', 'DAGOHOY', '0712', '071217'),
(828, '071218000', 'DANAO', '0712', '071218'),
(829, '071219000', 'DAUIS', '0712', '071219'),
(830, '071220000', 'DIMIAO', '0712', '071220'),
(831, '071221000', 'DUERO', '0712', '071221'),
(832, '071222000', 'GARCIA HERNANDEZ', '0712', '071222'),
(833, '071223000', 'GUINDULMAN', '0712', '071223'),
(834, '071224000', 'INABANGA', '0712', '071224'),
(835, '071225000', 'JAGNA', '0712', '071225'),
(836, '071226000', 'JETAFE', '0712', '071226'),
(837, '071227000', 'LILA', '0712', '071227'),
(838, '071228000', 'LOAY', '0712', '071228'),
(839, '071229000', 'LOBOC', '0712', '071229'),
(840, '071230000', 'LOON', '0712', '071230'),
(841, '071231000', 'MABINI', '0712', '071231'),
(842, '071232000', 'MARIBOJOC', '0712', '071232'),
(843, '071233000', 'PANGLAO', '0712', '071233'),
(844, '071234000', 'PILAR', '0712', '071234'),
(845, '071235000', 'PRES. CARLOS P. GARCIA (PITOGO)', '0712', '071235'),
(846, '071236000', 'SAGBAYAN (BORJA)', '0712', '071236'),
(847, '071237000', 'SAN ISIDRO', '0712', '071237'),
(848, '071238000', 'SAN MIGUEL', '0712', '071238'),
(849, '071239000', 'SEVILLA', '0712', '071239'),
(850, '071240000', 'SIERRA BULLONES', '0712', '071240'),
(851, '071241000', 'SIKATUNA', '0712', '071241'),
(852, '071242000', 'TAGBILARAN CITY (Capital)', '0712', '071242'),
(853, '071243000', 'TALIBON', '0712', '071243'),
(854, '071244000', 'TRINIDAD', '0712', '071244'),
(855, '071245000', 'TUBIGON', '0712', '071245'),
(856, '071246000', 'UBAY', '0712', '071246'),
(857, '071247000', 'VALENCIA', '0712', '071247'),
(858, '071248000', 'BIEN UNIDO', '0712', '071248'),
(859, '072201000', 'ALCANTARA', '0722', '072201'),
(860, '072202000', 'ALCOY', '0722', '072202'),
(861, '072203000', 'ALEGRIA', '0722', '072203'),
(862, '072204000', 'ALOGUINSAN', '0722', '072204'),
(863, '072205000', 'ARGAO', '0722', '072205'),
(864, '072206000', 'ASTURIAS', '0722', '072206'),
(865, '072207000', 'BADIAN', '0722', '072207'),
(866, '072208000', 'BALAMBAN', '0722', '072208'),
(867, '072209000', 'BANTAYAN', '0722', '072209'),
(868, '072210000', 'BARILI', '0722', '072210'),
(869, '072211000', 'CITY OF BOGO', '0722', '072211'),
(870, '072212000', 'BOLJOON', '0722', '072212'),
(871, '072213000', 'BORBON', '0722', '072213'),
(872, '072214000', 'CITY OF CARCAR', '0722', '072214'),
(873, '072215000', 'CARMEN', '0722', '072215'),
(874, '072216000', 'CATMON', '0722', '072216'),
(875, '072217000', 'CEBU CITY (Capital)', '0722', '072217'),
(876, '072218000', 'COMPOSTELA', '0722', '072218'),
(877, '072219000', 'CONSOLACION', '0722', '072219'),
(878, '072220000', 'CORDOVA', '0722', '072220'),
(879, '072221000', 'DAANBANTAYAN', '0722', '072221'),
(880, '072222000', 'DALAGUETE', '0722', '072222'),
(881, '072223000', 'DANAO CITY', '0722', '072223'),
(882, '072224000', 'DUMANJUG', '0722', '072224'),
(883, '072225000', 'GINATILAN', '0722', '072225'),
(884, '072226000', 'LAPU-LAPU CITY (OPON)', '0722', '072226'),
(885, '072227000', 'LILOAN', '0722', '072227'),
(886, '072228000', 'MADRIDEJOS', '0722', '072228'),
(887, '072229000', 'MALABUYOC', '0722', '072229'),
(888, '072230000', 'MANDAUE CITY', '0722', '072230'),
(889, '072231000', 'MEDELLIN', '0722', '072231'),
(890, '072232000', 'MINGLANILLA', '0722', '072232'),
(891, '072233000', 'MOALBOAL', '0722', '072233'),
(892, '072234000', 'CITY OF NAGA', '0722', '072234'),
(893, '072235000', 'OSLOB', '0722', '072235'),
(894, '072236000', 'PILAR', '0722', '072236'),
(895, '072237000', 'PINAMUNGAHAN', '0722', '072237'),
(896, '072238000', 'PORO', '0722', '072238'),
(897, '072239000', 'RONDA', '0722', '072239'),
(898, '072240000', 'SAMBOAN', '0722', '072240'),
(899, '072241000', 'SAN FERNANDO', '0722', '072241'),
(900, '072242000', 'SAN FRANCISCO', '0722', '072242'),
(901, '072243000', 'SAN REMIGIO', '0722', '072243'),
(902, '072244000', 'SANTA FE', '0722', '072244'),
(903, '072245000', 'SANTANDER', '0722', '072245'),
(904, '072246000', 'SIBONGA', '0722', '072246'),
(905, '072247000', 'SOGOD', '0722', '072247'),
(906, '072248000', 'TABOGON', '0722', '072248'),
(907, '072249000', 'TABUELAN', '0722', '072249'),
(908, '072250000', 'CITY OF TALISAY', '0722', '072250'),
(909, '072251000', 'TOLEDO CITY', '0722', '072251'),
(910, '072252000', 'TUBURAN', '0722', '072252'),
(911, '072253000', 'TUDELA', '0722', '072253'),
(912, '074601000', 'AMLAN (AYUQUITAN)', '0746', '074601'),
(913, '074602000', 'AYUNGON', '0746', '074602'),
(914, '074603000', 'BACONG', '0746', '074603'),
(915, '074604000', 'BAIS CITY', '0746', '074604'),
(916, '074605000', 'BASAY', '0746', '074605'),
(917, '074606000', 'CITY OF BAYAWAN (TULONG)', '0746', '074606'),
(918, '074607000', 'BINDOY (PAYABON)', '0746', '074607'),
(919, '074608000', 'CANLAON CITY', '0746', '074608'),
(920, '074609000', 'DAUIN', '0746', '074609'),
(921, '074610000', 'DUMAGUETE CITY (Capital)', '0746', '074610'),
(922, '074611000', 'CITY OF GUIHULNGAN', '0746', '074611'),
(923, '074612000', 'JIMALALUD', '0746', '074612'),
(924, '074613000', 'LA LIBERTAD', '0746', '074613'),
(925, '074614000', 'MABINAY', '0746', '074614'),
(926, '074615000', 'MANJUYOD', '0746', '074615'),
(927, '074616000', 'PAMPLONA', '0746', '074616'),
(928, '074617000', 'SAN JOSE', '0746', '074617'),
(929, '074618000', 'SANTA CATALINA', '0746', '074618'),
(930, '074619000', 'SIATON', '0746', '074619'),
(931, '074620000', 'SIBULAN', '0746', '074620'),
(932, '074621000', 'CITY OF TANJAY', '0746', '074621'),
(933, '074622000', 'TAYASAN', '0746', '074622'),
(934, '074623000', 'VALENCIA (LUZURRIAGA)', '0746', '074623'),
(935, '074624000', 'VALLEHERMOSO', '0746', '074624'),
(936, '074625000', 'ZAMBOANGUITA', '0746', '074625'),
(937, '076101000', 'ENRIQUE VILLANUEVA', '0761', '076101'),
(938, '076102000', 'LARENA', '0761', '076102'),
(939, '076103000', 'LAZI', '0761', '076103'),
(940, '076104000', 'MARIA', '0761', '076104'),
(941, '076105000', 'SAN JUAN', '0761', '076105'),
(942, '076106000', 'SIQUIJOR (Capital)', '0761', '076106'),
(943, '082601000', 'ARTECHE', '0826', '082601'),
(944, '082602000', 'BALANGIGA', '0826', '082602'),
(945, '082603000', 'BALANGKAYAN', '0826', '082603'),
(946, '082604000', 'CITY OF BORONGAN (Capital)', '0826', '082604'),
(947, '082605000', 'CAN-AVID', '0826', '082605'),
(948, '082606000', 'DOLORES', '0826', '082606'),
(949, '082607000', 'GENERAL MACARTHUR', '0826', '082607'),
(950, '082608000', 'GIPORLOS', '0826', '082608'),
(951, '082609000', 'GUIUAN', '0826', '082609'),
(952, '082610000', 'HERNANI', '0826', '082610'),
(953, '082611000', 'JIPAPAD', '0826', '082611'),
(954, '082612000', 'LAWAAN', '0826', '082612'),
(955, '082613000', 'LLORENTE', '0826', '082613'),
(956, '082614000', 'MASLOG', '0826', '082614'),
(957, '082615000', 'MAYDOLONG', '0826', '082615'),
(958, '082616000', 'MERCEDES', '0826', '082616'),
(959, '082617000', 'ORAS', '0826', '082617'),
(960, '082618000', 'QUINAPONDAN', '0826', '082618'),
(961, '082619000', 'SALCEDO', '0826', '082619'),
(962, '082620000', 'SAN JULIAN', '0826', '082620'),
(963, '082621000', 'SAN POLICARPO', '0826', '082621'),
(964, '082622000', 'SULAT', '0826', '082622'),
(965, '082623000', 'TAFT', '0826', '082623'),
(966, '083701000', 'ABUYOG', '0837', '083701'),
(967, '083702000', 'ALANGALANG', '0837', '083702'),
(968, '083703000', 'ALBUERA', '0837', '083703'),
(969, '083705000', 'BABATNGON', '0837', '083705'),
(970, '083706000', 'BARUGO', '0837', '083706'),
(971, '083707000', 'BATO', '0837', '083707'),
(972, '083708000', 'CITY OF BAYBAY', '0837', '083708'),
(973, '083710000', 'BURAUEN', '0837', '083710'),
(974, '083713000', 'CALUBIAN', '0837', '083713'),
(975, '083714000', 'CAPOOCAN', '0837', '083714'),
(976, '083715000', 'CARIGARA', '0837', '083715'),
(977, '083717000', 'DAGAMI', '0837', '083717'),
(978, '083718000', 'DULAG', '0837', '083718'),
(979, '083719000', 'HILONGOS', '0837', '083719'),
(980, '083720000', 'HINDANG', '0837', '083720'),
(981, '083721000', 'INOPACAN', '0837', '083721'),
(982, '083722000', 'ISABEL', '0837', '083722'),
(983, '083723000', 'JARO', '0837', '083723'),
(984, '083724000', 'JAVIER (BUGHO)', '0837', '083724'),
(985, '083725000', 'JULITA', '0837', '083725'),
(986, '083726000', 'KANANGA', '0837', '083726'),
(987, '083728000', 'LA PAZ', '0837', '083728'),
(988, '083729000', 'LEYTE', '0837', '083729'),
(989, '083730000', 'MACARTHUR', '0837', '083730'),
(990, '083731000', 'MAHAPLAG', '0837', '083731'),
(991, '083733000', 'MATAG-OB', '0837', '083733'),
(992, '083734000', 'MATALOM', '0837', '083734'),
(993, '083735000', 'MAYORGA', '0837', '083735'),
(994, '083736000', 'MERIDA', '0837', '083736'),
(995, '083738000', 'ORMOC CITY', '0837', '083738'),
(996, '083739000', 'PALO', '0837', '083739'),
(997, '083740000', 'PALOMPON', '0837', '083740'),
(998, '083741000', 'PASTRANA', '0837', '083741'),
(999, '083742000', 'SAN ISIDRO', '0837', '083742'),
(1000, '083743000', 'SAN MIGUEL', '0837', '083743'),
(1001, '083744000', 'SANTA FE', '0837', '083744'),
(1002, '083745000', 'TABANGO', '0837', '083745'),
(1003, '083746000', 'TABONTABON', '0837', '083746'),
(1004, '083747000', 'TACLOBAN CITY (Capital)', '0837', '083747'),
(1005, '083748000', 'TANAUAN', '0837', '083748'),
(1006, '083749000', 'TOLOSA', '0837', '083749'),
(1007, '083750000', 'TUNGA', '0837', '083750'),
(1008, '083751000', 'VILLABA', '0837', '083751'),
(1009, '084801000', 'ALLEN', '0848', '084801'),
(1010, '084802000', 'BIRI', '0848', '084802'),
(1011, '084803000', 'BOBON', '0848', '084803'),
(1012, '084804000', 'CAPUL', '0848', '084804'),
(1013, '084805000', 'CATARMAN (Capital)', '0848', '084805'),
(1014, '084806000', 'CATUBIG', '0848', '084806'),
(1015, '084807000', 'GAMAY', '0848', '084807'),
(1016, '084808000', 'LAOANG', '0848', '084808'),
(1017, '084809000', 'LAPINIG', '0848', '084809');
INSERT INTO `refcitymun` (`citymun_id`, `psgcCode`, `citymunDesc`, `provCode`, `citymunCode`) VALUES
(1018, '084810000', 'LAS NAVAS', '0848', '084810'),
(1019, '084811000', 'LAVEZARES', '0848', '084811'),
(1020, '084812000', 'MAPANAS', '0848', '084812'),
(1021, '084813000', 'MONDRAGON', '0848', '084813'),
(1022, '084814000', 'PALAPAG', '0848', '084814'),
(1023, '084815000', 'PAMBUJAN', '0848', '084815'),
(1024, '084816000', 'ROSARIO', '0848', '084816'),
(1025, '084817000', 'SAN ANTONIO', '0848', '084817'),
(1026, '084818000', 'SAN ISIDRO', '0848', '084818'),
(1027, '084819000', 'SAN JOSE', '0848', '084819'),
(1028, '084820000', 'SAN ROQUE', '0848', '084820'),
(1029, '084821000', 'SAN VICENTE', '0848', '084821'),
(1030, '084822000', 'SILVINO LOBOS', '0848', '084822'),
(1031, '084823000', 'VICTORIA', '0848', '084823'),
(1032, '084824000', 'LOPE DE VEGA', '0848', '084824'),
(1033, '086001000', 'ALMAGRO', '0860', '086001'),
(1034, '086002000', 'BASEY', '0860', '086002'),
(1035, '086003000', 'CALBAYOG CITY', '0860', '086003'),
(1036, '086004000', 'CALBIGA', '0860', '086004'),
(1037, '086005000', 'CITY OF CATBALOGAN (Capital)', '0860', '086005'),
(1038, '086006000', 'DARAM', '0860', '086006'),
(1039, '086007000', 'GANDARA', '0860', '086007'),
(1040, '086008000', 'HINABANGAN', '0860', '086008'),
(1041, '086009000', 'JIABONG', '0860', '086009'),
(1042, '086010000', 'MARABUT', '0860', '086010'),
(1043, '086011000', 'MATUGUINAO', '0860', '086011'),
(1044, '086012000', 'MOTIONG', '0860', '086012'),
(1045, '086013000', 'PINABACDAO', '0860', '086013'),
(1046, '086014000', 'SAN JOSE DE BUAN', '0860', '086014'),
(1047, '086015000', 'SAN SEBASTIAN', '0860', '086015'),
(1048, '086016000', 'SANTA MARGARITA', '0860', '086016'),
(1049, '086017000', 'SANTA RITA', '0860', '086017'),
(1050, '086018000', 'SANTO NIÑO', '0860', '086018'),
(1051, '086019000', 'TALALORA', '0860', '086019'),
(1052, '086020000', 'TARANGNAN', '0860', '086020'),
(1053, '086021000', 'VILLAREAL', '0860', '086021'),
(1054, '086022000', 'PARANAS (WRIGHT)', '0860', '086022'),
(1055, '086023000', 'ZUMARRAGA', '0860', '086023'),
(1056, '086024000', 'TAGAPUL-AN', '0860', '086024'),
(1057, '086025000', 'SAN JORGE', '0860', '086025'),
(1058, '086026000', 'PAGSANGHAN', '0860', '086026'),
(1059, '086401000', 'ANAHAWAN', '0864', '086401'),
(1060, '086402000', 'BONTOC', '0864', '086402'),
(1061, '086403000', 'HINUNANGAN', '0864', '086403'),
(1062, '086404000', 'HINUNDAYAN', '0864', '086404'),
(1063, '086405000', 'LIBAGON', '0864', '086405'),
(1064, '086406000', 'LILOAN', '0864', '086406'),
(1065, '086407000', 'CITY OF MAASIN (Capital)', '0864', '086407'),
(1066, '086408000', 'MACROHON', '0864', '086408'),
(1067, '086409000', 'MALITBOG', '0864', '086409'),
(1068, '086410000', 'PADRE BURGOS', '0864', '086410'),
(1069, '086411000', 'PINTUYAN', '0864', '086411'),
(1070, '086412000', 'SAINT BERNARD', '0864', '086412'),
(1071, '086413000', 'SAN FRANCISCO', '0864', '086413'),
(1072, '086414000', 'SAN JUAN (CABALIAN)', '0864', '086414'),
(1073, '086415000', 'SAN RICARDO', '0864', '086415'),
(1074, '086416000', 'SILAGO', '0864', '086416'),
(1075, '086417000', 'SOGOD', '0864', '086417'),
(1076, '086418000', 'TOMAS OPPUS', '0864', '086418'),
(1077, '086419000', 'LIMASAWA', '0864', '086419'),
(1078, '087801000', 'ALMERIA', '0878', '087801'),
(1079, '087802000', 'BILIRAN', '0878', '087802'),
(1080, '087803000', 'CABUCGAYAN', '0878', '087803'),
(1081, '087804000', 'CAIBIRAN', '0878', '087804'),
(1082, '087805000', 'CULABA', '0878', '087805'),
(1083, '087806000', 'KAWAYAN', '0878', '087806'),
(1084, '087807000', 'MARIPIPI', '0878', '087807'),
(1085, '087808000', 'NAVAL (Capital)', '0878', '087808'),
(1086, '097201000', 'DAPITAN CITY', '0972', '097201'),
(1087, '097202000', 'DIPOLOG CITY (Capital)', '0972', '097202'),
(1088, '097203000', 'KATIPUNAN', '0972', '097203'),
(1089, '097204000', 'LA LIBERTAD', '0972', '097204'),
(1090, '097205000', 'LABASON', '0972', '097205'),
(1091, '097206000', 'LILOY', '0972', '097206'),
(1092, '097207000', 'MANUKAN', '0972', '097207'),
(1093, '097208000', 'MUTIA', '0972', '097208'),
(1094, '097209000', 'PIÑAN (NEW PIÑAN)', '0972', '097209'),
(1095, '097210000', 'POLANCO', '0972', '097210'),
(1096, '097211000', 'PRES. MANUEL A. ROXAS', '0972', '097211'),
(1097, '097212000', 'RIZAL', '0972', '097212'),
(1098, '097213000', 'SALUG', '0972', '097213'),
(1099, '097214000', 'SERGIO OSMEÑA SR.', '0972', '097214'),
(1100, '097215000', 'SIAYAN', '0972', '097215'),
(1101, '097216000', 'SIBUCO', '0972', '097216'),
(1102, '097217000', 'SIBUTAD', '0972', '097217'),
(1103, '097218000', 'SINDANGAN', '0972', '097218'),
(1104, '097219000', 'SIOCON', '0972', '097219'),
(1105, '097220000', 'SIRAWAI', '0972', '097220'),
(1106, '097221000', 'TAMPILISAN', '0972', '097221'),
(1107, '097222000', 'JOSE DALMAN (PONOT)', '0972', '097222'),
(1108, '097223000', 'GUTALAC', '0972', '097223'),
(1109, '097224000', 'BALIGUIAN', '0972', '097224'),
(1110, '097225000', 'GODOD', '0972', '097225'),
(1111, '097226000', 'BACUNGAN (Leon T. Postigo)', '0972', '097226'),
(1112, '097227000', 'KALAWIT', '0972', '097227'),
(1113, '097302000', 'AURORA', '0973', '097302'),
(1114, '097303000', 'BAYOG', '0973', '097303'),
(1115, '097305000', 'DIMATALING', '0973', '097305'),
(1116, '097306000', 'DINAS', '0973', '097306'),
(1117, '097307000', 'DUMALINAO', '0973', '097307'),
(1118, '097308000', 'DUMINGAG', '0973', '097308'),
(1119, '097311000', 'KUMALARANG', '0973', '097311'),
(1120, '097312000', 'LABANGAN', '0973', '097312'),
(1121, '097313000', 'LAPUYAN', '0973', '097313'),
(1122, '097315000', 'MAHAYAG', '0973', '097315'),
(1123, '097317000', 'MARGOSATUBIG', '0973', '097317'),
(1124, '097318000', 'MIDSALIP', '0973', '097318'),
(1125, '097319000', 'MOLAVE', '0973', '097319'),
(1126, '097322000', 'PAGADIAN CITY (Capital)', '0973', '097322'),
(1127, '097323000', 'RAMON MAGSAYSAY (LIARGO)', '0973', '097323'),
(1128, '097324000', 'SAN MIGUEL', '0973', '097324'),
(1129, '097325000', 'SAN PABLO', '0973', '097325'),
(1130, '097327000', 'TABINA', '0973', '097327'),
(1131, '097328000', 'TAMBULIG', '0973', '097328'),
(1132, '097330000', 'TUKURAN', '0973', '097330'),
(1133, '097332000', 'ZAMBOANGA CITY', '0973', '097332'),
(1134, '097333000', 'LAKEWOOD', '0973', '097333'),
(1135, '097337000', 'JOSEFINA', '0973', '097337'),
(1136, '097338000', 'PITOGO', '0973', '097338'),
(1137, '097340000', 'SOMINOT (DON MARIANO MARCOS)', '0973', '097340'),
(1138, '097341000', 'VINCENZO A. SAGUN', '0973', '097341'),
(1139, '097343000', 'GUIPOS', '0973', '097343'),
(1140, '097344000', 'TIGBAO', '0973', '097344'),
(1141, '098301000', 'ALICIA', '0983', '098301'),
(1142, '098302000', 'BUUG', '0983', '098302'),
(1143, '098303000', 'DIPLAHAN', '0983', '098303'),
(1144, '098304000', 'IMELDA', '0983', '098304'),
(1145, '098305000', 'IPIL (Capital)', '0983', '098305'),
(1146, '098306000', 'KABASALAN', '0983', '098306'),
(1147, '098307000', 'MABUHAY', '0983', '098307'),
(1148, '098308000', 'MALANGAS', '0983', '098308'),
(1149, '098309000', 'NAGA', '0983', '098309'),
(1150, '098310000', 'OLUTANGA', '0983', '098310'),
(1151, '098311000', 'PAYAO', '0983', '098311'),
(1152, '098312000', 'ROSELLER LIM', '0983', '098312'),
(1153, '098313000', 'SIAY', '0983', '098313'),
(1154, '098314000', 'TALUSAN', '0983', '098314'),
(1155, '098315000', 'TITAY', '0983', '098315'),
(1156, '098316000', 'TUNGAWAN', '0983', '098316'),
(1157, '099701000', 'CITY OF ISABELA', '0997', '099701'),
(1158, '101301000', 'BAUNGON', '1013', '101301'),
(1159, '101302000', 'DAMULOG', '1013', '101302'),
(1160, '101303000', 'DANGCAGAN', '1013', '101303'),
(1161, '101304000', 'DON CARLOS', '1013', '101304'),
(1162, '101305000', 'IMPASUG-ONG', '1013', '101305'),
(1163, '101306000', 'KADINGILAN', '1013', '101306'),
(1164, '101307000', 'KALILANGAN', '1013', '101307'),
(1165, '101308000', 'KIBAWE', '1013', '101308'),
(1166, '101309000', 'KITAOTAO', '1013', '101309'),
(1167, '101310000', 'LANTAPAN', '1013', '101310'),
(1168, '101311000', 'LIBONA', '1013', '101311'),
(1169, '101312000', 'CITY OF MALAYBALAY (Capital)', '1013', '101312'),
(1170, '101313000', 'MALITBOG', '1013', '101313'),
(1171, '101314000', 'MANOLO FORTICH', '1013', '101314'),
(1172, '101315000', 'MARAMAG', '1013', '101315'),
(1173, '101316000', 'PANGANTUCAN', '1013', '101316'),
(1174, '101317000', 'QUEZON', '1013', '101317'),
(1175, '101318000', 'SAN FERNANDO', '1013', '101318'),
(1176, '101319000', 'SUMILAO', '1013', '101319'),
(1177, '101320000', 'TALAKAG', '1013', '101320'),
(1178, '101321000', 'CITY OF VALENCIA', '1013', '101321'),
(1179, '101322000', 'CABANGLASAN', '1013', '101322'),
(1180, '101801000', 'CATARMAN', '1018', '101801'),
(1181, '101802000', 'GUINSILIBAN', '1018', '101802'),
(1182, '101803000', 'MAHINOG', '1018', '101803'),
(1183, '101804000', 'MAMBAJAO (Capital)', '1018', '101804'),
(1184, '101805000', 'SAGAY', '1018', '101805'),
(1185, '103501000', 'BACOLOD', '1035', '103501'),
(1186, '103502000', 'BALOI', '1035', '103502'),
(1187, '103503000', 'BAROY', '1035', '103503'),
(1188, '103504000', 'ILIGAN CITY', '1035', '103504'),
(1189, '103505000', 'KAPATAGAN', '1035', '103505'),
(1190, '103506000', 'SULTAN NAGA DIMAPORO (KAROMATAN)', '1035', '103506'),
(1191, '103507000', 'KAUSWAGAN', '1035', '103507'),
(1192, '103508000', 'KOLAMBUGAN', '1035', '103508'),
(1193, '103509000', 'LALA', '1035', '103509'),
(1194, '103510000', 'LINAMON', '1035', '103510'),
(1195, '103511000', 'MAGSAYSAY', '1035', '103511'),
(1196, '103512000', 'MAIGO', '1035', '103512'),
(1197, '103513000', 'MATUNGAO', '1035', '103513'),
(1198, '103514000', 'MUNAI', '1035', '103514'),
(1199, '103515000', 'NUNUNGAN', '1035', '103515'),
(1200, '103516000', 'PANTAO RAGAT', '1035', '103516'),
(1201, '103517000', 'POONA PIAGAPO', '1035', '103517'),
(1202, '103518000', 'SALVADOR', '1035', '103518'),
(1203, '103519000', 'SAPAD', '1035', '103519'),
(1204, '103520000', 'TAGOLOAN', '1035', '103520'),
(1205, '103521000', 'TANGCAL', '1035', '103521'),
(1206, '103522000', 'TUBOD (Capital)', '1035', '103522'),
(1207, '103523000', 'PANTAR', '1035', '103523'),
(1208, '104201000', 'ALORAN', '1042', '104201'),
(1209, '104202000', 'BALIANGAO', '1042', '104202'),
(1210, '104203000', 'BONIFACIO', '1042', '104203'),
(1211, '104204000', 'CALAMBA', '1042', '104204'),
(1212, '104205000', 'CLARIN', '1042', '104205'),
(1213, '104206000', 'CONCEPCION', '1042', '104206'),
(1214, '104207000', 'JIMENEZ', '1042', '104207'),
(1215, '104208000', 'LOPEZ JAENA', '1042', '104208'),
(1216, '104209000', 'OROQUIETA CITY (Capital)', '1042', '104209'),
(1217, '104210000', 'OZAMIS CITY', '1042', '104210'),
(1218, '104211000', 'PANAON', '1042', '104211'),
(1219, '104212000', 'PLARIDEL', '1042', '104212'),
(1220, '104213000', 'SAPANG DALAGA', '1042', '104213'),
(1221, '104214000', 'SINACABAN', '1042', '104214'),
(1222, '104215000', 'TANGUB CITY', '1042', '104215'),
(1223, '104216000', 'TUDELA', '1042', '104216'),
(1224, '104217000', 'DON VICTORIANO CHIONGBIAN  (DON MARIANO MARCOS)', '1042', '104217'),
(1225, '104301000', 'ALUBIJID', '1043', '104301'),
(1226, '104302000', 'BALINGASAG', '1043', '104302'),
(1227, '104303000', 'BALINGOAN', '1043', '104303'),
(1228, '104304000', 'BINUANGAN', '1043', '104304'),
(1229, '104305000', 'CAGAYAN DE ORO CITY (Capital)', '1043', '104305'),
(1230, '104306000', 'CLAVERIA', '1043', '104306'),
(1231, '104307000', 'CITY OF EL SALVADOR', '1043', '104307'),
(1232, '104308000', 'GINGOOG CITY', '1043', '104308'),
(1233, '104309000', 'GITAGUM', '1043', '104309'),
(1234, '104310000', 'INITAO', '1043', '104310'),
(1235, '104311000', 'JASAAN', '1043', '104311'),
(1236, '104312000', 'KINOGUITAN', '1043', '104312'),
(1237, '104313000', 'LAGONGLONG', '1043', '104313'),
(1238, '104314000', 'LAGUINDINGAN', '1043', '104314'),
(1239, '104315000', 'LIBERTAD', '1043', '104315'),
(1240, '104316000', 'LUGAIT', '1043', '104316'),
(1241, '104317000', 'MAGSAYSAY (LINUGOS)', '1043', '104317'),
(1242, '104318000', 'MANTICAO', '1043', '104318'),
(1243, '104319000', 'MEDINA', '1043', '104319'),
(1244, '104320000', 'NAAWAN', '1043', '104320'),
(1245, '104321000', 'OPOL', '1043', '104321'),
(1246, '104322000', 'SALAY', '1043', '104322'),
(1247, '104323000', 'SUGBONGCOGON', '1043', '104323'),
(1248, '104324000', 'TAGOLOAN', '1043', '104324'),
(1249, '104325000', 'TALISAYAN', '1043', '104325'),
(1250, '104326000', 'VILLANUEVA', '1043', '104326'),
(1251, '112301000', 'ASUNCION (SAUG)', '1123', '112301'),
(1252, '112303000', 'CARMEN', '1123', '112303'),
(1253, '112305000', 'KAPALONG', '1123', '112305'),
(1254, '112314000', 'NEW CORELLA', '1123', '112314'),
(1255, '112315000', 'CITY OF PANABO', '1123', '112315'),
(1256, '112317000', 'ISLAND GARDEN CITY OF SAMAL', '1123', '112317'),
(1257, '112318000', 'SANTO TOMAS', '1123', '112318'),
(1258, '112319000', 'CITY OF TAGUM (Capital)', '1123', '112319'),
(1259, '112322000', 'TALAINGOD', '1123', '112322'),
(1260, '112323000', 'BRAULIO E. DUJALI', '1123', '112323'),
(1261, '112324000', 'SAN ISIDRO', '1123', '112324'),
(1262, '112401000', 'BANSALAN', '1124', '112401'),
(1263, '112402000', 'DAVAO CITY', '1124', '112402'),
(1264, '112403000', 'CITY OF DIGOS (Capital)', '1124', '112403'),
(1265, '112404000', 'HAGONOY', '1124', '112404'),
(1266, '112406000', 'KIBLAWAN', '1124', '112406'),
(1267, '112407000', 'MAGSAYSAY', '1124', '112407'),
(1268, '112408000', 'MALALAG', '1124', '112408'),
(1269, '112410000', 'MATANAO', '1124', '112410'),
(1270, '112411000', 'PADADA', '1124', '112411'),
(1271, '112412000', 'SANTA CRUZ', '1124', '112412'),
(1272, '112414000', 'SULOP', '1124', '112414'),
(1273, '112501000', 'BAGANGA', '1125', '112501'),
(1274, '112502000', 'BANAYBANAY', '1125', '112502'),
(1275, '112503000', 'BOSTON', '1125', '112503'),
(1276, '112504000', 'CARAGA', '1125', '112504'),
(1277, '112505000', 'CATEEL', '1125', '112505'),
(1278, '112506000', 'GOVERNOR GENEROSO', '1125', '112506'),
(1279, '112507000', 'LUPON', '1125', '112507'),
(1280, '112508000', 'MANAY', '1125', '112508'),
(1281, '112509000', 'CITY OF MATI (Capital)', '1125', '112509'),
(1282, '112510000', 'SAN ISIDRO', '1125', '112510'),
(1283, '112511000', 'TARRAGONA', '1125', '112511'),
(1284, '118201000', 'COMPOSTELA', '1182', '118201'),
(1285, '118202000', 'LAAK (SAN VICENTE)', '1182', '118202'),
(1286, '118203000', 'MABINI (DOÑA ALICIA)', '1182', '118203'),
(1287, '118204000', 'MACO', '1182', '118204'),
(1288, '118205000', 'MARAGUSAN (SAN MARIANO)', '1182', '118205'),
(1289, '118206000', 'MAWAB', '1182', '118206'),
(1290, '118207000', 'MONKAYO', '1182', '118207'),
(1291, '118208000', 'MONTEVISTA', '1182', '118208'),
(1292, '118209000', 'NABUNTURAN (Capital)', '1182', '118209'),
(1293, '118210000', 'NEW BATAAN', '1182', '118210'),
(1294, '118211000', 'PANTUKAN', '1182', '118211'),
(1295, '118601000', 'DON MARCELINO', '1186', '118601'),
(1296, '118602000', 'JOSE ABAD SANTOS (TRINIDAD)', '1186', '118602'),
(1297, '118603000', 'MALITA', '1186', '118603'),
(1298, '118604000', 'SANTA MARIA', '1186', '118604'),
(1299, '118605000', 'SARANGANI', '1186', '118605'),
(1300, '124701000', 'ALAMADA', '1247', '124701'),
(1301, '124702000', 'CARMEN', '1247', '124702'),
(1302, '124703000', 'KABACAN', '1247', '124703'),
(1303, '124704000', 'CITY OF KIDAPAWAN (Capital)', '1247', '124704'),
(1304, '124705000', 'LIBUNGAN', '1247', '124705'),
(1305, '124706000', 'MAGPET', '1247', '124706'),
(1306, '124707000', 'MAKILALA', '1247', '124707'),
(1307, '124708000', 'MATALAM', '1247', '124708'),
(1308, '124709000', 'MIDSAYAP', '1247', '124709'),
(1309, '124710000', 'M\'LANG', '1247', '124710'),
(1310, '124711000', 'PIGKAWAYAN', '1247', '124711'),
(1311, '124712000', 'PIKIT', '1247', '124712'),
(1312, '124713000', 'PRESIDENT ROXAS', '1247', '124713'),
(1313, '124714000', 'TULUNAN', '1247', '124714'),
(1314, '124715000', 'ANTIPAS', '1247', '124715'),
(1315, '124716000', 'BANISILAN', '1247', '124716'),
(1316, '124717000', 'ALEOSAN', '1247', '124717'),
(1317, '124718000', 'ARAKAN', '1247', '124718'),
(1318, '126302000', 'BANGA', '1263', '126302'),
(1319, '126303000', 'GENERAL SANTOS CITY (DADIANGAS)', '1263', '126303'),
(1320, '126306000', 'CITY OF KORONADAL (Capital)', '1263', '126306'),
(1321, '126311000', 'NORALA', '1263', '126311'),
(1322, '126312000', 'POLOMOLOK', '1263', '126312'),
(1323, '126313000', 'SURALLAH', '1263', '126313'),
(1324, '126314000', 'TAMPAKAN', '1263', '126314'),
(1325, '126315000', 'TANTANGAN', '1263', '126315'),
(1326, '126316000', 'T\'BOLI', '1263', '126316'),
(1327, '126317000', 'TUPI', '1263', '126317'),
(1328, '126318000', 'SANTO NIÑO', '1263', '126318'),
(1329, '126319000', 'LAKE SEBU', '1263', '126319'),
(1330, '126501000', 'BAGUMBAYAN', '1265', '126501'),
(1331, '126502000', 'COLUMBIO', '1265', '126502'),
(1332, '126503000', 'ESPERANZA', '1265', '126503'),
(1333, '126504000', 'ISULAN (Capital)', '1265', '126504'),
(1334, '126505000', 'KALAMANSIG', '1265', '126505'),
(1335, '126506000', 'LEBAK', '1265', '126506'),
(1336, '126507000', 'LUTAYAN', '1265', '126507'),
(1337, '126508000', 'LAMBAYONG (MARIANO MARCOS)', '1265', '126508'),
(1338, '126509000', 'PALIMBANG', '1265', '126509'),
(1339, '126510000', 'PRESIDENT QUIRINO', '1265', '126510'),
(1340, '126511000', 'CITY OF TACURONG', '1265', '126511'),
(1341, '126512000', 'SEN. NINOY AQUINO', '1265', '126512'),
(1342, '128001000', 'ALABEL (Capital)', '1280', '128001'),
(1343, '128002000', 'GLAN', '1280', '128002'),
(1344, '128003000', 'KIAMBA', '1280', '128003'),
(1345, '128004000', 'MAASIM', '1280', '128004'),
(1346, '128005000', 'MAITUM', '1280', '128005'),
(1347, '128006000', 'MALAPATAN', '1280', '128006'),
(1348, '128007000', 'MALUNGON', '1280', '128007'),
(1349, '129804000', 'COTABATO CITY', '1298', '129804'),
(1350, '133901000', 'TONDO I / II', '1339', '133901'),
(1351, '133902000', 'BINONDO', '1339', '133902'),
(1352, '133903000', 'QUIAPO', '1339', '133903'),
(1353, '133904000', 'SAN NICOLAS', '1339', '133904'),
(1354, '133905000', 'SANTA CRUZ', '1339', '133905'),
(1355, '133906000', 'SAMPALOC', '1339', '133906'),
(1356, '133907000', 'SAN MIGUEL', '1339', '133907'),
(1357, '133908000', 'ERMITA', '1339', '133908'),
(1358, '133909000', 'INTRAMUROS', '1339', '133909'),
(1359, '133910000', 'MALATE', '1339', '133910'),
(1360, '133911000', 'PACO', '1339', '133911'),
(1361, '133912000', 'PANDACAN', '1339', '133912'),
(1362, '133913000', 'PORT AREA', '1339', '133913'),
(1363, '133914000', 'SANTA ANA', '1339', '133914'),
(1364, '137401000', 'CITY OF MANDALUYONG', '1374', '137401'),
(1365, '137402000', 'CITY OF MARIKINA', '1374', '137402'),
(1366, '137403000', 'CITY OF PASIG', '1374', '137403'),
(1367, '137404000', 'QUEZON CITY', '1374', '137404'),
(1368, '137405000', 'CITY OF SAN JUAN', '1374', '137405'),
(1369, '137501000', 'CALOOCAN CITY', '1375', '137501'),
(1370, '137502000', 'CITY OF MALABON', '1375', '137502'),
(1371, '137503000', 'CITY OF NAVOTAS', '1375', '137503'),
(1372, '137504000', 'CITY OF VALENZUELA', '1375', '137504'),
(1373, '137601000', 'CITY OF LAS PIÑAS', '1376', '137601'),
(1374, '137602000', 'CITY OF MAKATI', '1376', '137602'),
(1375, '137603000', 'CITY OF MUNTINLUPA', '1376', '137603'),
(1376, '137604000', 'CITY OF PARAÑAQUE', '1376', '137604'),
(1377, '137605000', 'PASAY CITY', '1376', '137605'),
(1378, '137606000', 'PATEROS', '1376', '137606'),
(1379, '137607000', 'TAGUIG CITY', '1376', '137607'),
(1380, '140101000', 'BANGUED (Capital)', '1401', '140101'),
(1381, '140102000', 'BOLINEY', '1401', '140102'),
(1382, '140103000', 'BUCAY', '1401', '140103'),
(1383, '140104000', 'BUCLOC', '1401', '140104'),
(1384, '140105000', 'DAGUIOMAN', '1401', '140105'),
(1385, '140106000', 'DANGLAS', '1401', '140106'),
(1386, '140107000', 'DOLORES', '1401', '140107'),
(1387, '140108000', 'LA PAZ', '1401', '140108'),
(1388, '140109000', 'LACUB', '1401', '140109'),
(1389, '140110000', 'LAGANGILANG', '1401', '140110'),
(1390, '140111000', 'LAGAYAN', '1401', '140111'),
(1391, '140112000', 'LANGIDEN', '1401', '140112'),
(1392, '140113000', 'LICUAN-BAAY (LICUAN)', '1401', '140113'),
(1393, '140114000', 'LUBA', '1401', '140114'),
(1394, '140115000', 'MALIBCONG', '1401', '140115'),
(1395, '140116000', 'MANABO', '1401', '140116'),
(1396, '140117000', 'PEÑARRUBIA', '1401', '140117'),
(1397, '140118000', 'PIDIGAN', '1401', '140118'),
(1398, '140119000', 'PILAR', '1401', '140119'),
(1399, '140120000', 'SALLAPADAN', '1401', '140120'),
(1400, '140121000', 'SAN ISIDRO', '1401', '140121'),
(1401, '140122000', 'SAN JUAN', '1401', '140122'),
(1402, '140123000', 'SAN QUINTIN', '1401', '140123'),
(1403, '140124000', 'TAYUM', '1401', '140124'),
(1404, '140125000', 'TINEG', '1401', '140125'),
(1405, '140126000', 'TUBO', '1401', '140126'),
(1406, '140127000', 'VILLAVICIOSA', '1401', '140127'),
(1407, '141101000', 'ATOK', '1411', '141101'),
(1408, '141102000', 'BAGUIO CITY', '1411', '141102'),
(1409, '141103000', 'BAKUN', '1411', '141103'),
(1410, '141104000', 'BOKOD', '1411', '141104'),
(1411, '141105000', 'BUGUIAS', '1411', '141105'),
(1412, '141106000', 'ITOGON', '1411', '141106'),
(1413, '141107000', 'KABAYAN', '1411', '141107'),
(1414, '141108000', 'KAPANGAN', '1411', '141108'),
(1415, '141109000', 'KIBUNGAN', '1411', '141109'),
(1416, '141110000', 'LA TRINIDAD (Capital)', '1411', '141110'),
(1417, '141111000', 'MANKAYAN', '1411', '141111'),
(1418, '141112000', 'SABLAN', '1411', '141112'),
(1419, '141113000', 'TUBA', '1411', '141113'),
(1420, '141114000', 'TUBLAY', '1411', '141114'),
(1421, '142701000', 'BANAUE', '1427', '142701'),
(1422, '142702000', 'HUNGDUAN', '1427', '142702'),
(1423, '142703000', 'KIANGAN', '1427', '142703'),
(1424, '142704000', 'LAGAWE (Capital)', '1427', '142704'),
(1425, '142705000', 'LAMUT', '1427', '142705'),
(1426, '142706000', 'MAYOYAO', '1427', '142706'),
(1427, '142707000', 'ALFONSO LISTA (POTIA)', '1427', '142707'),
(1428, '142708000', 'AGUINALDO', '1427', '142708'),
(1429, '142709000', 'HINGYON', '1427', '142709'),
(1430, '142710000', 'TINOC', '1427', '142710'),
(1431, '142711000', 'ASIPULO', '1427', '142711'),
(1432, '143201000', 'BALBALAN', '1432', '143201'),
(1433, '143206000', 'LUBUAGAN', '1432', '143206'),
(1434, '143208000', 'PASIL', '1432', '143208'),
(1435, '143209000', 'PINUKPUK', '1432', '143209'),
(1436, '143211000', 'RIZAL (LIWAN)', '1432', '143211'),
(1437, '143213000', 'CITY OF TABUK (Capital)', '1432', '143213'),
(1438, '143214000', 'TANUDAN', '1432', '143214'),
(1439, '143215000', 'TINGLAYAN', '1432', '143215'),
(1440, '144401000', 'BARLIG', '1444', '144401'),
(1441, '144402000', 'BAUKO', '1444', '144402'),
(1442, '144403000', 'BESAO', '1444', '144403'),
(1443, '144404000', 'BONTOC (Capital)', '1444', '144404'),
(1444, '144405000', 'NATONIN', '1444', '144405'),
(1445, '144406000', 'PARACELIS', '1444', '144406'),
(1446, '144407000', 'SABANGAN', '1444', '144407'),
(1447, '144408000', 'SADANGA', '1444', '144408'),
(1448, '144409000', 'SAGADA', '1444', '144409'),
(1449, '144410000', 'TADIAN', '1444', '144410'),
(1450, '148101000', 'CALANASAN (BAYAG)', '1481', '148101'),
(1451, '148102000', 'CONNER', '1481', '148102'),
(1452, '148103000', 'FLORA', '1481', '148103'),
(1453, '148104000', 'KABUGAO (Capital)', '1481', '148104'),
(1454, '148105000', 'LUNA', '1481', '148105'),
(1455, '148106000', 'PUDTOL', '1481', '148106'),
(1456, '148107000', 'SANTA MARCELA', '1481', '148107'),
(1457, '150702000', 'CITY OF LAMITAN', '1507', '150702'),
(1458, '150703000', 'LANTAWAN', '1507', '150703'),
(1459, '150704000', 'MALUSO', '1507', '150704'),
(1460, '150705000', 'SUMISIP', '1507', '150705'),
(1461, '150706000', 'TIPO-TIPO', '1507', '150706'),
(1462, '150707000', 'TUBURAN', '1507', '150707'),
(1463, '150708000', 'AKBAR', '1507', '150708'),
(1464, '150709000', 'AL-BARKA', '1507', '150709'),
(1465, '150710000', 'HADJI MOHAMMAD AJUL', '1507', '150710'),
(1466, '150711000', 'UNGKAYA PUKAN', '1507', '150711'),
(1467, '150712000', 'HADJI MUHTAMAD', '1507', '150712'),
(1468, '150713000', 'TABUAN-LASA', '1507', '150713'),
(1469, '153601000', 'BACOLOD-KALAWI (BACOLOD GRANDE)', '1536', '153601'),
(1470, '153602000', 'BALABAGAN', '1536', '153602'),
(1471, '153603000', 'BALINDONG (WATU)', '1536', '153603'),
(1472, '153604000', 'BAYANG', '1536', '153604'),
(1473, '153605000', 'BINIDAYAN', '1536', '153605'),
(1474, '153606000', 'BUBONG', '1536', '153606'),
(1475, '153607000', 'BUTIG', '1536', '153607'),
(1476, '153609000', 'GANASSI', '1536', '153609'),
(1477, '153610000', 'KAPAI', '1536', '153610'),
(1478, '153611000', 'LUMBA-BAYABAO (MAGUING)', '1536', '153611'),
(1479, '153612000', 'LUMBATAN', '1536', '153612'),
(1480, '153613000', 'MADALUM', '1536', '153613'),
(1481, '153614000', 'MADAMBA', '1536', '153614'),
(1482, '153615000', 'MALABANG', '1536', '153615'),
(1483, '153616000', 'MARANTAO', '1536', '153616'),
(1484, '153617000', 'MARAWI CITY (Capital)', '1536', '153617'),
(1485, '153618000', 'MASIU', '1536', '153618'),
(1486, '153619000', 'MULONDO', '1536', '153619'),
(1487, '153620000', 'PAGAYAWAN (TATARIKAN)', '1536', '153620'),
(1488, '153621000', 'PIAGAPO', '1536', '153621'),
(1489, '153622000', 'POONA BAYABAO (GATA)', '1536', '153622'),
(1490, '153623000', 'PUALAS', '1536', '153623'),
(1491, '153624000', 'DITSAAN-RAMAIN', '1536', '153624'),
(1492, '153625000', 'SAGUIARAN', '1536', '153625'),
(1493, '153626000', 'TAMPARAN', '1536', '153626'),
(1494, '153627000', 'TARAKA', '1536', '153627'),
(1495, '153628000', 'TUBARAN', '1536', '153628'),
(1496, '153629000', 'TUGAYA', '1536', '153629'),
(1497, '153630000', 'WAO', '1536', '153630'),
(1498, '153631000', 'MAROGONG', '1536', '153631'),
(1499, '153632000', 'CALANOGAS', '1536', '153632'),
(1500, '153633000', 'BUADIPOSO-BUNTONG', '1536', '153633'),
(1501, '153634000', 'MAGUING', '1536', '153634'),
(1502, '153635000', 'PICONG (SULTAN GUMANDER)', '1536', '153635'),
(1503, '153636000', 'LUMBAYANAGUE', '1536', '153636'),
(1504, '153637000', 'BUMBARAN', '1536', '153637'),
(1505, '153638000', 'TAGOLOAN II', '1536', '153638'),
(1506, '153639000', 'KAPATAGAN', '1536', '153639'),
(1507, '153640000', 'SULTAN DUMALONDONG', '1536', '153640'),
(1508, '153641000', 'LUMBACA-UNAYAN', '1536', '153641'),
(1509, '153801000', 'AMPATUAN', '1538', '153801'),
(1510, '153802000', 'BULDON', '1538', '153802'),
(1511, '153803000', 'BULUAN', '1538', '153803'),
(1512, '153805000', 'DATU PAGLAS', '1538', '153805'),
(1513, '153806000', 'DATU PIANG', '1538', '153806'),
(1514, '153807000', 'DATU ODIN SINSUAT (DINAIG)', '1538', '153807'),
(1515, '153808000', 'SHARIFF AGUAK (MAGANOY) (Capital)', '1538', '153808'),
(1516, '153809000', 'MATANOG', '1538', '153809'),
(1517, '153810000', 'PAGALUNGAN', '1538', '153810'),
(1518, '153811000', 'PARANG', '1538', '153811'),
(1519, '153812000', 'SULTAN KUDARAT (NULING)', '1538', '153812'),
(1520, '153813000', 'SULTAN SA BARONGIS (LAMBAYONG)', '1538', '153813'),
(1521, '153814000', 'KABUNTALAN (TUMBAO)', '1538', '153814'),
(1522, '153815000', 'UPI', '1538', '153815'),
(1523, '153816000', 'TALAYAN', '1538', '153816'),
(1524, '153817000', 'SOUTH UPI', '1538', '153817'),
(1525, '153818000', 'BARIRA', '1538', '153818'),
(1526, '153819000', 'GEN. S. K. PENDATUN', '1538', '153819'),
(1527, '153820000', 'MAMASAPANO', '1538', '153820'),
(1528, '153821000', 'TALITAY', '1538', '153821'),
(1529, '153822000', 'PAGAGAWAN', '1538', '153822'),
(1530, '153823000', 'PAGLAT', '1538', '153823'),
(1531, '153824000', 'SULTAN MASTURA', '1538', '153824'),
(1532, '153825000', 'GUINDULUNGAN', '1538', '153825'),
(1533, '153826000', 'DATU SAUDI-AMPATUAN', '1538', '153826'),
(1534, '153827000', 'DATU UNSAY', '1538', '153827'),
(1535, '153828000', 'DATU ABDULLAH SANGKI', '1538', '153828'),
(1536, '153829000', 'RAJAH BUAYAN', '1538', '153829'),
(1537, '153830000', 'DATU BLAH T. SINSUAT', '1538', '153830'),
(1538, '153831000', 'DATU ANGGAL MIDTIMBANG', '1538', '153831'),
(1539, '153832000', 'MANGUDADATU', '1538', '153832'),
(1540, '153833000', 'PANDAG', '1538', '153833'),
(1541, '153834000', 'NORTHERN KABUNTALAN', '1538', '153834'),
(1542, '153835000', 'DATU HOFFER AMPATUAN', '1538', '153835'),
(1543, '153836000', 'DATU SALIBO', '1538', '153836'),
(1544, '153837000', 'SHARIFF SAYDONA MUSTAPHA', '1538', '153837'),
(1545, '156601000', 'INDANAN', '1566', '156601'),
(1546, '156602000', 'JOLO (Capital)', '1566', '156602'),
(1547, '156603000', 'KALINGALAN CALUANG', '1566', '156603'),
(1548, '156604000', 'LUUK', '1566', '156604'),
(1549, '156605000', 'MAIMBUNG', '1566', '156605'),
(1550, '156606000', 'HADJI PANGLIMA TAHIL (MARUNGGAS)', '1566', '156606'),
(1551, '156607000', 'OLD PANAMAO', '1566', '156607'),
(1552, '156608000', 'PANGUTARAN', '1566', '156608'),
(1553, '156609000', 'PARANG', '1566', '156609'),
(1554, '156610000', 'PATA', '1566', '156610'),
(1555, '156611000', 'PATIKUL', '1566', '156611'),
(1556, '156612000', 'SIASI', '1566', '156612'),
(1557, '156613000', 'TALIPAO', '1566', '156613'),
(1558, '156614000', 'TAPUL', '1566', '156614'),
(1559, '156615000', 'TONGKIL', '1566', '156615'),
(1560, '156616000', 'PANGLIMA ESTINO (NEW PANAMAO)', '1566', '156616'),
(1561, '156617000', 'LUGUS', '1566', '156617'),
(1562, '156618000', 'PANDAMI', '1566', '156618'),
(1563, '156619000', 'OMAR', '1566', '156619'),
(1564, '157001000', 'PANGLIMA SUGALA (BALIMBING)', '1570', '157001'),
(1565, '157002000', 'BONGAO (Capital)', '1570', '157002'),
(1566, '157003000', 'MAPUN (CAGAYAN DE TAWI-TAWI)', '1570', '157003'),
(1567, '157004000', 'SIMUNUL', '1570', '157004'),
(1568, '157005000', 'SITANGKAI', '1570', '157005'),
(1569, '157006000', 'SOUTH UBIAN', '1570', '157006'),
(1570, '157007000', 'TANDUBAS', '1570', '157007'),
(1571, '157008000', 'TURTLE ISLANDS', '1570', '157008'),
(1572, '157009000', 'LANGUYAN', '1570', '157009'),
(1573, '157010000', 'SAPA-SAPA', '1570', '157010'),
(1574, '157011000', 'SIBUTU', '1570', '157011'),
(1575, '160201000', 'BUENAVISTA', '1602', '160201'),
(1576, '160202000', 'BUTUAN CITY (Capital)', '1602', '160202'),
(1577, '160203000', 'CITY OF CABADBARAN', '1602', '160203'),
(1578, '160204000', 'CARMEN', '1602', '160204'),
(1579, '160205000', 'JABONGA', '1602', '160205'),
(1580, '160206000', 'KITCHARAO', '1602', '160206'),
(1581, '160207000', 'LAS NIEVES', '1602', '160207'),
(1582, '160208000', 'MAGALLANES', '1602', '160208'),
(1583, '160209000', 'NASIPIT', '1602', '160209'),
(1584, '160210000', 'SANTIAGO', '1602', '160210'),
(1585, '160211000', 'TUBAY', '1602', '160211'),
(1586, '160212000', 'REMEDIOS T. ROMUALDEZ', '1602', '160212'),
(1587, '160301000', 'CITY OF BAYUGAN', '1603', '160301'),
(1588, '160302000', 'BUNAWAN', '1603', '160302'),
(1589, '160303000', 'ESPERANZA', '1603', '160303'),
(1590, '160304000', 'LA PAZ', '1603', '160304'),
(1591, '160305000', 'LORETO', '1603', '160305'),
(1592, '160306000', 'PROSPERIDAD (Capital)', '1603', '160306'),
(1593, '160307000', 'ROSARIO', '1603', '160307'),
(1594, '160308000', 'SAN FRANCISCO', '1603', '160308'),
(1595, '160309000', 'SAN LUIS', '1603', '160309'),
(1596, '160310000', 'SANTA JOSEFA', '1603', '160310'),
(1597, '160311000', 'TALACOGON', '1603', '160311'),
(1598, '160312000', 'TRENTO', '1603', '160312'),
(1599, '160313000', 'VERUELA', '1603', '160313'),
(1600, '160314000', 'SIBAGAT', '1603', '160314'),
(1601, '166701000', 'ALEGRIA', '1667', '166701'),
(1602, '166702000', 'BACUAG', '1667', '166702'),
(1603, '166704000', 'BURGOS', '1667', '166704'),
(1604, '166706000', 'CLAVER', '1667', '166706'),
(1605, '166707000', 'DAPA', '1667', '166707'),
(1606, '166708000', 'DEL CARMEN', '1667', '166708'),
(1607, '166710000', 'GENERAL LUNA', '1667', '166710'),
(1608, '166711000', 'GIGAQUIT', '1667', '166711'),
(1609, '166714000', 'MAINIT', '1667', '166714'),
(1610, '166715000', 'MALIMONO', '1667', '166715'),
(1611, '166716000', 'PILAR', '1667', '166716'),
(1612, '166717000', 'PLACER', '1667', '166717'),
(1613, '166718000', 'SAN BENITO', '1667', '166718'),
(1614, '166719000', 'SAN FRANCISCO (ANAO-AON)', '1667', '166719'),
(1615, '166720000', 'SAN ISIDRO', '1667', '166720'),
(1616, '166721000', 'SANTA MONICA (SAPAO)', '1667', '166721'),
(1617, '166722000', 'SISON', '1667', '166722'),
(1618, '166723000', 'SOCORRO', '1667', '166723'),
(1619, '166724000', 'SURIGAO CITY (Capital)', '1667', '166724'),
(1620, '166725000', 'TAGANA-AN', '1667', '166725'),
(1621, '166727000', 'TUBOD', '1667', '166727'),
(1622, '166801000', 'BAROBO', '1668', '166801'),
(1623, '166802000', 'BAYABAS', '1668', '166802'),
(1624, '166803000', 'CITY OF BISLIG', '1668', '166803'),
(1625, '166804000', 'CAGWAIT', '1668', '166804'),
(1626, '166805000', 'CANTILAN', '1668', '166805'),
(1627, '166806000', 'CARMEN', '1668', '166806'),
(1628, '166807000', 'CARRASCAL', '1668', '166807'),
(1629, '166808000', 'CORTES', '1668', '166808'),
(1630, '166809000', 'HINATUAN', '1668', '166809'),
(1631, '166810000', 'LANUZA', '1668', '166810'),
(1632, '166811000', 'LIANGA', '1668', '166811'),
(1633, '166812000', 'LINGIG', '1668', '166812'),
(1634, '166813000', 'MADRID', '1668', '166813'),
(1635, '166814000', 'MARIHATAG', '1668', '166814'),
(1636, '166815000', 'SAN AGUSTIN', '1668', '166815'),
(1637, '166816000', 'SAN MIGUEL', '1668', '166816'),
(1638, '166817000', 'TAGBINA', '1668', '166817'),
(1639, '166818000', 'TAGO', '1668', '166818'),
(1640, '166819000', 'CITY OF TANDAG (Capital)', '1668', '166819'),
(1641, '168501000', 'BASILISA (RIZAL)', '1685', '168501'),
(1642, '168502000', 'CAGDIANAO', '1685', '168502'),
(1643, '168503000', 'DINAGAT', '1685', '168503'),
(1644, '168504000', 'LIBJO (ALBOR)', '1685', '168504'),
(1645, '168505000', 'LORETO', '1685', '168505'),
(1646, '168506000', 'SAN JOSE (Capital)', '1685', '168506'),
(1647, '168507000', 'TUBAJON', '1685', '168507');

-- --------------------------------------------------------

--
-- Table structure for table `refprovince`
--

CREATE TABLE `refprovince` (
  `prov_id` int(11) NOT NULL,
  `psgcCode` varchar(255) DEFAULT NULL,
  `provDesc` text,
  `regCode` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refprovince`
--

INSERT INTO `refprovince` (`prov_id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES
(1, '012800000', 'ILOCOS NORTE', '01', '0128'),
(2, '012900000', 'ILOCOS SUR', '01', '0129'),
(3, '013300000', 'LA UNION', '01', '0133'),
(4, '015500000', 'PANGASINAN', '01', '0155'),
(5, '020900000', 'BATANES', '02', '0209'),
(6, '021500000', 'CAGAYAN', '02', '0215'),
(7, '023100000', 'ISABELA', '02', '0231'),
(8, '025000000', 'NUEVA VIZCAYA', '02', '0250'),
(9, '025700000', 'QUIRINO', '02', '0257'),
(10, '030800000', 'BATAAN', '03', '0308'),
(11, '031400000', 'BULACAN', '03', '0314'),
(12, '034900000', 'NUEVA ECIJA', '03', '0349'),
(13, '035400000', 'PAMPANGA', '03', '0354'),
(14, '036900000', 'TARLAC', '03', '0369'),
(15, '037100000', 'ZAMBALES', '03', '0371'),
(16, '037700000', 'AURORA', '03', '0377'),
(17, '041000000', 'BATANGAS', '04', '0410'),
(18, '042100000', 'CAVITE', '04', '0421'),
(19, '043400000', 'LAGUNA', '04', '0434'),
(20, '045600000', 'QUEZON', '04', '0456'),
(21, '045800000', 'RIZAL', '04', '0458'),
(22, '174000000', 'MARINDUQUE', '17', '1740'),
(23, '175100000', 'OCCIDENTAL MINDORO', '17', '1751'),
(24, '175200000', 'ORIENTAL MINDORO', '17', '1752'),
(25, '175300000', 'PALAWAN', '17', '1753'),
(26, '175900000', 'ROMBLON', '17', '1759'),
(27, '050500000', 'ALBAY', '05', '0505'),
(28, '051600000', 'CAMARINES NORTE', '05', '0516'),
(29, '051700000', 'CAMARINES SUR', '05', '0517'),
(30, '052000000', 'CATANDUANES', '05', '0520'),
(31, '054100000', 'MASBATE', '05', '0541'),
(32, '056200000', 'SORSOGON', '05', '0562'),
(33, '060400000', 'AKLAN', '06', '0604'),
(34, '060600000', 'ANTIQUE', '06', '0606'),
(35, '061900000', 'CAPIZ', '06', '0619'),
(36, '063000000', 'ILOILO', '06', '0630'),
(37, '064500000', 'NEGROS OCCIDENTAL', '06', '0645'),
(38, '067900000', 'GUIMARAS', '06', '0679'),
(39, '071200000', 'BOHOL', '07', '0712'),
(40, '072200000', 'CEBU', '07', '0722'),
(41, '074600000', 'NEGROS ORIENTAL', '07', '0746'),
(42, '076100000', 'SIQUIJOR', '07', '0761'),
(43, '082600000', 'EASTERN SAMAR', '08', '0826'),
(44, '083700000', 'LEYTE', '08', '0837'),
(45, '084800000', 'NORTHERN SAMAR', '08', '0848'),
(46, '086000000', 'SAMAR (WESTERN SAMAR)', '08', '0860'),
(47, '086400000', 'SOUTHERN LEYTE', '08', '0864'),
(48, '087800000', 'BILIRAN', '08', '0878'),
(49, '097200000', 'ZAMBOANGA DEL NORTE', '09', '0972'),
(50, '097300000', 'ZAMBOANGA DEL SUR', '09', '0973'),
(51, '098300000', 'ZAMBOANGA SIBUGAY', '09', '0983'),
(52, '099700000', 'CITY OF ISABELA', '09', '0997'),
(53, '101300000', 'BUKIDNON', '10', '1013'),
(54, '101800000', 'CAMIGUIN', '10', '1018'),
(55, '103500000', 'LANAO DEL NORTE', '10', '1035'),
(56, '104200000', 'MISAMIS OCCIDENTAL', '10', '1042'),
(57, '104300000', 'MISAMIS ORIENTAL', '10', '1043'),
(58, '112300000', 'DAVAO DEL NORTE', '11', '1123'),
(59, '112400000', 'DAVAO DEL SUR', '11', '1124'),
(60, '112500000', 'DAVAO ORIENTAL', '11', '1125'),
(61, '118200000', 'COMPOSTELA VALLEY', '11', '1182'),
(62, '118600000', 'DAVAO OCCIDENTAL', '11', '1186'),
(63, '124700000', 'COTABATO (NORTH COTABATO)', '12', '1247'),
(64, '126300000', 'SOUTH COTABATO', '12', '1263'),
(65, '126500000', 'SULTAN KUDARAT', '12', '1265'),
(66, '128000000', 'SARANGANI', '12', '1280'),
(67, '129800000', 'COTABATO CITY', '12', '1298'),
(68, '133900000', 'NCR, CITY OF MANILA, FIRST DISTRICT', '13', '1339'),
(69, '133900000', 'CITY OF MANILA', '13', '1339'),
(70, '137400000', 'NCR, SECOND DISTRICT', '13', '1374'),
(71, '137500000', 'NCR, THIRD DISTRICT', '13', '1375'),
(72, '137600000', 'NCR, FOURTH DISTRICT', '13', '1376'),
(73, '140100000', 'ABRA', '14', '1401'),
(74, '141100000', 'BENGUET', '14', '1411'),
(75, '142700000', 'IFUGAO', '14', '1427'),
(76, '143200000', 'KALINGA', '14', '1432'),
(77, '144400000', 'MOUNTAIN PROVINCE', '14', '1444'),
(78, '148100000', 'APAYAO', '14', '1481'),
(79, '150700000', 'BASILAN', '15', '1507'),
(80, '153600000', 'LANAO DEL SUR', '15', '1536'),
(81, '153800000', 'MAGUINDANAO', '15', '1538'),
(82, '156600000', 'SULU', '15', '1566'),
(83, '157000000', 'TAWI-TAWI', '15', '1570'),
(84, '160200000', 'AGUSAN DEL NORTE', '16', '1602'),
(85, '160300000', 'AGUSAN DEL SUR', '16', '1603'),
(86, '166700000', 'SURIGAO DEL NORTE', '16', '1667'),
(87, '166800000', 'SURIGAO DEL SUR', '16', '1668'),
(88, '168500000', 'DINAGAT ISLANDS', '16', '1685');

-- --------------------------------------------------------

--
-- Table structure for table `refregion`
--

CREATE TABLE `refregion` (
  `reg_id` int(11) NOT NULL,
  `psgcCode` varchar(255) DEFAULT NULL,
  `regDesc` text,
  `regCode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refregion`
--

INSERT INTO `refregion` (`reg_id`, `psgcCode`, `regDesc`, `regCode`) VALUES
(1, '010000000', 'REGION I (ILOCOS REGION)', '11'),
(2, '020000000', 'REGION II (CAGAYAN VALLEY)', '22'),
(3, '030000000', 'REGION III (CENTRAL LUZON)', '33'),
(4, '040000000', 'REGION IV-A (CALABARZON)', '44'),
(5, '170000000', 'REGION IV-B (MIMAROPA)', '17'),
(6, '050000000', 'REGION V (BICOL REGION)', '55'),
(7, '060000000', 'REGION VI (WESTERN VISAYAS)', '66'),
(8, '070000000', 'REGION VII (CENTRAL VISAYAS)', '77'),
(9, '080000000', 'REGION VIII (EASTERN VISAYAS)', '88'),
(10, '090000000', 'REGION IX (ZAMBOANGA PENINSULA)', '99'),
(11, '100000000', 'REGION X (NORTHERN MINDANAO)', '10'),
(12, '110000000', 'REGION XI (DAVAO REGION)', '11'),
(13, '120000000', 'REGION XII (SOCCSKSARGEN)', '12'),
(14, '130000000', 'NATIONAL CAPITAL REGION (NCR)', '13'),
(15, '140000000', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', '14'),
(16, '150000000', 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)', '15'),
(17, '160000000', 'REGION XIII (Caraga)', '16');

-- --------------------------------------------------------

--
-- Table structure for table `suspects`
--

CREATE TABLE `suspects` (
  `suspect_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suspects`
--

INSERT INTO `suspects` (`suspect_id`, `first_name`, `mid_name`, `last_name`, `address`, `occupation`, `birth_date`, `gender`, `civil_status`, `nationality`, `created_at`, `updated_at`) VALUES
(1, 'Laalaa Suspect', 'Mateo', 'Espanola', 'Carmmen, Cagayan de Oro City', 'Web Provider', '1992-02-02', 'male', 'single', 'Filipino', '2017-12-18 23:05:14', '2017-12-18 23:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_files`
--

CREATE TABLE `suspect_files` (
  `suspect_file_id` int(11) NOT NULL,
  `sf_filepath` varchar(250) NOT NULL,
  `suspect_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `police_station_id` int(10) UNSIGNED NOT NULL,
  `user_rank_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `status`, `user_type_id`, `police_station_id`, `user_rank_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Admin', 'admin@g.com', '$2y$10$ypOW8RQB87r2lkurelHhdOTlmIUZ83C.3130LXFA/.dy62n6DO5tu', 'active', 1, 1, 0, 'r9LwqTjKaVag5z71GcHwK37KxPDyzHdkFxNaRLk9HvIvWbFpHj0BU6PzZFzv', '2017-11-18 16:00:00', '2017-11-18 16:00:00'),
(4, 'Test User', 'user@g.com', '$2y$10$do0GxdpYutlqbL0RnTi/1umaCOTK0CiV0A/RdQL6RCIekyq5T5wZu', 'active', 2, 1, 2, 'piigCXOeDBbDMsSTImFrjrLI7cKhteCJiVLDNulwgdRhmNGKsY8DCj553a81', '2017-12-04 05:36:21', '2018-01-16 15:23:20'),
(5, 'Test User 02', 'user02@g.com', '$2y$10$b5yVXnPSYdxgzg97wVCfXeCDCCB3lMz2tsBV6UZa9mFdcqjxqpiNq', 'active', 2, 1, 2, NULL, '2017-12-04 05:36:30', '2018-01-14 17:57:54'),
(6, 'Wendell Liceo', 'wendell@g.com', '$2y$10$xG3iC3dumMcJYe/0bHZnBuQ59TLF508lXgH6zOGU8hwqGfkSJUPn2', 'active', 2, 1, 3, NULL, '2017-12-10 04:10:07', '2018-01-14 17:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_assignments`
--

CREATE TABLE `user_assignments` (
  `user_assignment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `police_station_id` int(10) UNSIGNED NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_cases`
--

CREATE TABLE `user_cases` (
  `user_case_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_cases`
--

INSERT INTO `user_cases` (`user_case_id`, `user_id`, `case_id`, `created_at`, `updated_at`) VALUES
(5, 1, 6, '2017-12-11 16:48:47', '2017-12-11 16:48:47'),
(6, 4, 7, '2017-12-18 23:20:30', '2017-12-18 23:20:30'),
(7, 4, 8, '2018-01-14 16:03:19', '2018-01-14 16:03:19'),
(8, 4, 9, '2018-01-14 16:04:25', '2018-01-14 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `user_log_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ranks`
--

CREATE TABLE `user_ranks` (
  `user_rank_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'normal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `victims`
--

CREATE TABLE `victims` (
  `victim_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `victims`
--

INSERT INTO `victims` (`victim_id`, `first_name`, `mid_name`, `last_name`, `address`, `occupation`, `birth_date`, `gender`, `civil_status`, `nationality`, `created_at`, `updated_at`) VALUES
(23, 'Laalaa', 'Mateo', 'Espanola', 'Carmen, Cagayan de Oro City', 'Web Developer', '2017-01-01', 'male', 'single', 'Filipino', '2017-12-11 16:49:38', '2017-12-11 16:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `victim_files`
--

CREATE TABLE `victim_files` (
  `victim_file_id` int(11) NOT NULL,
  `vf_filepath` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `victim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `victim_files`
--

INSERT INTO `victim_files` (`victim_file_id`, `vf_filepath`, `created_at`, `updated_at`, `victim_id`) VALUES
(5, '1513011094.png', '2017-12-12 00:49:38', '2017-12-12 00:51:34', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `case_blotters`
--
ALTER TABLE `case_blotters`
  ADD PRIMARY KEY (`case_blotter_id`);

--
-- Indexes for table `case_details`
--
ALTER TABLE `case_details`
  ADD PRIMARY KEY (`case_detail_id`);

--
-- Indexes for table `case_folders`
--
ALTER TABLE `case_folders`
  ADD PRIMARY KEY (`case_folder_id`);

--
-- Indexes for table `case_suspects`
--
ALTER TABLE `case_suspects`
  ADD PRIMARY KEY (`case_suspect_id`);

--
-- Indexes for table `case_victims`
--
ALTER TABLE `case_victims`
  ADD PRIMARY KEY (`case_victim_id`);

--
-- Indexes for table `crime_categories`
--
ALTER TABLE `crime_categories`
  ADD PRIMARY KEY (`crime_category_id`);

--
-- Indexes for table `crime_classifications`
--
ALTER TABLE `crime_classifications`
  ADD PRIMARY KEY (`crime_classification_id`);

--
-- Indexes for table `crime_coordinates`
--
ALTER TABLE `crime_coordinates`
  ADD PRIMARY KEY (`crime_coordinate_id`);

--
-- Indexes for table `crime_locations`
--
ALTER TABLE `crime_locations`
  ADD PRIMARY KEY (`crime_location_id`);

--
-- Indexes for table `crime_types`
--
ALTER TABLE `crime_types`
  ADD PRIMARY KEY (`crime_type_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offenses`
--
ALTER TABLE `offenses`
  ADD PRIMARY KEY (`offense_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `police_stations`
--
ALTER TABLE `police_stations`
  ADD PRIMARY KEY (`police_station_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `refcitymun`
--
ALTER TABLE `refcitymun`
  ADD PRIMARY KEY (`citymun_id`);

--
-- Indexes for table `refprovince`
--
ALTER TABLE `refprovince`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `refregion`
--
ALTER TABLE `refregion`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `suspects`
--
ALTER TABLE `suspects`
  ADD PRIMARY KEY (`suspect_id`);

--
-- Indexes for table `suspect_files`
--
ALTER TABLE `suspect_files`
  ADD PRIMARY KEY (`suspect_file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_assignments`
--
ALTER TABLE `user_assignments`
  ADD PRIMARY KEY (`user_assignment_id`);

--
-- Indexes for table `user_cases`
--
ALTER TABLE `user_cases`
  ADD PRIMARY KEY (`user_case_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`user_log_id`);

--
-- Indexes for table `user_ranks`
--
ALTER TABLE `user_ranks`
  ADD PRIMARY KEY (`user_rank_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `victims`
--
ALTER TABLE `victims`
  ADD PRIMARY KEY (`victim_id`);

--
-- Indexes for table `victim_files`
--
ALTER TABLE `victim_files`
  ADD PRIMARY KEY (`victim_file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `case_blotters`
--
ALTER TABLE `case_blotters`
  MODIFY `case_blotter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `case_details`
--
ALTER TABLE `case_details`
  MODIFY `case_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `case_folders`
--
ALTER TABLE `case_folders`
  MODIFY `case_folder_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `case_suspects`
--
ALTER TABLE `case_suspects`
  MODIFY `case_suspect_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `case_victims`
--
ALTER TABLE `case_victims`
  MODIFY `case_victim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `crime_categories`
--
ALTER TABLE `crime_categories`
  MODIFY `crime_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `crime_classifications`
--
ALTER TABLE `crime_classifications`
  MODIFY `crime_classification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `crime_coordinates`
--
ALTER TABLE `crime_coordinates`
  MODIFY `crime_coordinate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `crime_locations`
--
ALTER TABLE `crime_locations`
  MODIFY `crime_location_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `crime_types`
--
ALTER TABLE `crime_types`
  MODIFY `crime_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `offenses`
--
ALTER TABLE `offenses`
  MODIFY `offense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `police_stations`
--
ALTER TABLE `police_stations`
  MODIFY `police_station_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `refcitymun`
--
ALTER TABLE `refcitymun`
  MODIFY `citymun_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1648;
--
-- AUTO_INCREMENT for table `refprovince`
--
ALTER TABLE `refprovince`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `refregion`
--
ALTER TABLE `refregion`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `suspects`
--
ALTER TABLE `suspects`
  MODIFY `suspect_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suspect_files`
--
ALTER TABLE `suspect_files`
  MODIFY `suspect_file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_assignments`
--
ALTER TABLE `user_assignments`
  MODIFY `user_assignment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_cases`
--
ALTER TABLE `user_cases`
  MODIFY `user_case_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `user_log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_ranks`
--
ALTER TABLE `user_ranks`
  MODIFY `user_rank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `victims`
--
ALTER TABLE `victims`
  MODIFY `victim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `victim_files`
--
ALTER TABLE `victim_files`
  MODIFY `victim_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
