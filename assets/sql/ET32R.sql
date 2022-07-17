-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2022 at 06:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e.t32r`
--
CREATE DATABASE IF NOT EXISTS `e.t32r` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e.t32r`;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id_avatar` int(11) NOT NULL,
  `nombreArchivo` varchar(50) NOT NULL,
  `rutaArchivo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `avatar`
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
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombreEspecialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombreEspecialidad`) VALUES
(1, 'Computacion'),
(2, 'Mecanica'),
(3, 'Automotores');

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
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
-- Table structure for table `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `fechaRespondida` date NOT NULL,
  `especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subrespuesta`
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
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contraseña` varchar(50) NOT NULL,
  `nAvatar` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `nickname`, `email`, `fechaNacimiento`, `telefono`, `contraseña`, `nAvatar`, `rol`) VALUES
(1, 'Ignacio1', 'Morales1', 'Doumeq01', 'ignaciomorales1@gmail.com', '1976-11-17', '13326162', '202cb962ac59075b964b07152d234b70', 2, 1),
(2, 'Ignacio2', 'Morales2', 'Doumeq02', 'ignaciomorales2@gmail.com', '1979-03-12', '13843791', '202cb962ac59075b964b07152d234b70', 6, 1),
(3, 'Ignacio3', 'Morales3', 'Doumeq03', 'ignaciomorales3@gmail.com', '1930-08-08', '13299612', '202cb962ac59075b964b07152d234b70', 8, 1),
(4, 'Ignacio4', 'Morales4', 'Doumeq04', 'ignaciomorales4@gmail.com', '1980-08-23', '17332771', '202cb962ac59075b964b07152d234b70', 4, 1),
(5, 'Ignacio5', 'Morales5', 'Doumeq05', 'ignaciomorales5@gmail.com', '1979-10-24', '17780360', '202cb962ac59075b964b07152d234b70', 4, 1),
(6, 'Ignacio6', 'Morales6', 'Doumeq06', 'ignaciomorales6@gmail.com', '1957-09-17', '18956977', '202cb962ac59075b964b07152d234b70', 7, 1),
(7, 'Ignacio7', 'Morales7', 'Doumeq07', 'ignaciomorales7@gmail.com', '1970-06-26', '14981373', '202cb962ac59075b964b07152d234b70', 5, 1),
(8, 'Ignacio8', 'Morales8', 'Doumeq08', 'ignaciomorales8@gmail.com', '1975-04-23', '14761477', '202cb962ac59075b964b07152d234b70', 6, 1),
(9, 'Ignacio9', 'Morales9', 'Doumeq09', 'ignaciomorales9@gmail.com', '1972-09-25', '13191329', '202cb962ac59075b964b07152d234b70', 6, 1),
(10, 'Ignacio10', 'Morales10', 'Doumeq010', 'ignaciomorales10@gmail.com', '1984-11-26', '13084605', '202cb962ac59075b964b07152d234b70', 1, 1),
(11, 'Ignacio11', 'Morales11', 'Doumeq011', 'ignaciomorales11@gmail.com', '2003-02-26', '18422689', '202cb962ac59075b964b07152d234b70', 8, 1),
(12, 'Ignacio12', 'Morales12', 'Doumeq012', 'ignaciomorales12@gmail.com', '2009-01-14', '14604726', '202cb962ac59075b964b07152d234b70', 8, 1),
(13, 'Ignacio13', 'Morales13', 'Doumeq013', 'ignaciomorales13@gmail.com', '1960-10-18', '19104578', '202cb962ac59075b964b07152d234b70', 5, 1),
(14, 'Ignacio14', 'Morales14', 'Doumeq014', 'ignaciomorales14@gmail.com', '1942-01-19', '12716162', '202cb962ac59075b964b07152d234b70', 7, 1),
(15, 'Ignacio15', 'Morales15', 'Doumeq015', 'ignaciomorales15@gmail.com', '2005-02-17', '15640744', '202cb962ac59075b964b07152d234b70', 1, 1),
(16, 'Ignacio16', 'Morales16', 'Doumeq016', 'ignaciomorales16@gmail.com', '2014-04-25', '17971258', '202cb962ac59075b964b07152d234b70', 4, 1),
(17, 'Ignacio17', 'Morales17', 'Doumeq017', 'ignaciomorales17@gmail.com', '1967-06-22', '17196286', '202cb962ac59075b964b07152d234b70', 1, 1),
(18, 'Ignacio18', 'Morales18', 'Doumeq018', 'ignaciomorales18@gmail.com', '1968-11-22', '16381173', '202cb962ac59075b964b07152d234b70', 4, 1),
(19, 'Ignacio19', 'Morales19', 'Doumeq019', 'ignaciomorales19@gmail.com', '2009-12-29', '18442204', '202cb962ac59075b964b07152d234b70', 7, 1),
(20, 'Ignacio20', 'Morales20', 'Doumeq020', 'ignaciomorales20@gmail.com', '1960-12-12', '15812692', '202cb962ac59075b964b07152d234b70', 5, 1),
(21, 'Ignacio21', 'Morales21', 'Doumeq021', 'ignaciomorales21@gmail.com', '2015-06-22', '13055830', '202cb962ac59075b964b07152d234b70', 1, 1),
(22, 'Ignacio22', 'Morales22', 'Doumeq022', 'ignaciomorales22@gmail.com', '2002-03-07', '19091412', '202cb962ac59075b964b07152d234b70', 6, 1),
(23, 'Ignacio23', 'Morales23', 'Doumeq023', 'ignaciomorales23@gmail.com', '1971-08-26', '13849843', '202cb962ac59075b964b07152d234b70', 7, 1),
(24, 'Ignacio24', 'Morales24', 'Doumeq024', 'ignaciomorales24@gmail.com', '1963-02-27', '16509794', '202cb962ac59075b964b07152d234b70', 7, 1),
(25, 'Ignacio25', 'Morales25', 'Doumeq025', 'ignaciomorales25@gmail.com', '1945-06-08', '14577318', '202cb962ac59075b964b07152d234b70', 1, 1),
(26, 'Ignacio26', 'Morales26', 'Doumeq026', 'ignaciomorales26@gmail.com', '2015-07-17', '16944796', '202cb962ac59075b964b07152d234b70', 2, 1),
(27, 'Ignacio27', 'Morales27', 'Doumeq027', 'ignaciomorales27@gmail.com', '1972-09-08', '14209808', '202cb962ac59075b964b07152d234b70', 4, 1),
(28, 'Ignacio28', 'Morales28', 'Doumeq028', 'ignaciomorales28@gmail.com', '1930-09-21', '17371555', '202cb962ac59075b964b07152d234b70', 4, 1),
(29, 'Ignacio29', 'Morales29', 'Doumeq029', 'ignaciomorales29@gmail.com', '1994-12-04', '17635769', '202cb962ac59075b964b07152d234b70', 3, 1),
(30, 'Ignacio30', 'Morales30', 'Doumeq030', 'ignaciomorales30@gmail.com', '1983-05-07', '14701417', '202cb962ac59075b964b07152d234b70', 7, 1),
(31, 'Ignacio31', 'Morales31', 'Doumeq031', 'ignaciomorales31@gmail.com', '1983-05-30', '14706211', '202cb962ac59075b964b07152d234b70', 5, 1),
(32, 'Ignacio32', 'Morales32', 'Doumeq032', 'ignaciomorales32@gmail.com', '1963-05-13', '16589906', '202cb962ac59075b964b07152d234b70', 8, 1),
(33, 'Ignacio33', 'Morales33', 'Doumeq033', 'ignaciomorales33@gmail.com', '1970-05-12', '17656745', '202cb962ac59075b964b07152d234b70', 1, 1),
(34, 'Ignacio34', 'Morales34', 'Doumeq034', 'ignaciomorales34@gmail.com', '2016-05-10', '17625862', '202cb962ac59075b964b07152d234b70', 2, 1),
(35, 'Ignacio35', 'Morales35', 'Doumeq035', 'ignaciomorales35@gmail.com', '1990-06-23', '13627609', '202cb962ac59075b964b07152d234b70', 4, 1),
(36, 'Ignacio36', 'Morales36', 'Doumeq036', 'ignaciomorales36@gmail.com', '2004-05-01', '14705922', '202cb962ac59075b964b07152d234b70', 3, 1),
(37, 'Ignacio37', 'Morales37', 'Doumeq037', 'ignaciomorales37@gmail.com', '1982-12-26', '18121763', '202cb962ac59075b964b07152d234b70', 6, 1),
(38, 'Ignacio38', 'Morales38', 'Doumeq038', 'ignaciomorales38@gmail.com', '1976-01-29', '13362469', '202cb962ac59075b964b07152d234b70', 1, 1),
(39, 'Ignacio39', 'Morales39', 'Doumeq039', 'ignaciomorales39@gmail.com', '2006-03-22', '12450842', '202cb962ac59075b964b07152d234b70', 5, 1),
(40, 'Ignacio40', 'Morales40', 'Doumeq040', 'ignaciomorales40@gmail.com', '1953-10-07', '16037874', '202cb962ac59075b964b07152d234b70', 5, 1),
(41, 'Ignacio41', 'Morales41', 'Doumeq041', 'ignaciomorales41@gmail.com', '1981-07-06', '17994641', '202cb962ac59075b964b07152d234b70', 3, 1),
(42, 'Ignacio42', 'Morales42', 'Doumeq042', 'ignaciomorales42@gmail.com', '2020-08-03', '13800115', '202cb962ac59075b964b07152d234b70', 3, 1),
(43, 'Ignacio43', 'Morales43', 'Doumeq043', 'ignaciomorales43@gmail.com', '1983-10-12', '13250764', '202cb962ac59075b964b07152d234b70', 4, 1),
(44, 'Ignacio44', 'Morales44', 'Doumeq044', 'ignaciomorales44@gmail.com', '1998-03-31', '19134583', '202cb962ac59075b964b07152d234b70', 3, 1),
(45, 'Ignacio45', 'Morales45', 'Doumeq045', 'ignaciomorales45@gmail.com', '1964-12-17', '17419687', '202cb962ac59075b964b07152d234b70', 5, 1),
(46, 'Ignacio46', 'Morales46', 'Doumeq046', 'ignaciomorales46@gmail.com', '1989-07-21', '16122004', '202cb962ac59075b964b07152d234b70', 5, 1),
(47, 'Ignacio47', 'Morales47', 'Doumeq047', 'ignaciomorales47@gmail.com', '1939-03-30', '18697232', '202cb962ac59075b964b07152d234b70', 5, 1),
(48, 'Ignacio48', 'Morales48', 'Doumeq048', 'ignaciomorales48@gmail.com', '1988-11-25', '18088689', '202cb962ac59075b964b07152d234b70', 5, 1),
(49, 'Ignacio49', 'Morales49', 'Doumeq049', 'ignaciomorales49@gmail.com', '1984-05-21', '18382570', '202cb962ac59075b964b07152d234b70', 1, 1),
(50, 'Ignacio50', 'Morales50', 'Doumeq050', 'ignaciomorales50@gmail.com', '1952-10-09', '16407918', '202cb962ac59075b964b07152d234b70', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id_avatar`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indexes for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `fk_pregunta_usuario` (`usuario`),
  ADD KEY `fk_pregunta_especialidad` (`especialidad`);

