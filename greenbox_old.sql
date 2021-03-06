-- MySQL Script generated by MySQL Workbench
-- 11/29/16 14:04:20
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema heroku_a415fd6530fc505
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `heroku_a415fd6530fc505` ;

-- -----------------------------------------------------
-- Schema heroku_a415fd6530fc505
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `heroku_a415fd6530fc505` DEFAULT CHARACTER SET latin1 ;
USE `heroku_a415fd6530fc505` ;

-- -----------------------------------------------------
-- Table `heroku_a415fd6530fc505`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_a415fd6530fc505`.`user` ;

CREATE TABLE IF NOT EXISTS `heroku_a415fd6530fc505`.`user` (
  `userId` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `adminStatus` TINYINT(1) NULL DEFAULT NULL,
  `firstName` VARCHAR(255) NULL DEFAULT NULL,
  `lastName` VARCHAR(255) NULL DEFAULT NULL,
  `phone` INT(11) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `country` VARCHAR(255) NULL DEFAULT NULL,
  `zip` INT(6) NULL DEFAULT NULL,
  PRIMARY KEY (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `heroku_a415fd6530fc505`.`vegetablepackage`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_a415fd6530fc505`.`vegetablepackage` ;

CREATE TABLE IF NOT EXISTS `heroku_a415fd6530fc505`.`vegetablepackage` (
  `vegetablePackageId` INT(11) NOT NULL AUTO_INCREMENT,
  `packageSalesName` VARCHAR(255) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `imageLink` VARCHAR(255) NULL DEFAULT NULL,
  `price` INT(12) NULL DEFAULT NULL,
  `vegetable1` VARCHAR(255) NULL DEFAULT NULL,
  `vegetable2` VARCHAR(255) NULL DEFAULT NULL,
  `vegetable3` VARCHAR(255) NULL DEFAULT NULL,
  `vegetable4` VARCHAR(255) NULL DEFAULT NULL,
  `vegetable5` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`vegetablePackageId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `heroku_a415fd6530fc505`.`subscription`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_a415fd6530fc505`.`subscription` ;

CREATE TABLE IF NOT EXISTS `heroku_a415fd6530fc505`.`subscription` (
  `subscriptionId` INT(11) NOT NULL AUTO_INCREMENT,
  `userId` VARCHAR(255) NOT NULL DEFAULT NULL,
  `vegetablePackageId` INT(11) NOT NULL DEFAULT NULL,
  `subscriptionInMonths` INT(2) NOT NULL DEFAULT NULL,
  PRIMARY KEY (`subscriptionId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
