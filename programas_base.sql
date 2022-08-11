-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2022 a las 20:15:50
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(100) NOT NULL,
  `numero_actividad` int(100) NOT NULL,
  `nombre_actividad` varchar(255) NOT NULL,
  `unidad_medida` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_componente` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `numero_actividad`, `nombre_actividad`, `unidad_medida`, `id_usuario`, `id_componente`) VALUES
(2, 1, 'Realizar obras de techo firme', 'cantidad de obras', 4, 2),
(3, 2, 'lkadjasdjk', 'sahjd', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_detalle`
--

CREATE TABLE `actividades_detalle` (
  `id_actividad_detalle` int(100) NOT NULL,
  `indicador_realizado` int(255) DEFAULT NULL,
  `poblacion_atendida` int(11) DEFAULT NULL,
  `hombres` int(11) DEFAULT NULL,
  `mujeres` int(11) DEFAULT NULL,
  `servicios_aplicados` varchar(255) DEFAULT NULL,
  `descripcion_evidencia` varchar(255) DEFAULT NULL,
  `id_actividad` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_fechas`
--

CREATE TABLE `actividades_fechas` (
  `id_actividad_fecha` int(100) NOT NULL,
  `mes` varchar(100) NOT NULL,
  `cantidad_programada` int(100) NOT NULL,
  `id_actividad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades_fechas`
--

INSERT INTO `actividades_fechas` (`id_actividad_fecha`, `mes`, `cantidad_programada`, `id_actividad`) VALUES
(1, 'enero', 1, 2),
(2, 'febrero', 0, 2),
(3, 'marzo', 2, 2),
(4, 'abril', 0, 2),
(5, 'mayo', 0, 2),
(6, 'junio', 1, 2),
(7, 'julio', 0, 2),
(8, 'agosto', 0, 2),
(9, 'septiembre', 1, 2),
(10, 'octubre', 1, 2),
(11, 'noviembre', 0, 2),
(12, 'diciembre', 3, 2),
(13, 'enero', 1, 3),
(14, 'febrero', 1, 3),
(15, 'marzo', 2, 3),
(16, 'abril', 0, 3),
(17, 'mayo', 1, 3),
(18, 'junio', 1, 3),
(19, 'julio', 2, 3),
(20, 'agosto', 2, 3),
(21, 'septiembre', 3, 3),
(22, 'octubre', 1, 3),
(23, 'noviembre', 3, 3),
(24, 'diciembre', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id_componente` int(100) NOT NULL,
  `numero_componente` int(10) NOT NULL,
  `resumen_narrativo` varchar(255) NOT NULL,
  `nombre_componente` varchar(255) NOT NULL,
  `id_programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id_componente`, `numero_componente`, `resumen_narrativo`, `nombre_componente`, `id_programa`) VALUES
(1, 2, 'Relizar diferentes tipos de viviendas en las zonas de resago economico para que las familias tengan una mejor calidad de vida', 'Realizar obras para la dignificacion de la vivienda', 2),
(2, 1, 'Ejecucion de obras de infraestructura', 'Ejecucion de obras de infraestructura', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL,
  `NombreMunicipio` varchar(255) NOT NULL,
  `claveMunicipio` varchar(15) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `membrete` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `NombreMunicipio`, `claveMunicipio`, `logo`, `membrete`) VALUES
