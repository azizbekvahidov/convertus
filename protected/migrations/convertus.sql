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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.address: ~2 rows (приблизительно)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`addressId`, `streetName`, `laneName`, `house`, `regionId`) VALUES
	(1, 'Мира', '', '12-23', 9),
	(2, 'Янги арик', '', 'Все', 9);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `addressesID` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `whom` varchar(255) DEFAULT NULL,
  `index` int(11) DEFAULT NULL,
  `IDUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`addressesID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.addresses: ~21 rows (приблизительно)
DELETE FROM `addresses`;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`addressesID`, `address`, `whom`, `index`, `IDUser`) VALUES
	(1, 'asjkdgh ajksdf ashgfj ahg', 'some', 10200, 1),
	(2, 'sdfjk fhadfkah kjfahfk ajkfha; f', 'yhgyy', 11500, 1),
	(3, 'asdkjas jasfh asdfh asdfha;', 'wer', 12600, 2),
	(4, 'ksdvoa p[[dfgjn  ', 'nothing', 14500, 1),
	(5, 'ioweioodsh jkhsdjf a jsdbf a', 'month', 16000, 1),
	(6, NULL, NULL, NULL, 2),
	(7, 'kldfmnm,,ln\'a ;l;h\' \'dklsdj ldfskg ', 'goof', 15766, 1),
	(8, 'om,sdfjhklk jdfjgljk jl;adfg;  ;adfjg', 'axaxa', 16590, 1),
	(9, NULL, NULL, NULL, 3),
	(10, NULL, NULL, NULL, 2),
	(11, NULL, NULL, NULL, 4),
	(12, 'nnvioi nojlk lk jlk lask djlak ', 'good', 17800, 1),
	(13, '234234', NULL, 0, 1),
	(14, '234234', NULL, 0, 1),
	(15, '234234', 'asd adas dafs dfasfdas fasdf', 0, 1),
	(16, '234234', 'asd adas dafs dfasfdas fasdf', 0, 1),
	(17, '456465', 'jkhjksxhck adfjkhaio sdf asjdfioas ', 0, 1),
	(18, 'sdfui ghoasdfgdhgjidashgio ehkrjtge uighadkjy nuadhr gjadrhguiadbk jgaer 234', 'jkhjksxhck adfjkhaio sdf asjdfioas ', 456465, 1),
	(19, 'sdfui ghoasdfgdhgjidashgio ehkrjtge uighadkjy nuadhr gjadrhguiadbk jgaer 234', 'jkhjksxhck adfjkhaio sdf asjdfioas ', 456465, 1),
	(20, 'sdflguws hgerj abn/asdj elgmasd gjknlasem srjgd;alg ;ad fk;gjadhger;gh jasdpghl ae', 'fkgujsdajisfgasu fk aoieiohjetyp h]aeor ajgna ', 342342, 1),
	(21, 'sadf asdfkl asjkdfasdf iasdkf;a hlasdkfkl jasdf8 797', 'fsd fasf asfd asdfa sdfas', 453543, 1);
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.indexes
CREATE TABLE IF NOT EXISTS `indexes` (
  `indexId` int(11) NOT NULL AUTO_INCREMENT,
  `addressId` int(11) DEFAULT NULL,
  `index` int(11) DEFAULT NULL,
  PRIMARY KEY (`indexId`),
  KEY `FK_indexes_region` (`addressId`),
  CONSTRAINT `FK_indexes_region` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.indexes: ~2 rows (приблизительно)
DELETE FROM `indexes`;
/*!40000 ALTER TABLE `indexes` DISABLE KEYS */;
INSERT INTO `indexes` (`indexId`, `addressId`, `index`) VALUES
	(1, 1, 102212),
	(2, 2, 121100);
/*!40000 ALTER TABLE `indexes` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.reestr
CREATE TABLE IF NOT EXISTS `reestr` (
  `reestrId` int(11) NOT NULL AUTO_INCREMENT,
  `reestrDate` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`reestrId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.reestr: ~7 rows (приблизительно)
DELETE FROM `reestr`;
/*!40000 ALTER TABLE `reestr` DISABLE KEYS */;
INSERT INTO `reestr` (`reestrId`, `reestrDate`, `userId`) VALUES
	(1, '2016-02-16 22:26:07', 1),
	(2, '2016-02-16 22:26:10', 1),
	(3, '2016-02-16 22:26:11', 1),
	(4, '2016-02-16 22:26:13', 1),
	(5, '2016-02-23 21:19:40', 1),
	(6, '2016-02-23 21:20:18', 1),
	(7, '2016-02-23 21:21:11', 1);
/*!40000 ALTER TABLE `reestr` ENABLE KEYS */;


-- Дамп структуры для таблица convertus.reestrAddr
CREATE TABLE IF NOT EXISTS `reestrAddr` (
  `reestrAddrId` int(11) NOT NULL AUTO_INCREMENT,
  `reestrId` int(11) DEFAULT NULL,
  `addressId` int(11),
  PRIMARY KEY (`reestrAddrId`),
  KEY `FK_reestrAddr_reestr` (`reestrId`),
  KEY `FK_reestrAddr_addresses` (`addressId`),
  CONSTRAINT `FK_reestrAddr_addresses` FOREIGN KEY (`addressId`) REFERENCES `addresses` (`addressesId`),
  CONSTRAINT `FK_reestrAddr_reestr` FOREIGN KEY (`reestrId`) REFERENCES `reestr` (`reestrId`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.reestrAddr: ~21 rows (приблизительно)
DELETE FROM `reestrAddr`;
/*!40000 ALTER TABLE `reestrAddr` DISABLE KEYS */;
INSERT INTO `reestrAddr` (`reestrAddrId`, `reestrId`, `addressId`) VALUES
	(1, 1, 2),
	(2, 1, 5),
	(3, 1, 4),
	(4, 1, 8),
	(5, 2, 7),
	(6, 2, 12),
	(7, 1, 13),
	(8, 1, 14),
	(9, 1, 15),
	(10, 1, 16),
	(11, 1, 17),
	(12, 1, 18),
	(13, 1, 19),
	(57, 1, 12),
	(58, 1, 18),
	(59, 1, 2),
	(60, 1, 8),
	(61, 1, 2),
	(62, 1, 8),
	(63, 1, 1),
	(64, 1, 5);
/*!40000 ALTER TABLE `reestrAddr` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы convertus.region: ~12 rows (приблизительно)
DELETE FROM `region`;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` (`regionId`, `regionName`, `parentId`, `regType`) VALUES
	(1, 'Навоий', 0, 1),
	(6, 'Кармана', 1, 3),
	(7, 'Навбахор', 1, 3),
	(8, 'Навоий', 1, 2),
	(9, 'Янги арик', 8, 4),
	(12, 'Тошкент', 0, 1),
	(13, 'что то', 8, 4),
	(14, 'другой', 8, 4),
	(15, 'Юнусобод', 12, 3),
	(16, 'Чилонзор', 12, 3),
	(17, 'Октепа', 16, 4),
	(18, '123', 13, 4);
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
