/*  Utilizei o utf8mb4 pois a propria documentação recomenda:
    "Since MySQL 5.5.3 you should use utf8mb4 rather than utf8"
    Pois segundo o mesmo site o utf8 possui uma limitação

    Referencia: https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
*/
CREATE DATABASE activities_clock CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE user (
    id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(254) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE activity (
    id_activity INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    name VARCHAR(280) NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL
);