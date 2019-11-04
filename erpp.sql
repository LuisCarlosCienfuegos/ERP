-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2019 a las 05:32:35
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erpp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `movimiento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `id_usuario`, `fecha`, `movimiento`) VALUES
(3, 72, '2019-09-11', 'ffghh'),
(4, 72, '2019-09-11', 'ffghh'),
(5, 72, '2019-09-11', 'ffghh'),
(8, 74, '2019-01-08', 'lfknfl<s-k'),
(9, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balance`
--

CREATE TABLE `balance` (
  `id` int(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `balance`
--

INSERT INTO `balance` (`id`, `fecha_inicio`, `fecha_fin`, `total`) VALUES
(27, '2019-10-02', '2019-10-02', 5300),
(28, '2019-10-02', '2019-10-02', 67222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `razonsocial` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `razonsocial`, `correo`, `direccion`, `telefono`) VALUES
(10, 'Edgar', 'Corona', 'edgar@gmail.com', 'almoloya de juarez1', '8168787887');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `codigo`) VALUES
(1, '4455'),
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(20) NOT NULL,
  `id_proveedor` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_proveedor`, `fecha`, `total`) VALUES
(13, '24', '1998-02-02', 67222),
(14, '25', '2019-06-06', 67000),
(15, '26', '2018-09-08', 23444),
(16, '26', '2018-09-08', 23444),
(17, '34', '2019-10-26', 2876);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id_cuestionario` int(20) NOT NULL,
  `R1` int(20) NOT NULL,
  `R2` int(20) NOT NULL,
  `R3` int(20) NOT NULL,
  `R4` int(20) NOT NULL,
  `R5` int(20) NOT NULL,
  `R6` int(20) NOT NULL,
  `R7` int(20) NOT NULL,
  `R8` int(20) NOT NULL,
  `R9` int(20) NOT NULL,
  `R10` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`id_cuestionario`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `R8`, `R9`, `R10`) VALUES
(8, 12, 22, 2, 22, 22, 2, 1, 2, 2, 2),
(10, 12, 22, 2, 22, 22, 2, 1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidop` varchar(20) NOT NULL,
  `apellidom` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `puesto` varchar(20) NOT NULL,
  `salario` int(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `fecha_N` date NOT NULL,
  `curp` varchar(30) NOT NULL,
  `telefono` int(20) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `escolaridad` varchar(20) NOT NULL,
  `cp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id_evaluacion` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `R1` int(20) NOT NULL,
  `R2` int(20) NOT NULL,
  `R3` int(20) NOT NULL,
  `R4` int(20) NOT NULL,
  `R5` int(20) NOT NULL,
  `R6` int(20) NOT NULL,
  `R7` int(20) NOT NULL,
  `R8` int(20) NOT NULL,
  `R9` int(20) NOT NULL,
  `R10` int(20) NOT NULL,
  `id_cuestionario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_evaluacion`, `id_empleado`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `R8`, `R9`, `R10`, `id_cuestionario`) VALUES
(1, 22, 12, 22, 33, 33, 2222, 12, 22, 33, 33, 33, 0),
(6, 1, 12, 22, 2, 22, 22, 2, 1, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(20) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `razon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `id_recurso`, `id_empleado`, `fecha`, `razon`) VALUES
(2, 123, 355, '2019-09-11', 'gdgdhdh'),
(3, 123, 355, '2019-09-11', 'gdgdhdh'),
(4, 123, 355, '2019-09-11', 'gdgdhdh'),
(6, 123, 355, '2019-09-11', 'gdgdhdh'),
(7, 123, 355, '2019-09-11', 'gdgdhdh'),
(8, 123, 355, '2019-09-11', 'gdgdhdh'),
(9, 123, 355, '2019-09-11', 'gdgdhdh'),
(10, 123, 355, '2019-09-11', 'gdgdhdh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_Materia` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `unidad` int(20) NOT NULL,
  `existencia` int(20) NOT NULL,
  `costo` int(20) NOT NULL,
  `id_proveedor` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(30) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `nombre`, `cantidad`, `costo`) VALUES
