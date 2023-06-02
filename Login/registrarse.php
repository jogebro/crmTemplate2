<?php
    if(isset($_POST['registrarse'])){
        require_once('RegistroUser.php');

        $registrar = new RegistroUser;

        $registrar -> setIdEmpleado(1);
        $registrar -> setEmail($_POST['email']);
        $registrar -> setUsername($_POST['username']);
        $registrar -> setPassword($_POST['password']);

        /* $registrar -> insertData();

        echo "<script>alert('Usuario registrado satisfactoriamente');document.location='loginRegister.php'</script>"; */

        if ($registrar->checkUser($_POST['email'])) {
            echo "<script>alert('Usuario ya existente, logueate ');document.location='loginRegister.php'</script>";
        }else{
            $registrar -> insertData();
            echo "<script>alert('Usuario registrado satisfactoriamente');document.location='../Home/home.php'</script>"; 
        }
    }

?>