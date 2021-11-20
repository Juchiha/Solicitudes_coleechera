-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2021 a las 03:53:16
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
-- Base de datos: `incidencias_coolechera`
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
-- Estructura de tabla para la tabla `sc_areas_cool`
--

CREATE TABLE `sc_areas_cool` (
  `are_id_i` int(11) NOT NULL,
  `are_desc_v` varchar(255) NOT NULL,
  `are_est_id_i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_areas_cool`
--

INSERT INTO `sc_areas_cool` (`are_id_i`, `are_desc_v`, `are_est_id_i`) VALUES
(1, 'Gerencia General', 1),
(2, 'Juridica', 1),
(3, 'Producción', 1),
(4, 'Abastecimiento', 1),
(5, 'Producción', 1),
(6, 'Logística', 1),
(7, 'Gestión Humana', 1),
(8, 'Mantenimiento', 1),
(9, 'Metrología', 1),
(10, 'TICS', 1),
(11, 'Tesorería', 1),
(12, 'Calidad e inocuidad', 1),
(13, 'Contabilidad', 1),
(14, 'Credito y Cobranza', 1),
(15, 'Consignantes', 1),
(16, 'Archivo y Correspondencia', 1),
(17, 'Servicios Generales', 1),
(18, 'Control Calidad', 1),
(19, 'CDA', 1),
(20, 'Almacenes Ganaderos', 1),
(21, 'Control Interno', 1),
(22, 'Gestión ambiental', 1),
(23, 'Servicio al asociado', 1),
(24, 'Seguridad física', 1),
(25, 'Planta Cartagena', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_clientes`
--

CREATE TABLE `sc_clientes` (
  `cli_id_i` int(11) NOT NULL,
  `cli_nombre_v` varchar(255) NOT NULL,
  `cli_fecha_ingreso_d` date NOT NULL,
  `cli_documento_v` varchar(255) NOT NULL,
  `cli_numero_empleado_v` varchar(255) NOT NULL,
  `cli_usuario_red_v` varchar(255) DEFAULT NULL,
  `cli_usuario_sap_v` varchar(255) DEFAULT NULL,
  `cli_cargo_v` varchar(255) DEFAULT NULL,
  `cli_area_i` int(11) DEFAULT NULL,
  `cli_ciu_id_i` int(11) NOT NULL,
  `cli_planta_id_i` int(11) NOT NULL,
  `cli_direccion_v` varchar(255) NOT NULL,
  `cli_fecha_c` timestamp NOT NULL DEFAULT current_timestamp(),
  `cli_est_id_i` int(11) NOT NULL,
  `cli_tip_sol_id_i` int(11) DEFAULT NULL,
  `cli_correo_v` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_clientes`
--

INSERT INTO `sc_clientes` (`cli_id_i`, `cli_nombre_v`, `cli_fecha_ingreso_d`, `cli_documento_v`, `cli_numero_empleado_v`, `cli_usuario_red_v`, `cli_usuario_sap_v`, `cli_cargo_v`, `cli_area_i`, `cli_ciu_id_i`, `cli_planta_id_i`, `cli_direccion_v`, `cli_fecha_c`, `cli_est_id_i`, `cli_tip_sol_id_i`, `cli_correo_v`) VALUES
(17, 'Jose David Giron', '2021-10-21', '1143231494', '012585', 'Jgiron9001i8', 'jgiron9001', 'Desarrollador', 7, 0, 1, '0', '2021-10-30 02:01:07', 1, 1, 'luis.mendoza@coolechera.com'),
(18, 'Juan sebastian Veron', '2021-11-02', '90012850602', '098979798', 'juan.veron', 'Kuan.verom', 'venom let there by carnage', 19, 0, 18, '0', '2021-11-05 20:36:45', 1, 1, 'josegiron@outlook.es');

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
-- Estructura de tabla para la tabla `sc_observaciones`
--

CREATE TABLE `sc_observaciones` (
  `obs_id_i` int(11) NOT NULL,
  `obs_desc_v` text COLLATE utf8_spanish_ci NOT NULL,
  `obs_usu_id_i` int(11) NOT NULL,
  `obs_sol_id_i` int(11) NOT NULL,
  `obs_fecha_d` datetime NOT NULL,
  `obs_ruta_evidencia` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_oficinas`
--

CREATE TABLE `sc_oficinas` (
  `ofi_id_i` int(11) NOT NULL,
  `ofi_direccion_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_oficinas`
--

INSERT INTO `sc_oficinas` (`ofi_id_i`, `ofi_direccion_v`) VALUES
(1, 'Cra 9G No. 110 - 187 Local 29 Centro empresarial Caribe Verde'),
(2, 'Calle 74 Cra 49 Esquina'),
(3, 'Kr 43 # 60 - Esquina/'),
(4, 'BARRANQUILLA CARRERA 43 #59-43'),
(5, 'CL 17 No. 16-55'),
(6, 'BARRANQUILLA CALLE 110 # 31-15'),
(7, 'Cll 18 # 19-66'),
(8, 'Cra 1 No. 22 - 70'),
(9, 'Transversal 51#21-36'),
(10, 'Km 10 de noviembre - vía al pa'),
(11, 'Km 8 vía Valledupar/'),
(12, 'Cll 2B # 7 - 80/P'),
(13, 'Cra 3B Cll 21B'),
(14, 'Cra. 7 # 4 - 04  Barrio Monse'),
(15, 'Cll 10 # 9 - 67'),
(16, 'Cll 1 # 3-55 Barrio La Magdale'),
(17, 'Cra. 15 # 10 - 03 Barrio Guaya'),
(18, 'Cll 12 # 27 - Carretera la Cor'),
(19, 'Cra. 29 # 24 - 31 Barrio San J'),
(20, 'Cra 20 # 17-26 Barrio las Flor'),
(21, 'Km 3 Vía Gaira – Parque Industrial logístico – Bod'),
(22, 'Parque Industrial El Maizal Bo'),
(23, 'Cll 30 # 26 - 121 Vía al aerop'),
(24, 'BARRANQUILLA  CALLE 30 # 26-1'),
(25, 'Manzana C Bodega 6  en el Parq'),
(26, 'ANZANA C BOD 6 PARQUE INDISTRI');

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
(3, 'USUARIO', 0, 0, 0, 0),
(4, 'EQUIPO DE INFORMATICA', 0, 0, 0, 0);

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
-- Estructura de tabla para la tabla `sc_servicios`
--

CREATE TABLE `sc_servicios` (
  `serv_id_i` int(11) NOT NULL,
  `serv_desc_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_servicios`
--

INSERT INTO `sc_servicios` (`serv_id_i`, `serv_desc_v`) VALUES
(1, 'Usuario de red'),
(2, 'Correo'),
(3, 'Usuario SAP'),
(4, 'Biman'),
(5, 'Acceso a Internet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_solicitudes_coolechera`
--

CREATE TABLE `sc_solicitudes_coolechera` (
  `sol_id_i` int(11) NOT NULL,
  `sol_tip_sol_id_i` int(11) NOT NULL,
  `sol_clie_id_i` int(11) NOT NULL,
  `sol_contacto_v` varchar(255) DEFAULT NULL,
  `sol_tel_v` varchar(20) DEFAULT NULL,
  `sol_correo_v` varchar(255) DEFAULT NULL,
  `sol_orden_trabajo_v` varchar(20) DEFAULT NULL,
  `sol_fecha_solicitud` date DEFAULT NULL,
  `sol_asignado_a_i` int(11) DEFAULT NULL,
  `sol_fecha_solucion_d` date DEFAULT NULL,
  `sol_estado_i` int(11) DEFAULT NULL,
  `sol_equipo_v` varchar(11) DEFAULT NULL,
  `sol_equipo_observacion_t` text DEFAULT NULL,
  `sol_soft_especial_v` varchar(11) DEFAULT NULL,
  `sol_configura_imp_v` varchar(100) DEFAULT NULL,
  `sol_observacion_software_t` text DEFAULT NULL,
  `sol_telefonia_fija_v` varchar(100) DEFAULT NULL,
  `sol_celular_v` varchar(100) DEFAULT NULL,
  `sol_observacion_telefonia_t` text DEFAULT NULL,
  `sol_vpn_v` varchar(11) DEFAULT NULL,
  `sol_observacion_vpn_t` text DEFAULT NULL,
  `sol_otro_req_v` varchar(11) DEFAULT NULL,
  `sol_observacion_otro_r_t` text DEFAULT NULL,
  `sol_prioridad_i` int(11) DEFAULT NULL,
  `inc_req_usuario_red_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_correo_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_usuario_sap_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_biman_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_acceso_in_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_consig_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_gil_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_query_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_det_usu_red_i` int(11) DEFAULT NULL,
  `inc_req_obs_usu_red_observ_v` varchar(700) DEFAULT NULL,
  `inc_req_det_correo_i` int(11) DEFAULT NULL,
  `inc_req_det_correo_obse_v` varchar(700) DEFAULT NULL,
  `inc_req_det_obser_biman_v` varchar(700) DEFAULT NULL,
  `inc_req_det_obser_gil_v` varchar(700) DEFAULT NULL,
  `inc_req_det_obser_consign_v` varchar(700) DEFAULT NULL,
  `inc_req_det_obser_query_v` varchar(700) DEFAULT NULL,
  `inc_req_det_sap` int(11) DEFAULT NULL,
  `inc_req_det_sap_obser_v` varchar(700) DEFAULT NULL,
  `inc_req_det_sap_accesos_i` int(11) DEFAULT NULL,
  `inc_req_det_sap_produc_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_det_sap_desarr_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_det_sap_cali_i` int(11) NOT NULL DEFAULT 0,
  `inc_req_det_obser_internet_acc_v` varchar(700) DEFAULT NULL,
  `inc_ruta_evi_p_v` varchar(255) DEFAULT NULL,
  `inc_ruta_evi_s_v` varchar(255) DEFAULT NULL,
  `sol_tipo_sol_id_i` int(11) DEFAULT NULL,
  `sol_obser_impresora_v` varchar(500) DEFAULT NULL,
  `sol_obser_telefonia_fija_v` varchar(500) DEFAULT NULL,
  `sol_obser_telefonia_cel_v` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_solicitudes_coolechera`
--

INSERT INTO `sc_solicitudes_coolechera` (`sol_id_i`, `sol_tip_sol_id_i`, `sol_clie_id_i`, `sol_contacto_v`, `sol_tel_v`, `sol_correo_v`, `sol_orden_trabajo_v`, `sol_fecha_solicitud`, `sol_asignado_a_i`, `sol_fecha_solucion_d`, `sol_estado_i`, `sol_equipo_v`, `sol_equipo_observacion_t`, `sol_soft_especial_v`, `sol_configura_imp_v`, `sol_observacion_software_t`, `sol_telefonia_fija_v`, `sol_celular_v`, `sol_observacion_telefonia_t`, `sol_vpn_v`, `sol_observacion_vpn_t`, `sol_otro_req_v`, `sol_observacion_otro_r_t`, `sol_prioridad_i`, `inc_req_usuario_red_i`, `inc_req_correo_i`, `inc_req_usuario_sap_i`, `inc_req_biman_i`, `inc_req_acceso_in_i`, `inc_req_consig_i`, `inc_req_gil_i`, `inc_req_query_i`, `inc_req_det_usu_red_i`, `inc_req_obs_usu_red_observ_v`, `inc_req_det_correo_i`, `inc_req_det_correo_obse_v`, `inc_req_det_obser_biman_v`, `inc_req_det_obser_gil_v`, `inc_req_det_obser_consign_v`, `inc_req_det_obser_query_v`, `inc_req_det_sap`, `inc_req_det_sap_obser_v`, `inc_req_det_sap_accesos_i`, `inc_req_det_sap_produc_i`, `inc_req_det_sap_desarr_i`, `inc_req_det_sap_cali_i`, `inc_req_det_obser_internet_acc_v`, `inc_ruta_evi_p_v`, `inc_ruta_evi_s_v`, `sol_tipo_sol_id_i`, `sol_obser_impresora_v`, `sol_obser_telefonia_fija_v`, `sol_obser_telefonia_cel_v`) VALUES
(4, 1, 12, NULL, NULL, NULL, '20211029', '2021-10-29', 2, NULL, 3, 'ESCRITORIO', 'Se me daño el mio', 'SI', 'BLAYNEG', 'Office, Netbeans, Eclipse', 'LOCAL', 'NUEVO', NULL, 'SI', 'como voy a entrar a el ambiente para probar? sn VPN', '0', NULL, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 'Quiero tener un nuevo usuario de Red por favor', 0, '', 'Necesito acceso a Biman', 'Necesito Acceso a GIL', '', 'Necesito acceso a Query tambien.', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(5, 1, 13, NULL, NULL, NULL, '20211029', '2021-10-29', 2, NULL, 3, 'ESCRITORIO', 'Se me daño el mio', 'SI', 'BLAYNEG', 'Office, Netbeans, Eclipse', 'LOCAL', 'NUEVO', NULL, 'SI', 'como voy a entrar a el ambiente para probar? sn VPN', '0', NULL, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 'Quiero tener un nuevo usuario de Red por favor', 0, '', 'Necesito acceso a Biman', 'Necesito Acceso a GIL', '', 'Necesito acceso a Query tambien.', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(6, 1, 14, NULL, NULL, NULL, '202110297', '2021-10-29', 2, NULL, 3, 'ESCRITORIO', 'Se me daño el mio', 'SI', 'BLAYNEG', 'Office, Netbeans, Eclipse', 'LOCAL', 'NUEVO', NULL, 'SI', 'como voy a entrar a el ambiente para probar? sn VPN', '0', NULL, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 'Quiero tener un nuevo usuario de Red por favor', 0, '', 'Necesito acceso a Biman', 'Necesito Acceso a GIL', '', 'Necesito acceso a Query tambien.', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(7, 1, 15, NULL, NULL, NULL, '202110298', '2021-10-29', 2, NULL, 3, 'ESCRITORIO', 'Se me daño el mio', 'SI', 'BLAYNEG', 'Office, Netbeans, Eclipse', 'LOCAL', 'NUEVO', NULL, 'SI', 'como voy a entrar a el ambiente para probar? sn VPN', '0', NULL, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 'Quiero tener un nuevo usuario de Red por favor', 0, '', 'Necesito acceso a Biman', 'Necesito Acceso a GIL', '', 'Necesito acceso a Query tambien.', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(8, 1, 16, NULL, NULL, NULL, '202110299', '2021-10-29', 2, NULL, 4, 'ESCRITORIO', 'Se me daño el mio', 'SI', 'BLAYNEG', 'Office, Netbeans, Eclipse', 'LOCAL', 'NUEVO', NULL, 'SI', 'como voy a entrar a el ambiente para probar? sn VPN', '0', NULL, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 'Quiero tener un nuevo usuario de Red por favor', 0, '', 'Necesito acceso a Biman', 'Necesito Acceso a GIL', '', 'Necesito acceso a Query tambien.', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(9, 1, 17, NULL, NULL, NULL, '2021102910', '2021-11-03', 2, NULL, 3, 'ESCRITORIO', 'Se me daño el mio', 'SI', 'COLOR', 'Office, Netbeans, Eclipse', 'INTERNACIONAL', 'REPOSICION', NULL, 'NO', NULL, '0', NULL, 2, 1, 1, 0, 1, 1, 0, 1, 1, 1, 'Quiero tener un nuevo usuario de Red por favor', 2, 'Resulta que ncesito modificar esto', 'Necesito acceso a Biman', 'Necesito Acceso a GIL', '', 'Necesito acceso a Query tambien.', 0, '', 1, 0, 0, 0, 'Resulta que necesito entrar a internet tambien', '', '', NULL, NULL, NULL, NULL),
(10, 2, 17, NULL, NULL, NULL, '202111052', '2021-11-05', 2, NULL, 4, 'ESCRITORIO', 'No tengo Equipo!', '0', '0', NULL, 'LOCAL', '0', NULL, '0', NULL, '0', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'Quiero mi usuario por favor!', 0, '', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(11, 2, 17, NULL, NULL, NULL, '202111053', '2021-11-05', 2, NULL, 4, 'ESCRITORIO', 'No tengo Equipo!', '0', '0', NULL, 'LOCAL', '0', NULL, '0', NULL, '0', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'Quiero mi usuario por favor!', 0, '', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(12, 2, 17, NULL, NULL, NULL, '202111054', '2021-11-05', 2, NULL, 4, 'ESCRITORIO', 'No tengo Equipo!', '0', '0', NULL, 'LOCAL', '0', NULL, '0', NULL, '0', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'Quiero mi usuario por favor!', 0, '', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(13, 2, 17, NULL, NULL, NULL, '202111055', '2021-11-05', 2, NULL, 4, 'ESCRITORIO', 'No tengo Equipo!', '0', '0', NULL, 'LOCAL', '0', NULL, '0', NULL, '0', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'Quiero mi usuario por favor!', 0, '', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(14, 2, 17, NULL, NULL, NULL, '202111056', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 5, 'Ya quitenme eso de encima!', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(15, 2, 17, NULL, NULL, NULL, '202111057', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 1, 'ytytytretrty', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(16, 2, 17, NULL, NULL, NULL, '202111058', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 1, 'ytytytretrty', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(17, 2, 17, NULL, NULL, NULL, '202111059', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 1, 'ytytytretrty', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(18, 2, 17, NULL, NULL, NULL, '2021110510', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 1, 'ytytytretrty', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(19, 2, 17, NULL, NULL, NULL, '2021110511', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 1, 'ytytytretrty', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(20, 2, 17, NULL, NULL, NULL, '2021110512', '2021-11-05', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 1, 'ytytytretrty', '', '', '', '', 0, '', 1, 0, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(21, 1, 18, NULL, NULL, NULL, '2021110513', '2021-11-05', 2, NULL, 4, 'ESCRITORIO', 'No tengo equipo todavia', '0', 'BLAYNEG', NULL, 'LOCAL', 'REPOSICION', NULL, 'SI', 'Necesito la VPN para entrarle a los Guamasos', '0', NULL, 2, 0, 1, 1, 0, 0, 0, 0, 0, 0, '', 1, 'Esta es una prueba buevamentye', '', '', '', '', 3, 'Pruebas', 1, 1, 0, 0, '', '', '', NULL, NULL, NULL, NULL),
(22, 2, 17, NULL, NULL, NULL, '091120212', '2021-11-09', 2, NULL, 4, '1', 'Se me daño el equipo de compto por favor', '1', '0', 'Instalenle Office', '0', '0', NULL, '0', NULL, '0', NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', '', '', 0, '', 1, 0, 0, 0, '', 'views/inicidencias_img/395820211109161838.pdf', 'views/evidencias_img/665220211109161838.pdf', 2, NULL, NULL, NULL),
(23, 2, 17, NULL, NULL, NULL, '091120213', '2021-11-09', 2, NULL, 4, '0', NULL, '0', '0', NULL, '0', '0', NULL, '0', NULL, '0', NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 'Cambien ese susuairo', 0, 'Cambien ese correo', '', '', '', '', 0, '', 1, 0, 0, 0, '', 'views/inicidencias_img/337520211109164318.pdf', 'views/evidencias_img/222520211109164318.pdf', 3, NULL, NULL, NULL);

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
  `id_tps_i` int(11) NOT NULL,
  `desc_tps_v` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sc_tipo_servicio`
--

INSERT INTO `sc_tipo_servicio` (`id_tps_i`, `desc_tps_v`) VALUES
(1, 'Alta-Creación'),
(2, 'Modificación'),
(3, 'Bloqeo'),
(4, 'Desbloqueo'),
(5, 'Inhabilitación'),
(6, 'Eliminación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_tipo_servicio_sap`
--

CREATE TABLE `sc_tipo_servicio_sap` (
  `tip_ser_sap_id_i` int(11) NOT NULL,
  `tip_desc_sap_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_tipo_servicio_sap`
--

INSERT INTO `sc_tipo_servicio_sap` (`tip_ser_sap_id_i`, `tip_desc_sap_v`) VALUES
(1, 'Habilitación Permanente'),
(2, 'Habilitación Temporal'),
(3, 'Inhabilitación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_tipo_solicitante`
--

CREATE TABLE `sc_tipo_solicitante` (
  `tip_sol_id` int(11) NOT NULL,
  `tip_sol_descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_tipo_solicitante`
--

INSERT INTO `sc_tipo_solicitante` (`tip_sol_id`, `tip_sol_descripcion`) VALUES
(1, 'Colaborador Nuevo'),
(2, 'Colaborador Existente'),
(3, 'Personal externo Nuevo'),
(4, 'Personal externo Existente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sc_tipo_solicitud`
--

CREATE TABLE `sc_tipo_solicitud` (
  `tipo_sol_id_i` int(11) NOT NULL,
  `tipo_desc_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_tipo_solicitud`
--

INSERT INTO `sc_tipo_solicitud` (`tipo_sol_id_i`, `tipo_desc_v`) VALUES
(1, 'REQUERIMIENTO'),
(2, 'INCIDENTE'),
(3, 'MODIFICACION DE DATO');

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
  `usu_fecha_registro_d` date NOT NULL,
  `usu_usuario_v` varchar(255) NOT NULL,
  `usu_password_v` varchar(255) NOT NULL,
  `usu_correo_v` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sc_usuarios`
--

INSERT INTO `sc_usuarios` (`usu_id_i`, `usu_tip_doc_id_i`, `usu_documento_v`, `usu_nombre_v`, `usu_apellido_v`, `usu_per_id_i`, `usu_est_id_i`, `usu_fecha_registro_d`, `usu_usuario_v`, `usu_password_v`, `usu_correo_v`) VALUES
(2, 1, '1143231494', 'Jose David X', 'Giron Martinez', 4, 1, '2021-11-05', 'jgiron', 'e10adc3949ba59abbe56e057f20f883e', ''),
(3, 2, '90012850602', 'Juan Sebastian', 'Veron', 3, 0, '2021-09-20', 'jveron', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(5, 4, '7789654-8', 'ID345 Solutions', 'SAS', 2, 0, '2021-09-20', 'id345', 'e10adc3949ba59abbe56e057f20f883e', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`ciu_id_i`);

--
-- Indices de la tabla `sc_areas_cool`
--
ALTER TABLE `sc_areas_cool`
  ADD PRIMARY KEY (`are_id_i`);

--
-- Indices de la tabla `sc_clientes`
--
ALTER TABLE `sc_clientes`
  ADD PRIMARY KEY (`cli_id_i`);

--
-- Indices de la tabla `sc_estados`
--
ALTER TABLE `sc_estados`
  ADD PRIMARY KEY (`est_id_i`);

--
-- Indices de la tabla `sc_observaciones`
--
ALTER TABLE `sc_observaciones`
  ADD PRIMARY KEY (`obs_id_i`);

--
-- Indices de la tabla `sc_oficinas`
--
ALTER TABLE `sc_oficinas`
  ADD PRIMARY KEY (`ofi_id_i`);

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
-- Indices de la tabla `sc_servicios`
--
ALTER TABLE `sc_servicios`
  ADD PRIMARY KEY (`serv_id_i`);

--
-- Indices de la tabla `sc_solicitudes_coolechera`
--
ALTER TABLE `sc_solicitudes_coolechera`
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
-- Indices de la tabla `sc_tipo_servicio`
--
ALTER TABLE `sc_tipo_servicio`
  ADD PRIMARY KEY (`id_tps_i`);

--
-- Indices de la tabla `sc_tipo_servicio_sap`
--
ALTER TABLE `sc_tipo_servicio_sap`
  ADD PRIMARY KEY (`tip_ser_sap_id_i`);

--
-- Indices de la tabla `sc_tipo_solicitante`
--
ALTER TABLE `sc_tipo_solicitante`
  ADD PRIMARY KEY (`tip_sol_id`);

--
-- Indices de la tabla `sc_tipo_solicitud`
--
ALTER TABLE `sc_tipo_solicitud`
  ADD PRIMARY KEY (`tipo_sol_id_i`);

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
-- AUTO_INCREMENT de la tabla `sc_areas_cool`
--
ALTER TABLE `sc_areas_cool`
  MODIFY `are_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `sc_clientes`
--
ALTER TABLE `sc_clientes`
  MODIFY `cli_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sc_estados`
--
ALTER TABLE `sc_estados`
  MODIFY `est_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sc_observaciones`
--
ALTER TABLE `sc_observaciones`
  MODIFY `obs_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `sc_oficinas`
--
ALTER TABLE `sc_oficinas`
  MODIFY `ofi_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT de la tabla `sc_servicios`
--
ALTER TABLE `sc_servicios`
  MODIFY `serv_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sc_solicitudes_coolechera`
--
ALTER TABLE `sc_solicitudes_coolechera`
  MODIFY `sol_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT de la tabla `sc_tipo_servicio`
--
ALTER TABLE `sc_tipo_servicio`
  MODIFY `id_tps_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sc_tipo_servicio_sap`
--
ALTER TABLE `sc_tipo_servicio_sap`
  MODIFY `tip_ser_sap_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sc_tipo_solicitante`
--
ALTER TABLE `sc_tipo_solicitante`
  MODIFY `tip_sol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sc_tipo_solicitud`
--
ALTER TABLE `sc_tipo_solicitud`
  MODIFY `tipo_sol_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sc_usuarios`
--
ALTER TABLE `sc_usuarios`
  MODIFY `usu_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
