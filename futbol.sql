-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2023 a las 07:05:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `equipo_id` int(11) NOT NULL,
  `equipo` text NOT NULL,
  `division` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`equipo_id`, `equipo`, `division`, `estado`) VALUES
(1, 'Argentinos Jrs', 'Primera Division', 1),
(2, 'Arsenal', 'Primera Division', 1),
(3, 'Atletico Tucuman', 'Primera Division', 1),
(4, 'Banfield', 'Primera Division', 1),
(5, 'Barracas Central', 'Primera Division', 1),
(6, 'Belgrano', 'Primera Division', 1),
(7, 'Boca Juniors', 'Primera Division', 1),
(8, 'Central Cordoba (SdE)', 'Primera Division', 1),
(9, 'Colon', 'Primera Division', 1),
(10, 'Defensa y Justicia', 'Primera Division', 1),
(11, 'Estudiantes (LP)', 'Primera Division', 1),
(12, 'Gimnasia (LP)', 'Primera Division', 1),
(13, 'Godoy Cruz', 'Primera Division', 1),
(14, 'Huracan', 'Primera Division', 1),
(15, 'Independiente', 'Primera Division', 1),
(16, 'Instituto', 'Primera Division', 1),
(17, 'Lanus', 'Primera Division', 1),
(18, 'Newells', 'Primera Division', 1),
(19, 'Platense', 'Primera Division', 1),
(20, 'Racing', 'Primera Division', 1),
(21, 'River Plate', 'Primera Division', 1),
(22, 'Rosario Central', 'Primera Division', 1),
(23, 'San Lorenzo', 'Primera Division', 1),
(24, 'Sarmiento (J)', 'Primera Division', 1),
(25, 'Talleres (C)', 'Primera Division', 1),
(26, 'Tigre', 'Primera Division', 1),
(27, 'Union', 'Primera Division', 1),
(28, 'Velez', 'Primera Division', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `resultado_id` int(11) NOT NULL,
  `dia` text NOT NULL,
  `fecha` tinyint(4) NOT NULL,
  `equipo_local` tinyint(4) NOT NULL,
  `goles_local` tinyint(4) NOT NULL,
  `equipo_visitante` tinyint(4) NOT NULL,
  `goles_visitante` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaprimera`
--

CREATE TABLE `tablaprimera` (
  `equipo_id` int(11) NOT NULL,
  `equipo` text NOT NULL,
  `puntos` tinyint(4) NOT NULL DEFAULT 0,
  `p_jugados` tinyint(4) NOT NULL DEFAULT 0,
  `p_ganados` tinyint(4) NOT NULL DEFAULT 0,
  `p_empatados` tinyint(4) NOT NULL DEFAULT 0,
  `p_perdidos` tinyint(4) NOT NULL DEFAULT 0,
  `goles_favor` tinyint(4) NOT NULL DEFAULT 0,
  `goles_contra` tinyint(4) NOT NULL DEFAULT 0,
  `diferencia_gol` tinyint(4) NOT NULL DEFAULT 0,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tablaprimera`
--

INSERT INTO `tablaprimera` (`equipo_id`, `equipo`, `puntos`, `p_jugados`, `p_ganados`, `p_empatados`, `p_perdidos`, `goles_favor`, `goles_contra`, `diferencia_gol`, `estado`) VALUES
(1, 'Argentinos Jrs', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 'Arsenal', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(3, 'Atletico Tucuman', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, 'Banfield', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, 'Barracas Central', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(6, 'Belgrano', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(7, 'Boca Juniors', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, 'Central Cordoba (SdE)', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(9, 'Colon', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, 'Defensa y Justicia', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(11, 'Estudiantes (LP)', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(12, 'Gimnasia (LP)', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(13, 'Godoy Cruz', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(14, 'Huracan', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(15, 'Independiente', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(16, 'Instituto', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(17, 'Lanus', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(18, 'Newells', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(19, 'Platense', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(20, 'Racing', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(21, 'River Plate', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(22, 'Rosario Central', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(23, 'San Lorenzo', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(24, 'Sarmiento (J)', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(25, 'Talleres (C)', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(26, 'Tigre', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(27, 'Union', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(28, 'Velez', 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `contraseña` text NOT NULL,
  `equipo_fav` tinyint(4) DEFAULT NULL,
  `rol` tinyint(4) NOT NULL DEFAULT 2,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `contraseña`, `equipo_fav`, `rol`, `estado`) VALUES
(1, 'admin', 'admin', NULL, 1, 1),
(2, 'usuario', 'usuario', NULL, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`equipo_id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`resultado_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tablaprimera`
--
ALTER TABLE `tablaprimera`
  ADD PRIMARY KEY (`equipo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `resultado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablaprimera`
--
ALTER TABLE `tablaprimera`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
