<?php
include("conexion.php");
session_start();

if ($_SESSION) {
  $id = $_SESSION["id_usuario"];
  $query = $con->query('SELECT usuario.*, pregunta.*, respuesta.*, avatar.* FROM usuario LEFT JOIN pregunta ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN respuesta ON respuesta.pregunta = pregunta.id_pregunta LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE pregunta.respondida = 1') or die($query . mysqli_error($con));
  $json = array();
  while ($ask = $query->fetch_assoc()) {
    $json[] = array(
      "nombre"     => $ask["nombre"],
      "apellido"   => $ask["apellido"],
      "nickname"   => $ask["nickname"],
      "avatar"     => $ask["rutaArchivo"],
      "avatarName" => $ask["nombreArchivo"],
      "asunto"     => $ask["asunto"],
      "fecha"      => $ask["fechaPreguntada"],
    );
  }
  echo json_encode($json);
}
