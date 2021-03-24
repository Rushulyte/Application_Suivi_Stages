drop database if exists ass;
create database if not exists ass;

use ass;

create table if not exists account_type
(
    id smallint auto_increment
        primary key,
    type_name varchar(8) not null
);

insert into account_type(type_name) values ('admin');
insert into account_type(type_name) values ('prof');
insert into account_type(type_name) values ('élève');

create table if not exists users
(
    id int auto_increment
        primary key,
    login varchar(32) not null,
    authentication_string varchar(128) not null,
    first_name varchar(64) null,
    last_name varchar(64) null,
    id_account_type smallint default 2,
    foreign key (id_account_type) references account_type(id)
);

create table if not exists connexion
(
    id int auto_increment
        primary key,
    datetime_connect datetime not null,
    id_user int not null,
    foreign key (id_user) references users(id)
);