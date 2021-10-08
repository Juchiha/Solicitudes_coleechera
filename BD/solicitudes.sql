-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2021 a las 00:15:25
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
-- Base de datos: `solicitudes`
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
  `asi_sol_id_i` int(11) NOT NULL,
  `asi_fecha_aignacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_asignaciones`
--

INSERT INTO `sc_asignaciones` (`asi_id_i`, `asi_usu_tec_id_i`, `asi_fecha_d`, `asi_hor_id_i`, `asi_est_id_i`, `asi_observacion_v`, `asi_sol_id_i`, `asi_fecha_aignacion`) VALUES
(3, 2, '2021-09-21', 1, 1, 'Estamos probando esto a ver que pasa!', 2, NULL),
(4, 2, '2021-09-21', 3, 1, 'Esta es otra prueba!', 4, NULL),
(5, 2, '2021-09-21', 5, 1, 'Otra prueba a ver!', 5, NULL),
(6, 2, '2021-09-21', 8, 1, 'Pruebas de esta nuevamente!', 6, NULL),
(7, 2, '2021-09-20', 10, 1, 'Pruebas!', 9, NULL),
(14, 2, '2021-09-30', 2, 1, 'Esta es una prueba de asignacion!', 13, NULL),
(15, 2, '2021-10-07', 9, 1, 'por favor dejar todo en buen estado!', 14, NULL),
(16, 2, '2021-10-08', 10, 1, 'vamos a ver que sucede!', 15, NULL),
(17, 2, '2021-10-21', 7, 1, 'observen por favor!', 16, NULL);

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
(5, 'SOLUCIONADO'),
(6, 'SIN SOLUCIÓN'),
(7, 'EN CURSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_evidencia`
--

CREATE TABLE `sc_evidencia` (
  `id_evidencia_i` int(11) NOT NULL,
  `id_asig_i` int(11) NOT NULL,
  `ruta_evidencia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_evidencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'Esta es una prueba de asignacion!', 5, 13, '2021-09-29 17:47:10'),
(2, 'aqui estoy revisando esta parte a ver que sucede!', 2, 13, '2021-10-04 17:12:02'),
(3, 'Vamos a cerrarlo, para ver que sucede', 2, 13, '2021-10-04 17:16:51'),
(4, 'Prueba de solucion!', 2, 6, '2021-10-05 10:08:48'),
(5, 'cambie la observacion a ver que sucede,. primro', 5, 4, '2021-10-05 10:15:01'),
(6, 'otra vez la cambio', 5, 2, '2021-10-05 10:15:14'),
(7, 'nada que observar', 5, 5, '2021-10-05 10:15:25'),
(8, 'esta es una incidencia que no se resolvio, vamos a ver que sucede!', 2, 9, '2021-10-05 10:19:40'),
(9, 'sigue el trabajo del tecnico', 2, 9, '2021-10-05 10:23:18'),
(10, 'solucionado', 2, 5, '2021-10-05 10:23:31'),
(11, 'Solucionado!!!', 2, 9, '2021-10-05 10:27:04'),
(12, 'Solucionado!!!', 2, 9, '2021-10-05 10:27:13'),
(13, 'Listo quedo solucionado!', 2, 4, '2021-10-05 10:31:30'),
(14, 'ya esta arreglado el tema!', 2, 2, '2021-10-05 10:43:11'),
(15, 'por favor dejar todo en buen estado!', 5, 14, '2021-10-05 10:55:30'),
(16, 'vamos a ver que sucede!', 5, 15, '2021-10-05 10:57:06'),
(17, 'observen por favor!', 5, 16, '2021-10-05 10:58:43');

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
(2, 'ADMINISTRADOR', 1, 1, 1, 1),
(3, 'CLIENTE', 0, 0, 0, 0),
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
  `sol_ban_id_i` int(11) DEFAULT NULL,
  `sol_fecha_solucion` date DEFAULT NULL,
  `sol_ruta_ot_v` varchar(255) NOT NULL,
  `sol_id_tps_i` int(11) NOT NULL,
  `sol_aplica_i` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_solicitudes`
--

INSERT INTO `sc_solicitudes` (`sol_id_i`, `sol_suc_id_i`, `sol_tec_usu_id_i`, `sol_fecha_solicitud_d`, `sol_hora_cita_v`, `sol_requerimiento_t`, `sol_orden_trabajo`, `sol_observaciones_t`, `sol_prio_id`, `sol_est_id_i`, `sol_fecha_cita_d`, `sol_usu_id_i`, `sol_ban_id_i`, `sol_fecha_solucion`, `sol_ruta_ot_v`, `sol_id_tps_i`, `sol_aplica_i`) VALUES
(2, 3, 0, '2021-09-15', NULL, 'Ayuda!!! Ayuda!!!', '202109152', 'ya esta arreglado el tema!', 2, 5, NULL, 1, 1, '2021-10-05', '', 0, 0),
(4, 3, 0, '2021-09-15', NULL, 'Ayuda!!! Ayuda!!!', '202109155', 'Listo quedo solucionado!', 1, 5, NULL, 1, 1, '2021-10-05', '', 0, 0),
(5, 3, 0, '2021-09-15', NULL, 'Ayuda!!!', '202109156', 'solucionado', 3, 5, NULL, 1, 1, NULL, '', 0, 0),
(6, 3, 0, '2021-09-15', NULL, 'Ayuda!!!', '202109157', 'Prueba de solucion!', 2, 5, NULL, 1, 1, NULL, '', 0, 0),
(9, 3, 0, '2021-09-15', NULL, 'Hola!!', '2021091510', 'Solucionado!!!', 3, 5, NULL, 1, 1, NULL, '', 0, 0),
(13, 3, 0, '2021-09-23', NULL, 'urgente', '202109233', 'Vamos a cerrarlo, para ver que sucede', 2, 5, NULL, 5, 1, NULL, '', 0, 0),
(15, 2, 2, '2021-10-05', NULL, 'Vamos a modificar todo el cableado estructural del sitio!', '202110052', 'vamos a ver que sucede!', 1, 4, NULL, 5, 1, NULL, '', 0, 0),
(16, 3, 2, '2021-10-05', NULL, 'Pruebas nbuevam,entye!', '202110053', 'observen por favor!', 1, 4, NULL, 5, 1, NULL, '', 0, 0);

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
-- Estructura de tabla para la tabla `sc_tipo_servicio`
--

CREATE TABLE `sc_tipo_servicio` (
  `id_tps_i` int(11) DEFAULT NULL,
  `desc_tps_v` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `usu_password_v` varchar(255) NOT NULL,
  `usu_correo_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_usuarios`
--

INSERT INTO `sc_usuarios` (`usu_id_i`, `usu_tip_doc_id_i`, `usu_documento_v`, `usu_nombre_v`, `usu_apellido_v`, `usu_per_id_i`, `usu_est_id_i`, `usu_banco_i`, `usu_fecha_registro_d`, `usu_usuario_v`, `usu_password_v`, `usu_correo_v`) VALUES
(2, 1, '1143231494', 'Jose David X', 'Giron Martinez', 4, 1, 1, '2021-09-20', 'jgiron', 'e10adc3949ba59abbe56e057f20f883e', ''),
(3, 2, '90012850602', 'Juan Sebastian', 'Veron', 3, 0, 2, '2021-10-06', 'jveron', 'e10adc3949ba59abbe56e057f20f883e', ''),
(5, 4, '7789654-8', 'ID345 Solutions', 'SAS', 2, 0, 1, '2021-09-20', 'id345', 'e10adc3949ba59abbe56e057f20f883e', ''),
(6, 2, '988989', 'sadio', 'cetre', 4, 1, 1, '2021-10-06', 'sadio10', 'fcea920f7412b5da7be0cf42b8c93759', 'sadio10@meet.com'),
(7, 1, '79.898.909', 'JUAN CARLOS', 'BARRETO DIAZ', 4, 1, 1, '2021-10-06', 'JBARRETO', 'bfda238a0eb04e16f50dbb43ff7ad391', ''),
(8, 1, '1.064.977.677', 'DAIRO DAVID', 'MARTELO YANEZ', 4, 1, 1, '2021-10-06', 'DMARTELO', '88a22850d8a2e3277839786fe5187f35', ''),
(9, 1, '1.070.750.699', 'EDWUIN ALBEIRO', 'RODRIGUEZ RODRIGUEZ', 4, 1, 1, '2021-10-06', 'ERODRIGUEZ', '9d6191901a49e4b1ab987c58f59ae200', ''),
(10, 1, '11.245.779', 'HUGO HERNAN ', 'MORA', 4, 1, 1, '2021-10-06', 'HMORA', '9f977baf63ab836a92edb7a08a3c6287', ''),
(11, 1, '1.030.580.088', 'JEFFERSON', 'CASTAÑEDA DUQUE', 4, 1, 1, '2021-10-06', 'JCASTAÑEDA', '8aa804372f2d514b0b3897ce38f13ba3', ''),
(12, 1, '93123660', 'JOSE IVAN', 'CASTAÑEDA GARCIA', 4, 1, 1, '2021-10-06', 'JCASTAÑEDAG', '6eaaa7f448f2dec8a985b0928765c532', ''),
(13, 1, ' 1070754093', 'MICHEL STIVEN', 'RODRIGUEZ RINCON', 4, 1, 1, '2021-10-06', 'MRODRIGUEZ', 'aa321f5c1b976451a6cb79a771fa85c1', ''),
(14, 1, '3155716', 'RAUL ARNULFO', 'RODRIGUEZ GONZALEZ', 4, 1, 1, '2021-10-06', 'RRODRIGUEZ', 'bd7607cc2bd7f27d3dcb8272392de66b', ''),
(15, 1, '18877506', 'WILMER EDUARDO', 'GARCIA JARABA', 1, 1, 1, '2021-10-06', 'WGARCIA ', '96028d75203a92231ad26ac34d8f3094', ''),
(16, 1, '1075312638', 'ANDRES FELIPE', 'VANEGAS CORTES', 1, 1, 1, '2021-10-06', 'AVANEGAS ', '58486c956323afd7deee089011c8b23d', ''),
(17, 1, '1033775734', 'JEISSON', 'RODRIGUEZ JIMENEZ', 4, 1, 1, '2021-10-06', 'JRODRIGUEZ ', '1e33e212d8f0305ec82d6317adc11685', '');

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
-- Indices de la tabla `sc_evidencia`
--
ALTER TABLE `sc_evidencia`
  ADD PRIMARY KEY (`id_evidencia_i`);

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
  MODIFY `asi_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sc_bancos`
--
ALTER TABLE `sc_bancos`
  MODIFY `ban_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sc_estados`
--
ALTER TABLE `sc_estados`
  MODIFY `est_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sc_evidencia`
--
ALTER TABLE `sc_evidencia`
  MODIFY `id_evidencia_i` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sc_horas`
--
ALTER TABLE `sc_horas`
  MODIFY `hor_id_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sc_observaciones`
--
ALTER TABLE `sc_observaciones`
  MODIFY `obs_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `sol_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `usu_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
