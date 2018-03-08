-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2018 a las 12:25:41
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `codalum` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `edad` char(2) NOT NULL,
  `dni` char(8) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `grado` varchar(10) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `turno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codalum`, `nombre`, `apellido`, `edad`, `dni`, `distrito`, `grado`, `seccion`, `turno`) VALUES
(1, 'alexndra', 'suarez ', '22', '47863485', 'fgvhg', '2', 'A', 'M'),
(2, 'sggh', 'suarez', '12', '70941137', '5', '', '0', '0'),
(3, 'Alexandra', 'Suarez', '12', '70941373', '5', '', '0', '0'),
(5, 'Beca', 'becona', '12', '70941385', '0', '4', '0', '0'),
(6, 'Beca', 'becona', '12', '70941385', 'San juan de lurigancho', '4', '0', '0'),
(7, 'kirara', 'gatuna', '4', '12345678', 'Miraflores', '5', '0', '0'),
(8, 'growly', 'as', '23', '32453412', 'San juan de lurigancho', '2', 'A', 'M'),
(9, 'andy', 'mendoza', '15', '32456789', 'santa anita', '6', 'B', 'T'),
(10, 'andy', 'mendoza', '15', '32456789', 'santa anita', '6', 'B', 'T'),
(11, 'alexandra da', 'suarez', '24', '70941373', 'sjl', '5', 'C', 'T'),
(12, 'alexandra da', 'suarez', '24', '70941373', 'sjl', '5', 'C', 'T'),
(13, 'alexandra da', 'suarez', '24', '70941373', 'sjl', '5', 'C', 'T'),
(14, 'alexandra da', 'suarez', '24', '70941373', 'sjl', '5', 'C', 'T'),
(15, 'alexandra da', 'suarez', '24', '70941373', 'sjl', '5', 'C', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `codanun` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `url_img` varchar(300) NOT NULL,
  `fecha` date DEFAULT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`codanun`, `titulo`, `descripcion`, `url_img`, `fecha`, `autor`) VALUES
(1, 'El desyuno', 'El desayuno es importante en la vida escolar de nuestros menores hijos, ya que ayuda a que se mantengan despiertos durante su dia escolar', '', '2018-02-07', 'Alexandra Suarez'),
(2, 'Divirtiéndose con la comida', 'Para que los niños coman sano, se puede poner divertidos platillos decorandolos con imagenes', '', '2018-01-16', 'Anjali Suarez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderado`
--
-- en uso(#1932 - Table 'colegio.apoderado' doesn't exist in engine)
-- Error leyendo datos: (#1932 - Table 'colegio.apoderado' doesn't exist in engine)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `coddis` varchar(10) NOT NULL,
  `distrito` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`coddis`, `distrito`) VALUES
('01', 'Chachapoyas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `coddoc` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` char(2) NOT NULL,
  `dni` char(8) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(130) NOT NULL,
  `last_session` datetime NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `activacion` int(11) NOT NULL,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`coddoc`, `usuario`, `password`, `nombre`, `apellido`, `edad`, `dni`, `distrito`, `telefono`, `email`, `last_session`, `dia`, `hora`, `activacion`, `token`, `token_password`) VALUES
(1, 'peppa', '', 'Anjali', 'Suarez', '30', '1243657', 'Sanjuan de lruiagcnho', '1234567', 'peppa@hotmail.com', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', ''),
(2, 'beca', '', 'Becona', 'Suarez', '21', '12345342', 'Santa anita', '123432156', 'becona@hotmail.com', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroforo`
--

CREATE TABLE `registroforo` (
  `cod` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `descrip` text NOT NULL,
  `urlImg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registroforo`
--

INSERT INTO `registroforo` (`cod`, `titulo`, `autor`, `tema`, `descrip`, `urlImg`) VALUES
(1, 'comunicado', '2', 'Comunicados', '', ''),
(2, 'comunicado', '0', 'Comunicados', '', ''),
(3, 'come sano', '0', 'Lonchera', '', ''),
(4, 'come sano', '1', 'aseo', '', ''),
(5, 'wawawa', '0', 'Lonchera', '', ''),
(13, 'nOS ALIMENTAMOS BIEN', '2', 'Comunicados', '', ''),
(14, 'JHYJJJJHJHJJ', '2', 'Lonchera', '', ''),
(15, 'JHYJJJJHJHJJ', '2', 'Lonchera', '', ''),
(16, 'JHYJJJJHJHJJ', '2', 'Lonchera', '', ''),
(17, 'JHYJJJJHJHJJ', '2', 'Lonchera', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `Tipo`) VALUES
(1, 'Mañana'),
(2, 'Tarde');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`codalum`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`codanun`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`coddis`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`coddoc`);

--
-- Indices de la tabla `registroforo`
--
ALTER TABLE `registroforo`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `codalum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `codanun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `coddoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registroforo`
--
ALTER TABLE `registroforo`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
