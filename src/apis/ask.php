<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';

$json = [];

if (isset($_POST['key'])) {

    $json["pages"] = intval($con->query("SELECT ROUND(COUNT(*)/10) AS 'pages' FROM `pregunta` WHERE `especialidad` = " . $_POST["e"] . " AND `asunto` LIKE '%" . $_POST["key"] . "%'")->fetch_assoc()["pages"]);


    $sql = "
        SELECT `pregunta`.`id_pregunta`, `pregunta`.`asunto`, `pregunta`.`contenido`,`pregunta`.`fechaPreguntada`, `usuario`.`nickname`, `avatar`.`rutaArchivo`, `avatar`.`nombreArchivo` 
        FROM (`pregunta` 
            INNER JOIN `usuario`ON `pregunta`.`usuario_pregunta` = `usuario`.`id_usuario`)
            INNER JOIN `avatar`ON `usuario`.`nAvatar` = `avatar`.`id_avatar`
        WHERE `especialidad` = " . $_POST["e"] . " AND `pregunta`.`asunto` LIKE '%" . $_POST["key"] . "%'
        ORDER BY `pregunta`.`fechaPreguntada` DESC
        LIMIT " . (isset($_POST["page"]) ? $_POST["page"] * 10 : 1) . ",10

    ";

    $query = $con->query($sql) or die(mysqli_error($con));

    while ($row = $query->fetch_assoc()) {
        $json["results"] = $row;
    }

    echo json_encode($json, JSON_UNESCAPED_SLASHES);
} else {

    $json["pages"] = $con->query("SELECT ROUND(COUNT(*)/10) AS 'pages' FROM `pregunta` WHERE `especialidad` = " . $_POST["e"])->fetch_assoc()["pages"];


    $sql = "
        SELECT `pregunta`.`id_pregunta`, `pregunta`.`asunto`, `pregunta`.`contenido`,`pregunta`.`fechaPreguntada`, `usuario`.`nickname`, `avatar`.`rutaArchivo`, `avatar`.`nombreArchivo` 
        FROM (`pregunta` 
            INNER JOIN `usuario`ON `pregunta`.`usuario_pregunta` = `usuario`.`id_usuario`)
            INNER JOIN `avatar`ON `usuario`.`nAvatar` = `avatar`.`id_avatar`
        WHERE `especialidad` = " . $_POST["e"] . "  
        ORDER BY `pregunta`.`fechaPreguntada` DESC
        LIMIT " . (isset($_POST["page"]) ? $_POST["page"] * 10 : 1) . ",10
    ";

    $query = $con->query($sql) or die(mysqli_error($con));

    while ($row = $query->fetch_assoc()) {

        $json["results"][] = $row;
    }

    echo json_encode($json, JSON_NUMERIC_CHECK);
}
