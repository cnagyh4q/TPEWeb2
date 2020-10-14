-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-10-2020 a las 02:26:44
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_volley`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `nombre` text COLLATE latin1_spanish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `id_posicion` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `altura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`nombre`, `numero`, `id_posicion`, `id`, `edad`, `altura`) VALUES
('De Cecco', 2, 2, 12, 35, 1.88),
('Matías Sánchez', 1, 2, 19, 24, 1.73),
('Jan Martínez', 3, 4, 20, 22, 1.9),
('Luciano Palonsky', 4, 4, 21, 21, 1.98),
('Agustín Loser', 8, 3, 22, 23, 1.93),
('Santiago Danani', 9, 14, 23, 24, 1.76),
('Nicolás Lazo', 10, 4, 24, 25, 1.92),
('Bruno Lima', 12, 15, 25, 24, 1.98),
('Ezequiel Palacios', 13, 2, 26, 28, 1.98),
('Matías Giraudo', 16, 2, 27, 22, 1.96),
('Nicolás Zerba', 17, 3, 28, 21, 2.03),
('Martín Ramos', 18, 3, 29, 29, 1.97),
('Luciano Vicentín', 19, 4, 30, 20, 1.97),
('Joaquín Gallego', 21, 2, 32, 23, 2.04),
('Germán Johansen', 22, 15, 33, 25, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`id`, `nombre`) VALUES
(2, 'Armador'),
(3, 'Central'),
(14, 'Libero'),
(15, 'Opuesto'),
(4, 'Punta Receptor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `permiso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `permiso`) VALUES
(1, 'Matias', 'tomasmat_12@hotmail.com', '$2y$10$18e4s/4oodD.ls2uuMbK3.azfdJGvXG.1B/d4wGPBVjUQbo7k2WzK', 'Admin'),
(2, 'christian', 'christiannagy98@gmail.com', '$2y$10$6.ljcH67yUTmR3sdL1kXDOCq0DxNNt9WUVVRl6N9UZcZ1iDerPXs2', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_posicion` (`id_posicion`),
  ADD KEY `numero` (`numero`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `posicion`
--
ALTER TABLE `posicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_2` FOREIGN KEY (`id_posicion`) REFERENCES `posicion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
