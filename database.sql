CREATE DATABASE superMarket;

USE superMarket;

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