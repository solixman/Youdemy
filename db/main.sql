-- Active: 1733846332193@@127.0.0.1@3306
CREATE DATABASE YoudemyDB

use YoudemyDB


CREATE Table Roles(
    id int AUTO_INCREMENT PRIMARY key,
    name VARCHAR(50),
    Description VARCHAR(50),
    Logo VARCHAR(225)
);

select * from utilisateurs


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

INSERT INTO utilisateurs (name,lastName,email,password,photo,phone,roleId) VALUES ('hamid','hamid','hamidX9@gmail.com','hamid123','hamid photo','9999999999',2)


CREATE TABLE Categories(
id int AUTO_INCREMENT PRIMARY key,
name varchar (50),
Description TEXT
);
insert into categories (name,Description) VALUES ("Categorie2", "second_categorie_Description"), ("Categorie3", "third_categorie_Description"), ("Categorie4", "fourth_categorie_Description");
select * from Categories;


create table Tags(
    id int AUTO_INCREMENT PRIMARY key,
    name VARCHAR (50),
    Description text
);

select *from Tags;

INSERT into Tags (name,Description) VALUES ('tag1','First Tag Description'),('tag2','second Tag Description'),('tag3',"third Tag Description"),('tag4','fourth Tag Description');


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
);

select * from cours


INSERT into cours  (name,Description,contenu,DateAndTime,image, enseigneurId,categorieId) Values('cours1 name', 'first short description','second.content.linc','2022-11-30 00:00:00','first.course.img','2','1'),('cours2 name', 'second short description','notSecond.content.linc','2022-11-30 00:00:00','second.course.img','2','2'),('cours3 name', 'third short description','third.content.linc','2022-11-30 00:00:00','third.course.img','2','4');


-- create table utilisateurs_cours(
--     userId int,
--     coursId int,
--     Foreign Key (userId) REFERENCES Utilisateurs(id),
--     Foreign Key (coursId) REFERENCES Cours(id)
-- )

-- drop Table utilisateurs_cours


create Table cours_Tag( 
    TagId int,
    coursId int,
    Foreign Key (TagId) REFERENCES Tags(id),
    Foreign Key (coursId) REFERENCES Cours(id)
)

insert into cours_Tag values (1,5),(2,5),(3,5),(4,4),(3,4),(1,4),(2,6),(3,6),(4,6),(1,7),(3,7);

select * from tags;
select * from cours;



create table registeration(

 userId int,
 Foreign Key (studentId) REFERENCES Utilisateurs(id),
 coursId int,
 Foreign Key (coursId) REFERENCES Cours(id)
)

select * from utilisateurs

INSERT into registeration VALUES (5,5),(2,5),(3,5),(4,4),(3,4),(5,4),(2,6),(3,6),(4,6),(5,7),(3,7)

-- des Test 


select * from categories;

INSERT INTO Categories VALUES (null,'a nother name','another long description')

SELECT id, roleName , roleDescription, roleLogo FROM Roles;


SELECT id, roleName , roleDescription, roleLogo FROM Roles WHERE id = 6 ;

insert into Roles VALUES(null,'administrateur','adm Description','adm.com'),(null,'etudiant','etud Description','etud.com'),(null,'enseigneur','ense Description','ense.com')

insert into cours (name,Description,contenu,DateAndTime,image, enseigneurId,categorieId) Values('another name', 'another short description','another bit of contet','2022-11-30 00:00:00','another.course.img','2','1');

UPDATE Roles SET name=>'administratuer',Description=>'another description',Logo=>'logohhh.com' WHERE id = 2