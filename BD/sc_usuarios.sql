-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2021 a las 00:17:08
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
-- Indices de la tabla `sc_usuarios`
--
ALTER TABLE `sc_usuarios`
  ADD PRIMARY KEY (`usu_id_i`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sc_usuarios`
--
ALTER TABLE `sc_usuarios`
  MODIFY `usu_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
