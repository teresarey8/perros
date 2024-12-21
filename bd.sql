CREATE DATABASE gestion_perros;

USE gestion_perros;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE perros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL UNIQUE,
    peso DECIMAL(10, 2) NOT NULL,
    color VARCHAR(20) NOT NULL,
    sexo VARCHAR(50) NOT NULL
);

-- Usuario de prueba
INSERT INTO usuarios (username, password) VALUES ('admin', MD5('admin123'));
