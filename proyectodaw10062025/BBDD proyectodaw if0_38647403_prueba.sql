-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql312.infinityfree.com
-- Tiempo de generación: 10-06-2025 a las 16:31:53
-- Versión del servidor: 10.6.19-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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
(9, 8, 8, '0000-00-00', 'desbloquear'),
(8, 8, 8, '2025-06-04', 'bloquear'),
(10, 62, 67, '2025-06-10', 'bloquear');

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
(58, 8, 'su nombre', 'a@gmail.com', 'ajwdakwldjakwlñdjawkldjawlkdjalkñw'),
(59, 8, 'hola', 'a@gmail.com', 'hola'),
(60, 8, 'a', 'a@gmail.com', 'hola'),
(61, 8, 'Sergio', 'a@gmail.com', 'Me encanta tu libro'),
(62, 8, 'Sergio del Valle Silva', 'hola@gmail.com', 'Hola a todos'),
(63, 8, 'Sergio del Valle', 'pepe@gmail.com', 'hola a todos'),
(64, 8, 'pepelolo', 'a@gmail.com', 'Buenas tardes, me encanta su libro.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `texto` varchar(400) DEFAULT NULL,
  `tipo` enum('img','parrafo','ficha','titulo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `nombre`, `texto`, `tipo`) VALUES
(1, 'imagen_arturo', 'imagenesUsuario/Arturo_Pérez-Reverte_(2024).jpg', 'img'),
(2, 'titulo_arturoperez', 'Arturo Pérez Reverte', 'titulo'),
(3, 'descripcion_arturoperez', 'Arturo Pérez Reverte es un escritor, periodista y académico español nacido en Cartagena en 1951. Antes de dedicarse por completo a la literatura, trabajó durante 21 años como reportero de guerra, cubriendo conflictos en diversas partes del mundo. Es miembro de la Real Academia Española desde 2003', ''),
(4, 'img_arturoperez', NULL, 'img'),
(5, 'negrita_alias_arturoperez', 'arturito', 'parrafo'),
(6, 'negrita_nombre_completo', 'adawdawdawdadawd', 'parrafo'),
(7, 'negrita_fecha_nac', '03/03/1993', 'parrafo'),
(8, 'nacionalidad', 'Español', 'parrafo'),
(9, 'negrita_obras_notables', 'dawdawdawd', 'parrafo'),
(10, 'texto_un_titulo', 'adawdawdawd', 'parrafo'),
(11, 'descripcion_arturoperez', 'arturoperez es un buen escritor', 'parrafo'),
(12, 'biografia_titulo', 'Sobre él', ''),
(13, 'imagen_libro_1', 'nodisponible.jpg', 'img'),
(14, 'imagen', 'imagenesUsuario/robertovaquero.jpg', 'img'),
(15, 'titulo', 'Roberto Vaquero, el presidente de frente obrero', 'titulo'),
(16, 'texto_roberto', 'Roberto Vaquero Arribas es un político, historiador y escritor español, líder del Frente Obrero desde 2022 y secretario general del Partido Marxista-Leninista (Reconstrucción Comunista) desde 2021. Se caracteriza por su postura crítica hacia la izquierda tradicional, el feminismo y la inmigración. Ha ganado notoriedad por sus discursos dirigidos a la clase trabajadora y sus acciones de protesta.', 'parrafo'),
(17, 'imagenBecquer', 'imagenesUsuario/becquer.jpg', 'img'),
(18, 'tituloBecquer', 'Gustavo Adolfo Bécquer', 'titulo'),
(19, 'textoBecquer', 'Gustavo Adolfo Bécquer fue un poeta y narrador español del siglo XIX, conocido por sus Rimas y Leyendas. Su obra, de estilo romántico, aborda temas como el amor, la melancolía y lo sobrenatural, con un lenguaje delicado y evocador. A pesar de su éxito póstumo, en vida tuvo dificultades económicas y reconocimiento limitado. Su legado ha influido en la literatura española.', 'parrafo'),
(62, 'imagen_daniel.perez', 'nodisponible.jpg', 'img'),
(63, 'titulo_daniel.perez', 'Daniel Perez', 'titulo'),
(64, 'texto_daniel.perez', 'Todo bien', 'parrafo');

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
(1, 8, 'Arturo Pérez Reverte', 3, 'Biografía', 'Arturo Pérez Reverte (Cartagena, 1951) es un escritor y periodista español. Fue corresponsal de guerra y es miembro de la Real Academia Española. Autor de la saga El capitán Alatriste y otras novelas.', 'imagenesUsuario/Arturo_Pérez-Reverte_(2024).jpg', NULL, 'Arturo Pérez Reverte', '25/11/1951', 'Española', NULL),
(2, 58, 'Roberto Vaquero', 16, 'Política', 'Roberto Vaquero es un político español que ha estado involucrado en diversas organizaciones de izquierda. Es el presidente del Frente Obrero desde 2022 y secretario general del Partido Marxista-Leninista (Reconstrucción Comunista) desde 2021.', 'imagenesUsuario/robertovaquero.jpg', NULL, NULL, '01/02/1993', 'Española', NULL),
(3, 59, 'Gustavo Adolfo Becquer', 19, 'Sobre él', 'Gustavo Adolfo Bécquer, poeta y narrador del romanticismo español, plasmó en sus escritos una sensibilidad melancólica y un profundo amor por lo etéreo. Su prosa envolvente evoca misterio, pasión y nostalgia.', 'imagenesUsuario/becquer.jpg', NULL, NULL, '17/02/1836', 'Española', NULL),
(15, 66, 'daniel.perez', 64, 'titulo opcional', 'párrafo titulo opcional', 'nodisponible.jpg', 'alias', 'nombre completo del escritor', '01/01/2000', 'nacionalidad', NULL);

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
  `sinopsis` varchar(400) NOT NULL,
  `numero_paginas` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `id_escritor`, `precio`, `imagen`, `fecha`, `url_amazon`, `sinopsis`, `numero_paginas`, `ISBN`, `editorial`, `nombre`) VALUES
(13, 58, 2290, 'imagenesUsuario/nostalgia.jpg', '2025-04-07 00:00:00', 'https://www.amazon.es/Nostalgia-167-Narrativa-Roberto-Vaquero/dp/8419877468', 'Nostalgia es una historia de España que aborda la pérdida de valores, la erosión de la familia y el impacto de la posmodernidad en la sociedad. A través de los ojos de una familia española, se analiza la decadencia social y política, ofreciendo una crítica mordaz y un mensaje de esperanza.', 296, '9788419877468', 'Ediciones Espuela de Plata', 'NOSTALGIA'),
(14, 58, 1990, 'imagenesUsuario/el-obrero-vota-a-la-derecha.jpg', '2024-06-12 00:00:00', 'https://www.amazon.es/Por-qu%C3%A9-obrero-vota-derecha/dp/8413848407', 'Este ensayo histórico y manifiesto político analiza por qué amplias mayorías sociales están optando por opciones de derecha radical en detrimento de una izquierda que ha perdido su sentido de clase. Roberto Vaquero examina temas como la globalización, el feminismo, el ecologismo y la inmigración, ofreciendo una alternativa de progreso enfocada en la clase trabajadora.', 280, '9788413848402', 'La Esfera de los Libros', 'Por qué el obrero vota a la derecha'),
(16, 8, 2000, 'imagenesUsuario/poridentidad.jpg', '1996-09-01 00:00:00', 'https://shorturl.at/RjL75', 'El capitán Alatriste es una novela histórica de Arturo Pérez-Reverte ambientada en el Siglo de Oro español. Narra las aventuras de Diego Alatriste, un veterano soldado de los tercios de Flandes que sobrevive como espadachín a sueldo en Madrid. En un mundo de intrigas, duelos y conspiraciones, Alatriste se enfrenta a enemigos poderosos mientras protege a su joven aprendiz, Íñigo Balboa', 320, '9788466329149', 'Alfaguara', 'El capitán Alastriste'),
(15, 59, 2100, 'imagenesUsuario/Cartas_literarias_a_una_mujer.png', '1860-05-19 00:00:00', 'https://www.amazon.es/Cartas-literarias-Gustavo-Adolfo-B%C3%A9cquer/dp/882958794X', '\"Cartas literarias a una mujer\" es una obra en prosa de Gustavo Adolfo Bécquer, publicada en el periódico El Contemporáneo entre 1860 y 1861. A través de cartas dirigidas a una figura femenina imaginaria, el autor reflexiona sobre la poesía, el amor y los sentimientos, comenzando con la famosa pregunta: \"¿Qué es poesía?\".', 240, '9788491054658', 'Penguin', 'Cartas literarias a una mujer'),
(17, 8, 2700, 'imagenesUsuario/la-tabla-de-flandes.jpg', '1990-04-01 00:00:00', 'https://shorturl.at/wBt1H', 'Un restaurador descubre un enigmático mensaje oculto en un cuadro flamenco del siglo XV: \"¿Quién mató al caballero?\". La clave del misterio parece estar en una antigua partida de ajedrez representada en la pintura. Mientras investiga, se desata una peligrosa conspiración que conecta el arte, la historia y el juego estratégico con un asesinato actual.', 280, '9788420481731', 'Alfaguara', 'La tabla de Flandes'),
(18, 8, 2600, 'imagenesUsuario/la-reina-del-sur.jpg', '2002-01-01 00:00:00', 'https://shorturl.at/bZLQx', 'Teresa Mendoza, una joven mexicana, se ve obligada a huir tras el asesinato de su novio narcotraficante. Su viaje la lleva a España, donde se convierte en una poderosa líder del tráfico de drogas. Desde la clandestinidad hasta la élite del crimen organizado, Teresa enfrenta traiciones, desafíos y descubre su verdadera fuerza en una historia de supervivencia, ambición y venganza.', 400, '9788420473590', 'Alfaguara', 'La reina del sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeChat`
--

CREATE TABLE `mensajeChat` (
  `usuario` varchar(15) NOT NULL,
  `texto` text NOT NULL,
  `id` int(11) NOT NULL,
  `hora` datetime NOT NULL DEFAULT current_timestamp(),
  `id_escritor` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mensajeChat`
--

INSERT INTO `mensajeChat` (`usuario`, `texto`, `id`, `hora`, `id_escritor`) VALUES
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
('invitado53oedgc', 'Hola', 231, '2025-06-02 11:23:44', 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeForo`
--

CREATE TABLE `mensajeForo` (
  `id_mensaje` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tema_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mensajeForo`
--

INSERT INTO `mensajeForo` (`id_mensaje`, `fecha`, `tema_id`, `texto`, `usuario`) VALUES
(49, '2025-06-04 00:06:41', 35, 'Estoy de acuerdo, es una prueba', 'pruebausuario2'),
(48, '2025-06-03 23:38:57', 43, 'hola', 'pruebausuario'),
(47, '2025-06-03 16:58:16', 42, '<b>Comprobando si hace negrita</b>', 'arturoperez'),
(46, '2025-06-03 16:57:59', 42, 'Este mensaje debería aparecer y debería refrescarse la página', 'arturoperez'),
(45, '2025-06-03 16:57:15', 42, 'Este mensaje si debería aparecer', 'arturoperez'),
(42, '2025-06-03 16:50:47', 42, 'hola', 'arturoperez'),
(43, '2025-06-03 16:51:09', 42, 'hola', 'arturoperez'),
(44, '2025-06-03 16:51:30', 42, 'Este mensaje no debería aparecer.', 'arturoperez'),
(38, '2025-06-02 20:07:18', 42, 'Que aparezca arriba pls', 'arturoperez'),
(39, '2025-06-02 20:20:35', 31, 'a', 'arturoperez'),
(40, '2025-06-02 20:20:43', 31, 'a', 'arturoperez'),
(41, '2025-06-03 16:49:39', 42, 'hola', 'arturoperez'),
(37, '2025-06-02 20:04:51', 41, 'aaaaaaaaasta las narices oye', 'arturoperez'),
(36, '2025-06-02 20:04:07', 40, 'prueba ultima', 'unacuenta'),
(35, '2025-06-02 20:02:38', 39, 'hola', 'arturoperez'),
(29, '2025-06-02 19:38:40', 20, 'a', 'arturoperez'),
(30, '2025-06-02 19:43:18', 33, 'adwda', 'arturoperez'),
(31, '2025-06-02 20:00:48', 36, 'Y esto el primer mensaje', 'arturoperez'),
(32, '2025-06-02 20:01:01', 37, 'Hola', 'arturoperez'),
(56, '2025-06-04 08:53:42', 43, 'a', 'arturoperez'),
(34, '2025-06-02 20:02:19', 38, 'Hasta las narices ya', 'arturoperez'),
(55, '2025-06-04 00:20:36', 42, 'Hola a todos', 'pruebausuario2'),
(54, '2025-06-04 00:20:07', 35, 'Estoy de acuerdo, esto es una prueba', 'pruebausuario2'),
(57, '2025-06-04 08:55:05', 43, 'a', 'arturoperez'),
(58, '2025-06-04 09:06:00', 43, 'a', 'arturoperez'),
(59, '2025-06-04 10:40:10', 44, 'Vótenme', 'superadmin'),
(60, '2025-06-04 10:42:24', 45, 'prueba', 'superadmin'),
(61, '2025-06-04 10:55:28', 46, 'a', 'superadmin'),
(62, '2025-06-04 17:04:27', 43, 'hola\n', 'arturoperez'),
(63, '2025-06-04 17:07:38', 43, 'awdawd', 'arturoperez'),
(64, '2025-06-10 11:00:09', 47, 'SOlo estoy probando', 'superadmin'),
(65, '2025-06-10 11:00:15', 47, 'Parece que funciona', 'superadmin');

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
(36, 19),
(47, 62),
(47, 63),
(47, 64),
(48, 64);

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
(1, 'Escritor', 'https://proyectodaw.free.nf/arturoperez/index', 8),
(2, 'Biografía', 'https://proyectodaw.free.nf/arturoperez/index?get_pagina=2', 8),
(3, 'Libros', 'https://proyectodaw.free.nf/arturoperez/index?get_pagina=3', 8),
(4, 'Inicio', 'https://proyectodaw.free.nf/usuarioilm/index', 1),
(5, 'biografia', 'https://proyectodaw.free.nf/usuarioilm/index?get_pagina=2', 1),
(6, 'libros', 'https://proyectodaw.free.nf/usuarioilm/index?get_pagina=3', 1),
(7, 'Escritor', 'https://proyectodaw.free.nf/usuario5ww/index', 2),
(8, 'biografia', 'https://proyectodaw.free.nf/usuario5ww/index?get_pagina=2', 2),
(9, 'libros', 'https://proyectodaw.free.nf/usuario5ww/index?get_pagina=3', 2),
(10, 'sobre mi', 'https://proyectodaw.free.nf/usuario5ww/index?get_pagina=4', 1),
(32, 'Escritor', 'https://proyectodaw.free.nf/robertovaquero/index', 58),
(33, 'Biografía', 'https://proyectodaw.free.nf/robertovaquero/index?get_pagina=2', 58),
(34, 'Libros', 'https://proyectodaw.free.nf/robertovaquero/index?get_pagina=3', 58),
(35, 'Escritor', 'https://proyectodaw.free.nf/gustavoadolfobecquer/index', 59),
(36, 'Biografía', 'https://proyectodaw.free.nf/gustavoadolfobecquer/index?id_pagina=2', 59),
(37, 'Libros', 'https://proyectodaw.free.nf/gustavoadolfobecquer/index?id_pagina=3', 59),
(47, 'Escritor', 'https://proyectodaw.free.nf/daniel.perez/index', 66),
(48, 'Biografía', 'https://proyectodaw.free.nf/daniel.perez/index?get_pagina=2', 66),
(49, 'Libros', 'https://proyectodaw.free.nf/daniel.perez/index?get_pagina=3', 66);

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
(35, 8, '2025-06-01 20:00:27', 'Esto es una prueba', 'Y esto el primer mensaje', 'arturoperez'),
(34, 8, '2025-06-02 20:00:15', 'Esto es una prueba', 'Y esto el primer mensaje', 'arturoperez'),
(33, 8, '2025-06-02 19:43:09', 'adawda', 'adawdawdawdawdawdawdawdad', 'arturoperez'),
(32, 8, '2025-06-02 19:42:46', 'hola', 'hola', 'arturoperez'),
(36, 8, '2025-06-02 20:00:48', 'Esto es una prueba', 'Y esto el primer mensaje', 'arturoperez'),
(42, 8, '2025-06-02 20:07:18', 'Esto es una prueba', 'Que aparezca arriba pls', 'arturoperez'),
(43, 8, '2025-06-03 23:38:57', 'Prueba 1', 'hola', 'pruebausuario'),
(44, 58, '2025-06-04 10:40:10', 'Bienvenidos a mi foro', 'Vótenme', 'robertovaquero'),
(39, 8, '2025-06-02 20:02:38', 'Ultima prueba', 'hola', 'arturoperez'),
(40, 8, '2025-06-02 20:04:07', 'Prueba ultima', 'prueba ultima', 'unacuenta'),
(41, 8, '2025-06-02 20:04:51', 'aaaaaaaaaaaaaah', 'aaaaaaaaasta las narices oye', 'arturoperez'),
(38, 8, '2025-06-02 20:02:19', 'Tercera prueba', 'Hasta las narices ya', 'arturoperez'),
(37, 8, '2025-06-02 20:01:01', 'Esto es otra prueba', 'Hola', 'arturoperez'),
(31, 8, '2025-05-01 19:42:33', 'Hablemos de mi último libro', 'El puerto dormía bajo la luz mortecina del atardecer. En la taberna, hombres de manos curtidas bebían en silencio, mientras el capitán repasaba viejos mapas. No buscaba tesoros, sino redención. La última batalla no se libraría en el mar, sino en su memoria. Porque el verdadero enemigo nunca es el tiempo, sino el olvido.\r\n¿Qué os parece?', 'arturoperez'),
(47, 3, '2025-06-10 11:00:09', 'Estoy probando', 'SOlo estoy probando', 'superadmin');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `IP`, `nombre`, `contraseña`, `correo`, `jerarquia`, `fecha_creacion`) VALUES
(2, '213.94.26.8', 'invitado8xlcjrfc', NULL, NULL, 'invitado', '2025-05-11 23:25:41'),
(3, '213.94.26.8', 'usuario', '$2y$10$GpGp06Tov/wXylomSLkro.U24vnYKaDPpaeUqkbrHn8pcMojusxbC', 'a@gmail.com', 'usuario', '2025-05-11 23:43:44'),
(5, '213.94.26.8', 'invitado48hmwlci', NULL, NULL, 'invitado', '2025-05-11 23:38:46'),
(8, '31.221.216.181', 'arturoperez', '$2y$10$FY6tpmqKLwkh09G8h7ZbY.TSqapvV3hABJhmYNTS0bW2p0LrwaWkS', 'sergiodvsva@gmail.com', 'escritor', '2025-04-18 21:00:03'),
(19, '213.94.26.8', 'invitadouqy19t2k', NULL, NULL, 'invitado', '2025-05-11 23:54:53'),
(53, '213.94.26.8', 'invitadom1gcedb3', NULL, NULL, 'invitado', '2025-05-11 23:56:33'),
(54, '213.94.26.8', 'invitado6eozy241', NULL, NULL, 'invitado', '2025-05-12 00:02:35'),
(55, '213.94.26.8', 'invitadobpyvk9u2', NULL, NULL, 'invitado', '2025-05-12 00:09:44'),
(56, '213.94.26.8', 'invitado5lbs9jmr', NULL, NULL, 'invitado', '2025-05-12 00:33:57'),
(57, '213.94.26.8', 'invitado53kw5v5i', NULL, NULL, 'invitado', '2025-05-18 19:06:31'),
(58, '213.94.26.68', 'robertovaquero', '$2y$10$GpGp06Tov/wXylomSLkro.U24vnYKaDPpaeUqkbrHn8pcMojusxbC', 'a@gmail.com', 'escritor', '2025-05-24 22:00:00'),
(59, '213.94.26.68', 'gustavoadolfobecquer', '$2y$10$AiilmGOePnMOaQKJ2jKs7uIWPEeVT6Y4m/2AK9Sqb9gzXnCaMqJku', 'a@gmail.com', 'escritor', '2025-05-25 13:44:15'),
(60, '213.94.26.68', 'pruebaficha', '$2y$10$JVGEMudlPgFTU5wm8kWPJufuLZnpFYOIYw0n8zfwoDoYn5cayJFmS', 'a@gmail.com', 'usuario', '2025-05-27 00:47:54'),
(61, '213.94.26.68', 'unacuenta', '$2y$10$HamEdNGn3PNRvV3r7lLmjuyOblf.c47qjMsrxQVbakOLut0nVOrgq', 'a@gmail.com', 'usuario', '2025-05-28 17:03:55'),
(62, '213.94.24.4', 'superadmin', '$2y$10$j4aYo1Sscfq4s7Tt.1KRM.6HXYcnWgZA24SPxdxykEyBfR2Dy6WJa', 'a@gmail.com', 'superadmin', '2025-05-29 23:17:01'),
(63, '213.94.25.105', 'invitado53oedgcv', NULL, NULL, 'invitado', '2025-06-02 11:23:44'),
(64, '213.94.25.105', 'pruebausuario', '$2y$10$wJvV1hgCS/qCJkOCqCQP9.J1JubdStathb6HvCg3lZfGZGMYUW0my', 'a@gmail.com', 'usuario', '2025-06-03 22:46:59'),
(65, '213.94.25.105', 'pruebausuario2', '$2y$10$byGyrmp9BPRVt1vvKQAW9.H9C2iMa4aUnuDUO2BasBRxn4esYEJr2', 'a@gmail.com', 'usuario', '2025-06-03 22:48:20'),
(66, '217.9.26.189', 'daniel.perez', '$2y$10$4jkZEtQbewtJJRqVXVjfmOZMWULvI7yeffOhvWjsGPfK6CwsKoyyW', 'pinguinolodriguez@gmail.com', 'escritor', '2025-06-10 18:15:05'),
(67, '213.94.25.105', 'bloqueado', '$2y$10$9qCVkAqICHpw.L6.q9qjKuf8FI4DYVYdvyazKOOT0I/19I0htkdgS', 'a@gmail.com', 'usuario', '2025-06-10 21:21:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloqueados`
--
ALTER TABLE `bloqueados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_bloqueador` (`id_bloqueador`),
  ADD KEY `fk_id_bloqueado` (`id_bloqueado`);

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
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `fk_ficha_id_escritor` (`id_escritor`),
  ADD KEY `fk_ficha_parrafo_modular_id` (`parrafo_modular_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `mensajeChat`
--
ALTER TABLE `mensajeChat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mensajeChat_usuario` (`usuario`);

--
-- Indices de la tabla `mensajeForo`
--
ALTER TABLE `mensajeForo`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_mensajeForo_usuario` (`usuario`),
  ADD KEY `fk_mensajeForo_tema_id` (`tema_id`);

--
-- Indices de la tabla `modular`
--
ALTER TABLE `modular`
  ADD PRIMARY KEY (`id_pagina`,`id_contenido`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`),
  ADD KEY `fk_pagina_id_escritor` (`id_escritor`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `fk_tema_id_escritor` (`id_escritor`),
  ADD KEY `fk_tema_usuario_creador` (`usuario_creador`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `mensajeChat`
--
ALTER TABLE `mensajeChat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `mensajeForo`
--
ALTER TABLE `mensajeForo`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `fk_ficha_id_escritor` FOREIGN KEY (`id_escritor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_ficha_parrafo_modular_id` FOREIGN KEY (`parrafo_modular_id`) REFERENCES `contenido` (`id_contenido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
