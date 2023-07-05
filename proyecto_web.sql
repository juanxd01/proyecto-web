-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2022 a las 15:07:13
-- Versión del servidor: 8.0.28
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id_brand` int NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id_brand`, `name`) VALUES
(1, 'BIOINVERT'),
(3, 'admin'),
(4, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_user` int NOT NULL,
  `finished` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `finished`) VALUES
(1, 1, 1),
(2, 1, 0),
(3, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_products`
--

CREATE TABLE `cart_products` (
  `id` int NOT NULL,
  `id_cart` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cart_products`
--

INSERT INTO `cart_products` (`id`, `id_cart`, `id_product`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 1, 1),
(4, 1, 1, 1),
(5, 1, 1, 1),
(6, 1, 1, 1),
(7, 1, 1, 1),
(8, 1, 1, 1),
(9, 1, 1, 1),
(10, 1, 1, 1),
(11, 1, 1, 1),
(12, 1, 1, 1),
(13, 1, 1, 1),
(14, 1, 1, 1),
(15, 1, 1, 1),
(16, 1, 1, 1),
(17, 1, 1, 1),
(18, 1, 1, 1),
(19, 1, 1, 1),
(20, 1, 1, 1),
(21, 1, 1, 1),
(22, 1, 1, 1),
(23, 1, 1, 1),
(24, 1, 1, 1),
(25, 1, 1, 1),
(26, 1, 1, 1),
(27, 1, 1, 1),
(28, 1, 1, 1),
(29, 1, 1, 1),
(30, 1, 1, 1),
(31, 1, 1, 1),
(32, 1, 1, 1),
(33, 1, 1, 1),
(34, 1, 1, 1),
(35, 1, 1, 1),
(36, 1, 1, 1),
(37, 1, 1, 1),
(38, 1, 1, 1),
(39, 1, 1, 1),
(40, 1, 1, 1),
(41, 1, 1, 1),
(42, 1, 1, 1),
(43, 1, 1, 1),
(44, 1, 1, 1),
(45, 1, 1, 1),
(46, 1, 1, 1),
(47, 1, 1, 1),
(48, 1, 1, 1),
(49, 1, 1, 1),
(50, 1, 1, 1),
(51, 1, 1, 1),
(52, 1, 1, 1),
(53, 1, 1, 1),
(54, 1, 1, 1),
(55, 1, 1, 1),
(56, 1, 1, 1),
(57, 1, 1, 1),
(58, 1, 1, 1),
(59, 1, 1, 1),
(60, 1, 1, 1),
(61, 1, 1, 1),
(62, 1, 1, 1),
(63, 1, 1, 1),
(64, 1, 1, 1),
(65, 1, 1, 1),
(66, 1, 1, 1),
(67, 1, 1, 1),
(68, 1, 1, 1),
(69, 1, 1, 1),
(70, 1, 1, 1),
(71, 1, 1, 1),
(72, 1, 1, 1),
(73, 1, 1, 1),
(74, 1, 1, 1),
(75, 1, 1, 1),
(76, 1, 1, 1),
(77, 1, 1, 1),
(78, 1, 1, 1),
(79, 1, 1, 1),
(80, 1, 1, 1),
(81, 1, 1, 1),
(82, 1, 1, 1),
(83, 1, 1, 1),
(84, 1, 1, 1),
(85, 1, 1, 1),
(86, 1, 1, 1),
(87, 1, 1, 1),
(88, 1, 1, 1),
(89, 1, 1, 1),
(90, 1, 1, 1),
(91, 1, 1, 1),
(92, 1, 1, 1),
(93, 1, 1, 1),
(94, 1, 1, 1),
(95, 1, 1, 1),
(96, 1, 1, 1),
(97, 1, 1, 1),
(98, 1, 1, 1),
(99, 1, 1, 1),
(100, 1, 1, 1),
(101, 1, 1, 1),
(102, 1, 1, 1),
(103, 1, 1, 1),
(104, 1, 1, 1),
(105, 1, 1, 1),
(106, 1, 1, 1),
(107, 1, 1, 1),
(108, 1, 1, 1),
(109, 1, 1, 1),
(110, 1, 1, 1),
(111, 1, 1, 1),
(112, 1, 1, 1),
(113, 1, 1, 1),
(114, 1, 1, 1),
(115, 1, 1, 1),
(116, 1, 1, 1),
(117, 1, 1, 1),
(118, 1, 1, 1),
(119, 1, 1, 1),
(120, 1, 1, 1),
(121, 1, 1, 1),
(122, 1, 1, 1),
(123, 1, 1, 1),
(124, 1, 1, 1),
(125, 1, 1, 1),
(126, 1, 1, 1),
(127, 1, 1, 1),
(128, 1, 1, 1),
(129, 1, 1, 1),
(130, 1, 1, 1),
(131, 1, 1, 1),
(132, 1, 1, 1),
(133, 1, 1, 1),
(134, 1, 1, 1),
(135, 1, 1, 1),
(136, 1, 1, 1),
(137, 1, 1, 1),
(138, 1, 1, 1),
(139, 1, 1, 1),
(140, 1, 1, 1),
(141, 1, 1, 1),
(142, 1, 1, 1),
(143, 1, 1, 1),
(144, 1, 1, 1),
(145, 2, 1, 1),
(146, 2, 1, 1),
(147, 2, 1, 1),
(148, 2, 1, 1),
(149, 2, 1, 1),
(150, 2, 1, 1),
(151, 2, 1, 1),
(152, 3, 2, 1),
(153, 2, 3, 1),
(154, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorys`
--

CREATE TABLE `categorys` (
  `id_category` int NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorys`
--

INSERT INTO `categorys` (`id_category`, `name`) VALUES
(1, 'Perros'),
(2, 'Gatos'),
(3, 'Roedores'),
(4, 'Aves'),
(5, 'Reptiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `_long` float NOT NULL,
  `weight` float NOT NULL,
  `state` int NOT NULL,
  `category` int NOT NULL,
  `brand` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `price`, `width`, `height`, `_long`, `weight`, `state`, `category`, `brand`) VALUES
(1, 'Sustrato para roedores', 'El SUSTRATO DE MADERA DE PINO BIOINVERT® es un sustrato muy absorbente, se trata de un producto 100% natural, elaborado con viruta de madera de pino (aserrín), lo que lo hace biodegradable y MUY ABSORBENTE. En su proceso de fabricación pasa por rayos UV/C, lo que sanitiza el producto, superando así, los estándares de la NOM-062-ZOO. Debido a su naturaleza lo puedes desechar fácilmente en composta o basura orgánica. El sustrato es homogéneo en su tamaño y libre de polvo.\r\n\r\nEl sustrato de madera de pino BIOINVERT® es excelente para mascotas como Gatos, Perros, Hurones, Cuyos/Cobayos, Ratones, Ratas, Conejos, Hámsters, Erizos, Chinchillas, Ardillas, Jerbos, Aves, Reptiles, etc...\r\n\r\nBENEFICIOS\r\n-Super absorbente: El sustrato de madera de pino BIOINVERT® es muy absorbente, provocando que el hábitat de tus mascotas permanezca más tiempo limpio y seco.\r\n-Alto control de olores: El sustrato de madera de pino BIOINVERT® absorbe eficientemente los malos olores producidos por la orina y heces de las mascotas o animales, disminuyendo así los niveles de amonio.\r\n\r\n**Atención**\r\nNo se recomienda en animales con pelo largo (angora).\r\n\r\n- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\r\n\r\nESPECIFICACIONES\r\n-El sustrato de madera de pino BIOINVERT® viene encostalado en rafia con un peso aproximado de 10 kilogramos.\r\n-Solo cubrimos garantía si el producto esta sellado.\r\n-Solo cubrimos garantía si el producto esta sellado. -Producto 100% Mexicano\r\n-Existencia todo el año\r\n-Material no perecedero que mantiene sus propiedades si se almacena en un lugar fresco y seco.\r\n\r\n- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\r\n\r\nMODO DE USO\r\n-Poner una cama de 1 dedo de grosor de El SUSTRATO DE MADERA DE PINO BIOINVERT®.\r\n\r\nMANTENIMIENTO\r\n-Conforme su mascota vaya haciendo uso, se debe de retirar y reponer con El SUSTRATO DE MADERA DE PINO BIOINVERT® nuevo.\r\n\r\n¿ME SIRVE PARA ALGÚN OTRA COSA?\r\n¡SÍ! Se puede usar para varias cosas mas:\r\n-Absorción de aceites, solventes y cualquier otro líquido.\r\n-Adornos, manualidades, ofrendas.', 100, 10, 10, 10, 1, 1, 3, 1),
(3, 'a', 'efdfdfd', 100, 5, 6, 10, 1, 1, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_state`
--

CREATE TABLE `product_state` (
  `id_state` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `product_state`
--

INSERT INTO `product_state` (`id_state`, `name`) VALUES
(1, 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipments`
--

CREATE TABLE `shipments` (
  `id_shipment` int NOT NULL,
  `address` text NOT NULL,
  `colony` varchar(128) NOT NULL,
  `cp` varchar(16) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `shipments`
--

INSERT INTO `shipments` (`id_shipment`, `address`, `colony`, `cp`, `id_user`) VALUES
(1, 'no se1', 'no se', '1', 2),
(2, 'no se1', 'no se', '1', 2),
(3, 'no se1', 'no se', '1', 2),
(4, 'no se123', 'no se', '45400', 1),
(5, 'no se123', 'no se', '123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` float NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `password`, `level`) VALUES
(1, 'a', 'a', '1', 'a', 3),
(2, 'juan', 'juancd2201@gmail.com', '3323801010', '123', 3),
(3, 'juan perez', 'juan', '123', '123', 3),
(4, 'xd', 'xd', '12', '12', 3),
(5, 'aaa', 'aaa', '11', 'aaa', 3),
(6, 'bbb', 'bbbb', '222', '111', 3),
(7, 'admin xD', 'admin@admin.com', '3323801010', '123', 2),
(8, 'prueba', 'juancd2201@gmail.com', '123', '123', 3),
(9, 'prueba', 'juancd2201@gmail.com', '123', '123', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indices de la tabla `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `product_state`
--
ALTER TABLE `product_state`
  ADD PRIMARY KEY (`id_state`);

--
-- Indices de la tabla `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id_shipment`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `product_state`
--
ALTER TABLE `product_state`
  MODIFY `id_state` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id_shipment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
