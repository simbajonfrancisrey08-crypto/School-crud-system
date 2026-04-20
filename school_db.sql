/*
    SCHOOL DATABASE - FULL SETUP
    Ready for import in phpMyAdmin / MySQL
*/

-- Create Database
CREATE DATABASE IF NOT EXISTS school_db;
USE school_db;

-- Create Table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL
);

-- Sample Data
INSERT INTO students (name, email, course) VALUES
('Francis Rey Simbajon', 'secret.com', 'BSIT'),
('Rendo Limbago Bayut', 'yuts@email.com', 'BSIT');