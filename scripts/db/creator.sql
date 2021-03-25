drop database if exists ass;
create database if not exists ass;

use ass;

create table account_types
(
    id   int auto_increment
        primary key,
    name varchar(8) null
);

create table connexion
(
    id              int auto_increment
        primary key,
    id_user         int  null,
    date_connection date null
);

create table users
(
    identifiant           varchar(16)   not null
        primary key,
    first_name            varchar(16)   null,
    last_name             varchar(16)   null,
    authentication_string varchar(128)  null,
    id_account_type       int default 3 null
);

insert into ass.account_types (id, name) values (1, 'admin');
insert into ass.account_types (id, name) values (2, 'prof');
insert into ass.account_types (id, name) values (3, 'élève');
