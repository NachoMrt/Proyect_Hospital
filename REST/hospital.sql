-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2026 a las 12:05:47
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
-- Base de datos: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_medico` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_paciente`, `id_medico`, `fecha`, `hora`, `motivo`) VALUES
(2, 12, 10, '2023-06-20', '09:15:00', 'Revisión'),
(3, 3, 7, '2024-02-10', '11:30:00', 'Dolor'),
(9, 11, 6, '2023-11-29', '14:15:00', 'Emergencia'),
(10, 2, 2, '0000-00-00', NULL, 'Cita nueva creada'),
(11, 2, 2, '0000-00-00', NULL, 'cita con rest');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
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

CREATE TABLE IF NOT EXISTS `enfermero` (
  `id_enfermero` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_enfermero`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
  `id_habitacion` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `planta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE IF NOT EXISTS `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_medico`),
  KEY `id_departamento` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(15, 'Dr. Hugo Romero', 'Neurología', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(15, 'Paula Romero', '12131415P', '1970-07-08', '644605567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE IF NOT EXISTS `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_tratamiento`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_medico` (`id_medico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
