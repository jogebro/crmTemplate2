<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST['guardar'])){
        require_once('../config.php');

        $config = new Productos();

        $config -> setIdCategoria($_POST['id_categoria']);
        $config -> setPrecioUnitario($_POST['precioUnitario']);
        $config -> setStock($_POST['stock']);
        $config -> setUnidadesPedidas($_POST['unidadesPedidas']);
        $config -> setIdProveedor($_POST['id_proveedor']);
        $config -> setProductoNombre($_POST['productoNombre']);
        $config -> setDescontinuado($_POST['descontinuado']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='productos.php'</script>";
    }

?>