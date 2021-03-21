-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2020 a las 10:54:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `amp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` int(11) NOT NULL,
  `clase` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `clase`) VALUES
(3, '1C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `incidencia` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `estado`, `incidencia`) VALUES
(3, 1, 'No funciona PC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

CREATE TABLE `partes` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `partes` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `resolucion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `partes`
--

INSERT INTO `partes` (`id`, `fecha`, `partes`, `resolucion`, `id_clase`, `id_profesor`, `id_incidencia`, `estado`) VALUES
(3, '2020-10-02 09:42:03', 'Observacion 1', 'resolucion 2', 3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `profesor` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `profesor`, `email`) VALUES
(1, 'Ana Rastrollo Sanz', 'ana.rastrollo@jesuitinaselche.es'),
(2, 'Ariadna Serrano Bailén', 'ariadna.serrano@jesuitinaselche.es'),
(3, 'Belén Marco García', 'belen.marco@jesuitinaselche.es'),
(4, 'Blanca Pastor Colomer', 'blanca.pastor@jesuitinaselche.es'),
(5, 'Carlos Castillo González', 'carlos.castillo@jesuitinaselche.es'),
(6, 'Clara Blanes Mira', 'clara.blanes@jesuitinaselche.es'),
(7, 'Cristina García Giménez', 'cristina.garciagimenez@jesuitinaselche.e'),
(8, 'Cristina Miquel Miralles', 'cristina.miquel@jesuitinaselche.es'),
(9, 'Elena Miguel Sánchez', 'elena.miguel@jesuitinaselche.es'),
(10, 'Elena Vives Gomis', 'elena.vives@jesuitinaselche.es'),
(11, 'Elisabeth Fernández Combaz', 'eli.fernandez@jesuitinaselche.es'),
(12, 'Enrique Planelles Marcos', 'enrique.planelles@jesuitinaselche.es'),
(13, 'Ernesto Prieto Pagan', 'ernesto.prieto@jesuitinaselche.es'),
(14, 'Gloria Bernabéu Tello', 'gloria.bernabeu@jesuitinaselche.es'),
(15, 'Helena J. Sepulcre Aguilera', 'helena.sepulcre@jesuitinaselche.es'),
(16, 'Inmaculada Viciana Fernández', 'inma.viciana@jesuitinaselche.es'),
(17, 'Isabel Candela Candela', 'isabel.candela@jesuitinaselche.es'),
(18, 'Jesús Molina Rebordosa', 'jesus.molina@jesuitinaselche.es'),
(19, 'Joaquín Ferrández Mas', 'joaquin.ferrandez@jesuitinaselche.es'),
(20, 'Jose Antón Román', 'jose.anton@jesuitinaselche.es'),
(21, 'José Félix Del Hoyo Simón', 'felix.delhoyo@jesuitinaselche.es'),
(22, 'Juan José Briones  Maciá', 'juanjo.briones@jesuitinaselche.es'),
(23, 'Lourdes Alfonso Pascual', 'lourdes.alfonso@jesuitinaselche.es'),
(24, 'Manuel Andreu Ramón', 'manuel.andreu@jesuitinaselche.es'),
(25, 'Margarita Candela Verdú', 'marga.candela@jesuitinaselche.es'),
(26, 'Marianna Guilabert Alberola', 'marianna.guilabert@jesuitinaselche.es'),
(27, 'María Capella Mira', 'maria.capella@jesuitinaselche.es'),
(28, 'María Díaz-Flores Vives', 'maria.diazflores@jesuitinaselche.es'),
(29, 'Miriam Almarcha Marcos', 'miriam.almarcha@jesuitinaselche.es'),
(30, 'Mª Asunción Maciá Villalobos', 'asun.macia@jesuitinaselche.es'),
(31, 'Mª Del Mar Medina Sansano', 'mar.medina@jesuitinaselche.es'),
(32, 'Mª Dolores Navarro Alfonso', 'mado.navarro@jesuitinaselche.es'),
(33, 'Mª Jesús Gras Cabrerizo', 'mariajesus.gras@jesuitinaselche.es'),
(34, 'Mª Pilar Pina Serrano', 'pilar.pina@jesuitinaselche.es'),
(35, 'Nemesio Arronis Llopis', 'nemesio.arronis@jesuitinaselche.es'),
(36, 'Olga Mora Rubio', 'olga.mora@jesuitinaselche.es'),
(37, 'Rosa Mª Pérez Bernad', 'rosa.perez@jesuitinaselche.es'),
(38, 'Rosario Pulido Jáuregui', 'charo.pulido@jesuitinaselche.es'),
(39, 'Teresa Sánchez Bernabeu', 'teresa.sanchez@jesuitinaselche.es'),
(40, 'Vanessa García Díez', 'vanessa.garcia@jesuitinaselche.es'),
(41, 'Vicente Alós Ferrándiz', 'vicente.alos@jesuitinaselche.es'),
(42, 'Victoria Cabrera Fernández', 'victoria.cabrera@jesuitinaselche.es'),
(43, 'Alma María Pascual Vives', 'alma.pascual@jesuitinaselche.es'),
(44, 'Amalia Pérez Soler', 'amalia.perez@jesuitinaselche.es'),
(45, 'Ana Cerdá Serrano', 'ana.cerda@jesuitinaselche.es'),
(46, 'Ana María Jodar Oliver', 'ana.jodar@jesuitinaselche.es'),
(47, 'Andrea Rodríguez Aracil', 'andrea.rodriguez@jesuitinaselche.es'),
(48, 'Araceli Díez Soler', 'araceli.diez@jesuitinaselche.es'),
(49, 'Beatriz Sirvent Costa', 'beatriz.sirvent@jesuitinaselche.es'),
(50, 'Begoña Candela Verdú', 'begona.candela@jesuitinaselche.es'),
(51, 'Belén Navarro Fernández', 'belen.navarro@jesuitinaselche.es'),
(52, 'Carmen Llopis De San Nicolás', 'carmen.llopis@jesuitinaselche.es'),
(53, 'Cinta Catalá Miñana', 'cinta.catala@jesuitinaselche.es'),
(54, 'Cristina García Picó', 'cristina.garciapico@jesuitinaselche.es'),
(55, 'Cristina Sáez Martínez', 'cristina.saez@jesuitinaselche.es'),
(56, 'Dolores Darás Combres', 'lola.daras@jesuitinaselche.es'),
(57, 'Eduardo García-Campomanes Suarez', 'eduardo.garcia-campomanes@jesuitinaselch'),
(58, 'Elena Antón Román', 'elena.anton@jesuitinaselche.es'),
(59, 'Esperanza Paya Maciá', 'esperanza.paya@jesuitinaselche.es'),
(60, 'Francisco Javier Sánchez Mas', 'javi.sanchez@jesuitinaselche.es'),
(61, 'Inmaculada Niñoles Sánchez', 'inma.ninoles@jesuitinaselche.es'),
(62, 'Javier Briones Maciá', 'javier.briones@jesuitinaselche.es'),
(63, 'Joaquín Ferrández Pérez', 'joaquin.ferrandezp@jesuitinaselche.es'),
(64, 'Juan Maciá Galán', 'juan.macia@jesuitinaselche.es'),
(65, 'Luis Antón Díez', 'luis.anton@jesuitinaselche.es'),
(66, 'Magdalena Riquelme García', 'magda.riquelme@jesuitinaselche.es'),
(67, 'Margarita Durá Pomares', 'marga.dura@jesuitinaselche.es'),
(68, 'Margarita Segarra Verdú', 'margarita.segarra@jesuitinaselche.es'),
(69, 'Marina Carrasco Seva', 'marina.carrasco@jesuitinaselche.es'),
(70, 'María De Las Mercedes Bermejo Gómez', 'mercedes.bermejo@jesuitinaselche.es'),
(71, 'María José Rodrigo García', 'mariajose.rodrigo@jesuitinaselche.es'),
(72, 'María Pascual Segarra', 'maria.pascual@jesuitinaselche.es'),
(73, 'María Teresa Segura Valero', 'maite.segura@jesuitinaselche.es'),
(74, 'María Virgen De Jesús', 'marie.dejesus@jesuitinaselche.es'),
(75, 'Matilde Zamora Hidalgo', 'mati.zamora@jesuitinaselche.es'),
(76, 'Mercedes Martínez Polo', 'mercedes.martinez@jesuitinaselche.es'),
(77, 'Mª Asunción Pérez García', 'mariasun.perez@jesuitinaselche.es'),
(78, 'Mª Carmen Pérez García', 'maricarmen.perez@jesuitinaselche.es'),
(79, 'Mª De La Soledad Ortega Mira', 'marisol.ortega@jesuitinaselche.es'),
(80, 'Mª Isabel Orts Torres', 'maisa.orts@jesuitinaselche.es'),
(81, 'Mª Teresa Orts Gonzálvez', 'maite.orts@jesuitinaselche.es'),
(82, 'Mª Ángeles Pérez Segarra', 'mariangeles.perez@jesuitinaselche.es'),
(83, 'Mónica Maciá Galán', 'monica.macia@jesuitinaselche.es'),
(84, 'Roberto Fernández Maciá', 'roberto.fernandez@jesuitinaselche.es'),
(85, 'Sara Andreu Maciá', 'sara.andreu@jesuitinaselche.es'),
(86, 'Sergio Sanmartín Pérez', 'sergio.sanmartin@jesuitinaselche.es'),
(87, 'Susana Rodríguez Tremiño', 'susana.rodriguez@jesuitinaselche.es'),
(88, 'Teresa Pomares Antón', 'tere.pomares@jesuitinaselche.es'),
(89, 'Trinidad Castro Cutillas', 'trini.castro@jesuitinaselche.es'),
(90, 'Ángela Gonzálvez Pelegrín', 'angela.gonzalvez@jesuitinaselche.es'),
(91, 'Alejandro Guilabert', 'alejandro.guilabert@jesuitinaselche.es'),
(92, 'Belinda Pérez', 'belinda.perez@jesuitinaselche.es'),
(93, 'Cristina Pelegrín', 'cristina.pelegrin@jesuitinaselche.es'),
(94, 'Elena Giner', 'elena.giner@jesuitinaselche.es'),
(95, 'Margaret Pérez', 'margaret.perez@jesuitinaselche.es'),
(96, 'Maria del Carmen Seva', 'maricarmen.seva@jesuitinaselche.es'),
(97, 'Maria del Mar Seva', 'mar.seva@jesuitinaselche.es'),
(98, 'Acción Evangelizadora', 'accionevangelizadora@jesuitinaselche.es'),
(99, 'Acción Tutorial', 'acciontutorial@jesuitinaselche.es'),
(100, 'Activa Inglés Extraescolar', 'inglesextraescolar@jesuitinaselche.es'),
(101, 'ActiviElx Extraescolares ', 'activielx@jesuitinaselche.es'),
(102, 'Admin Correo', 'correo@jesuitinaselche.es'),
(103, 'Administración', 'administracion@jesuitinaselche.es'),
(104, 'Administrador Web', 'webadmin@jesuitinaselche.es'),
(105, 'Alcor', 'alcor@jesuitinaselche.es'),
(106, 'Comedor', 'comedor@jesuitinaselche.es'),
(107, 'Comunicación', 'comunicacion@jesuitinaselche.es'),
(108, 'Coordinación Infantil', 'coordinacion.infantil@jesuitinaselche.es'),
(109, 'Covid19', 'covid19@jesuitinaselche.es'),
(110, 'Dirección', 'direccion@jesuitinaselche.es'),
(111, 'Gestion TIC', 'gestiontic@jesuitinaselche.es'),
(112, 'Gestión', 'gestion@jesuitinaselche.es'),
(113, 'Informática', 'informatica@jesuitinaselche.es'),
(114, 'Innovación', 'innovacion@jesuitinaselche.es'),
(115, 'Jefatura Estudios PRIMARIA', 'jefaturaprimaria@jesuitinaselche.es'),
(116, 'Jefatura Estudios SECUNDARIA', 'jefaturasecundaria@jesuitinaselche.es'),
(117, 'Mantenimiento', 'mantenimiento@jesuitinaselche.es'),
(118, 'Orientación 4º a 6º de PRIMARIA - ESO y BACH', 'orientacion@jesuitinaselche.es'),
(119, 'Orientación INFANTIL y 1º a 3º de PRIMARIA', 'orientacion2@jesuitinaselche.es'),
(120, 'Secretaria', 'secretaria@jesuitinaselche.es'),
(121, 'Soporte', 'soporte@jesuitinaselche.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `nacimiento` date NOT NULL,
  `provincia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `civil` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `usuario`, `password`, `dni`, `email`, `perfil`, `foto`, `estado`, `ultimo_login`, `nacimiento`, `provincia`, `localidad`, `domicilio`, `civil`) VALUES
(1, 'Administrador', 'Serna Grimaldos', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', '779237418V', 'kaduceusxx@gmail.com', 'Administrador', 'vista/img/usuarios/admin/57.png', 1, '2020-10-02 10:30:10', '2020-09-11', 'Alicante', 'Alicante', 'Camino del faro 11', 'Casado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `partes`
--
ALTER TABLE `partes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_incidencia` (`id_incidencia`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `partes`
--
ALTER TABLE `partes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
