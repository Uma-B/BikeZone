-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.19 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for bikezone
CREATE DATABASE IF NOT EXISTS `bikezone` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bikezone`;


-- Dumping structure for table bikezone.bikemodel
CREATE TABLE IF NOT EXISTS `bikemodel` (
  `Bikeid` int(20) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  PRIMARY KEY (`Bikeid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table bikezone.bikemodel: ~25 rows (approximately)
/*!40000 ALTER TABLE `bikemodel` DISABLE KEYS */;
INSERT INTO `bikemodel` (`Bikeid`, `Brand`, `Model`) VALUES
	(1, 'Honda', 'Honda Active'),
	(2, 'Honda', 'Honda CB Hornet 160R'),
	(3, 'Honda', 'Honda Grazia'),
	(4, 'Honda', 'Honda XBlade'),
	(5, 'Honda', 'Honda CB Shine'),
	(6, 'Royal Enfield', ' Royal Enfield Thunderbird 350'),
	(7, 'Royal Enfield', 'Royal Enfield Classic 500'),
	(8, 'Royal Enfield', ' Royal Enfield Himalayan'),
	(9, 'Royal Enfield', ' Royal Enfield Bullet 350'),
	(10, 'Royal Enfield', 'Royal Enfield Classic 350'),
	(11, 'Suzuki', 'Suzuki Intruder.'),
	(12, 'Suzuki', 'Suzuki Gixxer.'),
	(13, 'Suzuki', 'Suzuki Hayabusa.'),
	(14, 'Suzuki', 'Suzuki Access 125. '),
	(15, 'Suzuki', 'Suzuki Intruder M1800R.'),
	(16, 'Yamaha', 'Yamaha YZF R15 V3.'),
	(17, 'Yamaha', 'Yamaha FZ S V 2.0.'),
	(18, 'Yamaha', 'Yamaha YZF R15.'),
	(19, 'Yamaha', 'Yamaha FZ V 2.0.'),
	(20, 'Yamaha', 'Yamaha YZF-R15 S.'),
	(21, 'Vespa', 'Vespa 946 Emporio Armani. '),
	(22, 'Vespa', 'Vespa VXL 150.'),
	(23, 'Vespa', 'Vespa SXL 150.'),
	(24, 'Vespa', 'Vespa S'),
	(25, 'Vespa', 'Vespa VX 125.');
/*!40000 ALTER TABLE `bikemodel` ENABLE KEYS */;


