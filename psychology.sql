CREATE DATABASE psychology;

USE psychology;

CREATE TABLE
    Persona(
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        telefono INT NOT NULL,
        correo VARCHAR(50) NOT NULL,
        foto MEDIUMBLOB,
        documento INT NOT NULL,
        tipo_documento VARCHAR(50) NOT NULL,
        tipo_persona VARCHAR(50) NOT NULL
    );