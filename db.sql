-- MySQL Script generated by MySQL Workbench
-- 03/01/15 13:50:04
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema u132993786_unitf
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema u132993786_unitf
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `u132993786_unitf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `u132993786_unitf` ;

-- -----------------------------------------------------
-- Table `u132993786_unitf`.`logowania`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`logowania` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL DEFAULT 2015-01-01,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u132993786_unitf`.`pracownicy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`pracownicy` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imie` VARCHAR(15) NOT NULL,
  `nazwisko` VARCHAR(25) NOT NULL,
  `data-urodzenia` DATE NOT NULL,
  `data-zatrudnienia` DATE NOT NULL,
  `kod-pocztowy` VARCHAR(6) NOT NULL,
  `miejscowosc` VARCHAR(45) NOT NULL,
  `ulica` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u132993786_unitf`.`uzytkownicy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`uzytkownicy` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(20) NOT NULL,
  `haslo` VARCHAR(32) NOT NULL,
  `data_utworzenia` DATETIME NOT NULL,
  `kto_utworzyl` VARCHAR(20) NOT NULL,
  `logowania_id` INT NOT NULL,
  `pracownicy_id` INT NOT NULL,
  PRIMARY KEY (`id`, `logowania_id`, `pracownicy_id`),
  INDEX `fk_urzytkownicy_logowania_idx` (`logowania_id` ASC),
  INDEX `fk_urzytkownicy_pracownicy1_idx` (`pracownicy_id` ASC),
  CONSTRAINT `fk_urzytkownicy_logowania`
    FOREIGN KEY (`logowania_id`)
    REFERENCES `u132993786_unitf`.`logowania` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_urzytkownicy_pracownicy1`
    FOREIGN KEY (`pracownicy_id`)
    REFERENCES `u132993786_unitf`.`pracownicy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u132993786_unitf`.`klienci`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`klienci` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imie` VARCHAR(15) NOT NULL,
  `nazwisko` VARCHAR(25) NOT NULL,
  `data-wpisania` DATETIME NOT NULL,
  `kod-pocztowy` VARCHAR(6) NOT NULL,
  `miejscowosc` VARCHAR(30) NOT NULL,
  `ulica` VARCHAR(45) NOT NULL,
  `firma` VARCHAR(45) NULL,
  `e-mail` VARCHAR(45) NOT NULL,
  `telefon` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u132993786_unitf`.`zgloszenie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`zgloszenie` (
  `kod_kreskowy` VARCHAR(5) NOT NULL,
  `nazwa` VARCHAR(45) NOT NULL,
  `data_przyjecia` DATETIME NOT NULL,
  `usuniety` BIT(1) NOT NULL DEFAULT 0,
  `urzytkownicy_id` INT NOT NULL,
  `klienci_id` INT NOT NULL,
  PRIMARY KEY (`kod_kreskowy`, `urzytkownicy_id`, `klienci_id`),
  INDEX `fk_zgloszenie_urzytkownicy1_idx` (`urzytkownicy_id` ASC),
  INDEX `fk_zgloszenie_klienci1_idx` (`klienci_id` ASC),
  CONSTRAINT `fk_zgloszenie_urzytkownicy1`
    FOREIGN KEY (`urzytkownicy_id`)
    REFERENCES `u132993786_unitf`.`uzytkownicy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_zgloszenie_klienci1`
    FOREIGN KEY (`klienci_id`)
    REFERENCES `u132993786_unitf`.`klienci` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u132993786_unitf`.`statusy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`statusy` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nazwa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u132993786_unitf`.`Notatki_zgloszen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u132993786_unitf`.`Notatki_zgloszen` (
  `id` INT NOT NULL,
  `tresc` MEDIUMTEXT NOT NULL,
  `data_dodania` DATETIME NOT NULL,
  `urzytkownicy_id` INT NOT NULL,
  `zgloszenie_kod_kreskowy` VARCHAR(5) NOT NULL,
  `statusy_id` INT NOT NULL,
  PRIMARY KEY (`id`, `urzytkownicy_id`, `zgloszenie_kod_kreskowy`, `statusy_id`),
  INDEX `fk_Notatki_zgloszen_urzytkownicy1_idx` (`urzytkownicy_id` ASC),
  INDEX `fk_Notatki_zgloszen_zgloszenie1_idx` (`zgloszenie_kod_kreskowy` ASC),
  INDEX `fk_Notatki_zgloszen_statusy1_idx` (`statusy_id` ASC),
  CONSTRAINT `fk_Notatki_zgloszen_urzytkownicy1`
    FOREIGN KEY (`urzytkownicy_id`)
    REFERENCES `u132993786_unitf`.`uzytkownicy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notatki_zgloszen_zgloszenie1`
    FOREIGN KEY (`zgloszenie_kod_kreskowy`)
    REFERENCES `u132993786_unitf`.`zgloszenie` (`kod_kreskowy`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notatki_zgloszen_statusy1`
    FOREIGN KEY (`statusy_id`)
    REFERENCES `u132993786_unitf`.`statusy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
