/*DBNetMovies*/
set foreign_key_checks= 0;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Movies`;
DROP TABLE IF EXISTS `UserList`;
-- -----------------------------------------------------
-- Table `Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Users` (
`mylist` VARCHAR(50) NOT NULL,
`username` VARCHAR(50) NOT NULL UNIQUE,
`userimg` VARCHAR(50) default "userdefault.jpg",
`name` VARCHAR(50) NOT NULL,
`surname` VARCHAR(50) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`password` VARCHAR(20) NOT NULL,
`adminsta` VARCHAR(20) DEFAULT NULL,
PRIMARY KEY (`email`)
  )
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `UserList` (
`idL` VARCHAR(50) NOT NULL UNIQUE,
`film` VARCHAR(50) NOT NULL,
`userl` VARCHAR(50) NOT NULL,
PRIMARY KEY (`idL`)
  )
  ENGINE = InnoDB;
  CREATE TABLE IF NOT EXISTS `Movies` (
`idM` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`title` VARCHAR(50) NOT NULL,
`yearrelease` VARCHAR(50) NOT NULL,
`rating`  INT NOT NULL CHECK ((rating<=5)&&(rating>=1)),
`plot` 	text NOT NULL,
`tag` VARCHAR(250) NOT NULL,
`source` VARCHAR(250) NOT NULL,
PRIMARY KEY (`idM`)
  )
  ENGINE = InnoDB;
set foreign_key_checks= 1;
