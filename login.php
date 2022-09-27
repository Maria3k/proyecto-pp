<?php

include 'conexion.php';

$error = "";

if (isset($_POST)) {

  $email = $_POST['email'];
  $contraseña = $_POST['contraseña'];
  $contraseña = md5($contraseña);

  $query = "SELECT * FROM usuario WHERE email ='$email' and contraseña='$contraseña'";

  $enviar = $con->query($query) or die("error de sintaxtis");

  $datos = $enviar->fetch_assoc();

  if (($enviar->num_rows) > 0) {

    $navegador = "";

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
      $navegador = 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
      $navegador = 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
      $navegador = 'Mozilla Firefox';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
      $navegador = 'Google Chrome';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
      $navegador = "Opera Mini";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
      $navegador = "Opera";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
      $navegador = "Safari";
    else
      $navegador = 'Something else';
    }
    new DateTime();

    session_start();
    $_SESSION = $datos;
    header("Location:index.php");
  } else {
    $error = "Correo electrónico o Contraseña incorrectos";
  }

  echo $error;
}
