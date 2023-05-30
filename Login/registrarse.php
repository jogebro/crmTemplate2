<?php
    if(isset($_POST['registrarse'])){
        require_once('RegistroUser.php');

        $registrar = new RegistroUser;

        $registrar -> setIdEmpleado(2);
        $registrar -> setEmail($_POST['email']);
        $registrar -> setUsername($_POST['username']);
        $registrar -> setPassword($_POST['password']);

        $registrar -> insertData();

        echo "<script>alert('Usuario registrado satisfactoriamente');document.location='loginRegister.php'</script>";
    }

?>