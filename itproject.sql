-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for itproject
CREATE DATABASE IF NOT EXISTS `itproject` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `itproject`;


-- Dumping structure for table itproject.color
CREATE TABLE IF NOT EXISTS `color` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) NOT NULL,
  `value` varchar(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table itproject.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL DEFAULT '0',
  `FirstName` varchar(20) NOT NULL DEFAULT '0',
  `LastName` varchar(20) NOT NULL DEFAULT '0',
  `Age` int(11) NOT NULL DEFAULT '0',
  `Gender` varchar(6) NOT NULL DEFAULT '0',
  `Size` int(11) NOT NULL DEFAULT '0',
  `Color` varchar(15) NOT NULL DEFAULT '0',
  `Totall` int(11) NOT NULL DEFAULT '0',
  `Discount` int(11) NOT NULL DEFAULT '0',
  `Password` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table itproject.item
CREATE TABLE IF NOT EXISTS `item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `CountryofOrigin` varchar(50) NOT NULL,
  `YearofManfacture` date NOT NULL,
  `Manfcurer` varchar(50) NOT NULL,
  `Image` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table itproject.itemorder
CREATE TABLE IF NOT EXISTS `itemorder` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_itemorder_order` (`OrderId`),
  KEY `FK_itemorder_item` (`ItemId`),
  CONSTRAINT `FK_itemorder_item` FOREIGN KEY (`ItemId`) REFERENCES `item` (`Id`),
  CONSTRAINT `FK_itemorder_order` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table itproject.itemsize
CREATE TABLE IF NOT EXISTS `itemsize` (
  `ItemId` int(11) NOT NULL DEFAULT '0',
  `SizeId` int(11) NOT NULL DEFAULT '0',
  `Quantity` int(11) NOT NULL DEFAULT '0',
  `ColorId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ItemId`,`SizeId`,`Quantity`,`ColorId`),
  KEY `FK_itemsize_size` (`SizeId`),
  KEY `FK_itemsize_color` (`ColorId`),
  CONSTRAINT `FK_itemsize_color` FOREIGN KEY (`ColorId`) REFERENCES `color` (`Id`),
  CONSTRAINT `FK_itemsize_item` FOREIGN KEY (`ItemId`) REFERENCES `item` (`Id`),
  CONSTRAINT `FK_itemsize_size` FOREIGN KEY (`SizeId`) REFERENCES `size` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table itproject.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Total` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `FK_order_customer` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table itproject.size
CREATE TABLE IF NOT EXISTS `size` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Number` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
