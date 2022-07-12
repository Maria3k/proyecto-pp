<?php
  include "conexion.php";

  for ($i=2; $i < 52 ; $i++) {
    $query = $con->query("INSERT INTO usuario VALUES ('$i','Ignacio$i','Morales$i','Doumeq0$i','ignaciomorales$i@gmail.com','".random_int(1930,2021)."".random_int(1,12)."".random_int(1,31)."',".random_int(12446435,19446435).",'".md5('123')."',".random_int(1,8).",1)") or die("Error en el insert --->".$query.mysqli_error($con));
  }
  header("Location:index.php");
?>
