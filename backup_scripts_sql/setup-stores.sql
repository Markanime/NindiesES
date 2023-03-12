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

-- Dumping structure for table nindies.stores
CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameId` int(11) NOT NULL,
  `label` varchar(255) NOT NULL DEFAULT 'Buy it on this store',
  `url` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table nindies.stores: ~48 rows (approximately)
INSERT INTO `stores` (`id`, `gameId`, `label`, `url`) VALUES
	(1, 1, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Unepic-1305521.html'),
	(2, 1, 'Steam', 'https://store.steampowered.com/app/233980/UnEpic/'),
	(3, 2, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Super-Toy-Cars-1339849.html'),
	(4, 2, 'Steam', 'http://store.steampowered.com/app/116100/'),
	(5, 3, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Ice-Cream-Surfer-1377207.html'),
	(6, 3, 'Steam', 'https://store.steampowered.com/app/361560/Ice_Cream_Surfer/'),
	(7, 4, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Darts-Up-1402030.html'),
	(8, 5, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/99Seconds-1486866.html'),
	(9, 6, 'Steam', 'https://store.steampowered.com/app/328640/Rock_Zombie/'),
	(10, 7, 'Steam', 'https://store.steampowered.com/app/277510/Shiny_The_Firefly/'),
	(11, 8, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/99Moves-1497481.html'),
	(12, 9, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Spy-Chameleon-1348367.html'),
	(13, 9, 'Steam', 'https://store.steampowered.com/app/297490/Spy_Chameleon__RGB_Agent/'),
	(14, 10, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Rock-N-Racing-Off-Road-DX-1301900.html'),
	(15, 11, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Nihilumbra-1366743.html'),
	(16, 11, 'Steam', 'http://store.steampowered.com/app/252670/'),
	(17, 12, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/FullBlast-1434938.html'),
	(18, 12, 'Steam', 'http://store.steampowered.com/app/429220'),
	(19, 13, 'Steam', 'https://store.steampowered.com/app/383750/Funk_of_Titans/'),
	(20, 16, 'Steam', 'https://store.steampowered.com/app/411590/The_Rivers_of_Alice__Extended_Version/'),
	(21, 19, 'Steam', 'https://store.steampowered.com/app/390210'),
	(22, 21, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Tachyon-Project-1331655.html'),
	(23, 21, 'Steam', 'https://store.steampowered.com/app/385860/Tachyon_Project/'),
	(24, 22, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Twin-Robots-Ultimate-Edition-1340806.html'),
	(25, 23, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Ziggurat-1593829.html'),
	(26, 23, 'Steam', 'https://store.steampowered.com/app/308420/'),
	(27, 24, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Bit-Dungeon--1346492.html'),
	(28, 24, 'Steam', 'http://store.steampowered.com/app/440020/'),
	(29, 25, 'Steam', 'https://store.steampowered.com/app/457450/Defend_Your_Crypt/'),
	(30, 49, 'Steam', 'https://store.steampowered.com/app/457450/Defend_Your_Crypt/'),
	(31, 26, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Grand-Prix-Rock-N-Racing-1323420.html'),
	(32, 27, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Spheroids-1403006.html'),
	(33, 28, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Vaccine-1241559.html'),
	(34, 28, 'Steam', 'https://store.steampowered.com/app/549950/Vaccine/'),
	(35, 29, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Six-Sides-of-the-World-1453118.html'),
	(36, 29, 'Steam', 'https://store.steampowered.com/app/384480/Six_Sides_of_the_World/'),
	(37, 30, 'Nintendo Switch (Recopilatorio)', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Dead-Fun-Pack-Penguins-and-Aliens-Strikes-Again-1381509.html'),
	(38, 32, 'Nintendo Switch (incluido como Minijuego)', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Pad-of-Time-2189377.html'),
	(39, 32, 'Itch.io', 'https://markanime.itch.io/el-silla'),
	(40, 33, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Pad-of-Time-2189377.html'),
	(41, 33, 'Itch.io', 'https://markanime.itch.io/padoftime'),
	(42, 36, 'Steam', 'https://store.steampowered.com/app/282530/Castlevania_Lords_of_Shadow__Mirror_of_Fate_HD/'),
	(43, 43, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Darts-Up-1402030.html'),
	(44, 44, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Zombie-Panic-in-Wonderland-DX-1502597.html'),
	(45, 44, 'Steam', 'https://store.steampowered.com/app/1173850/Zombie_Panic_In_Wonderland_DX/'),
	(46, 46, 'MSX', 'https://www.msx.org/es/news/software/es/zombie-incident-12'),
	(47, 50, 'Nintendo Switch', 'https://www.nintendo.es/Juegos/Programas-descargables-Nintendo-Switch/Maldita-Castilla-EX-1500243.html'),
	(48, 50, 'Steam', 'https://store.steampowered.com/app/534290/Cursed_Castilla_Maldita_Castilla_EX/');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
