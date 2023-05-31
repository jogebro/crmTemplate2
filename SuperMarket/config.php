<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);
    
error_reporting(E_ALL);
    
    require_once("conexion/conexion.php");

    class Categorias extends Conexion{
        private $id;
        private $nombreCategoria;
        private $descripcion;
        private $imagen;

        public function __construct($id = 0, $nombreCategoria = '', $descripcion = '', $imagen = '', $dbCnx = ''){
            $this->id = $id;
            $this->nombreCategoria = $nombreCategoria;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;
            
            parent::__construct($dbCnx);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setNombreCategoria($nombreCategoria) {
            $this->nombreCategoria = $nombreCategoria;
        }
    
        public function getNombreCategoria() {
            return $this->nombreCategoria;
        }
    
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }
    
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    
        public function getImagen() {
            return $this->imagen;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO categorias (categoriaNombre, descripcion, imagen) VALUES (?, ?, ?)");
                $stmt->execute([$this->nombreCategoria, $this->descripcion, $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM categorias WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='categorias.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE categorias SET categoriaNombre = ?, descripcion = ?, imagen = ? WHERE id = ?");
                $stm -> execute([$this->nombreCategoria, $this->descripcion, $this->imagen, $this->id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }

    class Clientes extends Conexion{
        private $id;
        private $nombreCliente;
        private $celular;
        private $compañia;

        public function __construct($id = 0, $nombreCliente = '', $celular = 0, $compañia = '', $dbCnx = ''){
            $this->id = $id;
            $this->nombreCliente = $nombreCliente;
            $this->celular = $celular;
            $this->compañia = $compañia;

            parent::__construct($dbCnx);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setNombreCliente($nombreCliente) {
            $this->nombreCliente = $nombreCliente;
        }
    
        public function getNombreCliente() {
            return $this->nombreCliente;
        }
    
        public function setCelular($celular) {
            $this->celular = $celular;
        }
    
        public function getCelular() {
            return $this->celular;
        }

        public function setCompañia($compañia) {
            $this->compañia = $compañia;
        }
    
        public function getCompañia() {
            return $this->compañia;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO clientes (clienteNombre, celular, compañia) VALUES (?, ?, ?)");
                $stmt->execute([$this->nombreCliente, $this->celular, $this->compañia]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM clientes WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='clientes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM clientes WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE clientes SET clienteNombre = ?, celular = ?, compañia = ? WHERE id = ?");
                $stm -> execute([$this->nombreCliente, $this->celular, $this->compañia, $this->id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }

    class Empleados extends Conexion{
        private $id;
        private $nombreEmpleado;
        private $celular;
        private $direccion;
        private $imagen;

        public function __construct($id = 0, $nombreEmpleado = '', $celular = 0, $direccion = '', $imagen = '', $dbCnx = ''){
            $this->id = $id;
            $this->nombreEmpleado = $nombreEmpleado;
            $this->celular = $celular;
            $this->direccion = $direccion;
            $this->imagen = $imagen;

            parent::__construct($dbCnx);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }

        public function setNombreEmpleado($nombreEmpleado) {
            $this->nombreEmpleado = $nombreEmpleado;
        }
    
        public function getNombreEmpleado() {
            return $this->nombreEmpleado;
        }

        public function setCelular($celular) {
            $this->celular = $celular;
        }
    
        public function getCelular() {
            return $this->celular;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }

        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    
        public function getImagen() {
            return $this->imagen;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO empleados (empleadoNombre, celular, direccion, imagen) VALUES (?, ?, ?, ?)");
                $stmt->execute([$this->nombreEmpleado, $this->celular, $this->direccion, $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM empleados WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='empleados.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE empleados SET empleadoNombre = ?, celular = ?, direccion = ?, imagen = ? WHERE id = ?");
                $stm -> execute([$this->nombreEmpleado, $this->celular, $this->direccion, $this->imagen, $this->id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }

    class Facturas extends Conexion{
        private $id;
        private $id_cliente;
        private $id_empleado;
        private $fecha;

        public function __construct($id = 0, $id_cliente = '', $id_empleado = '', $fecha = '', $dbCnx = ''){
            $this->id = $id;
            $this->id_cliente = $id_cliente;
            $this->id_empleado = $id_empleado;
            $this->fecha = $fecha;

            parent::__construct($dbCnx);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setIdCliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }
    
        public function getIdCliente() {
            return $this->id_cliente;
        }
    
        public function setIdEmpleado($id_empleado){
            $this->id_empleado = $id_empleado;
        }
    
        public function getIdEmpleado() {
            return $this->id_empleado;
        }
    
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    
        public function getFecha() {
            return $this->fecha;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO facturas (id_cliente, id_empleado, fecha) VALUES (?, ?, ?)");
                $stmt->execute([$this->id_cliente, $this->id_empleado, $this->fecha]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * from facturas inner join clientes on facturas.id_cliente = clientes.id inner join empleados on facturas.id_empleado = empleados.id
                ");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainCliente(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT id,clienteNombre FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainEmpleado(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT id,empleadoNombre FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM facturas WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='facturas.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM facturas WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }

    class Proveedores extends Conexion{
        private $id;
        private $nombreProveedor;
        private $celular;
        private $ciudad;

        public function __construct($id = 0, $nombreProveedor = '', $celular = 0, $ciudad = '', $dbCnx = ''){
            $this->id = $id;
            $this->nombreProveedor = $nombreProveedor;
            $this->celular = $celular;
            $this->ciudad = $ciudad;

            parent::__construct($dbCnx);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setNombreProveedor($nombreProveedor) {
            $this->nombreProveedor = $nombreProveedor;
        }
    
        public function getNombreProveedor() {
            return $this->nombreProveedor;
        }
    
        public function setCelular($celular) {
            $this->celular = $celular;
        }
    
        public function getCelular() {
            return $this->celular;
        }
    
        public function setCiudad($ciudad) {
            $this->ciudad = $ciudad;
        }
    
        public function getCiudad() {
            return $this->ciudad;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO proveedores (proveedorNombre, celular, ciudad) VALUES (?, ?, ?)");
                $stmt->execute([$this->nombreProveedor, $this->celular, $this->ciudad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM proveedores WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='proveedores.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE proveedores SET proveedorNombre = ?, celular = ?, ciudad = ? WHERE id = ?");
                $stm -> execute([$this->nombreProveedor, $this->celular, $this->ciudad, $this->id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }

    class Productos extends Conexion{
        private $id;
        private $id_categoria;
        private $precioUnitario;
        private $stock;
        private $unidadesPedidas;
        private $id_proveedor;
        private $productoNombre;
        private $descontinuado;

        public function __construct($id = 0, $id_categoria = '', $precioUnitario = 0, $stock = 0, $unidadesPedidas = 0, $id_proveedor = '', $productoNombre = '', $descontinuado = '', $dbCnx = ''){
            $this->id = $id;
            $this->id_categoria = $id_categoria;
            $this->precioUnitario = $precioUnitario;
            $this->stock = $stock;
            $this->unidadesPedidas = $unidadesPedidas;
            $this->id_proveedor = $id_proveedor;
            $this->productoNombre = $productoNombre;
            $this->descontinuado = $descontinuado;

            parent::__construct($dbCnx);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setIdCategoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
    
        public function getIdCategoria() {
            return $this->id_categoria;
        }
    
        public function setPrecioUnitario($precioUnitario) {
            $this->precioUnitario = $precioUnitario;
        }
    
        public function getPrecioUnitario() {
            return $this->precioUnitario;
        }
    
        public function setStock($stock) {
            $this->stock = $stock;
        }
    
        public function getStock() {
            return $this->stock;
        }

        public function setUnidadesPedidas($unidadesPedidas) {
            $this->unidadesPedidas = $unidadesPedidas;
        }
    
        public function getUnidadesPedidas() {
            return $this->unidadesPedidas;
        }

        public function setIdProveedor($id_proveedor) {
            $this->id_proveedor = $id_proveedor;
        }
    
        public function getIdProveedor() {
            return $this->id_proveedor;
        }

        public function setProductoNombre($productoNombre) {
            $this->productoNombre = $productoNombre;
        }
    
        public function getProductoNombre() {
            return $this->productoNombre;
        }

        public function setDescontinuado($descontinuado) {
            $this->descontinuado = $descontinuado;
        }
    
        public function getDescontinuada() {
            return $this->descontinuado;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO productos (id_categoria, precioUnitario, stock, unidadesPedidas, id_proveedor, productoNombre, descontinuado) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$this->id_categoria, $this->precioUnitario, $this->stock, $this->unidadesPedidas, $this->id_proveedor, $this->productoNombre, $this->descontinuado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id INNER JOIN proveedores ON productos.id_proveedor = proveedores.id");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainCategoria(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT id, categoriaNombre FROM categorias");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainProveedor(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT id, proveedorNombre FROM proveedores");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM productos WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='productos.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        /* public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM proveedores WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='proveedores.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE proveedores SET proveedorNombre = ?, celular = ?, ciudad = ? WHERE id = ?");
                $stm -> execute([$this->nombreProveedor, $this->celular, $this->ciudad, $this->id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        } */
    }
?>