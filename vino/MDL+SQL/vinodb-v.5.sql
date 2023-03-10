-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mars 2023 à 20:15
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vinodb`
--

-- --------------------------------------------------------

--
-- Structure de la table `bouteille__has__cellier`
--

CREATE TABLE `bouteille__has__cellier` (
  `vino__bouteille_id` bigint(20) NOT NULL,
  `vino__cellier_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lisa', 'lisa@gmail.com', NULL, '$2y$10$F8U047rFhvKVNMxOIK5POOWaNOnCmtZZVD3Wk0G1UUlaSRaoDgDFi', NULL, '2023-03-09 22:57:14', '2023-03-09 22:57:14'),
(2, 'Alex', 'candualexandru@gmail.com', NULL, '$2y$10$0D32ACM00yUeUDmACZ7STuXadc4qKHg3SlAMdMLKHCeyHnNWwnXlW', NULL, '2023-03-10 00:13:50', '2023-03-10 00:13:50'),
(3, 'Lester', 'kamba@kamba.com', NULL, '$2y$10$8Kk36uptnxbPe/Hw7D0jZO5euogO6PxaEdC9xSYe5P1sZGBDLSB3O', NULL, '2023-03-10 00:14:31', '2023-03-10 00:14:31'),
(4, 'potato', 'potato@potato.com', NULL, '$2y$10$BfaHyustoEPjR0spkEdSJuK8bUAwVRGxKOq44iXyx1hcQ1Ud6a7aG', NULL, '2023-03-10 00:15:08', '2023-03-10 00:15:08');

-- --------------------------------------------------------

--
-- Structure de la table `vino__bouteille`
--

CREATE TABLE `vino__bouteille` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code_saq` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix_saq` varchar(45) NOT NULL,
  `url_saq` varchar(255) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `format` varchar(45) NOT NULL,
  `vino__type_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vino__bouteille`
--

--
-- Structure de la table `vino__cellier`
--

CREATE TABLE `vino__cellier` (
  `id` bigint(20) NOT NULL,
  `cellier_user_id` bigint(20) NOT NULL,
  `date_achat` varchar(45) DEFAULT NULL,
  `garde_jusqua` varchar(45) DEFAULT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `quantite` varchar(45) DEFAULT NULL,
  `millesime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vino__type`
--

CREATE TABLE `vino__type` (
  `id` bigint(20) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vino__type`
--

INSERT INTO `vino__type` (`id`, `type`) VALUES
(1, 'Vin rouge'),
(2, 'Vin blanc');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bouteille__has__cellier`
--
ALTER TABLE `bouteille__has__cellier`
  ADD PRIMARY KEY (`vino__bouteille_id`,`vino__cellier_id`),
  ADD KEY `fk_vino__bouteille_has_vino__cellier_vino__cellier1_idx` (`vino__cellier_id`),
  ADD KEY `fk_vino__bouteille_has_vino__cellier_vino__bouteille1_idx` (`vino__bouteille_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vino__bouteille`
--
ALTER TABLE `vino__bouteille`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vino__bouteille_vino__type1_idx` (`vino__type_id`);

--
-- Index pour la table `vino__cellier`
--
ALTER TABLE `vino__cellier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cellier_user_id_idx` (`cellier_user_id`);

--
-- Index pour la table `vino__type`
--
ALTER TABLE `vino__type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vino__bouteille`
--
ALTER TABLE `vino__bouteille`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT pour la table `vino__cellier`
--
ALTER TABLE `vino__cellier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vino__type`
--
ALTER TABLE `vino__type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bouteille__has__cellier`
--
ALTER TABLE `bouteille__has__cellier`
  ADD CONSTRAINT `fk_vino__bouteille_has_vino__cellier_vino__bouteille1` FOREIGN KEY (`vino__bouteille_id`) REFERENCES `vino__bouteille` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vino__bouteille_has_vino__cellier_vino__cellier1` FOREIGN KEY (`vino__cellier_id`) REFERENCES `vino__cellier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vino__bouteille`
--
ALTER TABLE `vino__bouteille`
  ADD CONSTRAINT `fk_vino__bouteille_vino__type1` FOREIGN KEY (`vino__type_id`) REFERENCES `vino__type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vino__cellier`
--
ALTER TABLE `vino__cellier`
  ADD CONSTRAINT `cellier_user_id` FOREIGN KEY (`cellier_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
