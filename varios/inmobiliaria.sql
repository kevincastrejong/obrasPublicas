-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2019 a las 06:53:16
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `Id` int(11) NOT NULL,
  `Obra` varchar(256) NOT NULL,
  `Contratista` varchar(256) NOT NULL,
  `Localidad` varchar(256) NOT NULL,
  `Direccion` varchar(256) NOT NULL,
  `Municipio` varchar(256) NOT NULL,
  `Monto` decimal(19,2) NOT NULL,
  `PobBeneficiada` decimal(19,2) NOT NULL,
  `Meta` varchar(256) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaTerminacion` date NOT NULL,
  `Latitud` varchar(30) NOT NULL,
  `Longitud` varchar(30) NOT NULL,
  `Observaciones` varchar(256) NOT NULL,
  `Archivos` varchar(256) NOT NULL,
  `Rubro` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `Id` int(11) NOT NULL,
  `FichaId` int(11) NOT NULL,
  `FInicio` date NOT NULL,
  `FTerminacion` date NOT NULL,
  `Monto` decimal(19,2) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Id` int(11) NOT NULL,
  `Avance` int(11) NOT NULL,
  `Observaciones` varchar(256) NOT NULL,
  `Gasto` decimal(19,2) NOT NULL,
  `Ficha` int(11) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Name`, `Description`, `CreateDate`, `UpdateDate`, `CreateUserId`, `UpdateUserId`, `Active`) VALUES
(1, 'Administrador', 'Administrador del sistema con top privilegios', '2019-03-27 14:25:55', '2019-03-27 14:25:55', 0, 0, 1),
(2, 'Ejecutivo', 'Role encargado de ver resultados graficos', '2019-03-27 14:26:50', '2019-03-27 14:26:50', 0, 0, 1),
(3, 'Moderador', 'Usuarios encargados de ver resultados visuales y modificar algunos parametros', '2019-03-27 14:27:56', '2019-03-27 14:27:56', 0, 0, 1),
(4, 'Supervisor', 'Usuario encargado de registrar fichas', '2019-03-27 14:28:33', '2019-03-27 14:28:33', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Descripcion` varchar(256) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`Id`, `Name`, `Descripcion`, `CreateDate`, `UpdateDate`, `CreateUserId`, `UpdateUserId`, `Active`) VALUES
(1, 'Caminos', 'Caminos', '2019-04-01 10:39:21', '2019-04-01 10:39:21', 0, 0, 1),
(2, 'Educativa', 'Educativa', '2019-04-01 10:39:43', '2019-04-01 10:39:43', 0, 0, 1),
(3, 'Salud', 'Salud', '2019-04-01 10:41:14', '2019-04-01 10:41:14', 0, 0, 1),
(4, 'Deporte', 'Deporte', '2019-04-01 10:41:14', '2019-04-01 10:41:14', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(3) NOT NULL,
  `Password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Role` int(11) NOT NULL,
  `Photo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Active` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Password`, `Name`, `Email`, `Role`, `Photo`, `Active`, `CreateDate`, `UpdateDate`, `CreateUserId`, `UpdateUserId`) VALUES
(4, 'bce7d4a9e967ff4ed1060d63cba270e3541f9924', 'Administrador', 'admin@obraspublicas.com', 1, 'ImgProfile/user.jpg', 1, '2019-03-27 14:50:24', '2019-04-01 16:26:41', 0, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Rubro` (`Rubro`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FichaId` (`FichaId`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `reporte_ficha` (`Ficha`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `nivel` (`Role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD CONSTRAINT `rangos_ibfk_1` FOREIGN KEY (`FichaId`) REFERENCES `ficha` (`Id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reporte_ficha` FOREIGN KEY (`Ficha`) REFERENCES `ficha` (`Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`Role`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
