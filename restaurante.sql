-- Creación de tablas con claves primarias

CREATE TABLE `carrito` (
  `IDCarrito` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `PrecioProducto` decimal(12,8) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL,
  `IDPedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDCarrito`)
);

CREATE TABLE `categoriaproducto` (
  `IDCategoria` int(11) NOT NULL,
  `NomCategoria` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`IDCategoria`)
);

CREATE TABLE `cliente` (
  `IDCliente` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(50) DEFAULT NULL,
  `ApellidoMaterno` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(350) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`IDCliente`)
);

CREATE TABLE `contador` (
  `IDContador` int(11) NOT NULL,
  `Contador` int(11) DEFAULT NULL,
  `IDProducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDContador`)
);

CREATE TABLE `delivery` (
  `IDDelivery` int(11) NOT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `IDPedido` int(11) DEFAULT NULL,
  `IDEmpleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDDelivery`)
);

CREATE TABLE `detallecliente` (
  `IDDetalleCliente` int(11) NOT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDDetalleCliente`)
);

CREATE TABLE `detalleempleado` (
  `IDDetalleEmp` int(11) NOT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Foto` varchar(150) DEFAULT NULL,
  `IDEmpleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDDetalleEmp`)
);

CREATE TABLE `direccion` (
  `IDDireccion` int(11) NOT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  `Referencia` varchar(150) DEFAULT NULL,
  `IDDistrito` int(11) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDDireccion`)
);

CREATE TABLE `distrito` (
  `IDDistrito` int(11) NOT NULL,
  `Distrito` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDDistrito`)
);

CREATE TABLE `empleado` (
  `IDEmpleado` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(50) DEFAULT NULL,
  `ApellidoMaterno` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(150) DEFAULT NULL,
  `IDRol` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDEmpleado`)
);

CREATE TABLE `entrega` (
  `IDEntrega` int(11) NOT NULL,
  `HoraSalida` datetime DEFAULT NULL,
  `HoraEntrega` datetime DEFAULT NULL,
  `IDDelivery` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDEntrega`)
);

CREATE TABLE `factura` (
  `IDFactura` int(11) NOT NULL,
  `CostoTotal` decimal(12,8) DEFAULT NULL,
  `FechaPedido` date DEFAULT NULL,
  PRIMARY KEY (`IDFactura`)
);

CREATE TABLE `intentos` (
  `IDIntentos` int(11) NOT NULL,
  `Fallos` int(11) DEFAULT NULL,
  `Ingresos` int(11) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDIntentos`)
);

CREATE TABLE `pago` (
  `IDPago` int(11) NOT NULL,
  `IDPedido` int(11) DEFAULT NULL,
  `IDTipoPago` int(11) DEFAULT NULL,
  `IDFactura` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPago`)
);

CREATE TABLE `pedido` (
  `IDPedido` int(11) NOT NULL,
  `MontoFinal` decimal(12,8) DEFAULT NULL,
  `IDCliente` int(11) DEFAULT NULL,
  `Estado` varchar(10) DEFAULT NULL,
  `FechaPedido` datetime DEFAULT NULL,
  PRIMARY KEY (`IDPedido`)
);

CREATE TABLE `producto` (
  `IDProducto` int(11) NOT NULL,
  `NomProducto` varchar(100) DEFAULT NULL,
  `PrecioUnitario` decimal(12,8) DEFAULT NULL,
  `FotoProducto` varchar(250) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `FechaProducto` datetime DEFAULT NULL,
  `IDCategoria` int(11) DEFAULT NULL,
  `IDTipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDProducto`)
);

CREATE TABLE `roles` (
  `IDRol` int(11) NOT NULL,
  `NomRol` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDRol`)
);

CREATE TABLE `tipopago` (
  `IDTipoPago` int(11) NOT NULL,
  `TipoPago` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDTipoPago`)
);

