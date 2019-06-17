-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 00:50:21
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fleetran`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `rut_conductor` varchar(12) NOT NULL,
  `nombre1_conductor` varchar(30) DEFAULT NULL,
  `nombre2_conductor` varchar(30) DEFAULT NULL,
  `apellido1_conductor` varchar(30) DEFAULT NULL,
  `apellido2_conductor` varchar(30) DEFAULT NULL,
  `direccion_conductor` varchar(50) DEFAULT NULL,
  `numero_conductor` varchar(10) DEFAULT NULL,
  `carnet1_conductor` varchar(50) DEFAULT NULL,
  `carnet2_conductor` varchar(50) DEFAULT NULL,
  `licencia1_conductor` varchar(50) DEFAULT NULL,
  `licencia2_conductor` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `rut_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `patente_vehiculo` varchar(12) DEFAULT NULL,
  `rut_conductor` varchar(12) DEFAULT NULL,
  `fecha_entrega` varchar(10) DEFAULT NULL,
  `monto_entrega` int(6) DEFAULT NULL,
  `rut_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id_licencia` int(11) NOT NULL,
  `rut_user` varchar(50) DEFAULT NULL,
  `inicio_licencia` varchar(10) DEFAULT NULL,
  `monto_licencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`id_licencia`, `rut_user`, `inicio_licencia`, `monto_licencia`) VALUES
(1, '19359735-1', '14/06/2019', 25000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `actividad_plan` varchar(100) DEFAULT NULL,
  `flota_plan` varchar(100) DEFAULT NULL,
  `monto_plan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id_plan`, `actividad_plan`, `flota_plan`, `monto_plan`) VALUES
(1, 'Camiones +2 ejes', '1 a 5 vehiculos', 27000),
(2, 'Camiones +2 ejes', '6 a 20 vehiculos', 30000),
(3, 'Camiones +2 ejes', '21 a 100 vehiculos', 36000),
(4, 'Vehiculos de construccion', '1 a 5 vehiculos', 20250),
(5, 'Vehiculos de construccion', '6 a 20 vehiculos', 22500),
(6, 'Vehiculos de construccion', '21 a 100 vehiculos', 27000),
(7, 'Maquiarias Agricolas', '1 a 5 vehiculos', 17550),
(8, 'Maquiarias Agricolas', '6 a 20 vehiculos', 19500),
(9, 'Maquiarias Agricolas', '21 a 100 vehiculos', 23400),
(10, 'Furgones - Camiones 3/4', '1 a 5 vehiculos', 20250),
(11, 'Furgones - Camiones 3/4', '6 a 20 vehiculos', 22500),
(12, 'Furgones - Camiones 3/4', '21 a 100 vehiculos', 27000),
(13, 'Taxis - Colectivos - Radiotaxis', '1 a 5 vehiculos', 20250),
(14, 'Taxis - Colectivos - Radiotaxis', '6 a 20 vehiculos', 22500),
(15, 'Taxis - Colectivos - Radiotaxis', '21 a 100 vehiculos', 27000),
(16, 'Rent-a-car', '1 a 5 vehiculos', 20250),
(17, 'Rent-a-car', '6 a 20 vehiculos', 22500),
(18, 'Rent-a-car', '21 a 100 vehiculos', 27000),
(19, 'Motos', '1 a 5 vehiculos', 10800),
(20, 'Motos', '6 a 20 vehiculos', 12000),
(21, 'Motos', '21 a 100 vehiculos', 14400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `rut_user` varchar(10) NOT NULL,
  `nombre_user` varchar(30) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`rut_user`, `nombre_user`, `email_user`, `id_plan`, `password_user`) VALUES
('19359735-1', 'alvaro', 'alvi@inacap.cl', 7, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `patente_vehiculo` varchar(12) NOT NULL,
  `tipo_vehiculo` varchar(30) DEFAULT NULL,
  `marca_vehiculo` varchar(30) DEFAULT NULL,
  `modelo_vehiculo` varchar(30) DEFAULT NULL,
  `color_vehiculo` varchar(30) DEFAULT NULL,
  `ano_vehiculo` varchar(50) DEFAULT NULL,
  `vin_vehiculo` varchar(10) DEFAULT NULL,
  `motor_vehiculo` varchar(50) DEFAULT NULL,
  `rut_conductor` varchar(12) DEFAULT NULL,
  `rut_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`rut_conductor`),
  ADD KEY `rut_user` (`rut_user`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `patente_vehiculo` (`patente_vehiculo`),
  ADD KEY `rut_user` (`rut_user`),
  ADD KEY `rut_conductor` (`rut_conductor`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id_licencia`),
  ADD KEY `usuario` (`rut_user`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`rut_user`),
  ADD KEY `plan` (`id_plan`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`patente_vehiculo`),
  ADD KEY `rut_user` (`rut_user`),
  ADD KEY `rut_conductor` (`rut_conductor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_ibfk_1` FOREIGN KEY (`rut_user`) REFERENCES `usuario` (`rut_user`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`patente_vehiculo`) REFERENCES `vehiculo` (`patente_vehiculo`),
  ADD CONSTRAINT `entrega_ibfk_3` FOREIGN KEY (`rut_user`) REFERENCES `usuario` (`rut_user`),
  ADD CONSTRAINT `entrega_ibfk_4` FOREIGN KEY (`rut_conductor`) REFERENCES `vehiculo` (`rut_conductor`);

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`rut_user`) REFERENCES `usuario` (`rut_user`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `plan` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`rut_user`) REFERENCES `usuario` (`rut_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
