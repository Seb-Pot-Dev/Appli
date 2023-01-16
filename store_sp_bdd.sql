-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour store_sp
CREATE DATABASE IF NOT EXISTS `store_sp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `store_sp`;

-- Listage de la structure de table store_sp. product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `price` float NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table store_sp.product : ~7 rows (environ)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image_url`) VALUES
	(1, 'gamecube', 'Le Nintendo GameCube (ニンテンドーゲームキューブ, Nintendō Gēmukyūbu?, prononcé en anglais : [ˈɡeɪm.kjuːb])3 est une console de jeux vidéo de salon du fabricant japonais Nintendo, sortie en 2001 (2002 en Europe), développée en association avec IBM, NEC et ATI. Elle fut en concurrence avec la PlayStation 2 de Sony, la Xbox de Microsoft et la Dreamcast de Sega, qui forment ensemble la sixième génération de consoles de jeux vidéo.', 199, 'https://upload.wikimedia.org/wikipedia/commons/2/2b/GameCube-Console-Set.png'),
	(2, 'nintendo 64', 'La Nintendo 64 (ニンテンドウ64, Nintendō Rokujūyon?), également connue sous les noms de code Project Reality et Ultra 64 lors de sa phase de développement, est une console de jeux vidéo de salon, sortie en 1996 (1997 en Europe), du constructeur japonais Nintendo en collaboration avec Silicon Graphics. Elle fut la dernière des consoles de salon de cinquième génération à être sortie.', 199, 'https://upload.wikimedia.org/wikipedia/commons/0/02/N64-Console-Set.png'),
	(3, 'playstation 5', 'La PlayStation 5 (abrégée officiellement PS5) est la console de jeux vidéo de salon de neuvième génération développée par Sony Interactive Entertainment. Elle est commercialisée le 12 novembre 2020 aux États-Unis, au Canada, en Australie et au Japon, puis le 19 novembre en Europe et dans le reste du monde. Elle succède à la PlayStation 4 et se place en concurrence avec les Xbox Series de Microsoft et la Nintendo Switch de Nintendo.', 499, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/PS5DigitalEdition.png/800px-PS5DigitalEdition.png'),
	(4, 'gameboy color', 'La Game Boy Color (ゲームボーイカラー, Gēmu Bōi Karā?), abrégé GBC, est la console de jeux vidéo portable succédant à la Game Boy. Créée par Nintendo, elle incorpore un écran couleur à peine plus grand que celui de la Game Boy. En revanche, son processeur est deux fois plus rapide, et sa mémoire deux fois plus grande. Elle est rétrocompatible avec tous les jeux Game Boy de première génération.', 150, 'https://upload.wikimedia.org/wikipedia/commons/3/35/Nintendo-Game-Boy-Color-FL.png'),
	(5, 'PC gaming', 'ordinateur très chère et très puissant XXxxXX', 99999, 'https://www.cybertek.fr/images_produits/cybertek/configs/20220510114608_1-1200-cyb-min.png'),
	(6, 'machin', 'maaaaachin truc bidule lorem ipsum', 10, 'zzz'),
	(7, 'Xbox Serie X', 'Xbox Series est la gamme de consoles de neuvième génération comprenant la Xbox Series X et la Xbox Series S, développées et fabriquées par Microsoft et sorties le 10 novembre 20202,3. Quatrième génération de consoles Xbox, elles succèdent à la Xbox One. La Xbox Series X est annoncée lors de l\'E3 2019, tandis que la Xbox Series S est annoncée le 9 septembre 2020.', 499, 'https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE4mRni?ver=8361');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
