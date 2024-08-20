-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 04:23 PM
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
-- Database: `laravel_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `portrait` varchar(255) DEFAULT NULL,
  `landscape` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`id`, `user_id`, `portrait`, `landscape`, `name`, `description`, `href`, `slug`, `priority`, `created_at`, `updated_at`) VALUES
(2, 1, 'assets/img/advert/portrait_2024073734.jpg', 'assets/img/advert/landscape_2024076625.jpg', 'Take', 'the one', 'whevo', 'Om', 6, '2024-07-19 15:53:26', '2024-07-19 15:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `user_id`, `name`, `email`, `phone`, `website`, `address`, `whatsapp`, `facebook`, `instagram`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tourism Directory', 'tourismdirectory@gmail.com', '0782210021', 'www.tdir.com', '18 Cleveland Rd., Milton Park, Harare', 'hkjhkjhkjhkj', 'iyib ugu', '+263 712 876720', 'assets/img/logo/logo_5.jpg', '2024-06-05 04:47:11', '2024-07-23 13:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `priority`, `name`, `image`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'Resorts', 'assets/img/category/category_20240607617.jpg', 'resorts', 'The resorts', '2024-06-05 10:08:05', '2024-06-07 11:36:48'),
(5, 1, 3, 'Churches', 'assets/img/category/category_20240607674.jpg', 'churches', 'churches', '2024-06-06 09:17:02', '2024-06-07 11:39:44'),
(6, 1, 2, 'Hotels', 'assets/img/category/category_2024060783.jpg', 'hotels', 'hotels', '2024-06-06 09:17:31', '2024-06-07 11:37:28'),
(7, 1, 4, 'Banks', 'assets/img/category/category_20240607349.jpg', 'banks', 'the banks', '2024-06-07 11:40:28', '2024-06-07 11:40:28'),
(8, 1, 5, 'Restaurants', 'assets/img/category/category_20240607757.jpg', 'restaurants', 'the restaurants', '2024-06-07 11:41:45', '2024-06-07 11:41:45'),
(9, 1, 6, 'Malls', 'assets/img/category/category_20240607100.jpg', 'malls', 'the malls', '2024-06-07 11:42:55', '2024-06-07 11:42:55'),
(10, 1, 7, 'Garages', 'assets/img/category/category_20240607577.jpg', 'garages', 'the Garages', '2024-06-07 11:43:44', '2024-06-07 11:43:44'),
(11, 1, 8, 'Game Park', 'assets/img/category/category_20240607419.jpg', 'game-park', 'the game parks', '2024-06-07 11:50:31', '2024-06-07 11:50:44'),
(12, 1, 9, 'Supermarkets', 'assets/img/category/category_20240607300.jpg', 'supermarkets', 'the supermarkets', '2024-06-07 11:51:51', '2024-06-07 11:51:51'),
(13, 1, 10, 'Bar and Grill', 'assets/img/category/category_20240607871.jpg', 'bar-and-grill', 'the bar and grill', '2024-06-07 11:53:31', '2024-06-07 11:53:31'),
(14, 1, 11, 'Motels', 'assets/img/category/category_20240607392.jpg', 'motels', 'the motels', '2024-06-07 11:56:57', '2024-06-07 11:57:12'),
(15, 1, 12, 'Food Outlets', 'assets/img/category/category_20240607757.jpg', 'food-outlets', 'the food outlets', '2024-06-07 11:59:20', '2024-06-07 11:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `province_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `priority`, `image`, `slug`, `user_id`, `province_id`, `created_at`, `updated_at`) VALUES
(2, 'Bulawayo', 2, 'assets/img/city/city_20240611762.jpg', 'bulawayo', 1, 4, '2024-06-05 12:30:20', '2024-06-11 05:55:15'),
(3, 'Harare', 1, 'assets/img/city/city_20240607841.jpg', 'harare', 1, 5, '2024-06-05 12:49:44', '2024-06-07 11:21:45'),
(4, 'Gweru', 3, 'assets/img/city/city_20240607542.jpg', 'gweru', 1, 7, '2024-06-07 11:22:45', '2024-06-07 11:22:45'),
(5, 'Chinhoyi', 4, 'assets/img/city/city_20240607109.jpg', 'chinhoyi', 1, 6, '2024-06-07 11:23:38', '2024-06-07 11:23:38'),
(6, 'Masvingo', 6, 'assets/img/city/city_20240607470.jpg', 'masvingo', 1, 3, '2024-06-07 11:24:35', '2024-06-07 11:24:35'),
(7, 'Zvishavane', 5, 'assets/img/city/city_2024060794.jpg', 'zvishavane', 1, 10, '2024-06-07 11:25:15', '2024-06-07 11:25:15'),
(8, 'Kariba', 7, 'assets/img/city/city_20240607981.jpg', 'kariba', 1, 10, '2024-06-07 11:26:11', '2024-06-07 11:26:11'),
(9, 'Beitbridge', 8, 'assets/img/city/city_20240607183.jpg', 'beitbridge', 1, 11, '2024-06-07 11:27:02', '2024-06-07 11:27:02'),
(10, 'Hwange', 9, 'assets/img/city/city_20240607805.jpg', 'hwange', 1, 6, '2024-06-07 11:27:58', '2024-06-07 11:28:10'),
(11, 'Bindura', 10, 'assets/img/city/city_20240607315.jpg', 'bindura', 1, 6, '2024-06-07 11:29:16', '2024-06-07 11:29:16'),
(12, 'Mutare', 11, 'assets/img/city/city_20240607699.jpg', 'mutare', 1, 2, '2024-06-07 11:30:08', '2024-06-07 11:30:08'),
(13, 'Mutoko', 12, 'assets/img/city/city_20240607871.jpg', 'mutoko', 1, 10, '2024-06-07 11:31:03', '2024-06-07 11:31:03'),
(14, 'Chitungwiza', 13, 'assets/img/city/city_20240607880.jpg', 'chitungwiza', 1, 6, '2024-06-07 11:31:44', '2024-06-07 11:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `landscape` varchar(255) DEFAULT NULL,
  `portrait` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `city_id`, `landscape`, `portrait`, `name`, `time`, `date`, `address`, `email`, `phone`, `priority`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 'assets/img/event/landscape_2024074979.jpg', 'assets/img/event/portrait_2024076463.jpg', 'The Music Festival', '08.00am', '01/10/2024', '23 edc', 'e@em.co', '12', 3, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quaerat  dignissimos sequi impedit excepturi vero fugit eum ab qui numquam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quaerat  dignissimos sequi impedit excepturi vero fugit eum ab qui numquam.', '2024-07-22 11:44:28', '2024-07-22 11:44:28'),
(3, 1, 10, 'assets/img/event/landscape_2024074030.jpg', 'assets/img/event/portrait_2024078044.jpg', 'The Great Marathon Run', '10.00', '12 jsn', 'jsodvo', '332', '123222', 9, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quaerat  dignissimos sequi impedit excepturi vero fugit eum ab qui numquam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quaerat  dignissimos sequi impedit excepturi vero fugit eum ab qui numquam.', '2024-07-22 11:49:49', '2024-07-22 11:49:49'),
(4, 1, 3, 'assets/img/event/landscape_2024078685.jpg', 'assets/img/event/portrait_2024074405.jpg', 'The Biggest Event of the Year', '10.00', '01/10/2024', 'pjfpo3j', '221', '1212', 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quaerat  dignissimos sequi impedit excepturi vero fugit eum ab qui numquam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo quaerat  dignissimos sequi impedit excepturi vero fugit eum ab qui numquam.', '2024-07-22 11:42:59', '2024-07-22 11:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `portrait` varchar(255) DEFAULT NULL,
  `landscape` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`id`, `user_id`, `name`, `slug`, `description`, `priority`, `portrait`, `landscape`, `created_at`, `updated_at`) VALUES
(2, 1, 'Wildlife Heritage', 'wildlife-heritage', 'Wildlife Heritage Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nVoluptate recusandae iure corrupti blanditiis eligendi \r\ncommodi ex impedit magni distinctio voluptatum.', 1, 'assets/img/guide/portrait_2024072337.jpg', 'assets/img/guide/landscape_2024072885.jpg', '2024-07-22 09:05:16', '2024-07-22 09:05:16'),
(5, 1, 'Places to visit', 'places-to-visit', 'Places to visit', 1, 'assets/img/guide/portrait_2024071615.jpg', 'assets/img/guide/landscape_2024074510.jpg', '2024-07-20 14:22:31', '2024-07-20 14:22:31'),
(6, 1, 'Things to see', 'things-to-see', 'Lorem ipsum dolor sit amet consectetur, \r\nadipisicing elit. Accusamus rerum esse \r\nvero amet illo magni explicabo quidem, \r\natque odit vel.', 1, 'assets/img/guide/portrait_2024072049.jpg', 'assets/img/guide/landscape_2024075284.jpg', '2024-07-22 09:02:59', '2024-07-22 09:02:59'),
(7, 1, 'Entertainment', 'entertainment', 'Lorem ipsum dolor sit amet consectetur, \r\nadipisicing elit. Accusamus rerum esse \r\nvero amet illo magni explicabo quidem, \r\natque odit vel.', 1, 'assets/img/guide/portrait_2024072443.jpg', 'assets/img/guide/landscape_202407563.jpg', '2024-07-22 09:02:07', '2024-07-22 09:02:07'),
(8, 1, 'Holiday Resorts', 'holiday-resorts', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nVoluptate recusandae iure corrupti blanditiis eligendi \r\ncommodi ex impedit magni distinctio voluptatum.', 3, 'assets/img/guide/portrait_2024077652.jpg', 'assets/img/guide/landscape_202407447.jpg', '2024-07-22 09:09:23', '2024-07-22 09:09:23'),
(9, 1, 'Historical Buildings', 'historical-buildings', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nVoluptate recusandae iure corrupti blanditiis eligendi \r\ncommodi ex impedit magni distinctio voluptatum.', 3, 'assets/img/guide/portrait_2024074553.jpg', 'assets/img/guide/landscape_2024079765.jpg', '2024-07-22 09:18:51', '2024-07-22 09:18:51'),
(10, 1, 'Special Activities', 'special-activities', 'Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Fugit eum provident sunt non explicabo, \r\nfuga totam error reprehenderit quaerat soluta?', 5, 'assets/img/guide/portrait_2024078953.jpg', 'assets/img/guide/landscape_2024079026.jpg', '2024-07-22 09:24:24', '2024-07-22 09:24:24'),
(11, 1, 'Where to eat and sleep', 'where-to-eat-and-sleep', 'Where to eat and sleep Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Fugit eum provident sunt non explicabo, \r\nfuga totam error reprehenderit quaerat soluta?', 2, 'assets/img/guide/portrait_20240755.jpg', 'assets/img/guide/landscape_202407793.jpg', '2024-07-22 09:37:10', '2024-07-22 09:37:10'),
(12, 1, 'National Heritage', 'national-heritage', 'National Heritage', 6, 'assets/img/guide/portrait_202407816.jpg', 'assets/img/guide/landscape_2024072550.jpg', '2024-07-23 11:27:09', '2024-07-23 11:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_27_135108_create_app_infos_table', 1),
(6, '2024_06_05_074930_create_roles_table', 2),
(7, '2024_06_05_111050_create_categories_table', 3),
(9, '2024_06_05_121649_create_provinces_table', 4),
(10, '2024_06_05_130549_create_cities_table', 5),
(11, '2024_06_05_165001_create_place_images_table', 6),
(12, '2024_06_05_171832_create_places_table', 7),
(13, '2024_06_06_090112_create_place_categories_table', 8),
(14, '2024_07_19_111559_create_events_table', 9),
(15, '2024_07_19_111708_create_adverts_table', 9),
(18, '2024_07_20_121632_create_guides_table', 10),
(19, '2024_07_20_121904_create_place_guides_table', 10),
(20, '2024_07_22_232510_create_reviews_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 1, 'mark@email.com', '06bacf6383f37f498278e00d89aeb59433eaf8ed3d4c81a707ac1005b0bb6ba2', '[\"*\"]', NULL, NULL, '2024-06-04 15:23:25', '2024-06-04 15:23:25'),
(4, 'App\\Models\\User', 1, 'mark@email.com', '3e69a5a201d28f5299a434483be5c8e732b2c9164ff57c720a0a857465a39425', '[\"*\"]', NULL, NULL, '2024-06-04 15:26:25', '2024-06-04 15:26:25'),
(11, 'App\\Models\\User', 1, 'mark@email.com', 'e93c8352981862d1b6714d87561b70aa50bdadb3623d631098d99a2bd844e2cf', '[\"*\"]', '2024-06-14 09:40:50', NULL, '2024-06-04 15:35:17', '2024-06-14 09:40:50'),
(12, 'App\\Models\\User', 1, 'mark@email.com', '45159823036e553ec437f2f1bbc9022692527e58e312de7e4af6015e0d02db88', '[\"*\"]', '2024-06-06 09:30:02', NULL, '2024-06-05 03:35:21', '2024-06-06 09:30:02'),
(14, 'App\\Models\\User', 1, 'mark@email.com', 'a5c4a817258364ce7df3a894e1e7700ae2af2c50258342c2088cc8c732fa79cd', '[\"*\"]', '2024-07-23 14:22:14', NULL, '2024-07-23 13:08:28', '2024-07-23 14:22:14'),
(15, 'App\\Models\\User', 1, 'mark@email.com', '414a5082d4f6cc40d406ddb98b59298478925deb9513cc85c68afc88175235cc', '[\"*\"]', '2024-08-19 15:17:23', NULL, '2024-08-19 14:46:45', '2024-08-19 15:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `province_id` bigint(20) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `user_id`, `province_id`, `priority`, `city_id`, `name`, `slug`, `description`, `phone`, `address`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, 3, 'Chicken Inn', 'chicken-inn', 'the chicken inn', '0782210021', '14949  Tynwald South, Harare, Zimbabwe', 'a@gmail.com', 'www.c.co.zw', '2024-06-05 17:40:52', '2024-06-07 12:07:50'),
(2, 1, 5, 2, 3, 'FBC Bank', 'fbc', 'the fbc', '0772', '12 add', 'fbc@gmail.com', 'www.fbc.co.zw', '2024-06-05 17:41:59', '2024-06-07 12:05:59'),
(3, 1, 5, 1, 3, 'HICC Hotels', 'hicc', 'the hicc', '1223', 'Harare', 'hicc@a.com', 'www.hicc.co.zw', '2024-06-05 17:56:05', '2024-06-07 12:04:26'),
(5, 1, 4, 5, 2, 'Methodist Church', 'methodist', 'the Methodist', '077', '18 Cleveland Rd., Milton Park, Harare', 'm@a.com', 'www.m.co.zw', '2024-06-07 12:10:51', '2024-06-07 12:24:38'),
(6, 1, 4, 4, 2, 'Sam Levy Mall', 'sam-levy', 'The Sam Levy Mall', '0782210021', '14949  Tynwald South, Harare, Zimbabwe', 'va@gmail.com', 'hkhklh', '2024-06-07 12:12:18', '2024-06-07 12:15:02'),
(7, 1, 3, 6, 6, 'Ok Supermarket', 'ok', 'the OK', '946549', '88 Piers Road, Borrowdale', 'a@gmail.com', 'www.c.com', '2024-06-07 12:14:17', '2024-06-07 12:14:17'),
(8, 1, 7, 7, 4, 'Barcelos', 'barcelos', 'the barcelos', '49', '88 Piers Road, Borrowdale', 'a@gmail.com', 'www.ens.co.zw', '2024-06-07 12:17:31', '2024-06-07 12:17:31'),
(9, 1, 2, 8, 12, 'Mwanga Lodge', 'test', 'hihih', '0782210021', '14949  Tynwald South, Harare, Zimbabwe', 'markchovava@gmail.com', 'www.mwanga.co.zw', '2024-06-07 12:19:29', '2024-06-07 12:19:29'),
(10, 1, 3, 10, 6, 'Ecobank', 'ecobank', 'The Ecobank', '549', '88 Piers Road, Borrowdale', 'eco@ecobank.com', 'www.ecobank.com', '2024-06-07 12:22:15', '2024-06-07 12:22:15'),
(11, 1, 9, 11, 9, 'Spar Supermarket', 'spar', 'The Spar', '2946549', '88 Piers Road, Borrowdale', 'spar@a.com', 'www.abc.co', '2024-06-07 12:24:03', '2024-06-07 12:24:03'),
(12, 1, 10, 12, 7, 'Cafe Nush', 'cafe-nush', 'The Cafe Nush', '46549', '88 Piers Road, Borrowdale', 'cafe@gmail.com', 'www.cafenush.com', '2024-06-07 12:26:57', '2024-06-07 12:26:57'),
(13, 1, 9, 9, 8, 'Zuva Garage', 'zuva', 'The Zuva Garage', '6549', '88 Piers Road, Borrowdale', 'zuva@gmail.com', 'wwww.zuva.com', '2024-06-07 12:29:06', '2024-06-07 12:29:38'),
(14, 1, 6, 13, 10, 'Best Hotel', 'total', 'The Best Hotel', '946549', '88 Piers Road, Borrowdale', 'total@gmail.com', 'www.total.com', '2024-06-07 12:31:31', '2024-07-22 06:50:44'),
(15, 1, 5, 1, 3, 'Green Restuarant', 'green-restuarant', 'Green Restautranr', '123', '11 abc', 'abc@gm.com', 'www.a.com', '2024-07-22 07:06:49', '2024-07-22 07:06:49'),
(16, 1, 4, 2, 2, 'Wild Resort', 'wild-resort', 'Wild Resort', '0123 23', '23 A B', 'a@g.com', 'www.ab.com', '2024-07-22 07:18:02', '2024-07-22 07:18:02'),
(17, 1, 3, 3, 6, 'Safari Resort', 'safari-resort', 'Safari Resort', '123', '12 A ve', 'a@g.com', 'www.sa.com', '2024-07-22 07:20:25', '2024-07-22 07:20:25'),
(18, 1, 5, 2, 3, 'SA Restuarant', 'safa', 'safa', '0773161033', '18 Cleveland Rd., Milton Park, Harare', 'safa@gm.com', 'www.a.com', '2024-07-22 07:42:09', '2024-07-22 07:42:09'),
(19, 1, 6, 3, 11, 'ACool Hotel', 'oijo', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. \r\nVero sed pariatur dolorum facere cupiditate architecto \r\neos incidunt delectus ea iusto!', '0772946549', '88 Piers Road, Borrowdale', 'kb@gmail.com', 'www.hicc.co.zw', '2024-07-22 07:50:13', '2024-07-22 07:50:39'),
(20, 1, 9, 2, 8, 'Bees Hotel', 'bees-hotel', 'rLorem ipsum, dolor sit amet consectetur adipisicing elit. \r\nVero sed pariatur dolorum facere cupiditate architecto \r\neos incidunt delectus ea iusto!', '0772946549', '88 Piers Road, Borrowdale', 'admin@gmail.com', 'www.as.com', '2024-07-22 08:04:45', '2024-07-22 08:04:45'),
(21, 1, 2, 3, 12, 'Grey Resort', 'grey', 'Lorem ipsum dolor sit amet consectetur, \r\nadipisicing elit. Accusamus rerum esse \r\nvero amet illo magni explicabo quidem, \r\natque odit vel.', '0782210021', '14949  Tynwald South, Harare, Zimbabwe', 'grey@gmail.com', 'www.grey.com', '2024-07-22 09:00:11', '2024-07-22 09:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `place_categories`
--

CREATE TABLE `place_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `place_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_categories`
--

INSERT INTO `place_categories` (`id`, `user_id`, `category_id`, `place_id`, `created_at`, `updated_at`) VALUES
(4, 1, 4, 1, '2024-06-06 09:16:21', '2024-06-06 09:16:21'),
(5, 1, 6, 2, '2024-06-06 09:18:10', '2024-06-06 09:18:10'),
(6, 1, 5, 2, '2024-06-06 09:18:16', '2024-06-06 09:18:16'),
(8, 1, 6, 14, '2024-06-07 13:44:49', '2024-06-07 13:44:49'),
(9, 1, 8, 14, '2024-06-07 13:45:17', '2024-06-07 13:45:17'),
(10, 1, 8, 13, '2024-06-07 13:45:37', '2024-06-07 13:45:37'),
(11, 1, 6, 13, '2024-06-07 13:45:59', '2024-06-07 13:45:59'),
(12, 1, 8, 12, '2024-06-07 13:46:27', '2024-06-07 13:46:27'),
(13, 1, 6, 5, '2024-06-07 13:46:56', '2024-06-07 13:46:56'),
(14, 1, 6, 11, '2024-06-07 13:47:26', '2024-06-07 13:47:26'),
(15, 1, 8, 8, '2024-06-07 14:50:36', '2024-06-07 14:50:36'),
(16, 1, 8, 1, '2024-06-07 14:51:14', '2024-06-07 14:51:14'),
(17, 1, 6, 6, '2024-06-07 14:52:29', '2024-06-07 14:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `place_guides`
--

CREATE TABLE `place_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `place_id` bigint(20) DEFAULT NULL,
  `guide_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_guides`
--

INSERT INTO `place_guides` (`id`, `user_id`, `place_id`, `guide_id`, `created_at`, `updated_at`) VALUES
(2, 1, 13, 2, '2024-07-20 14:20:22', '2024-07-20 14:20:22'),
(3, 1, 21, 5, '2024-07-22 15:10:58', '2024-07-22 15:10:58'),
(4, 1, 21, 8, '2024-07-22 15:11:08', '2024-07-22 15:11:08'),
(5, 1, 20, 5, '2024-07-22 15:15:11', '2024-07-22 15:15:11'),
(6, 1, 20, 11, '2024-07-22 15:15:19', '2024-07-22 15:15:19'),
(7, 1, 19, 5, '2024-07-22 15:15:55', '2024-07-22 15:15:55'),
(8, 1, 19, 11, '2024-07-22 15:16:04', '2024-07-22 15:16:04'),
(9, 1, 19, 8, '2024-07-22 15:16:13', '2024-07-22 15:16:13'),
(10, 1, 18, 5, '2024-07-22 15:16:49', '2024-07-22 15:16:49'),
(11, 1, 18, 10, '2024-07-22 15:16:55', '2024-07-22 15:16:55'),
(12, 1, 18, 11, '2024-07-22 15:17:00', '2024-07-22 15:17:00'),
(13, 1, 15, 5, '2024-07-22 15:17:21', '2024-07-22 15:17:21'),
(14, 1, 15, 10, '2024-07-22 15:17:26', '2024-07-22 15:17:26'),
(15, 1, 15, 8, '2024-07-22 15:17:32', '2024-07-22 15:17:32'),
(16, 1, 5, 5, '2024-07-22 15:17:50', '2024-07-22 15:17:50'),
(17, 1, 5, 10, '2024-07-22 15:17:55', '2024-07-22 15:17:55'),
(18, 1, 5, 11, '2024-07-22 15:18:01', '2024-07-22 15:18:01'),
(19, 1, 11, 7, '2024-07-22 15:21:57', '2024-07-22 15:21:57'),
(20, 1, 11, 9, '2024-07-22 15:22:02', '2024-07-22 15:22:02'),
(21, 1, 20, 7, '2024-07-22 15:22:18', '2024-07-22 15:22:18'),
(22, 1, 14, 7, '2024-07-22 15:22:43', '2024-07-22 15:22:43'),
(23, 1, 14, 5, '2024-07-22 15:22:49', '2024-07-22 15:22:49'),
(24, 1, 14, 6, '2024-07-22 15:23:02', '2024-07-22 15:23:02'),
(25, 1, 15, 7, '2024-07-22 15:23:41', '2024-07-22 15:23:41'),
(26, 1, 16, 7, '2024-07-22 15:24:12', '2024-07-22 15:24:12'),
(27, 1, 16, 9, '2024-07-22 15:24:18', '2024-07-22 15:24:18'),
(28, 1, 21, 12, '2024-08-19 15:02:24', '2024-08-19 15:02:24'),
(29, 1, 20, 12, '2024-08-19 15:02:42', '2024-08-19 15:02:42'),
(30, 1, 19, 12, '2024-08-19 15:02:58', '2024-08-19 15:02:58'),
(31, 1, 13, 12, '2024-08-19 15:03:21', '2024-08-19 15:03:21'),
(32, 1, 17, 12, '2024-08-19 15:04:33', '2024-08-19 15:04:33'),
(33, 1, 17, 7, '2024-08-19 15:04:42', '2024-08-19 15:04:42'),
(34, 1, 12, 10, '2024-08-19 15:17:22', '2024-08-19 15:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `place_images`
--

CREATE TABLE `place_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `place_id` bigint(20) DEFAULT NULL,
  `priority` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_images`
--

INSERT INTO `place_images` (`id`, `user_id`, `place_id`, `priority`, `image`, `created_at`, `updated_at`) VALUES
(16, 1, 3, NULL, 'assets/img/place/place_202406071202.jpg', '2024-06-07 12:04:26', '2024-06-07 12:04:26'),
(17, 1, 3, NULL, 'assets/img/place/place_202406073497.jpg', '2024-06-07 12:04:26', '2024-06-07 12:04:26'),
(18, 1, 3, NULL, 'assets/img/place/place_202406073384.jpg', '2024-06-07 12:04:26', '2024-06-07 12:04:26'),
(19, 1, 3, NULL, 'assets/img/place/place_202406071091.jpg', '2024-06-07 12:04:26', '2024-06-07 12:04:26'),
(20, 1, 3, NULL, 'assets/img/place/place_202406073330.jpg', '2024-06-07 12:04:26', '2024-06-07 12:04:26'),
(21, 1, 2, NULL, 'assets/img/place/place_202406077193.jpg', '2024-06-07 12:05:59', '2024-06-07 12:05:59'),
(22, 1, 2, NULL, 'assets/img/place/place_202406073301.jpg', '2024-06-07 12:05:59', '2024-06-07 12:05:59'),
(23, 1, 2, NULL, 'assets/img/place/place_20240607301.jpg', '2024-06-07 12:05:59', '2024-06-07 12:05:59'),
(24, 1, 2, NULL, 'assets/img/place/place_202406073119.jpg', '2024-06-07 12:05:59', '2024-06-07 12:05:59'),
(25, 1, 2, NULL, 'assets/img/place/place_20240607623.jpg', '2024-06-07 12:05:59', '2024-06-07 12:05:59'),
(26, 1, 1, NULL, 'assets/img/place/place_202406079806.jpg', '2024-06-07 12:07:50', '2024-06-07 12:07:50'),
(27, 1, 1, NULL, 'assets/img/place/place_202406071765.jpg', '2024-06-07 12:07:50', '2024-06-07 12:07:50'),
(28, 1, 1, NULL, 'assets/img/place/place_202406076825.jpg', '2024-06-07 12:07:50', '2024-06-07 12:07:50'),
(29, 1, 1, NULL, 'assets/img/place/place_202406072999.jpg', '2024-06-07 12:07:50', '2024-06-07 12:07:50'),
(30, 1, 1, NULL, 'assets/img/place/place_202406073609.jpg', '2024-06-07 12:07:50', '2024-06-07 12:07:50'),
(31, 1, 5, NULL, 'assets/img/place/place_202406074587.jpg', '2024-06-07 12:10:51', '2024-06-07 12:10:51'),
(32, 1, 5, NULL, 'assets/img/place/place_202406076294.jpg', '2024-06-07 12:10:51', '2024-06-07 12:10:51'),
(33, 1, 5, NULL, 'assets/img/place/place_202406076177.jpg', '2024-06-07 12:10:51', '2024-06-07 12:10:51'),
(34, 1, 5, NULL, 'assets/img/place/place_202406076252.jpg', '2024-06-07 12:10:51', '2024-06-07 12:10:51'),
(35, 1, 5, NULL, 'assets/img/place/place_202406073659.jpg', '2024-06-07 12:10:51', '2024-06-07 12:10:51'),
(36, 1, 6, NULL, 'assets/img/place/place_202406071594.jpg', '2024-06-07 12:12:18', '2024-06-07 12:12:18'),
(37, 1, 6, NULL, 'assets/img/place/place_202406078463.jpg', '2024-06-07 12:12:18', '2024-06-07 12:12:18'),
(38, 1, 6, NULL, 'assets/img/place/place_202406073352.jpg', '2024-06-07 12:12:18', '2024-06-07 12:12:18'),
(39, 1, 6, NULL, 'assets/img/place/place_202406078261.jpg', '2024-06-07 12:12:18', '2024-06-07 12:12:18'),
(40, 1, 6, NULL, 'assets/img/place/place_202406079107.jpg', '2024-06-07 12:12:18', '2024-06-07 12:12:18'),
(41, 1, 7, NULL, 'assets/img/place/place_202406077816.jpg', '2024-06-07 12:14:17', '2024-06-07 12:14:17'),
(42, 1, 7, NULL, 'assets/img/place/place_20240607487.jpg', '2024-06-07 12:14:17', '2024-06-07 12:14:17'),
(43, 1, 7, NULL, 'assets/img/place/place_202406076970.jpg', '2024-06-07 12:14:17', '2024-06-07 12:14:17'),
(44, 1, 7, NULL, 'assets/img/place/place_202406076334.jpg', '2024-06-07 12:14:17', '2024-06-07 12:14:17'),
(45, 1, 7, NULL, 'assets/img/place/place_20240607951.jpg', '2024-06-07 12:14:17', '2024-06-07 12:14:17'),
(46, 1, 8, NULL, 'assets/img/place/place_202406075158.jpg', '2024-06-07 12:17:31', '2024-06-07 12:17:31'),
(47, 1, 8, NULL, 'assets/img/place/place_202406072860.jpg', '2024-06-07 12:17:31', '2024-06-07 12:17:31'),
(48, 1, 8, NULL, 'assets/img/place/place_202406071144.jpg', '2024-06-07 12:17:31', '2024-06-07 12:17:31'),
(49, 1, 8, NULL, 'assets/img/place/place_202406075655.jpg', '2024-06-07 12:17:31', '2024-06-07 12:17:31'),
(50, 1, 8, NULL, 'assets/img/place/place_202406072325.jpg', '2024-06-07 12:17:31', '2024-06-07 12:17:31'),
(51, 1, 9, NULL, 'assets/img/place/place_202406078725.jpg', '2024-06-07 12:19:29', '2024-06-07 12:19:29'),
(52, 1, 9, NULL, 'assets/img/place/place_202406077467.jpg', '2024-06-07 12:19:29', '2024-06-07 12:19:29'),
(53, 1, 9, NULL, 'assets/img/place/place_202406074983.jpg', '2024-06-07 12:19:29', '2024-06-07 12:19:29'),
(54, 1, 9, NULL, 'assets/img/place/place_202406071506.jpg', '2024-06-07 12:19:29', '2024-06-07 12:19:29'),
(55, 1, 9, NULL, 'assets/img/place/place_202406078746.jpg', '2024-06-07 12:19:29', '2024-06-07 12:19:29'),
(56, 1, 10, NULL, 'assets/img/place/place_202406078000.jpg', '2024-06-07 12:22:15', '2024-06-07 12:22:15'),
(57, 1, 10, NULL, 'assets/img/place/place_202406077605.jpg', '2024-06-07 12:22:15', '2024-06-07 12:22:15'),
(58, 1, 10, NULL, 'assets/img/place/place_202406079272.jpg', '2024-06-07 12:22:15', '2024-06-07 12:22:15'),
(59, 1, 10, NULL, 'assets/img/place/place_202406074152.jpg', '2024-06-07 12:22:15', '2024-06-07 12:22:15'),
(60, 1, 10, NULL, 'assets/img/place/place_202406078353.jpg', '2024-06-07 12:22:15', '2024-06-07 12:22:15'),
(61, 1, 11, NULL, 'assets/img/place/place_202406077657.jpg', '2024-06-07 12:24:03', '2024-06-07 12:24:03'),
(62, 1, 11, NULL, 'assets/img/place/place_202406074651.jpg', '2024-06-07 12:24:03', '2024-06-07 12:24:03'),
(63, 1, 11, NULL, 'assets/img/place/place_202406071394.jpg', '2024-06-07 12:24:03', '2024-06-07 12:24:03'),
(64, 1, 11, NULL, 'assets/img/place/place_202406072101.jpg', '2024-06-07 12:24:03', '2024-06-07 12:24:03'),
(65, 1, 11, NULL, 'assets/img/place/place_202406074857.jpg', '2024-06-07 12:24:03', '2024-06-07 12:24:03'),
(66, 1, 12, NULL, 'assets/img/place/place_202406072393.jpg', '2024-06-07 12:26:57', '2024-06-07 12:26:57'),
(67, 1, 12, NULL, 'assets/img/place/place_202406077990.jpg', '2024-06-07 12:26:57', '2024-06-07 12:26:57'),
(68, 1, 12, NULL, 'assets/img/place/place_202406074580.jpg', '2024-06-07 12:26:57', '2024-06-07 12:26:57'),
(69, 1, 12, NULL, 'assets/img/place/place_202406079999.jpg', '2024-06-07 12:26:57', '2024-06-07 12:26:57'),
(70, 1, 12, NULL, 'assets/img/place/place_202406073934.jpg', '2024-06-07 12:26:57', '2024-06-07 12:26:57'),
(71, 1, 13, NULL, 'assets/img/place/place_202406075210.jpg', '2024-06-07 12:29:06', '2024-06-07 12:29:06'),
(72, 1, 13, NULL, 'assets/img/place/place_202406074574.jpg', '2024-06-07 12:29:06', '2024-06-07 12:29:06'),
(73, 1, 13, NULL, 'assets/img/place/place_202406072629.jpg', '2024-06-07 12:29:06', '2024-06-07 12:29:06'),
(74, 1, 13, NULL, 'assets/img/place/place_202406071074.jpg', '2024-06-07 12:29:06', '2024-06-07 12:29:06'),
(75, 1, 13, NULL, 'assets/img/place/place_202406079136.jpg', '2024-06-07 12:29:06', '2024-06-07 12:29:06'),
(76, 1, 14, NULL, 'assets/img/place/place_202406078073.jpg', '2024-06-07 12:31:31', '2024-06-07 12:31:31'),
(77, 1, 14, NULL, 'assets/img/place/place_202406072878.jpg', '2024-06-07 12:31:31', '2024-06-07 12:31:31'),
(78, 1, 14, NULL, 'assets/img/place/place_202406073894.jpg', '2024-06-07 12:31:31', '2024-06-07 12:31:31'),
(79, 1, 14, NULL, 'assets/img/place/place_20240607796.jpg', '2024-06-07 12:31:31', '2024-06-07 12:31:31'),
(80, 1, 14, NULL, 'assets/img/place/place_202406075003.jpg', '2024-06-07 12:31:31', '2024-06-07 12:31:31'),
(81, 1, 15, NULL, 'assets/img/place/place_202407227458.jpg', '2024-07-22 07:06:49', '2024-07-22 07:06:49'),
(82, 1, 15, NULL, 'assets/img/place/place_202407223464.jpg', '2024-07-22 07:06:49', '2024-07-22 07:06:49'),
(83, 1, 15, NULL, 'assets/img/place/place_202407226151.jpg', '2024-07-22 07:06:49', '2024-07-22 07:06:49'),
(84, 1, 15, NULL, 'assets/img/place/place_202407228444.jpg', '2024-07-22 07:06:49', '2024-07-22 07:06:49'),
(85, 1, 15, NULL, 'assets/img/place/place_202407225049.jpg', '2024-07-22 07:06:49', '2024-07-22 07:06:49'),
(86, 1, 16, NULL, 'assets/img/place/place_202407226654.jpg', '2024-07-22 07:18:02', '2024-07-22 07:18:02'),
(87, 1, 16, NULL, 'assets/img/place/place_202407224719.jpg', '2024-07-22 07:18:02', '2024-07-22 07:18:02'),
(88, 1, 16, NULL, 'assets/img/place/place_202407228334.jpg', '2024-07-22 07:18:02', '2024-07-22 07:18:02'),
(89, 1, 16, NULL, 'assets/img/place/place_202407224720.jpg', '2024-07-22 07:18:02', '2024-07-22 07:18:02'),
(90, 1, 16, NULL, 'assets/img/place/place_202407228774.jpg', '2024-07-22 07:18:02', '2024-07-22 07:18:02'),
(91, 1, 17, NULL, 'assets/img/place/place_20240722367.jpg', '2024-07-22 07:20:25', '2024-07-22 07:20:25'),
(92, 1, 17, NULL, 'assets/img/place/place_20240722318.jpg', '2024-07-22 07:20:25', '2024-07-22 07:20:25'),
(93, 1, 17, NULL, 'assets/img/place/place_202407227999.jpg', '2024-07-22 07:20:25', '2024-07-22 07:20:25'),
(94, 1, 17, NULL, 'assets/img/place/place_202407222497.jpg', '2024-07-22 07:20:25', '2024-07-22 07:20:25'),
(95, 1, 17, NULL, 'assets/img/place/place_202407224358.jpg', '2024-07-22 07:20:25', '2024-07-22 07:20:25'),
(96, 1, 18, NULL, 'assets/img/place/place_202407223929.jpg', '2024-07-22 07:42:09', '2024-07-22 07:42:09'),
(97, 1, 18, NULL, 'assets/img/place/place_202407227628.jpg', '2024-07-22 07:42:09', '2024-07-22 07:42:09'),
(98, 1, 18, NULL, 'assets/img/place/place_202407228394.jpg', '2024-07-22 07:42:09', '2024-07-22 07:42:09'),
(99, 1, 18, NULL, 'assets/img/place/place_202407228748.jpg', '2024-07-22 07:42:09', '2024-07-22 07:42:09'),
(100, 1, 18, NULL, 'assets/img/place/place_20240722566.jpg', '2024-07-22 07:42:09', '2024-07-22 07:42:09'),
(101, 1, 19, NULL, 'assets/img/place/place_202407228186.jpg', '2024-07-22 07:50:13', '2024-07-22 07:50:13'),
(102, 1, 19, NULL, 'assets/img/place/place_202407228767.jpg', '2024-07-22 07:50:13', '2024-07-22 07:50:13'),
(103, 1, 19, NULL, 'assets/img/place/place_202407229111.jpg', '2024-07-22 07:50:13', '2024-07-22 07:50:13'),
(104, 1, 19, NULL, 'assets/img/place/place_202407225152.jpg', '2024-07-22 07:50:13', '2024-07-22 07:50:13'),
(105, 1, 19, NULL, 'assets/img/place/place_202407224359.jpg', '2024-07-22 07:50:13', '2024-07-22 07:50:13'),
(106, 1, 20, NULL, 'assets/img/place/place_202407226672.jpg', '2024-07-22 08:04:45', '2024-07-22 08:04:45'),
(107, 1, 20, NULL, 'assets/img/place/place_202407226060.jpg', '2024-07-22 08:04:45', '2024-07-22 08:04:45'),
(108, 1, 20, NULL, 'assets/img/place/place_20240722818.jpg', '2024-07-22 08:04:45', '2024-07-22 08:04:45'),
(109, 1, 20, NULL, 'assets/img/place/place_202407227478.jpg', '2024-07-22 08:04:45', '2024-07-22 08:04:45'),
(110, 1, 20, NULL, 'assets/img/place/place_202407223984.jpg', '2024-07-22 08:04:45', '2024-07-22 08:04:45'),
(111, 1, 21, NULL, 'assets/img/place/place_202407224201.jpg', '2024-07-22 09:00:11', '2024-07-22 09:00:11'),
(112, 1, 21, NULL, 'assets/img/place/place_202407228419.jpg', '2024-07-22 09:00:11', '2024-07-22 09:00:11'),
(113, 1, 21, NULL, 'assets/img/place/place_2024072298.jpg', '2024-07-22 09:00:11', '2024-07-22 09:00:11'),
(114, 1, 21, NULL, 'assets/img/place/place_202407224544.jpg', '2024-07-22 09:00:11', '2024-07-22 09:00:11'),
(115, 1, 21, NULL, 'assets/img/place/place_202407224165.jpg', '2024-07-22 09:00:11', '2024-07-22 09:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `user_id`, `priority`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'Manicaland', 'assets/img/province/province_20240612213.jpg', 'manicaland', '2024-06-05 10:53:28', '2024-06-12 12:54:21'),
(3, 1, 3, 'Masvingo', 'assets/img/province/province_20240612921.jpg', 'masvingo', '2024-06-05 10:55:27', '2024-06-12 12:55:25'),
(4, 1, 2, 'Bulawayo', 'assets/img/province/province_20240612977.jpg', 'bulawayo', '2024-06-05 10:56:13', '2024-06-12 12:55:49'),
(5, 1, 1, 'Harare', 'assets/img/province/province_20240612468.jpg', 'harare', '2024-06-05 10:56:32', '2024-06-12 12:53:24'),
(6, 1, 5, 'Mashonaland Central', 'assets/img/province/province_20240612901.jpg', 'mashonaland-central', '2024-06-07 11:13:38', '2024-06-12 12:55:05'),
(7, 1, 6, 'Midlands', 'assets/img/province/province_20240612121.jpg', 'midlands', '2024-06-07 11:14:14', '2024-06-12 12:53:55'),
(8, 1, 7, 'Mashonaland East', 'assets/img/province/province_20240612229.jpg', 'mashonaland-east', '2024-06-07 11:15:19', '2024-06-12 12:52:57'),
(9, 1, 8, 'Matebeleland North', 'assets/img/province/province_20240612928.jpg', 'matebeleland-north', '2024-06-07 11:16:31', '2024-06-12 12:52:35'),
(10, 1, 9, 'Mashonaland West', 'assets/img/province/province_20240612545.jpg', 'mashonaland-west', '2024-06-07 11:17:28', '2024-06-12 12:52:13'),
(11, 1, 10, 'Matebeleland South', 'assets/img/province/province_202406120.jpg', 'matebeleland-south', '2024-06-07 11:19:27', '2024-06-12 12:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `place_id` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `email`, `rating`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, 19, 'm@fvofin', 3, 'hjhgg', '2024-07-23 07:25:03', '2024-07-23 07:25:03'),
(2, NULL, 19, 'kb@gmail.com', 4, 'niuvbiv', '2024-07-23 07:46:23', '2024-07-23 07:46:23'),
(7, NULL, 16, 'a@g.com', 4, 'Go on', '2024-07-23 13:09:50', '2024-07-23 13:09:50'),
(8, NULL, 16, NULL, 1, NULL, '2024-07-23 13:10:28', '2024-07-23 13:10:28'),
(9, NULL, 13, 'zuva@gmail.com', 4, 'Tetsing', '2024-08-20 12:10:37', '2024-08-20 12:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` bigint(20) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `name`, `level`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mark Chovava', 1, 'nklnlk', 'featured', '2024-06-05 06:18:49', '2024-06-05 06:18:49'),
(2, 1, 'Manage', 2, NULL, 'manager', '2024-06-05 06:58:12', '2024-06-05 06:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role_level` int(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `gender`, `role_level`, `dob`, `code`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mark', NULL, NULL, NULL, 1, NULL, '12345678', '123', '14949  Tynwald South, Harare, Zimbabwe', 'mark@email.com', NULL, '$2y$12$EjoUSFqzg9f1vdgcbM.95.Qb.ywlMnsVUU6JDiLwCunPg/Vc5n/da', NULL, '2024-06-04 14:40:29', '2024-06-05 03:55:36'),
(4, 'Admin Chovava', NULL, NULL, NULL, 2, NULL, 'jCtcg2XF', '0772946549', '88 Piers Road, Borrowdale', 'ad@gmail.com', NULL, '$2y$12$0h92sb.Ri4yUlnLUYvBu/uKlEQdaL/EchR8LWkl0kJdXviE6yOnhC', NULL, '2024-06-05 08:30:50', '2024-06-05 08:52:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_categories`
--
ALTER TABLE `place_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_guides`
--
ALTER TABLE `place_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_images`
--
ALTER TABLE `place_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `place_categories`
--
ALTER TABLE `place_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `place_guides`
--
ALTER TABLE `place_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `place_images`
--
ALTER TABLE `place_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
