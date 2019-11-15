-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 15-11-2019 a las 21:23:05
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
(1, 'yorluis.vega@gmail.com', '$2y$10$QHb/iDMyHKRqzV3OHNmyPeI/WejfvAEDzIsuDaVKSEuCZqAKNDzYa'),
(3, 'daniel@wiedii.co', '$2y$10$1PtLnEg/regG/6zKPadN0eO/900H1HlH9NQ6JE3Qo1uAv6lMWXbDq'),
(4, 'edward.vega@gmail.com', '$2y$10$6DFmjYtMVllrb6jglryeBO/jo2JoLVMX1ZWm7RZLb/4CX5h1X2lBW'),
(5, 'yorluis.vega@gmail.com', '$2y$10$7ymYwI/IEnKgePa70CRdVOm3mWCRxuu954kNQ191j9/abfghsT736'),
(6, 'luis.vega@gmail.com', '$2y$10$bMrECx1cHNnFsE0W69FrqOR0LJJPo/vYxoRI8u5MJo6RlinONB7Nq'),
(11, 'edward.vega@gmail.com', '$2y$10$.nHsOmJuufPW6B2gsrwYL.BLX5TNiZiQikD69ANIMU6Ls0.sBm8SK'),
(12, 'vega@gmail.com', '$2y$10$5aLTVa63ezdBnEEu43l4A.4mruMxOzc8ohZxeLBfAmRE3DbRzpkHq'),
(13, 'alex@gmail.com', '$2y$10$QjUumB0jPe.ElTa/M0fRT.5QMqUL15myuAej8PrDndJb/0tJYInmi'),
(14, 'alex1@gmail.com', '$2y$10$QHb/iDMyHKRqzV3OHNmyPeI/WejfvAEDzIsuDaVKSEuCZqAKNDzYa'),
(15, 'danielbecerra@gmail.com', '$2y$10$wBr4FzA.0gbncIdRM92fkOOmaKtUXRhEbcVe2I3XochEmEUlPrMJu'),
(16, 'branyan@wiedii.co', '$2y$10$bLqjoJIWO1FXcDWaA1eWauKea6wt421gKMKf82lPLKACaxc3a5KhG'),
(17, 'dani@gmail.com', '$2y$10$DS1y.rW6RYc9eAR01Uijzuk33UU15M3yfUnEEhPCWjwLURHRHloqy'),
(18, 'alex10@gmail.com', '$2y$10$gw5dMElY7lzUdc.e/FOu3OIef7Xr40YcNWSs8GNBHcfX4Gaij1Wui');

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
(151, '32r23ttt', '32rr32', '3rr', '32r23r32sdfws', '2019-11-15 20:57:18'),
(153, 'dsfs', 'dsfsdfds43t43t43', 'dsfdsfdst4t4tttt', 'fefewfwt43', '2019-11-15 21:00:46'),
(158, '43t4t4', 't43t43', '43t43', '43t4', '2019-11-15 21:19:59'),
(159, '3t4443', '43t43', '43t34', '43t4t3', '2019-11-15 21:20:04');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
