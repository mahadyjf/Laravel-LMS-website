-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 03:56 AM
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
-- Database: `laravel-portfolio-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_mobile`, `contact_email`, `contact_message`) VALUES
(3, 'Mahady Jaman', '01951614333', 'mahady@gmail.com', '@hello World');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_totalenroll`, `course_totalclass`, `course_link`, `course_img`) VALUES
(1, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(2, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(7, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(8, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(11, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(12, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(13, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(14, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(15, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(17, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(18, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(19, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(20, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(21, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(22, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(23, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(24, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(25, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(26, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg'),
(27, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(28, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/android.jpg'),
(29, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'কোর্স ফি: 1000/-', 'মোট শিক্ষার্থি: 300 জন', 'মোট ক্লাস 120 টি', 'http://localhost:5000/', 'http://localhost/images/react.jpg');

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
(2, '2022_02_05_051042_visitors_table', 1),
(3, '2022_02_05_091152_service_table', 2),
(4, '2022_02_07_085129_create__courses_table', 3),
(5, '2022_02_08_093412_project_table', 4),
(6, '2022_02_09_021229_create_contacts_table', 5),
(7, '2022_02_09_045245_create_reviews_table', 6),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(13, '2022_02_12_064607_create_seos_table', 8);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `location`) VALUES
(110, '127.0.0.1:8000/storage/MMiAii8BQRlIhppn34GkjkjrvMY1doaEobpwPbpY.jpg'),
(111, '127.0.0.1:8000/storage/YdttKVfsz914Yf9I3tjmCMEaQ9zeLyvtZZxaXfHM.jpg'),
(112, '127.0.0.1:8000/storage/H3aYPnoTECI7MBU391fmiKieRSnmEmDCmXNg6Fq6.jpg'),
(113, '127.0.0.1:8000/storage/a7jKTDlsPBP8r8nYFRfxu9mmnA3J1nKumpR7RTmi.jpg'),
(114, '127.0.0.1:8000/storage/z3KvfHALaRMNtqyUUyOJW5JJLQkTccu98ikOk9kH.jpg'),
(115, '127.0.0.1:8000/storage/3BlKTA8akm91gUkbzIjRX89Xd36jnZP7uLNixfgE.jpg'),
(117, '127.0.0.1:8000/storage/wYBmqM1rUNnIU2Bc5Twz7p4paONS8iwVxuif1f7f.jpg'),
(118, '127.0.0.1:8000/storage/igGYg0ZJ5lApL42yZnuT1U0bmH4k67snMzTXviLi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_des`, `project_link`, `project_img`) VALUES
(2, 'আইটি কোর্স 2', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ', 'http://localhost:5000/courses', 'http://localhost/images/poject.jpg'),
(3, 'আইটি কোর্স 3', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ', 'http://localhost:5000/courses', 'http://localhost/images/poject.jpg'),
(4, 'আইটি কোর্স', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost:5000/courses', 'http://localhost/images/poject.jpg'),
(13, 'আইটি কোর্স', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost:5000/courses', 'http://localhost/images/poject.jpg'),
(14, 'আইটি কোর্স 2', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ', 'http://localhost:5000/courses', 'http://localhost/images/poject.jpg'),
(15, 'আইটি কোর্স 3', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ', 'http://localhost:5000/courses', 'http://localhost/images/poject.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `des`, `img`) VALUES
(1, 'বিল গেটস1', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে।', 'http://localhost/images/bill.jpg'),
(2, 'বিল গেটস2', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে।', 'http://localhost/images/bill.jpg'),
(3, 'বিল গেটস3', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে।', 'http://localhost/images/bill.jpg'),
(6, 'বিল গেটস4', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে না...', 'http://localhost/images/bill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `share_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `title`, `share_title`, `description`, `keyword`, `page_img`) VALUES
(1, 'Home', 'Home for Share', 'Hello World From Site Description ', 'Portfolio, HTML, CSS, JavaScript', 'http://localhost/images/Laravel.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_des`, `service_img`) VALUES
(15, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(16, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(17, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(19, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(20, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(21, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(22, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(23, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(27, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg'),
(30, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'http://localhost/images/code.svg');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2022-02-05 11:32:03am'),
(2, '127.0.0.1', '2022-02-05 11:32:57am'),
(3, '127.0.0.1', '2022-02-05 12:18:42pm'),
(4, '127.0.0.1', '2022-02-05 12:19:03pm'),
(5, '127.0.0.1', '2022-02-05 12:19:06pm'),
(6, '127.0.0.1', '2022-02-05 12:19:09pm'),
(7, '127.0.0.1', '2022-02-05 12:19:13pm'),
(8, '127.0.0.1', '2022-02-05 12:19:15pm'),
(9, '127.0.0.1', '2022-02-05 12:19:25pm'),
(10, '127.0.0.1', '2022-02-05 12:19:28pm'),
(11, '127.0.0.1', '2022-02-05 12:19:30pm'),
(12, '127.0.0.1', '2022-02-05 03:02:03pm'),
(13, '127.0.0.1', '2022-02-05 03:03:35pm'),
(14, '127.0.0.1', '2022-02-05 03:32:23pm'),
(15, '127.0.0.1', '2022-02-05 03:34:19pm'),
(16, '127.0.0.1', '2022-02-05 03:54:35pm'),
(17, '127.0.0.1', '2022-02-07 02:40:58pm'),
(18, '127.0.0.1', '2022-02-07 02:50:03pm'),
(19, '127.0.0.1', '2022-02-07 03:37:51pm'),
(20, '127.0.0.1', '2022-02-07 03:40:57pm'),
(21, '127.0.0.1', '2022-02-07 03:42:01pm'),
(22, '127.0.0.1', '2022-02-07 03:43:12pm'),
(23, '127.0.0.1', '2022-02-07 03:44:03pm'),
(24, '127.0.0.1', '2022-02-07 03:44:34pm'),
(25, '127.0.0.1', '2022-02-07 07:46:02pm'),
(26, '127.0.0.1', '2022-02-07 07:46:42pm'),
(27, '127.0.0.1', '2022-02-07 08:51:15pm'),
(28, '127.0.0.1', '2022-02-08 03:43:54pm'),
(29, '127.0.0.1', '2022-02-08 03:47:27pm'),
(30, '127.0.0.1', '2022-02-08 03:49:33pm'),
(31, '127.0.0.1', '2022-02-08 03:53:29pm'),
(32, '127.0.0.1', '2022-02-08 03:53:42pm'),
(33, '127.0.0.1', '2022-02-08 03:54:15pm'),
(34, '127.0.0.1', '2022-02-08 03:54:20pm'),
(35, '127.0.0.1', '2022-02-08 03:55:21pm'),
(36, '127.0.0.1', '2022-02-08 03:55:25pm'),
(37, '127.0.0.1', '2022-02-08 03:55:26pm'),
(38, '127.0.0.1', '2022-02-08 03:55:30pm'),
(39, '127.0.0.1', '2022-02-08 03:56:00pm'),
(40, '127.0.0.1', '2022-02-08 03:56:33pm'),
(41, '127.0.0.1', '2022-02-08 03:57:15pm'),
(42, '127.0.0.1', '2022-02-08 03:58:18pm'),
(43, '127.0.0.1', '2022-02-08 03:59:44pm'),
(44, '127.0.0.1', '2022-02-08 04:01:17pm'),
(45, '127.0.0.1', '2022-02-08 04:01:49pm'),
(46, '127.0.0.1', '2022-02-08 04:02:12pm'),
(47, '127.0.0.1', '2022-02-08 04:06:46pm'),
(48, '127.0.0.1', '2022-02-08 04:07:51pm'),
(49, '127.0.0.1', '2022-02-08 04:08:52pm'),
(50, '127.0.0.1', '2022-02-08 04:10:04pm'),
(51, '127.0.0.1', '2022-02-09 08:05:24am'),
(52, '127.0.0.1', '2022-02-09 08:05:28am'),
(53, '127.0.0.1', '2022-02-09 08:05:45am'),
(54, '127.0.0.1', '2022-02-09 08:06:54am'),
(55, '127.0.0.1', '2022-02-09 08:11:21am'),
(56, '127.0.0.1', '2022-02-09 08:39:13am'),
(57, '127.0.0.1', '2022-02-09 08:39:22am'),
(58, '127.0.0.1', '2022-02-09 08:40:49am'),
(59, '127.0.0.1', '2022-02-09 08:44:04am'),
(60, '127.0.0.1', '2022-02-09 08:45:15am'),
(61, '127.0.0.1', '2022-02-09 08:45:50am'),
(62, '127.0.0.1', '2022-02-09 09:05:27am'),
(63, '127.0.0.1', '2022-02-09 09:08:59am'),
(64, '127.0.0.1', '2022-02-09 09:09:25am'),
(65, '127.0.0.1', '2022-02-09 09:13:58am'),
(66, '127.0.0.1', '2022-02-09 09:14:39am'),
(67, '127.0.0.1', '2022-02-09 10:23:03am'),
(68, '127.0.0.1', '2022-02-09 10:54:25am'),
(69, '127.0.0.1', '2022-02-09 11:02:07am'),
(70, '127.0.0.1', '2022-02-09 11:02:47am'),
(71, '127.0.0.1', '2022-02-09 11:56:14am'),
(72, '127.0.0.1', '2022-02-09 11:58:36am'),
(73, '127.0.0.1', '2022-02-09 12:28:27pm'),
(74, '127.0.0.1', '2022-02-09 12:28:38pm'),
(75, '127.0.0.1', '2022-02-09 12:34:23pm'),
(76, '127.0.0.1', '2022-02-09 03:57:21pm'),
(77, '127.0.0.1', '2022-02-12 12:31:43pm'),
(78, '127.0.0.1', '2022-02-12 12:45:34pm'),
(79, '127.0.0.1', '2022-02-12 12:52:32pm'),
(80, '127.0.0.1', '2022-02-12 01:02:54pm'),
(81, '127.0.0.1', '2022-02-12 01:02:58pm'),
(82, '127.0.0.1', '2022-02-12 03:38:33pm'),
(83, '127.0.0.1', '2022-02-12 03:41:40pm'),
(84, '127.0.0.1', '2022-02-12 03:42:14pm'),
(85, '127.0.0.1', '2022-02-12 03:47:30pm'),
(86, '127.0.0.1', '2022-08-01 07:50:30am'),
(87, '127.0.0.1', '2022-08-01 07:50:32am'),
(88, '127.0.0.1', '2022-08-01 07:52:13am'),
(89, '127.0.0.1', '2022-08-01 07:52:29am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
