-- Active: 1698852862331@@127.0.0.1@3306@pagination_project

CREATE DATABASE `pagination_project`

CREATE TABLE IF NOT EXISTS `students` (
    `id` int(11) NOT NULL AUTO_INCREMENT ,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
)

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`) VALUES 
  (1, 'Jhon' , 'Smith', 'jhon@gmail.com'),
  (2, 'Jane' , 'Adam', 'jane@gmail.com'),
  (3, 'Adrian' , 'Adam', 'adrian@gmail.com'),
  (4, 'Rohan' , 'Mithal' , 'rohan@gmail.com'),
  (5, 'Maruf' , 'Ahamed' , 'maruf@gmail.com'),
  (6, 'Mita', 'Dahl', 'mita@gmail.com');