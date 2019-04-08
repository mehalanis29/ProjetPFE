drop database pfe;
create database pfe charset=utf8 collate=utf8_general_ci;
use pfe;
CREATE TABLE `client`
(
	`client_id` int auto_increment primary key,
	`num_passport` varchar(20),
	`nom` varchar(30),
	`prenom` varchar(30),
	`date_naissance` date,
	`pays` int,
	`email` varchar(30),
	`password` varchar(30),
	`phone` varchar(30),
	`address` varchar(150),
	`nationalite` int,
	`date_emission_passport` date,
	`date_expiration_passport` date
);

CREATE TABLE `voyage`
(
	`voyage_id` int auto_increment primary key,
	`ville_id` int,
	`nbr_jour` int,
	`hotel_id` int,
	`description` text,
	`prix` int,
	`capacite` int,
	`cover` varchar(50)
);
CREATE TABLE `voyage_jour`(
  `voyage_jour_id` int auto_increment primary key,
	`voyage_id` int,
	`nbr_jour` int,
	`endroit_id` int
);
CREATE TABLE `voyage_image`
(
	`image_voyage_id` int  auto_increment primary key,
	`voyage_id` int,
	`img` varchar(20)
);

CREATE TABLE `voyage_date`
(
	`voyage_date_id` int auto_increment primary key,
	`voyage_id` int,
	`date_depart` date,
	`date_retour` date
);

CREATE TABLE `reserve`
(
	`reserve_id` int auto_increment primary key,
	`voyage_date_id` int,
	`client_id` int,
	`nbr_place` int,
	`groupe_id` int,
	`date_reserve` date,
	`date_rendezvous` date
);

CREATE TABLE `groupe`
(
	`groupe_id` int auto_increment primary key,
	`type_groupe_id` int
);

CREATE TABLE `memebre_groupe`
(
	`memebre_groupe_id` int auto_increment primary key,
	`groupe_id` int,
	`client_id` int
);

CREATE TABLE `type_groupe`
(
	`type_groupe_id` int auto_increment primary key,
	`nom` varchar(20)
);

CREATE TABLE `ville`
(
	`ville_id` int auto_increment primary key,
	`nom_ville` varchar(20),
	`pays_id` int,
	`img` varchar(20)
);



