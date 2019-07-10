/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/06/2019 13:06:03                          */
/*==============================================================*/


drop table if exists chambre;

drop index client_id on client;

drop table if exists client;

drop table if exists compte_agence;

drop table if exists contact;

drop index endroit_id on endroit;

drop table if exists endroit;

drop index guide_id on guide;

drop table if exists guide;

drop index hotel_id on hotel;

drop table if exists hotel;

drop table if exists invite;

drop index on_demande_id on on_demande;

drop table if exists on_demande;

drop table if exists paiement;

drop index pays_id on pays;

drop table if exists pays;

drop index programe_on_demande_id on programe_on_demande;

drop table if exists programe_on_demande;

drop index reserve_id on reserve;

drop table if exists reserve;

drop index ville on ville;

drop table if exists ville;

drop index voyage_id on voyage;

drop table if exists voyage;

drop index voyage_date_id on voyage_date;

drop table if exists voyage_date;

drop index voyage_jour_id on voyage_jour;

drop table if exists voyage_jour;

/*==============================================================*/
/* Table: chambre                                               */
/*==============================================================*/
create table chambre
(
   chambre_id           int not null auto_increment,
   reserve_id           int,
   numero               int,
   primary key (chambre_id)
);

/*==============================================================*/
/* Table: client                                                */
/*==============================================================*/
create table client
(
   client_id            int not null auto_increment,
   compte_agence_id     int,
   num_passport         varchar(35),
   nom                  varchar(30),
   prenom               varchar(30),
   date_naissance       date,
   email                varchar(35),
   password             varchar(35),
   phone                varchar(35),
   nationalite          int,
   date_emission_passport date,
   date_expiration_passport date,
   primary key (client_id)
);

/*==============================================================*/
/* Index: client_id                                             */
/*==============================================================*/
create index client_id on client
(
   client_id
);

/*==============================================================*/
/* Table: compte_agence                                         */
/*==============================================================*/
create table compte_agence
(
   compte_agence_id     int not null auto_increment,
   nom                  varchar(50),
   email                varchar(50),
   prassword            varchar(50),
   primary key (compte_agence_id)
);

/*==============================================================*/
/* Table: contact                                               */
/*==============================================================*/
create table contact
(
   contact_id           int not null auto_increment,
   nom                  varchar(25),
   prenom               varchar(25),
   email                varchar(50),
   telephone            varchar(50),
   message              varchar(300),
   primary key (contact_id)
);

/*==============================================================*/
/* Table: endroit                                               */
/*==============================================================*/
create table endroit
(
   endroit_id           int not null auto_increment,
   endroit_nom          varchar(35),
   ville_id             int,
   description          text,
   primary key (endroit_id),
   key AK_endroit_id (endroit_id)
);

/*==============================================================*/
/* Index: endroit_id                                            */
/*==============================================================*/
create index endroit_id on endroit
(
   endroit_id
);

/*==============================================================*/
/* Table: guide                                                 */
/*==============================================================*/
create table guide
(
   guide_id             int not null auto_increment,
   nom                  varchar(30),
   prenom               varchar(30),
   prix                 int,
   primary key (guide_id),
   key AK_guide_id (guide_id)
);

/*==============================================================*/
/* Index: guide_id                                              */
/*==============================================================*/
create index guide_id on guide
(
   guide_id
);

/*==============================================================*/
/* Table: hotel                                                 */
/*==============================================================*/
create table hotel
(
   hotel_id             int not null auto_increment,
   ville_id             int,
   nom                  varchar(30),
   telephone            varchar(30),
   address              text,
   class                int,
   img                  varchar(25),
   primary key (hotel_id),
   key AK_hotel_id (hotel_id)
);

/*==============================================================*/
/* Index: hotel_id                                              */
/*==============================================================*/
create unique index hotel_id on hotel
(
   hotel_id
);

