-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cadenas_categoria`;
CREATE TABLE `cadenas_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cadena` varchar(255) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_id` (`categorias_id`),
  CONSTRAINT `cadenas_categoria_ibfk_1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(255) NOT NULL,
  `conceptoAmpliado` text NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `fechaCtble` date NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_id` (`categorias_id`),
  CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20200729070735,	'CreateCategoriasTable',	'2020-07-29 07:11:12',	'2020-07-29 07:11:13',	0),
(20200729071051,	'CreateMovimientosTable',	'2020-07-29 07:11:13',	'2020-07-29 07:11:14',	0),
(20200729074421,	'CreateCadenascategoriaTable',	'2020-07-29 07:11:14',	'2020-07-29 07:11:15',	0),
(20200729092657,	'CreateCategoriasTable',	'2020-07-29 07:30:38',	'2020-07-29 07:30:38',	0),
(20200729092713,	'CreateCadenascategoriaTable',	'2020-07-29 07:30:38',	'2020-07-29 07:30:39',	0),
(20200729092742,	'CreateMovimientosTable',	'2020-07-29 07:30:39',	'2020-07-29 07:30:40',	0);

-- 2020-08-02 12:22:32
