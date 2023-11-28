-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 22:17:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `condition_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conditions`
--

INSERT INTO `conditions` (`id`, `condition_name`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(2, 'Buen Estado', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(3, 'Regular', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(4, 'Mal estado', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(5, 'Dañado', '2023-11-28 21:16:46', '2023-11-28 21:16:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departaments`
--

CREATE TABLE `departaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departament_name` varchar(255) NOT NULL,
  `state_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departaments`
--

INSERT INTO `departaments` (`id`, `departament_name`, `state_fke`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Inventario General', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(2, 'Medicina General', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(3, 'Laboratorio', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(4, 'Hospitalización', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(5, 'Odontología', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(6, 'Optometría', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(7, 'Fisiatría', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(8, 'Rayos X', 1, 1, '2023-11-28 21:16:45', '2023-11-28 21:16:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instruments`
--

CREATE TABLE `instruments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instrument_name` varchar(255) NOT NULL,
  `instrument_size` varchar(255) NOT NULL,
  `instrument_desc` varchar(255) DEFAULT NULL,
  `instrument_serial_code` varchar(255) NOT NULL,
  `departament_fke` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `condition_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instruments`
--

INSERT INTO `instruments` (`id`, `instrument_name`, `instrument_size`, `instrument_desc`, `instrument_serial_code`, `departament_fke`, `condition_fke`, `created_at`, `updated_at`) VALUES
(1, 'Estetoscopio', '69 cm, 150 grs', 'dispositivo acustico que amplifica los ruidos corporales', 'JPXFBM7U5BPL', 1, 1, '2023-07-24 00:52:12', '2023-11-28 21:16:46'),
(2, 'Cama Hospitalaria', '224 cm x 104,5 cm, 114kg', 'Camilla para pacientes, tambien pueden ser designadas a uso particular', 'P3XAUGMSSQTP', 2, 3, '2022-05-24 00:52:12', '2023-11-28 21:16:46'),
(3, 'Bisturí Quirurgico 14', '69 cm, 150 grs', 'Exclusivo para Quirófano', '8AZE2B32VHPY', 1, 2, '2021-03-24 00:52:12', '2023-11-28 21:16:46'),
(4, 'Pinzas médicas', '8 x 4 cm', 'Exclusivo para quirófano', '708D0K5TEZJU', 2, 1, '2020-01-24 00:52:12', '2023-11-28 21:16:46'),
(5, 'Desfibrilador', '200 cm, 350 gr', 'Dispositivo para realizar reanimaciones, en caso de paro cardiaco', 'NSKLY2QWFIWU', 3, 1, '2019-11-24 00:52:12', '2023-11-28 21:16:46');

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
(1, '2012_06_03_231358_create_states_table', 1),
(2, '2013_05_12_000000_create_users_table', 1),
(3, '2013_06_03_213504_create_departaments_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_03_173706_create_presentations_table', 1),
(6, '2023_06_03_180411_create_units_table', 1),
(7, '2023_06_04_003937_create_conditions_table', 1),
(8, '2023_06_04_004618_create_instruments_table', 1),
(9, '2023_06_04_005653_create_supplies_table', 1),
(10, '2023_06_08_154148_create_permission_tables', 1),
(11, '2023_09_08_191656_create_movement_type_table', 1),
(12, '2023_09_09_190942_create_movements_table', 1),
(13, '2023_09_15_190202_create_update_stock_trigger', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE `movements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movement_desc` varchar(255) DEFAULT NULL,
  `movement_stock` varchar(255) NOT NULL,
  `movement_types_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `departament_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `supply_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `movement_batch` varchar(255) NOT NULL,
  `movement_expiration_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movements`
--

INSERT INTO `movements` (`id`, `movement_desc`, `movement_stock`, `movement_types_fke`, `departament_fke`, `supply_fke`, `movement_batch`, `movement_expiration_date`, `created_at`, `updated_at`) VALUES
(1, 'Ingreso Gasas', '10', 1, 1, 1, 'IJS3H00', '2023-12-24', '2023-07-24 00:52:12', '2023-11-28 21:16:46'),
(2, 'Egreso Gasas', '30', 2, 1, 1, 'IJS3H01', '2023-12-24', '2022-05-24 00:52:12', '2023-11-28 21:16:46'),
(3, 'Ingreso Loratadina', '20', 1, 1, 2, 'IJS3H02', '2023-12-24', '2021-03-24 00:52:12', '2023-11-28 21:16:46'),
(4, 'Ingreso Acetaminofen', '40', 1, 1, 3, 'IJS3H03', '2023-12-24', '2020-01-24 00:52:12', '2023-11-28 21:16:46'),
(5, 'Ingreso Clonazepam', '50', 1, 1, 4, 'IJS3H0RA', '2023-12-24', '2019-11-24 00:52:12', '2023-11-28 21:16:46'),
(6, 'Ingreso Antibioticos', '10', 1, 1, 5, 'IJS3H04', '2023-12-24', '2018-09-24 00:52:12', '2023-11-28 21:16:46');

--
-- Disparadores `movements`
--
DELIMITER $$
CREATE TRIGGER `update_supplies_stock` AFTER INSERT ON `movements` FOR EACH ROW BEGIN
                DECLARE IdMovimiento bigint;
                DECLARE StockMovimiento bigint;
                DECLARE TipoMovimiento bigint;

                SET IdMovimiento = NEW.supply_fke;
                SET StockMovimiento = NEW.movement_stock;
                SET TipoMovimiento = NEW.movement_types_fke;

                IF TipoMovimiento = 1 THEN
                    UPDATE supplies
                    SET supply_stock = supply_stock + StockMovimiento
                    WHERE id = IdMovimiento;
                ELSEIF TipoMovimiento = 2 THEN
                    UPDATE supplies
                    SET supply_stock = supply_stock - StockMovimiento
                    WHERE id = IdMovimiento;
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movement_types`
--

CREATE TABLE `movement_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movement_type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movement_types`
--

INSERT INTO `movement_types` (`id`, `movement_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Ingreso', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(2, 'Egreso', '2023-11-28 21:16:46', '2023-11-28 21:16:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'home', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(2, 'menu.admin', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(3, 'usuarios.lista', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(4, 'usuarios.registro', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(5, 'usuarios.edit', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(6, 'usuarios.show', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(7, 'usuarios.buttons', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(8, 'departamento.lista', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(9, 'departamento.registro', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(10, 'departamento.edit', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(11, 'departamento.show', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(12, 'departamento.buttons', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(13, 'inventario.insumos.lista', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(14, 'inventario.insumos.registro', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(15, 'inventario.insumos.edit', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(16, 'inventario.insumos.show', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(17, 'inventario.insumos.buttons', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(18, 'inventario.movimientos.lista', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(19, 'inventario.movimientos.registro', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(20, 'inventario.insumos.movimientos.show', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(21, 'inventario.instrumentos.lista', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(22, 'inventario.instrumentos.registro', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(23, 'inventario.instrumentos.edit', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(24, 'inventario.instrumentos.show', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(25, 'inventario.instrumentos.buttons', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(26, 'panel.reportes', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(27, 'panel.reportes.buttons', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(28, 'respaldo.index', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(29, 'panel.respaldo.buttons', 'web', '2023-11-28 21:16:45', '2023-11-28 21:16:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `presentation_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `presentations`
--

INSERT INTO `presentations` (`id`, `presentation_name`, `created_at`, `updated_at`) VALUES
(1, 'Tableta', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(2, 'Inyección', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(3, 'Líquido Oral', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(4, 'Cápsula', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(5, 'Jarabe', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(6, 'Suspensión Oral', '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(7, 'Inhalador', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(8, 'Ampolla', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(9, 'Supositorio', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(10, 'Gotas Oftálmicas', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(11, 'Parche Transdérmico', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(12, 'Solución Inyectable', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(13, 'Polvo para Reconstitución', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(14, 'Gel Tópico', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(15, 'Óvulo Vaginal', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(16, 'Emulsión', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(17, 'Loción', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(18, 'Aerosol Nasal', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(19, 'Solución Oftálmica', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(20, 'Otros', '2023-11-28 21:16:46', '2023-11-28 21:16:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(2, 'Usuario', 'web', '2023-11-28 21:16:44', '2023-11-28 21:16:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2023-11-28 21:16:44', '2023-11-28 21:16:44'),
(2, 'Inactivo', '2023-11-28 21:16:44', '2023-11-28 21:16:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplies`
--

CREATE TABLE `supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supply_name` varchar(255) NOT NULL,
  `supply_weight` int(11) NOT NULL,
  `unit_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `supply_posology` varchar(255) DEFAULT NULL,
  `supply_desc` varchar(255) DEFAULT NULL,
  `supply_stock` varchar(255) NOT NULL,
  `presentation_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `state_fke` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `supplies`
--

INSERT INTO `supplies` (`id`, `supply_name`, `supply_weight`, `unit_fke`, `supply_posology`, `supply_desc`, `supply_stock`, `presentation_fke`, `state_fke`, `created_at`, `updated_at`) VALUES
(1, 'Gasas', 20, 15, '2 veces cada 12hx 10 dias', 'para tratar heridas o quemaduras', '10', 20, 1, '2024-09-22 00:52:12', '2023-11-28 21:16:46'),
(2, 'Loratadina', 10, 2, '3 veces cada 8hx 3 dias', 'para tratar heridas o quemaduras', '40', 1, 2, '2023-09-21 00:52:12', '2023-11-28 21:16:46'),
(3, 'Acetaminofen', 650, 2, '2 veces cada 6 hx 15 dias', 'para tratar heridas o quemaduras', '80', 1, 2, '2023-09-22 00:52:12', '2023-11-28 21:16:46'),
(4, 'Clonazepam', 10, 2, '1 veces cada 12h x 4 dias', 'para tratar heridas o quemaduras', '100', 1, 2, '2023-09-23 00:52:11', '2023-11-28 21:16:46'),
(5, 'amoxicilina', 750, 2, '1 vece cada 8h x 3 dias', 'para tratar infecciones', '20', 1, 1, '2023-09-24 00:52:12', '2023-11-28 21:16:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `units`
--

INSERT INTO `units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'µg', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(2, 'mg', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(3, 'g', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(4, 'kg', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(5, 'µl', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(6, 'ml', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(7, 'lts', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(8, 'mg/ml', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(9, 'g/l', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(10, 'mEq', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(11, 'mEq/L', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(12, 'mmol/L', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(13, 'mcg/kg/min', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(14, 'UI', '2023-11-28 21:16:46', '2023-11-28 21:16:46'),
(15, 'Sin unidad específica', '2023-11-28 21:16:46', '2023-11-28 21:16:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com', '$2y$10$3Bnai2SChUR1ZioqiD.EKuWfgHOXlnAI9sSa3NelzDr9/CDGymsjW', '04247537848', 'Coloncito calle 11', NULL, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(2, 'User1', 'user1@gmail.com', '$2y$10$uUKkzTXt9bvAEugS4.Q57uw4KDRKz2dLTNpS1u8YtpyFEah3taJcK', '04247537848', 'Coloncito calle 11', NULL, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(3, 'Director', 'tech@admin.com', '$2y$10$BEFqbtlG3HdsW95BIOEZo.S7kR0YXMBej0NapnW0.EdgoWVexLvGW', '04247537848', 'Coloncito calle 11', NULL, '2023-11-28 21:16:45', '2023-11-28 21:16:45'),
(4, 'User2', 'user2@gmail.com', '$2y$10$g3XqC8Xy11szLLEute2YUOqE5V7S52oQAP/PlTCBfm4HHk3HMMNFC', '04247537848', 'Coloncito calle 11', NULL, '2023-11-28 21:16:45', '2023-11-28 21:16:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departaments`
--
ALTER TABLE `departaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departaments_departament_name_unique` (`departament_name`),
  ADD KEY `departaments_state_fke_foreign` (`state_fke`),
  ADD KEY `departaments_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instruments_instrument_serial_code_unique` (`instrument_serial_code`),
  ADD KEY `instruments_departament_fke_foreign` (`departament_fke`),
  ADD KEY `instruments_condition_fke_foreign` (`condition_fke`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movements_movement_types_fke_foreign` (`movement_types_fke`),
  ADD KEY `movements_departament_fke_foreign` (`departament_fke`),
  ADD KEY `movements_supply_fke_foreign` (`supply_fke`);

--
-- Indices de la tabla `movement_types`
--
ALTER TABLE `movement_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplies_unit_fke_foreign` (`unit_fke`),
  ADD KEY `supplies_presentation_fke_foreign` (`presentation_fke`),
  ADD KEY `supplies_state_fke_foreign` (`state_fke`);

--
-- Indices de la tabla `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departaments`
--
ALTER TABLE `departaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movement_types`
--
ALTER TABLE `movement_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departaments`
--
ALTER TABLE `departaments`
  ADD CONSTRAINT `departaments_state_fke_foreign` FOREIGN KEY (`state_fke`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `departaments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_condition_fke_foreign` FOREIGN KEY (`condition_fke`) REFERENCES `conditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instruments_departament_fke_foreign` FOREIGN KEY (`departament_fke`) REFERENCES `departaments` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `movements_departament_fke_foreign` FOREIGN KEY (`departament_fke`) REFERENCES `departaments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movements_movement_types_fke_foreign` FOREIGN KEY (`movement_types_fke`) REFERENCES `movement_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movements_supply_fke_foreign` FOREIGN KEY (`supply_fke`) REFERENCES `supplies` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `supplies`
--
ALTER TABLE `supplies`
  ADD CONSTRAINT `supplies_presentation_fke_foreign` FOREIGN KEY (`presentation_fke`) REFERENCES `presentations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplies_state_fke_foreign` FOREIGN KEY (`state_fke`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplies_unit_fke_foreign` FOREIGN KEY (`unit_fke`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
