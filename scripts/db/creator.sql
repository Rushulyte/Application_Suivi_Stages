drop database if exists ass;
create database if not exists ass;

use ass;

create table users
(
    identifiant           varchar(64)       not null
        primary key,
    first_name            varchar(16)   not null,
    last_name             varchar(16)   not null,
    authentication_string varchar(128)  not null,
    id_account_type       int default 3 null
);

create table teachers
(
    id_user int auto_increment
        primary key,
    id_spe  int(1) null
);

create table students
(
    id_user int auto_increment
        primary key,
    id_spe  int(1)     null,
    class   varchar(8) null
);

create table account_types
(
    id   int auto_increment
        primary key,
    name varchar(8) not null
);

create table specialities
(
    id_spe int auto_increment
        primary key,
    name   varchar(4) not null
);

create table connexions
(
    id              int auto_increment
        primary key,
    id_user         char(1) null,
    date_connection date    null,
    time_connection time    null
);

create table entreprises
(
    id_ent  int auto_increment
        primary key,
    name    varchar(16) not null,
    contact varchar(64) null,
    mail    varchar(64) null,
    tel     char(10)     null,
    address varchar(64) null
);

create table actions
(
    id_act   int auto_increment
        primary key,
    calls    int(10)    null,
    attempts int(100)   null,
    state    varchar(8) null
);

create table files
(
    id   int auto_increment
        primary key,
    path varchar(128) not null,
    type char(16)     null
);



insert into ass.account_types (id, name)
values (1, 'admin');
insert into ass.account_types (id, name)
values (2, 'prof');
insert into ass.account_types (id, name)
values (3, 'élève');

insert into ass.users (id_account_type, identifiant, first_name, last_name, authentication_string)
values (1, 'a', '_', '_',
        'ffe501d3b61a4c6143ca57f8f09b65d198eadf3c0d78aac7d8107df19f31a15871a8de043a8556bdfc85c01d64d13afede1e913bab718f95f4adc4bbbf4fad23');
insert into ass.users (id_account_type, identifiant, first_name, last_name, authentication_string)
values (2, 'p', '_', '_',
        '6c89030400dbcd6561f8e03c8ccbeff4d8150988e635af53a581622da3223e37a64abb3f26a1cff7f0014c32e4ca615e76534fb53830e54c67603b892124c8d1');
insert into ass.users (id_account_type, identifiant, first_name, last_name, authentication_string)
values (3, 'e', '_', '_',
        '309ecc489c12d6eb4cc40f50c902f2b4d0ed77ee511a7c7a9bcd3ca86d4cd86f989dd35bc5ff499670da34255b45b0cfd830e81f605dcf7dc5542e93ae9cd76f');

insert into ass.specialities (id_spe, name)
values (1, 'SLAM');
insert into ass.specialities (id_spe, name)
values (2, 'SISR');

insert into ass.entreprises (name, contact, address)
values ('ACTIA-MULLER', 'SAUZAY Olivier', '5 rue de la Taye 28000 LUCE');
insert into ass.entreprises (name, address)
values ('AFS', 'Lycée Fulbert 28000 CHARTRES');
insert into ass.entreprises (name, address, contact, mail)
values ('AG2R LA MONDIALE', '12 rue Edmond Poillot 28000 CHARTRES', 'COLAISSEAU Romain', 'Romain.COLAISSEAU.ext@ag2rlamondiale.fr');