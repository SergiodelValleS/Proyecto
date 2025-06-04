-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2025 a las 19:35:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*copilot*/
CREATE DATABASE IF NOT EXISTS if0_38647403_prueba;
USE if0_38647403_prueba;
/*copilot*/

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_38647403_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloqueados`
--

CREATE TABLE `bloqueados` (
  `id` int(11) NOT NULL,
  `id_bloqueador` int(11) NOT NULL,
  `id_bloqueado` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `accion` enum('bloquear','desbloquear') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `bloqueados`
--

INSERT INTO `bloqueados` (`id`, `id_bloqueador`, `id_bloqueado`, `fecha`, `accion`) VALUES
(1, 1, 8, '0000-00-00', 'bloquear'),
(2, 1, 8, '0000-00-00', 'desbloquear'),
(3, 2, 5, '0000-00-00', 'bloquear'),
(4, 3, 19, '0000-00-00', ''),
(5, 2, 5, '0000-00-00', 'desbloquear'),
(6, 8, 8, '2025-06-03', 'desbloquear'),
(7, 8, 8, '2025-06-03', 'bloquear'),
(8, 8, 2, '2025-06-03', 'bloquear'),
(9, 8, 2, '2025-06-03', 'desbloquear'),
(10, 8, 19, '2025-06-03', 'bloquear'),
(11, 8, 19, '2025-06-03', 'desbloquear'),
(12, 8, 5, '2025-06-03', 'bloquear'),
(13, 8, 2, '2025-06-03', 'bloquear'),
(14, 8, 3, '2025-06-03', 'bloquear'),
(15, 8, 3, '2025-06-03', 'desbloquear'),
(16, 8, 19, '2025-06-03', 'bloquear'),
(17, 8, 3, '2025-06-03', 'bloquear'),
(18, 8, 8, '2025-06-03', 'desbloquear'),
(19, 8, 8, '2025-06-03', 'bloquear'),
(20, 8, 8, '2025-06-03', 'desbloquear'),
(21, 62, 3, '2025-06-03', 'desbloquear'),
(22, 62, 8, '2025-06-03', 'bloquear'),
(23, 62, 62, '2025-06-03', 'bloquear'),
(24, 62, 62, '2025-06-03', 'desbloquear'),
(25, 62, 62, '2025-06-03', 'bloquear'),
(26, 62, 62, '2025-06-03', 'desbloquear'),
(27, 62, 62, '2025-06-03', 'bloquear'),
(28, 62, 62, '2025-06-03', 'desbloquear'),
(29, 62, 62, '2025-06-03', 'bloquear'),
(30, 62, 62, '2025-06-03', 'desbloquear'),
(31, 62, 3, '2025-06-03', 'bloquear'),
(32, 62, 3, '2025-06-03', 'desbloquear'),
(33, 62, 62, '2025-06-03', 'bloquear'),
(34, 62, 62, '2025-06-03', 'desbloquear'),
(35, 62, 62, '2025-06-03', 'bloquear');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `id_escritor` int(11) NOT NULL,
  `nombre_y_apellidos` varchar(50) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `id_escritor`, `nombre_y_apellidos`, `correo_electronico`, `mensaje`) VALUES
(30, 10, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(29, 9, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(28, 8, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(27, 7, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(26, 6, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(25, 5, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(24, 4, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(23, 3, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(22, 2, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(21, 1, 'nombre apellido', 'correo@example.com', 'Este es un mensaje predeterminado.'),
(31, 8, 'dawdad', 'pinguinolodriguez@gmail.com', ''),
(32, 8, 'prueba', 'prueba@gmail.com', 'hola a todos, soy mickey'),
(33, 8, 'awdawdawd', 'a@gmail.com', 'hola'),
(34, 8, 'awdawdawd', 'a@gmail.com', 'hola'),
(35, 8, 'awdawdawd', 'a@gmail.com', 'hola'),
(36, 8, 'dawda', 'a@gmail.com', 'aDAWDAD'),
(37, 8, 'dawdawd', 'adaw@gmail.com', 'awdawd'),
(38, 8, 'dawda', 'awdawda@gmail.com', 'hola'),
(39, 8, 'dawdaw', 'pinguino@gmail.com', 'aadawdawd'),
(40, 8, 'sergio', 'pepe@gmail.com', 'dawdawdawd'),
(41, 8, 'wadawd', 'a@gmail.com', 'dawdawd'),
(42, 8, 'awdawdawd', 'a@gmail.com', 'wdawda'),
(43, 8, 'awdawdawd', 'a@gmail.com', 'awdawdawda'),
(44, 8, 'dawdawd', 'awdawdaw@gmail.com', 'hola'),
(45, 8, 'sergio', 'hola@gmail.com', 'dawdawdawda'),
(46, 8, 'adawdad', 'a@gmail.com', 'hola'),
(47, 8, 'adawdad', 'a@gmail.com', 'hola'),
(48, 8, 'prueba', 'a@gmail.com', 'adawd'),
(49, 8, 'prueba', 'a@gmail.com', 'adawd'),
(50, 8, 'dawda', 'pinguino@gmail.com', 'ahdoawdawd'),
(51, 8, 'dawdawda', 'a@gmail.com', 'holaa'),
(52, 8, 'ultimo', 'soyultimo@gmail.com', 'adawd'),
(53, 8, 'adawdawd', 'a@gmail.com', 'hola'),
(54, 8, 'dawdaw', 'a@gmail.com', 'adwad'),
(55, 8, 'awdadawd', 'adawdawdawd@gmail.com', 'adawdawd'),
(56, 8, 'aa', 'a@gmail.com', 'hola'),
(57, 8, 'viva el vino', 'a@gmail.com', 'adawdaw'),
(58, 8, 'su nombre', 'a@gmail.com', 'ajwdakwldjakwlñdjawkldjawlkdjalkñw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `texto` varchar(200) DEFAULT NULL,
  `tipo` enum('img','parrafo','ficha','titulo') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `nombre`, `texto`, `tipo`) VALUES
(1, 'imagen_arturo', 'imagenesUsuario/Arturo_Pérez-Reverte_(2024).jpg', 'img'),
(11, 'descripcion_arturoperez', 'arturoperez es un buen escritor', 'parrafo'),
(12, 'biografia_titulo', 'Sobre él', ''),
(4, 'img_arturoperez', NULL, 'img'),
(5, 'negrita_alias_arturoperez', 'arturito', 'parrafo'),
(6, 'negrita_nombre_completo', 'adawdawdawdadawd', 'parrafo'),
(7, 'negrita_fecha_nac', '03/03/1993', 'parrafo'),
(8, 'nacionalidad', 'Español', 'parrafo'),
(9, 'negrita_obras_notables', 'dawdawdawd', 'parrafo'),
(10, 'texto_un_titulo', 'adawdawdawd', 'parrafo'),
(2, 'titulo_arturoperez', 'Arturo Pérez Reverte', 'titulo'),
(3, 'descripcion_arturoperez', 'Arturo Pérez-Reverte es un escritor y periodista español nacido en 1951. Fue corresponsal de guerra. Sus novelas, como El capitán Alatriste, destacan por su precisión histórica y aventura.', ''),
(13, 'imagen_libro_1', 'nodisponible.jpg', 'img'),
(14, 'imagen', 'robertovaquero.jpg', 'img'),
(15, 'titulo', 'Roberto Vaquero, el presidente de Frente Obrero', 'titulo'),
(16, 'texto_roberto', 'Roberto Vaquero es un escritor y analista con una visión crítica del panorama sociopolítico. Su trabajo abarca historia, política y filosofía, ofreciendo análisis profundos y documentados.', 'parrafo'),
(17, 'imagenBecquer', 'imagen.jpg', 'img'),
(18, 'tituloBecquer', 'soy un titulo', 'titulo'),
(19, 'textoBecquer', 'adjawkdjawkldjawlkdjawlñd', 'parrafo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `id_escritor` int(11) NOT NULL,
  `nombre_persona` varchar(50) NOT NULL,
  `parrafo_modular_id` int(4) NOT NULL,
  `titulo_opcional` varchar(20) NOT NULL,
  `parrafo_titulo_opcional` varchar(255) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `nombre_completo` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` varchar(20) NOT NULL,
  `nacionalidad` varchar(20) NOT NULL,
  `obra_notable` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `id_escritor`, `nombre_persona`, `parrafo_modular_id`, `titulo_opcional`, `parrafo_titulo_opcional`, `imagen`, `alias`, `nombre_completo`, `fecha_nacimiento`, `nacionalidad`, `obra_notable`) VALUES
