-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Ago-2020 às 15:53
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnsmtz_08`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `codigo`, `numero`, `nome`, `estado`, `data`, `created_at`, `updated_at`) VALUES
(3, NULL, '8745454454', 'Desconhecido', 'activo', NULL, NULL, NULL),
(4, NULL, '2588485548', 'Desconhecido', 'activo', NULL, NULL, NULL),
(5, NULL, '8450521211', 'Desconhecido', 'activo', NULL, NULL, NULL),
(6, NULL, '8450521212', 'Desconhecido', 'activo', NULL, NULL, NULL),
(7, NULL, '8444444482', 'Desconhecido', 'activo', NULL, NULL, NULL),
(8, NULL, '845052124222', 'Desconhecido', 'activo', NULL, NULL, NULL),
(9, NULL, '845052121111', 'Desconhecido', 'activo', NULL, NULL, NULL),
(10, NULL, '8450521211111', 'Desconhecido', 'activo', NULL, NULL, NULL),
(11, NULL, '84505212111112', 'Desconhecido', 'activo', NULL, NULL, NULL),
(12, NULL, '845052121222', 'Desconhecido', 'activo', NULL, NULL, NULL),
(13, NULL, '8335052121', 'Desconhecido', 'activo', NULL, NULL, NULL),
(14, NULL, '845052121122', 'Desconhecido', 'activo', NULL, NULL, NULL),
(15, NULL, '84505212111111', 'Desconhecido', 'activo', NULL, NULL, NULL),
(16, NULL, '841245623', 'Desconhecido', 'activo', NULL, NULL, NULL),
(17, NULL, '84545545445', 'Desconhecido', 'activo', NULL, NULL, NULL),
(18, NULL, '841234567', 'Desconhecido', 'activo', NULL, NULL, NULL),
(19, NULL, '8412345671', 'Desconhecido', 'activo', NULL, NULL, NULL),
(20, NULL, '2187878781', 'Desconhecido', 'activo', NULL, NULL, NULL),
(21, NULL, '878888888', 'Desconhecido', 'activo', NULL, NULL, NULL),
(22, NULL, '87878787', 'Desconhecido', 'activo', NULL, NULL, NULL),
(23, NULL, '8877878788778', 'Desconhecido', 'activo', NULL, NULL, NULL),
(24, NULL, '84545444', 'Desconhecido', 'activo', NULL, NULL, NULL),
(25, NULL, '87251445545', 'Desconhecido', 'activo', NULL, NULL, NULL),
(26, NULL, '22112121212', 'Desconhecido', 'activo', NULL, NULL, NULL),
(27, NULL, '8787878787', 'Desconhecido', 'activo', NULL, NULL, NULL),
(28, NULL, '81212121', 'Desconhecido', 'activo', NULL, NULL, NULL),
(29, NULL, '812121216', 'Desconhecido', 'activo', NULL, NULL, NULL),
(30, NULL, '84545455', 'Desconhecido', 'activo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_subscricao`
--

