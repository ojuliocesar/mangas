-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_mangas
CREATE DATABASE IF NOT EXISTS `db_mangas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_mangas`;

-- Copiando estrutura para tabela db_mangas.mangas
CREATE TABLE IF NOT EXISTS `mangas` (
  `id_mangas` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_mangas`),
  KEY `FK_mangas_mangas_category` (`id_category`),
  CONSTRAINT `FK_mangas_mangas_category` FOREIGN KEY (`id_category`) REFERENCES `mangas_category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_mangas.mangas: ~2 rows (aproximadamente)
INSERT INTO `mangas` (`id_mangas`, `id_category`, `name`, `author`, `banner`, `price`, `status`, `create_at`) VALUES
	(58, 1, ' Naruto', ' Masashi Kishimoto ', NULL, 300, 1, '2022-07-14 23:15:33'),
	(60, 1, ' Boruto ', ' Masashi Kishimoto ', NULL, 200, 1, '2022-07-14 23:24:52');

-- Copiando estrutura para tabela db_mangas.mangas_category
CREATE TABLE IF NOT EXISTS `mangas_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_mangas.mangas_category: ~4 rows (aproximadamente)
INSERT INTO `mangas_category` (`id_category`, `name`, `status`, `create_at`) VALUES
	(1, 'shounnen', 1, '2022-07-13 19:29:37'),
	(2, 'seinen', 1, '2022-07-13 19:29:47'),
	(3, 'terror', 1, '2022-07-13 19:29:56'),
	(4, 'aventura', 1, '2022-07-13 19:30:00'),
	(5, 'suspense', 1, '2022-07-13 19:30:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
