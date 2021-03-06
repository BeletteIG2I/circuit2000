-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 05 Avril 2016 à 23:17
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `circuit2000`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
`id` bigint(20) NOT NULL,
  `idMoniteur` bigint(20) NOT NULL,
  `idEleve` int(6) NOT NULL,
  `temps_pause` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `Commentaire` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `idMoniteur`, `idEleve`, `temps_pause`, `date`, `description`, `Commentaire`) VALUES
(1, 1, 4, NULL, '2016-03-30 08:00:00', 'Mon premier cours', 'Voici les commentaires du premier cours.'),
(2, 1, 4, NULL, '2016-03-31 15:00:00', 'Mon Deuxième cours', 'Commentaires du 2eme cours'),
(3, 1, 4, NULL, '2016-03-02 16:00:00', 'Un cours en semaine 9', 'Commentaire d''un cours en semaine 9'),
(4, 3, 4, NULL, '2016-04-06 11:00:00', 'Cours avec le moniteur 3 et l''élève 4', 'un Com'' avec le moniteur 3 et l''élève 4');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
`idEleve` int(11) NOT NULL,
  `dateInscription` datetime NOT NULL,
  `dateCode` datetime NOT NULL,
  `datePermis` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`id`, `idEleve`, `dateInscription`, `dateCode`, `datePermis`) VALUES
(3, 1, '2016-02-16 00:00:00', '2016-02-16 00:00:00', '2016-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
`numero` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`numero`, `nom`) VALUES
(1, 'Admin'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE `moniteur` (
  `id` int(11) NOT NULL,
`idMoniteur` int(11) NOT NULL,
  `dateEntree` date NOT NULL,
  `immatVoiture` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `moniteur`
--

INSERT INTO `moniteur` (`id`, `idMoniteur`, `dateEntree`, `immatVoiture`) VALUES
(4, 1, '2016-03-29', '3445');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
`id` int(6) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `dateNaissance` varchar(30) DEFAULT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(8) NOT NULL,
  `fonction` int(11) NOT NULL,
  `numeroADR` varchar(4) DEFAULT NULL,
  `rueADR` varchar(30) DEFAULT NULL,
  `villeADR` varchar(30) DEFAULT NULL,
  `codePostal` varchar(6) DEFAULT NULL,
  `telephone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `dateNaissance`, `mail`, `mdp`, `fonction`, `numeroADR`, `rueADR`, `villeADR`, `codePostal`, `telephone`) VALUES
(2, 'Eve', 'Flo', '24/06/1994', 'admin', 'admin', 1, '1', '1', '1', ' 62153', '0645716659'),
(3, 'nomAdmin', 'prenomAdmin', '13/12/95', 'moniteur', 'moniteur', 2, '45', 'Jean Philippe', 'Lens', '62300', '0123456789'),
(4, 'nomMoniteur', 'prenomMoniteur', '24/05/88', 'moniteur@moniteur.com', 'moniteur', 0, '34', 'Alfred 2 ', 'Lille', '59000', '1234567891');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
`immatriculation` bigint(20) NOT NULL,
  `modele` varchar(15) DEFAULT NULL,
  `marque` varchar(15) DEFAULT NULL,
  `date_mise_en_fonction` date DEFAULT NULL,
  `en_Panne` tinyint(1) DEFAULT NULL,
  `kilometrage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_Cours_id` (`idEleve`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
 ADD PRIMARY KEY (`idEleve`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
 ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `moniteur`
--
ALTER TABLE `moniteur`
 ADD PRIMARY KEY (`idMoniteur`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
 ADD PRIMARY KEY (`immatriculation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `moniteur`
--
ALTER TABLE `moniteur`
MODIFY `idMoniteur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
MODIFY `immatriculation` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
