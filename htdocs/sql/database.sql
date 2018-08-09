CREATE DATABASE IF NOT EXISTS mystore;

USE mystore;

CREATE TABLE IF NOT EXISTS `products` ( 
    `productId` INT NOT NULL AUTO_INCREMENT , 
    `productTypeId` INT NOT NULL ,
    `code` VARCHAR(50) , 
    `name` VARCHAR(100) , 
    `description` TEXT , 
    `price` VARCHAR(255) , 
    `status` INT ,
    `state` INT ,
    `createdon` DATETIME NOT NULL , 
    `createdby` INT , 
    `updatedon` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`productId`)) 
    ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `producttype` ( 
    `productTypeId` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(100) , 
    `description` TEXT , 
    `status` INT ,
    `state` INT ,
    `createdon` DATETIME NOT NULL , 
    `createdby` INT , 
    `updatedon` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`productTypeId`)) 
    ENGINE = InnoDB;
