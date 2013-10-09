-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-10-2013 a las 16:32:02
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sitioweb5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `summary` text COMMENT 'Entrada de la noticia',
  `content` longtext COMMENT 'Cuerpo de la notica',
  `date` datetime DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `main_idfile` int(11) DEFAULT NULL,
  `position_images` varchar(3) DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  `prominent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idarticle`),
  KEY `fk_article_user1` (`user_iduser`),
  KEY `fk_article_file1` (`main_idfile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8419 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_has_category`
--

CREATE TABLE IF NOT EXISTS `article_has_category` (
  `article_idarticle` int(11) NOT NULL,
  `category_idcategory` int(11) NOT NULL,
  KEY `fk_article_has_category_category1` (`category_idcategory`),
  KEY `fk_article_has_category_article1` (`article_idarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_has_file`
--

CREATE TABLE IF NOT EXISTS `article_has_file` (
  `article_idarticle` int(11) NOT NULL,
  `file_idfile` int(11) NOT NULL,
  KEY `fk_article_has_file_file1` (`file_idfile`),
  KEY `fk_article_has_file_article1` (`article_idarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_accesorio`
--

CREATE TABLE IF NOT EXISTS `bien_accesorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_computador`
--

CREATE TABLE IF NOT EXISTS `bien_computador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `nombre_red` varchar(100) NOT NULL,
  `internet` int(11) NOT NULL,
  `red` int(11) NOT NULL,
  `antivirus` int(11) NOT NULL,
  `procesador` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `harddisc` int(11) NOT NULL,
  `bien_dependencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_computador_has_accesorio`
--

CREATE TABLE IF NOT EXISTS `bien_computador_has_accesorio` (
  `bien_computador_id` int(11) NOT NULL,
  `bien_accesorio_id` int(11) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `serial` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_computador_has_sistema_operativo`
--

CREATE TABLE IF NOT EXISTS `bien_computador_has_sistema_operativo` (
  `bien_computador_id` int(11) NOT NULL,
  `sistema_operativo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_dependencia`
--

CREATE TABLE IF NOT EXISTS `bien_dependencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `idparent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_impresora`
--

CREATE TABLE IF NOT EXISTS `bien_impresora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serial` int(11) NOT NULL,
  `bien_impresora_tipo_id` int(11) NOT NULL,
  `bien_dependencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_impresora_consumible`
--

CREATE TABLE IF NOT EXISTS `bien_impresora_consumible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_impresora_has_consumible`
--

CREATE TABLE IF NOT EXISTS `bien_impresora_has_consumible` (
  `bien_impresora_id` int(11) NOT NULL,
  `bien_impresora_consumible_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_impresora_tipo`
--

CREATE TABLE IF NOT EXISTS `bien_impresora_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_red`
--

CREATE TABLE IF NOT EXISTS `bien_red` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `inalambrico` int(11) NOT NULL,
  `puertos` int(11) NOT NULL,
  `observacion` mediumtext NOT NULL,
  `bien_dependencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `idparent_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcategory`),
  KEY `fk_categoria_categoria1` (`idparent_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=277 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ccontrataciones`
--

CREATE TABLE IF NOT EXISTS `ccontrataciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `articulo` text NOT NULL,
  `denominacion` varchar(255) NOT NULL,
  `actividad` varchar(255) NOT NULL,
  `ente` varchar(255) NOT NULL,
  `pfechad` varchar(255) NOT NULL,
  `pfechah` varchar(255) NOT NULL,
  `phorario` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `lugar` text NOT NULL,
  `costo` varchar(255) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `tcuenta` varchar(255) NOT NULL,
  `ncuenta` varchar(255) NOT NULL,
  `benificiario` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `afechad` varchar(255) NOT NULL,
  `afechah` varchar(255) NOT NULL,
  `ahorario` varchar(255) NOT NULL,
  `rfechad` varchar(255) NOT NULL,
  `rhora` varchar(255) NOT NULL,
  `efecha` varchar(255) NOT NULL,
  `ehora` varchar(255) NOT NULL,
  `lugarsobres` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE IF NOT EXISTS `centro` (
  `centro_nuevo` int(11) NOT NULL,
  `nombre_centro` varchar(32) NOT NULL,
  `votos` int(11) NOT NULL,
  `votos_chavez` int(11) NOT NULL,
  PRIMARY KEY (`centro_nuevo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cne`
--

CREATE TABLE IF NOT EXISTS `cne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `cedula` int(12) NOT NULL DEFAULT '0',
  `nombre` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `telefono` varchar(11) CHARACTER SET utf8 NOT NULL,
  `fecha_nac` int(5) DEFAULT NULL,
  `centro_viejo` int(5) DEFAULT NULL,
  `centro_nuevo` int(9) DEFAULT NULL,
  `nombre_centro` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `direccion_centro` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `cod_estado` int(2) DEFAULT NULL,
  `estado` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cod_municipio` int(1) DEFAULT NULL,
  `municipio` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cod_parroquia` int(1) DEFAULT NULL,
  `cod_parroquia_unique` int(11) NOT NULL,
  `cod_parroquia2` int(1) DEFAULT NULL,
  `parroquia` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cedula_numerica` int(12) DEFAULT NULL,
  `psuv` int(11) NOT NULL,
  `patrulla1x10_responsable` int(11) NOT NULL,
  `patrulla1x10_miembro` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula` (`cedula`),
  KEY `centro_nuevo` (`centro_nuevo`),
  KEY `cod_municipio` (`cod_municipio`),
  KEY `cod_parroquia` (`cod_parroquia2`),
  KEY `cod_parroquia_2` (`cod_parroquia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idcomment` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(14) NOT NULL,
  `comment` mediumtext,
  `date` datetime DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `article_idarticle` int(11) NOT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `fk_comentario_noticia1` (`article_idarticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50021 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controller`
--

CREATE TABLE IF NOT EXISTS `controller` (
  `idcontroller` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idcontroller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cover_ad`
--

CREATE TABLE IF NOT EXISTS `cover_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toptitle` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `file_idfile` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `idarticle` int(11) DEFAULT NULL,
  `dtexto` int(1) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idarticle` (`idarticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio_grupo`
--

CREATE TABLE IF NOT EXISTS `directorio_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio_persona`
--

CREATE TABLE IF NOT EXISTS `directorio_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `twitter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directory`
--

CREATE TABLE IF NOT EXISTS `directory` (
  `iddirectory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`iddirectory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directory_department`
--

CREATE TABLE IF NOT EXISTS `directory_department` (
  `iddirectory_department` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `iddirectory` int(11) NOT NULL,
  PRIMARY KEY (`iddirectory_department`),
  KEY `iddirectory` (`iddirectory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directory_office`
--

CREATE TABLE IF NOT EXISTS `directory_office` (
  `iddirectory_office` int(11) NOT NULL AUTO_INCREMENT,
  `office` varchar(200) NOT NULL,
  `attendant` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `iddirectory_department` int(11) NOT NULL,
  PRIMARY KEY (`iddirectory_office`),
  KEY `iddirectory_department` (`iddirectory_department`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `idfile` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_location_idfile_location` int(11) NOT NULL,
  `file_type_idfile_type` int(11) NOT NULL,
  `mark` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idfile`),
  KEY `fk_image_image_location1` (`file_location_idfile_location`),
  KEY `fk_file_file_type1` (`file_type_idfile_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10690 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_gallery`
--

CREATE TABLE IF NOT EXISTS `file_gallery` (
  `idfile_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_location_idfile_location` int(11) NOT NULL,
  `file_type_idfile_type` int(11) NOT NULL,
  PRIMARY KEY (`idfile_gallery`),
  KEY `fk_image_image_location1` (`file_location_idfile_location`),
  KEY `fk_file_file_type1` (`file_type_idfile_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_location`
--

CREATE TABLE IF NOT EXISTS `file_location` (
  `idfile_location` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfile_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_type`
--

CREATE TABLE IF NOT EXISTS `file_type` (
  `idfile_type` int(11) NOT NULL AUTO_INCREMENT,
  `mime_type` varchar(45) DEFAULT NULL,
  `extencion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfile_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `idgallery` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idgallery`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_has_file`
--

CREATE TABLE IF NOT EXISTS `gallery_has_file` (
  `idgallery` int(11) NOT NULL,
  `idfile` int(11) NOT NULL,
  `type` varchar(4) NOT NULL,
  KEY `fk_gallery_has_file_1_idx` (`idgallery`),
  KEY `fk_gallery_has_file_2_idx` (`idfile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listar-coverad_article`
--
CREATE TABLE IF NOT EXISTS `listar-coverad_article` (
`idcover` int(11)
,`titlecover` varchar(250)
,`file_idfile` int(11)
,`dtexto` int(1)
,`idarticle` int(11)
,`titlearticle` varchar(255)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logbook`
--

CREATE TABLE IF NOT EXISTS `logbook` (
  `idlogbook` int(11) NOT NULL AUTO_INCREMENT,
  `user_iduser` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `tipe` varchar(45) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idlogbook`),
  KEY `fk_logbook_user1` (`user_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `method`
--

CREATE TABLE IF NOT EXISTS `method` (
  `idmethod` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `idcontroller` int(11) NOT NULL,
  PRIMARY KEY (`idmethod`),
  KEY `idcontroller` (`idcontroller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idprofile` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idprofile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_has_method`
--

CREATE TABLE IF NOT EXISTS `profile_has_method` (
  `idprofile` int(11) NOT NULL,
  `idmethod` int(11) NOT NULL,
  KEY `idprofile` (`idprofile`),
  KEY `idmethod` (`idmethod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemas_institucion`
--

CREATE TABLE IF NOT EXISTS `sistemas_institucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_operativo`
--

CREATE TABLE IF NOT EXISTS `sistema_operativo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `idparent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nameuser` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `creation` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_profile`
--

CREATE TABLE IF NOT EXISTS `user_has_profile` (
  `user_iduser` int(11) NOT NULL,
  `profile_idprofile` int(11) NOT NULL,
  KEY `fk_user_has_profile_profile1` (`profile_idprofile`),
  KEY `fk_user_has_profile_user1` (`user_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videoyoutube`
--

CREATE TABLE IF NOT EXISTS `videoyoutube` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idyoutube` varchar(200) NOT NULL,
  `idvideoyoutubegrupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videoyoutubegrupo`
--

CREATE TABLE IF NOT EXISTS `videoyoutubegrupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `listar-coverad_article`
--
DROP TABLE IF EXISTS `listar-coverad_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar-coverad_article` AS (select `cover_ad`.`id` AS `idcover`,`cover_ad`.`title` AS `titlecover`,`cover_ad`.`file_idfile` AS `file_idfile`,`cover_ad`.`dtexto` AS `dtexto`,`cover_ad`.`idarticle` AS `idarticle`,`article`.`title` AS `titlearticle` from (`cover_ad` left join `article` on((`cover_ad`.`idarticle` = `article`.`idarticle`))) where (`cover_ad`.`status` = 1) order by `cover_ad`.`id` desc limit 0,10);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cover_ad`
--
ALTER TABLE `cover_ad`
  ADD CONSTRAINT `cover_ad_ibfk_2` FOREIGN KEY (`idarticle`) REFERENCES `article` (`idarticle`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `file_gallery`
--
ALTER TABLE `file_gallery`
  ADD CONSTRAINT `file_gallery_ibfk_1` FOREIGN KEY (`idfile_gallery`) REFERENCES `gallery_has_file` (`idfile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gallery_has_file`
--
ALTER TABLE `gallery_has_file`
  ADD CONSTRAINT `gallery_has_file_ibfk_4` FOREIGN KEY (`idgallery`) REFERENCES `gallery` (`idgallery`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_has_file_ibfk_5` FOREIGN KEY (`idfile`) REFERENCES `file_gallery` (`idfile_gallery`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
