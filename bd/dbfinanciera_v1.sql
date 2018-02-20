-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2018 a las 01:56:56
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbfinanciera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nomb_ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nomb_ciudad`) VALUES
(1, 'Apurímac'),
(2, 'Cusco'),
(3, 'Ayacucho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `oficinaAfiliacion` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza` (
  `idCobranza` int(11) NOT NULL,
  `pago` float DEFAULT NULL,
  `nRecibo` int(11) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `idPrestamo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nomb_distrito` varchar(50) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nomb_distrito`, `id_provincia`) VALUES
(1, 'Abancay', 1),
(2, 'Chacoche', 1),
(3, 'Circa', 1),
(4, 'Curahuasi', 1),
(5, 'Huanipaca', 1),
(6, 'Lambrama', 1),
(7, 'Pichirhua', 1),
(8, 'San Pedro de Cachora', 1),
(9, 'Tamburco', 1),
(10, 'Andahuaylas', 2),
(11, 'Andarapa', 2),
(12, 'Chiara', 2),
(13, 'Huancarama', 2),
(14, 'Huancaray', 2),
(15, 'Huayana ', 2),
(16, 'José María Arguedas', 2),
(17, 'Kaquiabamba ', 2),
(18, 'Kishuara', 2),
(19, 'Pacobamba', 2),
(20, 'Pacucha ', 2),
(21, 'Pampachiri ', 2),
(22, 'Pomacocha ', 2),
(23, 'San Antonio de Cachi', 2),
(24, 'San Jerónimo', 2),
(25, 'San Miguel de Chaccrapampa', 2),
(26, 'Santa María de Chicmo', 2),
(27, 'Talavera', 2),
(28, 'Tumay Huaraca', 2),
(29, 'Turpo', 2),
(30, 'Antabamba', 3),
(31, 'El Oro', 3),
(32, 'Huaquirca', 3),
(33, 'Juan Espinoza Medrano', 3),
(34, 'Oropesa', 3),
(35, 'Pachaconas', 3),
(36, 'Sabaino', 3),
(37, 'Chalhuanca', 4),
(38, 'Capaya', 4),
(39, 'Caraybamba', 4),
(40, 'Cotaruse', 4),
(41, 'Ihuayllo', 4),
(42, 'Justo Apu Sahuaraura', 4),
(43, 'Lucre', 4),
(44, 'Pocohuanca', 4),
(45, 'San Juan de Chacña', 4),
(46, 'Sañayca', 4),
(47, 'Soraya', 4),
(48, 'Tapairihua', 4),
(49, 'Tintay', 4),
(50, 'Toraya', 4),
(51, 'Yanaca', 4),
(52, 'Chincheros', 6),
(53, 'Cocharcas', 6),
(54, 'Huaccana', 6),
(55, 'Ocobamba', 6),
(56, 'Ongoy', 6),
(57, 'Uranmarca', 6),
(58, 'Uripa', 6),
(59, 'Ranracancha', 6),
(60, 'Rocchac', 6),
(61, 'El Porvenir', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_sistema`
--

CREATE TABLE `menu_sistema` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `IMAGEN` varchar(50) NOT NULL DEFAULT 'imagenes/not_found.png',
  `URL` varchar(50) DEFAULT NULL,
  `ORDENAMIENTO` int(11) NOT NULL DEFAULT '0',
  `ESTATUS` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_sistema`
--

INSERT INTO `menu_sistema` (`ID`, `DESCRIPCION`, `IMAGEN`, `URL`, `ORDENAMIENTO`, `ESTATUS`) VALUES
(1, 'Inicio', 'imagenes/Customer.png', '#', 1, 0),
(2, 'Módulo Cliente', 'imagenes/Proveedores.png', '/cliente', 3, 0),
(3, 'Módulo Empleado', 'imagenes/Product.png', '/usuarios', 2, 0),
(4, 'Módulo Prestamo', 'imagenes/not_found.png', '/prestamo', 4, 0),
(5, 'Módulo Cobranza', 'imagenes/not_found.png', '#', 5, 0),
(6, '#', 'imagenes/not_found.png', '#', 6, 0),
(7, '#', 'imagenes/not_found.png', '#', 7, 0),
(8, '#', 'imagenes/not_found.png', '#', 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosmenu`
--

CREATE TABLE `permisosmenu` (
  `ID` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisosmenu`
--

INSERT INTO `permisosmenu` (`ID`, `ID_USUARIO`, `ID_MENU`, `ESTATUS`) VALUES
(1, 1, 1, 0),
(2, 1, 3, 0),
(3, 1, 2, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 3, 1, 0),
(8, 3, 3, 0),
(9, 3, 2, 0),
(10, 3, 4, 0),
(11, 3, 5, 0),
(12, 3, 6, 0),
(13, 2, 1, 0),
(14, 2, 4, 0),
(15, 10, 4, 0),
(16, 11, 1, 0),
(17, 11, 4, 0),
(18, 1, 7, 0),
(19, 1, 8, 0),
(20, 3, 7, 0),
(21, 3, 8, 0),
(22, 4, 1, 0),
(23, 4, 3, 0),
(24, 4, 2, 0),
(25, 4, 4, 1),
(26, 4, 5, 1),
(27, 4, 6, 1),
(28, 4, 7, 1),
(29, 4, 8, 1),
(30, 12, 1, 0),
(31, 12, 3, 0),
(32, 17, 1, 0),
(33, 17, 3, 0),
(34, 17, 2, 0),
(35, 19, 1, 0),
(36, 19, 3, 0),
(37, 19, 2, 0),
(38, 19, 4, 0),
(39, 19, 5, 0),
(40, 20, 1, 0),
(41, 20, 4, 0),
(42, 20, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL,
  `producto` varchar(20) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `tasaInteres` float DEFAULT NULL,
  `capital` float DEFAULT NULL,
  `deuda` float DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nomb_provincia` varchar(50) NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nomb_provincia`, `id_ciudad`) VALUES
(1, 'Abancay', 1),
(2, 'Andahuaylas', 1),
(3, 'Antabamba', 1),
(4, 'Aymaraes', 1),
(5, 'Cotabambas', 1),
(6, 'Chincheros', 1),
(7, 'Grau', 1),
(8, 'Cusco', 2),
(9, 'Acomayo', 2),
(10, 'Anta', 2),
(11, 'Calca', 2),
(12, 'Canas', 2),
(13, 'Canchis', 2),
(14, 'Chumbivilcas', 2),
(15, 'Espinar', 2),
(16, 'La Convención', 2),
(17, 'Paruro', 2),
(18, 'Paucartambo', 2),
(19, 'Quispicanchi', 2),
(20, 'Urubamba', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FECHA_REGISTRO` varchar(20) NOT NULL,
  `ESTATUS` varchar(20) NOT NULL DEFAULT '0',
  `TIPO` varchar(20) NOT NULL DEFAULT 'Invitado',
  `PASSWORD` varchar(50) DEFAULT '123',
  `SEXO` varchar(12) NOT NULL,
  `FECHA_EGRESO` date NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `OFICINA` varchar(50) NOT NULL,
  `DISTRITO` varchar(100) NOT NULL,
  `PROVINCIA` varchar(100) NOT NULL,
  `DEPARTAMENTO` varchar(100) NOT NULL,
  `SUELDO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `FECHA_REGISTRO`, `ESTATUS`, `TIPO`, `PASSWORD`, `SEXO`, `FECHA_EGRESO`, `TELEFONO`, `DNI`, `DIRECCION`, `OFICINA`, `DISTRITO`, `PROVINCIA`, `DEPARTAMENTO`, `SUELDO`) VALUES
(1, 'Juan', 'Perez', 'elcapo@programando.com', '2014-07-30 14:39:06', '0', 'Administrador', '81dc9bdb52d04dc20036dbd8313ed055', '0', '2015-07-16', 983904075, '70788369', 'ayacucho', 'Talavera', '', '', '', 0),
(4, 'Irving Michael', 'Ortega Zarabia', 'irving@gmail.com', '2015-07-13 19:46:27', '0', 'Administrador', '5e4d614d1c5e99716f23462a4e6aba4d', '0', '1993-04-02', 45678909, '67894567', 'lima', 'Talavera', '27', '2', '1', 0),
(13, 'emil', 'huaman', 'emil@gmail.com', '2018-02-09 02:47:43', '0', 'Ejecutivo de Negocio', '123', '0', '0000-00-00', 123456789, '70788369', 'lima', 'Talavera', '22', '2', '1', 0),
(15, 'Ronald', 'Human', 'ronald@gmail.com', '2018-02-09 03:15:49', '0', 'Ejecutivo de Negocio', '123', '0', '0000-00-00', 12345678, '3456789', 'Jr. Arequipa 123 - Talavera', 'Talavera', '', '', '', 0),
(16, 'ELMER', 'HUAMÁN', 'EMEL@gmail.com', '2018-02-09 03:37:51', '0', 'Administrador', '123', '0', '2018-01-30', 992993, '373388', 'JR AREQUIPA', 'Talavera', '', '', '', 0),
(17, 'Yoni', 'cardenas', 'yoni@gmail.com', '2018-02-09 13:48:48', '0', 'Administrador', 'b1bd441640687fb9d62ce755d1b010d4', '1', '2018-02-12', 123456789, '12345678', 'jr. Ayacucho - talavera', 'Talavera', '', '', '', 0),
(18, 'usuario1', 'apellidos1', 'email@gmail.com', '2018-02-10 18:21:35', '0', 'Ejecutivo de Negocio', '123', '0', '0000-00-00', 987654321, '72917856', 'direccion1', 'Andahuaylas', '', '', '', 0),
(19, 'Julio Emil', 'Huamán Huamán', 'julio.emil.huaman@gmail.com', '2018-02-12 20:52:43', '0', 'Administrador', 'c027636003b468821081e281758e35ff', '0', '1993-04-02', 983904075, '70788369', 'Jr. Arequipa s/n', 'Talavera', '', '', '', 0),
(20, 'Lupita Mariela', 'De Ortega', 'lupita@gmail.com', '2018-02-13 13:33:54', '0', 'Caja', '51f4325b2859484f6fb0a5a400cf65c1', '0', '2018-02-06', 983245678, '78923384', 'Jr. Lima s/n', 'Talavera', '', '', '', 0),
(21, 'Juan', 'Palomino Quispe', 'juan1@gmail.com', '2018-02-15 21:15:57', '0', 'Administrador', '123', '0', '1996-04-02', 123456789, '23456789', 'Jr. Arequipa s/n', 'Talavera', '3', '1', '1', 0),
(22, 'HOLA', 'HOLA', 'hola@gmail.com', '2018-02-16 00:23:15', '1', 'Administrador', '123', '0', '2018-06-02', 456789876, '67898765', 'LIMA', 'Talavera', '1', '1', '1', 0),
(23, 'Pepito', 'Uqichi', 'pepe@gmail.com', '2018-02-19 16:43:31', '0', 'Ejecutivo de Negocio', '123', '0', '0000-00-00', 967890345, '12345689', 'lima', 'Talavera', '0', '0', '0', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD PRIMARY KEY (`idCobranza`),
  ADD KEY `idPrestamo` (`idPrestamo`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `menu_sistema`
--
ALTER TABLE `menu_sistema`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `permisosmenu`
--
ALTER TABLE `permisosmenu`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  MODIFY `idCobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `menu_sistema`
--
ALTER TABLE `menu_sistema`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisosmenu`
--
ALTER TABLE `permisosmenu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD CONSTRAINT `cobranza_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