--
-- Indexes for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_respuesta_usuario` (`usuario`),
  ADD KEY `fk_respuesta_especialidad` (`especialidad`),
  ADD KEY `fk_respuesta_pregunta` (`pregunta`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `subrespuesta`
--
ALTER TABLE `subrespuesta`
  ADD PRIMARY KEY (`id_subR`),
  ADD KEY `fk_subrespuesta_usuario` (`usuario`),
  ADD KEY `fk_subrespuesta_respuesta` (`respuesta`),
  ADD KEY `fk_subrespuesta_espacialidad` (`especialidad`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_nAvatar` (`nAvatar`),
  ADD KEY `fk_usuario_rol` (`rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id_avatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subrespuesta`
--
ALTER TABLE `subrespuesta`
  MODIFY `id_subR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_pregunta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_respuesta_pregunta` FOREIGN KEY (`pregunta`) REFERENCES `pregunta` (`id_pregunta`),
  ADD CONSTRAINT `fk_respuesta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `subrespuesta`
--
ALTER TABLE `subrespuesta`
  ADD CONSTRAINT `fk_subrespuesta_espacialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_subrespuesta_respuesta` FOREIGN KEY (`respuesta`) REFERENCES `respuesta` (`id_respuesta`),
  ADD CONSTRAINT `fk_subrespuesta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_nAvatar` FOREIGN KEY (`nAvatar`) REFERENCES `avatar` (`id_avatar`),
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
