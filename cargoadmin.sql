-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 02:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `code`, `phone`, `address`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thanh nguyên', 'B', '+84337752570', '497/59/4 phan van tri phuong 5 go vap', 0, '2022-05-21 01:52:41', '2022-05-21 02:07:01'),
(2, 'xs', 'xs', '0981710032', 'hồ chí minh', 1, '2022-05-21 07:46:06', '2022-05-21 08:56:20'),
(3, 'sss', 'x', '0981710031', 'Nguyễn Oanh', 0, '2022-05-21 08:51:27', '2022-05-21 08:51:27'),
(4, 'aaa', 'ssss', '+84981710031', '497/59/4 phan van tri phuong 5 go vap', 0, '2022-05-21 08:52:06', '2022-05-21 08:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Nguyễn Thanh nguyên', '+84981710331', 'Hồ Chí Minh, gò vấp', '2022-04-12 22:29:44', '2022-05-21 00:01:29', 1),
(2, 'Nguyễn Văn A', '+84981710031', 'Hồ Chí Minh', '2022-04-12 22:30:36', '2022-04-12 22:30:36', 0),
(3, 'job', '033256686', 'Hồ Chí Minh', '2022-04-12 22:32:21', '2022-04-12 22:32:21', 0),
(4, 'Nguyễn Thanh nguyên', '+84981710231', 'Hồ Chí Minh', '2022-04-12 22:34:16', '2022-04-12 22:34:16', 0),
(5, 'Nguyễn Văn C', '098711463', 'Chánh hội\r\naaaa', '2022-04-13 00:16:20', '2022-04-13 00:16:20', 0),
(6, 'Nguyễn Thanh nguyên', '+8498171666531', 'Hồ Chí Minh', '2022-04-13 00:17:08', '2022-04-13 00:17:08', 0),
(7, 'Nguyễn Văn F', '+84981710631', 'Hồ Chí Minh', '2022-04-13 00:20:39', '2022-04-13 00:20:39', 0),
(8, 'Hoang', '+84981710071', '497/59/4 phan van tri\nGÒ VẤP', '2022-05-10 07:52:01', '2022-05-21 00:03:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `name`, `icon`, `logo`, `phone`, `location`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thanh nguyên', '', 'http://localhost/cargoadmin/public/storage/photos/1/logovuong.png', '(346) 773-4880', '12455 Westpark Drive, Unit #G5 Houston, Texas 77082', NULL, NULL, '2022-03-31 05:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `mawb`
--

CREATE TABLE `mawb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inventory` date DEFAULT NULL,
  `code_flight` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mawb`
--

INSERT INTO `mawb` (`id`, `name`, `code`, `date_inventory`, `code_flight`, `active`, `created_at`, `updated_at`) VALUES
(1, 'test', '001', '2022-05-23', 'A36', 0, '2022-05-23 08:40:13', '2022-05-30 02:37:50'),
(2, 'a', 'a', '2022-05-30', 'A35', 0, '2022-05-30 05:23:17', '2022-05-30 05:23:17');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_31_064702_create_infos_table', 3),
(11, '2022_04_01_031243_create_permission_tables', 4),
(12, '2022_04_02_054733_create_order_table', 5),
(13, '2022_04_02_054817_create_order_detail_table', 5),
(14, '2022_04_07_111524_create_customers_table', 6),
(15, '2022_04_23_150923_create_table_mawb_table', 7),
(16, '2022_05_21_072339_create_agents_table', 8),
(17, '2022_05_23_152334_create_mabw_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipdate` date DEFAULT current_timestamp(),
  `deldate` date DEFAULT current_timestamp(),
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(8,2) NOT NULL,
  `value_order` decimal(11,2) NOT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL,
  `service` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `shipdate`, `deldate`, `sender`, `receiver`, `remark`, `weight`, `value_order`, `tax`, `discount`, `total`, `service`, `created_at`, `updated_at`) VALUES
