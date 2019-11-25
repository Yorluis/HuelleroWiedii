-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 25-11-2019 a las 21:26:36
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios_wiedii`
--
CREATE DATABASE IF NOT EXISTS `usuarios_wiedii` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `usuarios_wiedii`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_user`
--

CREATE TABLE `log_user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `log_user`
--

INSERT INTO `log_user` (`id`, `email`, `password`) VALUES
(19, 'yorluis.vega@gmail.com', '$2y$10$IB/a45aJpJmuA5S4Ie5Z5erRnZs.neiIy4R0gXX4cG38il5Soh/NW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `fecha`, `hora_entrada`, `hora_salida`, `id`) VALUES
(35, '2019-11-25', '12:50:45', NULL, 176),
(36, '2019-11-25', NULL, '12:50:55', 176),
(38, '2019-11-25', '14:57:44', NULL, 176),
(39, '2019-11-25', NULL, '14:57:50', 176),
(40, '2019-11-25', '14:57:56', NULL, 176),
(41, '2019-11-25', NULL, '14:58:01', 176),
(42, '2019-11-25', '14:58:56', NULL, 151),
(43, '2019-11-25', NULL, '14:59:05', 151),
(44, '2019-11-25', '14:59:15', NULL, 151),
(45, '2019-11-25', NULL, '14:59:21', 151);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `equipo` text COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huella` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_almuerzo_salid` time DEFAULT NULL,
  `hora_almuerzo_ent` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `f_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `equipo`, `correo`, `huella`, `hora_entrada`, `hora_almuerzo_salid`, `hora_almuerzo_ent`, `hora_salida`, `f_creacion`) VALUES
(151, 'Jesus Becerra', 'ColoColo', 'jesus.becerra@wiedii.co', '12345678', '07:00:00', '12:00:00', '13:00:00', '17:00:00', '2019-11-15 20:57:18'),
(163, 'Edward Vega', 'ColoColo', 'edward.vega@wiedii.co', '12345', '07:00:00', '13:00:00', '14:00:00', '17:00:00', '2019-11-19 20:44:15'),
(170, 'Andres Carrillo', 'Margay', 'andres.carrillo@wiedii.co', '890', '07:00:00', '12:00:00', '13:00:00', '17:00:00', '2019-11-20 18:33:26'),
(176, 'Yorluis Vega', 'ColoColo', 'yorluis.vega@wiedii.co', '67890', '07:00:00', '12:00:00', '13:00:00', '17:00:00', '2019-11-25 15:55:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `huella` (`huella`),
  ADD UNIQUE KEY `nombre` (`nombre`(250));

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
