<?php
/*Asegurarse de tener la tabla "subrespuesta" vacia*/
include "conexion.php";
$aux = 1;
for ($i = 1; $i < 10001; $i++) {
    $sql = "INSERT INTO subrespuesta(id_subR, usuario , respuesta, contenido, fechaSub, especialidad) VALUES ($i," . random_int(1, 50) . ", " . $aux . ", 'Bien gracias por preguntar C: $i', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 1)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
$aux = 1000;
for ($i = 10001; $i < 20001; $i++) {
    $sql = "INSERT INTO subrespuesta(id_subR, usuario , respuesta, contenido, fechaSub, especialidad) VALUES ($i," . random_int(1, 50) . ", " . $aux . ", 'Bien gracias por preguntar C: $i', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 2)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
$aux = 2000;
for ($i = 20001; $i < 30001; $i++) {
    $sql = "INSERT INTO subrespuesta(id_subR, usuario , respuesta, contenido, fechaSub, especialidad) VALUES ($i," . random_int(1, 50) . ", " . $aux . ", 'Bien gracias por preguntar C: $i', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 3)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
header("Location:index.php");
