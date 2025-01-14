CREATE DATABASE YoudemyDB

use YoudemyDB

CREATE Table Roles(
    id int AUTO_INCREMENT PRIMARY key,
    roleName VARCHAR(50),
    roleDescription VARCHAR(50),
    roleLogo VARCHAR(225)
)

CREATE table Utilisateurs (
    id int primary key  AUTO_INCREMENT NOT null,
    firstName varchar(50),
    lastName varchar(50),
    email varchar(100),
    password varchar(50),
    phone VARCHAR(50),
    roleId int ,
    Foreign Key (roleId) REFERENCES Roles(id)
)

CREATE TABLE Categories(
id int AUTO_INCREMENT PRIMARY key,
CategorieName varchar (50),
CategorieDescription TEXT
)

create table Tags(
    id int AUTO_INCREMENT PRIMARY key,
    TagName VARCHAR (50),
    TagDescription text
)

Create Table Cours(
    id int AUTO_INCREMENT PRIMARY KEY,
    titre varchar (50),
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


create Table categories_cours(
    categorieId int,
    coursId int,
    Foreign Key (categorieId) REFERENCES Categories(id),
    Foreign Key (coursId) REFERENCES Cours(id)
)

select * from Roles

SELECT id, roleName , roleDescription, roleLogo FROM Roles;


SELECT id, roleName , roleDescription, roleLogo FROM Roles WHERE id = 6 ;