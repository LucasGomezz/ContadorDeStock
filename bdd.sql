CREATE SCHEMA IF NOT EXISTS stock;
USE stock;
CREATE TABLE producto(
                     nombre VARCHAR(255) ,
                     id INT PRIMARY KEY,
                     precio INT,
                     stock INT,
                     imagen VARCHAR(255)
);

    INSERT INTO producto (nombre, id, precio, stock, imagen)
    values ('raqueta', 1, 100, 10,'');


