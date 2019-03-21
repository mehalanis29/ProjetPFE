drop database pfe;
create database pfe charset=utf8 collate=utf8_general_ci;
use pfe;
CREATE TABLE `client`
(
	`client_id` int primary key auto_increment,
	`num_passport` varchar(20),
	`nom` varchar(25),
	`prenom` varchar(25),
	`date_naissance` date,
	`pays` int,
	`email` varchar(30),
	`password` varchar(30),
	`phone` varchar(30),
	`address` varchar(60),
	`city` varchar(30),
	`nationalite` int,
	`date_emission_passport` date,
	`date_expiration_passport` date
);

CREATE TABLE `voyage`
(
	`voyage_id` int primary key auto_increment,
	`nom` varchar(20),
	`lieu` varchar(20),
	`nbr_jour` int,
	`nbr_nuit` int,
	`lieu_depart` varchar(20),
	`description` text,
	`prix` int,
	`capacite` int,
	`img` varchar(10)
);

CREATE TABLE `image_voyage`
(
	`image_voyage_id` int primary key auto_increment,
	`voyage_id` int,
	`img` varchar(20)
);

CREATE TABLE `voyage_date`
(
	`voyage_date_id` int primary key auto_increment,
	`voyage_id` int,
	`date_depart` date,
	`date_retour` date
);

CREATE TABLE `reserve`
(
	`reserve_id` int primary key auto_increment,
	`voyage_date_id` int,
	`client_id` int,
	`nbr_place` int,
	`groupe_id` int,
	`date_reserve` date,
	`date_rendezvous` date
);

CREATE TABLE `groupe`
(
	`groupe_id` int primary key auto_increment,
	`client_id` int,
	`type_groupe_id` int
);

CREATE TABLE `type_groupe`
(
	`type_groupe_id` int primary key auto_increment,
	`nom` varchar(20)
);

CREATE TABLE `ville`
(
	`ville_id` int primary key auto_increment,
	`nom_ville` varchar(20),
	`pays_id` int,
	`img` varchar(20)
);

CREATE TABLE `pays`
(
	`pays_id` int primary key auto_increment,
	`pays_code` varchar(3),
	`nom` varchar(20),
	`nationalite` varchar(20)
);

CREATE TABLE `on_demande`
(
	`on_demande_id` int primary key auto_increment,
	`client_id` int,
	`groupe_id` int,
	`ville_id` int,
	`hotel_id` int,
	`guide_id` int
);

CREATE TABLE `programe`
(
	`on_demande_id` int primary key auto_increment,
	`endroit_id` int,
	`visite_date` date
);

CREATE TABLE `endroit`
(
	`endroit_id` int primary key auto_increment,
	`ville_id` int,
	`description` text,
	`prix` varchar(10)
);

CREATE TABLE `image_endroit`
(
	`id` int primary key auto_increment,
	`endroit_id` int,
	`img` varchar(20)
);

CREATE TABLE `image_ville`
(
	`id` int primary key auto_increment,
	`ville_id` int,
	`img` varchar(20)
);

CREATE TABLE `guide`
(
	`guide_id` int primary key auto_increment,
	`nom` varchar(20),
	`prenom` varchar(20),
	`prix` varchar(10)
);

ALTER TABLE `reserve` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `groupe` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `groupe` ADD FOREIGN KEY (`type_groupe_id`) REFERENCES `type_groupe` (`type_groupe_id`);

ALTER TABLE `reserve` ADD FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`);

ALTER TABLE `reserve` ADD FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`);

ALTER TABLE `voyage_date` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

ALTER TABLE `image_voyage` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `programe` ADD FOREIGN KEY (`on_demande_id`) REFERENCES `on_demande` (`on_demande_id`);

ALTER TABLE `programe` ADD FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`);

ALTER TABLE `endroit` ADD FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `ville` ADD FOREIGN KEY (`pays_id`) REFERENCES `pays` (`pays_id`);

ALTER TABLE `image_endroit` ADD FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`);

ALTER TABLE `image_ville` ADD FOREIGN KEY (`id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`);

ALTER TABLE `client` ADD FOREIGN KEY (`pays`) REFERENCES `pays` (`pays_id`);

ALTER TABLE `client` ADD FOREIGN KEY (`nationalite`) REFERENCES `pays` (`pays_id`);
