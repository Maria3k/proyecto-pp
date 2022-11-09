<?php
include("conexion.php");
session_start();
if ($_SESSION) {
  $usr = $con->query("SELECT usuario.*, avatar.* FROM usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();
} else {
  header("location:login.php");
}

$menu = '';

if ($_SESSION) {

  $nAvatar = $_SESSION["nAvatar"];

  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();
  $ad = '';

  if ($_SESSION["rol"] == 2) {
    $ad = '<li><a href="backend.php"><i class="fa-solid fa-gear"></i>Editar</a></li>';
  }


  $menu = '        
  <div class="action" >
    <div class="profile" onclick="menuToggle()">
      <img src="' . $col["rutaArchivo"] . '" width="30px" height="30px" alt="' . $col["nombreArchivo"] . '">
    </div>
    <div class="menu">
      <ul>
        <li id="primero"><a href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></li>
        ' . $ad . '
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/perfilcopy.css">
  <link rel="stylesheet" href="accordiancopy.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/bootstrapcopy.css">
  <link rel="stylesheet" href="assets/css/iconscopy.css">
  <link rel="stylesheet" href="assets/css/fondo.css">
  <link rel="stylesheet" href="infoGeneral.css">
  <link rel="stylesheet" href="assets/css/card.css">
  <style>
    .option:hover {
      color: white !important;
    }

    .option span {
      opacity: 0;
      transition-duration: 250ms;
    }

    .option:hover>span {
      opacity: 1;
    }

    .activeO a {
      color: white !important;
    }
  </style>
</head>

<body>
  <nav>
    <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
    <div class="icon-wrapper" data-numbrer="1">
      <img src="assets/img/iconos/bell-solid.svg" class="bell-icon">
    </div>
    <?= $menu ?>
  </nav>
  <!--menu -->

  <div id="accordian">
    <ul class="show-dropdown">
      <li>
        <a id="option1" class="option" href="perfilcopy.php">
          <i class="fa fa-tachometer icon"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li>
        <a class="option" href="infoPersonalcopy.php">
          <i class="fa fa-address-book icon"></i>
          <span>Info Personal</span>
        </a>
      </li>
      <li>
        <a class="option" href="seguridadcopy.php">
          <i class="fa-solid fa-lock icon"></i>
          <span>Seguridad</span>
        </a>
      </li>
      <li class="activeO">
        <a>
          <i class="fa fa-clone icon"></i>
          <span>Info General</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- Que ofrece la web -->
  <div class="mover">
    <div id="divPadre">
      <div id="divHijo">
        <p>¿Qué ofrece nuestra web?</p>
      </div>
      <div class="infop">
        <p>
          E.T32 Respuestas está optimizada para la resolución
          de incertidumbres de los estudiantes con respecto a sus especialidad;
          donde los directivos, profesores y/o estudiantes que poseen el conocimiento
          para responder la interrogante, a fin de que la duda sea resuelta.
        </p>
      </div>
    </div>


    <div id="divPadre2">
      <div id="divHijo2">
        <p>Directivos</p>
      </div>
      <div class="dirvos">
        <div class="directivo1">
          <img class="imgi" src="assets/img/iconosUsu/logo2.png" alt="">
          <div class="infop">
            <p class="letraa">Hola soy tino</p>
            <p>Director de la institucion</p>
          </div>

        </div>
        <div class="directivo1">
          <img class="imgi"src="assets/img/iconosUsu/logo3.png" alt="">
          <div class="infop">
            <p class="letraa"> Hola soy tino</p>
            <p>Director de la institucion</p>
          </div>
        </div>
        <div class="directivo1">
          <img class="imgi" src="assets/img/iconosUsu/logo4.png" alt="">
          <div class="infop">
            <p class="letraa">Hola soy tino</p>
            <p>Director de la institucion</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->

  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

      if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
      } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
    }
  </script>
  <!-- Aca va el footer -->
  <!-- Script del accordian -->
  <script>
    function infoPersonal() {
      setTimeout("location.href = 'infoPersonal.php';", 400);
    }

    function perfil() {
      setTimeout("location.href = 'perfil.php';", 400);
    }

    function seguridad() {
      setTimeout("location.href = 'seguridad.php';", 400);
    }
  </script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
</body>

</html>