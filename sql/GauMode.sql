-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 25 Février 2023 à 11:37
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sitevetement`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(8) NOT NULL,
  `vetement` varchar(50) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `reduction` decimal(5,2) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `description` text,
  `possede` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `vetement`, `marque`, `prix`, `reduction`, `image`, `description`, `possede`) VALUES
(1, 'Accessoire', 'H&M', '19.99', '12.99', 'accessoire1.jpg', 'Sac de ceinture, Banane verte, homme', 0),
(2, 'Accessoire', 'ASOS', '15.99', '-1.00', 'accessoire2.jpg', '', 0),
(3, 'Accessoire', 'ASOS', '77.99', '39.99', 'accessoire3.jpg', 'Carhartt WIP - Brandon - Sac banane.\r\nBanane verte et noir', 1),
(4, 'Blouson', 'H&M', '39.99', '-1.00', 'blouson1.jpg', 'Veste outdoor sans manches', 0),
(6, 'Chaussure', 'ASOS', '74.99', '-1.00', 'chaussure2.jpg', 'Nike - Court Vintage - Baskets en cuir de qualité supérieure - Blanc. Chaussure Nike blanche, homme', 0),
(7, 'Chaussure', 'ASOS', '89.95', '-1.00', 'chaussure3.jpg', 'Reebok Classics - Club C Grow - Baskets avec languette rouge - Blanc cassé.', 1),
(8, 'Chaussure', '99BANDO', '59.99', '17.45', 'chaussure4.jpg', 'Truffle Collection - Baskets à semelle chunky - Beige mélangé. \r\n\r\nChaussure', 0),
(9, 'Chaussure', 'ASOS', '45.00', '-1.00', 'chaussure5.jpg', 'ASOS DESIGN - Baskets à semelle chunky - Taupe. Chaussure blanche ', 0),
(10, 'Chaussure', 'ASOS', '27.99', '-1.00', 'chaussure6.jpg', 'Pull&Bear - NASA - Baskets - Blanc', 0),
(11, 'Accessoire', 'H&M', '29.99', '-1.00', 'pant1.jpg', 'Relaxed Jeans, pantalon en jean bleu clair, homme', 1),
(13, 'Pantalon', 'H&M', '29.99', '-1.00', 'pant3.jpg', 'Pantalon jogger cargo en nylon', 0),
(14, 'Accessoire', 'H&M', '34.99', '-1.00', 'pant4.jpg', 'Pantalon cargo Regular Fit', 0),
(16, 'T-shirt', 'DICKIES', '45.00', '-1.00', 't-shirt1.jpg', 'CARHARTT S/S KENT T-SHIRT KENT STRIPE / FRAISER T-shirt sketteur vert rouge, homme / ', 0),
(17, 'T-shirt', 'H&M', '6.99', '-1.00', 't-shirt2.jpg', 'T-shirt Regular Fit / 0763275001', 1),
(18, 'T-shirt', 'ASOS', '14.45', '-1.00', 't-shirt3.jpg', 'COLLUSION Unisex - T-shirt oversize imprimé - Bleu /  1863684', 0),
(19, 'T-shirt', 'ASOS', '65.00', '-1.00', 't-shirt4.jpg', 'Dickies - Oakhaven - T-shirt de rugby à manches longues - Vert/noir / 2026800', 0),
(20, 'T-shirt', 'ASOS', '32.99', '18.10', 't-shirt5.jpg', 'ASOS DESIGN - T-shirt Ramones effet tie-dye - Vert et blanc / 1974961', 0),
(21, 'T-shirt', 'ASOS', '26.75', '17.50', 't-shirt6.jpg', 'Reclaimed Vintage Inspired - T-shirt oversize en coton biologique avec imprimé cerf - Bordeaux délavé', 1),
(22, 'T-shirt', 'ASOS', '30.00', '15.00', 't-shirt7.jpg', 'The North Face - Exclusivité ASOS - T-shirt à imprimé montagne - Blanc / 106658374', 0),
(23, 'T-shirt', 'ASOS', '20.99', '-1.00', 't-shirt8.png', 'New Look - T-shirt oversize à imprimé Fanta - Blanc / 102831050', 0),
(24, 'Veste', 'H&M', '20.00', '-1.00', 'veste1.jpg', 'Chemise en coton Regular Fit / 0981640001', 1),
(25, 'Veste', 'H&M', '17.99', '-1.00', 'veste2.jpg', 'Cotton flannel shirt / 0908891002', 0),
(26, 'Veste', 'H&M', '29.95', '-1.00', 'veste3.jpg', 'Regular Fit Flannel shirt / 0996265002', 0),
(28, 'Veste', 'ASOS', '63.95', '35.15', 'veste5.jpg', 'Reclaimed Vintage Inspired - Veste unisexe en jean - Beige / 104033505', 0),
(29, 'Veste', 'ASOS', '39.00', '-1.00', 'veste6.png', 'Hollister - Chemise en flanelle à logo manuscrit et à carreaux - Noir / 1993678', 0);

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(8) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `lien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `lien`) VALUES
(1, 'ASOS', ''),
(2, 'H&M', ''),
(3, 'ZARA', ''),
(4, 'ZALENDO', ''),
(5, 'AMAZON', ''),
(6, 'THRIFTED', ''),
(7, '99BANDO', ''),
(8, 'DICKIES', ''),
(9, 'UNIQLO', ''),
(10, 'REPRESENTE CLO', ''),
(11, 'URBAN OUTFITTER', ''),
(12, 'PULL&BEER', ''),
(13, 'DEMONITESBRAND', ''),
(14, 'AELFRICEDEN', ''),
(15, 'INFINITE ARCHIVE', ''),
(16, 'Aucune', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(8) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Accessoire'),
(2, 'Blouson'),
(3, 'Chaussure'),
(4, 'Pantalon'),
(5, 'Pull'),
(6, 'T-shirt'),
(7, 'Veste');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
