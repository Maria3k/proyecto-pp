<?php
include("conexion.php");
session_start();

header('Content-Type: application/json; charset=utf-8');

if ($_SESSION) {
  $id = $_SESSION["id_usuario"];

  $query = $con->query('SELECT usuario.*, pregunta.*, respuesta.*, avatar.* FROM usuario LEFT JOIN pregunta ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN respuesta ON respuesta.pregunta = pregunta.id_pregunta LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE pregunta.respondida = 1 AND `id_usuario` = ' . $id) or die($query . mysqli_error($con));
  $json = array();
  while ($ask = $query->fetch_assoc()) {
    $json[] = $ask;
  }
  echo json_encode($json, JSON_UNESCAPED_UNICODE);
}
