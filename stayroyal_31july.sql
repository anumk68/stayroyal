-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 03:01 PM
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
-- Database: `stayroyal_30july`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roll_id` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_days` varchar(255) DEFAULT NULL,
  `adults` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `children` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `infants` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `extra_beds` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_type`, `user_id`, `room_id`, `location`, `price`, `size`, `start_date`, `end_date`, `total_days`, `adults`, `children`, `infants`, `extra_beds`, `created_at`, `updated_at`) VALUES
(34, '3', 6, 6, '', '44100.00', '', '2025-07-31', '2025-08-07', '7', 1, 0, 0, 0, '2025-07-31 02:26:13', '2025-07-31 02:26:13'),
(35, '3', 6, 6, '', '44100.00', '', '2025-08-08', '2025-08-15', '7', 1, 0, 0, 0, '2025-07-31 02:26:35', '2025-07-31 02:26:35'),
(36, '3', 6, 6, '', '44100.00', '', '2025-08-17', '2025-08-24', '7', 1, 0, 0, 0, '2025-07-31 03:03:43', '2025-07-31 03:03:43'),
(37, '3', 6, 6, '', '44100.00', '', '2025-08-25', '2025-09-01', '7', 1, 0, 0, 0, '2025-07-31 03:26:26', '2025-07-31 03:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Is_subscribe` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `meta_type_id` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `meta_title`, `value`, `meta_type_id`, `created_at`, `updated_at`) VALUES
(3, 'title_home', 'Luxury 4BHK Villa in Mohali | Homestay in Mohali - Stay Royal', 'title', '2025-07-24 01:11:47', '2025-07-24 01:11:47'),
(4, 'description_home', 'Experience premium living in Mohali with Stay Royal 4BHK villa. Ideal for families or business stays. Fully equipped, AC, TV, kitchen & online booking.', 'description', '2025-07-24 01:12:19', '2025-07-24 01:12:19'),
(5, 'title_about', 'About Us | Luxury Villa & Homestay in Mohali - Stay Royal', 'title', '2025-07-24 01:14:04', '2025-07-24 01:14:04'),
(6, 'description_about', 'Learn about Stay Royal BnB, a thoughtfully designed luxury homestay in Mohali that offers a luxurious stay and a truly home-like experience.', 'description', '2025-07-24 01:14:34', '2025-07-24 01:14:34'),
(7, 'title_rooms', 'Best Mohali Rooms | Luxury Rooms in Mohali - Stay Royal', 'title', '2025-07-24 01:15:16', '2025-07-24 01:15:16'),
(8, 'description_rooms', 'Stay Royal offers premium rooms in Mohali and Kharar with elegant interiors, comfort, and personalized service. Ideal for business trips and relaxing getaways.', 'description', '2025-07-24 01:15:43', '2025-07-24 01:15:43'),
(9, 'title_2bhk-luxury-villa-ground-floor', '2BHK Luxury Villa Ground Floor Stay – Stay Royal BNB Mohali', 'title', '2025-07-24 01:19:21', '2025-07-24 01:19:21'),
(10, 'description_2bhk-luxury-villa-ground-floor', 'Book a spacious 2BHK luxury villa on the ground floor at Stay Royal BNB in Mohali. Enjoy elegant interiors, modern amenities, and a peaceful private stay.', 'description', '2025-07-24 01:24:24', '2025-07-24 01:24:24'),
(11, 'title_2BHK_Luxury_Villa_First_Floor_Page', '2BHK Luxury Villa First Floor Stay | Stay Royal BNB Mohali', 'title', '2025-07-24 03:34:26', '2025-07-24 03:34:26'),
(12, 'description_2BHK_Luxury_Villa_First_Floor_Page', 'Enjoy a stylish stay in our 2BHK Luxury Villa on the first floor at Stay Royal BNB, Mohali. Perfect for families or couples seeking comfort, space, and privacy.', 'description', '2025-07-24 03:35:05', '2025-07-24 03:35:05'),
(13, 'description_2BHK_Luxury_Villa_First_Floor_Page', 'Enjoy a stylish stay in our 2BHK Luxury Villa on the first floor at Stay Royal BNB, Mohali. Perfect for families or couples seeking comfort, space, and privacy.', 'description', '2025-07-24 03:35:05', '2025-07-24 03:35:05'),
(14, 'title_Complete_Villa_4BHK_Page', '4BHK Luxury Villa Stay | Complete Villa at Stay Royal Mohali', 'title', '2025-07-24 03:36:22', '2025-07-24 03:36:22'),
(15, 'description_Complete_Villa_4BHK_Page', 'Book the full 4BHK Luxury Villa at Stay Royal BNB in Mohali. Perfect for families or groups seeking privacy, comfort, and a premium homestay experience.', 'description', '2025-07-24 03:36:49', '2025-07-24 03:36:49'),
(16, 'title_contact', 'Contact Us | Stay Royal BNB – Luxury Villa in Mohali', 'title', '2025-07-24 03:37:42', '2025-07-24 03:37:42'),
(17, 'description_contact', 'Get in touch with Stay Royal BNB for bookings, inquiries, or support. Reach out anytime for a seamless stay at our luxury villa and homestay in Mohali.', 'description', '2025-07-24 03:38:27', '2025-07-24 03:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `metatypes`
--

CREATE TABLE `metatypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_06_04_105358_create_enquiries_table', 1),
(4, '2025_06_06_051824_create_admins_table', 1),
(5, '2025_06_12_050811_create_blogcategories_table', 1),
(6, '2025_06_12_050918_create_blogs_table', 1),
(7, '2025_06_12_051422_create_metatypes_table', 1),
(8, '2025_06_12_051519_create_metas_table', 1),
(9, '2025_06_12_051914_create_roomtypes_table', 1),
(10, '2025_06_12_051959_create_rooms_table', 1),
(11, '2025_06_12_052542_create_users_table', 1),
(12, '2025_06_12_052814_create_bookings_table', 1),
(13, '2025_06_12_052953_create_payments_table', 1),
(14, '2025_06_12_053044_create_reviews_table', 1),
(15, '2025_06_25_061105_add_role_to_users_table', 1),
(16, '2025_06_25_110021_add_order_id_to_payments_table', 1),
(17, '2025_06_26_135306_create_subscriptions_table', 1),
(18, '2025_07_14_124404_add_columns_to_rooms_table', 1),
(19, '2025_07_16_121430_create_offers_table', 1),
(20, '2025_07_25_060811_add_slug_to_blogs_table', 2),
(21, '2025_07_25_063105_add_more_fields_to_blogs_table', 3),
(22, '2025_07_28_062717_add_guest_columns_to_bookings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `offer_price` double NOT NULL,
  `offer_valid_time` varchar(255) NOT NULL,
  `after_discount_price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `room_type_id`, `offer_price`, `offer_valid_time`, `after_discount_price`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(4, 3, 10, '1 week', 6300, 1, 'one-week-offer', '2025-07-16 07:37:13', '2025-07-31 00:23:32'),
(6, 2, 15, '15 days', 2975, 1, '15-days-offer', '2025-07-16 07:47:32', '2025-07-31 01:43:34'),
(7, 3, 15, '15 days', 5950, 1, '15-days-offer', '2025-07-16 07:47:43', '2025-07-31 01:44:10'),
(9, 2, 20, '30 days', 2800, 1, '30-days-offer', '2025-07-16 07:48:21', '2025-07-31 01:44:28'),
(10, 3, 20, '30 days', 5600, 1, '30-days-offer', '2025-07-16 07:48:32', '2025-07-31 01:44:58');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'USD',
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_id`, `room_id`, `amount`, `currency`, `payment_method`, `transaction_id`, `status`, `paid_at`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-18 07:10:15', '2025-07-18 07:10:15'),
(2, 1, NULL, NULL, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-18 07:12:29', '2025-07-18 07:12:29'),
(3, 1, NULL, NULL, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-19 02:12:25', '2025-07-19 02:12:25'),
(4, 1, NULL, NULL, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-19 02:18:29', '2025-07-19 02:18:29'),
(6, 1, NULL, NULL, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-19 02:31:37', '2025-07-19 02:31:37'),
(7, 1, NULL, NULL, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-19 04:01:35', '2025-07-19 04:01:35'),
(8, 1, NULL, NULL, 3150.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-19 04:13:24', '2025-07-19 04:13:24'),
(19, 5, NULL, 6, 14000.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-25 02:06:53', '2025-07-25 02:06:53'),
(20, 6, NULL, 7, 23850.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-28 07:00:26', '2025-07-28 07:00:26'),
(21, 6, NULL, 5, 24750.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-28 07:02:32', '2025-07-28 07:02:32'),
(22, 6, NULL, 7, 11500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-28 23:22:21', '2025-07-28 23:22:21'),
(23, 6, NULL, NULL, 24750.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-29 00:54:59', '2025-07-29 00:54:59'),
(24, 6, NULL, 5, 22950.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-29 01:05:04', '2025-07-29 01:05:04'),
(25, 6, NULL, 5, 22950.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-29 01:11:28', '2025-07-29 01:11:28'),
(26, 6, NULL, 5, 45000.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-29 01:11:50', '2025-07-29 01:11:50'),
(27, 6, NULL, 7, 4500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-30 06:33:12', '2025-07-30 06:33:12'),
(28, 6, NULL, 7, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:18:38', '2025-07-31 02:18:38'),
(29, 6, NULL, 7, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:18:43', '2025-07-31 02:18:43'),
(30, 6, NULL, 7, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:18:47', '2025-07-31 02:18:47'),
(31, 6, NULL, 7, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:19:32', '2025-07-31 02:19:32'),
(32, 6, NULL, 7, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:19:47', '2025-07-31 02:19:47'),
(33, 6, NULL, 7, 3500.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:20:03', '2025-07-31 02:20:03'),
(34, 6, NULL, 7, 7000.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:23:03', '2025-07-31 02:23:03'),
(35, 6, NULL, 6, 44100.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:26:13', '2025-07-31 02:26:13'),
(36, 6, NULL, 6, 44100.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 02:26:35', '2025-07-31 02:26:35'),
(37, 6, NULL, 6, 44100.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 03:03:43', '2025-07-31 03:03:43'),
(38, 6, NULL, 6, 44100.00, 'INR', 'ccavenue', NULL, 'pending', NULL, NULL, '2025-07-31 03:26:26', '2025-07-31 03:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `room_id`, `rating`, `comment`, `approved`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 3, NULL, 0, 0, '2025-07-07 18:30:00', '2025-07-19 07:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amenities`)),
  `rating` double DEFAULT NULL,
  `rating_count` int(11) NOT NULL DEFAULT 0,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `room_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`room_images`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `location`, `price`, `room_image`, `size`, `created_at`, `updated_at`, `amenities`, `rating`, `rating_count`, `check_in`, `check_out`, `room_images`, `status`, `slug`, `description`) VALUES
(5, '2', 'Villa 87, Sector 125, Kharar, Punjab 140301', '3500', NULL, '1500', '2025-07-21 10:13:12', '2025-07-31 04:30:25', '[{\"icon\":\"amenities\\/4pVPjBGmMl7vBOs8emelfd3r0ha50maSUULsKVF9.png\",\"text\":\"2 Rooms\"},{\"icon\":\"amenities\\/BcmHyMzKR6LGwB6aFBQUgbs3rml9XHScK5wNFGzQ.png\",\"text\":\"2 Washrooms\"},{\"icon\":\"amenities\\/gY348Sh8AAi7NOz2jjX2Gngdet7quwWtr06S6Zhj.png\",\"text\":\"Living Room\"},{\"icon\":\"amenities\\/j4eBvRjwPVQF6nF9eeuMFbwq3EDbU3vIcPK2Cipe.png\",\"text\":\"Modern Kitchen\"},{\"icon\":\"amenities\\/4fZnLXyTt0QOhAd2CqRyidUMD8tb8psFXMO9mxkA.png\",\"text\":\"Dining Area\"},{\"icon\":\"amenities\\/hwxnvUAtMWOW7yJn7kcgU0lixYfOBajdaGPaLN49.png\",\"text\":\"4 Guests\"}]', 4.6, 1, '2025-07-21 15:42:00', '2025-07-23 15:42:00', '[\"uploads\\/rooms\\/1753092792_687e12b8926d1.jpeg\",\"uploads\\/rooms\\/1753092792_687e12b89297e.jpeg\",\"uploads\\/rooms\\/1753092792_687e12b892ae8.jpeg\",\"uploads\\/rooms\\/1753092792_687e12b892ca1.jpeg\",\"uploads\\/rooms\\/1753092792_687e12b892e7f.jpeg\"]', 1, 'first-floor-2bhk', '<h3><strong>First-Floor Privacy, Premium Amenities&nbsp;</strong></h3><p>Experience elevated living in our beautifully designed&nbsp;<strong>2BHK Luxury Villa on the First Floor</strong>. Ideal for families, professionals, or couples, this well-furnished space blends privacy and elegance with contemporary comfort. Enjoy spacious bedrooms, a cozy lounge, and a private kitchen equipped with modern appliances—perfect for short and long stays.</p><p>Large windows invite natural light and city views, while thoughtful interiors provide a warm and inviting atmosphere. Whether you\'re working remotely or vacationing, this first-floor villa delivers a seamless living experience with the freedom of your own space and the service of a premium stay.</p><h3><strong>Check-In</strong></h3><ul><li>Check-in from&nbsp;<strong>9:00 AM – Anytime</strong></li><li>Early check-in available (subject to availability)</li></ul><h3><strong>Check-Out</strong></h3><ul><li>Standard check-out by&nbsp;<strong>12:00 PM (noon)</strong></li><li>Flexible check-out from&nbsp;<strong>9:00 AM – Anytime</strong>, subject to availability</li></ul><h3><strong>House Rules</strong></h3><p>We strive to provide a peaceful and comfortable environment for all our guests. To ensure an enjoyable stay, we request that guests respect the property and its surroundings. Loud music or gatherings are not allowed after 10 PM to maintain the serenity of the neighborhood. Guests are required to present a valid government-issued ID at check-in, and any external visitors must be approved by the management in advance. These simple rules help us ensure a safe, respectful, and relaxing experience for everyone.</p><h3><strong>Children &amp; Extra Beds</strong></h3><p>Our villa is family-friendly and welcoming to guests of all ages. Children under 5 stay free using existing beds. Extra mattresses can be arranged upon request at an additional charge. Baby cots are not available at this property.</p><p><strong>Highlights:</strong></p><ul><li>Children of all ages welcome</li><li>Free stay for kids under 5</li><li>Extra mattresses available (charges apply)</li><li>No baby cots available</li></ul>'),
(6, '3', 'Villa 87, Sector 125, Kharar, Punjab 140301', '7000', NULL, '3000', '2025-07-21 10:14:23', '2025-07-31 04:29:40', '[{\"icon\":\"amenities\\/qLr8cBzVT8CDQ6JPMxZqrkPjB5iywm4SoJ4vqsMu.png\",\"text\":\"4 Rooms\"},{\"icon\":\"amenities\\/JdVECeC8y5NWb0JKTfGFhBvDk9Islf2HjeEAmFQW.png\",\"text\":\"4 Washrooms\"},{\"icon\":\"amenities\\/lGpTYme19faw3eoI1rlDmnR28Ooi3JsczNFnf6AG.png\",\"text\":\"Living Room\"},{\"icon\":\"amenities\\/bRZotsBp4ziGNGwP6xLchvh6r8286f1iFuYaTEiZ.png\",\"text\":\"Modern Kitchen\"},{\"icon\":\"amenities\\/8pufzQOfhl9aC3qMQ07botynMY5XNP58vZzfAq5Y.png\",\"text\":\"Dining Area\"},{\"icon\":\"amenities\\/SoOggmJYEivr4s4zCdD5OHjS8WJv04K21iSxjQXn.png\",\"text\":\"12 Guests\"}]', 4.9, 2, '2025-07-21 15:44:00', '2025-07-23 15:44:00', '[\"uploads\\/rooms\\/1753092863_687e12ff186ae.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff188fc.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff18b13.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff18ca1.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff18e46.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff1900e.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff191f7.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff19370.jpeg\",\"uploads\\/rooms\\/1753092863_687e12ff194f4.jpg\"]', 1, 'complete-villa-4bhk', '<h3><strong>A Grand Stay for Families, Groups &amp; Corporate Guests</strong></h3><p>Indulge in the comfort of an entire villa with our spacious&nbsp;<strong>4BHK Luxury Villa</strong>, ideal for families, group travelers, or corporate stays. With four elegantly furnished bedrooms, a stylish living space, and two fully equipped kitchens, the villa offers the privacy of a home with the service of a premium stay.</p><p>Spread across two levels, this villa delivers the best of both ground and first-floor experiences. Whether you\'re enjoying a relaxing evening in the lounge or hosting a dinner in the dining space, every corner of this villa is designed for luxurious, long-lasting comfort.</p><p>Enjoy seamless Wi-Fi, smart TVs, air conditioning, and dedicated parking—perfect for both business and leisure stays.</p><h3><strong>Check-In</strong></h3><ul><li>Check-in from&nbsp;<strong>9:00 AM – Anytime</strong></li><li>Early check-in subject to availability</li></ul><h3><strong>Check-Out</strong></h3><ul><li>Check-out before&nbsp;<strong>12:00 PM (noon)</strong></li><li>Flexible check-out from&nbsp;<strong>9:00 AM – Anytime</strong>, based on availability</li></ul><h3><strong>House Rules</strong></h3><p>We strive to provide a peaceful and comfortable environment for all our guests. To ensure an enjoyable stay, we request that guests respect the property and its surroundings. Loud music or gatherings are not allowed after 10 PM to maintain the serenity of the neighborhood. Guests are required to present a valid government-issued ID at check-in, and any external visitors must be approved by the management in advance. These simple rules help us ensure a safe, respectful, and relaxing experience for everyone.</p><h3><strong>Children &amp; Extra Beds</strong></h3><p>Our 4BHK villa is perfect for family getaways and group bookings. Children of all ages are welcome, and kids under 5 stay free using existing bedding. Extra mattresses can be provided on request with an additional charge. Please note that baby cots are not available.</p><p><strong>Highlights:</strong></p><ul><li>Children of all age groups are welcome</li><li>Kids below 5 stay free</li><li>Extra mattresses available (charges apply)</li><li>Baby cots not provided</li></ul>'),
(7, '1', 'Villa 87, Sector 125, Kharar, Punjab 140301', '3500', NULL, '1500', '2025-07-22 07:27:47', '2025-07-31 04:27:24', '[{\"icon\":\"amenities\\/zTahHrsE1XMXI3oIzTSo5aKCA4lOIoWl0zTDVLiV.png\",\"text\":\"2 Rooms\"},{\"icon\":\"amenities\\/EEzpxhgGiA3WzaeBfgyxenZTyGcqvuZzxwiAE962.png\",\"text\":\"2 Washrooms\"},{\"icon\":\"amenities\\/dHx9bknrXgGT6HmTfMVvPLcSCwZTMRomGK98Hnl5.png\",\"text\":\"Living Room\"},{\"icon\":\"amenities\\/9ztjoHHXPXbR2eqjcptsZyPWlNsUtkXFIFhgEUIc.png\",\"text\":\"Modern Kitchen\"},{\"icon\":\"amenities\\/tautisZBUwv6EVVUr0uipMWoPUXKhoY5f6BXByrn.png\",\"text\":\"Dining Area\"},{\"icon\":\"amenities\\/XFCXqGNMCwbj8NXQ82utrnd99gCyOP76kK7JiDka.png\",\"text\":\"4 Guests\"}]', 5, 0, NULL, NULL, '[\"uploads\\/rooms\\/SdSHlX25PzexIQdbArvJLVElkaS3IaIvJGzrXh4U.png\",\"uploads\\/rooms\\/J4myLB6aaxlyLqON1KsUTIbnujJsW7OjHaI6hAtH.png\",\"uploads\\/rooms\\/OCUuSnYA3MreXEHt3oQBeyv82OLfuCg0AFUmSQAD.png\",\"uploads\\/rooms\\/BzSp9WeGQ8Y5GMVIumkROF0NoNZltLyRPFQYAITk.png\",\"uploads\\/rooms\\/idy3RlQwcelnn5nmdy5pSW5m5Nb9amjbHqyWsHRc.jpg\",\"uploads\\/rooms\\/kDsm6YiYUE9ljUM9yErybhkxYxD5F9TPMu23tExx.jpg\",\"uploads\\/rooms\\/uXh3fRr5kBpLXVa7J5SBHQsg7adG1kDn3vGuT0g0.png\",\"uploads\\/rooms\\/JgtnQ1n9Dvr0WkYoM8u6RdUS0HMxTSIvCfKOiUxu.png\",\"uploads\\/rooms\\/iJKE59GotNyGgjRuXHfmzGBIdOWT1IB3IBIznhfW.png\",\"uploads\\/rooms\\/xJS12llJuYZtGVYxTmYl8Ee8QQCbd1TnOdDjO72J.png\",\"uploads\\/rooms\\/EN0vbD6PkgUYwbwziMOjeobIkdlH1XbGZnfGjJyM.png\",\"uploads\\/rooms\\/IEQpAfoVEr1AK66DWhm38WoiwpevIw6FM7UpPyeE.png\"]', 1, 'ground-floor-2bhk', '<h3><strong>Luxury Living on the Ground Floor</strong></h3><p>Experience refined comfort in our luxury 2BHK villa located on the ground floor. Thoughtfully designed for both leisure and extended stays, this spacious unit offers elegant interiors, modern amenities, and a serene ambiance perfect for families or business travelers. From high-speed Wi-Fi to stylish furnishings, every detail ensures a premium stay in the heart of the city.</p><p>Whether you\'re relaxing in the plush living area or preparing a meal in the fully equipped kitchen, our 2BHK villa provides the perfect blend of privacy and hotel-like convenience.</p><h3><strong>Check-In</strong></h3><ul><li>Check-in from&nbsp;<strong>9:00 AM</strong> – Anytime</li><li>Early check-in available (subject to availability)</li></ul><h3><strong>Check-Out</strong></h3><ul><li>Standard check-out by&nbsp;<strong>12:00 PM (noon)</strong></li><li>Late check-out up to&nbsp;<strong>9:00 AM – Anytime</strong>, based on availability</li></ul><h3><strong>House Rules</strong></h3><p>We strive to provide a peaceful and comfortable environment for all our guests. To ensure an enjoyable stay, we request that guests respect the property and its surroundings. Loud music or gatherings are not allowed after 10 PM to maintain the serenity of the neighborhood. Guests are required to present a valid government-issued ID at check-in, and any external visitors must be approved by the management in advance. These simple rules help us ensure a safe, respectful, and relaxing experience for everyone.</p><h3><strong>Children &amp; Extra Beds</strong></h3><p>Families are always welcome at StayRoyal. Children of all ages can stay at our villa, making it ideal for family vacations or extended visits. Kids below 5 years of age stay for free when using existing bedding. Extra bedding can be provided upon request, subject to availability and additional charges. While baby cots are not available, we do our best to accommodate the needs of traveling families.</p><p><strong>Key Points:</strong></p><ul><li>Children of all age groups are welcome</li><li>Kids under 5 stay free (existing bedding)</li><li>Extra mattress available on request&nbsp;</li><li>Baby cots are currently not provided</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE `roomtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `room_type`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ground floor 2bhk', '0', 'Ground-floor-2bhk', '2025-07-25 00:20:53', '2025-07-25 00:20:53'),
(2, 'First floor - 2BHK', '0', NULL, '2025-07-16 07:09:48', '2025-07-16 07:09:48'),
(3, 'Complete Villa - 4BHK', '0', NULL, '2025-07-16 07:09:52', '2025-07-16 07:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dZp05eHubmp7CDhF3XXhkvFEG0uvPQuNWqE3a1Us', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXRCWXpSeVBobklCZUFQRHprRTNPZU1vTFlQVWw1ZTVJRFQxZWhpdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3QvUHJvamVjdHMvMjlzdGF5bGl2ZV90b2FudS9pbmRleC5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1753966119),
('vkqSFPOWjnZsonm7INuMGTHEHzrPK0QJSHcFm3KB', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMnhxWjZsYWg1WGRrSXF1clNHcFNmNFVNZ3dicjNxWGpSVTlJQ0U4UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly9sb2NhbGhvc3QvUHJvamVjdHMvMjlzdGF5bGl2ZV90b2FudS9pbmRleC5waHAvYWRtaW5yb29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjEwOiJib29raW5nX2lkIjtpOjM3O30=', 1753953048);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_subscribe` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `is_subscribe`, `created_at`, `updated_at`) VALUES
(5, 'hardeep@gmail.com', 1, '2025-07-25 01:19:40', '2025-07-25 01:19:40'),
(8, 'allennext9@gmail.com', 1, '2025-07-25 01:29:00', '2025-07-25 01:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `role`, `password`, `email_verified_at`, `phone`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mkanu', 'mk@gmail.com', 'user', '$2y$12$NCwycLXxP4DLiTrEorjlOO/fdEAKA9XBqS.jN/aJd2HobxH/C7Xhq', NULL, '9874102365', NULL, '0', NULL, '2025-07-18 06:53:02', '2025-07-18 06:53:02'),
(5, 'harry', 'test@gmail.com', 'user', '$2y$12$VXzKcc9Js1y5JnNWQrYZyekq1Y8d.UWLjyzOXlXC6GmzutxL5f6Km', NULL, '7845123265', NULL, '0', NULL, '2025-07-25 00:04:48', '2025-07-25 00:04:48'),
(6, 'Hardeep', 'hardeepsingh.digirush@gmail.com', 'user', '$2y$12$.HFPzxwIvCPgUzGO4csVv.gfiuQAc6NGpOoJLPyfA.Sp6QZgLSyla', NULL, '9859157485', NULL, '0', NULL, '2025-07-27 23:18:33', '2025-07-27 23:18:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enquiries_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metatypes`
--
ALTER TABLE `metatypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_room_type_id_foreign` (`room_type_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_order_id_unique` (`order_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_room_id_foreign` (`room_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `metatypes`
--
ALTER TABLE `metatypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roomtypes`
--
ALTER TABLE `roomtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blogcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `roomtypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
