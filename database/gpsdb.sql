-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2017 a las 01:14:22
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gpsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ruc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`idcustomer`, `name`, `ruc`) VALUES
(1, 'GPS', '10000000000'),
(2, 'BBVA', '20100130204');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datahard`
--

CREATE TABLE `datahard` (
  `iddatahard` int(11) NOT NULL,
  `codprodinterno` varchar(45) NOT NULL,
  `razonsocial` varchar(150) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `tipodoc` varchar(6) NOT NULL,
  `document` varchar(15) NOT NULL,
  `codprodcliente` varchar(30) NOT NULL,
  `moneda` varchar(15) NOT NULL,
  `importsaldo` varchar(30) NOT NULL,
  `saldooperativo` varchar(30) NOT NULL,
  `saldoactivo` varchar(30) NOT NULL,
  `fechmora` varchar(10) NOT NULL,
  `fechasign` varchar(10) NOT NULL,
  `estadocliente` varchar(100) NOT NULL,
  `datecreate` datetime NOT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `idcustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `idperson` int(11) NOT NULL,
  `glosaname` varchar(150) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `tipodoc` varchar(6) NOT NULL,
  `document` varchar(15) NOT NULL,
  `codprodinterno` varchar(45) NOT NULL,
  `codprodcliente` varchar(30) DEFAULT NULL,
  `moneda` varchar(15) NOT NULL,
  `saldoactivo` varchar(30) NOT NULL,
  `fechmora` varchar(10) NOT NULL,
  `fechasign` varchar(10) NOT NULL,
  `estadocliente` varchar(100) NOT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `datecreate` datetime NOT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phone`
--

CREATE TABLE `phone` (
  `idphone` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `zipprov` varchar(2) DEFAULT NULL,
  `zipcountry` varchar(2) NOT NULL,
  `idperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statu`
--

CREATE TABLE `statu` (
  `idstatu` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `datecreate` datetime NOT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `idtypeanswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `statu`
--

INSERT INTO `statu` (`idstatu`, `name`, `code`, `description`, `datecreate`, `dateupdate`, `status`, `idtypeanswer`) VALUES
(1, 'Atencion a Publico ( Plataforma )', 'A', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(2, 'Cartas', 'C', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(3, 'Domicilio', 'D', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(4, 'Envío de IVR', 'I', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(5, 'Judicial', 'J', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(6, 'Mailing', 'M', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(7, 'Envío de SMS', 'S', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(8, 'Telefonía', 'T', NULL, '2017-09-06 00:00:00', NULL, 1, 1),
(9, 'No informado', '1', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(10, 'AJudicial', '2', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(11, 'Búsqueda', '3', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(12, 'Compromiso', '4', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(13, 'Descargo', '5', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(14, 'Email', '6', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(15, 'Incobrable', '7', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(16, 'Inubicado', '8', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(17, 'Mensaje Titular', '9', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(18, 'Mensaje Tercer', '10', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(19, 'No Contacto', '11', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(20, 'PagDirecto', '12', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(21, 'PagoNoRepor', '13', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(22, 'Probabilidad', '14', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(23, 'Renuente', '15', NULL, '2017-09-06 00:00:00', NULL, 1, 2),
(24, 'SMS-Grabad', '16', NULL, '2017-09-06 00:00:00', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeanswer`
--

CREATE TABLE `typeanswer` (
  `idtypeanswer` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `datecreate` datetime NOT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `typeanswer`
--

INSERT INTO `typeanswer` (`idtypeanswer`, `name`, `code`, `datecreate`, `dateupdate`, `status`) VALUES
(1, 'Gestion', '01', '2017-09-06 00:00:00', NULL, 1),
(2, 'Respuesta', '02', '2017-09-06 00:00:00', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indices de la tabla `datahard`
--
ALTER TABLE `datahard`
  ADD PRIMARY KEY (`iddatahard`),
  ADD KEY `fk_datahard_customer_idx` (`idcustomer`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idperson`),
  ADD UNIQUE KEY `document_UNIQUE` (`document`);

--
-- Indices de la tabla `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`idphone`),
  ADD KEY `fk_phone_person1_idx` (`idperson`);

--
-- Indices de la tabla `statu`
--
ALTER TABLE `statu`
  ADD PRIMARY KEY (`idstatu`),
  ADD KEY `fk_statu_typeanswer1_idx` (`idtypeanswer`);

--
-- Indices de la tabla `typeanswer`
--
ALTER TABLE `typeanswer`
  ADD PRIMARY KEY (`idtypeanswer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `datahard`
--
ALTER TABLE `datahard`
  MODIFY `iddatahard` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `statu`
--
ALTER TABLE `statu`
  MODIFY `idstatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `typeanswer`
--
ALTER TABLE `typeanswer`
  MODIFY `idtypeanswer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datahard`
--
ALTER TABLE `datahard`
  ADD CONSTRAINT `fk_datahard_customer` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `fk_phone_person1` FOREIGN KEY (`idperson`) REFERENCES `person` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `statu`
--
ALTER TABLE `statu`
  ADD CONSTRAINT `fk_statu_typeanswer1` FOREIGN KEY (`idtypeanswer`) REFERENCES `typeanswer` (`idtypeanswer`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
