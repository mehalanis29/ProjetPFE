CREATE TABLE `client` 
(
	`client_id` int  primary key auto_increment,
	`num_passport` varchar(20),
	`nom` varchar(25),
	`prenom` varchar(25),
	`date_naissance` date,
	`email` varchar(30),
	`phone` varchar(30),
	`address` varchar(60),
	`city` varchar(30),
	`country` varchar(25),
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
	`hotel_contrat` int,
	`avion_contrat` int,
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
	`groupe_id` int
);

CREATE TABLE `file_attente` 
(
	`fileattente_id` int primary key auto_increment,
	`client_id` int,
	`voyage_date_id` int,
	`nbr_place` int,
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

CREATE TABLE `contrat` 
(
	`contrat_id` int primary key auto_increment,
	`socite_id` int,
	`date_debut` date,
	`date_fin` date
);

CREATE TABLE `type_socite` 
(
	`type_socite_id` int primary key auto_increment,
	`nom` varchar(20)
);

CREATE TABLE `socite` 
(
	`socite_id` int primary key auto_increment,
	`type_socite_id` int,
	`nom` varchar(20)
);

ALTER TABLE `file_attente` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ;

ALTER TABLE `reserve` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE;

ALTER TABLE `groupe` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE;

ALTER TABLE `groupe` ADD FOREIGN KEY (`type_groupe_id`) REFERENCES `type_groupe` (`type_groupe_id`) ON DELETE CASCADE;

ALTER TABLE `reserve` ADD FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`) ON DELETE CASCADE;

ALTER TABLE `reserve` ADD FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`) ON DELETE CASCADE;

ALTER TABLE `voyage_date` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`) ON DELETE CASCADE;

ALTER TABLE `image_voyage` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`) ON DELETE CASCADE;

ALTER TABLE `voyage` ADD FOREIGN KEY (`hotel_contrat`) REFERENCES `contrat` (`contrat_id`) ON DELETE CASCADE; 

ALTER TABLE `voyage` ADD FOREIGN KEY (`avion_contrat`) REFERENCES `contrat` (`contrat_id`) ON DELETE CASCADE;

ALTER TABLE `contrat` ADD FOREIGN KEY (`socite_id`) REFERENCES `socite` (`socite_id`) ON DELETE CASCADE;

ALTER TABLE `socite` ADD FOREIGN KEY (`type_socite_id`) REFERENCES `type_socite` (`type_socite_id`) ON DELETE CASCADE;

ALTER TABLE `file_attente` ADD FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`) ON DELETE CASCADE;
