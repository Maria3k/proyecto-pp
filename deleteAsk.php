<?php
    include("conexion.php");

    if($_POST){
        $con->query("DELETE FROM pregunta WHERE id_pregunta = ".$_POST["id"]) or die($query . mysqli_error($con));
    }

?>