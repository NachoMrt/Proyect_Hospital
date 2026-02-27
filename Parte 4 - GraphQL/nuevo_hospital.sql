-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2026 a las 14:38:36
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
(2, 12, 10, '2023-06-20', '09:15:00', 'Revisión'),
(3, 3, 7, '2024-02-10', '11:30:00', 'Dolor'),
(5, 45, 1, '2023-10-05', '12:00:00', 'Control'),
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
(64, 11, 33, '0000-00-00', NULL, 'Cita editada de nuevo con REST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `ubicacion`) VALUES
(1, 'Departamento 1', 'Valencia'),
(2, 'Departamento 2', 'Madrid'),
(3, 'Departamento 3', 'Barcelona'),
(4, 'Departamento 4', 'Sevilla'),
(5, 'Departamento 5', 'Bilbao'),
(6, 'Departamento 6', 'Granada'),
(7, 'Departamento 7', 'Alicante'),
(8, 'Departamento 8', 'Málaga'),
(9, 'Departamento 9', 'Zaragoza'),
(10, 'Departamento 10', 'Valladolid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermero`
--

CREATE TABLE `enfermero` (
  `id_enfermero` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermero`
--

INSERT INTO `enfermero` (`id_enfermero`, `nombre`, `turno`, `id_habitacion`) VALUES
(1, 'Marina López', 'Mañana', 5),
(2, 'Carlos Díaz', 'Tarde', 12),
(3, 'Lucía Pérez', 'Noche', 20),
(4, 'Andrés Gómez', 'Mañana', 1),
(5, 'Sofía Martínez', 'Tarde', 25),
(6, 'Héctor Romero', 'Noche', 8),
(7, 'Paula Morales', 'Mañana', 9),
(8, 'Diego Navarro', 'Tarde', 30),
(9, 'Claudia Rivas', 'Noche', 4),
(10, 'Raúl Fernández', 'Mañana', 17),
(11, 'Elena Ortega', 'Tarde', 3),
(12, 'Miguel Ángel León', 'Noche', 33),
(13, 'Julia Torres', 'Mañana', 6),
(14, 'Javier Gil', 'Tarde', 7),
(15, 'Isabel Ruiz', 'Noche', 10),
(16, 'Alberto Bravo', 'Mañana', 14),
(17, 'Carmen Peña', 'Tarde', 19),
(18, 'Sergio Carrasco', 'Noche', 2),
(19, 'Beatriz Vera', 'Mañana', 28),
(20, 'Luis Crespo', 'Tarde', 11),
(21, 'Laura Salas', 'Noche', 13),
(22, 'Pablo Delgado', 'Mañana', 18),
(23, 'Adriana Núñez', 'Tarde', 26),
(24, 'Óscar Marín', 'Noche', 22),
(25, 'Marta Vargas', 'Mañana', 15),
(26, 'Alejandro Ramos', 'Tarde', 40),
(27, 'Nuria Esteban', 'Noche', 35),
(28, 'Iván Soto', 'Mañana', 32),
(29, 'Patricia Castillo', 'Tarde', 24),
(30, 'Tomás Ferrer', 'Noche', 27),
(31, 'Sara Gallardo', 'Mañana', 38),
(32, 'Rubén Lozano', 'Tarde', 16),
(33, 'Silvia Pascual', 'Noche', 29),
(34, 'Fernando Vidal', 'Mañana', 36),
(35, 'Eva Iglesias', 'Tarde', 21),
(36, 'Cristina Molina', 'Noche', 42),
(37, 'Daniel Ortega', 'Mañana', 31),
(38, 'Carla Reyes', 'Tarde', 34),
(39, 'Hugo Delgado', 'Noche', 23),
(40, 'Verónica Torres', 'Mañana', 41),
(41, 'Esteban Ramos', 'Tarde', 37),
(42, 'Raquel Gil', 'Noche', 12),
(43, 'Bruno Peña', 'Mañana', 3),
(44, 'Teresa Vera', 'Tarde', 44),
(45, 'Álvaro Carrasco', 'Noche', 39),
(46, 'Ismael Vargas', 'Mañana', 45),
(47, 'Carolina Bravo', 'Tarde', 40),
(48, 'Gonzalo Esteban', 'Noche', 22),
(49, 'Andrea López', 'Mañana', 23),
(50, 'Manuel Ruiz', 'Tarde', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_paciente`, `fecha_emision`, `importe`, `concepto`) VALUES
(1, 5, '2023-04-15', 150.00, 'Consulta general'),
(2, 12, '2023-06-21', 300.50, 'Pruebas de laboratorio'),
(3, 33, '2024-01-25', 450.00, 'Cirugía menor'),
(4, 9, '2024-07-04', 75.00, 'Medicamentos'),
(5, 21, '2023-10-15', 600.00, 'Hospitalización'),
(6, 46, '2025-01-26', 200.00, 'Radiografía'),
(7, 17, '2024-03-07', 120.00, 'Consulta especializada'),
(8, 30, '2023-08-12', 90.00, 'Ecografía'),
(9, 1, '2025-03-17', 350.00, 'Intervención ambulatoria'),
(10, 14, '2024-12-13', 80.00, 'Consulta médica'),
(11, 6, '2023-11-03', 250.00, 'Pruebas cardiacas'),
(12, 24, '2024-09-02', 100.00, 'Terapia respiratoria'),
(13, 37, '2023-07-19', 110.00, 'Control pediátrico'),
(14, 19, '2025-06-23', 140.00, 'Consulta psiquiátrica'),
(15, 45, '2024-02-11', 600.00, 'Hospitalización'),
(16, 8, '2023-05-04', 180.00, 'Vacunación'),
(17, 41, '2024-10-06', 130.00, 'Consulta endocrina'),
(18, 20, '2025-08-02', 95.00, 'Tratamiento dental'),
(19, 3, '2023-09-17', 210.00, 'Análisis clínicos'),
(20, 29, '2024-06-08', 75.00, 'Consulta médica'),
(21, 13, '2023-12-22', 300.00, 'Ecografía avanzada'),
(22, 2, '2024-11-14', 100.00, 'Control ginecológico'),
(23, 38, '2025-07-06', 400.00, 'Hospitalización'),
(24, 27, '2023-03-30', 120.00, 'Terapia psicológica'),
(25, 10, '2024-04-18', 250.00, 'Estudios neurológicos'),
(26, 40, '2023-06-21', 150.00, 'Consulta de urgencia'),
(27, 44, '2024-08-14', 320.00, 'TAC cerebral'),
(28, 35, '2025-02-07', 50.00, 'Consulta pediátrica'),
(29, 26, '2023-10-30', 170.00, 'Análisis de sangre'),
(30, 11, '2024-03-02', 200.00, 'Consulta oftalmológica'),
(31, 22, '2023-07-26', 100.00, 'Radiografía torácica'),
(32, 48, '2025-05-15', 280.00, 'Hospitalización parcial'),
(33, 28, '2024-01-09', 90.00, 'Consulta nutricional'),
(34, 7, '2023-09-08', 300.00, 'Estudio digestivo'),
(35, 18, '2024-05-20', 160.00, 'Consulta psiquiátrica'),
(36, 25, '2023-08-31', 220.00, 'Resonancia magnética'),
(37, 43, '2025-03-23', 310.00, 'Consulta y pruebas'),
(38, 32, '2024-07-11', 95.00, 'Consulta psicológica'),
(39, 16, '2023-11-16', 105.00, 'Consulta médica general'),
(40, 23, '2024-06-26', 175.00, 'Tratamiento respiratorio'),
(41, 4, '2023-04-12', 250.00, 'Intervención quirúrgica'),
(42, 34, '2025-09-04', 80.00, 'Revisión general'),
(43, 47, '2024-10-28', 60.00, 'Vacunación anual'),
(44, 31, '2023-05-15', 300.00, 'Terapia física'),
(45, 36, '2024-02-26', 500.00, 'Hospitalización de 3 días'),
(46, 15, '2023-12-02', 180.00, 'Consulta otorrino'),
(47, 49, '2025-04-19', 90.00, 'Control cardiovascular'),
(48, 42, '2024-08-06', 130.00, 'Consulta geriátrica'),
(49, 50, '2023-06-05', 310.00, 'Estudios hepáticos'),
(50, 39, '2025-07-16', 190.00, 'Tratamiento digestivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_habitacion` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `planta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `numero`, `tipo`, `planta`) VALUES
(1, 101, 'Individual', 1),
(2, 102, 'Doble', 1),
(3, 103, 'Suite', 1),
(4, 104, 'Individual', 1),
(5, 105, 'Doble', 1),
(6, 106, 'Suite', 1),
(7, 201, 'Individual', 2),
(8, 202, 'Doble', 2),
(9, 203, 'Suite', 2),
(10, 204, 'Individual', 2),
(11, 205, 'Doble', 2),
(12, 206, 'Suite', 2),
(13, 301, 'Individual', 3),
(14, 302, 'Doble', 3),
(15, 303, 'Suite', 3),
(16, 304, 'Individual', 3),
(17, 305, 'Doble', 3),
(18, 306, 'Suite', 3),
(19, 401, 'Individual', 4),
(20, 402, 'Doble', 4),
(21, 403, 'Suite', 4),
(22, 404, 'Individual', 4),
(23, 405, 'Doble', 4),
(24, 406, 'Suite', 4),
(25, 501, 'Individual', 5),
(26, 502, 'Doble', 5),
(27, 503, 'Suite', 5),
(28, 504, 'Individual', 5),
(29, 505, 'Doble', 5),
(30, 506, 'Suite', 5),
(31, 601, 'Individual', 6),
(32, 602, 'Doble', 6),
(33, 603, 'Suite', 6),
(34, 604, 'Individual', 6),
(35, 605, 'Doble', 6),
(36, 606, 'Suite', 6),
(37, 701, 'Individual', 7),
(38, 702, 'Doble', 7),
(39, 703, 'Suite', 7),
(40, 704, 'Individual', 7),
(41, 705, 'Doble', 7),
(42, 706, 'Suite', 7),
(43, 801, 'Individual', 8),
(44, 802, 'Doble', 8),
(45, 803, 'Suite', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `id_paciente`, `id_habitacion`, `fecha_ingreso`, `fecha_alta`) VALUES
(1, 5, 12, '2023-04-01', '2023-04-07'),
(2, 12, 25, '2023-06-10', '2023-06-15'),
(3, 33, 6, '2024-01-19', '2024-01-27'),
(4, 9, 17, '2024-07-03', '2024-07-10'),
(5, 21, 4, '2023-10-14', '2023-10-20'),
(6, 46, 28, '2025-01-25', '2025-02-01'),
(7, 17, 33, '2024-03-05', '2024-03-11'),
(8, 30, 5, '2023-08-11', '2023-08-18'),
(9, 1, 22, '2025-03-16', '2025-03-20'),
(10, 14, 31, '2024-12-12', '2024-12-19'),
(11, 6, 8, '2023-11-02', '2023-11-09'),
(12, 24, 20, '2024-09-01', '2024-09-10'),
(13, 37, 14, '2023-07-18', '2023-07-24'),
(14, 19, 7, '2025-06-22', '2025-06-30'),
(15, 45, 18, '2024-02-10', '2024-02-15'),
(16, 8, 3, '2023-05-03', '2023-05-09'),
(17, 41, 39, '2024-10-05', '2024-10-10'),
(18, 20, 36, '2025-08-01', '2025-08-07'),
(19, 3, 24, '2023-09-16', '2023-09-22'),
(20, 29, 11, '2024-06-07', '2024-06-14'),
(21, 13, 26, '2023-12-21', '2023-12-28'),
(22, 2, 19, '2024-11-13', '2024-11-20'),
(23, 38, 2, '2025-07-05', '2025-07-11'),
(24, 27, 9, '2023-03-29', '2023-04-05'),
(25, 10, 23, '2024-04-17', '2024-04-24'),
(26, 40, 1, '2023-06-20', '2023-06-25'),
(27, 44, 27, '2024-08-13', '2024-08-20'),
(28, 35, 30, '2025-02-06', '2025-02-10'),
(29, 26, 21, '2023-10-29', '2023-11-04'),
(30, 11, 15, '2024-03-01', '2024-03-07'),
(31, 22, 13, '2023-07-25', '2023-07-30'),
(32, 48, 35, '2025-05-14', '2025-05-20'),
(33, 28, 29, '2024-01-08', '2024-01-13'),
(34, 7, 16, '2023-09-07', '2023-09-12'),
(35, 18, 10, '2024-05-19', '2024-05-26'),
(36, 25, 32, '2023-08-30', '2023-09-05'),
(37, 43, 40, '2025-03-22', '2025-03-28'),
(38, 32, 34, '2024-07-10', '2024-07-15'),
(39, 16, 37, '2023-11-15', '2023-11-20'),
(40, 23, 38, '2024-06-25', '2024-07-01'),
(41, 4, 41, '2023-04-11', '2023-04-17'),
(42, 34, 42, '2025-09-03', '2025-09-08'),
(43, 47, 43, '2024-10-27', '2024-11-01'),
(44, 31, 44, '2023-05-14', '2023-05-19'),
(45, 36, 45, '2024-02-25', '2024-03-01'),
(46, 15, 12, '2023-12-01', '2023-12-07'),
(47, 49, 17, '2025-04-18', '2025-04-24'),
(48, 42, 28, '2024-08-05', '2024-08-11'),
(49, 50, 9, '2023-06-04', '2023-06-10'),
(50, 39, 7, '2025-07-15', '2025-07-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_medico`, `nombre`, `especialidad`, `id_departamento`) VALUES
(1, 'Dr. Javier Sánchez', 'Cardiología', 3),
(2, 'Dra. Laura Morales', 'Neurología', 1),
(3, 'Dr. Manuel Ortega', 'Pediatría', 5),
(4, 'Dra. Carmen Rivas', 'Traumatología', 2),
(5, 'Dr. Pablo Muñoz', 'Oncología', 4),
(6, 'Dr. Antonio Vidal', 'Cardiología', 6),
(7, 'Dra. Beatriz Lozano', 'Dermatología', 3),
(8, 'Dr. Sergio Ramírez', 'Neurología', 1),
(9, 'Dr. Rubén Gil', 'Pediatría', 5),
(10, 'Dra. Elena Salas', 'Cardiología', 2),
(11, 'Dr. Tomás Díaz', 'Oncología', 4),
(12, 'Dra. Miriam Castillo', 'Traumatología', 6),
(13, 'Dr. Andrés Pérez', 'Cardiología', 7),
(14, 'Dra. Paula Iglesias', 'Dermatología', 3),
(15, 'Dr. Hugo Romero', 'Neurología', 2),
(16, 'Dr. Lucas Torres', 'Pediatría', 1),
(17, 'Dra. Silvia Navarro', 'Cardiología', 8),
(18, 'Dr. Iván Peña', 'Oncología', 9),
(19, 'Dra. Noelia Martín', 'Traumatología', 10),
(20, 'Dr. Óscar Herrera', 'Dermatología', 4),
(21, 'Dra. Clara Alonso', 'Neurología', 5),
(22, 'Dr. Víctor Soto', 'Cardiología', 6),
(23, 'Dra. Irene López', 'Pediatría', 7),
(24, 'Dr. Jaime Ferrer', 'Traumatología', 3),
(25, 'Dr. Daniel Molina', 'Oncología', 2),
(26, 'Dra. Andrea Ruiz', 'Dermatología', 1),
(27, 'Dr. Marcos Vidal', 'Cardiología', 5),
(28, 'Dra. Lucía Reyes', 'Neurología', 4),
(29, 'Dr. Adrián Carrasco', 'Pediatría', 6),
(30, 'Dra. Nuria Bravo', 'Oncología', 3),
(31, 'Dr. Fernando Marín', 'Traumatología', 9),
(32, 'Dra. Raquel Crespo', 'Cardiología', 8),
(33, 'Dr. Joaquín León', 'Dermatología', 7),
(34, 'Dra. Eva Delgado', 'Neurología', 2),
(35, 'Dr. Álvaro Núñez', 'Pediatría', 1),
(36, 'Dra. Marta Gallardo', 'Oncología', 4),
(37, 'Dr. Esteban Lozano', 'Cardiología', 10),
(38, 'Dra. Sonia Ramírez', 'Dermatología', 6),
(39, 'Dr. Miguel Ángel Blanco', 'Traumatología', 5),
(40, 'Dra. Patricia Vera', 'Neurología', 3),
(41, 'Dr. Cristian Paredes', 'Pediatría', 8),
(42, 'Dra. Verónica Sáez', 'Oncología', 7),
(43, 'Dr. Alejandro Pascual', 'Cardiología', 6),
(44, 'Dra. Yolanda Lozano', 'Neurología', 2),
(45, 'Dr. Bruno García', 'Dermatología', 1),
(46, 'Dra. Carolina Ramos', 'Pediatría', 9),
(47, 'Dr. Julián Rubio', 'Traumatología', 10),
(48, 'Dra. Teresa Vargas', 'Oncología', 8),
(49, 'Dr. David Esteban', 'Cardiología', 3),
(50, 'Dra. Alicia Torres', 'Dermatología', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `dni`, `fecha_nacimiento`, `telefono`) VALUES
(1, 'Lucía Sánchez', '12345678A', '1982-05-14', '600123456'),
(2, 'Carlos Ruiz', '87654321B', '1990-03-22', '611223344'),
(3, 'María Gómez', '11223344C', '1975-11-09', '622334455'),
(4, 'José Pérez', '99887766D', '2001-08-01', '633445566'),
(5, 'Laura Martínez', '44556677E', '1988-07-27', '644556677'),
(6, 'Antonio Ramírez', '77665544F', '1959-12-15', '655667788'),
(7, 'Sara Fernández', '33445566G', '2003-04-05', '666778899'),
(8, 'Juan Torres', '22113344H', '1996-01-19', '677889900'),
(9, 'Elena López', '55667788J', '1980-10-23', '688990011'),
(10, 'Diego Herrera', '66778899K', '2005-02-12', '699100122'),
(11, 'Ana Morales', '77889900L', '1992-06-30', '600201223'),
(12, 'Hugo Ortega', '88990011M', '1978-09-17', '611302234'),
(13, 'Marta Castillo', '99001122N', '1986-03-10', '622403345'),
(14, 'Raúl Navarro', '10111213O', '1995-05-25', '633504456'),
(15, 'Paula Romero', '12131415P', '1970-07-08', '644605567'),
(16, 'Iván Rivas', '13141516Q', '2000-10-11', '655706678'),
(17, 'Clara Soto', '14151617R', '1998-12-20', '666807789'),
(18, 'Víctor Peña', '15161718S', '1965-03-29', '677908890'),
(19, 'Natalia Gil', '16171819T', '1984-08-16', '688009901'),
(20, 'Sergio León', '17181920U', '1993-11-04', '699110012'),
(21, 'Beatriz Bravo', '18192021V', '1979-09-14', '600211123'),
(22, 'Adrián Vera', '19202122W', '1991-01-03', '611312234'),
(23, 'Teresa Iglesias', '20212223X', '1987-06-06', '622413345'),
(24, 'Joaquín Ruiz', '21222324Y', '1968-04-28', '633514456'),
(25, 'Patricia Vargas', '22232425Z', '2002-02-13', '644615567'),
(26, 'Fernando Crespo', '23242526A', '1977-05-19', '655716678'),
(27, 'Sonia Carrasco', '24252627B', '1985-12-24', '666817789'),
(28, 'Miguel Gallardo', '25262728C', '2004-07-03', '677918890'),
(29, 'Eva Pascual', '26272829D', '1999-03-31', '688019901'),
(30, 'Julián Delgado', '27282930E', '1983-10-21', '699120012'),
(31, 'Yolanda Ramos', '28293031F', '2001-01-18', '600231123'),
(32, 'Cristian Esteban', '29303132G', '1997-09-12', '611332234'),
(33, 'Alicia Núñez', '30313233H', '1962-06-30', '622433345'),
(34, 'Marcos Vidal', '31323334J', '1994-05-07', '633534456'),
(35, 'Andrea Salas', '32333435K', '1981-11-26', '644635567'),
(36, 'Óscar Ferrer', '33343536L', '1976-04-09', '655736678'),
(37, 'Silvia Marín', '34353637M', '1990-02-02', '666837789'),
(38, 'Tomás Díaz', '35363738N', '1969-12-29', '677938890'),
(39, 'Nuria López', '36373839O', '1989-07-16', '688039901'),
(40, 'Álvaro Torres', '37383940P', '1996-08-08', '699140012'),
(41, 'Miriam Castillo', '38394041Q', '1974-03-11', '600241123'),
(42, 'Jorge Muñoz', '39404142R', '2000-06-22', '611342234'),
(43, 'Isabel Reyes', '40414243S', '1982-09-01', '622443345'),
(44, 'Rubén Gil', '41424344T', '1973-11-18', '633544456'),
(45, 'Noelia Bravo', '42434445U', '1998-10-10', '644645567'),
(46, 'Alejandro Peña', '43444546V', '1991-02-26', '655746678'),
(47, 'Carolina Vera', '44454647W', '1971-08-14', '666847789'),
(48, 'Esteban Lozano', '45464748X', '1986-05-23', '677948890'),
(49, 'Raquel Ramos', '46474849Y', '1995-03-15', '688049901'),
(50, 'Daniel Molina', '47484950Z', '2003-12-05', '699150012'),
(53, 'Luís Salvador', '09213124T', '1829-01-01', '+49 78981231'),
(57, 'Luís Perez', '23133232ad', '1999-09-09', '+49 78981231');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id_tratamiento`, `id_paciente`, `id_medico`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 5, 12, 'Tratamiento para hipertensión leve', '2023-04-01', '2023-04-15'),
(2, 12, 25, 'Control de glucosa intensivo', '2023-06-10', '2023-07-10'),
(3, 33, 6, 'Rehabilitación post-operatoria', '2024-01-19', '2024-02-09'),
(4, 9, 17, 'Antibióticos por infección urinaria', '2024-07-03', '2024-07-10'),
(5, 21, 4, 'Seguimiento oncológico', '2023-10-14', '2023-11-14'),
(6, 46, 28, 'Terapia respiratoria aguda', '2025-01-25', '2025-02-20'),
(7, 17, 33, 'Evaluación neurológica continua', '2024-03-05', '2024-03-25'),
(8, 30, 5, 'Tratamiento dermatológico', '2023-08-11', '2023-09-01'),
(9, 1, 22, 'Control de peso y metabolismo', '2025-03-16', '2025-04-01'),
(10, 14, 31, 'Fisioterapia motora', '2024-12-12', '2025-01-05'),
(11, 6, 8, 'Terapia psiquiátrica básica', '2023-11-02', '2023-12-02'),
(12, 24, 20, 'Recuperación tras cirugía ocular', '2024-09-01', '2024-09-25'),
(13, 37, 14, 'Tratamiento de asma bronquial', '2023-07-18', '2023-08-10'),
(14, 19, 7, 'Terapia antibiótica endovenosa', '2025-06-22', '2025-07-07'),
(15, 45, 18, 'Intervención de salud mental', '2024-02-10', '2024-03-01'),
(16, 8, 3, 'Control de presión arterial', '2023-05-03', '2023-05-18'),
(17, 41, 39, 'Recuperación por fractura', '2024-10-05', '2024-10-30'),
(18, 20, 36, 'Antidepresivos controlados', '2025-08-01', '2025-08-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(2, 'Carmen', 'ccccc@hmail.com', ''),
(5, 'Carmennn', 'ccccc@hmail.com', ''),
(6, 'David', 'ejemplorr@gmail.com', ''),
(8, 'Laura', 'ejempgglorr@gmail.com', ''),
(9, 'Bilbo', 'csscc@hmail.com', ''),
(10, 'Laurrra', 'ejempgglorr@gmail.com', ''),
(11, 'Bilffbo', 'csscc@hmail.com', ''),
(12, 'David', 'ejemplorr@gmail.com', ''),
(14, 'Laurrra', 'ejempgglorr@gmail.com', ''),
(15, 'Bilffbo', 'csscc@hmail.com', ''),
(16, 'Juan45', 'dff@jkj.com', ''),
(17, 'Juan46', 'drre@jjhjk.es', ''),
(20, 'LuisSSSSS', 'luis@example.com', ''),
(21, 'Carlos', 'admin@admin.com', '1234'),
(22, 'José Ignacio Martínez Cascante', 'josigmcs@gmail.com', ''),
(23, 'Luis', 'luis@example.com', ''),
(24, 'Luis', 'luis@example.com', ''),
(25, 'Bilbo', 'bilbo@example.com', ''),
(26, 'Grandalf', 'grandal@example.com', ''),
(27, 'Lorienn', 'grandal@example.com', 'ttt7777'),
(28, 'Luís Salvador', 'ago@gmail.com', '12345');

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
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `enfermero`
--
ALTER TABLE `enfermero`
  ADD PRIMARY KEY (`id_enfermero`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_habitacion`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `enfermero`
--
ALTER TABLE `enfermero`
  ADD CONSTRAINT `enfermero_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `tratamiento_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
