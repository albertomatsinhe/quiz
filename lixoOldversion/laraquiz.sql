-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 12:55 PM
-- Server version: 10.3.15-MariaDB
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
-- Database: `laraquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_11_22_155331_create_roles_table', 1),
(3, '2016_11_22_155331_create_users_table', 1),
(4, '2016_11_22_155332_create_user_actions_table', 1),
(5, '2016_11_22_160552_create_topics_table', 1),
(6, '2016_11_22_160943_create_questions_table', 1),
(7, '2016_11_22_161439_create_questions_options_table', 1),
(8, '2016_11_23_140354_create_results_table', 1),
(9, '2016_11_28_161439_create_tests_table', 1),
(10, '2016_11_28_161440_create_test_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abdulsumail@gmail.com', '$2y$10$8cqvxlAKxkYi2TA8IUYpc.jold/JSkBO3hk1/FM4cPeCfc5ge26pm', '2020-06-12 13:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `question_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_snippet` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_explanation` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `more_info_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic_id`, `question_text`, `code_snippet`, `answer_explanation`, `more_info_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Qual e a promocao do momento?', '', 'Esta promocao permite falar com todas as redes...', '', '2020-06-12 12:22:49', '2020-06-12 12:27:00', NULL),
(2, 1, 'Como falar de borla?', '', 'asdasdasdasd', '', '2020-06-12 12:35:43', '2020-06-12 12:35:43', NULL),
(3, 2, 'Como podes fazer pra falar com todas redes?', '', 'Aasdjnajksdjkasd', '', '2020-06-15 15:42:26', '2020-06-15 15:42:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions_options`
--

CREATE TABLE `questions_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions_options`
--

