-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 02:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `attend` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `attend`, `date`, `created_at`, `updated_at`) VALUES
(7, 1, 'present', '2022-11-29', '2022-11-30 00:45:29', '2022-11-30 00:45:29'),
(8, 2, 'present', '2022-11-30', '2022-11-30 00:45:50', '2022-11-30 00:45:50'),
(9, 1, 'present', '2022-11-30', '2022-11-30 00:46:24', '2022-11-30 00:46:24'),
(10, 1, 'present', '2022-12-01', '2022-12-01 05:02:28', '2022-12-01 05:02:28'),
(11, 1, 'present', '2022-12-03', '2022-12-02 22:06:19', '2022-12-02 22:06:19'),
(12, 2, 'present', '2022-12-03', '2022-12-02 22:21:36', '2022-12-02 22:21:36'),
(13, 1, 'present', '2022-12-04', '2022-12-03 21:59:44', '2022-12-03 21:59:44'),
(14, 3, 'present', '2022-12-04', '2022-12-04 00:23:20', '2022-12-04 00:23:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_22_052910_project', 1),
(6, '2022_11_22_053633_project_image', 1),
(7, '2022_11_22_053823_project_file', 1),
(8, '2022_11_22_053834_project_member', 1),
(9, '2022_11_22_092127_tasks', 1),
(10, '2022_11_28_034731_create_attendances_table', 1),
(11, '2022_11_28_051536_create_permission_tables', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Pending 2=Complete 3=Delay',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `type`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Project Name1', 'Project Type1', '<p><span style=\"color: rgb(166, 176, 207);\">Project Description1</span></p><p><img src=\"data:image/png;base64,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\" style=\"width: 25%;\" data-filename=\"female.png\"><span style=\"color: rgb(166, 176, 207);\"><br></span><br></p>', '28 Nov, 2022', '10 Dec, 2022', '1', '2022-11-28 06:40:43', '2022-11-29 00:25:08'),
(2, 'Project', 'type', '<p>dsv dhfd hftd bfg bt</p>', '30 Nov, 2022', '07 Dec, 2022', '1', '2022-11-30 01:19:25', NULL),
(3, 'Project test', 'type test', '<p><span style=\"color: rgb(166, 176, 207);\">Project Description test</span><br></p>', '04 Dec, 2022', '28 Dec, 2022', '1', '2022-12-03 07:29:38', NULL),
(4, 'Project df', 'dsf sd', '<p>sd fds</p>', '04 Dec, 2022', '26 Dec, 2022', '1', '2022-12-03 23:22:52', NULL),
(5, 'nfg f g dfsgdf', 'gdr f grdg', '<p>fg dfvdf gfd&nbsp;</p>', '04 Dec, 2022', '28 Dec, 2022', '1', '2022-12-03 23:24:37', NULL),
(6, 'Project fxg', 'dfg dfg', '<p>d fgdfg df</p>', '04 Dec, 2022', '28 Dec, 2022', '1', '2022-12-04 00:03:03', NULL),
(7, 'fgdfg', 'dfgdf', '<p><u>ddgfd</u></p>', '04 Dec, 2022', '21 Dec, 2022', '1', '2022-12-04 05:22:28', NULL),
(8, 'Project', 'type', '<p>dfgdfgdfg</p>', '04 Dec, 2022', '21 Dec, 2022', '1', '2022-12-04 05:54:40', NULL),
(9, 'dsfgds', 'sdfsd', '<p>asdfsa</p>', '04 Dec, 2022', '04 Dec, 2022', '1', '2022-12-04 07:58:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_files`
--

INSERT INTO `project_files` (`id`, `project_id`, `file`, `created_at`, `updated_at`) VALUES
(9, 2, 'lZLsg.pdf', '2022-11-30 01:20:32', '2022-12-03 03:46:55'),
(10, 1, 'Jbe36.pdf', '2022-12-03 03:45:37', NULL),
(11, 1, 'qcTS2.pdf', '2022-12-03 03:45:37', NULL),
(12, 2, 'Y7lDV.pdf', '2022-12-03 03:46:32', '2022-12-03 03:46:55'),
(13, 2, 'vusFc.pdf', '2022-12-03 03:46:55', NULL),
(14, 3, '4nBIW.pdf', '2022-12-03 07:29:38', NULL),
(15, 4, 'tEaH9.pdf', '2022-12-03 23:22:52', NULL),
(16, 5, 'YZ5Ip.pdf', '2022-12-03 23:24:37', NULL),
(17, 6, 'K4uh8.pdf', '2022-12-04 00:03:03', NULL),
(18, 7, 'mHtcK.pdf', '2022-12-04 05:22:28', NULL),
(19, 8, 'SNkcG.pdf', '2022-12-04 05:54:40', NULL),
(20, 9, 'dHXPU.pdf', '2022-12-04 07:58:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(31, 2, 'mXshq.jpg', '2022-12-03 01:23:52', '2022-12-03 01:37:32'),
(32, 2, 'gwMEj.jpg', '2022-12-03 01:23:52', '2022-12-03 01:37:33'),
(33, 2, 'eJtrd.jpg', '2022-12-03 01:34:51', '2022-12-03 01:37:33'),
(34, 2, '7Ovw0.jpg', '2022-12-03 01:34:51', '2022-12-03 01:37:34'),
(35, 2, 'm6uze.jpg', '2022-12-03 01:36:31', '2022-12-03 01:37:34'),
(36, 2, '77rYo.jpg', '2022-12-03 01:36:31', '2022-12-03 01:37:35'),
(37, 2, 'OR5Vz.jpg', '2022-12-03 01:37:35', NULL),
(38, 2, 'PpA2S.jpg', '2022-12-03 01:37:35', NULL),
(39, 1, 'D5tsP.jpg', '2022-12-03 03:45:00', NULL),
(40, 1, 'oTW3l.jpg', '2022-12-03 03:45:01', NULL),
(41, 1, 'WOVGB.jpg', '2022-12-03 03:45:36', NULL),
(42, 1, 'daCBX.jpg', '2022-12-03 03:45:37', NULL),
(43, 3, '7HIMc.png', '2022-12-03 07:29:38', NULL),
(44, 4, 'QtlJM.png', '2022-12-03 23:22:52', NULL),
(45, 5, 'eXxq9.png', '2022-12-03 23:24:37', NULL),
(46, 6, 'T53XB.png', '2022-12-04 00:03:03', NULL),
(47, 7, 'giU0T.png', '2022-12-04 05:22:28', NULL),
(48, 8, 'ZdnFg.png', '2022-12-04 05:54:40', NULL),
(49, 9, 'DDAlw.png', '2022-12-04 07:58:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-11-28 06:40:43', '2022-11-28 06:40:43'),
(2, 1, 2, '2022-11-29 05:48:49', NULL),
(17, 1, 1, '2022-11-29 01:44:13', '2022-11-29 01:44:13'),
(18, 1, 2, '2022-11-29 01:44:13', '2022-11-29 01:44:13'),
(19, 2, 1, '2022-11-30 01:19:25', '2022-12-03 07:04:27'),
(20, 2, 2, '2022-12-03 07:04:16', '2022-12-03 07:04:27'),
(21, 8, 1, '2022-12-04 05:54:40', '2022-12-04 05:54:40'),
(22, 9, 1, '2022-12-04 07:58:46', '2022-12-04 07:58:46');

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

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Pending 2=Inprogress 3=Complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `description`, `date`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Task', '<p><span style=\"color: rgb(166, 176, 207);\">Task Description</span></p><p><img src=\"data:image/png;base64,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\" style=\"width: 25%;\" data-filename=\"female.png\"><span style=\"color: rgb(166, 176, 207);\"><br></span><br></p>', '11/28/2022', '3j9ZA.png', '1', '2022-11-28 06:30:37', NULL, NULL),
(2, 2, 'Task Name', '<p><span style=\"color: rgb(166, 176, 207);\">Task Description</span><br></p>', '12/03/2022', '6Ex6H.png', '2', '2022-12-02 22:38:26', '2022-12-02 22:48:15', NULL),
(3, 2, 'Task Name Task Description', '<p><span style=\"color: rgb(166, 176, 207);\">Task Description</span></p><p><img src=\"data:image/png;base64,UklGRhInAABXRUJQVlA4WAoAAAAYAAAA/wEA/wEAQUxQSMYNAAABHAVt20hJ+bPedi+BiJgAWlXGsJijvO73vJ+DLHYZUq1B2/Y6cfMeSSw6oJiSJqWIBNIbcipbhnHjF4GJSFy2ijQm7jaQJpyiDOPe2TI77hWYEWyZBM/0XsBaHDcSYEaJwchjOhshivac91eGo3M+6fuefxExAVKlbXvW6E0d1DZkeuJBoavgCJAw6UEx+G1pqnEA6f8M8nfb0ovqbRccinSH+hT55xflY/vu7SJiAqRK++fkzj9t0xMcGnmawuFIDxbLbCoefSo++ssF4OJ6LziuIINlIlGcQoaZHfj+V7D//NZFxASQRPvaArFk5nXeMD9s7B+el8qVx6p6elLVx0q5dH64v/HBNPKvM8lYoM0nILf0xoemC9uX18r+qdX15XZheije28JNY1e4f9w4uLbsX9y6PjDG+8Ndjaj4o9mlE2X/ZtXJUjbq56M1mJpZv7d/4/frM6lgKxV96YVizf4j1ooL6T4YmkM588H+wz6YuVAzA88Sk7vK/kOr3cnEM7XnqosNW/Yf3hqO1bkUnT/Su8AF4kJvxK/aPPXXj5pcUJqj19d7lFlZZGCFC9KVgUiZAvPtObHOBez6iT0+pVVyYTzDBW8mfmGJovKG+9JcIKf7wl7lpDU8cpoL6tOPNGgqKdCV5AI82RVQRO7G41ku0LPHG93qJxib5oJ+OhZUOp7wkMEFvzEU9qiaymiKJTEVrVQx1T1plsh0T7VqqYsbLJlGvE6huMIvs5S+HHapEf3SSZbWyUt19eGLzrPUzkd9akPvmGXpne3Q1UXxlSmW4tSVxWqiqG2KpXmqrUg9uFuTLNXJVrda0HaPs3SP79YUwq4ES3lilyqo6mdp769SAaXdayzxa92lsqdFZljyZyKa1O0YYQU4skPegr2sCHuDcubuXGVluNrplrBQgpViIiRb3huzrBizN3ql6pwJVpAT58hT+T0mK0nznnJJakmxsky1yJB/kJXmoF96mmZZcc42yY1+mBXoYV1iasdYiY7VyorWvsGKdKNdk5LAk6xQnwxISPMcK9W5ZtnQj7ByPaJLRc1brGDfqpGIxiVWskuNsuCKmaxozZhLCiqGWOEOVUhAKMlKNxkSn86w4s1o2akVK+CVEpzfMIQbX2wbHYO42xBaPDCMh1hk2jCQjRZYyWAupaUqhnOlROXVDOjaE1TQMqTbQExhz6DuQyFFxwzr40hEd0YG9nhHQMnE0J4S8aSGwW1S4WQzw3vORJMvDPAlF0zBIC/Esssw3xXKLgN9VyQFQ70QSM5gz8WRLWhbMmGkM8N9TkWRGAa8SQRxZ2LIT3fEEI0M+jESQnjMsD8ORRD0DPw+EIDXMvRbz3qqZvDXynYVw7+yXMkOsLSaZieoLRYbN2Bia20M7AiHDUv5HTvDzreSatghNspGK3aKKwtpdozaOqEMGjKhPFORZDgmK/KKa4gBOeTKJzGGZCyPNJqYMBvzRs0Sg3KpJk/obzEs39LzwxEG5pG80MzQbM4DgTlszAWEpz3J4HxSE107w7NdcLUb+NioFZo+xgAd00V2mCF6WGBNDNImYflnUTLrF9Ugw3RQUC0M1BYhlaeQkioX0T0M1XsEdI6JFfMc4XgnGKwTXtHcyHC9UTChLF6yIaG4EwzYhFsknQzZToEEVzGzGhRHL4O2Vxg7GLY7BKGN4GZEE0OEgRsRQukMcmZKRdDN0O0WQNUadtaqnNfP4O133C6G7y6HaQn8JDRn7WYA73aUexxB424ntTKEWx1UlMRQssg5bQziNscUT6FoqtgpVzKMr3SInsJRSndGBwO5wxG+WSTN+pwQZShHHaDPY2let9+lDOZLbeeaRNOky25hhnPYbi/j6WWb1TGg6+wVR1TcVtUGooxqO/UwpHtsVJnGVLrSPlEGddQ2nhSqUh67hBnWYbsM4WrIJkEDV0bQHjEGdswW7mlkTbvt0MjQbrTDcWwdt0Egi61sIHddDO6unGlJdCW1XDUwvBty9Qi+HsmR9zS+TntzE2aAh3PTh7C+nJSkEZYuycWFDPELcxHHWDwHvgzGMj7r9jDI91h3AmUnLCtbR9l6mVURhnnEqgGcDVjkWcHZiseaegZ6vTXXI+16a0aRNmqJ30Sa6bciwlCPWNGLtV4LXAtYW3BtrY7BXre1GNpiWxtG2/CWnlm0Wc/qSdi4J+qZ5G2ynl3edutoVrypZr2QDXxIL0dcTs8kztR7IO5Bq89Gvk8nzVxaZ4G5BZ0ic0WN1hpztVavoA190CtFXcprhroZr3Xq1r3uqbv38NvY+92i3EXdstxl3Za4W3I74e7EpVFxpxodXTb4XY4weWFHP3n9jnHyxh0GeYbjgLwDxzV51yLSYpFntYj02uj3isTZi4sMsTckMs3etEiBvYLINnvbIpfsXYpcs3ctothT4rPh97XR1xagLxCjL5akL5mhL/Oavtd5+vIGfYZJn/mBvg8b9G3s07d/SN/hOX3nJfpKZfrKFfoqj/Q9VumrKvrUE31P/Cn6VJW+6iN9jxX6KmX6yiX6Suf0nR/Sd7hP3/4GfRsf6Ptg0mca9Bl5+vKv6XudoS+TpC8Zoy8WoC/QRl+bjz6fKPaUyDV71yKX7F2KbLO3LVJgryAyzd60yBB7QyJx9uIivez1irRY5FktInJN3rWIyAF5Bw6DPMMxTt64o5+8fkeYvLCji7wuR6PiTjU65IS7E3Fd4m7JLctd1i3KXdTNz53fTe6puxfPderWvWaom/FKUZfyClIX9GqtMVdr9ZIic0XRXGBuQSfNXFqnj7k+HXkg7kG0TeJMvRxxOb0QcSG9ZsWbataTXd52pc5J3ibrSfCWqOeZRZv1rB4aRtswbTmGttjW6tBWtzXXAtYWXFujXqz1koURrEWs8JtIM/1W0CjSRsnS65F2vTX1SKu3xrOCsxWPNTSAswGyOIKziFVl6yhbL7OKTqDsBFm+B2V7rPNlMJbxWUdxjMUphxdi7MJclKQRli7JBfUhrI9yGkZYODfe0/g67c0NPYKvRyjHDfhqyJWWRFdSyxV1oauLch7IYisbyB0dx9ZxsmEjthrt4J5G1rTbDhRDVoxsGTRwZQTtQUO4GiKbhnEVtosnhaqUxy4URVWUbFuZxlS60j7Ug6kesnG1gSij2k4UR1ScbF2HqDp70ct4eplsHsZT2G6uSTRNuuxGl6LpUrK9Po+led1+FMVSlBzom0XSrM8J1IGkDnKknsJRSncGXYmjK8mhxVMomip2CrWhqI0cW5TEULLIOdSKoVZysHscQeNuJ9FuBO0mR2sJ/CQ0Z9Eu/Owip/ejp58cX7WGnbUq51E3drpJgKUzyJkpFQFFkBMhIWojuBnRxEA7cLODRNmLml4SZnAVM6tBcVAnZjpJoO4EYhJukVAoi5dsiMR6I15uJMF6J9Ay4RUNnWNixTyHxHsPVu4hAZenkJIqFxG1IKWFxDyIk0EStH8WJbN+UVETSppI3IcxcpgEro8hZEwXGdVu4GOjlsTejo92Erz2JDqe1ERHgTlszAVI/M3YaKZ8eAQZRygv6m/h4i09P1DNEiqWaihfNpqYMBspf8YwEaM86hpCxJArn1BFEg/JCsqvoQwaMiHKt9o1aLLvyi2syMKqcQmNshH5nTvofLLzxuAKhg2ydWzcgInJ3toNaLJ56QJKsnuFv4osr2r01cp25LXYaz2yf9Ajrw9IguEx7o5DkmE0om6MSIp3JsxNd0iOiUGcSUiS6Yy3OSVZZgvaloykmaMtJ3kWWCtIortI2yWZ7uJsl6RaoKwgueYLwpacJJvN+Jozkm1q0GVSkm4yYWtKSL53RmSNd0jC0TGujiOScdijqg9JykGLqTYgOXs1omqPJK0qPFWKhF2iqSR5a4Mko0ni8YCjISaZb3Qo6jZI6n6DocYnuas/CFopEv1r5WNqkn7zhtrJ7if5+99XOR9W0f+gK65u/u4iSfz1GTVz5nKSx2/Mq5iFb5FM6k+pl6d0kszfZNVKto3k8wvTKuX9IMmo9og6uVcjSW1aUyOrDSSvFe+qkDd8JLV/M1SHESXZrZ5UG9PfIAnu3FQX2b+SHH/8NVVx6tMkzRelVcTqPpJp76B6OOklyd45qxZmd5F8u+821IFxl5ukvPqfquDUF0naf7qsAhaaSea1I4bsZW/VSPI/+4bcvfRxUoA7kvL2wbmkCHcvyNnxC8Kh9ruMfP3bP0dQ9PQbcrV+e4nguO2YKU/r95cJksX/MOVo/fkKwVJ/0pSf9bdrBM2PPW/KzfrXTYKn7ylTXtafrhJEi0+ekZPlzXnCaex/8vHvFYH13P/Ixd+HBNhPPm3IwlL7BFrPdcsycHx4kZD7rVNmYWeO7hB83benC7f0HW7C8NlvGoWYcSpECln7y3yhNfcHjVTzWYcWC6el+z5Batp3dKkQWrq3jFR22f0rhc3yfWeR+v744VmzMDE/6qkgVe5pfWuz0Nh8c6+HFPtXj60UDot9NaTm9ev+tZn/Nsd/W0RKv7L7nUz+yrxz/ScIgp6WJ+aMfGPMPfETD2Hxaz2TG/liffyOrxAot/14YGpdbGv/7WvYRuh0fa/7+Q/WTdGY6zPPd59NSHVVXXh0+MM103nmWmr46M+qXATbotprHj+VSmdNu5nZ9Mwbj139nSLCcdHnz7n8zmOv/3t64XRmfTN7xjDN/2OaRnZzffX04kfT44mnHu6O/ChQRPIMVlA4IGQYAACQlgCdASoAAgACPm00l0kkIqIhIjC5GIANiWVu/ELY+sN/wr8C/0A+Xqh2gXgD9AIMB/APwA/TnyAfwD8AP0A6sdY07E/qf7N35mVvAf3X9yPETyAd29RW1h/a8m/Xv0j7ff9V6h/1L+vXwAfsh0iPMB+6H7h+8B/uf2o94H949QD+U+ex7EXoH/xD/S+nj7KP9t/8Xra+gB/+vUA///XL9XP932nf5z+6czb7W/tjz33svxFjs5F8Aj8g/p28QgC+o/ffaongf2AOCEoAfy//C+hPoEen/YS8p32J/uD7KH7SiUXuC9v3+T0RQuLZGtASLLC9wXuC9v33zgUJ9wXuHu/Sc4Qtm2fcF7gvaRJtYBRDwiAehcWxCZB0acHiFxZYXg0qL3Be4L3Be4KgGxkVdEyoxiyvkaLejaExY+bzmD+UivsItUp5V7QjeKcVgG2a792e/APPLSZasKdUMgcxiFfLMm1S8C/9X7A/hxChjYvVE78eDtsx/zbMn3acYxsKb66XgnyOYD+reS+cdDvtK13/z/vAV3njWfB9TFOS1foLJkIpG2u/ZiltzBcGPEA88nqdAk3rRlPPjR4dUL0Liywpt7C5KlXYgHzC4fgfncOYpbHxTurUadzIeEP2MPUTjO0L2/o/vIfZihGNBZ/UEus13/1YaLu01mf/VmzuH4HSxWEFkOHBBeW7RxsyqfQgTMPlRl38pIN0cv7nuC8b/bPVkO+YpOQlTQldYAfAE+9H357Rqwk7mG8vlXpWXAENwL7JSuvvQtEDKiLj5fTxXGjTPHBqZ9gmLoXtRnp/cF4mgUBel4rKnS/zw2Jgpv05sNkI3SMFrVNnvA0xC5iBcwUjPQ6kn8cNwdbBAEZa2h+4kWcoCj2qjEYxRwXuJLkPCGmO73MUVRCbkU7xqEZz8FoWxd/9ZGMWWFTBtGN7l3/1ZDjbKS82a7/6sh4Ove0mtKV9wXuC9v25b05LRRPQuLLC9pO8o93Lv/qyHfDGenLVhe4L3BeJJG2cyEQD0LiTAmijL6LLC927cu/bL9QT37PpvYRUT0LipKt0htuyyCzrv/sqi9wXiqb/YBaFTExkIC2tku/+q1oyva2MgzJh9uWee4KtM1ZI2hQBwjHOJB++aT62NpFlhY/V8E+aw39KlHBIeENhxI1A137VXQiELjeyMEXB/emYsMFwp8tpIHZCCw/4jP6o7QTnuRJ6/HKz67l9ZIrbj+zLLslfqzwvLF/fdUHRh2VlQMv2ayp6HjLqV7diHTcU6z4BvTMiXmJEPCH9+rtB67E/uXcSjM5gIhpKuzcx3xoXAjXhk+RUztMnoW6u9/v9SjPgdG0LiFWRnqgAXUllBnGZVbKx870nqNoXFoFLv/qii+QXRXwl0a/8Ud6+nmMXEVIgERAPQuLLC9pATGlIHXzvbj7G7wm8B04DxMo4gJ4ohcWWF7gvcFTIkwV6oMlC4sr7xzc7CNnO+ZFTmf8THPQuLLC9qbt+Nq/9K8BY4FZ+ALLC9wXt/R6ZmzO9xNVCEb2Io9mMAcF7gvIKdiY56LH7lhf/VkPCIB57nWKSFTDBaQc7+xew2P3faUlSg3+jqvTZBJsSCn8KH/GWxWiuVQyNoXEIAP2lAtmjbjQdugy3EUF+lJZ2hW/IEwb4Rtznc02OpYQb1fkfRY3yQOVyVeIn1g1o7fny6+B9LvpkQjfWuUmAL4LbI/J0J26bPMWexaBjQPvT2/9hfGpvkyTfXLGqYD3er9do1eOLk5+UusrC2ixB9zv0GufJln9ySfipFkS4O8apLW7Af5YXPLy5iAC7Vfr9ySi6W995CBvBM93aorpGJtUmgI+RIHb1m+Alt7cbGRhvdfRHy11edyvM4xWqCeR4C9dDFgZVBpF9gKkomP8v4bs0YciAAAAekpZ60nh2qT19FnCTAcxqSIr9Mjs2qcrM+4VxXfaxBEJ+b4oXvpLLGuQCufJfdXMD7sckB+0djkF/MuSWjfYhEjcBKBDzfb1TJYyANIFHO9AAA8pSz1xs9PWtosw9g3Hu6H62sSVe8NlPe/BLSsOLtspjX4nuC1BEOFApwh+PfK/PTtwuW2fEq/7Igz6bxO1xrzHAAAAy99I5ZNuMjZdauWZkJd9H/BQJcxkxqgBQj1GCcOv/7B0//1+9AtVDL0XX6UlettKSvWlJy57AHGCMfHcRBcvKpjIAcrP/cOk8PuTZHUQZGITxg2a2UoD02QcnRo5XHeCHJu0b0/noCOh9Ez1/TNWXH6Wn7Qu7g3Tl/O5y8c3WgB8kcSJrRqFn0eUURSaKAGvxqNvaPACTqpNEbe0Msf+YR9a6LvFXRUJsWVI536EOLrhjEPtL0NNUBeFwmBYT8YFAzbcPatrT9hSk/rSyilOncr8BGddFZjE4nppLrowWaHkBeeykfFtYZOGboWOLbnEDBI/ajZQeBHVAsFIFBmLE2FsUx42/ePj/7i6g374h0GSOc/icH8uqDaUler6WfHqXDS0q4YFPR9gxAVNqAbVHgN0rLiwf/mDZg6D0dfHtVKOS2hymImvwBt8BZvREF/hzQHUbUfeu/OMWY0oKGkTaDFLlocs99QBWAJ0ZDnlrHef4JtfUOUNE1wxpXN4xvqymO6JH6qzc6fj8QlG5/Y2+Sbq6iPNcrnHzN/LqvP/v6h1sBIOz7x8gIvX9/T0zzTKk4g6RIZNSgriYXFwuk+PvkV367/F3JOhxujEAASaWAQB+6qhAa7PcGydLU+m4/mtFrdqeIhZIiqxuBeI6EO7w52Oa97WKU+d+WjOiWQCSUPyAVx1i4bevaKg7AF5OtTBEsawF3dmUGkwQD1gHkjR2wivRLirrxRp+VhJlb7hPqOjy4uQUsgC7BLWKsWpyQoLSKZnh/NO+lApwiH063qkYo9Qz2Y0sdTRHCCKUCH0QJ2lM56t5Bs5HK1YudmCdnYU3ZHrWouWwB1wcO6qkTCIU5I6DFKq7XsqzIAiMvCDE3OYNtTT5NCbmmH0C37ztlPAX35Ddi/3DC5Z7oGGgMNlhcqU1ZuPe6SOmXGErts8T0GIw7Q6kh9SY5XsEkuKmXJGG9186zDU6FVrXdwneC0AGORvq7eS2fbzhBHz8WRYfof1+lNJM+F2Lu03SLxka08HEHpu+PMBYNKwVGKCSDxQ26GhPviWs//k8cukhIjvFkXOD+MfUWDAa8COM+Rt9adjIQ/6pxFUGLHYoJ9JdNURo6j7ON2vYMvvxq7KCgAFXj+aCSSgeqU7PchLtiWpLP1BeOIz4C62f2x95LEDkICzlVdnS0jjpIh0Jloga0tvTnr7zBEk4CfWZBHI1NOCHM7gB05LJPW9pGHsqFcJWnArC+tZZC/+MClO8iSuU0Tll2hqP6hTm64UO1TqBTnjSIqYz6hRladk3BcoANi++BgTK4FNTD0cj8GO72P9v2Oy3Suv70fPF1ShDhHHawIt6CtpV47saAZSWCv18Rm21PLVV49aQ/gk+DvNlufQg7ojGjBwGaEaM8xJXGNBLioXEMwHlaVYDBCmNVqs5CJ1Lx4izoaJ7SBCNCkWupISMIN05E1XYjGMO2ePTtHsRJtnj9rJoG+JHQfLQRLqEHeybKiJiLpdaLfJMg4WvEA7QJGtx6dwnn2EjkTwDuCgCqw8lPkguHXuo5K75PgzoqxBP20wRLN+M1HWdgybE2vdvhj/I71wNpfPJWDYoK+FexwbYPjAa3ghb1NmdoT1dgRc04dIy+1DWzriUSOVIrDuTlnOn7ujd9GmFdIENVHs2Naft9+UbTcZ3XgWkDRBPVaNNI30QPe2b8Xewc+pWHuo18d/cb8FvCArB+S331Ze5XIra3b9VTR/rQWlaaQnrsqClhY3maZa3if1y8Yikmcr1hm6GPF3inYf/P78JaZQ6gbvTyKKKZj0WiyvWqfO5Pv7MUksxiPMlnbWnyBf63FWL0hmka9G4xlmIZB4Mwu0s/zGngbJEG0L0udA7uVUo2w3QemU/aX3/cxL7ru4PVVpofTVMG/l5O2ncT6Jg1P8ZZ0vntxXVW/oDw/+XTr8CTQMBmnbeYC4n/tsQr8PEqKLuyeT46M3xMLR9jBIUyHAQ0/FTNV+VjzrybHVBc/qx/znknhVo24PYi/J0AKyZk8LSkYAsiXCIT6WdWz9AqYKZoaxzCy1ovO3o96yNEGJZ5oLg5YDxXdDg8hiQFqz5e2Td06GboV82F9btMKJSpPANkCIhJ7Mvv/I/BI1HNJPjhXdjq5cG+c9S3il95pEWu9VXqDGtKBhvYLCbBu2QKaMzl9fKuDDO5jh2vPiHqYMrGha3ZAXJ4za67E98fVUjlMg/5oeFa77EorlmXEyvbo+tdFk+9yqXNlgGjjL8x0Sud/hQninwL70qGsWdxLffjyZHH87YMZ7lO/SF0D+GAtymnTzpjEMLaLe674ryV6ayy92klIWCyhsT4DVbUZhEn9kvl+KjV8h2LtjGtGjX9sS/HxAfQtGzWVa9apj8AiOxPaJ4oREFBzOKmQWOn0a1hNiUkfPHzGm9bixv706BQHQb62kOlgczqx279tEfNx2bqtNXSYx2JvpoMboe1xiEUaLhLSDL9EJI2fqWfu+dc3KzWTTOZ5d1pmGUIZIWFdeDQTL8Yo+A89pa42Tzud2jxp0sowiTPLDFNRjy+q+MFfxNoUdwfVpp6g1pvalRjm0m/WXvzLtO9OVGG/MJMf3e69YYO5xRrtgp7MCeAqgSGr7LvVHaLGbG9wUTHFv/TFuQcn39qxPnuYyq16gKCl9u/SGi1Z60yv4UA6U/6w++IYDnPBvvqpIHlQ0JLnF/Pc4XyyIOlCs1Yq7Vam5WMg+5yrcybQrOR6Iuk7WtsBreoo52Q8i+HwJaZ4tn8QSbTKd4KlYwg4rFQbc1Bi6UNNvAhts3hbIZK3LNqJlm3pfbkUoVaex5WQQpEEsqlpvjhHW6ng+gGYCelrdC5s6dErxKvsBhdGQwDeyRepBMBvQUFJC2eaDHsMNrBV3KsOe3AH/XRN0hkdt1l24717pVkfNZvxMF6BqJMwOcABVh12PFh8GovvUufgk+j3uC5A76FETMZ/cKzwn3d6OI3KshCZr/uMAT/WmG8DmsStbzpQE1jV2H2n8/aERMO2dwrnX6frhJS1Dwg+WjkpQivBK2mbqkaAy33yQ9aw9bclh33J0pSp4K7GeZ81vyYTr3cX2bzEc9zTB/Tm/LsHuDJ52P178wZPjvbIHRjdnfs9M5xXNSpKvpOsanGOO06f46OA8vsMqBoGD10vUV9rlclBWDWzbZOwvCHK/HjDDG9u2BIGXAqOgd0vVD+nWURy/aFE+Q3R9B/FU3Kklq5aozNXGDBRtaBuLByyRa+hT3vEs33koQ1ptE20EsATUg4L1Rs7DfbguENKDRKoYfPHZqyDygqPMDKVCr9CSaKQlRlrXYEsrcDmFSFf/74u75abaGDEOrzCZEuiqvSR8GKaZO2KygjQHWZjzVcIUmVhnr1Y6PLUDdWv4jjq5YxcEKzt2pJqAAAAAB327rp4vRtIeAhdanNZoBuOrOQeRpZB5noHCAmzpKc4ACCMpob9GVt1iq0f3C2SDkVhGBodi7LkB8OojPjmVSE4QRjBR+iXqwonY8z8jGsSS66WZN4zOH9FZKzdSOYFUEJwX+DcjSddvYl2Ed9TajgHXHjBZEXynuRAobvixSeh8jaaEEAWlD8pbQZZz+wuZDzmmfRz1mkd+Gs03RC0SCAIgtz0h1kYUSvpXngmyPcuaPigtEA68WfZG3yO4+vV8acODy/VOqJHyW30w2r+TB74bhcoCyYLqZc4c+CjRCdZwq68i2Q09OGGiegJvsIIMwq8+mkiKOsc+S7iWg9K5TyxdgoIYws3ebBlt5uCFnJVp8hkFXqBpbYG0/lS+d02KNTbyUNCVquN6wWXnjmQJMXwXyh/8m3XZUUl2Gn0qgLsF55jOqlH0+vDfn5VQcVZgw40hrZItA4l8udMmWRT/KUC+xZdTgsJaOpYG/p69HNWDXEE69OsUz4bNKVdvzjzdmIE22EXZMDMf48FxM1kDSjjSM3QOA1WSHcuZNTcccJWTIb0aUz+TJFMnBqjHDjOtYPucEZBGaNFZfApy5FMCGAe2eNQ4UY6nbOyJ+NJtiyLYLe9Z/kLoQ2eNDPIIHdW2qzHtA9J7UWO5Gz16YZpnwPw8Wx4OXBL2Wd4ykEGCKXhQC0NvMIWN2OXSgDJg2Ae7sIklsfF4cAWne5OEzSCPfd4no4SMEZPuP+2n502rrwRbCltLuH1TmP4Y3ZYcNJMVE9Xi9HeTKjNPIXTiv/7P1QPmKIpAN0+OuuAzjKqXXihYitP7ctTLFjGfXfnGLMZ/Bz2TgJMwjm5F23lW9q3mLIbKWR8R3Z0fU9AH5Fs+LgyQgqeu3z5Icerzm5CCECcr+lcUpQftc/hr4i6Xiy4hc5D7ABjjaSgqvag7hAJ5kwA6oUBqzSaWYHk9LAOsbon4N/mQoedbNKnO+fSnt0Cj0HphmmfA/4Ss5GSUXirZKFhcA714Qn7xIyPiDjhTTKbjztUU3ZHfTt2tHUHcKpxABYoUEKoTNVxByHv60bgOwCPDZHNpaMl+IAj2CFfy5Ggsi1f2jhtr14FCGMgqDc14hSyevLEA7+dSdCchxxIKtUHu7C4ImGOpGXhwBad7qtCnZlAh3ERstOS35yt6jb5kZH9aSMDv9VhMDwzlR4Fsy6upRwW5aaIFN0xjMsoM7T8yK7vF8NJFjN9busE3EKVboQxBG+AaZWVOP1KFM18jhD63VtHXCt5ItrRuESDF/Mv/5xI/O7xOkXZCD9VA3UAUKzlrYg6czA9/zukJ5C1ukuhPy1bKDzr173//67J//tu3bxBal111A/F3rAIXD5kFbXfqhaf8FjZzEsUIxxOEi4VIuSIYhJWCA2DxYduWv2PNnI1Xuul3wPeMJekM9BAI0ypCcedahJ37a2ROt6+DMxODn4keqrPo1mbrKNDh6x7wwTGO6mZ+tJplFVVEeCoHiz1vzVH1sDjHcAJOyNFvcUvaZ5Nrv3NnXx+obxJSBJZW05Xjfrk3kQe0OEvaKrW/hDi+Ezep2amJUJcPVnq0UPaVIYhmDzPM1c8gei854nlXZ+t1Sip0BJ0fAH2AUNn00iqHUss7RF2G3ivvH0kGKbq0R/G/uXUUvtdKcppKhWfJG3N81R9Uf09BljS7gfCAQnsvlFCS6mCN0CO1ql5LK0K/D+qz2UDOBceBKcpBtwMP98BdUXrrMgMIrQdR6Ki2GzsG8NVWJpFLW1zds+x2S2BEo3WwN5aQP6Y2TEfUe43BqF0SBovqie4ZiBDJZs6ODfcBpDRzMpE9P+1rRgusiI7JP5pyicCYr6paG3+Nj6AOhwoA7V07dx8E8J0fbnsj1pIkAATBPtPbeyBRFLc6laFXRtvyzJnCAmPkBqAKthxzSRlOTI5VgKQL0kDTrSbdQaUxnJLCZgrPeqOY23G8FXIklPmcd678KDg/aRQ1CzAuaQgs9ZPfwwAhv6fQoKc6nwYCJUKdHgLZxusA+f/PJIB+0bERT64kMQhtY4OVzfGLe7F70IslysYDxpEcYDQfB/ZD4i0VLp5Td3UU7mTmjpK+O/lucByr4FU1j+94c/Q2J7lQQbkigP/7AGK9Offi4LWJqE+9AAXbdxvUE8xQ+8Bg+ZUCgUZdv52FKumvQtyZLvsXFlmy4LE3xeu6DlsYFZrHuCNjrw4jbepgQTS4ejTnmIa2tcS1kPM/XQ21eqOqgfrIL4oa6eSairDr6xnh3N0tfYn+Wf1CT1il1bgAbo1Rs+j0sr5JnnU5GV1v1qsDonggPkGiBqNvyumQ2L3eBi+PPVsDexJw5wJJo0RZf7O0XSYiR8BPgwaC/0m6BZJmnu6FCTDbGu43dLNnLIwpBpv+mT2GWoqXQjhP8XiZCu5Mh6EoA4eO0bSDMAEl7uu7HPHVBE8eH+qMtdQZy7n3aQT0Um2eWXcivOhYuJ7iKxF836f3qSUij47LFmuvYKIYa0bW4vEKjjDjrk5qv6M6KXjRn3DdO2jiMZ4LXPafUtTEpWgNP/YlMHK02wy8CLXk1hH76xqxDl73fKaPsARWstDT12k9LepoRMifPGKqwBkWZZbOGBxcrWvaj2mUv0HW1C8VpaD1HE0mQXDS3klkwSZcXcwEoLkXTpEdY4LkUwYv3Z5ojIgIrLc6I5rEgsnWA5iBQHQ24e2kmgT0OatE6kNrGAQtXfo7UpZ+JyrWvtbkROFFMYc1VBaKsuytOPdJcSeqOFDMfSYQRciPGxW1dIwIZ3724St8G19NaY2OkIiuNKIrcrhVuTi0Xj2KAAAAARVhJRroAAABFeGlmAABJSSoACAAAAAYAEgEDAAEAAAABAAAAGgEFAAEAAABWAAAAGwEFAAEAAABeAAAAKAEDAAEAAAACAAAAEwIDAAEAAAABAAAAaYcEAAEAAABmAAAAAAAAAEgAAAABAAAASAAAAAEAAAAGAACQBwAEAAAAMDIxMAGRBwAEAAAAAQIDAACgBwAEAAAAMDEwMAGgAwABAAAA//8AAAKgBAABAAAAAAIAAAOgBAABAAAAAAIAAAAAAAA=\" style=\"width: 25%;\" data-filename=\"female.png\"><span style=\"color: rgb(166, 176, 207);\"><br></span><br></p>', '12/03/2022', 'n9msJ.png', '1', '2022-12-02 22:47:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maritial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1=Admin 2=employee',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `father_name`, `mother_name`, `phone`, `designation`, `date_of_birth`, `gender`, `present_address`, `permanent_address`, `nationality`, `nationalid`, `maritial_status`, `bank`, `bank_ac`, `facebook`, `twitter`, `linkdin`, `github`, `website`, `image`, `cv`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rakibul Islam', 'rakib@softinnovationbd.com', NULL, '$2y$10$aAZ940n1fTbIf5lRNqkK3.SpDqaf.ZRg0jhH19KTrUEaaZoQI4BLi', 'Rafiq Molla', 'Sahanaz Begum', '+8801956809079', 'Intern', '1999-02-01', 'Male', 'Dhaka,Bangladesh', 'Gopalganj, Dhaka, Bangladesh', 'Bangladeshi', '01234567890', 'Single', 'IBBL', '9876543210321', 'https://www.facebook.com/rakibulislam38', 'https://twitter.com/Rakibul29135008', 'https://www.linkedin.com/in/rakibul-islam-13672a207/', 'https://github.com/devrakibul', 'https://github.com/devrakibul', 'w4RV7.png', 'A6f0S.pdf', '1', NULL, '2022-11-28 06:23:15', '2022-11-28 07:01:56'),
(2, 'Rakibul Islam Rony', 'devrakibul@gmail.com', NULL, '$2y$10$b3uFXmZrCLv6jqIUWPeqkeP1KYYkUofjRaYSo2BQ2oWdsmJepcicS', 'Rafiq Molla', 'Sahanaz Begum', '01956809079', 'Intern', '5454-12-04', 'Male', 'Dhaka,Bangladesh', 'Gopalganj, Dhaka, Bangladesh', 'Bangladeshi', '01234567890', 'Single', 'IBBL', '9876543210321', 'https://www.facebook.com/rakibulislam38', 'https://twitter.com/Rakibul29135008', 'https://www.linkedin.com/in/rakibul-islam-13672a207/', 'https://github.com/devrakibul', 'https://github.com/devrakibul', 'jJSiG.png', 'slc7y.pdf', '2', NULL, '2022-11-28 07:01:07', '2022-11-28 22:12:52'),
(3, 'Test', 'test@test.com', NULL, '$2y$10$sQxpsSjWbp5GEPrT8KMvuecjdUyocFMqdhicbQolPGrmEImmtNC2a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2022-12-04 00:23:15', '2022-12-04 00:23:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
