DROP DATABASE IF EXISTS deli;

CREATE DATABASE deli;

USE deli;

CREATE TABLE deliCounter
(
   order_number int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name varchar(20),
   food_type varchar(60),
   brand varchar(32),
   amount double (2,1)
);

INSERT INTO delicounter (name,food_type,brand,amount) VALUES ('Jake Diamond','Turkey','Boars Head',2);

