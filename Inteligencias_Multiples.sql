-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 29-11-2023 a las 01:30:44
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Inteligencias_Multiples`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `idCategorias` int(11) NOT NULL,
  `Encuestas_idEncuestas` int(11) NOT NULL,
  `NombreCategoria` varchar(50) NOT NULL,
  `DescripcionCategoria` varchar(250) NOT NULL,
  `NivelEducativo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Encuestados`
--

CREATE TABLE `Encuestados` (
  `idEncuestados` int(11) NOT NULL,
  `CedulaEncuestado` varchar(12) NOT NULL,
  `NombresEncuestado` varchar(100) NOT NULL,
  `ApellidosEncuestado` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `LugarNacimiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Encuestas`
--

CREATE TABLE `Encuestas` (
  `idEncuestas` int(11) NOT NULL,
  `TituloEncuesta` varchar(100) NOT NULL,
  `DescripcionEncuesta` varchar(250) NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `Activa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Encuestas`
--

INSERT INTO `Encuestas` (`idEncuestas`, `TituloEncuesta`, `DescripcionEncuesta`, `FechaInicio`, `FechaFin`, `Activa`) VALUES
(1, 'Prueba', 'Prueba', '2023-11-09 00:00:00', '2023-11-16 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Encuestas_Respuestas`
--

