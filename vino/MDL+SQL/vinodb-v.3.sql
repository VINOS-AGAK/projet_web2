-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 05:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `vino__type`;
CREATE TABLE `vino__type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vino__type`
--

INSERT INTO `vino__type` VALUES(1, 'Vin rouge');
INSERT INTO `vino__type` VALUES(2, 'Vin blanc');

--
-- Structure de la table `vino__bouteille`
--
DROP TABLE IF EXISTS `vino__bouteille`;
CREATE TABLE `vino__bouteille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix_saq` varchar(200) DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `bouteille_type_id` INT NOT NULL,
  PRIMARY KEY (`id`),
   INDEX `fk_vino__bouteille_vino__type1_idx` (`bouteille_type_id` ASC) VISIBLE,
  CONSTRAINT `fk_vino__bouteille_vino__type1`
    FOREIGN KEY (`bouteille_type_id`)
    REFERENCES `vinodb`.`vino__type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = latin1
ENGINE=InnoDB ;
--
-- Indexes for dumped tables
--

--
-- Structure de la table `vino__cellier`
--
DROP TABLE IF EXISTS `vino__cellier`;
CREATE TABLE `vino__cellier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bouteille` int(11) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `garde_jusqua` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `prix` varchar(200) DEFAULT NULL,
  `quantite` varchar(200) DEFAULT NULL,
  `millesime` varchar(200) DEFAULT NULL,
  `cellier_users_id` INT NOT NULL,
  PRIMARY KEY (`id`) ,
INDEX `fk_vino__cellier_users1_idx` (`cellier_users_id` ASC) VISIBLE,
  CONSTRAINT `fk_vino__cellier_users1`
    FOREIGN KEY (`cellier_users_id`)
    REFERENCES `vinodb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
-- ENGINE=InnoDB 
DEFAULT CHARSET=latin1 
AUTO_INCREMENT=10 ;


--
-- Contenu de la table `vino__cellier`
--

INSERT INTO `vino__cellier` VALUES(1, 250, '0000-00-00', '', '', 0, 3, 0, 1);
INSERT INTO `vino__cellier` VALUES(2, 280, '0000-00-00', '', '', 0, 1, 0, 2);
INSERT INTO `vino__cellier` VALUES(3, 300, '2019-01-16', '2020', '2019-01-16', 22, 10, 1999, 2);
INSERT INTO `vino__cellier` VALUES(4, 301, '0000-00-00', '', '', 0, 1, 0, 2);
INSERT INTO `vino__cellier` VALUES(5, 302, '0000-00-00', '', '', 0, 1, 0, 2);
INSERT INTO `vino__cellier` VALUES(6, 303, '0000-00-00', '', '', 0, 1, 0, 2);
INSERT INTO `vino__cellier` VALUES(7, 304, '0000-00-00', '', '', 0, 1, 0, 2);
INSERT INTO `vino__cellier` VALUES(8, 305, '0000-00-00', '', '', 0, 10, 2000, 2);
INSERT INTO `vino__cellier` VALUES(9, 306, '2019-01-26', 'non', '2019-01-26', 23.52, 1, 2015, 2);

-- --------------------------------------------------------


-- -----------------------------------------------------
-- Table `vinodb`.`vino__cellier_has_vino__bouteille`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino__cellier_has_vino__bouteille` (
  `vino__cellier_id` INT NOT NULL,
  `vino__bouteille_id` INT NOT NULL,
  PRIMARY KEY (`vino__cellier_id`, `vino__bouteille_id`),
  INDEX `fk_vino__cellier_has_vino__bouteille_vino__bouteille1_idx` (`vino__bouteille_id` ASC) VISIBLE,
  INDEX `fk_vino__cellier_has_vino__bouteille_vino__cellier1_idx` (`vino__cellier_id` ASC) VISIBLE,
  CONSTRAINT `fk_vino__cellier_has_vino__bouteille_vino__cellier1`
    FOREIGN KEY (`vino__cellier_id`)
    REFERENCES `vinodb`.`vino__cellier` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vino__cellier_has_vino__bouteille_vino__bouteille1`
    FOREIGN KEY (`vino__bouteille_id`)
    REFERENCES `vinodb`.`vino__bouteille` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = latin1;

-- --------------------------------------------------------


--
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
