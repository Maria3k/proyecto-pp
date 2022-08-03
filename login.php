<?php

    include 'conexion.php';

    $error = "";

    if(isset($_POST)){

      $email = $_POST['email'];
      $contraseña = $_POST['contraseña'];
      $contraseña = md5($contraseña);

      $query="SELECT * FROM usuario WHERE email ='$email' and contraseña='$contraseña'";

      $enviar = $con->query($query)or die("error de sintaxtis");

      $datos = $enviar->fetch_assoc();

      if(($enviar->num_rows) > 0){

        session_start();
        $_SESSION = $datos;
        header("Location:index.php");

      }else{
        $error ="Correo electrónico o Contraseña incorrectos";
      }

    }
 ?>
