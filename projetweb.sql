-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 04 mai 2019 à 14:30
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
-- Base de données :  `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_item` int(4) NOT NULL,
  `email_vendeur` varchar(255) NOT NULL,
  PRIMARY KEY (`email_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email_admin`, `password_admin`, `nom_admin`, `email`, `id_item`, `email_vendeur`) VALUES
('fredjdg@gmail.com', 'jeudemerde', 'Fred', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `carte_bancaire`
--

DROP TABLE IF EXISTS `carte_bancaire`;
CREATE TABLE IF NOT EXISTS `carte_bancaire` (
  `numero_carte` double NOT NULL,
  `expiration` date NOT NULL,
  `nom_affiche` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int(4) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `email_vendeur` varchar(255) NOT NULL,
  PRIMARY KEY (`numero_carte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carte_bancaire`
--

INSERT INTO `carte_bancaire` (`numero_carte`, `expiration`, `nom_affiche`, `type`, `code`, `email_client`, `email_vendeur`) VALUES
(1.254145236984051e15, '2020-07-15', 'Tombe', 'Visa', 1540, 'stagiaire@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `email_client` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `adresse_postale` varchar(255) NOT NULL,
  `code_postale` int(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `numero_tel` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`email_client`, `password`, `nom_client`, `prenom_client`, `adresse_postale`, `code_postale`, `ville`, `pays`, `numero_tel`, `email`) VALUES
('stagiaire@gmail.com', 'unticketrestosvp', 'Tombe', 'Alexa', '24 rue high street', 56360, 'Bangor', 'De_Galle', 650147895, ''),
('Vuong.jimmy@ymail.com', '1234', 'VUONG', 'Jimmy', '9 rue Victor Hugo', 92300, 'Levallois Perret', 'France', 682511678, ''),
('Alibaba@gmail.com', '1234', 'Ali', 'BABA ', '3 rue Delaforge', 93, 'Jeune LavallÃ©', 'France', 23242352, ''),
('BDA', '12345', 'B', 'BABA', '3 rue Delaforge Meunier', 92300, 'ARdeche', 'France', 234235, ''),
('ergegr', 'ergerg', 'erger', 'egereg', 'ergergerg', 1214, 'ergerge', 'ergerg', 232542, ''),
('', '', '', '', '', 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` varchar(255) NOT NULL,
  `id_item` int(4) NOT NULL,
  `id_panier` int(4) NOT NULL,
  `quantite` int(5) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `email_vendeur` varchar(255) NOT NULL,
  `email_acheteur` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`email`, `password`, `type`, `email_admin`, `email_vendeur`, `email_acheteur`) VALUES
('fredjdg@gmail.com', 'jeudemerde', 'Admin', '', '', ''),
('jeanmichelbruitage@gmail.com', 'yametekudasai', 'Vendeur', '', '', ''),
('davidgoodenough@gmail.com', 'cpassimal', 'Vendeur', '', '', ''),
('stagiaire@gmail.com', 'unticketrestosvp', 'Client', '', '', ''),
('Vuong.jimmy@ymail.com', '1234', 'Client', '', '', ''),
('Alibaba@gmail.com', '1234', 'Client', '', '', ''),
('BDA', '12345', 'Client', '', '', ''),
('ergegr', 'ergerg', 'Client', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(4) NOT NULL AUTO_INCREMENT,
  `nom_item` varchar(255) NOT NULL,
  `photos_item` varchar(255) NOT NULL,
  `description_item` varchar(500) NOT NULL,
  `video_item` varchar(255) NOT NULL,
  `categorie_item` varchar(255) NOT NULL,
  `sous_categorie` varchar(255) NOT NULL,
  `prix_item` float NOT NULL,
  `stock_item` int(5) NOT NULL,
  `id_commande` int(4) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `id_mesventes` int(4) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id_item`, `nom_item`, `photos_item`, `description_item`, `video_item`, `categorie_item`, `sous_categorie`, `prix_item`, `stock_item`, `id_commande`, `email_admin`, `id_mesventes`, `email_client`) VALUES
(8, 'magikarpe', 'http://www.fredzone.org/wp-content/uploads/2017/05/magicarpe-640x418.jpg', '', '', '', '', 12413100, 134, 134, '134', 134, '134'),
(9, '1341', 'https://i.ytimg.com/vi/vEuecve1VHc/maxresdefault.jpg', 'Z', '', '', '', 2342, 23423, 234, '', 234234, ''),
(10, 'ZEFZEF', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY7tjSru-bVdxHz_MZamWo-Q4XGLQD345ufjJZwPnExZbCD_4Q', 'ERG', '', '', '', 234234, 234, 234, '', 234, ''),
(2, 'furubu maison campagne', 'http://www.campingduvillard.com/images/2016/04/20/chalet-500x300.jpg', 'très jolie.', 'nique', 'Sortie ', 'de loulou ', 0, 1, 1, 'furubu.furufuru.dokidoki.emma@gmail.com', 1, 'kzefzeifh'),
(3, 'lalal', 'https://www.pokepedia.fr/images/4/47/Taupiqueur-a-SL.png', 'lalal', '', 'lalal', 'lalal', 122433, 13434, 1, 'zefzef', 1221, 'azrazr'),
(4, 'ZEFZEF', 'http://www.pappakapsyl.se/wp-content/uploads/2012/10/Jagad_landscape_generisk_2016_500x300-1024x614.jpg', 'ZEZEFZE', 'ZFZEF', 'ZEFZF', 'FZEF', 1212, 234234, 234324, 'ZEFZEFZEF', 2343, 'ZFZEFFE'),
(11, 'Magi Love <3', 'https://pbs.twimg.com/media/CsbzBpgUEAAJ8yK.jpg', '', '', '', '', 2234230, 2343, 234, '', 234, ''),
(12, 'Love Splashe', 'https://external-preview.redd.it/-6GHBr4SK3AEFAteOCbd56umKWOQRE6T8Db0X0yZGuU.jpg?auto=webp&s=aa933ec309596ae077f6bec8c3551911910eb265', 'zeg', '', '', '', 324, 234, 234, '', 233, ''),
(13, 'Sadness', 'https://external-preview.redd.it/tpJnxpcBkkWY1_TLifqEsNxIAaRsnqlUk_MdN05DlBI.jpg?auto=webp&s=25cbeca7362a38283c3d5fba296e7fd08863579a', 'Tristounettte tristounet', '', '', '', 23, 234, 324, '', 234, ''),
(14, 'STRONGEST', 'https://www.pdvg.it/wp-content/uploads/2017/05/pokemonmagikarpjumppdv.jpg', '', '', '', '', 234, 234, 234, '', 24, '');

-- --------------------------------------------------------

--
-- Structure de la table `mes_ventes`
--

DROP TABLE IF EXISTS `mes_ventes`;
CREATE TABLE IF NOT EXISTS `mes_ventes` (
  `id_mes_ventes` int(4) NOT NULL AUTO_INCREMENT,
  `email_vendeur` varchar(255) NOT NULL,
  `id_item` int(4) NOT NULL,
  PRIMARY KEY (`id_mes_ventes`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mes_ventes`
--

INSERT INTO `mes_ventes` (`id_mes_ventes`, `email_vendeur`, `id_item`) VALUES
(1, 'jeanmichelbruitage@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(4) NOT NULL AUTO_INCREMENT,
  `email_client` varchar(255) NOT NULL,
  `id_commande` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `email_client`, `id_commande`) VALUES
(1, 'stagiaire@gmail.com', '1'),
(3, 'rgergeg', '0'),
(4, 'RGeg@ergre', NULL),
(5, 'BDA', NULL),
(6, 'BDA', NULL),
(7, 'ergegr', NULL),
(8, 'ergegr', NULL),
(9, '', NULL),
(10, '', NULL),
(11, '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `email_vendeur` varchar(255) NOT NULL,
  `prenom_vendeur` varchar(255) NOT NULL,
  `nom_vendeur` varchar(255) NOT NULL,
  `photo_vendeur` varchar(255) NOT NULL,
  `photo_fond` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `id_ventes` int(4) NOT NULL,
  PRIMARY KEY (`email_vendeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`email_vendeur`, `prenom_vendeur`, `nom_vendeur`, `photo_vendeur`, `photo_fond`, `email`, `email_admin`, `id_ventes`) VALUES
('davidgoodenough@gmail.com', '', 'Goodenough', 'https://risibank.fr/cache/stickers/d910/91038-full.png', 'https://france3-regions.francetvinfo.fr/provence-alpes-cote-d-azur/sites/regions_france3/files/styles/top_big/public/assets/images/2019/03/19/sdis83-4143574.jpg?itok=pqqwo8qC', '', '', 0),
('jeanmichelbruitage@gmail.com', '', 'Bruitage', 'https://risibank.fr/cache/stickers/d471/47177-full.png', 'https://www.thomann.de/blog/wp-content/uploads/2016/03/12-accessoires-pour-le-home-studio-10.jpg', '', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
