-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 17:20:59
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nomUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apeUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telUsuario` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `correoUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `passUsuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nomUsuario`, `apeUsuario`, `telUsuario`, `correoUsuario`, `usuario`, `passUsuario`) VALUES
(1, 'SuperAdmin', 'admin', '809-735-7439', 'admin@gmail.com', 'admin', 'admin'),
(12, 'Enán', 'Inoa ', '829-264-5717', 'enanthecool@gmail.com', 'enan', 'enan2022'),
(13, 'Cristinito', 'Ramon', '23223', 'a@d', 'adminp', '1234'),
(14, 'Soranny', 'Inoa', '809-613-3731', 'sorai@gmail.com', 'sora', 'asib');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `matricula` char(6) COLLATE utf8_spanish_ci NOT NULL,
  `nomUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apeUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telUsuario` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `correoUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `passUsuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`matricula`, `nomUsuario`, `apeUsuario`, `telUsuario`, `correoUsuario`, `usuario`, `passUsuario`, `id_grado`) VALUES
('cr0529', 'Cristino', 'Ramireza', '809-784-8744', 'cristino05276@homtail.com', 'Cristy', 'cr0005', 1),
('dg0210', 'Diego', 'Maradona', '809-353-0921', 'godie@gmail.com', '10go', '2022', 1),
('En2022', 'Enan', 'Inoa', '809-290-1466', 'enan@gmail.com', 'enan12', '4321', 1),
('En2023', 'Cristinito', 'elprofe', '809-587-5824', 'a@do', 'admin', '1234', 0),
('no2020', 'Noris', 'Bautista', '809-606-1466', 'norisb@gmail.com', 'norisita', '1234', 1),
('stu201', 'estudiar', 'mucho', '809-735-7439', 'ei@g.com', 'stu', 'diar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL,
  `nombreGrado` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `nombreGrado`) VALUES
(0, '--'),
(1, '6toB'),
(2, '6toA'),
(6, '7moD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `hora_inicial` int(11) NOT NULL,
  `hora_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `matricula_titular` char(6) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `matricula_titular`) VALUES
(1, 'Español', 'DR1989'),
(2, 'Sociales', 'pr0232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_materia` int(11) NOT NULL,
  `matricula_alumno` char(6) COLLATE utf8_spanish_ci NOT NULL,
  `nota_periodo1` int(3) NOT NULL,
  `nota_periodo2` int(3) NOT NULL,
  `nota_periodo3` int(3) NOT NULL,
  `nota_final` int(3) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_materia`, `matricula_alumno`, `nota_periodo1`, `nota_periodo2`, `nota_periodo3`, `nota_final`, `estado`) VALUES
(2, 'En2022', 20, 30, 89, 93, 'Aprobado'),
(1, 'no2020', 20, 30, 89, 88, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `matricula` char(6) COLLATE utf8_spanish_ci NOT NULL,
  `nomUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apeUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telUsuario` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `correoUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `passUsuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_grado_titular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`matricula`, `nomUsuario`, `apeUsuario`, `telUsuario`, `correoUsuario`, `usuario`, `passUsuario`, `id_grado_titular`) VALUES
('BH2021', 'Blochet', 'Halls', '922-234-1231', 'tehall@gmaol.com', 'teacher', '1234', 6),
('DR1989', 'Don', 'Ramon', '809-587-5824', 'dramon@8', 'ramon', 'don', 2),
('pr0232', 'profesor1', 'profe', '809-809-5752', 'proff@gmail.com', 'profe', 'profe', 1),
('ri2022', 'Rina', 'Martinez', '829-730-5822', 'rinam@gmail.com', 'rinitis', '2022', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `matricula_alumno` (`matricula_alumno`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`matricula_alumno`) REFERENCES `estudiantes` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
