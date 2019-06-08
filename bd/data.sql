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

INSERT INTO `client`( `num_passport`, `nom`, `prenom`, `date_naissance`, `email`, `password`, `phone`, `nationalite`, `date_emission_passport`, `date_expiration_passport`) 
VALUES ('2015','mehal','anis','1999-05-29','mehalanis29@gmail.com',md5('anis'),'01264521',1,'2018-05-19','2022-06-19');

INSERT INTO `ville` (`ville_id`, `nom`, `pays_id`) VALUES
(1, 'Paris', 33);

INSERT INTO `hotel` (`hotel_id`, `nom`, `telephone`, `ville_id`, `address`, `class`, `img`) VALUES
  (1, 'Novotel Paris Centre Gare Montparnasse', '+3345123326', 1, '17 rue du Cotentin, 75015 Paris France', 4, 'test');

INSERT INTO `voyage`(`ville_id`, `nbr_jour`, `hotel_id`, `description`, `cover`) VALUES
  (1,7,1,'paris la ville la plus belle','cover-roma.jpeg');

INSERT INTO `voyage_image`(`voyage_id`, `img`) VALUES (1,'1-1.jpeg') , (1,'1-2.jpeg');

INSERT INTO `endroit`(`endroit_nom`,`ville_id`, `description`) VALUES ('Tour Eiffel',1,'La tour Eiffel est une tour de fer puddlé
	   de 324 mètres de hauteur située à Paris, à l’extrémité nord-ouest du parc du Champ-de-Mars en bordure
		 de la Seine dans le 7ᵉ arrondissement');

INSERT INTO `voyage_jour`(`voyage_id`, `nbr_jour`, `endroit_id`) VALUES (1,1,1);