-- Dumping structure for table bikezone.bikeservicecenter
CREATE TABLE IF NOT EXISTS `bikeservicecenter` (
  `BikeServiceCenterId` int(11) NOT NULL AUTO_INCREMENT,
  `DealerId` int(11) NOT NULL,
  `ServiceCenterImage1` varchar(50) NOT NULL,
  `Amount` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`BikeServiceCenterId`),
  KEY `FK_bikeservicecenter_dealerregistration` (`DealerId`),
  CONSTRAINT `FK_bikeservicecenter_dealerregistration` FOREIGN KEY (`DealerId`) REFERENCES `dealerregistration` (`DealerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='BikeService details';

-- Dumping data for table bikezone.bikeservicecenter: ~0 rows (approximately)
/*!40000 ALTER TABLE `bikeservicecenter` DISABLE KEYS */;
/*!40000 ALTER TABLE `bikeservicecenter` ENABLE KEYS */;


-- Dumping structure for table bikezone.dealerbikes
CREATE TABLE IF NOT EXISTS `dealerbikes` (
  `DealerBikeId` int(11) NOT NULL AUTO_INCREMENT,
  `DealerId` int(11) NOT NULL,
  `BikeCategory` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Transimssion` varchar(50) NOT NULL,
  `FuelType` varchar(50) NOT NULL,
  `Stroke` varchar(50) NOT NULL,
  `EngineSize` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Details` varchar(50) DEFAULT NULL,
  `Prize` int(11) NOT NULL,
  `WebSiteLink` varchar(50) NOT NULL,
  `KilometreDriven` int(11) NOT NULL DEFAULT '0',
  `DealerBikeImage1` blob NOT NULL,
  `DealerBikeImage2` blob NOT NULL,
  `DealerBikeImage3` blob,
  `DealerBikeImage4` blob,
  `Amount` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`DealerBikeId`),
  KEY `FK_dealerbikes_dealerregistration` (`DealerId`),
  CONSTRAINT `FK_dealerbikes_dealerregistration` FOREIGN KEY (`DealerId`) REFERENCES `dealerregistration` (`DealerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bikezone.dealerbikes: ~0 rows (approximately)
/*!40000 ALTER TABLE `dealerbikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `dealerbikes` ENABLE KEYS */;


-- Dumping structure for table bikezone.dealerregistration
CREATE TABLE IF NOT EXISTS `dealerregistration` (
  `DealerId` int(11) NOT NULL AUTO_INCREMENT,
  `DealerName` varchar(50) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `MobileNumber` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ConfirmPassword` varchar(50) NOT NULL,
  `DealerType` varchar(50) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyMobileNum` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`DealerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table used to store showroom , retailer, service and insurance customer details';

-- Dumping data for table bikezone.dealerregistration: ~0 rows (approximately)
/*!40000 ALTER TABLE `dealerregistration` DISABLE KEYS */;
/*!40000 ALTER TABLE `dealerregistration` ENABLE KEYS */;


-- Dumping structure for table bikezone.insurance
CREATE TABLE IF NOT EXISTS `insurance` (
  `InsuranceId` int(11) NOT NULL AUTO_INCREMENT,
  `DealerId` int(11) NOT NULL,
  `WebSiteLink` varchar(50) NOT NULL,
  `Details` varchar(50) NOT NULL,
  `Amount` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`InsuranceId`),
  KEY `FK_insurance_dealerregistration` (`DealerId`),
  CONSTRAINT `FK_insurance_dealerregistration` FOREIGN KEY (`DealerId`) REFERENCES `dealerregistration` (`DealerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table contains insurance ajent details';

-- Dumping data for table bikezone.insurance: ~0 rows (approximately)
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;


-- Dumping structure for table bikezone.usedbikes
CREATE TABLE IF NOT EXISTS `usedbikes` (
  `UsedBikeId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL DEFAULT '0',
  `BikeCategory` varchar(50) NOT NULL DEFAULT '0',
  `Brand` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `KilometreDriven` int(11) NOT NULL,
  `Transmission` varchar(50) NOT NULL,
  `FuelType` varchar(50) NOT NULL,
  `Stroke` varchar(50) NOT NULL,
  `EngineSize` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Details` varchar(50) DEFAULT NULL,
  `Prize` int(11) NOT NULL,
  `UsedBikeImage1` blob NOT NULL,
  `UsedBikeImage2` blob NOT NULL,
  `UsedBikeImage3` blob,
  `UsedBikeImage4` blob,
  `UserName` varchar(50) NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`UsedBikeId`),
  KEY `FK_usedbikes_userregistration` (`UserId`),
  CONSTRAINT `FK_usedbikes_userregistration` FOREIGN KEY (`UserId`) REFERENCES `userregistration` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Used bike details';

-- Dumping data for table bikezone.usedbikes: ~1 rows (approximately)
/*!40000 ALTER TABLE `usedbikes` DISABLE KEYS */;
INSERT INTO `usedbikes` (`UsedBikeId`, `UserId`, `BikeCategory`, `Brand`, `Model`, `Year`, `KilometreDriven`, `Transmission`, `FuelType`, `Stroke`, `EngineSize`, `Description`, `Details`, `Prize`, `UsedBikeImage1`, `UsedBikeImage2`, `UsedBikeImage3`, `UsedBikeImage4`, `UserName`, `ContactNumber`, `State`, `City`, `Location`, `PostalCode`, `Status`, `Date`) VALUES
	(1, 1, 'used', 'bajaj', 'ct100', '2008', 1200, 'manual', 'petrol', '4', '100', 'demo', 'demo', 10000, _binary 0x0101, _binary 0x010101, NULL, NULL, 'ram', '9998989898', 'tn', 'cbe', 'sitra', '14', '', '2018-04-21');
/*!40000 ALTER TABLE `usedbikes` ENABLE KEYS */;


-- Dumping structure for table bikezone.userregistration
CREATE TABLE IF NOT EXISTS `userregistration` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `MailId` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ConfirmPassword` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='register user details ';

-- Dumping data for table bikezone.userregistration: ~1 rows (approximately)
/*!40000 ALTER TABLE `userregistration` DISABLE KEYS */;
INSERT INTO `userregistration` (`UserId`, `UserName`, `MailId`, `PhoneNumber`, `State`, `City`, `Location`, `PostalCode`, `Password`, `ConfirmPassword`, `Status`, `Date`) VALUES
	(1, 'ram', 'ram', '355454', 'tamilnadu', 'coimbatore', 'sitra', '14', 'ram', 'ram', '', '2018-04-21');
/*!40000 ALTER TABLE `userregistration` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
