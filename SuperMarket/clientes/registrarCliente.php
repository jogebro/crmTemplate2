<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST['guardar'])){
        require_once('../config.php');

        $config = new Clientes();

        $config -> setNombreCliente($_POST['nombreCliente']);
        $config -> setCelular($_POST['celular']);
        $config -> setCompañia($_POST['compañia']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='clientes.php'</script>";
    }

?>