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

    echo "<h1>Navegador</h1>";

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
      echo 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
      echo 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
      echo 'Mozilla Firefox';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
      echo 'Google Chrome';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
      echo "Opera Mini";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
      echo "Opera";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
      echo "Safari";
    else
      echo 'Something else';

    echo "<h1>Sistema Operativo</h1>";

    echo php_uname("s");
    echo php_uname("r");

    echo "<h1>Hora</h1>";
    echo (new \DateTime())->format('Y-m-d H:i:s');
      

    session_start();
    $_SESSION = $datos;
    header("Location:index.php");
  } else {
    $error = "Correo electrónico o Contraseña incorrectos";
  }

  echo $error;
}
