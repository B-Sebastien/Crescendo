-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Mai 2016 à 21:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `crescendo`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `IDCATEGORIE` varchar(128) NOT NULL,
  `LIBELLECATEGORIE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDCATEGORIE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`IDCATEGORIE`, `LIBELLECATEGORIE`) VALUES
('1', 'Corde'),
('2', 'Vent'),
('3', 'Percussion');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `IDCLIENT` varchar(128) NOT NULL,
  `NOMCLIENT` varchar(128) DEFAULT NULL,
  `PRENOMCLIENT` varchar(128) DEFAULT NULL,
  `MAILCLIENT` varchar(128) DEFAULT NULL,
  `CPCLIENT` int(11) DEFAULT NULL,
  `VILLECLIENT` varchar(128) DEFAULT NULL,
  `TELCLIENT` int(11) DEFAULT NULL,
  `LOGINCLIENT` varchar(128) DEFAULT NULL,
  `MDPCLIENT` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDCLIENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `IDCOMMANDE` varchar(128) NOT NULL,
  `IDCLIENT` varchar(128) NOT NULL,
  `DATECOMMANDE` date DEFAULT NULL,
  `PRIXTOTAL` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`IDCOMMANDE`),
  KEY `I_FK_COMMANDE_CLIENT` (`IDCLIENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `IDINSTRU` varchar(128) NOT NULL,
  `IDCOMMANDE` varchar(128) NOT NULL,
  PRIMARY KEY (`IDINSTRU`,`IDCOMMANDE`),
  KEY `I_FK_CONTENIR_INSTRUMENT` (`IDINSTRU`),
  KEY `I_FK_CONTENIR_COMMANDE` (`IDCOMMANDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE IF NOT EXISTS `instrument` (
  `IDINSTRU` varchar(128) NOT NULL,
  `IDCATEGORIE` varchar(128) NOT NULL,
  `NOMINSTRU` varchar(128) DEFAULT NULL,
  `IMAGEINSTRU` varchar(128) DEFAULT NULL,
  `PRIXINSTRU` decimal(13,2) DEFAULT NULL,
  `NBSTOCKINSTRU` bigint(4) DEFAULT NULL,
  `DESCRIPTIONINSTRU` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDINSTRU`),
  KEY `I_FK_INSTRUMENT_CATEGORIE` (`IDCATEGORIE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `instrument`
--

INSERT INTO `instrument` (`IDINSTRU`, `IDCATEGORIE`, `NOMINSTRU`, `IMAGEINSTRU`, `PRIXINSTRU`, `NBSTOCKINSTRU`, `DESCRIPTIONINSTRU`) VALUES
('1', '1', 'Violon Delson Viol-4/4', 'img/violon.jpg', '68.00', 10, 'Violon - Alto 4/4 entièrement fait main avec du bois Epicéa, manche en érable, cheville en bois, archet et colophane fournis.'),
('10', '3', 'Caisse Pearl - Hybrid Wood/Fiberglass', 'img/pearl-hybrid.jpg', '348.00', 10, 'Inspirées des batteries Wood/Fiberglass commercialisées à la fin des années 60, cette caisse claire est une édition limitée à 10 exemplaires pour la France. Le fût est composé de 6 plis de Kapur, un bois connu pour sa rondeur et ses graves, sur lesquels d'),
('11', '2', 'Saxophone Yamaha YAS-280', 'img/saxophone-yamaha.jpg', '990.00', 10, 'Le Saxophone YAS-280 a été conçu spécifiquement pour les débutants. Son poids léger et ses formes ergonomiques en font un instrument facile à porter et à jouer. Livré en étui avec bec.'),
('12', '2', 'Flute ZEN-ON T5C', 'img/flute-zen.jpg', '399.00', 10, 'Depuis plus de 50 ans, ZEN-ON fabrique des flûtes à bec de qualité destinées à l’apprentissage de l’instrument. Les flûtes ZEN-ON ont acquis une solide réputation et sont recommandées par de nombreux flûtistes professionnels à travers le monde, ainsi que '),
('13', '2', 'Ocarina Legend of Zelda', 'img/ocarina.jpg', '12.00', 10, 'Ocarina à 12 trous en céramique de haute qualité, belle sonorité.'),
('14', '2', 'Flute traversière Eagletone Road PI100', 'img/flute-traver.jpg', '199.00', 10, 'Ce piccolo permet aux débutants de jouer sans trop investir. C''est sans aucun doute le meilleur rapport qualité/prix de la catégorie des instruments d''entrée de gamme. Livré en étui.'),
('15', '1', 'Hercules Stand Violoncelle DS580B', 'img/stand-violoncelle.jpg', '55.00', 10, 'Support pliant pour violoncelle avec système exclusif AGS, hauteur réglable par poignée à  blocage, le corps de l''instrument repose sur les pieds recouverts de mousse SFF, crochet pour archet (hauteur : 104 - 126 cm, poids : 2.2 kg, charge supportée : 15 '),
('16', '1', 'Contrebasse Allegro 1/4 - Gewa', 'img/contrebasse-gewa.jpg', '1529.00', 10, 'Contrebasse forme gambe taille 1/4, table bois laminé, fond laminé bombé et légèrement flammé, laque nitrocellulosique brun doré avec une touche d''ébène.'),
('17', '1', 'Guitare Gretsch - G5420T FSR Hollow Body Snowcrerst White Bigsby', 'img/guitare-gretsch.jpg', '999.00', 10, 'La célèbre G5420T de Gretsch dans une série limitée très classe rappelant la mythique white falcon de par son accastillage doré et son blanc éclatant. Seulement 30 pièces pour la France.'),
('18', '1', 'Ukulele Fender - Piha''ea Hula Graphic Brown', 'img/ukulele-soprano.jpg', '49.00', 10, 'La gamme de ukulélés Fender se décline en plusieurs tailles et plusieurs finitions, pour que chacun y trouve son bonheur. Le ukulélé soprano, le plus petit de la gamme, est aussi le plus populaire. Facile à jouer, c''est un instrument que toute la famille '),
('2', '1', 'Guitare Classique StaggC432', 'img/guitare-staggc432.jpg', '75.20', 10, 'Handed Le Stagg Stagg C432 Gauche 3 Quarter Taille Guitare Classique aidera tous les petits joueurs gauchers font leurs premiers pas dans le monde du classique Guitar. Le corps en tilleul forme se sent solide et permet d''amplifier un ton naturel qui est p'),
('3', '2', 'Clarinette basse - BC1193 PRESTIGE', 'img/clarinette-buffetcrampon.jpg', '8799.00', 10, 'La clarinette basse Prestige BC1193 représente le savoir-faire Buffet Crampon à son plus haut niveau. Elle possède un levier Mib/Lab et une clé de résonance Sol grave. Elle est également équipée d?une spatule double Ré grave et d''une spatule de triple Ré '),
('4', '2', 'Trompette Ut/Bb YAMAHA YTR 4435', 'img/trompette-yamaha.jpg', '979.00', 10, 'La YTR 4435 est une trompette en UT livrée avec un jeu de 4 coulisses pour une meilleure musicalité en Bb. Elle comporte des pistons en Monel ayant une action rapide et fiable et un pavillon en cuivre rose produisant un son riche et chaud. La totalité de '),
('5', '3', 'Djembe Tanga Slammer', 'img/djembe-tangaslammer.jpg', '47.07', 10, 'Apparu en Afrique chez les Malinké en Guinée au XIIIeme siècle, le djembe s''est répandu massivement depuis les années 60 dans le reste du monde. Très abordable, et accessible de 7 à 77 ans n''attendez plus pour vous mettre au djembé. En bois ou en fibre, d'),
('6', '3', 'Meinl MSM2 Skin Maracas M', 'img/maracas-meinl.jpg', '15.60', 10, 'Les maracas Skin de Meink sont entièrement fabriqués à la main (peau animale, poignée en bois) et sont disponibles en deux tailles.'),
('7', '3', 'Batterie Pearl VBA Vision Birch Artisan Celtic Maori', 'img/batterie-pearl.jpg', '899.00', 10, 'Une nouvelle fois, Pearl frappe fort avec cette édition limitée Vision Birch Artisan aux design uniques.'),
('8', '3', 'Bongo Cubanito NT', 'img/bongo-cubanito.jpg', '69.00', 10, 'Robustes et versatiles, les bongos CUBANITO sont dotés de fûts plus grands qu''une paire de bongos standard et offrent une plus large tessiture et des sonorités profondes et douces. Parfaits pour enrichir la rythmique, quel que soit le style de musique.'),
('9', '3', 'Balafon Pentatonique - 12 lames', 'img/balafon-pentatonique.jpg', '95.00', 10, 'Ce modèle est conçue artisanalement en Afrique par Youssouf KEÏTA ; reconnu comme le meilleur fabriquant de balafon de l''Afrique de l''Ouest. Le bois utilisé est le gueni, et c’est au cœur du duramen que sont extraient les lames leur donnant une très grand');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`IDCLIENT`) REFERENCES `client` (`IDCLIENT`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`IDCOMMANDE`) REFERENCES `commande` (`IDCOMMANDE`),
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`IDINSTRU`) REFERENCES `instrument` (`IDINSTRU`);

--
-- Contraintes pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD CONSTRAINT `instrument_ibfk_1` FOREIGN KEY (`IDCATEGORIE`) REFERENCES `categorie` (`IDCATEGORIE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
