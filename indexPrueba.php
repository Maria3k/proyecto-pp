<?php
    include "conexion.php";

    session_start();

    $nav = '<a class="btn-nav" href="register.html">Register</a>
          <a class="btn-nav" href="login.html">Iniciar Sesion</a>';

    if($_SESSION){
      $avatar = $_SESSION["nAvatar"];
      $query = "SELECT * FROM avatar WHERE id_avatar = $avatar";
      $datos = $con->query($query);
      $col = $datos->fetch_assoc();


      $nav = '
      <div class="action" >
        <div class="profile" onclick="menuToggle()">
          <img src="'.$col["rutaArchivo"].'" width="30px" height="30px" alt="'.$col["nombreArchivo"].'">
        </div>
        <div class="menu">
          <ul>
            <li id="primero"><a href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></li>
            <li><a href="cerrar_sesion.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar Sesion</a></li>
          </ul>
        </div>
      </div>
            ';
    }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon/favicon.png">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="assets/css/especialidades.css">
    <title>E.T.32 Preguntas</title>
  </head>
  <body>
    <nav>
        <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
        <?=$nav?>
    </nav>
    <div class="container">
      <div class="row align-item-center">
        <div class="col-4">
          <img src="assets/img/escuela/escuela.jpg" alt="escuela.jpg">
        </div>
        <div class="col-6">
          <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus mollitia similique non atque nesciunt velit recusandae a reprehenderit cum enim quasi perferendis aperiam dolorum magnam, aliquam laudantium quidem, animi qui. </p>
        </div>
      </div>
    </div>
    <div class="Contenedor">
      <div class="card">
        <a href="computacion.html" title="Sección de Computacion"><img src="assets/img/escuela/computacion.png" alt="computacion.png"></a>
      <h1>Computacion</h1>
      </div>

      <div class="card">
        <a href="mecanica.html" title="Sección de Mecanica"><img src="assets/img/escuela/mecanica.png" alt="mecanica.png"></a>
      <h1>Mecanica</h1>
      </div>

      <div class="card">
        <a href="automotores.html" title="Sección de Automotores"><img src="assets/img/escuela/automotores.png" alt="automotores.png"></a>
      <h1>Automotores</h1>
      </div>
    </div>
    <div class="contenedorVideo">
      <video src="assets/video/3 Ejercicios Para Saltar Mas En Casa(Prueba).mp4" class="slider" loop muted controls></video>
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
              <a href="https://www.facebook.com/groups/tecnica32/" rel="noopener noreferrer" class="facebook" target="_blank" title="Facebook"><!--LINK DE FACEBOOK -->
                <i class="fab fa-facebook-f"></i> <!--ICONO DE FACEBOOK -->
              </a>

              <a href="https://github.com/Maria3k/Proyecto-PP" rel="noopener noreferrer" class="github" target="_blank" title="Github"><!--LINK DE GITHUB -->
                <i class="fab fa-github"></i> <!--ICONO DE GITHUB -->
              </a>

              <a href="https://www.youtube.com/channel/UCywUijMchnujSg6dVVUKprQ/videos?view_as=subscriber" rel="noopener noreferrer" class="youtube" target="_blank" title="Youtube"><!--LINK DE YOUTUBE -->
                <i class="fab fa-youtube"></i> <!--ICONO DE YOUTUBE -->
              </a>

              <a href="https://www.instagram.com/la_gloriosa_32_escuela_tecnica/?hl=es-la" rel="noopener noreferrer" class="instagram" target="_blank" title="Instagram"><!--LINK DE INSTAGRAM -->
                <i class="fab fa-instagram"></i><!--ICONO DE INSTAGRAM -->
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
    <script>
      function menuToggle() {
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
      }
    </script>
  </body>
</html>