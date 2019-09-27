-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2019 a las 17:13:35
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm_ail`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir_entrega` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_contacto` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_contacto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle1` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle2` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle3` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle4` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`),
  KEY `clients_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `empresa`, `tel`, `email`, `sector`, `address`, `dir_entrega`, `nom_contacto`, `tel_contacto`, `calle1`, `calle2`, `calle3`, `calle4`, `rfc`, `user_id`, `source`, `created_at`, `updated_at`) VALUES
(1, 'juan perez', 'Salones CDMX', '1223455678', 'contacto@miempresa.com', 'Hotelería', 'Pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 1, 'WhatsApp', '2019-09-03 22:26:52', '2019-09-03 22:26:52'),
(2, 'Jose Santos Lopez', 'Asesorias Maldonado', '5547249503', 'maldonado.net@hotmail.com', 'Marketing', 'Los reyes la paz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rcgh-124578-uj4', 1, 'Cotizacion', '2019-09-03 22:31:21', '2019-09-04 00:17:23'),
(3, 'jose de lujan dominguez', 'san tomas', '5547249503', 'info@miempresa.com', 'contruccion', 'Pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 1, 'Llamada Celular', '2019-09-04 02:23:18', '2019-09-04 02:23:18'),
(6, 'Juan de arco', 'los arcos de belen', '1234567890', 'juanadearco@gmail.com', 'Serigrafia', 'Pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 5, 'WhatsApp', '2019-09-04 20:40:59', '2019-09-04 20:40:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_quotes`
--

DROP TABLE IF EXISTS `details_quotes`;
CREATE TABLE IF NOT EXISTS `details_quotes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotes_id` int(11) NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `observations` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `details_quotes_quotes_id_foreign` (`quotes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leaflets`
--

DROP TABLE IF EXISTS `leaflets`;
CREATE TABLE IF NOT EXISTS `leaflets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `estatus` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leaflets_email_unique` (`email`),
  KEY `leaflets_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `leaflets`
--

INSERT INTO `leaflets` (`id`, `name`, `empresa`, `tel`, `email`, `sector`, `source`, `user_id`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'Pedro fernandez Guitierrez', 'Todo para tus muebles', '0000000000', 'empresa1@ail.com.mx', 'Construccion', 'Prospeccion', 1, NULL, '2019-08-29 05:00:00', '2019-09-03 19:16:29'),
(2, 'juan2', 'empresa2', '0000000000', 'empresa2@ail.com.mx', 'Construccion', 'Telefono', 1, NULL, '2019-08-29 05:00:00', '2019-08-29 05:00:00'),
(3, 'juan2', 'empresa3', '0000000000', 'empresa3@ail.com.mx', 'Construccion', 'Telefono', 1, NULL, '2019-08-29 05:00:00', '2019-08-29 05:00:00'),
(4, 'Jose Santos Lopez', 'Asesorias Maldonado', '5547249503', 'maldonado.net@hotmail.com', 'Marketing', 'Cotizacion', 1, 'Venta', '2019-08-30 21:47:03', '2019-09-03 22:31:21'),
(5, 'Amanda Maldonado', 'Maquillajes Amy', '50442603', 'amandamaldonado@msn.com', 'Cosmeticos', 'Cliengo', 1, NULL, '2019-08-30 22:20:51', '2019-08-30 22:20:51'),
(6, 'Juan', 'pepe marketing', '1245784512', 'pepe@pepemarketing.com', 'Marketing', 'WhatsApp', 1, NULL, '2019-08-30 22:24:42', '2019-08-31 01:36:09'),
(7, 'juan perez', 'Salones CDMX', '1223455678', 'contacto@miempresa.com', 'Hotelería', 'WhatsApp', 1, 'Venta', '2019-08-31 01:58:10', '2019-09-03 22:26:52'),
(8, 'Jose Pérez', 'Sonidos del Norte S.A de C.V', '5512457845', 'contacto@sonidosdelnorte.com', 'Construcción', 'WhatsApp', 1, NULL, '2019-08-31 03:14:20', '2019-08-31 03:14:20'),
(9, 'jose de lujan dominguez', 'san tomas', '5547249503', 'info@miempresa.com', 'contruccion', 'Llamada Celular', 1, 'Venta', '2019-09-04 02:18:36', '2019-09-04 02:23:18'),
(10, 'Juan de arco', 'los arcos de belen', '1234567890', 'juanadearco@gmail.com', 'Serigrafia', 'WhatsApp', 5, 'Venta', '2019-09-04 20:23:42', '2019-09-04 20:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_28_183703_create_leaflets_table', 1),
(4, '2019_08_28_184544_create_clients_table', 1),
(5, '2019_08_28_190254_create_tracing_table', 1),
(6, '2019_08_28_190422_create_quotes_table', 1),
(7, '2019_08_28_190456_create_details_quotes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE IF NOT EXISTS `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `leaflets_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `folio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productos` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto` decimal(8,2) DEFAULT NULL,
  `documento` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotes_leaflets_id_foreign` (`leaflets_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`id`, `leaflets_id`, `id_user`, `date`, `folio`, `observations`, `marca`, `productos`, `monto`, `documento`, `created_at`, `updated_at`) VALUES
