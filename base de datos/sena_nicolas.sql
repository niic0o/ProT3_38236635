-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2024 a las 20:39:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sena_nicolas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `provincia`, `ciudad`, `domicilio`, `dni`, `perfil_id`, `baja`) VALUES
(1, 'JUAN PEDRO', 'SANCHEZ', 'Juan2020', 'juan@gmail.com', '$2y$10$CsXNkI.x3OBQSdMVedWIu.5viNL7DAyHk9gNdvKlaVvq5Fx/EpSCK', 'Corrientes', 'Ciudad de Corrientes', 'Junin Nº 8100', 25333112, 1, 'NO'),
(2, 'MARIO', 'PERALTA', 'peralta05', 'peralta@gmail.com', '$2y$10$ySDY.W6m01Qr3Sd1D94pFeWRPKcDECAc1sQ9qLxUyElXWJoqYnS4i', 'Corrientes', 'Ciudad de Corrientes', 'Juan Jose Paso Nº 9899', 37789987, 2, 'NO'),
(6, 'MARIO ANDRES', 'SOSA', 'sosa1', 'sosa@gmail.com', '$2y$10$BxhVgN9Syh7SuYn4i1pjZuqtM5vniyLUh24ODtNe7PSkrYh9M7wE2', 'corrientes', 'Esquina', 'belgrano nº 1999 mz 4 casa 8', 20123321, 2, 'NO'),
(7, 'JOSE ANDRES', 'SANCHEZ', 'jose123', 'jose@gmail.com', '$2y$10$b4MRQnisheWdi0nZv/8AzOP3BMAPKSGUUu2a2tCTgFHTxAhUQMZ3u', 'Misiones', 'Posadas', 'san martin 1234', 40102456, 2, 'SI'),
(8, 'CAMILA KARINA', 'TAPIA', 'tapia10', 'tapia@gmail.com', '$2y$10$Y93VSc3K2IZxLeeEyFayqO8Pe95k.pcxvcosb44sfR2/rdX95oZSi', 'Entre Rios', 'Chajari', 'Juan Domingo Peron nº 1950', 12500602, 2, 'NO'),
(9, 'JORGE DANIEL', 'PEREZ', 'perez', 'perez@hotmail.com', '$2y$10$ptFGT.jtPqhKfiPu2Lx33O6pdA21Hp0lj4HcvahPTbqCWhATITpJO', 'Chaco', 'Resistencia', 'Avenida Chaqueña nº 1500', 6123546, 2, 'SI'),
(10, 'FABIANA ANTONIA', 'ROSALES', 'fabiana10', 'fabiana@gmail.com', '$2y$10$dUyQDIa22LhIAY5lD19xZ.mFJCZvmT1lTTV9v6q.DmMMg07RhRFUy', 'Corrientes', 'Ciudad de Corrientes', 'Colombia nº 1025', 40125570, 2, 'NO'),
(11, 'FABIO ROQUE', 'MORALES', 'morales10', 'morales@gmail.com', '$2y$10$L8.XnwHydnOVvwhE8zlYdesOyigJdRPZqPntfBJ4HTUlUGBvimHtC', 'Corrientes', 'Ciudad de Corrientes', 'Av. 3 de Abril nº 750', 20555111, 2, 'NO'),
(12, 'JULIETA', 'RODRIGUEZ', 'juli50', 'julieta@gmail.com', '$2y$10$vm5QYaUZ2MpVeVwEZccWy.Mid7vipX3X/8xK6QwPx1t23tmwVeEGS', 'Corrientes', 'Ciudad de Corrientes', 'San Martin nº 2000', 5787121, 2, 'SI'),
(13, 'RAMIRO JOSE', 'BERMUDEZ', 'ramiro10', 'ramiro@gmail.com', '$2y$10$JxguKFh39F3ukF9TDb3K8uS/wufwLsxT1qh6CfVo9/y1tE8426V6m', 'Corrientes', 'Ciudad de Corrientes', 'Belgrano nº 1810', 32100200, 2, 'NO'),
(14, 'ANDRES MARIO', 'SOTELO', 'sotelito', 'sotelo@gmail.com', '$2y$10$tDqoKin8YdDqA7brPa0TVuFxf7kcPW7TRpWY7InvA5jeOcBTXbfpO', 'Chaco', 'Resistencia', 'Avenida Chaqueña nº 8000', 950475, 2, 'SI');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
