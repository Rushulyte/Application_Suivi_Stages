USE ASS;

create table CONNEXION
(
    ID_CONNECT   int auto_increment
        primary key,
    DATE_CONNECT date not null,
    ID_USER      int  not null,
    constraint CONNEXION_USERS_ID_fk
        foreign key (ID_USER) references USERS (ID)
);