CREATE TABLE `detalhes_subscricao` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscricao_id` int(11) DEFAULT NULL,
  `pergunta_id` int(11) DEFAULT NULL,
  `resposta_id` int(11) DEFAULT NULL,
  `pergunta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activo',
  `resposta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correcta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `detalhes_subscricao`
--

INSERT INTO `detalhes_subscricao` (`id`, `codigo`, `subscricao_id`, `pergunta_id`, `resposta_id`, `pergunta`, `estado`, `resposta`, `correcta`, `pontos`, `preco`, `created_at`, `updated_at`) VALUES
(1, '1514440030001', 1, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 13:14:44', '2020-08-22 13:14:47'),
(2, '1514440030001', 1, 2, NULL, 'Quem fui o ultimo presidente de Angola?', 'activo', NULL, NULL, NULL, NULL, '2020-08-22 13:14:47', NULL),
(3, '1515580040001', 2, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 13:15:58', '2020-08-22 13:16:03'),
(4, '1515580040001', 2, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 13:16:03', '2020-08-22 13:16:05'),
(5, '1515580040001', 2, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 13:16:05', '2020-08-22 13:16:07'),
(6, '1515580040001', 2, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 13:16:07', '2020-08-22 13:16:09'),
(11, '1625500050001', 4, 1, 3, 'Onde se localiza Mocambique?', 'desactivo', 'Europa', 'no', 0, NULL, '2020-08-22 14:25:51', '2020-08-22 14:33:04'),
(12, '1627460060001', 5, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 14:27:46', '2020-08-22 14:35:51'),
(13, '1628500070001', 6, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 14:28:50', '2020-08-22 14:29:22'),
(14, '1628500070001', 6, 2, NULL, 'Quem fui o ultimo presidente de Angola?', 'activo', NULL, NULL, NULL, NULL, '2020-08-22 14:29:22', NULL),
(15, '1625500050001', 4, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 14:33:04', '2020-08-22 14:33:09'),
(16, '1625500050001', 4, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 14:33:09', '2020-08-22 14:33:14'),
(17, '1625500050001', 4, 4, 12, 'Quem e\' Bill Gates', 'desactivo', 'Empresario bilionario Amercano', 'yes', 5, NULL, '2020-08-22 14:33:14', '2020-08-22 15:39:00'),
(18, '1627460060001', 5, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 14:35:51', '2020-08-22 15:35:03'),
(19, '1638170080001', 7, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 14:38:17', '2020-08-22 14:38:20'),
(20, '1638170080001', 7, 2, NULL, 'Quem fui o ultimo presidente de Angola?', 'activo', NULL, NULL, NULL, NULL, '2020-08-22 14:38:20', NULL),
(21, '1641320090001', 8, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 14:41:32', '2020-08-22 15:12:59'),
(22, '1648440100001', 9, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 14:48:44', '2020-08-22 15:43:08'),
(23, '1652470110001', 10, 1, NULL, 'Onde se localiza Mocambique?', 'activo', NULL, NULL, NULL, NULL, '2020-08-22 14:52:47', NULL),
(24, '1654210120001', 11, 1, 4, 'Onde se localiza Mocambique?', 'desactivo', 'Asia', 'no', 0, NULL, '2020-08-22 14:54:21', '2020-08-22 14:54:51'),
(25, '1654210120001', 11, 2, 7, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos santos', 'yes', 10, NULL, '2020-08-22 14:54:51', '2020-08-22 14:55:10'),
(26, '1654210120001', 11, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 14:55:10', '2020-08-22 14:55:14'),
(27, '1654210120001', 11, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 14:55:14', '2020-08-22 14:55:18'),
(28, '1659460130001', 12, 1, 3, 'Onde se localiza Mocambique?', 'desactivo', 'Europa', 'no', 0, NULL, '2020-08-22 14:59:46', '2020-08-22 14:59:53'),
(29, '1659460130001', 12, 2, 7, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos santos', 'yes', 10, NULL, '2020-08-22 14:59:53', '2020-08-22 15:00:02'),
(30, '1659460130001', 12, 3, 11, 'Quantos Habitantes tem a China?', 'desactivo', '2 Bilhoes de habitantes', 'no', 0, NULL, '2020-08-22 15:00:02', '2020-08-22 15:00:05'),
(31, '1659460130001', 12, 4, 14, 'Quem e\' Bill Gates', 'desactivo', 'Investidor Russo', 'no', 0, NULL, '2020-08-22 15:00:05', '2020-08-22 15:00:11'),
(32, '1641320090001', 8, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 15:12:59', '2020-08-22 15:13:02'),
(33, '1641320090001', 8, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 15:13:02', '2020-08-22 15:13:06'),
(34, '1641320090001', 8, 4, 12, 'Quem e\' Bill Gates', 'desactivo', 'Empresario bilionario Amercano', 'yes', 5, NULL, '2020-08-22 15:13:06', '2020-08-22 15:13:12'),
(35, '1627460060001', 5, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 15:35:04', '2020-08-22 15:35:11'),
(36, '1627460060001', 5, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 15:35:11', '2020-08-22 15:35:13'),
(37, '1739470140001', 13, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 15:39:50', '2020-08-22 15:39:58'),
(38, '1739470140001', 13, 2, 7, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos santos', 'yes', 10, NULL, '2020-08-22 15:40:03', '2020-08-22 15:40:06'),
(39, '1739470140001', 13, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 15:40:06', '2020-08-22 15:40:09'),
(40, '1739470140001', 13, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 15:40:10', '2020-08-22 15:40:12'),
(41, '1648440100001', 9, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 15:43:08', '2020-08-22 15:43:10'),
(42, '1648440100001', 9, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 15:43:10', '2020-08-22 15:43:16'),
(43, '1648440100001', 9, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 15:43:16', '2020-08-22 15:43:19'),
(44, '1747180150001', 14, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 15:47:18', '2020-08-22 15:47:23'),
(45, '1747180150001', 14, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 15:47:23', '2020-08-22 15:47:27'),
(46, '1747180150001', 14, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 15:47:27', '2020-08-22 15:47:29'),
(47, '1747180150001', 14, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 15:47:29', '2020-08-22 15:47:30'),
(48, '1752270160001', 15, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 15:52:27', '2020-08-22 15:52:30'),
(49, '1752270160001', 15, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 15:52:30', '2020-08-22 15:52:32'),
(50, '1752270160001', 15, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 15:52:32', '2020-08-22 15:52:34'),
(51, '1752270160001', 15, 4, 12, 'Quem e\' Bill Gates', 'desactivo', 'Empresario bilionario Amercano', 'yes', 5, NULL, '2020-08-22 15:52:34', '2020-08-22 15:52:36'),
(52, '1820380170001', 16, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 16:20:38', '2020-08-22 16:20:43'),
(53, '1820380170001', 16, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 16:20:43', '2020-08-22 16:20:45'),
(54, '1820380170001', 16, 3, 11, 'Quantos Habitantes tem a China?', 'desactivo', '2 Bilhoes de habitantes', 'no', 0, NULL, '2020-08-22 16:20:45', '2020-08-22 16:20:47'),
(55, '1820380170001', 16, 4, 12, 'Quem e\' Bill Gates', 'desactivo', 'Empresario bilionario Amercano', 'yes', 5, NULL, '2020-08-22 16:20:47', '2020-08-25 09:02:45'),
(56, '2137090180001', 17, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 19:37:09', '2020-08-22 19:37:17'),
(57, '2137090180001', 17, 2, 7, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos santos', 'yes', 10, NULL, '2020-08-22 19:37:17', '2020-08-22 19:37:39'),
(58, '2137090180001', 17, 3, 11, 'Quantos Habitantes tem a China?', 'desactivo', '2 Bilhoes de habitantes', 'no', 0, NULL, '2020-08-22 19:37:39', '2020-08-22 19:37:50'),
(59, '2137090180001', 17, 4, 15, 'Quem e\' Bill Gates', 'desactivo', 'Empresario e fisiocultorista amercano', 'no', 0, NULL, '2020-08-22 19:37:50', '2020-08-22 19:39:04'),
(60, '2143550190001', 18, 1, NULL, 'Onde se localiza Mocambique?', 'activo', NULL, NULL, NULL, NULL, '2020-08-22 19:43:55', NULL),
(61, '2145420200001', 19, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 19:45:42', '2020-08-22 19:46:28'),
(62, '2145420200001', 19, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 19:46:28', '2020-08-22 19:47:10'),
(63, '2145420200001', 19, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 19:47:10', '2020-08-22 19:47:28'),
(64, '2145420200001', 19, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 19:47:28', '2020-08-22 19:47:44'),
(65, '2149450210001', 20, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 19:49:45', '2020-08-22 19:49:49'),
(66, '2149450210001', 20, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 19:49:49', '2020-08-22 19:49:52'),
(67, '2149450210001', 20, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 19:49:52', '2020-08-22 19:49:56'),
(68, '2149450210001', 20, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 19:49:56', '2020-08-22 19:50:00'),
(69, '2152330220001', 21, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 19:52:33', '2020-08-22 19:52:41'),
(70, '2152330220001', 21, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 19:52:41', '2020-08-22 19:52:45'),
(71, '2152330220001', 21, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 19:52:45', '2020-08-22 19:52:48'),
(72, '2152330220001', 21, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 19:52:48', '2020-08-22 19:52:51'),
(73, '2154230230001', 22, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 19:54:23', '2020-08-22 19:54:26'),
(74, '2154230230001', 22, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 19:54:26', '2020-08-22 19:54:30'),
(75, '2154230230001', 22, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 19:54:30', '2020-08-22 19:54:34'),
(76, '2154230230001', 22, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 19:54:34', '2020-08-22 19:54:38'),
(77, '2155160240001', 23, 1, 1, 'Onde se localiza Mocambique?', 'desactivo', 'America', 'no', 0, NULL, '2020-08-22 19:55:16', '2020-08-22 19:55:20'),
(78, '2155160240001', 23, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 19:55:20', '2020-08-22 19:55:23'),
(79, '2155160240001', 23, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 19:55:23', '2020-08-22 19:55:26'),
(80, '2155160240001', 23, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 19:55:26', '2020-08-22 19:55:30'),
(81, '2159220250001', 24, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 19:59:22', '2020-08-22 19:59:25'),
(82, '2159220250001', 24, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 19:59:25', '2020-08-22 19:59:28'),
(83, '2159220250001', 24, 3, 11, 'Quantos Habitantes tem a China?', 'desactivo', '2 Bilhoes de habitantes', 'no', 0, NULL, '2020-08-22 19:59:28', '2020-08-22 19:59:31'),
(84, '2159220250001', 24, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 19:59:31', '2020-08-22 19:59:34'),
(85, '2201180260001', 25, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 20:01:18', '2020-08-22 20:01:21'),
(86, '2201180260001', 25, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 20:01:21', '2020-08-22 20:01:24'),
(87, '2201180260001', 25, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-22 20:01:24', '2020-08-22 20:01:27'),
(88, '2201180260001', 25, 4, 13, 'Quem e\' Bill Gates', 'desactivo', 'Empresario Sul Americano', 'no', 0, NULL, '2020-08-22 20:01:27', '2020-08-22 20:01:31'),
(89, '2202310270001', 26, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 20:02:31', '2020-08-22 20:02:34'),
(90, '2202310270001', 26, 2, 6, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos Cantos', 'no', 0, NULL, '2020-08-22 20:02:34', '2020-08-22 20:02:37'),
(91, '2202310270001', 26, 3, 11, 'Quantos Habitantes tem a China?', 'desactivo', '2 Bilhoes de habitantes', 'no', 0, NULL, '2020-08-22 20:02:37', '2020-08-22 20:02:40'),
(92, '2202310270001', 26, 4, 15, 'Quem e\' Bill Gates', 'desactivo', 'Empresario e fisiocultorista amercano', 'no', 0, NULL, '2020-08-22 20:02:40', '2020-08-22 20:02:42'),
(93, '2204260280001', 27, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 20:04:26', '2020-08-22 20:04:30'),
(94, '2204260280001', 27, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 20:04:30', '2020-08-22 20:04:33'),
(95, '2204260280001', 27, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 20:04:33', '2020-08-22 20:04:36'),
(96, '2204260280001', 27, 4, 12, 'Quem e\' Bill Gates', 'desactivo', 'Empresario bilionario Amercano', 'yes', 5, NULL, '2020-08-22 20:04:36', '2020-08-22 20:04:40'),
(97, '2208140280002', 28, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 20:08:14', '2020-08-22 20:08:28'),
(98, '2208140280002', 28, 2, 8, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Joao Lorenco', 'no', 0, NULL, '2020-08-22 20:08:28', '2020-08-22 20:08:33'),
(99, '2208140280002', 28, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 20:08:33', '2020-08-22 20:08:52'),
(100, '2208140280002', 28, 4, 15, 'Quem e\' Bill Gates', 'desactivo', 'Empresario e fisiocultorista amercano', 'no', 0, NULL, '2020-08-22 20:08:52', '2020-08-22 20:09:07'),
(101, '2210090290001', 29, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 20:10:09', '2020-08-22 20:10:20'),
(102, '2210090290001', 29, 2, 5, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Agostinho Neto', 'no', 0, NULL, '2020-08-22 20:10:20', '2020-08-22 20:10:49'),
(103, '2210090290001', 29, 3, 9, 'Quantos Habitantes tem a China?', 'desactivo', 'Menos de 1 Bilao', 'no', 0, NULL, '2020-08-22 20:10:49', '2020-08-22 20:10:57'),
(104, '2210090290001', 29, 4, 14, 'Quem e\' Bill Gates', 'desactivo', 'Investidor Russo', 'no', 0, NULL, '2020-08-22 20:10:57', '2020-08-22 20:11:04'),
(105, '2216060300001', 30, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-22 20:16:06', '2020-08-22 20:16:17'),
(106, '2216060300001', 30, 2, NULL, 'Quem fui o ultimo presidente de Angola?', 'activo', NULL, NULL, NULL, NULL, '2020-08-22 20:16:17', NULL),
(107, '1102530170002', 31, 1, 2, 'Onde se localiza Mocambique?', 'desactivo', 'Africa', 'yes', 5, NULL, '2020-08-25 09:02:53', '2020-08-25 09:02:55'),
(108, '1102530170002', 31, 2, 7, 'Quem fui o ultimo presidente de Angola?', 'desactivo', 'Jose Eduardo dos santos', 'yes', 10, NULL, '2020-08-25 09:02:55', '2020-08-25 09:03:01'),
(109, '1102530170002', 31, 3, 10, 'Quantos Habitantes tem a China?', 'desactivo', 'Mais de um Bilhao', 'yes', 10, NULL, '2020-08-25 09:03:01', '2020-08-25 09:03:06'),
(110, '1102530170002', 31, 4, 12, 'Quem e\' Bill Gates', 'desactivo', 'Empresario bilionario Amercano', 'yes', 5, NULL, '2020-08-25 09:03:06', '2020-08-25 09:03:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_valores`
--

