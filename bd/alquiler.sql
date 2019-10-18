-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-05-2018 a las 04:52:17
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'sillas'),
(2, 'mesas'),
(3, 'manteles'),
(4, 'losa'),
(5, 'lonas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `curp` varchar(20) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`curp`),
  KEY `fk_cliente_usuario_idx` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`curp`, `rfc`, `nombre`, `paterno`, `materno`, `login`) VALUES
('RIAC', 'RIAC', 'CARLOS ARMANDO', 'RÍOS', 'ACEVEDO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_servicio`
--

DROP TABLE IF EXISTS `detalle_servicio`;
CREATE TABLE IF NOT EXISTS `detalle_servicio` (
  `id_detalle_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `precio_renta` decimal(9,2) NOT NULL,
  `unidades` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_servicio`),
  KEY `fk_detalle_servicio_servicio1_idx` (`id_servicio`),
  KEY `fk_detalle_servicio_producto1_idx` (`id_producto`),
  KEY `fk_detalle_servicio_staff1_idx` (`id_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_servicio`
--

INSERT INTO `detalle_servicio` (`id_detalle_servicio`, `precio_renta`, `unidades`, `id_servicio`, `id_producto`, `id_staff`) VALUES
(4, '4.00', 5, 4, 2, 2),
(5, '3.00', 4, 4, 2, 2),
(6, '5.00', 3, 4, 1, 1),
(7, '50.00', 10, 5, 2, 2),
(8, '2.00', 2, 5, 2, 2),
(9, '1.00', 1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(250) NOT NULL,
  `precio_unitario` decimal(9,2) NOT NULL,
  `unidades` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'activo',
  `foto` varchar(250) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_categoria1_idx` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `precio_unitario`, `unidades`, `estado`, `foto`, `id_categoria`) VALUES
(1, 'silla de madera', '5.00', 500, 'funcional', '1e62b-silla_madera1.jpg', 1),
(2, 'mesas de plástico', '25.00', 250, 'activas', 'b5240-mesa-plastico-plegable-d_nq_np_566001-mlm20262266702_032015-f.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_servicio` date NOT NULL,
  `fecha_instalacion` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `hora` time DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `id_staff` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `fk_servicio_cliente1_idx` (`curp`),
  KEY `fk_servicio_staff1_idx` (`id_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `fecha_servicio`, `fecha_instalacion`, `fecha_entrega`, `hora`, `descripcion`, `curp`, `id_staff`) VALUES
(4, '2018-03-23', '2018-03-24', '2018-03-25', '13:00:00', 'primera comunión', 'RIAC', 1),
(5, '2018-04-07', '2018-04-08', '2018-04-10', '23:05:00', 'servicio de graduación', 'RIAC', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id_staff` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  PRIMARY KEY (`id_staff`),
  KEY `fk_staff_usuario1_idx` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`id_staff`, `nombre`, `paterno`, `materno`, `login`) VALUES
(1, 'PEDRO', 'GARCÍA', 'JUAREZ', 'pedrito'),
(2, 'GUADALUPE', 'PEREZ', 'GARCIA', 'lupita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nivel`) VALUES
('admin', 'admin', 'administrador'),
('lupita', 'lupita', 'recepcionista'),
('pedrito', 'pedrito', 'instalador');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  ADD CONSTRAINT `fk_detalle_servicio_producto1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_servicio_servicio1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_servicio_staff1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_cliente1` FOREIGN KEY (`curp`) REFERENCES `cliente` (`curp`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicio_staff1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_usuario1` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
