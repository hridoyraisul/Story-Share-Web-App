-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2021 at 03:40 PM
-- Server version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storylrv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@storyshare.com', '$2y$12$drpzyorhk3QPkL8Yv4me8.XOrrHWaJcgNFT114hwPC.wuFP9mZUha', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `dp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `password`, `phone`, `dob`, `gender`, `status`, `dp`, `created_at`, `updated_at`) VALUES
(1, 'Zayn Malik', 'zayn@gmail.com', '$2y$10$locZr8VaMGyWgNxUTlaG0OQaOyxL4jD45T2a..Sls5pf5U0Yj1Q1S', '019988776655', '2010-10-12', 'male', 'active', '1.jpg', '2021-04-10 09:22:00', '2021-04-10 09:22:00'),
(2, 'Raisul Hridoy', 'raisulhridoy@hotmail.com', '$2y$10$elic1sGVOFHiKx7H0iX9p.A/8J/iXeJcdFEXS6lzK4kx0BUSWXcTS', '01686851584', '1996-09-11', 'male', 'active', '2.jpg', '2021-04-10 09:37:15', '2021-04-10 09:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `story_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `story_id`, `client_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Great', '2021-04-10 09:38:28', '2021-04-10 09:38:28');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_06_035007_create_clients_table', 1),
(4, '2021_04_06_035118_create_stories_table', 1),
(5, '2021_04_06_035257_create_admins_table', 1),
(6, '2021_04_07_034756_create_comments_table', 1);

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
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tag`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `reaction` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `client_id`, `title`, `body`, `picture`, `picture_caption`, `tag`, `status`, `reaction`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Story of An Hour', 'Knowing that Mrs. Mallard was afflicted with a heart trouble, great care was taken to break to her as gently as possible the news of her husband\'s death.\r\n\r\nIt was her sister Josephine who told her, in broken sentences; veiled hints that revealed in half concealing. Her husband\'s friend Richards was there, too, near her. It was he who had been in the newspaper office when intelligence of the railroad disaster was received, with Brently Mallard\'s name leading the list of \"killed.\" He had only taken the time to assure himself of its truth by a second telegram, and had hastened to forestall any less careful, less tender friend in bearing the sad message.', '1.jpg', 'The Story of An Hour', '[\"Thriller\",\"Life-story\"]', 'active', 3, '2021-04-10 09:24:13', '2021-04-10 09:40:02'),
(2, 1, 'The Tale of Peter Rabbit', 'ONCE upon a time there were four little Rabbits, and their names were— Flopsy, Mopsy, Cotton-tail, and Peter.\r\n\r\nThey lived with their Mother in a sand-bank, underneath the root of a very big fir tree.\r\n\r\n\"NOW, my dears,\" said old Mrs. Rabbit one morning, \"you may go into the fields or down the lane, but don\'t go into Mr. McGregor\'s garden: your Father had an accident there; he was put in a pie by Mrs. McGregor.\"', '2.jpg', 'The Tale of Peter Rabbit', '[\"Funny\",\"Educative\"]', 'block', NULL, '2021-04-10 09:25:26', '2021-04-10 09:40:03'),
(3, 1, 'Man must explore', 'THERE were once five-and-twenty tin soldiers, who were all brothers, for they had been made out of the same old tin spoon. They shouldered arms and looked straight before them, and wore a splendid uniform, red and blue. The first thing in the world they ever heard were the words, \"Tin soldiers!\" uttered by a little boy, who clapped his hands with delight when the lid of the box, in which they lay, was taken off. They were given him for a birthday present, and he stood at the table to set them up. The soldiers were all exactly alike, excepting one, who had only one leg; he had been left to the last, and then there was not enough of the melted tin to finish him, so they made him to stand firmly on one leg, and this caused him to be very remarkable.', '3.jpg', 'Man Explore', '[\"Religious\"]', 'active', 2, '2021-04-10 09:29:45', '2021-04-10 09:38:39'),
(4, 2, 'Lost Hearts', 'It was, as far as I can ascertain, in September of the year 1811 that a post-chaise drew up before the door of Aswarby Hall, in the heart of Lincolnshire. The little boy who was the only passenger in the chaise, and who jumped out as soon as it had stopped, looked about him with the keenest curiosity during the short interval that elapsed between the ringing of the bell and the opening of the hall door. He saw a tall, square, red-brick house, built in the reign of Anne; a stone-pillared porch had been added in the purer classical style of 1790; the windows of the house were many, tall and narrow, with small panes and thick white woodwork. A pediment, pierced with a round window, crowned the front. There were wings to right and left, connected by curious glazed galleries, supported by colonnades, with the central block. These wings plainly contained the stables and offices of the house. Each was surmounted by an ornamental cupola with a gilded vane.', '4.jpg', 'Lost Hearts', '[\"Life-story\"]', 'active', NULL, '2021-04-10 09:38:07', '2021-04-10 09:38:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
