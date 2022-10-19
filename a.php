<?php
include("conexion.php");
session_start();

if ($_SESSION) {
  $id = $_SESSION["id_usuario"];

  $sql = "SELECT usuario.nickname, pregunta.asunto, avatar.nombreArchivo, avatar.rutaArchivo FROM usuario INNER JOIN pregunta ON pregunta.usuario_pregunta = usuario.id_usuario INNER JOIN avatar ON usuario.nAvatar = avatar.id_avatar";


  $query = $con->query() or die($query . mysqli_error($con));
  $json = array();
  while ($ask = $query->fetch_assoc()) {
    $json[] = $ask;
  }
}
