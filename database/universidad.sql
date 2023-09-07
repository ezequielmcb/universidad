-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-09-2023 a las 16:44:28
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_materias`
--

DROP TABLE IF EXISTS `alumnos_materias`;
CREATE TABLE IF NOT EXISTS `alumnos_materias` (
  `id_am` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int DEFAULT NULL,
  `id_alumate` int DEFAULT NULL,
  `calificacion` int DEFAULT NULL,
  `mensajes` text NOT NULL,
  PRIMARY KEY (`id_am`),
  KEY `alumnos_materias_FK` (`id_alumno`),
  KEY `alumnos_materias_FK_1` (`id_alumate`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumnos_materias`
--

INSERT INTO `alumnos_materias` (`id_am`, `id_alumno`, `id_alumate`, `calificacion`, `mensajes`) VALUES
(1, 2, 15, 90, 'has mejorado mucho'),
(2, 3, 15, 12, 'pesimoo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_user`
--

DROP TABLE IF EXISTS `login_user`;
CREATE TABLE IF NOT EXISTS `login_user` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `email` (`email`),
  KEY `login_user_FK` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `login_user`
--

INSERT INTO `login_user` (`id_login`, `email`, `pass`, `id_users`) VALUES
(1, 'admin@admin', '$2y$10$3yBkuJiw6wPaaSNerx02quoIMEfR5J1TZSFeAjwMWOh1ayn1Gzyhi', 1),
(3, 'alumno@alumno', '$2y$10$QBuXH6e.VcYxhdRhzoCgPetuksBQDK7e11uVb8ZxXDYXMWBmQla0O', 3),
(31, 'alumno@2', '$2y$10$aGkFoGPccgbShcnMq3LVxu7WvDX3ra5LJJT9.RIJya3I9.k30unai', 53),
(32, 'maestro@maestro', '$2y$10$6Y.Y0pMbuAZQDMNWubWIQuUhPry2BHFe50w4Z0cUdcKf.X8rN.1Ua', 58),
(33, 'Ezequiel@eze', '$2y$10$2pKNr8dsbU6fgeRWF/Q6Suxgrz546QoAUYcUzXxccmwWD7Z/qfZFi', 61),
(35, 'maestro@3', '$2y$10$4s32GdzD6gHqfSY9wE4jQuYcOrJTBr7HkXov.Xyy0Gxwk26jINUAK', 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`) VALUES
(1, 'matematica'),
(11, 'fisica'),
(12, 'Comunicacion'),
(14, 'Ingeniería Mecánica'),
(15, 'Economía'),
(16, 'Ingeniería Civil '),
(22, 'fisica'),
(23, 'Lingüística'),
(24, 'Literatura '),
(27, 'Sociología '),
(30, 'gastronomia'),
(31, 'Literatura'),
(36, 'Farmacia '),
(43, 'programacionn inicial'),
(50, 'fisica'),
(51, 'programacionn inicial'),
(52, 'programacion'),
(60, 'Iusto doloremque ips'),
(64, 'Religion'),
(68, 'fisica'),
(71, 'sociales'),
(72, 'fisica'),
(73, 'programacion'),
(74, 'matema'),
(76, 'Matemetica'),
(77, 'Ingles'),
(78, 'Teatro'),
(80, 'fisica'),
(82, 'Matematica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materias`
--

DROP TABLE IF EXISTS `profesor_materias`;
CREATE TABLE IF NOT EXISTS `profesor_materias` (
  `id_pm` int NOT NULL AUTO_INCREMENT,
  `id_profesor` int DEFAULT NULL,
  `id_profemate` int DEFAULT NULL,
  PRIMARY KEY (`id_pm`),
  KEY `profesor_materias_FK_1` (`id_profemate`),
  KEY `profesor_materias_FK_2` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesor_materias`
--

INSERT INTO `profesor_materias` (`id_pm`, `id_profesor`, `id_profemate`) VALUES
(1, 2, 36),
(2, 2, 1),
(49, 58, 15),
(51, 58, 82),
(53, 63, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'admin'),
(2, 'maestro'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `dni` int DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `rol_id` int DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `usuarios_FK` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `dni`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `rol_id`) VALUES
(1, 402180238, 'Ezequiel', 'Cespedes Baez', '2001-01-24', 'calle 34 carrera 09-2', 1),
(2, 5234341, 'manuel', 'casado', '0000-00-00', 'CALLE 30 DE MARZO #00', 3),
(3, 98765, 'Alberto', 'Mendez', '1995-05-10', 'calle 30 #10-19', 3),
(53, 2147483647, 'Michelle ', 'Churchill ', '2017-06-10', 'Calle #90 carrera 45b', 3),
(58, 2147483647, 'Angelica', 'Cespedes', '1999-10-16', 'Carretera las yayas', 2),
(59, 98765789, 'Ezequiel', 'Cespedes', '2001-01-24', 'calle 30 #10-19', 3),
(60, 98765789, 'Ezequiel', 'Cespedes', '2001-01-24', 'calle 30 #10-19', 3),
(61, 98765789, 'Ezequiel', 'Cespedes', '2001-01-24', 'calle 30 #10-19', 3),
(63, 2147483647, 'Alberto', 'Perez', '2000-08-06', 'Colombia, popayan ', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD CONSTRAINT `alumnos_materias_FK` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `alumnos_materias_FK_1` FOREIGN KEY (`id_alumate`) REFERENCES `materias` (`id_materia`);

--
-- Filtros para la tabla `login_user`
--
ALTER TABLE `login_user`
  ADD CONSTRAINT `login_user_FK` FOREIGN KEY (`id_users`) REFERENCES `usuarios` (`id_user`);

--
-- Filtros para la tabla `profesor_materias`
--
ALTER TABLE `profesor_materias`
  ADD CONSTRAINT `profesor_materias_FK_1` FOREIGN KEY (`id_profemate`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `profesor_materias_FK_2` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
