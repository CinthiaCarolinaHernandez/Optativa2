-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2016 a las 02:10:46
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `direccion`, `celular`) VALUES
(400076162, 'Rosa', 'Obando', 'El Olivo', '0985900597'),
(401555214, 'Cinthia', 'Hernandez', 'El olivo', '0981597955'),
(1003557293, 'Lizeth', 'Guaman', 'Caranqui', '0987598564'),
(1003864483, 'Bryan', 'Garces', 'Huertos familiares', '0986852640'),
(1726761388, 'Mauro', 'Yandun', 'La primavera', '0994160589');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleados` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `nombre_emp` varchar(20) NOT NULL,
  `apellido_emp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleados`, `cargo`, `nombre_emp`, `apellido_emp`) VALUES
(1, 'Recepcionista', 'Aida', 'Solis'),
(2, 'Secretaria', 'Vanesa', 'Ramirez'),
(3, 'Abogada', 'Dayana', 'Vizcaino'),
(4, 'Gerente', 'Mauricio ', 'Yandun'),
(5, 'Gerente 1', 'Marco', 'Lopez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_habitacion` int(11) NOT NULL,
  `tipo_habitacion` varchar(20) NOT NULL,
  `caracteristicas` text NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `tipo_habitacion`, `caracteristicas`, `valor`) VALUES
(1, 'Familiar', '1 cama de 2 plazas, 1 litera', 300.75),
(2, 'Matrimonial', '1 cama de 2 plazas, yacusi', 375.25),
(3, 'Sola', '1 cama de 2 plazas', 225.25),
(11, 'Suite', '1 cama de 3 plazas, yacusi', 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_cabecera`
--

CREATE TABLE `reserva_cabecera` (
  `id_cab` int(11) NOT NULL,
  `id_cliente` varchar(60) NOT NULL,
  `id_empleado` varchar(50) NOT NULL,
  `id_habitacion` varchar(60) NOT NULL,
  `fechareserva` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva_cabecera`
--

INSERT INTO `reserva_cabecera` (`id_cab`, `id_cliente`, `id_empleado`, `id_habitacion`, `fechareserva`, `total`) VALUES
(1, 'Obando Rosa', 'Aida Solis', 'Familiar', '2016-02-25', 304.49),
(2, 'Obando Rosa', 'Aida Solis', 'Familiar', '2016-02-23', 304.49),
(3, 'Obando Rosa', 'Aida Solis', 'Familiar', '2016-02-24', 304.49),
(4, 'Hernandez Cinthia', 'Vanesa Ramirez', 'Matrimonial', '2016-02-24', 384.09),
(5, 'Obando Rosa', 'Aida Solis', 'Familiar', '2016-02-24', 309.59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_detalle`
--

CREATE TABLE `reserva_detalle` (
  `id_det` int(11) NOT NULL,
  `id_cab` int(11) NOT NULL,
  `id_servicio` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `personas` int(11) NOT NULL,
  `iva` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva_detalle`
--

INSERT INTO `reserva_detalle` (`id_det`, `id_cab`, `id_servicio`, `nombre`, `precio`, `personas`, `iva`, `subtotal`) VALUES
(26, 13, '1', 'Desayuno', 2.75, 3, 0.99, 9.24),
(27, 13, '5', 'Piscina', 10, 1, 1.2, 11.2),
(28, 1, '1', 'Desayuno', 2.75, 2, 0.66, 6.16),
(29, 1, '2', 'Almuerzo', 4.25, 2, 1.02, 9.52),
(30, 1, '6', 'Spa', 30.76, 1, 3.6912, 34.4512),
(31, 1, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(32, 1, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(33, 2, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(34, 2, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(35, 3, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(36, 3, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(37, 2, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(38, 2, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(39, 3, '6', 'Spa', 30.76, 1, 3.6912, 34.4512),
(40, 3, '5', 'Piscina', 10, 1, 1.2, 11.2),
(41, 4, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(42, 4, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(43, 5, '4', 'Platos a la carta', 11.5, 1, 1.38, 12.88),
(44, 6, '4', 'Platos a la carta', 11.5, 1, 1.38, 12.88),
(45, 6, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(46, 7, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(47, 7, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(48, 8, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(49, 8, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(50, 5, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(51, 5, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(52, 6, '2', 'Almuerzo', 4.25, 1, 0.51, 4.76),
(53, 6, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(54, 7, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(55, 8, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(56, 9, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(57, 1, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(58, 2, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(59, 3, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(60, 4, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(61, 3, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(62, 4, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(63, 4, '3', 'Cena', 3.75, 1, 0.45, 4.2),
(64, 5, '1', 'Desayuno', 2.75, 1, 0.33, 3.08),
(65, 5, '3', 'Cena', 3.75, 1, 0.45, 4.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicios` int(11) NOT NULL,
  `tipo_servicio` varchar(100) NOT NULL,
  `costo_servicio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicios`, `tipo_servicio`, `costo_servicio`) VALUES
(1, 'Desayuno', 2.75),
(2, 'Almuerzo', 4.25),
(3, 'Cena', 3.75),
(4, 'Platos a la carta', 11.5),
(5, 'Piscina', 10),
(6, 'Spa', 30.76);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleados`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_habitacion`);

--
-- Indices de la tabla `reserva_cabecera`
--
ALTER TABLE `reserva_cabecera`
  ADD PRIMARY KEY (`id_cab`);

--
-- Indices de la tabla `reserva_detalle`
--
ALTER TABLE `reserva_detalle`
  ADD PRIMARY KEY (`id_det`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `reserva_cabecera`
--
ALTER TABLE `reserva_cabecera`
  MODIFY `id_cab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `reserva_detalle`
--
ALTER TABLE `reserva_detalle`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