CREATE TABLE `tipoproducto` (
  `IDTipo` int(11) NOT NULL,
  `NomTipo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `IDCategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDTipo`)
);

-- Creación de claves foráneas

ALTER TABLE `carrito`
  ADD FOREIGN KEY (`IDProducto`) REFERENCES `producto`(`IDProducto`),
  ADD FOREIGN KEY (`IDPedido`) REFERENCES `pedido`(`IDPedido`);

ALTER TABLE `contador`
  ADD FOREIGN KEY (`IDProducto`) REFERENCES `producto`(`IDProducto`);

ALTER TABLE `delivery`
  ADD FOREIGN KEY (`IDPedido`) REFERENCES `pedido`(`IDPedido`),
  ADD FOREIGN KEY (`IDEmpleado`) REFERENCES `empleado`(`IDEmpleado`);

ALTER TABLE `detallecliente`
  ADD FOREIGN KEY (`IDCliente`) REFERENCES `cliente`(`IDCliente`);

ALTER TABLE `detalleempleado`
  ADD FOREIGN KEY (`IDEmpleado`) REFERENCES `empleado`(`IDEmpleado`);

ALTER TABLE `direccion`
  ADD FOREIGN KEY (`IDDistrito`) REFERENCES `distrito`(`IDDistrito`),
  ADD FOREIGN KEY (`IDCliente`) REFERENCES `cliente`(`IDCliente`);

ALTER TABLE `empleado`
  ADD FOREIGN KEY (`IDRol`) REFERENCES `roles`(`IDRol`);

ALTER TABLE `entrega`
  ADD FOREIGN KEY (`IDDelivery`) REFERENCES `delivery`(`IDDelivery`);

ALTER TABLE `intentos`
  ADD FOREIGN KEY (`IDCliente`) REFERENCES `cliente`(`IDCliente`);

ALTER TABLE `pago`
  ADD FOREIGN KEY (`IDPedido`) REFERENCES `pedido`(`IDPedido`),
  ADD FOREIGN KEY (`IDTipoPago`) REFERENCES `tipopago`(`IDTipoPago`),
  ADD FOREIGN KEY (`IDFactura`) REFERENCES `factura`(`IDFactura`);

ALTER TABLE `pedido`
  ADD FOREIGN KEY (`IDCliente`) REFERENCES `cliente`(`IDCliente`);

ALTER TABLE `producto`
  ADD FOREIGN KEY (`IDCategoria`) REFERENCES `categoriaproducto`(`IDCategoria`),
  ADD FOREIGN KEY (`IDTipo`) REFERENCES `tipoproducto`(`IDTipo`);

ALTER TABLE `tipoproducto`
  ADD FOREIGN KEY (`IDCategoria`) REFERENCES `categoriaproducto`(`IDCategoria`);


INSERT INTO carrito (IDCarrito, Cantidad, PrecioProducto, IDProducto, IDPedido) VALUES
(1, 1, 45.00, 1, 1),
(2, 1, 35.00, 2, 2),
(3, 1, 18.00, 4, 3);

INSERT INTO categoriaproducto (IDCategoria, NomCategoria, Descripcion) VALUES
(1, 'Platos Principales', 'Principales platos peruanos como Lomo Saltado y Ceviche'),
(2, 'Bebidas', 'Bebidas tradicionales como Chicha Morada y Pisco Sour'),
(3, 'Entradas', 'Entradas como Papa a la Huancaína y Causa Limeña'),
(4, 'Postres', 'Postres típicos peruanos como Mazamorra Morada y Arroz con Leche');

INSERT INTO cliente (IDCliente, Nombre, ApellidoPaterno, ApellidoMaterno, Usuario, Contraseña, dni) VALUES
(1, 'Luis', 'Alvarado', NULL, 'luis', '67daae98ed0c612857a716202f463356ffcf1a018ce140ab4a4bebc8eb274e6d', '12345678'),
(2, 'gustavo', 'alegre', NULL, 'gustavo', '67daae98ed0c612857a716202f463356ffcf1a018ce140ab4a4bebc8eb274e6d', '23456789'),
(3, 'alegre', 'alegre', NULL, 'alegre', '80dbfc87f59c891ced5dd54c0b0dedd08d82f8917e8ecd256c8b8ce665e70882', '11112222'),
(4, 'Carlos', 'Garcia', 'Lopez', 'carlosg', 'd9ecb5410511f09da8887accb3911a4786862b6523770abe4d387a8b97588801', '87654321'),
(5, 'Maria', 'Perez', 'Sanchez', 'mariap', '204d70655397ecbbb4209bc37a667d6f2d24c0fd04edd1ed17949fe2ffcb2ed0', '87654322'),
(6, 'Rosa', 'Vargas', 'Cruz', 'rosav', '0f42564eb231b7cd945f30f00e7b100d19deeb900594d1631e2a964d481ed10b', '87654323');