(1, 8, 'Árturo Pérez Reverte', 3, 'Biografía', 'Arturo Pérez-Reverte (Cartagena, 1951) es un escritor y periodista español. Fue corresponsal de guerra durante 21 años antes de dedicarse a la literatura. Autor de El capitán Alatriste, La reina del sur y otras novelas de éxito. Es miembro de la Real Acad', 'imagenesUsuario/Arturo_Pérez-Reverte_(2024).jpg', NULL, NULL, '01/01/1951', 'Española', NULL),
(2, 58, 'Roberto Vaquero', 16, 'Política', 'Roberto Vaquero es un político español que ha estado involucrado en diversas organizaciones de izquierda. Es el presidente del Frente Obrero desde 2022 y secretario general del Partido Marxista-Leninista (Reconstrucción Comunista) desde 2021.', 'robertovaquero.jpg', NULL, 'Roberto Vaquero Arribas', '01/02/1993', 'Española', 'Nostalgia'),
(3, 59, 'Gustavo Adolfo Becquer', 19, 'Sobre él', 'Gustavo Adolfo Bécquer, poeta y narrador del romanticismo español, plasmó en sus escritos una sensibilidad melancólica y un profundo amor por lo etéreo. Su prosa envolvente evoca misterio, pasión y nostalgia.', 'dawdadawdawdaw', NULL, NULL, '17/02/1836', 'Española', NULL),
(4, 60, 'manolo', 2, 'titulo opcional', 'hola', 'dawdawdawd', NULL, NULL, '21/03/1997', 'española', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `imagen` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `id_escritor` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `url_amazon` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `numero_paginas` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `id_escritor`, `precio`, `imagen`, `fecha`, `url_amazon`, `sinopsis`, `numero_paginas`, `ISBN`, `editorial`, `nombre`) VALUES
(2, 7, 2500, 'nodisponible.jpg', '2025-05-07 00:00:00', 'https://www.amazon/libro-1', 'adawdawdawdawdawdawd', 100, '9781234567897', 'Anagrama', 'El misterioso caso del mando perdido'),
(13, 58, 21, 'nostalgia.jpg', '2025-04-07 00:00:00', 'https://www.amazon.es/Nostalgia-167-Narrativa-Roberto-Vaquero/dp/8419877468', 'Nostalgia es una historia de España que aborda la pérdida de valores, la erosión de la familia y el impacto de la posmodernidad en la sociedad. A través de los ojos de una familia española, se analiza la decadencia social y política, ofreciendo una crítica mordaz y un mensaje de esperanza.', 296, '9788419877468', 'Ediciones Espuela de Plata', 'NOSTALGIA'),
(14, 58, 18, 'Portada-por-que el-obrero-vota-a la-derecha.jpg', '2024-06-12 00:00:00', 'https://www.amazon.es/Por-qu%C3%A9-obrero-vota-derecha/dp/8413848407', 'Este ensayo histórico y manifiesto político analiza por qué amplias mayorías sociales están optando por opciones de derecha radical en detrimento de una izquierda que ha perdido su sentido de clase. Roberto Vaquero examina temas como la globalización, el feminismo, el ecologismo y la inmigración, ofreciendo una alternativa de progreso enfocada en la clase trabajadora.', 280, '9788413848402', 'La Esfera de los Libros', 'Por qué el obrero vota a la derecha'),
(16, 8, 2000, 'imagenesUsuario/poridentidad.jpg', '1996-09-01 00:00:00', 'https://www.amazon.com/capitan-alatriste', 'Novela histórica de aventuras en el Siglo de Oro español.', 320, '9788420420761', 'Alfaguara', 'El capitán Alatriste'),
(15, 59, 2100, 'Cartas literarias a una mujer.jpg', '1860-05-19 00:00:00', 'link', 'En Cartas literarias a una mujer (1860), Bécquer explora la poesía y el arte con profundidad y sensibilidad. Defiende la inspiración frente a la técnica y reflexiona sobre la belleza y el alma del creador.', 240, '9788491054658', 'Penguin', 'Cartas literarias a una mujer'),
(17, 8, 2700, 'nodisponible.jpg', '1990-04-01 00:00:00', 'https://www.amazon.com/tablas-flandes', 'Misterio y arte en una historia de intriga.', 280, '9788420481731', 'Alfaguara', 'La tabla de Flandes'),
(18, 8, 2600, 'nodisponible.jpg', '2002-01-01 00:00:00', 'https://www.amazon.com/reina-sur', 'Thriller sobre narcotráfico y supervivencia.', 400, '9788420473590', 'Alfaguara', 'La reina del sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajechat`
--

CREATE TABLE `mensajechat` (
  `usuario` varchar(15) NOT NULL,
  `texto` text NOT NULL,
  `id` int(11) NOT NULL,
  `hora` datetime NOT NULL DEFAULT current_timestamp(),
  `id_escritor` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mensajechat`
--

INSERT INTO `mensajechat` (`usuario`, `texto`, `id`, `hora`, `id_escritor`) VALUES
('usuarioe1yldx42', 'dawd', 108, '2025-04-17 10:33:05', 1),
('usuario39t08sy4', 'id 12', 109, '2025-04-17 10:33:14', 12),
('usuariobx6m8gly', 'awd', 110, '2025-04-17 10:33:50', 1),
('usuariobx6m8gly', 'adawdawdawd', 111, '2025-04-17 10:33:54', 1),
('usuarioavddv6bo', 'ad', 112, '2025-04-17 10:34:03', 1),
('usuario2ow1gjvj', 'dwa', 113, '2025-04-17 10:35:23', 12),
('usuarioaetg0nqw', 'awd', 114, '2025-04-17 10:39:58', 12),
('usuariosa6eeyjj', 'adawd', 115, '2025-04-17 10:52:26', 12),
('usuariosa6eeyjj', 'xxxx', 116, '2025-04-17 10:52:29', 12),
('usuarioko4o2735', 'awd', 117, '2025-04-17 11:11:03', 1),
('usuarioj35i356x', 'awd', 118, '2025-04-17 11:35:13', 12),
('usuario4qbk0uss', 'w', 119, '2025-04-17 12:35:56', 12),
('usuarioul3rcl0y', 'daw', 120, '2025-04-17 13:40:58', 1),
('usuariocd5mnqzw', 'kjhk', 121, '2025-04-17 13:43:33', 1),
('usuario697ozb6f', 'wad', 122, '2025-04-17 13:46:57', 1),
('usuariol6z46qrl', 'jk', 123, '2025-04-17 13:47:24', 1),
('usuariotmuf4bwa', 'hola', 124, '2025-04-17 13:59:53', 1),
('usuariowpkppwza', 'awd', 125, '2025-04-17 14:00:02', 1),
('usuarioht23nynj', 'hj', 126, '2025-04-17 14:00:24', 1),
('usuarioyda1yn68', 'awdawd', 127, '2025-04-17 14:07:26', 1),
('usuario30nhfm3m', 'awdawd', 128, '2025-04-17 14:07:31', 8),
('usuariodmupg4hp', 'awdawd', 129, '2025-04-17 14:10:20', 1),
('usuario37mrcys1', 'awdaw', 130, '2025-04-17 14:13:06', 1),
('usuario37mrcys1', 'xxx', 131, '2025-04-17 14:13:11', 1),
('usuario37mrcys1', 'dawdawdawd', 132, '2025-04-17 14:13:15', 1),
('usuarioco2ujkt8', 'awd', 133, '2025-04-17 23:20:24', 1),
('usuarioco2ujkt8', 'awdawd', 134, '2025-04-17 23:20:30', 1),
('awdawdadadw', 'awdawd', 135, '2025-04-17 14:21:06', NULL),
('awd', 'awdaw', 136, '2025-04-17 14:22:55', NULL),
('awd', 'dwad', 137, '2025-04-17 00:00:00', NULL),
('awdawd', 'adwad', 138, '2025-04-17 14:24:00', NULL),
('', 'awd', 139, '2025-04-17 09:00:00', NULL),
('awdad', 'dwad', 140, '2025-04-17 14:24:49', NULL),
('usuario1wtg6tg5', 'wad', 141, '2025-04-18 15:56:59', 1),
('usuario5e4z2nna', 'nm,n,', 142, '2025-04-18 15:58:34', 1),
('usuario8e82ujj9', 'awd', 143, '2025-04-18 16:10:22', 1),
('usuarioc0wdwfqo', 'x', 144, '2025-04-18 16:15:41', 12),
('usuario8edmbehc', 'awdawd', 145, '2025-04-18 18:23:35', 1),
('usuario3bp3l62e', 'awd', 146, '2025-04-18 18:31:29', 1),
('usuario3bp3l62e', 'mensaje de 18042025', 147, '2025-04-18 18:31:40', 1),
('usuarioilmltlio', 'awd', 148, '2025-04-18 19:57:15', 1),
('usuarioilmltlio', 'awdad', 149, '2025-04-18 19:57:36', 1),
('usuarioilmltlio', 'dawdawdawd', 150, '2025-04-18 19:57:46', 1),
('usuario5wwhru51', 'awd', 151, '2025-04-18 19:57:54', 1),
('usuario5wwhru51', 'a', 152, '2025-04-18 19:58:45', 1),
('usuario5wwhru51', 'wadawd', 153, '2025-04-18 20:05:46', 1),
('usuariovdo2uam1', 'pruebita', 154, '2025-04-18 20:08:47', 1),
('usuariofucg5pac', 'hola', 155, '2025-04-18 20:14:25', 1),
('usuario3x2jtq9l', 'aaaaaaaaaaaaaaaaaaaa', 156, '2025-04-18 20:17:17', 1),
('usuario', 'weeeeeeeeeeeeeeeeee', 157, '2025-04-18 20:55:43', 1),
('usuario2', 'hola', 158, '2025-04-18 21:00:22', 1),
('usuario2', 'awd', 159, '2025-04-18 21:01:48', 1),
('usuario2', 'awd', 160, '2025-04-18 21:01:56', 12),
('usuario2', 'dawdadad', 161, '2025-04-19 16:12:25', 1),
('usuario2', 'dawd', 162, '2025-04-19 16:15:01', 8),
('arturoperez', 'adawdawd', 163, '2025-04-19 17:04:41', 8),
('arturoperez', 'awd', 164, '2025-04-19 17:35:57', 1),
('SoySergio', 'Hola, soy Sergio desde el coche', 165, '2025-04-19 20:28:54', 8),
('usuarioysy8yjd6', 'Hol', 166, '2025-04-19 20:29:27', 8),
('SoySergio', 'https://proyectodaw.free.nf/registro.php', 167, '2025-04-19 20:29:45', 8),
('usuarioysy8yjd6', 'Como estás?', 168, '2025-04-19 20:29:47', 8),
('usuarioysy8yjd6', 'Como estás?', 169, '2025-04-19 20:30:02', 8),
('SoySergio', 'Entra aqui https://proyectodaw.free.nf/registro.php', 170, '2025-04-19 20:30:19', 8),
('Psm', 'Hola Sergio', 171, '2025-04-19 20:34:54', 1),
('SoySergio', 'https://proyectodaw.free.nf/proyecto-chat/?id_escritor=8', 172, '2025-04-19 20:35:10', 8),
('Psm', 'J', 173, '2025-04-19 20:35:31', 1),
('SoySergio', 'A', 174, '2025-04-19 20:35:35', 1),
('SoySergio', 'Snbd', 175, '2025-04-19 20:35:46', 1),
('SoySergio', 'https://proyectodaw.free.nf/proyecto-chat/?id_escritor=8', 176, '2025-04-19 20:36:05', 1),
('usuarioo60php3q', 'adawd', 177, '2025-04-20 22:15:50', 1),
('usuario58xkceib', 'adwa', 178, '2025-04-20 22:16:05', 1),
('usuario2522v5ft', 'a', 179, '2025-04-20 22:16:55', 1),
('usuario9b2gfnzg', 'ada', 180, '2025-04-20 22:17:24', 1),
('usuario9b2gfnzg', 'awd', 181, '2025-04-20 22:17:31', 1),
('usuario9b2gfnzg', 'a', 182, '2025-04-20 22:17:36', 1),
('usuario', 'h', 183, '2025-04-20 22:19:18', 1),
('usuario', 'awd', 184, '2025-04-20 22:38:52', 1),
('usuario', 'awd', 185, '2025-04-20 23:00:17', 1),
('invitadoeafe6e9', 'wad', 186, '2025-04-20 23:33:32', 1),
('invitado1nqazvk', 'Hola caracola', 187, '2025-04-20 23:40:52', 8),
('invitadotichq1o', 'wdjawkldjawkd', 188, '2025-04-23 19:34:54', 8),
('invitadotichq1o', 'xadw', 189, '2025-04-23 19:34:59', 8),
('pepelolo', 'dawdawdadw', 190, '2025-04-23 19:35:49', 1),
('invitado8a55pao', 'hjkh', 191, '2025-04-24 15:05:38', 8),
('pepelolo', 'hola', 192, '2025-04-24 15:10:47', 8),
('pepelolo', 'aaa', 193, '2025-04-24 15:10:56', 8),
('invitado4vuw5uk', 'awd', 194, '2025-04-26 15:49:21', 1),
('invitadosl786in', 'awd', 195, '2025-04-26 16:27:51', 1),
('invitadoqjq28z2', 'wd', 196, '2025-04-26 16:28:16', 1),
('invitadof1h6zva', 'da', 197, '2025-04-26 16:29:42', 1),
('invitadof1h6zva', 'awdw', 198, '2025-04-26 16:29:47', 1),
('invitadof1h6zva', 'a', 199, '2025-04-26 16:40:19', 1),
('invitado5fvyzom', 'awd', 200, '2025-04-26 17:11:05', 1),
('invitadoq2ivx2i', 'awd', 201, '2025-04-27 16:47:57', 1),
('invitadooplry9q', 'd', 202, '2025-04-27 17:30:21', 1),
('invitadooplry9q', 'a', 203, '2025-04-27 17:30:30', 1),
('invitadooplry9q', 'awda', 204, '2025-04-27 17:30:48', 1),
('invitadoayq5r1b', 'a', 205, '2025-04-27 17:34:10', 1),
('invitado5ew666h', 'awda', 206, '2025-04-30 22:56:30', 8),
('invitado1s3ne9j', 'wad', 207, '2025-04-30 22:57:45', 8),
('invitadoj2ko98b', 'dawdawd', 208, '2025-05-03 16:08:34', 3),
('invitadoj2ko98b', 'dawd', 209, '2025-05-03 16:15:26', 8),
('invitado0tuccon', 'adawdaw', 210, '2025-05-03 16:50:17', 8),
('invitado0tuccon', 'a', 211, '2025-05-03 17:09:15', 2),
('invitadovk33ito', 'wadawdawd', 212, '2025-05-07 18:34:57', 7),
('invitadovk33ito', 'dwadawd', 213, '2025-05-07 18:35:06', 7),
('arturoperez', 'dwadawd', 214, '2025-05-07 19:00:36', 8),
('arturoperez', '41486', 215, '2025-05-07 19:03:59', 8),
('arturoperez', 'awdaw', 216, '2025-05-07 19:04:29', 8),
('arturoperez', 'dwdad', 217, '2025-05-07 19:04:33', 8),
('usuario', 'jkhjkhjk', 218, '2025-05-11 21:47:59', 8),
('invitado2amrwvt', 'mbmnb', 219, '2025-05-11 21:54:27', 8),
('invitado2amrwvt', 'jhjhj', 220, '2025-05-11 21:55:26', 1),
('invitado8xlcjrf', 'awd', 221, '2025-05-11 23:24:26', 8),
('invitado8xlcjrf', 'dwadawd', 222, '2025-05-11 23:25:41', 8),
('invitado48hmwlc', 'dwa', 223, '2025-05-11 23:38:46', 8),
('invitadouqy19t2', 'a', 224, '2025-05-11 23:54:53', 8),
('invitadom1gcedb', 'awd', 225, '2025-05-11 23:56:33', 8),
('invitado6eozy24', 'awd', 226, '2025-05-12 00:02:35', 8),
('invitadobpyvk9u', 'a', 227, '2025-05-12 00:09:44', 8),
('invitado5lbs9jm', 'awd', 228, '2025-05-12 00:33:57', 8),
('invitado53kw5v5', 'dawd', 229, '2025-05-18 19:06:31', 8),
('arturoperez', 'awdawdawdawdawdawdawdawdawdawdawdawd', 230, '2025-05-21 17:06:24', 8),
('invitado53oedgc', 'Hola', 231, '2025-06-02 11:23:44', 59),
('invitado1z1q2ou', 'a', 232, '2025-06-02 18:01:18', 8),
('superadmin', 'awd', 233, '2025-06-03 13:40:24', 8),
('superadmin', 'adwa', 234, '2025-06-03 13:41:48', 8),
('superadmin', 'adwa', 235, '2025-06-03 13:51:39', 8),
('superadmin', 'dawd', 236, '2025-06-03 13:53:01', 8),
('superadmin', 'dadw', 237, '2025-06-03 13:54:08', 8),
('superadmin', 'dawdawdawd', 238, '2025-06-03 13:54:42', 8),
('superadmin', 'adawd', 239, '2025-06-03 13:54:47', 8),
('superadmin', 'dawdawdad', 240, '2025-06-03 13:54:55', 8),
('superadmin', 'adawd', 241, '2025-06-03 13:55:00', 8),
('superadmin', 'adawda', 242, '2025-06-03 13:55:29', 8),
('superadmin', 'awdad', 243, '2025-06-03 13:56:12', 8),
('superadmin', 'awda', 244, '2025-06-03 14:04:17', 8),
('superadmin', 'x', 245, '2025-06-03 14:04:21', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeforo`
--

CREATE TABLE `mensajeforo` (
  `id_mensaje` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tema_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mensajeforo`
--

INSERT INTO `mensajeforo` (`id_mensaje`, `fecha`, `tema_id`, `texto`, `usuario`) VALUES
(1, '2025-04-20 19:00:00', 3, 'adawdawd', 'aa'),
(2, '2025-04-20 23:00:00', 6, '2', 'aa'),
(3, '2025-04-20 22:00:00', 6, 'Soy un texto bonito', 'werly'),
(4, '2025-04-20 23:17:51', 3, 'dawd', 'usuario'),
(5, '2025-04-20 23:19:42', 3, 'dawdawd', 'usuario'),
(6, '2025-04-20 23:20:07', 3, 'dawdaw', 'usuarion0qq24i8'),
(7, '2025-04-20 23:23:00', 3, 'aaa', 'usuario'),
(8, '2025-04-20 23:24:51', 3, 'hola', 'usuario'),
(9, '2025-04-23 19:36:03', 3, 'hola, soy pepelolo', 'pepelolo'),
(10, '2025-04-26 16:45:16', 3, 'awdawd', 'usuario'),
(11, '2025-04-26 16:50:01', 3, 'dawd', 'usuario'),
(12, '2025-04-27 17:34:22', 3, 'No puedes escribir en el tema si no estás registrado', 'invitadoayq5r1b2'),
(13, '2025-04-27 17:44:04', 3, 'aaaaaaaaaaa\na\nA', 'usuario'),
(14, '2025-04-27 17:44:41', 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'usuario'),
(15, '2025-04-27 17:45:03', 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\naaaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaaaa', 'usuario'),
(16, '2025-04-27 17:45:40', 3, '<h1>hola</h1>', 'usuario'),
(17, '2025-04-30 22:46:39', 6, 'dwad', 'usuario'),
(18, '2025-04-30 22:46:46', 6, 'nuevo', 'usuario'),
(19, '2025-05-01 00:12:41', 6, 'aaaaaaaaaaaaaa', 'usuario'),
(20, '2025-05-01 00:20:50', 6, 'awda', 'usuario'),
(21, '2025-05-03 16:20:31', 3, 'hola, soy marcelo', 'marcelo'),
(22, '2025-05-07 19:01:26', 19, 'dwadawd', 'arturoperez'),
(23, '2025-05-10 20:27:18', 20, 'awdad', 'arturoperez'),
(24, '2025-05-11 21:44:09', 21, 'HOla', 'usuario'),
(25, '2025-05-11 23:26:27', 6, 'dwa', 'arturoperez'),
(26, '2025-05-11 23:26:32', 6, 'dawdaw', 'arturoperez'),
(27, '2025-05-15 23:58:07', 24, '<h1>hola</h1>', 'arturoperez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modular`
--

CREATE TABLE `modular` (
  `id_pagina` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modular`
--

INSERT INTO `modular` (`id_pagina`, `id_contenido`) VALUES
(0, 4),
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(2, 3),
(3, 13),
(32, 14),
(32, 15),
(32, 16),
(33, 16),
(35, 17),
(35, 18),
(35, 19),
(36, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_escritor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`, `url`, `id_escritor`) VALUES
(1, 'inicio', 'https://proyectodaw.free.nf/arturoperez/index', 8),
(2, 'Biografía', 'https://proyectodaw.free.nf/arturoperez/index?get_pagina=2', 8),
(3, 'Libros', 'https://proyectodaw.free.nf/arturoperez/index?get_pagina=3', 8),
(4, 'Inicio', 'https://proyectodaw.free.nf/usuarioilm/index', 1),
(5, 'biografia', 'https://proyectodaw.free.nf/usuarioilm/index?get_pagina=2', 1),
(6, 'libro', 'https://proyectodaw.free.nf/usuarioilm/index?get_pagina=3', 1),
(7, 'Inicio', 'https://proyectodaw.free.nf/usuario5ww/index', 2),
(8, 'biografia', 'https://proyectodaw.free.nf/usuario5ww/index?get_pagina=2', 2),
(9, 'libro', 'https://proyectodaw.free.nf/usuario5ww/index?get_pagina=3', 2),
(10, 'sobre mi', 'https://proyectodaw.free.nf/usuario5ww/index?get_pagina=4', 1),
(32, 'inicio', 'https://proyectodaw.free.nf/robertovaquero/index', 58),
(33, 'biografía', 'https://proyectodaw.free.nf/robertovaquero/index?get_pagina=2', 58),
(34, 'libros', 'https://proyectodaw.free.nf/robertovaquero/index?get_pagina=3', 58),
(35, 'inicio', 'https://proyectodaw.free.nf/gustavoadolfobecquer/index', 59),
(36, 'biografía', 'https://proyectodaw.free.nf/gustavoadolfobecquer/index?id_pagina=2', 59),
(37, 'libros', 'https://proyectodaw.free.nf/gustavoadolfobecquer/index?id_pagina=3', 59),
(38, 'inicio', 'aa', 60),
(39, 'biografia', 'adawdawd', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `id_escritor` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `usuario_creador` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `id_escritor`, `fecha`, `titulo`, `texto`, `usuario_creador`) VALUES
(3, 8, '2025-04-18 08:36:17', 'titulo', 'mensaje', 'manolo'),
(5, 2, '2025-04-18 09:22:10', 'este titulo no debería verse', 'este texto no debería verse', 'no debe verse'),
(6, 8, '2025-04-18 09:22:10', 'Este título debería verse', 'este texto no debería verse', 'usuario que debe verse'),
(7, 0, '2025-05-01 00:39:30', 'dawd', 'awd', '8'),
(8, 0, '2025-05-01 00:39:53', 'aaa', 'dawdawd', '8'),
(9, 0, '2025-05-01 00:40:33', 'adawd', 'awda', '8'),
(4, 8, '2025-05-07 04:49:56', 'Hablen de mi libro', 'dawdawdawd', 'arturoperez'),
(20, 8, '2025-05-10 20:26:46', 'Esto es una prueba muy básica', 'hola', 'arturoperez'),
(25, 8, '2025-05-15 23:59:58', '<b>hola</b>', 'a', 'arturoperez'),
(30, 58, '2025-06-02 11:29:07', 'Debate:Mejor libro de Roberto Vaquero', 'En mi opinión, Nostalgia es el mejor.', 'arturoperez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contraseña` varchar(60) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `jerarquia` enum('usuario','escritor','superadmin','invitado') NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `IP`, `nombre`, `contraseña`, `correo`, `jerarquia`, `fecha_creacion`) VALUES
(8, '31.221.216.181', 'arturoperez', '$2y$10$FY6tpmqKLwkh09G8h7ZbY.TSqapvV3hABJhmYNTS0bW2p0LrwaWkS', 'a@gmail.com', 'escritor', '2025-04-18 21:00:03'),
(2, '213.94.26.8', 'invitado8xlcjrfc', NULL, NULL, 'invitado', '2025-05-11 23:25:41'),
(5, '213.94.26.8', 'invitado48hmwlci', NULL, NULL, 'invitado', '2025-05-11 23:38:46'),
(3, '213.94.26.8', 'usuario', '$2y$10$GpGp06Tov/wXylomSLkro.U24vnYKaDPpaeUqkbrHn8pcMojusxbC', 'a@gmail.com', 'usuario', '2025-05-11 23:43:44'),
(19, '213.94.26.8', 'invitadouqy19t2k', NULL, NULL, 'invitado', '2025-05-11 23:54:53'),
(53, '213.94.26.8', 'invitadom1gcedb3', NULL, NULL, 'invitado', '2025-05-11 23:56:33'),
(54, '213.94.26.8', 'invitado6eozy241', NULL, NULL, 'invitado', '2025-05-12 00:02:35'),
(55, '213.94.26.8', 'invitadobpyvk9u2', NULL, NULL, 'invitado', '2025-05-12 00:09:44'),
(56, '213.94.26.8', 'invitado5lbs9jmr', NULL, NULL, 'invitado', '2025-05-12 00:33:57'),
(57, '213.94.26.8', 'invitado53kw5v5i', NULL, NULL, 'invitado', '2025-05-18 19:06:31'),
(58, '213.94.26.68', 'robertovaquero', '$2y$10$GpGp06Tov/wXylomSLkro.U24vnYKaDPpaeUqkbrHn8pcMojusxbC', 'a@gmail.com', 'escritor', '2025-05-24 22:00:00'),
(59, '213.94.26.68', 'gustavoadolfobecquer', '$2y$10$AiilmGOePnMOaQKJ2jKs7uIWPEeVT6Y4m/2AK9Sqb9gzXnCaMqJku', 'a@gmail.com', 'escritor', '2025-05-25 13:44:15'),
(60, '213.94.26.68', 'pruebaficha', '$2y$10$JVGEMudlPgFTU5wm8kWPJufuLZnpFYOIYw0n8zfwoDoYn5cayJFmS', 'a@gmail.com', 'escritor', '2025-05-27 00:47:54'),
(61, '213.94.26.68', 'unacuenta', '$2y$10$HamEdNGn3PNRvV3r7lLmjuyOblf.c47qjMsrxQVbakOLut0nVOrgq', 'a@gmail.com', 'usuario', '2025-05-28 17:03:55'),
(62, '213.94.24.4', 'superadmin', '$2y$10$j4aYo1Sscfq4s7Tt.1KRM.6HXYcnWgZA24SPxdxykEyBfR2Dy6WJa', 'a@gmail.com', 'superadmin', '2025-05-29 23:17:01'),
(63, '213.94.25.105', 'invitado53oedgcv', NULL, NULL, 'invitado', '2025-06-02 11:23:44'),
(64, '::1', 'invitado1z1q2oup', NULL, NULL, 'invitado', '2025-06-02 18:01:18'),
(65, '::1', 'invitadofr5k3088', NULL, NULL, 'invitado', '2025-06-03 13:34:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloqueados`
--
ALTER TABLE `bloqueados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajeforo`
--
ALTER TABLE `mensajeforo`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `modular`
--
ALTER TABLE `modular`
  ADD PRIMARY KEY (`id_pagina`,`id_contenido`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bloqueados`
--
ALTER TABLE `bloqueados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `mensajeforo`
--
ALTER TABLE `mensajeforo`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