(4, 'A-00004', '2022-04-06', '2022-04-06', 1, 1, NULL, '23.91', '5.00', '0.90', '5.09', '14.18', NULL, '2022-04-06 07:20:42', '2022-04-13 02:12:55'),
(5, 'A-00005', '2022-04-13', '2022-04-13', 1, 2, NULL, '26.90', '1.00', '0.09', '0.00', '1.09', 'TL', '2022-04-13 07:17:18', '2022-05-04 07:36:07'),
(6, 'A-00006', '2022-04-26', '2022-04-26', 1, 1, NULL, '207.90', '10.30', '0.00', '0.00', '10.30', 'HCM', '2022-04-26 06:25:10', '2022-05-04 07:35:22'),
(41, 'A-00008', '2022-05-08', '2022-05-08', 3, 3, NULL, '99.00', '10.00', '0.00', '0.00', '10.00', 'HCM', '2022-05-08 01:10:05', '2022-05-08 01:10:05'),
(44, 'A-00044', '2022-05-23', '2022-05-23', 2, 31, NULL, '11.90', '10.00', '0.00', '0.00', '10.00', NULL, '2022-05-22 18:55:34', '2022-05-22 18:55:34'),
(46, 'A-00046', '2022-05-23', '2022-05-23', 2, 31, NULL, '22.90', '5.00', '0.00', '0.00', '5.00', NULL, '2022-05-22 18:59:17', '2022-05-22 18:59:41'),
(47, 'A-00047', '2022-05-23', '2022-05-23', 2, 31, NULL, '111.00', '10.00', '0.00', '0.00', '10.00', NULL, '2022-05-23 09:30:25', '2022-05-23 09:30:25'),
(48, 'A-00048', '2022-05-23', '2022-05-23', 2, 31, NULL, '111.00', '12.00', '0.00', '0.00', '12.00', NULL, '2022-05-23 09:48:18', '2022-05-23 09:48:18'),
(49, 'A-00049', '2022-05-30', '2022-05-30', 2, 31, NULL, '1.00', '0.00', '0.00', '0.00', '0.00', 'HCM', '2022-05-30 00:01:54', '2022-05-30 00:01:54'),
(50, 'A-00050', '2022-05-30', '2022-05-30', 2, 31, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:02:13', '2022-05-30 00:02:13'),
(51, 'A-00051', '2022-05-30', '2022-05-30', 2, 31, NULL, '1.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:03:39', '2022-05-30 00:03:39'),
(52, 'A-00052', '2022-05-30', '2022-05-30', 2, 31, NULL, '1.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:17:31', '2022-05-30 00:17:31'),
(53, 'A-00053', '2022-05-30', '2022-05-30', 2, 31, NULL, '1.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:19:25', '2022-05-30 00:19:25'),
(54, 'A-00054', '2022-05-30', '2022-05-30', 2, 31, NULL, '1.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:19:41', '2022-05-30 00:19:41'),
(55, 'A-00055', '2022-05-30', '2022-05-30', 2, 31, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:20:01', '2022-05-30 00:20:01'),
(56, 'A-00056', '2022-05-30', '2022-05-30', 2, 31, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:22:15', '2022-05-30 00:22:15'),
(57, 'A-00057', '2022-05-30', '2022-05-30', 2, 31, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:23:27', '2022-05-30 00:23:27'),
(58, 'A-00058', '2022-05-30', '2022-05-30', 2, 31, NULL, '1.00', '0.00', '0.00', '0.00', '0.00', NULL, '2022-05-30 00:25:36', '2022-05-30 00:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `line` int(11) NOT NULL,
  `status` int(10) DEFAULT 0,
  `kho` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `description`, `weight`, `line`, `status`, `kho`, `created_at`, `updated_at`) VALUES
(1, 4, 'sản phẩm A', 11.90, 1, 0, 0, '2022-04-06 07:20:42', '2022-04-06 07:20:42'),
(2, 4, 'sản phẩm B', 12.01, 2, 0, 0, '2022-04-06 07:20:42', '2022-04-06 07:20:42'),
(18, 5, 'sản phẩm A', 11.90, 1, 0, 1, '2022-05-04 07:36:15', '2022-05-30 03:52:15'),
(19, 5, 'sản phẩm B', 2.00, 2, 0, 1, '2022-05-04 07:36:15', '2022-05-30 03:52:15'),
(21, 41, 'sản phẩm C', 99.00, 1, 0, 0, '2022-05-08 01:10:05', '2022-05-08 01:10:05'),
(36, 44, 'sản phẩm A', 11.90, 1, 0, 0, '2022-05-22 18:55:34', '2022-05-22 18:55:34'),
(38, 46, 'sản phẩm C', 11.90, 1, 0, 0, '2022-05-22 18:59:17', '2022-05-30 03:01:57'),
(39, 46, 'sản phẩm A', 11.00, 2, 0, 0, '2022-05-22 18:59:41', '2022-05-23 08:08:40'),
(40, 47, 'sản phẩm A', 111.00, 1, 0, 0, '2022-05-23 09:30:25', '2022-05-30 03:02:24'),
(41, 48, 'sản phẩm F', 111.00, 1, 0, 0, '2022-05-23 09:48:18', '2022-05-30 02:59:55'),
(42, 49, '1', 1.00, 1, 0, 0, '2022-05-30 00:01:54', '2022-05-30 00:01:54'),
(43, 51, '1', 1.00, 1, 0, 1, '2022-05-30 00:03:39', '2022-05-30 03:52:15'),
(44, 52, '1', 1.00, 1, 0, 1, '2022-05-30 00:17:31', '2022-05-30 03:52:15'),
(45, 53, '1', 1.00, 1, 0, 1, '2022-05-30 00:19:25', '2022-05-30 03:52:15'),
(46, 54, '1', 1.00, 1, 0, 1, '2022-05-30 00:19:41', '2022-05-30 03:05:43'),
(47, 58, '1', 1.00, 1, 0, 1, '2022-05-30 00:25:36', '2022-05-30 03:52:15');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-04-01 00:15:53', '2022-04-01 00:15:53'),
(2, 'role-create', 'web', '2022-04-01 00:15:53', '2022-04-01 00:15:53'),
(3, 'role-edit', 'web', '2022-04-01 00:15:53', '2022-04-01 00:15:53'),
(4, 'role-delete', 'web', '2022-04-01 00:15:53', '2022-04-01 00:15:53'),
(5, 'order-list', 'web', '2022-04-18 08:19:13', '2022-04-18 08:19:13'),
(6, 'order-create', 'web', '2022-04-18 08:19:13', '2022-04-18 08:19:13'),
(7, 'order-edit', 'web', '2022-04-18 08:19:13', '2022-04-18 08:19:13'),
(8, 'order-delete', 'web', '2022-04-18 08:19:13', '2022-04-18 08:19:13'),
(9, 'infor-list', 'web', '2022-04-18 08:19:13', '2022-04-18 08:19:13'),
(10, 'infor-edit', 'web', '2022-04-18 08:19:13', '2022-04-18 08:19:13'),
(11, 'customer-list', 'web', '2022-05-20 22:58:16', '2022-05-20 22:58:16'),
(12, 'customer-edit', 'web', '2022-05-20 22:58:16', '2022-05-20 22:58:16'),
(13, 'customer-delete', 'web', '2022-05-20 22:58:16', '2022-05-20 22:58:16'),
(14, 'receiver-list', 'web', '2022-05-20 22:58:16', '2022-05-20 22:58:16'),
(15, 'receiver-edit', 'web', '2022-05-20 22:58:16', '2022-05-20 22:58:16'),
(16, 'receiver-delete', 'web', '2022-05-20 22:58:16', '2022-05-20 22:58:16'),
(17, 'agent-list', 'web', '2022-05-21 01:09:22', '2022-05-21 01:09:22'),
(18, 'agent-create', 'web', '2022-05-21 01:09:22', '2022-05-21 01:09:22'),
(19, 'agent-edit', 'web', '2022-05-21 01:09:22', '2022-05-21 01:09:22'),
(20, 'agent-delete', 'web', '2022-05-21 01:09:22', '2022-05-21 01:09:22'),
(21, 'user-list', 'web', '2022-05-21 09:04:22', '2022-05-21 09:04:22'),
(22, 'user-delete', 'web', '2022-05-21 09:04:22', '2022-05-21 09:04:22'),
(23, 'user-create', 'web', '2022-05-21 09:05:30', '2022-05-21 09:05:30'),
(24, 'mawb-cancel', 'web', '2022-05-30 05:46:10', '2022-05-30 05:46:10'),
(25, 'mawb-create', 'web', '2022-05-30 05:46:10', '2022-05-30 05:46:10'),
(26, 'mawb-edit', 'web', '2022-05-30 05:46:10', '2022-05-30 05:46:10'),
(27, 'mawb-list', 'web', '2022-05-30 05:46:10', '2022-05-30 05:46:10'),
(28, 'mawb-delete', 'web', '2022-05-30 05:46:10', '2022-05-30 05:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `customer_id`, `name`, `phone`, `address`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 'Nguyễn Văn Tí', '+84981710331', 'Chánh hội', '2022-04-13 01:06:13', '2022-05-18 06:15:41', 0),
(2, 1, 'Nguyễn Văn Tèo', '+840333322526', 'Gò Vấp,Hồ Chí Minh', '2022-04-13 01:06:13', '2022-04-13 01:06:13', 0),
(31, 2, 'Nguyễn Thanh nguyên', '+84981710371', 'Chánh hội', '2022-05-08 17:24:42', '2022-05-18 06:15:49', 0),
(32, 1, 'Nguyễn Thanh nguyên', '+84337752580', '497/59/4 phan van tri\nGÒ VẤP', '2022-05-10 07:51:35', '2022-05-21 00:10:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'employee', 'web', '2022-04-01 00:18:44', '2022-05-21 10:04:40'),
(2, 'supper admin', 'web', '2022-04-19 21:13:07', '2022-04-19 21:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 1),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `agent_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nguyen', 'ntnguyen0310@gmail.com', 0, NULL, '$2y$10$NizlPJ.LzGYG1DYZ9buoQeB4i81UBlIUuU/eacySaTQ94npbHZqy2', 'McEGy4DEScvuAiFdEBFY0zfcpjqjL7iicFNwtm2JkBy937cZF4wRodhUv9qz', '2022-03-30 19:18:30', '2022-03-30 19:18:30'),
(2, 'Admin Admin', 'admin@argon.com', NULL, '2022-03-30 21:24:59', '$2y$10$90UACpEC2D6NG2xzEtpsVOo3dErBft.fnEA0b87VxqJbzeKA56Irm', NULL, '2022-03-30 21:24:59', '2022-05-21 07:37:59'),
(5, 'employee', 'employee@cargo.com', 2, NULL, '$2y$10$1MVxw99gAAhXo2Cw8DCCZOVCjtQc168syX38JqDR6cHavFcBoa1Sq', NULL, '2022-05-21 07:44:58', '2022-05-21 09:19:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mawb`
--
ALTER TABLE `mawb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_detail_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mawb`
--
ALTER TABLE `mawb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `receivers`
--
ALTER TABLE `receivers`
  ADD CONSTRAINT `receiver_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
