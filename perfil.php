<?php
include("conexion.php");
session_start();

if ($_SESSION) {
  $_SESSION = $con->query("SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();
} else {
  header("Location:login.php");
}


$nAvatar = $_SESSION["nAvatar"];

$query = "SELECT * FROM avatar WHERE id_avatar = $nAvatar";
$send = $con->query($query);
$col = $send->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/img/favicon/favicon.png">
  <link rel="stylesheet" href="assets/css/perfil.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/icons.css">
  <link rel="stylesheet" href="assets/css/especialidades.css">
  <title>Inicio - Perfil</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div id="menu" class="col-3">
        <ul class="letra">
          <li id="selec">
            <!--PUNTO DE REFERENCIA-->
            <span>Inicio</span>
          </li>
          <li>
            <a href="infoPersonal.php">Información personal</a>
          </li>
          <li>
            <a href="seguridad.php">Seguridad</a>
          </li>
          <li class="ult">
            <a href="infoGeneral.php">Información general</a>
          </li>
        </ul>
      </div>
      <div id="section" class="col-9">
        <div class="principal">
          <img src=<?= $col["rutaArchivo"]; ?> width="100px" height="100px" alt=<?= $col["nombreArchivo"]; ?>>
          <h2>¡Bienvenido <?= $_SESSION["nickname"] ?>!</h2>
        </div>
        <br>
        <div class="boton">
          <a href="">Consultas</a>
        </div>
        <br><br>
        <div class="boton">
          <a href="">Enviar Comentarios</a>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="row">
      <div class="col l6">
        <h5>Contacto</h5>
        <ul>
          <li>Email DOE: ofdealumnos32@gmail.com</li>
          <li>Teléfonos: 4551-9121 4555-4026/4034</li>
          <li>Dirección: Teodoro García 3899, C1427ECG CABA</li>
          <li>
            Autores:
            <ul>
              <li>Maria Morales - 6°1 Computacion</li>
              <li>Nicolas Domeq - 6°1 Computacion</li>
              <li>Ignacio Rios Lahore - 6°1 Computacion</li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="col l6">
        <div class="wrapper">
          <div class="connect">
            <a href="https://www.facebook.com/groups/tecnica32/" rel="noopener noreferrer" class="facebook" target="_blank" title="Facebook">
              <!--LINK DE FACEBOOK -->
              <i class="fab fa-facebook-f"></i>
              <!--ICONO DE FACEBOOK -->
            </a>

            <a href="https://github.com/Maria3k/Proyecto-PP" rel="noopener noreferrer" class="github" target="_blank" title="Github">
              <!--LINK DE GITHUB -->
              <i class="fab fa-github"></i>
              <!--ICONO DE GITHUB -->
            </a>

            <a href="https://www.youtube.com/channel/UCywUijMchnujSg6dVVUKprQ/videos?view_as=subscriber" rel="noopener noreferrer" class="youtube" target="_blank" title="Youtube">
              <!--LINK DE YOUTUBE -->
              <i class="fab fa-youtube"></i>
              <!--ICONO DE YOUTUBE -->
            </a>

            <a href="https://www.instagram.com/la.gloriosa.32/?hl=es-la" rel="noopener noreferrer" class="instagram" target="_blank" title="Instagram">
              <!--LINK DE INSTAGRAM -->
              <i class="fab fa-instagram"></i>
              <!--ICONO DE INSTAGRAM -->
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="assets/js/bootstrap.js"></script>
  <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
</body>

</html>