-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2013 a las 09:10:31
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ordenes`
--

--
-- Volcado de datos para la tabla `app_accion`
--

INSERT INTO `app_accion` (`id`, `nombre`, `id_modulo`) VALUES
(1, 'INCLUIR ORDEN', 1),
(2, 'MODIFICAR ORDEN', 1),
(3, 'COLSULTAR ORDEN', 1),
(4, 'ELIMINAR ORDEN', 1);

--
-- Volcado de datos para la tabla `app_aplicacion`
--

INSERT INTO `app_aplicacion` (`id`, `nombre`, `id_proyecto`) VALUES
(1, 'principal', 1);

--
-- Volcado de datos para la tabla `app_modulo`
--

INSERT INTO `app_modulo` (`id`, `nombre`, `id_aplicacion`) VALUES
(1, 'Ordenes', 1),
(2, 'Novedad', 1),
(3, 'Observación', 1),
(4, 'Supervisión', 1);

--
-- Volcado de datos para la tabla `app_proyecto`
--

INSERT INTO `app_proyecto` (`id`, `nombre`) VALUES
(1, 'ordenes');

--
-- Volcado de datos para la tabla `app_user`
--

INSERT INTO `app_user` (`iduser`, `login`, `nombres`, `password`, `id_instituto`, `cargo`, `email`, `role`) VALUES
(1, 'adiez', 'ALFONZO DIEZ', 'e4fb0b81fb19da1f98135dd26b7c1d881abfcd6f349c8508f9ef9135914ee26a', 4, 'COORDINADOR DE HARDWARE Y SOFTWARE', 'alfonzodiez@gmail.com', 1),
(2, 'ygonzalez', 'YALITZI GONZÁLEZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 1, 'PRESIDENTA', 'mendozajuan007@gmail.com', 3),
(3, 'ylopez', 'YECENIA LÓPEZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 2, 'COORDINADORA', 'lopezyecenia@gmail.com', 3),
(4, 'pbarrios', 'PABLO BARRIOS', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 3, 'CONSULTOR JURÍDICO', 'pbarrios4@gmail.com', 3),
(5, 'scolmenarez', 'SOL MARIA COLMENAREZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 4, 'DIRECTORA', 'solcolmenarezg@gmail.com', 3),
(6, 'rmorales', 'RAFAEL MORALES', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 5, 'DIRECTOR Y PRESIDENTE', 'rafaelguarecuco@gmail.com', 3),
(7, 'kfontanive', 'KENNETH FONTANIVE', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 6, 'DIRECTOR', 'gobyarpresup@gmail.com', 3),
(8, 'dgonzalez', 'DALIANIS GONZÁLEZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 7, 'DIRECTORA', 'dalianisg@gmail.com', 3),
(9, 'mvillarroel', 'MARY NELLYS VILLARROEL', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 8, 'DIRECTORA', 'rrhhgoberyaracuy@gmail.com', 3),
(10, 'rguevara', 'REYLI GUEVARA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 9, 'DIRECTORA', 'seguimientoycontrolyaracuy@gmail.com', 3),
(11, 'ocardozo', 'OSWALDO CARDOZO', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 10, 'DIRECTOR', 'oswcardozo@yahoo.com', 3),
(12, 'mteran', 'MARÍA ALEJANDRA TERÁN', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 11, 'PRESIDENTA', 'mteranperez@gmail.com', 3),
(13, 'csanchez', 'CESAR SÁNCHEZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 12, 'PRESIDENTE', 'cesarasab@yahoo.es', 3),
(14, 'jnaranjo', 'JOSÉ NARANJO', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 13, 'PRESIDENTE', 'naranjojoser@gmail.com', 3),
(15, 'eochoa', 'EPIFANIO OCHOA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 14, 'PRESIDENTE', 'somosinajudey@gmail.com', 3),
(16, 'asanchez', 'ALEX SALOMÓN SÁNCHEZ BANARD', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 15, 'PRESIDENTE', 'alexsanchezb1@gmail.com', 3),
(17, 'rdaza', 'RONALD DAZA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 16, 'DIRECTOR', 'ronaldd77@gmail.com', 3),
(18, 'aalvarez', 'ARTURO ÁLVAREZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 17, 'PROCURADOR', 'yaracuyprocuraduria@gmail.com', 3),
(19, 'spereira', 'SORAYA PEREIRA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 18, '', 'sorayapereira2301@hotmail.com', 3),
(20, 'afranceschi', 'ALEXAMERY FRANCESCHI', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 19, 'PRESIDENTA', 'alexameryfranceschi@hotmail.com', 3),
(21, 'aguarnieri', 'AMNALY GUARNIERI', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 20, 'SECRETARÍA', 'amnaguarf@gmail.com', 3),
(22, 'rodaza', 'ROGGER DAZA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 21, 'SECRETARIO', 'roggerda@gmail.com', 3),
(23, 'arangel', 'ANGELA RANGEL', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 22, 'SECRETARÍA', 'angelarangel2008@gmail.com', 3),
(24, 'rperez', 'RUBIGLARD PÉREZ', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 23, 'SECRETARÍA', 'rubiglard@gmail.com', 3),
(25, 'hsilva', 'HUMBERTO SILVA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 24, 'SECRETARIO', 'yaracuyhumberto@gmail.com', 3),
(26, 'jtorrealba', 'JUAN TORREALBA', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 25, 'SECRETARIO', 'jumato13@hotmail.com', 3),
(27, 'erivero', 'ESRY RIVERO', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 26, 'JEFA DE OPERACIONES', 'div.operaciones@171yaracuy.gob.ve', 3),
(28, 'root', 'gdf g dfg', 'e97e5442e32cd1554f9a1963a7ef6d9e9b0fc8364bf7932cc2ef86771f2d50f2', 26, 'COORDINADOR DE HARDWARE Y SOFTWARE', 'w_yinette@hotmail.com', 3),
(29, 'usuario', 'nombre apellido', '670dc02b29be2d6ef749081e4cdde9b96e2f1d6d9e976d5d98b5c9ec38dab4e4', 4, 'cargo', 'prueba@prueba.com.ve', 3);

--
-- Volcado de datos para la tabla `institutos`
--

INSERT INTO `institutos` (`id`, `nombre`) VALUES
(1, 'AGUAS DE YARACUY'),
(2, 'CONSEJO FEDERAL DE GOBIERNO'),
(3, 'CONSULTORÍA JURÍDICA'),
(4, 'DIRECCIÓN DE INFORMATICA'),
(5, 'DIRECCIÓN DE MINAS, CANALIZACIONES Y EMPRESA DE MINERALES YARACUY'),
(6, 'DIRECCIÓN DE PRESUPUESTO'),
(7, 'DIRECCIÓN DE PROTOCOLO'),
(8, 'DIRECCIÓN DE RECURSO HUMANOS'),
(9, 'DIRECCIÓN DE SEGUIMIENTO Y CONTROL'),
(10, 'DIRECCIÓN GENERAL DE BIENES'),
(11, 'FUNDACIÓN YARACUY BONITO'),
(12, 'IAI'),
(13, 'ICEY'),
(14, 'INAJUDEY'),
(15, 'JUNTA EVALUADORA DE PROSALUD'),
(16, 'OFICINA DE AYUDA SOCIAL'),
(17, 'PROCURADURÍA GENERAL DEL ESTADO'),
(18, 'PROSALUD'),
(19, 'SAIEY'),
(20, 'SECRETARÍA DE COMUNICACIÓN E INFORMACIÓN'),
(21, 'SECRETARÍA DE DESPACHO'),
(22, 'SECRETARÍA DE LA MESA DE GOBIERNO'),
(23, 'SECRETARÍA DE PLANIFICACIÓN Y DESARROLLO'),
(24, 'SECRETARÍA DEL PODER COMUNAL Y PROTECCIÓN SOCIAL'),
(25, 'SECRETARÍA GENERAL DE GOBIERNO'),
(26, 'SERVICIO DE EMERGENCIA 171');

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`id`, `texto`, `fecha`, `idorden`) VALUES
(1, '<p>Nos dirigimos al lugar y nos reunimos ...</p>', '2013-08-08 00:00:00', 2),
(2, '<p>Nos dirigimos al lugar y nos reunimos ...</p>', '2013-08-08 00:00:00', 2),
(3, '<p>Nos dirigimos al lugar y nos reunimos ...</p>', '2013-08-09 00:00:00', 2),
(4, '<p>texto de la nocedad</p>', '2013-08-09 00:00:00', 11),
(5, '<p>texto de la novedad</p>', '2013-08-09 00:00:00', 11),
(6, '<p><strong>texto</strong> <em>de la <strong>novedad</strong></em></p>', '2013-08-09 00:00:00', 11),
(7, '<p><span style="text-decoration: underline;"><em><strong>texto de la novedad</strong></em></span></p>', '2013-08-09 00:00:00', 11);

--
-- Volcado de datos para la tabla `observacion`
--

INSERT INTO `observacion` (`id`, `texto`, `fecha`, `idorden`) VALUES
(1, '<p>f fgfgh fgh fh gfh fgh f f</p>', '2013-07-31 00:00:00', 1);

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_usuario_emite`, `id_usuario_recibe`, `referencia`, `asunto`, `descripcion`, `plazo`, `medio`, `oficio`, `fecha_emision`, `estatus`, `gc`) VALUES
(1, 1, 1, 'sdfsf', 'ff sfsfsdfsdfsdffdff', 'Ã³Ã–Ã³Ã“Ã±Ã‘', 3, 1, 'gdfgdfgdf', '2013-07-29 00:00:00', 0, 0),
(2, 1, 5, 'fg dfgdfgdfg dfg ', 'dfg df gdfg dfg dfg ', 'dfg dfg dfg dfg dfg dfg dfg dg', 23, 1, '', '2013-07-30 00:00:00', 0, 0),
(3, 1, 1, 'dfgd gdg dfg dfg df gdfg d', ' dfg dfg dfg dfg sdf gdf', 'g dfgdfg dfg dfg df dfg dfg df dfg', 14, 1, '', '2013-08-02 00:00:00', 0, 0),
(4, 1, 1, 'dfgd gdg dfg dfg df gdfg d', ' dfg dfg dfg dfg sdf gdf', 'g dfgdfg dfg dfg df dfg dfg df dfg', 14, 1, '', '2013-08-02 00:00:00', 0, 1),
(5, 1, 1, 'dfgd gdg dfg dfg df gdfg d', ' dfg dfg dfg dfg sdf gdf', 'g dfgdfg dfg dfg df dfg dfg df dfg', 14, 1, '', '2013-08-02 00:00:00', 0, 1),
(6, 1, 1, 'sdf sdf sdf sdf sdf f sdf sd', 'f sdf sdf sdf sdf sdf sdf sdf ', 'df sdfsdf sdf sdf sdff ', 12, 1, '', '2013-08-02 00:00:00', 0, 0),
(7, 1, 1, 'sdff sdfsdf sdf sf sd', 'f sdf sdf sdf sdf sdf', 'sdf sdf sd sdf sdf df', 14, 1, '', '2013-08-02 00:00:00', 0, 1),
(8, 1, 1, ' g vghhcghc ghcghcghchg cc ghc ghcgh', 'fgd f dfdgdfgdfg dfgdfg dfgdf gdfgdf df gdf', 'sdfgdf df gdfg dfg dfg dfg df dgdfgdf df gdfg df dfg dfg dfg dfg dfg dfg dfg dfg dfg df', 13, 1, '', '2013-08-02 00:00:00', 0, 1),
(9, 1, 1, 'gfhgf hf gfhgfh gfh gfh gfh fgh gfh ', 'fhgf h gh gfh gf hgfh gfh  gfhgf', 'ghj hjgh hjghjgj ghjhj ', 12, 1, '', '2013-08-02 00:00:00', 0, 1),
(10, 1, 1, 'dfgd fgdf gfdg dfg dfg dfg df', 'g dfg dfg dfg dfg dfg dfg df ', 'dfg dfgdfdfg dfg dfg dfggfdg dfg df ', 34, 1, '', '2013-08-02 00:00:00', 0, 0),
(11, 1, 29, 'referencia de la orden', 'asunto', 'descripción de la orden', 12, 3, '', '2013-08-09 00:00:00', 2, 1);

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`idsoporte`, `responsable`, `asunto`, `descripcion`, `grado`) VALUES
(1, 2, 'te gdfgdgd f gd gdf1', 'gsf d fg dfg dfgdf 3', 2),
(2, 1, 'dfgdg  fg dfg33', 'fsd fssd fsd44', 1),
(3, 1, ' hgfh gfh f f', 'gh gfh fhg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
