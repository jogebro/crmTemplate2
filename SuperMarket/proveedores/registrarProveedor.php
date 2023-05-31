<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST['guardar'])){
        require_once('../config.php');

        $config = new Proveedores();

        $config -> setNombreProveedor($_POST['nombreProveedor']);
        $config -> setCelular($_POST['celular']);
        $config -> setCiudad($_POST['ciudad']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='proveedores.php'</script>";
    }

?>