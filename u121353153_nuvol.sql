/*
SQLyog Community v12.4.1 (64 bit)
MySQL - 5.5.55-0ubuntu0.14.04.1 : Database - nuvola_prueba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ciudad` */

insert  into `ciudad`(`id`,`nombre`) values 
(1,'Barranquilla'),
(2,'Cartagena'),
(3,'Valledupar'),
(4,'Riohacha'),
(5,'Santa marta');

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` int(128) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Id_ciudad` int(3) NOT NULL,
  `Id_departamento` int(3) NOT NULL,
  `Id_pais` int(3) NOT NULL,
  PRIMARY KEY (`Id`,`Direccion`),
  KEY `Id_ciudad` (`Id_ciudad`),
  KEY `Id_departamento` (`Id_departamento`),
  KEY `Id_pais` (`Id_pais`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Id_ciudad`) REFERENCES `ciudad` (`id`),
  CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`Id_departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`Id_pais`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`Id`,`Cedula`,`Nombre`,`Apellidos`,`Direccion`,`Id_ciudad`,`Id_departamento`,`Id_pais`) values 
(1,123456777,'David','Martinez','Calle 2',2,2,1),
(10,2147483647,'Deivis','Bolivar','Calle 32 ',2,2,1),
(20,6654,'Jon','Doe','Calle 23',1,1,1),
(21,453323,'Ismael ','Rivera','Carrera 20 # 43 - 25',2,2,1);

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `departamento` */

insert  into `departamento`(`id`,`nombre`) values 
(1,'Atlántico'),
(2,'Bolivar'),
(3,'La guajira'),
(4,'Magdalena');

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`id`,`nombre`) values 
(1,'Colombia');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
