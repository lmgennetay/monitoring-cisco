-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 19 juil. 2019 à 14:22
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monitoringcisco`
--
CREATE DATABASE IF NOT EXISTS `monitoringcisco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `monitoringcisco`;

-- --------------------------------------------------------

--
-- Structure de la table `appareils`
--

DROP TABLE IF EXISTS `appareils`;
CREATE TABLE IF NOT EXISTS `appareils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `motdepasse2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appareils`
--

INSERT INTO `appareils` (`id`, `libelle`, `ip`, `identifiant`, `motdepasse`, `motdepasse2`) VALUES
(37, 'Localhost', '127.0.0.1', 'test', 'test', 'testg'),
(38, 'Test', '128.0.0.1', 'test', 'test', 'test'),
(39, 'Test', '125.24.00.00', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` varchar(255) NOT NULL COMMENT 'id de la commande',
  `label` varchar(255) NOT NULL COMMENT 'affichage utilisateur',
  `commande` text NOT NULL COMMENT 'cmd a executer',
  `commentaire` varchar(2500) DEFAULT NULL COMMENT 'explication supplementaire de la commande',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `label`, `commande`, `commentaire`) VALUES
('Add_Vlan', 'Créer un nouveau VLAN ', 'vlan <Numéro du VLAN>', 'Permet de créer un VLAN dans l’appareil en question. Un seul numéro de VLAN compris entre 1 et 4096 doit être présent. '),
('Add_Vlan_Trunk', 'Ajouter des Vlan Trunk sur les ports', 'interface range <Nom interface>,<Nom interface>, … \r\nswitchport mode trunk \r\nswitchport trunk allowed vlan add <Numéro des VLAN 1,5,8,49,50> ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. \r\nLe numéro de VLAN doit être compris entre 1 et 4096 et une seule ou plusieurs valeurs peuvent être rentrées. '),
('Aff_budget_PoE', 'Afficher le budget électrique des ports PoE', 'show power inline', NULL),
('Aff_Counter_Metrics', 'Afficher les compteurs de metrics', 'show interface counter', NULL),
('Aff_Count_Error', 'Afficher les compteurs d’erreurs', 'show interface counter errors ', NULL),
('Aff_Mac', 'Afficher la table d’adresse MAC', 'show mac address-table ', NULL),
('Aff_Running_Config', 'Afficher la configuration en cours ', 'show running-config ', NULL),
('Aff_Start_Confi', 'Afficher la configuration de démarrage', 'show startup-config ', NULL),
('Aff_Stat', 'Afficher toutes les statistiques d’un port', 'show interface <Nom Interface> ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Aff_System', 'Afficher les ressources de l’équipement', 'show system resources', NULL),
('Aff_Version', 'Affiche les informations relatives au switch', 'show version', NULL),
('Conf_Desc', 'Configurer une description', 'interface range <Nom interface>,<Nom interface>, … \r\n\r\nno description \r\n\r\ndescription <Description écrite par l’utilisateur> ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. \r\nVous devez aussi taper votre description en remplaçant la balise prévue à cet effet. Aucun espace ne doit être présent.'),
('Conf_Ip_Vlan', 'Configurer une adresse IP sur un vlan', 'vlan <Numéro du VLAN> \r\nip address <Adresse IP> <Masque> ', 'Permet de supprimer un VLAN dans l’appareil en question. Un seul numéro de VLAN compris entre 1 et 4096 doit être présent. \r\n\r\nLa ligne de commande ip address doit aussi comporter une adresse IP ainsi qu’un masque réseau. '),
('Conf_Speed_10', 'Configurer la vitesse du port en 10 Mbps', 'interface range <Nom interface>,<Nom interface>, … \r\nspeed 10 ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Conf_Speed_100', 'Configurer la vitesse du port en 100 Mbps', 'interface range <Nom interface>,<Nom interface>, … \r\nspeed 100', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Conf_Speed_Auto', 'Configurer la vitesse du port en automatique', 'interface range <Nom interface>,<Nom interface>, … \r\nspeed auto', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Conf_Vlan_Access', 'Configurer le type Vlan Access sur les ports', 'interface range <Nom interface>,<Nom interface>, … \r\nswitchport mode access \r\nswitchport access vlan <N° (unique) de vlan> ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. \r\nLe numéro de VLAN doit être compris entre 1 et 4096 et une seule valeur doit être rentrée.'),
('Dup_Auto', 'Passer en mode duplex auto ', 'interface range <Nom interface>,<Nom interface>, … \r\nduplex auto ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande.'),
('Dup_Full', 'Passer en mode full-duplex ', 'interface range <Nom interface>,<Nom interface>, … \r\nduplex full ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Dup_Half', 'Passer en mode half-duplex ', 'interface range <Nom interface>,<Nom interface>, … \r\nduplex half ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Rest_Config', 'Restaurer la configuration sauvegardé sur la configuration actuelle', 'copy startup-config running-config ', NULL),
('Sauv_Config', 'Sauvegarder la configuration en cours ', 'copy running-config startup-config ', NULL),
('Supp_Conf_Vlan', 'Supprimer une configuration de VLAN sur les ports', 'interface range <Nom interface>,<Nom interface>, … \r\nno switchport mode ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande. '),
('Supp_Desc', 'Effacer une description', 'interface range <Nom interface>,<Nom interface>, … \r\nno description ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande.'),
('Supp_Vlan_Trunk', 'Supprimer des Vlan Trunk sur les ports', 'interface range <Nom interface>,<Nom interface>, … \r\nswitchport mode trunk \r\nswitchport trunk allowed vlan remove <Numéro des VLAN 1,5,8,49,50> ', 'Plusieurs interfaces peuvent être indiqués pour configurer la vitesse du port. Nous pouvons aussi indiquer une seule interface dans la commande.  \r\nLe numéro de VLAN doit être compris entre 1 et 4096 et une seule ou plusieurs valeurs peuvent être rentrées. '),
('Supp_Vlan', 'Supprimer un VLAN', 'no vlan <Numéro du VLAN> ', 'Permet de supprimer un VLAN dans l’appareil en question. Un seul numéro de VLAN compris entre 1 et 4096 doit être présent. '),
('Conf_Desc_Vlan', 'Configurer une description sur un vlan ', 'vlan <Numéro du VLAN> \r\ndescription <Description du VLAN> ', 'Permet de supprimer un VLAN dans l’appareil en question. Un seul numéro de VLAN compris entre 1 et 4096 doit être présent. \r\nVous devez aussi taper votre description en remplaçant la balise prévue à cet effet. Aucun espace ne doit être présent. ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `user`, `mdp`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
