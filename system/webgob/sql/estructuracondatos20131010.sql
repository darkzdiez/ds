-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2013 a las 11:05:15
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
  KEY `main_idfile` (`main_idfile`),
  KEY `user_iduser` (`user_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_has_category`
--

CREATE TABLE IF NOT EXISTS `article_has_category` (
  `article_idarticle` int(11) NOT NULL,
  `category_idcategory` int(11) NOT NULL,
  KEY `article_idarticle` (`article_idarticle`),
  KEY `category_idcategory` (`category_idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_has_file`
--

CREATE TABLE IF NOT EXISTS `article_has_file` (
  `article_idarticle` int(11) NOT NULL,
  `file_idfile` int(11) NOT NULL,
  KEY `article_idarticle` (`article_idarticle`),
  KEY `file_idfile` (`file_idfile`)
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

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`idcategory`, `name`, `description`, `idparent_category`) VALUES
(1, 'news', NULL, NULL),
(2, 'information', NULL, NULL),
(3, 'other', NULL, NULL),
(4, 'tipe', NULL, 1),
(5, 'location', NULL, 1),
(6, 'deporte', NULL, 4),
(7, 'tecnología', NULL, 4),
(8, 'cultura', NULL, 4),
(9, 'salud', NULL, 4),
(10, 'educación', NULL, 4),
(11, 'turismo', NULL, 4),
(12, 'politica', NULL, 1),
(13, 'seguridad', NULL, 4),
(14, 'regional', NULL, 5),
(15, 'nacionales', NULL, 5),
(16, 'internacionales', NULL, 5),
(17, 'instituciones', NULL, 2),
(18, 'misiones', NULL, 2),
(19, 'secretarias', NULL, 2),
(20, 'tecnologia', NULL, 2),
(21, 'yaracuy', NULL, 2),
(22, 'gobernacion', NULL, 2),
(23, 'legislacion', NULL, 2),
(24, 'galeria', NULL, NULL),
(25, 'fotografia', NULL, 24),
(26, 'video', NULL, 24),
(27, 'audio', NULL, 24),
(28, 'gestion', NULL, 2),
(29, 'Comision de Contrataciones', NULL, 3),
(30, 'obras', NULL, 4),
(33, 'Represas del Estado', NULL, 1),
(34, 'Yaracuy', NULL, 1),
(36, 'Contáctenos', NULL, 1),
(40, 'Software Libre', NULL, 1),
(42, 'Historia', NULL, 1),
(45, 'Simbolos', NULL, 1),
(47, 'Geografia', NULL, 1),
(48, 'Entes Descentralizados', NULL, 1),
(67, 'Concientización Ciudadana', NULL, 1),
(70, 'Misiones', NULL, 1),
(71, 'Constitución Bolivariana', NULL, 1),
(72, 'Cultura', NULL, 1),
(73, 'Turismo', NULL, 1),
(74, 'Deporte', NULL, 1),
(75, 'Economía', NULL, 1),
(76, 'Ubicación Geográfica', NULL, 1),
(78, 'Sitio Web Gobernacion del Estado Yaracuy', NULL, 1),
(80, 'Noticias Nacionales', NULL, 1),
(81, 'Correo Institucional', NULL, 1),
(82, 'Rehabilitación de Vialidad en Veroes', NULL, 1),
(83, 'Descripción Tecnológica del Sitio Web', NULL, 1),
(84, 'Proyectos en Yaracuy', NULL, 1),
(86, 'Sugerencias a Nuestra Web', NULL, 1),
(87, 'Links', NULL, 1),
(88, 'Asistencia Jurídica', NULL, 1),
(89, 'Cadivi', NULL, 1),
(90, 'Certificado Antecedentes Penales', NULL, 1),
(91, 'Certificado de Salud', NULL, 1),
(92, 'Ipostel', NULL, 1),
(93, 'Onidex', NULL, 1),
(94, 'Partida de Nacimiento', NULL, 1),
(95, 'Registro Principal', NULL, 1),
(96, 'R.I.F', NULL, 1),
(97, 'Cantv', NULL, 1),
(98, 'Movilnet', NULL, 1),
(99, 'Galería de Imágenes', NULL, 1),
(100, 'correos', NULL, 1),
(101, 'Suscripciones Informativas', NULL, 1),
(102, 'Actualizacion Datos', NULL, 1),
(103, 'Municipios', NULL, 1),
(104, 'codigo', NULL, 1),
(105, 'Universidades', NULL, 1),
(109, 'Tránsito Terrestre', NULL, 1),
(110, 'Hugo Chávez Frías', NULL, 1),
(111, 'Rindiendo Cuentas', NULL, 1),
(113, 'Comisión de Contrataciones', NULL, 1),
(114, 'CNE', NULL, 1),
(119, 'Ayudas', NULL, 1),
(122, 'Ley de Timbres Fiscales', NULL, 1),
(123, 'Poder Comunal', NULL, 1),
(124, 'Ley orgánica del Consejo Federal del Gobiern', NULL, 1),
(125, 'Desarrollo de la Dirección de Informática ', NULL, 1),
(126, 'Radio Nacional de Venezuela', NULL, 1),
(127, 'TeleSur ', NULL, 1),
(128, 'VTV', NULL, 1),
(129, 'MINCI', NULL, 1),
(130, 'Aporrea', NULL, 1),
(131, 'Ahorro Energetico', NULL, 1),
(132, 'Comunas y Protección Social', NULL, 1),
(133, 'Ley orgánica del Consejo Federal del Gobiern', NULL, 1),
(134, 'Venezuela ¡De Verdad!', NULL, 1),
(136, 'Bicentenario', NULL, 1),
(138, 'Balance Seguridad', NULL, 1),
(139, 'Reunión de Seguridad y Transporte', NULL, 1),
(141, 'SIEY 171 ', NULL, 1),
(143, 'Obras en las Escuelas', NULL, 1),
(144, 'Mas Información2', NULL, 1),
(145, 'Poder Comunal', NULL, 1),
(146, 'Salud', NULL, 1),
(147, 'Economía Social', NULL, 1),
(148, 'Vialidad', NULL, 1),
(149, 'Vivienda', NULL, 1),
(150, 'Seguridad', NULL, 1),
(151, 'Educación', NULL, 1),
(152, 'Empresa Socialista', NULL, 1),
(154, 'Titular 2', NULL, 1),
(155, 'Consulta tu Ayuda', NULL, 1),
(156, 'Titular 3', NULL, 1),
(157, 'Verificar Carros Robados y Recuperados', NULL, 1),
(158, 'Logros 2010', NULL, 1),
(159, 'galeria_ejemplo', NULL, 1),
(160, 'Invitación ', NULL, 1),
(161, '1ra Parte Programa 57', NULL, 1),
(162, 'Programa Rindiendo Cuentas', NULL, 1),
(163, '2da Parte Programa 57', NULL, 1),
(164, '3ra Parte Programa 57', NULL, 1),
(165, '4ta Parte Programa 57', NULL, 1),
(166, '5ta Parte Programa 57', NULL, 1),
(167, 'rss', NULL, 1),
(168, 'Congreso Bolivariano', NULL, 1),
(169, 'Fitven', NULL, 1),
(170, 'Prensa Presidencial', NULL, 1),
(171, 'ALBA', NULL, 1),
(172, 'RUSNIEU', NULL, 1),
(173, 'Canaima', NULL, 1),
(174, 'Titular 1', NULL, 1),
(175, 'Institutos en Google Maps', NULL, 1),
(176, 'Programa 57', NULL, 1),
(177, 'Programa 58', NULL, 1),
(178, 'Programa 59', NULL, 1),
(179, 'Programa 60', NULL, 1),
(180, 'Programa 61', NULL, 1),
(181, 'Twitter del Gobernador', NULL, 1),
(182, 'Envios Masivos', NULL, 1),
(185, 'Líneas de Chávez', NULL, 1),
(199, 'Galería Juvines', NULL, 1),
(200, 'Galería Juvines 2010', NULL, 1),
(205, 'Competencias', NULL, 1),
(206, 'Programa 64', NULL, 1),
(208, 'Programa 66', NULL, 1),
(211, 'otra', NULL, 1),
(215, 'Galería Poder Comunal2', NULL, 1),
(218, 'Trabajos Ganadores', NULL, 1),
(220, 'prueba', NULL, 1),
(221, 'la galeria', NULL, 1),
(222, 'Galería Poder Comunal', NULL, 1),
(224, 'Programa 65', NULL, 1),
(225, 'Programa 68', NULL, 1),
(226, 'Programa 67', NULL, 1),
(227, 'info', NULL, 1),
(228, 'ver', NULL, 1),
(229, 'Programa 63', NULL, 1),
(230, 'Programa 62', NULL, 1),
(231, 'video prueba', NULL, 1),
(233, 'Galería', NULL, 1),
(234, 'Gestión 2011', NULL, 1),
(236, 'Deporte', NULL, 1),
(237, 'Cultura', NULL, 1),
(238, 'Turismo', NULL, 1),
(239, 'inicio2', NULL, 1),
(240, '2 Años de Logros', NULL, 1),
(243, 'videos prueba', NULL, 1),
(244, 'prueba correo', NULL, 1),
(245, 'Soporte On-line', NULL, 1),
(246, 'Alcaldías', NULL, 1),
(247, 'Códigos Postales del Estado', NULL, 1),
(248, 'Gabinetes Comunales', NULL, 1),
(249, 'La Gobernación', NULL, 1),
(251, 'otra de video', NULL, 1),
(252, 'Racionamiento Elétrico', NULL, 1),
(253, 'Invitación Gran Desfile', NULL, 1),
(254, 'Gran Misión Vivienda', NULL, 1),
(255, 'Organigrama de la Gobernación', NULL, 1),
(256, 'Nacionales', NULL, 1),
(257, 'Internacionales', NULL, 1),
(259, 'Misión Amor Mayor', NULL, 1),
(260, 'Misión Hijos de Venezuela', NULL, 1),
(261, 'Misión Saber y Trabajo', NULL, 1),
(262, 'Gobierno en linea', NULL, 1),
(263, 'ciencia y tecnología', NULL, 4),
(264, 'economía', NULL, 4),
(265, 'sucesos', NULL, 4),
(266, 'Infraestructura', NULL, 4),
(267, 'Política', NULL, 4),
(268, 'Efemérides', NULL, 4),
(269, 'Gobierno', NULL, 4),
(270, 'Comunidad', NULL, 4),
(271, 'Fundación Niño Simón', NULL, 4),
(272, 'Vivienda', NULL, 4),
(273, 'Vialidad', NULL, 4),
(274, 'Tierras', NULL, 4),
(275, 'Aguas', NULL, 4),
(276, 'Yaracuy', NULL, 4);

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

--
-- Volcado de datos para la tabla `ccontrataciones`
--

INSERT INTO `ccontrataciones` (`id`, `titulo`, `articulo`, `denominacion`, `actividad`, `ente`, `pfechad`, `pfechah`, `phorario`, `estado`, `municipio`, `lugar`, `costo`, `banco`, `tcuenta`, `ncuenta`, `benificiario`, `info`, `afechad`, `afechah`, `ahorario`, `rfechad`, `rhora`, `efecha`, `ehora`, `lugarsobres`, `status`) VALUES
(1, 'NÂº CUCEY-IAPEY-CA-S-001-2012', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'MANTENIMIENTO DE MOTOCICLETAS SUZUKI DR650 ADSCRITAS A LA POLICÍA DEL ESTADO YARACUY', 'SERVICIO', 'INSTITUTO AUTÃ“NOMO DE POLICÃA DEL ESTADO YARACUY.', '11/09/2012', '18/09/2012', '8:30 a.m. a 12:00 p.m. 2:30 p.m a 4:30 p.m', 'Yaracuy', 'San Felipe', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '500', 'Bicentenario', 'Corriente', '01750349980451025537', 'GobernaciÃ³n del Estado Yaracuy', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '11/09/2012', '13/09/2012', '9:00 a.m. a 11:00 a.m. y 2:00 p.m. a 4:00 p.m.', '17/09/2012', '10:00 a.m.', '19/09/2012 ', '09:00 a.m ', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', 0),
(2, 'NÂº CUCEY-PROSALUD-CA-B-013-2012', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'ADQUISICIÓN DE MEDICINAS PARA LA RED PRIMARIA Y RED HOSPITALARIA DEL ESTADO YARACUY.', 'BIENES', 'Instituto AutÃ³nomo de la Salud del Estado Yaracuy (PROSALUD).', '12/09/2012', '19/09/2012', '8:30 a.m. a 12:00 p.m. 2:30 p.m a 4:30 p.m', 'Yaracuy', 'San Felipe', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '500', 'Bicentenario', 'Corriente', '01750349980451025537', 'GobernaciÃ³n del Estado Yaracuy', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '12/09/2012', '14/09/2012', '9:00 a.m. a 11:00 a.m. y 2:00 p.m. a 4:00 p.m.', '18/09/2012', '09:00 a.m.', '20/09/2012', '09:00 a.m', 'Auditorio de PROSALUD, ubicado en el Callejón Cascabel entre Avenidas Cedeño y Ravell, Edificio PROSALUD, San Felipe, Estado Yaracuy.', 0),
(3, 'CUCEY-PROSALUD-CA-B-014-2012', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'ADQUISICIÓN DE MATERIAL MÉDICO-QUIRÚRGICO PARA LA RED PRIMARIA Y RED HOSPITALARIA DEL ESTADO YARACUY.', 'BIENES', 'Instituto AutÃ³nomo de la Salud del Estado Yaracuy (PROSALUD).', '12/09/2012', '19/09/2012', '8:30 a.m. a 12:00 p.m. 2:30 p.m. a 4:30 p.m.', 'Yaracuy', 'San Felipe', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '500', 'Bicentenario', 'Corriente', '01750349980451025537', 'GobernaciÃ³n del Estado Yaracuy', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '12/09/2012', '14/09/2012', '9:00 a.m. a 11:00 a.m. y 2:00 p.m. a 4:00 p.m.', '18/09/2012', '02:00 p.m.', '20/09/2012', '02:00 p.m.', 'Auditorio de PROSALUD, ubicado en el Callejón Cascabel entre Avenidas Cedeño y Ravell, Edificio PROSALUD, San Felipe, Estado Yaracuy.', 0),
(4, 'CUCEY-IHAVEY-CA-O-001-2012', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'CULMINACION DE OBRAS DE URBANISMO EN LA URBANIZACIÓN ARAGUANEY, MUNICIPIO PEÑA, ESTADO YARACUY.', 'OBRAS', 'INSTITUTO DE HABITAT Y VIVIENDA DEL ESTADO YARACUY.', '24/09/2012', '04/10/2012', '8:30 a.m. a 11:30 p.m. 2:30 p.m. a 04:00 p.m.', 'Yaracuy', 'San Felipe', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.Sede de la Comisión Única d', '500', 'Bicentenario', 'Corriente', '01750349980451025537', 'GobernaciÃ³n del Estado Yaracuy', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '24/09/2012', '26/09/2012', '8:30 a.m. a 12:00 p.m. 2:30 p.m. a 4:00 p.m', '02/10/2012', '3:00 p.m.', '05/10/2012', '3:00 p.m.', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.Sede de la Comisión Única d', 0),
(5, 'CUCEY-PROSALUD-CA-B-015-2012', '', 'ADQUISICIÓN DE REACTIVOS E INSUMOS DE LABORATORIO PARA LA RED HOSPITALARIA, RED PRIMARIA Y SALUD PÚBLICA DEL ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(6, 'CUCEY-GOB-CA-B-012-2012', '', 'ADQUISICIÓN DE CUARENTA (40) UNIDADES MOTORIZADAS PARA EL FORTALECIMIENTO DE LA POLICÍA DEL ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(7, 'CUCEY-ESAY-CA-O-002-2012', '', 'ESCARIFICACION, COLOCACION DE MEZCLA ASFALTICA Y CONSTRUCCION DE OBRAS DE DRENAJE EN LA VIA LO02, TRAMO PUEBLO NUEVO - EL CHINO, MUNICIPIO VEROES, ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(8, 'CUCEY-EMSOMY-CA-B-001-2012', '', 'ADQUISICIÓN E INSTALACIÓN DE MAQUINARIAS REQUERIDAS PARA EL FUNCIONAMIENTO DE DOS (02) PLANTAS PARA LA FABRICACIÓN DE BLOQUES DE CONCRETO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(9, 'CUCEY-GOB-CA-S-001-2013', '', 'PRESTACIÓN DE SERVICIO EXEQUIALES DE PREVISIÓN FAMILIAR PARA TRABAJADORES VARIOS DEL EJECUTIVO REGIONAL, CORRESPONDIENTE AL AÑO 2013', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(10, 'CUCEY-GOB-CA-S-002-2013', '', 'PRESTACIÓN DEL SERVICIO DE ELABORACIÓN Y SUMINISTRO DE TICKET DE ALIMENTACIÓN PARA LOS TRABAJADORES Y LAS TRABAJADORAS DE LA GOBERNACIÓN  DEL ESTADO YARACUY Y DEMÁS ENTES DESCENTRALIZADOS ADSCRITOS AL MISMO, CORRESPONDIENTES AL AÑO 2013.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(11, 'CUCEY-FUNYABO-CA-S-001-2013', '', 'PLAN DE MANTENIMIENTO DRENAJES, DESMALEZAMIENTO, PODA Y LIMPIEZA DE LA AUTOPISTA CIMARRÓN ANDRESOTE ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(12, 'CUCEY-PROSALUD-CA-B-003-2013', '', 'ADQUISICIÓN DE MATERIAL MÉDICO-QUIRÚRGICO PARA LA RED PRIMARIA Y RED HOSPITALARIA DEL ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(13, 'CUCEY-IAI-CA-O-001-2013', '', 'CULMINACIÓN DE LA EMERGENCIA Y ÁREA DE TRAUMA SHOCK, HOSPITAL DEL MUNICIPIO NIRGUA, ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(14, 'CUCEY-IAI-CA-O-002-2013', '', 'CONSTRUCCIÓN DEL AMBULATORIO DE SALÓM, MUNICIPIO NIRGUA, ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(15, 'CUCEY-PROFUNIJESI-CA-B-001-2013', '', 'ADQUISICIÓN DE ALIMENTOS Y MISCELÁNEOS AÑO 2013, PARA  EL  INSTITUTO  AUTÓNOMO  DE LA SALUD DEL ESTADO YARACUY, LA FUNDACIÓN NIÑO JESÚS DEL ESTADO YARACUY, Y  LA  FUNDACIÓN REGIONAL “EL NIÑO SIMÓN” YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(16, 'CUCEY-FUNDAPUSA-CA-B-001-2013', '', 'Adquisición de Marcapasos para la Fundación Pueblo Sano del Estado Yaracuy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(17, 'CUCEY-ESAY-CA-S-001-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'SERVICIO DE TRANSPORTE  DE CEMENTO ASFALTICO HASTA LA SEDE DE LA PLANTA DE LA EMPRESA SOCIALISTA ASFALTOS YARACUY, C.A.; UBICADA EN AUTOPISTA CIMARRÓN ANDRESOTE SENTIDO SAN FELIPE-BARQUISIMETO SECTOR EL PEÑÓN CHIVACOA MUNICIPIO BRUZUAL.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(18, 'CUCEY-PROSALUD-CA-B-004-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'ADQUISICIÓN DEL MATERIAL DE SÍNTESIS Y OSTEOSÍNTESIS PARA LAS ESPECIALIDADES DE TRAUMATOLOGÍA, MAXILOFACIAL, NEUROCIRUGÍA, UROLOGÍA Y CIRUGÍA EN GENERAL DEL ESTADO YARACUY, PARA EL AÑO 2013.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(19, 'CUCEY-SESTY-CA-B-001-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'ADQUISICIÓN DE DIEZ (10) MINIBÚS DE 32 PUESTOS', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(20, 'CUCEY-GOB-CA-B-001-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'ADQUISICIÓN DE MATERIALES DE OFICINA PARA LA GOBERNACIÓN DEL ESTADO YARACUY, Y DEMÁS ENTES DESCENTRALIZADOS ADSCRITOS A LA MISMA, CORRESPONDIENTES AL AÑO 2013.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(21, 'CUCEY-IHAVEY-CA-O-001-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'CONSOLIDACIÓN DEL SECTOR LAS MERCEDES, III ETAPA, MUNICIPIO SAN FELIPE DEL ESTADO YARACUY.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(22, 'CUCEY-GOB-CA-S-003-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'APROVISIONAMIENTO E INSTALACIÓN DE EQUIPOS GPS Y SERVICIO DE PLATAFORMA TECNOLÓGICA DE SEGUIMIENTO DE VEHÍCULOS (GRTMAX)', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(23, 'CUCEY-FUNYABO-CA-B-001-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'ADQUISICIÓN DE PINTURA PARA DEMARCACIÓN DE LA RED VIAL URBANA Y EXTRAURBANA DEL ESTADO YARACUY.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(24, 'CUCEY-GOB-CA-B-002-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'ADQUISICIÓN DE MATERIALES DE LIMPIEZA PARA LA GOBERNACIÓN DEL ESTADO YARACUY, Y DEMÁS ENTES DESCENTRALIZADOS ADSCRITOS A LA MISMA, CORRESPONDIENTES AL AÑO 2013.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(25, 'CUCEY-PROSALUD-CA-B-007-2013', '<p>MECANISMO QUE RIGE SEG&Uacute;N AT&Iacute;CULO 56 NUMERAL 1: Acto &Uacute;nico de recepci&oacute;n y apertura de sobres contentivos de: manifestaci&oacute;n de voluntad de participar, documentos de Calificaci&oacute;n y Ofertas.</p>', 'ADQUISICIÓN DE INSUMOS Y EQUIPOS DE ODONTOLOGÍA.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', '<p>Sede de la Comisi&oacute;n &Uacute;nica de Contrataciones de Bienes y Servicios de la Gobernaci&oacute;n del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.</p>', 0),
(26, 'CUCEY-PROSALUD-CA-B-008-2013', '', 'ADQUISICIÓN DE MATERIAL DE SÍNTESIS Y OSTEOSÍNTESIS PARA LAS ESPECIALIDADES DE TRAUMATOLOGÍA, MAXILOFACIAL, NEUROCIRUGÍA, UROLOGÍA Y CIRUGÍA EN GENERAL DEL ESTADO YARACUY, (DESIERTOS 2013).', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(27, 'CUCEY-FUNDEY-CA-B-001-2013', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'ADQUISICIÓN DE ARTÍCULOS DEPORTIVOS DE ALTA COMPETENCIA, UNIFORMIDAD DE COMPETENCIA Y DE PRESENTACIÓN PARA SER UTILIZADO POR LA DELEGACIÓN DEL ESTADO YARACUY EN LOS VENIDEROS XIX JUEGOS DEPORTIVOS NACIONALES JUVENILES 2013.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', 0),
(28, 'CUCEY-GOB-CA-B-003-2013', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'ADQUISICIÓN DE CAMIONES PARA LA GOBERNACIÓN DEL ESTADO YARACUY.', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', '', '', '', '', '', 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representant', '', '', '', '', '', '', '', 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.', 0),
(29, 'CUCEY-GOB-CA-B-004-2013', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'ADQUISICIÓN DE CAUCHOS PARA LOS VEHICULOS DE LA GOBERNACIÓN DEL ESTADO YARACUY Y SUS ENTES DESCENTRALIZADOS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(30, 'CUCEY-GOB-CA-O-001-2013', 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.', 'REHABILITACI&#211;N DE LA V&#205;A YARITAGUA &#8211; EL POZON, MUNICIPIO PE&#209;A, ESTADO YARACUY.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Volcado de datos para la tabla `directory`
--

INSERT INTO `directory` (`iddirectory`, `name`, `description`) VALUES
(1, 'PALACIO DE GOBIERNO FRENTE A LA PLAZA BOLÍVAR', 'PALACIO DE GOBIERNO FRENTE A LA PLAZA BOLÍVAR\r\nSAN FELIPE, ESTADO YARACUY\r\nCENTRAL TELEFÓNICA 0254-2313276 ?2312597-2315112-2343028\r\nCORREO ELECTRÓNICO: gobier_bolivyaracuy@cantv.net\r\nDIRECCIÓN: 6ta Avenida con Avenida Caracas'),
(2, 'EDIFICIO ADMINISTRATIVO', 'AV. LIBERTADOR CRUCE CON AV. CARACAS'),
(3, 'Institutos Autónomos', ''),
(4, 'Instituciones Nacionales', ''),
(5, 'Consejo Legislativo Del Estado Yaracuy', ''),
(6, 'Diputados a La Asamblea Nacional', ' Av. Este 6, Esq. de Pajaritos, Edif. "José María Vargas" / Caracas - Venezuela ');

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

--
-- Volcado de datos para la tabla `directory_department`
--

INSERT INTO `directory_department` (`iddirectory_department`, `name`, `address`, `iddirectory`) VALUES
(1, 'GOBERNADOR DEL ESTADO YARACUY', 'Palacio de Gobierno, Piso 2', 1),
(2, 'ASISTENTES GOBERNADOR', 'Palacio de Gobierno, Planta Alta', 1),
(3, 'SECRETARIO GENERAL DE GOBIERNO', 'Palacio de Gobierno, Planta Baja', 1),
(4, 'SECRETARÍO DE SEGURIDAD CIUDADANA', 'Palacio de Gobierno, Planta Baja', 1),
(5, 'SECRETARIA DEL DESPACHO', 'Palacio de Gobierno, Planta Baja', 1),
(9, 'SECRETARIA DE COMUNICACION E INFORMACION', '', 1),
(11, 'SERVICIO INTEGRAL DE EMERGENCIAS Y DENUNCIAS 0800-YARACUY.', '', 1),
(13, 'SECRETARIA DE FINANZAS Y ADMINISTRACION.', 'PISO 1', 2),
(14, 'SECRETARIA DE INFRAESTRUCTURA', '', 2),
(15, 'SECRETARIA DEL PODER COMUNAL Y PROTECCION SOCIAL', '', 2),
(16, 'DIRECCION DE ATENCION AL CIUDADANO.', 'Palacio de Gobierno, Planta Baja', 1),
(17, 'DIRECCION DE LA ZONA EDUCATIVA.', '', 2),
(18, 'SECRETARIA DE EDUCACION, CULTURA, DEPORTE Y JUVENTUD.', '', 2),
(19, 'INSTITUTO  DE CULTURA DEL ESTADO YARACUY (I.C.E.Y.)', '', 3),
(20, 'IMPRENTA DEL ESTADO YARACUY', ' Dirección: 6ta. Av. Entre Calles 8 Y 9 Al Lado De La Cley.', 3),
(21, 'FUNDACIÓN REGIONAL EL NIÑO SIMON', 'Calle Principal De Piedra Grande', 3),
(25, 'INSTITUTO AUTÓNOMO  PARA EL DEPORTE DEL EDO. YARACUY (FUNDEY)', '', 3),
(26, 'INSTITUTO AUTONOMO DE LA SALUD DEL ESTADO YARACUY (PROSALUD)', 'Callejón Cascabel, Entre Cedeño Y Ravell. ', 3),
(28, 'FUNDACIÓN PUEBLO SANO', '', 3),
(29, 'INSTITUTO AUTÓNOMO  DE DESARROLLO ECONÓMICO DEL ESTADO YARACUY (I.A.D.E.Y)', 'Centro Comercial La GalerÃ­a, Planta Baja', 3),
(30, 'SERVICIO AUTÓNOMO DE ADMINISTRACIÓN DE LA INFRAESTRUCTURA DEPORTIVA, CULTURAL Y TURÍSTICA DEL EDO. YARACUY. (S.A.I.E.Y)', 'Av. Alberto Ravell Centro De Convenciones Henrique Tirado Reyes.', 3),
(31, 'Instituto Autonomo  Contra La Pobreza Y Exclusion Social Del Estado Yaracuy.  (I.A.P.E.S.E.Y.)', '6ta. Av. Con Calles 22 Y 23 ', 3),
(33, 'Presidencia', '', 5),
(34, 'Vice-Presidencia', '', 5),
(35, 'Legisladores', '', 5),
(36, 'Diputados', 'Av. Este 6, Esq. de Pajaritos, Edif. "José María Vargas" / Caracas - Venezuela', 6),
(38, 'DIRECCIÓN DE INFORMATICA', 'PISO 2', 2),
(48, 'Secretario De Desarrollo Económico', 'Piso 8', 2),
(50, 'Dirección De Minas', 'Piso 8', 2),
(51, 'DIRECCION DE PROTOCOLO', ' Palacio de Gobierno, Planta Baja', 1),
(52, 'INSPECTORIA GENERAL DE GOBIERNO', ' Palacio de Gobierno, Planta Baja', 1),
(53, 'DIRECCIÓN DE CONSULTORÍA JURÍDICA', 'PISO 3', 2),
(54, 'DIRECCIÓN GENERAL DE BIENES.', 'Centro de Prensa', 2),
(55, 'SECRETARIA  PLANIFICACIÓN  Y DESARROLLO DE LA GOBERNACIÓN DEL ESTADO', '', 2),
(56, 'OFICINA DE PRESUPUESTO', 'PISO 4', 2),
(57, 'OFICINA DE RECURSOS HUMANOS', 'PISO 5, 6 y 7', 2),
(58, 'INSTITUTO AUTÓNOMO DE INFRAESTRUCTURA', '6ta. Av. Esq. calle 9', 3),
(59, 'INSTITUTO DE HABITAT Y VIVIENDA DEL ESTADO YARACUY', '7ma. Av. Esq. calle 7', 3),
(60, 'AGUAS DEL YARACUY', 'Calle La Mosca entre Av. Yaracuy y Av. Cedeño', 3),
(61, 'DIRECTOR DEL INSTITUTO AUTÓNOMO DE AYUDA A LOS FUNCIONARIOS DE SEGURIDAD CIUDADANA DEL GOBIERNO BOLIVARIANO DE YARACUY (I.A.A)', 'Barrio Andrés Eloy Blanco Calle 03 con Av. 06, Municipio San Felipe', 3);

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

--
-- Volcado de datos para la tabla `directory_office`
--

INSERT INTO `directory_office` (`iddirectory_office`, `office`, `attendant`, `phone`, `email`, `twitter`, `iddirectory_department`) VALUES
(1, '', 'LCDO. JULIO CÉSAR LEON HEREDIA', '0254-2320772/2320992 ', 'gobernador@yaracuy.gob.ve', '@JULIOLEONYARA', 1),
(4, 'Secretario', 'PROF. JUAN TORREALBA.', 'TELF. 0254-2316024- 0416.635.26.60', 'secgeneraldegobierno@gmail.com', '', 3),
(6, 'Secretario', 'LCDO. ROGGER DAZA', '0254-2311752/0426.552.22.49 FAX 2314179', 'secdespachoyaracuy@gmail.com', '', 5),
(10, 'Secretario', 'LCDA AMNALY GUARNIERI', '0254-2316120/0426.552.22.37 FAX 2314175', 'prensayaracuy@gmail.com', '', 9),
(12, 'Coordinador', 'ING. IMARU BASTIDAS', '0426.546.46.91', 'csg@hotmail.com', '', 11),
(14, 'Secretario', 'LCDA. YAJAIRA ALVAREZ', '0254-2315766/0416.650.40.08', 'oyi@cantv.net', '', 13),
(16, 'DIRECTOR DE FINANZAS.', 'LCDA. PATRICIA ELIAS', '0254.231.57.66/0416.650.41.07', '', '', 13),
(18, 'DIRECTOR DE ADMINISTRACION', 'LCDA. YOLINA HERNANDEZ', '02542319158', '', '', 13),
(21, 'Secretario', 'ING. OTTO COLAIACOVO', '0254- 2319965/0416.654.03.56', 'armanguerrero@yahoo.es', '', 14),
(22, 'Secretario', 'LCDO. HUMBERTO SILVA.', '2310508/0416.650.68.03/0416.650.65.45', 'manuelherreragonzalez@hotmail.com', '', 15),
(23, 'DIRECTOR DE PODER COMUNAL', 'LCDA. MARIA MATILDE FERNANDEZ DE MURZI', '0412-0542227', 'marimurzi@gmail.com', '', 15),
(24, 'DIRECTOR DE PROTECCION SOCIAL (E)', 'ABG. LUIS ALEXANDER CASTILLO', '0424-5441221', 'luisalexandercastillo@gmail.com', '', 15),
(25, 'Director', 'LCDO. FRANCIS LINAREZ', '0416-5018656', '', '', 16),
(26, 'Director', 'PROF. MAURA BETANCOURT', '', '', '', 17),
(27, 'Secretario', 'PROF. MILENA HERNANDEZ DE RALDIRIZ.', '2310758/ 0426.557.61.22', 'maurabetancourt@hotmail.com', '', 18),
(28, 'Presidente', 'LCDO: JOSE RAFAEL NARANJO', '(0254) 2318711 Fax.(0254)2316636/0416.562', '', '', 19),
(29, 'JEFE DE TALLER', 'SR. EDGAR TOVAR', '', '', '', 20),
(30, 'Presidenta', 'LCDA. DELIA ZAVARCE DE LEÓN', ' 0254-2313485-2310259/0414.546.08.82', '', '', 21),
(31, 'Presidente', 'PROF. JUAN TORREALBA', '0254-2311346 ', '', '', 25),
(32, 'Presidenta', 'ING. ALEX SANCHEZ', '0254-2324419-2318505-2318482 Fax. 2314912 -2318911', '', '', 26),
(33, 'Presidenta', 'DRA. ANA MARIA MENDOZA', '', '', '', 28),
(34, 'PRESIDENTE', 'LCDO. GERARDO DELGADO', '0254-2318597 â€“ 2319757- Fax 2319008/0416.258.88.25/ 0416.501.71.14', 'presidenciaiadey@gmail.com ', '', 29),
(35, 'PRESIDENTE', 'ABOG. ALEXAMERY FRANCHESKY', 'Telf.0254-2319060/ 0416-150.84.11', '', '', 30),
(36, 'Presidente', 'Prof. Nabor Herrera', ' 0254- 2319023 â€“ 2324587/0412.850.10.36', '', '', 31),
(39, '', 'Leg. Shirley Romero', '', '', '', 35),
(40, '', ' Leg. Ivan Aparicio.', '', '', '', 35),
(41, '', 'Leg. Wendy Tellechea', '', '', '', 35),
(42, '', ' Leg. Angel Gamarra', '', '', '', 33),
(43, '', ' Leg.. Neidy Liscano. ', '0416-501.35.76  0424-538.6.66', '', '', 34),
(44, '', ' Leg. Henrys Mogollon', '', '', '', 35),
(45, '', ' Leg. Carmen Teresa Hernandez', '', '', '', 35),
(46, '', 'Dip. Braulio Alvarez', '0416-621.90.27. 0414-122.12.53', '', '', 36),
(47, '', ' Dip. Nestor Leon Heredia.', '', '', '', 36),
(48, '', ' Dip. Carlos Gamarra', '', '', '', 36),
(49, '', ' Dip. Yorman Aular', '', '', '', 36),
(50, 'Directora', 'ING. SOL MARIA COLMENAREZ', '0254-2325766/ 0416.0426.557.47.96', 'scolmenarez@yaracuy.gob.ve', '', 38),
(52, 'Secretario', ' ING. JOFFRE ALVARADO', '0254-2310049', 'joffrealvarado@gmail.com', '', 48),
(54, 'Director', 'T.S.U. JOSE RAFAEL MORALES', '', '', '', 50),
(55, 'Secretario', 'CNEL. ELEAZAR MALDONADO LEON. ', '0254-2312703/0426-552.12.10', '', '', 4),
(56, 'Directora', 'T.S.U. DALIANIS DE GOITIA', '0254- 2312591/0416.650.74.46 Ext. 101', '', '', 51),
(57, '', 'LCDO. LUIS MUÑOZ', '', '', '', 52),
(58, 'DIRECTOR DE EDUCACION', 'LCDA. ZORAIDA RIVAS', '', '', '', 18),
(59, 'DIRECTORA DE TESORERIA (E).', 'LCDA.  FATIMA LOPEZ', '0254- 2315766/0414546.96.11', '', '', 13),
(60, 'JEFE DE COMPRAS', 'SRA. MARÍA COLINA', '0426-7530461 - 2314663', '', '', 13),
(61, 'DIRECTOR', 'ABOG. PABLO BARRIOS', '', '', '', 53),
(62, 'SUPERVISOR DE MANTENIMIENTO DE LAS INSTALACIONES DEL PALACIO DE GOBIERNO', 'JUAN VICENTE GOMEZ', '2312591 / 2310744,  EXT. 119', '', '', 13),
(63, 'DIRECTOR', 'CNEL. OSWALDO CARDOZO', '0254-2312591 - 2310744', '', '', 54),
(64, 'Secretario', 'ING. RUBIGLARD PEREZ', '0416-5018718', 'rubyp3@hotmail.com', '', 55),
(65, 'Director', 'LCDO: KENNETH  FONTANIVE.', '0254-2310938/0416.654.09.42/0414.549.41.89', '', '', 56),
(66, 'DIRECTORA', 'ABOG. MARY NELLY VILLARROEL.', '0254-2343262/0414.393.62.38', '', '', 57),
(67, 'PRESIDENTE', 'ING. CESAR ALFREDO SANCHEZ BRACHO', '0254-2318220 - 2318153', '', '', 58),
(68, 'PRESIDENTE', 'ING. LEIDA GUDIÑO', '0254-2318754 / 2318615 / 0412-5153323 / 0412-5153337', '', '', 59),
(69, 'PRESIDENTE', 'ING. YALITZI GONZALEZ', '0254-2318078 - 2319446 - FAX 2345475', '', '', 60),
(70, 'PRESIDENTE', 'COMISIONADO AGREGADO BRAULIO MUÑOZ.', '0254- 2345362/ 0416.501.02.69', '', '', 61),
(71, 'Asistente', 'LCDO. ROGGER DAZA', '0426-552.23.33 / 0254-231.17.52 / 0426-552.22.49 FAX 0254-231.41.79', 'roggerda@gmail.com', '', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Volcado de datos para la tabla `file_location`
--

INSERT INTO `file_location` (`idfile_location`, `name`, `location`) VALUES
(1, 'news', 'media/images/news/'),
(2, 'Galeria', 'media/images/gallery/'),
(3, 'Portada', 'media/images/coverad/');

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

--
-- Volcado de datos para la tabla `file_type`
--

INSERT INTO `file_type` (`idfile_type`, `mime_type`, `extencion`) VALUES
(1, 'image/jpeg', '.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`idprofile`, `name`, `description`, `status`) VALUES
(1, 'Owner', 'Super Administrador', 0),
(2, 'Ccontrataciones', 'Comision de contrataciones', 0),
(3, 'Prensa', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `nameuser`, `password`, `role`, `creation`) VALUES
(1, 'root', '6368639483001dff4bd9c3511c587ee9eb730def4f2458b3ca539e7605d73b5f', 'owner', NULL),
(2, 'prensa', 'df1b0b8d8248534c75e68e0fce0a9a9c884b1d8f22e71158c465fbe691083dd2', 'owner', NULL);

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

--
-- Volcado de datos para la tabla `user_has_profile`
--

INSERT INTO `user_has_profile` (`user_iduser`, `profile_idprofile`) VALUES
(1, 3),
(1, 2),
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videoyoutube`
--

CREATE TABLE IF NOT EXISTS `videoyoutube` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idyoutube` varchar(200) NOT NULL,
  `idvideoyoutubegrupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videoyoutubegrupo`
--

CREATE TABLE IF NOT EXISTS `videoyoutubegrupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `videoyoutubegrupo`
--

INSERT INTO `videoyoutubegrupo` (`id`, `nombre`) VALUES
(1, 'Portada'),
(2, 'Rindiendo Cuentas');

-- --------------------------------------------------------

--
-- Estructura para la vista `listar-coverad_article`
--
DROP TABLE IF EXISTS `listar-coverad_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar-coverad_article` AS (select `cover_ad`.`id` AS `idcover`,`cover_ad`.`title` AS `titlecover`,`cover_ad`.`file_idfile` AS `file_idfile`,`cover_ad`.`dtexto` AS `dtexto`,`cover_ad`.`idarticle` AS `idarticle`,`article`.`title` AS `titlearticle` from (`cover_ad` left join `article` on((`cover_ad`.`idarticle` = `article`.`idarticle`))) where (`cover_ad`.`status` = 1) order by `cover_ad`.`id` desc limit 0,10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
