<?php
include 'conexion.php';

header("Content-Type: application/json");

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
    $query = "INSERT INTO usuario(nombre,apellido,nickname,email,fechaNacimiento,contraseña,nAvatar,rol)
    VALUES('$nombre','$apellido','$nickname','$email','$fechaNacimiento_sql','$contraseña','$avatar',1)";
    echo $i++;
    $insert = $con->query($query) or die("0");
    echo $i++;

    session_start();
    echo $i++;

    $newUser = "SELECT * FROM usuario WHERE email ='$email' and contraseña='$contraseña'";
    echo $i++;

    $newUserData = $con->query($newUser)->fetch_assoc();
    echo $i++;

    $navegador = "";
    echo $i++;
    $os = "";
    echo $i++;
    $fecha = "";
    echo $i++;


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

    $os = php_uname("s");
    $os += php_uname("r");
    echo $i++;

    $fecha = (new \DateTime())->format('Y-m-d H:i:s');
    echo $i++;

    $sesion = "INSERT INTO sesion(id_usuario,navegador,dispostivo,hora) VALUES (" . $newUserData["id_usuario"] . ", '$navegador', '$os',$fecha) ";
    $send = $con->query($sesion) or die("ERROR" . mysqli_error($con));
    echo $i++;


    $lastSession = "SELECT * FROM sesion WHERE id_usuario = " . $_SESSION["id_usuario"];
    $filaSession = $con->query($lastSession)->fetch_assoc() or die("ERROR" . mysqli_error($con));
    echo $i++;

    $_SESSION = $newUserData;
    array_push($_SESSION, $filaSession);
    echo $i++;

    print_r($insert);
  } else {

    echo json_encode($json);
  }
}