/*==============================================================*/
/* Table: invite                                                */
/*==============================================================*/
create table invite
(
   invite_id            int not null auto_increment,
   chambre_id           int,
   nom_prenom           varchar(50),
   type                 int,
   primary key (invite_id)
);

/*==============================================================*/
/* Table: on_demande                                            */
/*==============================================================*/
create table on_demande
(
   on_demande_id        int not null auto_increment,
   client_id            int,
   groupe_id            int,
   ville_id             int,
   hotel_id             int,
   guide_id             int,
   primary key (on_demande_id),
   key AK_Key_1 (on_demande_id)
);

/*==============================================================*/
/* Index: on_demande_id                                         */
/*==============================================================*/
create unique index on_demande_id on on_demande
(
   on_demande_id
);

/*==============================================================*/
/* Table: paiement                                              */
/*==============================================================*/
create table paiement
(
   id_paiement          int not null auto_increment,
   reserve_id           int,
   nom_prenom           varchar(50),
   num_carte            varchar(20),
   date_expiration      varchar(10),
   cvv                  varchar(5),
   primary key (id_paiement)
);

/*==============================================================*/
/* Table: pays                                                  */
/*==============================================================*/
create table pays
(
   pays_id              int not null auto_increment,
   pays_code            varchar(5),
   nom                  varchar(50),
   nationalite          varchar(50),
   primary key (pays_id),
   key AK_pays_id (pays_id)
);

/*==============================================================*/
/* Index: pays_id                                               */
/*==============================================================*/
create index pays_id on pays
(
   pays_id
);

/*==============================================================*/
/* Table: programe_on_demande                                   */
/*==============================================================*/
create table programe_on_demande
(
   programe_on_demande_id int not null auto_increment,
   on_demande_id        int,
   endroit_id           int,
   visite_date          date,
   primary key (programe_on_demande_id),
   key AK_Key_1 (programe_on_demande_id)
);

/*==============================================================*/
/* Index: programe_on_demande_id                                */
/*==============================================================*/
create index programe_on_demande_id on programe_on_demande
(
   programe_on_demande_id
);

/*==============================================================*/
/* Table: reserve                                               */
/*==============================================================*/
create table reserve
(
   reserve_id           int not null auto_increment,
   voyage_date_id       int,
   client_id            int,
   compte_agence_id     int,
   date_reserve         date,
   date_rendezvous      date,
   type_paiement        int,
   etat_paiement        int,
   primary key (reserve_id)
);

/*==============================================================*/
/* Index: reserve_id                                            */
/*==============================================================*/
create unique index reserve_id on reserve
(
   reserve_id
);

/*==============================================================*/
/* Table: ville                                                 */
/*==============================================================*/
create table ville
(
   ville_id             int not null,
   nom                  varchar(50),
   pays_id              int,
   primary key (ville_id),
   key AK_ville (ville_id)
);

/*==============================================================*/
/* Index: ville                                                 */
/*==============================================================*/
create index ville on ville
(
   ville_id
);

/*==============================================================*/
/* Table: voyage                                                */
/*==============================================================*/
create table voyage
(
   voyage_id            int not null auto_increment,
   compte_agence_id     int,
   nom                  varchar(20),
   ville_id             int,
   guide_id             int,
   nbr_jour             int,
   hotel_id             int,
   description          varchar(500),
   cover                varchar(20),
   primary key (voyage_id)
);

/*==============================================================*/
/* Index: voyage_id                                             */
/*==============================================================*/
create index voyage_id on voyage
(
   voyage_id
);

/*==============================================================*/
/* Table: voyage_date                                           */
/*==============================================================*/
create table voyage_date
(
   voyage_date_id       int not null auto_increment,
   voyage_id            int,
   date_depart          date,
   date_retour          date,
   capacite             int,
   prix_A_S             float,
   prix_A_D             float,
   prix_A_T             float,
   prix_E               float,
   prix_B               float,
   primary key (voyage_date_id)
);

