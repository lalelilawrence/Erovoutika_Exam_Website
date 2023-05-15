-- Hostname: 127.0.0.1
-- Port: 3306
-- Username: root
-- Password: 
-- Database name: examwebsite-db
DROP DATABASE IF EXISTS `examwebsite-db`;
CREATE DATABASE IF NOT EXISTS `examwebsite-db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `examwebsite-db`;
-- ==================================================================tbusers
DROP TABLE IF EXISTS `tbusers`;
CREATE TABLE `tbusers` (
	`clUrID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, -- PK
	`clUrFirstname` varchar(25) NOT NULL, 
	`clUrLastname` varchar(25) NOT NULL, 
	`clUrUsername` varchar(25) NOT NULL, 
	`clUrPassword` text NOT NULL, 
	`clUrLevel` tinyint(1) NOT NULL DEFAULT '1', 
	`clUrdate_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	`clUrcontact_num` varchar(12) DEFAULT NULL, 
	`clUremail` varchar(45) DEFAULT NULL, 
	`clUraddress` varchar(45) DEFAULT NULL, 
	`clUrStatus` int NOT NULL DEFAULT '1', 
	`clUrDateDeleted` datetime DEFAULT NULL, 
	PRIMARY KEY (`clUrID`),
	`clUrLastlogin` datetime NOT NULL DEFAULT current_timestamp(),
  	`clUrPhoto` varchar(255) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
LOCK TABLES `tbusers` WRITE;
INSERT INTO `tbusers` (`clUrID`,`clUrFirstname`,`clUrLastname`,`clUrUsername`,`clUrPassword`,`clUrLevel`,`clUrdate_added`,`clUrcontact_num`,`clUremail`,`clUraddress`,`clUrStatus`,`clUrDateDeleted`,`clUrLastlogin`,`clUrPhoto`) 
	VALUES (1,'Admin','Test','admintest','admin',0,'2022-09-16 09:56:22','09990009999','admintest@test.com','admin city',1,NULL,'2022-09-16 09:56:22',NULL), 
		(2,'Client','Test','clienttest','client',1,'2022-09-16 09:56:22','09900000001','clienttest@test.com','client city',2,NULL,'2022-09-16 09:56:22',NULL), 
		(3,'Keith','Test','KeithTest','client',1,'2022-10-04 15:48:12','09900000002','keithtest@test.com','client city',1,NULL,'2022-09-16 09:56:22',NULL), 
		(4,'Ken','Test','KenTest','client',1,'2022-10-04 15:49:27','09900000003','kentest@test.com','client city',1,NULL,'2022-09-16 09:56:22',NULL), 
		(5,'Jhonny','Admin','jhonnyAdmin','admin',0,'2022-10-04 15:49:27','09990009998','jhonnytest@test.com','admin city',1,NULL,'2022-09-16 09:56:22',NULL),
		(6,'Angelica','Santos','ANGELICA123','ANGELICA123',0,'2023-03-09 12:43:27','09123456789','angge@test.com','PASIG CITY',1,NULL,'2023-03-09 14:05:22','6_Untitleddesign.png');
UNLOCK TABLES;
-- ==================================================================tbExam
DROP TABLE IF EXISTS `tbExam`;
CREATE TABLE `tbExam` (
	`clExID` int(9) UNSIGNED NOT NULL, -- PK
	`clExName` varchar(500) NOT NULL, 
	`clExDescription` varchar(2000) NOT NULL, 
	`clExInstructions` varchar(3000) NOT NULL, 
	`clExPublish` int(1) UNSIGNED NOT NULL, -- 0 = Not Published; 1 = Published
	`clExLastEditedBy` int(9) UNSIGNED NOT NULL, 
	`clExPublishedBy` int(9) UNSIGNED DEFAULT NULL, 
	`clExLastEditDate` datetime not null default now(),
	`clExPublishedDate` datetime,
	`clExPrice` float(9,2) NOT NULL,
    PRIMARY KEY (`clExID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbQuestion
