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
    $query = "INSERT INTO usuario(nombre,apellido,nickname,email,fechaNacimiento,contraseña,nAvatar,rol)
    VALUES('$nombre','$apellido','$nickname','$email','$fechaNacimiento_sql','$contraseña','$avatar',1)";

    $insert = $con->query($query) or die("0");


    print_r($insert);
  } else {

    echo json_encode($json);
  }
}
