-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2017 a las 01:47:23
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beercharge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `idCerveza` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precioLitro` int(11) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`idCerveza`, `nombre`, `descripcion`, `precioLitro`, `foto`, `estado`) VALUES
(23, 'Extrema ', 'Cervezas de rotaciÃ³n\r\nSon cervezas que pueden variar entre ser altamente alcohÃ³licas, robustas, amargas, muy perfumadas o dulces, dependiendo del estilo elegido pero siempre acentuando alguna de estas caracterÃ­sticas.', 100, 'Vistas/images/pinta-cerveza-Dunkel.png', 1),
(24, 'Honey', 'Se cree que la producciÃ³n de cervezas con miel tiene su inicio en la civilizaciÃ³n celta, de intenso dorado y una casi imperceptible turbidez producida por el agregado de miel pura, la cual se hace presente en aroma y sabor. ', 90, 'Vistas/images/pinta-cerveza-Honey.png', 1),
(27, 'Scotish', 'De origen escocÃ©s, su intenso color rubÃ­ proveniente de las maltas especiales le generan delicados sabores dulces desde el inicio hasta el final haciendo que el lÃºpulo no sea gran protagonista tanto en amargor como en sabor.', 95, 'Vistas/images/pinta-cerveza-Scottish.png', 0),
(35, 'Blonde', 'Estilo de cerveza artesanal americana, dorada y con aroma a malta y fruta, es suave y de leve amargor, fÃ¡cil de tomar. ', 90, 'Vistas/images/pinta-cerveza-Blonde-Ale.png', 1),
(36, 'Old Ale', ' Tradicional Ale de estilo InglÃ©s, de caracterÃ­stico color rojizo y un perfume que invade en aromas a frutos secos y dulzor a caramelo debido a las maltas utilizadas, tiene una notable presencia generando una cerveza de gran cuerpo y robustez. ', 90, 'Vistas/images/pinta-cerveza-Old-Ale.png', 1),
(37, 'Porter', 'Cerveza oscura nacida en los antiguos puertos londinenses, en la que el grano tostado tiene un gran protagonismo produciendo aromas y sabores que nos recuerdan a chocolate, cafÃ© torrado y toffe.', 95, 'Vistas/images/pinta-cerveza-Porter.png', 1),
(39, 'Beirut', 'la invito el profe ', 115, 'Vistas/images/pinta-cerveza-Dunkel.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `idCuenta` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `email`, `pass`, `rol`) VALUES
(2, 'admin@hotmail.com', 'admin', 'Administrador'),
(16, 'sofiayini@hotmail.com', '123', 'Empleado'),
(17, 'mauroyini@hotmail.com', 'lospiojos', 'Administrador'),
(18, 'silvia-orellana@hotmail.com', '123', 'Cliente'),
(19, 'seba@hotmail.com', '123', 'Empleado'),
(20, 'juan.azar@gmail.com', '123', 'Cliente'),
(21, 'latia@hotmail.com', '123', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envases`
--

