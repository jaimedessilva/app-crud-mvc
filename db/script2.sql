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
CREATE TABLE IF NOT EXISTS `tb_funcionario_t` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(150) NULL,
  `telefone` VARCHAR(43) NULL,
  `url_img` VARCHAR(500) NULL,
  PRIMARY KEY (`id`))
ENGINE = myISAM;


-- -----------------------------------------------------
-- Table `db_app`.`tb_telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_telefones_t` (
  `id_funcionario` INT NULL,
  `numero` VARCHAR(45) NULL)
ENGINE = myISAM;
