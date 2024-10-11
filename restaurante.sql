-- Creando las tablas de la BD

create table Cliente (
	IDCliente int primary key auto_increment,
    Nombre varchar(50),
    ApellidoPaterno varchar(50),
    ApellidoMaterno varchar(50),
    Usuario varchar(50),
    Contraseña varchar(150),
    dni varchar(8) unique
);

create table DetalleCliente(
	IDDetalleCliente int primary key,
    Telefono varchar(9),
    Correo varchar(100),
    Foto varchar(100),
    IDCliente int
);

create table Intentos(
	IDIntentos int primary key,
    Fallos int,
    Ingresos int,
    IDCliente int
);

create table Direccion(
	IDDireccion int primary key,
    Direccion varchar(150),
    Referencia varchar(150),
    IDDistrito int,
    IDCliente int
);

create table Distrito(
	IDDistrito int primary key,
    Distrito varchar(50)    
);

create table Producto(
	IDProducto int primary key,
    NomProducto varchar(100),
    PrecioUnitario decimal(12,8),
    Descripcion varchar(150),
    Cantidad int,
    IDCategoria int,
    IDTipo int
);

create table Contador(
	IDContador int primary key,
    Contador int,
    IDProducto int
);

create table CategoriaProducto(
	IDCategoria int primary key,
    NomCategoria varchar(50),
    Descripcion varchar(150)
);

create table TipoProducto(
	IDTipo int primary key,
    NomTipo varchar(50),
    Descripcion varchar(150),
    IDCategoria int
);

create table Carrito(
	IDCarrito int primary key,
	Cantidad int,
    PrecioProducto decimal(12,8),
    IDProducto int,
    IDPedido int
);

create table Pedido(
	IDPedido int primary key,
    MontoFinal decimal(12,8),
    IDCliente int,
    Estado varchar(10)
);

create table Pago(
	IDPago int primary key,
    IDPedido int,
    IDTipoPago int,
    IDFactura int,
    Estado int
);

create table TipoPago(
	IDTipoPago int primary key,
    TipoPago varchar(100)
);

create table Factura(
	IDFactura int primary key,
    CostoTotal decimal(12,8),
    FechaPedido date
);

create table Delivery(
	IDDelivery int primary key,
    Estado varchar(50),
    IDPedido int,
    IDEmpleado int
);

create table Empleado(
	IDEmpleado int primary key,
    Nombre varchar(50),
    ApellidoPaterno varchar(50),
    ApellidoMaterno varchar(50),
    Usuario varchar(50),
    Contraseña varchar(150),
    IDRol int
);

create table DetalleEmpleado(
	IDDetalleEmp int primary key,
    Telefono varchar(9),
    Correo varchar(100),
    Foto varchar(150),
    IDEmpleado int
);

create table Roles(
	IDRol int primary key,
    NomRol varchar(50),
    Descripcion varchar(100)
);

-- Añadiendo las FK
alter table DetalleCliente add foreign key (IDCliente) references Cliente(IDCliente);

alter table Intentos add foreign key (IDCliente) references Cliente(IDCliente);

alter table Direccion add foreign key (IDCliente) references Cliente(IDCliente);
alter table Direccion add foreign key (IDDistrito) references Distrito(IDDistrito);

alter table Producto add foreign key (IDCategoria) references CategoriaProducto(IDCategoria);
alter table Producto add foreign key (IDTipo) references TipoProducto(IDTipo);

alter table TipoProducto add foreign key (IDCategoria) references CategoriaProducto(IDCategoria);

alter table Contador add foreign key (IDProducto) references Producto(IDProducto);

alter table Carrito add foreign key (IDProducto) references Producto(IDProducto);
alter table Carrito add foreign key (IDPedido) references Pedido(IDPedido);

alter table Pago add foreign key (IDPedido) references Pedido(IDPedido);
alter table Pago add foreign key (IDTipoPago) references TipoPago(IDTipoPago);
alter table Pago add foreign key (IDFactura) references Factura(IDFactura);

alter table Empleado add foreign key (IDRol) references Roles(IDRol);

alter table DetalleEmpleado add foreign key (IDEmpleado) references Empleado(IDEmpleado);

alter table Delivery add foreign key (IDPedido) references Pedido(IDPedido);
alter table Delivery add foreign key (IDEmpleado) references Empleado(IDEmpleado);

alter table Pedido add foreign key (IDCliente) references Cliente(IDCliente);
