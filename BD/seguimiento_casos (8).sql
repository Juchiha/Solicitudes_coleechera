-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 02:15:20
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento_casos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `ciu_id_i` int(11) NOT NULL,
  `ciu_ciu_v` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`ciu_id_i`, `ciu_ciu_v`) VALUES
(1, 'Bogota'),
(2, 'Barranquilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_asignaciones`
--

CREATE TABLE `sc_asignaciones` (
  `asi_id_i` int(11) NOT NULL,
  `asi_usu_tec_id_i` int(11) NOT NULL,
  `asi_fecha_d` date NOT NULL,
  `asi_hor_id_i` int(11) NOT NULL,
  `asi_est_id_i` int(11) NOT NULL,
  `asi_observacion_v` text DEFAULT NULL,
  `asi_sol_id_i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_asignaciones`
--

INSERT INTO `sc_asignaciones` (`asi_id_i`, `asi_usu_tec_id_i`, `asi_fecha_d`, `asi_hor_id_i`, `asi_est_id_i`, `asi_observacion_v`, `asi_sol_id_i`) VALUES
(3, 2, '2021-09-21', 1, 1, 'Estamos probando esto a ver que pasa!', 2),
(4, 2, '2021-09-21', 3, 1, 'Esta es otra prueba!', 4),
(5, 2, '2021-09-21', 5, 1, 'Otra prueba a ver!', 5),
(6, 2, '2021-09-21', 8, 1, 'Pruebas de esta nuevamente!', 6),
(7, 2, '2021-09-20', 10, 1, 'Pruebas!', 9),
(8, 2, '2021-09-22', 1, 1, 'La gente me critica porque ahora ya no soy parrandero', 7),
(10, 2, '2021-09-21', 3, 1, 'Pruiabdnap', 3),
(13, 2, '2021-09-23', 1, 1, '', 1),
(14, 2, '2021-09-30', 2, 1, 'Esta es una prueba de asignacion!', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_bancos`
--

CREATE TABLE `sc_bancos` (
  `ban_id_i` int(11) NOT NULL,
  `ban_nombre_v` varchar(255) NOT NULL,
  `ban_est_id_i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_bancos`
--

INSERT INTO `sc_bancos` (`ban_id_i`, `ban_nombre_v`, `ban_est_id_i`) VALUES
(1, 'BANCOLOMBIA', 1),
(2, 'DAVIVIENDA', 1),
(3, 'BBVA', 2),
(5, 'BANCO PICHINCHA', 1),
(6, 'BANCO SANTANDER', 1),
(8, 'BANCO IMPERIAL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_estados`
--

CREATE TABLE `sc_estados` (
  `est_id_i` int(11) NOT NULL,
  `est_nombre_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_estados`
--

INSERT INTO `sc_estados` (`est_id_i`, `est_nombre_v`) VALUES
(1, 'ACTIVO'),
(2, 'NO ACTIVO'),
(3, 'PENDIENTE'),
(4, 'ASIGNADO'),
(5, 'TERMINADO'),
(6, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_horas`
--

CREATE TABLE `sc_horas` (
  `hor_id_id` int(11) NOT NULL,
  `hor_desc_v` varchar(20) NOT NULL,
  `hor_militar_v` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_horas`
--

INSERT INTO `sc_horas` (`hor_id_id`, `hor_desc_v`, `hor_militar_v`) VALUES
(1, '08:00 AM', '08:00'),
(2, '09:00 AM', '09:00'),
(3, '10:00 AM', '10:00'),
(4, '11:00 AM', '11:00'),
(5, '12:00 PM', '12:00'),
(6, '01:00 PM', '13:00'),
(7, '02:00 PM', '14:00'),
(8, '03:00 PM', '15:00'),
(9, '04:00 PM', '16:00'),
(10, '05:00 PM', '17:00'),
(11, '06:00 PM', '18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_observaciones`
--

CREATE TABLE `sc_observaciones` (
  `obs_id_i` int(11) NOT NULL,
  `obs_desc_v` text COLLATE utf8_spanish_ci NOT NULL,
  `obs_usu_id_i` int(11) NOT NULL,
  `obs_sol_id_i` int(11) NOT NULL,
  `obs_fecha_d` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sc_observaciones`
--

INSERT INTO `sc_observaciones` (`obs_id_i`, `obs_desc_v`, `obs_usu_id_i`, `obs_sol_id_i`, `obs_fecha_d`) VALUES
(1, 'Esta es una prueba de asignacion!', 5, 13, '2021-09-29 17:47:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_perfiles`
--

CREATE TABLE `sc_perfiles` (
  `perf_id_i` int(11) NOT NULL,
  `perf_nombre_v` varchar(255) NOT NULL,
  `perf_asig_i` int(11) NOT NULL DEFAULT 0,
  `perf_add_i` int(11) NOT NULL DEFAULT 0,
  `perf_upd_i` int(11) NOT NULL DEFAULT 0,
  `perf_del_i` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_perfiles`
--

INSERT INTO `sc_perfiles` (`perf_id_i`, `perf_nombre_v`, `perf_asig_i`, `perf_add_i`, `perf_upd_i`, `perf_del_i`) VALUES
(1, 'SUPERADMINISTRADOR', 1, 0, 0, 0),
(2, 'ADMINISTRADOR', 0, 1, 1, 1),
(3, 'USUARIO', 0, 0, 0, 0),
(4, 'TECNICO', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_prioridades`
--

CREATE TABLE `sc_prioridades` (
  `pri_id_i` int(10) NOT NULL,
  `pri_desc_v` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sc_prioridades`
--

INSERT INTO `sc_prioridades` (`pri_id_i`, `pri_desc_v`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_solicitudes`
--

CREATE TABLE `sc_solicitudes` (
  `sol_id_i` int(11) NOT NULL,
  `sol_suc_id_i` int(11) NOT NULL,
  `sol_tec_usu_id_i` int(11) DEFAULT NULL,
  `sol_fecha_solicitud_d` date NOT NULL,
  `sol_hora_cita_v` int(11) DEFAULT NULL,
  `sol_requerimiento_t` text NOT NULL,
  `sol_orden_trabajo` varchar(255) DEFAULT NULL,
  `sol_observaciones_t` text NOT NULL,
  `sol_prio_id` int(10) NOT NULL,
  `sol_est_id_i` int(11) NOT NULL,
  `sol_fecha_cita_d` date DEFAULT NULL,
  `sol_usu_id_i` int(11) DEFAULT NULL,
  `sol_ban_id_i` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_solicitudes`
--

INSERT INTO `sc_solicitudes` (`sol_id_i`, `sol_suc_id_i`, `sol_tec_usu_id_i`, `sol_fecha_solicitud_d`, `sol_hora_cita_v`, `sol_requerimiento_t`, `sol_orden_trabajo`, `sol_observaciones_t`, `sol_prio_id`, `sol_est_id_i`, `sol_fecha_cita_d`, `sol_usu_id_i`, `sol_ban_id_i`) VALUES
(1, 2, NULL, '2021-09-15', NULL, 'Ayuda!!!', '202109151', 'por Favor!!!', 0, 4, NULL, 1, 1),
(2, 3, NULL, '2021-09-15', NULL, 'Ayuda!!! Ayuda!!!', '202109152', 'Por Favor!!! Por Favor!!!', 0, 4, NULL, 1, 1),
(3, 2, NULL, '2021-09-15', NULL, 'Ayuda!!!', '202109153', 'por Favor!!!', 0, 4, NULL, 1, 1),
(4, 3, NULL, '2021-09-15', NULL, 'Ayuda!!! Ayuda!!!', '202109155', 'por Favor!!!', 0, 4, NULL, 1, 1),
(5, 3, NULL, '2021-09-15', NULL, 'Ayuda!!!', '202109156', 'por Favor!!!', 0, 4, NULL, 1, 1),
(6, 3, 2, '2021-09-15', NULL, 'Ayuda!!!', '202109157', 'por Favor!!! por favor1 ', 2, 4, NULL, 1, 1),
(7, 2, NULL, '2021-09-15', NULL, 'Ayuda!!!', '202109158', 'por Favor!!!', 0, 4, NULL, 1, 1),
(9, 3, 0, '2021-09-15', NULL, 'Hola!!', '2021091510', 'Ayuda!!', 3, 4, NULL, 1, 1),
(11, 2, NULL, '2021-09-20', NULL, 'ayudaaaaa', '202109202', 'Ayudaaaaaaaaa', 0, 3, NULL, 5, 1),
(12, 2, NULL, '2021-09-23', NULL, 'ayuda', '202109232', 'Mantenimiento planeado', 0, 3, NULL, 5, 1),
(13, 3, NULL, '2021-09-23', NULL, 'urgente', '202109233', 'Mantenimiento segundo nivel', 2, 4, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_sucursales`
--

CREATE TABLE `sc_sucursales` (
  `suc_id_id` int(11) NOT NULL,
  `suc_nombre_v` varchar(255) NOT NULL,
  `suc_ban_id_i` int(11) NOT NULL,
  `suc_codigo_v` varchar(255) NOT NULL,
  `suc_ciu_id_i` int(11) NOT NULL,
  `suc_direccion_v` varchar(255) NOT NULL,
  `suc_est_id_i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_sucursales`
--

INSERT INTO `sc_sucursales` (`suc_id_id`, `suc_nombre_v`, `suc_ban_id_i`, `suc_codigo_v`, `suc_ciu_id_i`, `suc_direccion_v`, `suc_est_id_i`) VALUES
(2, 'Bancolombia 72', 1, '080014', 1, 'Calle 6N 102 - 39', 1),
(3, 'Bancolombia 19', 1, '080108', 2, 'Avenida 19 Caracas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_tipo_documento`
--

CREATE TABLE `sc_tipo_documento` (
  `tipd_id_i` int(11) NOT NULL,
  `tipd_descripcion_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_tipo_documento`
--

INSERT INTO `sc_tipo_documento` (`tipd_id_i`, `tipd_descripcion_v`) VALUES
(1, 'Cedula Ciudadanía'),
(2, 'Cedula de Extranjeria'),
(3, 'Pasaporte'),
(4, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_usuarios`
--

CREATE TABLE `sc_usuarios` (
  `usu_id_i` int(11) NOT NULL,
  `usu_tip_doc_id_i` int(11) NOT NULL,
  `usu_documento_v` varchar(30) NOT NULL,
  `usu_nombre_v` varchar(25) NOT NULL,
  `usu_apellido_v` varchar(25) NOT NULL,
  `usu_per_id_i` int(11) NOT NULL,
  `usu_est_id_i` int(11) NOT NULL,
  `usu_banco_i` int(11) NOT NULL,
  `usu_fecha_registro_d` date NOT NULL,
  `usu_usuario_v` varchar(255) NOT NULL,
  `usu_password_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_usuarios`
--

INSERT INTO `sc_usuarios` (`usu_id_i`, `usu_tip_doc_id_i`, `usu_documento_v`, `usu_nombre_v`, `usu_apellido_v`, `usu_per_id_i`, `usu_est_id_i`, `usu_banco_i`, `usu_fecha_registro_d`, `usu_usuario_v`, `usu_password_v`) VALUES
(2, 1, '1143231494', 'Jose David X', 'Giron Martinez', 4, 1, 1, '2021-09-20', 'jgiron', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 2, '90012850602', 'Juan Sebastian', 'Veron', 3, 0, 1, '2021-09-20', 'jveron', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 4, '7789654-8', 'ID345 Solutions', 'SAS', 2, 0, 1, '2021-09-20', 'id345', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`ciu_id_i`);

--
-- Indices de la tabla `sc_asignaciones`
--
ALTER TABLE `sc_asignaciones`
  ADD PRIMARY KEY (`asi_id_i`);

--
-- Indices de la tabla `sc_bancos`
--
ALTER TABLE `sc_bancos`
  ADD PRIMARY KEY (`ban_id_i`);

--
-- Indices de la tabla `sc_estados`
--
ALTER TABLE `sc_estados`
  ADD PRIMARY KEY (`est_id_i`);

--
-- Indices de la tabla `sc_horas`
--
ALTER TABLE `sc_horas`
  ADD PRIMARY KEY (`hor_id_id`);

--
-- Indices de la tabla `sc_observaciones`
--
ALTER TABLE `sc_observaciones`
  ADD PRIMARY KEY (`obs_id_i`);

--
-- Indices de la tabla `sc_perfiles`
--
ALTER TABLE `sc_perfiles`
  ADD PRIMARY KEY (`perf_id_i`);

--
-- Indices de la tabla `sc_prioridades`
--
ALTER TABLE `sc_prioridades`
  ADD PRIMARY KEY (`pri_id_i`);

--
-- Indices de la tabla `sc_solicitudes`
--
ALTER TABLE `sc_solicitudes`
  ADD PRIMARY KEY (`sol_id_i`);

--
-- Indices de la tabla `sc_sucursales`
--
ALTER TABLE `sc_sucursales`
  ADD PRIMARY KEY (`suc_id_id`);

--
-- Indices de la tabla `sc_tipo_documento`
--
ALTER TABLE `sc_tipo_documento`
  ADD PRIMARY KEY (`tipd_id_i`);

--
-- Indices de la tabla `sc_usuarios`
--
ALTER TABLE `sc_usuarios`
  ADD PRIMARY KEY (`usu_id_i`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `ciu_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sc_asignaciones`
--
ALTER TABLE `sc_asignaciones`
  MODIFY `asi_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sc_bancos`
--
ALTER TABLE `sc_bancos`
  MODIFY `ban_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sc_estados`
--
ALTER TABLE `sc_estados`
  MODIFY `est_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sc_horas`
--
ALTER TABLE `sc_horas`
  MODIFY `hor_id_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sc_observaciones`
--
ALTER TABLE `sc_observaciones`
  MODIFY `obs_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sc_perfiles`
--
ALTER TABLE `sc_perfiles`
  MODIFY `perf_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sc_prioridades`
--
ALTER TABLE `sc_prioridades`
  MODIFY `pri_id_i` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sc_solicitudes`
--
ALTER TABLE `sc_solicitudes`
  MODIFY `sol_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sc_sucursales`
--
ALTER TABLE `sc_sucursales`
  MODIFY `suc_id_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sc_tipo_documento`
--
ALTER TABLE `sc_tipo_documento`
  MODIFY `tipd_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sc_usuarios`
--
ALTER TABLE `sc_usuarios`
  MODIFY `usu_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
