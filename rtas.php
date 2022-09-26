<?php
include("conexion.php");

if ($_POST) {
    $rtaQuery = $con->query("SELECT `respuesta`.*, `usuario`.*, `avatar`.* FROM `respuesta` LEFT JOIN `usuario` ON `respuesta`.`usuario_respuesta` = `usuario`.`id_usuario` LEFT JOIN `avatar` ON `usuario`.`nAvatar` = `avatar`.`id_avatar` WHERE pregunta = " . $_POST["id"]) or die($rtaQuery . mysqli_error($con));
    $json = array();
    while ($rta = $rtaQuery->fetch_assoc()) {
        $json[] = array(
            "id" => $rta["id_respuesta"],
            "nombre" => $rta["nombre"],
            "apellido" => $rta["apellido"],
            "nickname" => $rta["nickname"],
            "avatar" => $rta["rutaArchivo"],
            "avatarName" => $rta["nombreArchivo"],
            "contenido" => $rta["contenido"],
            "fecha" => $rta["fechaRespondida"],
        );
    }
    echo json_encode($json);
} else {
    header("Location:index.php");
}
