CREATE TABLE `referrers` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `ReferredId` varchar(45) NULL,
  `ReferredName` varchar(45) NOT NULL,
  `ReferredEmail` varchar(45) NOT NULL,
  `ReferrerId` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4