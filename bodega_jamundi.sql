-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2023 a las 22:51:40
-- Versión del servidor: 5.5.33-MariaDB-log
-- Versión de PHP: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bodega_jamundi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `placa` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `tipo_id` int(10) NOT NULL,
  `ubicacion_id` int(10) DEFAULT NULL,
  `observacion` varchar(120) NOT NULL,
  `id_datos` int(11) DEFAULT NULL,
  PRIMARY KEY (`placa`),
  KEY `fk_tipo` (`tipo_id`),
  KEY `ubicacion_id` (`ubicacion_id`),
  KEY `fk_datos` (`id_datos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`placa`, `descripcion`, `tipo_id`, `ubicacion_id`, `observacion`, `id_datos`) VALUES
('S-0294', 'TORRE', 1, 39688, '', 8),
('S-0378', 'TORRE', 1, 39702, '', 66),
('S-0407', 'TORRE', 1, 39662, '', NULL),
('S-0728', 'TORRE', 1, 39682, '', 15),
('S-0749', 'TORRE', 1, 39734, '', 58),
('S-0789', 'TORRE', 1, 1009, '', NULL),
('S-0800', 'IMPRESORA TMU', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('S-0822', 'TORRE', 1, 39739, '', 19),
('S-0864', 'TORRE', 1, 39661, '', 12),
('S-0872', 'IMPRESORA TMU', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('S-0955', 'TORRE', 1, 39730, '', 44),
('S-0973', 'TORRE', 1, 1009, '', NULL),
('S-0978', 'TORRE', 1, 39681, '', 33),
('S-1001', 'TORRE', 1, 1009, '', NULL),
('S-1002', 'TORRE', 1, 1009, '', NULL),
('S-1003', 'TORRE', 1, 39685, '', NULL),
('S-1008', 'TORRE', 1, 1009, '', 91),
('S-1080', 'TORRE', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', 93),
('S-1081', 'TORRE', 1, 39728, '', 13),
('S-1086', 'TORRE', 1, 1009, '', 32),
('S-1087', 'TORRE', 1, 39689, '', 17),
('S-1114', 'TORRE', 1, 39720, '', 16),
('S-1116', 'TORRE', 1, 39666, '', 67),
('S-1134', 'TORRE', 1, 39685, 'SE SACA DE PUNTO DE VENTA POR QUE NO CUMPLE CON LAS CARACTERISTICAS DE FUNCIONAMIENTO', 49),
('S-1173', 'TORRE', 1, 39736, '', 45),
('S-1211', 'TORRE', 1, 39680, '', 71),
('S-1220', 'TORRE', 1, 39719, '', 14),
('S-1221', 'TORRE', 1, 1009, '', 50),
('S-1319', 'TORRE', 1, 1009, '', 43),
('S-1406', 'TORRE', 1, 39681, '', 34),
('S-1673', 'TORRE', 1, 39660, '', 63),
('S-1675', 'TORRE', 1, 39660, '', 62),
('S-1700', 'BATERIA', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('S-1708', 'TORRE', 1, 44174, '', 52),
('S-1716', 'TORRE', 1, 43896, '', 60),
('S-1757', 'TORRE', 1, 39662, '', 41),
('S-1833', 'TORRE', 1, 39741, '', 10),
('S-1834', 'TORRE', 1, 39685, 'SE REEMPLAZO POR QUE NO SOPORTA CLONACIÓN AL UBUNTO 22', 90),
('S-1835', 'TORRE', 1, 1009, '', NULL),
('S-1838', 'TORRE', 1, 39660, '', 61),
('S-1896', 'TORRE', 1, 39660, '', NULL),
('S-1904', 'TORRE', 1, 39726, '', 42),
('S-2048', 'TORRE', 1, 39674, '', 5),
('S-2050', 'TORRE', 1, 39690, '', 7),
('S-2207', 'TORRE', 1, 39665, '', NULL),
('S-2208', 'TORRE', 1, 39722, '', NULL),
('S-2287', 'CAMARA', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('S-2293', 'NVR', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('S-2382', 'TORRE', 1, 39693, '', 47),
('S-2448', 'MONITOR', 1, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('S-2454', 'TORRE', 1, 39700, '', 9),
('S-2456', 'TORRE', 1, 39672, '', 48),
('S-2468', 'TORRE', 1, 39735, '', 6),
('S-2932', 'TORRE', 1, 39721, '', 37),
('S-2936', 'TORRE', 1, 39664, '', 72),
('S-2938', 'TORRE', 1, 39703, '', 2),
('S-2939', 'TORRE', 1, 39671, '', 40),
('S-2946', 'TORRE', 1, 43965, '', 69),
('S-2947', 'TORRE', 1, 39740, '', 39),
('S-3031', 'TORRE', 1, 39654, '', 65),
('S-3032', 'TORRE', 1, 39659, '', 36),
('S-3038', 'TORRE', 1, 39674, '', 4),
('S-3051', 'TORRE', 1, 1009, '', 46),
('S-3086', 'TORRE', 1, 39733, '', 59),
('S-3156', 'TORRE', 1, 39724, '', 3),
('S-3184', 'TORRE', 1, 1009, '', 30),
('S-3185', 'TORRE', 1, 1009, '', NULL),
('S-3186', 'TORRE', 1, 39694, '', 99),
('S-3270', 'TORRE', 1, 1009, 'SE RETIRA DE PUNTO POR QUE NO FUNCIONA', 96),
('S-3272', 'TORRE', 1, 1009, '', NULL),
('S-3340', 'TORRE', 1, 1009, '', 31),
('S-3345', 'TORRE', 1, 39687, '', 25),
('S-3346', 'TORRE', 1, 44358, '', NULL),
('S-3347', 'TORRE', 1, 39737, '', 27),
('S-3408', 'TORRE', 1, 1009, '', 24),
('S-3409', 'TORRE', 1, 39673, '', 23),
('S-3410', 'TORRE', 1, 39678, '', 22),
('S-3473', 'TORRE', 1, 39699, '', NULL),
('S-3475', 'TORRE', 1, 39685, '', 68),
('S-3535', 'TORRE', 1, 44240, '', 21),
('S-3536', 'TORRE', 1, 39660, '', NULL),
('S-3538', 'TORRE', 1, 39727, '', 20),
('S-3543', 'TORRE', 1, 39683, '', 11),
('S-3619', 'TORRE', 1, 44244, '', NULL),
('S-3638', 'TORRE', 1, 39704, '', 64),
('S-3640', 'TORRE', 1, 39742, '', 98),
('S-3642', 'TORRE', 1, 39657, '', 53),
('S-3643', 'TORRE', 1, 39657, '', 54),
('S-3734', 'TORRE', 1, 39685, '', 92),
('S-3736', 'TORRE', 1, 1009, '', 26),
('S-3740', 'TORRE', 1, 44644, '', 57),
('S-3743', 'TORRE', 1, 1009, '', 51),
('S-3744', 'TORRE', 1, 44028, '', 97),
('S-3805', 'TORRE', 1, 39668, '', 95),
('S-3850', 'TORRE', 1, 39684, '', 18),
('S-3855', 'TORRE', 1, 39675, '', 28),
('S-3870', 'TORRE', 1, 43916, '', 70),
('S-4455', 'TORRE', 1, 1009, '', NULL),
('SI-0238', 'MULTITOMA', 2, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('SI-0267', 'INVERSOR', 2, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('SI-0921', 'SWITCH', 2, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('SI-1349', 'TECLADO', 2, 1009, 'SE RETIRA POR CIERRE DEL PUNTO', NULL),
('SI-1515', 'MOUSE', 2, 1009, 'SE RETIRA POR CIERRE DEL PUNTO, SE COLOCA SERIAL YA QUE NO ESTA RELACIONADO CON INSUMO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Coordinador de soporte y mantenimiento'),
(2, 'Técnico de soporte y mantenimiento'),
(3, 'Jefe Tecnologia'),
(5, 'Jefe Administrativa'),
(6, 'Aprendiz Sena Soporte y mantenimiento'),
(7, 'Jefe Telecomunicaciones'),
(8, 'Analista Telecomunicaciones'),
(9, 'Asistente Administracion'),
(10, 'Coordinador de telecomunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE IF NOT EXISTS `datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SISTEMAOPERATIVO` text NOT NULL,
  `CPU` text NOT NULL,
  `cache` text NOT NULL,
  `memoria` text NOT NULL,
  `almacenamiento` text NOT NULL,
  `direccion` text NOT NULL,
  `mac` text NOT NULL,
  `ultimo_mantenimiento` date NOT NULL,
  `proximo_mantenimiento` date NOT NULL,
  `año_lanzamiento` date NOT NULL,
  `fecha_compra` date NOT NULL,
  `V_CPU` float NOT NULL,
  `V_MEM` float NOT NULL,
  `V_DISCO` float NOT NULL,
  `V_FINAL` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `SISTEMAOPERATIVO`, `CPU`, `cache`, `memoria`, `almacenamiento`, `direccion`, `mac`, `ultimo_mantenimiento`, `proximo_mantenimiento`, `año_lanzamiento`, `fecha_compra`, `V_CPU`, `V_MEM`, `V_DISCO`, `V_FINAL`) VALUES
(2, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Celeron(R) CPU G550 @ 2.60GHz', '2048', '2', 'SSD', '172.18.2.188', 'd4:3d:7e:58:2e:fe', '2023-01-12', '2023-04-12', '2012-06-01', '2012-06-01', 3.5, 2, 4, 3.2),
(3, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G3930 @ 2.90GHz', '2048', '4', 'MECANICO', '4.4.4.22', ' 2c:fd:a1:59:53:24', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 4, 3, 3.5),
(4, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Pentium(R) CPU G4400 @ 3.30GHz', '3072', '4', 'SSD', '172.18.1.217', '30:9c:23:9a:7d:91', '2023-01-17', '2023-04-18', '2015-09-10', '2015-09-10', 3, 4, 4, 3.7),
(5, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '2', 'SSD', '172.18.1.220', '6c:62:6d:f5:27:de', '2023-01-17', '2023-04-18', '2010-01-04', '2010-01-04', 2.5, 2, 4, 2.8),
(6, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz ', '3072', '4', 'SSD', '172.18.3.133', '74:d4:35:47:bd:dd', '2023-01-11', '2023-04-11', '2012-09-01', '2012-09-01', 3.8, 4, 4, 3.9),
(7, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G550 @ 2.60GHz', '2048', '2', 'MECANICO', '172.18.1.229', '94:de:80:b6:e6:45', '2023-01-16', '2023-04-17', '2012-06-01', '2012-06-01', 3.5, 2, 3, 2.8),
(8, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '2', 'SSD', '172.18.2.53', '44:87:fc:b8:00:29', '2023-01-12', '2023-04-12', '2010-01-07', '2010-01-07', 2.5, 2, 4, 2.8),
(9, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3260 @ 3.30GHz ', '3070', '4', 'MECANICO', '172.18.1.157', 'd0:17:c2:97:57:4f', '2023-01-16', '2023-04-17', '2015-01-01', '2015-01-01', 3.2, 4, 3, 3.4),
(10, 'Ubuntu 20.04.4 LTS', 'Intel(R) Celeron(R) CPU G550 @ 2.60GHz', '2048', '3', 'SSD', '172.18.3.43', 'e0:3f:49:a0:46:2b ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 3, 4, 3.5),
(11, 'Ubuntu 16 1.0.1 LTS', 'Pentium(R) Dual-Core CPU E5400 @ 2.70GHz', '2048', '2', 'SSD', '172.18.2.98', ' 00:25:11:71:3b:d4', '2023-01-17', '2023-04-18', '2009-01-01', '2009-01-01', 2.5, 2, 4, 2.8),
(12, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Pentium(R) CPU G3260 @ 3.30GHz', '3072', '4', 'SSD', '172.18.2.27', '9c:5c:8e:84:e5:bf', '2023-01-17', '2023-04-18', '2015-01-01', '2015-01-01', 3.2, 4, 4, 3.7),
(13, 'Ubuntu 16.04.3 LTS', 'Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz', '3072', '4', 'MECANICO', '7.7.7.16', '74:d4:35:4e:2b:5d', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.8, 4, 3, 3.6),
(14, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3240 @ 3.10GHz ', '3072', '4', 'MECANICO', '5.5.5.4', '08:62:66:2b:e0:b8', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 4, 3, 3.3),
(15, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '6', 'SSD', '172.18.2.2', ' 44:87:fc:b8:16:43', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2.5, 4.5, 4, 3.7),
(16, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G1610 @ 2.60GHz ', '2048', '3', 'MECANICO', '4.4.4.17', 'e0:3f:49:a0:45:0c', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 3, 3, 3.2),
(17, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '2', 'MECANICO', '172.18.1.245', '00:30:67:9d:36:05', '2023-01-11', '2023-04-11', '2010-01-08', '2010-01-08', 2.5, 2, 3, 2.5),
(18, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G550 @ 2.60GHz', '2048', '2', 'SSD', '172.18.2.37   ', ' d4:3d:7e:58:2f:25', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 2, 4, 3.2),
(19, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU E3300  @ 2.50GHz', '1024', '4', 'SSD', '172.18.1.94', '8c:89:a5:8e:84:5f', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2.5, 4, 4, 3.5),
(20, 'Ubuntu 20.04.4 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '4', 'SSD', '7.7.7.15', ' d8:bb:c1:95:c8:08  ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(21, 'Ubuntu 20.04.4 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.1.140', 'd8:bb:c1:95:c7:88 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(22, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.2.162', ' 3c:7c:3f:29:b2:82', '2023-01-10', '2023-04-10', '2019-04-23', '2020-02-08', 4, 4, 4, 4),
(23, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz ', '6144', '4', 'SSD', '172.18.2.218', '3c:7c:3f:27:66:e0 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(24, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.2.125', '3c:7c:3f:27:68:56  ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(25, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.2.42 ', '18:c0:4d:88:06:31', '2023-01-17', '2023-04-18', '2019-04-23', '2019-04-23', 4, 4, 4, 4),
(26, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz ', '6144', '3', 'SSD', '172.18.2.22', 'a8:a1:59:b0:ca:3d  ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(27, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '3', 'SSD', '172.18.1.102', ' a8:a1:59:b0:d4:c5 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(28, 'Ubuntu 16.04.3 LTS ', 'Intel(R) Core(TM) i3-8100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.1.251', ' 0c:9d:92:11:31:c1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(30, 'Ubuntu 16.04.3 LTS', 'Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz', '6144', '3', 'SSD', '172.18.1.82', 'd4:5d:64:38:a8:f3', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(31, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz ', '6144', '4', 'SSD', '172.18.2.171', ' 24:4b:fe:cd:93:7c ', '2023-01-12', '2023-04-12', '2019-04-23', '2019-04-23', 4, 4, 4, 4),
(32, 'Ubuntu 16.04.3 LTS', 'Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz ', '3072', '4', 'SSD', '172.18.3.23', ' bc:ee:7b:99:fc:a3', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.8, 4, 4, 3.9),
(33, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '2', 'SSD', '172.18.2.233', '00:30:67:9b:00:b6', '2023-01-20', '2023-04-20', '2010-01-04', '2010-01-04', 2.5, 2, 4, 2.8),
(34, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Celeron(R) CPU G1610 @ 2.60GHz ', '2048', '6', 'MECANICO', '172.18.2.237', '94:de:80:16:31:3a ', '2023-01-20', '2023-04-20', '2012-12-13', '2012-12-13', 3.5, 4.5, 3, 3.7),
(35, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3250 @ 3.20GHz ', '3072', '3,7', 'SSD', '172.18.1.57', '9c:5c:8e:97:f2:fb', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.1, 4, 4, 3.7),
(36, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G1610 @ 2.60GHz ', '2048', '2', 'SSD', '172.18.3.101', '94:de:80:40:af:a1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 2, 4, 3.2),
(37, 'Ubuntu 16.04.3 LTS', 'Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz', '6144', '4', 'MECANICO', '4.4.4.14', '04:d4:c4:ac:6e:57', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 3, 3.7),
(38, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz ', '6144', '3,7', 'SSD', '172.18.2.114      ', 'a8:a1:59:b0:e3:86  ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(39, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '4', 'SSD', '172.18.1.10', '44:87:fc:b8:16:c1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2.5, 4, 4, 3.5),
(40, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Pentium(R) CPU G3260 @ 3.30GHz ', '3072', '4', 'SSD', '172.18.1.198', '1c:b7:2c:ad:c0:47', '2023-01-18', '2023-04-19', '2015-01-01', '2015-01-01', 3.2, 4, 4, 3.7),
(41, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz ', '3072', '4', 'SSD', '172.18.2.205', 'bc:ee:7b:9b:90:f0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.8, 4, 4, 3.9),
(42, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G550 @ 2.60GHz', '2048', '2', 'MECANICO', '6.6.6.8', ' d4:3d:7e:58:43:86', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 2, 3, 2.8),
(43, 'Ubuntu 16.04.3 LTS', 'AMD Athlon(tm) II X2 250 Processor', '1024', '2', 'MECANICO', '7.7.7.12', '6c:62:6d:f8:ba:62', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2, 2, 3, 2.3),
(44, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU G550 @ 2.60GHz', '2048', '2', 'SSD', '172.18.1.130 ', 'd4:3d:7e:58:2f:8b', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 2, 4, 3.2),
(45, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G2030 @ 3.00GHz ', '3072', '2', 'MECANICO', '172.18.1.70  ', '54:a0:50:e0:38:2b', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 2, 3, 2.7),
(46, 'Ubuntu 16.04.3 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '2', 'MECANICO', '172.18.2.140', '8c:89:a5:85:2e:64', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2.5, 2, 3, 2.5),
(47, 'Ubuntu 22.04.1 LTS', 'Intel(R) Celeron(R) CPU G3930 @ 2.90GHz', '2048', '4', 'SSD', '172.18.2.156 ', ' 10:7b:44:94:76:44  ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.5, 4, 4, 3.8),
(48, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Celeron(R) CPU E3400  @ 2.60GHz', '1024', '2', 'MECANICO', '172.18.1.190', '44:87:fc:b7:fd:e2', '2023-01-18', '2023-04-18', '2010-01-01', '2010-01-01', 2.5, 2, 3, 2.5),
(49, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3260 @ 3.30GHz', '3072', '2', 'SSD', '172.18.2.110 ', '70:8b:cd:a9:4b:09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.2, 2, 4, 3.1),
(50, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3240 @ 3.10GHz ', '3072', '4', 'MECANICO', '172.18.2.229', '10:c3:7b:4e:83:2d', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 4, 3, 3.3),
(51, 'Ubuntu 20.04.5 LTS ', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz ', '6144', '3', 'SSD', '172.18.1.119 ', 'a8:a1:59:b0:e3:32 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(52, 'Ubuntu 22.04.1 LTS', 'Intel(R) Pentium(R) CPU G2030 @ 3.00GHz ', '3072', '2', 'SSD', '172.18.1.110', '54:a0:50:e0:37:94 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 2, 4, 3),
(53, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '3', 'SSD', '10.98.98.5', 'a8:a1:59:b0:e5:96', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(54, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '3', 'SSD', '10.98.98.6', 'a8:a1:59:b0:ce:af', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(57, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz ', '6144', '3', 'SSD', '172.18.3.6', ' a8:a1:59:b0:ca:3e ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(58, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) Dual  CPU  E2200  @ 2.20GHz ', '1024', '2', 'SSD', '172.18.1.182', '8c:89:a5:85:33:9a', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2.5, 2, 4, 2.8),
(59, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3250 @ 3.20GHz ', '3072', '4', 'SSD', '172.18.1.78', ' 9c:5c:8e:97:f2:57', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.1, 4, 4, 3.7),
(60, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Celeron(R) CPU E3300  @ 2.50GHz', '1024', '3', 'SSD', '172.18.2.134', '00:25:22:29:19:03', '2023-01-12', '2023-04-12', '2009-08-07', '2009-08-07', 2.5, 3, 4, 3.2),
(61, 'Ubuntu 22.04.1 LTS', 'Intel(R) Pentium(R) CPU G3250 @ 3.20GHz ', '3072', '3', 'SSD', '172.18.1.61', ' 9c:5c:8e:97:f2:51 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.1, 3, 4, 3.4),
(62, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3250 @ 3.20GHz ', '3072', '4', 'SSD', '172.18.1.60', '9c:5c:8e:97:f2:1c', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.1, 4, 4, 3.7),
(63, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G3250 @ 3.20GHz ', '3072', '4', 'SSD', '172.18.1.57', '9c:5c:8e:97:f2:1c', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.1, 4, 4, 3.7),
(64, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '3', 'SSD', '172.18.2.182 ', 'a8:a1:59:b0:d2:9c ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 3, 4, 3.7),
(65, 'Ubuntu 16.04.3 LTS', 'Intel(R) Core(TM) i3-3250 CPU @ 3.50GHz', '3072', '4', 'SSD', '172.18.2.75', '74:d4:35:6f:cf:30', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.8, 4, 4, 3.9),
(66, 'Ubuntu 20.04.5 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz ', '6144', '4', 'SSD', '172.18.1.119 ', 'a8:a1:59:b0:e3:32 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(67, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz ', '3072', '2', 'MECANICO', '172.18.2.60', ' 74:d4:35:4d:b8:24 ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3.8, 2, 3, 2.9),
(68, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.1.163 ', ' d4:5d:64:38:a0:7f', '2023-01-11', '2023-04-11', '2019-01-07', '2020-02-08', 4, 4, 4, 4),
(69, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz ', '6144', '4', 'SSD', '172.18.3.2', ' a8:a1:59:b0:ca:3e ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 4, 4, 4, 4),
(70, 'Ubuntu 16.04.3 LTS', 'Intel(R) Pentium(R) CPU G4400 @ 3.30GHz ', '3072', '4', 'MECANICO', '4.4.4.5 ', '30:9c:23:9b:1d:99', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 4, 3, 3.3),
(71, 'Ubuntu 16 1.0.1 LTS', 'Intel(R) Pentium(R) CPU G3240 @ 3.10GHz ', '3072', '4', 'MECANICO', '172.18.2.229', '10:c3:7b:4e:83:2d', '2023-01-19', '2023-04-19', '2014-02-03', '2014-02-03', 2, 2, 2, 2),
(72, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Pentium(R) CPU G3220 @ 3.00GHz ', '3072', '3', 'SSD', '172.18.1.5', ' e0:3f:49:b1:8f:0b ', '2023-01-18', '2023-04-19', '2013-09-04', '2013-09-04', 3, 3, 4, 3.3),
(90, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Celeron(R) CPU G3930', '512', '4', 'SSD', '172.18.2.107', '2c:4d:54:52:c8:a8', '2023-03-02', '2023-07-02', '2017-01-01', '2017-05-05', 2, 2, 2, 2),
(91, 'Ubuntu 22.1.0.8 LTS', 'CORE 5', '6144', '2', 'MECANICO', '10.98.98.6', '085GD6FG4D5', '2023-02-15', '2023-03-15', '2018-01-02', '2020-06-03', 2, 3, 2.5, 2.5),
(92, 'Ubuntu 22.04.1 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz', '6144', '3', 'SSD', '172.18.2.106 ', 'a8:a1:59:b0:da:56', '2023-03-03', '2023-06-01', '2021-03-01', '2019-06-03', 4, 2.5, 3, 3.2),
(93, 'Ubuntu 16 1.0.1 LTS', 'intel(r) celeron(r) cpu g550 @ 2.60ghz 2.60 ghz', '250', '2', 'MECANICO', '172.18.2.14', '74:D4:35:4E:22:00', '2022-10-07', '2023-03-06', '2012-06-01', '2012-06-01', 2, 1, 1, 1.3),
(94, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.1.20', ' d4:5d:64:38:aa:d9', '2023-01-16', '2023-04-17', '2019-01-07', '2019-01-07', 4, 3, 4, 3.7),
(95, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.1.20', ' d4:5d:64:38:aa:d9', '2023-01-16', '2023-04-17', '2019-01-07', '2019-01-07', 4, 3, 4, 3.7),
(96, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.2.171', ' 24:4b:fe:cd:93:7c', '2023-01-12', '2023-04-12', '2019-04-23', '2019-04-23', 4, 4, 4, 4),
(97, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.2.170', 'a8:a1:59:b0:e9:80', '2023-03-13', '2023-04-13', '2021-03-01', '2021-03-01', 5, 5, 5, 5),
(98, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz', '6144', '4', 'SSD', '172.18.1.102', 'a8:a1:59:b0:d4:c5', '2023-01-19', '2023-04-19', '2020-04-30', '2020-04-30', 4, 4, 4, 4),
(99, 'Ubuntu 22.1.0.8 LTS', 'Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz', '3072', '4', 'SSD', '172.18.3.23', 'bc:ee:7b:99:fc:a3', '2023-01-20', '2023-04-20', '2012-09-01', '2012-09-01', 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `descripcion`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `operacion` varchar(500) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `id_relacionado` varchar(30) NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=82 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `usuario`, `operacion`, `tabla`, `id_relacionado`, `Fecha`) VALUES
(9, 'CP6333654', 'ingreso placa: S-1009 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: PRUEBA', 'Articulo', 'S-1009', '2023-03-02 09:35:32'),
(10, 'CP6333654', 'ingreso dato: 89 Sistema: LINUZ 22 cpu: CORE 5 cache: 6144 memoria: 2 almac: SSD ip: 10.98.98.6 mac: 085GD6FG4D5', 'datos', '89', '2023-03-02 09:37:01'),
(11, 'CP6333654', 'Modifico dato: 89 Sistema: LINUZ 22 cpu: CORE 5 cache: 6144 memoria: 2 almac: SSD ip: 10.98.98.6 mac: 085GD6FG4D5', 'datos', '89', '2023-03-02 09:38:12'),
(12, 'CP6333654', 'ingreso placa: S-1834 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: ', 'Articulo', 'S-1834', '2023-03-02 12:38:57'),
(13, 'CP6333654', 'ingreso dato: 90 Sistema: UBUNTU 22 cpu: Intel(R) Celeron(R) CPU G3930 cache: 512 memoria: 4 almac: SSD ip: 172.18.2.107 mac: 2c:4d:54:52:c8:a8', 'datos', '90', '2023-03-02 12:43:59'),
(14, 'CP6333654', 'ingreso placa: S-1834 ubicacion: 39685 incidente: 115855 usuarioEntrega: 1112488246 UsuarioRecibe: 6333654', 'Movimientos', '2', '2023-03-02 12:45:41'),
(15, 'CP16845855', 'modifico placa: S-1134 descripcion: TORRE tipo_id: 1 ubicacion: 39685 observacion: ', 'Articulo', 'S-1134', '2023-03-02 14:14:32'),
(16, 'CP16845855', 'modifico placa: S-1134 descripcion: TORRE tipo_id: 1 ubicacion: 39685 observacion: SE SACA DE PUNTO DE VENTA POR QUE NO CUMPLE CON LAS CARACTERISTICAS DE FUNCIONAMIENTO', 'Articulo', 'S-1134', '2023-03-02 14:14:50'),
(17, 'CP16845855', 'ingreso placa: S-1008 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: ', 'Articulo', 'S-1008', '2023-03-02 14:15:35'),
(18, 'CP16845855', 'ingreso dato: 91 Sistema: UBUNTU 22 cpu: CORE 5 cache: 6144 memoria: 2 almac: MECANICO ip: 10.98.98.6 mac: 085GD6FG4D5', 'datos', '91', '2023-03-02 14:18:09'),
(19, 'CP16845855', 'Modifico dato: 91 Sistema: UBUNTU 22 cpu: CORE 5 cache: 6144 memoria: 2 almac: MECANICO ip: 10.98.98.6 mac: 085GD6FG4D5', 'datos', '91', '2023-03-02 14:19:01'),
(20, 'CP16845855', 'ingreso placa: S-1003 ubicacion: 39685 incidente: 112536 usuarioEntrega: 1112488246 UsuarioRecibe: 16845855', 'Movimientos', '3', '2023-03-02 14:20:01'),
(21, 'CP6333654', 'ingreso Simcard: 9103208630 serie: 57101602312174326 usuario: ANGIE clave: NO APLICA Apn: CODECALI2.COMCEL.COM.CO plan: NO APLICA ubicacion: 1009 observacion: DEVOLUCION DE ANGIE LLANTEN A BODEGA', 'Simcard', '9103208630', '2023-03-03 10:31:38'),
(22, 'CP16845855', 'ingreso placa: S-3734 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: ', 'Articulo', 'S-3734', '2023-03-03 16:55:14'),
(23, 'CP16845855', 'ingreso dato: 92 Sistema: Ubuntu 22.04.1 LTS v 1.0.8 cpu: Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz cache: 6144 memoria: 3 almac: SSD ip: 172.18.2.106  mac: a8:a1:59:b0:da:56', 'datos', '92', '2023-03-03 17:00:11'),
(24, 'CP16845855', 'ingreso placa: S-3734 ubicacion: 39685 incidente: 115955 usuarioEntrega: 1112488246 UsuarioRecibe: 16845855', 'Movimientos', '4', '2023-03-03 17:01:20'),
(25, 'CP16845855', 'modifico placa: S-1834 descripcion: TORRE tipo_id: 1 ubicacion: 39685 observacion: SE REEMPLAZO POR QUE NO SOPORTA CLONACIÓN AL UBUNTO 22', 'Articulo', 'S-1834', '2023-03-03 17:03:53'),
(26, 'CP16845855', 'ingreso placa: S-2448 descripcion: MONITOR tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-2448', '2023-03-07 10:26:46'),
(27, 'CP16845855', 'ingreso placa: S-1080 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-1080', '2023-03-07 10:35:44'),
(28, 'CP16845855', 'ingreso dato: 93 Sistema: UBUNTU 16 cpu: intel(r) celeron(r) cpu g550 @ 2.60ghz 2.60 ghz cache: 250 memoria: 2 almac: MECANICO ip: 172.18.2.14 mac: 74:D4:35:4E:22:00', 'datos', '93', '2023-03-07 10:54:55'),
(29, 'CP16845855', 'ingreso placa: SI-1349 descripcion: TECLADO tipo_id: 2 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'SI-1349', '2023-03-07 10:57:29'),
(30, 'CP16845855', 'ingreso placa: SI-0267 descripcion: INVERSOR tipo_id: 2 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'SI-0267', '2023-03-07 11:02:22'),
(31, 'CP16845855', 'ingreso placa: S-0800 descripcion: IMPRESORA TMU tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-0800', '2023-03-07 11:11:46'),
(32, 'CP16845855', 'ingreso placa: S-0872 descripcion: IMPRESORA TMU tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-0872', '2023-03-07 11:12:19'),
(33, 'CP16845855', 'ingreso placa: S-1700 descripcion: BATERIA tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-1700', '2023-03-07 11:13:23'),
(34, 'CP16845855', 'ingreso placa: S-2293 descripcion: NVR tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-2293', '2023-03-07 11:14:24'),
(35, 'CP16845855', 'ingreso placa: SI-0238 descripcion: MULTITOMA tipo_id: 2 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'SI-0238', '2023-03-07 11:16:58'),
(36, 'CP16845855', 'ingreso placa: SI-0921 descripcion: SWITCH tipo_id: 2 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'SI-0921', '2023-03-07 11:17:22'),
(37, 'CP16845855', 'ingreso placa: S-2287 descripcion: CAMARA tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO', 'Articulo', 'S-2287', '2023-03-07 11:18:12'),
(38, 'CP16845855', 'ingreso placa: SI-1515 descripcion: MOUSE tipo_id: 2 ubicacion: 1009 observacion: SE RETIRA POR CIERRE DEL PUNTO, SE COLOCA SERIAL YA QUE NO ESTA RELACIONADO CON INSUMO', 'Articulo', 'SI-1515', '2023-03-07 11:26:55'),
(39, 'CP16845855', 'Modifico dato: 22 Sistema: UBUNTU 22 cpu: Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.2.162 mac:  3c:7c:3f:29:b2:82', 'datos', '22', '2023-03-08 09:33:18'),
(40, 'CP16845855', 'Modifico dato: 6 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz  cache: 3072 memoria: 4 almac: SSD ip: 172.18.3.133 mac: 74:d4:35:47:bd:dd', 'datos', '6', '2023-03-08 09:46:46'),
(41, 'CP16845855', 'Modifico dato: 17 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Celeron(R) CPU E3400  @ 2.60GHz cache: 1024 memoria: 2 almac: MECANICO ip: 172.18.1.245 mac: 00:30:67:9d:36:05', 'datos', '17', '2023-03-08 09:49:10'),
(42, 'CP16845855', 'Modifico dato: 68 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.1.163  mac:  d4:5d:64:38:a0:7f', 'datos', '68', '2023-03-08 09:54:00'),
(43, 'CP16845855', 'Modifico dato: 8 Sistema: Ubuntu 22 1.0.8 LTS cpu: Intel(R) Celeron(R) CPU E3400  @ 2.60GHz cache: 1024 memoria: 2 almac: SSD ip: 172.18.2.53 mac: 44:87:fc:b8:00:29', 'datos', '8', '2023-03-08 09:56:32'),
(44, 'CP16845855', 'Modifico dato: 60 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Celeron(R) CPU E3300  @ 2.50GHz cache: 1024 memoria: 3 almac: SSD ip: 172.18.2.134 mac: 00:25:22:29:19:03', 'datos', '60', '2023-03-08 09:59:03'),
(45, 'CP16845855', 'Modifico dato: 2 Sistema: Ubuntu 16.04.3 LTS cpu: Intel(R) Celeron(R) CPU G550 @ 2.60GHz cache: 2048 memoria: 2 almac: SSD ip: 172.18.2.188 mac: d4:3d:7e:58:2e:fe', 'datos', '2', '2023-03-08 10:01:08'),
(46, 'CP16845855', 'Modifico dato: 31 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz  cache: 6144 memoria: 4 almac: SSD ip: 172.18.2.171 mac:  24:4b:fe:cd:93:7c ', 'datos', '31', '2023-03-08 10:10:41'),
(47, 'CP16845855', 'ingreso placa: S-3805 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: ', 'Articulo', 'S-3805', '2023-03-10 08:39:32'),
(48, 'CP16845855', 'ingreso dato: 94 Sistema: Ubuntu 22.1.0.8 LTS cpu: Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.1.20 mac:  d4:5d:64:38:aa:d9', 'datos', '94', '2023-03-10 08:54:29'),
(49, 'CP16845855', 'ingreso dato: 95 Sistema: Ubuntu 22.1.0.8 LTS cpu: Intel(R) Core(TM) i3-9100F CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.1.20 mac:  d4:5d:64:38:aa:d9', 'datos', '95', '2023-03-10 09:09:21'),
(50, 'CP16845855', 'ingreso placa: S-3538 ubicacion: 39671 incidente: 116330 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '5', '2023-03-10 09:10:48'),
(51, 'CP16845855', 'Modifico dato: 9 Sistema: Ubuntu 16.04.3 LTS cpu: Intel(R) Pentium(R) CPU G3260 @ 3.30GHz  cache: 3070 memoria: 4 almac: MECANICO ip: 172.18.1.157 mac: d0:17:c2:97:57:4f', 'datos', '9', '2023-03-10 09:25:27'),
(52, 'CP16845855', 'Modifico dato: 7 Sistema: Ubuntu 16.04.3 LTS cpu: Intel(R) Celeron(R) CPU G550 @ 2.60GHz cache: 2048 memoria: 2 almac: MECANICO ip: 172.18.1.229 mac: 94:de:80:b6:e6:45', 'datos', '7', '2023-03-10 09:30:35'),
(53, 'CP16845855', 'modifico placa: S-3538 ubicacion: 39727 incidente: 116330 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '5', '2023-03-10 09:35:22'),
(54, 'CP16845855', 'modifico placa: S-3538 ubicacion: 39727 incidente: 00000 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '5', '2023-03-10 09:36:23'),
(55, 'CP16845855', 'ingreso placa: S-3805 ubicacion: 39671 incidente: 116330 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '6', '2023-03-10 09:37:00'),
(56, 'CP16845855', 'Modifico dato: 25 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.2.42  mac: 18:c0:4d:88:06:31', 'datos', '25', '2023-03-10 09:40:11'),
(57, 'CP16845855', 'Modifico dato: 2 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Celeron(R) CPU G550 @ 2.60GHz cache: 2048 memoria: 2 almac: SSD ip: 172.18.2.188 mac: d4:3d:7e:58:2e:fe', 'datos', '2', '2023-03-10 09:41:19'),
(58, 'CP16845855', 'Modifico dato: 12 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Pentium(R) CPU G3260 @ 3.30GHz cache: 3072 memoria: 4 almac: SSD ip: 172.18.2.27 mac: 9c:5c:8e:84:e5:bf', 'datos', '12', '2023-03-10 09:46:12'),
(59, 'CP16845855', 'Modifico dato: 11 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Pentium(R) Dual-Core CPU E5400 @ 2.70GHz cache: 2048 memoria: 2 almac: SSD ip: 172.18.2.98 mac:  00:25:11:71:3b:d4', 'datos', '11', '2023-03-10 09:49:03'),
(60, 'CP16845855', 'Modifico dato: 5 Sistema: Ubuntu 16 1.0.1 LTS cpu: Intel(R) Celeron(R) CPU E3400  @ 2.60GHz cache: 1024 memoria: 2 almac: SSD ip: 172.18.1.220 mac: 6c:62:6d:f5:27:de', 'datos', '5', '2023-03-10 09:53:58'),
(61, 'CP16845855', 'Modifico dato: 4 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Pentium(R) CPU G4400 @ 3.30GHz cache: 3072 memoria: 4 almac: SSD ip: 172.18.1.217 mac: 30:9c:23:9a:7d:91', 'datos', '4', '2023-03-10 09:57:05'),
(62, 'CP16845855', 'ingreso placa: S-2936 ubicacion: 39664 incidente: 116335 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '7', '2023-03-10 10:07:13'),
(63, 'CP16845855', 'Modifico dato: 72 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Pentium(R) CPU G3220 @ 3.00GHz  cache: 3072 memoria: 3 almac: SSD ip: 172.18.1.5 mac:  e0:3f:49:b1:8f:0b ', 'datos', '72', '2023-03-10 10:10:57'),
(64, 'CP16845855', 'modifico placa: S-3538 ubicacion: 39727 incidente: 0 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '5', '2023-03-10 10:39:22'),
(65, 'CP16845855', 'modifico placa: S-3805 ubicacion: 39668 incidente: 116330 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '6', '2023-03-10 10:58:10'),
(66, 'CP16845855', 'ingreso placa: S-2939 ubicacion: 39671 incidente: 116343 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '8', '2023-03-10 11:12:16'),
(67, 'CP16845855', 'Modifico dato: 40 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Pentium(R) CPU G3260 @ 3.30GHz  cache: 3072 memoria: 4 almac: SSD ip: 172.18.1.198 mac: 1c:b7:2c:ad:c0:47', 'datos', '40', '2023-03-10 11:17:45'),
(68, 'CP16845855', 'ingreso placa: S-3340 ubicacion: 1009 incidente: 116384 usuarioEntrega: 16845855 UsuarioRecibe: 1112488246', 'Movimientos', '9', '2023-03-11 09:13:05'),
(69, 'CP16845855', 'ingreso placa: S-3270 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: SE RETIRA DE PUNTO POR QUE NO FUNCIONA', 'Articulo', 'S-3270', '2023-03-13 09:36:20'),
(70, 'CP16845855', 'ingreso dato: 96 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Core(TM) i3-9100 CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.2.171 mac:  24:4b:fe:cd:93:7c', 'datos', '96', '2023-03-13 09:45:43'),
(71, 'CP16845855', 'ingreso placa: S-3744 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: ', 'Articulo', 'S-3744', '2023-03-13 09:50:17'),
(72, 'CP16845855', 'ingreso dato: 97 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Core(TM) i3-10100F CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.2.170 mac: a8:a1:59:b0:e9:80', 'datos', '97', '2023-03-13 10:04:08'),
(73, 'CP16845855', 'ingreso placa: S-3744 ubicacion: 44028 incidente: 116384 usuarioEntrega: 1112488246 UsuarioRecibe: 16845855', 'Movimientos', '11', '2023-03-13 10:05:49'),
(74, 'CP16845855', 'Modifico dato: 48 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Celeron(R) CPU E3400  @ 2.60GHz cache: 1024 memoria: 2 almac: MECANICO ip: 172.18.1.190 mac: 44:87:fc:b7:fd:e2', 'datos', '48', '2023-03-13 10:26:10'),
(75, 'CP16845855', 'ingreso placa: S-3640 descripcion: TORRE tipo_id: 1 ubicacion: 1009 observacion: ', 'Articulo', 'S-3640', '2023-03-13 12:05:55'),
(76, 'CP16845855', 'ingreso dato: 98 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Core(TM) i3-10100 CPU @ 3.60GHz cache: 6144 memoria: 4 almac: SSD ip: 172.18.1.102 mac: a8:a1:59:b0:d4:c5', 'datos', '98', '2023-03-13 12:15:23'),
(77, 'CP16845855', 'ingreso placa: S-3640 ubicacion: 39742 incidente: 116458 usuarioEntrega: 16845855 UsuarioRecibe: 16845855', 'Movimientos', '12', '2023-03-13 12:23:12'),
(78, 'CP16845855', 'Modifico dato: 71 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Pentium(R) CPU G3240 @ 3.10GHz  cache: 3072 memoria: 4 almac: MECANICO ip: 172.18.2.229 mac: 10:c3:7b:4e:83:2d', 'datos', '71', '2023-03-13 12:39:20'),
(79, 'CP16845855', 'Modifico dato: 33 Sistema: Ubuntu 16. 1.0.1 LTS cpu: Intel(R) Celeron(R) CPU E3400  @ 2.60GHz cache: 1024 memoria: 2 almac: SSD ip: 172.18.2.233 mac: 00:30:67:9b:00:b6', 'datos', '33', '2023-03-13 12:45:07'),
(80, 'CP16845855', 'Modifico dato: 34 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Celeron(R) CPU G1610 @ 2.60GHz  cache: 2048 memoria: 6 almac: MECANICO ip: 172.18.2.237 mac: 94:de:80:16:31:3a ', 'datos', '34', '2023-03-13 12:47:21'),
(81, 'CP16845855', 'ingreso dato: 99 Sistema: Ubuntu 22. 1.0.8 LTS cpu: Intel(R) Core(TM) i3-3240 CPU @ 3.40GHz cache: 3072 memoria: 4 almac: SSD ip: 172.18.3.23 mac: bc:ee:7b:99:fc:a3', 'datos', '99', '2023-03-13 12:57:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `articulo_id` varchar(30) NOT NULL,
  `ubicacion_id` int(10) NOT NULL,
  `incidente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_entrega_id` int(10) NOT NULL,
  `usuario_recibe_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articulo_id` (`articulo_id`),
  KEY `ubicacion_id` (`ubicacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `articulo_id`, `ubicacion_id`, `incidente`, `fecha`, `usuario_entrega_id`, `usuario_recibe_id`) VALUES