(1, 'Acajete', '16/02', 'ACAJETElogo.png', ''),
(2, 'Acateno', '21/02', 'ACATENO.png', ''),
(3, 'Acatlan', '12/01', 'Acatlan.jpg', 'membrete-acatlan.jpg'),
(4, 'Acatzingo', '18/01', 'www/logos/', ''),
(5, 'Acteopan', '10/02', 'www/logos/', ''),
(6, 'Ahuacatlan', '24/02', 'www/logos/', ''),
(7, 'Ahuatlan', '10/03', 'www/logos/', ''),
(8, 'Ahuazotepec', '25/02', 'www/logos/', ''),
(9, 'Ahuehuetitla', '12/02', 'www/logos/', ''),
(10, 'Ajalpan', '15/01', 'www/logos/', ''),
(11, 'Albino Zertuche', '11/02', 'www/logos/', ''),
(12, 'Aljojuca', '19/02', 'www/logos/', ''),
(13, 'Altepexi', '15/06', 'www/logos/', ''),
(14, 'Amixtlan', '24/03', 'www/logos/', ''),
(15, 'Amozoc', '16/03', 'www/logos/', ''),
(16, 'Aquixtla', '23/02', 'www/logos/', ''),
(17, 'Atempan', '20/02', 'www/logos/', ''),
(18, 'Atexcal', '13/02', 'www/logos/', ''),
(19, 'Atlixco', '09/01\r\n', 'www/logos/', ''),
(20, 'Atoyatempan', '13/03\r\n', 'www/logos/', ''),
(21, 'Atzala', '11/03\r\n', 'www/logos/', ''),
(22, 'Atzitzihuacan', '10/04\r\n', 'www/logos/', ''),
(23, 'Atzitzintla', '19/03\r\n', 'www/logos/', ''),
(24, 'Axutla', '12/03\r\n', 'www/logos/', ''),
(25, 'Ayotoxco de Guerrero', '21/03\r\n', 'www/logos/', ''),
(26, 'Calpan', '08/02\r\n', NULL, 'membrete-acatlan.jpg'),
(27, 'Caltepec', '15/03\r\n', NULL, ''),
(28, 'Camocuautla', '24/04\r\n', NULL, ''),
(29, 'Caxhuacan', '24/05\r\n', NULL, ''),
(30, 'Coatepec', '24/06\r\n', NULL, ''),
(31, 'Coatzingo', '10/05\r\n', NULL, ''),
(32, 'Cohetzala', '11/06\r\n', NULL, ''),
(33, 'Cohuecan', '10/06\r\n', NULL, ''),
(34, 'Coronango', '08/03\r\n', NULL, ''),
(35, 'Coxcatlan', '15/08\r\n', NULL, ''),
(36, 'Coyomeapan', '15/12\r\n', NULL, ''),
(37, 'Coyotepec', '15/12\r\n', NULL, ''),
(38, 'Cuapiaxtla de Madero', '17/02\r\n', NULL, ''),
(39, 'Cuautempan', '23/03\r\n', NULL, ''),
(40, 'Cuautinchan', '16/04\r\n', NULL, ''),
(41, 'Cuautlancingo', '08/04\r\n', NULL, ''),
(42, 'Cuayuca de Andrade', '13/05\r\n', NULL, ''),
(43, 'Cuetzalan del Progreso', '22/02\r\n', NULL, ''),
(44, 'Cuyoaco', '22/03\r\n', NULL, ''),
(45, 'Chalchicomula de Sesma', '19/01\r\n', NULL, ''),
(46, 'Chapulco', '14/03\r\n', NULL, ''),
(47, 'Chiautla', '11/01\r\n', NULL, ''),
(48, 'Chiautzingo', '07/02\r\n', NULL, ''),
(49, 'Chiconcuautla', '25/03\r\n', NULL, ''),
(50, 'Chichiquila', '19/05\r\n', NULL, ''),
(51, 'Chietla', '11/04\r\n', NULL, ''),
(52, 'Chigmecatitlan', '13/06\r\n', NULL, ''),
(53, 'Chignahuapan', '23/04\r\n', 'CHIGNAUTLAlogo.png', ''),
(54, 'Chignautla', '21/04\r\n', NULL, ''),
(55, 'Chila', '12/04\r\n', NULL, ''),
(56, 'Chila de la Sal', '11/05\r\n', NULL, ''),
(57, 'Honey', '25/04\r\n', NULL, ''),
(58, 'Chilchotla', '19/06\r\n', NULL, ''),
(59, 'Chinantla', '12/05 \r\n', NULL, ''),
(60, 'Domingo Arenas', '08/05\r\n', NULL, ''),
(61, 'Eloxochitlan', '15/14\r\n', NULL, ''),
(62, 'Epatlan', '10/07\r\n', NULL, ''),
(63, 'Esperanza', '19/07\r\n', NULL, ''),
(64, 'Francisco Z. Mena', '26/02\r\n', NULL, ''),
(65, 'General Felipe angeles', '17/03\r\n', NULL, ''),
(66, 'Guadalupe', '12/06\r\n', NULL, ''),
(67, 'Guadalupe Victoria', '19/08\r\n', NULL, ''),
(68, 'Hermenegildo Galeana', '24/07\r\n', NULL, ''),
(69, 'Huaquechula', '10/08\r\n', NULL, ''),
(70, 'Huatlatlauca', '13/07\r\n', NULL, ''),
(71, 'Huauchinango', '25/01\r\n', NULL, ''),
(72, 'Huehuetla', '24/08\r\n', NULL, ''),
(73, 'Huehuetlan el Chico', '11/07\r\n', NULL, ''),
(74, 'Huejotzingo', '07/03\r\n', NULL, ''),
(75, 'Hueyapan', '20/03\r\n', NULL, ''),
(76, 'Hueytamalco', '21/05\r\n', NULL, ''),
(77, 'Hueytlalpan', '24/09\r\n', NULL, ''),
(78, 'Huitzilan de Serdan', '23/05\r\n', NULL, ''),
(79, 'Huitziltepec', '13/09\r\n', NULL, ''),
(80, 'Atlequizayan', '24/10\r\n', NULL, ''),
(81, 'Ixcamilpa de Guerrero', '11/08\r\n', NULL, ''),
(82, 'Ixcaquixtla', '13/10\r\n', NULL, ''),
(83, 'Ixtacamaxtitlan', '23/0\r\n', NULL, ''),
(84, 'Ixtepec', '24/11\r\n', NULL, ''),
(85, 'Izucar de Matamoros', '10/01\r\n', NULL, ''),
(86, 'Jalpan', '26/03\r\n', NULL, ''),
(87, 'Jolalpan', '11/09\r\n', NULL, ''),
(88, 'Jonotla', '22/04\r\n', NULL, ''),
(89, 'Jopala', '24/12\r\n', NULL, ''),
(90, 'Juan C. Bonilla', '08/06\r\n', NULL, ''),
(91, 'Juan Galindo', '25/05\r\n', NULL, ''),
(92, 'Juan N. Mendez', '13/11\r\n', NULL, ''),
(93, 'Lafragua', '19/09\r\n', NULL, ''),
(94, 'Libres', '20/04\r\n', NULL, ''),
(95, 'La Magdalena Tlatlauquitepec', '13/12\r\n', NULL, ''),
(96, 'Mazapiltepec de Juarez', '18/02\r\n', NULL, ''),
(97, 'Mixtla', '16/05\r\n', NULL, ''),
(98, 'Molcaxac', '13/13\r\n', 'img_inst_molcaxac.jpeg', 'membrete-molcaxac.jpg'),
(99, 'Cañada Morelos', '19/04\r\n', NULL, ''),
(100, 'Naupan', '25/06\r\n', NULL, ''),
(101, 'Nauzontla', '22/05\r\n', NULL, ''),
(102, 'Nealtican', '09/02\r\n', NULL, ''),
(103, 'Nicolas Bravo', '14/05\r\n', NULL, ''),
(104, 'Nopalucan', '18/03\r\n', NULL, ''),
(105, 'Ocotepec', '22/06\r\n', NULL, ''),
(106, 'Ocoyucan', '09/03\r\n', NULL, ''),
(107, 'Olintla', '24/13\r\n', NULL, ''),
(108, 'Oriental', '20/05\r\n', NULL, ''),
(109, 'Pahuatlan', '25/07\r\n', NULL, ''),
(110, 'Palmar de Bravo', '17/04\r\n', NULL, ''),
(111, 'Pantepec', '26/04\r\n', NULL, ''),
(112, 'Petlalcingo', '12/07\r\n', NULL, ''),
(113, 'Piaxtla', '12/08\r\n', NULL, ''),
(114, 'Puebla', '01/01\r\n', 'PUEBLA logo.png', ''),
(115, 'Quecholac', '17/05\r\n', NULL, ''),
(116, 'Quimixtlan', '19/10\r\n', 'img_inst_quimixtlan.jpeg', ''),
(117, 'Rafael Lara Grajales', '18/04\r\n', NULL, ''),
(118, 'Los Reyes de Juarez', '17/06\r\n', NULL, ''),
(119, 'San Andres Cholula', '09/04\r\n', NULL, ''),
(120, 'San Antonio Cañada', '15/09\r\n', NULL, ''),
(121, 'San Diego la Mesa Tochimiltzingo', '10/09\r\n', NULL, ''),
(122, 'San Felipe Teotlalcingo', '07/04\r\n', NULL, ''),
(123, 'San Felipe Tepatlan', '24/14\r\n', NULL, ''),
(124, 'San Gabriel Chilac', '15/04\r\n', NULL, ''),
(125, 'San Gregorio Atzompa', '08/07\r\n', NULL, ''),
(126, 'San Jeronimo Tecuanipan', '08/08\r\n', NULL, ''),
(127, 'San Jeronimo Xayacatlan', '12/09\r\n', NULL, ''),
(128, 'San Jose Chiapa', '18/05\r\n', NULL, ''),
(129, 'San Jose Miahuatlan', '15/05\r\n', NULL, ''),
(130, 'San Juan Atenco', '19/11\r\n', NULL, ''),
(131, 'San Juan Atzompa', '13/14\r\n', NULL, ''),
(132, 'San Martin Texmelucan', '07/01\r\n', NULL, ''),
(133, 'San Martin Totoltepec', '10/10\r\n', NULL, ''),
(134, 'San Matias Tlalancaleca', '07/05\r\n', NULL, ''),
(135, 'San Miguel Ixitlan', '12/10\r\n', NULL, ''),
(136, 'San Miguel Xoxtla', '08/09\r\n', NULL, ''),
(137, 'San Nicolas Buenos Aires', '18/06\r\n', NULL, ''),
(138, 'San Nicolas de los Ranchos', '09/05\r\n', NULL, ''),
(139, 'San Pablo Anicano', '12/11\r\n', NULL, ''),
(140, 'San Pedro Cholula', '08/01\r\n', 'www/logos/SanPedroCholula-logo.jpg', ''),
(141, 'San Pedro Yeloixtlahuaca', '12/12\r\n', NULL, ''),
(142, 'San Salvador el Seco', '18/07\r\n', NULL, ''),
(143, 'San Salvador el Verde', '07/06\r\n', 'SANSALVADORELVERDE.jpg', 'membrete-elverde.jpg'),
(144, 'San Salvador Huixcolotla', '17/07\r\n', NULL, ''),
(145, 'San Sebastian Tlacotepec', '15/13\r\n', NULL, ''),
(146, 'Santa Catarina Tlaltempan', '13/15\r\n', NULL, ''),
(147, 'Santa Ines Ahuatempan', '13/16\r\n', NULL, ''),
(148, 'Santa Isabel Cholula', '09/06\r\n', NULL, ''),
(149, 'Santiago Miahuatlan', '14/04\r\n', NULL, ''),
(150, 'Huehuetlan el Grande', '13/08\r\n', NULL, ''),
(151, 'Santo Tomas Hueyotlipan', '16/06\r\n', NULL, ''),
(152, 'Soltepec', '18/08\r\n', NULL, ''),
(153, 'Tecali de Herrera', '16/07\r\n', NULL, ''),
(154, 'Tecamachalco', '17/01\r\n', NULL, ''),
(155, 'Tecomatlan', '12/13\r\n', NULL, ''),
(156, 'Tehuacan', '14/01\r\n', NULL, ''),
(157, 'Tehuitzingo', '12/14\r\n', NULL, ''),
(158, 'Tenampulco', '21/06\r\n', NULL, ''),
(159, 'Teopantlan', '10/11\r\n', NULL, ''),
(160, 'Teotlalco', '11/10\r\n', NULL, ''),
(161, 'Tepanco de Lopez', '14/02\r\n', NULL, ''),
(162, 'Tepango de Rodriguez', '24/15\r\n', NULL, ''),
(163, 'Tepatlaxco de Hidalgo', '16/08\r\n', NULL, ''),
(164, 'Tepeaca', '16/01\r\n', NULL, ''),
(165, 'Tepemaxalco', '10/12\r\n', NULL, ''),
(166, 'Tepeojuma', '10/13\r\n', NULL, ''),
(167, 'Tepetzintla', '24/16\r\n', NULL, ''),
(168, 'Tepexco', '10/14\r\n', 'TEPEXCO.png', ''),
(169, 'Tepexi de Rodriguez', '13/01\r\n', NULL, ''),
(170, 'Tepeyahualco', '20/06\r\n', NULL, ''),
(171, 'Tepeyahualco de Cuauhtemoc', '13/17\r\n', NULL, ''),
(172, 'Tetela de Ocampo', '23/01\r\n', NULL, ''),
(173, 'Teteles de avila Castillo', '20/07\r\n', NULL, ''),
(174, 'Teziutlan', '21/01\r\n', NULL, ''),
(175, 'Tianguismanalco', '09/07\r\n', NULL, ''),
(176, 'Tilapa', '10/15\r\n', NULL, ''),
(177, 'Tlacotepec de Benito Juarez', '17/08\r\n', NULL, ''),
(178, 'Tlacuilotepec', '26/05\r\n', NULL, ''),
(179, 'Tlachichuca', '19/12\r\n', NULL, ''),
(180, 'Tlahuapan', '07/07\r\n', NULL, ''),
(181, 'Tlaltenango', '08/10\r\n', NULL, ''),
(182, 'Tlanepantla', '17/09\r\n', NULL, ''),
(183, 'Tlaola', '25/08\r\n', NULL, ''),
(184, 'Tlapacoya', '24/17\r\n', NULL, ''),
(185, 'Tlapanala', '10/16\r\n', NULL, ''),
(186, 'Tlatlauquitepec', '20/01\r\n', NULL, ''),
(187, 'Tlaxco', '26/06\r\n', NULL, ''),
(188, 'Tochimilco', '09/08\r\n', NULL, ''),
(189, 'Tochtepec', '17/10\r\n', NULL, ''),
(190, 'Totoltepec de Guerrero', '12/15\r\n', NULL, ''),
(191, 'Tulcingo', '11/11\r\n', NULL, ''),
(192, 'Tuzamapan de Galeana', '22/07\r\n', NULL, ''),
(193, 'Tzicatlacoyan', '16/09\r\n', NULL, ''),
(194, 'Venustiano Carranza', '26/07\r\n', NULL, ''),
(195, 'Vicente Guerrero', '15/10\r\n', 'VICENTEGUERRERO.jpg', ''),
(196, 'Xayacatlan de Bravo', '12/16\r\n', NULL, ''),
(197, 'Xicotepec', '26/01\r\n', NULL, ''),
(198, 'Xicotlan', '11/12\r\n', NULL, ''),
(199, 'Xiutetelco', '21/07\r\n', 'XIUTETELCOLOGO.png', ''),
(200, 'Xochiapulco', '23/07\r\n', NULL, ''),
(201, 'Xochiltepec', '10/17\r\n', NULL, ''),
(202, 'Xochitlan de Vicente Suarez', '22/08\r\n', NULL, ''),
(203, 'Xochitlan Todos Santos', '17/11\r\n', NULL, ''),
(204, 'Yaonahuac', '20/08\r\n', NULL, ''),
(205, 'Yehualtepec', '17/12\r\n', NULL, ''),
(206, 'Zacapala', '13/18\r\n', NULL, ''),
(207, 'Zacapoaxtla', '22/01\r\n', NULL, ''),
(208, 'Zacatlan', '24/01\r\n', NULL, ''),
(209, 'Zapotitlan', '15/02\r\n', NULL, ''),
(210, 'Zapotitlan de Mendez', '23/08\r\n', NULL, ''),
(211, 'Zaragoza', '20/09\r\n', NULL, ''),
(212, 'Zautla', '22/09\r\n', 'thumbnail_LOGO OFICIAL.png', ''),
(213, 'Zihuateutla', '26/08\r\n', NULL, ''),
(214, 'Zinacatepec', '15/07\r\n', NULL, ''),
(215, 'Zongozotla', '23/09\r\n', NULL, ''),
(216, 'Zoquiapan', '22/10\r\n', NULL, ''),
(217, 'Zoquitlan', '15/11\r\n', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nombre_programa` varchar(255) NOT NULL,
  `objetivo_programa` varchar(255) NOT NULL,
  `ejercicio_fiscal` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nombre_programa`, `objetivo_programa`, `ejercicio_fiscal`, `id_municipio`) VALUES