DROP TABLE IF EXISTS `tbQuestion`;
CREATE TABLE `tbQuestion` (
	`clQsID` int(9) UNSIGNED NOT NULL, -- PK
	`clExID` int(9) UNSIGNED NOT NULL, -- FK to `tbExam` PK;
	`clQsBody` varchar(3000) NOT NULL, 
	`clQsType` int(1) UNSIGNED NOT NULL, -- 0 = Fill in the Blanks; 1 = Hybrid Multiple Choice
	`clQsCorrectAnswer` varchar(7000) NOT NULL, 
    PRIMARY KEY (`clQsID`,`clExID`), 
    CONSTRAINT `fkQs_clExID` FOREIGN KEY (`clExID`) REFERENCES `tbExam` (`clExID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbAnswer
DROP TABLE IF EXISTS `tbAnswer`;
CREATE TABLE `tbAnswer` (
	`clAsID` int(9) UNSIGNED NOT NULL, -- PK
	`clQsID` int(9) UNSIGNED NOT NULL, -- FK to `tbQuestion` PK; PK
	`clAsBody` varchar(3000) NOT NULL, 
    PRIMARY KEY (`clAsID`,`clQsID`), 
    CONSTRAINT `fkAs_clQsID` FOREIGN KEY (`clQsID`) REFERENCES `tbQuestion` (`clQsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbuserexam
DROP TABLE IF EXISTS `tbuserexam`;
CREATE TABLE `tbuserexam` (
	`clUeID` int(9) UNSIGNED NOT NULL, -- PK
	`clUrID` int(9) UNSIGNED NOT NULL, -- FK to `tbusers` PK;
	`clExID` int(9) UNSIGNED NOT NULL, -- FK to `tbExam` PK;
    PRIMARY KEY (`clUeID`), 
    CONSTRAINT `fkUe_clUrID` FOREIGN KEY (`clUrID`) REFERENCES `tbusers` (`clUrID`), 
    CONSTRAINT `fkUe_clExID` FOREIGN KEY (`clExID`) REFERENCES `tbExam` (`clExID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbuseranswer
DROP TABLE IF EXISTS `tbuseranswer`;
CREATE TABLE `tbuseranswer` (
	`clUeID` int(9) UNSIGNED NOT NULL, -- FK to `tbuserexam` PK;
	`clUaQuestionID` int(9) UNSIGNED NOT NULL, -- PK
	`clUaAnswer` varchar(7000) NOT NULL, 
    PRIMARY KEY (`clUeID`,`clUaQuestionID`), 
    CONSTRAINT `fkUa_clUeID` FOREIGN KEY (`clUeID`) REFERENCES `tbuserexam` (`clUeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbuserexamresult
DROP TABLE IF EXISTS `tbuserexamresult`;
CREATE TABLE `tbuserexamresult` (
	`clExID` int(9) UNSIGNED NOT NULL, -- FK to `tbexam` PK;
	`clUrID` int(9) UNSIGNED NOT NULL, -- FK to `tbusers` PK;
	`clUrScore` int,
	`clUrExTakenDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    CONSTRAINT `fkUa_clExID` FOREIGN KEY (`clExID`) REFERENCES `tbExam` (`clExID`),
	CONSTRAINT `fkUa_clUrID` FOREIGN KEY (`clUrID`) REFERENCES `tbusers` (`clUrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbuserpaidexam
DROP TABLE IF EXISTS `tbuserpaidexam`;
CREATE TABLE `tbuserpaidexam` (
	`ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, -- PK
	`clUrID` int(9) UNSIGNED NOT NULL, -- FK to `tbusers` PK;
	`clExID` int(9) UNSIGNED NOT NULL, -- FK to `tbexam` PK;
	`clPurchasedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`ID`),
	CONSTRAINT `fkQs_clUrID` FOREIGN KEY (`clUrID`) REFERENCES `tbusers` (`clUrID`),
	FOREIGN KEY (`clExID`) REFERENCES `tbexam` (`clExID`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ==================================================================tbtransaction
DROP TABLE IF EXISTS `tbtransaction`;
CREATE TABLE `tbtransaction` (
	`ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, -- PK
	`transactionID` varchar(99) NOT NULL,
	`ExID` int(9) UNSIGNED NOT NULL, -- FK to `tbexam`
	`transactionUserID` int(9) UNSIGNED NOT NULL, -- FK to `tbusers`
	`transactionMthd` varchar(99) NOT NULL,
	`transactionAmt` float(9,2) NOT NULL,
	`transactionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`transactionStat` varchar(99) NOT NULL,
    PRIMARY KEY (`ID`),
	FOREIGN KEY (`ExID`) REFERENCES `tbExam` (`clExID`),
	CONSTRAINT `fkUa_transactionUserID` FOREIGN KEY (`transactionUserID`) REFERENCES `tbusers` (`clUrID`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- =======================================================a===========