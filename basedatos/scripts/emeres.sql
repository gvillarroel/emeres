-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-12-2012 a las 20:55:04
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `emeres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `numeroActividad` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_idProyecto` int(11) NOT NULL,
  `nombreActividad` varchar(45) DEFAULT NULL,
  `descripcionActividad` varchar(45) DEFAULT NULL,
  `fechaInicioActividad` date DEFAULT NULL,
  `fechaTerminoActividad` date DEFAULT NULL,
  `estadoActividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`numeroActividad`,`proyecto_idProyecto`),
  KEY `fk_actividad_proyecto1_idx` (`proyecto_idProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`numeroActividad`, `proyecto_idProyecto`, `nombreActividad`, `descripcionActividad`, `fechaInicioActividad`, `fechaTerminoActividad`, `estadoActividad`) VALUES
(1, 2, 'Primera Actividad', 'Es la primera', '2012-12-05', '2012-12-26', 1),
(1, 3, 'actividad 1', 'primera de este proyecto', '0000-00-00', '0000-00-00', 1),
(1, 6, 'qwefe', 'fefefewfw', '0000-00-00', '0000-00-00', 343434),
(2, 3, 'actividad 1', 'primera de este proyecto', '0000-00-00', '0000-00-00', 1),
(3, 2, 'asdasd', 'asdsad', '0000-00-00', '0000-00-00', 3),
(3, 3, 'assdas', 'asddsa', '0000-00-00', '0000-00-00', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromiso`
--

CREATE TABLE IF NOT EXISTS `compromiso` (
  `idCompromiso` int(11) NOT NULL AUTO_INCREMENT,
  `responsableCompromiso` int(11) NOT NULL,
  `nombreCompromiso` varchar(45) NOT NULL,
  `fechaInicioCompromiso` date NOT NULL,
  `fechaTerminoCompromiso` date NOT NULL,
  `descripcionCompromiso` varchar(255) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `estadoCompromiso` int(11) NOT NULL,
  PRIMARY KEY (`idCompromiso`),
  KEY `fk_Usuario_idx` (`responsableCompromiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `compromiso`
--

INSERT INTO `compromiso` (`idCompromiso`, `responsableCompromiso`, `nombreCompromiso`, `fechaInicioCompromiso`, `fechaTerminoCompromiso`, `descripcionCompromiso`, `municipio`, `estadoCompromiso`) VALUES
(1, 1, 'primero 1', '2012-12-05', '2012-12-31', 'es el primero', 'santiago', 100),
(2, 1, 'compromiso 2', '0000-00-00', '0000-00-00', 'es el segundo wiii', 'Talagante', 1),
(3, 1, 'tres', '0000-00-00', '0000-00-00', 'ihkkkjkl', 'Santiago', 980);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(100) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idLinkPadre` int(11) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTipoUsuario` (`idTipoUsuario`),
  KEY `idLinkPadre` (`idLinkPadre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `link`
--

INSERT INTO `link` (`id`, `texto`, `link`, `idTipoUsuario`, `idLinkPadre`, `orden`) VALUES
(1, 'Administrar', NULL, 1, NULL, 1),
(2, 'Usuario', 'usuario/buscar', 1, 1, 1),
(3, 'Compromiso', 'compromiso/buscar', 1, 1, 1),
(4, 'Proyecto', 'proyecto/buscar', 1, 1, 1),
(5, 'Foro', 'foro', 1, NULL, 1),
(6, 'Foro', 'foro', 2, NULL, 1),
(7, 'Ver compromisos', 'compromisos/ver', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProyecto` varchar(45) NOT NULL,
  `fechaInicioProyecto` date NOT NULL,
  `fechaTerminoProyecto` date NOT NULL,
  `fkUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `fk_proyecto_usuario_idx` (`fkUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `nombreProyecto`, `fechaInicioProyecto`, `fechaTerminoProyecto`, `fkUsuario`) VALUES
(2, 'nombre 2', '2012-00-00', '2012-00-09', 1),
(3, 'nombre 3', '2012-09-08', '2012-10-10', 1),
(4, 'nombre 4', '2012-10-09', '2012-10-10', 1),
(5, 'nombre', '2012-10-10', '2012-10-10', 1),
(6, 'nombre 6', '2012-10-05', '2012-10-10', 1),
(7, 'nombre', '2012-10-10', '2012-10-10', 1),
(8, 'nuevo', '0000-00-00', '0000-00-00', 1),
(10, 'otro', '2012-10-07', '2012-10-11', 1),
(11, 'nombre 11', '2012-00-00', '0000-00-00', 1),
(12, 'nombre', '2012-10-00', '0000-00-00', 1),
(13, 'Proyecto 123', '2012-12-06', '2012-12-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `nombre`) VALUES
(1, 'Emeres'),
(2, 'Socio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `codigoActivacion` varchar(20) DEFAULT NULL,
  `correoElectronico` varchar(200) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTipoUsuario` (`idTipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `clave`, `codigoActivacion`, `correoElectronico`, `idTipoUsuario`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'villarroel.gj@gmail.com', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_proyecto1` FOREIGN KEY (`proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compromiso`
--
ALTER TABLE `compromiso`
  ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`responsableCompromiso`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `link_ibfk_2` FOREIGN KEY (`idLinkPadre`) REFERENCES `link` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_proyecto_usuario` FOREIGN KEY (`fkUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
