-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 14:48:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `campus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `comunicado` varchar(255) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`codigo`, `titulo`, `comunicado`, `imagen`, `fecha`, `id_res`) VALUES
(10, 'Acto Gral. San Martin', 'Se informa que, el día 17 de agosto, se realizara un acto por el paso a la inmortalidad del general San José de San Martin en el patio delantero de la escuela.', 'acto-SM1.jpg', '2023-08-14', 0),
(12, 'Entrega de mercaderia', 'El día 15 de Septiembre se realizara la entrega de mercadería', '', '2023-05-09', 0),
(13, 'Actividades recreativas', 'El 29 de septiembre la escuela realizara un grupo de actividades recreativas con los alumnos a las 8Hs hasta las 12Hs', '', '2023-09-02', 0),
(14, 'Anuncio importante', 'La escuela va a construir una cancha de softball nueva en el patio', '', '2023-08-28', 0),
(15, 'Notebooks', 'En la escuela se proveera notebooks para que los alumnos puedan utilizar durante las clases. ', 'ci.jpg', '2023-10-31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicados`
--

CREATE TABLE `comunicados` (
  `titulo` varchar(300) DEFAULT NULL,
  `comunicado` longtext DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `imagenC` varchar(500) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_curso` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `id_res` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comunicados`
--

INSERT INTO `comunicados` (`titulo`, `comunicado`, `codigo`, `imagenC`, `id_alumno`, `id_curso`, `fecha`, `id_res`) VALUES
('Falta', 'El alumno falto el dia 01 del mes 09', 138, '', 1, 0, '2023-09-01', 0),
('registro de notebook', 'pasar por preceptoria y registar las notebook recibidad con el qr pegado en la ventana', 139, '', 0, 1, '2023-08-11', 0),
('Escoltas', 'Los siguientes alumnos deberan asistir como escoltas a la bandera el dia 10/09: Pallares, Suarez y Reynoso', 140, 'acto-SM1.jpg', 0, 1, '2023-09-01', 0),
('Universidad N°1', 'La universidad N°1 de San Antonio de Padua estara haciendo un recorrido el dia 14/09', 141, 'descarga.jfif', 0, 1, '2023-09-04', 0),
('Entrega de Mercaderia', 'El dia 09/09 se realizara una entrega de mercaderia a las familias a las 13Hs', 142, 'descarga.png', 0, 1, '2023-09-02', 0),
('Ficha medica', 'El alumno deberá presentar su ficha medica firmada por un doctor para poder viajar en el viaje de fon de curso', 143, '', 1, 0, '2023-08-30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directivos`
--

CREATE TABLE `directivos` (
  `id_directivo` int(8) NOT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apellido` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directivos`
--

INSERT INTO `directivos` (`id_directivo`, `nombre`, `apellido`) VALUES
(0, 'julian', 'rodriguez'),
(46209192, 'Julian', 'Rodriguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enviados`
--

CREATE TABLE `enviados` (
  `id` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `archivo` varchar(1000) NOT NULL,
  `nota` int(2) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `entregada` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enviados`
--

INSERT INTO `enviados` (`id`, `id_trabajo`, `archivo`, `nota`, `id_alumno`, `entregada`) VALUES
(93, 62, 'droidcam-6.5.2-installer.exe', 1, 1, 1),
(94, 60, 'geogebra-export.png', 4, 1, 1),
(97, 63, 'Nicepage-5.15.1 (1).exe', 5, 1, 1),
(113, 64, 'SteamSetup.exe', 0, 1, 1),
(120, 62, 'Firefox Installer.exe', 0, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `materia` varchar(25) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`, `descripcion`, `id`) VALUES
(0, 'Matematica ', 'La matematica es una ciencia en la que se aplica en todos los aspectos de nuestras vidas', 1),
(1, 'Ingles', 'El ingles es muy importante en el contexto actual ya que hay muchos trabajos que te recompensan por comunicarse con las demas personas en el mundo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `materia` varchar(18) NOT NULL,
  `nota` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`materia`, `nota`, `fecha`, `id_usuario`, `id_nota`, `id_profesor`) VALUES
('Matematica', 9, '0000-00-00', 0, 1, 0),
('Fisica', 8, '0000-00-00', 0, 2, 0),
('Quimica', 10, '0000-00-00', 0, 3, 0),
('Matematica', 10, '0000-00-00', 1, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `nombreP` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `id_profesor` int(255) NOT NULL,
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_curso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`nombreP`, `apellido`, `id_profesor`, `id`, `id_materia`, `id_curso`) VALUES
('Carlos', 'Acuña', 42, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `proyecto` varchar(500) DEFAULT NULL,
  `descripcion` varchar(10000) DEFAULT NULL,
  `archivo` varchar(600) DEFAULT NULL,
  `id_curso` int(2) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `proyecto`, `descripcion`, `archivo`, `id_curso`, `id_profesor`, `fecha`) VALUES
(62, 'Norma de cables directa', 'La siguiente imagen muestra como armar un cable de red con la norma T568B', 'directa.png', 1, 42, '0000-00-00'),
(63, 'Norma de cables indirecta', 'La siguiente imagen muestra como armar un cable de red con la norma T568A', 'indirecta.png', 1, 42, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(300) DEFAULT NULL,
  `contrasena` varchar(500) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `modalidad` varchar(18) DEFAULT NULL,
  `id_curso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `contrasena`, `tipo`, `nombre`, `apellido`, `telefono`, `imagen`, `dni`, `modalidad`, `id_curso`) VALUES
('papitaloca@gmail.com', 'cara', 'd', 'julian', 'rodriguez', 0, 'a', 0, 'informatica', 0),
('man', 'o', 'a', 'pedro', 'ortiz', 1130545737, 'a', 1, 'Electromecanica', 1),
('a', 'b', 'a', 'Florencia', 'Rotini', 11111111, '', 3, 'informatica', 1),
('apa', 'opa', 'p', 'Manolo', 'schmidth', 109, 'a', 33, 'ninguna', 33),
('profe1', 'o', 'p', 'Carlos', 'Acuña', 25642231, '', 42, '', 0),
('aaa', 'a', 'a', 'mercedes', 'sosa', 113329112, NULL, 21782131, NULL, 23),
('aaa', 'a', 'a', 'ana', 'grela', 113329112, NULL, 23813243, NULL, 13),
('aaa', 'a', 'a', 'maria', 'gomez', 113329112, NULL, 26421123, NULL, 14),
('aaa', 'a', 'a', 'malvina', 'bardotti', 113329112, NULL, 28312412, NULL, 23),
('aaa', 'a', 'a', 'pedro', 'gutierrez', 113329112, NULL, 28332102, NULL, 12),
('aaa', 'a', 'a', 'juan', 'gonzales', 113329112, NULL, 37122313, NULL, 12),
('aaa', 'a', 'a', 'santiago', 'echeverria', 113329112, NULL, 42192311, NULL, 14),
('aaa', 'a', 'a', 'pepe', 'can', 113329112, NULL, 44122321, NULL, 14),
('aaa', 'a', 'a', 'esteban', 'gomez', 113329112, NULL, 45211233, NULL, 14),
('julyrodriguez290@gmail.com', 'hola', 'd', 'Julian', 'Rodriguez', 1130545737, NULL, 46209192, 'informatica', 72),
('aaa', 'a', 'a', 'joaquin', 'perez', 113329112, NULL, 46238143, NULL, 12),
('aaa', 'a', 'a', 'belen', 'reynoso', 113329112, NULL, 46273199, NULL, 13),
('aaa', 'a', 'a', 'carla', 'aguirrez', 113329112, NULL, 47211923, NULL, 23),
('aaa', 'a', 'a', 'agustin', 'chavez', 113329112, NULL, 56282112, NULL, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `comRes` (`id_res`),
  ADD KEY `blogRes` (`id_res`);

--
-- Indices de la tabla `comunicados`
--
ALTER TABLE `comunicados`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `comAlumno` (`id_alumno`),
  ADD KEY `comCurso` (`id_curso`),
  ADD KEY `comunicados_ibfk_3` (`id_res`);

--
-- Indices de la tabla `directivos`
--
ALTER TABLE `directivos`
  ADD PRIMARY KEY (`id_directivo`),
  ADD KEY `blogRes` (`id_directivo`);

--
-- Indices de la tabla `enviados`
--
ALTER TABLE `enviados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `dni` (`id_alumno`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `dni` (`dni`),
  ADD KEY `comAlumno` (`dni`),
  ADD KEY `comCurso` (`id_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comunicados`
--
ALTER TABLE `comunicados`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `enviados`
--
ALTER TABLE `enviados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `directivos` (`id_directivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comunicados`
--
ALTER TABLE `comunicados`
  ADD CONSTRAINT `comunicados_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comunicados_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `usuario` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comunicados_ibfk_3` FOREIGN KEY (`id_res`) REFERENCES `directivos` (`id_directivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `enviados`
--
ALTER TABLE `enviados`
  ADD CONSTRAINT `enviados_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
