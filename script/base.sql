create database takalo;
use takalo;
create table categorie(
	idCategore int primary key AUTO_INCREMENT,
	nom varchar(30)
);
insert into categorie values(null,'cat1');
insert into categorie values(null,'cat2');
insert into categorie values(null,'cat3');	
create table user(
	idUser int primary key AUTO_INCREMENT,
	nom varchar(30),
	mdp varchar(30)
);
insert into user values(null,'tsi','tsi');
insert into user values(null,'jim','jim');
insert into user values(null,'me','me');	
	
create table objet(
	idObjet int primary key AUTO_INCREMENT,
	nom varchar(30),
	idCategore int,
	idUser int,
	sary varchar(100),
	prix double,
	description varchar(100),
	FOREIGN KEY (idCategore) REFERENCES categorie (idCategore),
	FOREIGN KEY (idUser) REFERENCES user (idUser)
);
insert into objet values (null,'kiraro',1,2,'sary',299,'mlay io');
insert into objet values (null,'ordi',3,2,'soratra',299,'mlay io');
insert into objet values (null,'nike',2,2,'sary',299,'tsara io');
insert into objet values (null,'nike',2,1,'sary',299,'tsara io');		
insert into objet values (null,'nike',2,1,'sary',299,'tena okay io');		
create table proposition(
	idProposition int primary key AUTO_INCREMENT,
	idObjet1 int,
	idObjet2 int,
	idUser1 int,
	idUser2 int,
	etat int
);
create table photo(
	idObjet int,
	photo varchar(100)
);
