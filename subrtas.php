<?php
include("conexion.php");

if ($_POST) {
    $rtaQuery = $con->query("SELECT `subrespuesta`.*, `usuario`.*, `avatar`.* FROM `subrespuesta` LEFT JOIN `usuario` ON `subrespuesta`.`usuario` = `usuario`.`id_usuario`  LEFT JOIN `avatar` ON `usuario`.`nAvatar` = `avatar`.`id_avatar` WHERE subrespuesta.respuesta = " . $_POST["id"]) or die($rtaQuery . mysqli_error($con));
    $json = array();
    while ($rta = $rtaQuery->fetch_assoc()) {
        $json[] = array(
            "id" => $rta["id_subR"],
            "nombre" => $rta["nombre"],
            "apellido" => $rta["apellido"],
            "nickname" => $rta["nickname"],
            "avatar" => $rta["rutaArchivo"],
            "avatarName" => $rta["nombreArchivo"],
            "contenido" => $rta["contenido"],
            "fecha" => $rta["fechaSub"],
        );
    }
    echo json_encode($json);
} else {
    header("Location:index.php");
}
