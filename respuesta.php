<?php
include("conexion.php");
session_start();

if ($_SESSION) {
  if ($_POST) {
    $query = $con->query("INSERT INTO respuesta(usuario_respuesta, pregunta, contenido, fechaRespondida, especialidad) VALUES (".$_SESSION["id_usuario"].",".$_POST["pregunta"].",'".$_POST["respuesta"]."','".date('Y-m-d')."',".$_GET["e"].")") or die("Error en el INSERT ---> ".$query.mysqli_error($con));
    $update = $con->query("UPDATE pregunta SET respondida = 1 WHERE id_pregunta = ".$_POST["pregunta"]) or die("Error en el UPDATE ---> ".$update.mysqli_error($con));
  }else{
    echo "ola";
  }
}else{
  header("Location:login.php");
}

?>
