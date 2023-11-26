CREATE DATABASE IF NOT EXISTS vulnerable_db;
USE vulnerable_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255) DEFAULT "Closed Alpha Tester"
);

INSERT INTO users (username, password, status) VALUES ('John', 'f8IhYM7cUyXecSHAodQOqzqH7', 'First Alpha tester!');
