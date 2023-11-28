CREATE DATABASE if not exists `monitoria`;

use monitoria;

CREATE TABLE if not exists `user`(
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE if not exists `todo`(
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `status` TINYINT(1) DEFAULT (0) NOT NULL
);
