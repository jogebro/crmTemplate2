<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

  require_once('../config.php');

  session_start();

  $data = new DetallesFactura();

  $all = $data -> obtainAll();
  $factura = $data->obtainFacturas();
  $producto = $data->obtainProductos();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuperMarket </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/supermarket.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">SuperMarket</h3>
        <img src="../images/logoSuperMarket.png" alt="" class="imagenPerfil">
        <h3><?php echo $_SESSION['username']?></h3>
      </div>
      <div class="menus">
        <a href="../../Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../categorias/categorias.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Categorias</h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../facturas/facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../proveedores/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="detalleFactura.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Detalle Facturas</h3>
        </a>
        <a href="../../Login/loginRegister.php" id="salir" style="display: flex;gap:1px;">
          <i class="bi bi-x-square"></i>
          <h3 style="margin: 0px;">salir</h3>
        </a>
        

      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Categorias</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">FACTURA ID</th>
              <th scope="col">PRODUCTO ID</th>
              <th scope="col">CANTIDAD</th>
              <th scope="col">PRECIO VENTA</th>
              <th scope="col">DETALLE</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
              foreach ($all as $key => $val){
            ?>
            <tr>
              <td><?php echo $val['id_factura'] ?></td>
              <td><?php echo $val['id_producto'] ?></td>
              <td><?php echo $val['cantidad'] ?></td>
              <td><?php echo $val['precioVenta'] ?></td>
              <td>
                <a class="btn btn-danger" href="borrarCategoria.php?id=<?= $val['id'] ?>&req=delete">BORRAR</a>
                <!-- <a class="btn btn-warning" href="actualizarCategoria.php?id=<?= $val['id']?>">Editar</a> -->
              </td>
              
            </tr>

            <?php
              }
            ?>
          </tbody>
                
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle Factura</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarDetalle.php" method="post">
              <div class="mb-1 col-12">
                <label for="idFactura" class="form-label">ID Factura: </label>
                <select name="idFactura" id="idFactura" class="form-control">
                  <option value="">Seleccione id factura</option>
                  <?php
                    foreach($factura as $key => $valfat){
                  ?>
                  <option value="<?php echo $valfat['id']?>"><?php echo $valfat['id']?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="idProducto" class="form-label">Producto: </label>
                <select name="idProducto" id="idProducto" class="form-control">
                  <option value="">Seleccione Producto</option>
                  <?php
                    foreach($producto as $key => $valpro){
                  ?>
                  <option value="<?php echo $valpro['id']?>"><?php echo $valpro['productoNombre']?></option>
                  <?php
                    }
                  ?>

                </select>
              </div>

              <div class="mb-1 col-5">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input 
                  type="number"
                  id="cantidad"
                  name="cantidad"
                  class="form-control"  
                 
                />
              </div>
              <div class="mb-1 col-5">
                <label style="margin-left:4.8rem;" for="precioVenta" class="form-label">Precio Venta</label>
                <input 
                  style="margin-left:4.8rem;"
                  type="number"
                  id="precioVenta"
                  name="precioVenta"
                  class="form-control"  
                 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>
</body>

</html>