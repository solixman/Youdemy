-- Active: 1734440686530@@127.0.0.1@3306@youdemydb
CREATE DATABASE YoudemyDB

use YoudemyDB


CREATE Table Roles(
    id int AUTO_INCREMENT PRIMARY key,
    name VARCHAR(50),
    Description VARCHAR(50),
    Logo VARCHAR(225)
)

-- alter table Roles alter column Description varchar(250);

CREATE table Utilisateurs (
    id int primary key  AUTO_INCREMENT NOT null,
    name varchar(50),
    lastName varchar(50),
    email varchar(100),
    password varchar(50),
    photo varchar(250),
    phone VARCHAR(50),
    roleId int ,
    Foreign Key (roleId) REFERENCES Roles(id)
);

INSERT INTO utilisateurs (name,lastName,email,password,photo,phone,roleId) VALUES ('soulayman','jaafar','soulaymanjff@gmail.com','ssjjffssjjff','soulayman photo','08707406',1
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
    Description text,
    contenu text,
    DateAndTime DATETIME,
    image VARCHAR (250),
    enseigneurId int,
    Foreign Key (enseigneurId) REFERENCES Utilisateurs(id),
    categorieId int,
    Foreign Key (categorieId) REFERENCES Categories(id)
     

)



create table utilisateurs_cours(
    userId int,
    coursId int,
    Foreign Key (userId) REFERENCES Utilisateurs(id),
    Foreign Key (coursId) REFERENCES Cours(id)
)


create Table cours_categorie( 
    categorieId int,
    coursId int,
    Foreign Key (categorieId) REFERENCES Categories(id),
    Foreign Key (coursId) REFERENCES Cours(id)
)

create table registeration(
 studentId int,
 Foreign Key (studentId) REFERENCES Utilisateurs(id),
 coursId int,
 Foreign Key (coursId) REFERENCES Cours(id)
)


-- des Test 


select * from utilisateurs;

INSERT INTO Categories VALUES (null,'a nother name','another long description')

SELECT id, roleName , roleDescription, roleLogo FROM Roles;


SELECT id, roleName , roleDescription, roleLogo FROM Roles WHERE id = 6 ;

insert into Roles VALUES(null,'administrateur','adm Description','adm.com'),(null,'etudiant','etud Description','etud.com'),(null,'enseigneur','ense Description','ense.com')

insert into cours (name,Description,contenu,DateAndTime,image, enseigneurId,categorieId) Values('another name', 'another short description','another bit of contet','2022-11-30 00:00:00','another.course.img','2','1');

UPDATE Roles SET name=>'administratuer',Description=>'another description',Logo=>'logohhh.com' WHERE id = 2