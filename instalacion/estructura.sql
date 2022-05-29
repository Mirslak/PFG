-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-05-2022 a las 18:57:17
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `num_factura` int NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`num_factura`, `id_usuario`, `fecha`) VALUES
(38, 37, '2022-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_factura`
--

CREATE TABLE `linea_factura` (
  `id_factura` int NOT NULL,
  `num_factura` int NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int NOT NULL,
  `precio` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `linea_factura`
--

INSERT INTO `linea_factura` (`id_factura`, `num_factura`, `producto`, `cantidad`, `precio`, `total`) VALUES
(15, 38, 'cocalola', 1, 8, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(3,0) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `descripcion`, `marca`, `foto`) VALUES
(1, 'Cocacola lata Normal', '8', 'Coca-Cola normal lata pack 24', 'cocacola', 'cocaNlata.jpg'),
(2, 'Monster Energy', '9', 'Mosnter normal', 'monster', 'monster.jpg'),
(3, 'Fanta Naranja', '7', 'Fanta Naranja lata pack 24', 'fanta', 'fanta.jpg'),
(4, 'Minute Maid melocotón', '2', 'Minute Maid vidrio Naraja', 'minute maid', 'minutemaid.jpg'),
(5, 'Etiqueta Negra', '9', 'Botella de Whisky Johnnie Walker Etiqueta Negra 1L', 'johnnie walker', 'wiskyN.jpg'),
(6, 'Coca Cola lata Light', '8', 'Coca-Cola lata light pack 24 und.', 'cocacola', 'cocaLlata.jpg'),
(7, 'Coca Cola lata Zero', '8', 'Coca-Cola lata Zero pack 24 und.', 'cocacola', 'cocaZlata.jpg'),
(8, 'Coca Cola lata Zero Zero', '8', 'Coca-Cola lata Zero-Zero pack 24 und.', 'cocacola', 'cocaZZlata.jpg'),
(9, 'Coca Cola 1L Normal', '9', 'Coca-Cola litro normal pack 6 und.', 'cocacola', 'cocaNlitro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido2` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `codigoPostal` int DEFAULT NULL,
  `usuario_verificado` int NOT NULL,
  `rol_usuario` int NOT NULL,
  `token` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`, `nombre`, `apellido1`, `apellido2`, `email`, `dni`, `direccion`, `telefono`, `codigoPostal`, `usuario_verificado`, `rol_usuario`, `token`) VALUES
(37, 'administrador', 'Admin$17', 'Administrador', '', '', 'fjolmedilla67@gmail.com', NULL, NULL, NULL, NULL, 1, 1, NULL),
(52, 'africa', 'Admin$17', 'Administrador', 'Olmedilla', 'Soler', 'africa@gmail.com', '45311664P', 'melilla', 666666666, 52005, 1, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`num_factura`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `linea_factura`
--
ALTER TABLE `linea_factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `num_factura` (`num_factura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `num_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `linea_factura`
--
ALTER TABLE `linea_factura`
  MODIFY `id_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Filtros para la tabla `linea_factura`
--
ALTER TABLE `linea_factura`
  ADD CONSTRAINT `linea_factura_ibfk_1` FOREIGN KEY (`num_factura`) REFERENCES `factura` (`num_factura`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
