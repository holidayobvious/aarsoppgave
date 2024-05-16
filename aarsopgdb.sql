-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema aarsoppgavedb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `aarsoppgavedb` ;

-- -----------------------------------------------------
-- Schema aarsoppgavedb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aarsoppgavedb` DEFAULT CHARACTER SET utf8 ;
USE `aarsoppgavedb` ;

-- -----------------------------------------------------
-- Table `aarsoppgavedb`.`kunde`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aarsoppgavedb`.`kunde` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fornavn` VARCHAR(45) NOT NULL,
  `etternavn` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `passord` VARCHAR(255) NOT NULL,
  `adresse` VARCHAR(255) NOT NULL,
  `postnummer` CHAR(4) NOT NULL,
  `poststed` VARCHAR(45) NOT NULL,
  `admin` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aarsoppgavedb`.`bestilling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aarsoppgavedb`.`bestilling` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `bestillingstid` DATETIME NOT NULL DEFAULT now(),
  `kunde_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bestilling_kunde_idx` (`kunde_id` ASC),
  CONSTRAINT `fk_bestilling_kunde`
    FOREIGN KEY (`kunde_id`)
    REFERENCES `aarsoppgavedb`.`kunde` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aarsoppgavedb`.`liga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aarsoppgavedb`.`liga` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `navn` VARCHAR(45) NOT NULL,
  `bilde_url` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aarsoppgavedb`.`klubb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aarsoppgavedb`.`klubb` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `navn` VARCHAR(45) NOT NULL,
  `bilde_url` VARCHAR(45) NOT NULL,
  `liga_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_klubb_liga1_idx` (`liga_id` ASC),
  CONSTRAINT `fk_klubb_liga1`
    FOREIGN KEY (`liga_id`)
    REFERENCES `aarsoppgavedb`.`liga` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aarsoppgavedb`.`produkt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aarsoppgavedb`.`produkt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `storrelse` VARCHAR(45) NOT NULL,
  `produktnavn` VARCHAR(255) NOT NULL,
  `pris` INT NOT NULL,
  `bilde_url` VARCHAR(255) NOT NULL,
  `klubb_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produkt_klubb1_idx` (`klubb_id` ASC),
  CONSTRAINT `fk_produkt_klubb1`
    FOREIGN KEY (`klubb_id`)
    REFERENCES `aarsoppgavedb`.`klubb` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aarsoppgavedb`.`produkt_i_bestilling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aarsoppgavedb`.`produkt_i_bestilling` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produkt_id` INT NOT NULL,
  `bestilling_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produkt_i_bestilling_bestilling1_idx` (`bestilling_id` ASC),
  CONSTRAINT `fk_produkt_i_bestilling_produkt1`
    FOREIGN KEY (`produkt_id`)
    REFERENCES `aarsoppgavedb`.`produkt` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produkt_i_bestilling_bestilling1`
    FOREIGN KEY (`bestilling_id`)
    REFERENCES `aarsoppgavedb`.`bestilling` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;