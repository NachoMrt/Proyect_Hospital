-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2026 a las 14:42:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nuevo_hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_paciente`, `id_medico`, `fecha`, `hora`, `motivo`) VALUES
(2, 12, 10, '2023-06-20', '09:15:00', 'Revisión cambiada con jwt'),
(3, 3, 7, '2024-02-10', '11:30:00', 'Dolor cambiada con jwt'),
(5, 45, 1, '2023-10-05', '12:00:00', 'Modificado con graphQl'),
(6, 9, 20, '2025-01-13', '10:45:00', 'Consulta general'),
(7, 30, 8, '2024-04-17', '09:00:00', 'Revisión'),
(8, 18, 3, '2025-06-01', '13:30:00', 'Dolor'),
(9, 11, 6, '2023-11-29', '14:15:00', 'Emergencia'),
(10, 40, 12, '2024-07-22', '11:00:00', 'Control'),
(11, 1, 5, '2024-05-06', '10:15:00', 'Consulta general'),
(12, 27, 9, '2023-08-19', '09:45:00', 'Revisión'),
(13, 16, 11, '2025-02-28', '13:00:00', 'Dolor'),
(14, 4, 14, '2024-01-10', '08:30:00', 'Emergencia'),
(15, 38, 17, '2023-09-03', '15:00:00', 'Control'),
(16, 19, 13, '2025-03-18', '12:45:00', 'Consulta general'),
(17, 2, 4, '2024-12-12', '10:00:00', 'Revisión'),
(18, 33, 16, '2023-05-27', '14:30:00', 'Dolor'),
(19, 7, 18, '2025-07-09', '09:30:00', 'Emergencia'),
(20, 26, 19, '2023-06-14', '08:00:00', 'Control'),
(21, 14, 22, '2024-03-05', '11:30:00', 'Consulta general'),
(22, 6, 23, '2024-09-08', '13:15:00', 'Revisión'),
(23, 36, 24, '2023-07-01', '10:30:00', 'Dolor'),
(24, 28, 25, '2025-04-21', '12:15:00', 'Emergencia'),
(25, 15, 26, '2024-06-16', '14:45:00', 'Control'),
(26, 8, 27, '2023-12-09', '15:30:00', 'Consulta general'),
(27, 43, 28, '2024-10-11', '09:00:00', 'Revisión'),
(28, 10, 29, '2025-08-30', '08:15:00', 'Dolor'),
(29, 21, 30, '2023-03-22', '11:00:00', 'Emergencia'),
(30, 35, 31, '2024-11-19', '13:30:00', 'Control'),
(31, 13, 32, '2023-01-25', '10:45:00', 'Consulta general'),
(32, 48, 33, '2025-09-05', '14:00:00', 'Revisión'),
(33, 32, 34, '2023-02-14', '09:15:00', 'Dolor'),
(34, 23, 35, '2024-04-28', '15:00:00', 'Emergencia'),
(35, 39, 36, '2023-11-07', '08:30:00', 'Control'),
(36, 29, 37, '2024-05-12', '10:00:00', 'Consulta general'),
(37, 31, 38, '2025-02-03', '11:30:00', 'Revisión'),
(38, 24, 39, '2023-06-26', '13:15:00', 'Dolor'),
(39, 20, 40, '2025-05-15', '09:45:00', 'Emergencia'),
(40, 34, 41, '2023-09-10', '14:30:00', 'Control'),
(41, 42, 42, '2024-08-18', '12:45:00', 'Consulta general'),
(42, 11, 11, '0000-00-00', NULL, 'Cita nueva creada con REST'),
(43, 22, 22, '0000-00-00', NULL, 'Cita 43'),
(47, 33, 33, '0000-00-00', NULL, 'Cita creada por postman GraphQL a 11:25'),
(48, 13, 13, '0000-00-00', NULL, 'Cita creada por postman GraphQL a 11:26'),
(49, 7, 7, '0000-00-00', NULL, 'Cita actualizada con graphQL'),
(51, 53, 10, '0000-00-00', NULL, 'Cita para comprobar si no tiene on delete cascade'),
(60, 49, 11, '0000-00-00', NULL, 'Cita bien creada'),
(62, 11, 3, '0000-00-00', NULL, 'Cita nueva creada'),
(63, 3, 3, '0000-00-00', NULL, 'Cita nueva creada'),
(64, 11, 33, '0000-00-00', NULL, 'Cita editada de nuevo con REST'),
(66, 11, 11, '0000-00-00', NULL, 'Cita nueva creada jwt'),
(68, 11, 11, '0000-00-00', NULL, 'cita postman'),
(69, 11, 11, '0000-00-00', NULL, 'cita postman'),
(71, 11, 11, '0000-00-00', NULL, 'cita postman sdasdsa'),
(75, 11, 11, '0000-00-00', NULL, 'Cita nueva creada'),
(89, 22, 30, '0000-00-00', NULL, 'Cita creada por postman GraphQL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medico` (`id_medico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
