CREATE DATABASE IF NOT EXISTS `prenetics`;

USE `prenetics`;

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL primary key AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `apiGenerator` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `policyCode` varchar(100) DEFAULT NULL,
  `physicianName` varchar(100) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL
);


SELECT * FROM `users`;

