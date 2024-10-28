

CREATE TABLE `carrito` (
  `IDCarrito` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `PrecioProducto` decimal(12,8) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL,
  `IDPedido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categoriaproducto` (
  `IDCategoria` int(11) NOT NULL,
  `NomCategoria` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `cliente` (
  `IDCliente` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(50) DEFAULT NULL,
  `ApellidoMaterno` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(350) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cliente` (`IDCliente`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Usuario`, `Contraseña`, `dni`) VALUES
(1, 'Luis', 'Alvarado', NULL, 'luis', '67daae98ed0c612857a716202f463356ffcf1a018ce140ab4a4bebc8eb274e6d', '12345678'),
(2, 'gustavo', 'alegre', NULL, 'gustavo', '67daae98ed0c612857a716202f463356ffcf1a018ce140ab4a4bebc8eb274e6d', '23456789'),
(3, 'alegre', 'alegre', NULL, 'alegre', '80dbfc87f59c891ced5dd54c0b0dedd08d82f8917e8ecd256c8b8ce665e70882', '11112222');

CREATE TABLE `contador` (
  `IDContador` int(11) NOT NULL,
  `Contador` int(11) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `delivery` (
  `IDDelivery` int(11) NOT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `IDPedido` int(11) DEFAULT NULL,
  `IDEmpleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `detallecliente` (
  `IDDetalleCliente` int(11) NOT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `detalleempleado` (
  `IDDetalleEmp` int(11) NOT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Foto` varchar(150) DEFAULT NULL,
  `IDEmpleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `direccion` (
  `IDDireccion` int(11) NOT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  `Referencia` varchar(150) DEFAULT NULL,
  `IDDistrito` int(11) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `distrito` (
  `IDDistrito` int(11) NOT NULL,
  `Distrito` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `empleado` (
  `IDEmpleado` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(50) DEFAULT NULL,
  `ApellidoMaterno` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(150) DEFAULT NULL,
  `IDRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `entrega` (
  `IDEntrega` int(11) NOT NULL,
  `HoraSalida` datetime DEFAULT NULL,
  `HoraEntrega` datetime DEFAULT NULL,
  `IDDelivery` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `factura` (
  `IDFactura` int(11) NOT NULL,
  `CostoTotal` decimal(12,8) DEFAULT NULL,
  `FechaPedido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `intentos` (
  `IDIntentos` int(11) NOT NULL,
  `Fallos` int(11) DEFAULT NULL,
  `Ingresos` int(11) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pago` (
  `IDPago` int(11) NOT NULL,
  `IDPedido` int(11) DEFAULT NULL,
  `IDTipoPago` int(11) DEFAULT NULL,
  `IDFactura` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pedido` (
  `IDPedido` int(11) NOT NULL,
  `MontoFinal` decimal(12,8) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `Estado` varchar(10) DEFAULT NULL,
  `FechaPedido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `producto` (
  `IDProducto` int(11) NOT NULL,
  `NomProducto` varchar(100) DEFAULT NULL,
  `PrecioUnitario` decimal(12,8) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `IDCategoria` int(11) DEFAULT NULL,
  `IDTipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `roles` (
  `IDRol` int(11) NOT NULL,
  `NomRol` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tipopago` (
  `IDTipoPago` int(11) NOT NULL,
  `TipoPago` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tipoproducto` (
  `IDTipo` int(11) NOT NULL,
  `NomTipo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `IDCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuario` (
  `iduser` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`iduser`, `usuario`, `contraseña`) VALUES
(1, 'luis', '$2y$10$KSDchDzNCDR.3sSmL2Z6teCOFSPO07wPA0AmaG5nYVW9xGEJO1Jdq'),
(2, 'gustavo', '$2y$10$e2OkeLO4FENWoVrDvietfuuhD4PKZ2dZ2ZFciheo0X6dKy.hz54dS'),
(3, 'luis', '$2y$10$yNrRzWcQkvlyJdwyjTBrseIFVwO5b.BuIaDDj5gfrnJdqT/8qIi5.'),
(4, 'al', '$2y$10$jMzn2tk.AwUr73t9/ex52ullkB/9HxH593a.GSOu9SgwrWHlXd2J.'),
(5, 'gust', 'd87af06294f0a0325aa5dbdbed96bb45725a4eba5a47615aae15ed8101623ec3'),
(6, '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(7, 'gustavo', '67daae98ed0c612857a716202f463356ffcf1a018ce140ab4a4bebc8eb274e6d'),
(8, 'gustavo', '67daae98ed0c612857a716202f463356ffcf1a018ce140ab4a4bebc8eb274e6d'),
(9, 'luis', 'c5ff177a86e82441f93e3772da700d5f6838157fa1bfdc0bb689d7f7e55e7aba');

ALTER TABLE `carrito`
  ADD PRIMARY KEY (`IDCarrito`),
  ADD KEY `IDProducto` (`IDProducto`),
  ADD KEY `IDPedido` (`IDPedido`);

ALTER TABLE `categoriaproducto`
  ADD PRIMARY KEY (`IDCategoria`);

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`),
  ADD UNIQUE KEY `dni` (`dni`);

ALTER TABLE `contador`
  ADD PRIMARY KEY (`IDContador`),
  ADD KEY `IDProducto` (`IDProducto`);

ALTER TABLE `delivery`
  ADD PRIMARY KEY (`IDDelivery`),
  ADD KEY `IDPedido` (`IDPedido`),
  ADD KEY `IDEmpleado` (`IDEmpleado`);

ALTER TABLE `detallecliente`
  ADD PRIMARY KEY (`IDDetalleCliente`),
  ADD KEY `IDCliente` (`IDCliente`);

ALTER TABLE `detalleempleado`
  ADD PRIMARY KEY (`IDDetalleEmp`),
  ADD KEY `IDEmpleado` (`IDEmpleado`);

ALTER TABLE `direccion`
  ADD PRIMARY KEY (`IDDireccion`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDDistrito` (`IDDistrito`);

ALTER TABLE `distrito`
  ADD PRIMARY KEY (`IDDistrito`);

ALTER TABLE `empleado`
  ADD PRIMARY KEY (`IDEmpleado`),
  ADD KEY `IDRol` (`IDRol`);

ALTER TABLE `entrega`
  ADD PRIMARY KEY (`IDEntrega`),
  ADD KEY `IDDelivery` (`IDDelivery`);

ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFactura`);

ALTER TABLE `intentos`
  ADD PRIMARY KEY (`IDIntentos`),
  ADD KEY `IDCliente` (`IDCliente`);

ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDPago`),
  ADD KEY `IDPedido` (`IDPedido`),
  ADD KEY `IDTipoPago` (`IDTipoPago`),
  ADD KEY `IDFactura` (`IDFactura`);

ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IDPedido`),
  ADD KEY `IDCliente` (`IDCliente`);

ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDCategoria` (`IDCategoria`),
  ADD KEY `IDTipo` (`IDTipo`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`IDRol`);

ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`IDTipoPago`);

ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`IDTipo`),
  ADD KEY `IDCategoria` (`IDCategoria`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`iduser`);

ALTER TABLE `cliente`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `entrega`
  MODIFY `IDEntrega` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`IDProducto`) REFERENCES `producto` (`IDProducto`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`IDPedido`) REFERENCES `pedido` (`IDPedido`);

ALTER TABLE `contador`
  ADD CONSTRAINT `contador_ibfk_1` FOREIGN KEY (`IDProducto`) REFERENCES `producto` (`IDProducto`);

ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`IDPedido`) REFERENCES `pedido` (`IDPedido`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`IDEmpleado`) REFERENCES `empleado` (`IDEmpleado`);

ALTER TABLE `detallecliente`
  ADD CONSTRAINT `detallecliente_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`);

ALTER TABLE `detalleempleado`
  ADD CONSTRAINT `detalleempleado_ibfk_1` FOREIGN KEY (`IDEmpleado`) REFERENCES `empleado` (`IDEmpleado`);

ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `direccion_ibfk_2` FOREIGN KEY (`IDDistrito`) REFERENCES `distrito` (`IDDistrito`);

ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`IDRol`) REFERENCES `roles` (`IDRol`);

ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`IDDelivery`) REFERENCES `delivery` (`IDDelivery`);

ALTER TABLE `intentos`
  ADD CONSTRAINT `intentos_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`);

ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`IDPedido`) REFERENCES `pedido` (`IDPedido`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`IDTipoPago`) REFERENCES `tipopago` (`IDTipoPago`),
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`IDFactura`) REFERENCES `factura` (`IDFactura`);

ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`);

ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IDCategoria`) REFERENCES `categoriaproducto` (`IDCategoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`IDTipo`) REFERENCES `tipoproducto` (`IDTipo`);

ALTER TABLE `tipoproducto`
  ADD CONSTRAINT `tipoproducto_ibfk_1` FOREIGN KEY (`IDCategoria`) REFERENCES `categoriaproducto` (`IDCategoria`);
COMMIT;
