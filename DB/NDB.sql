/*DBNetMovies*/
set foreign_key_checks= 0;
DROP TABLE IF EXISTS `UserLists`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Movies`;
DROP TABLE IF EXISTS `userLists`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `movies`;
-- -----------------------------------------------------
-- Table `Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
`username` VARCHAR(50) NOT NULL UNIQUE,
`userimg` VARCHAR(50) DEFAULT "userdefault.jpg",
`name` VARCHAR(50) NOT NULL,
`surname` VARCHAR(50) NOT NULL,
`eta` int(10) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`password` VARCHAR(250) NOT NULL,
`adminsta` VARCHAR(20) DEFAULT NULL,
PRIMARY KEY (`email`)
ON UPDATE CASCADE
ON DELETE CASCADE
  )
ENGINE = InnoDB;

  CREATE TABLE IF NOT EXISTS `movies` (
`idM` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`title` VARCHAR(70) NOT NULL,
`poster` VARCHAR(70) NOT NULL,
`yearrelease` YEAR NOT NULL,
`ftime` TIME NOT NULL,
`lang` VARCHAR(20) NOT NULL DEFAULT "EN",
`rating`  INT NOT NULL CHECK ((rating<=5)&&(rating>=1)),
`plot` text NOT NULL,
`tag` text NOT NULL,
`source` VARCHAR(250) NOT NULL DEFAULT "chappie" ,
PRIMARY KEY (`idM`)
ON UPDATE CASCADE
ON DELETE CASCADE
  )
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `userlists` (
`ufilm` INT UNSIGNED NOT NULL,
`user` VARCHAR(100) NOT NULL,
PRIMARY KEY (ufilm,user),
  FOREIGN KEY (ufilm) REFERENCES movies(idM),
  FOREIGN KEY (user) REFERENCES users(username)
  )
  ENGINE = InnoDB;
set foreign_key_checks= 1;
/*INSERTS DB*/
/*Users*/
INSERT INTO `users` (`username`, `name`, `surname`, `eta`, `email`, `password`) VALUES ('user', 'user', 'user', '18', 'user@user.com', 'user');
INSERT INTO `users` (`username`, `name`, `surname`, `eta`, `email`, `password`, `adminsta`) VALUES ('admin', 'admin', 'admin', '18', 'admin@admin.com', 'admin', 'admin');