CREATE TABLE `detalhes_valores` (
  `id` int(10) UNSIGNED NOT NULL,
  `recolha_id` int(11) DEFAULT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `quantidade` double DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `nr_recolha` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `detalhes_valores`
--

INSERT INTO `detalhes_valores` (`id`, `recolha_id`, `descricao`, `stock_id`, `tipo`, `valor`, `quantidade`, `preco`, `nr_recolha`, `user`, `created_at`, `updated_at`) VALUES
(30, 1, '1.00', '1', 'moeda', 0, 0, 1, NULL, 2, NULL, NULL),
(31, 1, '2.00', '2', 'moeda', 15, 7.5, 2, NULL, 2, NULL, NULL),
(32, 1, '5.00', '3', 'moeda', 275, 55, 5, NULL, 2, NULL, NULL),
(33, 1, '10.00', '4', 'moeda', 250, 25, 10, NULL, 2, NULL, NULL),
(34, 1, '20.00', '5', 'moeda', 360, 18, 20, NULL, 2, NULL, NULL),
(35, 1, '50.00', '6', 'moeda', 150, 3, 50, NULL, 2, NULL, NULL),
(36, 1, '100.00', '7', 'moeda', 400, 4, 100, NULL, 2, NULL, NULL),
(37, 1, '200.00', '8', 'moeda', 7200, 36, 200, NULL, 2, NULL, NULL),
(38, 1, '500.00', '9', 'moeda', 6500, 13, 500, NULL, 2, NULL, NULL),
(39, 1, '1000.00', '10', 'moeda', 10000, 10, 1000, NULL, 2, NULL, NULL),
(40, 1, 'senha do valor2402.8', 'senha_20', 'senha', 0, 0, 2402.8, NULL, 2, NULL, NULL),
(41, 1, 'senha do valor1306.8', 'senha_21', 'senha', 0, 0, 1306.8, NULL, 2, NULL, NULL),
(42, 1, 'senha do valor1201.4', 'senha_8', 'senha', 0, 0, 1201.4, NULL, 2, NULL, NULL),
(43, 1, 'senha do valor676.1', 'senha_14', 'senha', 0, 0, 676.1, NULL, 2, NULL, NULL),
(44, 1, 'senha do valor600.7', 'senha_12', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(45, 1, 'senha do valor600.7', 'senha_4', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(46, 1, 'senha do valor400', 'senha_6', 'senha', 0, 0, 400, NULL, 2, NULL, NULL),
(47, 1, 'senha do valor300.35', 'senha_10', 'senha', 0, 0, 300.35, NULL, 2, NULL, NULL),
(48, 1, 'senha do valor21.3', 'senha_18', 'senha', 0, 0, 21.3, NULL, 2, NULL, NULL),
(49, 1, 'senha do valor1225.4', 'first_codo', 'senha', 2450.8, 2, 1225.4, NULL, 2, NULL, NULL),
(50, 1, 'senha do valor0', 'second_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(51, 1, 'senha do valor0', 'third_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(52, 1, 'pos 0', 'pos_code', 'pos', 0, 1, 0, NULL, 2, NULL, NULL),
(53, 1, 'cheque do valor32.8', 'third_codo', 'cheque', 32.8, 1, 32.8, NULL, 2, NULL, NULL),
(54, 2, '1.00', '1', 'moeda', 0, 0, 1, NULL, 2, NULL, NULL),
(55, 2, '2.00', '2', 'moeda', 0, 0, 2, NULL, 2, NULL, NULL),
(56, 2, '5.00', '3', 'moeda', 0, 0, 5, NULL, 2, NULL, NULL),
(57, 2, '10.00', '4', 'moeda', 10, 1, 10, NULL, 2, NULL, NULL),
(58, 2, '20.00', '5', 'moeda', 20, 1, 20, NULL, 2, NULL, NULL),
(59, 2, '50.00', '6', 'moeda', 200, 4, 50, NULL, 2, NULL, NULL),
(60, 2, '100.00', '7', 'moeda', 900, 9, 100, NULL, 2, NULL, NULL),
(61, 2, '200.00', '8', 'moeda', 50000, 250, 200, NULL, 2, NULL, NULL),
(62, 2, '500.00', '9', 'moeda', 25500, 51, 500, NULL, 2, NULL, NULL),
(63, 2, '1000.00', '10', 'moeda', 32000, 32, 1000, NULL, 2, NULL, NULL),
(64, 2, 'senha do valor2402.8', 'senha_20', 'senha', 0, 0, 2402.8, NULL, 2, NULL, NULL),
(65, 2, 'senha do valor1306.8', 'senha_21', 'senha', 0, 0, 1306.8, NULL, 2, NULL, NULL),
(66, 2, 'senha do valor1201.4', 'senha_8', 'senha', 1201.4, 1, 1201.4, NULL, 2, NULL, NULL),
(67, 2, 'senha do valor676.1', 'senha_14', 'senha', 0, 0, 676.1, NULL, 2, NULL, NULL),
(68, 2, 'senha do valor600.7', 'senha_4', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(69, 2, 'senha do valor600.7', 'senha_12', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(70, 2, 'senha do valor400', 'senha_6', 'senha', 0, 0, 400, NULL, 2, NULL, NULL),
(71, 2, 'senha do valor300.35', 'senha_10', 'senha', 0, 0, 300.35, NULL, 2, NULL, NULL),
(72, 2, 'senha do valor21.3', 'senha_18', 'senha', 0, 0, 21.3, NULL, 2, NULL, NULL),
(73, 2, 'senha do valor1225.4', 'first_codo', 'senha', 2450.8, 2, 1225.4, NULL, 2, NULL, NULL),
(74, 2, 'senha do valor612.7', 'second_codo', 'senha', 612.7, 1, 612.7, NULL, 2, NULL, NULL),
(75, 2, 'senha do valor600.7', 'third_codo', 'senha', 600.7, 1, 600.7, NULL, 2, NULL, NULL),
(76, 2, 'pos 97195.58', 'pos_code', 'pos', 97195.58, 1, 97195.58, NULL, 2, NULL, NULL),
(77, 2, 'cheque do valor0', 'third_codo', 'cheque', 0, 1, 0, NULL, 2, NULL, NULL),
(78, 3, '1.00', '1', 'moeda', 1, 1, 1, NULL, 2, NULL, NULL),
(79, 3, '2.00', '2', 'moeda', 0, 0, 2, NULL, 2, NULL, NULL),
(80, 3, '5.00', '3', 'moeda', 35, 7, 5, NULL, 2, NULL, NULL),
(81, 3, '10.00', '4', 'moeda', 10, 1, 10, NULL, 2, NULL, NULL),
(82, 3, '20.00', '5', 'moeda', 240, 12, 20, NULL, 2, NULL, NULL),
(83, 3, '50.00', '6', 'moeda', 1600, 32, 50, NULL, 2, NULL, NULL),
(84, 3, '100.00', '7', 'moeda', 38200, 382, 100, NULL, 2, NULL, NULL),
(85, 3, '200.00', '8', 'moeda', 46600, 233, 200, NULL, 2, NULL, NULL),
(86, 3, '500.00', '9', 'moeda', 109000, 218, 500, NULL, 2, NULL, NULL),
(87, 3, '1000.00', '10', 'moeda', 72000, 72, 1000, NULL, 2, NULL, NULL),
(88, 3, 'senha do valor2402.8', 'senha_20', 'senha', 0, 0, 2402.8, NULL, 2, NULL, NULL),
(89, 3, 'senha do valor1306.8', 'senha_21', 'senha', 0, 0, 1306.8, NULL, 2, NULL, NULL),
(90, 3, 'senha do valor1201.4', 'senha_8', 'senha', 0, 0, 1201.4, NULL, 2, NULL, NULL),
(91, 3, 'senha do valor676.1', 'senha_14', 'senha', 0, 0, 676.1, NULL, 2, NULL, NULL),
(92, 3, 'senha do valor600.7', 'senha_12', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(93, 3, 'senha do valor600.7', 'senha_4', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(94, 3, 'senha do valor400', 'senha_6', 'senha', 0, 0, 400, NULL, 2, NULL, NULL),
(95, 3, 'senha do valor300.35', 'senha_10', 'senha', 0, 0, 300.35, NULL, 2, NULL, NULL),
(96, 3, 'senha do valor21.3', 'senha_18', 'senha', 0, 0, 21.3, NULL, 2, NULL, NULL),
(97, 3, 'senha do valor1225.4', 'first_codo', 'senha', 2450.8, 2, 1225.4, NULL, 2, NULL, NULL),
(98, 3, 'senha do valor0', 'second_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(99, 3, 'senha do valor0', 'third_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(100, 3, 'pos 26375', 'pos_code', 'pos', 26375, 1, 26375, NULL, 2, NULL, NULL),
(101, 3, 'cheque do valor16673.9', 'third_codo', 'cheque', 16673.9, 1, 16673.9, NULL, 2, NULL, NULL),
(102, 4, '1.00', '1', 'moeda', 0, 0, 1, NULL, 2, NULL, NULL),
(103, 4, '2.00', '2', 'moeda', 0, 0, 2, NULL, 2, NULL, NULL),
(104, 4, '5.00', '3', 'moeda', 5, 1, 5, NULL, 2, NULL, NULL),
(105, 4, '10.00', '4', 'moeda', 0, 0, 10, NULL, 2, NULL, NULL),
(106, 4, '20.00', '5', 'moeda', 340, 17, 20, NULL, 2, NULL, NULL),
(107, 4, '50.00', '6', 'moeda', 1150, 23, 50, NULL, 2, NULL, NULL),
(108, 4, '100.00', '7', 'moeda', 3200, 32, 100, NULL, 2, NULL, NULL),
(109, 4, '200.00', '8', 'moeda', 2200, 11, 200, NULL, 2, NULL, NULL),
(110, 4, '500.00', '9', 'moeda', 18000, 36, 500, NULL, 2, NULL, NULL),
(111, 4, '1000.00', '10', 'moeda', 20000, 20, 1000, NULL, 2, NULL, NULL),
(112, 4, 'senha do valor\n                                   ', 'senha_20', 'senha', 0, 0, 2402.8, NULL, 2, NULL, NULL),
(113, 4, 'senha do valor\n                                   ', 'senha_21', 'senha', 0, 0, 1306.8, NULL, 2, NULL, NULL),
(114, 4, 'senha do valor\n                                   ', 'senha_8', 'senha', 6007, 5, 1201.4, NULL, 2, NULL, NULL),
(115, 4, 'senha do valor\n                                   ', 'senha_14', 'senha', 0, 0, 676.1, NULL, 2, NULL, NULL),
(116, 4, 'senha do valor\n                                   ', 'senha_4', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(117, 4, 'senha do valor\n                                   ', 'senha_12', 'senha', 0, 0, 600.7, NULL, 2, NULL, NULL),
(118, 4, 'senha do valor\n                                   ', 'senha_6', 'senha', 0, 0, 400, NULL, 2, NULL, NULL),
(119, 4, 'senha do valor\n                                   ', 'senha_10', 'senha', 0, 0, 300.35, NULL, 2, NULL, NULL),
(120, 4, 'senha do valor\n                                   ', 'senha_18', 'senha', 0, 0, 21.3, NULL, 2, NULL, NULL),
(121, 4, 'senha do valor0', 'first_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(122, 4, 'senha do valor0', 'second_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(123, 4, 'senha do valor0', 'third_codo', 'senha', 0, 0, 0, NULL, 2, NULL, NULL),
(124, 4, 'pos 4520.5', 'pos_code', 'pos', 4520.5, 1, 4520.5, NULL, 2, NULL, NULL),
(125, 4, 'cheque do valor100', 'third_codo', 'cheque', 100, 1, 100, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `topico_id` int(11) DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `explicacao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_register` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `descricao`, `pontos`, `topico_id`, `tipo`, `estado`, `explicacao`, `user_register`, `user_update`, `created_at`, `updated_at`) VALUES
(1, 'Onde se localiza Mocambique?', 5, 1, NULL, 'activo', '', 2, NULL, '2020-08-22 12:33:54', NULL),
(2, 'Quem fui o ultimo presidente de Angola?', 10, 1, NULL, 'activo', '', 2, NULL, '2020-08-22 12:36:39', NULL),
(3, 'Quantos Habitantes tem a China?', 10, 1, NULL, 'activo', '', 2, NULL, '2020-08-22 12:38:20', NULL),
(4, 'Quem e\' Bill Gates', 5, 1, NULL, 'activo', '', 2, NULL, '2020-08-22 12:40:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage_relationship', 'Manage Relationship', 'Manage Relationship', NULL, NULL),
(2, 'manage_customer', 'Manage Customers', 'Manage Customers', NULL, NULL),
(3, 'add_customer', 'Add Customer', 'Add Customer', NULL, NULL),
(4, 'edit_customer', 'Edit Customer', 'Edit Customer', NULL, NULL),
(5, 'delete_customer', 'Delete Customer', 'Delete Customer', NULL, NULL),
(6, 'manage_supplier', 'Manage Suppliers', 'Manage Suppliers', NULL, NULL),
(7, 'add_supplier', 'Add Supplier', 'Add Supplier', NULL, NULL),
(8, 'edit_supplier', 'Edit Supplier', 'Edit Supplier', NULL, NULL),
(9, 'delete_supplier', 'Delete Supplier', 'Delete Supplier', NULL, NULL),
(10, 'manage_item', 'Manage Items', 'Manage Items', NULL, NULL),
(11, 'add_item', 'Add Item', 'Add Item', NULL, NULL),
(12, 'edit_item', 'Edit Item', 'Edit Item', NULL, NULL),
(13, 'delete_item', 'Delete Item', 'Delete Item', NULL, NULL),
(14, 'manage_sale', 'Manage Sales', 'Manage Sales', NULL, NULL),
(15, 'manage_quotation', 'Manage Quotations', 'Manage Quotations', NULL, NULL),
(16, 'add_quotation', 'Add Quotation', 'Add Quotation', NULL, NULL),
(17, 'edit_quotation', 'Edit Quotation', 'Edit Quotation', NULL, NULL),
(18, 'delete_quotation', 'Delete Quotation', 'Delete Quotation', NULL, NULL),
(19, 'manage_invoice', 'Manage Invoices', 'Manage Invoices', NULL, NULL),
(20, 'add_invoice', 'Add Invoice', 'Add Invoice', NULL, NULL),
(21, 'edit_invoice', 'Edit Invoice', 'Edit Invoice', NULL, NULL),
(22, 'delete_invoice', 'Delete Invoice', 'Delete Invoice', NULL, NULL),
(23, 'manage_payment', 'Manage Payment', 'Manage Payment', NULL, NULL),
(24, 'add_payment', 'Add Payment', 'Add Payment', NULL, NULL),
(25, 'edit_payment', 'Edit Payment', 'Edit Payment', NULL, NULL),
(26, 'delete_payment', 'Delete Payment', 'Delete Payment', NULL, NULL),
(27, 'manage_purchase', 'Manage Purchase', 'Manage Purchase', NULL, NULL),
(28, 'add_purchase', 'Add Purchase', 'Add Purchase', NULL, NULL),
(29, 'edit_purchase', 'Edit Purchase', 'Edit Purchase', NULL, NULL),
(30, 'delete_purchase', 'Delete Purchase', 'Delete Purchase', NULL, NULL),
(31, 'manage_banking_transaction', 'Manage Banking & Transactions', 'Manage Banking & Transactions', NULL, NULL),
(32, 'manage_bank_account', 'Manage Bank Accounts', 'Manage Bank Accounts', NULL, NULL),
(33, 'add_bank_account', 'Add Bank Account', 'Add Bank Account', NULL, NULL),
(34, 'edit_bank_account', 'Edit Bank Account', 'Edit Bank Account', NULL, NULL),
(35, 'delete_bank_account', 'Delete Bank Account', 'Delete Bank Account', NULL, NULL),
(36, 'manage_deposit', 'Manage Deposit', 'Manage Deposit', NULL, NULL),
(37, 'add_deposit', 'Add Deposit', 'Add Deposit', NULL, NULL),
(38, 'edit_deposit', 'Edit Deposit', 'Edit Deposit', NULL, NULL),
(39, 'delete_deposit', 'Delete Deposit', 'Delete Deposit', NULL, NULL),
(40, 'manage_balance_transfer', 'Manage Balance Transfer', 'Manage Balance Transfer', NULL, NULL),
(41, 'add_balance_transfer', 'Add Balance Transfer', 'Add Balance Transfer', NULL, NULL),
(42, 'edit_balance_transfer', 'Edit Balance Transfer', 'Edit Balance Transfer', NULL, NULL),
(43, 'delete_balance_transfer', 'Delete Balance Transfer', 'Delete Balance Transfer', NULL, NULL),
(44, 'manage_transaction', 'Manage Transactions', 'Manage Transactions', NULL, NULL),
(45, 'manage_expense', 'Manage Expense', 'Manage Expense', NULL, NULL),
(46, 'add_expense', 'Add Expense', 'Add Expense', NULL, NULL),
(47, 'edit_expense', 'Edit Expense', 'Edit Expense', NULL, NULL),
(48, 'delete_expense', 'Delete Expense', 'Delete Expense', NULL, NULL),
(49, 'manage_report', 'Manage Report', 'Manage Report', NULL, NULL),
(50, 'manage_stock_on_hand', 'Manage Inventory Stock On Hand', 'Manage Inventory Stock On Hand', NULL, NULL),
(51, 'manage_sale_report', 'Manage Sales Report', 'Manage Sales Report', NULL, NULL),
(52, 'manage_sale_history_report', 'Manage Sales History Report', 'Manage Sales History Report', NULL, NULL),
(53, 'manage_purchase_report', 'Manage Purchase Report', 'Manage Purchase Report', NULL, NULL),
(54, 'manage_team_report', 'Manage Team Member Report', 'Manage Team Member Report', NULL, NULL),
(55, 'manage_expense_report', 'Manage Expense Report', 'Manage Expense Report', NULL, NULL),
(56, 'manage_income_report', 'Manage Income Report', 'Manage Income Report', NULL, NULL),
(57, 'manage_income_vs_expense', 'Manage Income vs Expense', 'Manage Income vs Expense', NULL, NULL),
(58, 'manage_setting', 'Manage Settings', 'Manage Settings', NULL, NULL),
(59, 'manage_company_setting', 'Manage Company Setting', 'Manage Company Setting', NULL, NULL),
(60, 'manage_team_member', 'Manage Team Member', 'Manage Team Member', NULL, NULL),
(61, 'add_team_member', 'Add Team Member', 'Add Team Member', NULL, NULL),
(62, 'edit_team_member', 'Edit Team Member', 'Edit Team Member', NULL, NULL),
(63, 'delete_team_member', 'Delete Team Member', 'Delete Team Member', NULL, NULL),
(64, 'manage_role', 'Manage Roles', 'Manage Roles', NULL, NULL),
(65, 'add_role', 'Add Role', 'Add Role', NULL, NULL),
(66, 'edit_role', 'Edit Role', 'Edit Role', NULL, NULL),
(67, 'delete_role', 'Delete Role', 'Delete Role', NULL, NULL),
(68, 'manage_location', 'Manage Location', 'Manage Location', NULL, NULL),
(69, 'add_location', 'Add Location', 'Add Location', NULL, NULL),
(70, 'edit_location', 'Edit Location', 'Edit Location', NULL, NULL),
(71, 'delete_location', 'Delete Location', 'Delete Location', NULL, NULL),
(72, 'manage_general_setting', 'Manage General Settings', 'Manage General Settings', NULL, NULL),
(73, 'manage_item_category', 'Manage Item Category', 'Manage Item Category', NULL, NULL),
(74, 'add_item_category', 'Add Item Category', 'Add Item Category', NULL, NULL),
(75, 'edit_item_category', 'Edit Item Category', 'Edit Item Category', NULL, NULL),
(76, 'delete_item_category', 'Delete Item Category', 'Delete Item Category', NULL, NULL),
(77, 'manage_income_expense_category', 'Manage Income Expense Category', 'Manage Income Expense Category', NULL, NULL),
(78, 'add_income_expense_category', 'Add Income Expense Category', 'Add Income Expense Category', NULL, NULL),
(79, 'edit_income_expense_category', 'Edit Income Expense Category', 'Edit Income Expense Category', NULL, NULL),
(80, 'delete_income_expense_category', 'Delete Income Expense Category', 'Delete Income Expense Category', NULL, NULL),
(81, 'manage_unit', 'Manage Unit', 'Manage Unit', NULL, NULL),
(82, 'add_unit', 'Add Unit', 'Add Unit', NULL, NULL),
(83, 'edit_unit', 'Edit Unit', 'Edit Unit', NULL, NULL),
(84, 'delete_unit', 'Delete Unit', 'Delete Unit', NULL, NULL),
(85, 'manage_db_backup', 'Manage Database Backup', 'Manage Database Backup', NULL, NULL),
(86, 'add_db_backup', 'Add Database Backup', 'Add Database Backup', NULL, NULL),
(87, 'delete_db_backup', 'Delete Database Backup', 'Delete Database Backup', NULL, NULL),
(88, 'manage_email_setup', 'Manage Email Setup', 'Manage Email Setup', NULL, NULL),
(89, 'manage_finance', 'Manage Finance', 'Manage Finance', NULL, NULL),
(90, 'manage_tax', 'Manage Taxs', 'Manage Taxs', NULL, NULL),
(91, 'add_tax', 'Add Tax', 'Add Tax', NULL, NULL),
(92, 'edit_tax', 'Edit Tax', 'Edit Tax', NULL, NULL),
(93, 'delete_tax', 'Delete Tax', 'Delete Tax', NULL, NULL),
(94, 'manage_currency', 'Manage Currency', 'Manage Currency', NULL, NULL),
(95, 'add_currency', 'Add Currency', 'Add Currency', NULL, NULL),
(96, 'edit_currency', 'Edit Currency', 'Edit Currency', NULL, NULL),
(97, 'delete_currency', 'Delete Currency', 'Delete Currency', NULL, NULL),
(98, 'manage_payment_term', 'Manage Payment Term', 'Manage Payment Term', NULL, NULL),
(99, 'add_payment_term', 'Add Payment Term', 'Add Payment Term', NULL, NULL),
(100, 'edit_payment_term', 'Edit Payment Term', 'Edit Payment Term', NULL, NULL),
(101, 'delete_payment_term', 'Delete Payment Term', 'Delete Payment Term', NULL, NULL),
(102, 'manage_payment_method', 'Manage Payment Method', 'Manage Payment Method', NULL, NULL),
(103, 'add_payment_method', 'Add Payment Method', 'Add Payment Method', NULL, NULL),
(104, 'edit_payment_method', 'Edit Payment Method', 'Edit Payment Method', NULL, NULL),
(105, 'delete_payment_method', 'Delete Payment Method', 'Delete Payment Method', NULL, NULL),
(106, 'manage_payment_gateway', 'Manage Payment Method', 'Manage Payment Gateway', NULL, NULL),
(107, 'manage_email_template', 'Manage Email Template', 'Manage Email Template', NULL, NULL),
(108, 'manage_quotation_email_template', 'Manage Quotation Template', 'Manage Quotation Email Template', NULL, NULL),
(109, 'manage_invoice_email_template', 'Manage Invoice Email Template', 'Manage Invoice Email Template', NULL, NULL),
(110, 'manage_payment_email_template', 'Manage Payment Email Template', 'Manage Payment Email Template', NULL, NULL),
(111, 'manage_preference', 'Manage Preference', 'Manage Preference', NULL, NULL),
(112, 'manage_barcode', 'Manage barcode/label', 'Manage barcode/label', NULL, NULL),
(113, 'download_db_backup', 'Download Database Backup', 'Download Database Backup', NULL, NULL),
(114, 'update_version', 'Update version', 'Update version', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 3),
(3, 5),
(4, 1),
(4, 3),
(4, 5),
(5, 1),
(5, 3),
(5, 5),
(6, 1),
(6, 3),
(6, 5),
(7, 1),
(7, 3),
(7, 5),
(8, 1),
(8, 3),
(8, 5),
(9, 1),
(9, 3),
(9, 5),
(10, 1),
(10, 3),
(10, 5),
(11, 1),
(11, 3),
(11, 5),
(12, 1),
(12, 3),
(12, 5),
(13, 1),
(13, 3),
(13, 5),
(14, 1),
(14, 3),
(14, 5),
(15, 1),
(15, 3),
(15, 5),
(16, 1),
(16, 3),
(16, 5),
(17, 1),
(17, 3),
(17, 5),
(18, 1),
(18, 3),
(18, 5),
(19, 1),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(21, 5),
(22, 1),
(22, 5),
(23, 1),
(23, 5),
(24, 1),
(24, 5),
(25, 1),
(25, 5),
(26, 1),
(26, 5),
(27, 1),
(27, 5),
(28, 1),
(28, 5),
(29, 1),
(29, 5),
(30, 1),
(30, 5),
(31, 1),
(31, 5),
(32, 1),
(32, 5),
(33, 1),
(33, 5),
(34, 1),
(34, 5),
(35, 1),
(35, 5),
(36, 1),
(36, 5),
(37, 1),
(37, 5),
(38, 1),
(38, 5),
(39, 1),
(39, 5),
(40, 1),
(40, 5),
(41, 1),
(41, 5),
(42, 1),
(42, 5),
(43, 1),
(43, 5),
(44, 1),
(44, 5),
(45, 1),
(45, 5),
(46, 1),
(46, 5),
(47, 1),
(47, 5),
(48, 1),
(48, 5),
(49, 1),
(49, 5),
(50, 1),
(50, 5),
(51, 1),
(51, 5),
(52, 1),
(52, 5),
(53, 1),
(53, 5),
(54, 1),
(54, 5),
(55, 1),
(55, 5),
(56, 1),
(56, 5),
(57, 1),
(57, 5),
(58, 1),
(58, 5),
(59, 1),
(59, 5),
(60, 1),
(60, 5),
(61, 1),
(61, 5),
(62, 1),
(62, 5),
(63, 1),
(63, 5),
(64, 1),
(64, 5),
(65, 1),
(65, 5),
(66, 1),
(66, 5),
(67, 1),
(67, 5),
(68, 1),
(68, 5),
(69, 1),
(69, 5),
(70, 1),
(70, 5),
(71, 1),
(71, 5),
(72, 1),
(72, 5),
(73, 1),
(73, 5),
(74, 1),
(74, 5),
(75, 1),
(75, 5),
(76, 1),
(76, 5),
(77, 1),
(77, 5),
(78, 1),
(78, 5),
(79, 1),
(79, 5),
(80, 1),
(80, 5),
(81, 1),
(81, 5),
(82, 1),
(82, 5),
(83, 1),
(83, 5),
(84, 1),
(84, 5),
(85, 1),
(85, 5),
(86, 1),
(86, 5),
(87, 1),
(87, 5),
(88, 1),
(88, 5),
(89, 1),
(89, 5),
(90, 1),
(90, 5),
(91, 1),
(91, 5),
(92, 1),
(92, 5),
(93, 1),
(93, 5),
(94, 1),
(94, 5),
(95, 1),
(95, 5),
(96, 1),
(96, 5),
(97, 1),
(97, 5),
(98, 1),
(98, 5),
(99, 1),
(99, 5),
(100, 1),
(100, 5),
(101, 1),
(101, 5),
(102, 1),
(102, 5),
(103, 1),
(103, 5),
(104, 1),
(104, 5),
(105, 1),
(105, 5),
(106, 1),
(106, 5),
(107, 1),
(107, 5),
(108, 1),
(108, 5),
(109, 1),
(109, 5),
(110, 1),
(110, 5),
(111, 1),
(111, 5),
(112, 1),
(112, 5),
(113, 1),
(113, 5),
(114, 1),
(114, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `preference`
--

CREATE TABLE `preference` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `preference`
--

INSERT INTO `preference` (`id`, `category`, `field`, `value`) VALUES
(1, 'preference', 'row_per_page', '25'),
(2, 'preference', 'date_format', '1'),
(3, 'preference', 'date_sepa', '-'),
(4, 'preference', 'soft_name', 'goBilling'),
(5, 'company', 'site_short_name', 'HNS'),
(6, 'preference', 'percentage', '0'),
(7, 'preference', 'quantity', '0'),
(8, 'preference', 'date_format_type', 'dd-mm-yyyy'),
(9, 'company', 'company_name', 'HNS COMBUSTÍVEIS '),
(10, 'company', 'company_email', 'montepuez@hnscombustiveis.co.mz'),
(11, 'company', 'company_phone', '873335511'),
(12, 'company', 'company_street', 'Sucursal: Av. Eduardo Mondlane, Posto Exito'),
(13, 'company', 'company_city', 'Montepuez '),
(14, 'company', 'company_state', 'Cabo Delgado'),
(15, 'company', 'company_zipCode', '.'),
(16, 'company', 'company_country_id', 'Moçambique'),
(17, 'company', 'dflt_lang', 'po'),
(18, 'company', 'dflt_currency_id', '1'),
(19, 'company', 'sates_type_id', '1'),
(20, 'company', 'company_nuit', '400862354'),
(23, 'logotipo', 'fotografia', 'logo1.jpg'),
(21, 'preference', 'version', '2.0'),
(24, 'preference', 'senha_impressao', '$2y$10$ePa/Z8ocsj1UDOditDuAKejyeSufawX3MTPv8kKAPUNOM0IdrjdYu'),
(25, 'validad_licenca', 'data_expiracao', '17/01/2021'),
(26, 'Definicoes ', 'alert_senha_credito', 'yes'),
(22, 'preference', 'date_version', '2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `q_subscricoes`
--

CREATE TABLE `q_subscricoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `topico_id` int(11) DEFAULT NULL,
  `nr_questoes` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `q_subscricoes`
--

INSERT INTO `q_subscricoes` (`id`, `codigo`, `cliente_id`, `topico_id`, `nr_questoes`, `data_inicio`, `data_fim`, `pontos`, `preco`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1514440030001', 3, 1, NULL, '2020-08-22', '2020-08-23', 0, NULL, 'activo', '2020-08-22 13:14:44', NULL),
(2, '1515580040001', 4, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 13:15:58', NULL),
(4, '1625500050001', 5, 1, NULL, '2020-08-22', '2020-08-23', 15, 150, 'fechado', '2020-08-22 14:25:50', NULL),
(5, '1627460060001', 6, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 14:27:46', NULL),
(6, '1628500070001', 7, 1, NULL, '2020-08-22', '2020-08-23', 0, 150, 'activo', '2020-08-22 14:28:50', NULL),
(7, '1638170080001', 8, 1, NULL, '2020-08-22', '2020-08-23', 0, 150, 'activo', '2020-08-22 14:38:17', NULL),
(8, '1641320090001', 9, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 14:41:32', NULL),
(9, '1648440100001', 10, 1, NULL, '2020-08-22', '2020-08-23', 15, 150, 'fechado', '2020-08-22 14:48:44', NULL),
(10, '1652470110001', 11, 1, NULL, '2020-08-22', '2020-08-23', NULL, 150, 'activo', '2020-08-22 14:52:47', NULL),
(11, '1654210120001', 12, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 14:54:21', NULL),
(12, '1659460130001', 13, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 14:59:46', NULL),
(13, '1739470140001', 14, 1, NULL, '2020-08-22', '2020-08-23', 20, 150, 'fechado', '2020-08-22 15:39:47', NULL),
(14, '1747180150001', 15, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 15:47:18', NULL),
(15, '1752270160001', 16, 1, NULL, '2020-08-22', '2020-08-23', 20, 150, 'fechado', '2020-08-22 15:52:27', NULL),
(16, '1820380170001', 17, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 16:20:38', NULL),
(17, '2137090180001', 18, 1, NULL, '2020-08-22', '2020-08-23', 15, 150, 'fechado', '2020-08-22 19:37:09', NULL),
(18, '2143550190001', 19, 1, NULL, '2020-08-22', '2020-08-23', NULL, 150, 'activo', '2020-08-22 19:43:55', NULL),
(19, '2145420200001', 20, 1, NULL, '2020-08-22', '2020-08-23', 0, 150, 'fechado', '2020-08-22 19:45:42', NULL),
(20, '2149450210001', 21, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 19:49:45', NULL),
(21, '2152330220001', 22, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 19:52:33', NULL),
(22, '2154230230001', 23, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 19:54:23', NULL),
(23, '2155160240001', 24, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 19:55:16', NULL),
(24, '2159220250001', 25, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 19:59:22', NULL),
(25, '2201180260001', 26, 1, NULL, '2020-08-22', '2020-08-23', 15, 150, 'fechado', '2020-08-22 20:01:18', NULL),
(26, '2202310270001', 27, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 20:02:31', NULL),
(27, '2204260280001', 28, 1, NULL, '2020-08-22', '2020-08-23', 10, 150, 'fechado', '2020-08-22 20:04:26', NULL),
(28, '2208140280002', 28, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 20:08:14', NULL),
(29, '2210090290001', 29, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'fechado', '2020-08-22 20:10:09', NULL),
(30, '2216060300001', 30, 1, NULL, '2020-08-22', '2020-08-23', 5, 150, 'activo', '2020-08-22 20:16:06', NULL),
(31, '1102530170002', 17, 1, NULL, '2020-08-25', '2020-08-26', 30, 150, 'fechado', '2020-08-25 09:02:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pergunta_id` int(11) DEFAULT NULL,
  `opcao_correcta` int(11) DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_register` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `descricao`, `pergunta_id`, `opcao_correcta`, `estado`, `user_register`, `user_update`, `created_at`, `updated_at`) VALUES
(1, 'America', 1, 0, 'activo', 2, NULL, '2020-08-22 12:33:54', NULL),
(2, 'Africa', 1, 1, 'activo', 2, NULL, '2020-08-22 12:33:54', NULL),
(3, 'Europa', 1, 0, 'activo', 2, NULL, '2020-08-22 12:33:54', NULL),
(4, 'Asia', 1, 0, 'activo', 2, NULL, '2020-08-22 12:33:54', NULL),
(5, 'Agostinho Neto', 2, 0, 'activo', 2, NULL, '2020-08-22 12:36:39', NULL),
(6, 'Jose Eduardo dos Cantos', 2, 0, 'activo', 2, NULL, '2020-08-22 12:36:39', NULL),
(7, 'Jose Eduardo dos santos', 2, 1, 'activo', 2, NULL, '2020-08-22 12:36:39', NULL),
(8, 'Joao Lorenco', 2, 0, 'activo', 2, NULL, '2020-08-22 12:36:39', NULL),
(9, 'Menos de 1 Bilao', 3, 0, 'activo', 2, NULL, '2020-08-22 12:38:20', NULL),
(10, 'Mais de um Bilhao', 3, 1, 'activo', 2, NULL, '2020-08-22 12:38:20', NULL),
(11, '2 Bilhoes de habitantes', 3, 0, 'activo', 2, NULL, '2020-08-22 12:38:20', NULL),
(12, 'Empresario bilionario Amercano', 4, 1, 'activo', 2, NULL, '2020-08-22 12:40:01', NULL),
(13, 'Empresario Sul Americano', 4, 0, 'activo', 2, NULL, '2020-08-22 12:40:01', NULL),
(14, 'Investidor Russo', 4, 0, 'activo', 2, NULL, '2020-08-22 12:40:01', NULL),
(15, 'Empresario e fisiocultorista amercano', 4, 0, 'activo', 2, NULL, '2020-08-22 12:40:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin User', NULL, NULL),
(3, 'Normal', 'Normal', 'Funcionario Normal', NULL, NULL),
(4, 'neto', 'sd', 'sd', NULL, NULL),
(5, 'Super Admin', 'Super Admin', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE `topicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `user_register` int(11) DEFAULT NULL,
  `user_edit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id`, `codigo`, `preco`, `descricao`, `estado`, `data_inicio`, `data_fim`, `user_register`, `user_edit`, `created_at`, `updated_at`) VALUES
(1, 'mm20', 150, 'Cultura Geral ', 'activo', '2020-08-22', '2021-08-29', 2, NULL, '2020-08-22 12:31:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `real_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `real_name`, `role_id`, `phone`, `email`, `picture`, `inactive`, `remember_token`, `created_at`, `updated_at`, `location_id`) VALUES
(2, '', '$2y$10$8ViVievM8EcT.0mZaqCmR.rfTSJdWfheXml7.RrqViqaHNd3pS/au', 'Admin ', 5, '7777777', 'admin@admin.com', '2019-02-27 15-21-28-blank-profile.png', 0, 'eYE5IXLYdjZ0MVEvvqAc9YKzY4JzwOaGc0dKqHZ6rkKmZ5rWaeiInbfQh3xW', '2020-08-19 17:05:55', '2020-08-22 16:42:54', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalhes_subscricao`
--
ALTER TABLE `detalhes_subscricao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalhes_valores`
--
ALTER TABLE `detalhes_valores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_subscricoes`
--
ALTER TABLE `q_subscricoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `detalhes_subscricao`
--
ALTER TABLE `detalhes_subscricao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `detalhes_valores`
--
ALTER TABLE `detalhes_valores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `preference`
--
ALTER TABLE `preference`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `q_subscricoes`
--
ALTER TABLE `q_subscricoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
