<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST['guardar'])){
        require_once('../config.php');

        $config = new DetallesFactura();

        $config -> setIdFactura($_POST['idFactura']);
        $config -> setIdProducto($_POST['idProducto']);
        $config -> setCantidad($_POST['cantidad']);
        $config -> setPrecioVenta($_POST['precioVenta']);

        $config -> insertData();
        
        echo "<script>alert('datos guardados');document.location='detalleFactura.php'</script>";
    }

?>