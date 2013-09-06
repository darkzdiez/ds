-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-09-2013 a las 10:37:57
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sitioweb`
--

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`idprofile`, `name`, `description`, `status`) VALUES
(1, 'Owner', 'Super Administrador', 0),
(2, 'Ccontrataciones', 'Comision de contrataciones', 0),
(3, 'Prensa', '', 0);

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `nameuser`, `password`, `role`, `creation`) VALUES
(1, 'root', 'e97e5442e32cd1554f9a1963a7ef6d9e9b0fc8364bf7932cc2ef86771f2d50f2', 'owner', NULL),
(2, 'prensa', '123456', 'owner', NULL),
(3, 'carlaalvarez', 'madrebella', 'owner', '2012-09-04 16:07:46'),
(5, 'hcolmenarez', 'carlosg', 'owner', '2012-09-05 11:30:12'),
(6, 'maryochoa', 'amoradios', 'owner', '2012-09-05 11:31:42'),
(7, 'Natt yc', '1709', '', '2012-09-28 07:42:58'),
(8, 'luimarysequera', '2511', '', '2013-03-04 08:25:00'),
(9, 'Carolina', '0501', '', '2013-04-08 07:51:45'),
(10, 'MarianYovera', '2507', '', '2013-07-05 13:08:52');

--
-- Volcado de datos para la tabla `user_has_profile`
--

INSERT INTO `user_has_profile` (`user_iduser`, `profile_idprofile`) VALUES
(1, 1),
(1, 2),
(1, 3);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