(2, 'Huixcolotla con Igualdad y Bienestar Social', 'Contribuir al mejoramiento de las condiciones de vida de los habitantes de Huixcolotla en situación de pobreza y vulnerabilidad, mediante la optimización de los recursos destinados.', 2021, 26),
(3, 'Bienestar municipal y desarrollo del municipio', 'Contribuir en la disminucion de las problematicas de sicial en el municipio mediante la distribucion de los recurs', 2021, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_responsables`
--

CREATE TABLE `unidades_responsables` (
  `id_unidad_responsable` int(10) NOT NULL,
  `nombre_unidad` varchar(255) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades_responsables`
--

INSERT INTO `unidades_responsables` (`id_unidad_responsable`, `nombre_unidad`, `id_municipio`) VALUES
(1, 'SISTEMAS', 26),
(5, 'SMDIF', 26),
(7, 'OBRAS', 26),
(8, 'TESORERIA', 26),
(9, 'CONTRALORIA', 26),
(10, 'SECRETARIA GENERAL', 26),
(11, 'PROTECCION CIVIL', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` int(20) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_unidad_responsable` int(10) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `rol` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo`, `telefono`, `usuario`, `password`, `id_unidad_responsable`, `id_municipio`, `rol`) VALUES
(1, 'CESAR OSGUAL', 'VELAZQUEZ', 'ALVAREZ', 'JCDKJNCKN', 2147483647, 'admin', 'admin', NULL, NULL, 'admin'),
(4, 'LUIS ALBERTO', 'GARCIA', 'HERNANDEZ', 'KLJASLJ', 2147483647, 'luis', 'pluis', 7, 26, 'user'),
(5, 'JESSICA ', 'PEREZ', 'PEÑAFOR', 'KJHKHKH', 2147483647, 'jees', 'pjessi', 5, 26, 'user'),
(6, 'ALEJANDRO', 'GONZALEZ', 'SANDOVAL', 'KHKHK', 2147483647, 'alex', 'palej', 11, 26, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_componente` (`id_componente`);

--
-- Indices de la tabla `actividades_detalle`
--
ALTER TABLE `actividades_detalle`
  ADD PRIMARY KEY (`id_actividad_detalle`),
  ADD KEY `actividades_detalle_fk` (`id_actividad`);

--
-- Indices de la tabla `actividades_fechas`
--
ALTER TABLE `actividades_fechas`
  ADD PRIMARY KEY (`id_actividad_fecha`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id_componente`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`) USING BTREE;

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `unidades_responsables`
--
ALTER TABLE `unidades_responsables`
  ADD PRIMARY KEY (`id_unidad_responsable`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD KEY `usuaros_a_municipio` (`id_unidad_responsable`) USING BTREE,
  ADD KEY `usuarios_a_areas` (`id_municipio`) USING BTREE,
  ADD KEY `id_unidad_responsable` (`id_unidad_responsable`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `actividades_detalle`
--
ALTER TABLE `actividades_detalle`
  MODIFY `id_actividad_detalle` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividades_fechas`
--
ALTER TABLE `actividades_fechas`
  MODIFY `id_actividad_fecha` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id_componente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidades_responsables`
--
ALTER TABLE `unidades_responsables`
  MODIFY `id_unidad_responsable` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_componente`) REFERENCES `componentes` (`id_componente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividades_detalle`
--
ALTER TABLE `actividades_detalle`
  ADD CONSTRAINT `actividades_detalle_fk` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`);

--
-- Filtros para la tabla `actividades_fechas`
--
ALTER TABLE `actividades_fechas`
  ADD CONSTRAINT `actividades_fechas_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `componentes_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidades_responsables`
--
ALTER TABLE `unidades_responsables`
  ADD CONSTRAINT `unidades_responsables_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_unidad_responsable`) REFERENCES `unidades_responsables` (`id_unidad_responsable`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
