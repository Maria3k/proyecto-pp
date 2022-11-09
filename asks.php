<?php

include("conexion.php");
session_start();

if ($_POST) {
  if (isset($_POST["clave"])) {
    $query = $con->query(
      "SELECT pregunta.*, usuario.*, avatar.* FROM pregunta LEFT JOIN usuario ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE especialidad = " . $_POST["e"] . " AND asunto LIKE '%" . $_POST["clave"] . "%' ORDER BY `pregunta`.`id_pregunta` DESC"
    ) or die($query . mysqli_error($con));
    $rtas = array();
    while ($ask = $query->fetch_assoc()) {
      $rtas[] = array(
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
    $json["pages"] = $con->query("SELECT * FROM pregunta WHERE especialidad = " . $_POST["e"] . " AND asunto LIKE '%". $_POST["clave"] . "%'")->num_rows / 10;
    $json["rtas"] = $rtas;

    echo json_encode($json);
  } else {
    $sql = "SELECT pregunta.*, usuario.*, avatar.* FROM pregunta LEFT JOIN usuario ON pregunta.usuario_pregunta = usuario.id_usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE especialidad = " . $_POST["e"] . " ORDER BY `pregunta`.`id_pregunta` DESC LIMIT ".$_POST["page"].",10";
echo $sql;
    $query = $con->query($sql) or die($query . mysqli_error($con));
    $rtas = array();
    while ($ask = $query->fetch_assoc()) {
      $rtas[] = array(
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

    $json["pages"] = $con->query("SELECT * FROM pregunta WHERE especialidad = " . $_POST["e"])->num_rows / 10;
    $json["rtas"] = $rtas;

    echo json_encode($json);
  }
}
