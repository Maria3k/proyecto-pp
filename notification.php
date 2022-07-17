<?php
include("conexion.php");
session_start();

if ($_SESSION) {
  $id = $_SESSION["id_usuario"];
  $envio = $con->query("SELECT * FROM pregunta WHERE respondida = 1 AND usuario_pregunta = $id");

  echo $envio->num_rows;
}
?>
