CREATE SCHEMA IF NOT EXISTS `db_im22far2205` DEFAULT CHARACTER SET utf8;
USE `db_im22far2205`;
-- Create the ApprenticeCompany table
CREATE TABLE IF NOT EXISTS `db_im22far2205`.`ApprenticeCompany` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  PRIMARY KEY (`Id`)
) ENGINE = InnoDB;
-- Create the ContactPerson table
CREATE TABLE IF NOT EXISTS `db_im22far2205`.`ContactPerson` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(45) NULL,
  `Phonenumber` VARCHAR(12) NULL,
  `Name` VARCHAR(45) NULL,
  `Position` VARCHAR(45) NULL,
  `Laerlingsbedrift_ID` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Konakt_Person_Laerlingsbedrift_idx` (`Laerlingsbedrift_ID` ASC),
  CONSTRAINT `fk_Konakt_Person_Laerlingsbedrift`
    FOREIGN KEY (`Laerlingsbedrift_ID`)
    REFERENCES `db_im22far2205`.`ApprenticeCompany` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;