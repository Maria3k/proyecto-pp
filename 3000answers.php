<?php
/*Asegurarse de tener la tabla "respuesta" vacia*/
include "conexion.php";
$aux = 1;
for ($i = 1; $i < 1001; $i++) {
    $sql = "INSERT INTO respuesta(id_respuesta, usuario_respuesta, pregunta, contenido, fechaRespondida, especialidad) VALUES ($i," . random_int(1, 50) . ", " . $aux . ", 'Yo bien ¿Y vos?', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 1)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
$aux = 100;
for ($i = 1001; $i < 2001; $i++) {
    $sql = "INSERT INTO respuesta(id_respuesta, usuario_respuesta, pregunta, contenido, fechaRespondida, especialidad) VALUES ($i," . random_int(1, 50) . ", " . $aux . ", 'Yo bien ¿Y vos?', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 2)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
$aux = 200;
for ($i = 2001; $i < 3001; $i++) {
    $sql = "INSERT INTO respuesta(id_respuesta, usuario_respuesta, pregunta, contenido, fechaRespondida, especialidad) VALUES ($i," . random_int(1, 50) . ", " . $aux . ", 'Yo bien ¿Y vos?', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 3)";
    if ($i % 10 === 0) $aux++;
    $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
header("Location:index.php");
