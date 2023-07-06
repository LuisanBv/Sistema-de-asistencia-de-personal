-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2023 a las 09:48:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eystesh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descansos`
--

CREATE TABLE `descansos` (
  `iddescanso` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `salidadescanso` time NOT NULL,
  `llegadadescanso` time NOT NULL,
  `motivos` varchar(1000) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `descansos`
--

INSERT INTO `descansos` (`iddescanso`, `fecha`, `salidadescanso`, `llegadadescanso`, `motivos`, `id_usuario`) VALUES
(3, '0000-00-00', '08:00:00', '10:00:00', 'Salio a la papeleria', 4),
(6, '2022-11-25', '00:00:00', '00:00:00', '', 2),
(7, '2022-11-25', '00:00:00', '00:00:00', '', 2),
(10, '2022-11-25', '14:45:00', '14:50:00', 'Salida la papeleria ', 2),
(11, '2022-11-27', '12:54:00', '20:59:00', 'Salida la papeleria ', 2),
(12, '2022-12-14', '13:26:00', '15:26:00', 'Sali a la papeleria ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradaysalida`
--

CREATE TABLE `entradaysalida` (
  `ideys` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horain` time NOT NULL,
  `horaout` time NOT NULL,
  `turno` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `entradaysalida`
--

INSERT INTO `entradaysalida` (`ideys`, `fecha`, `horain`, `horaout`, `turno`, `id_usuario`, `id_visita`) VALUES
(1, '2022-10-01', '00:00:00', '00:00:00', 'Mixto', 3, 0),
(2, '2022-10-12', '00:00:00', '00:00:00', 'Matutino', 3, 0),
(3, '2022-10-15', '00:00:00', '00:00:00', 'Verpertino', 3, 0),
(4, '2022-10-14', '00:00:00', '00:00:00', 'Mixto', 3, 0),
(5, '2022-10-18', '00:00:00', '00:00:00', 'Dual', 5, 0),
(6, '2022-10-20', '00:00:00', '00:00:00', 'Mixto', 5, 0),
(7, '2022-10-20', '00:00:00', '00:00:00', 'Mixto', 6, 0),
(25, '2022-10-20', '00:00:00', '00:00:00', 'Mixto', 0, 2),
(40, '2022-11-20', '15:08:11', '15:10:16', '', 2, 0),
(41, '2022-11-23', '14:25:06', '14:25:23', '', 2, 0),
(43, '2022-11-27', '21:58:06', '22:28:55', '', 2, 0),
(47, '2022-11-30', '16:57:24', '16:57:28', '', 2, 0),
(50, '2022-12-06', '15:29:53', '00:00:00', '', 2, 0),
(51, '2022-12-11', '16:09:52', '16:09:56', '', 2, 0),
(52, '2022-12-11', '16:18:15', '16:18:18', '', 11, 0),
(53, '2022-12-13', '00:00:31', '00:02:00', '', 2, 0),
(54, '2022-12-14', '13:25:26', '13:27:02', '', 2, 0),
(55, '2022-12-15', '14:28:55', '00:00:00', '', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `area` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `inicio` time NOT NULL,
  `fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `area`, `descripcion`, `inicio`, `fin`) VALUES
(1, 'Biologiaa', 'Maestroo', '08:00:00', '17:00:00'),
(2, 'ISC', 'Maestro', '07:00:00', '13:00:00'),
(3, 'Mecatronica', 'Maestro', '07:00:00', '13:00:00'),
(4, 'Administracion', 'Maestro', '07:00:00', '13:00:00'),
(8, 'Administracionn', 'Profesoress', '07:05:00', '19:09:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`) VALUES
(1, 'Profesor'),
(2, 'Empleado'),
(3, 'Alumno'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `ncontrol` int(8) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `ap` varchar(30) NOT NULL,
  `am` varchar(30) NOT NULL,
  `fotoperfil` longblob NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `ncontrol`, `correo`, `password`, `nombres`, `ap`, `am`, `fotoperfil`, `id_rol`, `id_horario`) VALUES
(1, 1, 'admin@gmail.com', '12345678911', 'Administrador', 'Poderoso', 'Controlador', '', 4, 0),
(2, 19090579, 'luis@gmail.com', '12345678911', 'Luis Andre', 'Salazar', 'Pineda', 0x322e6a706567, 2, 2),
(3, 19090578, 'diego@gmail.com', '12345678911', 'Diego Einat', 'Miranda', 'Franco', '', 3, 1),
(4, 19090574, 'julio@gmail.com', '2147483647', 'Julio Cesar', 'Garcia', 'Molano', '', 3, 2),
(5, 19090577, 'juan@gmail.com', '2147483647', 'Juan Carlos', 'Monsevaiz', 'Ballina', '', 1, 3),
(6, 19090576, 'javier@gmail.com', '2147483647', 'Jose Javier', 'Tellez', 'Coello', '', 1, 4),
(8, 19090571, 'daniel@gmail.com', '12345678911', 'Daniel', 'Salazas', 'Pineda', 0x576861747341707020496d61676520323032322d31312d303120617420332e35372e323320504d2e6a706567, 3, 2),
(9, 19090579, 'jesus@gmail.com', '12345678911', 'Jesus', 'Salazar', 'Pineda', 0x322e6a706567, 2, 2),
(10, 19090579, 'oswaldo@gmail.com', '12345678911', 'Oswaldo', 'Salazar', 'Pineda', 0x312e6a706567, 1, 2),
(11, 19090579, 'luisssss@gmail.com', '12345678911', 'Luisss', 'Salazar', 'Pineda', '', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idvisita` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `ap` varchar(30) NOT NULL,
  `am` varchar(30) NOT NULL,
  `edad` int(2) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `ocupacion` varchar(30) NOT NULL,
  `motivo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idvisita`, `nombres`, `ap`, `am`, `edad`, `sexo`, `ocupacion`, `motivo`) VALUES
(1, 'Sergio', 'Delgado', 'Conchas', 21, 'Masculino', 'Padre de familia', 'Junta de alumno'),
(2, 'Jose ', 'Sanchez', 'Ayala', 20, 'Masculino', 'Hermano', 'Entregar Lunch');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descansos`
--
ALTER TABLE `descansos`
  ADD PRIMARY KEY (`iddescanso`);

--
-- Indices de la tabla `entradaysalida`
--
ALTER TABLE `entradaysalida`
  ADD PRIMARY KEY (`ideys`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idvisita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descansos`
--
ALTER TABLE `descansos`
  MODIFY `iddescanso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `entradaysalida`
--
ALTER TABLE `entradaysalida`
  MODIFY `ideys` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idvisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
