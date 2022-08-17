-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2022 a las 21:55:49
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

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombreEspecialidad`) VALUES
(1, 'Computacion'),
(2, 'Mecanica'),
(3, 'Automotores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `usuario_pregunta` int(11) NOT NULL,
  `asunto` varchar(100) NOT NULL,
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
  `usuario_respuesta` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dispositivo` varchar(1000) NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `contraseña` varchar(50) NOT NULL,
  `nAvatar` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `nickname`, `email`, `fechaNacimiento`, `contraseña`, `nAvatar`, `rol`) VALUES
(1, 'Ignacio1', 'Morales1', 'Doumeq01', 'ignaciomorales1@gmail.com', '1976-11-17', '202cb962ac59075b964b07152d234b70', 2, 2),
(2, 'Ignacio2', 'Morales2', 'Doumeq02', 'ignaciomorales2@gmail.com', '1979-03-12', '202cb962ac59075b964b07152d234b70', 6, 2),
(3, 'Ignacio3', 'Morales3', 'Doumeq03', 'ignaciomorales3@gmail.com', '1930-08-08', '202cb962ac59075b964b07152d234b70', 8, 2),
(4, 'Ignacio4', 'Morales4', 'Doumeq04', 'ignaciomorales4@gmail.com', '1980-08-23', '202cb962ac59075b964b07152d234b70', 4, 2),
(5, 'Ignacio5', 'Morales5', 'Doumeq05', 'ignaciomorales5@gmail.com', '1979-10-24', '202cb962ac59075b964b07152d234b70', 4, 2),
(6, 'Ignacio6', 'Morales6', 'Doumeq06', 'ignaciomorales6@gmail.com', '1957-09-17', '202cb962ac59075b964b07152d234b70', 7, 2),
(7, 'Ignacio7', 'Morales7', 'Doumeq07', 'ignaciomorales7@gmail.com', '1970-06-26', '202cb962ac59075b964b07152d234b70', 5, 2),
(8, 'Ignacio8', 'Morales8', 'Doumeq08', 'ignaciomorales8@gmail.com', '1975-04-23', '202cb962ac59075b964b07152d234b70', 6, 2),
(9, 'Ignacio9', 'Morales9', 'Doumeq09', 'ignaciomorales9@gmail.com', '1972-09-25', '202cb962ac59075b964b07152d234b70', 6, 2),
(10, 'Ignacio10', 'Morales10', 'Doumeq010', 'ignaciomorales10@gmail.com', '1984-11-26', '202cb962ac59075b964b07152d234b70', 1, 1),
(11, 'Ignacio11', 'Morales11', 'Doumeq011', 'ignaciomorales11@gmail.com', '2003-02-26', '202cb962ac59075b964b07152d234b70', 8, 1),
(12, 'Ignacio12', 'Morales12', 'Doumeq012', 'ignaciomorales12@gmail.com', '2009-01-14', '202cb962ac59075b964b07152d234b70', 8, 1),
(13, 'Ignacio13', 'Morales13', 'Doumeq013', 'ignaciomorales13@gmail.com', '1960-10-18', '202cb962ac59075b964b07152d234b70', 5, 1),
(14, 'Ignacio14', 'Morales14', 'Doumeq014', 'ignaciomorales14@gmail.com', '1942-01-19', '202cb962ac59075b964b07152d234b70', 7, 1),
(15, 'Ignacio15', 'Morales15', 'Doumeq015', 'ignaciomorales15@gmail.com', '2005-02-17', '202cb962ac59075b964b07152d234b70', 1, 1),
(16, 'Ignacio16', 'Morales16', 'Doumeq016', 'ignaciomorales16@gmail.com', '2014-04-25', '202cb962ac59075b964b07152d234b70', 4, 1),
(17, 'Ignacio17', 'Morales17', 'Doumeq017', 'ignaciomorales17@gmail.com', '1967-06-22', '202cb962ac59075b964b07152d234b70', 1, 1),
(18, 'Ignacio18', 'Morales18', 'Doumeq018', 'ignaciomorales18@gmail.com', '1968-11-22', '202cb962ac59075b964b07152d234b70', 4, 1),
(19, 'Ignacio19', 'Morales19', 'Doumeq019', 'ignaciomorales19@gmail.com', '2009-12-29', '202cb962ac59075b964b07152d234b70', 7, 1),
(20, 'Ignacio20', 'Morales20', 'Doumeq020', 'ignaciomorales20@gmail.com', '1960-12-12', '202cb962ac59075b964b07152d234b70', 5, 1),
(21, 'Ignacio21', 'Morales21', 'Doumeq021', 'ignaciomorales21@gmail.com', '2015-06-22', '202cb962ac59075b964b07152d234b70', 1, 1),
(22, 'Ignacio22', 'Morales22', 'Doumeq022', 'ignaciomorales22@gmail.com', '2002-03-07', '202cb962ac59075b964b07152d234b70', 6, 1),
(23, 'Ignacio23', 'Morales23', 'Doumeq023', 'ignaciomorales23@gmail.com', '1971-08-26', '202cb962ac59075b964b07152d234b70', 7, 1),
(24, 'Ignacio24', 'Morales24', 'Doumeq024', 'ignaciomorales24@gmail.com', '1963-02-27', '202cb962ac59075b964b07152d234b70', 7, 1),
(25, 'Ignacio25', 'Morales25', 'Doumeq025', 'ignaciomorales25@gmail.com', '1945-06-08', '202cb962ac59075b964b07152d234b70', 1, 1),
(26, 'Ignacio26', 'Morales26', 'Doumeq026', 'ignaciomorales26@gmail.com', '2015-07-17', '202cb962ac59075b964b07152d234b70', 2, 1),
(27, 'Ignacio27', 'Morales27', 'Doumeq027', 'ignaciomorales27@gmail.com', '1972-09-08', '202cb962ac59075b964b07152d234b70', 4, 1),
(28, 'Ignacio28', 'Morales28', 'Doumeq028', 'ignaciomorales28@gmail.com', '1930-09-21', '202cb962ac59075b964b07152d234b70', 4, 1),
(29, 'Ignacio29', 'Morales29', 'Doumeq029', 'ignaciomorales29@gmail.com', '1994-12-04', '202cb962ac59075b964b07152d234b70', 3, 1),
(30, 'Ignacio30', 'Morales30', 'Doumeq030', 'ignaciomorales30@gmail.com', '1983-05-07', '202cb962ac59075b964b07152d234b70', 7, 1),
(31, 'Ignacio31', 'Morales31', 'Doumeq031', 'ignaciomorales31@gmail.com', '1983-05-30', '202cb962ac59075b964b07152d234b70', 5, 1),
(32, 'Ignacio32', 'Morales32', 'Doumeq032', 'ignaciomorales32@gmail.com', '1963-05-13', '202cb962ac59075b964b07152d234b70', 8, 1),
(33, 'Ignacio33', 'Morales33', 'Doumeq033', 'ignaciomorales33@gmail.com', '1970-05-12', '202cb962ac59075b964b07152d234b70', 1, 1),
(34, 'Ignacio34', 'Morales34', 'Doumeq034', 'ignaciomorales34@gmail.com', '2016-05-10', '202cb962ac59075b964b07152d234b70', 2, 1),
(35, 'Ignacio35', 'Morales35', 'Doumeq035', 'ignaciomorales35@gmail.com', '1990-06-23', '202cb962ac59075b964b07152d234b70', 4, 1),
(36, 'Ignacio36', 'Morales36', 'Doumeq036', 'ignaciomorales36@gmail.com', '2004-05-01', '202cb962ac59075b964b07152d234b70', 3, 1),
(37, 'Ignacio37', 'Morales37', 'Doumeq037', 'ignaciomorales37@gmail.com', '1982-12-26', '202cb962ac59075b964b07152d234b70', 6, 1),
(38, 'Ignacio38', 'Morales38', 'Doumeq038', 'ignaciomorales38@gmail.com', '1976-01-29', '202cb962ac59075b964b07152d234b70', 1, 1),
(39, 'Ignacio39', 'Morales39', 'Doumeq039', 'ignaciomorales39@gmail.com', '2006-03-22', '202cb962ac59075b964b07152d234b70', 5, 1),
(40, 'Ignacio40', 'Morales40', 'Doumeq040', 'ignaciomorales40@gmail.com', '1953-10-07', '202cb962ac59075b964b07152d234b70', 5, 1),
(41, 'Ignacio41', 'Morales41', 'Doumeq041', 'ignaciomorales41@gmail.com', '1981-07-06', '202cb962ac59075b964b07152d234b70', 3, 1),
(42, 'Ignacio42', 'Morales42', 'Doumeq042', 'ignaciomorales42@gmail.com', '2020-08-03', '202cb962ac59075b964b07152d234b70', 3, 1),
(43, 'Ignacio43', 'Morales43', 'Doumeq043', 'ignaciomorales43@gmail.com', '1983-10-12', '202cb962ac59075b964b07152d234b70', 4, 1),
(44, 'Ignacio44', 'Morales44', 'Doumeq044', 'ignaciomorales44@gmail.com', '1998-03-31', '202cb962ac59075b964b07152d234b70', 3, 1),
(45, 'Ignacio45', 'Morales45', 'Doumeq045', 'ignaciomorales45@gmail.com', '1964-12-17', '202cb962ac59075b964b07152d234b70', 5, 1),
(46, 'Ignacio46', 'Morales46', 'Doumeq046', 'ignaciomorales46@gmail.com', '1989-07-21', '202cb962ac59075b964b07152d234b70', 5, 1),
(47, 'Ignacio47', 'Morales47', 'Doumeq047', 'ignaciomorales47@gmail.com', '1939-03-30', '202cb962ac59075b964b07152d234b70', 5, 1),
(48, 'Ignacio48', 'Morales48', 'Doumeq048', 'ignaciomorales48@gmail.com', '1988-11-25', '202cb962ac59075b964b07152d234b70', 5, 1),
(49, 'Ignacio49', 'Morales49', 'Doumeq049', 'ignaciomorales49@gmail.com', '1984-05-21', '202cb962ac59075b964b07152d234b70', 1, 1),
(50, 'Ignacio50', 'Morales50', 'Doumeq050', 'ignaciomorales50@gmail.com', '1952-10-09', '202cb962ac59075b964b07152d234b70', 5, 1);

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
  ADD KEY `fk_pregunta_usuario` (`usuario_pregunta`),
  ADD KEY `fk_pregunta_especialidad` (`especialidad`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_respuesta_usuario` (`usuario_respuesta`),
  ADD KEY `fk_respuesta_especialidad` (`especialidad`),
  ADD KEY `fk_respuesta_pregunta` (`pregunta`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sesion_usuario` (`id_usuario`);

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
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subrespuesta`
--
ALTER TABLE `subrespuesta`
  MODIFY `id_subR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_pregunta_usuario` FOREIGN KEY (`usuario_pregunta`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_respuesta_pregunta` FOREIGN KEY (`pregunta`) REFERENCES `pregunta` (`id_pregunta`),
  ADD CONSTRAINT `fk_respuesta_usuario` FOREIGN KEY (`usuario_respuesta`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `fk_sesion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

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
