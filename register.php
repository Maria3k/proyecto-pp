<?php
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

  if ($_POST['contraseña'] != $_POST['contra']) $json[] = array( "passwordError" => "Las contraseñas no coinciden");

  $query = "INSERT INTO usuario(nombre,apellido,nickname,email,fechaNacimiento,contraseña,nAvatar,rol)
      VALUES('$nombre','$apellido','$nickname','$email','$fechaNacimiento_sql','$contraseña','$avatar',1)";

  $verificar_email = "SELECT * FROM usuario WHERE email = '$email' ";
  $vemail = $con->query($verificar_email);
  if (($vemail->num_rows) > 0) {
    echo '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este email ya esta registrado</div>';
    $verificar_nickname = "SELECT * FROM usuario WHERE nickname = '$nickname' ";
    $venickame = $con->query($verificar_nickname);
    if (($venickame->num_rows) > 0) {
      echo '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este nombre de usuario ya esta registrado</div>';
    }
  } else {
    $con->query($query) or die("error de sintaxtis");
    header("Location:index.php");
  }
} else {
  echo "ola";
}
