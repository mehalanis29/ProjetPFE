-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 12:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `num_passport` varchar(20) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `date_emission_passport` date DEFAULT NULL,
  `date_expiration_passport` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `num_passport`, `nom`, `prenom`, `date_naissance`, `email`, `password`, `phone`, `address`, `city`, `country`, `date_emission_passport`, `date_expiration_passport`) VALUES
(1, '2905', 'anis', 'mehal', '1999-05-29', 'anismehal@gmail.com', 'anis', '0673421519', 'adress blida', 'blida', '', '2015-07-19', '2022-01-15'),
(2, '2404', 'sofiane', 'mederbal', '1995-07-24', 'sofiane@gmail.com', 'sofiane', '0773441519', 'adress blida', 'blida', 'algerie', '2018-07-19', '2025-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `contrat`
--

CREATE TABLE `contrat` (
  `contrat_id` int(11) NOT NULL,
  `socite_id` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contrat`
--

INSERT INTO `contrat` (`contrat_id`, `socite_id`, `date_debut`, `date_fin`) VALUES
(1, 1, '2018-07-19', '2020-01-19'),
(2, 2, '2018-07-19', '2020-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `file_attente`
--

CREATE TABLE `file_attente` (
  `fileattente_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `voyage_date_id` int(11) DEFAULT NULL,
  `nbr_place` int(11) DEFAULT NULL,
  `date_reserve` date DEFAULT NULL,
  `date_rendezvous` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `groupe_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `type_groupe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`groupe_id`, `client_id`, `type_groupe_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `image_voyage`
--

CREATE TABLE `image_voyage` (
  `image_voyage_id` int(11) NOT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `img` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `voyage_date_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `groupe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `voyage_date_id`, `client_id`, `groupe_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `socite`
--

CREATE TABLE `socite` (
  `socite_id` int(11) NOT NULL,
  `type_socite_id` int(11) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socite`
--

INSERT INTO `socite` (`socite_id`, `type_socite_id`, `nom`) VALUES
(1, 1, 'air algerie'),
(2, 2, 'aurassi');

-- --------------------------------------------------------

--
-- Table structure for table `type_groupe`
--

CREATE TABLE `type_groupe` (
  `type_groupe_id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_groupe`
--

INSERT INTO `type_groupe` (`type_groupe_id`, `nom`) VALUES
(1, 'famille'),
(2, 'amis');

-- --------------------------------------------------------

--
-- Table structure for table `type_socite`
--

CREATE TABLE `type_socite` (
  `type_socite_id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_socite`
--

INSERT INTO `type_socite` (`type_socite_id`, `nom`) VALUES
(1, 'Aérienne'),
(2, 'Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

CREATE TABLE `voyage` (
  `voyage_id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `lieu` varchar(20) DEFAULT NULL,
  `nbr_jour` int(11) DEFAULT NULL,
  `nbr_nuit` int(11) DEFAULT NULL,
  `lieu_depart` varchar(20) DEFAULT NULL,
  `description` text,
  `prix` int(11) DEFAULT NULL,
  `hotel_contrat` int(11) DEFAULT NULL,
  `avion_contrat` int(11) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `img` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`voyage_id`, `nom`, `lieu`, `nbr_jour`, `nbr_nuit`, `lieu_depart`, `description`, `prix`, `hotel_contrat`, `avion_contrat`, `capacite`, `img`) VALUES
(1, 'ete tunisie', 'tunisie', 7, 6, 'blida', 'meilleur tourisme', 25000, 2, 1, 20, 'img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `voyage_date`
--

CREATE TABLE `voyage_date` (
  `voyage_date_id` int(11) NOT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voyage_date`
--

INSERT INTO `voyage_date` (`voyage_date_id`, `voyage_id`, `date_depart`, `date_retour`) VALUES
(1, 1, '2019-03-16', '2019-03-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`contrat_id`),
  ADD KEY `socite_id` (`socite_id`);

--
-- Indexes for table `file_attente`
--
ALTER TABLE `file_attente`
  ADD PRIMARY KEY (`fileattente_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `voyage_date_id` (`voyage_date_id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`groupe_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `type_groupe_id` (`type_groupe_id`);

--
-- Indexes for table `image_voyage`
--
ALTER TABLE `image_voyage`
  ADD PRIMARY KEY (`image_voyage_id`),
  ADD KEY `voyage_id` (`voyage_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `groupe_id` (`groupe_id`),
  ADD KEY `voyage_date_id` (`voyage_date_id`);

--
-- Indexes for table `socite`
--
ALTER TABLE `socite`
  ADD PRIMARY KEY (`socite_id`),
  ADD KEY `type_socite_id` (`type_socite_id`);

--
-- Indexes for table `type_groupe`
--
ALTER TABLE `type_groupe`
  ADD PRIMARY KEY (`type_groupe_id`);

--
-- Indexes for table `type_socite`
--
ALTER TABLE `type_socite`
  ADD PRIMARY KEY (`type_socite_id`);

--
-- Indexes for table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`voyage_id`),
  ADD KEY `hotel_contrat` (`hotel_contrat`),
  ADD KEY `avion_contrat` (`avion_contrat`);

--
-- Indexes for table `voyage_date`
--
ALTER TABLE `voyage_date`
  ADD PRIMARY KEY (`voyage_date_id`),
  ADD KEY `voyage_id` (`voyage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `contrat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_attente`
--
ALTER TABLE `file_attente`
  MODIFY `fileattente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `groupe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_voyage`
--
ALTER TABLE `image_voyage`
  MODIFY `image_voyage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socite`
--
ALTER TABLE `socite`
  MODIFY `socite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_groupe`
--
ALTER TABLE `type_groupe`
  MODIFY `type_groupe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_socite`
--
ALTER TABLE `type_socite`
  MODIFY `type_socite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `voyage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voyage_date`
--
ALTER TABLE `voyage_date`
  MODIFY `voyage_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`socite_id`) REFERENCES `socite` (`socite_id`) ON DELETE CASCADE;

--
-- Constraints for table `file_attente`
--
ALTER TABLE `file_attente`
  ADD CONSTRAINT `file_attente_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `file_attente_ibfk_2` FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`) ON DELETE CASCADE;

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`type_groupe_id`) REFERENCES `type_groupe` (`type_groupe_id`) ON DELETE CASCADE;

--
-- Constraints for table `image_voyage`
--
ALTER TABLE `image_voyage`
  ADD CONSTRAINT `image_voyage_ibfk_1` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`) ON DELETE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_3` FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`) ON DELETE CASCADE;

--
-- Constraints for table `socite`
--
ALTER TABLE `socite`
  ADD CONSTRAINT `socite_ibfk_1` FOREIGN KEY (`type_socite_id`) REFERENCES `type_socite` (`type_socite_id`) ON DELETE CASCADE;

--
-- Constraints for table `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `voyage_ibfk_1` FOREIGN KEY (`hotel_contrat`) REFERENCES `contrat` (`contrat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyage_ibfk_2` FOREIGN KEY (`avion_contrat`) REFERENCES `contrat` (`contrat_id`) ON DELETE CASCADE;

--
-- Constraints for table `voyage_date`
--
ALTER TABLE `voyage_date`
  ADD CONSTRAINT `voyage_date_ibfk_1` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