INSERT INTO `questions_options` (`id`, `question_id`, `option`, `correct`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Txuna credito', 1, '2020-06-12 12:22:49', '2020-06-12 12:22:49', NULL),
(2, 1, 'Txeneca', 0, '2020-06-12 12:22:49', '2020-06-12 12:22:49', NULL),
(3, 2, 'da la mola', 0, '2020-06-12 12:35:43', '2020-06-12 12:35:43', NULL),
(4, 2, 'Txeneca', 1, '2020-06-12 12:35:43', '2020-06-12 12:35:43', NULL),
(5, 3, 'Txuna credito', 1, '2020-06-15 15:42:26', '2020-06-15 15:42:26', NULL),
(6, 3, 'Txeneca', 0, '2020-06-15 15:42:26', '2020-06-15 15:42:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `correct` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator (can create other users)', NULL, NULL, NULL),
(2, 'Simple user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `result` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `result`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '0', '2020-06-12 12:16:01', '2020-06-12 12:16:01', NULL),
(2, 1, '0', '2020-06-12 12:23:23', '2020-06-12 12:23:23', NULL),
(3, 1, '1', '2020-06-12 12:25:08', '2020-06-12 12:25:08', NULL),
(4, 2, '1', '2020-06-12 12:32:31', '2020-06-12 12:32:31', NULL),
(5, 1, '1', '2020-06-12 12:34:25', '2020-06-12 12:34:25', NULL),
(6, 1, '1', '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(7, 1, '1', '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(8, 1, '0', '2020-06-12 13:26:08', '2020-06-12 13:26:08', NULL),
(9, 1, '3', '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(10, 1, '2', '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(11, 4, '1', '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_answers`
--

CREATE TABLE `test_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `test_id` int(10) UNSIGNED DEFAULT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `correct` tinyint(4) DEFAULT 0,
  `option_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_answers`
--

INSERT INTO `test_answers` (`id`, `user_id`, `test_id`, `question_id`, `correct`, `option_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 1, 0, 2, '2020-06-12 12:23:23', '2020-06-12 12:23:23', NULL),
(2, 1, 3, 1, 1, 1, '2020-06-12 12:25:08', '2020-06-12 12:25:08', NULL),
(3, 2, 4, 1, 1, 1, '2020-06-12 12:32:31', '2020-06-12 12:32:31', NULL),
(4, 1, 5, 1, 1, 1, '2020-06-12 12:34:25', '2020-06-12 12:34:25', NULL),
(5, 1, 6, 1, 0, 2, '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(6, 1, 6, 2, 1, 4, '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(7, 1, 7, 2, 0, 3, '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(8, 1, 7, 1, 1, 1, '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(9, 1, 8, 1, 0, 2, '2020-06-12 13:26:09', '2020-06-12 13:26:09', NULL),
(10, 1, 8, 2, 0, 3, '2020-06-12 13:26:09', '2020-06-12 13:26:09', NULL),
(11, 1, 9, 2, 1, 4, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(12, 1, 9, 1, 1, 1, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(13, 1, 9, 3, 1, 5, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(14, 1, 10, 1, 1, 1, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(15, 1, 10, 2, 0, 3, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(16, 1, 10, 3, 1, 5, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(17, 4, 11, 3, 0, 6, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(18, 4, 11, 1, 1, 1, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(19, 4, 11, 2, 0, 3, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tudo bom', '2020-06-12 12:21:40', '2020-06-12 12:21:40', NULL),
(2, 'Qual e a promocao vodacom do momento?', '2020-06-15 15:40:31', '2020-06-15 15:40:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$GdubO8p..1F4Ic60m0e6Nu3H.0T5k6fhRmd3ozDuqaN.dBD83J9ue', 1, '9sSlKfJGzE4pbmXK5PiLZHm6s5kgoU1U8CTAT2wLp6UM0r1vldADtKAJvIDB', NULL, NULL, NULL),
(2, 'Alberto Matsinhe', 'alberto@gmail.com', '$2y$10$v51qY27xW9oBQel3U1I3o.MsDQBzfttKD6VPKvweBA1nnuXCLz7gm', 2, 'QvXkaxK0z8cuoUTZwxwk7BvbbJaymwjOYe5lOm0om3X6YcUEi0cMuSb1xVTm', '2020-06-12 12:30:14', '2020-06-12 12:31:10', NULL),
(3, 'Abdul Sumail - NcSoftware', 'abdulsumail@gmail.com', '$2y$10$RWuyo.YrO3vw7adEzA1oVu6K172EBNogRx7BO4AmjHNkK1TE6S0Zq', NULL, 'E6rDSzceaTNw1Ust7MIYGezHDBYAhjs3TpH3fCynm7w8vfmseoCIPfga7XlO', '2020-06-12 13:05:14', '2020-07-13 16:04:13', '2020-07-13 16:04:13'),
(4, 'Abdul Sumail', 'a.sumail@malariaconsortium.org', '$2y$10$TqivipBYhOt6PHtZCNarUOMuSeghz213KBgsoBVOeFaWJiIN8xEs2', NULL, NULL, '2020-07-06 09:13:29', '2020-07-13 16:04:20', '2020-07-13 16:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE `user_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'created', 'tests', 1, '2020-06-12 12:16:01', '2020-06-12 12:16:01', NULL),
(2, 1, 'created', 'tests', 1, '2020-06-12 12:16:01', '2020-06-12 12:16:01', NULL),
(3, 1, 'updated', 'users', 1, '2020-06-12 12:19:44', '2020-06-12 12:19:44', NULL),
(4, 1, 'created', 'topics', 1, '2020-06-12 12:21:40', '2020-06-12 12:21:40', NULL),
(5, 1, 'created', 'questions', 1, '2020-06-12 12:22:49', '2020-06-12 12:22:49', NULL),
(6, 1, 'created', 'questions_options', 1, '2020-06-12 12:22:49', '2020-06-12 12:22:49', NULL),
(7, 1, 'created', 'questions_options', 2, '2020-06-12 12:22:49', '2020-06-12 12:22:49', NULL),
(8, 1, 'created', 'tests', 2, '2020-06-12 12:23:23', '2020-06-12 12:23:23', NULL),
(9, 1, 'created', 'test_answers', 1, '2020-06-12 12:23:23', '2020-06-12 12:23:23', NULL),
(10, 1, 'created', 'tests', 2, '2020-06-12 12:23:23', '2020-06-12 12:23:23', NULL),
(11, 1, 'created', 'tests', 3, '2020-06-12 12:25:08', '2020-06-12 12:25:08', NULL),
(12, 1, 'created', 'test_answers', 2, '2020-06-12 12:25:08', '2020-06-12 12:25:08', NULL),
(13, 1, 'created', 'tests', 3, '2020-06-12 12:25:08', '2020-06-12 12:25:08', NULL),
(14, 1, 'updated', 'questions', 1, '2020-06-12 12:27:00', '2020-06-12 12:27:00', NULL),
(15, 1, 'created', 'users', 2, '2020-06-12 12:30:14', '2020-06-12 12:30:14', NULL),
(16, 1, 'updated', 'users', 1, '2020-06-12 12:30:22', '2020-06-12 12:30:22', NULL),
(17, 1, 'updated', 'users', 2, '2020-06-12 12:31:10', '2020-06-12 12:31:10', NULL),
(18, 1, 'updated', 'users', 1, '2020-06-12 12:31:14', '2020-06-12 12:31:14', NULL),
(19, 2, 'created', 'tests', 4, '2020-06-12 12:32:31', '2020-06-12 12:32:31', NULL),
(20, 2, 'created', 'test_answers', 3, '2020-06-12 12:32:31', '2020-06-12 12:32:31', NULL),
(21, 2, 'created', 'tests', 4, '2020-06-12 12:32:31', '2020-06-12 12:32:31', NULL),
(22, 2, 'updated', 'users', 2, '2020-06-12 12:32:59', '2020-06-12 12:32:59', NULL),
(23, 1, 'created', 'tests', 5, '2020-06-12 12:34:25', '2020-06-12 12:34:25', NULL),
(24, 1, 'created', 'test_answers', 4, '2020-06-12 12:34:25', '2020-06-12 12:34:25', NULL),
(25, 1, 'created', 'tests', 5, '2020-06-12 12:34:25', '2020-06-12 12:34:25', NULL),
(26, 1, 'created', 'questions', 2, '2020-06-12 12:35:43', '2020-06-12 12:35:43', NULL),
(27, 1, 'created', 'questions_options', 3, '2020-06-12 12:35:43', '2020-06-12 12:35:43', NULL),
(28, 1, 'created', 'questions_options', 4, '2020-06-12 12:35:43', '2020-06-12 12:35:43', NULL),
(29, 1, 'updated', 'users', 1, '2020-06-12 12:59:31', '2020-06-12 12:59:31', NULL),
(30, 1, 'updated', 'users', 1, '2020-06-12 13:01:57', '2020-06-12 13:01:57', NULL),
(31, 3, 'updated', 'users', 3, '2020-06-12 13:05:28', '2020-06-12 13:05:28', NULL),
(32, 1, 'updated', 'users', 1, '2020-06-12 13:07:13', '2020-06-12 13:07:13', NULL),
(33, 1, 'created', 'tests', 6, '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(34, 1, 'created', 'test_answers', 5, '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(35, 1, 'created', 'test_answers', 6, '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(36, 1, 'created', 'tests', 6, '2020-06-12 13:22:18', '2020-06-12 13:22:18', NULL),
(37, 1, 'created', 'tests', 7, '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(38, 1, 'created', 'test_answers', 7, '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(39, 1, 'created', 'test_answers', 8, '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(40, 1, 'created', 'tests', 7, '2020-06-12 13:22:53', '2020-06-12 13:22:53', NULL),
(41, 1, 'created', 'tests', 8, '2020-06-12 13:26:09', '2020-06-12 13:26:09', NULL),
(42, 1, 'created', 'test_answers', 9, '2020-06-12 13:26:09', '2020-06-12 13:26:09', NULL),
(43, 1, 'created', 'test_answers', 10, '2020-06-12 13:26:09', '2020-06-12 13:26:09', NULL),
(44, 1, 'created', 'tests', 8, '2020-06-12 13:26:09', '2020-06-12 13:26:09', NULL),
(45, 1, 'updated', 'users', 1, '2020-06-12 13:28:15', '2020-06-12 13:28:15', NULL),
(46, 1, 'created', 'topics', 2, '2020-06-15 15:40:31', '2020-06-15 15:40:31', NULL),
(47, 1, 'created', 'questions', 3, '2020-06-15 15:42:26', '2020-06-15 15:42:26', NULL),
(48, 1, 'created', 'questions_options', 5, '2020-06-15 15:42:26', '2020-06-15 15:42:26', NULL),
(49, 1, 'created', 'questions_options', 6, '2020-06-15 15:42:26', '2020-06-15 15:42:26', NULL),
(50, 1, 'created', 'tests', 9, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(51, 1, 'created', 'test_answers', 11, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(52, 1, 'created', 'test_answers', 12, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(53, 1, 'created', 'test_answers', 13, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(54, 1, 'created', 'tests', 9, '2020-06-15 15:43:29', '2020-06-15 15:43:29', NULL),
(55, 1, 'created', 'tests', 10, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(56, 1, 'created', 'test_answers', 14, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(57, 1, 'created', 'test_answers', 15, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(58, 1, 'created', 'test_answers', 16, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(59, 1, 'created', 'tests', 10, '2020-06-15 15:43:56', '2020-06-15 15:43:56', NULL),
(60, 1, 'updated', 'users', 1, '2020-06-15 15:46:35', '2020-06-15 15:46:35', NULL),
(61, 4, 'created', 'tests', 11, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(62, 4, 'created', 'test_answers', 17, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(63, 4, 'created', 'test_answers', 18, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(64, 4, 'created', 'test_answers', 19, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(65, 4, 'created', 'tests', 11, '2020-07-06 09:14:08', '2020-07-06 09:14:08', NULL),
(66, 1, 'deleted', 'users', 3, '2020-07-13 16:04:13', '2020-07-13 16:04:13', NULL),
(67, 1, 'deleted', 'users', 4, '2020-07-13 16:04:20', '2020-07-13 16:04:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_256_topic_topic_id_question` (`topic_id`),
  ADD KEY `questions_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `questions_options`
--
ALTER TABLE `questions_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_257_question_question_id_questions_option` (`question_id`),
  ADD KEY `questions_options_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_254_user_user_id_result` (`user_id`),
  ADD KEY `fk_257_question_question_id_result` (`question_id`),
  ADD KEY `results_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `test_answers`
--
ALTER TABLE `test_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_answers_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_253_role_role_id_user` (`role_id`),
  ADD KEY `users_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_254_user_user_id_user_action` (`user_id`),
  ADD KEY `user_actions_deleted_at_index` (`deleted_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions_options`
--
ALTER TABLE `questions_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test_answers`
--
ALTER TABLE `test_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_256_topic_topic_id_question` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `questions_options`
--
ALTER TABLE `questions_options`
  ADD CONSTRAINT `fk_257_question_question_id_questions_option` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_254_user_user_id_result` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_257_question_question_id_result` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_253_role_role_id_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD CONSTRAINT `fk_254_user_user_id_user_action` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
