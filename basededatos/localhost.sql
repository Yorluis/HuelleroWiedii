-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 20-11-2019 a las 21:33:27
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
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `equipo` text COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huella` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `equipo`, `correo`, `huella`, `f_creacion`) VALUES
(151, 'Jesus Becerra', 'ColoColo', 'jesus.becerra@wiedii.co', '12345678', '2019-11-15 20:57:18'),
(153, 'Yorluis Vega', 'ColoColo', 'yorluis.vega@wiedii.co', '67890', '2019-11-15 21:00:46'),
(161, 'Nestor Moya', 'ColoColo', 'nestor.moya@wiedii.co', '4321', '2019-11-18 22:08:20'),
(162, 'David Diaz', 'Lyons', 'david.diaz@wiedii.co', '098768', '2019-11-19 13:39:13'),
(163, 'Edward Vega', 'ColoColo', 'edward.vega@wiedii.co', '12345', '2019-11-19 20:44:15'),
(164, 'Nicola Di Candia', 'ColoColo', 'nicola.dicandia@wiedii.co', '123', '2019-11-20 16:28:07'),
(169, 'Renzon Caceres', 'Selgar', 'Renzon.caceres@wiedii.co', '1234', '2019-11-20 18:04:20'),
(170, 'Andres Carrillo', 'Margay', 'andres.carrillo@wiedii.co', '890', '2019-11-20 18:33:26'),
(171, 'Duban Garcia', 'ColoColo', 'duban.garcia@wiedii.co', '987', '2019-11-20 18:35:24'),
(174, 'fg', 'f', 'f', 'f', '2019-11-20 20:07:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
