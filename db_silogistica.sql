-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-08-2024 a las 19:38:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_silogistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `destinatario` varchar(255) DEFAULT NULL,
  `destinatario2` varchar(255) DEFAULT NULL,
  `remitente` varchar(255) DEFAULT NULL,
  `remitentepass` varchar(255) DEFAULT NULL,
  `remitentehost` varchar(255) DEFAULT NULL,
  `remitenteport` varchar(255) DEFAULT NULL,
  `remitenteseguridad` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whatsapp2` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `envio` varchar(255) DEFAULT NULL,
  `envioglobal` varchar(255) DEFAULT NULL,
  `iva` varchar(255) DEFAULT NULL,
  `incremento` varchar(255) DEFAULT NULL,
  `mapa` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `titulo`, `descripcion`, `destinatario`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `whatsapp`, `whatsapp2`, `tiktok`, `facebook`, `instagram`, `youtube`, `linkedin`, `envio`, `envioglobal`, `iva`, `incremento`, `mapa`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'SiLogisticaGuerrero', 'adjnajdsd ds', 'mikeed1998@gmail.com', 'michaelwozial@gmail.com', 'testeolocal@proyectoswozial.com', 'D(]$I6s7)vBV', 'mail.proyectoswozial.com', '465', NULL, '3329768968', '3329768968', NULL, NULL, 'contacto@silogistica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Av. Lazáro Cárdenas #33097 Chapalita C.P. 44500 Guadalajara, Jal.', NULL, '2024-05-22 04:26:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `elemento` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `contenido` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `seccion` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id`, `elemento`, `texto`, `imagen`, `url`, `contenido`, `activo`, `orden`, `seccion`, `created_at`, `updated_at`) VALUES
