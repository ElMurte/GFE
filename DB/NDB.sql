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
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Interstellar', 'interstellar.jpg', '2014', '2:49', 'EN', '5', 'In Earth\'s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand, a brilliant NASA physicist, is working on plans to save mankind by transporting Earth\'s population to a new home via a wormhole. But first, Brand must send former NASA pilot Cooper and a team of researchers through the wormhole and across the galaxy to find out which of three planets could be mankind\'s new home.', 'Adventure,Drama,Sci-Fi', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Gravity', 'Gravity.jpg', '2013', '1:31', 'EN', '4', 'Dr. Ryan Stone (Sandra Bullock) is a brilliant medical engineer on her first shuttle mission, with veteran astronaut Matt Kowalski (George Clooney) in command of his last flight before retiring. But on a seemingly routine spacewalk, disaster strikes. The shuttle is destroyed, leaving Stone and Kowalsky completely alone - tethered to nothing but each other and spiraling out into the blackness.', 'drama, sci-fi, thriller, fantascience', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Tomorrowland', 'Tomorrowland.jpg', '2015', '2:10', 'EN', '4', 'Bound by a shared destiny, a bright, optimistic teen bursting with scientific curiosity and a former boy-genius inventor jaded by disillusionment embark on a danger-filled mission to unearth the secrets of an enigmatic place somewhere in time and space that exists in their collective memory as "Tomorrowland."', 'action, adventure, family', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Geostorm', 'Geostorm.jpg', '2017', '1:49', 'EN', '2', 'When catastrophic climate change endangers Earth´s very survival, world governments unite and create the Dutch Boy Program: a world wide net of satellites, surrounding the planet, that are armed with geoengineering technologies designed to stave off the natural disasters. After successfully protecting the planet for three years, something is starting to go wrong. Two estranged brothers are tasked with solving the programs malfunction before a world wide Geostorm can engulf the planet.', 'action, sci-fi, thriller', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'The Martian', 'The Martian.jpg', '2015', '2:24', 'EN', '4', 'During a manned mission to Mars, Astronaut Mark Watney is presumed dead after a fierce storm and left behind by his crew. But Watney has survived and finds himself stranded and alone on the hostile planet. With only meager supplies, he must draw upon his ingenuity, wit and spirit to subsist and find a way to signal to Earth that he is alive. Millions of miles away, NASA and a team of international scientists work tirelessly to bring the Martian home, while his crewmates concurrently plot a daring, if not impossible, rescue mission. As these stories of incredible bravery unfold, the world comes together to root for Watneys safe return.', 'drama, adventure, sci-fi', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Avatar', 'Avatar.jpg', '2009', '2:24', 'EN', '4', 'When his brother is killed in a robbery, paraplegic Marine Jake Sully decides to take his place in a mission on the distant world of Pandora. There he learns of greedy corporate figurehead Parker Selfridge intentions of driving off the native humanoid Navi in order to mine for the precious material scattered throughout their rich woodland. In exchange for the spinal surgery that will fix his legs, Jake gathers intel for the cooperating military unit spearheaded by gung-ho Colonel Quaritch, while simultaneously attempting to infiltrate the Navi people with the use of an avatar identity. While Jake begins to bond with the native tribe and quickly falls in love with the beautiful alien Neytiri, the restless Colonel moves forward with his ruthless extermination tactics, forcing the soldier to take a stand - and fight back in an epic battle for the fate of Pandora.', 'action, adventure, fantasy', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( '12 Years a Slave', '12 Years a Slave.jpg', '2013', '2:14', 'EN', '4', 'Based on an incredible true story of one mans fight for survival and freedom. In the pre-Civil War United States, Solomon Northup, a free black man from upstate New York, is abducted and sold into slavery. Facing cruelty personified by a malevolent slave owner, as well as unexpected kindnesses, Solomon struggles not only to stay alive, but to retain his dignity. In the twelfth year of his unforgettable odyssey, Solomons chance meeting with a Canadian abolitionist will forever alter his life.', 'biography, drama, history', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Arrival', 'Arrival.jpg', '2016', '1:56', 'EN', '4', 'Linguistics professor Louise Banks leads an elite team of investigators when gigantic spaceships touchdown in 12 locations around the world. As nations teeter on the verge of global war, Banks and her crew must race against time to find a way to communicate with the extraterrestrial visitors. Hoping to unravel the mystery, she takes a chance that could threaten her life and quite possibly all of mankind.', 'mistery, drama, sci-fi', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'The Revenant', 'The Revenant.jpg', '201', '2:36', 'EN', '4', 'While exploring uncharted wilderness in 1823, legendary frontiersman Hugh Glass sustains injuries from a brutal bear attack. When his hunting team leaves him for dead, Glass must utilize his survival skills to find a way back home while avoiding natives on their own hunt. Grief-stricken and fueled by vengeance, Glass treks through the wintry terrain to track down John Fitzgerald, the former confidant who betrayed and abandoned him.', 'action, adventure, biography', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'The Wolf of Wall Street', 'The Wolf of Wall Street.jpg', '2013', '3:00', 'EN', '4', 'Jordan Belfort is a Long Island penny stockbroker who served 22 months in prison for defrauding investors in a massive 1990s securities scam that involved widespread corruption on Wall Street and in the corporate banking world, including shoe designer Steve Madden.', 'comedy, crime, biography', 'Chappie');
INSERT INTO `movies` (`title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES ( 'Inglourious Basterds', 'Inglourious Basterds.jpg', '2009', '2:33', 'EN', '4', 'In German-occupied France, young Jewish refugee Shosanna Dreyfus witnesses the slaughter of her family by Colonel Hans Landa. Narrowly escaping with her life, she plots her revenge several years later when German war hero Fredrick Zoller takes a rapid interest in her and arranges an illustrious movie premiere at the theater she now runs. With the promise of every major Nazi officer in attendance, the event catches the attention of the Basterds, a group of Jewish-American guerrilla soldiers led by the ruthless Lt. Aldo Raine. As the relentless executioners advance and the conspiring young girls plans are set in motion, their paths will cross for a fateful evening that will shake the very annals of history.', 'adventure, drama, war', 'Chappie');
