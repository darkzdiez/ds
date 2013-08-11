-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-06-2013 a las 09:05:22
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ordenes`
--
CREATE DATABASE `ordenes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ordenes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_accion`
--

CREATE TABLE IF NOT EXISTS `app_accion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `app_accion`
--

INSERT INTO `app_accion` (`id`, `nombre`, `id_modulo`) VALUES
(1, 'INCLUIR ORDEN', 1),
(2, 'MODIFICAR ORDEN', 1),
(3, 'COLSULTAR ORDEN', 1),
(4, 'ELIMINAR ORDEN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_aplicacion`
--

CREATE TABLE IF NOT EXISTS `app_aplicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `app_aplicacion`
--

INSERT INTO `app_aplicacion` (`id`, `nombre`, `id_proyecto`) VALUES
(1, 'principal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_grupo`
--

CREATE TABLE IF NOT EXISTS `app_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_grupo_accion`
--

CREATE TABLE IF NOT EXISTS `app_grupo_accion` (
  `id_grupo` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_grupo_user`
--

CREATE TABLE IF NOT EXISTS `app_grupo_user` (
  `id_grupo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_modulo`
--

CREATE TABLE IF NOT EXISTS `app_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `app_modulo`
--

INSERT INTO `app_modulo` (`id`, `nombre`, `id_aplicacion`) VALUES
(1, 'Ordenes', 1),
(2, 'Novedad', 1),
(3, 'Observación', 1),
(4, 'Supervisión', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_proyecto`
--

CREATE TABLE IF NOT EXISTS `app_proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `app_proyecto`
--

INSERT INTO `app_proyecto` (`id`, `nombre`) VALUES
(1, 'ordenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_user`
--

CREATE TABLE IF NOT EXISTS `app_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `nombres` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `id_instituto` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `app_user`
--

INSERT INTO `app_user` (`iduser`, `login`, `nombres`, `password`, `id_instituto`, `role`) VALUES
(1, 'adiez', 'ALFONZO DIEZ', 'e4fb0b81fb19da1f98135dd26b7c1d881abfcd6f349c8508f9ef9135914ee26a', 1, 1),
(2, 'wlinarez', 'Wilmar', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 1, 2),
(4, 'user1', 'user1', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 1, 1),
(5, 'user2', 'user2', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 1, 2),
(6, 'user3', 'user3', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 1, 3),
(7, 'jmendoza', 'JUAN MENDOZA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_user_accion`
--

CREATE TABLE IF NOT EXISTS `app_user_accion` (
  `id_user` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoreporte`
--

CREATE TABLE IF NOT EXISTS `archivoreporte` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_reporte` int(11) NOT NULL,
  `ruta_archivo` text NOT NULL,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institutos`
--

CREATE TABLE IF NOT EXISTS `institutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `institutos`
--

INSERT INTO `institutos` (`id`, `nombre`) VALUES
(1, 'DIR. INFORMATICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE IF NOT EXISTS `novedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` longtext NOT NULL,
  `fecha` datetime NOT NULL,
  `idorden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`id`, `texto`, `fecha`, `idorden`) VALUES
(2, '<p>kjdfhksdjfhskdjfhsdfsdf</p>', '2013-06-21 00:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE IF NOT EXISTS `observacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` longtext NOT NULL,
  `fecha` datetime NOT NULL,
  `idorden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `observacion`
--

INSERT INTO `observacion` (`id`, `texto`, `fecha`, `idorden`) VALUES
(1, '<p>Primera Observacion</p>', '2013-06-21 00:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE IF NOT EXISTS `orden` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_emite` int(11) NOT NULL,
  `id_usuario_recibe` int(11) NOT NULL,
  `referencia` varchar(300) NOT NULL,
  `asunto` text NOT NULL,
  `descripcion` text NOT NULL,
  `plazo` int(11) NOT NULL,
  `medio` int(11) NOT NULL,
  `oficio` text NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_usuario_emite`, `id_usuario_recibe`, `referencia`, `asunto`, `descripcion`, `plazo`, `medio`, `oficio`, `fecha_emision`, `estatus`) VALUES
(6, 1, 1, 'Dierwer1||', 'tyftis', 'quy', 60, 1, 'ert2343wer', '2013-06-10 00:00:00', 0),
(7, 1, 1, '', 'Sistema de Ordenes', 'Sistema de Ordenes', 30, 1, '', '2013-06-12 00:00:00', 0),
(8, 1, 2, '', 'Sicopol', 'Terminar Reporte de Novedades', 20, 1, '', '2013-06-19 00:00:00', 0),
(9, 1, 6, 'holsugjyf', 'jf', 'f', 23, 1, 'fhj', '2013-06-20 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervision`
--

CREATE TABLE IF NOT EXISTS `supervision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` longtext NOT NULL,
  `fecha` datetime NOT NULL,
  `idorden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `supervision`
--

INSERT INTO `supervision` (`id`, `texto`, `fecha`, `idorden`) VALUES
(2, '<p>primera supervision</p>', '2013-06-21 00:00:00', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
