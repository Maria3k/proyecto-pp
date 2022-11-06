<?php
include("conexion.php");
session_start();

header('Content-Type: application/json; charset=utf-8');

if ($_SESSION) {
  $id = $_SESSION["id_usuario"];
<<<<<<< Updated upstream

  $sql = "SELECT usuario.nickname, avatar.nombreArchivo, avatar.rutaArchivo, pregunta.asunto, respuesta.contenido, respuesta.fechaRespondida
            FROM usuario 
              LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar 
              LEFT JOIN pregunta ON pregunta.usuario_pregunta = usuario.id_usuario 
              LEFT JOIN respuesta ON respuesta.usuario_respuesta = usuario.id_usuario
                WHERE pregunta.respondida = 1 AND pregunta.usuario_pregunta = 1";


  $query = $con->query('SELECT usuario.*, pregunta.*, respuesta.*, avatar.* FROM usuario LEFT JOIN pregunta ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN respuesta ON respuesta.pregunta = pregunta.id_pregunta LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE pregunta.respondida = 1 AND `id_usuario` = ' . $id) or die($query . mysqli_error($con));
  $json = array();
  while ($ask = $query->fetch_assoc()) {
    $json[] = $ask;
=======
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
>>>>>>> Stashed changes
  }
  echo json_encode($json, JSON_UNESCAPED_UNICODE);
}
