<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "e.t32r";

$con =  new mysqli($host, $user, $password, $database) or die("No pudo conectarse: " . mysqli_error($con));
