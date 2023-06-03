<?php
    require_once("../config.php"); 
    $data = new Productos();

    $id = $_GET['id'];
    $data -> setId($id);

    $record = $data -> selectOne();


    $val = $record[0];


    if (isset($_POST['editar'])){
        $data -> setIdCategoria($_POST['id_categoria']);
        $data -> setIdProveedor($_POST['id_proveedor']);
        $data -> setPrecioUnitario($_POST['precioUnitario']);

        $data -> update();
        echo "<script>alert('Datos actualizados correctamente');document.location='facturas.php'</script>";
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
            <label for="id_cliente" class="form-label">Nombre Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control">
              <option value="">Seleccione cliente</option>
              <?php 
                foreach ($cliente as $key => $valC) {
                  $selected = ($valC['id'] == $val['id_cliente']) ? 'selected' : '';
              ?>
                  <option value="<?php echo $valC['id'] ?>" <?php echo $selected ?>><?php echo $valC['clienteNombre'] ?></option>
              <?php 
                }
              ?>
            </select> 
          </div>
          <!-- ... -->
          <div class="mb-1 col-12">
            <label for="id_empleado" class="form-label">Nombre Empleado</label>
            <select name="id_empleado" id="id_empleado" class="form-control">
              <option value="">Seleccione empleado</option>
              <?php 
                foreach ($empleado as $key => $valE) {
                  $selected = ($valE['id'] == $val['id_empleado']) ? 'selected' : '';
              ?>
                  <option value="<?php echo $valE['id'] ?>" <?php echo $selected ?>><?php echo $valE['empleadoNombre'] ?></option>
              <?php 
                }
              ?>
            </select>
          </div>

              <div class="mb-1 col-12">
                <label for="fecha" class="form-label">Fecha</label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                  value="<?php echo $val['fecha'] ?>"
                />
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