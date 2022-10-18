<?php
include("conexion.php");
session_start();

$sbt = $menu = $ad = '';
$ajax = '-1';


if ($_SESSION) {
  $_SESSION = $con->query("SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();

  $nAvatar = $_SESSION["nAvatar"];
  $ajax = $_SESSION["id_usuario"];

  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();

  if ($_SESSION["rol"] == 2) {
    $ad = '<button class="deleteAsk btn btn-danger" value="${ask.id}">Eliminar</button>';
  }


  $menu = '
    <div class="action" >
      <div class="profile" onclick="menuToggle()">
        <img src="' . $col["rutaArchivo"] . '" width="30px" height="30px" alt="' . $col["nombreArchivo"] . '">
      </div>
      <div class="menu">
        <ul>
          <a href="perfil.php"><li id="primero"><i class="fa-solid fa-user"></i>Perfil</li></a>
          <a href="logout.php"><li><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar Sesion</li></a>
        </ul>
      </div>
    </div>
    <div class="icon-wrapper" data-numbrer="1">
      <i class="bi bi-bell-fill" id="bell-icon"></i>
      <div id="number"></div>
    </div>
  ';
} else {
  $menu = '<a class="btn-nav" href="register.php">Register</a><a class="btn-nav" href="login.php">Iniciar Sesion</a>';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="Facundo se la come" />
  <meta property="og:image" content="http://186.23.120.80:800/pagina/Proyecto-PP/assets/img/iconos/logoblanco.png" />
  <meta property="og:description" content="E.T.N°32 D.E.N°14 Preguntas y Respuestas es E.T.N°32 D.E.N°14 Preguntas y Respuestas..... XD">
  <meta property="og:image:width" content="300px" />
  <meta property="og:image:height" content="300px" />
  <link rel="icon" href="assets/img/favicon/favicon.png">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/icons.css">
  <link rel="stylesheet" href="assets/css/especialidades.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
  <title>E.T.32 Preguntas</title>
</head>

<body>
  <nav>
    <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
    <?= $menu ?>
  </nav>
  <div class="container">
    <div class="row align-item-center">
      <div class="col-4">
        <img class="img-fluid" src="assets/img/escuela/escuela.jpg" alt="escuela.jpg">
      </div>
      <div class="col-6">
        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus mollitia similique non atque nesciunt velit recusandae a reprehenderit cum enim quasi perferendis aperiam dolorum magnam, aliquam laudantium quidem, animi qui. </p>
      </div>
    </div>
  </div>
  <div class="Contenedor">
    <div class="card">
      <a href="computacion.php" title="Sección de Computacion"><img src="assets/img/escuela/computacion.png" alt="computacion.png"></a>
      <h1>Computacion</h1>
    </div>

    <div class="card">
      <a href="mecanica.php" title="Sección de Mecanica"><img src="assets/img/escuela/mecanica.png" alt="mecanica.png"></a>
      <h1>Mecanica</h1>
    </div>

    <div class="card">
      <a href="automotores.php" title="Sección de Automotores"><img src="assets/img/escuela/automotores.png" alt="automotores.png"></a>
      <h1>Automotores</h1>
    </div>
  </div>
  <div class="contenedorVideo">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/i_84BafqQ4I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script>
    function menuToggle() {
      const toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active');
    }
    $(document).ready(() => {
      var id_usr = <?= $ajax; ?>;
      if (id_usr != -1) {
        notification();
      }

      function notification() {
        $("#number").hide();
        $.ajax({
          url: "notification.php",
          type: "POST",
          data: {
            id: <?= $ajax; ?>
          },
          success: function(n) {

            console.log(n);

            if (n != 0) {
              console.log("Funca3");
              $("#number").html(n);
              $("#number").show();
            }
          }
        });
      }


    });
  </script>
</body>

</html>