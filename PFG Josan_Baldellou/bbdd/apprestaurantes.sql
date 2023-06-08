-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 21:48:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apprestaurantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `socio` varchar(2) DEFAULT NULL,
  `npedidos` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `socio`, `npedidos`) VALUES
(1, 'Pedro', 'Rodriguez', 'No', 0),
(2, 'Marcos', 'Marquez', 'Si', 0),
(3, 'Quique', 'Martín', 'No', 0),
(4, 'Nadia', 'Perez', 'Si', 0),
(5, 'Sin datos', '', 'No', NULL),
(6, 'miriam', 'pueyo', 'Si', 0),
(7, 'maria', 'Rodriguez', 'No', 0),
(8, 'German', 'Burgos', 'No', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_restaurantes`
--

CREATE TABLE `clientes_restaurantes` (
  `cliente` int(11) NOT NULL,
  `restaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes_restaurantes`
--

INSERT INTO `clientes_restaurantes` (`cliente`, `restaurante`) VALUES
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(6, 10),
(7, 10),
(8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(10) NOT NULL,
  `precioTotal` decimal(6,2) NOT NULL,
  `restaurante` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente`, `fecha`, `estado`, `precioTotal`, `restaurante`) VALUES
(4, 5, '2023-06-05', 'Pagado', '5.00', 7),
(5, 5, '2023-06-05', 'Pagado', '0.50', 7),
(10, 3, '2023-06-05', 'Pagado', '0.50', 7),
(16, 4, '2023-06-05', 'Pendiente', '17.00', 7),
(17, 4, '2023-06-05', 'Pagado', '0.50', 7),
(18, 4, '2023-06-05', 'Pagado', '0.50', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(25) DEFAULT NULL,
  `stock` int(3) DEFAULT NULL,
  `precioUnidad` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `stock`, `precioUnidad`) VALUES
(16, 'Jumpers', 'Snacks', 29, '0.50'),
(17, 'Cafe solo', 'Cafes', 0, '1.10'),
(19, 'Bocadillos calientes', 'Bocadillos', 3, '5.00'),
(20, 'KAS Naranja', 'Bebidas', 72, '1.50'),
(21, 'Botella de agua pequeña', 'Bebidas', 1, '1.00'),
(22, 'Calamares a la romana', 'Picoteo', 0, '5.00'),
(27, 'Patatas bravas', 'Bebidas alcohólicas', 0, '4.50'),
(32, 'RonCola', 'Bebidas alcohólicas', 25, '5.00'),
(33, 'Carajillo Terry', 'Cafes', 29, '1.50'),
(34, 'Bocadillo Frio', 'Bocadillos', 38, '4.00'),
(35, 'Chupito tequila', 'Bebidas alcohólicas', 20, '1.00'),
(36, 'Zumo de melocoton', 'Bebidas', 23, '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_pedidos`
--

CREATE TABLE `productos_pedidos` (
  `idprod` int(11) NOT NULL,
  `idped` int(11) NOT NULL,
  `cantidad` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_pedidos`
--

INSERT INTO `productos_pedidos` (`idprod`, `idped`, `cantidad`) VALUES
(16, 5, 2),
(16, 10, 1),
(16, 17, 1),
(16, 18, 1),
(20, 10, 2),
(20, 16, 2),
(21, 10, 1),
(21, 16, 1),
(34, 10, 3),
(34, 16, 3),
(36, 10, 1),
(36, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_restaurantes`
--

CREATE TABLE `productos_restaurantes` (
  `producto` int(11) NOT NULL,
  `restaurante` int(10) NOT NULL,
  `stock` int(3) DEFAULT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_restaurantes`
--

INSERT INTO `productos_restaurantes` (`producto`, `restaurante`, `stock`, `precio`) VALUES
(20, 10, 2, '1.50'),
(34, 7, 54, '4.00'),
(34, 10, 25, '4.00'),
(36, 7, 25, '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `propietario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nombre`, `propietario`) VALUES
(7, 'abc', 'neymar'),
(8, 'segada1', 'KingNildo'),
(9, 'el serruchazo', 'KingNildo'),
(10, 'cotilleo', 'tere');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nickname` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nickname`, `nombre`, `apellidos`, `email`, `contraseña`) VALUES
('admin', 'admin', 'admin', 'admin@admin.com', 'admin'),
('KingNildo', 'Reinildo', 'Mandava', 'rmandava@god.com', 'serruchada'),
('neymar', 'afsafdasfsf', 'sfdasfsf', 'asfsafsfd', 'a'),
('tere', 'tany', 'chiqui', 'mama', 'yaya');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_restaurantes`
--
ALTER TABLE `clientes_restaurantes`
  ADD PRIMARY KEY (`cliente`,`restaurante`),
  ADD KEY `restaurante` (`restaurante`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `restaurante` (`restaurante`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_pedidos`
--
ALTER TABLE `productos_pedidos`
  ADD PRIMARY KEY (`idprod`,`idped`),
  ADD KEY `idped` (`idped`);

--
-- Indices de la tabla `productos_restaurantes`
--
ALTER TABLE `productos_restaurantes`
  ADD PRIMARY KEY (`producto`,`restaurante`),
  ADD KEY `restaurante` (`restaurante`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propietario` (`propietario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes_restaurantes`
--
ALTER TABLE `clientes_restaurantes`
  ADD CONSTRAINT `clientes_restaurantes_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `clientes_restaurantes_ibfk_2` FOREIGN KEY (`restaurante`) REFERENCES `restaurantes` (`id`),
  ADD CONSTRAINT `clientes_restaurantes_ibfk_3` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`restaurante`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `productos_pedidos`
--
ALTER TABLE `productos_pedidos`
  ADD CONSTRAINT `productos_pedidos_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `productos_pedidos_ibfk_2` FOREIGN KEY (`idped`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `productos_pedidos_ibfk_3` FOREIGN KEY (`idprod`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos_restaurantes`
--
ALTER TABLE `productos_restaurantes`
  ADD CONSTRAINT `productos_restaurantes_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `productos_restaurantes_ibfk_2` FOREIGN KEY (`restaurante`) REFERENCES `restaurantes` (`id`);

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `restaurantes_ibfk_1` FOREIGN KEY (`propietario`) REFERENCES `usuarios` (`nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
