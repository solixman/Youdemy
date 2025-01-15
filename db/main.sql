-- Active: 1734440686530@@127.0.0.1@3306@youdemydb
CREATE DATABASE YoudemyDB

use YoudemyDB

drop database Youdemydb

CREATE Table Roles(
    id int AUTO_INCREMENT PRIMARY key,
    name VARCHAR(50),
    Description VARCHAR(50),
    Logo VARCHAR(225)
)

CREATE table Utilisateurs (
    id int primary key  AUTO_INCREMENT NOT null,
    name varchar(50),
    lName varchar(50),
    email varchar(100),
    password varchar(50),
    phone VARCHAR(50),
    roleId int ,
    Foreign Key (roleId) REFERENCES Roles(id)
)


CREATE TABLE Categories(
id int AUTO_INCREMENT PRIMARY key,
name varchar (50),
Description TEXT
)

create table Tags(
    id int AUTO_INCREMENT PRIMARY key,
    name VARCHAR (50),
    Description text
);


Create Table Cours(
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar (50),
    coursDescription text,
    contenu text,
    releaseDateAndTime DATETIME,
    image VARCHAR (250),
    enseigneurId int,
    Foreign Key (enseigneurId) REFERENCES Utilisateurs(id),
    categorieId int,
    Foreign Key (categorieId) REFERENCES Categories(id),
     etat VARCHAR(20)

)


create table utilisateurs_cours(
    userId int,
    coursId int,
    Foreign Key (userId) REFERENCES Utilisateurs(id),
    Foreign Key (coursId) REFERENCES Cours(id)
)


create Table coursMaking( -- name changed to courseMaking
    categorieId int,
    coursId int,
    Foreign Key (categorieId) REFERENCES Categories(id),
    Foreign Key (coursId) REFERENCES Cours(id)
)

create table registeration(
 studentId int ,
 Foreign Key (studentId) REFERENCES Utilisateurs(id),
 coursId int ,
 Foreign Key (coursId) REFERENCES Cours(id)
)


-- des Test 


select * from Roles

SELECT id, roleName , roleDescription, roleLogo FROM Roles;


SELECT id, roleName , roleDescription, roleLogo FROM Roles WHERE id = 6 ;



rename table categories_cours to courseMaking


UPDATE Roles SET name=>'administratuer',Description=>'another description',Logo=>'logohhh.com' WHERE id = 2