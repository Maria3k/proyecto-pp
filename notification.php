<?php
include("conexion.php");
session_start();

header('Content-Type: application/json; charset=utf-8');

if ($_SESSION) {
  $id = $_SESSION["id_usuario"];
  $query = $con->query('SELECT `pregunta`.*, `respuesta`.*, `usuario`.*, `avatar`.* FROM `pregunta` LEFT JOIN `respuesta` ON `respuesta`.`pregunta` = `pregunta`.`id_pregunta` LEFT JOIN `usuario` ON `respuesta`.`usuario_respuesta` = `usuario`.`id_usuario` LEFT JOIN `avatar` ON `usuario`.`nAvatar` = `avatar`.`id_avatar` WHERE pregunta.respondida = 1 AND pregunta.usuario_pregunta ='. $_POST["id"]) or die($query . mysqli_error($con));
  $json = array();
  while ($ask = $query->fetch_assoc()) {
    $json[] = $ask;
    /*$json[] = array(
      "nombre"     => $ask["nombre"],
      "apellido"   => $ask["apellido"],
      "nickname"   => $ask["nickname"],
      "avatar"     => $ask["rutaArchivo"],
      "avatarName" => $ask["nombreArchivo"],
      "asunto"     => $ask["asunto"],
      "fecha"      => $ask["fechaPreguntada"],
    );*/
  }
  echo json_encode($json, JSON_UNESCAPED_UNICODE);
}
