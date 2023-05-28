CREATE DATABASE superMarket;

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
    id_empleado INT,
    id_cliente INT,
    fecha VARCHAR(50),
    Foreign Key (id_empleado) REFERENCES empleados(id),
    Foreign Key (id_cliente) REFERENCES clientes(id)
);