/*==============================================================*/
/* Index: voyage_date_id                                        */
/*==============================================================*/
create index voyage_date_id on voyage_date
(
   voyage_date_id
);

/*==============================================================*/
/* Table: voyage_jour                                           */
/*==============================================================*/
create table voyage_jour
(
   voyage_jour_id       int not null auto_increment,
   voyage_id            int,
   nbr_jour             int,
   endroit_id           int,
   primary key (voyage_jour_id)
);

/*==============================================================*/
/* Index: voyage_jour_id                                        */
/*==============================================================*/
create index voyage_jour_id on voyage_jour
(
   voyage_jour_id
);

alter table chambre add constraint FK_Reference_21 foreign key (reserve_id)
      references reserve (reserve_id) on delete cascade on update cascade;

alter table client add constraint FK_Reference_24 foreign key (compte_agence_id)
      references compte_agence (compte_agence_id) on delete restrict on update restrict;

alter table endroit add constraint FK_Reference_11 foreign key (ville_id)
      references ville (ville_id) on delete restrict on update restrict;

alter table hotel add constraint FK_Reference_17 foreign key (ville_id)
      references ville (ville_id) on delete restrict on update restrict;

alter table invite add constraint FK_Reference_22 foreign key (chambre_id)
      references chambre (chambre_id) on delete cascade on update cascade;

alter table on_demande add constraint FK_Reference_13 foreign key (hotel_id)
      references hotel (hotel_id) on delete restrict on update restrict;

alter table on_demande add constraint FK_Reference_16 foreign key (guide_id)
      references guide (guide_id) on delete restrict on update restrict;

alter table on_demande add constraint FK_Reference_7 foreign key (client_id)
      references client (client_id) on delete restrict on update restrict;

alter table on_demande add constraint FK_Reference_9 foreign key (ville_id)
      references ville (ville_id) on delete restrict on update restrict;

alter table paiement add constraint FK_Reference_20 foreign key (reserve_id)
      references reserve (reserve_id) on delete cascade on update cascade;

alter table programe_on_demande add constraint FK_Reference_10 foreign key (endroit_id)
      references endroit (endroit_id) on delete restrict on update restrict;

alter table programe_on_demande add constraint FK_Reference_8 foreign key (on_demande_id)
      references on_demande (on_demande_id) on delete restrict on update restrict;

alter table reserve add constraint FK_Reference_25 foreign key (compte_agence_id)
      references compte_agence (compte_agence_id) on delete restrict on update restrict;

alter table reserve add constraint FK_Reference_3 foreign key (voyage_date_id)
      references voyage_date (voyage_date_id) on delete restrict on update restrict;

alter table reserve add constraint FK_Reference_4 foreign key (client_id)
      references client (client_id) on delete cascade on update cascade;

alter table ville add constraint FK_Reference_5 foreign key (pays_id)
      references pays (pays_id) on delete restrict on update restrict;

alter table voyage add constraint FK_Reference_12 foreign key (hotel_id)
      references hotel (hotel_id) on delete restrict on update restrict;

alter table voyage add constraint FK_Reference_15 foreign key (guide_id)
      references guide (guide_id) on delete restrict on update restrict;

alter table voyage add constraint FK_Reference_23 foreign key (compte_agence_id)
      references compte_agence (compte_agence_id) on delete restrict on update restrict;

alter table voyage add constraint FK_Reference_6 foreign key (ville_id)
      references ville (ville_id) on delete restrict on update restrict;

alter table voyage_date add constraint FK_Reference_2 foreign key (voyage_id)
      references voyage (voyage_id) on delete restrict on update restrict;

alter table voyage_jour add constraint FK_Reference_1 foreign key (voyage_id)
      references voyage (voyage_id) on delete restrict on update restrict;

alter table voyage_jour add constraint FK_Reference_14 foreign key (endroit_id)
      references endroit (endroit_id) on delete restrict on update restrict;

