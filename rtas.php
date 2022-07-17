<?php
    $rtaQuery = $con->query("SELECT `respuesta`.*, `usuario`.*, `avatar`.* FROM `respuesta` LEFT JOIN `usuario` ON `respuesta`.`usuario_respuesta` = `usuario`.`id_usuario` LEFT JOIN `avatar` ON `usuario`.`nAvatar` = `avatar`.`id_avatar` WHERE id_pregunta = ".$_POST["id"]) or die($rtaQuery . mysqli_error($con));
    $json = array();
    while ($rta = $rtaQuery->fetch_assoc()) {
        $json[] = array(
            "id" => $rta["id_pregunta"],
            "nombre" => $rta["nombre"],
            "apellido" => $rta["apellido"],
            "nickname" => $rta["nickname"],
            "avatar" => $rta["rutaArchivo"],
            "avatarName" => $rta["nombreArchivo"],
            "asunto" => $rta["asunto"],
            "contenido" => $rta["contenido"],
            "fecha" => $rta["fechaPreguntada"],
        );
    }
?>