CREATE TABLE `envases` (
  `idEnvase` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `litros` float DEFAULT NULL,
  `coeficiente` float DEFAULT NULL,
  `foto` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `envases`
--

INSERT INTO `envases` (`idEnvase`, `descripcion`, `litros`, `coeficiente`, `foto`, `estado`) VALUES
(17, 'Copon', 0.326, 0.001, 'Vistas/images/copa-gladstone.png', 1),
(19, 'Barril x 20 lts', 20, 0.425, 'Vistas/images/barril.png', 1),
(20, 'Botellon 5lts', 5, 0.2, 'Vistas/images/Botellon-cerveza.png', 1),
(22, 'Barril 75 Lts', 75, 0.85, 'Vistas/images/barril.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envasesxcerveza`
--

CREATE TABLE `envasesxcerveza` (
  `fk_idEnvase` int(11) NOT NULL,
  `fk_idCerveza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `envasesxcerveza`
--

INSERT INTO `envasesxcerveza` (`fk_idEnvase`, `fk_idCerveza`) VALUES
(17, 35),
(17, 36),
(19, 23),
(19, 24),
(19, 39),
(20, 23),
(20, 24),
(20, 35),
(20, 37),
(22, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedido`
--

CREATE TABLE `lineapedido` (
  `idPedido` int(11) NOT NULL,
  `idLineaPedido` int(11) NOT NULL,
  `idCerveza` int(11) NOT NULL,
  `idEnvase` int(11) NOT NULL,
  `precioxEnv` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `precioLinea` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineapedido`
--

INSERT INTO `lineapedido` (`idPedido`, `idLineaPedido`, `idCerveza`, `idEnvase`, `precioxEnv`, `cantidad`, `precioLinea`) VALUES
(26, 1, 23, 19, 600, 1, 600),
(26, 2, 37, 20, 380, 1, 380),
(27, 1, 24, 20, 360, 2, 720),
(27, 2, 35, 17, 21, 1, 21.24),
(28, 1, 39, 22, 1294, 1, 1293.75),
(28, 2, 23, 19, 960, 1, 960),
(29, 1, 23, 19, 960, 1, 960),
(30, 1, 23, 19, 960, 1, 960),
(30, 2, 35, 20, 360, 1, 360),
(30, 3, 23, 19, 960, 1, 960),
(31, 1, 23, 19, 960, 1, 960),
(31, 2, 37, 20, 380, 1, 380);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `envio` varchar(10) NOT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `fechaEnvio` varchar(10) DEFAULT NULL,
  `rangoHs` varchar(50) DEFAULT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `idSucursal`, `fecha`, `envio`, `domicilio`, `fechaEnvio`, `rangoHs`, `estado`) VALUES
(26, 5, 9, '27/11/2017', 'No', NULL, NULL, NULL, 'Finalizado'),
(27, 5, 10, '27/11/2017', 'Si', 'genova 4944, general pueyrredon,mar del plata,Buenos Aires', '29/11/2017', '16:00-18:00', 'Finalizado'),
(28, 6, 8, '27/11/2017', 'Si', 'jujuy 1100,mar del plata,Buenos Aires', '27/11/2017', '8:00-12:00', 'Finalizado'),
(29, 5, 8, '28/11/2017', 'No', NULL, NULL, NULL, 'Finalizado'),
(30, 7, 9, '29/11/2017', 'No', NULL, '29/11/2017', NULL, 'Solicitado'),
(31, 5, 8, '30/11/2017', 'No', NULL, NULL, NULL, 'Enviado'),
(32, 5, 8, '01/12/2017', 'No', NULL, NULL, NULL, 'En Proceso'),
(33, 5, 10, '05/12/2017', 'Si', 'genova 4944, general pueyrredo,mar del plata,Buenos Aires', '05/12/2017', '16:00-18:00', 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `legajo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`legajo`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `email`, `idCuenta`) VALUES
(1, 'Nicolas', 'Pettinato', '33189203', 'san juan 855', '4726415', 'admin@hotmail.com', 2),
(8, 'Sofia ', 'Yini', '43784535', 'genova 4944, general pueyrredon', '2235769157', 'sofiayini@hotmail.com', 16),
(9, 'Mauro', 'yini', '37030940', 'genova 4944, general pueyrredon', '2235769157', 'mauroyini@hotmail.com', 17),
(10, 'Sebastian', 'Soler', '11110550', 'genova 4944, general pueyrredon', '2235769157', 'seba@hotmail.com', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `idSucursal` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `localidad` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `provincia` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ubicacion` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `longitud` decimal(10,6) NOT NULL,
  `latitud` decimal(10,6) NOT NULL,
  `foto` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idSucursal`, `direccion`, `telefono`, `localidad`, `provincia`, `ubicacion`, `longitud`, `latitud`, `foto`, `estado`) VALUES
(8, 'Alvarado 2620', '495-9236', 'Mar Del Plata', 'Buenos Aires', 'https://www.google.com.ar/maps/place/Baum+Alvarado/@-38.0098067,-57.5578296,17z/data=!3m1!4b1!4m5!3m4!1s0x9584dea050e27a9f:0xfbfa38e67b6996f7!8m2!3d-38.0098067!4d-57.5556409', '0.000000', '0.000000', 'Vistas/images/baumAlvarado.jpg', 1),
(9, 'ConstituciÃ³n 5614, esq. Palma', '479-2676', 'mar del plata', 'Buenos Aires', 'https://www.google.com.ar/maps/place/Baum+Constituci%C3%B3n/@-37.9626089,-57.5622359,17z/data=!3m1!4b1!4m5!3m4!1s0x9584d97b974568c1:0xff39c16a1a4b694!8m2!3d-37.9626089!4d-57.5600472', '0.000000', '0.000000', 'Vistas/images/constitucion.png', 1),
(10, 'Bernardo de Irigoyen 3819', '451-6861', 'mar del plata', 'buenos aires', 'https://www.google.com.ar/maps/place/Baum+Playa+Grande/@-38.0279392,-57.5397711,17z/data=!3m1!4b1!4m5!3m4!1s0x9584ddcc5df9a2c9:0xba19bd56a090701b!8m2!3d-38.0279392!4d-57.5375824', '0.000000', '0.000000', 'Vistas/images/playaGrande.png', 1),
(11, 'OlavarrÃ­a 3047', '451-6646', 'mar del plata', 'Buenos Aires', 'https://www.google.com.ar/maps/place/Baum+Olavarr%C3%ADa/@-38.0162366,-57.5458787,17z/data=!3m1!4b1!4m5!3m4!1s0x9584dc2514be19e1:0xf2b3804e28982840!8m2!3d-38.0162366!4d-57.54369', '0.000000', '0.000000', 'Vistas/images/olavarria-01.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `localidad` text NOT NULL,
  `provincia` text NOT NULL,
  `telefono` varchar(7) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `direccion`, `localidad`, `provincia`, `telefono`, `email`, `idCuenta`) VALUES
(5, 'Silvia ', 'Orellana', 'rioja 1245', 'mar del plata', 'Buenos Aires', '2235769', 'silvia-orellana@hotmail.com', 18),
(6, 'juan', 'azar', 'jujuy 1100', 'mar del plata', 'Buenos Aires', '84848', 'juan.azar@gmail.com', 20),
(7, 'marina ', 'orellana', 'gutierrez 871', 'mar del plata', 'Buenos Aires', '5151591', 'latia@hotmail.com', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`idCerveza`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`idCuenta`);

--
-- Indices de la tabla `envases`
--
ALTER TABLE `envases`
  ADD PRIMARY KEY (`idEnvase`);

--
-- Indices de la tabla `envasesxcerveza`
--
ALTER TABLE `envasesxcerveza`
  ADD PRIMARY KEY (`fk_idEnvase`,`fk_idCerveza`),
  ADD KEY `fk_idCerveza` (`fk_idCerveza`);

--
-- Indices de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  ADD PRIMARY KEY (`idPedido`,`idLineaPedido`),
  ADD KEY `fk_idCerveza` (`idCerveza`),
  ADD KEY `fk_idEnvase` (`idEnvase`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_idUsuario` (`idCliente`),
  ADD KEY `fk_idSucursal` (`idSucursal`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`legajo`),
  ADD KEY `fk_idCuentaP` (`idCuenta`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`idSucursal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_idCuenta` (`idCuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `idCerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `envases`
--
ALTER TABLE `envases`
  MODIFY `idEnvase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `legajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `idSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envasesxcerveza`
--
ALTER TABLE `envasesxcerveza`
  ADD CONSTRAINT `envasesxcerveza_ibfk_1` FOREIGN KEY (`fk_idEnvase`) REFERENCES `envases` (`idEnvase`),
  ADD CONSTRAINT `envasesxcerveza_ibfk_2` FOREIGN KEY (`fk_idCerveza`) REFERENCES `cervezas` (`idCerveza`);

--
-- Filtros para la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  ADD CONSTRAINT `fk_idCerveza` FOREIGN KEY (`idCerveza`) REFERENCES `cervezas` (`idCerveza`),
  ADD CONSTRAINT `fk_idEnvase` FOREIGN KEY (`idEnvase`) REFERENCES `envases` (`idEnvase`),
  ADD CONSTRAINT `fk_idPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_idSucursal` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`),
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_idCuentaP` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_idCuenta` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