(4, 7, 1, '2019-09-02', '0', 'El cliente trabaja para externos', 'Makita', 'sikatop 27', '1500.00', 'UC-3UP6KGFF.pdf', '2019-09-03 03:21:43', '2019-09-03 19:26:53'),
(5, 4, 1, '2019-09-03', '0', 'cliente potencial', '3M', 'vhb g23f 3 mts', '1500.00', 'UC-3UP6KGFF.pdf', '2019-09-03 22:29:05', '2019-09-03 22:29:05'),
(6, 9, 1, '2019-09-03', '0', 'cliente potencial', '3M', 'g23f,hrt56', '1500.00', 'Angular y SOckets.pdf', '2019-09-04 02:21:03', '2019-09-04 02:21:03'),
(7, 10, 5, '2019-09-04', '0', 'se requiere hacer el pedido a 3M', '3M', 'cinta 3m vhb 4611', '2000.00', 'UC-3UP6KGFF.pdf', '2019-09-04 20:26:31', '2019-09-04 20:26:47'),
(8, 10, 5, '2019-09-04', '0', 'cliente cnosentido', '3M', 'Glazing g23F', '2560.00', 'Certificado-Google Ads.pdf', '2019-09-04 21:17:56', '2019-09-04 21:17:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tracing`
--

DROP TABLE IF EXISTS `tracing`;
CREATE TABLE IF NOT EXISTS `tracing` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotes_id` int(11) NOT NULL,
  `type_call` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `observations` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment` date DEFAULT NULL,
  `bill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tracing_quotes_id_foreign` (`quotes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tracing`
--

INSERT INTO `tracing` (`id`, `quotes_id`, `type_call`, `date`, `observations`, `appointment`, `bill`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, '1era Llamada', '2019-09-03', 'Se llamo para confirmar la recepcion de la cotizacion', NULL, NULL, 1, '2019-09-03 05:00:00', '2019-09-03 05:00:00'),
(2, 4, '2da Llamada', '2019-09-04', 'Se llama para ver sus comentarios de nuestra cotizacion', NULL, NULL, 1, '2019-09-03 05:00:00', '2019-09-03 05:00:00'),
(3, 4, 'Cita', '2019-09-03', 'Se confirma la cita con el área de mantenimiento', '2019-09-06', NULL, 1, '2019-09-03 22:02:46', '2019-09-03 22:02:46'),
(4, 4, 'Cierre de venta', '2019-09-03', 'Se confirma la venta del sikadur', NULL, NULL, 1, '2019-09-03 22:26:52', '2019-09-03 22:26:52'),
(5, 5, '1era Llamada', '2019-09-03', 'se le llama para verificar que halla recibido la cotizacion', NULL, NULL, 1, '2019-09-03 22:29:44', '2019-09-03 22:29:44'),
(6, 5, '2da Llamada', '2019-09-03', 'Indica que si le inetresan los productos', '2019-09-12', NULL, 1, '2019-09-03 22:30:22', '2019-09-03 22:30:22'),
(7, 5, 'Cierre de venta', '2019-09-03', 'se confirma la venta', NULL, NULL, 1, '2019-09-03 22:31:21', '2019-09-03 22:31:21'),
(8, 6, '1era Llamada', '2019-09-03', 'se le llamo para verificar que halla recibido la cotización', NULL, NULL, 1, '2019-09-04 02:22:17', '2019-09-04 02:22:17'),
(9, 6, '2da Llamada', '2019-09-03', 'comenta el cliente que si le interesan los proiductos, agendfo cita', '2019-09-18', NULL, 1, '2019-09-04 02:22:51', '2019-09-04 02:22:51'),
(10, 6, 'Cierre de venta', '2019-09-03', 'se confirma la venta con el cliente', NULL, '121212121212121', 1, '2019-09-04 02:23:18', '2019-09-04 02:23:18'),
(11, 7, '1era Llamada', '2019-09-04', 'Se comunica con el cliente para confirmar que le llego la cotización.', NULL, NULL, 5, '2019-09-04 20:28:33', '2019-09-04 20:28:33'),
(12, 7, '2da Llamada', '2019-09-04', 'Le interesan los productos, se agenda cita', '2019-09-12', NULL, 5, '2019-09-04 20:29:36', '2019-09-04 20:29:36'),
(15, 7, 'Cierre de venta', '2019-09-04', 'se cierra la venta', NULL, '1234567', 5, '2019-09-04 20:40:59', '2019-09-04 20:40:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `tipo_usuario`, `area`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Ruben Maldonado Perez', 'desarrollo@ail.com.mx', NULL, '$2y$10$wSIL9Qqet9eAe11XkEN.S.ezL5aVDw231L/dlTynRoTZweZazHqC.', NULL, 'Admin', 'Desarrollo', '5547249503', '2019-08-29 23:34:12', '2019-08-29 23:34:12'),
(5, 'Juana Martinez', 'juana@ail.com.mx', NULL, '$2y$10$kKpjTV/oPt2YHA4XX6Fck.QB4NA5HRVpC2CMei6dwoQ2SWLrMEc1W', NULL, NULL, NULL, '54545454545', '2019-09-04 02:25:01', '2019-09-04 20:13:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
