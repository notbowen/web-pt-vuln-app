CREATE DATABASE IF NOT EXISTS vulnerable_db;
USE vulnerable_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255) DEFAULT "Closed Alpha Tester",
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, status) VALUES ('John', 'f8IhYM7cUyXecSHAodQOqzqH7', 'First Alpha tester!');
INSERT INTO users (username, password, status) VALUES ('Alice', 'a8JkLm9Op0QrSt', 'Alpha tester');
INSERT INTO users (username, password, status) VALUES ('Bob', 'b2HnMk8Pq4SvZx', 'Alpha tester');
INSERT INTO users (username, password, status) VALUES ('Charlie', 'c3FoGt5Hy6JuKl', 'Alpha tester');
INSERT INTO users (username, password, status) VALUES ('Diana', 'd4IpLo9Zu7XwCy', 'Alpha tester');
