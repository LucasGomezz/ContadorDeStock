CREATE SCHEMA IF NOT EXISTS stock;
USE stock;
CREATE TABLE producto(
                     nombre VARCHAR(255) ,
                     id INT AUTO_INCREMENT PRIMARY KEY,
                     precio INT,
                     stock INT,
                     imagen VARCHAR(255)
);

    INSERT INTO producto (nombre, precio, stock, imagen)
    values ('raqueta', 100, 10,'../public/images/generica.png');


