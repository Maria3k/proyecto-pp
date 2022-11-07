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
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/css/perfilcopy.css">
    <link rel="stylesheet" href="accordiancopy.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrapcopy.css">
    <link rel="stylesheet" href="assets/css/iconscopy.css">
    <link rel="stylesheet" href="assets/css/fondo.css">
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

      .activeO a{
        color: white !important;
      }
    </style>
  </head>

  <body class="body-perfil">

    <!-- NavBar -->
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
        <li class="activeO">
          <a id="option1" >
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
        <li>
          <a class="option" href="infoGeneral.php">
            <i class="fa fa-clone icon"></i>
            <span>Info General</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="contenedor">
      <div class="carta-contenedor">
        <div class="header">
          <div class="nombreUser">
            <h2><label for="" id="titulob">¡Bienvenido!&nbsp <b><?= $usr["nombre"] ?></b> </h2></label>
          </div>
          <div class="lorem">
            Si el usuario dispone de alguna interrogacion o visualiza algun problema en la web dale al boton consulta 
            <br>
            Contacto
            <ul>
              <li>
                DOE - Email: ofdealumnos@gmail.com
              </li>
              <li>
                Telefono: 4551-9121 4555-4026/4034
              </li>
              <li>
                Direccion: Teodoro Garcia 3899 - C1427ECG CABA 
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="wave">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#467CDD" fill-opacity="1" d="M0,128L34.3,144C68.6,160,137,192,206,181.3C274.3,171,343,117,411,128C480,139,549,213,617,208C685.7,203,754,117,823,106.7C891.4,96,960,160,1029,181.3C1097.1,203,1166,181,1234,154.7C1302.9,128,1371,96,1406,80L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>

    <div class="consulta">
      <a href="#" class="botonConsulta">
        <p>
          Realizar Consulta
        </p>
      </a>
    </div>

    <!-- Aca va el Footer --->

    <!-- Codigo de abajo, script del menu anterior -->
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

    <script>
      // ---------vertical-menu with-inner-menu-active-animation-----------
      var tabsVerticalInner = $('#accordian');
      var selectorVerticalInner = $('#accordian').find('li').length;
      var activeItemVerticalInner = tabsVerticalInner.find('.active');
      var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
      var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
      var itemPosVerticalTop = activeItemVerticalInner.position();
      var itemPosVerticalLeft = activeItemVerticalInner.position();
      $(".selector-active").css({
        "top": itemPosVerticalTop.top + "px",
        "left": itemPosVerticalLeft.left + "px",
        "height": activeWidthVerticalHeight + "px",
        "width": activeWidthVerticalWidth + "px"
      });
      $("#accordian").on("click", "li", function(e) {
        $('#accordian ul li').removeClass("active");
        $(this).addClass('active');
        var activeWidthVerticalHeight = $(this).innerHeight();
        var activeWidthVerticalWidth = $(this).innerWidth();
        var itemPosVerticalTop = $(this).position();
        var itemPosVerticalLeft = $(this).position();
        $(".selector-active").css({
          "top": itemPosVerticalTop.top + "px",
          "left": itemPosVerticalLeft.left + "px",
          "height": activeWidthVerticalHeight + "px",
          "width": activeWidthVerticalWidth + "px"
        });
      });
    </script>

    <!----->
    <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>

</html>