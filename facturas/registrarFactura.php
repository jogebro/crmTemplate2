<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST['guardar'])){
        require_once('../config.php');

        $config = new ConfigFacturas();

        $config -> setFecha($_POST['fecha']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='facturas.php'</script>";
    }

?>