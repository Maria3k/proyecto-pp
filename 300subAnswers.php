<?php
include "conexion.php";
$aux = 41;
for ($i = 1; $i < 10001; $i++) {
    $sql = "INSERT INTO subrespuesta(usuario , respuesta, contenido, fechaSub, especialidad) VALUES (" . random_int(1, 50) . ", " . $aux . ", 'Bien gracias por preguntar C:', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 1)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
$aux = 100;
for ($i = 1800; $i < 20001; $i++) {
    $sql = "INSERT INTO subrespuesta(usuario , respuesta, contenido, fechaSub, especialidad) VALUES (" . random_int(1, 50) . ", " . $aux . ", 'Bien gracias por preguntar C:', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 2)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
$aux = 200;
for ($i = 2001; $i < 30001; $i++) {
    $sql = "INSERT INTO subrespuesta(usuario , respuesta, contenido, fechaSub, especialidad) VALUES (" . random_int(1, 50) . ", " . $aux . ", 'Bien gracias por preguntar C:', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 3)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
