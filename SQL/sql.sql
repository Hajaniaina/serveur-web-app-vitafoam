
create database app_vitafoam;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table showroom(
	ID       		int(11) not null primary key auto_increment COMMENT 'identifiant unique pour chaque showroom',   
	indiceSroom     int(11) not null                            COMMENT 'indice unique pour chaque showroom',
	Nom             text										COMMENT 'Nom du showRoom',
	Lieu            text                                        COMMENT 'Lieu ou se trouve le showroom'
);

insert into showroom (indiceSroom,Nom,Lieu) values (1,"Talatamaty","Talatamaty");
insert into showroom (indiceSroom,Nom,Lieu) values (2,"Tanjombato","Tanjombato");
insert into showroom (indiceSroom,Nom,Lieu) values (3,"Akorondrano","Akorondrano");
insert into showroom (indiceSroom,Nom,Lieu) values (4,"Majunga","Majunga");
insert into showroom (indiceSroom,Nom,Lieu) values (5,"Tuléar","Tuléar");
insert into showroom (indiceSroom,Nom,Lieu) values (6,"Diégo-Suarez","Diégo-Suarez");

create table vote (
	ID       		int(11) not null primary key auto_increment COMMENT 'identifiant unique pour chaque vote',
	dateDeVote      datetime                                    COMMENT 'La date où il/elle vote',
	indiceShowRomm  int(11)                                     COMMENT 'ID du showroom vote',
	indiceVote      int(11)                                     COMMENT 'indice de vote',
	vote            text                                        COMMENT 'Son vote',
	numeroPhone     text										COMMENT 'le numero de téléphone de la personne qui vote',
	IMEI            text										COMMENT 'le IMEI du telephone qui vote'
);

insert into membre (Nom,Prenom,identifiant,motdepasse) values ("Francisco","Mahatia","francisco","francisco");
create table membre(
	ID             int(11) not null primary key auto_increment COMMENT 'identifiant unique pour chaque membre',
	Nom            text                                        COMMENT 'nom du membre',
	Prenom         text                                        COMMENT 'prenom du membre',
	identifiant    text                                        COMMENT 'identifiant du membre/mail',
	motdepasse     text                                        COMMENT 'mot de passe du membre'
);