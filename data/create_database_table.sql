CREATE DATABASE integration;
USE integration;
CREATE TABLE album (
   id int(11) NOT NULL auto_increment,
   artist varchar(100) NOT NULL,
   title varchar(100) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE task_item (
   id int(11) NOT NULL auto_increment,   
   title varchar(100) NOT NULL,
   completed boolean,
   created datetime,
   PRIMARY KEY (id)
);