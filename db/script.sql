-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_app
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_app
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_app` DEFAULT CHARACTER SET utf8 ;
USE `db_app` ;

-- -----------------------------------------------------
-- Table `db_app`.`tb_funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app`.`tb_funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(150) NULL,
  `telefone` VARCHAR(43) NULL,
  `url_img` VARCHAR(500) NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_app`.`tb_telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app`.`tb_telefones` (
  `id_funcionario` INT NULL,
  `numero` VARCHAR(45) NULL,
  INDEX `fk_tb_telefones_tb_funcionario_idx` (`id_funcionario` ASC) VISIBLE,
  CONSTRAINT `fk_tb_telefones_tb_funcionario`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `db_app`.`tb_funcionario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
