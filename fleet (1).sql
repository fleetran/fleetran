-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2019 a las 01:58:08
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fleet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(20) DEFAULT NULL,
  `MENSAJE` varchar(100) DEFAULT NULL,
  `PERMISO` int(1) DEFAULT NULL,
  `EMPRESA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `rut` varchar(10) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `fec_nac` date NOT NULL,
  `region` int(10) DEFAULT NULL,
  `comuna` int(10) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `url_carnet` varchar(50) DEFAULT NULL,
  `url_licencia` varchar(50) DEFAULT NULL,
  `fec_reg` date NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `EMPRESA` int(11) NOT NULL,
  `PLAN` int(11) NOT NULL,
  `LOGO` varchar(40) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `F_REG` date NOT NULL,
  `F_VEN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`EMPRESA`, `PLAN`, `LOGO`, `NOMBRE`, `F_REG`, `F_VEN`) VALUES
(1, 1, '', 'RIVAS', '2019-01-01', '2020-01-01'),
(2, 2, '', 'URZUA', '2019-08-01', '2019-08-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_dinamico`
--

CREATE TABLE `menu_dinamico` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  `ICONO` varchar(50) DEFAULT NULL,
  `TIPO` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_dinamico`
--

INSERT INTO `menu_dinamico` (`ID`, `NOMBRE`, `URL`, `ICONO`, `TIPO`) VALUES
(1, 'Menu principal', 'dashboard.php', 'pe-7s-home', 0),
(2, 'Estadisticas', 'estadisticas.php', 'pe-7s-graph1', 0),
(3, 'Menu Principal', 'admin.php', 'pe-7s-home', 1),
(4, 'Monitoreo', 'monitor.php', 'pe-7s-look', 1),
(5, 'Ver usuarios', 'users.php', 'pe-7s-users', 1),
(6, 'Conductores', 'conductores.php', 'pe-7s-user', 0),
(7, 'Principal', 'conductores.php', NULL, 3),
(8, 'Agregar Conductor', 'nuevo-conductor.php', NULL, 3),
(9, 'Modificar Conductor', 'modificar-conductor.php', NULL, 3),
(10, 'Vehiculos', 'vehiculos.php', 'pe-7s-car', 0),
(11, 'Principal', 'vehiculos.php', NULL, 4),
(12, 'Añadir vehículo', 'nuevo-vehiculo.php', NULL, 4),
(13, 'Modificar vehículo', 'modificar-vehiculo.php', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `PLAN` int(11) NOT NULL,
  `MONTO` int(10) NOT NULL,
  `C_VEH` int(3) NOT NULL,
  `C_ADM` int(1) NOT NULL,
  `DESCR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`PLAN`, `MONTO`, `C_VEH`, `C_ADM`, `DESCR`) VALUES
(1, 60000, 50, 2, 'PLAN A'),
(2, 70000, 100, 2, 'PLAN B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `des` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `des`) VALUES
(1, 'Colectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `RUT` varchar(10) NOT NULL,
  `PWD` varchar(32) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `COLOR` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `APELLIDO` varchar(20) DEFAULT NULL,
  `CARGO` varchar(20) DEFAULT NULL,
  `PERMISO` int(11) DEFAULT NULL,
  `EMPRESA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`RUT`, `PWD`, `EMAIL`, `COLOR`, `NOMBRE`, `APELLIDO`, `CARGO`, `PERMISO`, `EMPRESA`) VALUES
('19359505-7', 'e10adc3949ba59abbe56e057f20f883e', 'matias@inacap.cl', 'orange', 'Matias', 'Rivas', 'Gerente General', 0, 1),
('19359735-1', 'e10adc3949ba59abbe56e057f20f883e', 'alvaro@inacap.cl', '000000', 'Alvaro', 'Urzua', 'Administrador', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `patente` varchar(12) NOT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `ano` varchar(50) DEFAULT NULL,
  `region` int(10) NOT NULL,
  `comuna` int(10) NOT NULL,
  `kms` int(7) DEFAULT NULL,
  `transmision` varchar(10) DEFAULT NULL,
  `combustible` varchar(10) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `fecha_reg` date NOT NULL,
  `rut_conductor` varchar(10) DEFAULT NULL,
  `empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `alertas` (`EMPRESA`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `conductor1` (`region`),
  ADD KEY `conductor2` (`comuna`),
  ADD KEY `conductor3` (`empresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`EMPRESA`),
  ADD KEY `empresa` (`PLAN`);

--
-- Indices de la tabla `menu_dinamico`
--
ALTER TABLE `menu_dinamico`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`PLAN`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`RUT`),
  ADD KEY `usuarios` (`EMPRESA`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`patente`),
  ADD KEY `vehiculo_e` (`empresa`),
  ADD KEY `vehiculo_t` (`tipo`),
  ADD KEY `region` (`region`),
  ADD KEY `comuna` (`comuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `EMPRESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu_dinamico`
--
ALTER TABLE `menu_dinamico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `PLAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `alertas` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`);

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor1` FOREIGN KEY (`region`) REFERENCES `fleet_adm`.`regions` (`id`),
  ADD CONSTRAINT `conductor2` FOREIGN KEY (`comuna`) REFERENCES `fleet_adm`.`communes` (`id`),
  ADD CONSTRAINT `conductor3` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`EMPRESA`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa` FOREIGN KEY (`PLAN`) REFERENCES `plan` (`PLAN`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_e` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`EMPRESA`),
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`region`) REFERENCES `fleet_adm`.`regions` (`id`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`comuna`) REFERENCES `fleet_adm`.`communes` (`id`),
  ADD CONSTRAINT `vehiculo_t` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
