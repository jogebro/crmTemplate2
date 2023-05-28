<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("db.php");

    class ConfigCategorias{
        private $id;
        private $nombreCategoria;
        private $descripcion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombreCategoria = '', $descripcion = '', $imagen = ''){
            $this->id = $id;
            $this->nombreCategoria = $nombreCategoria;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
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

    class ConfigClientes{
        private $id;
        private $nombreCliente;
        private $celular;
        private $compañia;
        protected $dbCnx;

        public function __construct($id = 0, $nombreCliente = '', $celular = 0, $compañia = ''){
            $this->id = $id;
            $this->nombreCliente = $nombreCliente;
            $this->celular = $celular;
            $this->compañia = $compañia;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
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

    class ConfigEmpleados{
        private $id;
        private $nombreEmpleado;
        private $celular;
        private $direccion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombreEmpleado = '', $celular = 0, $direccion = '', $imagen = ''){
            $this->id = $id;
            $this->nombreEmpleado = $nombreEmpleado;
            $this->celular = $celular;
            $this->direccion = $direccion;
            $this->imagen = $imagen;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
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
?>