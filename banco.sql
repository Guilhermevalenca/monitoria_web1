DROP DATABASE if exists `monitoria`;
CREATE DATABASE if not exists `monitoria`;

use monitoria;

CREATE TABLE if not exists `user`(
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('adm', 'moderator', 'common') NOT NULL DEFAULT ('common')
);

CREATE TABLE if not exists `todo`(
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `status` TINYINT(1) DEFAULT (0) NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);

CREATE TABLE IF NOT EXISTS `tokens` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `token` LONGTEXT NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
    `abilities` JSON NOT NULL DEFAULT ("["*"]"),
    `ip` VARCHAR(20) NOT NULL,
    `life_time` VARCHAR(255) NOT NULL,
    `date_create` DATETIME DEFAULT CURRENT_TIMESTAMP
);
