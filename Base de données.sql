-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 28 mai 2025 à 08:42
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `groupe_bulles_deveil`
--

-- --------------------------------------------------------

--
-- Structure de la table `alertes_manuelles`
--

CREATE TABLE `alertes_manuelles` (
  `id_alerte` int NOT NULL,
  `code_creche` int DEFAULT NULL,
  `titre_alerte` varchar(255) NOT NULL,
  `description_alerte` text,
  `date_evenement` date NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('a_venir','passee','annulee') DEFAULT 'a_venir'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `creche`
--

CREATE TABLE `creche` (
  `code_creche` int NOT NULL,
  `nom_creche` varchar(100) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `num_siret` varchar(14) DEFAULT NULL,
  `num_agrement` varchar(50) DEFAULT NULL,
  `nom_responsable` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `nbre_total_places` int NOT NULL DEFAULT '0',
  `nbre_places_occupees` int NOT NULL DEFAULT '0',
  `nbre_places_libres` int GENERATED ALWAYS AS ((`nbre_total_places` - `nbre_places_occupees`)) STORED,
  `image_fond` varchar(255) DEFAULT 'Creche1.png',
  `statut` varchar(50) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `creche`
--

INSERT INTO `creche` (`code_creche`, `nom_creche`, `date_creation`, `num_siret`, `num_agrement`, `nom_responsable`, `adresse`, `ville`, `nbre_total_places`, `nbre_places_occupees`, `image_fond`, `statut`) VALUES
(1, 'Mantes à l\'Ô - Mantes-la-Jolie', '2018-01-15', '12345678901234', 'AGR-2018-001', 'Marie Dupont MARIE3', '12 rue des Fleurs', 'Mantes-la-Jolie', 0, 0, 'uploads/1747917858_Creche1.png', 'Active'),
(2, 'Les Calinous - Vernon', '2017-05-22', '23456789012345', 'AGR-2017-125', 'Sophie Martinnnn22', '5 avenue Victor Hugo', 'Vernon', 0, 0, 'Creche1.png', 'Active'),
(3, '1-2-3 SOLEIL - Buchelay', '2019-09-10', '34567890123456', 'AGR-2019-087', 'Julie Rousseau DD', '8 allée des Tilleuls', 'Buchelay', 0, 0, 'uploads/1747907844_Creche3.png', 'Active'),
(4, 'Les Coquelicots - Vernon', '2016-11-03', '45678901234567', 'AGR-2016-254', 'Isabelle Leroux', '27 boulevard des Roses', 'Vernon', 0, 0, 'Creche1.png', 'Active'),
(5, 'Les 101 Bambins - Mantes-la-Jolie', '2020-02-28', '56789012345678', 'AGR-2020-033', 'Catherine Dubois', '15 rue de la République', 'Mantes-la-Jolie', 0, 0, 'uploads/1747907865_Creche2.png', 'Active'),
(6, 'Les Coccinelles - Vernon', '2015-07-14', '67890123456789', 'AGR-2015-175', 'Nathalie Girard', '3 place de l\'Église', 'Vernon', 0, 0, 'Creche1.png', 'Active'),
(7, 'Les Capucines - Tourny', '2021-04-05', '78901234567890', 'AGR-2021-042', 'Céline Moreau', '6 rue des Écoles', 'Tourny', 0, 0, 'uploads/1747907904_Creche3.png', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_document` int NOT NULL,
  `code_creche` int NOT NULL,
  `titre_document` varchar(255) NOT NULL,
  `type_document` varchar(100) DEFAULT NULL,
  `statut_document` enum('valide','a_surveiller','expire') DEFAULT 'valide',
  `date_expiration` date DEFAULT NULL,
  `date_import` datetime DEFAULT CURRENT_TIMESTAMP,
  `chemin_fichier` varchar(500) NOT NULL,
  `commentaires` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id_document`, `code_creche`, `titre_document`, `type_document`, `statut_document`, `date_expiration`, `date_import`, `chemin_fichier`, `commentaires`) VALUES
(3, 5, 'AAAAAA', 'règlement', 'valide', '2025-05-16', '2025-05-23 14:56:52', 'uploads/68307094dcc94_anniversaire.png', 'AAAAA'),
(5, 3, 'bb', 'règlement', 'valide', '2025-05-18', '2025-05-23 15:03:54', 'uploads/6830723a7feb8_anniversaire.png', 'kjhgfds');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `poste_occupe` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `date_recrutement` date DEFAULT NULL,
  `lieu_recrutement` varchar(100) DEFAULT NULL,
  `type_contrat` enum('CDD','CDI') DEFAULT NULL,
  `nbre_heure_contrat` varchar(10) DEFAULT NULL,
  `date_fin_contrat` date DEFAULT NULL,
  `observation` text,
  `genre` enum('f','m') DEFAULT NULL,
  `salaire` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `prenom`, `email`, `telephone`, `date_naissance`, `adresse`, `ville`, `poste_occupe`, `role`, `date_recrutement`, `lieu_recrutement`, `type_contrat`, `nbre_heure_contrat`, `date_fin_contrat`, `observation`, `genre`, `salaire`) VALUES
(1, 'Dupont', 'Alice', 'alice.dupont@babyfarm.fr', '0600000001', '1990-03-15', '12 rue des Lilas', 'Vernon', 'Auxiliaire de puériculture', 'Éducateur', '2023-01-10', '2', 'CDI', '35', '2025-12-31', '', 'f', 1800.00),
(2, 'Martin', 'Léa', 'lea.martin@babyfarm.fr', '0600000002', '1992-05-20', '5 avenue Victor Hugo', 'Buchelay', 'Assistant éducatif petite enfance', 'Éducateur', '2022-09-01', '3', 'CDD', '30', '2024-08-30', '', 'f', 1650.00),
(3, 'Moreau', 'Jade', 'jade.moreau@babyfarm.fr', '0600000003', '1991-11-07', '3 rue du Parc', 'Vernon', 'Agent technique de la petite enfance (ATEPE)', 'Éducateur', '2022-06-15', '4', 'CDI', '35', '2026-06-14', '', 'f', 1750.00),
(4, 'Bernard', 'Sophie', 'sophie.bernard@babyfarm.fr', '0600000004', '1989-01-25', '8 impasse des Cerisiers', 'Mantes-la-Jolie', 'Assistant·e maternel·le de crèche familiale', 'Éducateur', '2021-03-12', '1', 'CDI', '35', '2025-03-11', '', 'f', 1850.00),
(5, 'Girard', 'Nina', 'nina.girard@babyfarm.fr', '0600000005', '1993-07-30', '4 place des Tilleuls', 'Mantes-la-Jolie', 'Éducateur·rice de jeunes enfants', 'Éducateur', '2020-09-01', '5', 'CDI', '35', '2024-08-31', '', 'f', 1780.00),
(6, 'Lemoine', 'Lucie', 'lucie.lemoine@babyfarm.fr', '0600000006', '1994-02-18', '21 rue Jean Jaurès', 'Vernon', 'Responsable et adjoint d\'établissement', 'Éducateur', '2023-02-01', '6', 'CDD', '28', '2025-02-01', '', 'f', 1600.00),
(7, 'Boucher', 'Camille', 'camille.boucher@babyfarm.fr', '0600000007', '1990-12-10', '7 boulevard Gambetta', 'Tourny', 'Éducateur·rice de jeunes enfants', 'Éducateur', '2022-04-01', '7', 'CDI', '35', '2026-04-01', '', 'f', 1900.00);

-- --------------------------------------------------------

--
-- Structure de la table `inscription_enfant`
--

CREATE TABLE `inscription_enfant` (
  `id` int NOT NULL,
  `prenom_enfant` varchar(50) DEFAULT NULL,
  `nom_enfant` varchar(50) DEFAULT NULL,
  `date_naissance_enfant` date DEFAULT NULL,
  `lieu_naissance_enfant` varchar(100) DEFAULT NULL,
  `genre_enfant` enum('garçon','fille') DEFAULT NULL,
  `debut_contrat` date DEFAULT NULL,
  `fin_contrat` date DEFAULT NULL,
  `planning_flexible` enum('oui','non') DEFAULT NULL,
  `planning` text,
  `type_parent1` varchar(20) DEFAULT NULL,
  `prenom_parent1` varchar(50) DEFAULT NULL,
  `nom_parent1` varchar(50) DEFAULT NULL,
  `email_parent1` varchar(100) DEFAULT NULL,
  `allocataire_parent1` varchar(30) DEFAULT NULL,
  `tel_fixe_parent1` varchar(20) DEFAULT NULL,
  `tel_portable_parent1` varchar(20) DEFAULT NULL,
  `adresse_parent1` varchar(255) DEFAULT NULL,
  `code_postal_parent1` varchar(10) DEFAULT NULL,
  `ville_parent1` varchar(50) DEFAULT NULL,
  `pays_parent1` varchar(50) DEFAULT NULL,
  `revenu_annuel_parent1` varchar(50) DEFAULT NULL,
  `profession_parent1` varchar(100) DEFAULT NULL,
  `entreprise_parent1` varchar(100) DEFAULT NULL,
  `contrat_entreprise_parent1` enum('Oui','Non') DEFAULT NULL,
  `enfants_charge_parent1` int DEFAULT '0',
  `enfants_handicap_parent1` int DEFAULT '0',
  `type_parent2` varchar(20) DEFAULT NULL,
  `prenom_parent2` varchar(50) DEFAULT NULL,
  `nom_parent2` varchar(50) DEFAULT NULL,
  `email_parent2` varchar(100) DEFAULT NULL,
  `allocataire_parent2` varchar(30) DEFAULT NULL,
  `tel_fixe_parent2` varchar(20) DEFAULT NULL,
  `tel_portable_parent2` varchar(20) DEFAULT NULL,
  `adresse_parent2` varchar(255) DEFAULT NULL,
  `code_postal_parent2` varchar(10) DEFAULT NULL,
  `ville_parent2` varchar(50) DEFAULT NULL,
  `pays_parent2` varchar(50) DEFAULT NULL,
  `revenu_annuel_parent2` varchar(50) DEFAULT NULL,
  `profession_parent2` varchar(100) DEFAULT NULL,
  `entreprise_parent2` varchar(100) DEFAULT NULL,
  `contrat_entreprise_parent2` enum('Oui','Non') DEFAULT NULL,
  `enfants_charge_parent2` int DEFAULT '0',
  `enfants_handicap_parent2` int DEFAULT '0',
  `infos_complementaires` text,
  `date_enregistrement` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `structure_enfant` varchar(255) DEFAULT NULL,
  `Statut` enum('En attente','Inscrit','Archivé','Autre') NOT NULL DEFAULT 'En attente',
  `structure` set('Mantes à l''Ô - Mantes-la-Jolie','Les Calinous - Vernon','1-2-3 SOLEIL - Buchelay','Les Coquelicots - Vernon','Les 101 Bambins - Mantes-la-Jolie','Les Coccinelles - Vernon','Les Capucines - Tourny') DEFAULT NULL,
  `photo_enfant` varchar(255) DEFAULT NULL,
  `id_creche` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscription_enfant`
--

INSERT INTO `inscription_enfant` (`id`, `prenom_enfant`, `nom_enfant`, `date_naissance_enfant`, `lieu_naissance_enfant`, `genre_enfant`, `debut_contrat`, `fin_contrat`, `planning_flexible`, `planning`, `type_parent1`, `prenom_parent1`, `nom_parent1`, `email_parent1`, `allocataire_parent1`, `tel_fixe_parent1`, `tel_portable_parent1`, `adresse_parent1`, `code_postal_parent1`, `ville_parent1`, `pays_parent1`, `revenu_annuel_parent1`, `profession_parent1`, `entreprise_parent1`, `contrat_entreprise_parent1`, `enfants_charge_parent1`, `enfants_handicap_parent1`, `type_parent2`, `prenom_parent2`, `nom_parent2`, `email_parent2`, `allocataire_parent2`, `tel_fixe_parent2`, `tel_portable_parent2`, `adresse_parent2`, `code_postal_parent2`, `ville_parent2`, `pays_parent2`, `revenu_annuel_parent2`, `profession_parent2`, `entreprise_parent2`, `contrat_entreprise_parent2`, `enfants_charge_parent2`, `enfants_handicap_parent2`, `infos_complementaires`, `date_enregistrement`, `structure_enfant`, `Statut`, `structure`, `photo_enfant`, `id_creche`) VALUES
(1, 'Sophie', 'Dumas', '2023-11-07', 'PARIS', '', '0000-00-00', '0000-00-00', '', NULL, 'F', 'Louna', 'Dupont', 'lounadupont12@gmail.com', '', '2345', '2345678', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2025-05-13 22:00:00', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', 'uploads/enfant_1.png', NULL),
(2, '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2025-04-10 12:47:50', NULL, 'En attente', NULL, NULL, NULL),
(3, 'Sarah', 'Dupont', '2022-10-04', '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2025-04-10 12:55:08', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', 'uploads/enfant_3.png', NULL),
(4, '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2025-04-10 12:55:14', NULL, 'En attente', NULL, NULL, NULL),
(5, '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2025-04-10 12:55:24', NULL, 'En attente', NULL, NULL, NULL),
(6, '', '', '0000-00-00', '', 'garçon', '0000-00-00', '0000-00-00', 'oui', NULL, 'Mère', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, 'Père', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, '', '2025-04-10 13:00:56', NULL, 'En attente', NULL, NULL, NULL),
(7, 'Hugo', 'Dubois', '2024-08-15', '', 'garçon', '0000-00-00', '0000-00-00', 'oui', NULL, 'Mère', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, 'Père', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, '', '2025-04-10 13:01:04', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', 'uploads/enfant_7.png', NULL),
(8, 'Malika', 'Brick', '2023-07-14', 'Paris', 'fille', '2025-04-23', '2026-01-14', 'oui', '{\"Lundi\":[\"07:00\",\"19:00\"],\"Mardi\":[\"07:00\",\"14:00\"],\"Mercredi\":[\"07:00\",\"18:00\"],\"Jeudi\":[\"08:00\",\"17:00\"],\"Vendredi\":[\"08:00\",\"16:00\"]}', 'Mère', 'Malikamère', 'Brik', 'malika@gmail.com', '0123455', '029292283', '0393838383', '393 rue blabla', '75019', 'PARIS', 'France', 'Développeur', 'Développeur', 'Les quatros', 'Non', 4, 0, 'Père', 'Malikapère', 'Brik', 'malika2@gmail.com', '394238U', '385289748', '030393484', '393 rue blabla', '75019', 'Paris', 'France', '30303003', 'Développeur', 'Les quatros', 'Non', 4, 0, 'test infos compl', '2025-04-10 13:09:09', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', 'uploads/enfant_8.png', NULL),
(9, 'Léna', 'Mendy', '2024-01-16', 'Paris', 'fille', '2025-04-25', '2025-07-04', 'oui', '{\"Lundi\":[\"07:00\",\"13:00\"],\"Mardi\":[\"07:00\",\"14:00\"],\"Mercredi\":[\"08:00\",\"14:00\"],\"Jeudi\":[\"09:00\",\"15:00\"],\"Vendredi\":[\"08:00\",\"16:00\"]}', 'Mère', 'Lenamère', 'Mendy', 'lm@gmail.com', '8723489237', '839278237', '832947283', '87 RUE BLABLA', '75019', 'PARIS', 'France', '2934823948', 'DEV', 'Les quatros', 'Non', 0, 0, 'Père', 'Lenapere', 'Mendy', 'lm@gmail.com', '89374238', '942393', '3958947', '393 rue blabla', '75019', 'Paris', 'France', '30303003', 'Développeur', 'Les quatros', 'Non', 0, 0, 'testest', '2025-04-10 13:14:42', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', 'uploads/enfant_9.jpeg', NULL),
(10, 'Esha', 'Khan', '2022-04-07', 'Paris', 'fille', '0000-00-00', '0000-00-00', 'oui', '{\"Lundi\":[\"08:00\",\"14:00\"],\"Mardi\":[\"09:00\",\"13:00\"],\"Mercredi\":[\"08:00\",\"12:00\"],\"Jeudi\":[\"07:00\",\"16:00\"],\"Vendredi\":[\"08:00\",\"15:00\"]}', 'Mère', 'Eshamère', 'Khan', 'esha@live.fr', '872838', '20943874', '8947328473', '39 rue blabla', '75019', 'PARIS', 'France', '19381293', 'Développeur', 'Les quatros', 'Non', 2, 0, 'Père', 'Eshapère', 'Khan', 'esha@live.fr', '872838', '938448', '92834839', '39 rue blabla', '75019', 'PARIS', 'France', '934838', 'Développeur', 'Les quatros', 'Non', 2, 0, 'Hellotest', '2025-04-11 10:04:55', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', NULL, NULL),
(11, 'Adam', 'Dubois', '2024-12-11', 'Paris', 'garçon', '2025-04-02', '2025-05-31', 'oui', '{\"Lundi\":[\"07:00\",\"17:00\"],\"Vendredi\":[\"08:00\",\"15:00\"]}', 'Mère', 'Malikamère', 'Brik', 'malika@gmail.com', '8723489237', '20943874', '8947328473', '4 rue Emile Bertin', '75019', 'PARIS', 'France', 'Développeur', 'Développeur', 'Les quatros', 'Non', 0, 0, 'Père', 'Malikapère', 'Brik', 'malika2@gmail.com', '394238U', '942393', '3958947', '393 rue blabla', '75019', 'PARIS', 'France', '30303003', 'Développeur', 'Les quatros', 'Non', 0, 0, '', '2025-04-11 10:24:35', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', NULL, NULL),
(12, 'Ibrahim', 'Khan', '2022-01-04', '', 'garçon', '0000-00-00', '0000-00-00', 'oui', NULL, 'Mère', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, 'Père', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, '', '2025-04-11 10:24:47', 'Mantes à l\'Ô - Mantes-la-Jolie', 'Inscrit', 'Mantes à l\'Ô - Mantes-la-Jolie', NULL, NULL),
(13, 'Léna', 'Mendy', '2025-04-02', 'Paris', 'fille', '0000-00-00', '0000-00-00', 'oui', '{\"Lundi\":[\"08:00\",\"15:00\"],\"Mercredi\":[\"08:00\",\"15:00\"],\"Vendredi\":[\"08:00\",\"14:00\"]}', 'Mère', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, 'Père', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, '', '2025-04-11 10:44:56', NULL, 'En attente', NULL, NULL, NULL),
(14, 'Malika', 'Mendy', '2025-04-08', 'Paris', 'fille', '2025-04-02', '2025-04-26', 'oui', '{\"Lundi\":[\"07:00\",\"15:00\"]}', 'Mère', 'Malikamère', 'Brik', 'malika@gmail.com', '0123455', '20943874', '0393838383', '4 rue Emile Bertin', '75019', 'PARIS', 'France', '2934823948', 'Développeur', 'Les quatros', 'Non', 0, 0, 'Père', 'Malikapère', 'Brik', 'malika2@gmail.com', '394238U', '942393', '3958947', '4 rue Emile Bertin', '75019', 'Paris', 'France', '30303003', 'Développeur', '', 'Non', 0, 0, '', '2025-04-11 10:50:01', NULL, 'En attente', NULL, NULL, NULL),
(15, 'X', 'Y', '2025-04-04', 'Paris', 'garçon', '2025-04-08', '2025-04-25', 'oui', '{\"Mercredi\":[\"07:00\",\"16:00\"]}', 'Mère', 'Malikamère', 'Brik', 'lm@gmail.com', '8723489237', '20943874', '0393838383', '393 rue blabla', '75019', 'PARIS', 'France', '2934823948', 'Développeur', 'Les quatros', 'Non', 0, 0, 'Père', 'Malikapère', 'Brik', 'malika2@gmail.com', '89374238', '942393', '3958947', '4 rue Emile Bertin', '75019', 'Paris', 'France', '30303003', 'Développeur', 'Les quatros', 'Non', 0, 0, '', '2025-04-11 11:20:32', NULL, 'En attente', NULL, NULL, NULL),
(16, 'TEST', 'TEST', '2025-04-07', 'PARIS', 'garçon', '2025-04-07', '2025-04-26', 'oui', '{\"Lundi\":[\"07:00\",\"17:00\"],\"Mercredi\":[\"07:00\",\"16:00\"]}', 'Mère', 'Maman', 'Brik', 'malika@gmail.com', '0123455', '20943874', '0393838383', '4 rue Emile Bertin', '75019', 'PARIS', 'France', '2934823948', 'Développeur', 'Les quatros', 'Non', 0, 0, 'Père', 'Papa', 'Brik', 'malika2@gmail.com', '394238U', '942393', '92834839', '4 rue Emile Bertin', '75019', 'Paris', 'France', '30303003', 'Développeur', 'Les quatros', 'Non', 2, 0, 'HELLOtest', '2025-04-11 13:57:01', NULL, 'En attente', NULL, NULL, NULL),
(17, 'Malika', 'Brik', '2025-04-11', 'Paris', 'fille', '2025-04-11', '2025-04-27', 'oui', '{\"Mardi\":[\"08:00\",\"15:00\"]}', 'Mère', 'Maman', 'Brik', 'malika@gmail.com', '0123455', '20943874', '9292982838374', '393 rue blabla', '75019', 'PARIS', 'France', '2934823948', 'Développeur', 'Les quatros', 'Non', 2, 0, 'Père', 'Papa', 'Brik', 'malika2@gmail.com', '394238', '942393', '3958947', '4 rue Emile Bertin', '', '', 'France', '', '', '', 'Non', 0, 0, '', '2025-04-14 12:19:01', NULL, 'En attente', NULL, NULL, NULL),
(18, 'TEST', 'Brik', '2025-04-09', 'Paris', 'garçon', '2025-04-03', '2025-04-26', 'oui', '{\"Mardi\":[\"07:00\",\"12:00\"]}', 'Mère', 'Malikamère', 'Brik', 'malika@gmail.com', '0123455', '20943874', '0393838383', '393 rue blabla', '75019', 'PARIS', 'France', '2934823948', 'Développeur', 'Les quatros', 'Non', 2, 0, 'Père', '', '', '', '', '', '', '', '', '', 'France', '', '', '', 'Non', 0, 0, '', '2025-04-16 11:54:01', NULL, 'En attente', 'Les 101 Bambins - Mantes-la-Jolie', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medical_enfant`
--

CREATE TABLE `medical_enfant` (
  `id` int NOT NULL,
  `id_enfant` int NOT NULL,
  `allergies` text,
  `maladies` text,
  `traitements` text,
  `date_maj` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pointage_journalier`
--

CREATE TABLE `pointage_journalier` (
  `id_pointage` int NOT NULL,
  `id_enfant` int NOT NULL,
  `id_creche` int NOT NULL,
  `date_pointage` date NOT NULL,
  `heure_arrivee` time DEFAULT NULL,
  `heure_depart` time DEFAULT NULL,
  `commentaire` text,
  `prenom_enfant` varchar(100) DEFAULT NULL,
  `nom_enfant` varchar(100) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pointage_journalier`
--

INSERT INTO `pointage_journalier` (`id_pointage`, `id_enfant`, `id_creche`, `date_pointage`, `heure_arrivee`, `heure_depart`, `commentaire`, `prenom_enfant`, `nom_enfant`, `id_utilisateur`) VALUES
(4, 1, 1, '2025-05-12', '16:01:00', '15:55:00', NULL, 'Sophie', '', 4),
(2, 8, 1, '2025-05-12', '11:44:00', NULL, NULL, 'Malika', 'Brick', 4),
(3, 7, 1, '2025-05-12', '12:13:00', NULL, 'Retard', 'Hugo', 'Dubois', 4),
(5, 11, 1, '2025-05-12', '14:37:00', NULL, NULL, 'Adam', 'Dubois', 4),
(6, 3, 1, '2025-05-12', '15:38:00', NULL, NULL, 'Sarah', 'Dupont', 4),
(7, 1, 1, '2025-05-13', '10:51:00', '10:51:00', NULL, 'Sophie', '', 4),
(8, 1, 1, '2025-05-14', '09:44:00', '11:47:00', NULL, 'Sophie', '', 4),
(9, 8, 1, '2025-05-14', '09:50:00', '10:07:00', NULL, 'Malika', 'Brick', 4),
(10, 7, 1, '2025-05-14', '10:31:00', '10:32:00', NULL, 'Hugo', 'Dubois', 4),
(11, 11, 1, '2025-05-14', '10:44:00', '11:51:00', NULL, 'Adam', 'Dubois', 4),
(12, 3, 1, '2025-05-14', '10:45:00', '10:45:00', NULL, 'Sarah', 'Dupont', 4),
(13, 10, 1, '2025-05-14', '11:47:00', '11:47:00', NULL, 'Esha', 'Khan', 4),
(14, 12, 1, '2025-05-14', '11:52:00', NULL, NULL, 'Ibrahim', 'Khan', 4);

-- --------------------------------------------------------

--
-- Structure de la table `repas_enfants`
--

CREATE TABLE `repas_enfants` (
  `id_repas` int NOT NULL,
  `enfant_id` int NOT NULL,
  `prenom_enfant` varchar(100) NOT NULL,
  `nom_enfant` varchar(100) NOT NULL,
  `nom_creche` varchar(100) NOT NULL,
  `date_repas` date NOT NULL,
  `satisfaction_emoji` varchar(10) NOT NULL,
  `biberon_emoji` varchar(10) DEFAULT NULL,
  `quantite_biberon_ml` int DEFAULT NULL,
  `commentaire` text,
  `id_auxiliaire` int NOT NULL,
  `horodatage` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alertes_manuelles`
--
ALTER TABLE `alertes_manuelles`
  ADD PRIMARY KEY (`id_alerte`),
  ADD KEY `code_creche` (`code_creche`);

--
-- Index pour la table `creche`
--
ALTER TABLE `creche`
  ADD PRIMARY KEY (`code_creche`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `code_creche` (`code_creche`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `lieu_recrutement` (`lieu_recrutement`);

--
-- Index pour la table `inscription_enfant`
--
ALTER TABLE `inscription_enfant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_creche_enfant` (`id_creche`);

--
-- Index pour la table `medical_enfant`
--
ALTER TABLE `medical_enfant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_enfant` (`id_enfant`);

--
-- Index pour la table `pointage_journalier`
--
ALTER TABLE `pointage_journalier`
  ADD PRIMARY KEY (`id_pointage`),
  ADD UNIQUE KEY `id_enfant` (`id_enfant`,`date_pointage`),
  ADD KEY `id_creche` (`id_creche`),
  ADD KEY `fk_utilisateur_pointage` (`id_utilisateur`);

--
-- Index pour la table `repas_enfants`
--
ALTER TABLE `repas_enfants`
  ADD PRIMARY KEY (`id_repas`),
  ADD KEY `enfant_id` (`enfant_id`),
  ADD KEY `id_auxiliaire` (`id_auxiliaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alertes_manuelles`
--
ALTER TABLE `alertes_manuelles`
  MODIFY `id_alerte` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `creche`
--
ALTER TABLE `creche`
  MODIFY `code_creche` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_document` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `inscription_enfant`
--
ALTER TABLE `inscription_enfant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `medical_enfant`
--
ALTER TABLE `medical_enfant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pointage_journalier`
--
ALTER TABLE `pointage_journalier`
  MODIFY `id_pointage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `repas_enfants`
--
ALTER TABLE `repas_enfants`
  MODIFY `id_repas` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`code_creche`) REFERENCES `creche` (`code_creche`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
