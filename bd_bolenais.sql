-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 00:52:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_bolenais`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_boleto`
--

CREATE TABLE `tbl_boleto` (
  `id_boleto` int(11) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `fila` varchar(5) NOT NULL,
  `asiento` varchar(5) NOT NULL,
  `artista` varchar(70) NOT NULL,
  `ciudad` varchar(70) NOT NULL,
  `lugar` varchar(70) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `codigo` int(10) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `existencia` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_boleto`
--

INSERT INTO `tbl_boleto` (`id_boleto`, `seccion`, `fila`, `asiento`, `artista`, `ciudad`, `lugar`, `dia`, `hora`, `codigo`, `precio`, `existencia`) VALUES
(1, 'General A', '--', '--', 'Lana del Rey', 'CDMX', 'Estadio Foro Sol', '2023-11-16', '20:00:00', 1201511201, 1200.00, 1999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_boleto_vendido`
--

CREATE TABLE `tbl_boleto_vendido` (
  `id` int(11) NOT NULL,
  `id_boleto` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `cantidad` bigint(50) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_boleto_vendido`
--

INSERT INTO `tbl_boleto_vendido` (`id`, `id_boleto`, `id_pago`, `cantidad`, `id_venta`) VALUES
(8, 1, 0, 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_opiniones`
--

CREATE TABLE `tbl_opiniones` (
  `id_opinion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_opi` date NOT NULL,
  `calificacion` int(2) NOT NULL,
  `queja` varchar(100) NOT NULL,
  `porque` varchar(100) NOT NULL,
  `sucursal_compra` varchar(100) NOT NULL,
  `sugerencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_opiniones`
--

INSERT INTO `tbl_opiniones` (`id_opinion`, `id_cliente`, `fecha_opi`, `calificacion`, `queja`, `porque`, `sucursal_compra`, `sugerencia`) VALUES
(3, 101, '2023-11-16', 10, 'Ninguna', '---', 'BoleNais Av. De la Raza', 'NInguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pago`
--

CREATE TABLE `tbl_pago` (
  `id_pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `fecha_pago` date NOT NULL,
  `num_tarjeta` bigint(16) NOT NULL,
  `anio_vence` int(4) NOT NULL,
  `mes_vence` int(2) NOT NULL,
  `codigo_seg` int(3) NOT NULL,
  `tipo_tarjeta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_pago`
--

INSERT INTO `tbl_pago` (`id_pago`, `id_cliente`, `usuario`, `contrasena`, `fecha_pago`, `num_tarjeta`, `anio_vence`, `mes_vence`, `codigo_seg`, `tipo_tarjeta`) VALUES
(20, 1012, 'nayo', '123', '2023-11-16', 6532456120357864, 2026, 11, 123, 'BBVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_pago` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha_venta`, `id_pago`, `total`) VALUES
(20, '2023-11-17', 0, 1200.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_boleto`
--
ALTER TABLE `tbl_boleto`
  ADD PRIMARY KEY (`id_boleto`);

--
-- Indices de la tabla `tbl_boleto_vendido`
--
ALTER TABLE `tbl_boleto_vendido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_opiniones`
--
ALTER TABLE `tbl_opiniones`
  ADD PRIMARY KEY (`id_opinion`);

--
-- Indices de la tabla `tbl_pago`
--
ALTER TABLE `tbl_pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_boleto`
--
ALTER TABLE `tbl_boleto`
  MODIFY `id_boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_boleto_vendido`
--
ALTER TABLE `tbl_boleto_vendido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_opiniones`
--
ALTER TABLE `tbl_opiniones`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
