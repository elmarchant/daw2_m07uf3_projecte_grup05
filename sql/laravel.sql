create database ccong;
use ccong;

create table usuaris(
	id int not null auto_increment,
    nom varchar(30) not null,
    nom_usuari varchar (20) unique not null,
    contrasenya varchar(32) not null,
    administrador bool default false,
    activo bool default false,
    primary key (id)
);

insert into usuaris values(0, "Administrador", "admin", md5("Administrador123"), true, true);

select * from usuaris;

create table associacio(
	CIF varchar(9) not null,
    nom varchar(30) not null unique,
    commarca varchar(20),
    declaracio varchar(30),
    adreca varchar(30),
    poblacio varchar(20),
    tipus varchar(20),
    primary key (CIF)
);

create table treballador(
	NIF varchar(9) not null,
    nom varchar(30) not null,
    cognom varchar (30) not null,
    correu varchar(30),
    mobil varchar(9),
    tel_fixa varchar(9),
    adreca varchar(30),
    poblacio varchar(20),
    commarca varchar(20),
    data_ingres date default '2021-04-12',
    CIF varchar(9),
    primary key (NIF),
    foreign key(CIF) references associacio(CIF)
);

create table professional(
	NIF varchar(9) not null,
    carrec varchar(10) not null,
    desc_irpf decimal(6,2),
    quantitat_seguretat_social decimal(8,2),
    primary key(NIF),
    foreign key(NIF) references treballador(NIF)
);

create table voluntari(
	NIF varchar(9) not null,
    professio varchar(20),
	hores int default 0,
    edat date not null,
    primary key(NIF),
    foreign key(NIF) references treballador(NIF)
);

create table soci(
	NIF varchar(9) not null,
    nom varchar(30) not null,
    cognom varchar (30) not null,
    correu varchar(30),
    mobil varchar(9),
    tel_fixa varchar(9),
    adreca varchar(30),
    poblacio varchar(20),
    commarca varchar(20),
    data_associacio date default '2021-04-12',
    quota decimal(8,2) not null,
    primary key(NIF)
);

create table formen(
	id int auto_increment,
    CIF varchar(9) not null,
    NIF varchar(9) not null,
    primary key(id),
    foreign key(CIF) references associacio(CIF),
    foreign key(NIF) references soci(NIF)
);



