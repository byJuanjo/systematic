-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-08-2017 a las 02:57:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `systematic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'OFIMATICA', '2017-08-01 05:00:00', '2017-08-01 05:00:00'),
(2, 'INGENIERIA', '2017-08-01 05:00:00', '2017-08-01 05:00:00'),
(3, 'DISEÑO', '2017-08-01 05:00:00', '2017-08-01 05:00:00'),
(4, 'PROGRAMACIÓN', '2017-08-01 05:00:00', '2017-08-01 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certiport`
--

CREATE TABLE `certiport` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `certiport`
--

INSERT INTO `certiport` (`id`, `titulo`, `html`, `img`, `created_at`, `updated_at`) VALUES
(2, 'MICROSOFT', '<p>&nbsp;</p>\r\n\r\n<p>Systematic te prepara en cursos y entrenamiento t&eacute;cnico Microsoft que cualquier otra empresa de entrenamiento en el mundo. Como socio de entrenamiento de Certiport, ofrece capacitaci&oacute;n integral que lo ayudar&aacute; a alcanzar los resultados que necesita para obtener o renovar su certificaci&oacute;n Microsoft. Capac&iacute;tese con cursos oficiales que cumplen con los est&aacute;ndares internacionales exigidos por Microsoft.</p>\r\n\r\n<p>Actualmente contamos con las distintas certificaciones en Microsoft:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"font-size:10px\"><a href=\"https://www.microsoft.com/learning/es-es/mos-certification.aspx\" target=\"_blank\">CERTIFICATION MICROSOFT OFFICE SPECIALIST (MOS)</a></span></h3>\r\n	</li>\r\n	<li>\r\n	<h3><span style=\"font-size:10px\"><a href=\"https://www.microsoft.com/learning/es-es/mta-certification.aspx\" target=\"_blank\">CERTIFICACI&Oacute;N MICROSOFT THECNOLOGY ASOCCIATE (MTA)</a></span></h3>\r\n	</li>\r\n</ul>\r\n', '08082017225842.jpg', '2017-08-09 03:58:22', '2017-08-09 03:58:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `respuesta` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_r` date NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `respuesta_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `descripcion`, `fecha`, `respuesta`, `fecha_r`, `users_id`, `respuesta_id`, `created_at`, `updated_at`) VALUES
(1, 'Hola, buenas tardes, podrías decirme si cuentas con una batería para este número de parte: 756478-421 (4IC19/66). Es una HP Envy Core i5 ', '2017-08-15', 'Hola GMLAVALE gracias por preguntar, Si lo tenemos en stock, el precio es de S/.130 . Antes de pulsar el botón Comprar asegúrese de poder concretar su compra. Cualquier otra consulta estamos a su disposición, esperamos que te animes a comprar, para que le lleguen nuestros datos exactos, y poder coordinar el envío o retiro del producto por nuestro local, como referencia estamos por el Centro Civico, zona de Wilson, nuestro horario de atención es de Lunes a Sábado de 10 a 7pm, horario corrido. Muchas gracias por su consulta. BETABYTE PERU 14/8/2017 15:45 ', '2017-08-16', 9, 1, '2017-08-15 05:00:00', '2017-08-15 05:00:00'),
(2, 'Hasta cuanto lo deja ', '2017-08-15', 'El precio no es negociable, somos tienda.', '2017-08-15', 9, 1, '2017-08-15 05:00:00', '2017-08-15 05:00:00'),
(9, '70 y te la compro con dinero en mano agradecería me la venda a mi ya que yo soy un estudiante y no cuento con economia para una gran laptop , saludos cordiales', '2017-08-16', '', '0000-00-00', 1, 0, '2017-08-17 04:57:11', '2017-08-17 04:57:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_cursos`
--

CREATE TABLE `comentarios_cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `comentarios_id` int(10) UNSIGNED NOT NULL,
  `cursos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios_cursos`
--

INSERT INTO `comentarios_cursos` (`id`, `comentarios_id`, `cursos_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2017-08-15 05:00:00', '2017-08-15 05:00:00'),
(2, 2, 8, '2017-08-15 05:00:00', '2017-08-15 05:00:00'),
(9, 9, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1',
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio1` decimal(10,2) NOT NULL,
  `tipo_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `monto_desc` decimal(10,2) NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `dirigido` text COLLATE utf8_unicode_ci NOT NULL,
  `finalizado` text COLLATE utf8_unicode_ci NOT NULL,
  `acreditaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categorias_id` int(10) UNSIGNED NOT NULL,
  `tipos_id` int(10) UNSIGNED NOT NULL,
  `silabo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bolita` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Desactivado',
  `relevancia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `activo`, `titulo`, `precio1`, `tipo_desc`, `monto_desc`, `descripcion_corta`, `descripcion`, `dirigido`, `finalizado`, `acreditaciones`, `created_at`, `updated_at`, `categorias_id`, `tipos_id`, `silabo`, `bolita`, `relevancia`) VALUES
(1, 1, 'Especialista en EXCEL', '874.00', 'porcentaje', '50.00', 'El curso de Especialista en Excel te capacita en el manejo especializado de hojas de cálculo utilizando Microsoft Office Excel 2013. El curso tiene como objetivo dominar las competencias máximas de Excel', '<p>El curso de&nbsp;<strong>Especialista en Excel</strong>&nbsp;te capacita en el manejo especializado de hojas de c&aacute;lculo utilizando Microsoft Office Excel 2013. El curso tiene como objetivo dominar las competencias m&aacute;ximas de Excel, desde conceptos b&aacute;sicos en el manejo de celda, hoja y libros, hasta conceptos avanzados en el manejo de insertar y trabajar con diferentes tipos de datos, crear formulas, trabajar con rangos de datos, insertar funciones, crear e interactuar con gr&aacute;ficos estad&iacute;sticos, y aplicar las funciones financieras de Excel.</p>\r\n\r\n<h3>REQUISITOS PREVIOS</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Conocimientos b&aacute;sicos de Windows a nivel de usuario.</li>\r\n</ul>\r\n\r\n<p>El programa se encuentra estructurado en sesiones te&oacute;rico-pr&aacute;cticas, donde se propicia la participaci&oacute;n de los alumnos en cada clase, ya sea compartiendo experiencias de su contexto laboral como desarrollando laboratorios del tema dise&ntilde;ados para consolidar el aprendizaje. Como recurso de ense&ntilde;anza, cada alumno cuenta con una computadora de uso personal; material educativo digital que consta de las sesiones del curso, laboratorios, tareas, diapositivas de cada tema, lecturas de apoyo y videos.</p>\r\n\r\n<table border=\"2\">\r\n	<tbody>\r\n		<tr>\r\n			<th>CAPACIDAD TERMINAL</th>\r\n			<th>CRITERIOS DE EVALUACI&Oacute;N</th>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"5\">Desarrollo de aplicaciones de escritorio usando componentes y librer&iacute;as especializadas en Java. Fundamentos del lenguaje</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Programaci&oacute;n Orientada a Objetos</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Patrones de dise&ntilde;o de software</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Excepciones y Aserciones</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hilos y Concurrencia</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<p>P&uacute;blico en general que desee adquirir conocimientos de Excel 2013, principalmente orientado a personas en el rubro de negocios, ingenier&iacute;a y empresas. Estudiantes y profesionales de las carreras de administraci&oacute;n de empresas, econom&iacute;a, contabilidad, negocios internacionales, ingenier&iacute;as y cualquier otra profesi&oacute;n donde se desee aplicar el uso de hojas de c&aacute;lculo utilizando Microsoft Office Excel 2013.</p>\r\n', '<ul>\r\n	<li>Crear y usar hojas de c&aacute;lculo, Crear hojas de uso autom&aacute;tico mediante funciones r&aacute;pidas.</li>\r\n	<li>El participante tendr&aacute; la capacidad de manejo de herramientas profesionales de c&aacute;lculo para mejorar su trabajo, espec&iacute;ficamente en labores de gesti&oacute;n bajo un ambiente visual amigable.</li>\r\n	<li>Tendr&aacute; la capacidad de procesar informaci&oacute;n con procesos b&aacute;sicos hasta avanzados lo cual le permitir&aacute; aprovechar al m&aacute;ximo las posibilidades y potencialidades de la hoja electr&oacute;nica de c&aacute;lculo.</li>\r\n	<li>Aprender&aacute; t&eacute;cnicas para la construcci&oacute;n de f&oacute;rmulas y realizaci&oacute;n de an&aacute;lisis para la toma de decisiones en la gesti&oacute;n empresarial.</li>\r\n	<li>Utilizar&aacute; herramientas para an&aacute;lisis de sensibilidad, simulaci&oacute;n, optimizaci&oacute;n con restricciones, administraci&oacute;n de datos y automatizaci&oacute;n de tareas repetitivas.</li>\r\n	<li>Aumentar&aacute; el rendimiento y eficiencia, en la labor cotidiana, aprovechando un gran porcentaje de las herramientas que MS Excel 2013 nos ofrece.</li>\r\n	<li>Potenciar el programa mediante su configuraci&oacute;n &oacute;ptima y la adici&oacute;n o activaci&oacute;n de programas complementarios.</li>\r\n	<li>Desarrollar&aacute; soluciones personalizadas utilizando Macros, haciendo uso del entorno de Visual Basic para Aplicaciones (VBA) con el objetivo de ejecutar tareas repetitivas y realizar macros que ejecuten funciones espec&iacute;ficas.</li>\r\n	<li>Podr&aacute; sistematizar cuadros que permitan obtener datos de pr&eacute;stamos, tasas de inter&eacute;s, capital a amortizar y otros datos de tipo Financiero los cuales le permitir&aacute;n realizar un mejor an&aacute;lisis para su toma de decisi&oacute;n.</li>\r\n</ul>\r\n', '', '2017-08-05 02:49:42', '2017-08-16 02:20:18', 1, 1, 'especialista-en-excelpdfh5fwo.pdf', 'Oferta', 2),
(5, 1, 'Especialista en OFIMÁTICA', '604.00', 'porcentaje', '10.00', 'El curso de Ofimática Empresarial está orientado a todas aquellas personas interesadas en adquirir los conocimientos necesarios de las principales herramientas de software para la productividad estudiantil, laboral y empresarial.', '<p>El curso de&nbsp;<strong>Ofim&aacute;tica Empresarial</strong>&nbsp;est&aacute; orientado a todas aquellas personas interesadas en adquirir los conocimientos necesarios de las principales herramientas de software para la productividad estudiantil, laboral y empresarial.</p>\r\n\r\n<p>Este curso te ense&ntilde;ara el manejo de solucionar procesos de informaci&oacute;n desde los conocimientos b&aacute;sicos en el manejo de sistemas Operativos, redacci&oacute;n de documentos, presentaci&oacute;n de diapositivas, manejo de hojas de c&aacute;lculo desde un nivel b&aacute;sico, hasta un nivel avanzado.</p>\r\n\r\n<h3>REQUISITOS PREVIOS</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Buen manejo del mouse y del teclado.</li>\r\n</ul>\r\n', '<p>P&uacute;blico en General que desee aprender los conocimientos de inform&aacute;tica b&aacute;sica, alumnos de computaci&oacute;n e inform&aacute;tica, personas y profesionales que necesiten actualizar sus conocimientos de computaci&oacute;n con la finalidad de manejar las herramientas tecnol&oacute;gicas que son cada vez m&aacute;s necesarias dentro de las labores cotidianas de todo profesional.</p>\r\n', '<ul>\r\n	<li>Operar el Sistema Operativo Windows nivel usuario.</li>\r\n	<li>Configurar Utilitarios para la optimizaci&oacute;n y mejor uso de la PC.</li>\r\n	<li>Tendr&aacute; la capacidad de procesar informaci&oacute;n con procesos b&aacute;sicos hasta avanzados lo cual le permitir&aacute; aprovechar al m&aacute;ximo las posibilidades y potencialidades de la hoja electr&oacute;nica de c&aacute;lculo.</li>\r\n	<li>Administrar su Informaci&oacute;n y Software de forma ordenada y personalizada.</li>\r\n	<li>Ingresar y configurar de forma adecuada la interfaz del Software de Redacci&oacute;n.</li>\r\n	<li>Aplicar formatos y apariencia personalizada de manera creativa y profesional al texto.</li>\r\n	<li>Manipular objetos como: tablas, im&aacute;genes, autoformas, diagramas de flujo, etc., de forma creativa y personalizada.</li>\r\n	<li>Administrar sus documentos e imprimirlos.</li>\r\n	<li>Configurar Microsoft PowerPoint 2013.</li>\r\n	<li>Elaborar diapositivas de forma creativa en innovadora aplic&aacute;ndole efectos de colores, movimiento y transici&oacute;n que hagan de su presentaci&oacute;n un importante material Audiovisual.</li>\r\n	<li>Realizar c&aacute;lculos n&uacute;meros y funciones principales a trav&eacute;s de Excel 2013.</li>\r\n	<li>Sistematizar el procesamiento de informaci&oacute;n l&oacute;gico matem&aacute;tica para obtener datos que permitan realizar mejor toma de decisi&oacute;n.</li>\r\n	<li>Crear y manipular tablas y gr&aacute;ficos din&aacute;micos que permitan procesar informaci&oacute;n de forma r&aacute;pida y clara.</li>\r\n</ul>\r\n', '', '2017-08-05 22:35:39', '2017-08-15 05:18:13', 1, 1, 'especialista-en-ofimaticapdfy5plk.pdf', 'Desactivado', 1),
(6, 1, 'Especialista en MS PROJECT', '250.00', '', '0.00', 'Facilite la administración de los proyectos, trabaje en equipo y tome decisiones óptimas.', '<p>El curso&nbsp;<strong>PLANEAMIENTO Y CONTROL DE PROYECTOS CON MS PROJECT,</strong>&nbsp;se desarrolla a trav&eacute;s del marco de referencia propuesto por el PMBOK&reg; permite realizar la integraci&oacute;n y la gesti&oacute;n del alcance, tiempos, costos y el manejo de la &eacute;tica y la responsabilidad social en un proyecto, los participantes desarrollaran los planes de gesti&oacute;n del proyecto que ser&aacute;n presentados y expuestos al final del m&oacute;dulo. Este curso pretende proporcionar los conocimientos del programa MS Project, como herramienta de aplicaci&oacute;n en la administraci&oacute;n de proyectos y las labores asociadas a esta disciplina.</p>\r\n\r\n<h3>REQUISITOS PREVIOS</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Conocimientos b&aacute;sicos de Windows a nivel usuario.</li>\r\n</ul>\r\n', '<p>P&uacute;blico en general, estudiantes de ingenier&iacute;a, negocios y cualquier carrera involucrada en la gesti&oacute;n de proyectos, personas que desee iniciarse en el manejo de Microsoft Project como herramienta en la administraci&oacute;n de proyectos.</p>\r\n', '<p>El curso tiene como objetivo preparar a los participantes en los conceptos, t&eacute;cnicas y herramientas de gesti&oacute;n de proyectos utilizando el marco de referencia y las buenas pr&aacute;cticas propuestas en el Project Management Body Of Knowledge PMBOK&copy; del Project Management Institute&reg;, permite realizar la integraci&oacute;n, la gesti&oacute;n del alcance, la gesti&oacute;n de tiempos, la gesti&oacute;n de costos y el manejo de la &eacute;tica y la responsabilidad social en un proyecto.</p>\r\n', '', '2017-08-08 04:14:24', '2017-08-09 07:11:41', 1, 1, '', 'Desactivado', 3),
(7, 1, 'Especialista en S10', '300.00', '', '0.00', 'Asigne a sus proyectos los costos y presupuestos de forma lógica y adecuada.\r\n\r\nMás información\r\n\r\n', '<p>El curso de&nbsp;<strong>COSTOS Y PRESUPUESTOS CON S10</strong>&nbsp;corresponde al grupo de programas especializados que requieren los de Proyectos de Inversi&oacute;n, Gerencia de Proyectos, Consultor&iacute;as y/o obra, desarrollo y control, permitiendo al usuario manejar la parte econ&oacute;mica de un proyecto, incluso para concursos de licitaciones de diferente tipo, ya que se pueden confeccionar plataforma de trabajo, conformada por hojas de presupuestos con an&aacute;lisis de costos unitarios, uso de doble moneda y f&oacute;rmula polin&oacute;mica, tambi&eacute;n permite generar reportes detallados de un presupuesto, el curso de S10 cuenta con una base de datos en SQL Server con &iacute;tems destinados al campo de la construcci&oacute;n y otras actividades, pero con la peculiaridad y facilidad de poderse modificar, incrementar y personalizar seg&uacute;n la especialidad del usuario. Se aplica a proyectos, obras y/o consultor&iacute;as privadas y p&uacute;blicas.</p>\r\n\r\n<h3>REQUISITOS PREVIOS</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Conocimientos b&aacute;sicos de Windows a nivel usuario.</li>\r\n</ul>\r\n', '<p>Todos aquellos empresarios, profesionales, estudiantes, t&eacute;cnicos y p&uacute;blico en general que requieran elaborar, formular y controlar la parte econ&oacute;mica de una consultor&iacute;a, proyecto y/o obra de cualquier &iacute;ndole, ya que se trabaja con rendimientos reales, lo cual nos permite obtener costos reales, para un especifico lugar y fecha.</p>\r\n', '<ul>\r\n	<li>Proporcionar conocimientos y m&eacute;todos para la elaboraci&oacute;n de presupuesto de cualquier tipo de obra.</li>\r\n	<li>El curso est&aacute; orientado a ense&ntilde;ar al alumno a crear un presupuesto de un proyecto de Ingenier&iacute;a con an&aacute;lisis de costos unitarios, f&oacute;rmula polin&oacute;mica y tambi&eacute;n permitir generar reportes detallados de un presupuesto.</li>\r\n	<li>Elaborar, formular y controlar la parte econ&oacute;mica de un proyecto u obra de cualquier campo profesional.</li>\r\n</ul>\r\n', '', '2017-08-08 04:17:53', '2017-08-08 04:19:04', 1, 1, '', 'Desactivado', 3),
(8, 1, 'Especialista en AutoCAD', '695.00', '', '0.00', 'Cree increíble diseños en 2D y 3D gracias al software de AutoCAD, lleve su creatividad e imaginación a niveles superlativos en diseño e ingeniería.', '<p>Dise&ntilde;e y de forma al mundo alrededor de usted con las ponderosas, e interconectadas herramientas de Autodesk. AutoCAD&reg; es el software l&iacute;der de dise&ntilde;o 2D y 3D en el mundo. Con poderosas herramientas de dise&ntilde;o 2D que lo convirtieron pr&aacute;cticamente en un est&aacute;ndar mundial para la creaci&oacute;n de planos y con robustas herramientas 3D que le permiten crear pr&aacute;cticamente cualquier forma imaginable, Con el curso de&nbsp;<strong>Especialista en AutoCAD</strong>&nbsp;lo ayuda a crear impresionantes dise&ntilde;os. Le ofrece innovaciones que lo pueden ayudar a incrementar la eficiencia del dise&ntilde;o y la velocidad para generar la documentaci&oacute;n del mismo, y le permite compartir m&aacute;s f&aacute;cilmente sus dise&ntilde;os con los profesionales y clientes con los que interact&uacute;a.</p>\r\n\r\n<p>Mayor productividad a trav&eacute;s de herramientas avanzadas de dise&ntilde;o asistido que permiten modelar en 2D y 3D e interactuar f&aacute;cilmente con otras plataformas.</p>\r\n\r\n<p>Contin&uacute;e su trabajo cuando este fuera de la oficina, conect&aacute;ndose a la nube para acceder a sus dise&ntilde;os, inclusive usando su dispositivo m&oacute;vil, logre as&iacute; mejores negocios y/o aumentar su productividad. Con estas funcionalidades y m&aacute;s, AutoCAD, le proporciona el poder y la flexibilidad que usted necesita para llevar la documentaci&oacute;n y sus dise&ntilde;o m&aacute;s lejos.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>REQUISITOS PREVIOS</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Conocimientos b&aacute;sicos de Windows a nivel de usuario.</li>\r\n</ul>\r\n', '<p>P&uacute;blico en general, estudiantes de ingenier&iacute;a, ingenieros, arquitectos, dibujantes t&eacute;cnicos, estudiantes y en general a toda persona involucrada en el campo del Dise&ntilde;o en General y/o Dibujo para ingenier&iacute;a.</p>\r\n', '<ul>\r\n	<li><strong>Objetivo AutoCAD 2D:</strong></li>\r\n</ul>\r\n\r\n<p>Brindar al participante las herramientas m&aacute;s innovadoras incorporadas en el nuevo AutoCAD 2015 para el desarrollo de sus proyectos profesionales 2D. Desarrolle r&aacute;pidamente documentaci&oacute;n t&eacute;cnica como: planos en planta, cortes, elevaciones, isometr&iacute;as y detalles, utilizando una metodolog&iacute;a exclusiva en el curso. T&eacute;cnicas avanzadas de configuraci&oacute;n de ploteo o impresi&oacute;n, herramientas de Internet con AutoCAD 2015, Herramientas de Conjunto de Planos.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Objetivo AutoCAD 3D:</strong></li>\r\n</ul>\r\n\r\n<p>Domine las nuevas herramientas de desarrollo de modelos 3D con las innovadoras capacidades incorporadas en AutoCAD 2015 Los comandos y las paletas de herramientas 3D han sido renovadas completamente, para otorgarle al dise&ntilde;ador 3D un mejor control desde la creaci&oacute;n hasta la presentaci&oacute;n de sus proyectos. Este un paso adelante de sus competidores utilizando las m&aacute;s innovadoras herramientas 3D. t&eacute;cnicas avanzadas de configuraci&oacute;n de ploteo o impresi&oacute;n, herramientas de Internet con AutoCAD 2015, Herramientas de Conjunto de Planos.</p>\r\n\r\n<ul>\r\n</ul>\r\n', '', '2017-08-08 04:21:29', '2017-08-09 19:55:42', 2, 1, 'especialista-en-autocadpdfnjt1m.pdf', 'Desactivado', 1),
(12, 1, 'Especialista en AUTOCAD CIVIL 3D', '615.00', '', '0.00', 'Aplique a sus diseños de infraestructura el mejor rendimiento de los proyectos 3D, a mantener datos y procesos más coherentes, mayor rapidez ante los cambios.', '<p><strong>AutoCAD Civil 3D</strong>&nbsp;es una soluci&oacute;n de dise&ntilde;o y documentaci&oacute;n para el &aacute;rea de ingenier&iacute;a que soporta el flujo de trabajo de la&nbsp;<strong>tecnolog&iacute;a BIM.</strong></p>\r\n\r\n<p>Ayuda a ingenieros civiles, dibujantes t&eacute;cnicos y especialistas afines a tener un mejor entendimiento de la performance de los proyectos, mejorando y manteniendo el procesamiento de datos del trabajo realizado de forma consistente; adem&aacute;s de permitir visualizar los cambios del dise&ntilde;o, todo en entorno de&nbsp;<strong>AutoCAD.</strong></p>\r\n\r\n<p><strong>Surface modeling,</strong>&nbsp;AutoCAD Civil 3D cuenta con herramientas avanzadas para la creaci&oacute;n din&aacute;mica y an&aacute;lisis de superficies.Adicionalmente el usuario puede mejorar sus procesos de dise&ntilde;o en actividades que consumen mucho tiempo, usando procesos propios y&nbsp;<strong>herramientas espec&iacute;ficas de AutoCAD Civil 3D</strong>&nbsp;con est&aacute;ndares de<strong>dise&ntilde;o personalizables</strong>&nbsp;tales como&nbsp;<strong>Survey,CorridorDesign, Parcel, Pipes y Grading.</strong></p>\r\n\r\n<p>Con&nbsp;<strong>AutoCAD Civil 3D</strong>&nbsp;lograr&aacute; conocer mejor el estado actual de los proyectos, mantener datos y procesos m&aacute;s coherentes gracias a los&nbsp;<strong>modelados inteligentes en 3D</strong>&nbsp;de obras de&nbsp;<strong>ingenier&iacute;a civil</strong>, y a responder con mayor rapidez ante los cambios gracias a su entorno intuitivo y objetos inteligentes de actualizaci&oacute;n din&aacute;mica.</p>\r\n\r\n<h3>REQUISITOS PREVIOS</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Conocimientos b&aacute;sicos de Windows a nivel usuario.</li>\r\n</ul>\r\n', '<p>Al finalizar el curso, el participante trabajar&aacute; con&nbsp;<strong>datos de topograf&iacute;a</strong>, crear&aacute; superficies de&nbsp;<strong>terreno, plataformas, perfiles, modelado de carreteras y canales, redes de tuber&iacute;a, lotizaciones, etc.</strong>&nbsp;Podr&aacute; as&iacute; crear modelos, los cuales visualizar&aacute; y analizar&aacute; con el fin de comprobar el comportamiento de los mismos antes de ser construidos.</p>\r\n', '<p>Actualmente la competitividad t&eacute;cnica y profesional hace necesario que se manejen las tecnolog&iacute;as m&aacute;s desarrolladas para poder generar, analizar, manejar la informaci&oacute;n requerida y tomar las mejores decisiones en las diferentes etapas de un proyecto para que sea exitoso.&nbsp;<strong>AutoCAD Civil 3D 2015</strong>&nbsp;es la herramienta adecuada que automatizar&aacute; los procesos de dise&ntilde;o en el trabajo de ingenier&iacute;a civil, logrando los mejores resultados durante la vida del proyecto.</p>\r\n', '', '2017-08-09 19:56:34', '2017-08-09 20:00:20', 2, 1, 'especialista-en-s10pdfubgyg.pdf', 'Desactivado', 2),
(13, 1, 'Especialista en JAVA', '615.00', '', '0.00', 'En la actualidad el lenguaje orientado a objetos más utilizado en el desarrollo de aplicaciones de ámbito empresarial, e incluye una gran cantidad de funcionalidades.', '<p>Java es un lenguaje de programaci&oacute;n Orientado a Objetos (POO), creado por Sun Microsystems en 1995 y adquirida por Oracle en el 2009. Actualmente, es uno de los lenguajes m&aacute;s difundidos y utilizando dentro del mundo de desarrollo de aplicaciones empresariales; es robusto, seguro, de arquitectura neutra, portable, de altas prestaciones, multitarea y din&aacute;mico. Permite un crecimiento modular mediante la utilizaci&oacute;n de teor&iacute;as de programaci&oacute;n orientada a objetos, aplicaci&oacute;n de est&aacute;ndares, buenas pr&aacute;cticas y marcos de trabajo que facilitan a los desarrolladores su utilizaci&oacute;n.</p>\r\n\r\n<h3>M&Eacute;TODOLOG&Iacute;A</h3>\r\n\r\n<hr />\r\n<p>El programa se encuentra estructurado en sesiones te&oacute;rico-pr&aacute;cticas, donde se propicia la participaci&oacute;n de los alumnos en cada clase, ya sea compartiendo experiencias de su contexto laboral como desarrollando laboratorios del tema dise&ntilde;ados para consolidar el aprendizaje. Como recurso de ense&ntilde;anza, cada alumno cuenta con una computadora de uso personal; material educativo digital que consta de las sesiones del curso, laboratorios, tareas, diapositivas de cada tema, lecturas de apoyo y videos.</p>\r\n\r\n<h3>OBJETIVOS DEL CURSO:</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Comprende los fundamentos para la programaci&oacute;n de aplicaciones.</li>\r\n	<li>Define los conceptos necesarios para implementar una aplicaci&oacute;n.</li>\r\n	<li>Dise&ntilde;a los diagramas de flujo e interpretar la secuencia y soluci&oacute;n.</li>\r\n</ul>\r\n\r\n<h3>BENEFICIOS DE ESTUDIAR EN SYSTEMATIC S.A.C. - JAVA</h3>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Horarios flexibles (tardes, noches o sabatinos)</li>\r\n	<li>Precios especiales en ex&aacute;menes de certificaci&oacute;n con nuestro curso de Java</li>\r\n	<li>Instructores especializados y certificados con amplios conocimientos y experiencia en la entrega de curso de Java a nivel mundial</li>\r\n	<li>Garantizamos aprendizaje de vanguardia a nivel mundial.</li>\r\n</ul>\r\n', '<p>El programa est&aacute; dirigido a:</p>\r\n\r\n<ul>\r\n	<li>Profesionales de Sistemas</li>\r\n	<li>T&eacute;cnicos de Sistemas</li>\r\n	<li>Estudiantes Universitarios</li>\r\n	<li>P&uacute;blico en general interesado</li>\r\n</ul>\r\n', '<p>Este programa provee al participante el conocimiento y las habilidades para iniciarse en el ambiente de la programaci&oacute;n de micro computadoras, proporcionando los fundamentos necesarios para desarrollar, dise&ntilde;ar, representar e implementar algoritmos que le permitan crear aplicaciones bajo un enfoque orientado a objetos y con acceso a bases de datos. Durante el desarrollo del programa, el participante ser&aacute; instruido con las mejores pr&aacute;cticas en la construcci&oacute;n de software mediante la utilizaci&oacute;n del patr&oacute;n MVC, est&aacute;ndar en la industria.</p>\r\n', '', '2017-08-09 20:01:22', '2017-08-09 20:04:18', 4, 1, '', 'Desactivado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_imagenes`
--

CREATE TABLE `cursos_imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagenes_id` int(10) UNSIGNED NOT NULL,
  `cursos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cursos_imagenes`
--

INSERT INTO `cursos_imagenes` (`id`, `imagenes_id`, `cursos_id`, `created_at`, `updated_at`) VALUES
(1, 36, 1, NULL, NULL),
(3, 38, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_modulos`
--

CREATE TABLE `cursos_modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cursos_id` int(10) UNSIGNED NOT NULL,
  `modulos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cursos_modulos`
--

INSERT INTO `cursos_modulos` (`id`, `cursos_id`, `modulos_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 5, 5, NULL, NULL),
(6, 5, 6, NULL, NULL),
(7, 5, 7, NULL, NULL),
(12, 8, 12, NULL, NULL),
(13, 8, 13, NULL, NULL),
(14, 8, 14, NULL, NULL),
(15, 13, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `apellido`, `created_at`, `updated_at`) VALUES
(1, 'Carlos', 'Cabrera Sanchez', '2017-08-13 09:35:40', '2017-08-13 09:35:40'),
(2, 'Brayan', 'Sanchez', '2017-08-13 09:36:02', '2017-08-13 09:36:02'),
(3, 'Juan jose', 'Felipa Uribe', '2017-08-13 09:37:44', '2017-08-13 09:40:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elearning`
--

CREATE TABLE `elearning` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `elearning`
--

INSERT INTO `elearning` (`id`, `titulo`, `html`, `img`, `created_at`, `updated_at`) VALUES
(1, 'E-LEARNING', '<p>Nuestro sistema de capacitaci&oacute;n virtual es innovador y se comporta de manera funcional a trav&eacute;s de un sistema de moderno de ense&ntilde;anza el &ldquo;blended learning&rdquo; la cual exige a nuestros usuarios la interacci&oacute;n de nuestros cursos de manera uniforme en cualquiera de sus modalidades, esta modalidad de ense&ntilde;anza soporta a nuestras tres modalidades de capacitaci&oacute;n</p>\r\n', '08082017220447.jpg', '2017-08-08 23:18:31', '2017-08-09 03:04:47'),
(2, 'MODALIDADES DE CAPACITACIÓN', '<h3>CAPACITACI&Oacute;N PRESENCIAL</h3>\r\n\r\n<p>Permite a nuestros alumnos complementar su ense&ntilde;anza presencial a trav&eacute;s de nuestra aula virtual, con ello, podr&aacute;n compartir recursos, entablar foros de debates, interacci&oacute;n con usu', '08082017182016.jpg', '2017-08-08 23:20:16', '2017-08-08 23:20:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `laboratorios_id` int(10) UNSIGNED NOT NULL,
  `docentes_id` int(10) UNSIGNED NOT NULL,
  `hora_general` time NOT NULL,
  `hora_generalf` time NOT NULL,
  `vacantes` int(10) NOT NULL,
  `lunes` int(11) NOT NULL,
  `lunes_hora` time NOT NULL,
  `lunes_horaf` time NOT NULL,
  `martes` int(11) NOT NULL,
  `martes_hora` time NOT NULL,
  `martes_horaf` time NOT NULL,
  `miercoles` int(11) NOT NULL,
  `miercoles_hora` time NOT NULL,
  `miercoles_horaf` time NOT NULL,
  `jueves` int(11) NOT NULL,
  `jueves_hora` time NOT NULL,
  `jueves_horaf` time NOT NULL,
  `viernes` int(11) NOT NULL,
  `viernes_hora` time NOT NULL,
  `viernes_horaf` time NOT NULL,
  `sabado` int(11) NOT NULL,
  `sabado_hora` time NOT NULL,
  `sabado_horaf` time NOT NULL,
  `domingo` int(11) NOT NULL,
  `domingo_hora` time NOT NULL,
  `domingo_horaf` time NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `modulos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cursos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `laboratorios_id`, `docentes_id`, `hora_general`, `hora_generalf`, `vacantes`, `lunes`, `lunes_hora`, `lunes_horaf`, `martes`, `martes_hora`, `martes_horaf`, `miercoles`, `miercoles_hora`, `miercoles_horaf`, `jueves`, `jueves_hora`, `jueves_horaf`, `viernes`, `viernes_hora`, `viernes_horaf`, `sabado`, `sabado_hora`, `sabado_horaf`, `domingo`, `domingo_hora`, `domingo_horaf`, `fecha_inicio`, `fecha_fin`, `modulos_id`, `created_at`, `updated_at`, `cursos_id`) VALUES
(1, 1, 1, '12:00:00', '14:00:00', 0, 1, '12:00:00', '14:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '2017-08-01', '2017-08-31', 5, '2017-08-15 02:56:11', '2017-08-15 03:52:38', 5),
(2, 2, 1, '15:00:00', '17:00:00', 30, 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '2017-08-01', '2017-08-31', 6, '2017-08-15 03:36:34', '2017-08-15 04:39:31', 5),
(3, 2, 1, '15:00:00', '17:00:00', 0, 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '2017-09-01', '2017-09-30', 6, '2017-08-15 03:43:06', '2017-08-15 03:43:06', 5),
(4, 2, 1, '15:00:00', '17:00:00', 0, 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '2017-10-01', '2017-10-31', 6, '2017-08-15 03:43:49', '2017-08-15 03:52:16', 5),
(5, 2, 1, '10:00:00', '13:00:00', 23, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '10:00:00', '13:00:00', 1, '10:00:00', '13:00:00', '2017-08-15', '2017-09-30', 0, '2017-08-15 20:41:35', '2017-08-15 20:41:35', 12),
(6, 1, 1, '16:00:00', '18:00:00', 25, 1, '16:00:00', '18:00:00', 0, '00:00:00', '00:00:00', 1, '16:00:00', '18:00:00', 0, '00:00:00', '00:00:00', 1, '16:00:00', '18:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '2017-08-15', '2017-09-15', 6, '2017-08-16 02:08:58', '2017-08-16 02:08:58', 5),
(7, 1, 1, '12:00:00', '14:00:00', 34, 1, '12:00:00', '14:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '2017-09-01', '2017-09-29', 5, '2017-08-16 02:10:59', '2017-08-16 02:10:59', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `ruta`, `created_at`, `updated_at`) VALUES
(16, '26072017180300.jpg', '2017-07-26 23:03:00', '2017-07-26 23:03:00'),
(17, '27072017002004.jpg', '2017-07-27 05:20:05', '2017-07-27 05:20:05'),
(18, 'lab9.jpg', '2017-07-29 05:00:00', '2017-07-29 05:00:00'),
(21, 'lab12.jpg', '2017-07-29 05:00:00', '2017-07-29 05:00:00'),
(26, '30072017082924.jpg', '2017-07-30 13:29:24', '2017-07-30 13:29:24'),
(27, '01082017202001.jpg', '2017-08-02 01:20:01', '2017-08-02 01:20:01'),
(32, '03082017223711.jpg', '2017-08-04 03:37:11', '2017-08-04 03:37:11'),
(33, '03082017223719.jpg', '2017-08-04 03:37:19', '2017-08-04 03:37:19'),
(34, '04082017162234.jpg', '2017-08-04 21:22:34', '2017-08-04 21:22:34'),
(35, '04082017181505.jpg', '2017-08-04 23:15:05', '2017-08-04 23:15:05'),
(36, '05082017153823.jpg', '2017-08-05 20:38:23', '2017-08-05 20:38:23'),
(38, '09082017150915.jpg', '2017-08-09 20:09:15', '2017-08-09 20:09:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_infraestructura`
--

CREATE TABLE `imagenes_infraestructura` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagenes_id` int(10) UNSIGNED NOT NULL,
  `infraestructura_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes_infraestructura`
--

INSERT INTO `imagenes_infraestructura` (`id`, `imagenes_id`, `infraestructura_id`, `created_at`, `updated_at`) VALUES
(9, 26, 5, NULL, NULL),
(10, 27, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_modulos`
--

CREATE TABLE `imagenes_modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagenes_id` int(10) UNSIGNED NOT NULL,
  `modulos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_nosotros`
--

CREATE TABLE `imagenes_nosotros` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagenes_id` int(10) UNSIGNED NOT NULL,
  `nosotros_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes_nosotros`
--

INSERT INTO `imagenes_nosotros` (`id`, `imagenes_id`, `nosotros_id`, `created_at`, `updated_at`) VALUES
(16, 16, 1, NULL, NULL),
(17, 17, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraestructura`
--

CREATE TABLE `infraestructura` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `infraestructura`
--

INSERT INTO `infraestructura` (`id`, `titulo`, `html`, `created_at`, `updated_at`) VALUES
(5, 'NUESTRA INFRAESTRUCTURA', '<p>Nuestros laboratorios son los m&aacute;s modernos de la regi&oacute;n Ica, antis&iacute;smicos, cuentan con PC&rsquo;S de &uacute;ltima generaci&oacute;n, monitores de 23&rdquo; con DVI para explotar al m&aacute;ximo su resoluci&oacute;n, aire acondicionado, proyector multimedia, sonido ac&uacute;stico, sillas y mesas ergon&oacute;micas.</p>\r\n', '2017-07-30 13:09:42', '2017-07-30 13:09:42'),
(6, 'NUESTRA METODOLOGÍA', '<p>Nuestros capacitadores, validan sus conocimientos y habilidades a trav&eacute;s de ex&aacute;menes de certificaci&oacute;n internacional por medio CERTIPORT (Socio estrat&eacute;gico y Partnet de Systematic en ex&aacute;menes de certificaci&oacute;n internacional) del mismo modo, son evaluados constantemente a trav&eacute;s de nuestra &aacute;rea de&nbsp;<strong>Gesti&oacute;n Humana</strong>&nbsp;con ex&aacute;menes de 360&deg; y evaluaciones pedag&oacute;gicas, para alcanzar la mayor satisfacci&oacute;n y mejor experiencia de nuestros clientes.</p>\r\n', '2017-07-30 13:10:36', '2017-07-30 13:10:36'),
(7, 'NUESTROS ALUMNOS', '<p>Paso a paso, nuestros alumnos son capacitados y orientados en nuestros distintos cursos, con ejemplos y casu&iacute;sticas reales que le permiten aplicar lo aprendido en el campo laboral y estudiantil, la exigencia y competitividad al tener cono nota m&iacute;nima aprobatoria para la certificaci&oacute;n de 14, a su vez utilizan recursos tecnol&oacute;gicos como aula virtual e intranet.</p>\r\n', '2017-07-30 13:12:21', '2017-07-30 13:12:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE `laboratorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`id`, `titulo`, `descripcion`, `ubicacion`, `capacidad`, `created_at`, `updated_at`) VALUES
(1, 'Laboratorio 1', '', '', 25, '2017-08-13 08:31:07', '2017-08-13 08:31:07'),
(2, 'Laboratorio 2', '', '', 23, '2017-08-13 08:32:17', '2017-08-13 08:52:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdatos`
--

CREATE TABLE `mdatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mdatos`
--

INSERT INTO `mdatos` (`id`, `titulo`, `descripcion`, `created_at`, `updated_at`) VALUES
(8, 'DESCRIPCIÓN DEL MÓDULO', '<p>La realizaci&oacute;n de este m&oacute;dulo capacitar&aacute; al alumno, para la gesti&oacute;n avanzada de hojas de c&aacute;lculo, tales como la aplicaci&oacute;n de todo tipo de funciones y operaciones realizadas con los datos, el uso de tablas din&', '2017-08-05 20:29:27', '2017-08-05 20:29:27'),
(9, 'UNA VEZ FINALIZADO EL MÓDULO II, EL ALUMNO SERÁ CAPAZ DE:', '<ul>\r\n	<li>Aplicar las funciones Avanzadas de Excel.</li>\r\n	<li>Hacer uso de las referencias, enlaces e hiperv&iacute;nculos. Compartir libros en una red.</li>\r\n	<li>Mostrar el uso de las herramientas de evaluaci&oacute;n y an&aacute;lisis como Tablas de ', '2017-08-05 20:29:38', '2017-08-05 20:29:38'),
(10, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-05 20:29:46', '2017-08-05 20:29:46'),
(11, 'DESCRIPCIÓN DEL MÓDULO', '<p>Excel con Aplicaciones en VBA es una adaptaci&oacute;n del conocido lenguaje de programaci&oacute;n Visual Basic incluida dentro de la aplicaci&oacute;n Microsoft Office Excel. Su uso es para programar aplicaciones dentro de un libro de Excel, permitie', '2017-08-05 20:31:23', '2017-08-05 20:31:23'),
(12, 'UNA VEZ FINALIZADO EL MÓDULO III, EL ALUMNO SERÁ CAPAZ DE:', '<p>Al finalizar el m&oacute;dulo, el alumno ser&aacute; capaz de automatizar sus actividades a trav&eacute;s de la programaci&oacute;n en VBA para Excel, mediante el an&aacute;lisis de los diferentes tipos de macros y la pr&aacute;ctica de los m&eacute;to', '2017-08-05 20:31:33', '2017-08-05 20:31:33'),
(13, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-05 20:31:45', '2017-08-05 20:31:45'),
(14, 'DESCRIPCIÓN DEL MÓDULO', '<p>Excel, hoy en d&iacute;a, es la herramienta m&aacute;s utilizada en las organizaciones para realizar diversos an&aacute;lisis cuantitativos. El an&aacute;lisis financiero implica muchas veces el buen manejo de esta herramienta, debido a su versatilidad', '2017-08-05 20:32:49', '2017-08-05 20:32:49'),
(15, 'UNA VEZ FINALIZADO EL MÓDULO IV, EL ALUMNO SERÁ CAPAZ DE:', '<ul>\r\n	<li>Desarrollar mediante casos pr&aacute;cticos las funciones financieras.</li>\r\n	<li>Aplicar las funciones y las herramientas de an&aacute;lisis estad&iacute;stico.</li>\r\n	<li>Desarrollar an&aacute;lisis con bases de datos externas.</li>\r\n	<li>Cal', '2017-08-05 20:32:58', '2017-08-05 20:32:58'),
(16, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-05 20:33:05', '2017-08-05 20:33:05'),
(17, 'DESCRIPCIÓN DEL MÓDULO', '<p>El m&oacute;dulo de Windows 8 le ofrece la posibilidad de aprender el manejo del sistema operativo de una forma f&aacute;cil y amena. Windows 8 prepara al alumno para utilizar las funciones b&aacute;sicas del sistema operativo Windows en cualquier computadora. Con el curso de iniciaci&oacute;n a Windows 8 se aprende a trabajar eficazmente en el entorno de escritorio de Windows 8, as&iacute; como de administrar y organizar archivos y directorios/carpetas, adem&aacute;s de copiar, mover y borrar elementos.</p>\r\n\r\n<p>Word, prepara al alumno para los conocimientos de redacci&oacute;n de documentos a trav&eacute;s de un procesador de textos con esta herramienta podr&aacute; realizar cartas, informes, solicitudes memor&aacute;ndums o cualquier tipo de redacci&oacute;n en un entorno f&aacute;cil y amigable. Power Point 2007 te permite crear o preparar una presentaci&oacute;n de un trabajo o proyecto a trav&eacute;s de diapositivas que mejoraran la exposici&oacute;n y organizaci&oacute;n de tus ideas a trav&eacute;s de textos, im&aacute;genes y efectos.</p>\r\n', '2017-08-05 22:40:59', '2017-08-08 02:49:47'),
(18, 'UNA VEZ FINALIZADO EL MÓDULO, EL ALUMNO SERÁ CAPAZ DE:', '<hr />\r\n<p>Conocer la nueva interfaz de Windows, Word y Power Point 2013, las nuevas caracter&iacute;sticas y sobre todo el uso de las nuevas tecnolog&iacute;as autom&aacute;ticas Realizar un uso adecuado y coherente del procesador de textos Word con la finalidad de la elaborar documentos empresariales y profesionales. Elaborar plantillas, modelos y formatos de documentos empresariales, crear, presentar y colaborar en presentaciones que tengan un mayor impacto. Crear diapositivas con gr&aacute;ficos y animaciones.</p>\r\n', '2017-08-05 22:41:12', '2017-08-08 02:49:45'),
(19, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-05 22:41:21', '2017-08-05 22:41:21'),
(20, 'DESCRIPCIÓN DEL MÓDULO', '<p>Excel, es considerada como la hoja de c&aacute;lculo m&aacute;s utilizada tanto en &aacute;mbitos profesionales como dom&eacute;sticos. A trav&eacute;s de este m&oacute;dulo, se facilita mucho la realizaci&oacute;n de todo tipo de c&aacute;lculos con o', '2017-08-05 22:52:13', '2017-08-05 22:52:13'),
(21, 'UNA VEZ FINALIZADO EL MÓDULO II, EL ALUMNO SERÁ CAPAZ DE:', '<ul>\r\n	<li>Crear y usar hojas de c&aacute;lculo.</li>\r\n	<li>Crear hojas de uso autom&aacute;tico mediante funciones r&aacute;pidas.</li>\r\n	<li>Escribir f&oacute;rmulas y usar funciones para automatizar que haceres del negocio.</li>\r\n	<li>Aplicar las nueva', '2017-08-05 22:52:21', '2017-08-05 22:52:21'),
(22, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-05 22:52:29', '2017-08-05 22:52:29'),
(23, 'DESCRIPCIÓN DEL MÓDULO', '<p>La realizaci&oacute;n de este m&oacute;dulo capacitar&aacute; al alumno, para la gesti&oacute;n avanzada de hojas de c&aacute;lculo, tales como la aplicaci&oacute;n de todo tipo de funciones y operaciones realizadas con los datos, el uso de tablas din&', '2017-08-05 22:53:15', '2017-08-05 22:53:15'),
(24, 'UNA VEZ FINALIZADO EL MÓDULO III, EL ALUMNO SERÁ CAPAZ DE:', '<ul>\r\n	<li>Aplicar las funciones Avanzadas de Excel.</li>\r\n	<li>Hacer uso de las referencias, enlaces e hiperv&iacute;nculos. Compartir libros en una red.</li>\r\n	<li>Mostrar el uso de las herramientas de evaluaci&oacute;n y an&aacute;lisis como Tablas de ', '2017-08-05 22:53:24', '2017-08-05 22:53:24'),
(25, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-05 22:53:32', '2017-08-05 22:53:32'),
(32, 'sfdsfdsfdsfsd', '<p>sdfdsfdsfdsfsdfdsfsdfsdfsdfs sdf sdf sdfs fsdf sdf sdf Juanjo</p>\r\n', '2017-08-08 03:34:48', '2017-08-08 03:34:55'),
(33, 'DESCRIPCIÓN', '<p>El curso de&nbsp;<strong>Especialista en Excel</strong>&nbsp;te capacita en el manejo especializado de hojas de c&aacute;lculo utilizando Microsoft Office Excel 2013. El curso tiene como objetivo dominar las competencias m&aacute;ximas de Excel, desde conceptos b&aacute;sicos en el manejo de celda, hoja y libros, hasta conceptos avanzados en el manejo de insertar y trabajar con diferentes tipos de datos, crear formulas, trabajar con rangos de datos, insertar funciones, crear e interactuar con gr&aacute;ficos estad&iacute;sticos, y aplicar las funciones financieras de Excel.</p>\r\n', '2017-08-08 03:42:51', '2017-08-08 03:42:51'),
(39, 'DESCRIPCIÓN DEL MÓDULO', '<p>A trav&eacute;s de este m&oacute;dulo, se facilita mucho la realizaci&oacute;n de todo tipo de c&aacute;lculos con operadores matem&aacute;ticos y funciones simples. Este m&oacute;dulo resultar&aacute; de gran inter&eacute;s para todos aquellos que tengan la necesidad de realizar c&aacute;lculos simples, y quieran para ello utilizar Microsoft Excel. Adem&aacute;s de para todos aquellos, que teniendo ya conocimientos de Excel, deseen ponerse al d&iacute;a de las &uacute;ltimas novedades que introduce la &uacute;ltima versi&oacute;n 2013.</p>\r\n', '2017-08-08 03:56:34', '2017-08-08 03:56:34'),
(40, 'UNA VEZ FINALIZADO EL MÓDULO I, EL ALUMNO SERÁ CAPAZ DE:', '<ul>\r\n	<li>Crear y usar hojas de c&aacute;lculo.</li>\r\n	<li>Crear hojas de uso autom&aacute;tico mediante funciones r&aacute;pidas.</li>\r\n	<li>Escribir f&oacute;rmulas y usar funciones para automatizar que haceres del negocio.</li>\r\n	<li>Aplicar las nuevas caracter&iacute;sticas de listas y tablas.</li>\r\n	<li>Hacer uso de las nuevas funciones estad&iacute;sticas en tablas y filtros.</li>\r\n	<li>Conocer las herramientas de an&aacute;lisis disponibles, su funcionamiento y utilidad.</li>\r\n</ul>\r\n', '2017-08-08 03:56:43', '2017-08-08 03:56:43'),
(41, 'DURACIÓN:', '<ul>\r\n	<li>06 SEMANAS: 36 HORAS CRONOL&Oacute;GICAS</li>\r\n</ul>\r\n', '2017-08-08 03:56:52', '2017-08-08 03:56:52'),
(46, 'DATOS GENERALES', '<p><strong>A&ntilde;o de Vigencia &nbsp;</strong>: 2015</p>\r\n\r\n<p><strong>N&deg; de Horas acad&eacute;micas &nbsp;</strong>: &nbsp;36 Horas</p>\r\n\r\n<p><strong>Duraci&oacute;n &nbsp;</strong>: &nbsp; 6 Semanas</p>\r\n', '2017-08-08 04:24:26', '2017-08-08 04:24:56'),
(47, 'AUTOCAD BÁSICO', '<p>M&oacute;dulo que comprende los fundamentos y temas esenciales del dibujo con AutoCAD, orientado a las personas que se inician en el uso de esta herramienta. Se exploran todos los comandos b&aacute;sicos para la edici&oacute;n, dibujo e impresi&oacute;n. Con este curso, el participante ya estar&aacute; en capacidad de utilizar el AutoCAD en su trabajo, realizando los dise&ntilde;os y dibujos que anteriormente realizaba en papel. El curso est&aacute; dise&ntilde;ado de manera tal que al finalizar, el participante est&eacute; en condiciones de elaborar o modificar planos de dibujo Mec&aacute;nico, El&eacute;ctrico, Minero, Arquitect&oacute;nico, etc. de manera profesional. El curso es 100% pr&aacute;ctico. Se asume que el participante no tiene conocimientos.</p>\r\n', '2017-08-08 04:25:08', '2017-08-08 04:25:08'),
(48, 'OBJETIVOS DEL MÓDULO', '<ul>\r\n	<li>Identificar la metodolog&iacute;a de trabajo con AutoCAD.</li>\r\n	<li>Abrir, visualizar y modificar archivos hechos por otros.</li>\r\n	<li>Hacer planos sencillos.</li>\r\n	<li>Realizar una librer&iacute;a de bloques personal para ir generando tu propia librer&iacute;a de trabajo.</li>\r\n	<li>Imprimir</li>\r\n	<li>Manejar todas las herramientas adecuadas para realizar una documentaci&oacute;n de obra completa.</li>\r\n	<li>Crear estilos de cotas de replanteo y parciales, estando capacitado para acotar el plano completo para diferentes escalas.</li>\r\n	<li>Armar bloques con atributos para optimizar el trabajo, armando r&oacute;tulos con campos editables.</li>\r\n</ul>\r\n', '2017-08-08 04:25:16', '2017-08-08 04:25:16'),
(49, 'DATOS GENERALES', '<p><strong>A&ntilde;o de Vigencia</strong>&nbsp;: 2015</p>\r\n\r\n<p><strong>N&deg; de Horas acad&eacute;micas</strong>&nbsp;: 36 Horas</p>\r\n\r\n<p><strong>Duraci&oacute;n</strong>&nbsp;&nbsp;: 6 Semanas</p>\r\n', '2017-08-08 04:38:57', '2017-08-08 19:52:21'),
(50, 'AUTOCAD AVANZADO', '<p>La realizaci&oacute;n de este m&oacute;dulo capacitar&aacute; al alumno, para la gesti&oacute;n avanzada de hojas de c&aacute;lculo, tales como la aplicaci&oacute;n de todo tipo de funciones y operaciones realizadas con los datos, el uso de tablas din&aacute;micas, opciones de filtro y de ordenaci&oacute;n, y todo un repertorio de instrumentos de an&aacute;lisis de datos, que va a ayudar en gran medida a la toma de decisiones dentro de los diferentes &aacute;mbitos en los que es de aplicaci&oacute;n. As&iacute; como la presentaci&oacute;n ordenada y atractiva de los contenidos de la hoja.</p>\r\n', '2017-08-08 04:39:10', '2017-08-08 04:39:10'),
(51, 'OBJETIVOS DEL MÓDULO', '<ul>\r\n	<li>Aplicar las funciones Avanzadas de Excel.</li>\r\n	<li>Hacer uso de las referencias, enlaces e hiperv&iacute;nculos. Compartir libros en una red.</li>\r\n	<li>Mostrar el uso de las herramientas de evaluaci&oacute;n y an&aacute;lisis como Tablas de datos, Escenarios, Solver, Buscar objetivo.</li>\r\n	<li>Crear tablas din&aacute;micas como herramienta de consolidaci&oacute;n de datos.</li>\r\n	<li>Capacitar en el uso de las principales funciones financieras.</li>\r\n	<li>Mostrar el uso de las macros den la simplificaci&oacute;n de tareas repetitivas.</li>\r\n</ul>\r\n', '2017-08-08 04:39:20', '2017-08-08 04:39:20'),
(52, 'DATOS GENERALES', '<p><strong>A&ntilde;o de Vigencia</strong>&nbsp;: 2015</p>\r\n\r\n<p><strong>N&deg; de Horas acad&eacute;micas</strong>&nbsp;: 36 Horas</p>\r\n\r\n<p><strong>Duraci&oacute;n</strong>&nbsp;: 6 Semanas</p>\r\n', '2017-08-08 04:42:33', '2017-08-08 19:52:44'),
(53, 'AUTOCAD 3D', '<p>El aprendizaje de este importante m&oacute;dulo es eminentemente pr&aacute;ctico, tras una sucinta y directa explicaci&oacute;n se desarrollar&aacute;n ejercicios y trabajos pr&aacute;cticos para obtener el logro tridimensional deseado. El dibujo en tres dimensiones requiere de muchos cambios en la forma de pensar, para quien trabaja &uacute;nicamente en dos dimensiones. Este m&oacute;dulo capacita al usuario a los conceptos y m&eacute;todos del modelado en 3D en AutoCAD. El m&oacute;dulo otorga conocimientos en el nuevo ambiente de AutoCAD 3D, as&iacute; como las herramientas que permiten el modelado y la navegaci&oacute;n en tres dimensiones. Haga realidad su proyecto: piezas, estructuras, motor o herramientas. Realice un video con el recorrido virtual, agregue materiales, luces, sombras. Obtenga las vistas deseadas, y realice cortes.</p>\r\n', '2017-08-08 04:42:46', '2017-08-08 04:42:46'),
(55, 'OBJETIVOS DEL MÓDULO', '<ul>\r\n	<li>Realizar dise&ntilde;o en tres dimensiones.</li>\r\n	<li>Usar las nuevas t&eacute;cnicas de dise&ntilde;o en tres dimensiones.</li>\r\n	<li>Trabajar con los nuevos sistemas UCS en sus proyectos de dise&ntilde;o.</li>\r\n	<li>Generar perspectivas para vistas 3D y renderizados.</li>\r\n	<li>Conocer las nuevas opciones de edici&oacute;n de materiales.</li>\r\n	<li>Conocer las nuevas formas de renderizados.</li>\r\n</ul>\r\n', '2017-08-08 04:44:52', '2017-08-08 04:44:52'),
(56, 'DATOS GENERALES DEL MÓDULO', '<p><strong>A&ntilde;o de Vigencia</strong>:2015</p>\r\n\r\n<p><strong>N&deg; de Horas acad&eacute;micas</strong>:20 Horas</p>\r\n\r\n<p><strong>Requisitos</strong>:Conocimiento b&aacute;sico de programaci&oacute;n</p>\r\n\r\n<p><strong>Duraci&oacute;n</strong>:4 Semanas</p>\r\n', '2017-08-09 20:06:26', '2017-08-09 20:06:26'),
(57, 'FUNDAMENTACIÓN', '<p>El curso de Programaci&oacute;n del Lenguaje Java provee a los estudiantes con una s&oacute;lida base de programaci&oacute;n con Java, que incluye: Informaci&oacute;n acerca del syntax del lenguaje de Programaci&oacute;n Java creando interfaces gr&aacute;ficas de usuario (GUIs), excepciones, archivo input/output (I/O), ensartes y canales. Programas con conceptos object-oriented que pueden aprenderse como para desarrollar aplicaciones de tecnolog&iacute;a Java. El curso muestra la Plataforma Java, Standard Edition 7 (Java SE 7), y utiliza el producto Java SE Development Kit 7 (JDK 7). Los estudiantes har&aacute;n los ejercicios de laboratorio usando en Ambiente de Desarrollo Integrado NetBeans (IDE).</p>\r\n', '2017-08-09 20:06:44', '2017-08-09 20:06:44'),
(58, 'OBJETIVOS DEL MÓDULO', '<ul>\r\n	<li>Crear aplicaciones de Java que eleven las funciones object-oriented del Lenguaje Java, tales como encapsulaci&oacute;n, inheritance y polymorfismo.</li>\r\n	<li>Ejecutar una aplicaci&oacute;n de tecnolog&iacute;a Java desde la l&iacute;nea de comando.</li>\r\n	<li>Usar tipos y expresiones de informaci&oacute;n en tecnolog&iacute;a Java.</li>\r\n	<li>Usar constructores de control de tecnolog&iacute;a Java.</li>\r\n	<li>Usar arrays y otras recolecciones de informaci&oacute;n.</li>\r\n	<li>Implementar t&eacute;cnicas en manejo del error usando excepciones de manejo.</li>\r\n	<li>Crear una interface gr&aacute;fica de event-driven (GUI) usando componentes Swing : paneles, botones, etiquetas, campos de texto, y &aacute;reas de texto.</li>\r\n	<li>Implementar funcionalidades input/output (I/O) para leer desde y escribir para archivos de texto informaci&oacute;n y entender los I/O streams avanzados.</li>\r\n	<li>Crear un simple Protocolo de Transmisi&oacute;n de control/Protocolo de Internet (TCP/IP) que comunique con un servidor a trav&eacute;s de sockets.</li>\r\n	<li>Crear programas multithreaded.</li>\r\n</ul>\r\n', '2017-08-09 20:06:58', '2017-08-09 20:06:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdatos_modulos`
--

CREATE TABLE `mdatos_modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `modulos_id` int(10) UNSIGNED NOT NULL,
  `mdatos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mdatos_modulos`
--

INSERT INTO `mdatos_modulos` (`id`, `modulos_id`, `mdatos_id`, `created_at`, `updated_at`) VALUES
(8, 2, 8, '2017-08-05 15:29:27', '0000-00-00 00:00:00'),
(9, 2, 9, '2017-08-05 15:29:38', '0000-00-00 00:00:00'),
(10, 2, 10, '2017-08-05 15:29:46', '0000-00-00 00:00:00'),
(11, 3, 11, '2017-08-05 15:31:23', '0000-00-00 00:00:00'),
(12, 3, 12, '2017-08-05 15:31:33', '0000-00-00 00:00:00'),
(13, 3, 13, '2017-08-05 15:31:45', '0000-00-00 00:00:00'),
(14, 4, 14, '2017-08-05 15:32:49', '0000-00-00 00:00:00'),
(15, 4, 15, '2017-08-05 15:32:58', '0000-00-00 00:00:00'),
(16, 4, 16, '2017-08-05 15:33:05', '0000-00-00 00:00:00'),
(17, 5, 17, '2017-08-05 17:40:59', '0000-00-00 00:00:00'),
(18, 5, 18, '2017-08-05 17:41:12', '0000-00-00 00:00:00'),
(19, 5, 19, '2017-08-05 17:41:21', '0000-00-00 00:00:00'),
(20, 6, 20, '2017-08-05 17:52:13', '0000-00-00 00:00:00'),
(21, 6, 21, '2017-08-05 17:52:21', '0000-00-00 00:00:00'),
(22, 6, 22, '2017-08-05 17:52:29', '0000-00-00 00:00:00'),
(23, 7, 23, '2017-08-05 17:53:15', '0000-00-00 00:00:00'),
(24, 7, 24, '2017-08-05 17:53:24', '0000-00-00 00:00:00'),
(25, 7, 25, '2017-08-05 17:53:32', '0000-00-00 00:00:00'),
(39, 1, 39, '2017-08-07 22:56:34', '0000-00-00 00:00:00'),
(40, 1, 40, '2017-08-07 22:56:43', '0000-00-00 00:00:00'),
(41, 1, 41, '2017-08-07 22:56:52', '0000-00-00 00:00:00'),
(46, 12, 46, '2017-08-07 23:24:26', '0000-00-00 00:00:00'),
(47, 12, 47, '2017-08-07 23:25:08', '0000-00-00 00:00:00'),
(48, 12, 48, '2017-08-07 23:25:16', '0000-00-00 00:00:00'),
(49, 13, 49, '2017-08-07 23:38:57', '0000-00-00 00:00:00'),
(50, 13, 50, '2017-08-07 23:39:10', '0000-00-00 00:00:00'),
(51, 13, 51, '2017-08-07 23:39:20', '0000-00-00 00:00:00'),
(52, 14, 52, '2017-08-07 23:42:33', '0000-00-00 00:00:00'),
(53, 14, 53, '2017-08-07 23:42:46', '0000-00-00 00:00:00'),
(55, 14, 55, '2017-08-07 23:44:52', '0000-00-00 00:00:00'),
(56, 15, 56, '2017-08-09 15:06:26', '0000-00-00 00:00:00'),
(57, 15, 57, '2017-08-09 15:06:44', '0000-00-00 00:00:00'),
(58, 15, 58, '2017-08-09 15:06:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_29_172341_Create_pagina', 2),
('2017_07_03_213537_create_table_12', 3),
('2017_07_26_151108_create_imagenes', 4),
('2017_07_30_020504_create_table_1', 5),
('2017_08_01_152311_create_table_3', 6),
('2017_08_03_165429_create_table_5', 7),
('2017_08_03_224532_create_Table_6', 8),
('2017_08_10_155141_create_table_7', 9),
('2017_08_14_023625_create_table_8', 10),
('2017_08_15_165957_create_table_9', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `ruta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bolita` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Desactivado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `titulo`, `precio`, `ruta`, `bolita`, `created_at`, `updated_at`) VALUES
(0, 'SIN MODULO', '0.00', '', 'Desactivado', NULL, NULL),
(1, 'Excel BÁSICO', '199.00', '07082017221506.jpg', 'Desactivado', '2017-08-05 20:26:21', '2017-08-08 03:15:06'),
(2, 'Excel AVANZADO', '215.00', '05082017152918.jpg', 'Desactivado', '2017-08-05 20:29:18', '2017-08-05 20:29:18'),
(3, 'Excel MACROS', '230.00', '05082017153112.jpg', 'Desactivado', '2017-08-05 20:31:12', '2017-08-05 20:31:12'),
(4, 'Excel FINANCIERO', '230.00', '05082017153239.jpg', 'Desactivado', '2017-08-05 20:32:39', '2017-08-05 20:32:39'),
(5, 'Windows 8, Word 2013 y Power Point 2013', '190.00', '05082017174049.jpg', 'Desactivado', '2017-08-05 22:40:49', '2017-08-05 22:40:49'),
(6, 'Ofimática Excel Básico', '199.00', '05082017175204.jpg', 'Desactivado', '2017-08-05 22:52:04', '2017-08-05 22:52:04'),
(7, 'Ofimática Excel Avanzado', '215.00', '05082017175306.jpg', 'Desactivado', '2017-08-05 22:53:06', '2017-08-05 22:53:06'),
(12, 'Autocad BASICO', '695.00', '07082017232409.jpg', 'Desactivado', '2017-08-08 04:24:09', '2017-08-08 04:24:09'),
(13, 'Autocad AVANZADO', '230.00', '07082017233834.jpg', 'Desactivado', '2017-08-08 04:38:34', '2017-08-08 04:38:34'),
(14, 'Autocad 3D', '250.00', '07082017234223.jpg', 'Desactivado', '2017-08-08 04:42:23', '2017-08-08 04:42:23'),
(15, 'Java FUNDAMENTOS', '199.00', '09082017150544.jpg', 'Desactivado', '2017-08-09 20:05:45', '2017-08-09 20:05:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_mdatos`
--

CREATE TABLE `modulos_mdatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `modulos_id` int(10) UNSIGNED NOT NULL,
  `mdatos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE `nosotros` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `titulo1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `html1` text COLLATE utf8_unicode_ci NOT NULL,
  `titulo2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `html2` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`id`, `titulo`, `html`, `titulo1`, `html1`, `titulo2`, `html2`, `created_at`, `updated_at`) VALUES
(1, '¿QUIÉNES SOMOS?', '<p>Somos una empresa dedicada a brindar soluciones integrales en capacitaci&oacute;n inform&aacute;tica, bajo una modalidad de ense&ntilde;anza personalizada, nuestra capacitaci&oacute;n est&aacute; orientada en las herramientas de software de mayor demanda estudiantil y laboral.</p>\r\n\r\n<p>Systematic brinda cursos de capacitaci&oacute;n para usuarios que reci&eacute;n se inician en el uso de las herramientas inform&aacute;ticas, as&iacute; como a t&eacute;cnicos, ingenieros y profesionales que necesitan optimizar sus procesos utilizando tecnolog&iacute;as de informaci&oacute;n.</p>\r\n\r\n<p>Teniendo como propuesta innovadora de proponer una capacitaci&oacute;n inform&aacute;tica para cada necesidad, puesto que, en una sociedad altamente competitiva no todos los requerimientos en capacitaci&oacute;n deben ser utilizados de una misma manera. Systematic, enfatiza la capacitaci&oacute;n de sus usuarios que sea de la manera m&aacute;s personalizada posible, con el fin que puedan adquirir el m&aacute;ximo conocimiento y por ende mejorar su productividad en la vida estudiantil y laboral.</p>\r\n\r\n<p>El mayor reto de Systematic que se ha propuesto es brindar una capacitaci&oacute;n de calidad, ofreciendo a nuestros usuarios un servicio integral de formaci&oacute;n y capacitaci&oacute;n tecnol&oacute;gica en las herramientas de software con m&aacute;s demanda en el mercado. Esta orientaci&oacute;n ha hecho posible que Systematic venga posicion&aacute;ndose como el mejor centro de capacitaci&oacute;n inform&aacute;tica de la regi&oacute;n de Ica.</p>\r\n', 'PRINCIPIOS Y VALORES', '<p>Systematic se enmarca en una Visi&oacute;n y Misi&oacute;n fortalecidas en sus principios b&aacute;sicos que le permiten proyectarse al logro de una formaci&oacute;n competente en ense&ntilde;anza y capacitaci&oacute;n tecnol&oacute;gica de sus alumnos.</p>\r\n\r\n<h3>Visi&oacute;n</h3>\r\n\r\n<p>Ser reconocidos como uno de los mejores centros de ense&ntilde;anza y capacitaci&oacute;n inform&aacute;tica del Per&uacute;.</p>\r\n\r\n<h3>Nuestra Misi&oacute;n</h3>\r\n\r\n<p>Ense&ntilde;ar y capacitar a alumnos competentes capaces de mejorar su productividad laboral y estudiantil en herramientas inform&aacute;ticas.</p>\r\n\r\n<h3>Principios B&aacute;sicos de Systematic</h3>\r\n\r\n<ul>\r\n	<li>La integridad y &eacute;tica son los valores fundamentales de nuestro equipo.</li>\r\n	<li>La satisfacci&oacute;n de las necesidades y cumplimiento de las expectativas de los clientes son lo m&aacute;s importante para nosotros.</li>\r\n	<li>Lo m&aacute;s valioso de Systematic es su personal.</li>\r\n	<li>El mejoramiento continuo es clave para la necesidad</li>\r\n	<li>La creatividad e innovaci&oacute;n son clave para el liderazgo.</li>\r\n</ul>\r\n', 'NUESTROS VALORES INSTITUCIONALES', '<h3>Humanos</h3>\r\n\r\n<ul>\r\n	<li>Integridad.</li>\r\n	<li>Libertad.</li>\r\n	<li>Respeto.</li>\r\n	<li>Responsabilidad.</li>\r\n	<li>Valoraci&oacute;n de la diversidad.</li>\r\n	<li>Honestidad.</li>\r\n	<li>Excelencia.</li>\r\n	<li>Trascendencia.</li>\r\n</ul>\r\n\r\n<h3>Organizacionales</h3>\r\n\r\n<ul>\r\n	<li>Servicio de Calidad y Eficiencia.</li>\r\n	<li>Innovaci&oacute;n permanente.</li>\r\n	<li>Colaboraci&oacute;n y Trabajo en equipo.</li>\r\n	<li>Liderazgo.</li>\r\n</ul>\r\n', NULL, '2017-07-27 05:22:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'PRESENCIAL', '2017-08-01 05:00:00', '2017-08-01 05:00:00'),
(2, 'VIRTUAL', '2017-08-01 05:00:00', '2017-08-01 05:00:00'),
(3, 'PERZONALIZADA', '2017-08-01 05:00:00', '2017-08-01 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` int(11) NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(10) NOT NULL,
  `name_tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `ruta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `validado` int(1) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check1` int(1) NOT NULL,
  `check2` int(1) NOT NULL,
  `check3` int(1) NOT NULL,
  `check4` int(1) NOT NULL,
  `check5` int(1) NOT NULL,
  `check6` int(1) NOT NULL,
  `check7` int(1) NOT NULL,
  `check8` int(1) NOT NULL,
  `check9` int(11) NOT NULL,
  `check10` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `documento`, `razon_social`, `direccion`, `name`, `apellido`, `tipo`, `name_tipo`, `email`, `estado`, `telefono`, `celular`, `fecha_nac`, `ruta`, `sexo`, `validado`, `password`, `remember_token`, `created_at`, `updated_at`, `check1`, `check2`, `check3`, `check4`, `check5`, `check6`, `check7`, `check8`, `check9`, `check10`) VALUES
(1, 0, '', '', 'Juan Jose', 'Felipa Uribe', 1, 'ADMINISTRADOR', 'juanjo.dhw@gmail.com', 'ACTIVAR', '+56 251665', '942876596', '1988-06-07', '31072017085102.jpg', 'Masculino', 0, '$2y$10$X6RpefZDChvBAavIo.qHVOKIdyDAm/7F0Sc265dg7jaGLfZvw2Rqy', 'A7ny0OLMQUSjOot3xhBZgm14l5ukMaPourWcMKlTKusW9qzVXJFrOCmImoNG', '2017-05-20 06:10:24', '2017-08-17 05:02:37', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 0, '', '', 'Brayan Cesar', 'Cabrera Sanchez', 1, 'ADMINISTRADOR', 'brayan.cabrera@systematic.edu.pe', 'ACTIVAR', '+51 960 345 963', '+51 960 345 963', '2017-07-31', '31072017091913.jpg', 'Masculino', 0, '$2y$10$X6RpefZDChvBAavIo.qHVOKIdyDAm/7F0Sc265dg7jaGLfZvw2Rqy', 'Cis4PsbL693lJxyW9tAVmpPnf3k1jL6hjDn7lyqq4NfpjN4pKnK4UVMqjDjT', '2017-07-31 14:19:13', '2017-08-01 21:30:11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1045453741, 'System Cloud', 'Renan Elias 246 La Tinguiña - Ica - Ica - Ica', 'Juan Jose', 'Felipa Uribe', 3, '', 'gerencia@system-cloud.com', '', '942876596', '942876596', '1988-06-07', '15082017144555.jpg', 'Masculino', 0, '$2y$10$hagIlawyB6v1lual//qAG.KKNOI5YSD3667nfJYNBcquYw.0jmJKi', 'VLnA2z8EHofBj3ni5ixMWETA3Mu7eu4kLl8w0895jE5XuvDXk0nnu6SmPktK', '2017-08-15 05:35:21', '2017-08-16 02:18:33', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`id`, `titulo`, `html`, `img`, `created_at`, `updated_at`) VALUES
(1, 'CAPACITACIÓN IN COMPANY', '<p>Trasladamos a sus propias instalaciones de su empresa o instituci&oacute;n todo el material y recurso que sea necesario para llevar a cabo la mejor ense&ntilde;anza, contamos con un promedio de 25 notebooks, proyector y todo lo que sea necesario para que su ense&ntilde;anza sea la mejor experiencia, ahorrando costos de tiempo y traslados.</p>\r\n', '08082017223233.jpg', '2017-08-09 03:31:10', '2017-08-09 03:32:33'),
(2, 'CONSULTORÍA', '<p>Contamos con los mejores profesionales Ingenieros, desarrolladores y t&eacute;cnicos para desarrollar cualquier proyecto de envergadura en distintas &aacute;reas de TI y negocios: Desarrollo de software a medida, implementaci&oacute;n de servidores en distintos &aacute;mbitos, seguridad inform&aacute;tica, soluciones integrales en Marketing directo y digital.</p>\r\n', '08082017223300.jpg', '2017-08-09 03:33:00', '2017-08-09 03:33:00'),
(3, 'CLASS ROOM RENT', '<p>Si requiere de un ambiente apropiado para dictar una charla de capacitaci&oacute;n o realizar alg&uacute;n evento y no cuenta con la infraestructura adecuada, Systematic tiene la soluci&oacute;n.</p>\r\n\r\n<p>Ofrecemos el lugar indicado por el cliente, asignando lo adecuado y proporcionando el material, hardware y software que sean necesarios.</p>\r\n', '08082017223554.jpg', '2017-08-09 03:35:54', '2017-08-09 03:35:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certiport`
--
ALTER TABLE `certiport`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `comentarios_cursos`
--
ALTER TABLE `comentarios_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_cursos_comentarios_id_foreign` (`comentarios_id`),
  ADD KEY `comentarios_cursos_cursos_id_foreign` (`cursos_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_categorias_id_foreign` (`categorias_id`),
  ADD KEY `cursos_tipos_id_foreign` (`tipos_id`);

--
-- Indices de la tabla `cursos_imagenes`
--
ALTER TABLE `cursos_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_imagenes_imagenes_id_foreign` (`imagenes_id`),
  ADD KEY `cursos_imagenes_cursos_id_foreign` (`cursos_id`);

--
-- Indices de la tabla `cursos_modulos`
--
ALTER TABLE `cursos_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_modulos_cursos_id_foreign` (`cursos_id`),
  ADD KEY `cursos_modulos_modulos_id_foreign` (`modulos_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `elearning`
--
ALTER TABLE `elearning`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_laboratorios_id_foreign` (`laboratorios_id`),
  ADD KEY `horarios_docentes_id_foreign` (`docentes_id`),
  ADD KEY `horarios_modulos_id_foreign` (`modulos_id`),
  ADD KEY `horarios_cursos_id_foreign` (`cursos_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_infraestructura`
--
ALTER TABLE `imagenes_infraestructura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_infraestructura_imagenes_id_foreign` (`imagenes_id`),
  ADD KEY `imagenes_infraestructura_infraestructura_id_foreign` (`infraestructura_id`);

--
-- Indices de la tabla `imagenes_modulos`
--
ALTER TABLE `imagenes_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_modulos_imagenes_id_foreign` (`imagenes_id`),
  ADD KEY `imagenes_modulos_modulos_id_foreign` (`modulos_id`);

--
-- Indices de la tabla `imagenes_nosotros`
--
ALTER TABLE `imagenes_nosotros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_nosotros_imagenes_id_foreign` (`imagenes_id`),
  ADD KEY `imagenes_nosotros_nosotros_id_foreign` (`nosotros_id`);

--
-- Indices de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mdatos`
--
ALTER TABLE `mdatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mdatos_modulos`
--
ALTER TABLE `mdatos_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modulos_id` (`modulos_id`),
  ADD KEY `mdatos_id` (`mdatos_id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos_mdatos`
--
ALTER TABLE `modulos_mdatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modulos_mdatos_modulos_id_foreign` (`modulos_id`),
  ADD KEY `modulos_mdatos_mdatos_id_foreign` (`mdatos_id`);

--
-- Indices de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `certiport`
--
ALTER TABLE `certiport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `comentarios_cursos`
--
ALTER TABLE `comentarios_cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `cursos_imagenes`
--
ALTER TABLE `cursos_imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cursos_modulos`
--
ALTER TABLE `cursos_modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `elearning`
--
ALTER TABLE `elearning`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `imagenes_infraestructura`
--
ALTER TABLE `imagenes_infraestructura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `imagenes_modulos`
--
ALTER TABLE `imagenes_modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes_nosotros`
--
ALTER TABLE `imagenes_nosotros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mdatos`
--
ALTER TABLE `mdatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `mdatos_modulos`
--
ALTER TABLE `mdatos_modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `modulos_mdatos`
--
ALTER TABLE `modulos_mdatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `comentarios_cursos`
--
ALTER TABLE `comentarios_cursos`
  ADD CONSTRAINT `comentarios_cursos_comentarios_id_foreign` FOREIGN KEY (`comentarios_id`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `comentarios_cursos_cursos_id_foreign` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `cursos_imagenes`
--
ALTER TABLE `cursos_imagenes`
  ADD CONSTRAINT `cursos_imagenes_cursos_id_foreign` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `cursos_imagenes_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`);

--
-- Filtros para la tabla `cursos_modulos`
--
ALTER TABLE `cursos_modulos`
  ADD CONSTRAINT `cursos_modulos_cursos_id_foreign` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `cursos_modulos_modulos_id_foreign` FOREIGN KEY (`modulos_id`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_cursos_id_foreign` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `horarios_docentes_id_foreign` FOREIGN KEY (`docentes_id`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `horarios_laboratorios_id_foreign` FOREIGN KEY (`laboratorios_id`) REFERENCES `laboratorios` (`id`),
  ADD CONSTRAINT `horarios_modulos_id_foreign` FOREIGN KEY (`modulos_id`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `imagenes_infraestructura`
--
ALTER TABLE `imagenes_infraestructura`
  ADD CONSTRAINT `imagenes_infraestructura_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `imagenes_infraestructura_infraestructura_id_foreign` FOREIGN KEY (`infraestructura_id`) REFERENCES `infraestructura` (`id`);

--
-- Filtros para la tabla `imagenes_modulos`
--
ALTER TABLE `imagenes_modulos`
  ADD CONSTRAINT `imagenes_modulos_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `imagenes_modulos_modulos_id_foreign` FOREIGN KEY (`modulos_id`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `imagenes_nosotros`
--
ALTER TABLE `imagenes_nosotros`
  ADD CONSTRAINT `imagenes_nosotros_imagenes_id_foreign` FOREIGN KEY (`imagenes_id`) REFERENCES `imagenes` (`id`),
  ADD CONSTRAINT `imagenes_nosotros_nosotros_id_foreign` FOREIGN KEY (`nosotros_id`) REFERENCES `nosotros` (`id`);

--
-- Filtros para la tabla `mdatos_modulos`
--
ALTER TABLE `mdatos_modulos`
  ADD CONSTRAINT `mdatos_modulos_mdatos_id_foreign` FOREIGN KEY (`mdatos_id`) REFERENCES `mdatos` (`id`),
  ADD CONSTRAINT `mdatos_modulos_modulos_id_foreign` FOREIGN KEY (`modulos_id`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `modulos_mdatos`
--
ALTER TABLE `modulos_mdatos`
  ADD CONSTRAINT `modulos_mdatos_mdatos_id_foreign` FOREIGN KEY (`mdatos_id`) REFERENCES `mdatos` (`id`),
  ADD CONSTRAINT `modulos_mdatos_modulos_id_foreign` FOREIGN KEY (`modulos_id`) REFERENCES `modulos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
