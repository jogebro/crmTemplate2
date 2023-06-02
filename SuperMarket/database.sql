-- Active: 1685446599434@@127.0.0.1@3306@superMarket
CREATE DATABASE superMarket;

SHOW DATABASES;
USE superMarket;

SHOW TABLES;

CREATE TABLE categorias(
    id INT primary key AUTO_INCREMENT,
    categoriaNombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50),
    imagen VARBINARY(50)
);

CREATE TABLE clientes(
    id INT primary key AUTO_INCREMENT,
    clienteNombre VARCHAR (50) NOT NULL,
    celular VARCHAR (50),
    compañia VARCHAR (50)
);

CREATE TABLE empleados(
    id INT primary key AUTO_INCREMENT,
    empleadoNombre VARCHAR (50) NOT NULL,
    celular VARCHAR (50),
    direccion VARCHAR (50),
    imagen VARBINARY(50)
);

CREATE TABLE facturas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    id_empleado INT,
    fecha VARCHAR(50),
    Foreign Key fk_id_empleado (id_empleado) REFERENCES empleados(id),
    Foreign Key fk_id_cliente (id_cliente) REFERENCES clientes(id)
);

DROP TABLE facturas;
DESCRIBE facturas;
CREATE TABLE proveedores(
    id INT primary key AUTO_INCREMENT,
    proveedorNombre VARCHAR (50) NOT NULL,
    celular VARCHAR (50),
    ciudad VARCHAR (50)
);

CREATE TABLE productos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT,
    precioUnitario FLOAT,
    stock INT,
    unidadesPedidas INT,
    id_proveedor INT,
    productoNombre VARCHAR(50),
    descontinuado VARCHAR(10),

    FOREIGN KEY (id_categoria) REFERENCES categorias (id),
    FOREIGN KEY (id_proveedor) REFERENCES proveedores (id)
);

DESCRIBE productos;
CREATE TABLE detalleFacturas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_factura INT,
    id_producto INT,
    cantidad INT,
    precioVenta INT,

    FOREIGN KEY (id_factura) REFERENCES facturas (id),
    FOREIGN KEY (id_producto) REFERENCES productos (id)    
);
DROP TABLE detalleFacturas;
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idEmpleado INT NOT NULL,
    email VARCHAR(80) NOT NULL,
    username VARCHAR(80) NOT NULL,
    password VARCHAR(60) NOT NULL,
    FOREIGN KEY (idEmpleado) REFERENCES empleados(id)
);