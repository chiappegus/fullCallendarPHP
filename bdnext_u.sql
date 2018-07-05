-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2018 a las 17:59:05
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdnext_u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `idUser`, `fechaInicio`, `horaInicio`, `fechaFin`, `horaFin`, `titulo`) VALUES
(8, 1, '2018-06-04', '00:00:00', '2018-06-04', '23:55:00', 'dsa'),
(13, 1, '2018-06-25', '00:00:00', '2018-06-25', '23:55:00', 'ssdfdsf'),
(16, 5, '2018-06-15', '00:00:00', '2018-06-15', '23:55:00', 'dsasd'),
(18, 15, '2018-06-05', '12:50:00', '2018-06-05', '14:50:00', 'dsadas'),
(19, 3, '2018-06-05', '00:55:00', '2018-06-12', '12:55:00', 'mirtha'),
(20, 3, '2018-06-05', '00:55:00', '2018-06-06', '12:15:00', 'gustavo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `pasw` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `pasw`) VALUES
(1, '', '', ''),
(3, 'Gustavo', '1@p.com', '$2y$10$ZZZW8NhkLwMh.bRTJCL3uuH3DIqySOpGQ41LpuJvRMu6QqQQhVyKC'),
(4, 'Gustavo', '12@p.com', '$2y$10$fspSOmVvp5Epfn/xg5Eb3e/1HcWrpppY3/sN55KXy.762ErsP5taW'),
(5, 'Gustavo', 'gchiappe@gus.com', '$2y$10$NiJvVtDpuJm9YJsP8RhRH./mi7nNaK.lI/d7duB1u62o7zMBqToPi'),
(6, 'Gustavo', 'gchiappe@gus.com', '$2y$10$QZTu3PNOMgbqhge4U8Pv6uHcde.mDv/bzboQGYQe83xgfDPvw3Dpa'),
(7, 'gustavo', 'gchiappe@gus.com', '$2y$10$qdtsj3kQVtHmEvCB0uXH0eoT5GY8WC.VpDGKrUqqPIeWEeuDkU/UC'),
(8, 'gustavo', 'gchiappe@gus.com', '$2y$10$TIHOm8AG0A9JAfcWpwYCG.lG7gFOYoNONtoF/OjPuZ3PR97IITOXy'),
(9, 'Gustavo', 'gchiappe@gus.com', '$2y$10$RrQCs7NCuW5XlII/NWAbmOG4J.glapqHUUH/Rma619JTqZQSMOMOu'),
(10, 'Gustavo', 'gchiappe@gus.com', '$2y$10$b80Zy75XtauP4Tev.HPkNegtQbSPl3wAYMBUAHA5512mdCv1oynIa'),
(11, 'gustavo', 'gchiappe@gus.com', '$2y$10$IDLnwaiL3uIkswZRiYWfW.TXGGb15f2QDBzYgp1LZEige6uI3hehy'),
(12, 'gustavo', 'gchiappe@gus.com', '$2y$10$qogPq9m4j05Ju0chm0N2Ue68XQfydRZxFDTXn796BV/5XmqHnkOUG'),
(13, 'gustavo', 'gchiappe@gus.com', '$2y$10$9XwovfXY7V/Zjp6xJMGS5eALvNyVQd0bFOvq43L6vCmro8BA.TIOC'),
(14, 'gustavo', 'gchiappe@gus.com', '$2y$10$3P1dtfiMl/HeY5Sv4./a0.fxYJ4HKP4WILdJsqf20fQ1SJlxA4X2u'),
(15, 'pepe', 'pepe@pepe.com', '$2y$10$lVN97W8g2hAeSn6ikJmUsO2ME78DepMmRHnI9kwnmA4SY2V7T9Xkq'),
(16, 'pepe', 'pepe@pepe.com', '$2y$10$hbBPkMUgQZL65zmo5VfJjeSgjnTxccPLwFY85dceQaPu6HA29NNsm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