(8, 'angel', 123, 12345),
(9, 'carlos', 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_compra`
--

CREATE TABLE `materia_compra` (
  `id_Compra` int(11) NOT NULL,
  `id_Materia` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_compra`
--

INSERT INTO `materia_compra` (`id_Compra`, `id_Materia`, `Cantidad`) VALUES
(2, 123, 355),
(3, 123, 355),
(4, 123, 355),
(5, 523, 789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `id_nomina` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`id_nomina`, `id_empleado`, `fecha`, `monto`) VALUES
(1, 72, '2019-09-11', 0),
(2, 72, '2019-09-11', 0),
(3, 72, '2019-09-11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presencia`
--

CREATE TABLE `presencia` (
  `id_presencia` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` int(20) NOT NULL,
  `hora_salida` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presencia`
--

INSERT INTO `presencia` (`id_presencia`, `id_empleado`, `fecha`, `hora_entrada`, `hora_salida`) VALUES
(2, 345, '2019-09-11', 34, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `costo` float NOT NULL,
  `unidad` int(20) NOT NULL,
  `existencia` int(20) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `almacen` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `costo`, `unidad`, `existencia`, `codigo`, `descripcion`, `almacen`, `categoria`) VALUES
(28, 'Dulces', 0, 2, 168, 'A', 'Dulces de caramelo', '150', 'A'),
(29, 'Mazapan', 0, 2, 100, 'B', 'mazapan de chocolate', '1', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `id_venta` int(20) NOT NULL,
  `id_producto` int(20) NOT NULL,
  `cantidad` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_venta`
--

INSERT INTO `producto_venta` (`id_venta`, `id_producto`, `cantidad`) VALUES
(2, 42, 342),
(3, 156, 45678),
(4, 17, 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `razonsocial` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `diireccion` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `razonsocial`, `correo`, `diireccion`, `telefono`) VALUES
(45, 'angel chave', 'kffywu', 'angel@gmail.com', 'Toluca', '773793');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `existencia` varchar(20) NOT NULL,
  `costo` float NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`, `marca`, `descripcion`, `existencia`, `costo`, `id_empleado`, `area`) VALUES
(2, 'ytyuio', 'fgh', 'rtyu', 'ihjk', 2500, 25, 'fhhhf'),
(3, 'ytyuio', 'fgh', 'rtyu', 'ihjk', 2500, 25, 'fhhhf'),
(4, 'ytyuio', 'fgh', 'rtyu', 'ihjk', 2500, 25, 'fhhhf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reemplazos`
--

CREATE TABLE `reemplazos` (
  `id_reemplazo` int(20) NOT NULL,
  `id_recurso` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `falla` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reemplazos`
--

INSERT INTO `reemplazos` (`id_reemplazo`, `id_recurso`, `id_empleado`, `fecha`, `falla`) VALUES
(1, 5678, 3456, '2019-09-29', 'ihjk'),
(2, 5678, 3456, '2019-09-29', 'ihjk'),
(3, 5678, 3456, '2019-09-29', 'ihjk'),
(4, 5678, 3456, '2019-09-29', 'ihjk'),
(6, 534, 23, '2019-10-27', 'fivblasn12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo_extra`
--

CREATE TABLE `tiempo_extra` (
  `id_tiempo` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `horas` int(20) NOT NULL,
  `pago` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiempo_extra`
--

INSERT INTO `tiempo_extra` (`id_tiempo`, `id_empleado`, `horas`, `pago`) VALUES
(2, 567, 0, 332);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_empleado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`, `id_empleado`) VALUES
(8, 'angel', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(20) NOT NULL,
  `id_cliente` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `id_empleado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_cliente`, `fecha`, `total`, `id_empleado`) VALUES
(4, 5, '2019-09-29', 2637, 5),
(5, 324, '2019-09-11', 5300, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD UNIQUE KEY `codigo` (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`id_cuestionario`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);
ALTER TABLE `empleados` ADD FULLTEXT KEY `estado_civil` (`estado_civil`);
ALTER TABLE `empleados` ADD FULLTEXT KEY `estado_civil_2` (`estado_civil`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id_evaluacion`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_Materia`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia_compra`
--
ALTER TABLE `materia_compra`
  ADD PRIMARY KEY (`id_Compra`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`id_nomina`);

--
-- Indices de la tabla `presencia`
--
ALTER TABLE `presencia`
  ADD PRIMARY KEY (`id_presencia`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reemplazos`
--
ALTER TABLE `reemplazos`
  ADD PRIMARY KEY (`id_reemplazo`);

--
-- Indices de la tabla `tiempo_extra`
--
ALTER TABLE `tiempo_extra`
  ADD PRIMARY KEY (`id_tiempo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id_cuestionario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id_evaluacion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_Materia` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materia_compra`
--
ALTER TABLE `materia_compra`
  MODIFY `id_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id_nomina` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `presencia`
--
ALTER TABLE `presencia`
  MODIFY `id_presencia` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  MODIFY `id_venta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reemplazos`
--
ALTER TABLE `reemplazos`
  MODIFY `id_reemplazo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiempo_extra`
--
ALTER TABLE `tiempo_extra`
  MODIFY `id_tiempo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
