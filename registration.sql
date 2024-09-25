-- creating database : 
CREATE DATABASE IF NOT EXISTS registration;
USE registration;

-- creatuing students table:
CREATE TABLE IF NOT EXISTS students(
    id INT NOT NULL PRIMARY KEY ,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    department VARCHAR(20) NOT NULL,
    age INT(2) NOT NULL
);