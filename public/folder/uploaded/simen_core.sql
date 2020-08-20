-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 27 août 2019 à 15:22
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simen_core`
--

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `id_etablissement` int(11) NOT NULL,
  `libelle_etablissement` varchar(250) NOT NULL,
  `cycle_etablissement` varchar(50) NOT NULL,
  `etat` enum('-1','1') NOT NULL,
  `date_last_modif` date NOT NULL,
  `date_saisie` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etablissements`
--

INSERT INTO `etablissements` (`id_etablissement`, `libelle_etablissement`, `cycle_etablissement`, `etat`, `date_last_modif`, `date_saisie`) VALUES
(1, 'Lassane HLM', 'Primaire', '1', '2018-06-26', '2018-06-27 18:50:27'),
(2, 'Lassane HLM', 'Primaire', '1', '2018-06-26', '2018-06-27 18:50:27'),
(3, 'Meckhe 1', 'Secondaire', '-1', '2018-06-28', '2018-06-28 12:00:55'),
(4, 'CEM Bargny', 'Moyen', '-1', '2018-06-28', '2018-06-28 19:06:30');

-- --------------------------------------------------------

--
-- Structure de la table `sys_menu`
--

CREATE TABLE `sys_menu` (
  `id_menu` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `etat` enum('-1','1') NOT NULL DEFAULT '1',
  `rang` int(11) NOT NULL DEFAULT 1000,
  `date_last_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_menu`
--

INSERT INTO `sys_menu` (`id_menu`, `code`, `libelle`, `etat`, `rang`, `date_last_modif`) VALUES
(1, 'securite', 'Securite', '1', 1000, '2018-05-16 12:12:17'),
(2, 'parametrages', 'parametrages', '1', 1001, '2018-05-16 12:11:19'),
(10, 'recensement', 'recensement', '1', 1000, '2018-05-16 12:12:44'),
(11, 'affectations', 'affectations', '1', 1000, '2018-05-16 12:13:02'),
(14, 'stock', 'stock', '1', 1000, '2018-05-16 12:13:15');

-- --------------------------------------------------------

--
-- Structure de la table `sys_niits`
--

CREATE TABLE `sys_niits` (
  `id` bigint(20) NOT NULL,
  `id_type_profil` int(10) UNSIGNED NOT NULL,
  `prenom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sexe` enum('masculin','féminin') CHARACTER SET latin1 DEFAULT NULL,
  `tel` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `mot_de_passe` varchar(45) NOT NULL,
  `ien` varchar(50) NOT NULL,
  `code_site` bigint(20) NOT NULL,
  `commentaires` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `etat` enum('actif','suspendu','blocke') NOT NULL DEFAULT 'suspendu',
  `id_op_saisie` bigint(20) NOT NULL,
  `date_creation` timestamp NULL DEFAULT NULL,
  `date_last_modif` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `sys_niits`
--

INSERT INTO `sys_niits` (`id`, `id_type_profil`, `prenom`, `nom`, `sexe`, `tel`, `email`, `mot_de_passe`, `ien`, `code_site`, `commentaires`, `etat`, `id_op_saisie`, `date_creation`, `date_last_modif`) VALUES
(1, 1, 'Simen', 'User', 'masculin', '771002030', '12345@education.sn', 'passer', '12345', 1290902230, NULL, 'actif', 1, NULL, '2018-06-28 19:02:46');

-- --------------------------------------------------------

--
-- Structure de la table `sys_sous_menu`
--

CREATE TABLE `sys_sous_menu` (
  `id_sous_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `etat` enum('-1','1') NOT NULL DEFAULT '1',
  `date_last_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_sous_menu`
--

INSERT INTO `sys_sous_menu` (`id_sous_menu`, `id_menu`, `code`, `libelle`, `etat`, `date_last_modif`) VALUES
(28, 1, 'securite', 'securite', '1', '2018-05-16 12:19:09'),
(29, 2, 'parametrages', 'parametrages', '1', '2018-05-16 12:19:09'),
(30, 10, 'recensement', 'recensement', '1', '2018-05-16 12:19:32'),
(31, 11, 'affectations', 'affectations', '1', '2018-05-16 12:19:32'),
(32, 14, 'stock', 'stock', '1', '2018-05-16 12:19:46'),
(33, 10, 'recenser', 'recenser', '1', '2018-05-16 12:27:20'),
(34, 10, 'valider_affectation', 'Valider affectation', '1', '2018-05-16 12:27:20'),
(35, 10, 'valider_stock', 'Valider stock', '1', '2018-05-16 12:27:40');

-- --------------------------------------------------------

--
-- Structure de la table `sys_type_action`
--

CREATE TABLE `sys_type_action` (
  `id_actions` int(11) NOT NULL,
  `id_type_profil` int(11) UNSIGNED NOT NULL,
  `id_sous_menu` int(11) NOT NULL,
  `d_read` enum('-1','1') NOT NULL DEFAULT '-1',
  `d_add` enum('-1','1') NOT NULL DEFAULT '-1',
  `d_upd` enum('-1','1') NOT NULL DEFAULT '-1',
  `d_del` enum('-1','1') NOT NULL DEFAULT '-1',
  `date_last_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_type_action`
--

INSERT INTO `sys_type_action` (`id_actions`, `id_type_profil`, `id_sous_menu`, `d_read`, `d_add`, `d_upd`, `d_del`, `date_last_modif`) VALUES
(1, 1, 4, '-1', '-1', '-1', '-1', '2018-05-16 12:22:14'),
(2, 6, 30, '1', '1', '1', '1', '2018-05-16 12:29:20'),
(3, 6, 31, '1', '1', '1', '1', '2018-05-16 12:29:20'),
(4, 6, 32, '1', '1', '1', '1', '2018-05-16 12:29:20'),
(5, 1, 28, '1', '1', '1', '1', '2019-08-27 12:55:31'),
(6, 1, 29, '1', '1', '1', '1', '2019-08-27 12:55:31'),
(7, 2, 30, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(8, 2, 31, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(9, 2, 32, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(10, 2, 29, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(11, 6, 33, '1', '1', '1', '1', '2018-05-16 12:29:20'),
(12, 6, 34, '1', '1', '1', '1', '2018-05-16 12:29:20'),
(13, 6, 35, '1', '1', '1', '1', '2018-05-16 12:29:20'),
(14, 3, 30, '1', '1', '1', '1', '2018-05-16 12:31:56'),
(15, 3, 33, '1', '1', '1', '1', '2018-05-16 12:31:56'),
(16, 3, 34, '1', '1', '1', '1', '2018-05-16 12:31:56'),
(17, 3, 35, '1', '1', '1', '1', '2018-05-16 12:31:56'),
(18, 3, 31, '1', '1', '1', '1', '2018-05-16 12:31:56'),
(19, 3, 32, '1', '1', '1', '1', '2018-05-16 12:31:56'),
(20, 2, 33, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(21, 2, 34, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(22, 2, 35, '1', '1', '1', '1', '2018-05-16 16:08:33'),
(23, 1, 30, '1', '1', '1', '1', '2019-08-27 12:55:32'),
(24, 1, 33, '1', '1', '1', '1', '2019-08-27 12:55:32'),
(25, 1, 34, '1', '1', '1', '1', '2019-08-27 12:55:32'),
(26, 1, 35, '1', '1', '1', '1', '2019-08-27 12:55:32'),
(27, 1, 31, '1', '1', '1', '1', '2019-08-27 12:55:32'),
(28, 1, 32, '1', '1', '1', '1', '2019-08-27 12:55:32');

-- --------------------------------------------------------

--
-- Structure de la table `sys_type_profil`
--

CREATE TABLE `sys_type_profil` (
  `id_type_profil` int(10) UNSIGNED NOT NULL,
  `libelle_type_profil` varchar(250) NOT NULL,
  `etat` enum('1','-1') NOT NULL DEFAULT '1',
  `date_last_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_type_profil`
--

INSERT INTO `sys_type_profil` (`id_type_profil`, `libelle_type_profil`, `etat`, `date_last_modif`) VALUES
(1, 'Admin systéme', '1', '2018-02-26 10:05:37'),
(2, 'Administrateur(agent DAGE)', '1', '2018-04-17 16:12:18'),
(3, 'Agent DAGE', '1', '2018-05-15 12:57:38'),
(6, 'Comptable matière/ Gestionnaire', '1', '2018-04-11 12:27:22'),
(7, 'Chef de structure', '1', '2018-04-11 12:27:40');

-- --------------------------------------------------------

--
-- Structure de la table `sys_user`
--

CREATE TABLE `sys_user` (
  `ien` varchar(10) NOT NULL,
  `id_profil` int(10) UNSIGNED NOT NULL,
  `code_str` bigint(20) NOT NULL,
  `statut` enum('0','1') NOT NULL DEFAULT '1',
  `date_last_modif` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_user`
--

INSERT INTO `sys_user` (`ien`, `id_profil`, `code_str`, `statut`, `date_last_modif`) VALUES
('081LVFMT', 6, 2126610070, '1', '2018-05-03 17:05:41'),
('616GEP9D', 1, 1290902230, '1', '2018-05-02 16:39:10'),
('678VEW3D', 6, 2475412190, '1', '2018-05-03 17:06:39'),
('78912GJP', 6, 2210454430, '1', '2018-05-02 11:57:20'),
('856OS0XE', 6, 2268785040, '1', '2018-05-03 17:05:41'),
('956ND48W', 6, 2658070130, '1', '2018-05-03 17:06:39'),
('I87H6T4', 4, 2226888890, '1', '2018-05-02 11:56:10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id_etablissement`),
  ADD UNIQUE KEY `id_etablissement` (`id_etablissement`),
  ADD KEY `id_etablissement_2` (`id_etablissement`);

--
-- Index pour la table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `sys_niits`
--
ALTER TABLE `sys_niits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_op_saisie` (`id_op_saisie`),
  ADD KEY `id_type_profil` (`id_type_profil`);

--
-- Index pour la table `sys_sous_menu`
--
ALTER TABLE `sys_sous_menu`
  ADD PRIMARY KEY (`id_sous_menu`),
  ADD UNIQUE KEY `id_menu_2` (`id_menu`,`code`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Index pour la table `sys_type_action`
--
ALTER TABLE `sys_type_action`
  ADD PRIMARY KEY (`id_actions`),
  ADD KEY `id_sous_menu` (`id_sous_menu`),
  ADD KEY `id_type_profil` (`id_type_profil`);

--
-- Index pour la table `sys_type_profil`
--
ALTER TABLE `sys_type_profil`
  ADD PRIMARY KEY (`id_type_profil`);

--
-- Index pour la table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`ien`),
  ADD UNIQUE KEY `ien` (`ien`),
  ADD KEY `id_profil` (`id_profil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id_etablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `sys_niits`
--
ALTER TABLE `sys_niits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sys_sous_menu`
--
ALTER TABLE `sys_sous_menu`
  MODIFY `id_sous_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `sys_type_action`
--
ALTER TABLE `sys_type_action`
  MODIFY `id_actions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `sys_type_profil`
--
ALTER TABLE `sys_type_profil`
  MODIFY `id_type_profil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sys_niits`
--
ALTER TABLE `sys_niits`
  ADD CONSTRAINT `sys_niits_ibfk_1` FOREIGN KEY (`id_type_profil`) REFERENCES `sys_type_profil` (`id_type_profil`);

--
-- Contraintes pour la table `sys_sous_menu`
--
ALTER TABLE `sys_sous_menu`
  ADD CONSTRAINT `sys_sous_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `sys_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