CREATE TABLE `Encuestas_Respuestas` (
  `idEncuestas_Respuestas` int(11) NOT NULL,
  `Encuestados_idEncuestados` int(11) NOT NULL,
  `Encuestas_idEncuestas` int(11) NOT NULL,
  `Preguntas_idPreguntas` int(11) NOT NULL,
  `Opciones_Respuestas_idOpciones_Respuestas` int(11) NOT NULL,
  `FechaRespuesta` datetime NOT NULL,
  `RespuestaTexto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagenes`
--

CREATE TABLE `Imagenes` (
  `idImagenes` int(11) NOT NULL,
  `Opciones_Respuestas_idOpciones_Respuestas` int(11) DEFAULT NULL,
  `Preguntas_idPreguntas` int(11) DEFAULT NULL,
  `TituloImagen` varchar(50) NOT NULL,
  `URLImagen` varchar(255) NOT NULL,
  `DescripcionImagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Opciones_Respuestas`
--

CREATE TABLE `Opciones_Respuestas` (
  `idOpciones_Respuestas` int(11) NOT NULL,
  `Preguntas_idPreguntas` int(11) NOT NULL,
  `TextoOpcion` text,
  `Valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE `Preguntas` (
  `idPreguntas` int(11) NOT NULL,
  `Categorias_idCategorias` int(11) NOT NULL,
  `Tipo_Preguntas_idTipo_Preguntas` int(11) NOT NULL,
  `EnunciadoPregunta` text NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `PreguntaPadre` int(11) DEFAULT NULL,
  `Ponderacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Preguntas`
--

CREATE TABLE `Tipo_Preguntas` (
  `idTipo_Preguntas` int(11) NOT NULL,
  `NombreTipo` varchar(50) NOT NULL,
  `DescripcionTipo` varchar(100) NOT NULL,
  `RequiereImagen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`idCategorias`),
  ADD KEY `fk_Encuestas_idEncuestas` (`Encuestas_idEncuestas`);

--
-- Indices de la tabla `Encuestados`
--
ALTER TABLE `Encuestados`
  ADD PRIMARY KEY (`idEncuestados`);

--
-- Indices de la tabla `Encuestas`
--
ALTER TABLE `Encuestas`
  ADD PRIMARY KEY (`idEncuestas`);

--
-- Indices de la tabla `Encuestas_Respuestas`
--
ALTER TABLE `Encuestas_Respuestas`
  ADD PRIMARY KEY (`idEncuestas_Respuestas`),
  ADD KEY `fk_Encuestas_Respuestas_Encuestados1_idx` (`Encuestados_idEncuestados`),
  ADD KEY `fk_Encuestas_Respuestas_Preguntas1_idx` (`Preguntas_idPreguntas`),
  ADD KEY `fk_Encuestas_Respuestas_Opciones_Respuestas1_idx` (`Opciones_Respuestas_idOpciones_Respuestas`),
  ADD KEY `fk_Encuestas_Respuesta_res` (`Encuestas_idEncuestas`);

--
-- Indices de la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  ADD PRIMARY KEY (`idImagenes`),
  ADD KEY `fk_Imagenes_Opciones_Respuestas1_idx` (`Opciones_Respuestas_idOpciones_Respuestas`),
  ADD KEY `fk_Imagenes_Preguntas1_idx` (`Preguntas_idPreguntas`);

--
-- Indices de la tabla `Opciones_Respuestas`
--
ALTER TABLE `Opciones_Respuestas`
  ADD PRIMARY KEY (`idOpciones_Respuestas`),
  ADD KEY `fk_Opciones_Respuestas_Preguntas1_idx` (`Preguntas_idPreguntas`);

--
-- Indices de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`idPreguntas`),
  ADD KEY `fk_Preguntas_Categorias1_idx` (`Categorias_idCategorias`),
  ADD KEY `fk_Preguntas_Tipo_Preguntas1_idx` (`Tipo_Preguntas_idTipo_Preguntas`),
  ADD KEY `PreguntaPadre` (`PreguntaPadre`);

--
-- Indices de la tabla `Tipo_Preguntas`
--
ALTER TABLE `Tipo_Preguntas`
  ADD PRIMARY KEY (`idTipo_Preguntas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Encuestas`
--
ALTER TABLE `Encuestas`
  MODIFY `idEncuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Encuestas_Respuestas`
--
ALTER TABLE `Encuestas_Respuestas`
  MODIFY `idEncuestas_Respuestas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD CONSTRAINT `fk_Encuestas_idEncuestas` FOREIGN KEY (`Encuestas_idEncuestas`) REFERENCES `Encuestas` (`idEncuestas`);

--
-- Filtros para la tabla `Encuestas_Respuestas`
--
ALTER TABLE `Encuestas_Respuestas`
  ADD CONSTRAINT `fk_Encuestas_Respuesta_res` FOREIGN KEY (`Encuestas_idEncuestas`) REFERENCES `Encuestas` (`idEncuestas`),
  ADD CONSTRAINT `fk_Encuestas_Respuestas_Encuestados1` FOREIGN KEY (`Encuestados_idEncuestados`) REFERENCES `Encuestados` (`idEncuestados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Encuestas_Respuestas_Opciones_Respuestas1` FOREIGN KEY (`Opciones_Respuestas_idOpciones_Respuestas`) REFERENCES `Opciones_Respuestas` (`idOpciones_Respuestas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Encuestas_Respuestas_Preguntas1` FOREIGN KEY (`Preguntas_idPreguntas`) REFERENCES `Preguntas` (`idPreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  ADD CONSTRAINT `fk_Imagenes_Opciones_Respuestas1` FOREIGN KEY (`Opciones_Respuestas_idOpciones_Respuestas`) REFERENCES `Opciones_Respuestas` (`idOpciones_Respuestas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Imagenes_Preguntas1` FOREIGN KEY (`Preguntas_idPreguntas`) REFERENCES `Preguntas` (`idPreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Opciones_Respuestas`
--
ALTER TABLE `Opciones_Respuestas`
  ADD CONSTRAINT `fk_Opciones_Respuestas_Preguntas1` FOREIGN KEY (`Preguntas_idPreguntas`) REFERENCES `Preguntas` (`idPreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD CONSTRAINT `Preguntas_ibfk_1` FOREIGN KEY (`PreguntaPadre`) REFERENCES `Preguntas` (`idPreguntas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Preguntas_Categorias1` FOREIGN KEY (`Categorias_idCategorias`) REFERENCES `Categorias` (`idCategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Preguntas_Tipo_Preguntas1` FOREIGN KEY (`Tipo_Preguntas_idTipo_Preguntas`) REFERENCES `Tipo_Preguntas` (`idTipo_Preguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
