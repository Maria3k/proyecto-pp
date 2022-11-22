<?php


header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';


$sql = "
    INSERT INTO `pregunta`
        VALUES ("
    . $_POST["id_ultima"] .","
    . $_POST["usuario_pregunta"] . ",'"
    . $_POST["asunto"] . "','"
    . $_POST["contenido"] . "','"
    . $_POST["fechaPreguntada"] . "',"
    . $_POST["respondida"] . ","
    . $_POST["e"] .
    ")
";

$query = $con->query($sql) or die(mysqli_error($con));


echo json_encode($query, JSON_UNESCAPED_SLASHES);
