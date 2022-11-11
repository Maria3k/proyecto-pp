<?php

$host = 'containers-us-west-115.railway.app';
$user = 'root';
$password = 'NdJnyRORxukfIdGfFzO6';
$database = 'railway';
$port = 6523;

$con =  new mysqli($host, $user, $password, $database, $port) or die('No pudo conectarse: ' . mysqli_error($con));
