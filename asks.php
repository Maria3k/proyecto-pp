<?php

include("conexion.php");
session_start();

if ($_POST) {
  if (isset($_POST["clave"])) {
    $query = $con->query(
      "SELECT pregunta.*, usuario.*, avatar.* FROM pregunta LEFT JOIN usuario ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE especialidad = " . $_POST["e"] . " AND asunto LIKE '%" . $_POST["clave"] . "%' ORDER BY `pregunta`.`id_pregunta` DESC") or die($query . mysqli_error($con));
    $json = array();
    while ($ask = $query->fetch_assoc()) {
      $json[] = array(
        "id" => $ask["id_pregunta"],
        "nombre" => $ask["nombre"],
        "apellido" => $ask["apellido"],
        "nickname" => $ask["nickname"],
        "avatar" => $ask["rutaArchivo"],
        "avatarName" => $ask["nombreArchivo"],
        "asunto" => $ask["asunto"],
        "contenido" => $ask["contenido"],
        "fecha" => $ask["fechaPreguntada"],
      );
    }
    echo json_encode($json);
  }else{
    $query = $con->query("SELECT pregunta.*, usuario.*, avatar.* FROM pregunta LEFT JOIN usuario ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE especialidad = " . $_POST["e"] . " ORDER BY `pregunta`.`id_pregunta` DESC")or die($query.mysqli_error($con));
    $json = array();
    while ($ask = $query->fetch_assoc()) {
      $json[] = array(
        "id" => $ask["id_pregunta"],
        "nombre" => $ask["nombre"],
        "apellido" => $ask["apellido"],
        "nickname" => $ask["nickname"],
        "avatar" => $ask["rutaArchivo"],
        "avatarName" => $ask["nombreArchivo"],
        "asunto" => $ask["asunto"],
        "contenido" => $ask["contenido"],
        "fecha" => $ask["fechaPreguntada"],
      );
    }
    echo json_encode($json);
  }
}

?>
