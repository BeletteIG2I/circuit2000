-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2016 at 06:37 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `circuit2000`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
`id` bigint(20) NOT NULL,
  `idMoniteur` bigint(20) NOT NULL,
  `idEleve` int(6) NOT NULL,
  `temps_pause` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `Commentaire` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `idMoniteur`, `idEleve`, `temps_pause`, `date`, `description`, `Commentaire`) VALUES
(1, 1, 1, NULL, '2016-03-30 08:00:00', 'Mon premier cours', 'Voici les commentaires du premier cours.'),
(2, 1, 1, NULL, '2016-03-31 15:00:00', 'Mon Deuxième cours', 'Commentaires du 2eme cours'),
(3, 1, 1, NULL, '2016-03-02 16:00:00', 'Un cours en semaine 9', 'Commentaire d''un cours en semaine 9'),
(4, 1, 1, NULL, '2016-04-06 11:00:00', 'Cours avec le moniteur 3 et l''élève 4', 'un Com'' avec le moniteur 3 et l''élève 4'),
(5, 1, 1, NULL, '2016-05-03 08:00:00', 'Un cours de test', NULL),
(7, 1, 1, NULL, '2016-05-04 08:00:00', 'Un 2ème cours de test', NULL),
(8, 1, 1, NULL, '2016-05-01 10:00:00', 'Un troisième test', NULL),
(9, 1, 1, NULL, '2016-05-05 11:00:00', 'Un autre test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
`idEleve` int(11) NOT NULL,
  `dateInscription` datetime NOT NULL,
  `dateCode` datetime NOT NULL,
  `datePermis` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`id`, `idEleve`, `dateInscription`, `dateCode`, `datePermis`) VALUES
(3, 1, '2016-02-16 00:00:00', '2016-02-16 00:00:00', '2016-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fonction`
--

CREATE TABLE `fonction` (
`numero` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonction`
--

INSERT INTO `fonction` (`numero`, `nom`) VALUES
(1, 'Admin'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `moniteur`
--

CREATE TABLE `moniteur` (
  `id` int(11) NOT NULL,
`idMoniteur` int(11) NOT NULL,
  `dateEntree` date NOT NULL,
  `immatVoiture` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moniteur`
--

INSERT INTO `moniteur` (`id`, `idMoniteur`, `dateEntree`, `immatVoiture`) VALUES
(2, 1, '2016-03-29', '3445');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `dateNaissance`, `mail`, `mdp`, `fonction`, `numeroADR`, `rueADR`, `villeADR`, `codePostal`, `telephone`) VALUES
(1, 'nomAdmin', 'prenomAdmin', '24/06/1994', 'admin', 'admin', 1, '1', 'rue des fleurs', 'Paris', '95001', '0645716659'),
(2, 'nomMoniteur', 'prenomMoniteur', '13/12/95', 'moniteur', 'moniteur', 2, '45', 'Jean Philippe', 'Lens', '62300', '0123456789'),
(3, 'nomClient', 'prenomClient', '24/05/88', 'eleve', 'eleve', 0, '34', 'Alfred 2 ', 'Lille', '59000', '1234567891');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_Cours_id` (`idEleve`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
 ADD PRIMARY KEY (`idEleve`);

--
-- Indexes for table `fonction`
--
ALTER TABLE `fonction`
 ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `moniteur`
--
ALTER TABLE `moniteur`
 ADD PRIMARY KEY (`idMoniteur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
 ADD PRIMARY KEY (`immatriculation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `eleve`
--
ALTER TABLE `eleve`
MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fonction`
--
ALTER TABLE `fonction`
MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `moniteur`
--
ALTER TABLE `moniteur`
MODIFY `idMoniteur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
MODIFY `immatriculation` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
