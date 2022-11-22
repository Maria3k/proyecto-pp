<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

include 'conexion.php';

$json = [];

$query = $con->query("SELECT * FROM avatar") or die (mysqli_error($con));

while($row = $query->fetch_assoc()){
    $json[] = $row;
}

echo json_encode($json, JSON_UNESCAPED_SLASHES);