-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2025 a las 21:05:59
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
-- Base de datos: `svst12`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cedula_Cliente` int(11) NOT NULL,
  `Nombre_Cliente` varchar(50) NOT NULL,
  `Telefono_Cliente` int(11) NOT NULL,
  `Correo_Cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cedula_Cliente`, `Nombre_Cliente`, `Telefono_Cliente`, `Correo_Cliente`) VALUES
(51464, 'Diego Palacios', 0, NULL),
(1452387, 'Francisco Hernandez', 0, NULL),
(5147985, 'Alberto jose', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Nombre` varchar(50) NOT NULL,
  `Cedula_Empleado` int(11) NOT NULL,
  `Telefono_Empleado` int(11) NOT NULL,
  `Correo_Empleado` varchar(50) DEFAULT NULL,
  `clave` varchar(50) NOT NULL,
  `usuarios` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Nombre`, `Cedula_Empleado`, `Telefono_Empleado`, `Correo_Empleado`, `clave`, `usuarios`) VALUES
('Alberto Palacios', 4842187, 45132857, 'Albpalacios@gmail.com', 'albertopala2', 'Albertopalac135'),
('Andrea Lopez', 1545265, 4652158, 'Anlopez@hotmail.com', 'Andrealop982', 'Andrealop982'),
('Jhon Diaz', 789425, 4651154, 'Jhondiaz@gmail.com', 'jhondizleon', 'jhondi981'),
('Michael Mar', 1021548, 4512513, 'Michmar@gmail.com', 'michael1234', 'michael981');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` varchar(50) NOT NULL,
  `Cantidad` float NOT NULL,
  `Valor_Pedido` decimal(10,0) NOT NULL,
  `Cedula_Cliente` int(11) NOT NULL,
  `Nombre_Cliente` varchar(50) NOT NULL,
  `Empleado_ID` int(11) NOT NULL,
  `Nombre_empleado` varchar(50) NOT NULL,
  `ID_Tela` int(11) NOT NULL,
  `Nombre_Tela` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ID_Pedido`, `Cantidad`, `Valor_Pedido`, `Cedula_Cliente`, `Nombre_Cliente`, `Empleado_ID`, `Nombre_empleado`, `ID_Tela`, `Nombre_Tela`) VALUES
('202505129', 10, 105000, 1452387, '0', 1545265, 'Andrea Lopez', 10040, 'Antifluido'),
('202505153', 18, 189000, 51464, '0', 1021548, 'Michael Mar', 10040, 'Antifluido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `ID_Tela` int(11) NOT NULL,
  `Nombre_Tela` varchar(50) NOT NULL,
  `Color` text NOT NULL,
  `Cantidad_Tela` float NOT NULL,
  `Caracteristica` varchar(50) DEFAULT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`ID_Tela`, `Nombre_Tela`, `Color`, `Cantidad_Tela`, `Caracteristica`, `Precio`) VALUES
(10020, 'Seda', 'Blanco', 50, 'Degradado azul', 9800),
(10032, 'Paño', 'Cafe claro', 50, 'No', 12000),
(10040, 'Antifluido', 'Blanco', 100, 'Estampado Enfermeria', 10500),
(10047, 'Terciopelo', 'Rojo', 20, 'No', 20000),
(10065, 'Piel de durazno', 'Azul', 100, 'No', 7000),
(10090, 'Lino', 'Amarillo', 45, 'Fondo amarillo con flores blancas', 9750),
(10747, 'Peluche', 'Naranja', 40, 'No', 7500),
(10842, 'Jean ', 'Azul claro', 300, 'No', 10500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cedula_Cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Nombre`,`Cedula_Empleado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `fk_Pedido_Cliente1` (`Nombre_Cliente`,`Cedula_Cliente`),
  ADD KEY `fk_Pedido_Empleado1` (`Nombre_empleado`,`Empleado_ID`),
  ADD KEY `fk_Pedido_Tela1` (`ID_Tela`,`Nombre_Tela`);

--
-- Indices de la tabla `tela`
--
ALTER TABLE `tela`
  ADD PRIMARY KEY (`ID_Tela`,`Nombre_Tela`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Empleado1` FOREIGN KEY (`Nombre_empleado`,`Empleado_ID`) REFERENCES `empleado` (`Nombre`, `Cedula_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_Tela1` FOREIGN KEY (`ID_Tela`,`Nombre_Tela`) REFERENCES `tela` (`ID_Tela`, `Nombre_Tela`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
