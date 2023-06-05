<?php
    require_once("../config.php"); 
    $data = new Productos();

    $id = $_GET['id'];
    $data -> setId($id);

    $record = $data -> selectOne();
    $categoria = $data-> obtainCategoria();
    $proveedor = $data-> obtainProveedor();


    $val = $record[0];


    if (isset($_POST['editar'])){
        $data -> setIdCategoria($_POST['id_categoria']);
        $data -> setPrecioUnitario($_POST['precioUnitario']);
        $data -> setStock($_POST['stock']);
        $data -> setUnidadesPedidas($_POST['unidadesPedidas']);
        $data -> setIdProveedor($_POST['id_proveedor']);
        $data -> setProductoNombre($_POST['productoNombre']);
        $data -> setDescontinuado($_POST['descontinuado']);
        

        $data -> update();
        echo "<script>alert('Datos actualizados correctamente');document.location='productos.php'</script>";
    }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Estudiante</title>
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
        <h3 style="margin-bottom: 2rem;">SuperMarKet</h3>
        <img src="../images/logoSuperMarket.png" alt="..." class="imagenPerfil">
        <h3 >Joel Abril</h3>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Categoria a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action="" enctype="multipart/form-data"  method="post">
      <div class="mb-1 col-12">
            <label for="id_categoria" class="form-label">Nombre Cliente</label>
            <select name="id_categoria" id="id_categoria" class="form-control">
              <option value="">Seleccione cliente</option>
              <?php 
                foreach ($categoria as $key => $valCt) {
                  $selected = ($valCt['id'] == $val['id_categoria']) ? 'selected' : '';
              ?>
                  <option value="<?php echo $valCt['id'] ?>" <?php echo $selected ?>><?php echo $valCt['categoriaNombre'] ?></option>
              <?php 
                }
              ?>
            </select> 
          </div>

          <div class="mb-1 col-12">
                <label for="precioUnitario" class="form-label">Precio Unitario</label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                  value="<?php echo $val['precioUnitario'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="stock" class="form-label">Stock</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                  value="<?php echo $val['stock'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="unidadesPedidas" class="form-label">Unidades Pedidas</label>
                <input 
                  type="number"
                  id="unidadesPedidas"
                  name="unidadesPedidas"
                  class="form-control"  
                  value="<?php echo $val['unidadesPedidas'] ?>"
                />
              </div>

          <div class="mb-1 col-12">
            <label for="id_proveedor" class="form-label">Nombre Proveedor</label>
            <select name="id_proveedor" id="id_proveedor" class="form-control">
              <option value="">Seleccione empleado</option>
              <?php 
                foreach ($proveedor as $key => $valP) {
                  $selected = ($valP['id'] == $val['id_proveedor']) ? 'selected' : '';
              ?>
                  <option value="<?php echo $valP['id'] ?>" <?php echo $selected ?>><?php echo $valP['proveedorNombre'] ?></option>
              <?php 
                }
              ?>
            </select>
          </div>

          <div class="mb-1 col-12">
                <label for="productoNombre" class="form-label">Producto</label>
                <input 
                  type="text"
                  id="productoNombre"
                  name="productoNombre"
                  class="form-control"  
                  value="<?php echo $val['productoNombre'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="descontinuado" class="form-label">Descontinuado: </label>
                <select name="descontinuado" id="descontinuado" class="form-control">
                  <option value="">seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>