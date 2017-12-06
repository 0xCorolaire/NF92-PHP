-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 02 déc. 2017 à 19:50
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Auto_Ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `id_eleve` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Eleve`
--

INSERT INTO `Eleve` (`id_eleve`, `nom`, `prenom`, `date_naissance`, `date_inscription`) VALUES
(3, 'PAIGNEAU', 'Hugo', '1997-05-19', '2017-11-04'),
(5, 'Louis', 'Rosier', '1999-08-10', '2017-11-04'),
(6, 'Manar', 'Elma', '1999-11-01', '2017-11-04'),
(8, 'Candice', 'Jeannet', '2001-01-09', '2017-11-06'),
(9, 'Johan', 'Schots', '1996-03-14', '2017-11-06'),
(10, 'Sensano', 'Maria', '1998-07-05', '2017-11-13'),
(19, 'Olivares', 'Rodrigo', '1990-06-01', '2017-11-20'),
(20, 'Penacillo', 'Alvaro', '1997-08-08', '2017-11-27'),
(21, 'Penacillo', 'Alvaro', '1997-11-08', '2017-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `Inscription`
--

CREATE TABLE `Inscription` (
  `id_seance` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Inscription`
--

INSERT INTO `Inscription` (`id_seance`, `id_eleve`, `note`) VALUES
(1, 3, 4),
(1, 5, 6),
(1, 6, 9),
(1, 9, 3),
(1, 10, 12),
(1, 19, 11),
(2, 3, 5),
(3, 20, 4),
(3, 3, 9),
(3, 19, 6),
(7, 5, -1),
(7, 3, -1),
(7, 19, -1),
(7, 10, -1),
(8, 3, 6),
(8, 5, 7),
(8, 6, 2),
(5, 3, 6),
(5, 5, 11),
(5, 19, 4),
(5, 20, 5),
(5, 8, 14);

-- --------------------------------------------------------

--
-- Structure de la table `Seance`
--

CREATE TABLE `Seance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `eff_max` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Seance`
--

INSERT INTO `Seance` (`id_seance`, `date_seance`, `eff_max`, `id_theme`) VALUES
(1, '2017-12-10', 10, 1),
(2, '2017-12-10', 1, 2),
(3, '2018-05-06', 11, 3),
(4, '2019-05-19', 2, 3),
(5, '2018-01-05', 10, 7),
(6, '2018-05-09', 5, 8),
(7, '2019-11-12', 11, 9),
(8, '2019-05-07', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Theme`
--

CREATE TABLE `Theme` (
  `id_theme` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `supprimer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Theme`
--

INSERT INTO `Theme` (`id_theme`, `nom`, `description`, `supprimer`) VALUES
(1, 'Signalisation', 'Signalisation prÃ©sente sur les routes de France.', 0),
(2, 'Voiture', 'Types de voiture', 0),
(3, 'Contraventions', 'Contraventions sur la route', 0),
(7, 'Test2', 'bdjsbds', 1),
(8, 'Test3', 'aaa', 0),
(9, 'Composants', 'Tous les composants de la voiture', 1),
(10, 'Louer', 'Louer une voiture', 0),
(11, 'aaa', 'bbb', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD PRIMARY KEY (`id_eleve`);

--
-- Index pour la table `Inscription`
--
ALTER TABLE `Inscription`
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_seance` (`id_seance`);

--
-- Index pour la table `Seance`
--
ALTER TABLE `Seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Eleve`
--
ALTER TABLE `Eleve`
  MODIFY `id_eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `Seance`
--
ALTER TABLE `Seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Inscription`
--
ALTER TABLE `Inscription`
  ADD CONSTRAINT `Inscription_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `Eleve` (`id_eleve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Inscription_ibfk_2` FOREIGN KEY (`id_seance`) REFERENCES `Seance` (`id_seance`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Seance`
--
ALTER TABLE `Seance`
  ADD CONSTRAINT `Seance_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