/*Movies*/
INSERT INTO `movies` (`idM`, `title`, `poster`, `yearrelease`, `ftime`, `lang`, `rating`, `plot`, `tag`, `source`) VALUES
(1, 'Interstellar', 'interstellar.jpg', 2014, '02:49:00', 'EN', 5, 'In Earth\'s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand, a brilliant NASA physicist, is working on plans to save mankind by transporting Earth\'s population to a new home via a wormhole. But first, Brand must send former NASA pilot Cooper and a team of researchers through the wormhole and across the galaxy to find out which of three planets could be mankind\'s new home..', 'Adventure,Drama,Sci-Fi', 'Chappie'),
(2, 'Gravity', 'Gravity.jpg', 2013, '01:31:00', 'EN', 2, 'Dr. Ryan Stone (Sandra Bullock) is a brilliant medical engineer on her first shuttle mission, with veteran astronaut Matt Kowalski (George Clooney) in command of his last flight before retiring. But on a seemingly routine spacewalk, disaster strikes. The shuttle is destroyed, leaving Stone and Kowalsky completely alone - tethered to nothing but each other and spiraling out into the blackness', 'drama, sci-fi, thriller, fantascience', 'Chappie'),
(3, 'Tomorrowland', 'Tomorrowland.jpg', 2015, '02:10:00', 'EN', 4, 'Bound by a shared destiny, a bright, optimistic teen bursting with scientific curiosity and a former boy-genius inventor jaded by disillusionment embark on a danger-filled mission to unearth the secrets of an enigmatic place somewhere in time and space that exists in their collective memory as \"Tomorrowland.\"', 'action, adventure, family', 'Chappie'),
(4, 'Geostorm', 'Geostorm.jpg', 2017, '01:49:00', 'EN', 2, 'When catastrophic climate change endangers Earth´s very survival, world governments unite and create the Dutch Boy Program: a world wide net of satellites, surrounding the planet, that are armed with geoengineering technologies designed to stave off the natural disasters. After successfully protecting the planet for three years, something is starting to go wrong. Two estranged brothers are tasked with solving the programs malfunction before a world wide Geostorm can engulf the planet.', 'action, sci-fi, thriller', 'Chappie'),
(5, 'The Martian', 'The_Martian.jpg', 2015, '02:24:00', 'EN', 4, 'During a manned mission to Mars, Astronaut Mark Watney is presumed dead after a fierce storm and left behind by his crew. But Watney has survived and finds himself stranded and alone on the hostile planet. With only meager supplies, he must draw upon his ingenuity, wit and spirit to subsist and find a way to signal to Earth that he is alive. Millions of miles away, NASA and a team of international scientists work tirelessly to bring the Martian home, while his crewmates concurrently plot a daring, if not impossible, rescue mission. As these stories of incredible bravery unfold, the world comes together to root for Watneys safe return.', 'drama, adventure, sci-fi', 'Chappie'),
(6, 'Avatar', 'Avatar.jpg', 2009, '02:24:00', 'EN', 4, 'When his brother is killed in a robbery, paraplegic Marine Jake Sully decides to take his place in a mission on the distant world of Pandora. There he learns of greedy corporate figurehead Parker Selfridge intentions of driving off the native humanoid Navi in order to mine for the precious material scattered throughout their rich woodland. In exchange for the spinal surgery that will fix his legs, Jake gathers intel for the cooperating military unit spearheaded by gung-ho Colonel Quaritch, while simultaneously attempting to infiltrate the Navi people with the use of an avatar identity. While Jake begins to bond with the native tribe and quickly falls in love with the beautiful alien Neytiri, the restless Colonel moves forward with his ruthless extermination tactics, forcing the soldier to take a stand - and fight back in an epic battle for the fate of Pandora.', 'action, adventure, fantasy', 'Chappie'),
(7, '12 Years a Slave', '12_Years_a_Slave.jpg', 2013, '02:14:00', 'EN', 4, 'Based on an incredible true story of one mans fight for survival and freedom. In the pre-Civil War United States, Solomon Northup, a free black man from upstate New York, is abducted and sold into slavery. Facing cruelty personified by a malevolent slave owner, as well as unexpected kindnesses, Solomon struggles not only to stay alive, but to retain his dignity. In the twelfth year of his unforgettable odyssey, Solomons chance meeting with a Canadian abolitionist will forever alter his life.', 'biography, drama, history', 'Chappie'),
(8, 'Arrival', 'Arrival.jpg', 2016, '01:56:00', 'EN', 4, 'Linguistics professor Louise Banks leads an elite team of investigators when gigantic spaceships touchdown in 12 locations around the world. As nations teeter on the verge of global war, Banks and her crew must race against time to find a way to communicate with the extraterrestrial visitors. Hoping to unravel the mystery, she takes a chance that could threaten her life and quite possibly all of mankind.', 'mistery, drama, sci-fi', 'Chappie'),
(9, 'The Revenant', 'The_Revenant.jpg', 2016, '02:36:00', 'EN', 4, 'While exploring uncharted wilderness in 1823, legendary frontiersman Hugh Glass sustains injuries from a brutal bear attack. When his hunting team leaves him for dead, Glass must utilize his survival skills to find a way back home while avoiding natives on their own hunt. Grief-stricken and fueled by vengeance, Glass treks through the wintry terrain to track down John Fitzgerald, the former confidant who betrayed and abandoned him.', 'action, adventure, biography', 'Chappie'),
(10, 'The Wolf of Wall Street', 'The_Wolf_of_Wall_Street.jpg', 2013, '03:00:00', 'EN', 4, 'Jordan Belfort is a Long Island penny stockbroker who served 22 months in prison for defrauding investors in a massive 1990s securities scam that involved widespread corruption on Wall Street and in the corporate banking world, including shoe designer Steve Madden.', 'comedy, crime, biography', 'Chappie'),
(11, 'Inglourious Basterds', 'Inglourious_Basterds.jpg', 2009, '02:33:00', 'EN', 4, 'In German-occupied France, young Jewish refugee Shosanna Dreyfus witnesses the slaughter of her family by Colonel Hans Landa. Narrowly escaping with her life, she plots her revenge several years later when German war hero Fredrick Zoller takes a rapid interest in her and arranges an illustrious movie premiere at the theater she now runs. With the promise of every major Nazi officer in attendance, the event catches the attention of the Basterds, a group of Jewish-American guerrilla soldiers led by the ruthless Lt. Aldo Raine. As the relentless executioners advance and the conspiring young girls plans are set in motion, their paths will cross for a fateful evening that will shake the very annals of history.', 'adventure, drama, war', 'Chappie'),
(12, 'Dragon Ball Super: Broly', 'dragon-ball-super-movie-broly-780x405.jpeg', 2018, '01:41:00', 'EN', 4, 'A planet destroyed, a powerful race reduced to nothing. After the devastation of Planet Vegeta, three Saiyans were scattered among the stars, destined for different fates. While two found a home on Earth, the third was raised with a burning desire for vengeance and developed an unbelievable power. And the time for revenge has come. Destinies collide in a battle that will shake the universe to its very core!', 'cartoons, action, fantasy', 'Chappie'),
(13, ' Food, Inc.', '2009-12-21_food-inc.jpg', 2008, '01:34:00', 'EN', 3, 'An unflattering look inside America\'s corporate controlled food industry.', ' Documentary', 'Chappie'),
(14, 'The Wizard of  OZ', 'the_wizard_of_Oz.jpg', 1939, '01:42:00', 'EN', 4, 'L. Frank Baum\'s classic tale comes to magisterial Technicolor life! The Wizard of Oz stars legendary Judy Garland as Dorothy, an innocent farm girl whisked out of her mundane earthbound existence into a land of pure imagination. Dorothy\'s journey in Oz will take her through emerald forests, yellow brick roads, and creepy castles, all with the help of some unusual but earnest song-happy friends.', 'Classic,  Adventure, Fantasy ', 'Chappie'),
(15, 'Barry Lyndon', 'barry_london.jpg', 1975, '03:05:00', 'EN', 4, 'Based on the Victorian novel by William Makepeace Thackeray, this film tells the complex story of a sensitive, intelligent, and ambitious man trapped in a society which has no use for him. Despite the obstacle of his Irish birth, Raymond Barry manages to become the wealthy but ill-respected Barry Lyndon.', ' Adventure, Drama, History', 'Chappie'),
(16, 'Invictus', 'invictus.jpg', 2009, '02:14:00', 'EN', 3, 'Nelson Mandela, in his first term as the South African President, initiates a unique venture to unite the apartheid-torn land: enlist the national rugby team on a mission to win the 1995 Rugby World Cup', 'Sport, Drama, History', 'Chappie'),
(17, 'Scary Movie', 'scary_movie.jpg', 2000, '01:28:00', 'EN', 3, 'A year after disposing of the body of a man they accidentally killed, a group of dumb teenagers are stalked by a bumbling serial killer.', 'comedy', 'Chappie');
