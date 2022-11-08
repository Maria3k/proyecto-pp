<?php
header("Content-Type: application/json");

include 'conexion.php';

if (isset($_POST)) {

  $email = $_POST['email'];
  $contraseña = $_POST['contraseña'];
  $contraseña = md5($contraseña);

  $json = array();

  $query = "SELECT * FROM usuario WHERE email ='$email' and contraseña='$contraseña'";

  $enviar = $con->query($query) or die("error de sintaxtis");

  $datos = $enviar->fetch_assoc();

  if (($enviar->num_rows) > 0) {
    $navegador = "";
    $os = "";
    $fecha = "";


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

    $os = php_uname("s") . php_uname("r");

    $fecha = (new \DateTime())->format('Y-m-d H:i:s');



    session_start();
    $_SESSION = $datos;

    $lastSession = "SELECT * FROM sesion WHERE id_usuario = " . $_SESSION["id_usuario"];
    $filaSession = $con->query($lastSession)->fetch_assoc();

    $_SESSION["sesion"] = $filaSession;


    $query = "UPDATE sesion SET navegador='$navegador',dispositivo='$os',hora='$fecha' WHERE id_usuario = " . $_SESSION["id_usuario"];
    $con->query($query);

    echo true;
  } else {
    $json[] = array("error" => '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Correo electrónico o Contraseña incorrectos');
    echo json_encode($json);
  }
}
