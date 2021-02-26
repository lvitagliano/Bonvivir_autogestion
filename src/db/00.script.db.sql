CREATE DATABASE IF NOT EXISTS autogestion;

USE autogestion;

CREATE TABLE `__EFMigrationsHistory` (
    `MigrationId` varchar(150) NOT NULL,
    `ProductVersion` varchar(32) NOT NULL,
    PRIMARY KEY (`MigrationId`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`Addresses` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Street` TEXT NULL DEFAULT NULL,
  `DoorNumber` TEXT NULL DEFAULT NULL,
  `Floor` TEXT NULL DEFAULT NULL,
  `Apartment` TEXT NULL DEFAULT NULL,
  `District` TEXT NULL DEFAULT NULL,
  `Zone` TEXT NULL DEFAULT NULL,
  `City` TEXT NULL DEFAULT NULL,
  `State` TEXT NULL DEFAULT NULL,
  `ZipCode` TEXT NULL DEFAULT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetRoles` (
  `Id` VARCHAR(767) NOT NULL,
  `Name` VARCHAR(256) NULL DEFAULT NULL,
  `NormalizedName` VARCHAR(256) NULL DEFAULT NULL,
  `ConcurrencyStamp` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetUsers` (
  `Id` VARCHAR(767) NOT NULL,
  `UserName` VARCHAR(256) NULL DEFAULT NULL,
  `NormalizedUserName` VARCHAR(256) NULL DEFAULT NULL,
  `Email` VARCHAR(256) NULL DEFAULT NULL,
  `NormalizedEmail` VARCHAR(256) NULL DEFAULT NULL,
  `EmailConfirmed` BIT(1) NOT NULL,
  `PasswordHash` TEXT NULL DEFAULT NULL,
  `SecurityStamp` TEXT NULL DEFAULT NULL,
  `ConcurrencyStamp` TEXT NULL DEFAULT NULL,
  `PhoneNumber` TEXT NULL DEFAULT NULL,
  `PhoneNumberConfirmed` BIT(1) NOT NULL,
  `TwoFactorEnabled` BIT(1) NOT NULL,
  `LockoutEnd` TIMESTAMP NULL DEFAULT NULL,
  `LockoutEnabled` BIT(1) NOT NULL,
  `AccessFailedCount` INT(11) NOT NULL,
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`Customers` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `BonvivirId` VARBINARY(16) NOT NULL,
  `FirstName` TEXT NULL DEFAULT NULL,
  `LastName` TEXT NULL DEFAULT NULL,
  `IdNumber` TEXT NULL DEFAULT NULL,
  `BirthDate` DATETIME NOT NULL,
  `Email` TEXT NULL DEFAULT NULL,
  `Address` TEXT NULL DEFAULT NULL,
  `BusinessUnit` TEXT NULL DEFAULT NULL,
  `Gender` TEXT NULL DEFAULT NULL,
  `IdType` TEXT NULL DEFAULT NULL,
  `Phone` TEXT NULL DEFAULT NULL,
  `TaxType` TEXT NULL DEFAULT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`Leads` (
  `Id` VARCHAR(767) NOT NULL,
  `FirstName` TEXT NULL DEFAULT NULL,
  `LastName` TEXT NULL DEFAULT NULL,
  `Email` TEXT NULL DEFAULT NULL,
  `PhoneNumber` TEXT NULL DEFAULT NULL,
  `MobileNumber` TEXT NULL DEFAULT NULL,
  `Campaign` VARBINARY(16) NOT NULL,
  `Subject` TEXT NULL DEFAULT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`Offers` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `CreatedDate` DATETIME NOT NULL,
  `ModifiedDate` DATETIME NULL DEFAULT NULL,
  `CreatedBy` TEXT NULL DEFAULT NULL,
  `ModifiedBy` TEXT NULL DEFAULT NULL,
  `Title` TEXT NOT NULL,
  `Description` TEXT NOT NULL,
  `IsOrganic` BIT(1) NOT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`Users` (
  `Id` VARCHAR(767) NOT NULL,
  `Username` TEXT NULL DEFAULT NULL,
  `Password` TEXT NULL DEFAULT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetRoleClaims` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `RoleId` VARCHAR(20) NOT NULL,
  `ClaimType` TEXT NULL DEFAULT NULL,
  `ClaimValue` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  CONSTRAINT `FK_AspNetRoleClaims_AspNetRoles_RoleId`
    FOREIGN KEY (`RoleId`)
    REFERENCES `autogestion`.`AspNetRoles` (`Id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetUserClaims` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `UserId` VARCHAR(20) NOT NULL,
  `ClaimType` TEXT NULL DEFAULT NULL,
  `ClaimValue` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  CONSTRAINT `FK_AspNetUserClaims_AspNetUsers_UserId`
    FOREIGN KEY (`UserId`)
    REFERENCES `autogestion`.`AspNetUsers` (`Id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetUserLogins` (
  `LoginProvider` VARCHAR(128) NOT NULL,
  `ProviderKey` VARCHAR(128) NOT NULL,
  `ProviderDisplayName` TEXT NULL DEFAULT NULL,
  `UserId` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`LoginProvider`, `ProviderKey`),
  CONSTRAINT `FK_AspNetUserLogins_AspNetUsers_UserId`
    FOREIGN KEY (`UserId`)
    REFERENCES `autogestion`.`AspNetUsers` (`Id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetUserRoles` (
  `UserId` VARCHAR(20) NOT NULL,
  `RoleId` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`UserId`, `RoleId`),
  CONSTRAINT `FK_AspNetUserRoles_AspNetRoles_RoleId`
    FOREIGN KEY (`RoleId`)
    REFERENCES `autogestion`.`AspNetRoles` (`Id`)
    ON DELETE CASCADE,
  CONSTRAINT `FK_AspNetUserRoles_AspNetUsers_UserId`
    FOREIGN KEY (`UserId`)
    REFERENCES `autogestion`.`AspNetUsers` (`Id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `autogestion`.`AspNetUserTokens` (
  `UserId` VARCHAR(20) NOT NULL,
  `LoginProvider` VARCHAR(128) NOT NULL,
  `Name` VARCHAR(128) NOT NULL,
  `Value` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`UserId`, `LoginProvider`, `Name`),
  CONSTRAINT `FK_AspNetUserTokens_AspNetUsers_UserId`
    FOREIGN KEY (`UserId`)
    REFERENCES `autogestion`.`AspNetUsers` (`Id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `autogestion`.`Subscriptions` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` TEXT NULL DEFAULT NULL,
  `PromotionId` VARBINARY(16) NOT NULL,
  `SchemaId` VARBINARY(16) NOT NULL,
  `CustomerId` INT(11) NULL DEFAULT NULL,
  `PaymentMethodId` VARBINARY(16) NOT NULL,
  `ExternalId` TEXT NULL DEFAULT NULL,
  `AddressId` INT(11) NULL DEFAULT NULL,
  `CreditCard` TEXT NULL DEFAULT NULL,
  `ClubLaNacionCard` TEXT NULL DEFAULT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `ErrorCode` TEXT NULL DEFAULT NULL,
  `ErrorMessage` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  CONSTRAINT `FK_Subscriptions_Addresses_AddressId`
    FOREIGN KEY (`AddressId`)
    REFERENCES `autogestion`.`Addresses` (`Id`),
  CONSTRAINT `FK_Subscriptions_Customers_CustomerId`
    FOREIGN KEY (`CustomerId`)
    REFERENCES `autogestion`.`Customers` (`Id`)
);

CREATE TABLE IF NOT EXISTS `autogestion`.`OfferItems` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `OfferId` INT(11) NOT NULL,
  `Selection` INT(11) NOT NULL,
  `Title` TEXT NULL DEFAULT NULL,
  `Description` TEXT NULL DEFAULT NULL,
  `DesktopImage` MEDIUMBLOB NOT NULL,
  `MobileImage` MEDIUMBLOB NOT NULL,
  `BasePriceId` VARBINARY(16) NOT NULL,
  `BasePrice` DECIMAL(18,2) NOT NULL,
  `ClubLaNacionId` VARBINARY(16) NOT NULL,
  `ClubLaNacionPrice` DECIMAL(18,2) NOT NULL,
  `TierraDelFuegoId` VARBINARY(16) NOT NULL,
  `TierraDelFuegoPrice` DECIMAL(18,2) NOT NULL,
  `SchemaId` VARBINARY(16) NOT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  `UpdatedAt` DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
  PRIMARY KEY (`Id`),
  CONSTRAINT `FK_OfferItems_Offers_OfferId`
    FOREIGN KEY (`OfferId`)
    REFERENCES `autogestion`.`Offers` (`Id`)
    ON DELETE CASCADE
);

CREATE INDEX `IX_AspNetRoleClaims_RoleId` ON `AspNetRoleClaims` (`RoleId`);

CREATE UNIQUE INDEX `RoleNameIndex` ON `AspNetRoles` (`NormalizedName`);

CREATE INDEX `IX_AspNetUserClaims_UserId` ON `AspNetUserClaims` (`UserId`);

CREATE INDEX `IX_AspNetUserLogins_UserId` ON `AspNetUserLogins` (`UserId`);

CREATE INDEX `IX_AspNetUserRoles_RoleId` ON `AspNetUserRoles` (`RoleId`);

CREATE INDEX `EmailIndex` ON `AspNetUsers` (`NormalizedEmail`);

CREATE UNIQUE INDEX `UserNameIndex` ON `AspNetUsers` (`NormalizedUserName`);

CREATE INDEX `IX_OfferItems_OfferId` ON `OfferItems` (`OfferId`);

CREATE INDEX `IX_Subscriptions_AddressId` ON `Subscriptions` (`AddressId`);

CREATE INDEX `IX_Subscriptions_CustomerId` ON `Subscriptions` (`CustomerId`);

INSERT INTO `Users` (`Id`, `Password`, `Username`)
VALUES ('1', 'sQDDb3f8Y7iB4OsAYCtSnMFWTxu7/Drq4iaUpVXbqwo=', 'admin');

INSERT INTO `__EFMigrationsHistory` (`MigrationId`, `ProductVersion`)
VALUES ('20200406_InitialMySql', '2.2.6-servicing-10079');