CREATE TABLE `pays`
(
	`pays_id` int  auto_increment primary key,
	`pays_code` varchar(3),
	`nom` varchar(20),
	`nationalite` varchar(20)
);
INSERT INTO `pays`( pays_code, nom, nationalite) VALUES ('ZA', 'Afrique du Sud' , 'Sud-Africain' ) ,
('AL', 'Albanie' , 'Albanais' ) ,
('DZ', 'Algérie' , 'Algérien' ) ,
('DE', 'Allemagne' , 'Allemand' ) ,
('AR', 'Argentine' , 'Argentin' ) ,
('AU', 'Australie' , 'Australien' ) ,
('AT', 'Autriche' , 'Autrichien' ) ,
('BJ', 'Bénin' , 'Benin' ) ,
('BE', 'Belgique' , 'Belge' ) ,
('BT', 'Bhoutan' , 'Bouthan' ) ,
('BW', 'Botswana' , 'Botswanais' ) ,
('BR', 'Brésil' , 'Brésilien' ) ,
('BG', 'Bulgarie' , 'Bulgare' ) ,
('BF', 'Burkina Faso' , 'Burkina Faso' ) ,
('CI', 'Côte d\'Ivoire' , 'Ivoirien' ) ,
('KH', 'Cambodge' , 'Cambodgien' ) ,
('CM', 'Cameroun' , 'Camerounais' ) ,
('CA', 'Canada' , 'Canadien' ) ,
('CL', 'Chili' , 'Chilien' ) ,
('CN', 'Chine' , 'Chinois' ) ,
('CO', 'Colombie' , 'Colombien' ) ,
('KR', 'Corée du Sud' , 'Coréen' ) ,
('CR', 'Costa Rica' , 'Costaricien' ) ,
('HR', 'Croatie' , 'Croate' ) ,
('CU', 'Cuba' , 'Cubain' ) ,
('DK', 'Danemark' , 'Danois' ) ,
('EG', 'Égypte' , 'Egyptien' ) ,
('EC', 'Équateur' , 'Equatorien' ) ,
('ES', 'Espagne' , 'Espagnol' ) ,
('EE', 'Estonie' , 'Estonien' ) ,
('US', 'États-Unis' , 'Américain' ) ,
('FI', 'Finlande' , 'Finlandais' ) ,
('FR', 'France' , 'Français' ) ,
('GE', 'Géorgie' , 'Georgien' ) ,
('GA', 'Gabon' , 'Gabonais' ) ,
('GR', 'Grèce' , 'Grec' ) ,
('HT', 'Haïti' , 'Haïtien' ) ,
('HK', 'Hong Kong' , 'Hong-Kong' ) ,
('HU', 'Hongrie' , 'Hongrois' ) ,
('IN', 'Inde' , 'Indien' ) ,
('IR', 'Iran' , 'Iranien' ) ,
('IE', 'Irlande' , 'Irlandais' ) ,
('IS', 'Islande' , 'Islandais' ) ,
('IL', 'Israël' , 'Israélien' ) ,
('IT', 'Italie' , 'Italien' ) ,
('JM', 'Jamaïque' , 'Jamaïcain' ) ,
('JP', 'Japon' , 'Japonais' ) ,
('KZ', 'Kazakhstan' , 'Kazakh' ) ,
('LV', 'Lettonie' , 'Lettonien' ) ,
('LB', 'Liban' , 'Libanais' ) ,
('LT', 'Lituanie' , 'Lituanien' ) ,
('LU', 'Luxembourg' , 'Luxembourgeois' ) ,
('MG', 'Madagascar' , 'Malgache' ) ,
('ML', 'Mali' , 'Malien' ) ,
('MA', 'Maroc' , 'Marocain' ) ,
('MX', 'Mexique' , 'Mexicain' ) ,
('NO', 'Norvège' , 'Norvégien' ) ,
('NZ', 'Nouvelle-Zélande' , 'Néo-Zélandais' ) ,
('PE', 'Pérou' , 'Péruvien' ) ,
('NL', 'Pays-Bas' , 'Néerlandais' ) ,
('PL', 'Pologne' , 'Polonais' ) ,
('PT', 'Portugal' , 'Portugais' ) ,
('CZ', 'République tchèque' , 'Tchèque' ) ,
('RO', 'Roumanie' , 'Roumain' ) ,
('GB', 'Royaume-Uni' , 'Britannique' ) ,
('RU', 'Russie' , 'Russe' ) ,
('SN', 'Sénégal' , 'Sénégalais' ) ,
('SG', 'Singapour' , 'Singapourien' ) ,
('SI', 'Slovénie' , 'Slovaque' ) ,
('SE', 'Suède' , 'Suédois' ) ,
('CH', 'Suisse' , 'Suisse' ) ,
('TW', 'Taïwan' , 'Taïwanais' ) ,
('TN', 'Tunisie' , 'Tunisien' ) ,
('TR', 'Turquie' , 'Turc' ) ,
('UA', 'Ukraine' , 'Ukrainien' ) ,
('UY', 'Uruguay' , 'Uruguayen' ) ,
('VE', 'Venezuela' , 'Vénézuélien' );

CREATE TABLE `on_demande`
(
	`on_demande_id` int auto_increment primary key,
	`client_id` int,
	`groupe_id` int,
	`ville_id` int,
	`hotel_id` int,
	`guide_id` int
);

CREATE TABLE `programe`
(
	`on_demande_id` int auto_increment primary key,
	`endroit_id` int,
	`visite_date` date
);

CREATE TABLE `endroit`
(
	`endroit_id` int auto_increment primary key,
	`endroit_nom` varchar(40),
	`ville_id` int,
	`description` text,
	`prix` int
);

CREATE TABLE `endroit_image`
(
	`id` int auto_increment primary key,
	`endroit_id` int,
	`img` varchar(20)
);

CREATE TABLE `ville_image`
(
	`id` int auto_increment primary key,
	`ville_id` int,
	`img` varchar(20)
);

CREATE TABLE `guide`
(
	`guide_id` int auto_increment primary key,
	`nom` varchar(20),
	`prenom` varchar(20),
	`prix` varchar(10)
);

CREATE TABLE `hotel`
(
	`hotel_id` int auto_increment primary key,
	`nom` varchar(20),
	`telephone` varchar(20),
	`ville_id` int,
	`address` varchar(20),
	`class` int,
	`img` varchar(20)
);

