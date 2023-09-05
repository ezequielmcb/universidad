-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 23:42:56
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
(1, 2, 3, 90, 'has mejorado mucho'),
(2, 3, 43, 12, 'pesimoo');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `login_user`
--

INSERT INTO `login_user` (`id_login`, `email`, `pass`, `id_users`) VALUES
(1, 'admin@admin', '123', 1),
(2, 'maestro@maestro123', '222', 2),
(3, 'alumn@alumno', '333', 3),
(4, 'wityjafys@mailinator.com', 'tu_contrasena', 16),
(5, 'qozymorile@mailinator.com', 'tu_contrasena', 17),
(6, 'maestro@maestro', '123', 18),
(7, 'wunezuhum@mailinator.com', '123', 19),
(8, 'hesazi@mailinator.com', '123', 20),
(9, 'wivumamipa@mailinator.com', '123', 21),
(10, 'qopegapowa@mailinator.com', '123', 22),
(11, 'xowiro@mailinator.com', '123', 23),
(12, 'fovu@mailinator.com', '123', 24),
(13, 'ezequielcespede@gmail.com', NULL, 25),
(14, 'ezequielcessdaspede@gmail.com', NULL, 27),
(15, 'esssssszequielcespede@gmail.com', NULL, 26),
(16, 'qwe@qweasdasd', NULL, 30),
(17, 'zxc@zxc.com', NULL, 28),
(18, 'qwe@qwewdasd', NULL, 29),
(19, 'qwe@qwe', NULL, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`) VALUES
(1, 'matematica'),
(2, 'ciencias sociales'),
(3, 'lengua española'),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, 'fisica'),
(12, 'fisica'),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, 'fisica'),
(22, 'fisica'),
(23, ''),
(24, ''),
(25, 'religion'),
(26, ''),
(27, ''),
(28, 'gastronomia'),
(29, 'gastronomia'),
(30, 'gastronomia'),
(31, 'gastronomia'),
(32, 'gastronomia'),
(33, 'gastronomia'),
(34, ''),
(35, ''),
(36, ''),
(37, 'gastronomia'),
(38, 'programacionn inicial'),
(39, 'programacionn inicial'),
(40, 'teatro'),
(41, 'teatro'),
(42, 'fisica'),
(43, 'programacionn inicial'),
(44, 'sociales'),
(45, 'matema');

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
  KEY `profesor_materias_FK` (`id_profesor`),
  KEY `profesor_materias_FK_1` (`id_profemate`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesor_materias`
--

INSERT INTO `profesor_materias` (`id_pm`, `id_profesor`, `id_profemate`) VALUES
(1, 2, 2),
(2, 2, 1),
(3, 28, 3),
(4, 29, 3),
(5, 32, 3),
(6, 33, 2),
(7, 35, 44),
(8, 36, 3),
(9, 37, 2),
(10, 39, 3),
(11, 40, 2),
(12, 31, 39),
(13, 39, 40),
(14, 39, 41),
(15, 36, 42),
(16, 39, 43),
(17, 24, 44);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `dni`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `rol_id`) VALUES
(1, 40290188, 'Ezequiel', 'Cespedes', '2013-09-03', 'calle 34 carrera 09-2', 1),
(2, 5234341, 'manuel', 'casado', '0000-00-00', 'CALLE 30 DE MARZO #00', 3),
(3, 98765, 'Dolorem molestiae mo', 'Temporibus unde aut ', '1977-05-22', 'Asperiores id dolor ', 3),
(4, 987654, '22-Jan-1989', '14-Oct-1993', '2010-11-27', '28-Oct-2021', 3),
(5, 987654, '02-Mar-1996', '27-Oct-1976', '2015-02-01', '19-Aug-2019', 3),
(6, 987654, '11-Mar-2014', '20-Mar-2011', '1983-12-05', '04-Jan-1997', 3),
(7, 2312454, 'matias', 'perez', '2012-12-12', 'esquia 4 calle 3', 3),
(8, 1321234, '16-Jun-2012', '18-Feb-2021', '1996-02-04', '05-Apr-1988', 3),
(9, 0, '25-Aug-1995', '09-Aug-1991', '2004-05-10', '22-Nov-2003', 3),
(10, 0, 'Blanditiis cillum qu', 'Omnis aut molestiae ', '1987-07-04', 'Quas minima sed qui ', 3),
(11, 0, 'Blanditiis cillum qu', 'Omnis aut molestiae ', '1987-07-04', 'Quas minima sed qui ', 3),
(12, 0, 'Blanditiis cillum qu', 'Omnis aut molestiae ', '1987-07-04', 'Quas minima sed qui ', 3),
(13, 0, 'Blanditiis cillum qu', 'Omnis aut molestiae ', '1987-07-04', 'Quas minima sed qui ', 3),
(14, 0, 'Blanditiis cillum qu', 'Omnis aut molestiae ', '1987-07-04', 'Quas minima sed qui ', 3),
(15, 0, 'Blanditiis cillum qu', 'Omnis aut molestiae ', '1987-07-04', 'Quas minima sed qui ', 3),
(16, 0, 'Quis debitis rerum c', 'Sunt natus tempore ', '1973-01-26', 'Nam esse qui et nih', 3),
(17, 67897689, 'Recusandae Non nesc', 'Eius aliquam volupta', '2020-03-08', 'Vitae consectetur pr', 3),
(18, 0, '', '', '0000-00-00', '', 2),
(19, 0, 'Enim maxime Nam veli', 'Vitae praesentium eo', '1996-06-06', 'Officia autem possim', 3),
(20, 0, 'Dolore ut qui dolore', 'Harum voluptate est', '1981-12-16', 'Ullamco consectetur', 3),
(21, 0, 'Pariatur Qui aperia', 'Eu perferendis ducim', '2013-12-05', 'Quo harum aute sunt ', 3),
(22, 0, 'Id porro voluptatem', 'Duis ut sit aperiam ', '1981-03-05', 'Quia ullamco quos ut', 3),
(23, 0, 'Beatae sint temporib', 'Dolore aliquid irure', '0001-01-01', 'Quis autem ex tempor', 3),
(24, 0, 'ppppppppp', 'Sequi quas non fugia', '1995-11-17', 'Quam voluptatibus au', 3),
(25, NULL, 'Ezequiel', 'Cespedes', '0000-00-00', 'No.85 Calle 30 De Marzo', 3),
(26, NULL, 'Ezequiel', 'Cespedes', '0000-00-00', 'No.85 Calle 30 De Marzo', 2),
(27, NULL, 'Ezequiel', 'Cespedes', '0000-00-00', 'No.85 Calle 30 De Marzo', 3),
(28, NULL, 'zcx', 'zxc', '0000-00-00', 'cam', 2),
(29, NULL, 'ma', 'ma', '0000-00-00', 'Sit libero vitae ei', 2),
(30, NULL, 'qwe', 'qwee', '0000-00-00', 'qqw', 3),
(31, NULL, 'Ezequiel', 'Cespedes', '0000-00-00', 'No.85 Calle 30 De Marzo', 3),
(32, NULL, 'Ezequiel', 'Cespedes', '0000-00-00', 'No.85 Calle 30 De Marzo', 2),
(33, NULL, 'Consequatur tempor i', 'Iusto proident repe', '1999-12-28', 'Officia adipisicing ', 2),
(34, NULL, 'Ipsum quidem nihil ', 'Ex odio architecto e', '2004-07-08', 'Sunt facilis esse ', 2),
(35, NULL, 'Ezequiel', 'Cespedes', '2023-09-14', 'No.85 Calle 30 De Marzo', 2),
(36, NULL, 'Perspiciatis dolor ', 'Consequuntur consequ', '1972-09-09', 'Sint voluptas offici', 2),
(37, NULL, 'zzz', 'xxxx', '2023-08-31', 'No.85 Calle 30 De Marzo', 2),
(38, NULL, 'Ad eveniet quia mol', 'Esse ad nulla asper', '0000-00-00', 'Eos impedit consect', 2),
(39, NULL, 'leo', 'quezadda', '1978-02-11', 'Expedita ex sit vol', 2),
(40, NULL, 'Ezequiel', 'Cespedes', '2023-09-23', 'No.85 Calle 30 De Marzo', 2),
(41, NULL, '', '', '0000-00-00', '', 2);

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
  ADD CONSTRAINT `profesor_materias_FK` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `profesor_materias_FK_1` FOREIGN KEY (`id_profemate`) REFERENCES `materias` (`id_materia`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
