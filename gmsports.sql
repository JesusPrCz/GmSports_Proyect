-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2026 a las 02:42:33
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
-- Base de datos: `gmsports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `fecha_suscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `boletin`
--

INSERT INTO `boletin` (`id`, `nombre`, `correo`, `telefono`, `fecha_suscripcion`) VALUES
(1, 'david', 'davi069@gmail.com', '2831093455', '2026-09-17 00:48:26'),
(2, 'Mike Guzmán Tib', 'mikegr3433@gmail.co', '4444322r', '2026-10-14 01:08:36'),
(3, 'Francisco Mader', 'fraxkmadzz@gmail.com', '948398493', '2026-10-14 01:52:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `usuario` varchar(35) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `notificaciones` varchar(20) NOT NULL,
  `region` varchar(10) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `unidad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`usuario`, `correo`, `contraseña`, `telefono`, `notificaciones`, `region`, `idioma`, `unidad`) VALUES
('bekam', 'davi069@gmail.com', 'rtx44', '2831093455', '', '', '', ''),
('Jose Torres', 'torresjos34ft@gmail.com', '1234590', '2834568769', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `talla` varchar(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `producto`, `talla`, `color`, `cantidad`, `total`, `metodo_pago`, `fecha`) VALUES
(1, 'Zapatillas Nike Air Force 1', '37', 'Marr?n', 1, 2599.00, 'OXXO', '2026-09-17 00:48:57'),
(2, 'Zapatillas Nike Air Force 1', '39', 'Negro', 2, 5198.00, 'PayPal', '2026-09-17 00:49:38'),
(3, 'Zapatillas Nike G.T. Hustle 3', '23', 'Azul', 2, 3998.00, 'PayPal', '2026-09-17 00:49:38'),
(4, 'Playera Deportiva Nike Pro', 'XL', 'negro', 1, 649.00, 'PayPal', '2026-09-17 00:50:12'),
(5, 'Top Deportivo', 'XL', 'Fucsia', 5, 1295.00, 'Tarjeta de Credito/Debito', '2026-09-17 00:50:28'),
(6, 'Playera Deportiva Pro Training', 'L', 'rojo oscuro', 1, 549.00, 'PayPal', '2026-09-17 00:51:01'),
(7, 'Sujetador Deportivo', 'XS', 'Azul', 1, 290.00, 'PayPal', '2026-09-17 00:51:01'),
(8, 'Zapatillas Nike Giannis Inmortality 4', '23', 'Negro', 1, 2686.00, 'Tarjeta de Credito/Debito', '2026-10-21 18:32:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id` int(20) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(35) NOT NULL,
  `razon` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`id`, `nombre`, `email`, `razon`) VALUES
(4994, 'deijdiencnenkndknenkndnsankendnkdm c sl ', 'klenklbrbjl@gmail.com', 'lkneonrw.kjfkqrj  wljnfINNFKNLNFLKnjdi484895&%#&/$'),
(9933, 'david', 'davi069@gmail.com', 'empaque roto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(18) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `pagina` varchar(30) NOT NULL,
  `productosnuevos` varchar(35) NOT NULL,
  `frecuencia` varchar(35) NOT NULL,
  `pago` varchar(35) NOT NULL,
  `comentario` varchar(60) NOT NULL,
  `calificacion` varchar(25) NOT NULL,
  `gestion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`nombre`, `correo`, `telefono`, `pagina`, `productosnuevos`, `frecuencia`, `pago`, `comentario`, `calificacion`, `gestion`) VALUES
('david', 'davi069@gmail.com', '2831093455', 'recommendation', 'pants', '3-month', 'tarjeta', 'no', 'excellent', 'un poco si'),
('david', 'davi069@gmail.com', '2831093455', 'social-media', 'shirts', '6-month', 'efectivo', 'ho', 'good', 'no'),
('Alejandro De la Cruz', 'Aleczccmf444@gamil', '299 939 94', 'internet-search', 'accessories', '3-month', 'tarjeta', '', 'good', 'NO'),
('dd', 'g@gmail.com', '3334', 'social-media', 'shirts', '3-month', 'paypal', '', 'good', ''),
('Jose Torres', 'torresjos34ft@gmai', '2834568769', 'internet-search', 'accessories', 'months', 'tarjeta', 'No', 'good', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas_distribuidor`
--

CREATE TABLE `quejas_distribuidor` (
  `nombre` varchar(40) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mensaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `quejas_distribuidor`
--

INSERT INTO `quejas_distribuidor` (`nombre`, `email`, `mensaje`) VALUES
('Daniel Hernanez Ramirez Castañeda De la ', 'dhtrczslpcrwoiegjieujhdsmmmmliz2784', 'Nofoii  jhwbjkewkjjekwbcbmjabjkekwrhi4hlkfebjebfkjbkjbuigjhvfuyvbbsxnnOlllego en malestado y root el'),
('david', 'davi069@gmail.com', 'hol'),
('Manolo Fuentes Robles Canseco Figueroa V', 'mfrcvgrb4rmx495903sx0@gmail.com', 'El paquete no fue entregado en el domicilio, ):(. El repartidor me hizo hacer pagar en efectivo por ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas_tienda`
--

CREATE TABLE `quejas_tienda` (
  `nombre` varchar(40) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mensaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `quejas_tienda`
--

INSERT INTO `quejas_tienda` (`nombre`, `email`, `mensaje`) VALUES
('david', 'davi069@gmail.com', 'hola'),
('fd', 'dq@icloud', 'd'),
('Leo Paredes Rojas Casimiro Figueroa Hern', 'lprfyexz4rmd495903sx0@gmail.com', 'Intenté realizar un pedido de dos tenis y me decía qu3 no se podía realizar la compra porque estaban');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quejas_distribuidor`
--
ALTER TABLE `quejas_distribuidor`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `quejas_tienda`
--
ALTER TABLE `quejas_tienda`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletin`
--
ALTER TABLE `boletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
