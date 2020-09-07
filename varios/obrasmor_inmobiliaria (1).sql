-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2019 a las 20:27:24
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
-- Base de datos: `obrasmor_inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `Id` int(11) NOT NULL,
  `Obra` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `nObra` int(11) NOT NULL,
  `nContrato` int(11) NOT NULL,
  `Fuente` int(11) NOT NULL,
  `Contratista` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Localidad` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Municipio` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Monto` decimal(19,2) NOT NULL,
  `PobBeneficiada` decimal(19,2) NOT NULL,
  `Meta` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaTerminacion` date NOT NULL,
  `Latitud` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Longitud` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Archivos` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Rubro` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente`
--

CREATE TABLE `fuente` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fuente`
--

INSERT INTO `fuente` (`Id`, `Name`, `Descripcion`, `CreateDate`, `UpdateDate`, `UpdateUserId`, `CreateUserId`, `Active`) VALUES
(1, 'Estatal', 'Estatal', '2019-04-13 11:04:46', '2019-04-13 11:04:46', 0, 0, 1),
(2, 'Federal', 'Federal', '2019-04-13 11:04:46', '2019-04-13 11:04:46', 0, 0, 1),
(3, 'Recursos propios', 'Recursos propios', '2019-04-13 11:05:23', '2019-04-13 11:05:23', 0, 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`Id`, `FichaId`, `FInicio`, `FTerminacion`, `Monto`, `UpdateDate`, `CreateDate`, `UpdateUserId`, `CreateUserId`, `Active`) VALUES
(1, 1, '2019-04-06', '2019-04-30', '538.00', '2019-04-06 12:21:17', '2019-04-06 12:21:17', 4, 4, 1),
(2, 1, '0000-00-00', '0000-00-00', '538.00', '2019-04-06 12:21:17', '2019-04-06 12:21:17', 4, 4, 1),
(3, 1, '0000-00-00', '0000-00-00', '526.00', '2019-04-06 12:21:17', '2019-04-06 12:21:17', 4, 4, 1),
(4, 1, '0000-00-00', '0000-00-00', '526.00', '2019-04-06 12:21:17', '2019-04-06 12:21:17', 4, 4, 1),
(5, 3, '2019-04-09', '2019-04-30', '1000000.00', '2019-04-08 23:07:34', '2019-04-08 23:07:34', 5, 5, 1),
(6, 3, '2019-05-01', '2019-05-31', '1000000.00', '2019-04-08 23:07:34', '2019-04-08 23:07:34', 5, 5, 1),
(7, 3, '2019-06-01', '2019-06-30', '1000000.00', '2019-04-08 23:07:34', '2019-04-08 23:07:34', 5, 5, 1),
(8, 3, '2019-07-01', '2019-07-31', '2000000.00', '2019-04-08 23:07:34', '2019-04-08 23:07:34', 5, 5, 1),
(9, 3, '2019-07-01', '2019-07-31', '2000000.00', '2019-04-08 23:07:34', '2019-04-08 23:07:34', 5, 5, 1),
(10, 4, '2019-02-01', '2019-02-28', '1000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(11, 4, '2019-03-01', '2019-03-31', '1000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(12, 4, '2019-04-01', '2019-04-30', '1000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(13, 4, '2019-05-01', '2019-05-31', '1000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(14, 4, '2019-06-01', '2019-06-30', '1000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(15, 4, '2019-07-01', '2019-07-18', '2000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(16, 4, '2019-07-01', '2019-07-18', '2000.00', '2019-04-08 23:12:38', '2019-04-08 23:12:38', 5, 5, 1),
(17, 5, '2019-04-03', '2019-04-30', '300000.00', '2019-04-08 23:30:27', '2019-04-08 23:30:27', 8, 8, 1),
(18, 5, '2019-05-01', '2019-05-17', '300000.00', '2019-04-08 23:30:27', '2019-04-08 23:30:27', 8, 8, 1),
(19, 5, '2019-05-01', '2019-05-17', '300000.00', '2019-04-08 23:30:27', '2019-04-08 23:30:27', 8, 8, 1),
(20, 6, '2018-10-10', '2018-10-31', '300000.00', '2019-04-09 09:57:54', '2019-04-09 09:57:54', 10, 10, 1),
(21, 6, '2018-11-01', '2018-11-30', '442012.41', '2019-04-09 09:57:54', '2019-04-09 09:57:54', 10, 10, 1),
(22, 6, '2018-12-01', '2018-12-31', '442012.41', '2019-04-09 09:57:54', '2019-04-09 09:57:54', 10, 10, 1),
(23, 6, '2018-12-01', '2018-12-31', '442012.41', '2019-04-09 09:57:54', '2019-04-09 09:57:54', 10, 10, 1),
(24, 7, '2019-04-01', '2019-04-30', '600000.00', '2019-04-09 09:58:16', '2019-04-09 09:58:16', 15, 15, 1),
(25, 7, '2019-05-01', '2019-05-30', '600000.00', '2019-04-09 09:58:16', '2019-04-09 09:58:16', 15, 15, 1),
(26, 7, '2019-05-01', '2019-05-30', '600000.00', '2019-04-09 09:58:16', '2019-04-09 09:58:16', 15, 15, 1),
(27, 8, '2019-04-30', '2019-04-30', '50000.00', '2019-04-09 10:00:37', '2019-04-09 10:00:37', 12, 12, 1),
(28, 8, '2019-05-01', '2019-05-31', '100000.00', '2019-04-09 10:00:37', '2019-04-09 10:00:37', 12, 12, 1),
(29, 8, '2019-06-01', '2019-06-30', '100000.00', '2019-04-09 10:00:37', '2019-04-09 10:00:37', 12, 12, 1),
(30, 8, '2019-06-01', '2019-06-30', '100000.00', '2019-04-09 10:00:37', '2019-04-09 10:00:37', 12, 12, 1),
(31, 9, '2018-10-21', '2018-10-31', '600000.00', '2019-04-09 10:00:55', '2019-04-09 10:00:55', 17, 17, 1),
(32, 9, '2018-11-01', '2018-11-30', '1000000.00', '2019-04-09 10:00:55', '2019-04-09 10:00:55', 17, 17, 1),
(33, 9, '2018-12-01', '2018-12-20', '400000.00', '2019-04-09 10:00:55', '2019-04-09 10:00:55', 17, 17, 1),
(34, 9, '2018-12-01', '2018-12-20', '400000.00', '2019-04-09 10:00:55', '2019-04-09 10:00:55', 17, 17, 1),
(35, 10, '2019-04-08', '2019-04-30', '3000000.00', '2019-04-09 10:02:26', '2019-04-09 10:02:26', 13, 13, 1),
(36, 10, '0000-00-00', '0000-00-00', '3000000.00', '2019-04-09 10:02:27', '2019-04-09 10:02:27', 13, 13, 1),
(37, 10, '0000-00-00', '0000-00-00', '1000000.00', '2019-04-09 10:02:27', '2019-04-09 10:02:27', 13, 13, 1),
(38, 10, '0000-00-00', '0000-00-00', '1000000.00', '2019-04-09 10:02:27', '2019-04-09 10:02:27', 13, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Id` int(11) NOT NULL,
  `Avance` int(11) NOT NULL,
  `Observaciones` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Gasto` decimal(19,2) NOT NULL,
  `Ficha` int(11) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Id`, `Avance`, `Observaciones`, `Gasto`, `Ficha`, `UpdateDate`, `CreateDate`, `UpdateUserId`, `CreateUserId`, `Active`) VALUES
(1, 10, 'Ejemplo de observaciones', '230000.00', 1, '2019-04-06 12:22:56', '2019-04-06 12:22:56', 4, 4, 1),
(2, 10, 'Se levanto la barda', '500000.00', 3, '2019-04-08 23:08:31', '2019-04-08 23:08:31', 5, 5, 1),
(3, 150, 'Se termin&oacute; la obra', '600000.00', 4, '2019-04-08 23:14:31', '2019-04-08 23:14:31', 5, 5, 1),
(4, 50, 'Ya esta la cancha en un 50% generada', '300000.00', 5, '2019-04-08 23:35:23', '2019-04-08 23:35:23', 8, 8, 1),
(5, 20, 'Ya estan las porterias con red', '200000.00', 5, '2019-04-08 23:36:23', '2019-04-08 23:36:23', 8, 8, 1),
(6, 10, 'Obra en proceso', '1000000.00', 10, '2019-04-09 10:07:54', '2019-04-09 10:07:54', 13, 13, 1),
(7, 100, 'Entregada al usuario', '1184024.81', 6, '2019-04-09 10:07:55', '2019-04-09 10:07:55', 10, 10, 1),
(8, 20, 'en proceso ', '540000.00', 9, '2019-04-09 10:10:03', '2019-04-09 10:10:03', 17, 17, 1),
(9, 15, 'preliminares alba&ntilde;ileria', '75000.00', 7, '2019-04-09 10:10:41', '2019-04-09 10:10:41', 15, 15, 1),
(10, 93, '\r\nobra entregada\r\n\r\n\r\nEn', '2392100.00', 5, '2019-04-09 10:12:00', '2019-04-09 10:12:00', 16, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(56) COLLATE utf8_spanish_ci NOT NULL,
  `Description` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `Name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `CreateUserId` int(11) NOT NULL,
  `UpdateUserId` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`Id`, `Name`, `Descripcion`, `CreateDate`, `UpdateDate`, `CreateUserId`, `UpdateUserId`, `Active`) VALUES
(1, 'Caminos', 'Caminos', '2019-04-01 10:39:21', '2019-04-01 10:39:21', 0, 0, 1),
(2, 'Educativa', 'Educativa', '2019-04-01 10:39:43', '2019-04-01 10:39:43', 0, 0, 1),
(3, 'Salud', 'Salud', '2019-04-01 10:41:14', '2019-04-01 10:41:14', 0, 0, 1),
(4, 'Deporte', 'Deporte', '2019-04-01 10:41:14', '2019-04-01 10:41:14', 0, 0, 1),
(5, 'Instalación de red eléctrica', 'Instalación de red eléctrica', '2019-04-11 14:11:50', '2019-04-11 14:11:50', 0, 0, 1),
(6, 'Turismo y cultura', 'Turismo y cultura', '2019-04-11 14:11:50', '2019-04-11 14:11:50', 0, 0, 1);

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
(4, 'bce7d4a9e967ff4ed1060d63cba270e3541f9924', 'Administrador', 'admin@obraspublicas.com', 1, 'ImgProfile/user.jpg', 1, '2019-03-27 14:50:24', '2019-04-01 16:26:41', 0, 4),
(5, 'bce7d4a9e967ff4ed1060d63cba270e3541f9924', 'Ejecutivo', 'ejecutivo@obraspublicas.com', 2, 'ImgProfile/13194f26efeb81e96801e026d83562ce.png', 1, '2019-04-06 00:39:25', '2019-04-06 00:39:25', 4, 4),
(6, 'bce7d4a9e967ff4ed1060d63cba270e3541f9924', 'Moderador', 'moderador@obraspublicas.com', 3, 'ImgProfile/f9c1ba63da06e3f4bd29f84bdf446dff.png', 1, '2019-04-06 00:39:55', '2019-04-06 00:39:55', 4, 4),
(7, 'bce7d4a9e967ff4ed1060d63cba270e3541f9924', 'Supervisor', 'supervisor@obraspublicas.com', 4, 'ImgProfile/02788affc42bf42f2cd46012a4482acd.png', 0, '2019-04-06 00:40:22', '2019-04-09 10:10:28', 4, 10),
(8, '74cdbe7a0378a4cf562ae7dc32435eb4f819e44f', 'Emilio Gardu&ntilde;o Hern&aacute;ndez', 'emilio_gh11@hotmail.com', 4, 'ImgProfile/cabba2d86316e00236a6972784f59244.jpg', 1, '2019-04-08 23:26:28', '2019-04-08 23:38:23', 5, 5),
(9, 'f67f1b64b43252848905d3b6d57eeea1b23fd76f', 'Emilio Gardu&ntilde;o Hern&aacute;ndez', 'emilio@hotmail.com', 3, 'ImgProfile/0aef3d52bdff9ee353b8691a8717058c.jpg', 1, '2019-04-08 23:40:44', '2019-04-08 23:40:44', 5, 5),
(10, 'be6fe902d3b75675b844073a936cc7be164bd3b3', 'Moderador uno', 'mod1@obras.com', 3, 'ImgProfile/1adbd0f4c7ffa0ceb08ba2f6dcdba824.jpg', 1, '2019-04-09 09:19:37', '2019-04-09 09:19:37', 5, 5),
(11, 'c48f415d6e02901c5df3ee440a9338c19ad15ffc', 'Moderador dos', 'mod2@obras.com', 3, 'ImgProfile/3933075095f635c9c540670463dae6b5.jpg', 1, '2019-04-09 09:20:43', '2019-04-09 12:25:45', 5, 4),
(12, '9396468375f02387af486e685ec69587a7ba76d8', 'Moderador tres', 'mod3@obras.com', 3, 'ImgProfile/a9610e0f7ed69e46ac639feeac565e26.jpg', 1, '2019-04-09 09:21:57', '2019-04-09 09:21:57', 5, 5),
(13, '4bcd297ae21be5eb39b7df30625b54912dcbdb83', 'moderador cuatro', 'mod4@obras.com', 3, 'ImgProfile/94e5875ee083b22b91dd808ba6018cff.jpg', 1, '2019-04-09 09:31:03', '2019-04-09 09:31:03', 5, 5),
(14, '1d0acff15b3f079c7aae3086f7018cafb60f21bf', 'moderador cinco', 'mod5@obras.com', 3, 'ImgProfile/7c30576b910b5d931bdac3fa133cec1f.jpg', 1, '2019-04-09 09:34:40', '2019-04-09 09:34:40', 5, 5),
(15, '7a21c03976bbe20bfcf47863ae46bd9fe5715a1a', 'moderador seis', 'mod6@obras.com', 3, 'ImgProfile/9394cc174fd819a46ba2e238d59052b0.jpg', 1, '2019-04-09 09:36:20', '2019-04-09 09:36:20', 5, 5),
(16, '16c9f2bc7bfc31e0c472001e8e6d33a822a35b17', 'moderador siete', 'mod7@obras.com', 3, 'ImgProfile/4d26d6552ade9cabd9b6e3823531a0e1.jpg', 1, '2019-04-09 09:37:28', '2019-04-09 09:37:28', 5, 5),
(17, '0a1b46890ead1e31328e6a1c85fa3efaf3dfd6b5', 'moderador ocho', 'mod8@obras.com', 3, 'ImgProfile/4402c129842ce23aea1a239e1f0324d6.jpg', 1, '2019-04-09 09:38:48', '2019-04-09 09:38:48', 5, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Rubro` (`Rubro`),
  ADD KEY `Fuente` (`Fuente`);

--
-- Indices de la tabla `fuente`
--
ALTER TABLE `fuente`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fuente`
--
ALTER TABLE `fuente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`Rubro`) REFERENCES `rubros` (`Id`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`Fuente`) REFERENCES `fuente` (`Id`);

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
