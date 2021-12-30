-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2021 at 02:19 AM
-- Server version: 5.7.35-cll-lve
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
-- Database: `mole_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_page`
--

CREATE TABLE `about_us_page` (
  `about_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_page`
--

INSERT INTO `about_us_page` (`about_id`, `title`, `description`, `image`) VALUES
(1, 'About us', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,\r\n\r\nquis nostrud exercitation ullamcorper suscipit lobortis nisl ut aliquip.', 'about-img.png');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_lane` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_status` int(11) NOT NULL DEFAULT '1',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `receiver_name`, `receiver_phone`, `city`, `address_lane`, `pincode`, `select_status`, `added_at`, `updated_at`) VALUES
(31, 32, 'test', '9865321245', 'testcity', 'ghhjyghjg', '123456', 1, '2021-07-09 07:30:32', '2021-07-10 13:21:01'),
(35, 7, 'fudfufug', '535657767686', 'hchchc', 'hccchc', '5544', 1, '2021-07-10 04:56:15', '2021-07-10 15:56:15'),
(36, 7, 'testing', '9865321245', 'testcity', 'dsfg', '454546', 0, '2021-07-19 08:59:39', '2021-07-19 07:29:39'),
(40, 33, 'yesraj', '456', 'mahidpur', 'ujjain indore dewas', '456010', 0, '2021-09-23 09:47:06', '2021-09-23 15:17:06'),
(41, 33, 'broth', '456', 'Indore', 'dsfsdfds', '21', 1, '2021-09-23 10:22:49', '2021-09-23 15:52:49'),
(47, 3, 'Arpit', '7974164002', 'Indore', 'Vijaynagar', '452001', 1, '2021-09-30 16:14:42', '2021-09-30 02:14:42'),
(48, 4, 'Arpit', '7974164002', 'Indore', 'Vijaynagar', '452001', 1, '2021-09-30 16:18:22', '2021-09-30 02:18:22'),
(49, 4, 'Ajay', '7974164002', 'Indore', 'Scheme53', '452001', 0, '2021-09-30 16:21:31', '2021-09-30 02:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$s/ZYAO5DYR7m1HA9T3AqFOS/NpihueXU0FglmvcMdwRAPqcvBexxm', 'images/admin/profile/27-05-21/270521105306am-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_payouts`
--

CREATE TABLE `admin_payouts` (
  `payout_id` int(11) NOT NULL,
  `payout_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respond_payout_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payout_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(100) NOT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_bannername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_name`, `ar_bannername`, `banner_image`, `status`) VALUES
(27, 'Banner F5', NULL, 'images/banner/300921073707am-baby2.jpg', 1),
(28, 'Main Banner', NULL, 'images/banner/290921094902am-slide-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `no_of_comments` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `no_of_comments`, `image`, `created_at`) VALUES
(1, 'UPON OF SEASONS EARTH DOMINION', 'Nascetur ridiculus mus upon of seasons earth dominion. Gathering brought light, creeping there saying. The lesser appear without very darkness seasons saw be. Dry cattle. Man very third.', 3, '6.png', '2021-09-15 12:10:42'),
(2, 'UPON OF SEASONS EARTH DOMINION', 'Nascetur ridiculus mus upon of seasons earth dominion. Gathering brought light, creeping there saying. The lesser appear without very darkness seasons saw be. Dry cattle. Man very third.', 2, '5.png', '2021-09-15 11:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `top` int(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `top`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Demo brand', 'uploads/brands/brand.jpg', 0, 'Demo-brand-12', 'Demo brand', NULL, '2019-03-12 06:05:56', '2020-10-09 18:58:38'),
(2, 'Demo brand1', 'uploads/brands/BTjcJfNvNQCer9HWpzP3jkxPcOngrWss5m6LghEc.jpeg', 0, 'Demo-brand1', 'Demo brand1', NULL, '2019-03-12 06:06:13', '2020-11-04 02:51:49'),
(3, 'saloon services', 'uploads/brands/Pt6WjE2iJo0Suv0lzQZCmIDfO4FciSmny1fU8adc.png', 0, 'saloon-services-jneC0', 'jsnjnsjns', 'cscsx', '2020-07-18 18:18:34', '2020-07-18 18:18:34'),
(4, 'saloon services', 'uploads/brands/MumYDZAnL3bj7xziXG0i6JDhGei284Z1cZlUN17H.png', 1, 'saloon-services-EIr93', 'jsnjnsjns', 'cscsx', '2020-07-18 18:18:34', '2020-10-09 18:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_for`
--

CREATE TABLE `cancel_for` (
  `res_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `order_id` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(200) NOT NULL,
  `store_id` int(200) NOT NULL,
  `store_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `product_id` int(200) NOT NULL,
  `variant_id` int(200) NOT NULL,
  `address_id` int(11) DEFAULT '0',
  `order_status` int(11) DEFAULT '0',
  `payment_method` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `qty`, `order_id`, `user_id`, `store_id`, `store_name`, `product_id`, `variant_id`, `address_id`, `order_status`, `payment_method`) VALUES
(65, 1, 'egRWQtbF28UMEjA', 4, 2, NULL, 59, 72, 48, 1, 'COD'),
(66, 1, 'egRWQtbF28UMEjA', 4, 2, NULL, 43, 57, 48, 1, 'COD'),
(67, 1, 'egRWQtbF28UMEjA', 4, 2, NULL, 27, 41, 48, 1, 'COD'),
(68, 1, 'egRWQtbF28UMEjA', 4, 2, NULL, 28, 42, 48, 1, 'COD'),
(69, 1, 'LCrFFIRhJpwOzeH', 4, 2, NULL, 25, 39, 0, 0, NULL),
(70, 1, 'LCrFFIRhJpwOzeH', 4, 2, NULL, 59, 72, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_rewards`
--

CREATE TABLE `cart_rewards` (
  `cart_rewards_id` int(11) NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rewards` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commision_rate` double(8,2) NOT NULL DEFAULT '0.00',
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  `top` int(1) NOT NULL DEFAULT '0' COMMENT 'active / inactive by vendor',
  `digital` int(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `ar_name`, `commision_rate`, `image`, `icon`, `featured`, `top`, `digital`, `slug`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Boy', 'صبي', 0.00, 'images/category/29-09-2021/boy.png', NULL, 0, 0, 0, NULL, NULL, NULL, 1, '2021-10-01 07:52:54', '2021-09-29 08:58:02'),
(19, 'Girl', 'بنت', 0.00, 'images/category/29-09-2021/girl.png', NULL, 0, 0, 0, NULL, NULL, NULL, 1, '2021-09-29 09:11:36', '2021-09-29 08:59:22'),
(20, 'Boys Shoes', 'أحذية الأولاد', 0.00, 'images/category/29-09-2021/boysShoes.jpg', NULL, 0, 0, 0, NULL, NULL, NULL, 1, '2021-09-29 09:11:34', '2021-09-29 09:09:03'),
(21, 'Girls Shoes', 'أحذية بنات', 0.00, 'images/category/29-09-2021/girlsShoes.jpg', NULL, 0, 0, 0, NULL, NULL, NULL, 1, '2021-09-29 09:11:38', '2021-09-29 09:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(100) NOT NULL,
  `city_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(20, 'Riyadh'),
(21, 'Jeddah'),
(22, 'Meccah'),
(25, 'Medina'),
(26, 'Saihat'),
(27, 'Indore'),
(28, 'Indore'),
(29, 'Bhopal');

-- --------------------------------------------------------

--
-- Table structure for table `closing_hours`
--

CREATE TABLE `closing_hours` (
  `closing_hrs_id` int(100) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_hrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_hrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `color_code`, `created_at`) VALUES
(1, 'blue', '	#0000FF', '2021-07-07 22:19:24'),
(2, 'RED', '#ff0000', '2021-07-19 01:13:17'),
(3, 'green', '#00ff00', '2021-08-19 13:25:29'),
(4, 'yellow', '#ffff00', '2021-08-19 13:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact_query`
--

CREATE TABLE `contact_query` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_query`
--

INSERT INTO `contact_query` (`id`, `name`, `email`, `mobile`, `query`, `created_at`) VALUES
(1, 'RAHUL UIKE', 'ruike732@gmail.com', '7389056727', 'I AM HERE', '2021-08-13 18:30:00'),
(2, 'sonu dada', 'ruike732@gmail.com', '7389056727', 'i am here', '2021-08-15 18:30:00'),
(3, 'index.html', 'ruike732@gmail.com', '0123456789', 'gg', '2021-08-24 18:30:00'),
(4, 'other', 'ruike732@gmail.com', '7389056727', 'hi i am rahul', '2021-09-21 18:30:00'),
(5, 'dgdfgd', 'ruike732@gmail.com', '1234567891', 'dfgryhfgh', '2021-09-22 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(100) NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_couponname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_coupondescription` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `cart_value` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `coupon_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses_restriction` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `ar_couponname`, `coupon_code`, `coupon_description`, `ar_coupondescription`, `start_date`, `end_date`, `cart_value`, `amount`, `type`, `status`, `coupon_img`, `uses_restriction`) VALUES
(13, 'Gift Coupen', 'Gift Coupen', '2HF66h', 'This is for gift coupen', 'This is for gift coupen', '2021-09-08 12:19:00', '2021-09-29 12:20:00', 200, 200, 'One Time', 1, 'images/coupon/29-09-2021/one.png', 9),
(14, 'Discount Coupens', 'Discount Coupens', 'KHJ&*HJ989', 'This is for various discounts', 'This is for various discounts', '2021-09-29 12:21:00', '2021-09-29 12:21:00', 150, 300, 'Discount Coupens', 1, 'images/coupon/29-09-2021/three.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_sign` char(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_sign`) VALUES
(1, 'KWD', 'KWD');

-- --------------------------------------------------------

--
-- Table structure for table `deal_product`
--

CREATE TABLE `deal_product` (
  `deal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deal_price` float NOT NULL,
  `deal_txt` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `deal_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_product`
--

INSERT INTO `deal_product` (`deal_id`, `product_id`, `deal_price`, `deal_txt`, `valid_from`, `valid_to`, `status`, `deal_img`) VALUES
(5, 32, 130, NULL, '2021-09-29 19:11:00', '2021-10-16 19:11:00', 1, 'images/product/30-09-2021/boy-shoe2.jpg'),
(6, 27, 110, NULL, '2021-09-17 19:09:00', '2021-10-20 19:09:00', 1, 'images/product/30-09-2021/polo-t-shirt-(1).jpg'),
(7, 30, 110, NULL, '2021-09-25 19:11:00', '2021-10-10 19:11:00', 1, 'images/product/30-09-2021/half-shirt-boys.jpg'),
(8, 23, 149, NULL, '2021-09-20 19:12:00', '2021-10-07 19:13:00', 1, 'images/product/30-09-2021/damage_boy_jeans-front1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `dboy_id` int(11) NOT NULL,
  `boy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boy_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boy_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boy_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_rating`
--

CREATE TABLE `delivery_rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dboy_id` int(11) DEFAULT NULL,
  `rating` float NOT NULL,
  `user_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fav_product`
--

CREATE TABLE `fav_product` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `fev_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fav_product`
--

INSERT INTO `fav_product` (`fav_id`, `user_id`, `product_id`, `fev_status`, `created_at`) VALUES
(1, 7, 1, 1, '2021-07-14 05:16:58'),
(2, 2, 1, 1, '2021-07-14 05:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `fcm`
--

CREATE TABLE `fcm` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_server_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_server_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fcm`
--

INSERT INTO `fcm` (`id`, `sender_id`, `server_key`, `store_server_key`, `driver_server_key`) VALUES
(1, '352076647507', 'AAAA0rxoFFo:APA91bFXJtWYD4Xg60_l7Ps4oMGwZBTtMslIwf7sgwEhifRHLui3LswSDI6xYEQsQvHiFdH_RGDcVysLFbBaFERuB75skBUml9pphJeRpJXhIplGymLqED8v19ku-zrfcJwBkoDOV1_j', 'AAAA0rxoFFo:APA91bFXJtWYD4Xg60_l7Ps4oMGwZBTtMslIwf7sgwEhifRHLui3LswSDI6xYEQsQvHiFdH_RGDcVysLFbBaFERuB75skBUml9pphJeRpJXhIplGymLqED8v19ku-zrfcJwBkoDOV1_j', 'AAAA_OuAkVA:APA91bGc5tYscBTXeF12jefqFxyO6Znwx9tUTRblvnwxZHLh_29cIooY_ZHwJFfJGCnVRD_fuNcV4_5sPogtzfdeXegWJ8iVFFYhh8FlT6vs2sN-LwPdMFzF-cR_sPbmluqi5p4OfBDM');

-- --------------------------------------------------------

--
-- Table structure for table `freedeliverycart`
--

CREATE TABLE `freedeliverycart` (
  `id` int(11) NOT NULL,
  `min_cart_value` float NOT NULL DEFAULT '0',
  `del_charge` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freedeliverycart`
--

INSERT INTO `freedeliverycart` (`id`, `min_cart_value`, `del_charge`) VALUES
(1, 301, 40);

-- --------------------------------------------------------

--
-- Table structure for table `gift_warp`
--

CREATE TABLE `gift_warp` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_warp`
--

INSERT INTO `gift_warp` (`id`, `value`) VALUES
(1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `global_product_settings`
--

CREATE TABLE `global_product_settings` (
  `id` int(11) NOT NULL,
  `cod_available` tinyint(1) NOT NULL,
  `return_days` int(11) NOT NULL,
  `loyalty_cash` varchar(50) NOT NULL,
  `tentative_delivery` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_product_settings`
--

INSERT INTO `global_product_settings` (`id`, `cod_available`, `return_days`, `loyalty_cash`, `tentative_delivery`) VALUES
(1, 1, 12, '60', '24 Hrs.');

-- --------------------------------------------------------

--
-- Table structure for table `listupload`
--

CREATE TABLE `listupload` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `path` varchar(800) NOT NULL,
  `status` varchar(50) NOT NULL,
  `arrivedat` varchar(50) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_phone` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listupload`
--

INSERT INTO `listupload` (`list_id`, `user_id`, `comment`, `path`, `status`, `arrivedat`, `user_name`, `user_phone`) VALUES
(27, 2031, 'jsjsj', 'images/listImages/20311599740592.jpg', 'pending', '10-09-20', 'Vinay Joshi', '7470691532'),
(26, 2031, 'jrr', 'images/listImages/20311599738042.jpg', 'pending', '10-09-20', 'Vinay Joshi', '7470691532'),
(23, 2031, 'hdh ji', 'images/listImages/20311599475198.jpg', 'pending', '07-09-20', 'Vinay Joshi', '7470691532'),
(24, 2027, 'gg', 'images/listImages/20271599475241.jpg', 'pending', '07-09-20', 'Yash Agrawal', '8358016611'),
(25, 2027, 'hi', 'images/listImages/20271599590205.jpg', 'pending', '09-09-20', 'yash agrawal', '8358016611'),
(22, 2027, 'hi order', 'images/listImages/20271599475155.jpg', 'pending', '07-09-20', 'Yash Agrawal', '8358016611'),
(21, 2027, 'hi order', 'images/listImages/20271599227059.jpg', 'pending', '04-09-20', 'yash agrawal', '8358016611'),
(28, 2027, 'dd', 'images/listImages/20271599748934.jpg', 'pending', '10-09-20', 'yash agrawal', '8358016611'),
(29, 2027, 'hi', 'images/listImages/20271599759360.jpg', 'pending', '10-09-20', 'Yash Agrawal', '8358016611');

-- --------------------------------------------------------

--
-- Table structure for table `map_api`
--

CREATE TABLE `map_api` (
  `id` int(11) NOT NULL,
  `map_api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_api`
--

INSERT INTO `map_api` (`id`, `map_api_key`) VALUES
(1, 'AIzaSyCvUOLCc-zyB_bQAg-HqNTGGFSt9808K2U');

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
-- Table structure for table `minimum_maximum_order_value`
--

CREATE TABLE `minimum_maximum_order_value` (
  `min_max_id` int(100) NOT NULL,
  `min_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minimum_maximum_order_value`
--

INSERT INTO `minimum_maximum_order_value` (`min_max_id`, `min_value`, `max_value`) VALUES
(1, '200', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `msg91`
--

CREATE TABLE `msg91` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msg91`
--

INSERT INTO `msg91` (`id`, `sender_id`, `api_key`, `active`) VALUES
(1, 'GOGRCK', '197064AVzt8vx5456d55f3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notificationby`
--

CREATE TABLE `notificationby` (
  `noti_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sms` int(11) NOT NULL,
  `app` int(11) NOT NULL,
  `email` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificationby`
--

INSERT INTO `notificationby` (`noti_id`, `user_id`, `sms`, `app`, `email`) VALUES
(2015, 2016, 1, 1, 1),
(2016, 2017, 1, 1, 1),
(2017, 2018, 1, 1, 1),
(2021, 2022, 1, 1, 1),
(2022, 2023, 1, 1, 1),
(2023, 2024, 0, 1, 1),
(2024, 2025, 1, 1, 1),
(2025, 2026, 1, 1, 1),
(2026, 2027, 1, 1, 1),
(2027, 2028, 1, 1, 1),
(2028, 2029, 1, 1, 1),
(2029, 2030, 1, 1, 1),
(2030, 2031, 1, 1, 1),
(2031, 2032, 1, 1, 1),
(2032, 2033, 1, 1, 1),
(2033, 2034, 1, 1, 1),
(2034, 2035, 0, 1, 0),
(2035, 2036, 1, 1, 1),
(2036, 2037, 1, 1, 1),
(2037, 2038, 1, 1, 1),
(2038, 2039, 1, 1, 1),
(2039, 2040, 1, 1, 1),
(2040, 2041, 1, 1, 1),
(2041, 2042, 1, 1, 1),
(2042, 2043, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` float NOT NULL DEFAULT '0',
  `price_without_delivery` float NOT NULL DEFAULT '0',
  `total_products_mrp` float NOT NULL DEFAULT '0',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_by_wallet` float NOT NULL DEFAULT '0',
  `rem_price` float NOT NULL DEFAULT '0',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` date DEFAULT NULL,
  `delivery_charge` float NOT NULL DEFAULT '0',
  `time_slot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dboy_id` int(11) NOT NULL DEFAULT '0',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `user_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cancelling_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` int(11) NOT NULL DEFAULT '0',
  `coupon_discount` float NOT NULL DEFAULT '0',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `cancel_by_store` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_via`
--

CREATE TABLE `payment_via` (
  `p_id` int(11) NOT NULL,
  `paypal` int(11) NOT NULL,
  `razorpay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_via`
--

INSERT INTO `payment_via` (`p_id`, `paypal`, `razorpay`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payout_requests`
--

CREATE TABLE `payout_requests` (
  `req_id` int(11) NOT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payout_amt` float NOT NULL,
  `req_date` date NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_req_valid`
--

CREATE TABLE `payout_req_valid` (
  `val_id` int(11) NOT NULL,
  `min_amt` int(11) NOT NULL,
  `min_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payout_req_valid`
--

INSERT INTO `payout_req_valid` (`val_id`, `min_amt`, `min_days`) VALUES
(1, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `privecypage`
--

CREATE TABLE `privecypage` (
  `about_id` int(11) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privecypage`
--

INSERT INTO `privecypage` (`about_id`, `title`, `description`) VALUES
(1, 'Privacy Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_by` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `photos` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_img` longtext COLLATE utf8_unicode_ci,
  `tags` mediumtext COLLATE utf8_unicode_ci,
  `brands` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `ar_description` text COLLATE utf8_unicode_ci,
  `product_info` text COLLATE utf8_unicode_ci,
  `ar_product_info` text COLLATE utf8_unicode_ci,
  `mrp_price` double(8,2) NOT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `ar_name`, `added_by`, `user_id`, `category_id`, `subcategory_id`, `photos`, `featured_img`, `tags`, `brands`, `description`, `ar_description`, `product_info`, `ar_product_info`, `mrp_price`, `purchase_price`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Damage Jeans', 'تلف الجينز', '2', NULL, 18, 5, 'images/product/30-09-2021/damage_boy_jeans-back1.jpg', 'images/product/29-09-2021/damage_boy_jeans-front1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li style=\"text-align: right; \">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></li></ul>', 220.00, 200.00, NULL, 1, '2021-09-29 10:42:53', '2021-09-29 10:42:53'),
(24, 'Plain Jeans', 'جينز عادي', '2', NULL, 18, 5, NULL, 'images/product/29-09-2021/plain_boy_jeans_front1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></li></ul>', 200.00, 150.00, NULL, 1, '2021-09-29 10:47:13', '2021-09-29 10:47:13'),
(25, 'Full Shirt', 'قميص كامل', '2', NULL, 18, 3, 'images/product/30-09-2021/boy-full-shirt-back1.jpg', 'images/product/29-09-2021/boy-full-shirt-front1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.<br></li></ul>', '<ul><li style=\"text-align: right; \">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></li></ul>', 175.00, 150.00, NULL, 1, '2021-09-29 10:58:04', '2021-09-29 10:58:04'),
(27, 'Polo T-Shirt', 'لعبة البولو قميص', '2', NULL, 18, 4, 'images/product/30-09-2021/polo-t-shirt-(2).jpg', 'images/product/29-09-2021/polo-t-shirt-(1).jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></li></ul>', 210.00, 189.00, NULL, 1, '2021-09-29 11:18:01', '2021-09-29 11:18:01'),
(28, 'round neck t-shirt', 'تي شيرت برقبة مستديرة', '2', NULL, 18, 4, 'images/product/29-09-2021/boy-t-shirt-back1.jpg', 'images/product/29-09-2021/boy-t-shirt-front1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', NULL, NULL, 220.00, 199.00, NULL, 1, '2021-09-29 11:21:56', '2021-09-29 11:21:56'),
(31, 'Boy Running Shoe', 'حذاء الجري الصبي', '2', NULL, 20, 6, 'images/product/30-09-2021/boy-shoes-back1.jpg', 'images/product/29-09-2021/boy-shoes1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li style=\"text-align: right; \">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.<br></li></ul>', 219.00, 199.00, NULL, 1, '2021-09-29 12:09:51', '2021-09-29 12:09:51'),
(32, 'LED Shoes', 'أحذية الصمام', '2', NULL, 20, 6, 'images/product/30-09-2021/boy-shoe-back2.jpg', 'images/product/29-09-2021/boy-shoe2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ol><li><b>it is sometimes known, is dummy text used in laying out print, graphic or web designs</b></li><li><b>it is sometimes known, is dummy text used in laying out print, graphic or web designs</b></li><li><b>it is sometimes known, is dummy text used in laying out print, graphic or web designs</b></li></ol>', '<ol><li><b>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</b></li><li><b>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</b></li><li><b>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></b></li></ol>', 240.00, 200.00, NULL, 1, '2021-09-29 12:14:15', '2021-09-29 12:14:15'),
(33, 'Casual Sandals', 'صنادل كاجوال', '2', NULL, 20, 7, 'images/product/30-09-2021/boy-Sandals-back1.jpg', 'images/product/29-09-2021/boy-Sandals1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li style=\"text-align: right; \">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right; \">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></li></ul>', 200.00, 189.00, NULL, 1, '2021-09-29 12:18:05', '2021-09-29 12:18:05'),
(34, 'Clog Sandal', 'كلوج صندل', '2', NULL, 20, 7, 'images/product/30-09-2021/boy-Sandals-back2.jpg', 'images/product/29-09-2021/boy-Sandals2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li style=\"text-align: right; \">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></li></ul>', 122.00, 99.00, NULL, 1, '2021-09-29 12:21:57', '2021-09-29 12:21:57'),
(38, 'Slipper Iaon', 'شبشب أيون', '2', NULL, 20, 8, NULL, 'images/product/29-09-2021/boy-Chapal1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<p>it is sometimes known</p>', '<p style=\"text-align: right; \">يُعرف أحيانًا</p>', 200.00, 159.00, NULL, 1, '2021-09-29 12:33:33', '2021-09-29 12:33:33'),
(39, 'Unisex Child Flip-Flop', 'فليب فلوب للجنسين للأطفال', '2', NULL, 20, 8, 'images/product/29-09-2021/boy-Slipper-back2.jpg', 'images/product/29-09-2021/boy-Slipper2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', NULL, NULL, 220.00, 199.00, NULL, 1, '2021-09-29 12:38:12', '2021-09-29 12:38:12'),
(40, 'Ventra Girl\'s Regular Top', 'بلوزة فنترا جيرل العادية', '2', NULL, 19, 9, 'images/product/29-09-2021/girl-top-back1.jpg', 'images/product/29-09-2021/girl-top1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', NULL, NULL, 200.00, 179.00, NULL, 1, '2021-09-29 13:01:27', '2021-09-29 13:01:27'),
(41, 'Cub McPaws Girls Stylish Top', 'توب شبل ماكباوز بناتي أنيق', '2', NULL, 19, 9, 'images/product/30-09-2021/girl-top-back2.jpg', 'images/product/29-09-2021/girl-top2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.<br></li></ul>', 150.00, 139.00, NULL, 1, '2021-09-29 13:05:08', '2021-09-29 13:05:08'),
(42, 'Polyester Cool Jeans', 'بوليستر كول جينز', '2', NULL, 19, 10, 'images/product/29-09-2021/girl-jeans-back1.jpg', 'images/product/29-09-2021/girl-jeans1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', NULL, NULL, 200.00, 189.00, NULL, 1, '2021-09-29 13:11:46', '2021-09-29 13:11:46'),
(43, 'Skinny Jeans', 'جينز نحيف', '2', NULL, 19, 10, 'images/product/29-09-2021/girl-jeans-back2.jpg', 'images/product/29-09-2021/girl-jeans2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', NULL, NULL, 230.00, 199.00, NULL, 1, '2021-09-29 13:13:18', '2021-09-29 13:13:18'),
(44, 'Skater Dress', 'فستان متزلج', '2', NULL, 19, 11, 'images/product/29-09-2021/Girl-Dress-back1.jpg', 'images/product/29-09-2021/Girl-Dress1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', NULL, NULL, 220.00, 199.00, NULL, 1, '2021-09-29 13:21:05', '2021-09-29 13:21:05'),
(47, 'Cotton Cut-Out Dress', 'فستان من القطن', '2', NULL, 19, 11, 'images/product/30-09-2021/girl-dress-back2.jpg', 'images/product/30-09-2021/girl-dress2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></li></ul>', '<ul><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.<br></li></ul>', 220.00, 198.00, NULL, 1, '2021-09-30 06:09:19', '2021-09-30 06:09:19'),
(48, 'Baby Girls\' Mary Jane Shoes', 'أحذية ماري جين للفتيات الصغيرات', '2', NULL, 21, 12, 'images/product/30-09-2021/girl-show-back1.jpg', 'images/product/30-09-2021/girl-show1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li></ul>', '<ul><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li></ul>', 215.00, 195.00, NULL, 1, '2021-09-30 06:23:50', '2021-09-30 06:23:50'),
(49, 'Girls LED Leight Walking Shoe', 'قاد الفتيات حذاء المشي لايت', '2', NULL, 0, 0, 'images/product/30-09-2021/girl-show-back2.jpg', 'images/product/30-09-2021/girl-show2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', NULL, NULL, 200.00, 175.00, NULL, 1, '2021-09-30 06:31:15', '2021-09-30 06:31:15'),
(51, 'Mary Jane Shoes Sandals', 'أحذية ماري جين الصنادل', '2', NULL, 21, 13, 'images/product/30-09-2021/girl-sandals-back1.jpg', 'images/product/30-09-2021/girl-sandals1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.<br></li></ul>', '<ul><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.<br></li></ul>', 250.00, 229.00, NULL, 1, '2021-09-30 06:59:00', '2021-09-30 06:59:00'),
(52, 'Booties for Baby Girls', 'الجوارب للفتيات الصغيرات', '2', NULL, 21, 13, 'images/product/30-09-2021/girl-Sandals-back2.jpg', 'images/product/30-09-2021/girl-Sandals2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.<br></li></ul>', '<ul><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.<br></li></ul>', 220.00, 199.00, NULL, 1, '2021-09-30 07:06:58', '2021-09-30 07:06:58'),
(53, 'flipflop for girls', 'فليب فلوب للبنات', '2', NULL, 21, 14, 'images/product/30-09-2021/girl-flip-flop-back1.jpg', 'images/product/30-09-2021/girl-flip-flop1.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', '<ul><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.</li><li>it is sometimes known, is dummy text used in laying out print, graphic or web designs.<br></li></ul>', '<ul><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.</li><li style=\"text-align: right;\">يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.<br></li></ul>', 220.00, 199.00, NULL, 1, '2021-09-30 07:15:28', '2021-09-30 07:15:28'),
(54, 'Walking Pair Fur Flipflops', 'فليب فلوبس زوج من الفرو', '2', NULL, 21, 14, 'images/product/30-09-2021/girl-flip-flop-back2.jpg', 'images/product/30-09-2021/girl-flip-flop2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', NULL, NULL, 249.00, 219.00, NULL, 1, '2021-09-30 07:20:28', '2021-09-30 07:20:28'),
(59, 'Girls LED Leight Walking Shoe', 'قاد الفتيات حذاء المشي لايت', '2', NULL, 21, 12, 'images/product/30-09-2021/girl-show-back2.jpg', 'images/product/30-09-2021/girl-show2.jpg', NULL, NULL, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', '<p>it is sometimes known, is dummy text used in laying out print, graphic or web designs<br></p>', '<p>يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب<br></p>', 34.00, 32.00, NULL, 1, '2021-09-30 12:01:30', '2021-09-30 12:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_varient`
--

CREATE TABLE `product_varient` (
  `varient_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_stock` int(11) DEFAULT '0',
  `en_description` longtext COLLATE utf8mb4_unicode_ci,
  `ar_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `varient_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` int(11) DEFAULT '1',
  `vstatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_varient`
--

INSERT INTO `product_varient` (`varient_id`, `product_id`, `mrp`, `price`, `color`, `size`, `current_stock`, `en_description`, `ar_description`, `varient_image`, `other_image`, `is_featured`, `vstatus`) VALUES
(37, 23, 220.00, 200.00, '4', '4', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/damage_boy_jeans-back1.jpg', 'images/product/29-09-2021/damage_boy_jeans-front1.jpg', 1, 1),
(38, 24, 200.00, 150.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/plain_boy_jeans_back1.jpg', 'images/product/29-09-2021/plain_boy_jeans_front1.jpg', 1, 1),
(39, 25, 175.00, 150.00, '1', '1', 16, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-full-shirt-back1.jpg', 'images/product/29-09-2021/boy-full-shirt-front1.jpg', 1, 1),
(41, 27, 210.00, 189.00, '3', '1', 19, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/polo-t-shirt-(2).jpg', 'images/product/29-09-2021/polo-t-shirt-(1).jpg', 1, 1),
(42, 28, 220.00, 199.00, '1', '1', 19, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-t-shirt-back1.jpg', 'images/product/29-09-2021/boy-t-shirt-front1.jpg', 1, 1),
(45, 31, 219.00, 199.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-shoes-back1.jpg', 'images/product/29-09-2021/boy-shoes1.jpg', 1, 1),
(46, 32, 240.00, 200.00, '4', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-shoe-back2.jpg', 'images/product/29-09-2021/boy-shoe2.jpg', 1, 1),
(47, 33, 200.00, 189.00, '3', '4', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-Sandals-back1.jpg', 'images/product/29-09-2021/boy-Sandals1.jpg', 1, 1),
(48, 34, 122.00, 99.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-Sandals-back2.jpg', 'images/product/29-09-2021/boy-Sandals2.jpg', 1, 1),
(52, 38, 200.00, 159.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-Chapal-back1.jpg', 'images/product/29-09-2021/boy-Chapal1.jpg', 1, 1),
(53, 39, 220.00, 199.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/boy-Slipper-back2.jpg', 'images/product/29-09-2021/boy-Slipper2.jpg', 1, 1),
(54, 40, 200.00, 179.00, '2', '1', 19, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/girl-top-back1.jpg', 'images/product/29-09-2021/girl-top1.jpg', 1, 1),
(55, 41, 150.00, 139.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/girl-top-back2.jpg', 'images/product/29-09-2021/girl-top2.jpg', 1, 1),
(56, 42, 200.00, 189.00, '3', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/girl-jeans-back1.jpg', 'images/product/29-09-2021/girl-jeans1.jpg', 1, 1),
(57, 43, 230.00, 199.00, '4', '2', 19, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/girl-jeans-back2.jpg', 'images/product/29-09-2021/girl-jeans2.jpg', 1, 1),
(58, 44, 220.00, 199.00, '1', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/29-09-2021/Girl-Dress-back1.jpg', 'images/product/29-09-2021/Girl-Dress1.jpg', 1, 1),
(61, 47, 220.00, 198.00, '2', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-dress-back2.jpg', 'images/product/30-09-2021/girl-dress2.jpg', 1, 1),
(62, 48, 215.00, 195.00, '1,2', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-show-back1.jpg', 'images/product/30-09-2021/girl-show1.jpg', 1, 1),
(63, 49, 200.00, 175.00, '1', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-show-back2.jpg', 'images/product/30-09-2021/girl-show2.jpg', 1, 1),
(65, 51, 250.00, 229.00, '1', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-sandals-back1.jpg', 'images/product/30-09-2021/girl-sandals1.jpg', 1, 1),
(66, 52, 220.00, 199.00, '1', '1', 20, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-Sandals-back2.jpg', 'images/product/30-09-2021/girl-Sandals2.jpg', 1, 1),
(67, 53, 220.00, 199.00, '1', '1', 17, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-flip-flop-back1.jpg', 'images/product/30-09-2021/girl-flip-flop1.jpg', 1, 1),
(68, 54, 249.00, 219.00, '3', '1', 17, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب.', 'images/product/30-09-2021/girl-flip-flop-back2.jpg', 'images/product/30-09-2021/girl-flip-flop2.jpg', 1, 1),
(72, 59, 34.00, 32.00, '1', '1', 19, 'it is sometimes known, is dummy text used in laying out print, graphic or web designs', 'يُعرف أحيانًا بأنه نص وهمي يستخدم في تصميمات الطباعة أو الرسومات أو الويب', 'images/product/30-09-2021/girl-show-back2.jpg', 'images/product/30-09-2021/girl-show2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_pharases`
--

CREATE TABLE `rating_pharases` (
  `id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_pharases`
--

INSERT INTO `rating_pharases` (`id`, `rating`, `text`) VALUES
(1, '1', 'Very Bad'),
(2, '1.5', 'Very Bad'),
(3, '2', 'Bad'),
(4, '2.5', 'Bad'),
(5, '3', 'Average'),
(6, '3.5', 'Good'),
(7, '4', 'Very Good'),
(8, '4.5', 'Awesome'),
(9, '5', 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `reedem_values`
--

CREATE TABLE `reedem_values` (
  `reedem_id` int(100) NOT NULL,
  `reward_point` int(100) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reedem_values`
--

INSERT INTO `reedem_values` (`reedem_id`, `reward_point`, `value`) VALUES
(1, 1, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `reward_points`
--

CREATE TABLE `reward_points` (
  `reward_id` int(100) NOT NULL,
  `min_cart_value` int(100) NOT NULL,
  `reward_point` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_points`
--

INSERT INTO `reward_points` (`reward_id`, `min_cart_value`, `reward_point`) VALUES
(1, 1080, 1),
(2, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `secondary_banner`
--

CREATE TABLE `secondary_banner` (
  `sec_banner_id` int(100) NOT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_banner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secondary_banner`
--

INSERT INTO `secondary_banner` (`sec_banner_id`, `banner_name`, `ar_banner_name`, `banner_image`) VALUES
(4, 'banner 3', NULL, 'images/banner/290921090550am-6.png'),
(7, 'test banner', NULL, 'images/banner/080721074026am-baeenn.png');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `created_at`) VALUES
(1, 'xl', '2021-07-07 23:13:46'),
(2, 'xxl', '2021-07-19 01:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `smsby`
--

CREATE TABLE `smsby` (
  `by_id` int(11) NOT NULL,
  `msg91` int(11) NOT NULL DEFAULT '1',
  `twilio` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smsby`
--

INSERT INTO `smsby` (`by_id`, `msg91`, `twilio`, `status`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE `society` (
  `society_id` int(100) NOT NULL,
  `society_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(100) NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_storename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_employee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_share` float NOT NULL DEFAULT '0',
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_range` float NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `ar_storename`, `employee_name`, `ar_employee_name`, `phone_number`, `city`, `admin_share`, `device_id`, `email`, `password`, `del_range`, `lat`, `lng`, `address`, `ar_address`, `status`) VALUES
(1, 'test', 'fdgdf', 'testing12', 'dsfgdfs', '3212457856', 'Riyadh', 3, NULL, 'vendor@gmail.com', '123456', 200, NULL, NULL, 'sadfsadf', 'sadfsdff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_bank`
--

CREATE TABLE `store_bank` (
  `ac_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `ac_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_earning`
--

CREATE TABLE `store_earning` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_notification`
--

CREATE TABLE `store_notification` (
  `not_id` int(11) NOT NULL,
  `not_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `read_by_store` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

CREATE TABLE `store_orders` (
  `store_order_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varient_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` float NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varient_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_mrp` float NOT NULL,
  `order_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_approval` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `p_id` int(11) NOT NULL,
  `varient_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_products`
--

INSERT INTO `store_products` (`p_id`, `varient_id`, `stock`, `store_id`) VALUES
(1, 16, 0, 2),
(2, 17, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `store_society`
--

CREATE TABLE `store_society` (
  `store_society_id` int(100) NOT NULL,
  `society_id` int(100) NOT NULL,
  `store_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `image`, `ar_name`, `category_id`, `slug`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Shirt', 'images/subcategory/29-09-2021/boys-shirts.png', 'قميص', 18, NULL, NULL, NULL, 1, '2021-09-29 09:47:05', '2021-09-29 09:47:05'),
(4, 'T-Shirt', 'images/subcategory/29-09-2021/t-shirt.webp', 'تي شيرت', 18, NULL, NULL, NULL, 1, '2021-09-29 09:48:59', '2021-09-29 09:48:59'),
(5, 'Jeans', 'images/subcategory/29-09-2021/boys-jeans.png', 'جينز', 18, NULL, NULL, NULL, 1, '2021-09-29 09:52:39', '2021-09-29 09:52:39'),
(6, 'Shoes', 'images/subcategory/29-09-2021/shoeOne1-(1).jpg', 'أحذية', 20, NULL, NULL, NULL, 1, '2021-09-29 11:33:34', '2021-09-29 11:33:34'),
(7, 'Sandals', 'images/subcategory/29-09-2021/boy-sandals.jpg', 'صنادل', 20, NULL, NULL, NULL, 1, '2021-09-29 11:36:12', '2021-09-29 11:36:12'),
(8, 'Flip-Flop', 'images/subcategory/30-09-2021/boy-chapal-(1).jpg', 'نعال الشاطئ', 20, NULL, NULL, NULL, 1, '2021-09-29 11:38:55', '2021-09-29 11:38:55'),
(9, 'Girl Top', 'images/subcategory/29-09-2021/girl-top.jpg', 'أعلى فتاة', 19, NULL, NULL, NULL, 1, '2021-09-29 12:59:34', '2021-09-29 12:59:34'),
(10, 'girl jeans', 'images/subcategory/29-09-2021/girl-jeans.jpg', 'جينز بناتي', 19, NULL, NULL, NULL, 1, '2021-09-29 13:07:27', '2021-09-29 13:07:27'),
(11, 'Girl Dress', 'images/subcategory/29-09-2021/Dress.jpg', 'فستان فتاة', 19, NULL, NULL, NULL, 1, '2021-09-29 13:17:03', '2021-09-29 13:17:03'),
(12, 'girl shoes', 'images/subcategory/30-09-2021/girl-shoes.jpg', 'حذاء بناتي', 21, NULL, NULL, NULL, 1, '2021-09-30 06:22:09', '2021-09-30 06:22:09'),
(13, 'girl sandals', 'images/subcategory/30-09-2021/girl-Sandals.jpg', 'صنادل للبنات', 21, NULL, NULL, NULL, 1, '2021-09-30 06:55:37', '2021-09-30 06:55:37'),
(14, 'girl flip-flop', 'images/subcategory/30-09-2021/girl-Flip-Flop.jpg', 'فتاة الوجه بالتخبط', 21, NULL, NULL, NULL, 1, '2021-09-30 07:09:36', '2021-09-30 07:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_setting`
--

CREATE TABLE `tbl_web_setting` (
  `set_id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_web_setting`
--

INSERT INTO `tbl_web_setting` (`set_id`, `icon`, `name`, `favicon`) VALUES
(1, 'images/app_logo/12-06-2021/logo.png', 'admin', 'images/app_logo/favicon/12-06-2021/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `termspage`
--

CREATE TABLE `termspage` (
  `terms_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termspage`
--

INSERT INTO `termspage` (`terms_id`, `title`, `description`) VALUES
(1, 'Terms & Condition', 'terms and condition test');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `time_slot_id` int(100) NOT NULL,
  `open_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`time_slot_id`, `open_hour`, `close_hour`, `time_slot`) VALUES
(1, '07:00', '22:00', 60);

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE `trial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trial`
--

INSERT INTO `trial` (`id`, `name`) VALUES
(0, ''),
(0, 'c'),
(0, 'd'),
(0, 'd'),
(0, 'c'),
(0, 'd'),
(2, 'c'),
(2, 'd'),
(21, 'c'),
(27, 'd'),
(47, 'c'),
(47, 'd'),
(48, 'c'),
(48, 'd'),
(1, 'c'),
(1, 'd'),
(33, 'c'),
(33, 'd'),
(36, 'c'),
(36, 'd'),
(10, 'c'),
(10, 'd'),
(42, 'd'),
(42, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `twilio`
--

CREATE TABLE `twilio` (
  `twilio_id` int(11) NOT NULL,
  `twilio_sid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twilio_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twilio_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `twilio`
--

INSERT INTO `twilio` (`twilio_id`, `twilio_sid`, `twilio_token`, `twilio_phone`, `active`) VALUES
(1, 'AC301fdc7bb65f1d359ba9217e2hjhjk', 'd6f8aa81a27981136a38c3562f885ad1', '+19169995023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `wallet` float NOT NULL DEFAULT '0',
  `is_verified` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rewards` int(11) NOT NULL DEFAULT '0',
  `device_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` int(11) NOT NULL DEFAULT '2',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `ar_username`, `child_name`, `user_phone`, `user_email`, `gender`, `device_id`, `user_image`, `user_password`, `dob`, `otp_value`, `status`, `wallet`, `is_verified`, `rewards`, `device_type`, `auth_token`, `block`, `reg_date`) VALUES
(2, 'admin', NULL, '', '9856451221', 'admin@admin.com', '', '', '', '$2y$10$WXteZJceZtak.mkhRhODB.xzZPp.oMbZJ140tCvm5LUmEdGlD9JM.', '', NULL, 1, 0, '', 0, '0', '', 2, '2021-07-06 21:47:31'),
(3, 'vinay', 'فيناي', 'test', '7470691532', 'vinay@gmail.com', 'male', 'sadfasdfsdhfklsadf;lksadjflkjsadlf', '', '123456', '22-09-1994', NULL, 1, 0, '1', 0, 'android', '', 2, '2021-07-07 07:54:31'),
(4, 'Arpit Soni', NULL, 'Dem', '7897897890', 'arpit@gmail.com', 'male', 'dFyMC97ZRTS8ezz17f34sf:APA91bHFed1kVd5St9-ZK6fMFg9KckpEd8dcR0mwGN6pO-qtD24URvC5xMie4MqS2w-c49mns-aaSWrrUhDTe0O5iqqKgSv48_JgsleywhazVyC01vUdLgiEpNi8izb6856a_9RD0pLH', 'images/user/011021070438user_image.png', '123456', '22-09-1994', '7336', 1, 0, '1', 0, 'android', '41gQaUjBIKYuKZPcUs2iCN6wHFOwPtOJ1lBvRfv1jPqRqJ3lrCOlN5547J1t', 2, '2021-07-07 11:47:32'),
(5, 'Arpit Soni', NULL, 'Demo', '1231231231', 'arpixt@gmail.com', 'male', 'dslkfldsjjkdscjhsdjjka545sfd', '', '123456', '22-09-1994', '7410', 1, 0, '1', 0, 'android', '', 2, '2021-07-07 11:50:45'),
(6, 'Arpit', 'اربيت', 'Arpit', '7974164002', 'arpitsoni@gmail.com', 'Male', 'android', '', '123456', '2021-07-05', '3261', 1, 0, '1', 0, 'dffff', 'ItjLGK3NKhRLTLWh1kV9Fz1dzT5s82s1EXOUIY9ScREyumDLkxH9i6IjUjYE', 1, '2021-07-08 09:58:46'),
(7, 'Arpit soni', 'اربيت', 'Arpit', '9879879879', 'soni@g.com', 'male', 'fQ1ei5CARi2m5QKeflKX_f:APA91bGCJRylrvqJy5311MZjYFRKK4HLHHaryyLVUfLMM5g2jkunyqEDGpkhqBbEFeXufgsbdPSWYXMxRV9OghICCErvCWbTCYb8MatrqTajNTxCTxEDvLRDdWCdC12-Rc6blWV1ELEE', 'images/user/190721124133user_image.png', '12345678', '1994-09-22', '6086', 1, 0, '1', 0, 'android', 'OQNOla2aejaZWM39B1n3F4Z8nMs5V3CpWBrVoP4cyQMytC1z892mKOncPv1X', 2, '2021-07-08 10:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `ar_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'android' COMMENT '0=admin,1=vendor,2=user',
  `otp_value` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `wallet` float DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '1' COMMENT '1=block,2=unblock',
  `image` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fev_icon` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `ar_name`, `gender`, `email`, `password`, `phone_no`, `user_type`, `otp_value`, `status`, `wallet`, `dob`, `device_type`, `is_verified`, `block`, `image`, `logo`, `fev_icon`, `remember_token`, `device_id`) VALUES
(1, '', '', '', NULL, NULL, '', '', '', '0', NULL, 0, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Mole Admin', '', '', 'مشرف النظام', NULL, 'admin@admin.com', '$2y$10$vlw.xsqDiEEcSKtZB1wKh.WF2uVVr3tfdCuYpHhILckavTPaz30bm', '9865321245', '0', NULL, 0, NULL, NULL, NULL, 0, 0, 'images/profile/mole-favicon.png', 'images/logo/logo.png', 'images/profile/mole-favicon.png', 'rUfrDUJSbv9THUSx7yo13CWLiGGogXkcr1P1q7HLFWvHKozMVqpUjJZbo8ox', NULL),
(3, 'vendor', '', '', NULL, NULL, 'vendor@vendor.com', '$2y$10$vlw.xsqDiEEcSKtZB1wKh.WF2uVVr3tfdCuYpHhILckavTPaz30bm', '9865321245', '1', NULL, 0, NULL, NULL, NULL, 0, 2, 'images/profile/1_1609749394max-rehkopf.png', 'images/logo/logo-(1).png', 'images/profile/globe-compass-logo.jpg', '4G195tWb70XkDC8rMR1jFbWge3OP1dHgv8BHD3n6bhLgp74iSWjKFAGfkyZq', NULL),
(4, 'testing12', '', '', 'testing12', NULL, 'vendor@gmail.com', '$2y$10$g996tFo248U3ioI7/ugAPufhUXtDpxJd.9X/twRLJhGRGckVT1Eve', '3212457856', '1', NULL, 0, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, 'mAgBVXvKuTGd6k5ZHdxCReJFzHqDtMXJK4JYDnl0yh4b8lcye91tZN0ten4t', NULL),
(5, 'Arpit', '', '', 'اربيت', NULL, 'arpitsoni@gmail.com', '$2y$10$JioWkuqcN5kZOXVXBPzVI.aBrHueF7gnJOrl1HKabPn.vOC2gGoAW', '7974164002', '2', NULL, 0, NULL, NULL, 'android', 0, 1, NULL, NULL, NULL, NULL, NULL),
(6, '', '', '', NULL, NULL, '', '', '', '0', NULL, 0, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(17, 'vinayjoshi', '', '', NULL, 'male', 'r@gmail.com', '$2y$10$iMNdW8gdWWCUPYL5wvCxGenQghNH5DjXDbqFk4DVKx5EZCgy0khii', '1234567890', 'android', NULL, 0, NULL, '0000-00-00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(18, 'manjusharma', '', '', NULL, 'female', 'ruike732@gmail.com', '$2y$10$vlw.xsqDiEEcSKtZB1wKh.WF2uVVr3tfdCuYpHhILckavTPaz30bm', '7389056727', 'android', '203312', 0, NULL, '0000-00-00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(19, 'yesyes', '', '', NULL, 'male', 'yes@gmail.com', '$2y$10$XGA.cNgYplY9PwTR5m8YW.5cv8HQqz2Fg9VGS64rAumRaN5PTxOCK', '7389056727', 'android', '241434', 0, NULL, '0000-00-00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(23, 'otheruser', '', '', NULL, 'male', 'other@gmail.com', '$2y$10$MLCCXwvBw.PaReyJBH1UZO8Xh8aeP/su1q/ieL2l07TQzk08FHJrG', '7389056727', 'android', NULL, 0, NULL, '0000-00-00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(32, 'newuser', '', '', NULL, 'male', 'new@gmail.com', '$2y$10$LOdUE4fFi2HE4M1A1QUBWOa..2KAyHS.VXA9BII7td//X00g2JH7.', '7389056727', 'android', NULL, 0, NULL, '0000-00-00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(33, 'baghsinghs', 'bagh', 'singhs', NULL, 'female', 'just@gmail.com', '$2y$10$Ik8eLyD.Htcrt.2uO3YoWOvu14/lX568GRx7WaLdr8vd6kJgVFmoa', '7389056727', 'android', NULL, 0, NULL, '2021-10-08', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(35, '', '', '', NULL, NULL, '', '', '', 'android', NULL, 0, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `noti_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `noti_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noti_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by_user` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`noti_id`, `user_id`, `noti_title`, `noti_message`, `read_by_user`, `created_at`) VALUES
(124, 2044, 'message', 'hello', 0, '2021-07-08 06:23:34'),
(125, 2053, 'message', 'hello', 0, '2021-07-08 06:23:34'),
(126, 2055, 'message', 'hello', 0, '2021-07-08 06:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recharge_history`
--

CREATE TABLE `wallet_recharge_history` (
  `wallet_recharge_history` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recharge_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `date_of_recharge` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_recharge_history`
--

INSERT INTO `wallet_recharge_history` (`wallet_recharge_history`, `user_id`, `recharge_status`, `amount`, `date_of_recharge`) VALUES
(1, 2027, 'success', 1, '2020-08-12'),
(2, 2026, 'failed', 500, '2020-08-15'),
(3, 2031, 'failed', 200, '2020-08-19'),
(4, 2030, 'failed', 1, '2020-08-20'),
(5, 2030, 'failed', 1, '2020-08-20'),
(6, 2031, 'success', 1, '2020-08-20'),
(7, 2035, 'failed', 10000, '2020-09-04'),
(8, 2027, 'success', 1, '2020-09-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_page`
--
ALTER TABLE `about_us_page`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_payouts`
--
ALTER TABLE `admin_payouts`
  ADD PRIMARY KEY (`payout_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_for`
--
ALTER TABLE `cancel_for`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart_rewards`
--
ALTER TABLE `cart_rewards`
  ADD PRIMARY KEY (`cart_rewards_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `closing_hours`
--
ALTER TABLE `closing_hours`
  ADD PRIMARY KEY (`closing_hrs_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `contact_query`
--
ALTER TABLE `contact_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_product`
--
ALTER TABLE `deal_product`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`dboy_id`);

--
-- Indexes for table `delivery_rating`
--
ALTER TABLE `delivery_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav_product`
--
ALTER TABLE `fav_product`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `fcm`
--
ALTER TABLE `fcm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freedeliverycart`
--
ALTER TABLE `freedeliverycart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_warp`
--
ALTER TABLE `gift_warp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_product_settings`
--
ALTER TABLE `global_product_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listupload`
--
ALTER TABLE `listupload`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `map_api`
--
ALTER TABLE `map_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minimum_maximum_order_value`
--
ALTER TABLE `minimum_maximum_order_value`
  ADD PRIMARY KEY (`min_max_id`);

--
-- Indexes for table `msg91`
--
ALTER TABLE `msg91`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationby`
--
ALTER TABLE `notificationby`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payment_via`
--
ALTER TABLE `payment_via`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `payout_requests`
--
ALTER TABLE `payout_requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `payout_req_valid`
--
ALTER TABLE `payout_req_valid`
  ADD PRIMARY KEY (`val_id`);

--
-- Indexes for table `privecypage`
--
ALTER TABLE `privecypage`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_varient`
--
ALTER TABLE `product_varient`
  ADD PRIMARY KEY (`varient_id`);

--
-- Indexes for table `rating_pharases`
--
ALTER TABLE `rating_pharases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reedem_values`
--
ALTER TABLE `reedem_values`
  ADD PRIMARY KEY (`reedem_id`);

--
-- Indexes for table `reward_points`
--
ALTER TABLE `reward_points`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `secondary_banner`
--
ALTER TABLE `secondary_banner`
  ADD PRIMARY KEY (`sec_banner_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `smsby`
--
ALTER TABLE `smsby`
  ADD PRIMARY KEY (`by_id`);

--
-- Indexes for table `society`
--
ALTER TABLE `society`
  ADD PRIMARY KEY (`society_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_bank`
--
ALTER TABLE `store_bank`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `store_earning`
--
ALTER TABLE `store_earning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_notification`
--
ALTER TABLE `store_notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`store_order_id`);

--
-- Indexes for table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `store_society`
--
ALTER TABLE `store_society`
  ADD PRIMARY KEY (`store_society_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `tbl_web_setting`
--
ALTER TABLE `tbl_web_setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `termspage`
--
ALTER TABLE `termspage`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`time_slot_id`);

--
-- Indexes for table `twilio`
--
ALTER TABLE `twilio`
  ADD PRIMARY KEY (`twilio_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  ADD PRIMARY KEY (`wallet_recharge_history`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_page`
--
ALTER TABLE `about_us_page`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_payouts`
--
ALTER TABLE `admin_payouts`
  MODIFY `payout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancel_for`
--
ALTER TABLE `cancel_for`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `cart_rewards`
--
ALTER TABLE `cart_rewards`
  MODIFY `cart_rewards_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `closing_hours`
--
ALTER TABLE `closing_hours`
  MODIFY `closing_hrs_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_query`
--
ALTER TABLE `contact_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deal_product`
--
ALTER TABLE `deal_product`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `dboy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_rating`
--
ALTER TABLE `delivery_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fav_product`
--
ALTER TABLE `fav_product`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fcm`
--
ALTER TABLE `fcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freedeliverycart`
--
ALTER TABLE `freedeliverycart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_warp`
--
ALTER TABLE `gift_warp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_product_settings`
--
ALTER TABLE `global_product_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listupload`
--
ALTER TABLE `listupload`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `map_api`
--
ALTER TABLE `map_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minimum_maximum_order_value`
--
ALTER TABLE `minimum_maximum_order_value`
  MODIFY `min_max_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `msg91`
--
ALTER TABLE `msg91`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notificationby`
--
ALTER TABLE `notificationby`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2043;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_via`
--
ALTER TABLE `payment_via`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payout_requests`
--
ALTER TABLE `payout_requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payout_req_valid`
--
ALTER TABLE `payout_req_valid`
  MODIFY `val_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privecypage`
--
ALTER TABLE `privecypage`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_varient`
--
ALTER TABLE `product_varient`
  MODIFY `varient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `rating_pharases`
--
ALTER TABLE `rating_pharases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reedem_values`
--
ALTER TABLE `reedem_values`
  MODIFY `reedem_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reward_points`
--
ALTER TABLE `reward_points`
  MODIFY `reward_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `secondary_banner`
--
ALTER TABLE `secondary_banner`
  MODIFY `sec_banner_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smsby`
--
ALTER TABLE `smsby`
  MODIFY `by_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `society`
--
ALTER TABLE `society`
  MODIFY `society_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_bank`
--
ALTER TABLE `store_bank`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_earning`
--
ALTER TABLE `store_earning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_notification`
--
ALTER TABLE `store_notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `store_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
