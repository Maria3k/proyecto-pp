<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';

$json = [];

$sql = "
    SELECT `respuesta`.`id_respuesta`, `respuesta`.`contenido`,`respuesta`.`fechaRespondida`, `usuario`.`nickname`, `avatar`.`rutaArchivo`, `avatar`.`nombreArchivo` 
    FROM (`respuesta` 
	    INNER JOIN `usuario`ON `respuesta`.`usuario_respuesta` = `usuario`.`id_usuario`)
        INNER JOIN `avatar`ON `usuario`.`nAvatar` = `avatar`.`id_avatar`
    WHERE `respuesta`.`pregunta` = " . $_POST["ask"] . "  
    ORDER BY `respuesta`.`fechaRespondida` DESC
";

$query = $con->query($sql) or die(mysqli_error($con));

while ($row = $query->fetch_assoc()) {
    $json[] = $row;
}

echo json_encode($json, JSON_UNESCAPED_SLASHES);
