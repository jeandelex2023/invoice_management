-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 20 Septembre 2017 à 05:42
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_caissiere`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `idControler_facture` int(5) NOT NULL AUTO_INCREMENT,
  `numeroFacture` varchar(5) NOT NULL,
  `nomClient_facture` varchar(30) NOT NULL,
  `referenceFacture` varchar(30) NOT NULL,
  `dateFacture` date NOT NULL,
  `montantFacture` int(10) NOT NULL,
  `totalFacture` int(10) NOT NULL,
  PRIMARY KEY (`numeroFacture`),
  UNIQUE KEY `numeroFacture` (`numeroFacture`),
  UNIQUE KEY `numeroFacture_2` (`numeroFacture`),
  KEY `idControler_facture` (`idControler_facture`,`numeroFacture`,`nomClient_facture`,`referenceFacture`,`dateFacture`,`montantFacture`,`totalFacture`),
  KEY `idControler_facture_2` (`idControler_facture`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='table FACTURE dans la base de donnees Mysql' AUTO_INCREMENT=18 ;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idControler_facture`, `numeroFacture`, `nomClient_facture`, `referenceFacture`, `dateFacture`, `montantFacture`, `totalFacture`) VALUES
(7, 'A111', 'Jean marie', 'jean ', '2012-12-20', 2000, 30000),
(11, 'A112', 'Delex', 'Delex Ambovombe', '2012-12-03', 100, 1000),
(16, 'A114', 'Faniry', 'Faniry FaceBook', '2012-12-03', 2000, 3000),
(17, 'A113', 'Faralahy', 'Fjirama', '2012-12-05', 100, 1000);
