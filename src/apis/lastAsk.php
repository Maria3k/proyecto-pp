<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';

echo $con->query("SELECT `id_pregunta` FROM `pregunta` ORDER BY `pregunta`.`id_pregunta` DESC")->fetch_assoc()["id_pregunta"] + 1;
