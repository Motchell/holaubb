-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-09-2022 a las 15:54:53
-- Versión del servidor: 8.0.28
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `G12taller_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_act` bigint NOT NULL,
  `id_tutor` bigint DEFAULT NULL,
  `nom_act` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `desc_act` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fecha_ini` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_act`, `id_tutor`, `nom_act`, `desc_act`, `fecha_ini`, `fecha_fin`) VALUES
(1, 7, 'Actividad 1', 'ejemplo desc', '2022-05-27 23:59:00', '2022-05-31 23:59:00'),
(2, 9, 'Nueva actividad de ejemplo', 'Nueva descripciÃ³n de ejemplo', '2022-07-29 22:40:00', '2022-08-10 22:00:00'),
(3, 7, 'recorrido por ubb', 'recorrido por departamentos administrativos mÃ¡s importantes de la UBB  y tambiÃ©n deptos acadÃ©micos, por ejemplo cobranzas, financiamineto, registro, biblioteca, salud, gimnasio, secretaria de carrera, laboratorios, casino, y muchos otros lugares, ', '2022-08-01 12:13:00', '2022-08-22 12:13:00'),
(4, 7, '1', '1', '2022-08-05 12:18:00', '2022-08-06 12:18:00'),
(5, 7, 'a', 'd', '2022-08-04 12:19:00', '2022-08-08 12:19:00'),
(6, 9, 'recorrido por ubb', 'recorrido por departamentos administrativos mÃ¡s importantes de la UBB  y tambiÃ©n deptos acadÃ©micos, por ejemplo cobranzas, financiamineto, registro, biblioteca, salud, gimnasio, secretaria de carrera, laboratorios, casino, y muchos otros lugares, ', '2022-08-01 13:07:00', '2022-08-07 13:08:00'),
(7, 9, 'recorrido por ubb', 'recorrido por departamentos administrativos mÃ¡s importantes de la UBB  y tambiÃ©n deptos acadÃ©micos, por ejemplo cobranzas, financiamineto, registro, biblioteca, salud, gimnasio, secretaria de carrera, laboratorios, casino, y muchos otros lugares, ', '2022-08-01 13:07:00', '2022-08-07 13:08:00'),
(8, 7, 'recorrido por ubb', 'recorrido por departamentos administrativos más importantes de la UBB  y también deptos académicos, por ejemplo cobranzas, financiamineto, registro, biblioteca, salud, gimnasio, secretaria de carrera, laboratorios, casino, y muchos otros lugares, ', '2022-08-01 15:44:00', '2022-08-02 15:44:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendar`
--

CREATE TABLE `agendar` (
  `id_alu` bigint NOT NULL,
  `id_event` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alu` bigint NOT NULL,
  `rut_alu` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nom_alu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo_alu` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `carrera_alu` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gen_alu` int DEFAULT NULL,
  `autodesc_alu` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_estado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alu`, `rut_alu`, `nom_alu`, `correo_alu`, `carrera_alu`, `gen_alu`, `autodesc_alu`, `id_estado`) VALUES
(7, '20.149.775-2', 'Mitchell Hidalgo Mora', 'mitchell.hidalgo1801@alumnos.ubiobio.cl', 'Ingeniería de Ejecución en Computación e Informática', 2019, 'Ut pretium enim vel gravida fringilla. Donec nec fermentum ante. Nulla venenatis tincidunt nunc non facilisis. Etiam aliquam placerat erat, in volutpat mauris condimentum eget. Proin id semper eros. Vestibulum ut massa porttitor, rhoncus odio ac, hendrerit tortor. Phasellus sollicitudin magna in pellentesque dignissim. Maecenas mollis est sed sapien scelerisque auctor. Donec pellentesque nulla volutpat aliquam vulputate. ', 1),
(8, '20.656.895-K', 'Amanda Acevedo', 'amanda.acevedo1901@alumnos.ubiobio.cl', 'Ingeniería de Ejecución en Computación e Informática', 2022, 'Maecenas aliquam quam eu efficitur vehicula. Vestibulum ullamcorper enim a dolor varius efficitur. Nunc pellentesque eros non mollis vulputate. Praesent euismod elit ante, nec egestas odio euismod sit amet. Proin eu consequat eros. Nullam malesuada dolor in luctus pellentesque.', 1),
(9, '21.598.707-8', 'Silvia Aragon', 'silvia.aragon2201@alumnos.ubiobio.cl', 'IECI', 2022, 'descSilvia', 1),
(10, '20.959.118-9', 'Oliver Villanueva', 'oliver.villanueva2201@alumnos.ubiobio.cl', 'IECI', 2022, 'descOliver', 1),
(11, '20.956.992-2', 'Fidel Orellana', 'fidel.orellana2201@alumnos.ubiobio.cl', 'IECI', 2022, 'descFidel', 1),
(12, '20.726.374-5', 'Roser Castañeda', 'roser.castaneda2201@alumnos.ubiobio.cl', 'IECI', 2022, 'descRoser', 1),
(13, '19.902.001-3', 'Sérgio Jimenez', 'sergio.jimenez2201@alumnos.ubiobio.cl', 'IECI', 2022, 'descSérgio', 1),
(14, '42.000.000-9', 'Elvis Ñodríguez', 'elvis.nodriguez1901@alumnos.ubiobio.cl', 'ñieci', 2019, 'vergüeñza', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar`
--

CREATE TABLE `asignar` (
  `id_tutorado` bigint NOT NULL,
  `id_act` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `asignar`
--

INSERT INTO `asignar` (`id_tutorado`, `id_act`) VALUES
(8, 1),
(12, 1),
(14, 1),
(10, 2),
(13, 2),
(8, 3),
(12, 3),
(8, 4),
(11, 4),
(12, 4),
(11, 5),
(12, 5),
(14, 5),
(13, 6),
(10, 7),
(13, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_chat` bigint NOT NULL,
  `nom_chat` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_tipochat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int NOT NULL,
  `nom_estado` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nom_estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoMensaje`
--

CREATE TABLE `estadoMensaje` (
  `id_estadomen` int NOT NULL,
  `nom_estadomen` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_act` bigint NOT NULL,
  `id_tutor` bigint DEFAULT NULL,
  `titulo_event` varchar(60) DEFAULT NULL,
  `desc_event` varchar(100) DEFAULT NULL,
  `fecha_ini` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `color_event` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_men` bigint NOT NULL,
  `id_origen` bigint DEFAULT NULL,
  `id_destino` bigint DEFAULT NULL,
  `cuerpo_men` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `id_alu` bigint NOT NULL,
  `id_chat` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoChat`
--

CREATE TABLE `tipoChat` (
  `id_tipochat` int NOT NULL,
  `nom_tipochat` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoMensaje`
--

CREATE TABLE `tipoMensaje` (
  `id_tipomen` int NOT NULL,
  `nom_tipomen` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` bigint NOT NULL,
  `horario` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `horario`) VALUES
(7, 'mañana sin falta 18:00 - 23:55'),
(9, 'ahi no más, atiendo tempranito 8:00 - 12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorado`
--

CREATE TABLE `tutorado` (
  `id_tutorado` bigint NOT NULL,
  `id_tutor` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tutorado`
--

INSERT INTO `tutorado` (`id_tutorado`, `id_tutor`) VALUES
(8, 7),
(11, 7),
(12, 7),
(14, 7),
(10, 9),
(13, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- Indices de la tabla `agendar`
--
ALTER TABLE `agendar`
  ADD PRIMARY KEY (`id_alu`,`id_event`),
  ADD KEY `id_event` (`id_event`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alu`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `asignar`
--
ALTER TABLE `asignar`
  ADD PRIMARY KEY (`id_tutorado`,`id_act`),
  ADD KEY `id_act` (`id_act`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_tipochat` (`id_tipochat`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estadoMensaje`
--
ALTER TABLE `estadoMensaje`
  ADD PRIMARY KEY (`id_estadomen`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_men`),
  ADD KEY `id_origen` (`id_origen`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`id_alu`,`id_chat`),
  ADD KEY `id_chat` (`id_chat`);

--
-- Indices de la tabla `tipoChat`
--
ALTER TABLE `tipoChat`
  ADD PRIMARY KEY (`id_tipochat`);

--
-- Indices de la tabla `tipoMensaje`
--
ALTER TABLE `tipoMensaje`
  ADD PRIMARY KEY (`id_tipomen`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indices de la tabla `tutorado`
--
ALTER TABLE `tutorado`
  ADD PRIMARY KEY (`id_tutorado`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_act` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alu` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_act` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_men` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tutorado`
--
ALTER TABLE `tutorado`
  MODIFY `id_tutorado` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`);

--
-- Filtros para la tabla `agendar`
--
ALTER TABLE `agendar`
  ADD CONSTRAINT `agendar_ibfk_1` FOREIGN KEY (`id_alu`) REFERENCES `alumno` (`id_alu`),
  ADD CONSTRAINT `agendar_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `evento` (`id_act`);

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `asignar`
--
ALTER TABLE `asignar`
  ADD CONSTRAINT `asignar_ibfk_1` FOREIGN KEY (`id_tutorado`) REFERENCES `tutorado` (`id_tutorado`),
  ADD CONSTRAINT `asignar_ibfk_2` FOREIGN KEY (`id_act`) REFERENCES `actividad` (`id_act`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_tipochat`) REFERENCES `tipoChat` (`id_tipochat`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_origen`) REFERENCES `alumno` (`id_alu`);

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_alu`) REFERENCES `alumno` (`id_alu`),
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_chat`) REFERENCES `chat` (`id_chat`);

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `alumno` (`id_alu`);

--
-- Filtros para la tabla `tutorado`
--
ALTER TABLE `tutorado`
  ADD CONSTRAINT `tutorado_ibfk_1` FOREIGN KEY (`id_tutorado`) REFERENCES `alumno` (`id_alu`),
  ADD CONSTRAINT `tutorado_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
