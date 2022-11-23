<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';


$sql = "
    INSERT INTO `respuesta`
        VALUES ("
    . ($con->query("SELECT `id_respuesta` FROM `respuesta` ORDER BY `id_respuesta` DESC")->fetch_assoc()["id_respuesta"] + 1) . ","
    . $_POST["usuario_respuesta"] . ",'"
    . $_POST["pregunta"] . "','"
    . $_POST["contenido"] . "',"
    . "NOW(),"
    . ($con->query("SELECT `especialidad` FROM `pregunta` WHERE id_pregunta = " . $_POST["pregunta"])->fetch_assoc()["especialidad"]) .
    ")
";

$query = $con->query($sql) or die(mysqli_error($con));


echo json_encode($query, JSON_UNESCAPED_SLASHES);
