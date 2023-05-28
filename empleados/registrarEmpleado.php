<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST['guardar'])){
        require_once('../config.php');

        $config = new ConfigEmpleados();

        $config -> setNombreEmpleado($_POST['nombreEmpleado']);
        $config -> setCelular($_POST['celular']);
        $config -> setDireccion($_POST['direccion']);
        $config -> setImagen($_POST['imagen']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='empleados.php'</script>";
    }

?>