<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';

if (isset($_POST)) {

  $email = $_POST['email'];
  $contraseña = md5($_POST['contraseña']);

  $query = "SELECT `id_usuario`,`nombre`,`apellido`,`nickname`,`email`,`fechaNacimiento`,`contraseña`, `avatar`.`id_avatar`, `avatar`.`nombreArchivo`, `avatar`.`rutaArchivo` FROM `usuario` INNER JOIN `avatar` ON `usuario`.`nAvatar` = `avatar`.`id_avatar` WHERE email ='$email' and contraseña='$contraseña'";

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

    $lastSession = "SELECT * FROM sesion WHERE usuario = " . $datos["id_usuario"];
    $filaSession = $con->query($lastSession)->fetch_assoc();

    $datos["sesion"] = $filaSession;


    $query = "UPDATE sesion SET navegador='$navegador',dispositivo='$os',hora='$fecha' WHERE usuario = " . $datos["id_usuario"];
    $con->query($query);

    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
  } else {
    $json = array("error" => 'Correo electrónico o Contraseña incorrectos');
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
  }
}
