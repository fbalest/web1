CREATE DATABASE IF NOT EXISTS ctf;
USE ctf;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(100)
);

INSERT INTO users (username, password) VALUES 
('admin', 'supersecurepassword'),
('guest', 'guest123');

CREATE TABLE flag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    secret_flag VARCHAR(100)
);

INSERT INTO flag (secret_flag) VALUES ('flag{SQL_Exploited!}');