(1, 'titulo_nosotros', 'Empresa 100% Mexicana', NULL, NULL, 0, 1, 666, 4, NULL, NULL),
(2, 'nosotros_descripcion', ' \n                                                SI LOGISTICA es una empresa 100% mexicana que nace en 2019, especializandose en logística y transporte de carga, siendo un proveedor que se adecua a las necesidades de los clientes para garantizar la satisfacción de los mismos (desde su recolección hasta el destino final) y así tener una efectiva cadena de suministros cumpliendo a detalle en tiempo y forma cada uno de los compromisos adquiridos.                                        dd    ', NULL, NULL, 0, 1, 666, 4, NULL, '2024-05-21 23:55:47'),
(3, 'nosotros_letrero', 'Logistica Nacional', NULL, NULL, 0, 1, 666, 4, NULL, NULL),
(4, 'nosotros_imagen', NULL, 'dba45e326d83e357cdde47d5fcaaaa.png', NULL, 1, 1, 666, 4, NULL, '2024-05-22 04:29:04'),
(5, 'contacto_mensaje', 'Déjanos un Mensaje', NULL, NULL, 0, 1, 666, 6, NULL, NULL),
(6, 'contacto_imagen', NULL, '2b0683f444081daee3297f0e624c8b.png', NULL, 1, 1, 666, 6, NULL, '2024-05-23 00:11:29'),
(7, 'nosotros_titulo', '                                                                                Empresa 100% Mexicana                                                           ', NULL, NULL, 0, 1, 666, 5, NULL, NULL),
(8, 'nosotros_descripcion', '                                                                                                                                                                        SI LOGISTICA es una empresa 100% mexcicana que nace en 2019, especializandose en logística y transporte de carga, siendo un proveedor que se adecua a las necesidades de los clientes para garantizar la satisfacción de los mismos (desde su recolección hasta el destino final) y asi tener una efectiva cadena de suministros cumpliendo a detalle en tiempo y forma cada uno de los compromisos adquiridos. \n\nNuestra experiencia nos ha permitido trabajar con empresas líderes en el mercado en México y en el extranjero. El origen de nuestra motivación está en ofrecer a nuestros clientes soluciones a medida en servicios con caja seca, transportando componentes electrónicos, materia prima, producto terminado, alimnetos veterinarios, consumibles de industria farmacéutica, suplementos alimenticios, equipo médico, refacciones automovilísticas, cargas de alto valor (bolsas, calzado) entre otros. Asi como entregas especificas para el sector gobierno.                                                                                                                                                            ', NULL, NULL, 0, 1, 666, 5, NULL, '2024-05-22 04:38:16'),
(9, 'nosotros_imagen', NULL, 'pCqChMSlmUQwYYmXgR7JWfZaS0wTzC.png', NULL, 1, 1, 666, 5, NULL, '2024-05-22 01:51:47'),
(10, 'mision_titulo', 'Misión', NULL, NULL, 0, 1, 666, 5, NULL, NULL),
(11, 'mision_texto', '                                            L32orem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit. odit at. Et pariatur sunt adipisci magni. dolor sit amet consectetur adipisicing elit. Inventore neque unde sed eum voluptatem nam? Cum maiores totam officiis repellat?                                        ', NULL, NULL, 0, 1, 666, 5, NULL, '2024-05-22 04:39:01'),
(12, 'vision_titulo', 'Visión', NULL, NULL, 0, 1, 666, 5, NULL, NULL),
(13, 'vision_texto', '                                            Lorem ipsum Lorem ipsum3443 dolor sit amet consectetur adipisicing elit. odit at. Et pariatur sunt adipisci magni. dolor sit amet consectetur adipisicing elit. Inventore neque unde sed eum voluptatem nam? Cum maiores totam officiis repellat?                                        ', NULL, NULL, 0, 1, 666, 5, NULL, '2024-05-22 04:39:08'),
(14, 'nosotros_imagen_abajo', NULL, '2a5ed8f9740b66b11c263994694304.png', NULL, 1, 1, 666, 5, NULL, '2024-05-22 01:56:25'),
(15, 'contacto_titulo', 'Déjanos un Mensaje', NULL, NULL, 0, 1, 666, 6, NULL, NULL),
(16, 'contacto_imagen', NULL, '4ab320d5d0c12fc49530a96c25cc50.png', NULL, 1, 1, 666, 6, NULL, '2024-05-22 03:51:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `imagen`, `created_at`, `updated_at`) VALUES
(3, 'kByhea6QnYE5eaMExFz4FGGMdnTEuP.png', '2024-05-22 04:40:40', '2024-05-22 04:40:40'),
(4, 'ehmoRCk39bbVHNt9jn0DqYMeVoDGwn.png', '2024-05-22 04:40:55', '2024-05-22 04:40:55'),
(5, 'LFs8tTTxsC7FlqVvX2Zo6CFIvSSWCU.png', '2024-05-22 04:41:12', '2024-05-22 04:41:12'),
(11, '24eeb63b072ae7db2f932378e93e39.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `respuesta` text DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `pregunta`, `respuesta`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'uno', 'dksnds', 666, '2024-05-07 00:06:55', '2024-05-07 00:06:55'),
(3, 'sdsds434', 'dsdssd', 666, NULL, NULL),
(4, 'dsd', 'dsd', 666, NULL, NULL),
(5, 'rere', 'dsdsd', 666, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`id`, `titulo`, `link`) VALUES
(1, 'dsd', 'ds'),
(7, 'Opción', 'https://www.amazon.com.mx'),
(8, 'gdgdf', 'hgfhgf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2024_05_06_155145_create_configuracions_table', 1),
(16, '2024_05_06_160217_create_seccions_table', 1),
(17, '2024_05_06_160342_create_elementos_table', 1),
(18, '2024_05_06_170557_create_faqs_table', 1),
(19, '2024_05_06_171045_create_politicas_table', 1),
(20, '2024_05_16_190750_create_slider_principals_table', 2),
(21, '2024_05_16_191510_create_empresas_table', 2),
(22, '2024_05_16_191628_create_servicios_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politicas`
--

CREATE TABLE `politicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `politicas`
--

INSERT INTO `politicas` (`id`, `titulo`, `descripcion`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 'Aviso de Privacidad', '<p>dsd232dsdsasas221 </p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td>fdfd<br></td><td>dsds<br></td></tr></tbody></table>', NULL, NULL, '2024-05-08 00:27:46'),
(2, 'Métodos de Pago', 'dsdsd23232', NULL, NULL, NULL),
(3, 'Devoluciones', NULL, NULL, NULL, NULL),
(4, 'Términos y Condiciones', '2332', NULL, NULL, NULL),
(5, 'Garantías', NULL, NULL, NULL, NULL),
(6, 'Políticas de Envío', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `portada`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'configuracion', 'bi bi-gear-fill', 'configuracion', NULL, NULL),
(2, 'politicas', 'bi bi-shield-fill-exclamation', 'politicas', NULL, NULL),
(3, 'faqs', 'bi bi-question-circle-fill', 'faqs', NULL, NULL),
(4, 'home', 'bi bi-house-door-fill', 'home', NULL, NULL),
(5, 'nosotros', 'bi bi-postcard-fill', 'nosotros', NULL, NULL),
(6, 'contacto', 'bi bi-send-fill', 'contacto', NULL, NULL),
(7, 'servicios', 'bi bi-window', 'servicios', NULL, NULL),
(8, 'sliders', 'bi bi-card-image', 'sliders', NULL, NULL),
(9, 'empresas', 'bi bi-building-fill', 'empresas', NULL, NULL),
(10, 'links', 'bi-link-45deg', 'links', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portada` text DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `inicio` int(11) NOT NULL DEFAULT 0,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `portada`, `titulo`, `descripcion`, `inicio`, `aux`, `created_at`, `updated_at`) VALUES
(13, 'EVRA99nMSYfofKVnuPp4x3ujdLDNIu.png', 'Entrega puerta a puerta', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae ad itaque, quis nihil quam eum a dicta eos doloribus nam aut, neque distinctio maiores fugit! Incidunt officiis consequatur deleniti nesciunt.<br><br></p>', 1, NULL, '2024-05-22 04:46:51', '2024-05-22 04:47:03'),
(14, 'eIvDfogPFqbHAhlJuNcpuXIgEWNPRf.png', 'Servicio con cita', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae ad itaque, quis nihil quam eum a dicta eos doloribus nam aut, neque distinctio maiores fugit! Incidunt officiis consequatur deleniti nesciunt.<br><br></p>', 1, NULL, '2024-05-22 04:47:44', '2024-05-22 04:47:51'),
(15, 't1aUWkL8jXHzxN9CizIifs0i9k7cal.png', 'Unidades dedicadas', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae ad itaque, quis nihil quam eum a dicta eos doloribus nam aut, neque distinctio maiores fugit! Incidunt officiis consequatur deleniti nesciunt.<br><br></p>', 1, NULL, '2024-05-22 04:48:19', '2024-05-22 04:48:27'),
(16, 'C7iNQ31yI25FSDnVKRauTJQOEz9uwT.png', 'FTL (Full TruckLoad)', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae ad itaque, quis nihil quam eum a dicta eos doloribus nam aut, neque distinctio maiores fugit! Incidunt officiis consequatur deleniti nesciunt.<br><br></p>', 1, NULL, '2024-05-22 04:49:05', '2024-05-22 04:53:50'),
(17, 'arBvYgQ1oKp7pXSz6GAV2JVZ1al606.png', 'Otro', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae ad itaque, quis nihil quam eum a dicta eos doloribus nam aut, neque distinctio maiores fugit! Incidunt officiis consequatur deleniti nesciunt.<br><br></p>', 1, NULL, '2024-05-22 04:49:34', '2024-05-22 04:53:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider_principals`
--

CREATE TABLE `slider_principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `slider_principals`
--

INSERT INTO `slider_principals` (`id`, `imagen`, `created_at`, `updated_at`) VALUES
(13, 'LeLsyqeOwqwYkyssElU15xO6APZLYe.PNG', '2024-05-22 04:43:01', '2024-05-22 04:43:01'),
(14, '7Pfq4dXg0ousH0JVWpHxPiwBeihwqr.png', '2024-05-22 04:43:10', '2024-05-22 04:43:10'),
(15, '9w9YIawsV2PdKR7mzTqnCKDyDI0mMr.png', '2024-05-22 04:43:19', '2024-05-22 04:43:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@wozial.com', NULL, '$2y$10$bd2hbnNc91XPGuCvP5DNLujrfhcVte6zjvyb/TSlKseACBvpbmRxe', 1, NULL, '2024-05-06 23:57:30', '2024-05-06 23:57:30'),
(3, 'michael ', 'michael@gmail.com', NULL, '$2y$10$3QMydj15UEFN8ldM2N0Ncuipwuq4jOlkQksaxV/PEqUKxcIvjdkbC', 0, NULL, '2024-05-07 01:18:59', '2024-05-07 01:18:59'),
(4, 'Michael', 'michael@wozial.com', NULL, '$2y$10$pTZvU12IbJgV5MHYG9XTneTii1PgZazwwJhzg5GFe7BN7r09K36pq', 0, NULL, '2024-05-23 01:08:42', '2024-05-23 01:08:42'),
(5, '', 'asa@sds.com', NULL, '$2y$10$y1Jso93VFLGVIBUXMH0jUODB19bSp/W4tt74FWceDvWSST450WxyS', 0, NULL, NULL, NULL),
(6, '', 'asasa@sasasa.com', NULL, '$2y$10$0hVQyjNTIpA88cTKrwQ6Me58FFXdLd4YwQOoFWZruOSwrnHFgjYku', 0, NULL, NULL, NULL),
(7, 'Michael', 'mich@wozial.com', NULL, '$2y$10$bIlzRav8HDnY/PAZB8fspeCOB02XXBdEAPMC5TAtms.CVezKZToFK', 0, NULL, NULL, NULL),
(8, '', 'a', NULL, '$2y$10$iuWaa3kE1hao7RCavvVNE.CiwvPiEX.Lmwg2v65igIZ/egBRlopmG', 0, NULL, NULL, NULL),
(10, '', 'as@ds.com', NULL, '$2y$10$2YWAH1fjqqMVxqNqJEvK.uY7OLNwsyO2xR.0F9fsAJvoxh4q5uDfe', 0, NULL, NULL, NULL),
(11, '', 'mich2@gmail.com', NULL, '$2y$10$YY61hiAH8wKEb4GHLJtGDePTkE2vlVQs7eq5FZOtQ0SNae0.bcU/a', 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elementos_seccion_foreign` (`seccion`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seccions_slug_unique` (`slug`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider_principals`
--
ALTER TABLE `slider_principals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `slider_principals`
--
ALTER TABLE `slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
