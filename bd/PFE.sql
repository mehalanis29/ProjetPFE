-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 08 juin 2019 à 19:28
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `num_passport` varchar(35) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `nationalite` int(11) DEFAULT NULL,
  `date_emission_passport` date DEFAULT NULL,
  `date_expiration_passport` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `num_passport`, `nom`, `prenom`, `date_naissance`, `email`, `password`, `phone`, `nationalite`, `date_emission_passport`, `date_expiration_passport`) VALUES
(1, '321521', 'mehal', 'anis', '1999-05-29', 'mehalanis29@gmail.com', '38a1ffb5ccad9612d3d28d99488ca94b', '01264521', 3, '2018-05-19', '2022-06-19');

-- --------------------------------------------------------

--
-- Structure de la table `endroit`
--

CREATE TABLE `endroit` (
  `endroit_id` int(11) NOT NULL,
  `endroit_nom` varchar(35) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `endroit`
--

INSERT INTO `endroit` (`endroit_id`, `endroit_nom`, `ville_id`, `description`) VALUES
(1, 'Alger - Rome', 1, 'Départ de Alger à destination de ROME sur vol Air-algerie. Arrivé assistance et départ vers Rome , arriver à Hôtel, répartition des chambres et soirée libre '),
(2, 'Big Bus Rome Hop-on Hop-off', 1, 'Asseyez-vous et profitez de la balade à bord d\'un bus à toit ouvert et découvrez l\'histoire unique et ancienne de Rome. ');

-- --------------------------------------------------------

--
-- Structure de la table `guide`
--

CREATE TABLE `guide` (
  `guide_id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `address` text,
  `class` int(11) DEFAULT NULL,
  `img` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `ville_id`, `nom`, `telephone`, `address`, `class`, `img`) VALUES
(1, 1, 'Novotel Paris Centre Gare Mont', '+3345123326', '17 rue du Cotentin, 75015 Paris France', 4, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `on_demande`
--

CREATE TABLE `on_demande` (
  `on_demande_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `pays_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `pays_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`pays_id`, `nom`, `nationalite`, `pays_code`) VALUES
(1, 'Afrique du Sud', 'Sud-Africain', 'ZA'),
(2, 'Albanie', 'Albanais', 'AL'),
(3, 'Algérie', 'Algérien', 'DZ'),
(4, 'Allemagne', 'Allemand', 'DE'),
(5, 'Argentine', 'Argentin', 'AR'),
(6, 'Australie', 'Australien', 'AU'),
(7, 'Autriche', 'Autrichien', 'AT'),
(8, 'Bénin', 'Benin', 'BJ'),
(9, 'Belgique', 'Belge', 'BE'),
(10, 'Bhoutan', 'Bouthan', 'BT'),
(11, 'Botswana', 'Botswanais', 'BW'),
(12, 'Brésil', 'Brésilien', 'BR'),
(13, 'Bulgarie', 'Bulgare', 'BG'),
(14, 'Burkina Faso', 'Burkina Faso', 'BF'),
(15, 'Côte d\'Ivoire', 'Ivoirien', 'CI'),
(16, 'Cambodge', 'Cambodgien', 'KH'),
(17, 'Cameroun', 'Camerounais', 'CM'),
(18, 'Canada', 'Canadien', 'CA'),
(19, 'Chili', 'Chilien', 'CL'),
(20, 'Chine', 'Chinois', 'CN'),
(21, 'Colombie', 'Colombien', 'CO'),
(22, 'Corée du Sud', 'Coréen', 'KR'),
(23, 'Costa Rica', 'Costaricien', 'CR'),
(24, 'Croatie', 'Croate', 'HR'),
(25, 'Cuba', 'Cubain', 'CU'),
(26, 'Danemark', 'Danois', 'DK'),
(27, 'Égypte', 'Egyptien', 'EG'),
(28, 'Équateur', 'Equatorien', 'EC'),
(29, 'Espagne', 'Espagnol', 'ES'),
(30, 'Estonie', 'Estonien', 'EE'),
(31, 'États-Unis', 'Américain', 'US'),
(32, 'Finlande', 'Finlandais', 'FI'),
(33, 'France', 'Français', 'FR'),
(34, 'Géorgie', 'Georgien', 'GE'),
(35, 'Gabon', 'Gabonais', 'GA'),
(36, 'Grèce', 'Grec', 'GR'),
(37, 'Haïti', 'Haïtien', 'HT'),
(38, 'Hong Kong', 'Hong-Kong', 'HK'),
(39, 'Hongrie', 'Hongrois', 'HU'),
(40, 'Inde', 'Indien', 'IN'),
(41, 'Iran', 'Iranien', 'IR'),
(42, 'Irlande', 'Irlandais', 'IE'),
(43, 'Islande', 'Islandais', 'IS'),
(44, 'Israël', 'Israélien', 'IL'),
(45, 'Italie', 'Italien', 'IT'),
(46, 'Jamaïque', 'Jamaïcain', 'JM'),
(47, 'Japon', 'Japonais', 'JP'),
(48, 'Kazakhstan', 'Kazakh', 'KZ'),
(49, 'Lettonie', 'Lettonien', 'LV'),
(50, 'Liban', 'Libanais', 'LB'),
(51, 'Lituanie', 'Lituanien', 'LT'),
(52, 'Luxembourg', 'Luxembourgeois', 'LU'),
(53, 'Madagascar', 'Malgache', 'MG'),
(54, 'Mali', 'Malien', 'ML'),
(55, 'Maroc', 'Marocain', 'MA'),
(56, 'Mexique', 'Mexicain', 'MX'),
(57, 'Norvège', 'Norvégien', 'NO'),
(58, 'Nouvelle-Zélande', 'Néo-Zélandais', 'NZ'),
(59, 'Pérou', 'Péruvien', 'PE'),
(60, 'Pays-Bas', 'Néerlandais', 'NL'),
(61, 'Pologne', 'Polonais', 'PL'),
(62, 'Portugal', 'Portugais', 'PT'),
(63, 'République tchèque', 'Tchèque', 'CZ'),
(64, 'Roumanie', 'Roumain', 'RO'),
(65, 'Royaume-Uni', 'Britannique', 'GB'),
(66, 'Russie', 'Russe', 'RU'),
(67, 'Sénégal', 'Sénégalais', 'SN'),
(68, 'Singapour', 'Singapourien', 'SG'),
(69, 'Slovénie', 'Slovaque', 'SI'),
(70, 'Suède', 'Suédois', 'SE'),
(71, 'Suisse', 'Suisse', 'CH'),
(72, 'Taïwan', 'Taïwanais', 'TW'),
(73, 'Tunisie', 'Tunisien', 'TN'),
(74, 'Turquie', 'Turc', 'TR'),
(75, 'Ukraine', 'Ukrainien', 'UA'),
(76, 'Uruguay', 'Uruguayen', 'UY'),
(77, 'Venezuela', 'Vénézuélien', 'VE');

-- --------------------------------------------------------

--
-- Structure de la table `programe_on_demande`
--

CREATE TABLE `programe_on_demande` (
  `programe_on_demande_id` int(11) NOT NULL,
  `on_demande_id` int(11) DEFAULT NULL,
  `endroit_id` int(11) DEFAULT NULL,
  `visite_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `voyage_date_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `nbr_place` int(11) DEFAULT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  `date_reserve` date DEFAULT NULL,
  `date_rendezvous` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `ville_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`ville_id`, `nom`, `pays_id`) VALUES
(1, 'ROMA', 45);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `voyage_id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `nbr_jour` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `cover` varchar(20) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`voyage_id`, `nom`, `ville_id`, `guide_id`, `nbr_jour`, `hotel_id`, `cover`, `description`) VALUES
(1, 'ROMA 2019', 1, NULL, 7, 1, 'test.jpg', 'Roma la ville la plus belle'),
(3, 'test_nom', 1, NULL, 7, 1, 'test.jpg', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `voyage_date`
--

CREATE TABLE `voyage_date` (
  `voyage_date_id` int(11) NOT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `prix_A_S` float DEFAULT NULL,
  `prix_A_D` float DEFAULT NULL,
  `prix_A_T` float DEFAULT NULL,
  `prix_E` float DEFAULT NULL,
  `prix_B` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voyage_date`
--

INSERT INTO `voyage_date` (`voyage_date_id`, `voyage_id`, `date_depart`, `date_retour`, `capacite`, `prix_A_S`, `prix_A_D`, `prix_A_T`, `prix_E`, `prix_B`) VALUES
(1, 3, '2019-05-29', '2019-05-07', 251, 11, 12, 13, 14, 15),
(2, 3, '2020-05-18', '2020-05-23', 101, 6, 7, 8, 9, 10),
(3, 1, '2019-01-05', '2019-01-15', 100, 1, 2, 3, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `voyage_jour`
--

CREATE TABLE `voyage_jour` (
  `voyage_jour_id` int(11) NOT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `nbr_jour` int(11) DEFAULT NULL,
  `endroit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voyage_jour`
--

INSERT INTO `voyage_jour` (`voyage_jour_id`, `voyage_id`, `nbr_jour`, `endroit_id`) VALUES
(2, 1, 1, 1),
(3, 1, 2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `endroit`
--
ALTER TABLE `endroit`
  ADD PRIMARY KEY (`endroit_id`),
  ADD KEY `AK_endroit_id` (`endroit_id`),
  ADD KEY `endroit_id` (`endroit_id`),
  ADD KEY `FK_Reference_11` (`ville_id`);

--
-- Index pour la table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `AK_guide_id` (`guide_id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD UNIQUE KEY `hotel_id` (`hotel_id`),
  ADD KEY `AK_hotel_id` (`hotel_id`),
  ADD KEY `FK_Reference_17` (`ville_id`);

--
-- Index pour la table `on_demande`
--
ALTER TABLE `on_demande`
  ADD PRIMARY KEY (`on_demande_id`),
  ADD UNIQUE KEY `on_demande_id` (`on_demande_id`),
  ADD KEY `AK_Key_1` (`on_demande_id`),
  ADD KEY `FK_Reference_13` (`hotel_id`),
  ADD KEY `FK_Reference_16` (`guide_id`),
  ADD KEY `FK_Reference_7` (`client_id`),
  ADD KEY `FK_Reference_9` (`ville_id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`pays_id`),
  ADD KEY `AK_pays_id` (`pays_id`),
  ADD KEY `pays_id` (`pays_id`);

--
-- Index pour la table `programe_on_demande`
--
ALTER TABLE `programe_on_demande`
  ADD PRIMARY KEY (`programe_on_demande_id`),
  ADD KEY `AK_Key_1` (`programe_on_demande_id`),
  ADD KEY `programe_on_demande_id` (`programe_on_demande_id`),
  ADD KEY `FK_Reference_10` (`endroit_id`),
  ADD KEY `FK_Reference_8` (`on_demande_id`);

--
-- Index pour la table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD UNIQUE KEY `reserve_id` (`reserve_id`),
  ADD KEY `FK_Reference_3` (`voyage_date_id`),
  ADD KEY `FK_Reference_4` (`client_id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`ville_id`),
  ADD KEY `AK_ville` (`ville_id`),
  ADD KEY `ville` (`ville_id`),
  ADD KEY `FK_Reference_5` (`pays_id`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`voyage_id`),
  ADD KEY `voyage_id` (`voyage_id`),
  ADD KEY `FK_Reference_12` (`hotel_id`),
  ADD KEY `FK_Reference_15` (`guide_id`),
  ADD KEY `FK_Reference_6` (`ville_id`);

--
-- Index pour la table `voyage_date`
--
ALTER TABLE `voyage_date`
  ADD PRIMARY KEY (`voyage_date_id`),
  ADD KEY `voyage_date_id` (`voyage_date_id`),
  ADD KEY `FK_Reference_2` (`voyage_id`);

--
-- Index pour la table `voyage_jour`
--
ALTER TABLE `voyage_jour`
  ADD PRIMARY KEY (`voyage_jour_id`),
  ADD KEY `voyage_jour_id` (`voyage_jour_id`),
  ADD KEY `FK_Reference_1` (`voyage_id`),
  ADD KEY `FK_Reference_14` (`endroit_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `endroit`
--
ALTER TABLE `endroit`
  MODIFY `endroit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `on_demande`
--
ALTER TABLE `on_demande`
  MODIFY `on_demande_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `pays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `programe_on_demande`
--
ALTER TABLE `programe_on_demande`
  MODIFY `programe_on_demande_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `voyage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `voyage_date`
--
ALTER TABLE `voyage_date`
  MODIFY `voyage_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `voyage_jour`
--
ALTER TABLE `voyage_jour`
  MODIFY `voyage_jour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `endroit`
--
ALTER TABLE `endroit`
  ADD CONSTRAINT `FK_Reference_11` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

--
-- Contraintes pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `FK_Reference_17` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

--
-- Contraintes pour la table `on_demande`
--
ALTER TABLE `on_demande`
  ADD CONSTRAINT `FK_Reference_13` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `FK_Reference_16` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`),
  ADD CONSTRAINT `FK_Reference_7` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `FK_Reference_9` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

--
-- Contraintes pour la table `programe_on_demande`
--
ALTER TABLE `programe_on_demande`
  ADD CONSTRAINT `FK_Reference_10` FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`),
  ADD CONSTRAINT `FK_Reference_8` FOREIGN KEY (`on_demande_id`) REFERENCES `on_demande` (`on_demande_id`);

--
-- Contraintes pour la table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `FK_Reference_3` FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`),
  ADD CONSTRAINT `FK_Reference_4` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `FK_Reference_5` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`pays_id`);

--
-- Contraintes pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `FK_Reference_12` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `FK_Reference_15` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`),
  ADD CONSTRAINT `FK_Reference_6` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

--
-- Contraintes pour la table `voyage_date`
--
ALTER TABLE `voyage_date`
  ADD CONSTRAINT `FK_Reference_2` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voyage_jour`
--
ALTER TABLE `voyage_jour`
  ADD CONSTRAINT `FK_Reference_1` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`),
  ADD CONSTRAINT `FK_Reference_14` FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