(2, 'S-1834', 39685, 115855, '2023-03-02', 1112488246, 6333654),
(3, 'S-1003', 39685, 112536, '2023-03-02', 1112488246, 16845855),
(4, 'S-3734', 39685, 115955, '2023-03-03', 1112488246, 16845855),
(5, 'S-3538', 39727, 0, '2023-03-10', 16845855, 16845855),
(6, 'S-3805', 39668, 116330, '2023-03-10', 16845855, 16845855),
(7, 'S-2936', 39664, 116335, '2023-03-10', 16845855, 16845855),
(8, 'S-2939', 39671, 116343, '2023-03-10', 16845855, 16845855),
(9, 'S-3340', 1009, 116384, '2023-03-11', 16845855, 1112488246),
(11, 'S-3744', 44028, 116384, '2023-03-13', 1112488246, 16845855),
(12, 'S-3640', 39742, 116458, '2023-03-13', 16845855, 16845855);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientossimcard`
--

CREATE TABLE IF NOT EXISTS `movimientossimcard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `simcard_id` bigint(15) NOT NULL,
  `ubicacion_id` int(10) NOT NULL,
  `incidente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_realiza` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `simcard_id` (`simcard_id`),
  KEY `ubicacion_id` (`ubicacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE IF NOT EXISTS `operador` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`id`, `descripcion`) VALUES
(1, 'Claro'),
(2, 'Movistar'),
(3, 'Tigo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simcard`
--

CREATE TABLE IF NOT EXISTS `simcard` (
  `Numero_linea` bigint(15) NOT NULL,
  `Serie` bigint(20) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Apn` varchar(40) NOT NULL,
  `Plan` varchar(30) NOT NULL,
  `operador` int(5) NOT NULL,
  `Ubicacion_id` int(10) DEFAULT NULL,
  `Observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`Numero_linea`),
  KEY `operador` (`operador`),
  KEY `Ubicacion_id` (`Ubicacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `simcard`
--

INSERT INTO `simcard` (`Numero_linea`, `Serie`, `Usuario`, `Clave`, `Apn`, `Plan`, `operador`, `Ubicacion_id`, `Observacion`) VALUES
(9103208630, 57101602312174326, 'ANGIE', 'NO APLICA', 'CODECALI2.COMCEL.COM.CO', 'NO APLICA', 1, 1009, 'DEVOLUCION DE ANGIE LLANTEN A BODEGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_articulo`
--

CREATE TABLE IF NOT EXISTS `tipo_articulo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_articulo`
--

INSERT INTO `tipo_articulo` (`id`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Insumo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=44645 ;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `descripcion`) VALUES
(1, 'BAJA'),
(1004, 'OFICINA PRINCIPAL'),
(1009, 'Bodega principal'),
(39653, 'CAJA PRINCIPAL JAMUNDI'),
(39654, 'PUNTO PARQUE 2'),
(39657, 'PUNTO SEDE PPAL JAMUNDI  '),
(39658, 'CC JAMUNDI PLAZA  '),
(39659, 'PUNTO PARQUEADERO  '),
(39660, 'PUNTO PALACE'),
(39661, 'PUNTO LA ESMERALDA  '),
(39662, 'MONSERRATE  '),
(39664, 'SIMON BOLIVAR  '),
(39665, 'PUNTO COMFANDI'),
(39666, 'LAVADERO RIO CLARO  '),
(39668, 'Comfandi Nuevo - CR 11 13 44'),
(39671, 'Punto suerte - CR 7 14 15'),
(39672, 'FLORENCIA  '),
(39673, 'LOS PINOS  '),
(39674, 'GALERIA  '),
(39675, 'PUNTO CARIBE  '),
(39678, 'PUNTO INTER  '),
(39680, 'CENTENARIO  '),
(39681, 'MONTEBELLO'),
(39682, 'CIRCUNVALAR'),
(39683, 'PARQUE DEL AMOR  '),
(39684, 'PUNTO ANGEL M CAMACHO  '),
(39685, 'PORTAL JORDAN  '),
(39686, 'PORTAL JORDAN 2  '),
(39687, 'PORTAL DE JAMUNDI 2'),
(39688, 'PORTAL DE JAMUNDI 1  '),
(39689, 'VILLEGAS  '),
(39690, 'EL SOCORRO  '),
(39691, 'PUNTO NUEVO ADRIANITA  '),
(39692, 'ESTACION  '),
(39693, 'SACHAMATE 1'),
(39694, 'SACHAMATE 2  '),
(39697, 'TIENDA DIEGO CEBALLOS'),
(39698, 'PUNTO EL ROSARIO  '),
(39699, 'HOSPITAL JAMUNDI'),
(39700, 'PUNTO LA GRAN COLOMBIA'),
(39702, 'LA 14 ALFAGUARA'),
(39703, 'PUNTO LA PRADERA  '),
(39704, 'SONOCO  '),
(39719, 'VILLAPAZ  '),
(39720, 'PUNTO LA VENTURA'),
(39721, 'POTRERITO  '),
(39722, 'SAN ANTONIO'),
(39723, 'ROBLES 3'),
(39724, 'TIMBA  '),
(39726, 'ROBLES  '),
(39727, 'ROBLES  NUEVO  '),
(39728, 'QUINAMAYO 1  '),
(39730, 'PASO LA BOLSA'),
(39733, 'TERRANOVA 6  '),
(39734, 'PUNTO TERRANOVA 8  '),
(39735, 'PUNTO BONANZA 3  '),
(39736, 'TERRANOVA 5  '),
(39737, 'TERRANOVA 3  '),
(39739, 'TERRANOVA 1'),
(39740, 'PUNTO BONANZA 1  '),
(39741, 'PUNTO BONANZA 2'),
(39742, 'TERRANOVA SEMAFORO'),
(39743, 'TERRANOVA 2  '),
(39777, 'TIENDA TAT LA ESTACION '),
(43730, 'TIENDA TAT BONANZA'),
(43836, 'TIENDA TAT TERRANOVA'),
(43894, 'TIENDA TAT ALFEREZ REAL'),
(43896, 'VILLAPAULINA'),
(43916, 'TIENDA TAT POTRERITO'),
(43965, 'PAISAJE LAS FLORES '),
(44006, 'TIENDA TAT CONDADOS'),
(44014, 'TIENDA TAT PAULA CAMACHO '),
(44028, 'PUNTO ESPA¥A '),
(44039, 'PUNTO MABELLA'),
(44174, 'PUNTO PILOTO'),
(44222, 'TIENDA TAT CANTABRIA'),
(44232, 'TIENDA TAT TERRANOVA 2'),
(44240, 'CIUDADELA LAS FLORES'),
(44244, 'PUNTO FARALLONES'),
(44294, 'TIENDA CANTABRIA 2'),
(44358, 'PUNTO NUEVO CARIBE'),
(44384, 'CAJA PRINCIPAL JAMUNDI'),
(44557, 'PUNTO LAS FLORES'),
(44643, 'PAISAJE LAS FLORES 2'),
(44644, 'PUNTO FARALLONES 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `cargo_id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `estado_id` int(6) NOT NULL,
  PRIMARY KEY (`cedula`),
  KEY `cargo_id` (`cargo_id`),
  KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `apellidos`, `cargo_id`, `username`, `password`, `estado_id`) VALUES
(1234, 'Root', 'Root', 2, '1234', '1234', 1),
(6333654, 'GUZMAN MAURICIO', 'GUERRERO', 2, NULL, NULL, 1),
(16845855, 'WILMER', 'MARIN', 2, NULL, NULL, 1),
(1061793425, 'JEFFESON ', 'PAZ', 2, 'CP1061793425', 'CP425', 1),
(1112463963, 'MILTON FABIAN', 'PECHENE BURBANO ', 1, 'CP1112463963', 'CP963', 1),
(1112488246, 'HELLEN SOLANGUIE', 'ARBOLEDA HURTADO', 9, NULL, NULL, 1),
(1114952157, 'SEBASTIAN', 'CARVAJAL', 6, NULL, NULL, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`id`),
  ADD CONSTRAINT `fk_datos` FOREIGN KEY (`id_datos`) REFERENCES `datos` (`id`),
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_articulo` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`placa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_5` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`id`);

--
-- Filtros para la tabla `movimientossimcard`
--
ALTER TABLE `movimientossimcard`
  ADD CONSTRAINT `movimientossimcard_ibfk_1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientossimcard_ibfk_3` FOREIGN KEY (`simcard_id`) REFERENCES `simcard` (`Numero_linea`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `simcard`
--
ALTER TABLE `simcard`
  ADD CONSTRAINT `simcard_ibfk_1` FOREIGN KEY (`operador`) REFERENCES `operador` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `simcard_ibfk_2` FOREIGN KEY (`Ubicacion_id`) REFERENCES `ubicacion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
