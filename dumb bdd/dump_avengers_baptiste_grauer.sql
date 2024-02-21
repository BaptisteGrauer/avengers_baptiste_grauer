-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2024 at 10:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avengers_baptiste_grauer`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240214060730', '2024-02-14 06:07:50', 25),
('DoctrineMigrations\\Version20240218215827', '2024-02-18 21:58:47', 14),
('DoctrineMigrations\\Version20240218220420', '2024-02-18 22:04:27', 54),
('DoctrineMigrations\\Version20240218223842', '2024-02-18 22:38:48', 63),
('DoctrineMigrations\\Version20240220211502', '2024-02-20 21:15:11', 15),
('DoctrineMigrations\\Version20240220212411', '2024-02-20 21:24:14', 11),
('DoctrineMigrations\\Version20240220220646', '2024-02-20 22:06:53', 65);

-- --------------------------------------------------------

--
-- Table structure for table `faune`
--

CREATE TABLE `faune` (
  `id` int NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faune`
--

INSERT INTO `faune` (`id`, `image`) VALUES
(1, 'images/monke.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `flore`
--

CREATE TABLE `flore` (
  `id` int NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flore`
--

INSERT INTO `flore` (`id`, `image`) VALUES
(1, 'images/banane.png');

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `id` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publication` date NOT NULL,
  `nb_pages` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `auteur`, `date_publication`, `nb_pages`) VALUES
(1, 'titre', 'auteur', '2021-01-01', 50);

-- --------------------------------------------------------

--
-- Table structure for table `marque_page`
--

CREATE TABLE `marque_page` (
  `id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marque_page`
--

INSERT INTO `marque_page` (`id`, `url`, `date_creation`, `commentaire`) VALUES
(1, 'https://google.com/', '2022-05-07 17:10:07', 'google'),
(2, 'https//marquepages.com/', '2023-02-14 17:10:59', NULL),
(3, 'https://site.nc/', '2024-02-14 22:34:00', 'Pas de commentaire');

-- --------------------------------------------------------

--
-- Table structure for table `marque_page_mots_cles`
--

CREATE TABLE `marque_page_mots_cles` (
  `marque_page_id` int NOT NULL,
  `mots_cles_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marque_page_mots_cles`
--

INSERT INTO `marque_page_mots_cles` (`marque_page_id`, `mots_cles_id`) VALUES
(3, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mots_cles`
--

CREATE TABLE `mots_cles` (
  `id` int NOT NULL,
  `mot_cle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mots_cles`
--

INSERT INTO `mots_cles` (`id`, `mot_cle`) VALUES
(1, 'site'),
(2, 'blog'),
(3, 'magasin'),
(4, 'bastian');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `faune`
--
ALTER TABLE `faune`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flore`
--
ALTER TABLE `flore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marque_page`
--
ALTER TABLE `marque_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marque_page_mots_cles`
--
ALTER TABLE `marque_page_mots_cles`
  ADD PRIMARY KEY (`marque_page_id`,`mots_cles_id`),
  ADD KEY `IDX_DD7D38C7D59CC0F1` (`marque_page_id`),
  ADD KEY `IDX_DD7D38C7C0BE80DB` (`mots_cles_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `mots_cles`
--
ALTER TABLE `mots_cles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faune`
--
ALTER TABLE `faune`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flore`
--
ALTER TABLE `flore`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marque_page`
--
ALTER TABLE `marque_page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mots_cles`
--
ALTER TABLE `mots_cles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marque_page_mots_cles`
--
ALTER TABLE `marque_page_mots_cles`
  ADD CONSTRAINT `FK_DD7D38C7C0BE80DB` FOREIGN KEY (`mots_cles_id`) REFERENCES `mots_cles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DD7D38C7D59CC0F1` FOREIGN KEY (`marque_page_id`) REFERENCES `marque_page` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
