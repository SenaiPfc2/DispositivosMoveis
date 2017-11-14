# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2017-11-14 02:29:37
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tbusuarios"
#

DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE `tbusuarios` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `NomeUser` varchar(70) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Senha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tbusuarios"
#

INSERT INTO `tbusuarios` VALUES (6,'teste 11','teste1@gmail.com','1234'),(7,'Cris Stef','cris.stef28@gmail.com','123456');
