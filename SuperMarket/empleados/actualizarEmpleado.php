<?php
    require_once("../config.php"); 
    $data = new ConfigEmpleados();

    $id = $_GET['id'];
    $data -> setId($id);

    $record = $data -> selectOne();

    $val = $record[0];

    if (isset($_POST['editar'])){
        $data -> setNombreEmpleado($_POST['empleadoNombre']);
        $data -> setCelular($_POST['celular']);
        $data -> setDireccion($_POST['direccion']);
        if (!empty($_FILES['imagen']['name'])) {
            $data -> setImagen($_FILES['imagen']['name']);
            move_uploaded_file($_FILES['imagen']['tmp_name'], 'imagenEmpleados/'.$_FILES['imagen']['name']);
        } else {
            $data -> setImagen($val['imagen']);
        }

        $data -> update();
        echo "<script>alert('Datos actualizados correctamente');document.location='empleados.php'</script>";
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
        <h2 class="m-2">Empleado a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action="" enctype="multipart/form-data"  method="post">
              <div class="mb-1 col-12">
                <label for="empleadoNombre" class="form-label">Nombre Empleado</label>
                <input 
                  type="text"
                  id="empleadoNombre"
                  name="empleadoNombre"
                  class="form-control"  
                  value = "<?php echo $val['empleadoNombre'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="celular" class="form-label">Celular</label>
                <input 
                  type="number"
                  id="celular"
                  name="celular"
                  class="form-control"  
                  value = "<?php echo $val['celular'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Direccion</label>
                <input 
                  type="text"
                  id="direccion"
                  name="direccion"
                  class="form-control"  
                  value = "<?php echo $val['direccion'] ?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="imagen" class="form-label">Imagen</label>
                <input 
                  type="file"
                  id="imagen"
                  name="imagen"
                  class="form-control"  
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