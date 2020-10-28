-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2020 at 08:16 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is2host_water`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `role_id` int(11) DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `password`, `active`, `role_id`, `api_token`, `player_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@admin.com', '0512345678', '$2y$10$dy/unJmjKT00MRgAqHMJDu0.lChg5TklDgPM55zZAogBITknG.aXG', 'active', 1, NULL, NULL, NULL, NULL, '2020-03-25 16:30:20'),
(5, 'asd', 'asd@asd.com', '334423423423', '$2y$10$Qy7SX4xMEcpn6ZaSTT0vwuvlA96oWG/t2BazuDGCg21TASbxqnVCW', 'active', 2, NULL, NULL, NULL, '2020-03-15 16:57:43', '2020-03-15 16:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'سمنود', '2020-03-16 05:19:52', '2020-03-16 05:19:52'),
(2, 'المنصورة', '2020-03-16 05:22:46', '2020-03-16 05:37:25'),
(5, 'المحلة الكبرى', '2020-03-16 05:58:48', '2020-03-16 05:58:48'),
(6, 'بنها', '2020-03-16 05:58:58', '2020-03-16 05:58:58'),
(7, 'الجيزة', '2020-03-16 05:59:05', '2020-03-16 05:59:05'),
(8, 'طنطا', '2020-03-16 05:59:10', '2020-03-16 05:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `city_companies`
--

CREATE TABLE `city_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_companies`
--

INSERT INTO `city_companies` (`id`, `company_id`, `city_id`, `created_at`, `updated_at`) VALUES
(36, 19, 1, '2020-03-25 07:14:12', '2020-03-25 07:14:12'),
(37, 19, 2, '2020-03-25 07:14:12', '2020-03-25 07:14:12'),
(38, 19, 5, '2020-03-25 07:14:12', '2020-03-25 07:14:12'),
(39, 20, 2, '2020-03-25 07:36:36', '2020-03-25 07:36:36'),
(40, 20, 5, '2020-03-25 07:36:36', '2020-03-25 07:36:36'),
(41, 20, 6, '2020-03-25 07:36:36', '2020-03-25 07:36:36'),
(42, 21, 1, '2020-03-29 01:17:04', '2020-03-29 01:17:04'),
(43, 21, 2, '2020-03-29 01:17:04', '2020-03-29 01:17:04'),
(44, 21, 5, '2020-03-29 01:17:04', '2020-03-29 01:17:04'),
(45, 22, 1, '2020-04-15 12:56:19', '2020-04-15 12:56:19'),
(46, 22, 2, '2020-04-15 12:56:19', '2020-04-15 12:56:19'),
(47, 22, 5, '2020-04-15 12:56:19', '2020-04-15 12:56:19'),
(48, 22, 6, '2020-04-15 12:56:19', '2020-04-15 12:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stop` enum('stop','not_stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_stop'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `mobile`, `password`, `active_code`, `api_token`, `player_id`, `remember_token`, `created_at`, `updated_at`, `location`, `lat`, `lon`, `email`, `stop`) VALUES
(11, 'Client_user', '0512345678', '$2y$10$MPFrhuY3snr4jsJLgDbf2uCQsbVl.PkG1.z6Rkvb36L0MLFpdGfze', NULL, NULL, NULL, NULL, '2020-03-25 12:43:13', '2020-07-02 14:04:59', NULL, NULL, NULL, NULL, 'not_stop'),
(12, 'Hamza_user', '0587654321', '$2y$10$S9UBTzVsl5tO/fpGAQFPCu79CSUq/9di4.5Gdwx.vXWJ7weD8Z9n6', NULL, 'r3WE2DMmCZWxlwDPBmqdbvQK80qGjQioyinAyGFLGCbC9ClHpbU7WRGQ8lpT', 'dxFkD2naI8U:APA91bE5Dccq8C5F9_k5xJEdz539CjisjgDmAXTtugr7ttko_MnA3h9Z3YPcU_ygvzEGVbV6NVzt1jXEq05yrLSZ3H0KoaNtTXwp0-ZqYuG-EbfLK62plZqjHuixIExVNmJ56ZiJrXHH', NULL, '2020-03-25 12:45:57', '2020-03-25 17:56:28', 'X68V+R7 عزبة الناموس، مدينة سمنود، سمنود، Egypt', '30.9670575', '31.2431445', 'moh.ham.1997@gmail.com', 'not_stop'),
(13, 'client333', '0512345333', '$2y$10$nAWMc76i2O0i/ZCADg.PHO/dpTIcKJ8c/WGEKKLd8ERK2NUQxKuZa', NULL, 'nPCgg0ewr8E75mrnrzMDjvwe5uNJ6W76YFLNqYV2s6tBnkypTECHQ2wJwHCe', '1234567', NULL, '2020-04-21 16:32:02', '2020-04-21 16:32:02', NULL, NULL, NULL, NULL, 'not_stop'),
(14, 'fayza', '0534343434', '$2y$10$OZbbCvO6f1QRZTbnZ/LfLOQt5ejU2bePxDXRVcOIW5a3dK3ulA85G', NULL, 'N8JWyW6VzNAKHnx4oXj3yxJWjDnxnPtsYaiPomaYEtZEvrHCV8buV1SMHYSu', 'chdvwhsjhchwvcvdwkwe', NULL, '2020-04-21 16:37:37', '2020-04-21 16:37:37', NULL, NULL, NULL, NULL, 'not_stop'),
(15, 'fayzaa', '0534343444', '$2y$10$xMsi38TC5hATlk8xnJkOKeLKmyCO0ZZJ8ewSnzY.O7MPpKFuBOaWy', NULL, '6XtNKxHBYNMi6S2cFZLaUW61Woq6t0puIyJSTf1jtxXMxQ1bvaefSljKLema', 'kjdbvjfbfhdblbfdsbgldfbsfglhjdb', NULL, '2020-04-22 00:02:37', '2020-04-26 03:15:40', NULL, NULL, NULL, NULL, 'not_stop'),
(16, '0566666666', '0566666666', '$2y$10$XHYnxO9shRzvpvOdkIRydeQ6893bCuSF977rrci/1hXF6AeBPjf5q', NULL, 'NcTdQy87O5558wtfsf9VvooZtHBMxzrwhfCajMmrVI8db3vus3pLJRjnkYAM', 'jvwntwuiwcjguvuuriuevruvtuuyguyutryireg', NULL, '2020-06-13 11:22:59', '2020-06-13 11:22:59', NULL, NULL, NULL, NULL, 'not_stop'),
(17, 'xoxo', '0588888888', '$2y$10$/ml8.WBnmmH1fHA01OXEr.MV2tDV3UlVCrLOqMnCwkXfXcZlosQnC', NULL, '1R84YL1zK9Xs7DQxgeJy13N6sMXQXC7DzqR405re9jOq78Kf0seGfYXEXnRV', 'jvwntwuiwcjguvuuriuevruvtuuyguyutryireg', NULL, '2020-06-13 11:36:38', '2020-06-13 11:36:38', NULL, NULL, NULL, NULL, 'not_stop');

-- --------------------------------------------------------

--
-- Table structure for table `client_locations`
--

CREATE TABLE `client_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_register_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_orders` double NOT NULL DEFAULT '0',
  `admin_agree` enum('agree','not_agree') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_agree',
  `active` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `mobile`, `image`, `commercial_register_image`, `minimum_orders`, `admin_agree`, `active`, `created_at`, `updated_at`) VALUES
(19, 'شركة هايبر للتوصيل المياه', '0512345678', '1585120451220555487992_2070023906378273_5054557327726739456_n.jpg', '1585120451834689918446_915494758884752_6236318622898192384_n.jpg', 300, 'agree', 'active', '2020-03-25 12:14:11', '2020-03-25 17:39:20'),
(20, 'شركة البدر للمياه النقيه', '0587654321', '15851393366539mohammed mohammed mohammed hamza.doc', '15851393368073mohammed mohammed mohammed hamza.doc', 0, 'agree', 'active', '2020-03-25 12:36:36', '2020-03-30 17:05:08'),
(21, 'شركة الشرقية', '0598765432', '15854446243396IMG-20200328-WA0105.jpg', '15854446245795IMG-20200328-WA0448.jpg', 0, 'agree', 'active', '2020-03-29 06:17:04', '2020-03-30 17:05:16'),
(22, 'حمزه', '0532145698', '1586955379780724بحث.jpg', '158695537985561200px-IOS_11_logo.svg.png', 0, 'agree', 'active', '2020-04-15 17:56:19', '2020-04-15 17:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `company_dates`
--

CREATE TABLE `company_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_dates`
--

INSERT INTO `company_dates` (`id`, `company_id`, `days`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(5, 19, 'saturday,sunday,monday,tuesday', '10:00', '18:00', '2020-03-25 12:40:32', '2020-03-25 12:40:32'),
(6, 20, 'saturday,sunday,monday,tuesday', '10:00', '22:00', '2020-04-14 14:10:49', '2020-04-14 14:10:49'),
(7, 22, 'saturday,sunday,monday,tuesday', '10:00', '22:00', '2020-04-15 17:58:06', '2020-04-15 17:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `reply_status` enum('done_reply','not_reply') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_reply',
  `reply_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `title`, `body`, `reply`, `reply_status`, `reply_by`, `created_at`, `updated_at`) VALUES
(3, 'هشام', 'h@h.h', '0512312312', 'منص', 'ع', NULL, 'not_reply', NULL, '2020-03-25 13:09:49', '2020-03-25 13:09:49'),
(4, 'fayza', 'y@y.com', '0522222326', 'title', 'Description of message', NULL, 'not_reply', NULL, '2020-06-11 14:21:13', '2020-06-11 14:21:13'),
(5, 'fauna', 'v@v.com', '0522222222', 'gygg', 'Gfgggggggggggg', NULL, 'not_reply', NULL, '2020-06-14 13:17:06', '2020-06-14 13:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `company_id`, `code`, `percentage`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(5, 20, '123456', 10, '2020-03-01', '2021-05-01', '2020-03-25 12:50:07', '2020-04-14 14:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_pages`
--

CREATE TABLE `fixed_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_pages`
--

INSERT INTO `fixed_pages` (`id`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(1, 'من نحن', 'mn-nhn', '<h3 style=\"font-family: droidkufi-bold, serif; color: rgb(0, 0, 0); margin-top: 5px;\"><span class=\"text-danger\" style=\"color: rgb(237, 85, 101);\">من نحن</span></h3><p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>', '2020-02-03 10:14:09', '2020-03-25 12:48:43'),
(2, 'الشروط و الاحكام', 'الشروط-و-الاحكام', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.\r\nومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.\r\nهذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.', '2020-02-03 10:14:09', '2020-02-03 10:14:09');

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
(1, '2020_02_02_195403_create_clients_table', 1),
(2, '2020_02_02_195613_create_client_locations_table', 1),
(3, '2020_02_02_195701_create_companies_table', 1),
(4, '2020_02_02_195753_create_company_dates_table', 1),
(5, '2020_02_02_195914_create_representatives_table', 1),
(6, '2020_02_02_195944_create_coupons_table', 1),
(7, '2020_02_02_200128_create_admins_table', 1),
(8, '2020_02_02_200154_create_roles_table', 1),
(9, '2020_02_02_200234_create_contact_us_table', 1),
(10, '2020_02_02_200315_create_settings_table', 1),
(11, '2020_02_02_200346_create_products_table', 1),
(12, '2020_02_02_200409_create_orders_table', 1),
(13, '2020_02_02_200530_create_order_products_table', 1),
(14, '2020_02_02_200618_create_fixed_pages_table', 1),
(16, '2020_02_03_115350_add_multiple_to_clients', 2),
(17, '2020_02_05_101921_add_kind_to_products', 3),
(18, '2020_02_05_132901_add_multiple_to_orders', 4),
(19, '2020_02_09_114609_create_notifications_table', 5),
(20, '2020_02_24_082232_add_multible_to_orders', 6),
(21, '2020_03_16_063742_create_cities_table', 7),
(22, '2020_03_16_075241_create_city_companies_table', 8),
(24, '2020_04_09_180741_create_receivable_registers_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0086472c-0122-429b-bd4a-a5b6d591b449', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #62\",\"order_id\":62,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:37:25', '2020-03-25 13:37:25'),
('01943133-98ce-48c3-980c-effd54d9f630', 'App\\Notifications\\PublicNotification', 'App\\Client', 14, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-04-21 16:37:37', '2020-04-21 16:37:37'),
('0230b61e-2c53-4640-b99a-57302a2c25cf', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #81\",\"order_id\":\"81\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:14', '2020-04-14 15:01:14'),
('02e99038-2d92-49d3-8bc9-54bb15b6bb89', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #78\",\"order_id\":\"78\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:35:31', '2020-04-14 14:35:31'),
('06002db3-54a3-4042-a4a3-d4df2504fcb9', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #62\",\"order_id\":62,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:37:25', '2020-03-25 13:37:25'),
('06e82cb6-9507-4e0c-98a5-c1bcee3ac850', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #64\",\"order_id\":\"64\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:26:48', '2020-03-25 14:26:48'),
('0878c4f3-1e08-4420-ae21-ea0701254f19', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #86\",\"order_id\":86,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 15:15:21', '2020-04-14 15:15:21'),
('0879cd3c-6d89-415e-bf3d-4d6c1dc66d68', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #70\",\"order_id\":70,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-26 12:47:00', '2020-03-26 12:47:00'),
('0b08d4aa-301f-490a-b82d-a65a078e555a', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #80\",\"order_id\":\"80\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:38:24', '2020-04-14 14:38:24'),
('0b48fa8e-8012-4f4e-bff9-8868ea76e77b', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #77\",\"order_id\":77,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:21:17', '2020-04-14 14:21:17'),
('0c70a895-7ac8-443a-b509-78640d41d709', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #92\",\"order_id\":92,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:24:20', '2020-04-15 18:24:20'),
('0e73113c-8d54-402b-b3eb-787bc4b5b0c2', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #65\",\"order_id\":65,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:33:51', '2020-03-25 14:33:51'),
('10b879ff-b7ff-4c28-8caf-02d5cc482ec0', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #70\",\"order_id\":\"70\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-26 12:45:37', '2020-03-26 12:45:37'),
('11cc9ad2-4873-44e0-a19e-2081a8382c81', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #92\",\"order_id\":\"92\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:24:11', '2020-04-15 18:24:11'),
('11e7ab84-007f-4724-9d84-ac2aa7f65532', 'App\\Notifications\\PublicNotification', 'App\\Client', 16, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-06-13 11:23:00', '2020-06-13 11:23:00'),
('141a7694-9d66-4280-88a7-22c714e76ffa', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #82\",\"order_id\":82,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:58:29', '2020-04-14 14:58:29'),
('14825648-5448-4615-9971-83c9cb77e725', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #77\",\"order_id\":77,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:20:18', '2020-04-14 14:20:18'),
('16f097e3-7886-4353-bbf8-eae4a73336c6', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #78\",\"order_id\":78,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:35:05', '2020-04-14 14:35:05'),
('18663b44-4bcf-4b14-8672-a6eac9b12f37', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #81\",\"order_id\":81,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:57:50', '2020-04-14 14:57:50'),
('1c4c9c63-3ebe-4c11-96b5-1f8612e9d2fe', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #86\",\"order_id\":86,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:15:05', '2020-04-14 15:15:05'),
('1e850071-629d-4d41-944b-f5753cd35f2e', 'App\\Notifications\\OrderCancelNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u063a\\u0627\\u0621 \\u0627\\u0644\\u0637\\u0644\\u0628 #59\",\"order_id\":59,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:34:13', '2020-03-25 13:34:13'),
('1f48be23-0a7d-4c06-b0cd-493ef6927432', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #69\",\"order_id\":69,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:56:16', '2020-03-26 12:31:00', '2020-04-01 17:56:16'),
('1fd9cd88-9345-4c95-a1cb-e28399042ac7', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #81\",\"order_id\":81,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 15:02:33', '2020-04-14 15:02:33'),
('20f239b1-ee48-4228-b56f-c9717fd0e692', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #71\",\"order_id\":71,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:55:40', '2020-03-26 12:52:48', '2020-04-01 17:55:40'),
('21ce2882-02ff-4fde-9a5c-fd6d7693b89b', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #64\",\"order_id\":\"64\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:26:48', '2020-03-25 14:26:48'),
('22b842ff-69f9-442c-9e9f-d1a9503b9eb8', 'App\\Notifications\\PublicNotification', 'App\\Client', 15, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', '2020-04-26 04:16:28', '2020-04-22 00:02:37', '2020-04-26 04:16:28'),
('24f2820d-5515-429b-ac90-f9d3e231a222', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #87\",\"order_id\":87,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:21:57', '2020-04-14 15:21:57'),
('258e21c4-c061-4c00-9750-4f479c5663ba', 'App\\Notifications\\OrderCancelNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u063a\\u0627\\u0621 \\u0627\\u0644\\u0637\\u0644\\u0628 #59\",\"order_id\":59,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:55:56', '2020-03-25 13:34:13', '2020-04-01 17:55:56'),
('25f7a785-e7f1-4e55-8ea0-c0c15a6deb38', 'App\\Notifications\\OrderCancelNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u063a\\u0627\\u0621 \\u0637\\u0644\\u0628\\u0643 #87 \\u0645\\u0646 \\u0642\\u0628\\u0644 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629\",\"order_id\":\"87\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:22:42', '2020-04-14 15:22:42'),
('278efca2-4dd2-4d1c-9177-640441938d01', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #63\",\"order_id\":63,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:45:01', '2020-03-25 13:45:01'),
('2b4233cb-62d0-4d4c-a821-4ee06250f3a0', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #78\",\"order_id\":78,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 14:45:35', '2020-04-14 14:45:35'),
('2c946505-23bb-4077-8e33-852c7e515d54', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #62\",\"order_id\":62,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-03-25 14:12:31', '2020-03-25 14:12:31'),
('2ecc21e0-3033-45bf-b5b5-481b2931308a', 'App\\Notifications\\PublicNotification', 'App\\Client', 17, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-06-13 11:36:39', '2020-06-13 11:36:39'),
('30e32e5a-c6ac-4fe0-b37f-1ce92eb22eca', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #73\",\"order_id\":73,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-30 17:01:48', '2020-03-29 06:27:13', '2020-03-30 17:01:48'),
('34991311-66e8-4088-8edb-ebc65464d5d4', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #64\",\"order_id\":64,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:27:07', '2020-03-25 14:27:07'),
('361b6d4c-9fe3-4bd2-8fab-179a239c9a8f', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #62\",\"order_id\":62,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:36:57', '2020-03-25 13:36:57'),
('3636ead6-d3ea-4614-b4db-ca8b8c4c30e7', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 22, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #91\",\"order_id\":91,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:18:02', '2020-04-15 18:18:02'),
('3687a052-cf6c-485b-83c6-21ff3a538db8', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #77\",\"order_id\":\"77\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:21:00', '2020-04-14 14:21:00'),
('3957590c-ba21-40ad-a2fb-703f2631c1f5', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #68\",\"order_id\":68,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 18:01:47', '2020-04-01 17:59:14', '2020-04-01 18:01:47'),
('39fdc93f-a7e3-478e-b6af-2309c02afc78', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #68\",\"order_id\":68,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-01 17:59:15', '2020-04-01 17:59:15'),
('3a46eda9-51ad-4fc7-b53d-7cbc70fe71a0', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 22, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #91\",\"order_id\":91,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:19:17', '2020-04-15 18:19:17'),
('3c9a7d5c-43d3-45ea-882b-249cc05b486b', 'App\\Notifications\\PublicNotification', 'App\\Client', 11, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0644 \\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-03-25 16:23:51', '2020-03-25 16:23:51'),
('3dacd5a2-ef2d-4692-a67e-2f2cd82a4914', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #83\",\"order_id\":83,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:02:08', '2020-04-14 15:02:08'),
('3efaeeb0-a554-4b85-8f24-0e63c119ed07', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #70\",\"order_id\":70,\"type\":\"order\",\"company_url\":\"previous_order\"}', '2020-03-30 17:02:45', '2020-03-29 06:27:44', '2020-03-30 17:02:45'),
('423ade9e-adc0-4c96-b98f-35e4888f2329', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #84\",\"order_id\":84,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:14:58', '2020-04-14 15:14:58'),
('44183d9a-93a5-4b07-9bdb-19263841a3d2', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #65\",\"order_id\":65,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:33:01', '2020-03-25 14:33:01'),
('45b875ff-0c67-4270-b139-b6963b061eca', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #65\",\"order_id\":65,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-03-25 14:34:15', '2020-03-25 14:34:15'),
('47451d66-2966-4e47-b839-61d3db2f88b9', 'App\\Notifications\\PublicNotification', 'App\\Client', 13, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-04-21 16:32:02', '2020-04-21 16:32:02'),
('4a89783c-3d1f-4fc0-b078-0fc318e0fcc2', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #65\",\"order_id\":65,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:33:51', '2020-03-25 14:33:51'),
('4caa9799-61ec-47a7-94a9-922af6e56e19', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #77\",\"order_id\":77,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:21:17', '2020-04-14 14:21:17'),
('4d9a1e1c-ef89-4ae6-bc4d-c70196e5f918', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #90\",\"order_id\":90,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 13:58:40', '2020-04-15 13:58:40'),
('4f341eeb-72d8-4d1c-833c-781d44ac1d61', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #61\",\"order_id\":61,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-07-05 13:14:50', '2020-07-05 13:14:50'),
('50dc064c-68e4-4e80-9cbd-74ecfcc3ba5d', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #68\",\"order_id\":68,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:56:22', '2020-03-26 12:22:44', '2020-04-01 17:56:22'),
('51331fe9-2db7-4e46-af47-0d879b13b896', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #62\",\"order_id\":\"62\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:37:15', '2020-03-25 13:37:15'),
('51db2c33-7cff-404a-b54f-c77d21d438a0', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #83\",\"order_id\":83,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:02:08', '2020-04-14 15:02:08'),
('52af4b40-e496-4cfa-b63d-bcbbcc19f23b', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #59\",\"order_id\":\"59\",\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-25 13:07:06', '2020-03-25 13:06:52', '2020-03-25 13:07:06'),
('54d235f8-9a29-4ada-9320-1ebe0b283e48', 'App\\Notifications\\PublicNotification', 'App\\Company', 19, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', '2020-03-25 16:23:41', '2020-03-25 16:23:25', '2020-03-25 16:23:41'),
('55c8bc90-eb6e-432e-b6ba-d35456ad307c', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #76\",\"order_id\":76,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:19:33', '2020-04-14 14:19:33'),
('5693420f-2a14-4510-945c-04a02677fa71', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #75\",\"order_id\":75,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:13:45', '2020-04-14 14:13:45'),
('57571d48-0e62-46d3-91bd-1ee89d7cfd8e', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #82\",\"order_id\":82,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 15:02:28', '2020-04-14 15:02:28'),
('59b1394a-6839-4e0f-aabe-a5029617275b', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #86\",\"order_id\":\"86\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:14:44', '2020-04-14 15:14:44'),
('5a0c5936-1ad2-4fde-9b2b-1dfd2be88d06', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #63\",\"order_id\":63,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-03-25 13:51:28', '2020-03-25 13:51:28'),
('5b2a35ee-9d18-4e0e-9e9a-11e62c58b27e', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #85\",\"order_id\":\"85\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:13:28', '2020-04-14 15:13:28'),
('5e8c93ef-930f-4ee6-9b9b-a1f46f6889a1', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #64\",\"order_id\":64,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-25 14:33:12', '2020-03-25 14:26:17', '2020-03-25 14:33:12'),
('5eeddea3-4540-4c40-bb79-f9491d9af69b', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #80\",\"order_id\":80,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:38:14', '2020-04-14 14:38:14'),
('5f73b40a-1afc-4dd8-abcd-07bc440d96d5', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #82\",\"order_id\":\"82\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:23', '2020-04-14 15:01:23'),
('61ce244c-e610-4256-bfc9-83f0142c975c', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #63\",\"order_id\":\"63\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:44:50', '2020-03-25 13:44:50'),
('648a812a-6834-4f80-9ebc-71e83f1b1c84', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #82\",\"order_id\":\"82\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:23', '2020-04-14 15:01:23'),
('6513da97-385d-457f-9085-0b864d185fa9', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #74\",\"order_id\":74,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-30 17:01:08', '2020-03-29 06:28:54', '2020-03-30 17:01:08'),
('653b20c6-1385-4a96-9192-791e8c734386', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #77\",\"order_id\":\"77\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:21:00', '2020-04-14 14:21:00'),
('65e9e3d8-b0d9-4ee3-a654-0e37d3c29a81', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #73\",\"order_id\":73,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-07-05 14:24:16', '2020-07-05 14:24:16'),
('67023643-4183-4576-ae8f-68d526318285', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #84\",\"order_id\":\"84\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:13:09', '2020-04-14 15:13:09'),
('684ef136-265a-4313-8f58-722d251f9b31', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #75\",\"order_id\":75,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 14:17:02', '2020-04-14 14:17:02'),
('685241c4-afc7-48f0-b9b7-6f1fbb5e6965', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #83\",\"order_id\":83,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:58:58', '2020-04-14 14:58:58'),
('6a5d4962-da3a-4868-a3d7-4ad380a6fd89', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #80\",\"order_id\":80,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:45:12', '2020-04-14 14:45:12'),
('6c395ac1-d10f-40a9-a845-82786075435d', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #60\",\"order_id\":60,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:55:50', '2020-03-25 13:17:13', '2020-04-01 17:55:50'),
('6c3e7815-7d9d-433b-879f-cf33ac65c6b3', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #72\",\"order_id\":72,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-30 17:02:17', '2020-03-27 02:30:24', '2020-03-30 17:02:17'),
('6d87455a-e2c3-4480-9be2-1218bdf1a5bd', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #85\",\"order_id\":85,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:11:22', '2020-04-14 15:11:22'),
('6db9db6c-f67b-46a4-93fe-7bd330af7f58', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #75\",\"order_id\":75,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:16:48', '2020-04-14 14:16:48'),
('6e34a87f-1bc5-459b-bb1d-4f5168676d45', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #82\",\"order_id\":82,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:02:04', '2020-04-14 15:02:04'),
('6f2ec943-e3f9-4036-8c86-c7610e7c1fdb', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #80\",\"order_id\":80,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 14:45:31', '2020-04-14 14:45:31'),
('6f64f352-43cf-4481-8a40-2254666c6d99', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #91\",\"order_id\":\"91\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:18:14', '2020-04-15 18:18:14'),
('6fe2be01-f7c4-4142-af20-1222b639002d', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #83\",\"order_id\":\"83\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:32', '2020-04-14 15:01:32'),
('7265dc64-ce8d-4730-b8f3-a42c810f2528', 'App\\Notifications\\PublicNotification', 'App\\Client', 11, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-03-25 12:43:13', '2020-03-25 12:43:13'),
('73872441-9096-4027-9130-3f7d16e69eaf', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #71\",\"order_id\":\"71\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-26 12:52:00', '2020-03-26 12:52:00'),
('7464f858-d12e-44ea-9982-73901b1f7201', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #79\",\"order_id\":79,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:45:18', '2020-04-14 14:45:18'),
('7522e9e5-9bd2-4c02-ba6a-e766980b2ba0', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #89\",\"order_id\":\"89\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 13:55:46', '2020-04-15 13:55:46'),
('7790a804-e0df-44cd-9c08-f85241045c31', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #75\",\"order_id\":\"75\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:16:38', '2020-04-14 14:16:38'),
('793e0e1b-471f-4063-8ee0-26c27738f43a', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #85\",\"order_id\":85,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:15:02', '2020-04-14 15:15:02'),
('7b623a61-01d3-453c-a739-9536277a54b0', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 22, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #92\",\"order_id\":92,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:23:56', '2020-04-15 18:23:56'),
('7bd6044b-e4f8-4868-9d70-b50751e440f0', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #79\",\"order_id\":79,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 14:45:39', '2020-04-14 14:45:39'),
('7be227ec-5295-4dac-8f24-1faf0f5d8cde', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #65\",\"order_id\":\"65\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:33:42', '2020-03-25 14:33:42'),
('7ce96393-2007-4e94-9d8f-cb68a81768e7', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #70\",\"order_id\":70,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:56:06', '2020-03-26 12:47:00', '2020-04-01 17:56:06'),
('7d049f53-9821-44dc-82c2-d2caf2b43e78', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #75\",\"order_id\":\"75\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:16:38', '2020-04-14 14:16:38'),
('7d32cdcd-fffc-4e6e-b0df-3ba03b0016bb', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #71\",\"order_id\":71,\"type\":\"order\",\"company_url\":\"previous_order\"}', '2020-03-30 17:03:05', '2020-03-29 06:27:35', '2020-03-30 17:03:05'),
('7eaa8637-5565-4f4d-8eac-008569958330', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #70\",\"order_id\":\"70\",\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-26 12:46:33', '2020-03-26 12:45:37', '2020-03-26 12:46:33'),
('82f1623e-ad12-498e-8ef0-af06107b4a21', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #84\",\"order_id\":84,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 15:15:25', '2020-04-14 15:15:25'),
('847c5f84-f29b-4b16-acfe-950196ae1f6d', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 23, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #61\",\"order_id\":\"61\",\"type\":\"order\",\"company_url\":\"orders\"}', '2020-07-05 13:14:00', '2020-03-25 13:31:57', '2020-07-05 13:14:00'),
('86f9e6ef-d8e8-4ac9-80e3-ca5269125ede', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #76\",\"order_id\":76,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-14 14:20:27', '2020-04-14 14:19:33', '2020-04-14 14:20:27'),
('889563b8-2567-4fd6-a846-60098921a5c6', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #76\",\"order_id\":\"76\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:19:09', '2020-04-14 14:19:09'),
('88a275fb-e473-40d1-b65a-3bd9676cdcc0', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #85\",\"order_id\":85,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:15:02', '2020-04-14 15:15:02'),
('88cb6073-7ea4-4a09-a400-2d57173e50f0', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #79\",\"order_id\":\"79\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:36:55', '2020-04-14 14:36:55'),
('8918461c-b9e5-4265-b99a-f0f1f54bb2bd', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #61\",\"order_id\":61,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-25 13:35:03', '2020-03-25 13:31:07', '2020-03-25 13:35:03'),
('8bd3a49e-28fd-4229-902a-6054c6c7bdd8', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #76\",\"order_id\":76,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:18:51', '2020-04-14 14:18:51'),
('8cbfd15a-4078-4564-89b5-99d7b02aac13', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #73\",\"order_id\":73,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-07-05 14:24:16', '2020-07-05 14:24:16'),
('91e0ce3a-bb60-47c2-9829-6d9151740e2f', 'App\\Notifications\\PublicNotification', 'App\\Client', 12, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0644 \\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-03-25 16:23:52', '2020-03-25 16:23:52'),
('933883a2-830b-44bb-9efe-c34858256af7', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #78\",\"order_id\":78,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:45:05', '2020-04-14 14:45:05'),
('93dd1f08-6007-4329-a0d3-66a206e096e6', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #75\",\"order_id\":75,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:16:48', '2020-04-14 14:16:48'),
('967fe653-ae29-4cf5-8880-812704c88fa6', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #79\",\"order_id\":79,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:45:18', '2020-04-14 14:45:18'),
('9a3d37fc-69ec-4c71-af3d-37ae4bf0ac4f', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #84\",\"order_id\":\"84\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:13:09', '2020-04-14 15:13:09'),
('9c035c85-2aad-49fa-95d5-9efc9f546fba', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #85\",\"order_id\":85,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 15:15:29', '2020-04-14 15:15:29'),
('9c3bb2d7-f06b-4ac6-89e8-4576026a1069', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #71\",\"order_id\":71,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:56:00', '2020-03-26 12:50:18', '2020-04-01 17:56:00'),
('9d6b262a-2121-489b-bd27-9ce58558c31b', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #71\",\"order_id\":\"71\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-26 12:52:00', '2020-03-26 12:52:00'),
('9de0fbc0-49a3-4f8e-8097-b2f34d28b430', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #74\",\"order_id\":\"74\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-30 17:01:34', '2020-03-30 17:01:34'),
('a35627c2-dec6-4170-8b4c-7c10d43616ee', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #61\",\"order_id\":61,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-07-05 13:14:50', '2020-07-05 13:14:50'),
('a62508e7-e8c1-46e6-ac8d-7e9ca165dd46', 'App\\Notifications\\OrderCancelNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u063a\\u0627\\u0621 \\u0637\\u0644\\u0628\\u0643 #60 \\u0645\\u0646 \\u0642\\u0628\\u0644 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629\",\"order_id\":\"60\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:23:39', '2020-03-25 13:23:39'),
('a6663590-52a7-4c8b-a244-e0d468fc7215', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 30, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #91\",\"order_id\":\"91\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:18:14', '2020-04-15 18:18:14'),
('a79deb30-eba1-48a8-b779-3811225ea277', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #81\",\"order_id\":81,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:59', '2020-04-14 15:01:59'),
('a8403f16-cdee-4210-b91e-bb2447b6f845', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #72\",\"order_id\":\"72\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-30 17:02:37', '2020-03-30 17:02:37'),
('ab4e44a5-ec45-4ea5-8050-2a3052af1d54', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #63\",\"order_id\":\"63\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:44:50', '2020-03-25 13:44:50'),
('ac76ee4d-033e-4ef7-bca0-2678e52992de', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #63\",\"order_id\":63,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:45:01', '2020-03-25 13:45:01'),
('ae73a77b-e665-4a8a-90d2-7992c31e874b', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #78\",\"order_id\":78,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:45:05', '2020-04-14 14:45:05'),
('af28bc6f-0630-4744-b4f3-ef83a8003620', 'App\\Notifications\\PublicNotification', 'App\\Client', 12, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0641\\u0649 \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0627\\u0644\\u0633\\u0642\\u064a\\u0627\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-03-25 12:45:57', '2020-03-25 12:45:57'),
('b148bc4e-a9b7-4007-918b-1243d64bbe6e', 'App\\Notifications\\PublicNotification', 'App\\Client', 12, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u064a\\u0627 \\u062d\\u0645\\u0632\\u0647\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-03-25 16:27:03', '2020-03-25 16:27:03'),
('b185ea29-2c13-450c-ad12-e7c08f2b0173', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #84\",\"order_id\":84,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:14:58', '2020-04-14 15:14:58'),
('b2d1faf4-cbae-4b6c-86b7-eababd73e1fd', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #67\",\"order_id\":67,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 17:58:15', '2020-03-25 17:58:15'),
('b4b99d5b-9536-466a-8c4b-951219070b62', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #76\",\"order_id\":76,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 14:20:38', '2020-04-14 14:20:38'),
('b515edbe-f27b-4af1-a4b7-6c36685b16e7', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #83\",\"order_id\":83,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 15:02:24', '2020-04-14 15:02:24'),
('b516a2e8-57d5-4fb8-951c-cf257419c2b9', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 22, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #91\",\"order_id\":91,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-15 18:19:32', '2020-04-15 18:19:32'),
('b631b9fb-3187-489e-8479-085f19293ea4', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #64\",\"order_id\":64,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-03-25 14:27:44', '2020-03-25 14:27:44'),
('b7da1d65-e0d2-464a-8ea9-1745a7534234', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #81\",\"order_id\":\"81\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:14', '2020-04-14 15:01:14');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('b8c32f52-50ee-4025-9782-657ba8340309', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #59\",\"order_id\":59,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-03-25 13:35:13', '2020-03-25 12:50:48', '2020-03-25 13:35:13'),
('bc1aa226-abad-45bb-b99d-540cf4429f73', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #68\",\"order_id\":\"68\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-01 17:56:42', '2020-04-01 17:56:42'),
('bc1fcf8f-eb39-4750-9f21-ca6232f0bb67', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 22, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #92\",\"order_id\":92,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-15 18:24:33', '2020-04-15 18:24:33'),
('be6c415b-b1b7-461f-96f8-54273da85ade', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #70\",\"order_id\":70,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:56:11', '2020-03-26 12:41:56', '2020-04-01 17:56:11'),
('bf507846-b4a3-4110-af94-177978229c66', 'App\\Notifications\\OrderDoneNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0648\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #77\",\"order_id\":77,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-04-14 14:21:26', '2020-04-14 14:21:26'),
('bfdab7f2-f312-4483-8be7-e5a044e1c3d8', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #73\",\"order_id\":\"73\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-30 17:02:10', '2020-03-30 17:02:10'),
('c20d3eb3-00d8-42f0-b26e-cc8e8b600635', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #74\",\"order_id\":\"74\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-30 17:01:34', '2020-03-30 17:01:34'),
('c9765262-6fd4-4758-83af-6c6f53eb2fa8', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #85\",\"order_id\":\"85\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:13:28', '2020-04-14 15:13:28'),
('cad744df-53e6-4c50-8cdb-59610f364b62', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 22, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #92\",\"order_id\":92,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:24:20', '2020-04-15 18:24:20'),
('cbe7c165-66d2-48e5-8f65-0819bafc2a20', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 23, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #73\",\"order_id\":\"73\",\"type\":\"order\",\"company_url\":\"orders\"}', '2020-07-05 13:14:03', '2020-03-30 17:02:10', '2020-07-05 13:14:03'),
('cc526ddd-5310-4a48-bb17-221d077c263a', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #72\",\"order_id\":\"72\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-30 17:02:37', '2020-03-30 17:02:37'),
('cd1a8d2d-f311-4949-b13b-1621c036b7be', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #86\",\"order_id\":\"86\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:14:44', '2020-04-14 15:14:44'),
('ce31122c-2e64-441c-9c1e-5d2c8723d645', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #65\",\"order_id\":\"65\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:33:42', '2020-03-25 14:33:42'),
('d2fb570b-9f11-48d7-9e6f-33b024b9aa33', 'App\\Notifications\\OrderCancelNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u063a\\u0627\\u0621 \\u0637\\u0644\\u0628\\u0643 #88 \\u0645\\u0646 \\u0642\\u0628\\u0644 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629\",\"order_id\":\"88\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:27:03', '2020-04-14 15:27:03'),
('d446dd71-5e15-4f23-9de5-4913bd0c9f73', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #83\",\"order_id\":\"83\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:32', '2020-04-14 15:01:32'),
('d485fdea-b35f-45a5-9fd5-d592227c451f', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #78\",\"order_id\":\"78\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:35:31', '2020-04-14 14:35:31'),
('dc03c51e-0a2f-4bb1-b528-57a5902fdde5', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #84\",\"order_id\":84,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:10:05', '2020-04-14 15:10:05'),
('dd94e556-6413-481f-90b0-3f81cc26dd45', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #62\",\"order_id\":\"62\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:37:15', '2020-03-25 13:37:15'),
('dded6cf1-2b10-456e-9209-bc6c9fe742df', 'App\\Notifications\\CommissionNotification', 'App\\Company', 19, '{\"text\":\"\\u062a\\u0645 \\u0642\\u0628\\u0648\\u0644 \\u0639\\u0645\\u0648\\u0644\\u0629 \\u0627\\u0644\\u0637\\u0644\\u0628 #65 \\u0628\\u0646\\u062c\\u0627\\u062d\",\"order_id\":65,\"type\":\"order\",\"company_url\":\"previous_order\"}', NULL, '2020-03-25 16:39:24', '2020-03-25 16:39:24'),
('de36607a-46bb-4871-bb89-6ef2f62532bc', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 25, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #59\",\"order_id\":\"59\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:06:52', '2020-03-25 13:06:52'),
('deff7109-93b9-4a44-99c3-eee31c375b9f', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #63\",\"order_id\":63,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:42:44', '2020-03-25 13:42:44'),
('df234eb2-9ba6-4e39-a2d4-1397cd5bc4a1', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #61\",\"order_id\":\"61\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 13:31:57', '2020-03-25 13:31:57'),
('e09e9417-2ebf-446c-9f19-4babc0b9675f', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #91\",\"order_id\":91,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:19:17', '2020-04-15 18:19:17'),
('e0b480ce-e69c-4fe1-be5a-a447a4bdd815', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #86\",\"order_id\":86,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:15:05', '2020-04-14 15:15:05'),
('e1428ae7-0786-4906-98a8-66fd55ff9d7c', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #80\",\"order_id\":\"80\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:38:24', '2020-04-14 14:38:24'),
('e4733eb4-ed85-436a-aafd-8babcff696ba', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 19, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #66\",\"order_id\":66,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 17:25:23', '2020-03-25 17:25:23'),
('e569cd8f-7cde-4284-b981-59b38bca63a3', 'App\\Notifications\\PublicNotification', 'App\\Company', 19, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0647\\u0627\\u064a\\u0628\\u0631\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', NULL, '2020-03-25 16:26:46', '2020-03-25 16:26:46'),
('e7ca2595-bd50-494f-b4bf-9d9a59f185ad', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #82\",\"order_id\":82,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:02:04', '2020-04-14 15:02:04'),
('e89b3963-6992-4977-b453-750fdb8ec097', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #81\",\"order_id\":81,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:01:59', '2020-04-14 15:01:59'),
('e91d0444-224a-4c93-ba7f-e4fb8a160466', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 12, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #64\",\"order_id\":64,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-03-25 14:27:08', '2020-03-25 14:27:08'),
('ec2a1c0b-d8f4-4668-8b5f-689bfbf2483d', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #79\",\"order_id\":79,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:36:49', '2020-04-14 14:36:49'),
('ecff4a7d-ee4f-4e9e-b211-fadcbaeca706', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 27, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #68\",\"order_id\":\"68\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-01 17:56:42', '2020-04-01 17:56:42'),
('ee5d4216-ea24-4b0c-aebb-dd068d3317ef', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0647\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #71\",\"order_id\":71,\"type\":\"order\",\"company_url\":\"orders\"}', '2020-04-01 17:26:57', '2020-03-26 12:52:48', '2020-04-01 17:26:57'),
('f66f651f-72f6-4edb-a69a-be26f510f7c4', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Company', 20, '{\"text\":\"\\u062a\\u0645 \\u0627\\u0633\\u062a\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0645\\u0628\\u0644\\u063a \\u0648\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628 #80\",\"order_id\":80,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:45:12', '2020-04-14 14:45:12'),
('f6c0a906-fc1f-436d-8927-49582bb759b5', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #86\",\"order_id\":86,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:12:18', '2020-04-14 15:12:18'),
('f827645c-90ec-4d95-84a1-d48355ffe1e1', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #79\",\"order_id\":\"79\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:36:55', '2020-04-14 14:36:55'),
('f87d9f48-f82e-4651-b3e0-28b04fc25115', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #89\",\"order_id\":89,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 13:54:31', '2020-04-15 13:54:31'),
('f8b90713-288a-4d34-9ff9-322274b2a327', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 30, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #92\",\"order_id\":\"92\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 18:24:11', '2020-04-15 18:24:11'),
('f927946f-85b9-4e3f-b069-b2556c392426', 'App\\Notifications\\OrderNewNotification', 'App\\Company', 20, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643\\u0645 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f #88\",\"order_id\":88,\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 15:26:31', '2020-04-14 15:26:31'),
('fa3c22fe-fdb8-4848-9b10-ba3827a6e789', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Client', 11, '{\"text\":\"\\u062a\\u0645 \\u062a\\u0623\\u0643\\u064a\\u062f \\u0637\\u0644\\u0628\\u0643 #89\",\"order_id\":\"89\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-15 13:55:46', '2020-04-15 13:55:46'),
('fe89d748-a458-445c-9a30-139469a0959e', 'App\\Notifications\\PublicNotification', 'App\\Company', 20, '{\"text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a\",\"order_id\":0,\"type\":\"public\",\"company_url\":\"public\"}', '2020-04-14 14:13:59', '2020-03-25 16:23:26', '2020-04-14 14:13:59'),
('ff71ec9e-4f28-4989-bec0-435e1a125630', 'App\\Notifications\\OrderDeliveryNotification', 'App\\Representative', 28, '{\"text\":\"\\u0644\\u062f\\u064a\\u0643 \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f \\u0644\\u062a\\u0648\\u0635\\u064a\\u0644\\u0647 #76\",\"order_id\":\"76\",\"type\":\"order\",\"company_url\":\"orders\"}', NULL, '2020-04-14 14:19:09', '2020-04-14 14:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `representative_id` int(11) DEFAULT NULL,
  `add_value` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_percentage` double DEFAULT NULL,
  `net` double NOT NULL DEFAULT '0',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_way` enum('on_deliver','visa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on_deliver',
  `visa_response` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('wait','process','done','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wait',
  `done_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_cancel` enum('client','company','representative','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `commission_percentage` double DEFAULT NULL,
  `commission_money` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_date` date DEFAULT NULL,
  `done_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `company_id`, `representative_id`, `add_value`, `total`, `coupon_code`, `coupon_percentage`, `net`, `location`, `day`, `time`, `payment_way`, `visa_response`, `status`, `done_day`, `done_time`, `who_cancel`, `cancel_reason`, `rate`, `commission_percentage`, `commission_money`, `created_at`, `updated_at`, `lat`, `lon`, `name`, `mobile`, `client_date`, `done_date`) VALUES
(59, 12, 19, 25, 10, 330, '123456', 13, 287.1, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'monday', '05:00', 'on_deliver', NULL, 'cancel', NULL, NULL, 'representative', 'انا لغيت الطلب', NULL, 5, 14.355, '2020-03-25 12:50:48', '2020-03-25 13:34:13', '30.96622085571289', '31.242477416992188', 'Hamza_user', '0587654321', '2020-03-30', NULL),
(60, 12, 19, NULL, 10, 1760, '123456', 13, 1531.2, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '11:00', 'on_deliver', NULL, 'cancel', NULL, NULL, 'company', NULL, NULL, 5, 76.56, '2020-03-25 13:17:13', '2020-03-25 13:23:39', '30.966211318969727', '31.242509841918945', 'Mohammed hamza', '0587654322', '2020-03-29', NULL),
(61, 12, 19, 23, 10, 297, NULL, NULL, 297, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '06:00', 'on_deliver', NULL, 'done', 'Sunday', '08:14', NULL, NULL, NULL, 5, 14.85, '2020-03-25 13:31:07', '2020-07-05 13:14:50', '30.96620750427246', '31.24250602722168', 'Hamza_user', '0587654321', '2020-03-29', '2020-07-05'),
(62, 12, 19, 25, 10, 110, NULL, NULL, 110, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '06:00', 'on_deliver', NULL, 'done', 'Wednesday', '08:37', NULL, NULL, 3, 5, 5.5, '2020-03-25 13:36:57', '2020-04-01 18:08:07', '30.96621322631836', '31.242509841918945', 'Hamza_user', '0587654321', '2020-03-29', '2020-03-25'),
(63, 11, 19, 25, 10, 110, NULL, NULL, 110, 'نهاية شارع مدرسة سيدى عبد القادر حى غرب بجوار المعرض الصينى، المنصورة (قسم 2)، ثان المنصورة، الدقهلية، مصر', 'monday', '11:00', 'on_deliver', NULL, 'done', 'Wednesday', '08:45', NULL, NULL, 2, 5, 5.5, '2020-03-25 13:42:44', '2020-03-25 13:51:28', '31.043920516967773', '31.383878707885742', 'Client_user', '0512345678', '2020-03-30', '2020-03-25'),
(64, 12, 19, 25, 10, 1320, NULL, NULL, 1320, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'tuesday', '05:00', 'on_deliver', NULL, 'done', 'Wednesday', '09:27', NULL, NULL, 5, 5, 66, '2020-03-25 14:26:17', '2020-03-25 14:27:44', '30.96622085571289', '31.24248504638672', 'Hamza_user', '0587654321', '2020-03-31', '2020-03-25'),
(65, 12, 19, 25, 10, 1320, '123456', 13, 1148.4, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '04:00', 'on_deliver', NULL, 'done', 'Wednesday', '09:33', NULL, NULL, 5, 5, 57.42, '2020-03-25 14:33:01', '2020-03-25 16:39:24', '30.966205596923828', '31.242504119873047', 'Hamza_user', '0587654321', '2020-03-28', '2020-03-25'),
(66, 11, 19, NULL, 10, 132, NULL, NULL, 132, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'tuesday', '06:00', 'on_deliver', NULL, 'wait', NULL, NULL, NULL, NULL, NULL, 5, 6.6, '2020-03-25 17:25:23', '2020-03-25 17:25:23', '30.96620750427246', '31.24249267578125', 'Client_user', '0512345678', '2020-03-31', NULL),
(67, 12, 19, NULL, 5, 378, '123456', 10, 340.2, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '05:00', 'on_deliver', NULL, 'wait', NULL, NULL, NULL, NULL, NULL, 10, 34.02, '2020-03-25 17:58:14', '2020-03-25 17:58:14', '30.96622085571289', '31.24246597290039', 'Hamza_user', '0587654321', '2020-03-28', NULL),
(68, 11, 19, 27, 5, 1722, '123456', 10, 1549.8, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '12:00', 'on_deliver', NULL, 'done', 'Wednesday', '12:59', NULL, NULL, NULL, 10, 154.98, '2020-03-26 12:22:44', '2020-04-01 17:59:14', '30.966211318969727', '31.242509841918945', 'Mohammed hamza', '0587654321', '2020-03-28', '2020-04-01'),
(69, 11, 19, NULL, 5, 2940, NULL, NULL, 2940, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '13:00', 'on_deliver', NULL, 'wait', NULL, NULL, NULL, NULL, NULL, 10, 294, '2020-03-26 12:31:00', '2020-03-26 12:31:00', '30.96621322631836', '31.24250030517578', 'Client_user', '0512345678', '2020-03-29', NULL),
(70, 11, 19, 25, 5, 1449, NULL, NULL, 1449, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '13:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=yVBmdhRn5c, pt_token=VMJ3aB1OsIqOfz2Mq8gTXPPyb2Q3pWgl, pt_transaction_id=447822, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Thursday', '07:47', NULL, NULL, 4, 10, 144.9, '2020-03-26 12:41:56', '2020-03-29 06:27:44', '30.966215133666992', '31.24248695373535', 'Mohammed hamza', '0532145687', '2020-03-28', '2020-03-26'),
(71, 11, 19, 25, 5, 1449, '123456', 10, 1304.1, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'monday', '18:00', 'on_deliver', NULL, 'done', 'Thursday', '07:52', NULL, NULL, 5, 10, 130.41, '2020-03-26 12:50:18', '2020-03-29 06:27:34', '30.966211318969727', '31.242507934570312', 'Client_user', '0512345678', '2020-03-30', '2020-03-26'),
(72, 11, 19, 25, 5, 672, NULL, NULL, 672, '3382، السلمانية الجنوبية، الهفوف والمبرز 36441 9635، السعودية', 'sunday', '16:00', 'on_deliver', NULL, 'process', NULL, NULL, NULL, NULL, NULL, 10, 67.2, '2020-03-27 02:30:24', '2020-03-30 17:02:37', '25.361711502075195', '49.56050109863281', 'Client_user', '0512345678', '2020-03-29', NULL),
(73, 11, 19, 23, 5, 1176, NULL, NULL, 1176, '6750 حمزة بن احمد السلمي، الجسر، الخبر 34714 4373، السعودية', 'saturday', '14:00', 'on_deliver', NULL, 'done', 'Sunday', '09:24', NULL, NULL, NULL, 10, 117.6, '2020-03-29 06:27:13', '2020-07-05 14:24:16', '26.20218276977539', '50.205936431884766', 'Client_user', '0512345678', '2020-04-04', '2020-07-05'),
(74, 11, 19, 25, 5, 588, NULL, NULL, 588, '6750 حمزة بن احمد السلمي، الجسر، الخبر 34714 4373، السعودية', 'sunday', '17:00', 'on_deliver', NULL, 'process', NULL, NULL, NULL, NULL, NULL, 10, 58.8, '2020-03-29 06:28:54', '2020-03-30 17:01:33', '26.20218276977539', '50.205936431884766', 'Client_user', '0512345678', '2020-04-05', NULL),
(75, 11, 20, 28, 5, 315, NULL, NULL, 315, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '11:00', 'on_deliver', NULL, 'done', 'Tuesday', '09:16', NULL, NULL, 5, 10, 31.5, '2020-04-14 14:13:45', '2020-04-14 14:17:02', '30.966218948364258', '31.242521286010742', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(76, 11, 20, 28, 5, 336, NULL, NULL, 336, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '13:00', 'on_deliver', NULL, 'done', 'Tuesday', '09:19', NULL, NULL, 4, 10, 33.6, '2020-04-14 14:18:51', '2020-04-14 14:20:38', '30.966211318969727', '31.242507934570312', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(77, 11, 20, 28, 5, 1071, NULL, NULL, 1071, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '13:00', 'on_deliver', NULL, 'done', 'Tuesday', '09:21', NULL, NULL, 5, 10, 107.1, '2020-04-14 14:20:18', '2020-04-14 14:21:26', '30.966209411621094', '31.242509841918945', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(78, 11, 20, 28, 5, 315, NULL, NULL, 315, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '11:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=xEz0XkjTDf, pt_token=pNkKYUI3mzp8BaooCcYuTv9sw6NP0q5q, pt_transaction_id=457306, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Tuesday', '09:45', NULL, NULL, 4, 10, 31.5, '2020-04-14 14:35:05', '2020-04-14 14:45:35', '30.96622085571289', '31.242504119873047', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(79, 11, 20, 28, 5, 336, NULL, NULL, 336, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '14:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=EjCopJMODq, pt_token=nTMD6E5Xaxq5ztMEJ8kJSY3vnsfahSAF, pt_transaction_id=457307, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Tuesday', '09:45', NULL, NULL, 4, 10, 33.6, '2020-04-14 14:36:48', '2020-04-14 14:45:39', '30.966217041015625', '31.242511749267578', 'Client_user', '0512345678', '2020-04-19', '2020-04-14'),
(80, 11, 20, 28, 5, 1071, NULL, NULL, 1071, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '14:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=KkF8Yl0qM7, pt_token=RKJnV1mzqL8tRigozAnD07XFgV1glNod, pt_transaction_id=457308, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Tuesday', '09:45', NULL, NULL, 4, 10, 107.1, '2020-04-14 14:38:14', '2020-04-14 14:45:31', '30.966218948364258', '31.24250030517578', 'Client_user', '0512345678', '2020-04-19', '2020-04-14'),
(81, 11, 20, 28, 5, 315, '123456', 10, 283.5, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '12:00', 'on_deliver', NULL, 'done', 'Tuesday', '10:01', NULL, NULL, 4, 10, 28.35, '2020-04-14 14:57:50', '2020-04-14 15:02:33', '30.96622085571289', '31.242494583129883', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(82, 11, 20, 28, 5, 336, '123456', 10, 302.4, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '14:00', 'on_deliver', NULL, 'done', 'Tuesday', '10:02', NULL, NULL, 5, 10, 30.24, '2020-04-14 14:58:29', '2020-04-14 15:02:28', '30.96620750427246', '31.242502212524414', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(83, 11, 20, 28, 5, 1071, '123456', 10, 963.9, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '13:00', 'on_deliver', NULL, 'done', 'Tuesday', '10:02', NULL, NULL, 5, 10, 96.39, '2020-04-14 14:58:58', '2020-04-14 15:02:24', '30.966224670410156', '31.242504119873047', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(84, 11, 20, 28, 5, 315, '123456', 10, 283.5, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '11:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=yWVLONF2Vz, pt_token=hav1CPO0FeuY4oxnbg0nVyjRk8E0azzs, pt_transaction_id=457318, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Tuesday', '10:14', NULL, NULL, 4, 10, 28.35, '2020-04-14 15:10:05', '2020-04-14 15:15:25', '30.966224670410156', '31.24250602722168', 'Client_user', '0512345678', '2020-04-18', '2020-04-14'),
(85, 11, 20, 28, 5, 336, '123456', 10, 302.4, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '14:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=oHSR2XiasS, pt_token=oYNYIf1O87aG2gxVw3hgnFXgx0dQaGJz, pt_transaction_id=457321, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Tuesday', '10:15', NULL, NULL, 4, 10, 30.24, '2020-04-14 15:11:22', '2020-04-14 15:15:29', '30.966211318969727', '31.24251365661621', 'Client_user', '0512345678', '2020-04-19', '2020-04-14'),
(86, 11, 20, 28, 5, 1071, '123456', 10, 963.9, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'monday', '15:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=Lbr6neSQ1b, pt_token=SiLbiF7FRgJqNftIGRLWow7PDv4wl6He, pt_transaction_id=457322, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Tuesday', '10:15', NULL, NULL, 4, 10, 96.39, '2020-04-14 15:12:18', '2020-04-14 15:15:21', '30.96622085571289', '31.242502212524414', 'Client_user', '0512345678', '2020-04-20', '2020-04-14'),
(87, 11, 20, NULL, 5, 378, NULL, NULL, 378, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '14:00', 'on_deliver', NULL, 'cancel', NULL, NULL, 'company', 'س', NULL, 10, 37.8, '2020-04-14 15:21:57', '2020-04-14 15:22:42', '30.966218948364258', '31.242502212524414', 'Client_user', '0512345678', '2020-04-19', NULL),
(88, 11, 20, NULL, 5, 315, NULL, NULL, 315, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '14:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=xhJPGj1YFm, pt_token=YtmErYTLM4bG3ybuOn1rLzIvppOqouNm, pt_transaction_id=457334, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'cancel', NULL, NULL, 'company', NULL, NULL, 10, 31.5, '2020-04-14 15:26:31', '2020-04-14 15:27:03', '30.96622085571289', '31.24250030517578', 'Client_user', '0512345678', '2020-04-19', NULL),
(89, 11, 20, 28, 5, 336, NULL, NULL, 336, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '10:00', 'on_deliver', NULL, 'process', NULL, NULL, NULL, NULL, NULL, 10, 33.6, '2020-04-15 13:54:31', '2020-04-15 13:55:46', '30.966232299804688', '31.242429733276367', 'Client_user', '0512345678', '2020-04-18', NULL),
(90, 11, 20, NULL, 5, 1512, '123456', 10, 1360.8, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '13:00', 'on_deliver', NULL, 'wait', NULL, NULL, NULL, NULL, NULL, 10, 136.08, '2020-04-15 13:58:39', '2020-04-15 13:58:40', '30.96622085571289', '31.242490768432617', 'Client_user', '0512345678', '2020-04-19', NULL),
(91, 11, 22, 30, 5, 252, NULL, NULL, 252, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'saturday', '14:00', 'on_deliver', NULL, 'done', 'Wednesday', '13:19', NULL, NULL, 5, 10, 25.2, '2020-04-15 18:18:01', '2020-04-15 18:19:32', '30.96622085571289', '31.242488861083984', 'Client_user', '0512345678', '2020-04-18', '2020-04-15'),
(92, 11, 22, 30, 5, 315, NULL, NULL, 315, 'Al Agawei, مدينة سمنود، سمنود، الغربية، مصر', 'sunday', '13:00', 'visa', 'Bundle[{pt_response_code=100, pt_customer_password=HheGcWWwxz, pt_token=Q4hrlLuHRruKFsI40sjXl1fAIrwEY4eO, pt_transaction_id=458116, pt_result=Your transaction is succesfully completed, pt_customer_email=e@e.com}]', 'done', 'Wednesday', '13:24', NULL, NULL, 5, 10, 31.5, '2020-04-15 18:23:56', '2020-04-15 18:24:33', '30.96622085571289', '31.24250602722168', 'Client_user', '0512345678', '2020-04-19', '2020-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type` enum('normal','mosque','offer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `after_discount` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `type`, `quantity`, `price`, `discount`, `after_discount`, `created_at`, `updated_at`) VALUES
(45, 59, 12, 'normal', 3, 300, 0, 300, '2020-03-25 12:50:48', '2020-03-25 12:50:48'),
(46, 60, 12, 'normal', 4, 400, 0, 400, '2020-03-25 13:17:13', '2020-03-25 13:17:13'),
(47, 60, 13, 'normal', 4, 1200, 0, 1200, '2020-03-25 13:17:13', '2020-03-25 13:17:13'),
(48, 61, 12, 'offer', 3, 270, 0, 270, '2020-03-25 13:31:07', '2020-03-25 13:31:07'),
(49, 62, 12, 'normal', 1, 100, 0, 100, '2020-03-25 13:36:57', '2020-03-25 13:36:57'),
(50, 63, 12, 'normal', 1, 100, 0, 100, '2020-03-25 13:42:44', '2020-03-25 13:42:44'),
(51, 64, 12, 'normal', 3, 300, 0, 300, '2020-03-25 14:26:17', '2020-03-25 14:26:17'),
(52, 64, 13, 'normal', 3, 900, 0, 900, '2020-03-25 14:26:17', '2020-03-25 14:26:17'),
(53, 65, 12, 'normal', 3, 300, 0, 300, '2020-03-25 14:33:01', '2020-03-25 14:33:01'),
(54, 65, 13, 'normal', 3, 900, 0, 900, '2020-03-25 14:33:01', '2020-03-25 14:33:01'),
(55, 66, 12, 'normal', 1, 120, 0, 120, '2020-03-25 17:25:23', '2020-03-25 17:25:23'),
(56, 67, 12, 'normal', 3, 360, 0, 360, '2020-03-25 17:58:14', '2020-03-25 17:58:14'),
(57, 68, 12, 'normal', 1, 120, 0, 120, '2020-03-26 12:22:44', '2020-03-26 12:22:44'),
(58, 68, 13, 'offer', 4, 1120, 0, 1120, '2020-03-26 12:22:44', '2020-03-26 12:22:44'),
(59, 68, 14, 'mosque', 5, 400, 0, 400, '2020-03-26 12:22:44', '2020-03-26 12:22:44'),
(60, 69, 12, 'normal', 4, 480, 0, 480, '2020-03-26 12:31:00', '2020-03-26 12:31:00'),
(61, 69, 13, 'normal', 4, 1200, 0, 1200, '2020-03-26 12:31:00', '2020-03-26 12:31:00'),
(62, 69, 13, 'offer', 4, 1120, 0, 1120, '2020-03-26 12:31:00', '2020-03-26 12:31:00'),
(63, 70, 12, 'normal', 4, 480, 0, 480, '2020-03-26 12:41:56', '2020-03-26 12:41:56'),
(64, 70, 15, 'normal', 3, 300, 0, 300, '2020-03-26 12:41:56', '2020-03-26 12:41:56'),
(65, 70, 16, 'normal', 3, 600, 0, 600, '2020-03-26 12:41:56', '2020-03-26 12:41:56'),
(66, 71, 12, 'normal', 4, 480, 0, 480, '2020-03-26 12:50:18', '2020-03-26 12:50:18'),
(67, 71, 15, 'normal', 3, 300, 0, 300, '2020-03-26 12:50:18', '2020-03-26 12:50:18'),
(68, 71, 16, 'normal', 3, 600, 0, 600, '2020-03-26 12:50:18', '2020-03-26 12:50:18'),
(69, 72, 12, 'normal', 2, 240, 0, 240, '2020-03-27 02:30:24', '2020-03-27 02:30:24'),
(70, 72, 13, 'normal', 1, 300, 0, 300, '2020-03-27 02:30:24', '2020-03-27 02:30:24'),
(71, 72, 14, 'normal', 1, 100, 0, 100, '2020-03-27 02:30:24', '2020-03-27 02:30:24'),
(72, 73, 13, 'offer', 4, 1120, 0, 1120, '2020-03-29 06:27:13', '2020-03-29 06:27:13'),
(73, 74, 14, 'mosque', 7, 560, 0, 560, '2020-03-29 06:28:54', '2020-03-29 06:28:54'),
(74, 75, 18, 'normal', 3, 300, 0, 300, '2020-04-14 14:13:45', '2020-04-14 14:13:45'),
(75, 76, 18, 'offer', 4, 320, 0, 320, '2020-04-14 14:18:51', '2020-04-14 14:18:51'),
(76, 77, 20, 'mosque', 3, 1020, 0, 1020, '2020-04-14 14:20:18', '2020-04-14 14:20:18'),
(77, 78, 18, 'normal', 3, 300, 0, 300, '2020-04-14 14:35:05', '2020-04-14 14:35:05'),
(78, 79, 18, 'offer', 4, 320, 0, 320, '2020-04-14 14:36:48', '2020-04-14 14:36:48'),
(79, 80, 20, 'mosque', 3, 1020, 0, 1020, '2020-04-14 14:38:14', '2020-04-14 14:38:14'),
(80, 81, 18, 'normal', 3, 300, 0, 300, '2020-04-14 14:57:50', '2020-04-14 14:57:50'),
(81, 82, 18, 'offer', 4, 320, 0, 320, '2020-04-14 14:58:29', '2020-04-14 14:58:29'),
(82, 83, 20, 'mosque', 3, 1020, 0, 1020, '2020-04-14 14:58:58', '2020-04-14 14:58:58'),
(83, 84, 18, 'normal', 3, 300, 0, 300, '2020-04-14 15:10:05', '2020-04-14 15:10:05'),
(84, 85, 18, 'offer', 4, 320, 0, 320, '2020-04-14 15:11:22', '2020-04-14 15:11:22'),
(85, 86, 20, 'mosque', 3, 1020, 0, 1020, '2020-04-14 15:12:18', '2020-04-14 15:12:18'),
(86, 87, 19, 'normal', 3, 360, 0, 360, '2020-04-14 15:21:57', '2020-04-14 15:21:57'),
(87, 88, 18, 'normal', 3, 300, 0, 300, '2020-04-14 15:26:31', '2020-04-14 15:26:31'),
(88, 89, 18, 'offer', 4, 320, 0, 320, '2020-04-15 13:54:31', '2020-04-15 13:54:31'),
(89, 90, 20, 'normal', 3, 1080, 0, 1080, '2020-04-15 13:58:40', '2020-04-15 13:58:40'),
(90, 90, 19, 'normal', 3, 360, 0, 360, '2020-04-15 13:58:40', '2020-04-15 13:58:40'),
(91, 91, 21, 'offer', 3, 240, 0, 240, '2020-04-15 18:18:02', '2020-04-15 18:18:02'),
(92, 92, 22, 'normal', 3, 300, 0, 300, '2020-04-15 18:23:56', '2020-04-15 18:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `normal` tinyint(4) NOT NULL DEFAULT '1',
  `normal_price` double NOT NULL DEFAULT '0',
  `mosque` tinyint(4) NOT NULL DEFAULT '0',
  `mosque_price` double NOT NULL DEFAULT '0',
  `offer` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` double NOT NULL DEFAULT '0',
  `hide` enum('hide','not_hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_hide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kind` enum('carton','galon') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'carton'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `name`, `image`, `size`, `normal`, `normal_price`, `mosque`, `mosque_price`, `offer`, `offer_price`, `hide`, `created_at`, `updated_at`, `kind`) VALUES
(12, 19, 'مياه هايبر', '1585121359_20-03-25-07-29-19.jpg', '1 لتر', 1, 120, 0, 0, 0, 0, 'not_hide', '2020-03-25 12:29:19', '2020-03-25 16:41:24', 'carton'),
(13, 19, 'مياه خاصه', '1585124062_20-03-25-08-14-22.jpg', '2 لتر', 1, 300, 0, 0, 1, 280, 'not_hide', '2020-03-25 13:14:22', '2020-03-25 13:14:22', 'carton'),
(14, 19, 'منتج شامل 1', '1585130474_20-03-25-10-01-14.jpg', '2 لتر', 1, 100, 1, 80, 0, 0, 'not_hide', '2020-03-25 15:01:14', '2020-03-26 17:26:10', 'carton'),
(15, 19, 'جالون', '1585208039_20-03-26-07-33-59.jpg', '3 لتر', 1, 100, 0, 0, 0, 0, 'not_hide', '2020-03-26 12:33:59', '2020-03-26 12:33:59', 'galon'),
(16, 19, 'جالون', '1585208058_20-03-26-07-34-18.jpg', '6 لتر', 1, 200, 0, 0, 0, 0, 'not_hide', '2020-03-26 12:34:18', '2020-03-26 12:34:18', 'galon'),
(17, 19, 'عبوة 330مل', '1585444236_20-03-29-01-10-36.jpg', '330 مللتر', 1, 15, 1, 12, 0, 0, 'not_hide', '2020-03-29 06:10:36', '2020-03-29 06:10:36', 'carton'),
(18, 20, 'المنتج الاول', '1586855075_20-04-14-09-04-35.jpg', '2 لتر', 1, 100, 0, 0, 1, 80, 'not_hide', '2020-04-14 14:04:35', '2020-04-14 14:04:35', 'carton'),
(19, 20, 'منتج ثاني', '1586855092_20-04-14-09-04-52.jpg', '3 لتر', 1, 120, 0, 0, 0, 0, 'not_hide', '2020-04-14 14:04:52', '2020-04-14 14:04:52', 'galon'),
(20, 20, 'المنتج الثالث', '1586855113_20-04-14-09-05-13.jpg', '3 لتر', 1, 360, 1, 340, 0, 0, 'not_hide', '2020-04-14 14:05:13', '2020-04-14 14:05:13', 'galon'),
(21, 22, 'منتج ميا', '1586955439_20-04-15-12-57-19.jpg', '1 لتر', 1, 100, 0, 0, 1, 80, 'not_hide', '2020-04-15 17:57:19', '2020-04-15 17:57:19', 'galon'),
(22, 22, 'منتج مياه كبير', '1586955464_20-04-15-12-57-44.jpg', '3 لتر', 1, 100, 0, 0, 0, 0, 'not_hide', '2020-04-15 17:57:44', '2020-04-15 17:57:44', 'galon');

-- --------------------------------------------------------

--
-- Table structure for table `receivable_registers`
--

CREATE TABLE `receivable_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` enum('admin','company') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `money_paid` double NOT NULL DEFAULT '0',
  `payment_way` enum('bank','visa') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_response` text COLLATE utf8mb4_unicode_ci,
  `from_user_id` int(11) DEFAULT NULL,
  `to_agree` enum('agree','not_agree') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agree_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivable_registers`
--

INSERT INTO `receivable_registers` (`id`, `from`, `company_id`, `money_paid`, `payment_way`, `convert_img`, `e_response`, `from_user_id`, `to_agree`, `agree_by`, `created_at`, `updated_at`) VALUES
(1, 'company', 19, 57, 'visa', NULL, 'true', 22, NULL, NULL, '2020-04-12 08:15:35', '2020-04-12 08:15:35'),
(2, 'company', 19, 100, 'bank', '15866871245378.jpg', 'true', 22, 'not_agree', 4, '2020-04-12 08:25:24', '2020-04-14 06:01:17'),
(3, 'company', 19, 150, 'bank', '15866871844021.jpg', 'true', 22, 'agree', 4, '2020-04-12 08:26:24', '2020-04-14 06:00:16'),
(4, 'admin', 19, 150, 'visa', NULL, 'true', 4, 'agree', 22, '2020-04-12 08:26:24', '2020-04-12 09:54:45'),
(5, 'admin', 19, 154, 'bank', '15868464894126.jpg', 'true', 4, NULL, NULL, '2020-04-14 04:41:29', '2020-04-14 04:41:29'),
(6, 'company', 20, 100, 'bank', '15868562284038.webp', 'true', 24, 'agree', 4, '2020-04-14 14:23:48', '2020-04-14 14:24:27'),
(7, 'company', 20, 72, 'bank', '15868562901793.jpg', 'true', 24, 'agree', 4, '2020-04-14 14:24:50', '2020-04-14 14:25:56'),
(8, 'admin', 20, 49, 'bank', '15868576636180.webp', 'true', 4, 'not_agree', 24, '2020-04-14 14:47:43', '2020-04-14 14:47:52'),
(9, 'admin', 20, 549, 'bank', '15868576902534.webp', 'true', 4, 'not_agree', 24, '2020-04-14 14:48:10', '2020-04-14 14:48:29'),
(10, 'admin', 20, 549, 'visa', NULL, 'true', 4, 'agree', 24, '2020-04-14 14:48:45', '2020-04-14 14:48:51'),
(11, 'admin', 20, 1000, 'visa', NULL, 'true', 4, 'agree', 24, '2020-04-14 14:49:08', '2020-04-14 14:49:14'),
(12, 'company', 20, 155, 'visa', NULL, 'true', 24, 'agree', 4, '2020-04-14 15:05:00', '2020-04-14 15:06:12'),
(13, 'admin', 20, 1395, 'visa', NULL, 'true', 4, 'not_agree', 24, '2020-04-14 15:16:04', '2020-04-14 15:16:52'),
(14, 'admin', 20, 1395, 'visa', NULL, 'true', 4, 'agree', 24, '2020-04-14 15:17:18', '2020-04-14 15:17:39'),
(15, 'company', 22, 25, 'visa', NULL, 'true', 29, 'agree', 4, '2020-04-15 18:20:43', '2020-04-15 18:22:35'),
(16, 'admin', 22, 83, 'visa', NULL, 'true', 4, 'agree', 29, '2020-04-15 18:25:22', '2020-04-15 18:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('responsible','representative') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'representative',
  `active` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representatives`
--

INSERT INTO `representatives` (`id`, `company_id`, `name`, `email`, `mobile`, `password`, `user_name`, `role`, `active`, `api_token`, `player_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(22, 19, 'admin_hamza', 'moh.ham.1997@gmail.com', '0512345678', '$2y$10$WvWXPeMttj/g/3oSJhLSb.uPUWtCPLNHIaYpax6TkN7GCcS1JjJTi', 'user_hamza', 'responsible', 'active', NULL, NULL, NULL, '2020-03-25 12:14:12', '2020-03-25 17:16:58'),
(23, 19, 'محمديه', 'matrix.20101465@gmail.com', '0512365478', '$2y$10$TzVUwTJ66m5ZAfb7vdmAtOSY7iXfykrWc1NDNNaVFQqGPenWRt84q', 'user_delegate', 'representative', 'active', '7OUpAmV3bkUqQUkfnz4SxoUIuc4MUYb8ca7rfVIiuFnb1oqxZnwJO1JwpN1G', 'fRLwqwZTom4:APA91bE2P7ALGT3Rmy_k0qNOUS5os9w3o9IfJmqM5HWujOPbLaF16WVwGvVLxvTyKDyyZdePSg3v1yKild_gP4GYGcm-CQ_FupGyHuBs0EGbgF-nAjnj0q0dcU-1SlUsJCnl-KxkW65u', NULL, '2020-03-25 12:30:35', '2020-07-05 16:35:40'),
(24, 20, 'albadr_admin', 'albadr@gmail.com', '0587654321', '$2y$10$372nC2NVUsnjVMOYzYY9G.g02xdCIsfH6mB7gqt.FktLVe09plHI6', 'albadr_user', 'responsible', 'active', NULL, NULL, NULL, '2020-03-25 12:36:36', '2020-03-30 17:05:08'),
(25, 19, 'Mohammed hamza', 'lolo.9090@gmail.com', '0587456123', '$2y$10$uP0bW6EOuXTMS3pmXrheg.W4rL3d0/WS6/xDQs3IHIWK6or3gZD3y', 'Lolo_delegate', 'representative', 'active', 'XUwFp9KJVXsOmA2vw46do5lulPtf7Mq04TujKgXI6e1h7oUxrbE5cA5QvMio', 'fMhh-V-MmaM:APA91bFILkDXUyDewayeH0mI7PsrmA9vqCRct91fNGGNdOapU6GLNOqtA8skH00wJ2Dp2uHSdv5icoqEHFzcjEw8jqzVrtVvis_qMUTteWVLe-eriK79HB3uI1PcrM96oxGTBO01UN7d', NULL, '2020-03-25 13:04:25', '2020-03-26 17:17:42'),
(26, 21, 'حسام', 'husamsalkahlout@gmail.com', '0598765432', '$2y$10$OfyXzrrntCqeJdUyzl3H4ezHlY0rM/RlH1sohjyZRyhmGXt1.PWSy', 'qatrah', 'responsible', 'active', NULL, NULL, NULL, '2020-03-29 06:17:04', '2020-03-30 17:05:16'),
(27, 19, 'Husam saleem', 'husamalkahlout@gmail.com', '0513243546', '$2y$10$RYQucmWAd0GleC2E8OUUPOIqIyvXHuAQ7LzU46gyzKAvw7FasBN/e', 'husamsaleem', 'representative', 'active', '3MIjEwnahWbzWeypib4tkOzlw1NuWw80JNBq2tHmPdl5yDTNqTUCWsK4GhUX', 'cN8cdKmMgzs:APA91bFX6VeLB_wJMcMKXd1Pvo5GL_VlzUJR9P2iQpfN3YajYm0gRlYhjx1rvvEoOnrtsftbVeAn3NYMwDQcosC9yK8dYu64bKYcbelz56GwRinqYD6ic2bEKL7Rpt-1_3jWwLzp_dU7', NULL, '2020-04-01 17:39:16', '2020-04-01 17:39:43'),
(28, 20, 'ahmed', 'ahmed@admin.com', '0512365809', '$2y$10$g2Lplf8n0uZk7yD5IPnDGu6FIPVxzovPcQ3/3V7kRyqD1fwD60tOG', 'ahmed.user', 'representative', 'active', NULL, NULL, NULL, '2020-04-14 14:05:44', '2020-04-15 18:00:54'),
(29, 22, 'حمزه', '7amza@gmail.com', '0532145698', '$2y$10$Tsly3gO2e4kZ1xj7RpXMvegAoYD/ZSwW/Vmy2v6ErC3OdffUwKmP6', '7amza', 'responsible', 'active', NULL, NULL, NULL, '2020-04-15 17:56:19', '2020-04-15 17:56:19'),
(30, 22, '7amza.3000', '7amza@yahoo.com', '0516321458', '$2y$10$xpeaQ.pQx/iTz5gmmU/Fdu5RUZKnJTDpO/H4SPfmoGQpqSpbaxUj.', '7amza.3000', 'representative', 'active', 's3NATamSaB95WDTegSosRnrBTCxGVI4RifL9DJOr0LFWzH3UEDLf37rf0BGM', 'eg0p0u6TqZI:APA91bE2OhC-LDOayS9Rx6MchXdz6PIUdZ5vOjA785csHBMyqH8C1w77Q48ZnVFq8eT-QerZyq8kFhbLYsiDc0tAq3wo0dHtXh-BQ_EpKX7nmCWc7jy3vNlW7J5l2Pyz73vqt1IA2FYf', NULL, '2020-04-15 17:59:35', '2020-04-15 18:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-03-13 15:51:17', '2020-03-13 15:51:21'),
(2, 'sub admin', '2020-03-13 15:51:17', '2020-03-13 15:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_percentage` double NOT NULL DEFAULT '0',
  `add_value` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `mobile`, `address`, `fax`, `facebook`, `twitter`, `instagram`, `whatsapp`, `commission_percentage`, `add_value`, `created_at`, `updated_at`) VALUES
(1, 'قطرة ماء', 'water@water.com', '052124566', 'السعودية - الرياض - الحى الخامس', '052124555', 'https://www.facebook.com/mohammed.hamza.7355079', 'https://www.facebook.com/profile.php?id=100004944403106', 'https://www.instagram.com/', '0523588956', 10, 5, '2020-02-05 10:48:24', '2020-04-21 16:00:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`),
  ADD KEY `email` (`email`(191)),
  ADD KEY `password` (`password`(191)),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `city_companies`
--
ALTER TABLE `city_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobile` (`mobile`(191)),
  ADD KEY `active_code` (`active_code`(191)),
  ADD KEY `password` (`password`(191)),
  ADD KEY `name` (`name`(191)),
  ADD KEY `api_token` (`api_token`(191)),
  ADD KEY `stop` (`stop`),
  ADD KEY `email` (`email`(191)),
  ADD KEY `player_id` (`player_id`(191));

--
-- Indexes for table `client_locations`
--
ALTER TABLE `client_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_agree` (`admin_agree`),
  ADD KEY `active` (`active`),
  ADD KEY `minimum_orders` (`minimum_orders`);

--
-- Indexes for table `company_dates`
--
ALTER TABLE `company_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `days` (`days`(191)),
  ADD KEY `from_time` (`from_time`(191)),
  ADD KEY `to_time` (`to_time`(191));

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_status` (`reply_status`),
  ADD KEY `reply_by` (`reply_by`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `code` (`code`(191)),
  ADD KEY `percentage` (`percentage`),
  ADD KEY `date_to` (`date_to`),
  ADD KEY `date_from` (`date_from`);

--
-- Indexes for table `fixed_pages`
--
ALTER TABLE `fixed_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `title` (`title`(191));

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`(191),`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `representative_id` (`representative_id`),
  ADD KEY `payment_way` (`payment_way`),
  ADD KEY `status` (`status`),
  ADD KEY `who_cancel` (`who_cancel`),
  ADD KEY `rate` (`rate`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `type` (`type`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `after_discount` (`after_discount`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `normal` (`normal`),
  ADD KEY `mosque` (`mosque`),
  ADD KEY `offer` (`offer`),
  ADD KEY `hide` (`hide`),
  ADD KEY `kind` (`kind`);

--
-- Indexes for table `receivable_registers`
--
ALTER TABLE `receivable_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `mobile` (`mobile`(191)),
  ADD KEY `password` (`password`(191)),
  ADD KEY `user_name` (`user_name`(191)),
  ADD KEY `role` (`role`),
  ADD KEY `active` (`active`),
  ADD KEY `api_token` (`api_token`(191)),
  ADD KEY `player_id` (`player_id`(191));

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`(191));

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_value` (`add_value`),
  ADD KEY `commission_percentage` (`commission_percentage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city_companies`
--
ALTER TABLE `city_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `client_locations`
--
ALTER TABLE `client_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `company_dates`
--
ALTER TABLE `company_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fixed_pages`
--
ALTER TABLE `fixed_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `receivable_registers`
--
ALTER TABLE `receivable_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
