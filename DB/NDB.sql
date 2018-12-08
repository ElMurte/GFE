/*DBNetMovies*/
set foreign_key_checks= 0;
DROP TABLE IF EXISTS `UserLists`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Movies`;
-- -----------------------------------------------------
-- Table `Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Users` (
`username` VARCHAR(50) NOT NULL UNIQUE,
`userimg` VARCHAR(50) DEFAULT "userdefault.jpg",
`name` VARCHAR(50) NOT NULL,
`surname` VARCHAR(50) NOT NULL,
`eta` int(10) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`password` VARCHAR(250) NOT NULL,
`adminsta` VARCHAR(20) DEFAULT NULL,
PRIMARY KEY (`email`)
  )
ENGINE = InnoDB;

  CREATE TABLE IF NOT EXISTS `Movies` (
`idM` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`title` VARCHAR(70) NOT NULL,
`poster` VARCHAR(70) NOT NULL,
`yearrelease` YEAR NOT NULL,
`ftime` TIME NOT NULL,
`lang` VARCHAR(20) NOT NULL DEFAULT "EN",
`rating`  INT NOT NULL CHECK ((rating<=5)&&(rating>=1)),
`plot` text NOT NULL,
`tag` text NOT NULL,
`source` VARCHAR(250) NOT NULL DEFAULT "Chappie.mp4" ,
PRIMARY KEY (`idM`)
  )
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `UserLists` (
`ufilm` INT UNSIGNED NOT NULL,
`uemail` VARCHAR(100) NOT NULL,
PRIMARY KEY (ufilm,uemail),
  FOREIGN KEY (ufilm) REFERENCES Movies(idM),
  FOREIGN KEY (uemail) REFERENCES Users(email)
  )
  ENGINE = InnoDB;
set foreign_key_checks= 1;
/*INSERTS DB*/
/*Users*/
INSERT INTO `users` (`username`, `name`, `surname`, `eta`, `email`, `password`, `adminsta`) VALUES ('user', 'user', 'user', '18', 'user@user.com', 'user', 'admin');


/*Movies*/
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Interstellar', 'interstellar.jpg', '2014', '2:49', 'EN', '4', 'In Earth\'s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand, a brilliant NASA physicist, is working on plans to save mankind by transporting Earth\'s population to a new home via a wormhole. But first, Brand must send former NASA pilot Cooper and a team of researchers through the wormhole and across the galaxy to find out which of three planets could be mankind\'s new home.', 'Adventure,Drama,Sci-Fi', 'Chappie.mp4');