CREATE TABLE `hotel_image`
(
	`id` int auto_increment primary key,
	`hotel_id` int,
	`img` varchar(20)
);

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `region` (`id`, `code`, `nom`) VALUES
(1, 1, 'Adrar'),
(2, 2, 'Chlef'),
(3, 3, 'Laghouat'),
(4, 4, 'Oum El Bouaghi'),
(5, 5, 'Batna'),
(6, 6, 'Béjaïa'),
(7, 7, 'Biskra'),
(8, 8, 'Béchar'),
(9, 9, 'Blida'),
(10, 10, 'Bouira'),
(11, 11, 'Tamanrasset'),
(12, 12, 'Tébessa'),
(13, 13, 'Tlemcen'),
(14, 14, 'Tiaret'),
(15, 15, 'Tizi Ouzou'),
(16, 16, 'Alger'),
(17, 17, 'Djelfa'),
(18, 18, 'Jijel'),
(19, 19, 'Sétif'),
(20, 20, 'Saïda'),
(21, 21, 'Skikda'),
(22, 22, 'Sidi Bel Abbès'),
(23, 23, 'Annaba'),
(24, 24, 'Guelma'),
(25, 25, 'Constantine'),
(26, 26, 'Médéa'),
(27, 27, 'Mostaganem'),
(28, 28, 'M\'Sila'),
(29, 29, 'Mascara'),
(30, 30, 'Ouargla'),
(31, 31, 'Oran'),
(32, 32, 'El Bayadh'),
(33, 33, 'Illizi'),
(34, 34, 'Bordj Bou Arreridj'),
(35, 35, 'Boumerdès'),
(36, 36, 'El Tarf'),
(37, 37, 'Tindouf'),
(38, 38, 'Tissemsilt'),
(39, 39, 'El Oued'),
(40, 40, 'Khenchela'),
(41, 41, 'Souk Ahras'),
(42, 42, 'Tipaza'),
(43, 43, 'Mila'),
(44, 44, 'Aïn Defla'),
(45, 45, 'Naâma'),
(46, 46, 'Aïn Témouchent'),
(47, 47, 'Ghardaïa'),
(48, 48, 'Relizane');


ALTER TABLE `region`
	 ADD PRIMARY KEY (`id`);

ALTER TABLE `hotel`
   ADD KEY `ville_id` (`ville_id`);


ALTER TABLE `region`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

ALTER TABLE `hotel`
		 ADD CONSTRAINT `ville_1` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `reserve` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `groupe` ADD FOREIGN KEY (`type_groupe_id`) REFERENCES `type_groupe` (`type_groupe_id`);

ALTER TABLE `reserve` ADD FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`);

ALTER TABLE `reserve` ADD FOREIGN KEY (`voyage_date_id`) REFERENCES `voyage_date` (`voyage_date_id`);

ALTER TABLE `voyage_date` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

ALTER TABLE `voyage_image` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`);

ALTER TABLE `programe` ADD FOREIGN KEY (`on_demande_id`) REFERENCES `on_demande` (`on_demande_id`);

ALTER TABLE `programe` ADD FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`);

ALTER TABLE `ville` ADD FOREIGN KEY (`pays_id`) REFERENCES `pays` (`pays_id`);

ALTER TABLE `endroit` ADD FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `endroit_image` ADD FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`);

ALTER TABLE `ville_image` ADD FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`);

ALTER TABLE `on_demande` ADD FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`);

ALTER TABLE `hotel_image` ADD FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`);

ALTER TABLE `memebre_groupe` ADD FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`groupe_id`);

ALTER TABLE `memebre_groupe` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `voyage` ADD FOREIGN KEY (`ville_id`) REFERENCES `ville` (`ville_id`);

ALTER TABLE `voyage` ADD FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`);

ALTER TABLE `voyage_jour` ADD FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

ALTER TABLE `voyage_jour` ADD FOREIGN KEY (`endroit_id`) REFERENCES `endroit` (`endroit_id`);

INSERT INTO `ville` (`ville_id`, `nom_ville`, `pays_id`, `img`) VALUES
(1, 'Paris', 33, '');

INSERT INTO `hotel` (`hotel_id`, `nom`, `telephone`, `ville_id`, `address`, `class`, `img`) VALUES
  (1, 'Novotel Paris Centre Gare Montparnasse', '+3345123326', 1, '17 rue du Cotentin, 75015 Paris France', 4, 'test');

INSERT INTO `voyage`(`ville_id`, `nbr_jour`, `hotel_id`, `description`, `prix`, `capacite`, `cover`) VALUES
  (1,7,1,'paris la ville la plus belle',25,20,'cover-roma.jpeg');

INSERT INTO `voyage_image`(`voyage_id`, `img`) VALUES (1,'1-1.jpeg') , (1,'1-2.jpeg');

INSERT INTO `endroit`(`endroit_nom`,`ville_id`, `description`, `prix`) VALUES ('Tour Eiffel',1,'La tour Eiffel est une tour de fer puddlé
	   de 324 mètres de hauteur située à Paris, à l’extrémité nord-ouest du parc du Champ-de-Mars en bordure
		 de la Seine dans le 7ᵉ arrondissement',2500);

INSERT INTO `voyage_jour`(`voyage_id`, `nbr_jour`, `endroit_id`) VALUES (1,1,1);
