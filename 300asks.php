<?php
/*Asegurarse de tener la tabla "pregunta" vacia*/

include "conexion.php";

for ($i = 1; $i < 101; $i++) {
  $sql = "INSERT INTO pregunta VALUES ('$i', " . random_int(1, 50) . ", 'Pregunta N°$i - Computacion', 'Hola como estas', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 31) . "', 0, 1)";
  $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
for ($i = 101; $i < 201; $i++) {
  $sql = "INSERT INTO pregunta VALUES ('$i', " . random_int(1, 50) . ", 'Pregunta N°$i - Mecanica', 'Hola como estas', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 28) . "', 0, 2)";
  $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
for ($i = 201; $i < 301; $i++) {
  $sql = "INSERT INTO pregunta VALUES ('$i', " . random_int(1, 50) . ", 'Pregunta N°$i - Automotores', 'Hola como estas', '" . random_int(1930, 2021) . "-" . random_int(1, 12) . "-" . random_int(1, 28) . "', 0, 3)";
  $con->query($sql) or die("Error en el insert --->" . $query . mysqli_error($con));
}
header("Location:index.php");
