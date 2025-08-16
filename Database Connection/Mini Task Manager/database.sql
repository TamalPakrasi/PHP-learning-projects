CREATE TABLE `taitonaki`.`taskuser` (`userId` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(250) NOT NULL , PRIMARY KEY (`userId`), UNIQUE `use` (`username`));

CREATE TABLE `taitonaki`.`tasks` (`id` INT NOT NULL AUTO_INCREMENT , `userId` INT NOT NULL , `tasks` VARCHAR(300) NOT NULL , `priority` ENUM('low','medium','high') NOT NULL , `isComplete` BOOLEAN NOT NULL DEFAULT FALSE , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- link tasks.userId (FK) with taskuser.userId (PK)