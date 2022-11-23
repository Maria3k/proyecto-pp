<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

include 'conexion.php';

if ($_POST) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $nickname = $_POST['nickname'];
  $email = $_POST['email'];
  $avatar = $_POST['imgInput'];
  $_POST['m'] = $_POST['m'] + 1;
  $fechaNacimiento_sql = $_POST['a'] . "-" . $_POST['m'] . "-" . $_POST['d'];
  $contraseña = md5($_POST['contraseña']);

  $json = array();

  if ($_POST['contraseña'] != $_POST['contraconfi']) $json[] = array("passwordError" => '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> La contraseña no coinciden </div>');

  $verificar_email = "SELECT * FROM usuario WHERE email = '$email' ";
  $vemail = $con->query($verificar_email);
  if (($vemail->num_rows) > 0) {
    $json[] = array("errorEmail" => '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este email ya esta registrado</div>');
  }
  $verificar_nickname = "SELECT * FROM usuario WHERE nickname = '$nickname' ";
  $venickame = $con->query($verificar_nickname);
  if (($venickame->num_rows) > 0) {
    $json[] = array("errorUsuario" => '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este nombre de usuario ya esta registrado</div>');
  }


  if (count($json) == 0) {
    $i = 0;
    $query = "INSERT INTO usuario
    VALUES(" . ($con->query("SELECT `id_usuario` FROM `usuario` ORDER BY `id_usuario` DESC;")->fetch_assoc()["id_usuario"] + 1) . ",'$nombre','$apellido','$nickname','$email','$fechaNacimiento_sql','$contraseña','$avatar',1)";
    $insert = $con->query($query) or die("0");

    $newUser = "SELECT `id_usuario`,`nombre`,`apellido`,`nickname`,`email`,`fechaNacimiento`,`contraseña`, `avatar`.`id_avatar`, `avatar`.`nombreArchivo`, `avatar`.`rutaArchivo` FROM `usuario` INNER JOIN `avatar` ON `usuario`.`nAvatar` = `avatar`.`id_avatar` WHERE email ='$email' and contraseña='$contraseña'";

    $newUserData = $con->query($newUser)->fetch_assoc() or die("ERROR" . mysqli_error($con));

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

    $sesion = "INSERT INTO sesion VALUES (". ($con->query("SELECT `id_sesion` FROM `sesion` ORDER BY `id_sesion` DESC")->fetch_assoc()["id_sesion"] + 1) .", " . $newUserData["id_usuario"] . ", '$navegador', '$os',NOW()) ";
    $send = $con->query($sesion) or die("ERROR" . mysqli_error($con));

    $lastSession = "SELECT * FROM sesion WHERE usuario = " . $newUserData["id_usuario"];
    $filaSession = $con->query($lastSession)->fetch_assoc() or die("ERROR" . mysqli_error($con));

    $newUserData["sesion"] = $filaSession;

    echo json_encode($newUserData, JSON_UNESCAPED_SLASHES);
  } else {
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
  }
}
