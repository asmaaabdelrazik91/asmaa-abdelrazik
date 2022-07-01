-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 01:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `bulding` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `note` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `bulding`, `floor`, `flat`, `note`, `user_id`, `region_id`, `created_at`, `updated_at`) VALUES
(2, 'abou horaira', 'el fordoos', 'fifth', 'six', '', 11, 1, '2022-06-26 16:03:28', NULL),
(3, 'abou horaira', 'el fordoos', 'fifth', 'six', '', 11, 1, '2022-06-26 16:03:30', NULL),
(4, 'tarah', 'eskan', 'fourth', 'seven', '', 19, 4, '2022-06-26 16:04:24', NULL),
(5, 'tarah', 'eskan', 'fourth', 'seven', '', 19, 4, '2022-06-26 16:04:27', NULL),
(6, 'fox', 'zohhor', 'second', 'second', '', 12, 2, '2022-06-26 16:05:24', NULL),
(7, 'fox', 'zohhor', 'second', 'second', '', 12, 2, '2022-06-26 16:05:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL COMMENT 'm=male,\r\nf=female',
  `phone` int(11) UNSIGNED DEFAULT NULL,
  `verification_code` int(6) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `gender`, `phone`, `verification_code`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asmaa', 'asd@yahoo.com', '$2y$10$cbB0UtPzO37e8m1DaD/Syey13i/Xl8lvkLqQKawDFSpbBx7.GMXg2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-30 19:40:02', '2022-06-30 19:40:02'),
(2, 'ahmed', 'ahmed@yahoo.com', '$2y$10$BoyuD8ZXA1OfDOmg3CLipO5ddd036UUGlkrQo1GXauQVsoiQ8oaMO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-30 20:01:23', '2022-06-30 20:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(35) NOT NULL,
  `name_ar` varchar(35) NOT NULL,
  `image` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'سامسونج', 'samsung.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(2, 'DELL', 'ديل', 'dell.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(3, 'Lenovo', 'لينوفو', 'lenovo.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(4, 'apple', 'ابل', 'apple.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(5, 'oppo', 'oppo', 'oppo.png', 1, '2021-11-24 02:57:47', '2021-11-24 02:57:47'),
(6, 'lg', 'lg', 'lg.png', 1, '2021-11-24 02:57:47', '2021-11-24 02:57:47'),
(7, 'HP', 'HP', 'hp.png', 1, '2022-02-23 07:24:06', '2022-02-23 07:24:06'),
(8, 'ASUS', 'ASUS', 'asus.png', 1, '2022-02-23 07:24:06', '2022-02-23 07:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` longtext NOT NULL,
  `name_ar` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=> active , 0=>noy active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'electorinics', 'ادوات كهربائية', 'default.png', 1, '2021-11-17 08:05:23', '2021-11-17 08:10:48'),
(2, 'kitchen', 'مطبخ', 'default.png', 1, '2021-11-18 07:54:51', '2021-11-18 07:54:51'),
(3, 'supermarket', 'سوبرماركت', 'default.png', 1, '2022-02-23 05:26:47', '2022-02-23 05:26:47'),
(4, 'fashion', 'موضة وازياء', 'default.png', 1, '2022-02-23 05:26:47', '2022-02-23 05:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=>no delivery for it ,\r\n1=>delivery for it',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ismalia', 'اسماعيلية', 1, '2022-06-26 15:56:55', NULL),
(2, 'cairo', 'القاهره', 1, '2022-06-26 15:56:55', NULL),
(3, 'alex', 'الاسكندرية', 1, '2022-06-26 15:58:09', NULL),
(4, 'PortSaid', 'بورسعيد', 1, '2022-06-26 15:58:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(7,2) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `max_discount_value` decimal(7,2) NOT NULL,
  `mini_order_price` decimal(7,2) NOT NULL,
  `max_number_of_usage` tinyint(9) UNSIGNED NOT NULL,
  `number_of_usage_per_user` tinyint(9) UNSIGNED NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date_time` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `discount_type`, `max_discount_value`, `mini_order_price`, `max_number_of_usage`, `number_of_usage_per_user`, `start_date_time`, `end_date_time`, `created_at`, `updated_at`) VALUES
(1, 10000, '0.20', '%', '0.20', '200.00', 1, 1, '2022-06-26 16:07:01', '0000-00-00', '2022-06-26 16:07:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(1000) NOT NULL,
  `title_ar` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discount` decimal(7,2) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `start_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer_product`
--

CREATE TABLE `offer_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=>pending,\r\n1=>in progress ,\r\n3=>delivered',
  `delivered_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `status`, `delivered_at`, `cancelled_at`, `coupon_id`, `address_id`, `created_at`, `updated_at`) VALUES
(1, '100.00', 1, '2022-06-26 16:07:52', NULL, 1, 2, '2022-06-26 16:07:52', NULL),
(2, '100.00', 1, '2022-06-26 16:07:54', NULL, 1, 2, '2022-06-26 16:07:54', NULL),
(3, '400.00', 1, '2022-06-26 16:08:16', NULL, 1, 6, '2022-06-26 16:08:16', NULL),
(4, '400.00', 1, '2022-06-26 16:08:18', NULL, 1, 6, '2022-06-26 16:08:18', NULL),
(5, '500.00', 1, '2022-06-26 16:08:38', NULL, 1, 5, '2022-06-26 16:08:38', NULL),
(6, '500.00', 1, '2022-06-26 16:08:41', NULL, 1, 5, '2022-06-26 16:08:41', NULL),
(7, '250.00', 1, '2022-06-26 16:09:06', NULL, 1, 7, '2022-06-26 16:09:06', NULL),
(8, '250.00', 1, '2022-06-26 16:09:09', NULL, 1, 7, '2022-06-26 16:09:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price_total` decimal(7,0) NOT NULL,
  `quantity` bigint(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`product_id`, `order_id`, `price_total`, `quantity`) VALUES
(3, 1, '5000', 1),
(3, 2, '5000', 2),
(4, 1, '30000', 2),
(4, 3, '30000', 4),
(4, 4, '30000', 1),
(5, 1, '30000', 1),
(5, 2, '3000', 5),
(5, 4, '3000', 5),
(6, 1, '13000', 2),
(6, 2, '13000', 4),
(6, 3, '13000', 3),
(6, 5, '13000', 2),
(8, 2, '17000', 1),
(11, 4, '20', 10),
(14, 1, '5000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` longtext NOT NULL,
  `name_ar` longtext NOT NULL,
  `code` int(6) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '2=>active , \r\n1 =>not active',
  `price` decimal(7,2) UNSIGNED NOT NULL,
  `quantity` smallint(3) UNSIGNED NOT NULL DEFAULT 1,
  `desc_en` longtext DEFAULT NULL,
  `desc_ar` longtext DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `code`, `image`, `status`, `price`, `quantity`, `desc_en`, `desc_ar`, `brand_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'laptop', 'لابتوب', 456987, 'dell.jpg', 2, '250.00', 1, 'asddd', 'weeenbh', 1, 1, '2021-11-18 05:13:16', '2022-06-30 22:49:34'),
(3, 'tv 55 inch', 'tv 55 inch', 0, 'tv55.jpg', 1, '10000.00', 1, 'asddd', 'weeenbh', 1, 4, '2021-11-18 05:13:16', '2022-06-25 15:27:55'),
(4, 'MacBook PRo', 'MacBook PRo', 107482, 'mac.jpg', 1, '40000.00', 2, 'asddd', 'weeenbh', 4, 1, '2021-09-22 00:07:40', '2022-06-29 14:07:26'),
(5, 's21', 's21', 0, 's21.jpg', 1, '15000.00', 10, 'asddd', 'weeenbh', 1, 2, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(6, 'iphone 13', 'iphone 13', 0, 'iphone13.jpg', 1, '25000.00', 20, 'asddd', 'weeenbh', 4, 2, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(8, 'Dell Laptop', 'Dell Laptop', 0, 'dell.jpg', 1, '20000.00', 0, 'asddd', 'weeenbh', 2, 1, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(9, 'Lg TV', 'Lg TV', 0, 'lg.jpg', 1, '12000.00', 3, 'asddd', 'weeenbh', 6, 4, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(10, 'Samsung Tv', 'Samsung Tv', 0, 'samsung.jpg', 1, '15000.00', 7, 'asddd', 'weeenbh', 1, 4, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(11, 'Chepsi', 'Chepsi', 0, 'chepsi.jpg', 1, '10.00', 0, 'asddd', 'weeenbh', NULL, 5, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(12, 'samsung a70', 'سامسونج 70', 0, 'a50.jpg', 1, '2500.00', 5, 'asddd', 'weeenbh', 1, 2, '2021-11-29 02:21:36', '2022-06-25 15:27:55'),
(13, 'feta cheese', 'جبنة فيتا', 0, 'feta.png', 1, '5.00', 100, 'asddd', 'weeenbh', NULL, 7, '2022-02-23 05:11:17', '2022-06-25 15:27:55'),
(14, 'Reno 6', 'Reno 6', 0, 'reno.jpg', 1, '10000.00', 5, 'asddd', 'weeenbh', 5, 2, '2021-09-22 00:07:40', '2022-06-25 15:27:55'),
(15, 'iphone 12', 'ايفون 12', 0, 'wE9muBHc7CVksrNirtjsrJyrLnY5h8wqJwQawtxP.png', 2, '15000.00', 2, 'dggf', 'تاتاات', 4, 2, '2022-06-28 22:20:21', NULL),
(16, 'dell laptop', 'لاب توب ديل', 0, 'tOovxZHMiawtK1kU5O4xGi8r9LCxqFxIFR0pLNCB.jpg', 2, '20000.00', 1, 'delll', 'ديل', 2, 1, '2022-06-28 22:32:44', NULL),
(17, 'iphone se', 'ايفون se', 666666, 'wK45KfuHsYjCBjW1NGKs9CHbjM74lZlC1ALxacbH.png', 1, '10000.00', 1, 'adsgdg', 'jhujyu', 4, 2, '2022-06-28 22:52:47', NULL),
(18, 'iphone 12', 'ايفون 12', 555555, 'RKQTEWTj9ojiWx8B8eSR75V2fEn72B10KTp1qpt3.png', 2, '12000.00', 1, 'jhh', 'hhh', 4, 2, '2022-06-28 23:38:05', NULL),
(19, 'iphone 12', 'ايفون 12', 124578, 'MTh1QPpplfcUyg18OnlIKozY0Zg5SKNpY0oVnmWj.png', 2, '15000.00', 1, 'gggg', 'ddd', 4, 2, '2022-06-29 11:51:23', NULL),
(20, 'iphone 11', 'ايفون 11', 589674, 'TEfVsvjxgSB74ty2X92CHQdSFKlP3Ssq1NtF53ZB.png', 2, '10000.00', 1, 'ssdd', 'ddddd', 4, 2, '2022-06-29 11:59:50', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_details`
-- (See below for the actual view)
--
CREATE TABLE `product_details` (
`id` bigint(20) unsigned
,`name_en` longtext
,`name_ar` longtext
,`image` varchar(255)
,`status` tinyint(1)
,`price` decimal(7,2) unsigned
,`code` int(6) unsigned
,`quantity` smallint(3) unsigned
,`desc_en` longtext
,`desc_ar` longtext
,`brand_id` bigint(20) unsigned
,`subcategory_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`subcategory_name_en` varchar(255)
,`brand_name_en` varchar(35)
,`category_id` bigint(20) unsigned
,`category_name` longtext
,`reviews_count` bigint(21)
,`Name_exp_20` decimal(4,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=>no delivery for it ,\r\n1=>delivery for it',
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`, `city_id`, `created_at`, `updated_at`) VALUES
(1, '24-october', '24 اكتوبر', 1, 1, '2022-06-26 16:00:22', NULL),
(2, '24-october', '24 اكتوبر', 1, 1, '2022-06-26 16:00:24', NULL),
(3, 'elramel-station', 'محطة الرمل', 1, 3, '2022-06-26 16:01:01', NULL),
(4, 'tarah el bahr', 'طرح البحر', 1, 4, '2022-06-26 16:02:30', NULL),
(5, 'tarah el bahr', 'طرح البحر', 1, 4, '2022-06-26 16:02:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`product_id`, `user_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(8, 11, 1, 'good', '2022-06-26 02:09:44', NULL),
(9, 14, 3, 'very good', '2022-06-26 02:11:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcatecories`
--

CREATE TABLE `subcatecories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcatecories`
--

INSERT INTO `subcatecories` (`id`, `name_en`, `name_ar`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'laptops', 'لابتوبات', 'default.png', 1, 1, '2021-11-18 07:09:38', '2022-06-22 08:50:00'),
(2, 'mobiles', 'موبايلات', 'default.png', 1, 1, '2021-11-18 07:09:38', '2022-06-22 08:50:02'),
(3, 'desktop', 'كمبيوتر', 'default.png', 1, 1, '2021-11-18 07:09:38', '2022-06-22 08:50:03'),
(4, 'tv', 'تلفزيونات', 'default.png', 1, 1, '2021-11-18 07:13:41', '2022-06-22 08:50:04'),
(5, 'chepsi', 'شيبسي', 'default.png', 1, 3, '2021-11-24 02:56:26', '2022-06-22 08:50:06'),
(6, 'makeup', 'ادوات تجميل', '1.png', 1, 4, '2022-02-23 05:28:06', '2022-06-22 08:50:07'),
(7, 'cheese', 'جبن', 'cheese.png', 1, 3, '2022-02-23 07:11:01', '2022-06-22 08:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(15) UNSIGNED NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1=>male ,\r\n2=>female',
  `image` varchar(256) DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL COMMENT '0=>blocked,\r\n1=>pan,\r\n1=>active',
  `verfication_code` int(6) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`, `image`, `status`, `verfication_code`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(11, 'asmaa', 'abdelrazik', 'asmaaabdelrazik7@icloud.com', '$2y$10$UCf4wHLcxCDbg0KIrk75QO1HPl445OTnk8O88Quui8bGrHtHCc1wW', 1115512493, 2, 'default.png', 0, 788007, '2022-06-23 17:36:50', '2022-06-21 21:46:42', '2022-06-26 20:49:51'),
(12, 'ahmed', 'taha', 'ahmed@icloud.com', '$2y$10$9g3s00bPi5jrZK05C5ULLuJcFkRjZln3Tun7BetKDoiBR6jmvCivS', 1254554677, 1, 'default.png', 0, 458787, NULL, '2022-06-21 21:49:25', NULL),
(13, 'mohamed', 'ahmed', 'azx@gmail.com', '$2y$10$OuA048qDnj4OHr/w9wvt9u7pWb0KQP0JjBhBX7JBhPgFMopbwXZum', 1200000000, 1, 'default.png', 0, 760577, NULL, '2022-06-22 13:21:32', NULL),
(14, 'marawan', 'ahmed', 'axsd@gmail.com', '$2y$10$9yude6g/bAOE7rJd2BThKe1xac79Kok85G4SdlbLRhuTO3Jc7kCie', 100000000, 1, 'default.png', 0, 213794, NULL, '2022-06-22 17:01:53', NULL),
(18, 'youssef', 'ahmed', 'qwer@gmail.com', '$2y$10$x5pPQMWpMu1vPBSSaPdnOO1hKdq9Ti4nw5q3NnDrHlqBe9VFI4Q0e', 123456789, 1, 'default.png', 0, 0, '2022-06-22 22:11:36', '2022-06-22 17:19:55', '2022-06-22 23:52:33'),
(19, 'alaa', 'abdelrazik', 'alaa@gmail.com', '$2y$10$w5vH0xDDgvAJffxgj0qXG.0sWgMiaIycaKc.UYoWa.n3UhWob/P2u', 1233232322, 2, 'default.png', 0, 457583, '2022-06-23 00:06:16', '2022-06-23 00:05:42', '2022-06-23 00:06:16'),
(20, 'osama', 'abdelrazik', 'osama@gmail.com', '$2y$10$pkYXrtGh0cfNN4S59kghIuV4m87kGvFh/p/6PiuvVMtUoG8bUCGp.', 1111111111, 1, 'default.png', 0, 841313, NULL, '2022-06-23 18:42:14', NULL),
(21, 'osama', 'abdelrazik', 'osamaaaa@gmail.com', '$2y$10$H5TD4xqotYQzRit0NA0Ble65X2mP897eGsW7roCgm7KJgtLQl1u6.', 1114119901, 1, 'default.png', 0, 311111, NULL, '2022-06-23 18:43:59', NULL),
(22, 'osama', 'abdelrazik', 'yyyy@gmail.com', '$2y$10$.GxOFMZaZ0bob9Pfen9yLeJSJez3gxyX5Xc9L5WedhF2GLMUU6kti', 1255441236, 1, 'default.png', 0, 419633, '2022-06-23 18:52:17', '2022-06-23 18:51:35', '2022-06-23 18:52:17'),
(27, 'noha', 'mohamed', 'noha@gmail.com', '$2y$10$8i/xB6chYqRFwSeMLMXcZu/GdZhCgqpsOJWayTu4ZXr2gKf18sOtO', 1111554488, 2, 'default.png', 0, 529717, '2022-06-25 00:31:35', '2022-06-25 00:31:15', '2022-06-25 00:49:29');

-- --------------------------------------------------------

--
-- Structure for view `product_details`
--
DROP TABLE IF EXISTS `product_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_details`  AS   (select `products`.`id` AS `id`,`products`.`name_en` AS `name_en`,`products`.`name_ar` AS `name_ar`,`products`.`image` AS `image`,`products`.`status` AS `status`,`products`.`price` AS `price`,`products`.`code` AS `code`,`products`.`quantity` AS `quantity`,`products`.`desc_en` AS `desc_en`,`products`.`desc_ar` AS `desc_ar`,`products`.`brand_id` AS `brand_id`,`products`.`subcategory_id` AS `subcategory_id`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`subcatecories`.`name_en` AS `subcategory_name_en`,`brands`.`name_en` AS `brand_name_en`,`categories`.`id` AS `category_id`,`categories`.`name_en` AS `category_name`,count(`reviews`.`product_id`) AS `reviews_count`,round(if(avg(`reviews`.`rate`) is null,0,avg(`reviews`.`rate`)),0) AS `Name_exp_20` from ((((`products` left join `brands` on(`brands`.`id` = `products`.`brand_id`)) left join `subcatecories` on(`subcatecories`.`id` = `products`.`subcategory_id`)) left join `categories` on(`categories`.`id` = `subcatecories`.`category_id`)) left join `reviews` on(`products`.`id` = `reviews`.`product_id`)) where `products`.`status` = 1 group by `products`.`id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `addresses_ibfk_2` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `carts_ibfk_2` (`user_id`);

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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `favs_ibfk_2` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD PRIMARY KEY (`product_id`,`offer_id`),
  ADD KEY `offer_product_ibfk_1` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_product_ibfk_1` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `reviews_ibfk_1` (`user_id`);

--
-- Indexes for table `subcatecories`
--
ALTER TABLE `subcatecories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category.id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcatecories`
--
ALTER TABLE `subcatecories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `favs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD CONSTRAINT `offer_product_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcatecories` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcatecories`
--
ALTER TABLE `subcatecories`
  ADD CONSTRAINT `subcatecories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
