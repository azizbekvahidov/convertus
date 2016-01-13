-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.41-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица convertus.address
CREATE TABLE IF NOT EXISTS `address` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `streetName` varchar(100) DEFAULT NULL,
  `laneName` varchar(100) DEFAULT NULL,
  `house` varchar(100) DEFAULT NULL,
  `regionId` int(11) DEFAULT NULL,
  PRIMARY KEY (`addressId`),
  KEY `FK_address_region` (`regionId`),
  CONSTRAINT `FK_address_region` FOREIGN KEY (`regionId`) REFERENCES `region` (`regionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.address: ~0 rows (приблизительно)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.indexes
CREATE TABLE IF NOT EXISTS `indexes` (
  `indexId` int(11) NOT NULL AUTO_INCREMENT,
  `regionId` int(11) DEFAULT NULL,
  PRIMARY KEY (`indexId`),
  KEY `FK_indexes_region` (`regionId`),
  CONSTRAINT `FK_indexes_region` FOREIGN KEY (`regionId`) REFERENCES `region` (`regionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.indexes: ~0 rows (приблизительно)
DELETE FROM `indexes`;
/*!40000 ALTER TABLE `indexes` DISABLE KEYS */;
/*!40000 ALTER TABLE `indexes` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.region
CREATE TABLE IF NOT EXISTS `region` (
  `regionId` int(11) NOT NULL AUTO_INCREMENT,
  `regionName` varchar(100) DEFAULT NULL,
  `parentId` int(11) NOT NULL,
  `regType` int(11) DEFAULT NULL,
  PRIMARY KEY (`regionId`),
  KEY `FK_region_region` (`parentId`),
  KEY `FK_region_regionType` (`regType`),
  CONSTRAINT `FK_region_region` FOREIGN KEY (`parentId`) REFERENCES `region` (`regionId`),
  CONSTRAINT `FK_region_regionType` FOREIGN KEY (`regType`) REFERENCES `regionType` (`regTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.region: ~5 rows (приблизительно)
DELETE FROM `region`;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` (`regionId`, `regionName`, `parentId`, `regType`) VALUES
	(1, 'Навоий', 0, 1),
	(6, 'Кармана', 0, 3),
	(7, 'Навбахор', 0, 3),
	(8, 'Навоий', 1, 2),
	(9, 'Янги арик', 8, 4);
/*!40000 ALTER TABLE `region` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.regionType
CREATE TABLE IF NOT EXISTS `regionType` (
  `regTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`regTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.regionType: ~4 rows (приблизительно)
DELETE FROM `regionType`;
/*!40000 ALTER TABLE `regionType` DISABLE KEYS */;
INSERT INTO `regionType` (`regTypeId`, `typeName`) VALUES
	(1, 'Область'),
	(2, 'Город'),
	(3, 'Район'),
	(4, 'Махаля');
/*!40000 ALTER TABLE `regionType` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
