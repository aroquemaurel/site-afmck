-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 28 Février 2016 à 18:27
-- Version du serveur: 5.5.47
-- Version de PHP: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `site-afmck`
--

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_file`
--

CREATE TABLE IF NOT EXISTS `newsletter_file` (
`idFIle` int(11) NOT NULL DEFAULT '0',
`idNewsletter` int(11) NOT NULL DEFAULT '0',
PRIMARY KEY (`idFIle`,`idNewsletter`),
KEY `idNewsletter` (`idNewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_newsletter`
--

CREATE TABLE IF NOT EXISTS `user_newsletter` (
`idUser` int(11) NOT NULL,
`idNewsletter` int(11) NOT NULL,
`isSend` int(1) NOT NULL,
`date` datetime NOT NULL,
PRIMARY KEY (`idUser`,`idNewsletter`),
KEY `idNewsletter` (`idNewsletter`),
KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `newsletter_file`
--
ALTER TABLE `newsletter_file`
ADD CONSTRAINT `newsletter_file_ibfk_3` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `fk_idfile_news` FOREIGN KEY (`idFIle`) REFERENCES `file` (`id`),
ADD CONSTRAINT `fk_idNews_news` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `newsletter_file_ibfk_1` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `newsletter_file_ibfk_2` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`);

--
-- Contraintes pour la table `user_newsletter`
--
ALTER TABLE `user_newsletter`
ADD CONSTRAINT `fk_user_newsletter_news` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `fk_user_newsletter_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_1` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_2` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_3` FOREIGN KEY (`idNewsletter`) REFERENCES `news` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_4` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_5` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_6` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_8` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
ADD CONSTRAINT `user_newsletter_ibfk_9` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;