-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table nindies.games
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(50) NOT NULL,
  `releasedate` date NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `platform` varchar(50) NOT NULL DEFAULT 'Nintendo',
  `studio` varchar(50) NOT NULL DEFAULT '',
  `eshop` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table nindies.games: ~49 rows (approximately)
INSERT INTO `games` (`id`, `domain`, `releasedate`, `name`, `platform`, `studio`, `eshop`) VALUES
	(1, 'unepic', '2014-01-16', 'UnEpic', 'WiiU', 'Francisco Téllez de Meneses \'unepic-fran\'', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Unepic-846906.html'),
	(2, 'supertoycars', '2014-07-24', 'Super Toy Cars', 'WiiU', 'Eclipse Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Super-Toy-Cars-906215.html'),
	(3, 'icecreamsurfer', '2014-07-31', 'Ice Cream Surfer', 'WiiU', 'Dolores Entertainment', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Ice-Cream-Surfer-907942.html'),
	(4, 'dartsup', '2014-09-25', 'Darts Up', 'WiiU', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Darts-Up-918629.html'),
	(5, '99seconds', '2014-10-02', '99Seconds', 'WiiU', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/99Seconds-922605.html'),
	(6, 'rockzombie', '2014-11-20', 'Rock Zombie', 'WiiU', 'Quaternion Studio', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Rock-Zombie-937314.html'),
	(7, 'shinythefirefly', '2014-11-27', 'Shiny The Firefly', 'WiiU', 'Stage Clear Studios', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Shiny-The-Firefly-938801.html'),
	(8, '99moves', '2014-12-18', '99Moves', 'WiiU', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/99Moves-945801.html'),
	(9, 'spychamaleon', '2014-12-25', 'Spy Chameleon - RGB Agent', 'WiiU', 'Unfinished Pixel', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Spy-Chameleon-946957.html'),
	(10, 'rocknracing', '2015-01-29', 'Rock \'N Racing Off Road', 'WiiU', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Rock-N-Racing-Off-Road-951691.html'),
	(11, 'nihilumbra', '2015-05-14', 'Nihilumbra', 'WiiU', 'BeautiFun Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Nihilumbra-900988.html'),
	(12, 'fullblast', '2015-06-04', 'FullBlast', 'WiiU', 'UFO Crash Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/FullBlast-1020623.html'),
	(13, 'funkoftitans', '2015-06-05', 'Funk of Titans', 'WiiU', 'A Crowd of Monsters', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Funk-of-Titans-1032615.html'),
	(14, 'rovingrogue', '2015-07-02', 'Roving Rogue', 'WiiU', 'Padaone Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Roving-Rogue-1031209.html'),
	(15, 'canvaleon', '2015-07-23', 'Canvaleon', 'WiiU', 'OXiAB Game Studio', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Canvaleon-1035831.html'),
	(16, 'rocknracingdx', '2015-09-24', 'Rock \'N Racing Off Road DX', 'WiiU', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Rock-N-Racing-Off-Road-DX-1051702.html'),
	(17, 'riosdealice', '2015-09-24', 'Los Rios de Alice', 'WiiU', 'Delirium Studios', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Los-Rios-de-Alice-Version-extendida-1051619.html'),
	(18, 'tinythief', '2015-11-13', 'Tiny Thief', 'WiiU', '5 Ants Games', 'https://www.nintendo.co.jp/wiiu/aahj/index.html'),
	(19, 'freezeme', '2016-02-04', 'FreezeME', 'WiiU', 'Rainy Night Creations', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/FreezeME-1095381.html'),
	(20, 'grumpyreaper', '2016-03-03', 'Grumpy Reaper', 'WiiU', 'Drakhar Studio', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Grumpy-Reaper-1088538.html'),
	(21, 'tachyonproject', '2016-03-31', 'Tachyon Project', 'WiiU', 'Eclipse Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Tachyon-Project-1093992.html'),
	(22, 'twinrobots', '2016-06-16', 'Twin Robots', 'WiiU', 'Thinice Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Twin-Robots-1113110.html'),
	(23, 'ziggurat', '2016-06-30', 'Ziggurat', 'WiiU', 'Milkstone Studios', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Ziggurat-1117445.html'),
	(24, 'bitdungeon', '2016-07-14', 'bit Dungeon+', 'WiiU', 'Dolores Entertainment', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Bit-Dungeon-1121312.html'),
	(25, 'defendyourcrypt', '2016-07-21', 'Defend your Crypt', 'WiiU', 'Ratalaika Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Defend-your-Crypt-1124822.html'),
	(26, 'grandprixrocknracing', '2016-09-15', 'Grand Prix Rock \'N Racing', 'WiiU', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Grand-Prix-Rock-N-Racing-1139385.html'),
	(27, 'spheroids', '2017-01-05', 'Spheroids', 'WiiU', 'Eclipse Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Spheroids-1171433.html'),
	(28, 'vaccine', '2017-02-23', 'Vaccine', 'WiiU', 'Rainy Night Creations', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Vaccine-1192635.html'),
	(29, 'sixsidesoftheworld', '2017-03-23', 'Six Sides of the World', 'WiiU', 'Cybernetik Design', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Six-Sides-of-the-World-1208514.html'),
	(30, 'mutantalienmolesofdead', '2017-03-30', 'Mutant Alien Moles of the Dead', 'WiiU', 'Pixel Bones Studio', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Mutant-Alien-Moles-of-the-Dead-1210224.html'),
	(31, 'cubittherobothd', '2017-06-08', 'Cubit The Hardcore Platformer Robot HD', 'WiiU', 'CoderChild', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Cubit-The-Hardcore-Platformer-Robot-HD-1229064.html'),
	(32, 'elsilla', '2019-01-18', 'El Silla - Arcade Edition', 'WiiU', 'Markanime Studios', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/El-Silla-Arcade-Edition-1498789.html'),
	(33, 'padoftime', '2022-04-13', 'Pad of Time', 'WiiU', 'Markanime Studios', 'https://www.nintendo.es/Juegos/Programas-descargables-Wii-U/Pad-of-Time-2189491.html'),
	(35, 'dresstoplaywitch', '2012-11-22', 'Dress To Play: Cute Witches!', '3DS', 'CoderChild', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Dress-To-Play-Cute-Witches--672625.html'),
	(36, 'castlevaniamirrorfate', '2013-03-08', 'Castlevania: Lords of Shadow - Mirror of Fate', '3DS', 'MercurySteam', 'https://www.nintendo.es/Juegos/Juegos-de-Nintendo-3DS/Castlevania-Lords-of-Shadow-Mirror-of-Fate-703705.html'),
	(38, 'dresstoplaymagicbubles', '2013-07-04', 'Dress To Play: Magic Bubbles!', '3DS', 'CoderChild', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Dress-To-Play-Magic-Bubbles--774458.html'),
	(39, 'footballup', '2013-07-11', 'Football Up!', '3DS', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Football-Up-3D-726438.html'),
	(40, 'carpsdragons', '2013-11-26', 'Carps & Dragons', '3DS', 'Abylight', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Carps-Dragons-794416.html'),
	(41, 'cubittherobot', '2014-03-13', 'Cubit The Hardcore Platformer Robot', '3DS', 'CoderChild', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Cubit-The-Hardcore-Platformer-Robot-862476.html'),
	(42, 'vanhelsingsniper', '2014-06-26', 'Van Helsing sniper Zx100', '3DS', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/VAN-HELSING-SNIPER-ZX100-897157.html'),
	(43, 'dartsup3d', '2014-09-18', 'Darts Up 3D', '3DS', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Darts-Up-3D-799250.html'),
	(44, 'zombiepanicinwonderland', '2014-10-30', 'Zombie Panic in Wonderland DX', '3DS', 'Akaoni Studio', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Zombie-Panic-in-Wonderland-DX-929368.html'),
	(45, 'toysvsmonsters', '2014-12-18', 'Toys Vs Monsters', '3DS', 'EnjoyUp Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/TOYS-VS-MONSTERS-945594.html'),
	(46, 'zombieincident', '2015-02-26', 'Zombie Incident', '3DS', 'CoderChild', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Zombie-Incident-968612.html'),
	(47, 'vonsottendorff', '2015-12-17', 'Los delirios de Von Sottendorff y su mente cuadriculada', '3DS', 'Delirium Studios', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Los-Delirios-de-Von-Sottendorff-y-su-Mente-Cuadriculada-1076920.html'),
	(48, 'musicverse', '2016-03-03', 'Musicverse: Electronic Keyboard', '3DS', 'Abylight', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Musicverse-Electronic-Keyboard-1088903.html'),
	(49, 'defendyourcrypt3d', '2016-07-21', 'Defend your Crypt', '3DS', 'Ratalaika Games', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Defend-your-Crypt-1125209.html'),
	(50, 'malditacastillaex', '2017-01-12', 'Maldita Castilla EX', '3DS', 'Locomalito', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-3DS/Cursed-Castilla-1243244.html'),
	(51, 'metroidsamusreturns', '2017-09-15', 'Metroid: Samus Returns', '3DS', 'MercurySteam', 'https://www.nintendo.es/Juegos/Juegos-de-Nintendo-3DS/Metroid-Samus-Returns-1234232.html');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
