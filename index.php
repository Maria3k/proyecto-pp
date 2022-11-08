<?php
include("conexion.php");
session_start();

$menu = '';

if ($_SESSION) {

  $nAvatar = $_SESSION["nAvatar"];

  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();
  $ad = '';

  if($_SESSION["rol"] == 2){
    $ad = '<li><a href="backend.php"><i class="fa-solid fa-gear"></i>Editar</a></li>';
  }


  $menu = '        
  <div class="action" >
    <div class="profile" onclick="menuToggle()">
      <img src="'.$col["rutaArchivo"].'" width="30px" height="30px" alt="'.$col["nombreArchivo"].'">
    </div>
    <div class="menu">
      <ul>
        <li id="primero"><a href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></li>
        '.$ad.'
        <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar Sesion</a></li>
      </ul>
    </div>
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
  <link rel="stylesheet" href ="assets/css/footer.css">
  <title>E.T.32 Preguntas</title>
</head>

<body>
  <nav>
    <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
    <div class="icon-wrapper" data-numbrer="1">
      <img src="assets/img/iconos/bell.png" class="bell-icon">
    </div>
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
    <video src="assets/video/3 Ejercicios Para Saltar Mas En Casa(Prueba).mp4" class="slider" loop muted controls></video>
  </div>

  <footer class="foot">
      <div class="grupo-1">
        <div class="box">
          <figure>
            <a href="#">
              <img src="./assets/img/iconos/logoblanco.png" alt="">
            </a>
          </figure>
        </div>
        <div class="box">
          <h5>Autores:</h5>
          <ul>
            <li>Maria Morales - 6°1 Computacion</li>
            <li>Nicolas Domeq - 6°1 Computacion</li>
            <li>Ignacio Rios Lahore - 6°1 Computacion</li>
            <li>Thristall Guerra - 6°1 Computación</li>
            <li>Ivan Britez - 6°1 Computación</li>
          </ul>
        </div>
        <div class="box">
          <h5>Redes Sociales</h5>
          <div class="connect">
            <a href="https://www.facebook.com/groups/tecnica32/" rel="noopener noreferrer" class="facebook"
              target="_blank" title="Facebook">
              <!--LINK DE FACEBOOK -->
              <i class="fab fa-facebook-f"></i>
              <!--ICONO DE FACEBOOK -->
            </a>
            <a href="https://github.com/Maria3k/Proyecto-PP" rel="noopener noreferrer" class="github" target="_blank"
              title="Github">
              <!--LINK DE GITHUB -->
              <i class="fab fa-github"></i>
              <!--ICONO DE GITHUB -->
            </a>

            <a href="https://www.youtube.com/channel/UCywUijMchnujSg6dVVUKprQ/videos?view_as=subscriber"
              rel="noopener noreferrer" class="youtube" target="_blank" title="Youtube">
              <!--LINK DE YOUTUBE -->
              <i class="fab fa-youtube"></i>
              <!--ICONO DE YOUTUBE -->
            </a>

            <a href="https://www.instagram.com/la_gloriosa_32_escuela_tecnica/?hl=es-la" rel="noopener noreferrer"
              class="instagram" target="_blank" title="Instagram">
              <!--LINK DE INSTAGRAM -->
              <i class="fab fa-instagram"></i>
              <!--ICONO DE INSTAGRAM -->
            </a>
          </div>
        </div>
      </div>

      <div class="grupo-2">
        <small>&copy; 2022 <b>ET32 RESPUESTAS</b> - Todos los derechos reservados.</small>
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