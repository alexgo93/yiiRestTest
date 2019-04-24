create table if not exists country
(
    id         int auto_increment
        primary key,
    code       char(3)  not null,
    name       char(15) not null,
    population int(11)  not null
)
    charset = utf8
;

create table if not exists city
(
    id        int auto_increment
        primary key,
    city      char(20) not null,
    countryId int(5)   not null,
    capital   boolean  not null
)
    charset = utf8
;

INSERT INTO `country` (code, name, population)
VALUES ('AU', 'Australia', 24016400);
INSERT INTO `country` (code, name, population)
VALUES ('BR', 'Brazil', 205722000);
INSERT INTO `country` (code, name, population)
VALUES ('CA', 'Canada', 35985751);
INSERT INTO `country` (code, name, population)
VALUES ('CN', 'China', 1375210000);
INSERT INTO `country` (code, name, population)
VALUES ('DE', 'Germany', 81459000);
INSERT INTO `country` (code, name, population)
VALUES ('FR', 'France', 64513242);
INSERT INTO `country` (code, name, population)
VALUES ('GB', 'United Kingdom', 65097000);
INSERT INTO `country` (code, name, population)
VALUES ('IN', 'India', 1285400000);
INSERT INTO `country` (code, name, population)
VALUES ('RU', 'Russia', 146519759);
INSERT INTO `country` (code, name, population)
VALUES ('US', 'United States', 322976000);

insert into city (city, countryId, capital)
VALUES ('Sydney', 1, 0);
insert into city (city, countryId, capital)
VALUES ('Canberra', 1, 1);
insert into city (city, countryId, capital)
VALUES ('Rio', 2, 1);
insert into city (city, countryId, capital)
VALUES ('San Paulo', 2, 0);
insert into city (city, countryId, capital)
VALUES ('Toronto', 3, 0);
insert into city (city, countryId, capital)
VALUES ('Montreal', 3, 0);
insert into city (city, countryId, capital)
VALUES ('Pekin', 4, 1);
insert into city (city, countryId, capital)
VALUES ('Shanghai', 4, 0);
insert into city (city, countryId, capital)
VALUES ('Hong Kong', 4, 0);
insert into city (city, countryId, capital)
VALUES ('Berlin', 5, 1);
insert into city (city, countryId, capital)
VALUES ('Hamburg', 5, 0);
insert into city (city, countryId, capital)
VALUES ('Paris', 6, 1);
insert into city (city, countryId, capital)
VALUES ('London', 7, 1);
insert into city (city, countryId, capital)
VALUES ('Wales', 7, 0);
insert into city (city, countryId, capital)
VALUES ('Scotland', 7, 0);
insert into city (city, countryId, capital)
VALUES ('Mumbai', 8, 0);
insert into city (city, countryId, capital)
VALUES ('Delhi', 8, 1);
insert into city (city, countryId, capital)
VALUES ('Moscow', 9, 1);
insert into city (city, countryId, capital)
VALUES ('Smolensk', 9, 0);
insert into city (city, countryId, capital)
VALUES ('Penza', 9, 0);
insert into city (city, countryId, capital)
VALUES ('Washington', 10, 1);
insert into city (city, countryId, capital)
VALUES ('New York', 10, 0);
insert into city (city, countryId, capital)
VALUES ('Las Vegas', 10, 0);
















