create database exam;
use exam;
create table client(
	idClient int primary key AUTO_INCREMENT,
	nom varchar(30),
	code varchar(30)
);

create table produit(
	idProduit int primary key AUTO_INCREMENT,
	nom varchar(30),
	prix DECIMAL(4,2)
);
insert into client values(null,'tsi','12');
insert into client values(null,'jim','23');
insert into client values(null,'men','34');