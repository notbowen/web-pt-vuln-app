CREATE DATABASE IF NOT EXISTS vulnerable_db;
USE vulnerable_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('John', 'f8IhYM7cUyXecSHAodQOqzqH7');
