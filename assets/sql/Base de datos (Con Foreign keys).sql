-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2022 a las 19:32:28
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e.t32r`
--
CREATE DATABASE IF NOT EXISTS `e.t32r` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e.t32r`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avatar`
--

CREATE TABLE `avatar` (
  `id_avatar` int(11) NOT NULL,
  `nombreArchivo` varchar(50) NOT NULL,
  `rutaArchivo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avatar`
--

INSERT INTO `avatar` (`id_avatar`, `nombreArchivo`, `rutaArchivo`) VALUES
(1, 'logo1.png', 'assets/img/iconosUsu/logo1.png'),
(2, 'logo2.png', 'assets/img/iconosUsu/logo2.png'),
(3, 'logo3.png', 'assets/img/iconosUsu/logo3.png'),
(4, 'logo4.png', 'assets/img/iconosUsu/logo4.png'),
(5, 'logo5.png', 'assets/img/iconosUsu/logo5.png'),
(6, 'logo6.png', 'assets/img/iconosUsu/logo6.png'),
(7, 'logo7.png', 'assets/img/iconosUsu/logo7.png'),
(8, 'logo8.png', 'assets/img/iconosUsu/logo8.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombreEspecialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `fechaPreguntada` date NOT NULL,
  `respondida` tinyint(1) NOT NULL,
  `especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `fechaRespondida` date NOT NULL,
  `especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subrespuesta`
--

CREATE TABLE `subrespuesta` (
  `id_subR` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `fechaSub` date NOT NULL,
  `respuesta` int(11) NOT NULL,
  `especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `nAvatar` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id_avatar`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `fk_pregunta_usuario` (`usuario`),
  ADD KEY `fk_pregunta_especialidad` (`especialidad`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_respuesta_usuario` (`usuario`),
  ADD KEY `fk_respuesta_especialidad` (`especialidad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `subrespuesta`
--
ALTER TABLE `subrespuesta`
  ADD PRIMARY KEY (`id_subR`),
  ADD KEY `fk_subrespuesta_usuario` (`usuario`),
  ADD KEY `fk_subrespuesta_respuesta` (`respuesta`),
  ADD KEY `fk_subrespuesta_espacialidad` (`especialidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_nAvatar` (`nAvatar`),
  ADD KEY `fk_usuario_rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id_avatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subrespuesta`
--
ALTER TABLE `subrespuesta`
  MODIFY `id_subR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_pregunta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_respuesta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `subrespuesta`
--
ALTER TABLE `subrespuesta`
  ADD CONSTRAINT `fk_subrespuesta_espacialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_subrespuesta_respuesta` FOREIGN KEY (`respuesta`) REFERENCES `respuesta` (`id_respuesta`),
  ADD CONSTRAINT `fk_subrespuesta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_nAvatar` FOREIGN KEY (`nAvatar`) REFERENCES `avatar` (`id_avatar`),
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
